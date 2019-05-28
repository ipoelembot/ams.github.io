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
<!-- -------- End Parameter -------- -->

<div class="portlet-title">
	<h3 style="color: grey"><?php echo ucfirst($segment); ?> </small></h3>
</div>
<hr>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="index.html">Home</a>
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
			<a href="#">New</a>
		</li>
	</ul>
</div>
<div class="row" style="margin-left: 20px; margin-right: 20px">
	<div class="col-md-12">
		<div class="portlet box">
			<div class="portlet-body form">
				
				<!-- Form -->
				<form method="post">
					<div class="form-wizard">
						<div class="form-body">
							<div class="tab-content">
							<input type="hidden" name="user_input" value="<?php echo $user;?>">
							<input type="hidden" name="role" value="<?php echo $role;?>">
							<input type="hidden" name="kode_bulan" value="<?php echo date('m');?>">
							<input type="hidden" name="kode_tahun" value="<?php echo date('y');?>">
							<input type="hidden" name="kode_prdk" value="<?php echo $segment_code;?>">
							<input type="hidden" name="idType" value="<?php echo $type;?>">
							<input type="hidden" name="idseg" value="<?php echo $segment_code;?>">

							<div class="col-md-4" style="margin-top: 20px">
								<label>Jenis Fasilitas :</label>
								<select class="form-control select2me" id="jenisFass" name="jenisFass">
									<option value="fd">Funded</option>
									<option value="lc">Non Funded - L/C</option>
									<option value="bg">Non Funded - B/G</option>
								</select>
								<br>
								
								<input value="Pengajuan Baru" type="submit" class="btn btn-primary btn-sm" onclick="javascript: form.action='<?php echo base_url('form/newform');?>?type=<?php echo $type;?>&idseg=<?php echo $segment_code;?>'" style="margin-top: 20px; padding: 10px">
								<input value="Penambahan Fasilitas" type="submit" class="btn btn-warning btn-sm" onclick="javascript: form.action='<?php echo base_url('form/addFass');?>?type=<?php echo $type;?>&idseg=<?php echo $segment_code;?>'" style="margin-top: 20px; padding: 10px">
							</div>
							</div>
						</div>
					</div>
				</form>
				<!-- End Form -->
			</div>
		</div>
	</div>
</div>