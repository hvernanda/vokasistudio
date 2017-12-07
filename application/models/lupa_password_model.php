<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lupa_password_model extends CI_Model {
	public function genRndPass($length = 8, $specialCharacters = true){
		$digits = '';
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ23456789";

		if($specialCharacters === true)
			$chars .= "!?=/&+,.";

		for($i=0; $i < $length; $i++){
			$x = mt_rand(0, strlen($chars) -1);
			$digits .= $chars{$x};
		}
		return $digits;
	}

	public function genRndSalt()
	{
		return $this->genRndPass(8, true);
	}

	public function updatePassword($id, $insert_password){
		$this->db->where('email', $id);
		$this->db->set($insert_password);
		$get = $this->db->update('company');
		return $get;	
	}

	function check($email)
	{
	    $this->db->where('email',$email);
		$this->db->from('company');
		$get 	= 	$this->db->count_all_results();
		return $get;
	}

	public function resetPassword($email,$newPassword){	
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'agifrasinggih@gmail.com',
			'smtp_pass' => '54203312',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
			);

		$this->email->initialize($config);
		$this->email->set_newline("\r\n");
		$this->email->set_newline("\r\n");
		$this->email->from('agifrasinggih@gmail.com', "Vokasi Studios");
		$this->email->to($email);
		$this->email->subject("Reset Password");
		$this->email->message('your new password is :'.$newPassword);
		if(!$this->email->send())
		{

		}else{
			$this->session->set_flashdata('msgtrue',
	            '<div class="alert alert-warning">
	              <button type="button" class="close" data-dismiss="alert">
	              <span aria-hidden="true">
	                <div class="glyphicon glyphicon-volume-off">
	                </div>
	                </span>
	                <span class="sr-only">Close</span>
	              </button>
	            Selamat, Password baru telah dikirim ke email</br>
	            </div>'
	          );
		redirect('lupa_password');
		}
	}
}