<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edit_proyek extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('edit_proyek_model','',true);
         $this->load->model('proyek_baru_model','',true);
        
        //$this->login_model->is_logged_global('home');
        $this->load->library('session');
    }


    public function editProyek($id)
    {

        if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
        {
            show_404();
        }

        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $dp = $this->input->post('dp');
        $deadline = $this->input->post('deadline');
        $revisideadline = $this->input->post('revisi');
        $type = $this->input->post('tipe');
        $status = $this->input->post('status');
        $id = $this->input->post('id');

        $amountHarga = str_replace('.', '', $harga);
        $amountDp = str_replace('.', '', $dp);

        $insert_project = array(
            'name' => $nama,
            'price' => $amountHarga,
            'DP' => $amountDp,
            'dealTime' => date('Y-m-d'),
            'deadline' => $deadline,
            'revisionDeadline' => $revisideadline,
            'status' => $status
        );

        if(empty($nama) OR empty($harga) OR empty($type)){
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
            //redirect('proyek_baru/index/'.$id);
            //echo "efe";
        }else{
            $this->edit_proyek_model->editProyek($insert_project, $id);
            //print_r($id);
            $insert_type = NULL;
             $this->edit_proyek_model->deleteCurrentType($id);
           for ($i=0; $i < count($type) ; $i++) { 
                $insert_type = array('id_type' => $type[$i],'id_project' => $id);
                $this->proyek_baru_model->insertProjectType($insert_type);
            }
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
            //redirect('detil_proyek/index/'.$id);
            echo $id;
            }
        }

        Public function index($id)
    {
        $this->load->model('proyek_baru_model','',true);

        if($this->login_model->is_logged_crew('login') OR $this->login_model->is_logged_keuangan_proyek('login') OR $this->login_model->is_logged_keuangan_vokasi('login') OR $this->login_model->is_logged_manajer_proyek('login'))
        {
            show_404();
        }
        $data = array(
            'user' => $this->login_model->getStatus($this->session->userdata('email'),$this->session->userdata('password')),
            'status' => $this->session->userdata('status'),
            'tipeProyek' => $this->proyek_baru_model->getTipeProyek(),
            'page' => 'content/edit_proyek',
            'result' => $this->edit_proyek_model->ambil_proyek($id),
            'id' => $id
        );

        $this->load->view('home',$data);
    }
    
}