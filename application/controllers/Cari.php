<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Cari_model','cari');
		
	}
	public function index()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('form/new/cari', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}

}

/* End of file Cari.php */
/* Location: ./application/controllers/Cari.php */