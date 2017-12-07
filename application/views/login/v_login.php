<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>Login</title>
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	
  	<link rel="stylesheet" href="<?=base_url();?>/assets/css/bootstrap.min.css">
  	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
  	<link rel="stylesheet" href="<?=base_url();?>/assets/css/AdminLTE.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
  	<div class="login-logo">
    	<a href="<?php echo site_url('user_authentication'); ?>">App<b>VokasiStudio</b></a>
  	</div>
    <div class="panel panel-default">
    <div class="panel-heading" align="center" style="font-size:20px"><b>LOGIN</b></div>
  	<div class="login-box-body">
        <h5 class="login-box-msg">Masukkan Username dan Password</h5>
        <div>
			<?php echo $this->session->flashdata('msg1') ; ?>
			<?php echo $this->session->flashdata('msg2') ; ?> 
			<?php echo $this->session->flashdata('msg3') ; ?>
			<?php echo $this->session->flashdata('message') ; ?> 
		</div>
    <form action="<?php echo site_url('user_authentication/user_login_process'); ?>" method="POST">
      	<div class="form-group has-feedback">
        	<input type="text" class="form-control" name="email" placeholder="Email">
        	<span class="glyphicon glyphicon-user form-control-feedback"></span>
      	</div>
      	<div class="form-group has-feedback">
        	<input type="password" class="form-control" name="password" placeholder="Password">
        	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
      	</div>
      	<div class="row">
          	<div class="col-xs-4">
            </div>
            <div class="col-xs-4">
              	<button type="submit" class="btn btn-default btn-block btn-flat">Login</button>
            </div>
      </div>
    </form>
    <div align="center" style="margin-top:15px">  
    	<a href="<?php echo site_url('Login/register'); ?>" class="text-center" >Register Member Baru</a> 
    </div>
  	</div>
    </div>
    </div>
</body>
</html>

    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"> </script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"> </script>
