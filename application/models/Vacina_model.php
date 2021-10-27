<?php
class Vacina_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function updateQualityCheckItem($check_item, $quality_checklist_id)
	{
		$this->db->trans_start();
		// var_dump($quality_checklist_id);exit;
		$result = array();
		$this->db->delete('quality_checklist_item', array('quality_checklist_id' => $quality_checklist_id));
		if ($check_item['status'][0] != null) {
			for ($j = 0; $j < count($check_item) / 3; $j++) {
				for ($i = 0; $i < count($check_item['comments']); $i++) {
					$result[] = array(
						'status' => $check_item['status'][$i],
						'comments' => $check_item['comments'][$i],
						'item_check' => $check_item['item_check'][$i],
						'quality_checklist_id' => $quality_checklist_id,
					);
				}
			}

			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('quality_checklist_item', $result);
		}
		$this->db->trans_complete();
		return $result;
	}

	public function update($vacina, $vacina_id)
	{
		$this->db->where('vacina.vacina_id', $vacina_id);
		return $this->db->update('vacina', $vacina);
	}

	public function get($amostra_id)
	{
		$query = $this->db->get_where('vacina', array('amostra_id' => $amostra_id));
		return $query->row_array();
	}

	public function insert($amostra_id)
	{
		return $this->db->insert('vacina', $amostra_id);
	}

	public function delete($vacina_id)
	{
		$this->db->where('vacina.vacina_id', $vacina_id);
		return $this->db->delete('vacina');
	}

}
