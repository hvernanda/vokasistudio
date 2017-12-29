<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Defisit_studio extends CI_Controller {
  public $id_staf;

  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model');
    $this->load->model('staff_model');    
    $this->load->model('defisit_studio_model'); 

    if(!$this->user_login_model->checkLogged())
      redirect('/') ;
    else{
      $this->id_staf = $this->staff_model->getStaffId($this->session->userdata('logged_in')['id_user'])[0]->id_staff;
    }
  }

  public function index(){
    $data = array(
      'page' => 'dashboard/keuangan/index'
    ) ;
    $this->load->view('home', $data) ;
  }

  public function all(){
    $data = array(
      'page' => 'dashboard/keuangan/defisit_studio',
      'result' => $this->defisit_studio_model->viewDefisitVokasi(),
    );
    $this->load->view('home', $data);
  }
  public function bayar($id)
  {
    $returnDate = date('Y-m-d');
    $status = 'sudah dibayar'; 

    $update = array(
      'returnDate' => $returnDate, 
      'status' => $status
    );
    $this->defisit_studio_model->updatePembayaran($update, $id); 
    $this->session->set_flashdata('msgtrue','<div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">
                <div class="glyphicon glyphicon-remove">
                </div>
                </span>
                <span class="sr-only">Close</span>
              </button>
            <b>Success!</b> Data berhasil di input</br>
            </div>'
            );
    redirect('defisit_studio'); 
  }
  public function TambahDataDefisitVokasi()
  { 
    $data = array(
      'page' => 'dashboard/keuangan/defisit_studio',
      
      'status' => $this->session->userdata('status'),
    );

    $this->load->view('home',$data);
  }
  public function editDatadefisitVokasi($id)
  {
    $data = array(
      'page' => 'dashboard/keuangan/defisit_studio',
      
      'status' => $this->session->userdata('status'),
      'view' => $this->defisit_studio_model->viewEdit($id)
    );

    $this->load->view('home',$data);
  }
  public function inputDataDefisitVokasi()
  { 

    $name = $this->input->post('name');
    $amnt = $this->input->post('amount');
    $borrowDate = $this->input->post('borrowDate');
    $keperluan = $this->input->post('info'); 

    $amount = str_replace('.', '', $amnt); 

    $input = array(
      'name' => $name,
      'amount' => $amount, 
      'borrowDate' => $borrowDate,
      'status' => 'belum dibayar',
      'info' => $keperluan 
    );

    if(empty($name) OR empty($amount) OR empty($borrowDate) OR empty($keperluan)){
      $this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Data tidak boleh kosong </br>
              </div>');
      redirect('defisit_studio/TambahDataDefisitVokasi');
    }else{
      $this->defisit_studio_model->inputDataVokasi($input); 
      $this->session->set_flashdata('msgtrue','<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Success!</b> Data berhasil di input</br>
              </div>'
              );
      redirect('defisit_studio/TambahDataDefisitVokasi');
    } 
  }
  public function updateDefisitVokasi($id)
  { 

    $name = $this->input->post('name');
    $amnt = $this->input->post('amount');
    $borrowDate = $this->input->post('borrowDate');
    $keperluan = $this->input->post('info'); 

    $amount = str_replace('.', '', $amnt); 

    $update = array(
      'name' => $name,
      'amount' => $amount, 
      'borrowDate' => $borrowDate, 
      'info' => $keperluan 
    );

    if(empty($name) OR empty($amount) OR empty($borrowDate) OR empty($keperluan)){
      $this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Data tidak boleh kosong </br>
              </div>');
      redirect('defisit_studio/editDatadefisitVokasi/'.$id);
    }else{
      $this->defisit_studio_model->updateDefisitVokasi($update, $id); 
      $this->session->set_flashdata('msgtrue','<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Success!</b> Data berhasil di input</br>
              </div>'
              );
      redirect('defisit_studio/editDatadefisitVokasi/'.$id);
    } 
  } 
}
?>