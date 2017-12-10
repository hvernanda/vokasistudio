<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
  }

  public function client(){
    $data = array(
      'page' => 'dashboard/client/index'
    ) ;
    $this->load->view('home', $data) ;
  }

  public function manajer(){
    $data = array(
      'page' => 'dashboard/manajer/index'
    ) ;
    $this->load->view('home', $data) ;
  }

  public function keuangan(){
    $data = array(
      'page' => 'dashboard/keuangan/index'
    ) ;
    $this->load->view('home', $data) ;
  }

  public function staff(){
    $data = array(
      'page' => 'dashboard/staff/index'
    ) ;
    $this->load->view('home', $data) ;
  }
}
?>
