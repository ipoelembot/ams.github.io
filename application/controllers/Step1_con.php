<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Step1_con extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Step1_model');
	}

	public function listPerihal()
	{
		$id_segment = $this->input->post('id_segment');
		$perihal 	= $this->Step1_model->getPerihal($id_segment);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($perihal as $perihal) {
			$list .= "<option value='".$perihal->id_list."'>".$perihal->list."</option>";
		}

		$callback	= array('list_perihal'=>$list);
		echo json_encode($callback);
	}
	public function listTujuanPenggunaan()
	{
		$id_segment = $this->input->post('id_segment');
		$tujuanpenggunaan 	= $this->Step1_model->getTujuanPenggunaan($id_segment);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($tujuanpenggunaan as $tujuanpenggunaan) {
			$list .= "<option value='".$tujuanpenggunaan->id_list."'>".$tujuanpenggunaan->list."</option>";
		}

		$callback	= array('list_tujuanpenggunaan'=>$list);
		echo json_encode($callback);
	}
	public function listAkad()
	{
		$id_segment = $this->input->post('id_segment');
		$akad 	= $this->Step1_model->getAkad($id_segment);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($akad as $akad) {
			$list .= "<option value='".$akad->id_list."'>".$akad->list."</option>";
		}

		$callback	= array('list_akad'=>$list);
		echo json_encode($callback);
	}

	public function listProduk()
	{
		$id_segment = $this->input->post('id_segment');
		$produk 	= $this->Step1_model->getProdukPembiayaan($id_segment);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($produk as $produk) {
			$list .= "<option value='".$produk->id_list."'>".$produk->list."</option>";
		}

		$callback	= array('list_produk'=>$list);
		echo json_encode($callback);
	}
	public function listKodeProduk()
	{
		$id_segment = $this->input->post('id_segment');
		$kodeproduk 	= $this->Step1_model->getKodeProduk($id_segment);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($kodeproduk as $kodeproduk) {
			$list .= "<option value='".$kodeproduk->id_list."'>".$kodeproduk->list."</option>";
		}

		$callback	= array('list_kodeproduk'=>$list);
		echo json_encode($callback);
	}
	public function listKomite()
	{
		$id_segment = $this->input->post('id_segment');
		$komite 	= $this->Step1_model->getKomite($id_segment);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($komite as $komite) {
			$list .= "<option value='".$komite->id_list."'>".$komite->list."</option>";
		}

		$callback	= array('list_komite'=>$list);
		echo json_encode($callback);
	}
	public function listAgunan()
	{
		$id_segment = $this->input->post('id_segment');
		$agunan 	= $this->Step1_model->getAgunan($id_segment);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($agunan as $agunan) {
			$list .= "<option value='".$agunan->id_list."'>".$agunan->list."</option>";
		}

		$callback	= array('list_agunan'=>$list);
		echo json_encode($callback);
	}


}

/* End of file Step1_con.php */
/* Location: ./application/controllers/Step1_con.php */