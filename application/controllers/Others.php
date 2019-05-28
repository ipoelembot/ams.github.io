<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Others extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('form/new/company/test_wizard', $data, TRUE);
		$this->load->view('template/main_wrap', $data);
	}

}
