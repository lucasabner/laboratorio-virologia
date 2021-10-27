<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Usuario extends CI_Controller
{
    public function __Construct()
    {
        parent::__Construct();

        // if (!$this->session->userdata('logged_in')) {
        //     redirect(base_url());
        // }

        //Load aqui pra n precisar fazer pra cada metodo
        $this->load->model('User_Model');
        $this->load->library('user_agent');
    }
    public function index()
    {

        if ($this->session->userdata('logged_in')) {
            // Se for Professor ou aluno vai pra essa pagina e se for administrador
            // vai pra pagina de manipular contas, obs: n pode deixar o
            // administrador acessar outras telas por meio da url por exemplo
            redirect(base_url("amostras"));
        } else {
            $data = array('alert' => false);
            $this->load->view('login', $data);
        }
    }

    function reset_user_password()
    {
        $email = $this->input->post('email');

        $update = $this->User_Model->reset_user_password($email);
        if ($update) {
            $this->session->set_flashdata('flashSuccess', 'O usuario de email: ' . $email . ' teve sua senha resetada com sucesso!');
        } else {
            $this->session->set_flashdata('flashError', 'Não foi possivel realizar a operação!');
        }
        redirect(base_url());
    }

    public function new()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if ($_SESSION["role"] == 2) {
            redirect("amostras");
        }

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('gerenciar_usuarios/new');
    }

    //metodos que vao mexer em uma view q tem q estar na pasta perfil_usuario
    public function carregar_perfil()
    {
    }

    public function atualizar_perfil()
    {
    }

    public function update($user_id)
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $usuario['name'] = $this->input->post('name');
        $usuario['role'] = $this->input->post('role');
        $query = $this->User_Model->update($usuario, $user_id);
    // update do usuario na tela de gerenciar usuarios
        $this->session->set_flashdata('success', 'Usuário Atualizado com Sucesso!');
        redirect('usuarios');
    }

    public function list()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if ($_SESSION["role"] == 2) {
            redirect("amostras");
        }

        $query['usuario'] = $this->User_Model->getAll();

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('gerenciar_usuarios/list', $query);
    }
    // Recuperar senha
    public function insert()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if ($_SESSION["role"] == 2) {
            redirect("amostras");
        }
        $user['name']           = $this->input->post('name');
        $user['email']          = $this->input->post('email');
        $user['password']       = $this->input->post('password');
        $user['role']           = $this->input->post('role');

        if ($this->User_Model->getUserByEmail($user['email']) != null) {
            $this->session->set_flashdata('danger', 'Já existe um usuário com este email!');
            redirect('usuario/criar/');
        }

        $this->User_Model->insert_user($user); $this->session->set_flashdata('success', 'Usuário cadastrado com sucesso!');
         redirect('usuarios');
    }

    // Recuperar senha
    public function recuperar_senha()
    {
        $email = $this->input->post('email');
        $data = $this->User_Model->reset_user_password($email);
        if ($data) {
            $this->session->set_flashdata('flashSuccess', 'O usuario de email: ' . $email . ' teve sua senha resetada com sucesso!');
        } else {
            $this->session->set_flashdata('flashError', 'Não foi possivel realizar a operação!');
        }
        redirect(base_url());
    }

    // Edit 
    public function edit($user_id)
    {

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if ($_SESSION["role"] == 2) {
            redirect("amostras");
        }
        $data['usuario'] = $this->User_Model->get($user_id);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('gerenciar_usuarios/edit', $data);
    }

    // update 
    public function saveUpdateUser()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $postData['name'] = $this->input->post('name');
        $postData['user_id'] = $this->input->post('user_id');
        $_SESSION['name'] = $postData['name'];
        $this->db->where('user_id', $postData['user_id']);
        if ($this->db->update('user', $postData)) {
            $this->session->set_flashdata('success', 'User has been updated created!');
        }
        $this->session->set_flashdata('success', 'Usuario atualizado com sucesso!');
        redirect('usuarios');
    }

    public function login()
    {
        $postData = $this->input->post();

        if (($postData) == null) {
            redirect(base_url());
        }
        $validate = $this->User_Model->validate_login($postData);
        if ($validate) {
            $newdata = array(
                'email'     => $validate[0]->email,
                'name' => $validate[0]->name,
                'role' => $validate[0]->role,
                'user_id' => $validate[0]->user_id,
                'logged_in' => TRUE,
            );
            $_SESSION['role'] = $validate[0]->role;
            $_SESSION['user_id'] = $validate[0]->user_id; // variavel global
            $this->session->set_userdata($newdata);

            // Se for Professor ou aluno vai pra essa pagina e se for administrador
            // vai pra pagina de manipular contas, obs: n pode deixar o
            // administrador acessar outras telas por meio da url por exemplo
            redirect(base_url("amostras")); //routes
        } else {
            $data = array('alert' => true);
            $this->load->view('login', $data);
            $this->session->set_flashdata('flashError', 'the email or password is incorrect!');
        }
    }

    // update 
    public function saveSenha()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $postData['user_id'] = $this->input->post('user_id');
        $postData['password'] = md5($this->input->post('password'));
        $this->db->where('user_id', $postData['user_id']);
        if ($this->db->update('user', $postData)) {
            $this->session->set_flashdata('userUpdate', 'User has been updated created!');
        }
        redirect('usuarios');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function delete($user_id)
    {
        // if (!$this->session->userdata('logged_in')) {
        //     redirect(base_url());
        // }
       
        $query = $this->User_Model->delete($user_id);
    }

    public function update_meu_perfil()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        $postData['password'] = md5($this->input->post('password'));
        $postData['name'] = $this->input->post('name');
        $this->db->where('user_id', $_SESSION['user_id']);
        if ($this->db->update('user', $postData)) {
            $_SESSION['name'] = $postData['name'];
            $this->session->set_flashdata('error', 'Usuario foi alterado');
        }
        redirect('meu_perfil');
    }

    public function meu_perfil()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        
        if ($_SESSION["role"] == 0) {
            $this->session->set_flashdata('danger', 'O Administrador não pode mudar suas credencias!');
            redirect("usuarios");
        }

        $data['usuario'] = $this->User_Model->get($_SESSION['user_id']);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('meu_perfil/edit', $data);
    }
}