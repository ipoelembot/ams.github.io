<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mytask extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mytask_model', 'task');
	}

	public function index()
	{
		
		$kodecabang = $this->session->userdata('ses_kode_cbg');

		$data['title'] = $this->task->headerMytask();
		$data['list'] = $this->task->listTask($kodecabang);
		$data['content'] = $this->load->view('report/mytask', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}

	public function detail()
	{
		$kodeRegister = $_GET['kode_register'];
		$data['detail'] = $this->task->detailTask($kodeRegister);
		$data['content'] = $this->load->view('report/detailTask', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}

}

/* End of file Mytask.php */
/* Location: ./application/controllers/Mytask.php */