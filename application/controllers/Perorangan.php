<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perorangan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perorangan_model', 'perorangan');
		$this->load->library('pdf');
		$this->load->library('MC_Table');
	}
	public function cari()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('form/new/personal/cari', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function hasilCari()
	{
		$data['cari'] = $this->perorangan->getCari();
		$data['content'] = $this->load->view('form/new/personal/result', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function form()
	{
		$data['step'] 		= $this->perorangan->getStep();
		$data['list1'] 		= $this->perorangan->step1();
		$data['list2'] 		= $this->perorangan->step2();
		$data['list3'] 		= $this->perorangan->step3();
		$data['list4'] 		= $this->perorangan->step4();
		$data['list5'] 		= $this->perorangan->step5();
		$data['segment'] 	= $this->perorangan->getSegment();
		$data['content'] 	= $this->load->view('form/new/personal/perorangan-form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function getSegment()
	{
		$data['segment'] = $this->perorangan->getSegment();
		$data['content'] = $this->load->view('form/new/personal/perorangan-form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function listPerihal()
	{
		$id_segment = $this->input->post('id_segment');
		$perihal 	= $this->perorangan->getPerihal($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($perihal as $perihal) {
			$list .= "<option value='".$perihal->id_list."'>".$perihal->list."</option>";
		}

		$callback	= array('list_perihal'=>$list);
		echo json_encode($callback);
	}
	public function listTujuanPenggunaan()
	{
		$id_segment = $this->input->post('id_segment');
		$tujuanpenggunaan 	= $this->perorangan->getTujuanPenggunaan($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($tujuanpenggunaan as $tujuanpenggunaan) {
			$list .= "<option value='".$tujuanpenggunaan->id_list."'>".$tujuanpenggunaan->list."</option>";
		}

		$callback	= array('list_tujuanpenggunaan'=>$list);
		echo json_encode($callback);
	}
	public function listAkad()
	{
		$id_segment = $this->input->post('id_segment');
		$akad 	= $this->perorangan->getAkad($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($akad as $akad) {
			$list .= "<option value='".$akad->id_list."'>".$akad->list."</option>";
		}

		$callback	= array('list_akad'=>$list);
		echo json_encode($callback);
	}

	public function listProduk()
	{
		$id_segment = $this->input->post('id_segment');
		$produk 	= $this->perorangan->getProdukPembiayaan($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($produk as $produk) {
			$list .= "<option value='".$produk->id_list."'>".$produk->list."</option>";
		}

		$callback	= array('list_produk'=>$list);
		echo json_encode($callback);
	}
	public function listKodeProduk()
	{
		$id_segment 	= $this->input->post('id_segment');
		$kodeproduk 	= $this->perorangan->getKodeProduk($id_segment);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kodeproduk as $kodeproduk) {
			$list .= "<option value='".$kodeproduk->id_list."'>".$kodeproduk->list."</option>";
		}

		$callback	= array('list_kodeproduk'=>$list);
		echo json_encode($callback);
	}
	public function listKomite()
	{
		$id_segment = $this->input->post('id_segment');
		$komite 	= $this->perorangan->getKomite($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($komite as $komite) {
			$list .= "<option value='".$komite->id_list."'>".$komite->list."</option>";
		}

		$callback	= array('list_komite'=>$list);
		echo json_encode($callback);
	}

	public function getProvinsi()
	{
		$data['provinsi'] = $this->perorangan->getProvinsi();
		$data['content'] = $this->load->view('form/new/personal/perorangan-form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function listKabupaten()
	{
		$provinsi_id 	= $this->input->post('provinsi_id');
		$kabupaten 		= $this->perorangan->getKabupaten($provinsi_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kabupaten as $kabupaten) {
			$list .= "<option value='".$kabupaten->id_list."'>".$kabupaten->list."</option>";
		}

		$callback	= array('list_kabupaten'=>$list);
		echo json_encode($callback);
	}
	public function listProyek()
	{
		$provinsi_id 	= $this->input->post('provinsi_id');
		$proyek 		= $this->perorangan->getKabupaten($provinsi_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($proyek as $proyek) {
			$list .= "<option value='".$proyek->id_list."'>".$proyek->list."</option>";
		}

		$callback	= array('list_proyek'=>$list);
		echo json_encode($callback);
	}
	public function listLokasiAgunan()
	{
		$provinsi_id 	= $this->input->post('provinsi_id');
		$lokasi_agunan	= $this->perorangan->getKabupaten($provinsi_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($lokasi_agunan as $lokasi_agunan) {
			$list .= "<option value='".$lokasi_agunan->id_list."'>".$lokasi_agunan->list."</option>";
		}

		$callback	= array('list_lokasi_agunan'=>$list);
		echo json_encode($callback);
	}
	public function listKecamatan()
	{
		$kabupaten_id 	= $this->input->post('kabupaten_id');
		$kecamatan 		= $this->perorangan->getKecamatan($kabupaten_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kecamatan as $kecamatan) {
			$list .= "<option value='".$kecamatan->id_list."'>".$kecamatan->list."</option>";
		}

		$callback	= array('list_kecamatan'=>$list);
		echo json_encode($callback);
	}
	public function listKelurahan()
	{
		$kecamatan_id 	= $this->input->post('kecamatan_id');
		$kelurahan 		= $this->perorangan->getKelurahan($kecamatan_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kelurahan as $kelurahan) {
			$list .= "<option value='".$kelurahan->id_list."'>".$kelurahan->list."</option>";
		}

		$callback	= array('list_kelurahan'=>$list);
		echo json_encode($callback);
	}
	public function listKodepos()
	{
		$kelurahan_id 	= $this->input->post('kelurahan_id');
		$kodepos 		= $this->perorangan->getKodepos($kelurahan_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kodepos as $kodepos) {
			$list .= "<option value='".$kodepos->id_list."'>".$kodepos->list."</option>";
		}

		$callback	= array('list_kodepos'=>$list);
		echo json_encode($callback);
	}
	public function cetak(){
		$id = $this->uri->segment('3');
		$nama = urldecode($string = $this->uri->segment('4'));
		
		$step1 = $this->perorangan->step1();
		$step2 = $this->perorangan->step2();
		$step3 = $this->perorangan->step3();
		$step4 = $this->perorangan->step4();
		$step5 = $this->perorangan->step5();

		$data1 = $this->perorangan->getData($step1,$id);
		$data2 = $this->perorangan->getData($step2,$id);
		$data3 = $this->perorangan->getData($step3,$id);
		$data4 = $this->perorangan->getData($step4,$id);
		$data5 = $this->perorangan->getData($step5,$id);

		$pdf = new PDF_MC_Table();
		$pdf->SetWidths(array(73,3,94));						//Setting ukuran lebar kolom (ke-1, ke-2, ke-3) pada setiap row

		$pdf->setMargins(20,20);								//Setting ukuran margin kertas vertical (atas-bawah) dan horizontal (kiri-kanan)
		$pdf->SetDrawColor(220,220,220);						//setting warna border table menjadi abu-abu
		
		$pdf->AddPage();									
		$pdf->SetFont('Helvetica', 'B', 14);
		$pdf->Cell(170, 7,'Memorandum Pencairan Pembiayaan',0,1,'C');
		$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 9);
		$pdf->SetTextColor(255,255,255);						//Setting warna text menjadi putih
		$pdf->SetFillColor(3,181,121);							//setting warna isi tabel menjadi hijau
		$pdf->Cell(73, 5,'Kepada',0,0,'L',true);
		$pdf->Cell(97, 5,': OPERASIONAL PEMBIAYAAN & UNIT SUPPORT PEMBIAYAAN',0,1,'L',true);
		$pdf->Cell(73, 5,'Dari',0,0,'L',true);
		$pdf->Cell(97, 5,': RELATIONSHIP MANAGER',0,1,'L',true);

		//Step 1
		$i = 0;
		foreach($step1 as $s1){
			if ($s1->type != 'sparate') {
				$pdf->SetFont('Helvetica', '', 9);
				$pdf->Cell(73, 5, $s1->list ,0,0,'L',true);
				$pdf->Cell(97, 5,': '.$data1[$i].'',0,1,'L',true);
				$i++;
			}
		}
		$pdf->Ln();

		//Step 2
		$j = 0;
		$pdf->SetFillColor(145,0,255);							//Setting warna isi table menjadi ungu
		$pdf->SetTextColor(255,255,255);						//Setting warna text menjadi putih
		$pdf->Cell(170, 5,'Profil Debitur',1,1,'C',true);
		foreach($step2 as $s2){
			if ($s2->type != 'sparate') {
				$pdf->SetFont('Helvetica', '', 8);
				$pdf->SetTextColor(0,0,0);						//Setting warna text menjadi hitam
				$pdf->Row(array($s2->list,':',$data2[$j]));
				$j++;
			}
		}

		//Step 3
		$k = 0;
		$pdf->SetFillColor(145,0,255);							//Setting warna isi table menjadi ungu					
		$pdf->SetTextColor(255,255,255);						//Setting warna text menjadi putih
		$pdf->Cell(170, 5,'Data Pembiayaan',1,1,'C',true);
		foreach($step3 as $s3){
			if ($s3->type != 'sparate') {
				$pdf->SetFont('Helvetica', '', 8);
				$pdf->SetTextColor(0,0,0);						//Setting warna text menjadi hitam
				$pdf->Row(array($s3->list,':',$data3[$k]));
				$k++;
			}
		}

		//Step 4
		$l = 0;
		$pdf->SetFillColor(145,0,255);							//Setting warna isi table menjadi ungu
		$pdf->SetTextColor(255,255,255);						//Setting warna text menjadi putih
		$pdf->Cell(170, 5,'Data Agunan',1,1,'C',true);
		foreach($step4 as $s4){
			if ($s4->type != 'sparate') {
				$pdf->SetFont('Helvetica', '', 8);
				$pdf->SetTextColor(0,0,0);						//Setting warna text menjadi hitam
				$pdf->Row(array($s4->list,':',$data4[$l]));
				$l++;
			}
		}

		//Step 5
		$m = 0;
		$pdf->SetFillColor(145,0,255);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(170, 5,'Profil Penjamin',1,1,'C',true);
		foreach($step5 as $s5){
			if ($s5->type != 'sparate') {
				$pdf->SetFont('Helvetica', '', 8);
				$pdf->SetTextColor(0,0,0);
				$pdf->Row(array($s5->list,':',$data5[$m]));
				$m++;
			}
		}

		$pdf->SetFillColor(145,0,255);
		$pdf->SetTextColor(255,255,255);
		$pdf->Cell(34, 5,'RM / AM / UFA / CFO',1,0,'C',true);
		$pdf->Cell(34, 5,'BM / UM / CM',1,0,'C',true);
		$pdf->Cell(102, 5,'BAGIAN SUPPORT PEMBIAYAAN',1,1,'C',true);
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(34, 5,'','L',0,'C',true);
		$pdf->Cell(34, 5,'','L',0,'C',true);
		$pdf->SetFillColor(3,181,121);
		$pdf->Cell(34, 4,'DIPROSES OLEH',1,0,'C',true);
		$pdf->Cell(34, 4,'DIPERIKSA',1,0,'C',true);
		$pdf->Cell(34, 4,'DISETUJUI',1,1,'C',true);
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(34, 20,'','LB',0,'C',true);
		$pdf->Cell(34, 20,'','LB',0,'C',true);
		$pdf->Cell(34, 20,'','LB',0,'C',true);
		$pdf->Cell(34, 20,'','LB',0,'C',true);
		$pdf->Cell(34, 20,'','LRB',1,'C',true);
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Helvetica', '', 7);
		$pdf->Cell(34, 5,'Tanggal**:','LBT',0,'L',true);
		$pdf->Cell(34, 5,'Tanggal**:','LBT',0,'L',true);
		$pdf->Cell(34, 5,'Tanggal**:','LBT',0,'L',true);
		$pdf->Cell(34, 5,'Tanggal**:','LBT',0,'L',true);
		$pdf->Cell(34, 5,'Tanggal**:','LRBT',1,'L',true);

		$pdf->Ln();
		$pdf->SetFillColor(145,0,255);
		$pdf->SetTextColor(255,255,255);
		$pdf->SetFont('Helvetica', '', 8);
		$pdf->Cell(170, 5,'KETERANGAN / LAMPIRAN',1,1,'C',true);
		$pdf->SetFillColor(255,255,255);
		$pdf->Cell(170, 25,'',1,1,'C',true);

		
		$pdf->Ln();
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Helvetica', '', 6);
		$pdf->Cell(34, 3,'* Pilih sesuai dengan Data Debitur',0,1,'L',true);
		$pdf->Cell(34, 3,'** Format tanggal (DD/MM/YYYY)',0,1,'L',true);
		$pdf->Cell(34, 3,'## Format yang diprint hanya format memorandum persetujuan pembiayaan, untuk keterangan cara pengisian tidak perlu diprint',0,1,'L',true);
		$pdf->Cell(34, 3,'RM : Relationship Manager',0,0,'L',true);
		$pdf->Cell(34, 3,'AM : Account Manager',0,0,'L',true);
		$pdf->Cell(34, 3,'UFA : Unit Financing Analyst',0,0,'L',true);
		$pdf->Cell(34, 3,'CFO : Cluster Financing Officer',0,1,'L',true);
		$pdf->Cell(34, 3,'BM : Branch Manager',0,0,'L',true);
		$pdf->Cell(34, 3,'UM : Unit Manager',0,0,'L',true);
		$pdf->Cell(34, 3,'CM : Cash Manager',0,1,'L',true);

		$pdf->Output('D',$id.'_'.$nama.'.pdf');							//Setting proses cetak dengan menampilkan dialog download file 
	}

	public function simpanData()
	{
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
		$tgl_register 						= date("Y-m-d H:i:s");

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
			'tgl_register 						' => $tgl_register
		);
		$this->perorangan->input_data($data, 'tbl_register_personal');
		redirect('mds/mytask');
	}
}