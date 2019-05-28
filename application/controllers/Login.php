<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	function index()
	{
		$this->load->view('template/login');
	}

	function auth()
	{
        $nik = htmlspecialchars($this->input->post('nik',TRUE),ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_user = $this->Login_model->auth_user($nik,$password);

        if($cek_user->num_rows() > 0)
        	{
				$data = $cek_user->row_array();
        		$this->session->set_userdata('masuk',TRUE);
		         if($data['level']=='1'){ 
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('ses_role',$data['role']);
		            $this->session->set_userdata('ses_nama',$data['username']);
		            $this->session->set_userdata('ses_nik',$data['nik']);
		            $this->session->set_userdata('ses_kode_cbg',$data['kode_cabang']);
		            redirect('mds');

		         } elseif ($data['level']=='2')  
		         {
		            $this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_role',$data['role']);
		            $this->session->set_userdata('ses_nama',$data['username']);
		            $this->session->set_userdata('ses_nik',$data['nik']);
		            $this->session->set_userdata('ses_kode_cbg',$data['kode_cabang']);
		            redirect('mds');
		         } elseif ($data['level']=='3')  
		         {
		            $this->session->set_userdata('akses','3');
					$this->session->set_userdata('ses_role',$data['role']);
		            $this->session->set_userdata('ses_nama',$data['username']);
		            $this->session->set_userdata('ses_nik',$data['nik']);
		            $this->session->set_userdata('ses_kode_cbg',$data['kode_cabang']);
		            redirect('mds');
		         } elseif ($data['level']=='4')  
		         {
		            $this->session->set_userdata('akses','4');
					$this->session->set_userdata('ses_role',$data['role']);
		            $this->session->set_userdata('ses_nama',$data['username']);
		            $this->session->set_userdata('ses_nik',$data['nik']);
		            $this->session->set_userdata('ses_kode_cbg',$data['kode_cabang']);
		            redirect('mds');
		         } elseif ($data['level']=='5')  
		         {
		            $this->session->set_userdata('akses','5');
					$this->session->set_userdata('ses_role',$data['role']);
		            $this->session->set_userdata('ses_nama',$data['username']);
		            $this->session->set_userdata('ses_nik',$data['nik']);
		            $this->session->set_userdata('ses_kode_cbg',$data['kode_cabang']);
		            redirect('mds');
		         } elseif ($data['level']=='6')  
		         {
		            $this->session->set_userdata('akses','6');
					$this->session->set_userdata('ses_role',$data['role']);
		            $this->session->set_userdata('ses_nama',$data['username']);
		            $this->session->set_userdata('ses_nik',$data['nik']);
		            $this->session->set_userdata('ses_kode_cbg',$data['kode_cabang']);
		            redirect('mds');
		         } 

        } else { 
					$cek_user_lain = $this->Login_model->auth_user($nik,$password);
					if($cek_user_lain->num_rows() > 0)
					{
						$data = $cek_user_lain->row_array();
        				$this->session->set_userdata('masuk',TRUE);
						$this->session->set_userdata('akses','3');
						$this->session->set_userdata('ses_role',$data['role']);
						$this->session->set_userdata('ses_nama',$data['username']);
						$this->session->set_userdata('ses_nik',$data['nik']);
						$this->session->set_userdata('ses_kode_cbg',$data['kode_cabang']);
						redirect('form');
					} else {  // jika username dan password tidak ditemukan atau salah
							$url = base_url();
							echo $this->session->set_flashdata('msg','Username Atau Password Salah');
							redirect($url);
					}
        }

    }
    function logout()
    {
	    $this->session->sess_destroy();
        $url = base_url();
        redirect($url);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */