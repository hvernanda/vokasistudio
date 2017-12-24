<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class User extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user_login_model') ;
    }

    public function index(){
      if($this->user_login_model->checkLogged())
        redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;
      else
        redirect('/') ;
    }

    public function profile($id){
      // redirect if there is no session or no user data
      if(!$this->user_login_model->checkLogged()) redirect('/') ;
      elseif(!$this->user_login_model->isUser($id)) 
        redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;

      $data = array(
        'page' => 'dashboard/general/profile',
        'result' => ''
      ) ;

      $this->load->view('home', $data) ;

    }

    public function edit($id){
      //
    }

    public function edit_process($id){
      //
    }
  }
?>