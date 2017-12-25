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
      <a href="<?php echo base_url('manajer/all_proyek')?>">
        <i class="fa fa-circle"></i> Semua Proyek
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('manajer/add_proyek') ;?>">
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
    <li>
      <a href="<?php echo base_url('staff/add') ;?>">
        <i class="fa fa-circle"></i> Tambah Staff
      </a>
    </li>
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
      <a href="<?php echo base_url('manajer/all_company') ?>">
      <!-- semua client adalah semua data company -->
        <i class="fa fa-circle"></i> Semua Client
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('manajer/add_client_company') ?>">
        <!-- Tambah Client adalah menambah data company -->
        <i class="fa fa-circle"></i> Tambah Client
      </a>
    </li>
    
    <li>
      <a href="<?php echo base_url('manajer/all_company_contact') ?>">
        <!-- Semua data contact (user from company to login ) -->
        <i class="fa fa-circle"></i> Semua Kontak
      </a>
    </li>
    <li>
      <!-- Tambah  Kontak adalah menambah data contact or tambah user from company to login -->
      <a href="<?php echo base_url('manajer/add_client') ;?>">
        <i class="fa fa-circle"></i> Tambah Kontak
      </a>
    </li>
  </ul>
</li>
