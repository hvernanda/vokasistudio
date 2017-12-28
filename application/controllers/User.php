<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class User extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('user_login_model') ;
      $this->load->model('staff_model') ;
      $this->load->model('client_model') ;
    }

    public function index(){
      if($this->user_login_model->checkLogged())
        redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;
      else
        redirect('/') ;
    }

    public function profile($id){
      // redirect if there is no session or no user data
      $isUser = $this->user_login_model->isUser($id) ;
      if($this->user_login_model->checkLogged() == false) redirect('/') ;
      elseif($isUser == false) 
        redirect('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;

      $data = array(
        'page' => intval($isUser[0]->id_user_role) == 4 ? 'dashboard/client/profile_contact' : 'dashboard/staff/profile',
        'result' => intval($isUser[0]->id_user_role) == 4 ? $this->client_model->ambil_user_id($id) : $this->staff_model->ambil_user_id($id),
        'data_skill' =>$this->staff_model->get_staff_skill($id)
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