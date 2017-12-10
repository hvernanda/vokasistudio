<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
  }

  public function index(){
    $data = array(
      'page' => 'dashboard/keuangan/index'
    ) ;
    $this->load->view('home', $data) ;
  }
}
