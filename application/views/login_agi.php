<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Vokasi Studios</title>


	<!-- Bootstrap -->
	<link href="<?php echo base_url('css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('css/bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('css/style_login.css')?>" rel="stylesheet">

	<!-- HTML5 shim and Respond.js')?> for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js')?> doesnt work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')?>"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')?>"></script>
	<![endif]-->
	</head>
	<body>

		<div class="container">
		<!-- Modal -->
			<form class="form-signin" action="<?= site_url('login/check') ?>" method="POST" accept-charset="utf-8" role="form"> 
			<h2 class="form-signin-heading"> <b>Login</b></h2>
			<?php echo $this->session->flashdata('msgfalse');?>
			<?php echo $this->session->flashdata('msgtrue');?>
				<div class="input-group" id="orange">
					<span class="input-group-addon" id="basic-addon1">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</span>
					<input type="text" class="form-control" placeholder="Username" id="username" name="email" />
				</div>
				<br>
				<div class="input-group" id="orange">
					<span class="input-group-addon" id="basic-addon1">
						<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
					</span>
					<input type="password" class="form-control" placeholder="Password" name="password" />
					<input type="hidden" class="form-control" name="date-login" value="<?php echo date('Y-m-d H:i:s',now())?>" />
				</div>
				<br>
				<div>
				<h5><a href="lupa_password" class="lupa">Lupa Password?</a></h5>
				</div>
				<br>
				<input type="submit" class="btn btn-lg btn-primary btn-block" value="Login">
			</form>
		</div>

		<!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')?>"></script> -->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!--<script src="js/bootstrap.min.js')?>"></script> -->

		<!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
		<script src="<?php echo base_url('js/jquery.min.js')?>"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo base_url('js/bootstrap.min.js')?>"></script>
	</body>
</html>