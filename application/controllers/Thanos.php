<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thanos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Thanos_model', 'thanos');
	}

	public function index()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('admin/thanos_page', $data, TRUE);
		$this->load->view('admin/wrapper_thanos', $data);
		
	}

}

/* End of file Thanos.php */
/* Location: ./application/controllers/Thanos.php */