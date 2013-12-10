<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
		AUTHOR : MOHD KHAIRUL RAMLI
		LAST UPDATE : 07-2013
		FILE NAME : auth.php
		ACTUAL LOCATION : application/controllers/auth.php
*/

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// Your own constructor code
		//$this->output->enable_profiler(TRUE); //display query statement
    }
	
	public function contoh(){
		echo 'contoh untuk github';
	}

	function index(){
		$this -> login();
	}
	
	function login(){
		
		$this->form_validation->set_rules('username', 'No Kad Pengenalan', 'required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('password', 'Kata Laluan', 'required');
		
		if($this->form_validation->run() == FALSE){
			$node_id = '1';
			$menu_name = 'front';
			$menu_link = 'login';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			$this->load->view('template/default', $data);
		}else{
		    // PROSES INPUT USERNAME DAN PASSWORD
			
			extract($_POST);

			//$user_id = $this->User_model->check_login($username,$password);
			if ($this->aauth->login($username, $password)){
				// SUCCESS LOGIN
				//echo "<script>alert('berjaya login!')</ script>";
				redirect(site_url('main'));
			}else{
				// FAIL LOGIN
				//$this->session->set_flashdata('login_error', TRUE);
				//redirect(site_url('auth/login'));
				//echo "<script>alert('Error login!')</ script>";
				//redirect(site_url('auth/login'));
				
				?>
				<script>
				alert('ID Pengguna & Katalaluan tidak sah!');
				window.location= '../../../portal/';
				</script>
				<?php
			}

		}
	
	}
	
	function logout(){
		$this->aauth->logout();
		//redirect(site_url('auth/login'));
		redirect('../../portal/');
	}
	
}
