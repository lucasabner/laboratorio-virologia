<?php

defined('BASEPATH') or exit('No direct script access allowed');



class User_Model extends CI_Model
{


	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	private $User = 'user';


	function validate_email($postData)
	{
		$this->db->where('email', $postData['email']);
		// $this->db->where('status', 1);
		$this->db->from('user');
		$query = $this->db->get();

		if ($query->num_rows() == 0)
			return true;
		else
			return false;
	}

	function insert_user($postData)
	{

		$validate = $this->validate_email($postData);

		if ($validate) {
			$password = $this->generate_password();
			$data = array(
				'email' => $postData['email'],
				'name' => $postData['name'],
				'role' => $postData['role'],
				'password' => md5($password)
				// 'created_at' => date('Y\-m\-d\ H:i:s A'),
			);

			$this->db->insert('user', $data);

			$message = "Aqui estão os detalhes de sua conta:<br><br>Email: " . $postData['email'] . "<br>Senha temporária: " . $password . "<br>Por favor mude sua senha após o login.<br><br> Você pode acessar sua conta em:" . base_url() . ".";
			$subject = "Nova conta criada";
			$this->send_email($message, $subject, $postData['email']);

			$module = "User Management";
			$activity = "add new user " . $postData['email'];

			return array('status' => 'success', 'message' => '');
		} else {
			return array('status' => 'exist', 'message' => '');
		}
	}

	public function getUserByEmail($email)

	{
		$query = $this->db->get_where('user', array('email' => $email));
		return $query->row_array();
		
	}


	function reset_user_password($email)
	{

		$password = $this->generate_password();
		$data = array(
			'password' => md5($password),
		);

		$this->db->select('user_id');
		$this->db->from('user');
		$this->db->where("email", $email);
		$this->db->limit(1);
		$query = $this->db->get();
		$query2 = $query->row_array();
		$id = $query2['user_id'];

		if ($id != null) {
			$this->db->where('user.user_id', $id);
			$this->db->update('user', $data);

			$message = "Sua senha foi resetada<br><br>Email: " . $email . "<br>Nova Senha: " . $password . "<br>Se desejar, altere sua senha após o login.<br><br> Voce pode fazer o login através de " . base_url() . ".";
			$subject = "Senha Resetada";
			return $this->send_email($message, $subject, $email);
		}
		return false;
		// $module = "User Management";
		// $activity = "reset user ".$email."`s password";
		// $this->insert_log($activity, $module);
		// return array('status' => 'success', 'message' => '');

	}

	function generate_password()
	{
		$chars = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ023456789!@#$%^&*()_=";
		$password = substr(str_shuffle($chars), 0, 10);

		return $password;
	}


	function send_email($message, $subject, $sendTo)
	{
		require_once APPPATH . 'libraries/mailer/class.phpmailer.php';
		require_once APPPATH . 'libraries/mailer/class.smtp.php';
		// require_once APPPATH.'libraries/mailer/mailer_config.php';
		include APPPATH . 'libraries/mailer/template/template.php';
		$dispatcher       = array(
			"smtp_prefix"   => "smtp", //Apenas o prefixo, ex: smtp, caso: smtp.dominio.com.br
			"port"          => "465",
			"subject"       => $subject, //Assunto do e-mail
			"from"          => "jvtesterp@gmail.com", //Email remetente
			"from_name"     => "Administrador do Sistema LV", //Nome do remetente
			"from_password" => "testeRP1234", //Senha rementente
			"to"            => $sendTo
		); //Destinatario

		$mail = new PHPMailer(true);
		$mail->IsSMTP();

		$mail->SMTPDebug = 0;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "{$dispatcher["smtp_prefix"]}." . substr(strstr($dispatcher["from"], '@'), 1);;
		$mail->Port = $dispatcher["port"];
		$mail->Username =  $dispatcher["from"];
		$mail->Password = $dispatcher["from_password"];
		$mail->SetFrom($dispatcher["from"], $dispatcher["from_name"]);
		$mail->Subject = $dispatcher["subject"];
		$mail->MsgHTML($message);
		$mail->AddAddress($dispatcher["to"]);
		$mail->CharSet = "UTF-8";
		$mail->WordWrap = 0;


		$hello = '<h1 style="color:#333;font-family:Helvetica,Arial,sans-serif;font-weight:300;padding:0;margin:10px 0 25px;text-align:center;line-height:1;word-break:normal;font-size:33px;letter-spacing:-1px">Caro Usuario,</h1>';
		$thanks = "<br><br><i>Este é um email gerado automaticamente, favor não responder!</i><br/><br/>Atenciosamente,<br/>Administração<br/><br/>";

		$body = $hello . $message . $thanks;
		$mail->Body = $header . $body . $footer;
		$mail->AddAddress($sendTo);

		if (!$mail->Send()) {
			// $error = 'Mail error: '.$mail->ErrorInfo;
			// return array('status' => false, 'message' => $error);
			return false;
		} else {
			// return array('status' => true, 'message' => '');
			return true;
		}
	}

	function validate_login($postData){
		if ($postData['password'] == null || $postData['email'] == null) {
			return false;
		}
		$this->db->select('*');
		$this->db->where('email', $postData['email']);
		$this->db->where('password', md5($postData['password']));
		// $this->db->where('status', 1);
		$this->db->from('user');
		$query = $this->db->get();
		if ($query->num_rows() == 0)
			return false;
		else
			return $query->result();
	}


	public function get($user_id)
	{
		$query = $this->db->get_where('user', array('user_id' => $user_id));
		return $query->row_array();
	}

	public function getAll()
	{
		$query = $this->db->get('user');
		return $query->result();
	}

	public function delete($user_id)
	{
		$this->db->where('user.user_id', $user_id);
		return $this->db->delete('user');
	}

	public function update($usuario, $usuario_id){
		$this->db->where('user.user_id', $usuario_id);
		return $this->db->update('user', $usuario);
	}





	// Outros exemplos de metodos, não estao sendo utilizados

	public function UpdateProfileImageByID($data){
		$res = $this->db->update($this->User, $data, ['id' => $this->session->userdata['Admin']['id']]);

		if ($res == 1)

			return true;

		else

			return false;
	}


	public function UpdateCustomerProfileImageByID($data)

	{

		$res = $this->db->update($this->User, $data, ['id' => $this->session->userdata['User']['id']]);

		if ($res == 1)

			return true;

		else

			return false;
	}


	public function GetMemberNameById($project_id)

	{

		$this->db->select('id,name');

		$this->db->from($this->User);

		$this->db->where("id", $project_id);

		$this->db->limit(1);

		$query = $this->db->get();

		$u = $query->row_array();

		return $u['name'];
	}


	function get_user_list()
	{
		$this->db->select('*');
		$this->db->from('user');
		// $this->db->where('status', 1);
		$query = $this->db->get();
		return $query->result();
	}

	function get_user_by_id($userID)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user_id', $userID);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_user_name($userID)
	{
		$this->db->select('user_id,name');
		$this->db->from('user');
		$this->db->where("user_id", $userID);
		$this->db->limit(1);
		$query = $this->db->get();
		$res = $query->row_array();
		return $res['name'];
	}

}