<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step1_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getSegment()
	{
		$this->db->select("*");
		$this->db->from('tbl_segment');
		$this->db->order_by('segment', 'acs');
		$query = $this->db->get();
		return $query->result();
	}

	public function getChained($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result2 = $this->db->get($result->link_tbl)->result();
		return $result2;
	}

	public function getPerihal($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('tbl_perihal')->result();
		return $result;
	}
	public function getTujuanPenggunaan($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('tbl_tujuan_penggunaan')->result();
		return $result;
	}
	public function getAkad($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('tbl_jenis_akad')->result();
		return $result;
	}
	public function getProdukPembiayaan($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('tbl_produk')->result();
		return $result;
	}
	public function getKodeProduk($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('tbl_kode_produk')->result();
		return $result;
	}
	public function getKomite($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('tbl_komite')->result();
		return $result;
	}
	public function getAgunan($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('tbl_agunan')->result();
		return $result;
	}

}

/* End of file Nonperorangan_model.php */
/* Location: ./application/models/Nonperorangan_model.php */