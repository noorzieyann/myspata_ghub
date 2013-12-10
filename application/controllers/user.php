<?php

class User extends CI_Controller {

	function index(){
		$this -> login();
	}
	
	function login(){
		
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Password', 'required|md5|trim');
		
		if($this->form_validation->run() == FALSE){
			$data['main_content'] = 'login';
			$this->load->view('template/default', $data);
		}else{
		    // PROSES INPUT USERNAME DAN PASSWORD
			
			extract($_POST);
			
			$user_id = $this->User_model->check_login($username,$password);
			if(! $user_id){
				// LOG MASUK GAGAL!
				$this->session->set_flashdata('login_error', TRUE);
				redirect(site_url('user/login'));
			}else{
				// LOG MASUK BERJAYA!
				
				$this->session->set_userdata(array('is_logged_in' => TRUE, 'user_id' => $user_id));
				
				redirect(site_url('main'));
			}
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect(site_url('user/login'));
	}
	
	function is_login(){
		if($this->session->userdata('is_logged_in')){
			return TRUE;
		} else {
			return FALSE;
		}
		
	}
	
}
