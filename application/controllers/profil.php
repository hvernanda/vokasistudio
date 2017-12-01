<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('profil_model','',true);
        
        //$this->login_model->is_logged_global('home');
        $this->load->library('session');
    }

public function proses_edit_foto() 
    {
        if($this->session->userdata('user_is_logged_in')) {
            $id = $this->input->post('id_company');
            $foto = $this->input->post('photo');
            $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
            $config['upload_path'] = './assets/uploads/'; //path folder
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['max_size'] = '3072'; //maksimum besar file 3M
            $config['max_width']  = '5000'; //lebar maksimum 5000 px
            $config['max_height']  = '5000'; //tinggi maksimu 5000 px
            $config['file_name'] = $nmfile; //nama yang terupload nantinya
            $this->upload->initialize($config);
                if($_FILES['filefoto']['name'])
                {
                    if ($this->upload->do_upload('filefoto'))
                    {
                        $gbr = $this->upload->data();
                        $data = array(
                            'foto' =>$gbr['file_name']
                        );
                        $this->m_profil->add_gambar($id,$data); //akses model untuk menyimpan ke database
                        $config2['image_library'] = 'gd2'; 
                        $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                        $config2['new_image'] = './assets/hasil_resize/'; // folder tempat menyimpan hasil resize
                        $config2['maintain_ratio'] = TRUE;
                        $config2['width'] = 100; //lebar setelah resize menjadi 100 px
                        $config2['height'] = 100; //lebar setelah resize menjadi 100 px
                        $this->load->library('image_lib',$config2); 
                        //pesan yang muncul jika resize error dimasukkan pada session flashdata
                        if ( !$this->image_lib->resize())
                        {
                            $this->session->set_flashdata('errors', $this->image_lib->display_errors('', ''));   
                        }
                        //pesan yang muncul jika berhasil diupload pada session flashdata
                        $this->session->set_flashdata('message1', "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert'>x</button> 
                                        <class='fa fa-thumbs-up'> Foto berhasil diubah! ");
                        $path_uploads = './assets/uploads/'.$foto;
                        $path_hasil_resize = './assets/hasil_resize/'.$foto;
                        unlink($path_uploads);
                        unlink($path_hasil_resize);
                        redirect('profil/aboutme'); //jika gagal maka akan ditampilkan form upload
                    }else{
                        echo $this->upload->display_errors(); die();
                        redirect('profil/aboutme'); //jika gagal maka akan ditampilkan form upload
                    }
                }
        }else{
            redirect('profil/aboutme');
        }
    }

    public function ambil_user($idCompany="") 
    {
        $this->load->model('profil_model');
        $this->load->model('home_klien_model');
            $email = $this->session->userdata('email');
            $password = $this->session->userdata('password');
            $get = $this->login_model->getCompanyID($email,$password)->row()->id_company;
            $listProject = $this->home_klien_model->viewProjectClient($get);
                $data = array(
                'page' => 'content/edit_profil',
                'user' => $this->login_model->getClient($this->session->userdata('email'),$this->session->userdata('password')),
                'client'=>FALSE,
                'idCompany' => $get,
                'listProject' => $listProject,
                'result' => $this->profil_model->ambil_user($get)
                    
            );
            if($idCompany==""){
                redirect('home_klien');
            }else{
            $this->load->view('home_klien',$data);
            } 
    }

    Public function index($idCompany="")
    {
        $this->load->model('profil_model');
        $this->load->model('home_klien_model');
            $email = $this->session->userdata('email');
            $password = $this->session->userdata('password');
            $get = $this->login_model->getCompanyID($email,$password)->row()->id_company;
            $listProject = $this->home_klien_model->viewProjectClient($get);

        $data = array(
            'page' => 'content/profil',
            'user' => $this->login_model->getClient($this->session->userdata('email'),$this->session->userdata('password')),
            'client' => FALSE,
            'profil' => FALSE,
            'idCompany' => $get,
            'listProject' => $listProject,
            'result' => $this->profil_model->ambil_user($idCompany)
        );
        if($idCompany==""){
            redirect('home_klien');
        }else{
            $this->load->view('home_klien',$data);
        }
    }
    public function editProfil()
    {

        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('address');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $password = $this->input->post('password1');
        $data = array(
            'name' => $nama,
            'address' => $alamat,
            'email' => $email,
            'phone' => $phone,
            'password' => $password
        );

        if($this->profil_model->editProfil($data, $id)){
            $reg = array(
                    'global' => true,
                    'email' => $email,
                    'password' => $password
                );
                
                $this->session->set_userdata($reg);
            redirect('profil/index/'.$id);
        }else{
            echo "Alamak";
        }
    }

    function changePhoto()
    {
        $ext     = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $imgName = base_url().'img/'.time().".".$ext;
        $imgNameUpload = time().".".$ext;
        $config['upload_path'] = './img';
        $config['file_name']   = $imgNameUpload;
        $config['overwrite']   = 'FALSE';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']     = '2048';
        $config['max_width']    = '2048';
        $config['max_height']   = '2048';
        $this->load->library('upload', $config, 'imgUpload');
        $this->imgUpload->initialize($config);

        $imgUpload = $this->imgUpload->do_upload('photo');

        $id = $this->input->post('id');

        $data = array(
            'photo' => $imgName,
        );

        if($this->profil_model->editProfil($data, $id)){
            redirect('profil/index/'.$id);
        }else{
            echo "Alamak";
        }
    }
}