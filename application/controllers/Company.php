<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Company extends CI_Controller{
    public function __construct(){
      parent::__construct() ;
      $this->load->model('user_login_model') ;
      $this->load->model('client_model') ;
      $this->load->model('project_model') ;
      $this->load->model('staff_model') ;

      if($this->user_login_model->checkLogged() == false) redirect('/') ;
    }

    public function index(){
      redirect('/') ;
    }

    public function all(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;
      
      $data =  array(
        'page' => 'dashboard/manajer/all_company',
        'result' => $this->client_model->ambil_company(),
      );
      $this->load->view('home',$data);
    }

    public function add(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $data = array(
        'page' => 'dashboard/manajer/add_client_company'
      ) ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('nama', 'Name', 'required|trim') ;
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim') ;
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[company.email]') ;
        $this->form_validation->set_rules('address', 'Address', 'required|trim') ;

        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
          $nama = $this->input->post('nama') ;
          $phone = $this->input->post('phone') ;
          $email = $this->input->post('email') ;
          $address = $this->input->post('address') ;

          if($this->client_model->insert_client_company($nama, $phone, $email, $address)){
            redirect('/company/all') ;
          }else{
            $this->load->view('home', $data) ;
          }
        }
      }else{
        $this->load->view('home', $data) ;
      }
    }

    public function detail($id){
      $isCompany = $this->client_model->isCompany($id) ;
      if($this->user_login_model->checkLogged() == false) redirect('/') ;
      elseif($isCompany == false) redirect('/') ;

      $data = array(
        'page' => 'dashboard/client/profile_company',
        'result' => $this->client_model->ambil_company_id($id),
        'contacts' => $this->client_model->ambil_user_company($id),
        'projects' => $this->project_model->ambil_project_company($id)
      ) ;

      $this->load->view('home', $data) ;
    }

    public function edit(){
      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Name', 'required|trim') ;
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email') ;
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim') ;
        $this->form_validation->set_rules('address', 'Company Address', 'required|trim') ;

        if($this->form_validation->run() == FALSE){
          $id = $this->input->post('id_company') ;
          $data = array(
            'page' => 'dashboard/client/profile_company',
            'result' => $this->client_model->ambil_company_id($id),
            'contacts' => $this->client_model->ambil_user_company($id)
          ) ;
          $this->load->view('home', $data) ;
        }else{
          if($this->client_model->isCompany($this->input->post('id_company'))){
            $input_data = array(
              'id_company'=> $this->input->post('id_company'),
              'name' => $this->input->post('name'),
              'email' => $this->input->post('email'),
              'phone' => $this->input->post('phone'),
              'address' => $this->input->post('address'),
            ) ;
  
            if($this->client_model->update_company($input_data))
              redirect('/company/detail/'.$this->input->post('id_company')) ;
            else
              redirect('/company/detail/'.$this->input->post('id_company')) ;
          }else{
            redirect('/') ;
          }
        }
      }else{
        redirect('/') ;
      }
    }
  }
?>