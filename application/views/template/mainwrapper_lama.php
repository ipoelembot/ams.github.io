<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Demo Version | AMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Memanggil php File Berisikan css -->
  <?php include 'crp/style.php' ?>
  <?php include 'crp/crp.php' ?>

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">


<!-- ================================================ Header =============================================== -->
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div>
        <h6 style="color: #fff ;padding-top: 7px; padding-right: 35px; text-align: left; float: right; font-size: 14px; text-decoration: none;">
              <!-- 
                <?php 
                  date_default_timezone_set('Asia/Jakarta');
                  echo " Assalamualaikum, ".date('l')." ". date('d-M-Y');
                ?>
              -->
                Assalamu'alaikum, <?php echo $this->session->userdata('ses_nama');?>
        </h6>
      </div>
      <div>
        <h4 style="color: white; padding-top: 5px; padding-left: 10px; padding-right: 35px; float: left">
          <?php echo "Activation Memo System" ?>
        </h4>
      </div>
    </nav>
  </header>


<!-- ================================================ Sidebar =============================================== -->

<?php $this->load->view('template/menu');?>

<!-- ================================================ Content =============================================== -->

  <div class="content-wrapper" style="background-color: white">
    <section class="content-header">
      <br>
    </section>
    <!-- Main content -->
    <section class="content">

      <!-- ISI KONTEN -->
        <?php echo (!empty($content)?$content:null) ?>
      <!-- /ISI KONTEN -->

    </section>
    <!-- /.content -->
  </div>
</div>
<!-- ./wrapper -->

<!-- Memanggil php File Berisikan JQuery, Javascript -->
<?php include 'script_1.php'; ?>
<?php include 'script_2.php'; ?>

<?php include 'function_chain_provinsi.php'; ?>
<?php include 'function_chain_sek_eko.php'; ?>

</body>
</html>
