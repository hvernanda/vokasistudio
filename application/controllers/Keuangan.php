<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keuangan extends CI_Controller {
  public $id_staf;

  public function __construct(){
    parent::__construct() ;
    $this->load->model('user_login_model');
    $this->load->model('keuangan_studio_model');
    $this->load->model('staff_model'); 

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

  public function keuangan_studio(){
    $data = array(
      'page' => 'dashboard/keuangan/keuangan_studio',
      'result' => $this->keuangan_studio_model->ambil_keuangan_studio(),
      'viewTabungan' => $this->keuangan_studio_model->ambil_tabungan_studio(),
    );
    $this->load->view('home', $data);
  }

  public function tambah_data_studio(){
    $data = array(
      'page' => 'dashboard/keuangan/tambah_data_studio',
      'namaStaf'=> $this->keuangan_studio_model->pilih_staff(),
    );
    $this->load->view('home', $data);
  }
  public function inputDataTransaksiVokasi()
  { 
    $date = $this->input->post('date');
    $amnt = $this->input->post('amount');
    $keperluan = $this->input->post('keperluan');
    $keterangan = $this->input->post('keterangan');
    $savings = $this->input->post('savings'); 
    $id_staf_p = $this->input->post('id_staf');
    $status = $this->input->post('status');

    $amount = str_replace('.', '', $amnt);
    
    if ($keterangan == 1) {
      $input = array(
        'name' => $keperluan,
        'date' => $date,
        'amount' => '-'.$amount,
        'total' => 1,
        'id_activity' => 0,
        'id_savings' => $savings, 
        'id_staff' => $this->id_staf,
      );
      $operration = "pengeluaran vokasi";
    } elseif ($keterangan == 2) {
      $input = array(
        'name' => $keperluan,
        'amount' => '+'.$amount,
        'total' => 1,
        'date' => $date,
        'id_activity' => 0,
        'id_savings' => $savings, 
        'id_staff' => $this->id_staf,
      );
      $operration = "pemasukan vokasi";
    } 

    if(empty($keterangan) OR empty($amount) OR empty($date) OR empty($savings)){
      $this->session->set_flashdata('msgfalse','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Data tidak boleh kosong </br>
              </div>'
          );
      redirect('keuangan/tambah_data_studio');
    }else{
      $this->keuangan_studio_model->inputDataVokasi($input);
      if (!empty($id_staf_p) && !empty($status)) {
        $id_finance = $this->db->insert_id();

        $inputPinjam = array(
          'id_staff' => $id_staf_p,
          'status' => $status,
          'id_finance' => $id_finance
        ); 
        $this->keuangan_studio_model->inputDataDefisitVokasi($inputPinjam);
      }else{
        $this->session->set_flashdata('msgtrue','<div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">
                  <span aria-hidden="true">
                    <div class="glyphicon glyphicon-remove">
                    </div>
                    </span>
                    <span class="sr-only">Close</span>
                  </button>
                <b>Success!</b> Data tidak boleh kosong </br>
                </div>'
              );
        redirect('keuangan/tambah_data_studio');
      } 
      
      $this->keuangan_studio_model->updateTabunganVokasi($amount, $savings, $operration);
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
      redirect('keuangan/tambah_data_studio');
    } 
  }

  public function updatePemasukanVokasi($id)
  {
 
    $amount = $this->input->post('amount');
    $date = $this->input->post('date');
    $keterangan = $this->input->post('keterangan');
    $savings = $this->input->post('savings');

    $update = array(
      'name' => $keterangan,
      'amount' => $amount,
      'date' => $date,
      'id_savings' => $savings
    );
    if(empty($keterangan) OR empty($amount) OR empty($date) OR empty($type)){
      $this->session->set_flashdata('msgfalsevokasi','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Data tidak boleh kosong </br>
              </div>');
      redirect('keuangan_vokasi_studios/editPemasukan/'.$id);
    }else if(!is_numeric($amount)){
      $this->session->set_flashdata('msgfalsevokasi','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Format angka salah </br>
              </div>');
      redirect('keuangan_vokasi_studios/editPemasukan/'.$id);
    }elseif($amount < 1){
      $this->session->set_flashdata('msgfalsevokasi','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> data tidak boleh negatif atau nol </br>
              </div>');
      redirect('keuangan_vokasi_studios/editPemasukan/'.$id);
    }else{
      $this->keuangan_vokasi_model->updatePemasukanVokasi($update, $id);
      $this->keuangan_vokasi_model->updateTabunganVokasi($amount, $savings, 'pemasukan vokasi');
      $this->session->set_flashdata('msgtruevokasi','<div class="alert alert-success">
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
      redirect('keuangan_vokasi_studios/editPemasukan/'.$id);
    } 
  } 

}
