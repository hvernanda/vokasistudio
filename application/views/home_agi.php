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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap-select.min.css')?>">
<link rel="stylesheet" href="<?php echo base_url('tag/bootstrap-tagsinput.css')?>">

<!-- Latest compiled and minified JavaScript -->

<!-- (Optional) Latest compiled and minified JavaScript translation files -->

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
    <a href="home" class="logo">
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
              <img src="<?php echo base_url('img/user2.jpg')?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php foreach ($user as $row) {
                echo $row->name;
              } ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('img/user2.jpg')?>" class="img-circle" alt="User Image">

                <p>
                  <?php 
                    foreach ($user as $row) {
                      echo $row->name;
                    } 
                    echo ' - '.$status;
                  ?>

                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('login/quit') ?>" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="<?php echo base_url('img/user2.jpg')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php foreach ($user as $row) {
            echo $row->name;
          } ?></p>
        </div>
      </div> 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php 



          if ($status=="") { 
            if($menu1==true){ ?>
              <li><a href="<?php echo site_url('check/check_user/crew') ?>"><i class="fa fa-user"></i> <span>Crew</span></a></li>
            <?php }else{} 

            if($menu2==true){ ?>
              <li><a href="<?php echo site_url('check/check_user/keuangan-proyek') ?>"><i class="fa fa-user"></i> <span>Staf Keuangan Proyek</span></a></li> 
            <?php }else{}

            if($menu3==true){ ?>
              <li><a href="<?php echo site_url('check/check_user/manajer-proyek') ?>"><i class="fa fa-user"></i> <span>Manajer Proyek</span></a></li> 
            <?php
            }else{}

            if($menu4==true){ ?>
              <li><a href="<?php echo site_url('check/check_user/staf-keuangan-vokasi') ?>"><i class="fa fa-user"></i> <span>Staf Keuangan Vokasi</span></a></li> 
            <?php  
            }else{}

            if($menu5==true){ ?>
              <li><a href="<?php echo site_url('check/check_user/manajer-vokasi') ?>"><i class="fa fa-user"></i> <span>Manajer Vokasi</span></a></li> 
            <?php  
            }else{}
            
          } elseif ($status=="crew") { ?>

          <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> 
          <li><a href="<?php echo site_url('riwayat_honor_kru/detail/'.$id) ?>"><i class="fa fa-file"></i> <span>Riwayat Honor Kru</span></a></li>  

        <?php  } elseif ($status=="manajer proyek") { ?>

        <?php 
        if($manajer == FALSE){
        foreach ($listProject as $key) { ?>
          <li><a href="<?php echo site_url('home/Project/'.$key->id_project)?>"><i class="fa fa-file"></i> <span><?php echo $key->project_name;?> </span></a></li>
        <?php }
      }else{
        ?>
       <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> 
         <li><a href="<?php echo site_url('summary/index/'.$listProject) ?>"><i class="fa fa-file-text-o"></i> <span>Summary</span></a></li>
         <li><a href="<?php echo site_url('list_staff/indexId/'.$listProject) ?>"><i class="fa fa-user-plus"></i> <span>Pilih Crew</span></a></li> 
         <?php }?>

        <?php } elseif ($status=="keuangan proyek") { ?>

          <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> 
          <li><a href="<?php echo site_url('keuangan_proyek') ?>"><i class="fa fa-file"></i> <span>Keungan Proyek</span></a></li>
          <li><a href="<?php echo site_url('honor_kru/manajer') ?>"><i class="fa fa-file"></i> <span>Honor Kru</span></a></li>
        
        <?php } elseif ($status=="staf keuangan vokasi") { ?>

          <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> 
          <li><a href="<?php echo site_url('riwayat_keuangan_proyek') ?>"><i class="fa fa-table"></i> <span>Riwayat Keungan Proyek</span></a></li>
          <li><a href="<?php echo site_url('keuangan_vokasi_studios') ?>"><i class="fa fa-table"></i> <span>Keuangan Vokasi Studios</span></a></li>
          <li><a href="<?php echo site_url('honor_kru') ?>"><i class="fa fa-table"></i> <span>Honor Kru</span></a></li>
          <li><a href="<?php echo site_url('riwayat_honor_kru') ?>"><i class="fa fa-table"></i> <span>Riwayat Honor Kru</span></a></li>
          <li><a href="<?php echo site_url('grafik_keuangan') ?>"><i class="fa  fa-bar-chart"></i> <span>Grafik Keuangan</span></a></li>

        <?php } elseif ($status=="manajer vokasi") { ?>
        <li><a href="<?php echo site_url('home') ?>"><i class="fa fa-home"></i> <span>Home</span></a></li> 
        <li><a href="<?php echo site_url('proyek_baru_table') ?>"><i class="glyphicon glyphicon-save-file"></i> <span>Proyek Baru</span></a></li>
        <li><a href="<?php echo site_url('riwayat_klien') ?>"><i class="fa fa-history"></i> <span>Riwayat Klien</span></a></li>
        <li><a href="<?php echo site_url('riwayat_kontak') ?>"><i class="fa fa-users"></i> <span>Riwayat Kontak</span></a></li>
        <li><a href="<?php echo site_url('list_project') ?>"><i class="fa fa-user-plus"></i> <span>Pilih Project Manager</span></a></li>
        
         <?php } ?>
        
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
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('plugins/colorpicker/bootstrap-colorpicker.min.js')?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('plugins/timepicker/bootstrap-timepicker.min.js')?>"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?php echo base_url('plugins/chartjs/Chart.min.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
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

  $(function () {
    $("#example2").DataTable(); 
  });
</script>
<!-- penjumlahan -->
<script>
  function sumData() {
      <?php 
        foreach ($jumlah as $row) {
        $j=$row->jml;
        }
        for($i=1; $i<=$j;$i++){
          echo "var txt".$i." = document.getElementById('text".$i."').value;";
          echo "var val".$i." = Number(txt".$i.".replace(/[.]+/g,''));";
        }
      ?>

        var sum = document.getElementById('sum').value;
        var result = parseInt(sum) - ( parseInt(val1) <?php foreach ($jumlah as $row) { $j=$row->jml; }; for($i=2; $i<=$j;$i++){ echo "+ parseInt(val".$i.")";}?>);
        if (!isNaN(result)) { 
           document.getElementById('sum1').value = tandaPemisahTitik(result.toString());
           document.getElementById('simpan').style.backgroundColor = "#dd4b39";
           document.getElementById('simpan').style.borderColor = "#dd4b39";
           document.getElementById('peringatan').style.visibility = "inherit";
        }
  }
</script>
<script>
 function tandaPemisahTitik(b){
    var _minus = false;
    if (b<0) _minus = true;
    b = b.toString();
    b=b.replace(".","");
    b=b.replace("-","");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--){
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)){
        c = b.substr(i-1,1) + "." + c;
      } else {
        c = b.substr(i-1,1) + c;
      }
    }
    if (_minus) c = "-" + c ;
    return c;
  }

  function numbersonly(ini, e){
  if (e.keyCode>=49){
    if(e.keyCode<=57){
      a = ini.value.toString().replace(".","");
      b = a.replace(/[^\d]/g,"");
      b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
      ini.value = tandaPemisahTitik(b);
      return false;
    }
    else if(e.keyCode<=105){
      if(e.keyCode>=96){
        //e.keycode = e.keycode - 47;
        a = ini.value.toString().replace(".","");
        b = a.replace(/[^\d]/g,"");
        b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
        ini.value = tandaPemisahTitik(b);
        //alert(e.keycode);
        return false;
      }
      else {return false;}
    }
    else {
      return false; }
    }else if (e.keyCode==48){
      a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
      b = a.replace(/[^\d]/g,"");
      if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
      } else {
        return false;
      } 
    }else if (e.keyCode==95){
      a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
      b = a.replace(/[^\d]/g,"");
      if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
      } else {
        return false;
      }
    }else if (e.keyCode==8 || e.keycode==46){
      a = ini.value.replace(".","");
      b = a.replace(/[^\d]/g,"");
      b = b.substr(0,b.length -1);
      if (tandaPemisahTitik(b)!=""){
        ini.value = tandaPemisahTitik(b);
      } else {
        ini.value = "";
      }

      return false;
    } else if (e.keyCode==9){
      return true;
    } else if (e.keyCode==17){
      return true;
    } else {
      //alert (e.keyCode);
      return false;
    }
}

</script>
<script>
<?php
  foreach ($jumlah as $row) {
      $j=$row->jml;
    }
  for($i=1; $i<=$j;$i++){
    echo 'function tandaPemisahTitik'.$i.'(b){';
?>
    var _minus = false;
    if (b<0) _minus = true;
    b = b.toString();
    b=b.replace(".","");
    b=b.replace("-","");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--){
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)){
        c = b.substr(i-1,1) + "." + c;
      } else {
        c = b.substr(i-1,1) + c;
      }
    }
    if (_minus) c = "-" + c ;
    return c;
  }
<?php 
  echo 'function numbersonly'.$i.'(ini, e){';
?>
  if (e.keyCode>=49){
    if(e.keyCode<=57){
      a = ini.value.toString().replace(".","");
      b = a.replace(/[^\d]/g,"");
      b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
      ini.value = tandaPemisahTitik(b);
      return false;
    }
    else if(e.keyCode<=105){
      if(e.keyCode>=96){
        //e.keycode = e.keycode - 47;
        a = ini.value.toString().replace(".","");
        b = a.replace(/[^\d]/g,"");
        b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
        ini.value = tandaPemisahTitik(b);
        //alert(e.keycode);
        return false;
      }
      else {return false;}
    }
    else {
      return false; }
    }else if (e.keyCode==48){
      a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
      b = a.replace(/[^\d]/g,"");
      if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
      } else {
        return false;
      } 
    }else if (e.keyCode==95){
      a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
      b = a.replace(/[^\d]/g,"");
      if (parseFloat(b)!=0){
        ini.value = tandaPemisahTitik(b);
        return false;
      } else {
        return false;
      }
    }else if (e.keyCode==8 || e.keycode==46){
      a = ini.value.replace(".","");
      b = a.replace(/[^\d]/g,"");
      b = b.substr(0,b.length -1);
      if (tandaPemisahTitik(b)!=""){
        ini.value = tandaPemisahTitik(b);
      } else {
        ini.value = "";
      }

      return false;
    } else if (e.keyCode==9){
      return true;
    } else if (e.keyCode==17){
      return true;
    } else {
      //alert (e.keyCode);
      return false;
    }
}
<?php } ?>
<script>
 <?php 
        $no=0;
        foreach ($view as $row):
        $no++; 
  echo "function aktif".$no."() {";
  echo "    var c = confirm('Apakah Anda Ingin Merubah Data Ini?');";
  ?>
            if (c == true) {
  <?php 
  echo "    document.getElementById('kalender".$no."').disabled = false;";
  echo "    document.getElementById('btn-show".$no."').style.visibility = 'hidden';";
  echo "    document.getElementById('btn-hide".$no."').style.visibility = 'inherit';";
  ?>
            }else{

            }
  <?php 
  echo "}";
  echo "function nonAktif".$no."() {";
  echo "    document.getElementById('btn-show".$no."').style.visibility = 'inherit';";
  echo "    document.getElementById('btn-hide".$no."').style.visibility = 'hidden';";
  echo "}";

endforeach; 
?>
</script>
<!-- Chart  -->
<script>
  $(function () {
    //-------------
    //- BAR CHART -
    //- Per-Bulan -
    //-------------
     

    var areaChartData = {
      labels: [<?php foreach($viewPengeluaranPerBulan as $row): $monthNum = $row->bulan; $monthName = date("F", mktime(0, 0, 0, $monthNum, 10)); echo "'".$monthName."',"; endforeach?>],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php foreach($viewPengeluaranPerBulan as $row): echo $row->pengeluaran.','; endforeach; ?>]
        },
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php foreach($viewPemasukanPerBulan as $row): echo $row->pemasukan.','; endforeach; ?>]
        }
      ]
    };

    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    barChartData.datasets[1].fillColor = "#00c0ef";
    barChartData.datasets[1].strokeColor = "#00c0ef";
    barChartData.datasets[1].pointColor = "#00c0ef";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
<script>
  $(function () {
    //-------------
    //- BAR CHART -
    //- Per-Tahun -
    //-------------
     

    var areaChartDataYear = {
      labels: [<?php foreach($viewPengeluaranPerTahun as $row): echo $row->tahun.','; endforeach; ?>],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php foreach($viewPengeluaranPerTahun as $row): echo $row->pengeluaran.','; endforeach; ?>]
        },
        {
          label: "Digital Goods",
          fillColor: "rgba(60,141,188,0.9)",
          strokeColor: "rgba(60,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(60,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php foreach($viewPemasukanPerTahun as $row): echo $row->pemasukan.','; endforeach; ?>]
        }
      ]
    };

    var barChartCanvas = $("#barChartYear").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartDataYear;
    barChartData.datasets[1].fillColor = "#00c0ef";
    barChartData.datasets[1].strokeColor = "#00c0ef";
    barChartData.datasets[1].pointColor = "#00c0ef";
    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>
<script>
    <?php
        function random_color_part1() {
          return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
        }

        function random_color1() {
            return random_color_part1() . random_color_part1() . random_color_part1();
        }

        $no=0;
        $j=0;
        $k=0;
        $m=0;
        foreach ($viewPengeluaranProject as $row) {
          $no++;
          $pengeluaran[$no] = $row->pengeluaran; 
        }
        foreach ($viewGajiCrewProject as $row) {
          $k++;
          $gaji[$k] = $row->gaji;
        }
        for ($i=0; $i < $k; $i++) { 
          $j++; 
          echo $pengeluaran[$j].';';
          echo $gaji[$j].';';
        }
        for ($i=0; $i < $j; $i++) { 
          $m++;
         echo $hasil = $pengeluaran[$m] + $gaji[$m].';  ';
        }
    ?>

  $(function () {
  
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChartPemasukan").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      <?php $l=0; foreach ($viewHargapPoject as $row):?>
      {
        <?php $l++; $harga = $row->harga; $sisa = $harga - ($pengeluaran[$l] + $gaji[$l]); ?>
        <?php $color = random_color1(); ?>
        value: <?= $sisa; ?>,
        color: "#<?= $color; ?>",
        highlight: "#<?= $color; ?>",
        label: "<?= $row->name; ?>"
      },
      <?php endforeach; ?>
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

  });
</script>
<script>
   <?php
        function random_color_part() {
          return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
        }

        function random_color() {
            return random_color_part() . random_color_part() . random_color_part();
        }
    ?>
  $(function () {
  
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChartPengeluaran").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      <?php
        $no=0;
        $j=0;
        $k=0;
        foreach ($viewPengeluaranProject as $row) {
          $no++;
          $pengeluaran[$no] = $row->pengeluaran; 
        }
        foreach ($viewGajiCrewProject as $row) {
          $k++;
          $gaji[$k] = $row->gaji;
        }
        foreach ($viewPengeluaranPerProject as $row) {
          $j++; 
          $hasil = $pengeluaran[$j] + $gaji[$j];
          ?>
        {
          <?php $color = random_color(); ?>
          value: <?= $hasil ?>,
          color: "#<?= $color; ?>",
          highlight: "#<?= $color; ?>",
          label: "<?= $row->name; ?>"
        },
      <?php } ?>
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

});
</script>

<script>
summaryPage = null;
//$('#summaryPage').html();
$(".done").change(function(){
    if ($('.done:checked').length == $('.done').length) {
      //document.getElementById('done').style.visibility = 'visible';
      $('#done').attr("style","visibility:visible")
    }else{
       $('#done').attr("style","visibility:hidden")
    }
});

$( document ).ready(function() {
   $("#choosenTipe").tagsinput({
        allowDuplicates: true,
        itemValue: '_id',
        itemText: 'name'
    });

     if ($('.done:checked').length == $('.done').length) {
      //document.getElementById('done').style.visibility = 'visible';
      $('#done').attr("style","visibility:visible")
    }else{
       $('#done').attr("style","visibility:hidden")
    }
});

function listStaff(){
$.ajax({
        url: "<?php echo site_url('list_staff/index2/'.$listProject)?>",
        type: "get",
        success: function (response) {
          $("#example1_filter").remove();
          $("#example1_length").remove();
          $("#example1_paginate").remove();
          $("#example1_info").remove();
          summaryPage = $('body').html();
          //summaryPage = removeElements("", "#example1_filter");

          //console.log(summaryPage); 
          $('body').html(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}

function check(check)
{
  if($(check).is(':checked')){
    $(check).attr('checked', 'checked');
  }else{
    $(check).removeAttr('checked');
  }
}
function summary()
{
  $('body').html(summaryPage);
}

var removeElements = function(text, selector) {
    var wrapped = $("<div>" + text + "</div>");
    wrapped.find(selector).remove();
    return wrapped.html();
}

function clickCheckbox(check,id)
{
  if($(check).is(':checked')){
     if (confirm('Are you sure ?')) {
      $.ajax({
        url: "<?php echo site_url('summary/updateFinish') ?>",
        type: "post",
        data: {'id':id},
        success: function(data) {
          $(check).attr('checked', 'checked');
          console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    }
  }else{
      if (confirm('Are you sure ?')) {
      $.ajax({
        url: "<?php echo site_url('summary/updatetoUndone') ?>",
        type: "post",
        data: {'id':id},
        success: function(data) {
          $(check).attr('checked', '');
          console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
    }
    }
}


</script>
 <script src="<?php echo base_url('js/bootstrap-select.min.js')?>"></script>
 <script src="<?php echo base_url('tag/bootstrap-tagsinput.js')?>"></script>
 <script src="<?php echo base_url('tag/bootstrap-tagsinput.min.js')?>"></script>
 <script>
 arrTipe = [];
   $("#choosenTipe").tagsinput({
        allowDuplicates: false,
        itemValue: '_id',
        itemText: 'name'
    });
 $('#tipeProyek').on('change', function() {
  //$('#choosenTipe').tagsinput('add', $('#tipeProyek option:selected').text());
  //$('#buatProyek').append('<input name="tipeProyekInput[]" type="hidden" id='+$('#tipeProyek option:selected').text()+' value='+$('#tipeProyek').val()+'>');
   $("#choosenTipe").tagsinput('add', {_id: $('#tipeProyek').val(), name: $('#tipeProyek option:selected').text()});
   stringTipe = $("#choosenTipe").val();
   arrTipe = stringTipe.split(',');
   //arrTipe = JSON.stringify(arrTipe);
   console.log(jQuery.type(arrTipe))
})

  $("#buatProyek").submit(function(e){
        e.preventDefault();
    });

  $('#submitProyek').on('click', function(){
    //alert('ddawda');
    nama = $('#nama').val();
    harga = $('#harga').val();
    dp = $('#dp').val();
    deadline = $('#deadline').val();
    revisi = $('#revisi').val();
    status = $('#status').val();

    if(nama == '' || harga == '' || deadline == '' || status == '' || arrTipe.length == 0){
      $('#message').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><div class="glyphicon glyphicon-remove"></div> </span><span class="sr-only">Close</span></button><b>Error!</b> Data tidak boleh kosong </br></div>');
    }else{
    $.ajax({
        url: "<?php echo site_url('proyek_baru/tambah/'.$id) ?>",
        type: "post",
        data: {tipe:arrTipe,nama:nama,harga:harga,dp:dp,deadline:deadline,revisi:revisi,status:status},
        success: function(data) {
          //$(check).attr('checked', '');
          //alert(data);
          window.location.replace("<?php echo base_url()?>"+'detil_proyek/index/'+data);
          console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
    }
  });

  $('#editProyek').on('click', function(){
    //alert('ddawda');
    nama = $('#nama').val();
    harga = $('#harga').val();
    dp = $('#dp').val();
    deadline = $('#deadline').val();
    revisi = $('#revisi').val();
    status = $('#status').val();
    id = $('#id').val();

    if(nama == '' || harga == '' || deadline == '' || status == '' || arrTipe.length == 0){
      $('#message').html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><div class="glyphicon glyphicon-remove"></div> </span><span class="sr-only">Close</span></button><b>Error!</b> Data tidak boleh kosong </br></div>');
    }else{
    $.ajax({
        url: "<?php echo site_url('edit_proyek/editProyek/'.$id) ?>",
        type: "post",
        data: {tipe:arrTipe,nama:nama,harga:harga,dp:dp,deadline:deadline,revisi:revisi,status:status,id:id},
        success: function(data) {
          //$(check).attr('checked', '');
          //alert(data);
          window.location.replace("<?php echo base_url()?>"+'detil_proyek/index/'+data);
          console.log(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }


    });
    }
  });


 </script>
</body>
</html>

