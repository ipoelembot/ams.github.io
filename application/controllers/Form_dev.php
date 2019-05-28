<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = '';
		$data['content'] = $this->load->view('form/new/corp_form', $data, TRUE);
		$this->load->view('template/mainwrapper', $data);
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */