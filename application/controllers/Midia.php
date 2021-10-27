<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Midia extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Amostra_model');
        $this->load->model('Log_model');
    }

    public function index()
    {
        $this->load->view('upload/index');
    }

    function do_upload()
    {
        $image = basename($_FILES['midia']['name']);
        $image = str_replace(' ', '|', $image);
        $type = explode(".", $image);
        $type = $type[count($type) - 1];
        if ($_FILES['midia']['size'] < 10000000) {
            if (in_array($type, array('jpg', 'jpeg', 'png', 'gif', 'PNG', 'pdf', 'mp4', 'mkv'))) {
                $tmppath = "upload/" . $image;
                if (is_uploaded_file($_FILES["midia"]["tmp_name"])) {
                    move_uploaded_file($_FILES['midia']['tmp_name'], $tmppath);
                    return $tmppath;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function image_delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('upload');

        // redirect('amostras/editar/midias/'.  $amostra_id);
    }


    function upload()
    {
        $data['path'] = $this->do_upload();
        $data['amostra_id'] = $this->input->post('amostra_id');
        $data['alt'] = $this->input->post('alt');
        // $this->session->set_userdata('previous_url', current_url());
        // echo "<script>window.location.href='javascript:history.back(-1);'</script>";
        // echo json_encode($data);
        // $this->session->set_flashdata('update', 'Amostra Atualizada com sucesso!');
        $this->db->insert('upload', $data);
        $this->session->set_flashdata('success', 'Mídia Cadastrada com sucesso!');
        $this->session->set_userdata('previous_url', current_url());
        insertLogActivity('insert', 'Midia');

        redirect('Midia/editar/' .  $data['amostra_id']);


        // echo "<script>window.location.href='javascript:history.back(-2);'</script>";
    }

    public function editar($amostra_id)
    {
        // $query['amostra'] = $this->Amostra_model->get($amostra_id);
        $query['amostra'] = $this->Amostra_model->get($amostra_id);
        $query['amostra_id'] = $amostra_id;

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('amostra/midia', $query);
    }
}
