<h3>Hasil Pencarian</h3>
<hr>

<div class="wizard-buttons">
    <a href="<?php echo base_url('perorangan/form'); ?>" >
    	<button type="button" class="btn btn-primary">Create New</button>
    </a>
    <a href="<?php echo base_url('perorangan/cari'); ?>">
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
							<th>Segment</th>
							<th>Perihal</th>
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
				    		<td>$data->nama_deb</td> ";

		    		$data_segment = $this->db->query("SELECT DISTINCT list FROM tbl_segment WHERE tbl_segment.id_list = '".$data->segment."'");
		    		foreach ($data_segment->result() as $data_segment) {
		    			echo "<td>".$data_segment->list."</td>";
		    		}


		    		$data_perihal = $this->db->query("SELECT DISTINCT list FROM tbl_perihal WHERE tbl_perihal.id_list = '".$data->perihal."'");
		    		foreach ($data_perihal->result() as $data_perihal) {
		    			echo "<td>".$data_perihal->list."</td>";
		    		}

		    		$data_jenis_akad = $this->db->query("SELECT DISTINCT list FROM tbl_jenis_akad WHERE tbl_jenis_akad.id_list = '".$data->jenis_akad."'");
		    		foreach ($data_jenis_akad->result() as $data_jenis_akad) {
		    			echo "<td>".$data_jenis_akad->list."</td>";
		    		}

		    		echo "
				    		<td>".number_format($data->plafond,0,',','.')."</td>
				    		<td>".date('d F Y H:i:s', strtotime($data->tgl_register))."</td>
				    		<td> "; ?>
		    					<a href="<?php echo base_url('mds/edit/'.$data->id.''); ?>" class='btn btn-primary'>Edit</a>
		    				</td>				    		
				    	</tbody>
				    		
				    	<?php }
				    ?>
				  	</table>
				  	<?php 
				
			}
		?>
	</div>
</div>
</div>

	

