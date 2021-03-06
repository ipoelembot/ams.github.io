<!--
==========================================================
============= CONSUMER FORM NEW APPLICATION ==============
==========================================================
-->

<!-- Menampilkan Request URL - Segmentasi -->
<?php $segment = $_GET['new']; ?>

<!-- Judul -->
<div style="font-size: 18px; padding-left: 40px; padding-right: 40px">
	Form Pengajuan Baru - <?php echo ucfirst($segment); ?>
	<hr>
</div>

<!-- Form Pengajuan Baru -->
<form action="<?php echo base_url('form/simpan'); ?>" method="post">
	<div style="padding-left: 40px; padding-right: 40px">
		<div class="wizards" style="margin-bottom: 30px;">
	        <div class="progressbar">
	            <div class="progress-line" data-now-value="5.11" data-number-of-steps="7" style="width: 5.11%;"></div> <!-- 19.66% -->
	        </div>
	        <!-- MENAMPILKAN STEP ICON PROGRESS -->
	        <?php 
	            foreach ($step as $step) {
	                echo 
	                "
	                <div class='form-wizard ".$step->active."'>
	                    <div class='wizard-icon'><i class='".$step->icon."'></i></div>
	                    <p>".$step->step_name."</p>
	                </div>
	                ";
	            }
	        ?>
	        <!-- ============================== -->
	    </div>
	</div>
</form>