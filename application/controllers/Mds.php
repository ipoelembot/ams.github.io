<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mds extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mds_model');
		$this->load->model('Perorangan_model', 'perorangan');
		$this->load->model('Step1_model');
		$this->load->library('pagination');

	}

	public function index()
	{
		//$this->load->view('template/login');
		$data['title'] = '';
		$data['content'] = $this->load->view('home', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
		
	}

	public function mytask()
	{
		$config = array();
     	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

       	$config["base_url"] 		= base_url() . "mds/mytask";
       	$config["total_rows"] 		= $this->Mds_model->record_count('tbl_register_personal');
       	$config["per_page"] 		= 5;
       	$config["uri_segment"] 		= 3;
 
       	$this->pagination->initialize($config);
       	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       	
       	$data["data"] 		= $this->Mds_model->get_data($config["per_page"], $page, 'tbl_register_personal');
       	$data["links"] 		= $this->pagination->create_links();
		$data['content'] 	= $this->load->view('report/report', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}

	public function edit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		$data['isNull'] 	= $isNull;
		$data['id']			= $id;

		$list1 = $this->perorangan->step1();
		$list2 = $this->perorangan->step2();
		$list3 = $this->perorangan->step3();
		$list4 = $this->perorangan->step4();
		$list5 = $this->perorangan->step5();

		$data['data1'] = $this->Mds_model->getValue($list1,$id,"tbl_register_personal");
		$data['data2'] = $this->Mds_model->getValue($list2,$id,"tbl_register_personal");
		$data['data3'] = $this->Mds_model->getValue($list3,$id,"tbl_register_personal");
		$data['data4'] = $this->Mds_model->getValue($list4,$id,"tbl_register_personal");
		$data['data5'] = $this->Mds_model->getValue($list5,$id,"tbl_register_personal");

		$data['step'] 		= $this->perorangan->getStep();
		$data['list1'] 		= $list1;
		$data['list2'] 		= $list2;
		$data['list3'] 		= $list3;
		$data['list4'] 		= $list4;
		$data['list5'] 		= $list5;
		$data['segment'] 	= $this->perorangan->getSegment();
		$data['content'] 	= $this->load->view('form/edit', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}


	////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////
	//Fungsi-fungsi dibawah ini digunakan untuk mengaktifkan field yang nge-chain saat edit
	public function listPerihalEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('perihal',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('perihal',$id,'tbl_db_perorangan');
		}		

		$id_segment = $this->input->post('id_segment');
		$perihal 	= $this->perorangan->getPerihal($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($perihal as $perihal) {
			if ($data == $perihal->id_list){
				$list .= "<option value='".$perihal->id_list."' selected='selected'>".$perihal->list."</option>";
			}
			else {
				$list .= "<option value='".$perihal->id_list."'>".$perihal->list."</option>";
			}
		}

		$callback	= array('list_perihal'=>$list);
		echo json_encode($callback);
	}
	public function listTujuanPenggunaanEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('tujuan_penggunaan',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('tujuan_penggunaan',$id,'tbl_db_perorangan');
		}

		$id_segment = $this->input->post('id_segment');
		$tujuanpenggunaan 	= $this->Step1_model->getTujuanPenggunaan($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($tujuanpenggunaan as $tujuanpenggunaan) {
			if ($data == $tujuanpenggunaan->id_list){
				$list .= "<option value='".$tujuanpenggunaan->id_list."' selected='selected'>".$tujuanpenggunaan->list."</option>";
			}
			else {
				$list .= "<option value='".$tujuanpenggunaan->id_list."' >".$tujuanpenggunaan->list."</option>";
			}
		}

		$callback	= array('list_tujuanpenggunaan'=>$list);
		echo json_encode($callback);
	}
	public function listAkadEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('jenis_akad',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('jenis_akad',$id,'tbl_db_perorangan');
		}

		$id_segment = $this->input->post('id_segment');
		$akad 	= $this->Step1_model->getAkad($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($akad as $akad) {
			if ($data == $akad->id_list){
				$list .= "<option value='".$akad->id_list."' selected='selected'>".$akad->list."</option>";
			}
			else {
				$list .= "<option value='".$akad->id_list."'>".$akad->list."</option>";
			}
		}

		$callback	= array('list_akad'=>$list);
		echo json_encode($callback);
	}

	public function listProdukEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('produk_pembiayaan',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('produk_pembiayaan',$id,'tbl_db_perorangan');
		}

		$id_segment = $this->input->post('id_segment');
		$produk 	= $this->Step1_model->getProdukPembiayaan($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($produk as $produk) {
			if ($data == $produk->id_list){
				$list .= "<option value='".$produk->id_list."' selected='selected'>".$produk->list."</option>";
			}
			else {
				$list .= "<option value='".$produk->id_list."'>".$produk->list."</option>";
			}
		}

		$callback	= array('list_produk'=>$list);
		echo json_encode($callback);
	}
	public function listKodeProdukEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('kode_produk',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('kode_produk',$id,'tbl_db_perorangan');
		}

		$id_segment = $this->input->post('id_segment');
		$kodeproduk 	= $this->Step1_model->getKodeProduk($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($kodeproduk as $kodeproduk) {
			if ($data == $kodeproduk->id_list){
				$list .= "<option value='".$kodeproduk->id_list."' selected='selected'>".$kodeproduk->list."</option>";
			}
			else {
				$list .= "<option value='".$kodeproduk->id_list."'>".$kodeproduk->list."</option>";
			}
		}

		$callback	= array('list_kodeproduk'=>$list);
		echo json_encode($callback);
	}
	public function listKomiteEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('komite_level',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('komite_level',$id,'tbl_db_perorangan');
		}

		$id_segment = $this->input->post('id_segment');
		$komite 	= $this->Step1_model->getKomite($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($komite as $komite) {
			if ($data == $komite->id_list){
				$list .= "<option value='".$komite->id_list."' selected='selected'>".$komite->list."</option>";
			}
			else {
				$list .= "<option value='".$komite->id_list."'>".$komite->list."</option>";
			}
		}

		$callback	= array('list_komite'=>$list);
		echo json_encode($callback);
	}
	public function listAgunanEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('kode_jenis_agunan',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('kode_jenis_agunan',$id,'tbl_db_perorangan');
		}		

		$id_segment = $this->input->post('id_segment');
		$agunan 	= $this->Step1_model->getAgunan($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($agunan as $agunan) {
			if ($data == $agunan->id_list){
				$list .= "<option value='".$agunan->id_list."' selected='selected'>".$agunan->list."</option>";
			}
			else {
				$list .= "<option value='".$agunan->id_list."'>".$agunan->list."</option>";
			}
		}

		$callback	= array('list_agunan'=>$list);
		echo json_encode($callback);
	}
	public function listKabupatenEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('kode_kota',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('kode_kota',$id,'tbl_db_perorangan');
		}		

		$provinsi_id 	= $this->input->post('provinsi_id');
		$kabupaten 		= $this->perorangan->getKabupaten($provinsi_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kabupaten as $kabupaten) {
			if ($data == $kabupaten->id_list){
				$list .= "<option value='".$kabupaten->id_list."' selected='selected'>".$kabupaten->list."</option>";
			}
			else {
				$list .= "<option value='".$kabupaten->id_list."' >".$kabupaten->list."</option>";
			}
		}

		$callback	= array('list_kabupaten'=>$list);
		echo json_encode($callback);
	}
	public function listProyekEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('lokasi_proyek',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('lokasi_proyek',$id,'tbl_db_perorangan');
		}

		$provinsi_id 	= $this->input->post('provinsi_id');
		$proyek 		= $this->perorangan->getKabupaten($provinsi_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($proyek as $proyek) {
			if ($data == $proyek->id_list){
				$list .= "<option value='".$proyek->id_list."' selected='selected'>".$proyek->list."</option>";
			}
			else {
				$list .= "<option value='".$proyek->id_list."' >".$proyek->list."</option>";
			}
		}

		$callback	= array('list_proyek'=>$list);
		echo json_encode($callback);
	}
	public function listLokasiAgunanEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('lokasi_agunan',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('lokasi_agunan',$id,'tbl_db_perorangan');
		}

		$provinsi_id 	= $this->input->post('provinsi_id');
		$lokasi_agunan	= $this->perorangan->getKabupaten($provinsi_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($lokasi_agunan as $lokasi_agunan) {
			if ($data == $lokasi_agunan->id_list){
				$list .= "<option value='".$lokasi_agunan->id_list."' selected='selected'>".$lokasi_agunan->list."</option>";
			}
			else {
				$list .= "<option value='".$lokasi_agunan->id_list."'>".$lokasi_agunan->list."</option>";
			}
		}

		$callback	= array('list_lokasi_agunan'=>$list);
		echo json_encode($callback);
	}
	public function listKecamatanEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('kode_kecamatan',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('kode_kecamatan',$id,'tbl_db_perorangan');
		}

		$kabupaten_id 	= $this->input->post('kabupaten_id');
		$kecamatan 		= $this->perorangan->getKecamatan($kabupaten_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kecamatan as $kecamatan) {
			if ($data == $kecamatan->id_list){
				$list .= "<option value='".$kecamatan->id_list."' selected='selected'>".$kecamatan->list."</option>";
			}
			else {
				$list .= "<option value='".$kecamatan->id_list."'>".$kecamatan->list."</option>";
			}
		}

		$callback	= array('list_kecamatan'=>$list);
		echo json_encode($callback);
	}
	public function listKelurahanEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('kode_kelurahan',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('kode_kelurahan',$id,'tbl_db_perorangan');
		}

		$kecamatan_id 	= $this->input->post('kecamatan_id');
		$kelurahan 		= $this->perorangan->getKelurahan($kecamatan_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kelurahan as $kelurahan) {
			if ($data == $kelurahan->id_list){
				$list .= "<option value='".$kelurahan->id_list."' selected='selected'>".$kelurahan->list."</option>";
			}
			else {
				$list .= "<option value='".$kelurahan->id_list."'>".$kelurahan->list."</option>";
			}
		}

		$callback	= array('list_kelurahan'=>$list);
		echo json_encode($callback);
	}
	public function listKodeposEdit()
	{
		$id = $this->uri->segment('3');
		$isNull = $this->uri->segment('4');

		if ($isNull == 0){ //jika data berasal bukan dari tbl_db_perorangan
			$data = $this->Mds_model->getIdList('kode_pos',$id,'tbl_register_personal');
		}
		else {
			$data = $this->Mds_model->getIdList('kode_pos',$id,'tbl_db_perorangan');
		}

		$kelurahan_id 	= $this->input->post('kelurahan_id');
		$kodepos 		= $this->perorangan->getKodepos($kelurahan_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kodepos as $kodepos) {
			if ($data == $kodepos->id_list){
				$list .= "<option value='".$kodepos->id_list."' selected='selected'>".$kodepos->list."</option>";
			}
			else {
				$list .= "<option value='".$kodepos->id_list."'>".$kodepos->list."</option>";
			}
		}

		$callback	= array('list_kodepos'=>$list);
		echo json_encode($callback);
	}
	//End of lines --- Fungsi-fungsi dibawah ini digunakan untuk mengaktifkan field yang nge-chain saat edit
	/////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////

	public function update()
	{
		$id = $this->uri->segment('3');

		date_default_timezone_set('Asia/Jakarta');
		$segment 			 				= $this->input->post('frm_001');
		$perihal  		 					= $this->input->post('frm_002');
		$jenis_akad 		 				= $this->input->post('frm_003');
		$tujuan_penggunaan 					= $this->input->post('frm_004');
		$produk_pembiayaan					= $this->input->post('frm_005');
		$kode_produk 						= $this->input->post('frm_006');
		$komite_level 						= $this->input->post('frm_007');
		$tgl_pengajuan 						= $this->input->post('frm_008');
		$no_akad 							= $this->input->post('frm_009');
		$tgl_akad 							= $this->input->post('frm_010');
		$cif 								= $this->input->post('frm_012');
		$rek 								= $this->input->post('frm_013');
		$nama_deb 							= $this->input->post('frm_015');
		$nama_alias 						= $this->input->post('frm_016');
		$gelar_non_adm 						= $this->input->post('frm_017');
		$gelar_adm 							= $this->input->post('frm_018');
		$pendidikan 						= $this->input->post('frm_019');
		$jenis_kelamin 						= $this->input->post('frm_020');
		$tempat_lahir 						= $this->input->post('frm_021');
		$tgl_lahir 							= $this->input->post('frm_022');
		$jenis_id 							= $this->input->post('frm_023');
		$no_id 								= $this->input->post('frm_024');
		$no_npwp 							= $this->input->post('frm_025');
		$alamat_deb 						= $this->input->post('frm_026');
		$kode_negara 						= $this->input->post('frm_027');
		$kode_provinsi 						= $this->input->post('frm_028');
		$kode_kota 							= $this->input->post('frm_029');
		$kode_kecamatan 					= $this->input->post('frm_030');
		$kode_kelurahan 					= $this->input->post('frm_031');
		$kode_pos 							= $this->input->post('frm_032');
		$no_pstn_deb 						= $this->input->post('frm_033');
		$no_hp_deb 							= $this->input->post('frm_034');
		$email 								= $this->input->post('frm_035');
		$nama_ibu_kandung 					= $this->input->post('frm_036');
		$jml_tanggungan 					= $this->input->post('frm_037');
		$hub_pelapor 						= $this->input->post('frm_038');
		$gol_deb 							= $this->input->post('frm_039');
		$stat_kawin_deb 					= $this->input->post('frm_040');
		$tempat_kerja_deb 					= $this->input->post('frm_042');
		$bid_usaha_tempat_kerja_deb 		= $this->input->post('frm_043');
		$alamat_tempat_kerja_deb 			= $this->input->post('frm_044');
		$penghasilan_kotor 					= $this->input->post('frm_045');
		$sumber_penghasilan 				= $this->input->post('frm_046');
		$nama_pasangan 						= $this->input->post('frm_048');
		$jenis_id_pasangan 					= $this->input->post('frm_049');
		$no_id_pasangan 					= $this->input->post('frm_050');
		$tgl_lahir_pasangan 				= $this->input->post('frm_051');
		$pisah_harta 						= $this->input->post('frm_052');
		$langgar_bmpk 						= $this->input->post('frm_053');
		$lampaui_bmpk 						= $this->input->post('frm_054');
		$rek_fasilitas 						= $this->input->post('frm_055');
		$sifat_kredit 						= $this->input->post('frm_056');
		$jenis_pembiayaan 					= $this->input->post('frm_057');
		$akad_kredit 						= $this->input->post('frm_058');
		$no_akad_awal 						= $this->input->post('frm_059');
		$tgl_akad_awal 						= $this->input->post('frm_060');
		$no_akad_akhir 						= $this->input->post('frm_061');
		$tgl_akad_akhir 					= $this->input->post('frm_062');
		$tgl_kredit_awal 					= $this->input->post('frm_063');
		$tgl_mulai 							= $this->input->post('frm_064');
		$tgl_jt 							= $this->input->post('frm_065');
		$kategori_deb 						= $this->input->post('frm_066');
		$jenis_penggunaan 					= $this->input->post('frm_067');
		$orientasi_penggunaan 				= $this->input->post('frm_068');
		$kode_sek_ekonomi 					= $this->input->post('frm_069');
		$mata_uang 							= $this->input->post('frm_070');
		$plafond 							= $this->input->post('frm_071');
		$jk_waktu 							= $this->input->post('frm_072');
		$os 								= $this->input->post('frm_073');
		$margin 							= $this->input->post('frm_074');
		$bagi_hasil 						= $this->input->post('frm_075');
		$jenis_suku_bunga 					= $this->input->post('frm_076');
		$kredit_prog_pemerintah 			= $this->input->post('frm_077');
		$asal_kredit 						= $this->input->post('frm_078');
		$nilai_proyek 						= $this->input->post('frm_079');
		$lokasi_proyek 						= $this->input->post('frm_080');
		$sumber_dana 						= $this->input->post('frm_081');
		$realisasi 							= $this->input->post('frm_082');
		$scoring 							= $this->input->post('frm_083');
		$tgl_scoring 						= $this->input->post('frm_084');
		$sandi_dati2 						= $this->input->post('frm_085');
		$group_deb 							= $this->input->post('frm_086');
		$nama_group_deb 					= $this->input->post('frm_087');
		$stat_badan_usaha_sid 				= $this->input->post('frm_088');
		$keterkaitan_deb_sid 				= $this->input->post('frm_089');
		$gol_penjamin_sid 					= $this->input->post('frm_090');
		$orientasi_penggunaan_sid 			= $this->input->post('frm_091');
		$jenis_kredit_kelolaan_sid 			= $this->input->post('frm_092');
		$kode_stat_agunan 					= $this->input->post('frm_093');
		$kode_jenis_agunan 					= $this->input->post('frm_094');
		$peringkat_agunan 					= $this->input->post('frm_095');
		$kode_lembaga_pemeringkat 			= $this->input->post('frm_096');
		$kode_jenis_pengikatan 				= $this->input->post('frm_097');
		$tgl_pengikatan 					= $this->input->post('frm_098');
		$nama_pemilik_agunan 				= $this->input->post('frm_099');
		$bukti_kepemilikan 					= $this->input->post('frm_100');
		$alamat_agunan 						= $this->input->post('frm_101');
		$lokasi_agunan 						= $this->input->post('frm_102');
		$nilai_agunan_njop 					= $this->input->post('frm_103');
		$nilai_agunan_pelapor 				= $this->input->post('frm_104');
		$tgl_penilaian_agunan_pelapor 		= $this->input->post('frm_105');
		$nilai_agunan_independen 			= $this->input->post('frm_106');
		$nama_penilai_independen 			= $this->input->post('frm_107');
		$tgl_penilaian_agunan_independen 	= $this->input->post('frm_108');
		$stat_paripasu 						= $this->input->post('frm_109');
		$persen_paripasu 					= $this->input->post('frm_110');
		$asuransi_agunan 					= $this->input->post('frm_111');
		$jenis_pengikatan_sid				= $this->input->post('frm_112');
		$gol_deb_sid 						= $this->input->post('frm_113');
		$gol_kredit_sid 					= $this->input->post('frm_114');
		$sek_ekonomi_sid 					= $this->input->post('frm_115');
		$jenis_penggunaan_sid 				= $this->input->post('frm_116');
		$no_id_penjamin 					= $this->input->post('frm_117');
		$rek_fasilitas_lain 				= $this->input->post('frm_118');
		$kode_jenis_id_penjamin 			= $this->input->post('frm_119');
		$nama_penjamin 						= $this->input->post('frm_120');
		$nama_lengkap_penjamin 				= $this->input->post('frm_121');
		$kode_gol_penjamin 					= $this->input->post('frm_122');
		$alamat_penjamin 					= $this->input->post('frm_123');
		$persen_fasilitas_dijamin 			= $this->input->post('frm_124');
		$user_input 						= '20160011';
		$last_update						= date('Y-m-d H:i:s');

		if (($tgl_lahir_pasangan == NULL) || ($tgl_lahir_pasangan == "")){
			$tgl_lahir_pasangan = NULL;
		}
		else {
			$tgl_lahir_pasangan = date("Y-m-d", strtotime($tgl_lahir_pasangan));
		}

		$data = array(
			'kategori_memo						' => "Perorangan",
			'segment 			 				' => $segment,
			'perihal  		 					' => $perihal,
			'jenis_akad 		 				' => $jenis_akad,
			'tujuan_penggunaan 					' => $tujuan_penggunaan,
			'produk_pembiayaan					' => $produk_pembiayaan,
			'kode_produk 						' => $kode_produk,
			'komite_level 						' => $komite_level,
			'tgl_pengajuan 						' => date("Y-m-d", strtotime($tgl_pengajuan)),
			'no_akad 							' => $no_akad,
			'tgl_akad 							' => date("Y-m-d", strtotime($tgl_akad)),
			'cif 								' => $cif,
			'rek 								' => $rek,
			'nama_deb 							' => $nama_deb,
			'nama_alias 						' => $nama_alias,
			'gelar_non_adm 						' => $gelar_non_adm,
			'gelar_adm 							' => $gelar_adm,
			'pendidikan 						' => $pendidikan,
			'jenis_kelamin 						' => $jenis_kelamin,
			'tempat_lahir 						' => $tempat_lahir,
			'tgl_lahir 							' => date("Y-m-d", strtotime($tgl_lahir)),
			'jenis_id 							' => $jenis_id,
			'no_id 								' => $no_id,
			'no_npwp 							' => $no_npwp,
			'alamat_deb 						' => $alamat_deb,
			'kode_negara 						' => $kode_negara,
			'kode_provinsi 						' => $kode_provinsi,
			'kode_kota 							' => $kode_kota,
			'kode_kecamatan 					' => $kode_kecamatan,
			'kode_kelurahan 					' => $kode_kelurahan,
			'kode_pos 							' => $kode_pos,
			'no_pstn_deb 						' => $no_pstn_deb,
			'no_hp_deb 							' => $no_hp_deb,
			'email 								' => $email,
			'nama_ibu_kandung 					' => $nama_ibu_kandung,
			'jml_tanggungan 					' => $jml_tanggungan,
			'hub_pelapor 						' => $hub_pelapor,
			'gol_deb 							' => $gol_deb,
			'stat_kawin_deb 					' => $stat_kawin_deb,
			'tempat_kerja_deb 					' => $tempat_kerja_deb,
			'bid_usaha_tempat_kerja_deb 		' => $bid_usaha_tempat_kerja_deb,
			'alamat_tempat_kerja_deb 			' => $alamat_tempat_kerja_deb,
			'penghasilan_kotor 					' => $penghasilan_kotor,
			'sumber_penghasilan 				' => $sumber_penghasilan,
			'nama_pasangan 						' => $nama_pasangan,
			'jenis_id_pasangan 					' => $jenis_id_pasangan,
			'no_id_pasangan 					' => $no_id_pasangan,
			'tgl_lahir_pasangan 				' => $tgl_lahir_pasangan,
			'pisah_harta 						' => $pisah_harta,
			'langgar_bmpk 						' => $langgar_bmpk,
			'lampaui_bmpk 						' => $lampaui_bmpk,
			'rek_fasilitas 						' => $rek_fasilitas,
			'sifat_kredit 						' => $sifat_kredit,
			'jenis_pembiayaan 					' => $jenis_pembiayaan,
			'akad_kredit 						' => $akad_kredit,
			'no_akad_awal 						' => $no_akad_awal,
			'tgl_akad_awal 						' => date("Y-m-d", strtotime($tgl_akad_awal)),
			'no_akad_akhir 						' => $no_akad_akhir,
			'tgl_akad_akhir 					' => date("Y-m-d", strtotime($tgl_akad_akhir)),
			'tgl_kredit_awal 					' => date("Y-m-d", strtotime($tgl_kredit_awal)),
			'tgl_mulai 							' => date("Y-m-d", strtotime($tgl_mulai)),
			'tgl_jt 							' => date("Y-m-d", strtotime($tgl_jt)),
			'kategori_deb 						' => $kategori_deb,
			'jenis_penggunaan 					' => $jenis_penggunaan,
			'orientasi_penggunaan 				' => $orientasi_penggunaan,
			'kode_sek_ekonomi 					' => $kode_sek_ekonomi,
			'mata_uang 							' => $mata_uang,
			'plafond 							' => $plafond,
			'jk_waktu 							' => $jk_waktu,
			'os 								' => $os,
			'margin 							' => $margin,
			'bagi_hasil 						' => $bagi_hasil,
			'jenis_suku_bunga 					' => $jenis_suku_bunga,
			'kredit_prog_pemerintah 			' => $kredit_prog_pemerintah,
			'asal_kredit 						' => $asal_kredit,
			'nilai_proyek 						' => $nilai_proyek,
			'lokasi_proyek 						' => $lokasi_proyek,
			'sumber_dana 						' => $sumber_dana,
			'realisasi 							' => $realisasi,
			'scoring 							' => $scoring,
			'tgl_scoring 						' => date("Y-m-d", strtotime($tgl_scoring)),
			'sandi_dati2 						' => $sandi_dati2,
			'group_deb 							' => $group_deb,
			'nama_group_deb 					' => $nama_group_deb,
			'stat_badan_usaha_sid 				' => $stat_badan_usaha_sid,
			'keterkaitan_deb_sid 				' => $keterkaitan_deb_sid,
			'gol_penjamin_sid 					' => $gol_penjamin_sid,
			'orientasi_penggunaan_sid 			' => $orientasi_penggunaan_sid,
			'jenis_kredit_kelolaan_sid 			' => $jenis_kredit_kelolaan_sid,
			'kode_stat_agunan 					' => $kode_stat_agunan,
			'kode_jenis_agunan 					' => $kode_jenis_agunan,
			'peringkat_agunan 					' => $peringkat_agunan,
			'kode_lembaga_pemeringkat 			' => $kode_lembaga_pemeringkat,
			'kode_jenis_pengikatan 				' => $kode_jenis_pengikatan,
			'tgl_pengikatan 					' => date("Y-m-d", strtotime($tgl_pengikatan)),
			'nama_pemilik_agunan 				' => $nama_pemilik_agunan,
			'bukti_kepemilikan 					' => $bukti_kepemilikan,
			'alamat_agunan 						' => $alamat_agunan,
			'lokasi_agunan 						' => $lokasi_agunan,
			'nilai_agunan_njop 					' => $nilai_agunan_njop,
			'nilai_agunan_pelapor 				' => $nilai_agunan_pelapor,
			'tgl_penilaian_agunan_pelapor 		' => date("Y-m-d", strtotime($tgl_penilaian_agunan_pelapor)),
			'nilai_agunan_independen 			' => $nilai_agunan_independen,
			'nama_penilai_independen 			' => $nama_penilai_independen,
			'tgl_penilaian_agunan_independen 	' => date("Y-m-d", strtotime($tgl_penilaian_agunan_independen)),
			'stat_paripasu 						' => $stat_paripasu,
			'persen_paripasu 					' => $persen_paripasu,
			'asuransi_agunan 					' => $asuransi_agunan,
			'jenis_pengikatan_sid				' => $jenis_pengikatan_sid,
			'gol_deb_sid 						' => $gol_deb_sid,
			'gol_kredit_sid 					' => $gol_kredit_sid,
			'sek_ekonomi_sid 					' => $sek_ekonomi_sid,
			'jenis_penggunaan_sid 				' => $jenis_penggunaan_sid,
			'no_id_penjamin 					' => $no_id_penjamin,
			'rek_fasilitas_lain 				' => $rek_fasilitas_lain,
			'kode_jenis_id_penjamin 			' => $kode_jenis_id_penjamin,
			'nama_penjamin 						' => $nama_penjamin,
			'nama_lengkap_penjamin 				' => $nama_lengkap_penjamin,
			'kode_gol_penjamin 					' => $kode_gol_penjamin,
			'alamat_penjamin 					' => $alamat_penjamin,
			'persen_fasilitas_dijamin 			' => $persen_fasilitas_dijamin,
			'user_input 						' => $user_input,
			'last_update						' => $last_update
		);

		$this->Mds_model->update_data($id,$data,'tbl_register_personal');
		redirect('mds/mytask');
	}

	public function preview(){
		$id 	= $this->uri->segment('3');
		$nama 	= urldecode($string = $this->uri->segment('4'));
		$cif 	= $this->uri->segment('5');

		$data['cif'] 	= $cif;
		$data['nama'] 	= $nama;
		$data['id']		= $id;

		$list1 = $this->perorangan->step1();
		$list2 = $this->perorangan->step2();
		$list3 = $this->perorangan->step3();
		$list4 = $this->perorangan->step4();
		$list5 = $this->perorangan->step5();

		$data['list1'] = $list1;
		$data['list2'] = $list2;
		$data['list3'] = $list3;
		$data['list4'] = $list4;
		$data['list5'] = $list5;

		$data['data1'] = $this->perorangan->getData($list1,$id);
		$data['data2'] = $this->perorangan->getData($list2,$id);
		$data['data3'] = $this->perorangan->getData($list3,$id);
		$data['data4'] = $this->perorangan->getData($list4,$id);
		$data['data5'] = $this->perorangan->getData($list5,$id);
		
		$data['title'] 		= '';
		$data['content'] 	= $this->load->view('form/new/personal/preview-perorangan-form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
}

/* End of file Mds.php */
/* Location: ./application/controllers/Mds.php */