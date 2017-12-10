<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
  }

  public function index(){
    $data = array(
      'page' => 'dashboard/client/index'
    ) ;
    $this->load->view('home', $data) ;
  }
}
