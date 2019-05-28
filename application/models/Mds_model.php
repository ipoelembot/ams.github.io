<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mds_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	
   	public function record_count($table) {
       	return $this->db->count_all($table);
   	}

	public function get_data($limit, $start, $table)
	{
		$this->db->select("*");
		$this->db->from($table);
		$this->db->order_by('id','desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data[] = $row;
           }
           return $data;
		}
		return false;
	}

	//Fungsi ini akan digunakan oleh controller Mds untuk mendapatkan data pada saat edit field
	public function getValue($list, $id, $table){
		$i = 0;
		foreach ($list as $l){
			if ($l->type != 'sparate'){
				$alias = $l->alias;
				$this->db->select($alias);
				$this->db->from($table);
				$this->db->where('id', $id);
				$query = $this->db->get();
				
				if ($query->num_rows() > 0){
					foreach ($query->result() as $r) {
						if ($l->type == 'date') {
							if ($r->$alias == NULL){
								$hasil[$i] = "";
								$i++;
							}
							else{
								$hasil[$i] = date("m/d/Y", strtotime($r->$alias));
								$i++;
							}
						} else {
							$hasil[$i] = $r->$alias;
							$i++;
						}
					}
				}
				else {
					$hasil[$i] = NULL;
					$i++;
				}
			}
		}
		return $hasil;
	}
	//End of lines-----Fungsi ini akan digunakan oleh controller Mds untuk mendapatkan data pada saat edit field

	//Fungsi ini akan digunakan controller Mds 
	public function getIdList($alias, $id, $table)
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
	//End of lines ---- Fungsi ini akan digunakan controller Mds 

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function update_data($id,$data,$table)
	{
		$this->db->where('id', $id);
		$this->db->update($table, $data);
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
		return $this->db->get('lov_segment')->result();
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
		$result = $this->db->get('lov_tujuan_penggunaan')->result();
		return $result;
	}
	/*
	public function getAkad($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('lov_jenis_akad')->result();
		return $result;
	}
	*/
	/*
	public function getProdukPembiayaan($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('tbl_produk')->result();
		return $result;
	}
	*/
	public function getKodeProduk($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('lov_kode_produk')->result();
		return $result;
	}
	public function getKomite($id_segment)
	{
		$this->db->where('id_segment', $id_segment);
		$result = $this->db->get('lov_komite')->result();
		return $result;
	}
}

/* End of file Mds_model.php */
/* Location: ./application/models/Mds_model.php */