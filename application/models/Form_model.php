<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function Judul()
	{
		$status = '1';
		$this->db->select('nama');
		$this->db->from('tb_nama_app');
		$query = $this->db->get();
		return $query->result();
	}
	public function listTgl()
	{
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		//$this->db->where('type', 'date');
		$this->db->where('status', '1');
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function getStep1($role)
	{
		$status = '1';
		$kategori = 'Non Perorangan';
		$this->db->select('*');
		$this->db->from('tb_step_wizard');
		$this->db->where('status', $status);
		$this->db->where('kategori', $kategori);
		$this->db->where('role', $role);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function getStep2()
	{
		$status = '1';
		$kategori = 'Perorangan';
		$this->db->select("*");
		$this->db->from('tb_step_wizard');
		$this->db->where('status', $status);
		$this->db->where('kategori', $kategori);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function jenisAkad()
	{
		$status = '1';
		$this->db->select("*");
		$this->db->from("lov_jenis_akad");
		$this->db->where('status', $status);
		$query = $this->db->get();
		return $query->result();
	}
	public function kode($jenis, $segment)
	{
		$this->db->where('jenis', $jenis);
		$this->db->where('id_segment', $segment);
		$result = $this->db->get('lov_kode_produk')->result();
		return $result;
	}
	public function step_form_all()
	{
		$status = '1';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step_form1()
	{
		$step = '1';
		$status = '1';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		//$this->db->order_by('step', 'acs');
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step_form2()
	{
		$step = '2';
		$status = '1';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		//$this->db->order_by('step', 'acs');
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step_form3()
	{
		$step = '3';
		$status = '1';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		//$this->db->order_by('step', 'acs');
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function step_form4()
	{
		$step = '4';
		$status = '1';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		//$this->db->order_by('step', 'acs');
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}

	public function step_form4_fd()
	{
		$step = '4';
		$status = '1';
		$type = 'FD';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		$this->db->where('id_switch', $type);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}

	public function step_form4_lc()
	{
		$step = '4';
		$status = '1';
		$type = 'LC';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		$this->db->where('id_switch', $type);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}

	public function step_form4_bg()
	{
		$step = '4';
		$status = '1';
		$type = 'BG';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		$this->db->where('id_switch', $type);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}

	public function step_form6()
	{
		$step = '6';
		$status = '1';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();

	}
	public function step_form7()
	{
		$step = '7';
		$status = '1';
		$this->db->select('*');
		$this->db->from('tb_menu_nonperorangan');
		$this->db->where('step', $step);
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();

	}
	public function getKabupaten($id_prov)
	{
		$this->db->where('id_prov', $id_prov);
		$this->db->where('status', '1');
		$result = $this->db->get('lov_kota_kab_list')->result();
		return $result;
	}

	public function getKecamatan($id_kab)
	{
		$this->db->where('id_kab', $id_kab);
		$this->db->where('status', '1');
		$result = $this->db->get('lov_kecamatan_list')->result();
		return $result;
	}

	public function getKelurahan($id_kel)
	{
		$this->db->where('id_kec', $id_kel);
		$this->db->where('status', '1');
		$result = $this->db->get('lov_kelurahan_list')->result();
		return $result;
	}
	public function getKodepos($id_kodepos)
	{
		$this->db->where('id_kel', $id_kodepos);
		$this->db->where('status', '1');
		$result = $this->db->get('lov_kodepos_list')->result();
		return $result;
	}
	public function getSubsektor($id_sek_eko)
	{
		$this->db->where('id_sek_eko', $id_sek_eko);
		$this->db->where('status', '1');
		$this->db->order_by('sort', 'acs');
		$result = $this->db->get('lov_sub_sek_eko_list')->result();
		return $result;
	}
	public function getKodesubsektor($id_sub_sek_eko)
	{
		$this->db->where('id_sub_sektor', $id_sub_sek_eko);
		$this->db->where('status', '1');
		$this->db->order_by('sort', 'acs');
		$result = $this->db->get('lov_sub_sub_sek_eko_list')->result();
		return $result;
	}
	public function getIdMenuSelect()
	{
		$this->db->where('type', 'select');
		$this->db->where('status', '1');
		$result = $this->db->get('tb_menu_nonperorangan')->result();
		return $result;
	}

	/* ===================== Model Save Data Ke Database ===================== */

	public function simpan_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function simpanStep1($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function simpan_data_step2($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function simpan_data_step3($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function simpan_data_step4($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function simpan_data_step5($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function simpan_data_step6($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function array_simpan_data()
	{
		$this->db->where('status', '1');
		$result = $this->db->get('tb_menu_nonperorangan')->result();
		return $result;
	}

	public function arrayFieldIdCorp()
	{

		$query = $this->db->query("SELECT id_list FROM tb_menu_nonperorangan");
		return $query->result();

	}
	public function count_record()
	{
		$query = $this->db->query("SELECT COUNT(*)+1 as COUNTZ FROM tb_vallrecordnon");
		return $query->num_rows();
	}
	public function cariAddFass()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * FROM tb_vallrecordnon WHERE cif LIKE '%$cari%' OR nama_perusahaan LIKE '%$cari%' OR no_rek LIKE '%$cari%'");
		return $data->result();
	}
}	

/* End of file Form_model.php */
/* Location: ./application/models/Form_model.php */