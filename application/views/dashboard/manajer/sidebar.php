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
    <!-- <li>
      <a href="<?php echo base_url('project/add') ;?>">
        <i class="fa fa-circle"></i> Tambah Proyek
      </a>
    </li> -->
    <li>
      <a href="<?php echo base_url('project/all_penawaran') ;?>">
        <i class="fa fa-circle"></i> Penawaran Proyek
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('project/all_type') ;?>">
        <i class="fa fa-circle"></i> Semua Tipe Proyek
      </a>
    </li>
        <li>
      <a href="<?php echo base_url('project/all_job') ;?>">
        <i class="fa fa-circle"></i> Semua Tipe Job
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
      <a href="<?php echo base_url('staff/all_tool_skill') ;?>">
        <i class="fa fa-circle"></i> Skill & Tools
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('staff/all_tool') ;?>">
        <i class="fa fa-circle"></i> Semua Tools
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('staff/all_skill') ;?>">
        <i class="fa fa-circle"></i> Semua Skills
      </a>
    </li>
    <!-- <li>
      <a href="<?php echo base_url('staff/add_tool_skill') ;?>">
        <i class="fa fa-circle"></i> Add Skill & Tools
      </a>
    </li> -->
  </ul>
</li>
 <!--  <li>
      <a href="<?php echo base_url('staff/add_tool_skill') ;?>">
        <i class="fa fa-circle"></i>  ADD Skill & Tools
      </a>
    </li>
  </ul>
</li> -->
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
