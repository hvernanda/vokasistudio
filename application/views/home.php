<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vokasi Studios</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('css/AdminLTE.min.css')?>">
  <!-- Custom style -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css')?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('css/skins/_all-skins.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/iCheck/flat/blue.css')?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/morris/morris.css')?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/jvectormap/jquery-jvectormap-1.2.2.css')?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/datepicker/datepicker3.css')?>">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/iCheck/all.css')?>">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/colorpicker/bootstrap-colorpicker.min.css')?>">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/timepicker/bootstrap-timepicker.min.css')?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2/select2.min.css')?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/daterangepicker/daterangepicker-bs3.css')?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>V</b>S</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Vokasi</b>Studios</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php  foreach ($data as $row) { ?>
                    <?php if($row->foto == ''){?>
                        <img class="user-image" alt="User Image"
                            src="<?php echo base_url();?>img/user2.jpg" >      
                    <?php } else {?>
                        <img class="user-image" alt="User Image"
                            src="<?php echo base_url();?>uploads/<?php echo $row->foto;?>" >
                    <?php } ?>
                    <?php } ?>
                <span class="hidden-xs"><?php echo ucfirst($this->session->userdata('name')); ?></span>
                <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li class="user-header">
                <?php  foreach ($data as $row) { ?>  
                  <?php if($row->foto == ''){?>
                    <img class="img-circle" alt="User Image"
                        src="<?php echo base_url();?>img/user2.jpg" >      
                <?php } else {?>
                    <img class="img-circle" alt="User Image"
                        src="<?php echo base_url();?>uploads/<?php echo $row->foto;?>" >
                    <?php } ?>
                <?php } ?>
                <p><?php echo ucfirst($this->session->userdata('name')); ?></p>
                </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('Profil/aboutme') ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php  foreach ($data as $row) { ?>
            <?php if($row->foto == ''){?>
                    <img class="img-circle" alt="User Image"
                        src="<?php echo base_url();?>img/user2.jpg" >      
                <?php } else {?>
                    <img class="img-circle" alt="User Image"
                        src="<?php echo base_url();?>uploads/<?php echo $row->foto;?>" >
                    <?php } ?>
            <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($this->session->userdata('name'));?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-table"></i> Dashboard</a></li>
        <!-- <li><a href="<?php echo site_url('progresproject') ?>"><i class="fa fa-table"></i> Project Progress</a></li> -->
            <?php
              if ($this->session->userdata('crew')=='2') {
            ?>

         <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Penugasan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="<?php echo site_url('daftar_penugasan') ?>"><i class="fa fa-table"></i> <span>Daftar Penugasan</span></a></li>
              <li ><a href="<?php echo site_url('master_penugasan') ?>"><i class="fa fa-table"></i> <span>Master Penugasan</span></a></li>
          </ul>
            <?php
              }else{
            ?>

            
            <?php
              }
            ?>
        <?php
          if ($this->session->userdata('crew')=='2') {
        ?>
           <li><a href="<?php echo site_url('aktivitasm') ?>"><i class="fa fa-table"></i> <span>Aktivitas Manajer Proyek</span></a></li>

        <?php
          }else{
        ?>

          <li><a href="<?php echo site_url('aktivitas') ?>"><i class="fa fa-table"></i> <span>Aktivitas Kru</span></a></li>
        
        <?php
          }
        ?>

        <!-- <li><a href="<?php echo site_url('lokasi_file') ?>"><i class="fa fa-circle"></i> <span>Lokasi File</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <?php 
      // var_dump($this->session->userdata('crew'));
          if ($this->session->userdata('crew')=='2') {
            // echo 'halo';
          }
       $this->load->view($page) ?>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2017 <a href="http://vokasistudios.com">Vokasi Studios</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <!-- <div class="tab-content">
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url('plugins/jQuery/jQuery-2.2.0.min.js')?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('plugins/select2/select2.full.min.js')?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.js')?>"></script>
<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script>
<script src="<?php echo base_url('plugins/input-mask/jquery.inputmask.extensions.js')?>"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('plugins/colorpicker/bootstrap-colorpicker.min.js')?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('plugins/timepicker/bootstrap-timepicker.min.js')?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('plugins/chartjs/Chart.min.js')?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url('plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js')?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('plugins/fastclick/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('js/app.min.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('js/demo.js')?>"></script>
<!-- Date Time -->
<script src="<?php echo base_url('js/jszip.min.js')?>"></script>
<script src="<?php echo base_url('js/FileSaver.js')?>"></script>
<script src="<?php echo base_url('js/date-time.js')?>"></script>
  $(function () {
    $("#tabel").DataTable();
   
  });
</script>
<script>
function aktif(){
  document.getElementById('kalender').disabled = false;
  document.getElementById('btn-show').style.visibility = 'hidden';
  document.getElementById('btn-hide').style.visibility = 'inherit';
  };
  function nonAktif() {
  document.getElementById('btn-show').style.visibility = 'inherit';
  document.getElementById('btn-hide').style.visibility = 'hidden';
};
</script>
<script>
  $(function (){
    $('#tanggal').datepicker({
      dateFormat: 'yyyy-mm-dd',
    });
    });
  $(function (){
    $('#tanggal1').datepicker({
      dateFormat: 'yyyy-mm-dd',
    });
    });
</script>
</body>
</html>
