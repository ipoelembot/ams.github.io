<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perorangan_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getCari()
	{
		$cari = $this->input->GET('cari', TRUE);
		$this->db->select("*");
		$this->db->from('tbl_register_personal');
		$this->db->like('nama_deb', $cari);
		$this->db->or_like('cif', $cari);
		$this->db->or_like('rek', $cari);
		$this->db->order_by('id','desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getStep()
	{
		$status = '1';
		$kategori = 'Non Perorangan';
		$this->db->select("*");
		$this->db->from('tb_step_wizard');
		$this->db->where('status', $status);
		$this->db->where('kategori', $kategori);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}

	public function getSegment()
	{
		$status = '1';
		$this->db->select("*");
		$this->db->from('lov_segment');
		$this->db->where('status', $status);
		$this->db->order_by('sort', 'acs');
		$query = $this->db->get();
		return $query->result();
	}
	public function getPerihal($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('lov_perihal')->result();
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
	public function getProvinsi()
	{
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_provinsi');
		$this->db->where('status', $status);
		$query = $this->db->get();
		return $query->result();
	}
	public function getKodepos($kelurahan_id)
	{
		$this->db->where('kelurahan_id', $kelurahan_id);
		$result = $this->db->get('tbl_kode_pos')->result();
		return $result;
	}
	public function getKelurahan($kecamatan_id)
	{
		$this->db->where('kecamatan_id', $kecamatan_id);
		$result = $this->db->get('tbl_kelurahan')->result();
		return $result;
	}
	public function getKecamatan($kabupaten_id)
	{
		$this->db->where('kabupaten_id', $kabupaten_id);
		$result = $this->db->get('tbl_kecamatan')->result();
		return $result;
	}
	public function getKabupaten($provinsi_id)
	{
		$this->db->where('provinsi_id', $provinsi_id);
		$result = $this->db->get('tbl_kabupaten')->result();
		return $result;
	}
	public function step1()
	{
		$value = '1';
		$status = 'aktif';
		$this->db->select("*");
		$this->db->from('tbl_list_form_personal');
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
		$this->db->from('tbl_list_form_personal');
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
		$this->db->from('tbl_list_form_personal');
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
		$this->db->from('tbl_list_form_personal');
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
		$this->db->from('tbl_list_form_personal');
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

	/*Fungsi ini dibuat khusus untuk field type option yang nge-chain dan mandatory
	  Fungsi ini nanti akan dipanggil oleh fungsi getData()
	  Fungsi ini hanya digunakan untuk kasus data sudah ada di tbl_register_personal */
	public function get_data_special($table, $alias, $id)	
	{
		$this->db->select($alias);
		$this->db->from('tbl_register_personal');
		$this->db->where('id', $id);
		$query = $this->db->get();

		foreach ($query->result() as $r){
			$list = $this->db->query("SELECT DISTINCT list FROM $table WHERE $table.id_list = '".$r->$alias."'");
		}
		return $list;
	}
	//End of lines----Fungsi ini dibuat khusus untuk field type option yang nge-chain dan mandatory


	//Fungsi ini akan digunakan pada fungsi getData()
	public function getDataFromAlias($alias, $id, $table)
	{
		$this->db->select($alias);
		$this->db->from($table);
		$this->db->where('id', $id);
		$query = $this->db->get();
		foreach ($query->result() as $data){
			if (($data->$alias != NULL) || ($data->$alias != "")) {
				return $hasil = $data->$alias;
			}
			else {
				return $hasil = "";
			}
			
		}
	}
	//End of Lines -- Fungsi ini akan digunakan pada fungsi getData()


	//Fungsi ini digunakan oleh controller Mds untuk preview
	public function getData($list1, $id)
	{	
		$i = 0;
		foreach ($list1 as $list){
			$alias = $list->alias;
			if (($list->type == 'input') || ($list->type == 'textbox')){
				//Algoritma ini saat Kondisi field yang bertipe number 	
				if (($list->alias == 'penghasilan_kotor') || ($list->alias == 'plafond') || ($list->alias == 'os') ||
					($list->alias == 'margin') || ($list->alias == 'bagi_hasil') || ($list->alias == 'nilai_proyek') ||
					($list->alias == 'realisasi') || ($list->alias == 'nilai_agunan_njop') || ($list->alias == 'nilai_agunan_pelapor') ||
					($list->alias == 'nilai_agunan_independen') || ($list->alias == 'asuransi_agunan')){		

					$data = $this->getDataFromAlias($alias,$id,'tbl_register_personal');
					$hasil[$i] = number_format($data,0,',','.');
					$i++;
				}
				else {
					$data = $this->getDataFromAlias($alias,$id,'tbl_register_personal');
					$hasil[$i] = $data;
					$i++;
				}
			}
			elseif ($list->type == 'date'){
				//Algoritma ini untuk tipe field 'date' 
				$data = $this->getDataFromAlias($alias,$id,'tbl_register_personal');
				if ($data != "") {
					$hasil[$i] = date('d F Y', strtotime($data));
				}
				else {
					$hasil[$i] = "";
				}
				$i++;
			}
			elseif ($list->type == 'option' && $list->chain_flag == 'yes'){
				$data = $this->getDataFromAlias($alias,$id,'tbl_register_personal');
				if ($data != ""){
					$result = $this->db->query("SELECT list FROM $list->link_tbl WHERE id_list = '".$data."'");
					foreach($result->result() as $r){
						$hasil[$i] = $r->list;
					}
				}
				else {
					$hasil[$i] = "";
				}
				$i++;
			}
			elseif (($list->type == 'option') && ($list->chain_flag != 'yes')){
				//Kondisi ini khusus untuk field option yang nge-chain dengan memanggil method get_data_special()
				if (($list->alias == 'perihal') || ($list->alias == 'jenis_akad') || ($list->alias == 'tujuan_penggunaan') || 
				    ($list->alias == 'produk_pembiayaan') || ($list->alias == 'kode_produk') || ($list->alias == 'komite_level')) {
					
					switch ($list->alias){
						case 'perihal': $result = $this->get_data_special('tbl_perihal','perihal',$id); 
										foreach($result->result() as $r){ $hasil[$i] = $r->list; } $i++; break;
						
						case 'jenis_akad': $result = $this->get_data_special('tbl_jenis_akad','jenis_akad',$id); 
										foreach($result->result() as $r){ $hasil[$i] = $r->list; } $i++; break;
						
						case 'tujuan_penggunaan': $result = $this->get_data_special('tbl_tujuan_penggunaan','tujuan_penggunaan',$id); 
										foreach($result->result() as $r){ $hasil[$i] = $r->list; } $i++; break;
						
						case 'produk_pembiayaan': $result = $this->get_data_special('tbl_produk','produk_pembiayaan',$id); 
										foreach($result->result() as $r){ $hasil[$i] = $r->list; } $i++; break;

						case 'kode_produk': $result = $this->get_data_special('tbl_kode_produk','kode_produk',$id); 
										foreach($result->result() as $r){ $hasil[$i] = $r->list; } $i++; break;
						
						case 'komite_level': $result = $this->get_data_special('tbl_komite','komite_level',$id); 
										foreach($result->result() as $r){ $hasil[$i] = $r->list; } $i++; break;
					}
				}
				elseif (($list->alias == 'kode_kota') || ($list->alias == 'kode_kecamatan') || ($list->alias == 'kode_kelurahan') || 
				        ($list->alias == 'kode_pos') || ($list->alias == 'lokasi_proyek') || ($list->alias == 'lokasi_agunan')) {

						$result = $this->get_data_special($list->link_tbl, $list->alias, $id); 
						foreach($result->result() as $r){ 
							$hasil[$i] = $r->list; 
						} 
						$i++; 
				}
				//End of lines -- Kondisi ini khusus untuk field option yang nge-chain 
				
				else{
					$data = $this->getDataFromAlias($alias,$id,'tbl_register_personal');
					if ($data != ""){
						$result = $this->db->query("SELECT list FROM tbl_dropdown_list WHERE id_list = '".$data."'");
						foreach($result->result() as $r){
							$hasil[$i] = $r->list;
						}
					}
					else {
						$hasil[$i] = "";
					}
					$i++;
				}
			}
		}
		return $hasil;
	}
	//End of lines ---- Fungsi ini digunakan oleh controller Mds untuk preview

}

/* End of file Perorangan_model.php */
/* Location: ./application/models/Perorangan_model.php */