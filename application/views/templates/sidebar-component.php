<?php
  $userdata = $this->session->userdata('logged_in');

  if($userdata['id_user_role'] == '1')
    $this->load->view('dashboard/manajer/sidebar') ;
  elseif($userdata['id_user_role'] == '2')
    $this->load->view('dashboard/keuangan/sidebar') ;
  elseif($userdata['id_user_role'] == '3')
    $this->load->view('dashboard/staff/sidebar') ;
  elseif($userdata['id_user_role'] == '4')
    $this->load->view('dashboard/client/sidebar') ;
?>
