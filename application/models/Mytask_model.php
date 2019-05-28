<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mytask_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function listTask($kodecabang)
	{
		if ($kodecabang == null) {
			$result = $this->db->get('tb_vallrecordnon')->result();
		} else {
			$this->db->where('kode_cabang', $kodecabang);
			$result = $this->db->get('tb_vallrecordnon')->result();
		}
		return $result;
	}

	public function headerMytask()
	{
		$this->db->where('status', '1');
		$result = $this->db->get('lov_mytask')->result();
		return $result;
	}

	public function detailTask($kodeRegister)
	{
		$this->db->where('kode_register', $kodeRegister);
		$result = $this->db->get('tb_vallrecordnon')->result();
		return $result;
	}


}

/* End of file Mytask_model.php */
/* Location: ./application/models/Mytask_model.php */