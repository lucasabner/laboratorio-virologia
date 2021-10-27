<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Amostra extends CI_Controller
{

    public function __Construct()
    {
        parent::__Construct();

        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if ($_SESSION["role"] == 0) {
            redirect("usuarios");
        }
        $this->load->helper('generic');
        $this->load->model('Amostra_model');
        $this->load->model('Log_model');
        $this->load->model('Vacina_model');
    }

    public function list()
    {
        $query['amostra'] = $this->Amostra_model->getAll();

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('amostra/list', $query);
    }

    public function new()
    {
        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('amostra/new');
    }

    public function edit($amostra_id)
    {
        $query['amostra'] = $this->Amostra_model->get($amostra_id);
        $query['amostra_qtd'] = $this->Amostra_model->getAllQtd($amostra_id);

        $this->load->view('frame/header_view');
        $this->load->view('frame/topbar');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('amostra/edit', $query);
    }

    public function insert()
    {
       
        date_default_timezone_set('America/Sao_paulo');
        $amostra['data_registro'] = date('Y-m-d');

        $amostra['status'] = '1';
        $amostra['encaminhamento'] = $this->input->post('encaminhamento');
        $amostra['formaenvio'] = $this->input->post('formaenvio');
        $amostra['especie'] = $this->input->post('especie');
        $amostra['materialrecebido'] = $this->input->post('materialrecebido');
        $amostra['acondicionamento'] = $this->input->post('acondicionamento');
        $amostra['condicaomaterial'] = $this->input->post('condicaomaterial');
        $amostra['data'] = $this->input->post('data');
        $amostra['observacao'] = $this->input->post('observacao');

        // $this->input->post('data'), esse nome é pego de <input name="data"> ou textarea tbm, mais sempre um post pega os itens dentro de um <form> a partir de um name e não de um id
        //dados do proprietario
        $amostra['nomeproprietario'] = $this->input->post('nomeproprietario');
        $amostra['cepproprietario'] = $this->input->post('cepproprietario');
        $amostra['emailproprietario'] = $this->input->post('emailproprietario');
        $amostra['enderecoproprietario'] = $this->input->post('enderecoproprietario');
        $amostra['cidadeproprietario'] = $this->input->post('cidadeproprietario');
        $amostra['estadoproprietario'] = $this->input->post('estadoproprietario');
        $amostra['telefoneproprietario'] = $this->input->post('telefoneproprietario');
        $amostra['observacaoproprietario'] = $this->input->post('observacaoproprietario');

        //dados do veterinario
        $amostra['nomeveterinario'] = $this->input->post('nomeveterinario');
        $amostra['crmvveterinario'] = $this->input->post('crmvveterinario');
        $amostra['emailveterinario'] = $this->input->post('emailveterinario');
        $amostra['telefoneveterinario'] = $this->input->post('telefoneveterinario');
        $amostra['observacaoveterinario'] = $this->input->post('observacaoveterinario');

        //dados clinicos
        $amostra['propriedade'] = $this->input->post('propriedade');
        $amostra['totalanimais'] = $this->input->post('totalanimais');
        $amostra['animaisacometidos'] = $this->input->post('animaisacometidos');
        $amostra['criacao'] = $this->input->post('criacao');
        $amostra['suspeita'] = $this->input->post('suspeita');
        $amostra['observacaoclinica'] = $this->input->post('observacaoclinica');

        // Use esse codigo abaixo alterando o valor entre parentes para rastrear erros, jogue qualquer variavel ali e vai retornar oq ela ta armazenando
        // var_dump($this->input->post('identificador'));exit;die;
        $query = $this->Amostra_model->insert($amostra);
        if($amostra['encaminhamento'] == 0){
            $vacina['amostra_id'] = $query;
            $this->Vacina_model->insert($vacina);
        }
        insertLogActivity('insert', 'Amostra');
        $query2 = $this->Amostra_model->updateAmostraQtd($this->input->post('identificador'), $query);

        $this->session->set_flashdata('success', 'Amostra Cadastrada com sucesso!');
        redirect('amostras');
    }
    public function update($amostra_id)
    {
        //dados da amostra
        // $amostra['status'] = '1';
        //$amostra['encaminhamento'] = $this->input->post('encaminhamento');
        $amostra['formaenvio'] = $this->input->post('formaenvio');
        $amostra['especie'] = $this->input->post('especie');
        $amostra['materialrecebido'] = $this->input->post('materialrecebido');
        $amostra['acondicionamento'] = $this->input->post('acondicionamento');
        $amostra['condicaomaterial'] = $this->input->post('condicaomaterial');
        $amostra['data'] = $this->input->post('data');
        $amostra['observacao'] = $this->input->post('observacao');

        //dados do proprietario
        $amostra['nomeproprietario'] = $this->input->post('nomeproprietario');
        $amostra['cepproprietario'] = $this->input->post('cepproprietario');
        $amostra['emailproprietario'] = $this->input->post('emailproprietario');
        $amostra['cidadeproprietario'] = $this->input->post('cidadeproprietario');
        $amostra['enderecoproprietario'] = $this->input->post('enderecoproprietario');
        $amostra['estadoproprietario'] = $this->input->post('estadoproprietario');
        $amostra['telefoneproprietario'] = $this->input->post('telefoneproprietario');
        $amostra['observacaoproprietario'] = $this->input->post('observacaoproprietario');

        //dados do veterinario
        $amostra['nomeveterinario'] = $this->input->post('nomeveterinario');
        $amostra['crmvveterinario'] = $this->input->post('crmvveterinario');
        $amostra['emailveterinario'] = $this->input->post('emailveterinario');
        $amostra['telefoneveterinario'] = $this->input->post('telefoneveterinario');
        $amostra['observacaoveterinario'] = $this->input->post('observacaoveterinario');

        //dados clinicos
        $amostra['propriedade'] = $this->input->post('propriedade');
        $amostra['totalanimais'] = $this->input->post('totalanimais');
        $amostra['animaisacometidos'] = $this->input->post('animaisacometidos');
        $amostra['criacao'] = $this->input->post('criacao');
        $amostra['suspeita'] = $this->input->post('suspeita');
        $amostra['observacaoclinica'] = $this->input->post('observacaoclinica');

        $query = $this->Amostra_model->update($amostra, $amostra_id);
        insertLogActivity('update', 'Amostra');
        $query2 = $this->Amostra_model->updateAmostraQtd($this->input->post('identificador'), $amostra_id);
        $this->session->set_flashdata('error', 'Amostra Atualizada com sucesso!');
        redirect('amostras');
    }
    public function delete($amostra_id)
    {
        $query = $this->Amostra_model->delete($amostra_id);
        insertLogActivity('delete', 'Amostra');
        $query2 = $this->Amostra_model->deleteAmostraQtd($amostra_id);
        if ($query && $query2) {
            redirect('amostras');
        }
    }
}