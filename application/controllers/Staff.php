<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* Manage staff functions controller
* Create, Read, Update and Delete
* By Naqiya Zorahima
* 17 Dec 2017
*/

class Staff extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public $staff_data ;
  public function __construct(){
    parent::__construct();
    $this->load->model('user_login_model') ;
    $this->load->model('staff_model');


    if($this->user_login_model->checkLogged() == false)
      redirect('/') ;
  }

  public function index(){
    if($this->user_login_model->checkStaff() == false) redirect('/') ;

    $session_data = $this->session->userdata('logged_in');  
    $id_user=$session_data['id_user'];
    $session_data['id_staff'] = $this->staff_model->getStaffId($id_user);  
    
    $this->session->set_userdata('logged_in', $session_data);
    
    $array_role = $this->staff_model->getProjectCountRole($id_user);
    $manajer_count = 0;
    $keuangan_count = 0;
    $crew_biasa_count = 0;

    foreach ($array_role as $role) {
      if($role->id_crew_role==1){
        $manajer_count = $role->count;
      }
      if($role->id_crew_role==2){
        $keuangan_count = $role->count;
      }
      if($role->id_crew_role==3){
        $crew_biasa_count = $role->count;
      }
    }

    $data = array(
      'page' => 'dashboard/staff/index',
      'isi' => $this->staff_model->getProjectList($id_user),
      'project_count' => $this->staff_model->getProjectCount($id_user),
      'manajer_count' => $manajer_count,
      'keuangan_count' => $keuangan_count,
      'crew_biasa_count' => $crew_biasa_count
    );
    $this->load->view('home',$data);
  }

  public function auth_project_role($id_project){
    $session_data = $this->session->userdata('logged_in');
    $id_user = session_data['id_user'];
    $id_role = $this->model->check_role($id_user,$id_project);


  }

  public function all(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;
    $data =  array(
      'page' => 'dashboard/manajer/all_staff',
      'result' => $this->staff_model->ambil_user(),
    );

    $this->load->view('home',$data);
  }

  public function all_tool_skill(){
    $data =  array(
      'page' => 'dashboard/manajer/all_tool_skill',
      'result' => $this->staff_model->ambil_tool_skill(),
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

  /* MELIHAT BIODATA STAFF */

  public function viewBiodata(){
    $session_data = $this->session->userdata('logged_in');
    $id_user = $session_data['id_user'];

    $data = array(
      'page' => 'dashboard/staff/bio/view',
      'data' => $this->staff_model->getStaffBio()
    );

    $this->load->view('home',$data);
  }

  /* MENGUBAH BIODATA */

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

  /* MELIHAT RINCIAN PROYEK */

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
