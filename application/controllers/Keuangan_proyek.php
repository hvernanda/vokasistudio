<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan_proyek extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('user_login_model');
    $this->load->model('keuangan_proyek_model');
    $this->load->model('staff_model');

    if(!$this->user_login_model->checkLogged())
      redirect('/') ;
    else{
      $this->id_staf = $this->staff_model->getStaffId($this->session->userdata('logged_in')['id_user'])[0]->id_staff;
    }
  }

  public function index(){
    $data = array(
      'page' => 'dashboard/keuangan_proyek/index'
    );
    $this->load->view('home', $data);
  }
}

?>
