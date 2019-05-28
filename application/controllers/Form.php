<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_model','mds');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('form/new/newhome', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}

	public function newForm()
	{
		$data['title'] = $this->mds->Judul();
		$data['akad'] = $this->mds->jenisAkad();
		//$data['kode'] = $this->mds->kode();
		$segment_code = $_GET['idseg'];
		if ($segment_code == '1') {$segment = 'Corporate';}
			elseif ($segment_code == '2') {$segment = 'Commercial';}
				elseif ($segment_code == '3') {$segment = 'SMM/SME';}
					else {$segment = 'Consumer';}

		$type = $_GET['type'];
		$jenisFasilitas = $_POST['jenisFass'];
		if ($jenisFasilitas == 'fd') {$kodeFasilitas = '1';}
			elseif ($jenisFasilitas == 'lc') {$kodeFasilitas = '2';}
				elseif ($jenisFasilitas == 'bg') {$kodeFasilitas = '3';}
		$role = $this->session->userdata('ses_role');
		if ($segment == 'Consumer')
		{
			$data['step']  = $this->mds->getStep2();
			$data['form1'] = $this->mds->step_form1();
			$data['form2'] = $this->mds->step_form2();
			$data['form3'] = $this->mds->step_form3();
			$data['form4'] = $this->mds->step_form4();
			$data['form5'] = $this->mds->step_form5();
			$data['content'] = $this->load->view('form/new/cons_form', $data, TRUE);
			$this->load->view('template/mainwrapper', $data);
		} else 
		{
			$data['fasilitas'] = $jenisFasilitas;
			$data['step']  = $this->mds->getStep1($role);
			$data['form_all'] = $this->mds->step_form_all();
			$data['list_tgl'] = $this->mds->listTgl();
			$data['form1'] = $this->mds->step_form1($role);
			$data['form2'] = $this->mds->step_form2();
			$data['form3'] = $this->mds->step_form3();
			//$data['form4'] = $this->mds->step_form4();
			if ($_POST['jenisFass'] == 'fd') {
				$data['form4'] = $this->mds->step_form4_fd();		
			} elseif ($_POST['jenisFass'] == 'lc') {
				$data['form4'] = $this->mds->step_form4_lc();		
			} else {$data['form4'] = $this->mds->step_form4_bg();}

			$data['form6'] = $this->mds->step_form6();
			$data['form7'] = $this->mds->step_form7();
			
			$data['content'] = $this->load->view('form/new/corp_form', $data, TRUE);
			$this->load->view('template/mainwrapper', $data);
		}
	}
	public function addFass()
	{
		$segment_code = $_GET['idseg'];
		if ($segment_code == '1') {$segment = 'Corporate';}
			elseif ($segment_code == '2') {$segment = 'Commercial';}
				elseif ($segment_code == '3') {$segment = 'SMM/SME';}
					else {$segment = 'Consumer';}

		$type = $_GET['type'];
		$role = $this->session->userdata('ses_role');
		$data['title'] = '';
		$data['content'] = $this->load->view('form/new/carifass', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function cariFass()
	{
		$data['cari'] = $this->mds->cariAddFass();
		$data['content'] = $this->load->view('form/new/carifass', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function kode_produk()
	{
		$segment		= $this->input->post('segment');
		$jenis 			= $this->input->post('jenis');
		$kode_produk 	= $this->mds->kode($jenis, $segment);
		$list 			= "<option value='' selected disabled>Pilih</option>";
		foreach ($kode_produk as $kode_produk) {
			$list .= "<option value='".$kode_produk->id_list."'>".$kode_produk->list."</option>";
		}

		$callback	= array('list_kode'=>$list);
		echo json_encode($callback);
	}
	public function listKabupaten()
	{
		$id_prov	= $this->input->post('id_list');
		$list_kab 	= $this->mds->getKabupaten($id_prov);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($list_kab as $list_kab) {
			$list .= "<option value='".$list_kab->id_list."'>".$list_kab->list."</option>";
		}
		$callback	= array('list_kab'=>$list);
		echo json_encode($callback);
	}
	public function listKecamatan()
	{
		$id_kab		= $this->input->post('id_list');
		$list_kec 	= $this->mds->getKecamatan($id_kab);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($list_kec as $list_kec) {
			$list .= "<option value='".$list_kec->id_list."'>".$list_kec->list."</option>";
		}
		$callback	= array('list_kec'=>$list);
		echo json_encode($callback);
	}
	public function listKelurahan()
	{
		$id_kel		= $this->input->post('id_list');
		$list_kel 	= $this->mds->getKelurahan($id_kel);
		$list 		= "<option selected='selected'>Pilih</option>";
		foreach ($list_kel as $list_kel) {
			$list .= "<option value='".$list_kel->id_list."'>".$list_kel->list."</option>";
		}
		$callback	= array('list_kel'=>$list);
		echo json_encode($callback);
	}

	public function listKodepos()
	{
		$id_kodepos		= $this->input->post('id_list');
		$list_kodepos	= $this->mds->getKodepos($id_kodepos);
		$list 			= "";
		foreach ($list_kodepos as $list_kodepos) {
			$list .= "<option value='".$list_kodepos->id_list."'>".$list_kodepos->list."</option>";
		}
		$callback	= array('list_kodepos'=>$list);
		echo json_encode($callback);
	}
	
	public function list_subsektor()
	{
		$id_sek_eko		= $this->input->post('id_list');
		$list_sub		= $this->mds->getSubsektor($id_sek_eko);
		$list 			= "<option selected='selected'>Pilih</option>";
		foreach ($list_sub as $list_sub) {
			$list .= "<option value='".$list_sub->id_list."'>".$list_sub->list."</option>";
		}
		$callback	= array('list_sub_sek'=>$list);
		echo json_encode($callback);
	}
	public function list_kodesubsektor()
	{
		$id_sub_sek_eko	= $this->input->post('id_list');
		$list_kode		= $this->mds->getKodesubsektor($id_sub_sek_eko);
		$list 			= "<option selected='selected'>Pilih</option>";
		foreach ($list_kode as $list_kode) {
			$list .= "<option value='".$list_kode->id_list."'>".$list_kode->list."</option>";
		}
		$callback	= array('list_kode_sub_sek'=>$list);
		echo json_encode($callback);
	}

	public function listSelect()
	{
		$data['listmenu'] = $this->mds->getIdMenuSelect();
	}

	function simpan_data()
	{
		date_default_timezone_set('Asia/Jakarta');
		$date = date('Y-m-d H:i:s');
		$idSegment = $this->input->post('kode_prdk');
		$idType = $this->input->post('idType');
		$branchCode = $this->session->userdata('ses_kode_cbg');
		$role = $this->session->userdata('ses_kode_cbg');
		$randomInt = mt_rand(1,9999);
		$kode_record = sprintf('%04s',$randomInt);
		$idFass = $this->input->post('idFass');
		$kode_register = $branchCode.$idType.$idFass.$idSegment.$kode_record;
		$user_input = $this->input->post('user_input');
		$tgl_input = $date;
		$kode_cabang = $branchCode;


		$cif = $this->input->post('cif');
		$no_kartu = $this->input->post('no_kartu');
		$no_rek = $this->input->post('no_rek');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$segment = $this->input->post('segment');
		$perihal = $this->input->post('perihal');
		$komite = $this->input->post('komite');
		$sek_eko = $this->input->post('sek_eko');
		$sub_sek_eko = $this->input->post('sub_sek_eko');
		$kode_sek_eko = $this->input->post('kode_sek_eko');
		$nilai_proyek = $this->input->post('nilai_proyek');
		$no_npwp = $this->input->post('no_npwp');
		$bentuk_badan_usaha = $this->input->post('bentuk_badan_usaha');
		$tempat_pendirian = $this->input->post('tempat_pendirian');
		$no_akta_pendirian = $this->input->post('no_akta_pendirian');
		$tgl_pendirian = $this->input->post('tgl_pendirian');
		$no_akta_perubahan = $this->input->post('no_akta_perubahan');
		$tgl_akta_perubahan = $this->input->post('tgl_akta_perubahan');
		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$negara = $this->input->post('negara');
		$provinsi = $this->input->post('provinsi');
		$kota_kab = $this->input->post('kota_kab');
		$kecamatan = $this->input->post('kecamatan');
		$kelurahan = $this->input->post('kelurahan');
		$kodepos = $this->input->post('kodepos');
		$no_ptsn = $this->input->post('no_ptsn');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$tbk = $this->input->post('tbk');
		$hub_pelapor = $this->input->post('hub_pelapor');
		$langgar_bmpk = $this->input->post('langgar_bmpk');
		$lampau_bmpk = $this->input->post('lampau_bmpk');
		$gol_deb = $this->input->post('gol_deb');
		$group_deb = $this->input->post('group_deb');
		$nama_group_deb = $this->input->post('nama_group_deb');
		$bid_usaha_deb = $this->input->post('bid_usaha_deb');
		$kategori_pengurus_saham = $this->input->post('kategori_pengurus_saham');
		$jenis_pengurus = $this->input->post('jenis_pengurus');
		$id_pengurus = $this->input->post('id_pengurus');
		$no_id_pengurus = $this->input->post('no_id_pengurus');
		$nama_pengurus = $this->input->post('nama_pengurus');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$stat_pengurus = $this->input->post('stat_pengurus');
		$alamat_pengurus = $this->input->post('alamat_pengurus');
		$provinsi_pengurus = $this->input->post('provinsi_pengurus');
		$kota_kab_pengurus = $this->input->post('kota_kab_pengurus');
		$kecamatan_pengurus = $this->input->post('kecamatan_pengurus');
		$kelurahan_pengurus = $this->input->post('kelurahan_pengurus');
		$kodepos_pengurus = $this->input->post('kodepos_pengurus');
		$jabatan_pengurus = $this->input->post('jabatan_pengurus');
		$id_pemegang_saham = $this->input->post('id_pemegang_saham');
		$no_id_pemegang_saham = $this->input->post('no_id_pemegang_saham');
		$nama_pemegang_saham = $this->input->post('nama_pemegang_saham');
		$jenis_kelamin_pemegang_saham = $this->input->post('jenis_kelamin_pemegang_saham');
		$stat_pemegang_saham = $this->input->post('stat_pemegang_saham');
		$persentase_kepemilikan_saham = $this->input->post('persentase_kepemilikan_saham');
		$jenis_data_fasilitas = $this->input->post('jenis_data_fasilitas');
		$sifat_kredit = $this->input->post('sifat_kredit');
		$jenis_kredit = $this->input->post('jenis_kredit');
		$tgl_pencairan = $this->input->post('tgl_pencairan');
		$tgl_jt = $this->input->post('tgl_jt');
		$tujuan_penggunaan = $this->input->post('tujuan_penggunaan');
		$jenis_akad = $this->input->post('jenis_akad');
		$orientasi_penggunaan = $this->input->post('orientasi_penggunaan');
		$mata_uang = $this->input->post('mata_uang');
		$plafond = $this->input->post('plafond');
		$margin = $this->input->post('margin');
		$kredit_prog_pemerintah = $this->input->post('kredit_prog_pemerintah');
		$asal_kredit = $this->input->post('asal_kredit');
		$sumber_dana = $this->input->post('sumber_dana');
		$nominal_pencairan_pertama = $this->input->post('nominal_pencairan_pertama');
		$no_akad_awal = $this->input->post('no_akad_awal');
		$tgl_akad_awal = $this->input->post('tgl_akad_awal');
		$no_akad_akhir = $this->input->post('no_akad_akhir');
		$tgl_akad_akhir = $this->input->post('tgl_akad_akhir');
		$tgl_awal_kredit = $this->input->post('tgl_awal_kredit');
		$provinsi_proyek = $this->input->post('provinsi_proyek');
		$kab_kota_proyek = $this->input->post('kab_kota_proyek');
		$kecamatan_proyek = $this->input->post('kecamatan_proyek');
		$kelurahan_proyek = $this->input->post('kelurahan_proyek');
		$kodepos_proyek = $this->input->post('kodepos_proyek');
		$no_lc = $this->input->post('no_lc');
		$jenis_lc = $this->input->post('jenis_lc');
		$tujuan_lc = $this->input->post('tujuan_lc');
		$tgl_keluar_lc = $this->input->post('tgl_keluar_lc');
		$tgl_jt_lc = $this->input->post('tgl_jt_lc');
		$no_akad_awal_lc = $this->input->post('no_akad_awal_lc');
		$tgl_akad_awal_lc = $this->input->post('tgl_akad_awal_lc');
		$no_akad_akhir_lc = $this->input->post('no_akad_akhir_lc');
		$tgl_akad_akhir_lc = $this->input->post('tgl_akad_akhir_lc');
		$bank_counterparty = $this->input->post('bank_counterparty');
		$mata_uang_lc = $this->input->post('mata_uang_lc');
		$plafond_lc = $this->input->post('plafond_lc');
		$nominal_lc = $this->input->post('nominal_lc');
		$setoran_jaminan_lc = $this->input->post('setoran_jaminan_lc');
		$no_rekening_bg = $this->input->post('no_rekening_bg');
		$jenis_bg = $this->input->post('jenis_bg');
		$tujuan_bg = $this->input->post('tujuan_bg');
		$tgl_penerbitan = $this->input->post('tgl_penerbitan');
		$tgl_jt_bg = $this->input->post('tgl_jt_bg');
		$no_akad_awal_bg = $this->input->post('no_akad_awal_bg');
		$tgl_akad_awal_bg = $this->input->post('tgl_akad_awal_bg');
		$no_akad_akhir_bg = $this->input->post('no_akad_akhir_bg');
		$tgl_akad_akhir_bg = $this->input->post('tgl_akad_akhir_bg');
		$nama_dijamin_bg = $this->input->post('nama_dijamin_bg');
		$mata_uang_bg = $this->input->post('mata_uang_bg');
		$plafon_bg = $this->input->post('plafon_bg');
		$nominal_bg = $this->input->post('nominal_bg');
		$setoran_jaminan_bg = $this->input->post('setoran_jaminan_bg');
		$kategori_deb = $this->input->post('kategori_deb');
		$nilai_rating_internal = $this->input->post('nilai_rating_internal');
		$tgl_rating_internal = $this->input->post('tgl_rating_internal');
		$peringkat_deb_ex = $this->input->post('peringkat_deb_ex');
		$lembaga_rating_ex = $this->input->post('lembaga_rating_ex');
		$tgl_pemeringkat_ex = $this->input->post('tgl_pemeringkat_ex');
		$tahun_laporan = $this->input->post('tahun_laporan');
		$aset = $this->input->post('aset');
		$aset_lancar = $this->input->post('aset_lancar');
		$kas_aset_lancar = $this->input->post('kas_aset_lancar');
		$piutang_aset_lancar = $this->input->post('piutang_aset_lancar');
		$investasi_aset_lancar = $this->input->post('investasi_aset_lancar');
		$aset_lancar_lain = $this->input->post('aset_lancar_lain');
		$aset_tdk_lancar = $this->input->post('aset_tdk_lancar');
		$piutang_aset_tdk_lancar = $this->input->post('piutang_aset_tdk_lancar');
		$investasi_aset_tdk_lancar = $this->input->post('investasi_aset_tdk_lancar');
		$aset_tdk_lancar_lain = $this->input->post('aset_tdk_lancar_lain');
		$liabilitas = $this->input->post('liabilitas');
		$liabilitas_jk_pendek = $this->input->post('liabilitas_jk_pendek');
		$pinjaman_jk_pendek = $this->input->post('pinjaman_jk_pendek');
		$utang_usaha_jk_pendek = $this->input->post('utang_usaha_jk_pendek');
		$liabilitas_jk_pendek_lain = $this->input->post('liabilitas_jk_pendek_lain');
		$liabilitas_jk_panjang = $this->input->post('liabilitas_jk_panjang');
		$pinjaman_jangka_ops = $this->input->post('pinjaman_jangka_ops');
		$utang_jk_jangka_panjang = $this->input->post('utang_jk_jangka_panjang');
		$liabilitas_jk_panjang_lain = $this->input->post('liabilitas_jk_panjang_lain');
		$ekuitas = $this->input->post('ekuitas');
		$pendapatan_usaha = $this->input->post('pendapatan_usaha');
		$beban_pokok_ops = $this->input->post('beban_pokok_ops');
		$laba_rugi = $this->input->post('laba_rugi');
		$pendapatan_non_ops_lain = $this->input->post('pendapatan_non_ops_lain');
		$beban_lain_non_ops = $this->input->post('beban_lain_non_ops');
		$laba_rugi_sblm_pajak = $this->input->post('laba_rugi_sblm_pajak');
		$laba_rugi_thn_berjalan = $this->input->post('laba_rugi_thn_berjalan');
		$jenis_pengikatan = $this->input->post('jenis_pengikatan');
		$status_agunan = $this->input->post('status_agunan');
		$jenis_agunan = $this->input->post('jenis_agunan');
		$peringkat_agunan = $this->input->post('peringkat_agunan');
		$lembaga_pemeringkat_agunan = $this->input->post('lembaga_pemeringkat_agunan');
		$tgl_pengikatan = $this->input->post('tgl_pengikatan');
		$nama_pemilik_agunan = $this->input->post('nama_pemilik_agunan');
		$bukti_pemilik = $this->input->post('bukti_pemilik');
		$alamat_agunan = $this->input->post('alamat_agunan');
		$nilai_agunan_njop = $this->input->post('nilai_agunan_njop');
		$nilai_agunan_pelapor = $this->input->post('nilai_agunan_pelapor');
		$tgl_penilaian_agunan_pelapor = $this->input->post('tgl_penilaian_agunan_pelapor');
		$nilai_agunan_independen = $this->input->post('nilai_agunan_independen');
		$nama_penilai_independen = $this->input->post('nama_penilai_independen');
		$tgl_penilaian_agunan_independen = $this->input->post('tgl_penilaian_agunan_independen');
		$stat_paripasu = $this->input->post('stat_paripasu');
		$persentase_paripasu = $this->input->post('persentase_paripasu');
		$asuransi = $this->input->post('asuransi');
		$jenis_penjamin = $this->input->post('jenis_penjamin');
		$no_id_penjamin = $this->input->post('no_id_penjamin');
		$no_rek_fasilitas_penjamin = $this->input->post('no_rek_fasilitas_penjamin');
		$jenis_id_penjamin = $this->input->post('jenis_id_penjamin');
		$nama_penjamin = $this->input->post('nama_penjamin');
		$nama_lengkap_penjamin = $this->input->post('nama_lengkap_penjamin');
		$gol_penjamin = $this->input->post('gol_penjamin');
		$alamat_penjamin = $this->input->post('alamat_penjamin');
		$persen_fas_dijamin = $this->input->post('persen_fas_dijamin');
		$provinsi_agunan = $this->input->post('provinsi_agunan');
		$kota_agunan = $this->input->post('kota_agunan');
		$kec_agunan = $this->input->post('kec_agunan');
		$kel_agunan = $this->input->post('kel_agunan');
		$kodepos_agunan = $this->input->post('kodepos_agunan');

		


		$data = array (

			'cif' => $cif,
			'no_kartu' => $no_kartu,
			'no_rek' => $no_rek,
			'nama_perusahaan' => strtoupper($nama_perusahaan),
			'segment' => $segment,
			'perihal' => $perihal,
			'komite' => $komite,
			'sek_eko' => $sek_eko,
			'sub_sek_eko' => $sub_sek_eko,
			'kode_sek_eko' => $kode_sek_eko,
			'nilai_proyek' => $nilai_proyek,
			'no_npwp' => $no_npwp,
			'bentuk_badan_usaha' => $bentuk_badan_usaha,
			'tempat_pendirian' => $tempat_pendirian,
			'no_akta_pendirian' => $no_akta_pendirian,
			'tgl_pendirian' => date("Y-m-d", strtotime(strtr($tgl_pendirian,'/','-'))),
			'no_akta_perubahan' => $no_akta_perubahan,
			'tgl_akta_perubahan' => date("Y-m-d", strtotime(strtr($tgl_akta_perubahan,'/','-'))),
			'alamat_perusahaan' => strtoupper($alamat_perusahaan),
			'negara' => $negara,
			'provinsi' => $provinsi,
			'kota_kab' => $kota_kab,
			'kecamatan' => $kecamatan,
			'kelurahan' => $kelurahan,
			'kodepos' => $kodepos,
			'no_ptsn' => $no_ptsn,
			'no_hp' => $no_hp,
			'email' => $email,
			'tbk' => $tbk,
			'hub_pelapor' => $hub_pelapor,
			'langgar_bmpk' => $langgar_bmpk,
			'lampau_bmpk' => $lampau_bmpk,
			'gol_deb' => $gol_deb,
			'group_deb' => $group_deb,
			'nama_group_deb' => $nama_group_deb,
			'bid_usaha_deb' => $bid_usaha_deb,
			'kategori_pengurus_saham' => $kategori_pengurus_saham,
			'jenis_pengurus' => $jenis_pengurus,
			'id_pengurus' => $id_pengurus,
			'no_id_pengurus' => $no_id_pengurus,
			'nama_pengurus' => strtoupper($nama_pengurus),
			'jenis_kelamin' => $jenis_kelamin,
			'stat_pengurus' => $stat_pengurus,
			'alamat_pengurus' => strtoupper($alamat_pengurus),
			'provinsi_pengurus' => $provinsi_pengurus,
			'kota_kab_pengurus' => $kota_kab_pengurus,
			'kecamatan_pengurus' => $kecamatan_pengurus,
			'kelurahan_pengurus' => $kelurahan_pengurus,
			'kodepos_pengurus' => $kodepos_pengurus,
			'jabatan_pengurus' => $jabatan_pengurus,
			'id_pemegang_saham' => $id_pemegang_saham,
			'no_id_pemegang_saham' => $no_id_pemegang_saham,
			'nama_pemegang_saham' => strtoupper($nama_pemegang_saham),
			'jenis_kelamin_pemegang_saham' => $jenis_kelamin_pemegang_saham,
			'stat_pemegang_saham' => $stat_pemegang_saham,
			'persentase_kepemilikan_saham' => $persentase_kepemilikan_saham,
			'jenis_data_fasilitas' => $jenis_data_fasilitas,
			'sifat_kredit' => $sifat_kredit,
			'jenis_kredit' => $jenis_kredit,
			'tgl_pencairan' => date("Y-m-d", strtotime(strtr($tgl_pencairan,'/','-'))),
			'tgl_jt' => date("Y-m-d", strtotime(strtr($tgl_jt,'/','-'))),
			'tujuan_penggunaan' => $tujuan_penggunaan,
			'jenis_akad' => $jenis_akad,
			'orientasi_penggunaan' => $orientasi_penggunaan,
			'mata_uang' => $mata_uang,
			'plafond' => $plafond,
			'margin' => $margin,
			'kredit_prog_pemerintah' => $kredit_prog_pemerintah,
			'asal_kredit' => $asal_kredit,
			'sumber_dana' => $sumber_dana,
			'nominal_pencairan_pertama' => $nominal_pencairan_pertama,
			'no_akad_awal' => $no_akad_awal,
			'tgl_akad_awal' => date("Y-m-d", strtotime(strtr($tgl_akad_awal,'/','-'))),
			'no_akad_akhir' => $no_akad_akhir,
			'tgl_akad_akhir' => date("Y-m-d", strtotime(strtr($tgl_akad_akhir,'/','-'))),
			'tgl_awal_kredit' => date("Y-m-d", strtotime(strtr($tgl_awal_kredit,'/','-'))),
			'provinsi_proyek' => $provinsi_proyek,
			'kab_kota_proyek' => $kab_kota_proyek,
			'kecamatan_proyek' => $kecamatan_proyek,
			'kelurahan_proyek' => $kelurahan_proyek,
			'kodepos_proyek' => $kodepos_proyek,
			'no_lc' => $no_lc,
			'jenis_lc' => $jenis_lc,
			'tujuan_lc' => $tujuan_lc,
			'tgl_keluar_lc' => date("Y-m-d", strtotime(strtr($tgl_keluar_lc,'/','-'))),
			'tgl_jt_lc' => date("Y-m-d", strtotime(strtr($tgl_jt_lc,'/','-'))),
			'no_akad_awal_lc' => $no_akad_awal_lc,
			'tgl_akad_awal_lc' => date("Y-m-d", strtotime(strtr($tgl_akad_awal_lc,'/','-'))),
			'no_akad_akhir_lc' => $no_akad_akhir_lc,
			'tgl_akad_akhir_lc' => date("Y-m-d", strtotime(strtr($tgl_akad_akhir_lc,'/','-'))),
			'bank_counterparty' => $bank_counterparty,
			'mata_uang_lc' => $mata_uang_lc,
			'plafond_lc' => $plafond_lc,
			'nominal_lc' => $nominal_lc,
			'setoran_jaminan_lc' => $setoran_jaminan_lc,
			'no_rekening_bg' => $no_rekening_bg,
			'jenis_bg' => $jenis_bg,
			'tujuan_bg' => $tujuan_bg,
			'tgl_penerbitan' => date("Y-m-d", strtotime(strtr($tgl_penerbitan,'/','-'))),
			'tgl_jt_bg' => date("Y-m-d", strtotime(strtr($tgl_jt_bg,'/','-'))),
			'no_akad_awal_bg' => $no_akad_awal_bg,
			'tgl_akad_awal_bg' => date("Y-m-d", strtotime(strtr($tgl_akad_awal_bg,'/','-'))),
			'no_akad_akhir_bg' => $no_akad_akhir_bg,
			'tgl_akad_akhir_bg' => date("Y-m-d", strtotime(strtr($tgl_akad_akhir_bg,'/','-'))),
			'nama_dijamin_bg' => strtoupper($nama_dijamin_bg),
			'mata_uang_bg' => $mata_uang_bg,
			'plafon_bg' => $plafon_bg,
			'nominal_bg' => $nominal_bg,
			'setoran_jaminan_bg' => $setoran_jaminan_bg,
			'kategori_deb' => $kategori_deb,
			'nilai_rating_internal' => $nilai_rating_internal,
			'tgl_rating_internal' => date("Y-m-d", strtotime(strtr($tgl_rating_internal,'/','-'))),
			'peringkat_deb_ex' => $peringkat_deb_ex,
			'lembaga_rating_ex' => $lembaga_rating_ex,
			'tgl_pemeringkat_ex' => date("Y-m-d", strtotime(strtr($tgl_pemeringkat_ex,'/','-'))),
			'tahun_laporan' => $tahun_laporan,
			'aset' => $aset,
			'aset_lancar' => $aset_lancar,
			'kas_aset_lancar' => $kas_aset_lancar,
			'piutang_aset_lancar' => $piutang_aset_lancar,
			'investasi_aset_lancar' => $investasi_aset_lancar,
			'aset_lancar_lain' => $aset_lancar_lain,
			'aset_tdk_lancar' => $aset_tdk_lancar,
			'piutang_aset_tdk_lancar' => $piutang_aset_tdk_lancar,
			'investasi_aset_tdk_lancar' => $investasi_aset_tdk_lancar,
			'aset_tdk_lancar_lain' => $aset_tdk_lancar_lain,
			'liabilitas' => $liabilitas,
			'liabilitas_jk_pendek' => $liabilitas_jk_pendek,
			'pinjaman_jk_pendek' => $pinjaman_jk_pendek,
			'utang_usaha_jk_pendek' => $utang_usaha_jk_pendek,
			'liabilitas_jk_pendek_lain' => $liabilitas_jk_pendek_lain,
			'liabilitas_jk_panjang' => $liabilitas_jk_panjang,
			'pinjaman_jangka_ops' => $pinjaman_jangka_ops,
			'utang_jk_jangka_panjang' => $utang_jk_jangka_panjang,
			'liabilitas_jk_panjang_lain' => $liabilitas_jk_panjang_lain,
			'ekuitas' => $ekuitas,
			'pendapatan_usaha' => $pendapatan_usaha,
			'beban_pokok_ops' => $beban_pokok_ops,
			'laba_rugi' => $laba_rugi,
			'pendapatan_non_ops_lain' => $pendapatan_non_ops_lain,
			'beban_lain_non_ops' => $beban_lain_non_ops,
			'laba_rugi_sblm_pajak' => $laba_rugi_sblm_pajak,
			'laba_rugi_thn_berjalan' => $laba_rugi_thn_berjalan,
			'jenis_pengikatan' => $jenis_pengikatan,
			'status_agunan' => $status_agunan,
			'jenis_agunan' => $jenis_agunan,
			'peringkat_agunan' => $peringkat_agunan,
			'lembaga_pemeringkat_agunan' => $lembaga_pemeringkat_agunan,
			'tgl_pengikatan' => date("Y-m-d", strtotime(strtr($tgl_pengikatan,'/','-'))),
			'nama_pemilik_agunan' => strtoupper($nama_pemilik_agunan),
			'bukti_pemilik' => $bukti_pemilik,
			'alamat_agunan' => strtoupper($alamat_agunan),
			'nilai_agunan_njop' => $nilai_agunan_njop,
			'nilai_agunan_pelapor' => $nilai_agunan_pelapor,
			'tgl_penilaian_agunan_pelapor' => date("Y-m-d", strtotime(strtr($tgl_penilaian_agunan_pelapor,'/','-'))),
			'nilai_agunan_independen' => $nilai_agunan_independen,
			'nama_penilai_independen' => strtoupper($nama_penilai_independen),
			'tgl_penilaian_agunan_independen' => date("Y-m-d", strtotime(strtr($tgl_penilaian_agunan_independen,'/','-'))),
			'stat_paripasu' => $stat_paripasu,
			'persentase_paripasu' => $persentase_paripasu,
			'asuransi' => $asuransi,
			'jenis_penjamin' => $jenis_penjamin,
			'no_id_penjamin' => $no_id_penjamin,
			'no_rek_fasilitas_penjamin' => $no_rek_fasilitas_penjamin,
			'jenis_id_penjamin' => $jenis_id_penjamin,
			'nama_penjamin' => strtoupper($nama_penjamin),
			'nama_lengkap_penjamin' => strtoupper($nama_lengkap_penjamin),
			'gol_penjamin' => $gol_penjamin,
			'alamat_penjamin' => strtoupper($alamat_penjamin),
			'persen_fas_dijamin' => $persen_fas_dijamin,
			'provinsi_agunan' => $provinsi_agunan,
			'kota_agunan' => $kota_agunan,
			'kec_agunan' => $kec_agunan,
			'kel_agunan' => $kel_agunan,
			'kodepos_agunan' => $kodepos_agunan,

			'kode_register' => $kode_register,
			'user_input' => $user_input,
			'tgl_input' => $tgl_input,
			'tgl_update' => $tgl_input,
			'last_status' => 'New',
			'kode_cabang' => $kode_cabang,
			'flag_rm' => 'Y'


		);
		$this->mds->simpan_data($data,'tb_vallrecordnon');
		redirect('mytask');
	}
}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */