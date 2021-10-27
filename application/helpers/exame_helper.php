<?php 

	
	function getTratamentoById($id)
	{
		$obj = &get_instance();
		$obj->load->model('Exame_model');

		$data1 = $obj->Exame_model->getTecnica_Tratamento($id); // id dele, id da tecnica. id tratamento
		$data2 = $obj->Exame_model->getTratamento($data1["tratamento_id"]); // nome do tratamento e id dele
		return $data2["nome"];
	}

	function getAmostraIdByExame($id)
	{
		$obj = &get_instance();
		$obj->load->model('Exame_model');

		$data1 = $obj->Exame_model->get($id); 
		return $data1["amostra_id"];
	}

	function getValor($id)
	{
		$obj = &get_instance();
		$obj->load->model('Exame_model');

		$data1 = $obj->Exame_model->getTecnica_Tratamento($id); // id dele, id da tecnica. id tratamento
		return $data1["valor"];
	}
		
	function getTecnicaById($id)
	{
		$obj = &get_instance();
		$obj->load->model('Exame_model');
		
		$data1 = $obj->Exame_model->getTecnica_Tratamento($id);
		$data2 = $obj->Exame_model->getTecnica($data1["tecnica_id"]);
		return $data2["nome"];
	}
	
	
	function getIdTratamento($id)
	{
		$obj = &get_instance();
		$obj->load->model('Exame_model');

		$data1 = $obj->Exame_model->getTecnica_Tratamento($id); // id dele, id da tecnica. id tratamento
		//$data2 = $obj->Exame_model->getTratamento($data1["tratamento_id"]); // nome do tratamento e id dele
		return $data1["tratamento_id"];
	}

	function getIdTecnica($id)
	{
		$obj = &get_instance();
		$obj->load->model('Exame_model');

		$data1 = $obj->Exame_model->getTecnica_Tratamento($id); // id dele, id da tecnica. id tratamento
		//$data2 = $obj->Exame_model->getTratamento($data1["tratamento_id"]); // nome do tratamento e id dele
		return $data1["tecnica_id"];
	}

	function getDataRegistro($amostra_id)
	{
		$obj = &get_instance();
		$obj->load->model('Amostra_model');
	
		$data1 = $obj->Amostra_model->get($amostra_id); // id dele, id da tecnica. id tratamento
		return $data1["data_registro"];
	}
		


?>