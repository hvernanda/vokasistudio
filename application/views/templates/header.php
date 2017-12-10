<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Vokasi Studios management website dashboard">
  <meta name="keywords" content="vokasi, vokasi studio, dashboard, proyek, film">
  <meta name="author" content="Naqiya and team">
  <meta name="robots" content="NOINDEX, NOFOLLOW">

  <title>Vokasi Studios</title>

  <!-- Icon -->
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.png')?>">

  <!-- Style goes here -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-blue.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.min.css'); ?>">

  <!-- Self made CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">

  <!-- Plugin CSS -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/iCheck/flat/_all.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/morris/morris.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/datepicker/datepicker3.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/colorpicker/bootstrap-colorpicker.min.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/fullcalendar/fullcalendar.min.css') ;?>">

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
  <!-- Header -->
  <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url();?>" class="logo">
        <span class="logo-mini"><b>VS</b></span>
        <span class="logo-lg"><b>Vokasi</b> Studios</span>
      </a>

      <nav class="navbar bavbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle Navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets/img/icon.png') ;?>" alt="User Image" class="user-image" />
                <span class="hidden-xs">John Doe</span>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?php echo base_url('assets/img/icon.png') ;?>" alt="User Image" class="img-circle" />
                  <p>
                    John Doe
                    <small>Staff Vokasi Studios</small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left"><a href="#" class="btn btn-default btn-flat">Profile</a></div>
                  <div class="pull-right"><a href="<?php echo base_url('/user_authentication/logout');?>" class="btn btn-default btn-flat">Log Out</a></div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
  </header>
  <!-- /Header -->

  <!-- Sidebar -->
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img id="sidebar-avatar" src="<?php echo base_url('assets/img/icon.png') ;?>" alt="User Image" class="img-circle" />
        </div>
        <div class="pull-left info">
          <p>John Doe</p>
          <a href="#"><?php echo $this->session->userdata('logged_in')['user_role'] ;?></a>
        </div>
      </div>

      <form action="" method="post" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" id="search" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type="submit" id="search-btn" class="btn btn-flat">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>

      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <?php
          $this->load->view('templates/sidebar-component') ;
        ?>
      </ul>
    </section>
  </aside>
  <!-- /Sidebar -->

  <!-- Main content -->
  <div class="content-wrapper">
    <section class="content">
