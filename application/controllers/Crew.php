<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crew extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct();
    $this->load->model('user_login_model') ;
    $this->load->model('staff_model');

    if(!$this->user_login_model->checkLogged() || $this->session->userdata('logged_in')['id_user_role'] != '3')
      redirect('/') ;
  }

  public function project($id){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    $data = array(
      'page' => 'dashboard/staff/crew/project_dashboard',
      //'isi' => $this->manajer_proyek_model->viewAllStaff(),
    );
    $this->load->view('home', $data);
  }
}