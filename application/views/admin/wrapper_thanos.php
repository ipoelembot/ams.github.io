<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator | Content Management</title>
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
        <h4 style="color: white; padding-top: 5px; padding-left: 10px; padding-right: 35px; float: left">
          <?php echo "Activation Memo System | Admin Zone" ?>
        </h4>
      </div>
    </nav>
  </header>


<!-- ================================================ Sidebar =============================================== -->

  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Content Management</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-user"></i>
            <span>User Management</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Application Management</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Document Management</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>

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




</body>
</html>
