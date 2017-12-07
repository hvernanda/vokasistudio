<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
    {
       	parent::__construct();
        $this->load->model('m_home');
        $this->load->model('m_kru');
        $this->load->model('m_login');
        $this->load->model('m_profil');
        $this->load->model('m_laporan');
        
        if($this->session->userdata('manajer_vs_is_logged_in')=='')
        {
        $this->session->set_flashdata('msg3', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Silahkan Login kembali! ");
        redirect('login');
    	}
    }

	Public function index()
	{
		if($this->session->userdata('manajer_vs_is_logged_in'))
        {
            $id = $this->session->userdata('id');
            $email = $this->session->userdata('email');
        }
         $kru = null;
        foreach($this->m_laporan->tiapKru() as $row){
            $kru[]=$row['nama'];
            $kru[]=$row['Jumlah_Proyek'];
        }
        // $cl = null;
        // foreach($this->m_laporan->tiapClient() as $row){
        //     $cl[]=$row['namaClient'];
        //     $cl[]=$row['JumlahProyek'];
        // }
        // print_r($cl);
        // print_r($kru);
        //$ids = $this->input->post('id');
		$data = array(
			'page' => 'content/v_laporan',
            'result' => $this->m_home->ambil_user($email),
            'tiapKru' => $this->m_laporan->tiapKru(),
            'tiapClient' => $this->m_laporan->tiapClient()
            // 'status' => $this->m_kru->ambil_semua_user_status()    
		);
        
        // $id_user = $this->input->post('id_user');
        // $data['detail'] = $this->m_home->ambil_user_komplit($id_user);
        // // print_r($data['skill']);
		$this->load->view('v_template',$data);
	}

    public function ambil_user() 
    {
        if($this->session->userdata('manajer_is_logged_in'))
        {
            $id = $this->session->userdata('id_staff');
        }
        $ids = $this->session->userdata('id_staff');
                $data = array(
                // 'detail_toolskill' => $data2,
                'page' => 'content/v_aboutme_edit_manajer',
                'result' => $this->m_profil->ambil_user($ids)
                    
            );
                // print_r($data);
            $this->load->view('v_template',$data); 
    }

    public function block() 
    {
        $id = $this->input->post('id');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $status_akun= $this->input->post('status_akun');
        $data['result'] = $this->m_home->ambil_user($email);

        $data = array(
            'status_account' => $status_akun
        );

        $this->m_kru->block($id,$data);
        $this->session->set_flashdata('message', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data Profil '$nama_lengkap' berhasil di block!!! ");
        redirect('staffManajer/index/');
    }

    public function aktif() 
    {   
        $id = $this->input->post('id');
        $nama_lengkap = $this->input->post('nama_lengkap');
        $status_akun= $this->input->post('status_akun');
        $data['result'] = $this->m_home->ambil_user($email);

        $data = array(
            'status_account' => $status_akun
        );

        $this->m_kru->aktif($id,$data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data Profil '$nama_lengkap' berhasil diaktikan kembali! ");
        redirect('staffManajer/index/');
    }

    public function detail_user()
    {
        if($this->session->userdata('admin_is_logged_in'))
        {
            $id = $this->session->userdata('id');
        }

        $id_user = $this->input->post('id_user');
        $data['detail'] = $this->m_home->ambil_user_komplit($id_user);
        $data['result'] = $this->m_home->ambil_user($email);
        $data['page'] = "Detail Profil User";
        
        $this->load->view('v_template',$data);
        $this->load->view('admin/dashboard/v_user_detail', $data);
        $this->load->view('v_footer');
    }

    public function detail($id){
        $data = $this->m_home->ambil_user_komplit($id);
        echo json_encode($data);
    }
        public function hapus_user($id)
    {
        $this->m_kru->hapus_user($id);
        $this->session->set_flashdata('message', "<div class='alert alert-danger'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Data Profil berhasil dihapus!!! ");
        redirect('staffManajer');
    }

    public function tambahStaff()
    {
        if($this->session->userdata('manajer_vs_is_logged_in'))
        {
            $id = $this->session->userdata('id');
            $email = $this->session->userdata('email');
        }

        $data = array(
            'page' => 'content/v_tambahStaff',
            'result' => $this->m_home->ambil_user($email)
            );
        $this->load->view('v_template',$data);
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
                redirect('staffManajer/tambahStaff');
            }else{
                $this->db->insert('staff', $object);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>
                                <button type='button' class='close' data-dismiss='alert'>x</button> 
                                <class='fa fa-thumbs-up'> Selamat user telah ditambahkan, silahkan Login!!! ");
                redirect('staffManajer/index');

            }
    }

    public function tampilStaff($id){
        // $stu_id = $_POST['id_staff'];
        // $asd['data'] = $this->m_kru->ambil_tok($stu_id);
        // $this->load->view("content/modal", $asd);
        // echo json_encode($result);
        $data = $this->m_kru->ambil_tok($id);
        echo json_encode($data);
    }

    public function ajax_edit($id)
        {
            $data = $this->m_kru->get_crew_by_id($id);
            echo json_encode($data);
        }

    public function searchBySkill(){
        if($this->session->userdata('manajer_vs_is_logged_in'))
        {
            $id = $this->session->userdata('id');
            $email = $this->session->userdata('email');
        }

        $data = array(
            'page' => 'content/v_cari',
            'result' => $this->m_home->ambil_user($email),
            'staff' => $this->m_kru->ambil_semua_user_staff(),
            'search' => $this->m_kru->cari(),
            'skill' => $this->m_kru->tampilSkill()
            // 'status' => $this->m_kru->ambil_semua_user_status()    
        );
        
        $this->load->view('v_template',$data);

    }

}
