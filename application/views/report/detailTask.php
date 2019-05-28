<!-- Parameter Untuk User Byepass tanpa Login -->
<?php 
	$idCab = $this->session->userdata('ses_kode_cbg');
	$idNik = $this->session->userdata('ses_nik');
	$user = $this->session->userdata('ses_nama'); 
	if ($user == '') {redirect(base_url());}
?>