<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Exame extends CI_Controller
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
       
        //$this->lang->load('btn', 'english');
        //$this->lang->load('btn','portuguese-brazilian');
        //$this->lang->load('communication-item_lang', 'english');
        //$this->lang->load('communication-item','portuguese-brazilian');

        // if (!$this->session->userdata('logged_in')) {
        //     redirect(base_url());
        // }

        $this->load->model('Exame_model');
        $this->load->helper('exame');
        $this->load->model('Log_model');
        $this->load->model('Amostra_model');
    }


    public function list($amostra_id)
    {
        $query['exame'] = $this->Exame_model->getAll($amostra_id);
        $query['amostra_id'] = $amostra_id;

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('exame/list', $query);
    }

    public function new($amostra_id)
    {
        $query['tecnica'] = $this->Exame_model->getAlltecnica();
        $query['tecnica_tratamento'] = $this->Exame_model->getAllTecnicaTratamento();
        $query['amostra_id'] = $amostra_id;

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('exame/new', $query);
    }

    // public function edit($exame_id)
    // {
    //     $query['tecnica'] = $this->Exame_model->getAlltecnica();
    //     $query['tecnica_tratamento'] = $this->Exame_model->getAllTecnicaTratamento();
    //     $query['exame'] = $this->Exame_model->get($exame_id);

    //     $this->load->view('frame/header_view');
    //     $this->load->view('frame/topbar');
    //     $this->load->view('frame/sidebar_nav_view');
    //     $this->load->view('exame/edit', $query);
    // }

    public function insert($amostra_id)
    {
        $exame['tecnica_tratamento_id'] = $this->input->post('Concelho');
        $exame['amostra_id'] = intval($amostra_id);
        $exame['valor'] = getValor($exame['tecnica_tratamento_id']);
        insertLogActivity('insert', 'Exame');
        $query = $this->Exame_model->insert($exame);
        $amostra['status'] = 5;
        $query = $this->Amostra_model->update($amostra, $amostra_id);
        $this->session->set_flashdata('success', 'Exame Cadastrado com sucesso!');
        
        redirect('exames/'.  $amostra_id);
    }

    // public function update($amostra_id,$exame_id)
    // {
    //     $exame['tecnica_tratamento_id'] = $this->input->post('Concelho');
    //     // var_dump($exame);
    //     $exame['amostra_id'] = intval($amostra_id);
    //     $exame['valor'] = $this->input->post('valor');
    //     $query = $this->Exame_model->update($exame,$exame_id);
        
    //     $this->session->set_flashdata('error', 'Exame Atualizado com sucesso!');
    //     insertLogActivity('update', 'Exame');
    //     redirect('exames/'.  $amostra_id);
     
    // }
    
    public function delete($exame_id)
    {
        $amostra['status'] = 5;
        $query = $this->Amostra_model->update($amostra, getAmostraIdByExame($exame_id));
        insertLogActivity('delete', 'Exame');
        $query = $this->Exame_model->delete($exame_id);
        $query2 = $this->Exame_model->deleteResultado_Exame($exame_id);
    }

    
    public function resultado($exame_id, $amostra_id)
    {
        $query['tecnica'] = $this->Exame_model->getAlltecnica();
        $query['tecnica_tratamento'] = $this->Exame_model->getAllTecnicaTratamento();
        $query['amostra_qtd'] = $this->Amostra_model->getAllQtd($amostra_id);
        $query['exame'] = $this->Exame_model->get($exame_id);
        $query['amostra_id'] = $amostra_id;

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('exame/resultado', $query);
    }

    public function update_resultado($exame_id, $amostra_id)
    {
        $resultado['amostra_qtd_id'] = $this->input->post('amostra_qtd_id');
        $resultado['resultado'] = $this->input->post('resultado');
        $resultado['exame_id'] = $exame_id;
      
        $amostra['status'] = 5;
        $query = $this->Amostra_model->update($amostra, $amostra_id);
        $query2 = $this->Exame_model->updateResultado($resultado, $exame_id);
        $this->session->set_flashdata('error', 'Resultado do Exame Atualizada com sucesso!');
        redirect('exame/resultado/'.$exame_id ."/". $amostra_id );
    }

    public function list_exames_valor()
    {
        $query['exames_valor'] = $this->Exame_model->getAllTecnicaTratamento();

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('cobrancas/list', $query);
    }

    public function edit_exames_valor($tecnica_tratamento_id)
    {
        $query['exames_valor'] = $this->Exame_model->getExamesValor($tecnica_tratamento_id);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('cobrancas/edit', $query);
    }

    public function update_exames_valor($tecnica_tratamento_id)
    {
        $exames_valor['valor'] = $this->input->post('valor');
        $query = $this->Exame_model->updateExamesValor($exames_valor,$tecnica_tratamento_id);
        
        $this->session->set_flashdata('error', 'Valor do Exame Atualizado com sucesso!');
        insertLogActivity('update', 'Cobranças dos Exames');
        redirect('exames_valor');
    }


   
}
