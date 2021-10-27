<?php

function getResultado($exame_id, $amostra_qtd_id){
	$obj = &get_instance();
	$obj->load->model('Exame_model');

	$data1 = $obj->Exame_model->getResultado($exame_id, $amostra_qtd_id); // id dele, id da tecnica. id tratamento
	if ($data1 == null) {
		return "";
	} else {
		return $data1["resultado"];
	}
}
function retornaCabecalho()
{
	return <<<EOD
	<h6 align="center">LABORATÓRIO DE VIROLOGIA</h6>
        <font align="center" size="10">Curso de Medicina Veterinária</font>
        <br/><font align="center" size="10">Casa 4, Campus Uruguaiana, UNIPAMPA</font>
        <br/><font align="center" size="10">BR 472, km 592, CEP 97.500-008. Uruguaiana, RS</font>
        <br/><font align="center" size="10">e-mail para contato: <link href='#'>mario.brum@unipampa.edu.br</link></font>
</br>
EOD;
}

function retornaDadosProprietario($amostra)
{
	extract($amostra);
	return <<<EOD
	<h6><i>Dados do Cliente</i></h6>
<br/><font align="left" size="10">Proprietário: $nomeproprietario </font>
<br/><font align="left" size="10">Endereço: $enderecoproprietario</font>
<br/><font align="left" size="10">Cidade: $cidadeproprietario </font>
<font size="10">Fone: $telefoneproprietario</font>
EOD;
}

function retornaIdentificacaoAmostra($amostra)
{
	extract($amostra);
	return <<<EOD
<h6><i>Identificação da amostra</i> </h6>
<font align="left" size="10">Responsável pela coleta: $nomeveterinario</font>
<font align="center" size="10">Data: $data</font>
<font align="left" size="10">Material: $materialrecebido</font> 
<br /> <font align="left" size="10">Espécie: $especie</font> 
<font align="left" size="10">Recebimento: $data</font> <font align="left" size="10">Finalização da Análise: $data</font>
EOD;
}


function getExameResultados($exame_id)
{
	$obj = &get_instance();
	$obj->load->model('Exame_model');

	$data1 = $obj->Exame_model->getAllResultados($exame_id);
	return $data1;
}

function getIdentificadorAmostraQtd($amostra_qtd_id)
{
	$obj = &get_instance();
	$obj->load->model('Exame_model');

	$data1 = $obj->Exame_model->getAmostraQtd($amostra_qtd_id);
	return $data1['identificador'];
}





function retornaResultadosExame($exames)
{
	$exame = "";

	foreach ($exames as $a) {
		$resultados = getExameResultados($a->exame_id);
		foreach ($resultados as $r) {
			$identificador = getIdentificadorAmostraQtd($r->amostra_qtd_id);
			$resultado = $r->resultado;
			$tecnica = getTecnicaById($a->tecnica_tratamento_id);
			$tratamento = getTratamentoById($a->tecnica_tratamento_id);
			$resultado = $r->resultado;
			$exame = $exame . <<<EOD

<style type="text/css">
	.tg {
		border-collapse: collapse;
		border-spacing: 0;
		border-color: #93a1a1;
	}

	.tg td {
		font-family: Arial, sans-serif;
		font-size: 14px;
		padding: 10px 5px;
		border-style: solid;
		border-width: 1px;
		overflow: hidden;
		word-break: normal;
		border-color: #93a1a1;
		color: #002b36;
		background-color: #fdf6e3;
	}

	.tg th {
		font-family: Arial, sans-serif;
		font-size: 14px;
		font-weight: normal;
		padding: 10px 5px;
		border-style: solid;
		border-width: 1px;
		overflow: hidden;
		word-break: normal;
		border-color: #93a1a1;
		color: #fdf6e3;
		background-color: #657b83;
	}
	

	.tg .tg-cly1 {
		text-align: left;
		vertical-align: middle
	}

	.tg .tg-alz1 {
		background-color: #eee8d5;
		text-align: left;
		vertical-align: top
	}
</style>
<table border="1" cellspacing="0" cellpadding="5">
	<tr>
		<th>
			<font size="10">$identificador </font>
		</th>
		<th width="205">
			<font size="10">$tecnica</font>
		</th>
		<th>
			<font size="10">$tratamento</font>
		</th>
		<th>
			<font size="10">$resultado</font>
		</th>
	</tr>

</table>
<br />

EOD;
		}
	}
	return $exame;
}

function sessionAmostra($id)
{
	$_SESSION['amostra_id'] = $id;
}
function formatPropriedade($propiedade)
{
	switch ($propiedade) {
		case 0:
			return 'Rural';
		case 1:
			return 'Haras';
		case 2:
			return 'Granja';
		case 3:
			return 'Canil';
		case 4:
			return 'Não se Aplica';
	}
}
function formatEspecie($especie = '')
{
	switch ($especie) {
		case 0:
			return 'Bovina';
		case 1:
			return 'Equina';
		case 2:
			return 'Ovina';
		case 3:
			return 'Suína';
		case 4:
			return 'Canina';
		case 5:
			return 'Felina';
		case 6:
			return	'Selvagens';
		case 7:
			return 	'Morcegos';
		case 8:
			return 'Outro';
	}
}
function formatMaterial($material)
{
	switch ($material) {
		case 0:
			return 'Sangue Total';
		case 1:
			return 'Soro';
		case 2:
			return 'Crostas';
		case 3:
			return 'Neoplasias';
		case 4:
			return 'Tecidos';
		case 5:
			return 'Swab Nasal';
		case 6:
			return	'Swab Ocular';
		case 7:
			return 	'Swab de Vesículas/Lesões';
		case 8:
			return 'Outro';
	}
}
function formatAcondicionamento($acondicionamento)
{
	switch ($acondicionamento) {
		case 0:
			return 'Refrigerada';
		case 1:
			return 'Congelada';
		case 2:
			return 'Temperatura ambiente';
		case 3:
			return 'Formol';
		case 4:
			return 'Parafinizada';
		case 5:
			return 'Outro';
	}
}
function formatMaterialCondicao($condicaomaterial)
{
	switch ($condicaomaterial) {
		case 0:
			return 'Bem';
		case 1:
			return 'Hemolisado';
		case 2:
			return 'Coagulado';
		case 3:
			return 'Putrefação';
		case 4:
			return 'Swab Seco';
		case 5:
			return 'Descongelado';
		case 6:
			return 'Outro';
	}
}
function formatarData($data)
{
	return date("d/m/Y", strtotime($data));
}
function formatEnvio($formaenvio)
{
	switch ($formaenvio) {
		case 0:
			return 'Correios';
		case 1:
			return 'Rodoviária';
		case 2:
			return 'Tranposrtadora';
		case 3:
			return 'Entrega Laboratório';
	}
}
function email_exists($email)
{
	$obj = &get_instance();
	$obj->load->model('Admin_model');

	$data2 = $obj->Exame_model->getUserByEmail($email);
	if ($data2 != null) {
		return true;
	}
	return false;
}
function formatTipoCriacao($tipoCriacao)
{
	switch ($tipoCriacao) {
		case 0:
			return 'Intensiva';
		case 1:
			return 'Extensiva';
		case 2:
			return 'Semiextensiva';
		case 3:
			return 'Aberta';
		case 4:
			return 'Fechada';
		case 5:
			return 'Não se aplica';
	}
}


function insertLogActivity($action_type, $funcionalidade)
{
	$obj = &get_instance();
	$obj->load->model('log_model');

	date_default_timezone_set('America/Sao_paulo');

	// isso é as informações padroes que vao ser salvas pra todos os registros
	// aqui no caso n precisa do project_id e nem do view_id
	// crie la no banco e aqui também uma 'funcionalidade', essa propiedade vai guardar o nome da tela(amostra ou exame)
	$log['action_type'] = $action_type;
	$log['date'] = date('Y-m-d');
	$log['time'] = date('H:i:s');
	$log['funcionalidade'] = $funcionalidade; // essa funicionalidade é uma string ou amostra ou exame
	// $log['project_id'] = $_SESSION['project_id'];
	// $log['view_id'] = $obj->view_model->GetIDByName($view_name);; n precisa disso
	$log['user_id'] = $obj->session->userdata('user_id');
	$log['ip_address'] = $obj->input->ip_address();

	// tipo de açoes possiveis, isso aqui pode deixar
	switch ($action_type) {
		case "insert":
			$midName = ' inseriu um novo registro de ';
			break;
		case "update":
			$midName = ' mudou algumas informações sobre ';
			break;
		case "delete":
			$midName = ' excluiu um registro de ';
			break;
	}
	// estrutura oq vai ser salvo no banco e como vai ser salvo
	// esse view name vai ser na verdade o $log['funcionalidade']
	$log['action'] =  $obj->session->userdata('name')  . $midName
		 . $log['funcionalidade'];

	// salva a ação no banco
	$obj->Log_model->insert($log);
}