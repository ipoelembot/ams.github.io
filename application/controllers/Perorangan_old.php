<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perorangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Perorangan_model', 'mds');
	}
	public function cari()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('form/new/personal/cari', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function hasilCari()
	{
		$data['cari'] = $this->mds->getCari();
		$data['content'] = $this->load->view('form/new/personal/result', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function form()
	{
		$data['step'] 		= $this->mds->getStep();
		$data['list1'] 		= $this->mds->step1();
		$data['list2'] 		= $this->mds->step2();
		$data['list3'] 		= $this->mds->step3();
		$data['list4'] 		= $this->mds->step4();
		$data['list5'] 		= $this->mds->step5();
		$data['segment'] 	= $this->mds->getSegment();
		$data['content'] 	= $this->load->view('form/new/personal/perorangan-form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);

		//$this->load->view('form/new/personal/baru.php');
	}
	public function getSegment()
	{
		$data['segment'] = $this->mds->getSegment();
		$data['content'] = $this->load->view('form/new/personal/perorangan-form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function listPerihal()
	{
		$id_segment = $this->input->post('id_segment');
		$perihal 	= $this->mds->getPerihal($id_segment);
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
		$tujuanpenggunaan 	= $this->mds->getTujuanPenggunaan($id_segment);
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
		$akad 	= $this->mds->getAkad($id_segment);
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
		$produk 	= $this->mds->getProdukPembiayaan($id_segment);
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
		$kodeproduk 	= $this->mds->getKodeProduk($id_segment);
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
		$komite 	= $this->mds->getKomite($id_segment);
		$list 		= "<option value='' selected disabled>Pilih</option>";
		foreach ($komite as $komite) {
			$list .= "<option value='".$komite->id_list."'>".$komite->list."</option>";
		}

		$callback	= array('list_komite'=>$list);
		echo json_encode($callback);
	}

	public function getProvinsi()
	{
		$data['provinsi'] = $this->mds->getProvinsi();
		$data['content'] = $this->load->view('form/new/personal/perorangan-form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function listKabupaten()
	{
		$provinsi_id 	= $this->input->post('provinsi_id');
		$kabupaten 		= $this->mds->getKabupaten($provinsi_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kabupaten as $kabupaten) {
			$list .= "<option value='".$kabupaten->id_list."'>".$kabupaten->list."</option>";
		}

		$callback	= array('list_kabupaten'=>$list);
		echo json_encode($callback);
	}
	public function listKecamatan()
	{
		$kabupaten_id 	= $this->input->post('kabupaten_id');
		$kecamatan 		= $this->mds->getKecamatan($kabupaten_id);
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
		$kelurahan 		= $this->mds->getKelurahan($kecamatan_id);
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
		$kodepos 		= $this->mds->getKodepos($kelurahan_id);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kodepos as $kodepos) {
			$list .= "<option value='".$kodepos->id_list."'>".$kodepos->list."</option>";
		}

		$callback	= array('list_kodepos'=>$list);
		echo json_encode($callback);
	}


/* ========================================================================================= */
	
	public function cobaSimpan()
	{

		$data['segment'] 			 				= $this->input->post('email');
		$data['perihal']  		 					= $this->input->post('pwd');
		$data['test']								= $this->input->post('test');

		$this->load->view('success', $data);
	}

/* ========================================================================================= */


	public function simpanData_1()
	{
		



		/*date_default_timezone_set('Asia/Jakarta');
		//$kode_register 	= $this->input->post('kode_register');
		$segmentasi 		= $this->input->post('frm_001');
		$perihal 			= $this->input->post('frm_002');
		$produk 			= $this->input->post('frm_005');
		$komite 			= $this->input->post('frm_007');
		$no_akad 			= $this->input->post('frm_009');
		$jenis_akad 		= $this->input->post('frm_003');
		$tujuan_penggunaan 	= $this->input->post('frm_004');
		$kode_produk 		= $this->input->post('frm_006');
		$tgl_pengajuan 		= $this->input->post('frm_008');
		$tgl_akad 			= $this->input->post('frm_010');
		$user_input 		= '20160011';
		$tgl_register 		= date("Y-m-d");*/


		//$data = array(
			//'kode_register' 		=> $kode_register,
			/*'s1_segment' 			=> $segmentasi,
			's1_perihal'			=> $perihal,
			's1_produk'				=> $produk,
			's1_komite_level'		=> $komite,
			's1_no_akad'			=> $no_akad,
			's1_jenis_akad'			=> $jenis_akad,
			's1_tujuan_penggunaan'	=> $tujuan_penggunaan,
			's1_kode_produk'		=> $kode_produk,
			's1_tgl_pengajuan'		=> date("Y-m-d", strtotime($tgl_pengajuan)),
			's1_tgl_akad'			=> date("Y-m-d", strtotime($tgl_akad)),
			'tgl_register'			=> $tgl_register,
			'user_input'			=> $user_input*/

		//$this->mds->input_data($data, 'tbl_register_personal');
		

		
		$table = 'tbl_register_personal';

		/*$data['segment'] 			 				= $this->input->post('frm_001');
		$data['perihal']  		 					= $this->input->post('frm_002');
		$data['jenis_akad']  		 				= $this->input->post('frm_003');
		$data['tujuan_penggunaan']  		 		= $this->input->post('frm_004');
		$data['produk_pembiayaan']  		 		= $this->input->post('frm_005');
		$data['kode_produk']  		 				= $this->input->post('frm_006');
		$data['komite_level']  		 				= $this->input->post('frm_007');
		$data['tgl_pengajuan']  		 			= $this->input->post('frm_008');
		$data['no_akad']  		 					= $this->input->post('frm_009');
		$data['tgl_akad']  		 					= $this->input->post('frm_010');*/

		//$this->load->view('success', $data);

		$segment 			 				= $this->input->post('frm_001');
		$perihal  		 					= $this->input->post('frm_002');
		$jenis_akad 		 				= $this->input->post('frm_003');
		$tujuan_penggunaan  		 		= $this->input->post('frm_004');
		$produk_pembiayaan  		 		= $this->input->post('frm_005');
		$kode_produk  		 				= $this->input->post('frm_006');
		$komite_level 		 				= $this->input->post('frm_007');
		$tgl_pengajuan  		 			= $this->input->post('frm_008');
		$no_akad 		 					= $this->input->post('frm_009');
		$tgl_akad 		 					= $this->input->post('frm_010');
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
		
		$data = array(
        	'segment'						=> $segment,
        	'perihal'						=> $perihal,
        	'jenis_akad'					=> $jenis_akad,
        	'tujuan_penggunaan'				=> $tujuan_penggunaan,
        	'produk_pembiayaan'				=> $produk_pembiayaan,
			'kode_produk' 					=> $kode_produk,
			'komite_level' 					=> $komite_level,
			'tgl_pengajuan' 				=> $tgl_pengajuan,
			'no_akad' 						=> $no_akad,
			'tgl_akad' 						=> $tgl_akad,
			'cif' 							=> $cif,
			'rek' 							=> $rek,
			'nama_deb' 						=> $nama_deb,
			'nama_alias' 					=> $nama_alias,
			'gelar_non_adm' 				=> $gelar_non_adm,
			'gelar_adm' 					=> $gelar_adm,
			'pendidikan' 					=> $pendidikan,
			'jenis_kelamin' 				=> $jenis_kelamin,
			'tempat_lahir' 					=> $tempat_lahir,
			'tgl_lahir' 					=> $tgl_lahir,
			'jenis_id' 						=> $jenis_id,
			'no_id' 						=> $no_id,
			'no_npwp' 						=> $no_npwp,
			'alamat_deb' 					=> $alamat_deb,
			'kode_negara' 					=> $kode_negara,
			'kode_provinsi' 				=> $kode_provinsi,
			'kode_kota'						=> $kode_kota,
			'kode_kecamatan' 				=> $kode_kecamatan,
			'kode_kelurahan' 				=> $kode_kelurahan,
			'kode_pos' 						=> $kode_pos,
			'no_pstn_deb' 					=> $no_pstn_deb,
			'no_hp_deb' 					=> $no_hp_deb,
			'email' 						=> $email,
			'nama_ibu_kandung' 				=> $nama_ibu_kandung,
			'jml_tanggungan' 				=> $jml_tanggungan,
			'hub_pelapor' 					=> $hub_pelapor,
			'gol_deb' 						=> $gol_deb,
			'stat_kawin_deb' 				=> $stat_kawin_deb,
			'tempat_kerja_deb' 				=> $tempat_kerja_deb,
			'bid_usaha_tempat_kerja_deb' 	=> $bid_usaha_tempat_kerja_deb,
			'alamat_tempat_kerja_deb' 		=> $alamat_tempat_kerja_deb,
			'penghasilan_kotor' 			=> $penghasilan_kotor,
			'sumber_penghasilan' 			=> $sumber_penghasilan,
			'nama_pasangan' 				=> $nama_pasangan,
			'jenis_id_pasangan' 			=> $jenis_id_pasangan,
			'no_id_pasangan' 				=> $no_id_pasangan,
			'tgl_lahir_pasangan' 			=> $tgl_lahir_pasangan,
			'pisah_harta' 					=> $pisah_harta,
			'langgar_bmpk' 					=> $langgar_bmpk,
			'lampaui_bmpk'					=> $lampaui_bmpk,
			'rek_fasilitas' 				=> $rek_fasilitas,
			'sifat_kredit' 					=> $sifat_kredit,
			'jenis_pembiayaan' 				=> $jenis_pembiayaan,
			'akad_kredit' 					=> $akad_kredit,
			'no_akad_awal' 					=> $no_akad_awal,
			'tgl_akad_awal' 				=> $tgl_akad_awal,
			'no_akad_akhir'					=> $no_akad_akhir,
			'tgl_akad_akhir'				=> $tgl_akad_akhir,
			'tgl_kredit_awal'				=> $tgl_kredit_awal,
			'tgl_mulai' 					=> $tgl_mulai,
			'tgl_jt' 						=> $tgl_jt,
			'kategori_deb' 					=> $kategori_deb,
			'jenis_penggunaan' 				=> $jenis_penggunaan,
			'orientasi_penggunaan' 			=> $orientasi_penggunaan,
			'kode_sek_ekonomi' 					=> $kode_sek_ekonomi,
			'mata_uang' 						=> $mata_uang,
			'plafond' 							=> $plafond,
			'jk_waktu' 							=> $jk_waktu,
			'os' 								=> $os,
			'margin' 							=> $margin,
			'bagi_hasil' 						=> $bagi_hasil,
			'jenis_suku_bunga' 					=> $jenis_suku_bunga,
			'kredit_prog_pemerintah' 			=> $kredit_prog_pemerintah,
			'asal_kredit' 						=> $asal_kredit,
			'nilai_proyek' 						=> $nilai_proyek,
			'lokasi_proyek' 					=> $lokasi_proyek,
			'sumber_dana' 						=> $sumber_dana,
			'realisasi' 						=> $realisasi,
			'scoring' 							=> $scoring,
			'tgl_scoring' 						=> $tgl_scoring,
			'sandi_dati2' 						=> $sandi_dati2,
			'group_deb' 						=> $group_deb,
			'nama_group_deb' 					=> $nama_group_deb,
			'stat_badan_usaha_sid' 				=> $stat_badan_usaha_sid,
			'keterkaitan_deb_sid' 				=> $keterkaitan_deb_sid,
			'gol_penjamin_sid' 					=> $gol_penjamin_sid,
			'orientasi_penggunaan_sid' 			=> $orientasi_penggunaan_sid,
			'jenis_kredit_kelolaan_sid' 		=> $jenis_kredit_kelolaan_sid,
			'kode_stat_agunan' 					=> $kode_stat_agunan,
			'kode_jenis_agunan' 				=> $kode_jenis_agunan,
			'peringkat_agunan' 					=> $peringkat_agunan,
			'kode_lembaga_pemeringkat' 			=> $kode_lembaga_pemeringkat,
			'kode_jenis_pengikatan' 			=> $kode_jenis_pengikatan,
			'tgl_pengikatan' 					=> $tgl_pengikatan,
			'nama_pemilik_agunan' 				=> $nama_pemilik_agunan,
			'bukti_kepemilikan' 				=> $bukti_kepemilikan,
			'alamat_agunan' 					=> $alamat_agunan,
			'lokasi_agunan' 					=> $lokasi_agunan,
			'nilai_agunan_njop' 				=> $nilai_agunan_njop,
			'nilai_agunan_pelapor' 				=> $nilai_agunan_pelapor,
			'tgl_penilaian_agunan_pelapor' 		=> $tgl_penilaian_agunan_pelapor,
			'nilai_agunan_independen' 			=> $nilai_agunan_independen,
			'nama_penilai_independen' 			=> $nama_penilai_independen,
			'tgl_penilaian_agunan_independen' 	=> $tgl_penilaian_agunan_independen,
			'stat_paripasu' 					=> $stat_paripasu,
			'persen_paripasu' 					=> $persen_paripasu,
			'asuransi_agunan' 					=> $asuransi_agunan,
			'jenis_pengikatan_sid'				=> $jenis_pengikatan_sid,
			'gol_deb_sid' 						=> $gol_deb_sid,
			'gol_kredit_sid' 					=> $gol_kredit_sid,
			'sek_ekonomi_sid' 					=> $sek_ekonomi_sid,
			'jenis_penggunaan_sid' 				=> $jenis_penggunaan_sid,
			'no_id_penjamin' 					=> $no_id_penjamin,
			'rek_fasilitas_lain' 				=> $rek_fasilitas_lain,
			'kode_jenis_id_penjamin' 			=> $kode_jenis_id_penjamin,
			'nama_penjamin' 					=> $nama_penjamin,
			'nama_lengkap_penjamin' 			=> $nama_lengkap_penjamin,
			'kode_gol_penjamin' 				=> $kode_gol_penjamin,
			'alamat_penjamin' 					=> $alamat_penjamin,
			'persen_fasilitas_dijamin' 			=> $persen_fasilitas_dijamin
		);

		$this->mds->input_data($data, $table);
		$this->load->view('success.php');
	}




		/*$post									= $this->input->post();
		$this->kategori_memo 					= "Perorangan";
		$this->segment 			 				= $this->input->post('frm_008');001"];
		$this->perihal  		 				= $this->input->post('frm_008');002"];
		$this->jenis_akad 		 				= $this->input->post('frm_008');003"];
		$this->tujuan_penggunaan 				= $this->input->post('frm_008');004"];
		$this->produk_pembiayaan				= $this->input->post('frm_008');005"];
		$this->kode_produk 						= $this->input->post('frm_008');006"];
		$this->komite_level 					= $this->input->post('frm_008');007"];
		$this->tgl_pengajuan 					= $this->input->post('frm_008');008"];
		$this->no_akad 							= $this->input->post('frm_008');009"];
		$this->tgl_akad 						= $this->input->post('frm_008');010"];
		$this->cif 								= $this->input->post('frm_008');012"];
		$this->rek 								= $this->input->post('frm_008');013"];
		$this->nama_deb 						= $this->input->post('frm_008');015"];
		$this->nama_alias 						= $this->input->post('frm_008');016"];
		$this->gelar_non_adm 					= $this->input->post('frm_008');017"];
		$this->gelar_adm 						= $this->input->post('frm_008');018"];
		$this->pendidikan 						= $this->input->post('frm_008');019"];
		$this->jenis_kelamin 					= $this->input->post('frm_008');020"];
		$this->tempat_lahir 					= $this->input->post('frm_008');021"];
		$this->tgl_lahir 						= $this->input->post('frm_008');022"];
		$this->jenis_id 						= $this->input->post('frm_008');023"];
		$this->no_id 							= $this->input->post('frm_008');024"];
		$this->no_npwp 							= $this->input->post('frm_008');025"];
		$this->alamat_deb 						= $this->input->post('frm_008');026"];
		$this->kode_negara 						= $this->input->post('frm_008');027"];
		$this->kode_provinsi 					= $this->input->post('frm_008');028"];
		$this->kode_kota 						= $this->input->post('frm_008');029"];
		$this->kode_kecamatan 					= $this->input->post('frm_008');030"];
		$this->kode_kelurahan 					= $this->input->post('frm_008');031"];
		$this->kode_pos 						= $this->input->post('frm_008');032"];
		$this->no_pstn_deb 						= $this->input->post('frm_008');033"];
		$this->no_hp_deb 						= $this->input->post('frm_008');034"];
		$this->email 							= $this->input->post('frm_008');035"];
		$this->nama_ibu_kandung 				= $this->input->post('frm_008');036"];
		$this->jml_tanggungan 					= $this->input->post('frm_008');037"];
		$this->hub_pelapor 						= $this->input->post('frm_008');038"];
		$this->gol_deb 							= $this->input->post('frm_008');039"];
		$this->stat_kawin_deb 					= $this->input->post('frm_008');040"];
		$this->tempat_kerja_deb 				= $this->input->post('frm_008');042"];
		$this->bid_usaha_tempat_kerja_deb 		= $this->input->post('frm_008');043"];
		$this->alamat_tempat_kerja_deb 			= $this->input->post('frm_008');044"];
		$this->penghasilan_kotor 				= $this->input->post('frm_008');045"];
		$this->sumber_penghasilan 				= $this->input->post('frm_008');046"];
		$this->nama_pasangan 					= $this->input->post('frm_008');048"];
		$this->jenis_id_pasangan 				= $this->input->post('frm_008');049"];
		$this->no_id_pasangan 					= $this->input->post('frm_008');050"];
		$this->tgl_lahir_pasangan 				= $this->input->post('frm_008');051"];
		$this->pisah_harta 						= $this->input->post('frm_008');052"];
		$this->langgar_bmpk 					= $this->input->post('frm_008');053"];
		$this->lampaui_bmpk 					= $this->input->post('frm_008');054"];
		$this->rek_fasilitas 					= $this->input->post('frm_008');055"];
		$this->sifat_kredit 					= $this->input->post('frm_008');056"];
		$this->jenis_pembiayaan 				= $this->input->post('frm_008');057"];
		$this->akad_kredit 						= $this->input->post('frm_008');058"];
		$this->no_akad_awal 					= $this->input->post('frm_008');059"];
		$this->tgl_akad_awal 					= $this->input->post('frm_008');060"];
		$this->no_akad_akhir 					= $this->input->post('frm_008');061"];
		$this->tgl_akad_akhir 					= $this->input->post('frm_008');062"];
		$this->tgl_kredit_awal 					= $this->input->post('frm_008');063"];
		$this->tgl_mulai 						= $this->input->post('frm_008');064"];
		$this->tgl_jt 							= $this->input->post('frm_008');065"];
		$this->kategori_deb 					= $this->input->post('frm_008');066"];
		$this->jenis_penggunaan 				= $this->input->post('frm_008');067"];
		$this->orientasi_penggunaan 			= $this->input->post('frm_008');068"];
		$this->kode_sek_ekonomi 				= $this->input->post('frm_008');069"];
		$this->mata_uang 						= $this->input->post('frm_008');070"];
		$this->plafond 							= $this->input->post('frm_008');071"];
		$this->jk_waktu 						= $this->input->post('frm_008');072"];
		$this->os 								= $this->input->post('frm_008');073"];
		$this->margin 							= $this->input->post('frm_008');074"];
		$this->bagi_hasil 						= $this->input->post('frm_008');075"];
		$this->jenis_suku_bunga 				= $this->input->post('frm_008');076"];
		$this->kredit_prog_pemerintah 			= $this->input->post('frm_008');077"];
		$this->asal_kredit 						= $this->input->post('frm_008');078"];
		$this->nilai_proyek 					= $this->input->post('frm_008');079"];
		$this->lokasi_proyek 					= $this->input->post('frm_008');080"];
		$this->sumber_dana 						= $this->input->post('frm_008');081"];
		$this->realisasi 						= $this->input->post('frm_008');082"];
		$this->scoring 							= $this->input->post('frm_008');083"];
		$this->tgl_scoring 						= $this->input->post('frm_008');084"];
		$this->sandi_dati2 						= $this->input->post('frm_008');085"];
		$this->group_deb 						= $this->input->post('frm_008');086"];
		$this->nama_group_deb 					= $this->input->post('frm_008');087"];
		$this->stat_badan_usaha_sid 			= $this->input->post('frm_008');088"];
		$this->keterkaitan_deb_sid 				= $this->input->post('frm_008');089"];
		$this->gol_penjamin_sid 				= $this->input->post('frm_008');090"];
		$this->orientasi_penggunaan_sid 		= $this->input->post('frm_008');091"];
		$this->jenis_kredit_kelolaan_sid 		= $this->input->post('frm_008');092"];
		$this->kode_stat_agunan 				= $this->input->post('frm_008');093"];
		$this->kode_jenis_agunan 				= $this->input->post('frm_008');094"];
		$this->peringkat_agunan 				= $this->input->post('frm_008');095"];
		$this->kode_lembaga_pemeringkat 		= $this->input->post('frm_008');096"];
		$this->kode_jenis_pengikatan 			= $this->input->post('frm_008');097"];
		$this->tgl_pengikatan 					= $this->input->post('frm_008');098"];
		$this->nama_pemilik_agunan 				= $this->input->post('frm_008');099"];
		$this->bukti_kepemilikan 				= $this->input->post('frm_008');100"];
		$this->alamat_agunan 					= $this->input->post('frm_008');101"];
		$this->lokasi_agunan 					= $this->input->post('frm_008');102"];
		$this->nilai_agunan_njop 				= $this->input->post('frm_008');103"];
		$this->nilai_agunan_pelapor 			= $this->input->post('frm_008');104"];
		$this->tgl_penilaian_agunan_pelapor 	= $this->input->post('frm_008');105"];
		$this->nilai_agunan_independen 			= $this->input->post('frm_008');106"];
		$this->nama_penilai_independen 			= $this->input->post('frm_008');107"];
		$this->tgl_penilaian_agunan_independen 	= $this->input->post('frm_008');108"];
		$this->stat_paripasu 					= $this->input->post('frm_008');109"];
		$this->persen_paripasu 					= $this->input->post('frm_008');110"];
		$this->asuransi_agunan 					= $this->input->post('frm_008');111"];
		$this->jenis_pengikatan_sid				= $this->input->post('frm_008');112"];
		$this->gol_deb_sid 						= $this->input->post('frm_008');113"];
		$this->gol_kredit_sid 					= $this->input->post('frm_008');114"];
		$this->sek_ekonomi_sid 					= $this->input->post('frm_008');115"];
		$this->jenis_penggunaan_sid 			= $this->input->post('frm_008');116"];
		$this->no_id_penjamin 					= $this->input->post('frm_008');117"];
		$this->rek_fasilitas_lain 				= $this->input->post('frm_008');118"];
		$this->kode_jenis_id_penjamin 			= $this->input->post('frm_008');119"];
		$this->nama_penjamin 					= $this->input->post('frm_008');120"];
		$this->nama_lengkap_penjamin 			= $this->input->post('frm_008');121"];
		$this->kode_gol_penjamin 				= $this->input->post('frm_008');122"];
		$this->alamat_penjamin 					= $this->input->post('frm_008');123"];
		$this->persen_fasilitas_dijamin 		= $this->input->post('frm_008');124"];

		$this->db->insert($this->tbl_register_personal, $this);*/


	//}
}
