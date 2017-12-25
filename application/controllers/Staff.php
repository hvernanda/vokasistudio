<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct();
    $this->load->model('user_login_model') ;
    $this->load->model('staff_model');

    if(!$this->user_login_model->checkLogged() || $this->session->userdata('logged_in')['id_user_role'] != '3')
      redirect('/') ;
  }

  public function index(){
    $session_data = $this->session->userdata('logged_in');  
    $id_user=$session_data['id_user'];
    $session_data['id_staff'] = $this->staff_model->getStaffId($id_user);  
    
    $this->session->set_userdata('logged_in', $session_data);

    $data = array(
      'page' => 'dashboard/staff/index'
    );
    $this->load->view('home', $data) ;
  }

  /* MENAMPILKAN SEMUA PROJECT YANG STAFF TERLIBAT DI DALAMNYA */

  public function listProject(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_user=$session_data['id_user'];
    }

    $data = array(
      'page' => 'dashboard/staff/project/all',
      'isi' => $this->staff_model->getProjectList($id_user)
    );
    $this->load->view('home',$data);
  }

  /* MENAMPILKAN SKILL YANG DIMILIKI OLEH STAFF*/

  public function listSkill(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_staff=$session_data['id_staff'];
    }

    $data = array(
      'page' => 'dashboard/staff/skill',
      'isi' => $this->staff_model->getSkillStaff($id_staff)
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
