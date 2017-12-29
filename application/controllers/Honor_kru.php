<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Honor_kru extends CI_Controller {
  public $id_staf;

  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model');
    $this->load->model('keuangan_studio_model');
    $this->load->model('honor_kru_model');
    $this->load->model('staff_model');    

    if(!$this->user_login_model->checkLogged())
      redirect('/') ;
    else{
      $this->id_staf = $this->staff_model->getStaffId($this->session->userdata('logged_in')['id_user'])[0]->id_staff;
    }
  }

  public function index(){
    $data = array(
      'page' => 'honor_kru',
      'user' => $this->user_login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
      'status' => $this->session->userdata('status'),
      'id_proyek' => $this->login_model->getIdProyek($this->session->userdata('email'),$this->session->userdata('password'), $this->session->userdata('status')),
      'view' => $this->honor_kru_model->viewKru()
    );
  }