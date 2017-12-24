<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct();
  }

  public function index(){
    $session_data = $this->session->userdata('logged_in');  
    $session_data['id_staff'] = $this->staff_model->getStaffId($session_data['id_user']);  
    

    $this->session->set_userdata('logged_in', $session_data);

    $data = array(
      'page' => 'dashboard/staff/index'
    );
    $this->load->view('home', $data) ;
  }

  public function listProject(){
    $data = array(
      'page' => 'dashboard/staff/project/all',
    );
    $this->load->view('home',$data);
  }

  public function viewBiodata(){
    $session_data = $this->session->userdata('logged_in');
    $id_user = $session_data['id_user'];

    $data = array(
      'page' => 'dashboard/staff/bio/view',
      'data' => $this->staff_model->getStaffBio()
    );

    $this->load->view('home',$data);
  }

  public function editBiodata(){
    $session_data = $this->session->userdata('logged_in');
    $id_user = $session_data['id_user'];


    $data = array(
      'page' => 'dashboard/staff/bio/edit',
      'data' => $this->staff_model->getSkill($id_user)
    );

    $nama = $this->input->post('nama');
    $address = $this->input->post('address');
    $phone = $this->input->post('phone');
    $skill = $this->input->post('skill');

    $this->load->view('home',$data);
  }

  public function viewProjectList(){
    $session_data = $this->session->userdata('logged_in');
    $id_user = $session_data['id_user'];

    $data = array(
      'page' => 'dashboard/staff/project/all',
      'data' => $this->staff_model->getProjectList($id_user)
    );

    $this->load->view('home',$data);
  }

  public function viewDetailProject($id){ // staff/viewDet..../id_proyek/opo
    $session_data = $this->session->userdata('logged_in');
    $session_data['id_project'] = $id;
    $this->session->set_userdata('logged_in',$session_data);
    
    $data = array(
      'page' => 'dashboard/staff/project',
      'data' => $this->staff_model->getProjectList($id_user)
    );

    $this->load->view('home',$data);
  }

  
}
