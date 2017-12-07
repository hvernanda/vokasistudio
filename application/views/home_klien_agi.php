<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vokasi Studios</title>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables/dataTables.bootstrap.css"')?>">
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
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php foreach ($user as $row) {
                echo '<img src='.$row->photo.' class="user-image" alt="User Image">';
                } ?>
              <span class="hidden-xs"><?php foreach ($user as $row) {
                echo $row->name;
              } ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <?php foreach ($user as $row) {
                echo '<img src='.$row->photo.' class="img-circle" alt="User Image">';
                } ?>
                <p>
                 <?php 
                    foreach ($user as $row) {
                      echo $row->name;
                    }
                  ?>

                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href=<?php echo site_url("profil/index/".$idCompany)?> class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('login/quit')?>" class="btn btn-default btn-flat">Sign out</a>
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
           <?php foreach ($user as $row) {
                echo '<img src='.$row->photo.' class="img-circle" alt="User Image">';
                } ?>
        </div>
        <div class="pull-left info">
          <p><?php foreach ($user as $row) {
            echo $row->name;
          } ?>
          </p>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <!--<li><a href="<?php //echo site_url('proyek_update') ?>"><i class="fa fa-table"></i> <span>Proyek Update</span></a></li>-->

        <?php 
        if($client == FALSE){?>
          <li><a href="<?php echo site_url('home_klien') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> 
          <?php
        foreach ($listProject as $key) { ?>
          <li><a href="<?php echo site_url('home_klien/ClientProject/'.$key->id_project)?>"><i class="fa fa-file"></i> <span><?php echo $key->project_name;?> </span></a></li>
        <?php }
      }else{
        ?>
          <li><a href="<?php echo site_url('home_klien') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> 
          <li><a href="<?php echo site_url('proyek_update/index/'.$listProject)?>"><i class="fa fa-file"></i> <span>proyek update</span></a></li>
      <?php }?>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      <?php $this->load->view($page) ?>
     
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2017 <a href="http://vokasistudios.com">Vokasi Studios</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

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
<!-- DataTables -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
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
<script src="<?php echo base_url('js/date-time.js')?>"></script>
<!-- Data table -->
<script>
  $(function () {
    $("#example1").DataTable(); 
  });
</script>

</body>
</html>
<script>

</script>
<?= $this->load->view('content/comment.php'); ?>


 <script>
 idAct = 0;
       // $("#commentButton").click(function(e){ $("#commentModal").modal("show"); });
   function showModal(button)
   {
    $("#commentModal").modal("show");
    idAct = $(button).closest('tr').find('.idAct').val();
   }

    function empty() {
    var x;
    x = document.getElementById("comment").value;
    if (x == "") {
        $('#message').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><div class="glyphicon glyphicon-remove"></div> </span><span class="sr-only">Close</span></button><b>Error!</b> Data tidak boleh kosong </br></div>');
        return false;
    };
}


function saveComment()
{
  comment = $('#comment').val();
  if(comment == ''){
     $('#message').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><div class="glyphicon glyphicon-remove"></div> </span><span class="sr-only">Close</span></button><b>Error!</b> Data tidak boleh kosong </br></div>');
   }else{
   $.ajax({
        url: "<?php echo site_url('comment/tambahComment') ?>",
        type: "post",
        data: {'id':idAct,'comment':comment},
        success: function(data) {
          alert(data);
          $("#commentModal").modal("hide");
          $('#comment').val('');
        },
        error: function(jqXHR, textStatus, errorThrown) {
           
        }
    });
 }
}  
  </script>
