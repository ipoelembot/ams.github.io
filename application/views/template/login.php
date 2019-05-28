<!DOCTYPE html>
<html>
<head>
	<title>Demo Version | Login - AMS</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	<?php include 'ams_components/link/style.php' ?>
	<script src="login.js"></script>
	<style>
		.tengah {
		     margin: auto;
		     position: absolute;
		     top: 0; left: 0; bottom: 0; right: 0;
		     height: 30%;
		     text-align: center;
		}
	</style>
</head>
<body>
	<div class="tengah col-md-4">
		<div style="color: orange; font-size: 28px">ACTIVATION MEMO SYSTEM</div>
		<p style="color: white; font-size: 14px"><i>Demo V. 1.0</i></p>
	    <form method="post" action="login/auth">
	    	<div style="color: grey; margin: 12px"><?php echo $this->session->flashdata('msg');?></div>
	    	<div class="form-group" >
	    		<input style="width: 70%;margin-left: 15%" class="form-control placeholder-no-fix" type="text" name="nik" placeholder="Username" required="required" />
	    	</div>
	    	<div class="form-group">
	        	<input style="width: 70%;margin-left: 15%" class="form-control placeholder-no-fix" type="password" name="password" placeholder="Password" required="required" />
	    	</div>
	        <input type="submit" name="submit" value="Masuk" class="btn btn-sm btn-primary" style="border-radius: 20px;">
	    </form>
	    <div style="color: grey; margin-top: 25px; font-size: 12px">Copyright &copy; 2019 | Bank Muamalat Indonesia, Tbk.</div>
    </div>
</body>
</html>