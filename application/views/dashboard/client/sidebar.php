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
      <a href="<?php echo base_url('Client/all_proyek');?>">
        <i class="fa fa-circle"></i> Semua Proyek
      </a>
    </li>
    <li>
      <a href= "<?php echo base_url('Client/project_update');?>">
        <i class="fa fa-circle"></i> Progress Proyek
      </a>
    </li>
  </ul>
</li>