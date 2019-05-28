<!-- Parameter Untuk User Byepass tanpa Login -->
<?php 
	$idCab = $this->session->userdata('ses_kode_cbg');
	$idNik = $this->session->userdata('ses_nik');
	$user = $this->session->userdata('ses_nama'); 
	if ($user == '') {redirect(base_url());}
?>
<!-- -------- End Parameter -------- -->
<div class="portlet-title">
	<h3 style="color: grey">My Task</h3>
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
			<a href="#">My Task</a>
		</li>
	</ul>
</div>
<div class="form-body">
	<div class="tab-content">
		<div class="row">
	        <div class="col-xs-12">
	            <div class="col-md-12">
	            	
					<table id="listTask" class="display" width="100%">
				        <thead>
				            <tr>
				            	<?php foreach ($title as $data) {
				            	echo "
				            	<th>".$data->header."</th>
				            	";	
				            	} ?>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php 
				        	$no = 1;
				        	foreach ($list as $list) {
				        		if ($list->last_status == 'Draft') {
				        			$link = '#';
				        		} else {$link = base_url('mytask/detail').'?kode_register='.$list->kode_register;}

				        		if ($list->last_status == 'Draft') {$classStatus = 'label label-md label-info';}
				        			elseif ($list->last_status == 'Open') {$classStatus = 'label label-md label-warning';}
				        				else {$classStatus = 'label label-md label-success';}
				        		echo "
				        		<tr>
				        			<td>".$no++."</td>
				        			<td><a href=".$link.">".$list->kode_register."</a></td>
				        			<td>".$list->cif."</td>
				        			<td>".$list->nama_perusahaan."</td>
				        			<td>".$list->segment."</td>
				        			<td>".$list->perihal."</td>
				        			<td><i><span class='".$classStatus."'>".$list->last_status."</span></i></td>
				        			<td>".$list->tgl_update."</td>
				        		</tr>
				        		";
				        	} ?>
				        </tbody>
				        <tfoot>
				            <tr>
				            	<?php foreach ($title as $data) {
				            	echo "
				            	<th>".$data->header."</th>
				            	";	
				            	} ?>
				            </tr>
				        </tfoot>
				    </table>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>