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
        public function all_tool(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $data = array(
        'page' => 'dashboard/manajer/all_tools_skill',
        'result' => $this->project_model->get_all_tool()
      ) ;

      $this->load->view('home', $data) ;
    }

    public function add(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $a = $this->db->query("SELECT contact.id_contact,user.name from contact JOIN user ON user.id_user = contact.id_user")->result();
      $data = array(
        'page' => 'dashboard/manajer/add_proyek',
        'daftar' => $a,
        'types' => $this->project_model->get_all_type(),
        'staffs' => $this->staff_model->ambil_user()
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
        $this->form_validation->set_rules('manpro', 'Manajer Proyek', 'required') ;
        $this->form_validation->set_rules('type[]', 'Type', 'required') ;

        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
          $nama = $this->input->post('nama');
          $dealtime = $this->input-> post('deadltime');
          $price = $this->input->post('price');
          $deadline  = $this->input->post('deadline');
          $revision_deadline  =$this->input->post('revisiondate');
          $status = 'on process';
          $downpayment  = $this->input->post('downpayment');
          $id_contact = $this->input ->post('id_contact');
          $manpro = $this->input ->post('manpro');
          $types = implode(',', $this->input->post('type')) ;

          $input_data = $this->project_model->insert_project($nama, $dealtime, $price, $deadline, $revision_deadline, $status, $downpayment,$id_contact, $manpro, $types);

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
          $this->session->set_flashdata('warning_type', 'Project Type is required') ;
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

    public function add_penawaran(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $data = array(
        'page' => 'dashboard/manajer/add_proyek_penawaran',
        'projects' => $this->project_model->getFreeProjects(),
        'staffs' => $this->staff_model->ambil_user()
      ) ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('proyek', 'Proyek', 'required') ;
        $this->form_validation->set_rules('staff', 'Manajer Proyek', 'required') ;

        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
          $data = array(
            'id_staff' => $this->input->post('staff'),
            'id_project' => $this->input->post('proyek'),
            'status_offer' => '0'
          ) ;

          if($this->project_model->insert_penawaran($data)){
            redirect('/project/all_penawaran') ;
          }else{
            redirect('/project/add_penawaran') ;
          }
        }
      }

      $this->load->view('home', $data) ;
    }

    public function edit($id_proyek){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      if($this->project_model->isProject($id_proyek) == false) redirect('/project/all') ;
      $a = $this->db->query("SELECT contact.id_contact,user.name from contact JOIN user ON user.id_user = contact.id_user")->result();
      $data = array(
        'page' => 'dashboard/manajer/add_proyek',
        'daftar' => $a,
        'types' => $this->project_model->get_all_type(),
        'protypes' => $this->project_model->get_project_type($id_proyek),
        'staffs' => $this->staff_model->ambil_user(),
        'result' => $this->project_model->ambil_project_manajer($id_proyek),
        'edit' => true
      ) ;
      if($this->input->post('submit')){
        $this->form_validation->set_rules('nama', 'Name', 'required|trim') ;
        $this->form_validation->set_rules('dealtime', 'Deal time', 'required') ;
        $this->form_validation->set_rules('price', 'Project Price', 'required|trim') ;
        $this->form_validation->set_rules('deadline', 'Deadline', 'required') ;
        $this->form_validation->set_rules('revisiondate', 'Revision Date', 'required') ;
        $this->form_validation->set_rules('downpayment', 'Down Payment', 'required') ;
        $this->form_validation->set_rules('id_contact', 'Contact', 'required') ;
        $this->form_validation->set_rules('manpro', 'Manajer Proyek', 'required') ;
        $this->form_validation->set_rules('type[]', 'Type', 'required') ;

        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
          $manpro = $this->input ->post('manpro');
          $types = implode(',', $this->input->post('type')) ;

          $data = array(
            'name' => $this->input->post('nama'),
            'dealtime' => $this->input->post('dealtime'),
            'price' => $this->input->post('price'),
            'deadline' => $this->input->post('deadline'),
            'revision_deadline' => $this->input->post('revisiondate'),
            'status' => $this->input->post('status'),
            'DP' => $this->input->post('downpayment'),
            'id_contact' => $this->input->post('id_contact')
          ) ;

          if($this->project_model->update_project($id_proyek, $data, $manpro, $types))
            redirect('/project/all') ;
          else
            redirect('/project/edit/'.$id_proyek) ;
        }
      }else{
        $this->load->view('home', $data) ;
      }
    }

    public function edit_type(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Project Type', 'required|trim') ;

        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('warning_edit_type', 'Project Type is required') ;
          redirect('/project/all_type') ;
        }else{
          $name = $this->input->post('name') ;
          $id_type = $this->input->post('id_type') ;

          if($this->project_model->update_project_type($id_type, $name)){
            redirect('/project/all_type') ;
          }else{
            $this->session->set_flashdata('warning_edit_type', 'Error, update data failed!') ;
          redirect('/project/all_type') ;
          }
        }
      }else{
        redirect('/project/all_type') ;
      }
    }

    public function delete($id){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      if($this->project_model->isProject($id)){
        $this->project_model->delete_project($id) ;
      }

      redirect('/project/all') ;

    }
  }
?>