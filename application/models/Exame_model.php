<?php
class Exame_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	function updateResultado($resultado,$exame_id)
	{
		$this->db->trans_start();

		$result = array();
		$this->db->delete('resultado_exame', array('exame_id' => $exame_id));

			// var_dump($resultado);
			// exit;
			for ($i = 0; $i < count($resultado) / 3; $i++) {
				for ($j = 0; $j < count($resultado['resultado']); $j++) {
					$result[] = array(
						'resultado' => $resultado['resultado'][$j],
						'amostra_qtd_id' => $resultado['amostra_qtd_id'][$j],
						'exame_id' => $resultado['exame_id'],
					);
				}
			}
			// var_dump($result);
			// exit;
			//MULTIPLE INSERT TO DETAIL TABLE
			$this->db->insert_batch('resultado_exame', $result);
		$this->db->trans_complete();
		return $result;
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
	public function getAllResultadoByExameId($exame_id){
		$query = $this->db->get_where('resultado_exame', array('exame_id' => $exame_id));
		return $query->result();
	}
	public function getResultado($exame_id, $amostra_qtd_id)
	{
		$query = $this->db->get_where('resultado_exame', array('exame_id' => $exame_id, 'amostra_qtd_id' => $amostra_qtd_id));
		return $query->row_array();
	}

	public function  getAmostraQtd($id)
	{
		$query = $this->db->get_where('amostra_qtd', array('amostra_qtd_id' => $id));
		return $query->row_array();
	}

	public function getAllResultados($exame_id)
	{
		$query = $this->db->get_where('resultado_exame', array('exame_id' => $exame_id));
		return $query->result();
	}

	public function getAllTecnica()
	{
		$query = $this->db->get('tecnica');
		return $query->result();
	}

	public function getTecnica_Tratamento($tecnica_tratamento_id)
	{
		$query = $this->db->get_where('tecnica_tratamento', array('tecnica_tratamento_id' => $tecnica_tratamento_id));
		return $query->row_array();
	}

	public function getTratamento($tratamento_id)
	{
		$query = $this->db->get_where('tratamento', array('tratamento_id' => $tratamento_id));
		return $query->row_array();
	}
	public function getTecnica($tecnica_id)
	{
		$query = $this->db->get_where('tecnica', array('tecnica_id' => $tecnica_id));
		return $query->row_array();
	}

	public function getAllTecnicaTratamento()
	{
		$query = $this->db->get('tecnica_tratamento');
		return $query->result();
	}

	public function update($exame, $exame_id)
	{
		$this->db->where('exame.exame_id', $exame_id);
		return $this->db->update('exame', $exame);
	}

	public function get($exame_id)
	{
		$query = $this->db->get_where('exame', array('exame_id' => $exame_id));
		return $query->row_array();
	}

	public function getAllQtd($exame_id)
	{
		$query = $this->db->get_where('exame_qtd', array('exame_id' => $exame_id));
		return $query->result();
	}

	public function getAll($amostra_id)
	{
		$query = $this->db->get_where('exame', array('amostra_id' => $amostra_id));
		return $query->result();
	}

	public function insert($exame)
	{
		return $this->db->insert('exame', $exame);
	}

	public function delete($exame_id)
	{
		$this->db->where('exame.exame_id', $exame_id);
		return $this->db->delete('exame');
	}

	public function deleteExameQtd($exame_id)
	{
		$this->db->where('exame_qtd.exame_id', $exame_id);
		return $this->db->delete('exame_qtd');
	}

	public function getExamesValor($id)
	{
		$query = $this->db->get_where('tecnica_tratamento', array('tecnica_tratamento_id' => $id));
		return $query->row_array();
	}

	public function updateExamesValor($tecnica_tratamento, $id)
	{
		$this->db->where('tecnica_tratamento.tecnica_tratamento_id', $id);
		return $this->db->update('tecnica_tratamento', $tecnica_tratamento);
	}


}