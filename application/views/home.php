<div style="text-align: center; width: 100%;">
<?php 
	$user 	= $this->session->userdata('ses_nama');
	$nik	= $this->session->userdata('ses_nik');

	if ($user == '') {
		redirect(base_url());
	}
	else {
		echo "<h2 style='color: darkgrey'>Assalamu'alaikum Wr. Wb.</h2>";
	}
?>
	<img style="width: 20%; padding-top: 30px;" src="<?php echo base_url(); ?>img/ayohijrah.png" alt="#AyoHijrah">
</div>