<!DOCTYPE html>
<!-- 
Template Yang Digunakan Adalah Template Free Dari Metronic 
-->
<html lang="en">
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php include 'ams_title.php'; ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<script src="<?php echo  base_url();?>ams_components/assets/js/jquery.min.js" type="text/javascript"></script>
<?php include 'ams_components/link/style.php' ?>
<?php include 'ams_components/link/submitform.php' ?>
<link rel="shortcut icon" href="favicon.ico"/>

<script type="text/javascript">
	$(document).ready(function() {
    $().ajaxStart(function() {
        $('#loading').show();
        $('#result').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#result').fadeIn('slow');
    });
    $('#insertDraft').submit(function() {
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                $('#result').html(data);
            }
        })
        return false;
    });
})
</script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed">
<!-- BEGIN HEADER -->
<div class="page-header -i navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo" >
			<a href="#">
			<img src="<?php echo base_url();?>ams_components/img/logo3.png" alt="logo" style="margin-top: 15px; margin-left: 50px">
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">
				<?php include 'ams_nav_notification.php'; ?>
				<?php include 'ams_nav_user_setting.php'; ?>
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php include 'ams_sidebar_menu.php' ?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content" style="margin-bottom: 100px">
			<!-- CONTENT -->
			<?php echo (!empty($content)?$content:null) ?>
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
	<?php include 'ams_components/link/script.php' ?>
	<?php include 'function_chain_provinsi.php'; ?>
	<?php include 'function_chain_sek_eko.php'; ?>
</body>
<!-- END BODY -->
</html>