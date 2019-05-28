<!-- Parameter Untuk User Byepass tanpa Login -->
<?php 
	$idCab 	= $this->session->userdata('ses_kode_cbg');
	$idNik 	= $this->session->userdata('ses_nik');
	$user 	= $this->session->userdata('ses_nama'); 
	$role 	= $this->session->userdata('ses_role');
	if ($user == '') {redirect(base_url());}

	$segment_code = $_GET['idseg'];
	if ($segment_code == '1') {$segment = 'Corporate';}
		elseif ($segment_code == '2') {$segment = 'Commercial';}
			elseif ($segment_code == '3') {$segment = 'SMM/SME';}
				elseif ($segment_code == '4') {$segment = 'Consumer';}
					else {$segment = '';}

	$type = $_GET['type'];
	
?>

<div class="portlet-title">
	<h3 style="color: grey">Pencarian Data<small style="color: grey"></small></h3>
</div>
<hr>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="">Home</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Form</a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#"><?php echo ucfirst($segment); ?></a>
			<i class="fa fa-angle-right"></i>
		</li>
		<li>
			<a href="#">Cari</a>
		</li>
	</ul>
</div>
<br>
<div class="box box-danger">
    <div class="form-group" style="padding: 30px">
		<form action="<?php echo base_url('form/cariFass')?>" action="get">
			<div class="form-group">
				<label for="cari">Masukan kata kunci <i>(cif, nama, atau nomor rekening)</i> :</label>
				<input type="text" class="form-control" id="cari" name="cari" placeholder="cif, nama, nomor kartu">
			</div>
			<input class="btn btn-primary" type="submit" value="Cari">
		</form>
    </div>
</div>
