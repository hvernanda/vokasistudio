<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

    $data = array(
      'page' => 'dashboard/staff/index'
    );
    $this->load->view('home', $data) ;
  }

  /*
  * Manage staff functions controller
  * Create, Read, Update and Delete Staff data
  * These functions below is functions for Manajer Vokasi Studio
  * By Naqiya Zorahima
  * 17 Dec 2017
  */
  public function all(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;
    $data =  array(
      'page' => 'dashboard/manajer/all_staff',
      'result' => $this->staff_model->ambil_user(),
    );

    $this->load->view('home',$data);
  }

  public function all_tool_skill(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;

    $data =  array(
      'page' => 'dashboard/manajer/all_tool_skill',
      'result' => $this->staff_model->ambil_tool_skill(),
    );

    $this->load->view('home',$data);
  }
  public function all_tool(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $data = array(
        'page' => 'dashboard/manajer/all_tools',
        'result' => $this->staff_model->get_all_tool()
      ) ;

      $this->load->view('home', $data) ;
    }
    public function all_skill(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $data = array(
        'page' => 'dashboard/manajer/all_skill',
        'result' => $this->staff_model->get_all_skill()
      ) ;

      $this->load->view('home', $data) ;
    }
    public function add_tool(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Name', 'required|trim') ;

        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('warning_type', 'Project Type is required') ;
          redirect('/staff/all_tool') ;
        }else{
          $name = $this->input->post('name') ;

          if($this->staff_model->insert_tool($name)){
            redirect('/staff/all_tool') ;
          }else{
            $this->session->set_flashdata('warning_type', 'Error, insert data failed!') ;
            redirect('/staff/all_tool') ;
          }
        }
      }else{
        redirect('/staff/all_tool') ;
      }
    }

    public function add_skill(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('name', 'Name', 'required|trim') ;

        if($this->form_validation->run() == FALSE){
          $this->session->set_flashdata('warning_skill', 'Project Type is required') ;
          redirect('/staff/all_skill') ;
        }else{
          $name = $this->input->post('name') ;

          if($this->staff_model->insert_skill($name)){
            redirect('/staff/all_skill') ;
          }else{
            $this->session->set_flashdata('warning_skill', 'Error, insert data failed!') ;
            redirect('/staff/all_skill') ;
          }
        }
      }else{
        redirect('/staff/all_skill') ;
      }
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

  public function set_status($status, $id_user){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;
    
    if($this->staff_model->isStaff($id_user)){
      if($this->staff_model->update_status($status, $id_user)){
        redirect('/staff/all') ;
      }else{
        $this->session->set_flashdata('msgfailed', 'Failed to change staff status.') ;
        redirect('/staff/all') ;
      }
    }else{
      $this->session->set_flashdata('msgfailed', 'No staff found.') ;
        redirect('/staff/all') ;
    }
  }

  public function edit_skill(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Skill Name', 'required|trim') ;

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('warning_edit_skill', 'Skill Name is required!') ;
        redirect('/staff/all_skill') ;
      }else{
        $name = $this->input->post('name') ;
        $id_skill = $this->input->post('id_skill') ;

        if($this->staff_model->update_skill($id_skill, $name)){
          redirect('/staff/all_skill') ;
        }else{
          $this->session->set_flashdata('warning_edit_skill', 'Error, update data failed!') ;
          redirect('/staff/all_skill') ;
        }
      }
    }else{
      redirect('/staff/all_skill') ;
    }
  }

  public function edit_tool(){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;

    if($this->input->post('submit')){
      $this->form_validation->set_rules('name', 'Name', 'required|trim') ;

      if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('warning_edit_tools', 'Tool Name is required!') ;
      }else{
        $name = $this->input->post('name') ;
        $id_tool = $this->input->post('id_tool') ;

        if($this->staff_model->update_tool($id_tool, $name) == false)
          $this->session->set_flashdata('warning_edit_tools', 'Error, update data failed!') ;
      }

      redirect('/staff/all_tool') ;
    }else{
      redirect('/staff/all_tool') ;
    }
  }

  public function delete_skill($id_skill){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;

    if($this->staff_model->isSkill($id_skill)){
      if($this->staff_model->delete_skill($id_skill)) return true ;
      return false ;
    }
    return false ;
  }

  public function delete_tool($id_tool){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;

    if($this->staff_model->isTool($id_tool)){
      if($this->staff_model->delete_tool($id_tool)) return true ;

      return false ;
    }
    return false ;
  }

  /*
  * End of naqiya's functions to manage staff
  */
  
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
      'data' => $this->staff_model->getStaffBio(),
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

    public function add_tool_skill(){
      if($this->user_login_model->checkManajer() == false) redirect('/') ;

      
      $a = $this->db->query("SELECT id_skill,skill_name from skill")->result();
      $b = $this->db->query("SELECT id_tool,tool_name from tool")->result();
      $data = array(
        'page' => 'dashboard/manajer/add_tool_skill',//
        'daftar' => $a,
        'list' => $b,
         'types' => $this->staff_model->get_all_tool(),
         'skill' => $this->staff_model->get_all_skill()//
      ) ;

      if($this->input->post('submit')){
        $this->form_validation->set_rules('id_tool', 'Tools', 'required') ;
        $this->form_validation->set_rules('skill', 'Skill', 'required') ;
        

        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
         
          $id_tool = $this->input ->post('id_tool');
          $skill = $this->input ->post('skill');
          $input_data = $this->staff_model->insert_tool_skill($id_tool, $skill);

          if($input_data){
            redirect('/staff/all') ;
          }else{
            $this->load->view('home', $data) ;
          }
        }
      }else{
        $this->load->view('home', $data) ;
      }
    }

  
}
