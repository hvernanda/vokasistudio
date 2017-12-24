<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Company extends CI_Controller{
    public function __construct(){
      parent::__construct() ;
      $this->load->model('user_login_model') ;
      $this->load->model('client_model') ;
      $this->load->model('project_model') ;
      $this->load->model('staff_model') ;
    }

    public function index(){
      redirect('/') ;
    }

    public function detail($id){
      $isCompany = $this->client_model->isCompany($id) ;
      if($this->user_login_model->checkLogged() == false) redirect('/') ;
      elseif($isCompany == false) redirect('/') ;

      $data = array(
        'page' => 'dashboard/client/profile_company',
        'result' => $this->client_model->ambil_company_id($id)
      ) ;

      $this->load->view('home', $data) ;
    }
  }
?>