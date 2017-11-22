<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index()
    {
        if ($this->session->userdata('id_status')=='5'){
            redirect('dashboard');
        }elseif ($this->session->userdata('id_status')== '1') {
            redirect('dashboard');
        }elseif ($this->session->userdata('id_status')== '2') {
            redirect('dashboard');
        }elseif ($this->session->userdata('id_status')== '3') {
            redirect('dashboard');
        }elseif ($this->session->userdata('id_status')== '6') {
            redirect('dashboard');
        }else{
        $this->load->view('v_login');
        }
    }

    public function proses_login2()
    {
        $this->form_validation->set_rules('email','Email','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');
        $data_login = array('email' => $this->input->post('email'), 
                            'password' => md5($this->input->post('password')));

        if($this->form_validation->run()==FALSE){
            $this->session->set_flashdata('msg1', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Email dan Password Tidak Boleh Kosong!!! ");
            redirect('login');
        }else{
            $hasil=$this->m_login->cek_login($data_login);
            if ($hasil->num_rows() == 1){ 
                foreach ($hasil->result() as $item){ 
                    $data = array(
                                'id_staff' => $item->id_staff,
                                'id_status' => $item->id_status,
                                'name' => $item->name,
                                'address' => $item->address,
                                'email' => $item->email,
                                'password' => $item->password,
                                'phone' => $item->phone,
                                'foto' => $item->foto,
                                'status_account' => $item->status_account
                                ); 
                    $this->session->set_userdata($data);
                    }
                    if($this->session->userdata('id_status')=='4'){
                        $data = array(
                            'manajer_vs_is_logged_in' => TRUE
                            );
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }elseif($this->session->userdata('id_status')=='5'){
                        $data = array(
                            'manajer_vs_is_logged_in' => TRUE
                            );
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }elseif($this->session->userdata('id_status')=='1'){
                        $data = array(
                            'user_is_logged_in' => TRUE
                            );
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }elseif($this->session->userdata('id_status')=='2'){
                        $data = array(
                            'user_is_logged_in' => TRUE
                            );
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }elseif($this->session->userdata('id_status')=='3'){
                        $data = array(
                            'user_is_logged_in' => TRUE
                            );
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }elseif($this->session->userdata('id_status')=='6'){
                        $data = array(
                            'user_is_logged_in' => TRUE
                            );
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }else{
                        $data = array(
                            'user_is_logged_in' => TRUE
                            );
                        $this->session->set_userdata($data);
                        redirect('dashboard');
                    }
            }else{ 
                $this->session->set_flashdata('msg2', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Cek Email dan Password yang anda masukkan!!! ");
                redirect('login'); 
            }
        }
    }         

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function register()
    {
        $this->load->view('login/v_register');
    }

    public function proses_register()
    {
        $object = array(
                    'name' => $this->input->post('name'),
                    'address' => $this->input->post('address'),
                    'email' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
                    'phone' => $this->input->post('phone')
                );

        $email=$this->input->post('email');
        $cek_email=$this->m_login->cek_email($email);

        if($cek_email->num_rows()>0){
                $this->session->set_flashdata('message1', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Maaf Email : $email yang anda masukkan sudah terdaftar!!! ");
                redirect('login/register');
            }else{
                $this->db->insert('staff', $object);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Selamat user telah ditambahkan, silahkan Login!!! ");
                $this->load->view('login/v_login');

            }
    }
/*
    public function proses_register_lengkap()
    {
        $id=$this->input->post('id');
        $alamat = $this->input->post('alamat');
        $agama = $this->input->post('agama');
        $golongan_darah = $this->input->post('golongan_darah');
        $no_telepon = $this->input->post('no_telepon');
        $email = $this->input->post('email');
        $pendidikan = $this->input->post('pendidikan');
        $pekerjaan = $this->input->post('pekerjaan');

        $data = array(
            'alamat' => $alamat,
            'agama' => $agama,
            'golongan_darah' => $golongan_darah,
            'no_telepon' => $no_telepon,
            'email' => $email,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan
        );

        $this->m_login->update_user($id,$data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data berhasil disimpan, silahkan Login!!!");
        redirect('login');
    }*/
}

?>
