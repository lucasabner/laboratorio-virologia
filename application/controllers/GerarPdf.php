<?php

class GerarPdf extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }
    }

    public function generatePdfAmostra($amostra_id){
           
        $this->load->library('Pdf');
        $this->load->model('Amostra_model');
        $this->load->model('Exame_model');
        
		$query['amostra'] = $this->Amostra_model->get($amostra_id);

        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Dados_Amostra');
	    $pdf->SetHeaderMargin(10);
	    $pdf->SetTopMargin(20);
	    $pdf->setFooterMargin(20);
	    $pdf->SetAutoPageBreak(true);
	    $pdf->SetAuthor('Author');
	    $pdf->SetDisplayMode('real', 'default');
	    $pdf->Write(5, 'SCA');
        $this->load->view('laudo/pdf_dados', $query);
    }

    public function generatePdfLaudo($amostra_id){
        $this->load->library('Pdf');
        $this->load->model('Amostra_model');
        $this->load->model('Exame_model');
        
		$query['amostra'] = $this->Amostra_model->get($amostra_id);
        $query['exame'] = $this->Exame_model->getAll($amostra_id);
        $query['tecnica'] = $this->Exame_model->getAllTecnica();
        
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('Laudo Virológico');
	    $pdf->SetHeaderMargin(10);
	    $pdf->SetTopMargin(20);
	    $pdf->setFooterMargin(20);
	    $pdf->SetAutoPageBreak(true);
	    $pdf->SetAuthor('Author');
	    $pdf->SetDisplayMode('real', 'default');
	    $pdf->Write(5, 'SCA');
        $this->load->view('laudo/pdf_laudo', $query);
    }

    public function generatePdf($amostra_id){
        $this->load->model('Amostra_model');
        $amostra['status'] = 6;
        $query = $this->Amostra_model->update($amostra, $amostra_id);
        // if($_POST['documento'] == 0){
            $this->generatePdfLaudo($amostra_id);
        // }else{
        //     $this->generatePdfAmostra($amostra_id);
        // }
    }
}