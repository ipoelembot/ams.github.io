<h3>Hasil Pencarian - <i style="color: grey; font-size: 16px">Non Perorangan</i></h3>
<hr>

<div class="wizard-buttons">
    <a href="<?php echo base_url('NonPerorangan/formcorp'); ?>" >
    	<button type="button" class="btn btn-primary">Create New</button>
    </a>
    <a href="<?php echo base_url('NonPerorangan/caricorp'); ?>">
    	<button type="button" class="btn btn-warning">Back</button>
    </a>
</div>
<br>
<div class="box box-danger">
	
    <div class="form-group" style="padding: 30px">

				<div class='box-body'>
				    <table id='report_tables' class='table table-bordered table-hover'>
						<thead>
							<th>App ID</th>
							
							<th>Nama Nasabah</th>
							<th>CIF</th>
							<th>No Kartu</th>
							<th>Jenis Akad</th>
							<th>Plafond</th>
							<th>Tanggal Register</th>
							<th>Action</th>
						</thead>
		<?php
			if(count($cari)>0)
			{
				foreach ($cari as $data) {
				echo "
				    	<tbody>
				    		<td>$data->id</td>
				    		
				    		<td>$data->nama_deb</td>
				    		<td>$data->cif</td>
				    		<td>$data->no_kartu</td>
				    		<td>$data->jenis_akad</td>
				    		<td>$data->plafond</td>
				    		<td>$data->tgl_register</td>
				    		<td></td>				    		
				    	</tbody>";
				    		?>
				    	<?php }
				    ?>
				  	</table>
				  	<?php 
				
			}
		?>
	</div>
</div>
</div>

	

