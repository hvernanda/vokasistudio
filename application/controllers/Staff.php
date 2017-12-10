<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
  }

  public function index(){
    $data = array(
      'page' => 'dashboard/staff/index'
    ) ;
    $this->load->view('home', $data) ;
  }
}
