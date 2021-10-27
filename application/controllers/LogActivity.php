<?php
class LogActivity extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
		// $this->load->helper('url');
		$this->load->model('Log_model');
	}

	public function index()
	{
		//	aqui no caso vai ser somente getAll, não precisa de filtro, tem q pegar tudo do banco
		
        $this->load->model('Log_model');
        $dado['log_list'] = $this->Log_model->getAll();
        
		$this->load->view('frame/header_view');
		$this->load->view('frame/topbar');
		$this->load->view('frame/sidebar_nav_view.php');
		$this->load->view('logs/LogActivity.php', $dado);
	}

}