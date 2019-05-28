<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ams extends CI_Controller {
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
		public function index()
	{
		//$this->load->view('template/login');
		$data['title'] = $this->load->view('template/ams_title', $data, TRUE);;
		$data['content'] = $this->load->view('home', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
		
	}
	}

}

/* End of file Ams.php */
/* Location: ./application/controllers/Ams.php */