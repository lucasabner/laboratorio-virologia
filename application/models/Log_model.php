<?php
class Log_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// adapta essa model aqui pra nossa aplicaçãoo

	public function insert($log)
	{
		return $this->db->insert('log', $log);
	}

	public function getAllLogActivity($project_id)
	{
		$query = $this->db->get_where('log_activity', array('log_activity.project_id' => $project_id));
		return $query->result();
	}
	public function getAll()
	{
		$query = $this->db->get('log');
		return $query->result();
	}


	public function getAllActivity($project_id)
	{
		$query = $this->db->get_where('activity', array('activity.project_id' => $project_id));
		return $query->result();
	}

	public function insertNotification($amostra_id, $user)

	{
		$notification['user_id'] = $user;
		$notification['notification'] = 1;
		$notification['amostra'] = $project_id;

		return $this->db->insert('log_notification', $notification);

	}
}