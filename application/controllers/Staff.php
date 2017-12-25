<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model') ;
    $this->load->model('staff_model') ;

    // if(!$this->user_login_model->checkLogged() || $this->session->userdata('logged_in')['id_user_role'] != '3')
    //   redirect('/') ;
  }

  public function index(){
    if($this->user_login_model->checkStaff() == false) redirect('/') ;
    $data = array(
      'page' => 'dashboard/staff/index'
    ) ;
    $this->load->view('home', $data) ;
  }

  public function all(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;
    $data =  array(
      'page' => 'dashboard/manajer/all_staff',
      'result' => $this->staff_model->ambil_user(),
    );

    $this->load->view('home',$data);
  }

  public function add(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;

    // if data is sent from form
    if($this->input->post('submit')){
      $this->form_validation->set_rules('nama', 'Name', 'required|trim|min_length[5]') ;
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]') ;
      $this->form_validation->set_rules('password', 'Password', 'required') ;
      $this->form_validation->set_rules('id_user_role', 'User role', 'required') ;

      if($this->form_validation->run() == false){
        $data = array(
          'page' => 'dashboard/manajer/add_staff'
        );

        $this->load->view('home', $data) ;
      }else{
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $id_user_role = $this->input->post('id_user_role');
    
        if($this->staff_model->insert_staff($nama, $email, $password, $id_user_role)){
          redirect('/staff/all') ;
        }else{
          $data = array(
            'page' => 'dashboard/manajer/add_staff'
          );
  
          $this->load->view('home', $data) ;
        }
      }
    }else{
      $data = array(
        'page' => 'dashboard/manajer/add_staff'
      ) ;
  
      $this->load->view('home', $data) ;
    }
  }
}
