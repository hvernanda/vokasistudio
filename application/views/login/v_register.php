<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <link rel="stylesheet" href="<?=base_url();?>/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
    <link rel="stylesheet" href="<?=base_url();?>/assets/dist/css/AdminLTE.min.css">
</head>

<body class="login-page">
    <div class="register-logo" style="margin:15px">
        <a href="<?php echo site_url('login'); ?>">App<b>VokasiStudio</b></a>
    </div>
    <div class="col-sm-offset-2 row col-sm-8">       
            <div class="form-group">
            <div class="panel panel-default">
            <div class="panel-heading" align="center" style="font-size:20px"><b>Daftar Baru</b></div>
                <div class="col-xs-3">
                </div>
                <div class="panel-body">
                <div>
                    <?php echo $this->session->flashdata('message1') ; ?> 
                    <?php echo $this->session->flashdata('message2') ; ?> 
                </div>

                    <div class="row">
                        <div class="col-xs-4">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" 
                                    src="<?php echo base_url();?>assets/img/avatar.png" 
                                    style="height:150px; width:150px" alt="User profile picture">
                                    <hr>
                                    <h6>*Untuk mengganti Foto Profil silahkan lengkapi Data Anda dan Login</h6>
                            </div>
                        </div>

                <div class="col-xs-8">
                <form class="form-horizontal" action="<?php echo base_url();?>Login/proses_register" method="post">  
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" placeholder="Nama Lengkap" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" name="address" placeholder="Alamat" required></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">No. HP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" placeholder="No. HP" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="email" placeholder="Email" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" placeholder="Password" required/>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-offset-5 col-sm-2">
                            <button type="submit" class="btn btn-default btn-block">Daftar</button>
                        </div>
                    </div>
                </form>   
                <div align="center" style="font-size:15px; margin:20px">  
                   <a href="<?php echo site_url('Login'); ?>">Login, untuk yang sudah menjadi Member</a> 
                </div>

    </div>
</div>

</div>
</body>
</html>

    <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"> </script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"> </script>