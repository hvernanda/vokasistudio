<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  /*
  * Manage project functions controller
  * Create, Read, Update and Delete
  * By Naqiya Zorahima
  * 17 Dec 2017
  */

  class Project extends CI_Controller{
    public function __construct(){
      parent::__construct() ;
      $this->load->model('user_login_model') ;
      $this->load->model('staff_model') ;
      $this->load->model('project_model') ;
      $this->load->model('client_model') ;
      $this->load->model('general_model') ;

      if($this->user_login_model->checkLogged() == false) redirect('/') ;
    }

    public function index(){
      redirect('/project/all') ;
    }

    public function all(){
      if($this->user_login_model->checkManajer() == false){
        redirect('/') ;
      }

      $data =  array(
        'page' => 'dashboard/manajer/all_proyek',
        'result' => $this->project_model->ambil_project(),
        'general' => $this->general_model
      );
  
      $this->load->view('home',$data);
    }

    public function all_penawaran(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;
      $data =  array(
        'page' => 'dashboard/manajer/all_proyek_penawaran',
        'result' => $this->project_model->ambil_project_penawaran(),
      );
  
      $this->load->view('home',$data);
    }

    public function all_type(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $data = array(
        'page' => 'dashboard/manajer/all_proyek_type',
        'result' => $this->project_model->get_all_type()
      ) ;

      $this->load->view('home', $data) ;
    }

    public function add(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $a = $this->db->query("SELECT id_contact,name from contact")->result();
      $data = array(
        'page' => 'dashboard/manajer/add_proyek',
        'daftar' => $a,
        'types' => $this->project_model->get_all_type()
      ) ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('nama', 'Name', 'required|trim') ;
        $this->form_validation->set_rules('dealtime', 'Deal time', 'required') ;
        $this->form_validation->set_rules('price', 'Project Price', 'required|trim') ;
        $this->form_validation->set_rules('deadline', 'Deadline', 'required') ;
        $this->form_validation->set_rules('revisiondate', 'Revision Date', 'required') ;
        // $this->form_validation->set_rules('status', '', 'required') ;
        $this->form_validation->set_rules('downpayment', 'Down Payment', 'required') ;
        $this->form_validation->set_rules('id_contact', 'Contact', 'required') ;
        $this->form_validation->set_rules('type[]', 'Type', 'required') ;

        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
          $nama = $this->input->post('nama');
          $dealtime = $this->input-> post('deadltime');
          $price = $this->input->post('price');
          $deadline  = $this->input->post('deadline');
          $revisionDeadline  =$this->input->post('revisiondate');
          $status = 'on_process';
          $downpayment  = $this->input->post('downpayment');
          $id_contact = $this->input ->post('id_contact');
          $types = implode(',', $this->input->post('type')) ;

          $input_data = $this->project_model->insert_project($nama, $dealtime, $price, $deadline, $revisionDeadline, $status, $downpayment,$id_contact, $types);

          if($input_data){
            redirect('/project/all') ;
          }else{
            $this->load->view('home', $data) ;
          }
        }
      }else{
        $this->load->view('home', $data) ;
      }
    }

    public function add_type(){
      if($this->user_login_model->checkManajer() == false) redirect('/project/all_type') ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Name', 'required|trim') ;

        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('warning_type', 'Name is required') ;
          redirect('/project/all_type') ;
        }else{
          $name = $this->input->post('name') ;

          if($this->project_model->insert_project_type($name)){
            redirect('/project/all_type') ;
          }else{
            $this->session->set_flashdata('warning_type', 'Error, insert data failed!') ;
            redirect('/project/all_type') ;
          }
        }
      }else{
        redirect('/project/all_type') ;
      }
    }
  }
?>