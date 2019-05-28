<h3>My Task</h3>
<hr>
    <div class="box box-primary">
		<div class="box-body">
		    <table id="report_tables" class="table table-bordered table-hover">
				<thead>
					<th>App ID</th>
					<th>Nama Nasabah</th>
					<th>Segment</th>
					<th>Perihal</th>
					<th>Jenis Akad</th>
					<th>Plafond</th>
					<th>Tanggal Register</th>
					<th>Last Update</th>
					<th>Action</th>
				</thead>
				

		    	<tbody>
		    	
		    	<?php
		    	$isNull = 0;
		    	foreach ($data as $data) { ?>
		    		<td><?php echo $data->id; ?></td>
		    		<td><?php echo $data->nama_deb; ?></td>

		    		<?php
		    		$data_segment = $this->db->query("SELECT DISTINCT list FROM tbl_segment WHERE tbl_segment.id_list = '".$data->segment."'");
		    		foreach ($data_segment->result() as $data_segment) {
		    			echo "<td>".$data_segment->list."</td>";
		    		}
		    		?>
		    		<?php
		    		$data_perihal = $this->db->query("SELECT DISTINCT list FROM tbl_perihal WHERE tbl_perihal.id_list = '".$data->perihal."'");
		    		foreach ($data_perihal->result() as $data_perihal) {
		    			echo "<td>".$data_perihal->list."</td>";
		    		}
		    		?>
		    		<?php
		    		$data_jenis_akad = $this->db->query("SELECT DISTINCT list FROM tbl_jenis_akad WHERE tbl_jenis_akad.id_list = '".$data->jenis_akad."'");
		    		foreach ($data_jenis_akad->result() as $data_jenis_akad) {
		    			echo "<td>".$data_jenis_akad->list."</td>";
		    		}
		    		?>

		    		<td><?php echo number_format($data->plafond,0,',','.'); ?></td>
		    		<td><?php echo date('d F Y H:i:s', strtotime($data->tgl_register)); ?></td>
		    		<td><?php echo $data->last_update; ?></td>
		    		<td>
		    			<a href="<?php echo base_url('mds/preview/'.$data->id.'/'.$data->nama_deb.'/'.$data->cif.''); ?>" class='btn btn-primary'>View</a>
		    			<a href="<?php echo base_url('mds/edit/'.$data->id.'/'.$isNull.''); ?>" class='btn btn-warning'>Edit</a>
		    		</td>
		    	</tbody>
		    	<?php 		    	
		    	}
		    ?>
		  	</table>
		  	<div class="row">
	        	<div class="col">
	            <?php echo $links; ?>
	        	</div>
    		</div>
		</div>
	</div>

