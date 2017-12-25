<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajer extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model');
    $this->load->model('staff_model');
    $this->load->model('client_model');
    $this->load->model('project_model');
    $this->load->model('general_model');

    if(!$this->user_login_model->checkLogged() || $this->session->userdata('logged_in')['id_user_role'] != '1')
      redirect('/') ;
  }

  public function index(){
    $data = array(
      'page' => 'dashboard/manajer/index',
      'client' => $this->client_model->ambil_company(),
      'staff' => $this->staff_model->ambil_user(),
      'project' => $this->project_model->ambil_project()
    ) ;
    $this->load->view('home', $data) ;
  }

  // All staff function has been moved into controller Staff

  /*
  * Manage company functions controller
  * Create, Read, Update and Delete
  * By Naqiya Zorahima
  * 17 Dec 2017
  */
  public function all_proyek(){ 
    $data =  array(
      'page' => 'dashboard/manajer/all_proyek',
      'result' => $this->project_model->ambil_project(),
      'general' => $this->general_model
    );

    $this->load->view('home',$data);
  }
  // CREATE : add new proyek data
  public function add_proyek(){
    $a = $this->db->query("SELECT id_contact,name from contact")->result();
    $data = array(
      'page' => 'dashboard/manajer/add_proyek',
      'error' => '',
      'success' => '',
      'daftar' => $a
    ) ;

    $this->load->view('home', $data) ;
  }

  public function add_proyek_process(){
    $nama = $this->input->post('nama');
    $dealtime = $this->input-> post('deadltime');
    $price = $this->input->post('price');
    $deadline  = $this->input->post('deadline');
    $revisionDeadline  =$this->input->post('revisiondate');
    $status = $this->input->post('status');
    $downpayment  = $this->input->post('downpayment');
    $id_contact = $this->input ->post('id_contact');
           
    $data = array(
            'name' => $nama,
            'dealtime' => $dealtime,
            'price' => $price,
            'deadline' => $deadline,
            'revisionDeadline' => $revisionDeadline,
            'status' => $status,
            'DP' => $downpayment,
            'id_contact' => $id_contact
          );
    
    $this->project_model->insert_project($nama, $dealtime, $price, $deadline, $revisionDeadline, $status, $downpayment,$id_contact);
    }
    // READ : get all proyek data
  public function all_proyek_penawaran(){ 
    $data =  array(
      'page' => 'dashboard/manajer/all_proyek_penawaran',
      'result' => $this->project_model->ambil_project_penawaran(),
    );

    $this->load->view('home',$data);
  }
public function all_tool_skill(){ 
    $b = $this->db->query("SELECT id_tool,tool_name from tool")->result();
    $c = $this->db->query("SELECT id_skill,skill_name from skill")->result();
    $data =  array(
      'page' => 'dashboard/manajer/all_tool_skill',
      'result' => $this->staff_model->ambil_tool_skill(),
      // 'tool'=> $b,
      // 'skill' => $c

    );

    $this->load->view('home',$data);
  }

}
