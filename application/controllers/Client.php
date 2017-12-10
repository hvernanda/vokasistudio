<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model') ;

    if(!$this->user_login_model->checkLogged() || $this->session->userdata('logged_in')['id_user_role'] != '4')
      redirect('/') ;
  }

  public function index(){
    $data = array(
      'page' => 'dashboard/client/index'
    ) ;
    $this->load->view('home', $data) ;
  }
}
