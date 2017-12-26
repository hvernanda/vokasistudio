<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
* Manage manajer vokasi studio functions controller
* Create, Read, Update and Delete
* By Naqiya Zorahima
* 17 Dec 2017
*/

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
