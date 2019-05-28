<h3>Pencarian - <i style="color: grey; font-size: 16px">Data Nasabah</i></h3>
<hr>
<br>

<div class="box box-danger">
    <div class="form-group" style="padding: 30px">
		<form action="<?php echo base_url('restru/hasilcaricomm')?>" action="GET">
			<div class="form-group">
				<label for="cari">Masukan kata <i>(cif/nama/nomor kartu)</i> :</label>
				<input type="text" class="form-control" id="cari" name="cari" placeholder="cif/nama/nomor kartu">
			</div>
			<input class="btn btn-primary" type="submit" value="Cari">
		</form>
    </div>
</div>