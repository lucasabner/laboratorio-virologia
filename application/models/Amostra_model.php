<?php
class Amostra_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($amostra_id)
	{
		$query = $this->db->get_where('amostra', array('amostra_id' => $amostra_id));
		return $query->row_array();
	}
	
	public function getAmostraQtd($amostra_qtd_id)
	{
		$query = $this->db->get_where('amostra_qtd', array('amostra_qtd_id' => $amostra_qtd_id));
		return $query->row_array();
	}
	
	public function getAllQtd($amostra_id)
	{
		$query = $this->db->get_where('amostra_qtd', array('amostra_id' => $amostra_id));
		return $query->result();
	}

	public function getAll()
	{
		$query = $this->db->get('amostra');
		return $query->result();
	}

	public function insert($amostra)
	{
		$this->db->insert('amostra', $amostra);
		return $this->db->insert_id(); // retorna id inserido
	}

	public function update($amostra, $amostra_id)
	{
		$this->db->where('amostra.amostra_id', $amostra_id);
		return $this->db->update('amostra', $amostra);
	}

	public function delete($amostra_id)
	{
		$this->db->where('amostra.amostra_id', $amostra_id);
		return $this->db->delete('amostra');
	}

	public function deleteAmostraQtd($amostra_id)
	{
		$this->db->where('amostra_qtd.amostra_id', $amostra_id);
		return $this->db->delete('amostra_qtd');
	}

	public function deleteExame($amostra_id)
	{
		$this->db->where('exame.amostra_id', $amostra_id);
		return $this->db->delete('exame');
	}

	public function deleteVacina($amostra_id)
	{
		$this->db->where('vacina.amostra_id', $amostra_id);
		return $this->db->delete('vacina');
	}

	function updateAmostraQtd($amostra_qtd, $amostra_id)
	{
		$this->db->trans_start();

		$result = array();
		$this->db->delete('amostra_qtd', array('amostra_id' => $amostra_id));

		if ($amostra_qtd != null) {

			for ($j = 0; $j < count($amostra_qtd); $j++) {
					$result[] = array(
						'identificador' => $_POST['identificador'][$j],
						'amostra_id' => $amostra_id,
					);
			}
			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('amostra_qtd', $result);
		}
		$this->db->trans_complete();
		return $result;
	}
	
}