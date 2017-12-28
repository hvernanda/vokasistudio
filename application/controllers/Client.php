<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* Manage client/contact functions controller
* Create, Read, Update and Delete
* By Naqiya Zorahima
* 17 Dec 2017
*/

class Client extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model') ;
    $this->load->model('client_model') ;
    $this->load->model('general_model') ;
  }

  public function index(){
    if($this->user_login_model->checkClient() == false){
      if($this->user_login_model->checkManajer()){
        redirect('/client/all') ;
      }else{
        redirect('/') ;
      }
    }
    $data = array(
      'page' => 'dashboard/client/index'
    ) ;
    $this->load->view('home', $data) ;
  }
  // all client
  public function all(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;
    
    $data =  array(
      'page' => 'dashboard/manajer/all_company_contact',
      'result' => $this->client_model->ambil_user(),
    );
    $this->load->view('home',$data);
  }
  // add new client
  public function add(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;

    $data = array(
      'page' => 'dashboard/manajer/add_client',
      'companies' => $this->client_model->ambil_company()
    ) ;

    if($this->input->post('submit')){
      $this->form_validation->set_rules('nama', 'Name', 'required|trim') ;
      $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]') ;
      $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim') ;
      $this->form_validation->set_rules('password', 'Password', 'required') ;
      $this->form_validation->set_rules('id_company', 'Company', 'required') ;

      if($this->form_validation->run() == FALSE){
        $this->load->view('home', $data) ;
      }else{
        $nama = $this->input->post('nama') ;
        $email = $this->input->post('email') ;
        $phone = $this->input->post('phone') ;
        $password = $this->input->post('password') ;
        $id_company = $this->input->post('id_company') ;

        if($this->client_model->insert_client($nama, $email, $phone, $password, $id_company)){
          redirect('/client/all') ;
        }else{
          $this->load->view('home', $data) ;
        }
      }
    }else{
      $this->load->view('home', $data) ;
      }
    }
  
  //lihat proyek dari client
   public function all_proyek(){ 
    $id = $this->client_model->ambil_user_id($this->session->userdata('logged_in')['id_user']) ;
    $data =  array(
      'page' => 'dashboard/client/project_client',
      'result' => $this->client_model->get_project($id[0]->id_contact),
      'general' => $this->general_model
    );
    $this->load->view('home',$data);
  }

  //lihat update proyek client
  public function project_update(){
    $id = $this->client_model->ambil_user_id($this->session->userdata('logged_in')['id_user']) ;
    $data = array(
      'page' => 'dashboard/client/project_update',
      'result' => $this->client_model->get_project_update($id[0]->id_contact)
     );
    $this->load->view('home',$data);
  }
}
