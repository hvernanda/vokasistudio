<li>
  <a href="<?php echo base_url() ;?>">
    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
  </a>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-book"></i>
    <span>Proyek</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-down pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo base_url('project/all')?>">
        <i class="fa fa-circle"></i> Semua Proyek
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('project/add') ;?>">
        <i class="fa fa-circle"></i> Tambah Proyek
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('manajer/all_proyek_penawaran') ;?>">
        <i class="fa fa-circle"></i> Penawaran Proyek
      </a>
    </li>
  </ul>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-users"></i>
    <span>Staff</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-down pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo base_url('staff/all') ?>">
        <i class="fa fa-circle"></i> Semua Staff
      </a>
    </li>
    <!-- <li>
      <a href="<?php echo base_url('staff/add') ;?>">
        <i class="fa fa-circle"></i> Tambah Staff
      </a>
    </li> -->
    <li>
      <a href="<?php echo base_url('manajer/all_tool_skill') ;?>">
        <i class="fa fa-circle"></i> Skill & Tools
      </a>
    </li>
  </ul>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-user"></i>
    <span>Client</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-down pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">

    <li>
      <a href="<?php echo base_url('company/all') ?>">
      <!-- semua client adalah semua data company -->
        <i class="fa fa-circle"></i> Semua Client
      </a>
    </li>
    <!-- <li>
      <a href="<?php echo base_url('manajer/add_client_company') ?>">
        <i class="fa fa-circle"></i> Tambah Client
      </a>
    </li> -->
    
    <li>
      <a href="<?php echo base_url('client/all') ?>">
        <!-- Semua data contact (user from company to login ) -->
        <i class="fa fa-circle"></i> Semua Kontak
      </a>
    </li>
    <!-- <li>
      <a href="<?php echo base_url('manajer/add_client') ;?>">
        <i class="fa fa-circle"></i> Tambah Kontak
      </a>
    </li> -->
  </ul>
</li>
