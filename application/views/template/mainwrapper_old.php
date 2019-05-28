<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Demo - Centralize Memo Dropping System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<?php include 'style.php' ?>
</head>

<body class="hold-transition skin-black fixed sidebar-collapse sidebar-mini">

  <header class="main-header">
    <nav class="navbar navbar-static-top" style="background-color: white; padding-right: 10px">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="background-color: white">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div style="background-color: white">
      	<h4 style="color: #424242; padding-top: 5px; padding-left: 10px; float: left">Centralize Memo Dropping System</h4>
      	<h5 style="color: #424242; padding-top: 15px; padding-right: 20px; text-align: right; float: right">
      		<?php 
      			date_default_timezone_set('Asia/Jakarta');
      			echo date('l')." ". date('d-M-Y');
      		?>
      	</h5>
      </div>
    </nav>
  </header>

  <!-- ======================================================================== -->
  <!-- ======================================================================== -->

	<aside class="main-sidebar" style="background-color: black">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="<?php echo base_url(); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('mds/mytask'); ?>">
            <i class="fa fa-table"></i> <span>My Task</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Form</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#" style="font-size: 12px"><i class="fa fa-circle-o"></i> Memo Dropping
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url('perorangan/cari'); ?>" style="font-size: 12px"><i class="fa fa-circle-o"></i> Perorangan</a></li>
                <li><a href="<?php echo base_url('NonPerorangan/cari'); ?>" style="font-size: 12px"><i class="fa fa-circle-o"></i> Non Perorangan</a></li>
                <li><a href="#" style="font-size: 12px"><i class="fa fa-circle-o"></i> Restrukturisasi</a></li>
                <li><a href="#" style="font-size: 12px"><i class="fa fa-circle-o"></i> Loan Committed Unused</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- ======================================================================== -->
  <!-- ======================================================================== -->


  <div class="content-wrapper" style="background-color: white;">
  	<section class="content">
      <div class="col-md-12">

        <!-- ISI KONTEN -->
        <?php echo (!empty($content)?$content:null) ?>
        <!-- /ISI KONTEN -->

      </div>
    </section>
  </div>


  <!-- ======================================================================== -->
  <!-- ======================================================================== -->


  <?php include 'script_1.php' ?>


  <!-- ======================================================================== -->
  <!-- ======================================================================== -->

  <?php include 'script_2.php' ?>
  
</body>
</html>