<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NonPerorangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Nonperorangan_model','mds');
		$this->load->model('Step1_model');
	}
	// ---------- Corporate ---------- //
	public function FormCorp()
	{
		$data['step'] = $this->mds->getStep();
		$data['list1'] = $this->mds->step1();
		$data['list2'] = $this->mds->step2();
		$data['list3'] = $this->mds->step3();
		$data['list4'] = $this->mds->step4();
		$data['list5'] = $this->mds->step5();
		$data['list6'] = $this->mds->step6();
		$data['list7'] = $this->mds->step7();
		$data['segment'] = $this->mds->getSegment();
		$data['content'] = $this->load->view('form/new/company/nonperorangan-form-corp', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);	
	}
	public function New()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('form/new/company/cari-corp', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}
	public function hasilCariCorp()
	{
		$data['cari'] = $this->mds->getCariCorp();
		$data['content'] = $this->load->view('form/new/company/result-corp', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}

// ---------- Commercial ---------- //
public function FormComm()
{
	$data['step'] = $this->mds->getStep();
	$data['list1'] = $this->mds->step1();
	$data['list2'] = $this->mds->step2();
	$data['list3'] = $this->mds->step3();
	$data['list4'] = $this->mds->step4();
	$data['list5'] = $this->mds->step5();
	$data['list6'] = $this->mds->step6();
	$data['list7'] = $this->mds->step7();
	$data['segment'] = $this->mds->getSegment();
	$data['content'] = $this->load->view('form/new/company/nonperorangan-form-comm', $data, TRUE);
	$this->load->view('template/mainwrapper', $data);	
}
public function cari_Comm()
{
	$data['title'] = '';
	$data['content'] = $this->load->view('form/new/company/cari-comm', $data, TRUE);
	$this->load->view('template/mainwrapper', $data);
}
public function hasilCariComm()
{
	$data['cari'] = $this->mds->getCariComm();
	$data['content'] = $this->load->view('form/new/company/result-comm', $data, TRUE);
	$this->load->view('template/mainwrapper', $data);
}

// ---------- SMM ---------- //
public function FormSmm()
{
	$data['step'] = $this->mds->getStep();
	$data['list1'] = $this->mds->step1();
	$data['list2'] = $this->mds->step2();
	$data['list3'] = $this->mds->step3();
	$data['list4'] = $this->mds->step4();
	$data['list5'] = $this->mds->step5();
	$data['list6'] = $this->mds->step6();
	$data['list7'] = $this->mds->step7();
	$data['segment'] = $this->mds->getSegment();
	$data['content'] = $this->load->view('form/new/company/nonperorangan-form-smm', $data, TRUE);
	$this->load->view('template/mainwrapper', $data);	
}
public function cari_Smm()
{
	$data['title'] = '';
	$data['content'] = $this->load->view('form/new/company/cari-smm', $data, TRUE);
	$this->load->view('template/mainwrapper', $data);
}
public function hasilCariSmm()
{
	$data['cari'] = $this->mds->getCariSmm();
	$data['content'] = $this->load->view('form/new/company/result-smm', $data, TRUE);
	$this->load->view('template/mainwrapper', $data);
}



	public function form()
	{
		$data['step'] = $this->mds->getStep();
		$data['list1'] = $this->mds->step1();
		$data['list2'] = $this->mds->step2();
		$data['list3'] = $this->mds->step3();
		$data['list4'] = $this->mds->step4();
		$data['list5'] = $this->mds->step5();
		$data['list6'] = $this->mds->step6();
		$data['list7'] = $this->mds->step7();
		$data['segment'] = $this->mds->getSegment();
		$data['content'] = $this->load->view('form/new/company/nonperorangan-form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}

	public function simpanData()
	{
		date_default_timezone_set('Asia/Jakarta');
		$kode_register 	= $this->input->post('kode_register');
		$nama_nasabah 	= $this->input->post('nama_nasabah');
		$segment		= $this->input->post('segment');
		$perihal		= $this->input->post('perihal');
		$akad			= $this->input->post('akad');
		$last_update	= date('Y-m-d H:i:s');

		$data = array(
			'nama_nasabah' 	=> $nama_nasabah,
			'segment'		=> $segment,
			'perihal'		=> $perihal,
			'akad'			=> $akad,
			'last_update'	=> $last_update
		);

		$where = array('kode_register' => $kode_register);

		$this->Mds_model->update_data($where,$data,'tbl_report');
		redirect('mds/mytask');
	}

}