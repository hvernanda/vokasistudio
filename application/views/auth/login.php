<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Vokasi Studios management website dashboard">
  <meta name="keywords" content="vokasi, vokasi studio, dashboard, proyek, film">
  <meta name="author" content="Naqiya and team">
  <meta name="robots" content="NOINDEX, NOFOLLOW">

  <title>Login - Vokasi Studios</title>

  <!-- Icon -->
  <link rel="shortcut icon" href="<?php echo base_url().'assets/img/icon.png'?>">

  <!-- Style goes here -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-blue.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">

  <!-- Self made CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">
</head>
<body class="hold-transition">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url() ;?>"><b>Vokasi Studio</b></a>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <h3><b>LOGIN</b></h3>
      </div>
      <div class="panel-body">
        <div class="login-box-body">
          <p class="login-box-msg">
            Masukkan email dan password
          </p>
          <form action="" method="post">
            <div class="form-group has-feedback">
              <input type="email" name="email" class="form-control" placeholder="Email" />
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="Password" />
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group text-center">
              <input type="submit" class="btn btn-default btn-default-login" value="Login"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/app.js') ;?>"></script>
</body>
</html>