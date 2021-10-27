<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Vacina extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
        
        if($_SESSION["role"] == 0){
            redirect("usuarios");
        }
       
       
        $this->load->model('Vacina_model');
        // $this->load->helper('exame');
        $this->load->model('Log_model');
        $this->load->model('Amostra_model');
    }

    public function edit($amostra_id)
    {
        $query['vacina'] = $this->Vacina_model->get($amostra_id);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('vacina/edit', $query);
    }


    public function update($amostra_id,$vacina_id)
    {
        $vacina['data_conclusao'] = $this->input->post('data_conclusao');
        $vacina['status'] = $this->input->post('status');
        $vacina['qtd_vacinas'] = $this->input->post('qtd_vacinas');
        $vacina['peso'] = $this->input->post('peso');
        $vacina['observacao'] = $this->input->post('observacao');
        $vacina['amostra_id'] = intval($amostra_id);

        $query = $this->Vacina_model->update($vacina,$vacina_id);
        $amostra['status'] = $this->input->post('status');
        $query = $this->Amostra_model->update($amostra, $amostra_id);
        $this->session->set_flashdata('error', 'Vacina Atualizada com sucesso!');
        
        insertLogActivity('update', 'Vacina');
        redirect('amostras');
     
    }

}
