<li>
  <a href="<?php echo base_url() ;?>">
    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
  </a>
</li>
<li class="treeview">
  <a href="#">
    <i class="fa fa-book"></i>
    <span>Keuangan</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-down pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
    <li>
      <a href="<?php echo base_url('keuangan/keuangan_studio')?>">
        <i class="fa fa-circle"></i> Keuangan Studio
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('defisit_studio/all')?>">
        <i class="fa fa-circle"></i> Defisit Keuangan Studio
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('riwayat_keuangan_proyek/all')?> ">
        <i class="fa fa-circle"></i> Keuangan Proyek
      </a>
    </li>
    <li>
      <a href="<?php echo base_url('Honor_kru/honor_kru')?>">
        <i class="fa fa-circle"></i> Honor Kru
      </a>
    </li>
  </ul>
</li>
