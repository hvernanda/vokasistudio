<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajer extends CI_Controller {
  // Just a sample function created by Ashari Muhammad Hisbulloh
  public function __construct(){
    parent::__construct() ;
    $this->load->model('staff_model');

    $this->load->model('client_model');

    $this->load->model('project_model');
        //$this->load->model('m_kru');
        //$this->load->model('m_history');

  }

  public function index(){
    $data = array(
      'page' => 'dashboard/manajer/index',

      //'staff' => $this->m_kru->ambil_semua_user_staff(),
      //'data' => $this->m_kru->ambil_done($email)
    ) ;
    $this->load->view('home', $data) ;
  }

  public function add_staff(){
    $data = array(
      'page' => 'dashboard/manajer/add_staff',
      'error' => '',
      'success' => ''
    ) ;

    $this->load->view('home', $data) ;
  }
  public function add_staff_process(){
   $nama = $this->input->post('nama');
   $email = $this->input->post('email');
   $password = $this->input->post('password');
   $id_user_role = $this->input->post('id_user_role');

   $this->staff_model->insert_staff($nama, $email, $password, $id_user_role);
 }

 public function add_client(){
  $data = array(
    'page' => 'dashboard/manajer/add_client',
    'error' => '',
    'success' => ''
  ) ;

  $this->load->view('home', $data) ;
}
public function add_client_process(){
 $nama = $this->input->post('nama');
 $email = $this->input->post('email');
 $password = $this->input->post('password');

 $this->client_model->insert_client($nama, $email, $password);
}

public function add_proyek(){
  $data = array(
    'page' => 'dashboard/manajer/add_proyek',
    'client' => $this->client_model->ambil_user(),
    'error' => '',
    'success' => ''
  ) ;

  $this->load->view('home', $data) ;
}

public function all_proyek(){ 
  $data =  array(
    'page' => 'dashboard/manajer/all_proyek',
    'result' => $this->project_model->ambil_project(),
  );
  $this->load->view('home',$data);
}
public function add_project_process(){
 $nama = $this->input->post('nama');
 $dealtime  = $this->input->post('dealtime');
 $price = $this->input->post('price');
 $deadline = $this->input->post('deadline');
 $revisiondate = $this->input->post('revisiondate');
 $status = $this->input->post('status'); 
 $downpayment= $this->input->post('downpayment');
 $id_contact= $this->input->post('id_contact');



 $this->project_model->insert_project($nama, $dealtime, $price, $deadline, $revisiondate, $status, $downpayment, $id_contact);
}

public function all_staff()
{ $data =  array(
  'page' => 'dashboard/manajer/all_staff',
  'result' => $this->staff_model->ambil_user(),

);
$this->load->view('home',$data);
}
public function all_company()
{ $data =  array(
  'page' => 'dashboard/manajer/all_company',
  'result' => $this->client_model->ambil_company(),

);
$this->load->view('home',$data);
}
public function add_client_company(){
  $data = array(
    'page' => 'dashboard/manajer/add_client_company',
    'error' => '',
    'success' => ''
  ) ;

  $this->load->view('home', $data) ;
}
public function add_client_company_process(){
 $nama = $this->input->post('nama');
 $email = $this->input->post('email');
 $address= $this->input->post('address');
 $phone= $this->input->post('address');

 $this->client_model->insert_client_company($nama, $email, $address, $phone);
}
public function all_company_contact()
{ $data =  array(
  'page' => 'dashboard/manajer/all_company',
  'result' => $this->client_model->ambil_user(),

);
$this->load->view('home',$data);
}
}
