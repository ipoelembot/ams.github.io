<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function auth_user($nik, $password)
	{
		$query = $this->db->query("SELECT * FROM tb_user WHERE nik = '$nik' AND password = md5('$password') LIMIT 1 ");
		return $query;
	}

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */