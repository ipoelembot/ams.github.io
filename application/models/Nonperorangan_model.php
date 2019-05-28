<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nonperorangan_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// ---------- Corporate ---------- //
	public function getCariCorp()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from tbl_db_perorangan where segment = 'b_003' and nama_deb like '%$cari%' or cif like '%$cari%' or rek like '%$cari%'");
		return $data->result();
	}
	// ---------- Commercial ---------- //
	public function getCariComm()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from tbl_db_perorangan where segment = 'b_001' and nama_deb like '%$cari%' or cif like '%$cari%' or rek like '%$cari%'");
		return $data->result();
	}
	// ---------- SMM ---------- //
	public function getCariSmm()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from tbl_db_perorangan where segment = 'b_004' and nama_deb like '%$cari%' or cif like '%$cari%' or rek like '%$cari%'");
		return $data->result();
	}
	

	public function getStep()
	{
		$status = 'aktif';
		$kategori = 'Perusahaan';
		$this->db->select("*");
		$this->db->from('tbl_step_wizard');
		$this->db->where('status', $status);
		$this->db->where('kategori', $kategori);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function getSegment()
	{
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_segment');
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
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
	public function step1()
	{
		$value = '1';
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_list_form_perusahaan');
		$this->db->where('step', $value);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step2()
	{
		$value = '2';
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_list_form_perusahaan');
		$this->db->where('step', $value);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step3()
	{
		$value = '3';
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_list_form_perusahaan');
		$this->db->where('step', $value);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step4()
	{
		$value = '4';
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_list_form_perusahaan');
		$this->db->where('step', $value);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step5()
	{
		$value = '5';
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_list_form_perusahaan');
		$this->db->where('step', $value);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step6()
	{
		$value = '6';
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_list_form_perusahaan');
		$this->db->where('step', $value);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step7()
	{
		$value = '7';
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_list_form_perusahaan');
		$this->db->where('step', $value);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}

	public function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function varSimpanData()
	{
		
	}
}

/* End of file Nonperorangan_model.php */
/* Location: ./application/models/Nonperorangan_model.php */