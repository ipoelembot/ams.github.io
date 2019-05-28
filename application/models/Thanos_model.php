<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thanos_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function cms()
	{
		//$kategori = $kategori;
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->order_by('step', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	

}

/* End of file Thanos_model.php */
/* Location: ./application/models/Thanos_model.php */