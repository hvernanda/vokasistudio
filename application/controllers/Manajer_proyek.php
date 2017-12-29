<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajer_proyek extends CI_Controller {
  public function __construct(){
    parent::__construct() ;

    $this->load->model('manajer_proyek_model');
    $this->load->model('staff_model');
  }

  public function index(){
    $session_data = $this->session->userdata('logged_in');  
    $session_data['id_staff'] = $this->staff_model->getStaffId($session_data['id_user']); 
    
    // if(!auth($id_user,$id_project)){
    //     show_404();
    // }
    
    $data = array(
      'page' => 'dashboard/manajer_proyek/index'
    );
    $this->load->view('home', $data);
  }

  public function add_crew($id){
    if($this->user_login_model->checkManajer() == false) redirect('/') ;

      $role = $this->query("SELECT * FROM crew_role");
      $staff = $this->manajer_proyek_model->getAvaibleStaff($id);
      $data = array(
        'page' => 'dashboard/staff/manajer/add_crew',
        'role' => $role,
        'staff' => $staff
      );

      if($this->input->post('submit')){
        $this->form_validation->set_rules('nama', 'Name', 'required|trim') ;
        $this->form_validation->set_rules('role', 'Role', 'required') ;

        if($this->form_validation->run() == FALSE){
          $this->load->view('home', $data) ;
        }else{
          $nama = $this->input->post('nama');
          $dealtime = $this->input-> post('role');
          $input_data = $this->manajer_proyek_model->insert_crew($nama, $role);

          if($input_data){
            redirect('/project/'. $id) ;
          }else{
            $this->load->view('home', $data) ;
          }
        }
      }else{
        $this->load->view('home', $data) ;
      }
  }

  /* SETELAH KLIK MANAGE */
  public function project($id){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    $data = array(
      'page' => 'dashboard/staff/manajer/project_dashboard',
      'result' => $this->manajer_proyek_model->viewCrew($id)
    );
    $this->load->view('home', $data);
  }

  /* LIHAT SEMUA STAFF YANG MAU DIMASUKKIN KE SUATU PROJECT */
  public function tampilSemuaStaff(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
    }
    $data = array(
      'page' => 'dashboard/manajer_proyek/view_staff/all',
      'isi' => $this->manajer_proyek_model->viewAllStaff(),
    );
    $this->load->view('home', $data);
  }

  /* KIRIM REQUEST UNTUK IKUT PROYEK KE STAFF */
  public function tambahCrew($id_project){
    $id_staff = $this->input->post('id_staff');
    $id_role = $this->input->post('id_role');
    
    $this->manajer_proyek_model->tambahCrewProject($id_staff,$id_project,$id_role);
  }


  /* DAFTAR PENUGASAN - START */
  public function daftar_penugasan($id){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_staff = $session_data['id_staff'];
    }

    // print_r($this->session->userdata('id_project'));exit;
    $data = array(
      'page'  => 'dashboard/staff/manajer/daftar_penugasan',
      'isi'   => $this->manajer_proyek_model->tampilPenugasan($id),
      'crew'  => $this->manajer_proyek_model->getCrew($id),
    );
    // print_r($data['isi']);
    $this->load->view('home', $data);
  }
  
  public function namaJob(){
    $data['hasil'] = $this->manajer_proyek_model->namaJob()->result;
  }

  public function namaKruDaftarPenugasan(){
    $ambil_id = $this->session->userdata('id_project');
    $data['hasil2'] = $this->manajer_proyek_model->namaKruDaftarPenugasan($ambil_id)->result;
  }

  public function penugasan($id){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_staff = $session_data['id_staff'];
      $id_project = $session_data['id_project'];
    }
    $a = $this->manajer_proyek_model->namaJob()->result();
    $b = $this->manajer_proyek_model->namaKru($id_project)->result();
    $data = array(
      'page' => 'content/form_penugasan',
      'hasil' => $a,
      'hasil2' => $b
    );
    $this->load->view('home',$data);
  }

  public function inputData(){
    if(empty($this->input->post('id_crew')) OR empty($this->input->post('id_job'))
      OR empty($this->input->post('upah')) OR empty($this->input->post('namaJob'))){
    
      $this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Data tidak boleh kosong </br>
              </div>');
      redirect('Daftar_penugasan/penugasan');
    }else{
      $date = null;
        if ($this->input->post('diterima')=="") {
      // echo('asdasd');
      $date = date("Y-m-d");
    }
      else{
        $date = $this->input->post('diterima');
      }
        $st=1;
        $count = count($this->input->post('id_crew'));
        $this->db->trans_begin();
        foreach ($this->input->post('id_crew') as $row) {
          print_r($row);
          $data = array(
            'id_job' => $this->input->post('id_job'),
            'id_crew' => $row,
            'acceptance_date' => $date,
            'deadline' => $this->input->post('deadline'),
            'name' => $this->input->post('namaJob'),
            'fee' => $this->input->post('upah')
          );
          $q = $this->manajer_proyek_model->inputDataPenugasan($data);
          if($q !=1)$st=0;
        }
        if ($this->db->trans_status() === FALSE){
          $this->db->trans_rollback();
          echo 'gagal';
        }
      else{
        $this->db->trans_commit();
        $this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
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
        redirect('daftar_penugasan');
      }
    } 

    $date = null;
    if ($this->input->post('diterima')=="") {
      // echo('asdasd');
      $date = date("Y-m-d");
    }
    else{
      $date = $this->input->post('diterima');
    }
    $st=1;
    $count = count($this->input->post('id_crew'));
    $this->db->trans_begin();
    foreach ($this->input->post('id_crew') as $row) {
      print_r($row);
      $data = array(
        'id_job' => $this->input->post('id_job'),
        'name' => $this->input->post('name'),
        'id_crew' => $row,
        'acceptance_date' => $date,
        'deadline' => $this->input->post('deadline'),
        'name' => $this->input->post('namaJob'),
        'fee' => $this->input->post('upah')
        );
      $q = $this->manajer_proyek_model->inputDataPenugasan($data);
      if($q !=1)$st=0;
    }
    if ($this->db->trans_status() === FALSE){

              $this->db->trans_rollback();
              echo 'gagal';
    }
    else{
            $this->db->trans_commit();
            redirect('daftar_penugasan');
    }
  }

  public function setScore(){
    $data = array(
      'rating' => $this->input->post('_val'),
    );

    $q = $this->manajer_proyek_model->setScore($this->input->post('_id'),$data);
    if($q==1){
      echo $this->input->post('_val');
    }else{
      echo 'failed';
    }
  }

  public function setFee(){
    $data = array(
      'fee' => $this->input->post('_val'),
    );

    $a = $this->manajer_proyek_model->setFee($this->input->post('_id'),$data);
    if($a==1){
      echo $this->input->post('_val');
    }else{
      echo 'failed';
    }
  }

  public function getFee(){
    # code...
    // print_r($this->input->post('_name'));
    // echo 'halo';
    // echo $this->input->post('_name');

    $a = $this->manajer_proyek_model->getFee($this->input->post('_name'));
    if($a->num_rows() < 1 ){
      echo 'fail';
    }else{
      
      echo json_encode($a->result())  ;
    }
  }

  public function getScore(){
    $a = $this->manajer_proyek_model->getScore($this->input->post('_score'));
    if($a->num_rows() < 1 ){
      echo 'fail';
    }else{
      
      echo json_encode($a->result())  ;
    } 
  }

  /* DAFTAR PENUGASAN - END */


  /* PENUGASAN - START */

  // public function daftar_penugasan($id){
  //   if($this->session->userdata('logged_in')){
  //     $session_data = $this->session->userdata('logged_in');  
  //     $id_staff = $session_data['id_staff'];
  //     $id_project = $id;
  //   }
  //   // print_r($this->session->userdata('id_project'));exit;
  //   $data = array(
  //     'page' => 'dashboard/staff/manajer/daftar_penugasan',
  //     'isi' => $this->manajer_proyek_model->tampilKru($id_project),
  //   );
  //   $this->load->view('home', $data);
  // }
  public function form_tambah_penugasan_kru(){
    $data = array(
      'tugas' => $this->input->post('tugas')
    );
    $data2 = array(
      'page' => 'content/form_tambah_penugasan'
    );
    $data['isi']    = $this->manajer_proyek_model->tambahKru($data);

    $this->load->view('home',$data2);
  }

  public function tambahPenugasan(){
    if($this->session->userdata('user_is_logged_in')){
      $email = $this->session->userdata('email');
      $id = $this->session->userdata('id_staff');
    }
    $a = $this->manajer_proyek_model->namaKruPenugasan()->result();
    // $b = $this->manajer_proyek_model->viewJob()->result();
    $data = array(
      'page' => 'content/form_tambah_penugasan',
      'data' => $this->m_login->ambil_user($id),
      'hasil' => $a,
      // 'hasil2' => $b
    );
    $this->load->view('home',$data);
  }

  public function namaKruPenugasan(){
    $data['hasil'] = $this->manajer_proyek_model->namaKru()->result;
  }

  public function edit($id_j){
    if($this->session->userdata('user_is_logged_in')){
      $email = $this->session->userdata('email');
      $id = $this->session->userdata('id_staff');
    }
    $a = $this->manajer_proyek_model->tampilEditPenugasan($id);
    $data = array(
        'view' =>$this->manajer_proyek_model->tampilEditPenugasan($id_j),
        'page' => 'content/form_edit_penugasan',
        'data' => $this->m_login->ambil_user($id),
        'hasil' => $a
      );
    $this->load->view('home',$data);
  }
  public function prosesEditJob(){
    $name = $_POST['name'];
    $id_crew = $_POST['id_crew'];
    $acceptance = $_POST['diterima'];
    $deadline = $_POST['deadline'];
    $id = $_POST['id'];
    $data = array(
      'name' => $name,
      'id_crew' => $id_crew,
      'acceptance_date' => $acceptance,
      'deadline' => $deadline
      );
    $a = $this->manajer_proyek_model->update('jobassignment', $data, $id);
    if($a>=1){
      redirect('Penugasan');
    }
  }
  public function deleteJobA($key){
    $this->manajer_proyek_model->getdelete($key);
    redirect('penugasan');
  }

  public function inputDataJobA(){
    $name = $this->input->post('name');
    $id_crew = $this->input->post('id_crew');
    $acceptance = $this->input->post('diterima');
    $deadline = $this->input->post('deadline');

    $data = array (
      'name' => $name,
      'id_crew' => $id_crew,
      'acceptance_date' => $acceptance,
      'deadline' => $deadline
      );
    // print_r($data);
  if(empty($name) OR empty($id_crew) OR empty($acceptance) OR empty($deadline)){
      $this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Data tidak boleh kosong </br>
              </div>');
      redirect('daftar_penugasan/');
    
    }else{
      $this->db->insert('jobassignment', $data);
      $this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
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
      redirect('Penugasan/tambahPenugasan');
    } 
  }

  /* PENUGASAN - END */

  /* AKTIVITAS FUNCTION - START */

  public function aktivitasIndex(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_staff = $session_data['id_staff'];
      }
    $id_project = $session_data['project'];
    $data = array(
      'page' => 'content/Aktivitas',
      'isi' => $this->manajer_proyek_model->tampilAktPersonal($id,$id_project),
    );
    
    $this->load->view('home',$data);
  }

  public function activitasDetail($id){
    $data = array(
      'page' => 'content/Aktivitas',
      'isi' => $this->manajer_proyek_model->tampilDetailAkt($id)
    );
    
    $this->load->view('home',$data);
  }

  public function form_activity(){
    $data = array(
      'Aktivitas' => $this->input->post('aktivitas')
    );
    $data2 = array(
      'page' => 'content/form_activity',
    );
    $data['isi']  = $this->manajer_proyek_model->tambahAkt($data);

    $this->load->view('home',$data2);
  }

  public function tambahAktivitas(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_staff = $session_data['id_staff'];
      $id_project = $session_data['id_project'];
    }
    $a = $this->manajer_proyek_model->namaAkt($id_staff, $id_project);
    // $b = $this->manajer_proyek_model->viewJob()->result();
    $data = array(
      'page' => 'content/form_activity',
      'ini' => $a,
      // 'hasil2' => $b
    );
    $this->load->view('home',$data);
  }

  public function form_upload(){
    if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_staff = $session_data['id_staff'];
      $id_project = $session_data['id_project'];
    }
    $data = array(
      'page' => 'content/form_upload',
    );
    $this->load->view('home', $data);
  }

  public function do_upload(){
    $id = $this->input->post('id_activity');

    $config['upload_path'] = "./file";
    // echo $config['upload_path'] ;
    $config['allowed_types'] = 'gif|jpg|png|JPEG|pdf|docx';
    $config['file_name'] = url_title($this->input->post('file_upload'));

    $this->upload->initialize($config);
    if( !$this->upload->do_upload('file_upload'))
    {
      $this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> File tidak boleh kosong </br>
              </div>');
      redirect('Aktivitas');
    }
    else{
      $update = array(
        'upload_file' 	=> $this->upload->file_name,
        );
      
      $this->manajer_proyek_model->getupdate($id, $update);
      $this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Success!</b> Data berhasil di Upload</br>
              </div>'
              );
      redirect('Aktivitas');
    }
  }

  public function inputDataAktivitas(){
    $penugasan = $this->input->post('penugasan');
    $aktivitas = $this->input->post('aktivitas');
    // $date = $this->input->post('date');
    // $start = $this->input->post('start');
    // $finish = $this->input->post('finish');
    $informasi = $this->input->post('informasi');
    $lokasi_file = $this->input->post('lokasi_file');
    $lokasi_backup = $this->input->post('lokasi_backup');
    $upload_file = $this->input->post('upload_file');

    $input = array (
      'id_job_assignment' => $penugasan,
      'name' => $aktivitas,
      // 'date' => $date,
      // 'start_time' => $start,
      // 'finish_time' => $finish,
      'information' => $informasi,
      'file_location' => $lokasi_file,
      'file_backup_location' => $lokasi_backup,
      'upload_file' => $upload_file
      );
  
  if(empty($penugasan) OR empty($aktivitas)){
      $this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Data tidak boleh kosong </br>
              </div>');
      redirect('Aktivitas');
    
    }else{	
      $this->manajer_proyek_model->tambahAkt($input);
      $this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
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
      redirect('Aktivitas');
    } 
  }

  public function setEndTime(){
    // print_r($this->input->post());
    date_default_timezone_set("Asia/Jakarta");
    $now 	= date('Y-m-d H:i:s');
    $now2	= date('H:i:s');
    $data 	= array(
        'finish_time' => $now,
      );

    $query = $this->manajer_proyek_model->setEndTime($this->input->post('_id'),$data);
    if($query==1)echo $now2;
    else echo 'failed';
    // print_r($now);
  }

  public function setLokasi(){
    $komputer = $this->input->post('komputer');
    $lokasi_file = $this->input->post('lokasi');
    $lokasi_backup = $this->input->post('backup');
    $data = array (
      'komputer' => $komputer,
      'file_location' => $lokasi_file,
      'file_backup_location' => $lokasi_backup
      );
    if(empty($komputer) OR empty($lokasi_file) OR empty($lokasi_backup)){
      $this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                  <div class="glyphicon glyphicon-remove">
                  </div>
                  </span>
                  <span class="sr-only">Close</span>
                </button>
              <b>Error!</b> Data tidak boleh kosong </br>
              </div>');
      redirect('Manajer_proyek');
    }else{
    $this->manajer_proyek_model->setLokasi($this->input->post('id_act'),$data);
    $this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
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
        redirect('Manajer_proyek');
    }
  }
  /* AKTIVITAS FUNCTION - END */


  /* MASTER PENUGASAN - START */
  
  public function masterPenugasanIndex(){
		if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_staff = $session_data['id_staff'];
      $id_project = $session_data['id_project'];
    }

		// print_r($this->session->userdata('id_project'));exit;
		$data = array(
			'page' => 'content/master_penugasan',
			'isi' => $this->manajer_proyek_model->tampilJob($id_project),
		);
		$this->load->view('home', $data);
	}
	public function form_tambah_penugasan_job(){
		$data = array(
			'tugas' => $this->input->post('tugas')
		);
		$data2 = array(
			'page' => 'content/form_tambah_penugasan'
		);
		$data['isi']		= $this->manajer_proyek_model->tambahJob($data);

		$this->load->view('home',$data2);
	}

	
	public function tambahJob(){
		$job = $this->input->post('job');
		$data = array(
			'name' => $this->input->post('job')
		);
		// return $this->input->post('job');
		// print_r($this->input->post());
		// print_r($this->m_master_penugasan->tambahJob($data));
		
    if(empty($job)){
    $this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">
                <div class="glyphicon glyphicon-remove">
                </div>
                </span>
                <span class="sr-only">Close</span>
              </button>
            <b>Error!</b> Data tidak boleh kosong </br>
            </div>');
    redirect('master_penugasan');
		
		}else{
			$this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Success!</b> Data berhasil di tambah</br>
	            </div>'
	            );
			if ($this->manajer_proyek_model->tambahJob($data)==1) {
		 	redirect('master_penugasan');
		 } 
		} 
	}

	public function editPenugasan($id_j){
		if($this->session->userdata('logged_in')){
      $session_data = $this->session->userdata('logged_in');  
      $id_staff = $session_data['id_staff'];
      $id_project = $session_data['id_project'];
    }
		$a = $this->manajer_proyek_model->tampilEditJob($id);
		$data = array(
				'view' =>$this->manajer_proyek_model->tampilEditJob($id_j),
				'page' => 'content/form_edit_penugasan',
			);
		$this->load->view('home',$data);
	}
	public function prosesEditNJob(){
		$name = $this->input->post('name');
		$id = $this->input->post('id_job');
		$data = array(
			'name' => $name
			);
		if(empty($name)){
			$this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Data tidak boleh kosong </br>
	            </div>');
			redirect('master_penugasan');
		
		}else{
			$a = $this->manajer_proyek_model->updateJob('job', $data, $id);
		// print_r($a);
		
			$this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Success!</b> Data berhasil di Edit</br>
	            </div>'
	            );
			if($a>=1){
			  redirect('master_penugasan');
		  }
		} 
		// if(empty($name)){
		// 	$this->session->set_flashdata(
		// 		'msgfalse',
		// 		'<div class="callout callout-danger">
		// 			<h4>Tugas harus diisi</h4>
		// 		</div>');
		// 	redirect('master_penugasan');
		// }
		// else{
		// 	$this->session->set_flashdata(
		// 		'msgtrue',
		// 		'<div class="callout callout-success">
		// 			<h4>Tugas berhasil diubah</h4>
		// 		</div>');
		// 	redirect('master_penugasan');
		// }
		
	}
	public function deleteJob($key){
		$this->manajer_proyek_model->getDeleteJob($key);
		redirect('master_penugasan');
	}

	public function inputDataMasterPenugasan(){
		$name = $this->input->post('name');
		$id_crew = $this->input->post('id_crew');
		$acceptance = $this->input->post('diterima');
		$deadline = $this->input->post('deadline');

		$data = array (
			'name' => $name,
			'id_crew' => $id_crew,
			'acceptance_date' => $acceptance,
			'deadline' => $deadline
			);
		// print_r($data);
	if(empty($name) OR empty($id_crew) OR empty($acceptance) OR empty($deadline)){
			$this->session->set_flashdata('msgfalseproject','<div class="alert alert-danger">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-remove">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            <b>Error!</b> Data tidak boleh kosong </br>
	            </div>');
			redirect('Penugasan/tambahPenugasan');
		
		}else{
			$this->db->insert('jobassignment', $data);
			$this->session->set_flashdata('msgtrueproject','<div class="alert alert-success">
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
			redirect('Penugasan/tambahPenugasan');
		} 
	}

  /* MASTER PENUGASAN - END */


  /* PROGRESS PROYEK - START */

  public function progressIndex(){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		
		$data = array(
			'page' => 'content/progresproject',
			'data' => $this->m_login->ambil_user($id)
			
		);
		$data['isi']		= $this->progresproject_model->tampilAktivitas();

		$this->load->view('home',$data);
  }
  
  public function beriKomen(){
		if($this->session->userdata('user_is_logged_in')){
			$email = $this->session->userdata('email');
			$id = $this->session->userdata('id_staff');
		}
		// $b = $this->manajer_proyek_model->viewJob()->result();
		$data = array(
			'page' => 'content/form_komen',
			'data' => $this->m_login->ambil_user($id)
		);
		$data['isi'] = $this->progresproject_model->tambahKomenProgress();
		$this->load->view('home',$data);
	}

  /* PROGRESS PROYEK - END */
}




?>