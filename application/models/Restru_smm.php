<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restru_smm extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Fungsi ini akan mencari data dari input user dengan mengecek terlebih dahulu ke database tbl_register_personal
	//jika tidak ada, maka dicari di database tbl_db_perorangan
	public function getCariSmm()
	{
        $segment = 'b_004';
		$cari = $this->input->GET('cari', TRUE);
		$this->db->select("*");
        $this->db->from('tbl_register_personal');
        $this->db->where('segment', $segment);
		$this->db->like('nama_deb', $cari);
		$this->db->or_like('cif', $cari);
		$this->db->or_like('rek', $cari);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){	//Jika terdapat di tbl_register_personal, data langsung ditangkap 
			return $query->result();
		}
		else {		//Jika tidak ada di tbl_register_personal, maka dicari di database tbl_db_perorangan 
            $segment = 'b_004';
            $this->db->select("*");
            $this->db->from('tbl_db_perorangan');
            $this->db->where('segment', $segment);
			$this->db->like('nama_deb', $cari);
			$this->db->or_like('cif', $cari);
			$this->db->or_like(['no kartu'], $cari);
			$this->db->order_by('id','desc');
			$query = $this->db->get();
			return $query->result();
		}
	}
	//End of lines --- Fungsi ini akan mencari data dari input user dengan mengecek terlebih dahulu ke database tbl_register_personal
	
	//Fungsi ini me-return nilai 1 (true) atau 0 (false) untuk mengetahui apakah data kosong di tbl_register_personal
	public function isNullSmm()
	{
        $segment = 'b_004';
		$cari = $this->input->GET('cari', TRUE);
		$this->db->select("*");
        $this->db->from('tbl_register_personal');
        $this->db->where('segment', $segment);
		$this->db->like('nama_deb', $cari);
		$this->db->or_like('cif', $cari);
		$this->db->or_like('rek', $cari);
		$query = $this->db->get();
		
		if ($query->num_rows() == 0){
			return 1;	//Data kosong di database tbl_register_personal
		}
		else {
			return 0;	//Data terdapat di database tbl_register_personal
		}
	}
}

/* End of file Perorangan_model.php */
/* Location: ./application/models/Perorangan_model.php */