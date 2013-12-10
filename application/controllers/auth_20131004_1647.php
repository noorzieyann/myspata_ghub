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
		date_default_timezone_set('Asia/Kuala_Lumpur');
		
		$this->output->enable_profiler(TRUE); //display query statement
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
				$ses = $this->session->all_userdata();
				//echo $ses['loggedin'];
				$query = $this->aauth->check_role($ses['user_id']);
				if($query->num_rows > 1){
					//echo "lebih 1";
					redirect('auth/pilih_role/'.$ses['user_id'],'refresh');
				}else{
				
				
				
				
					$query2 = $this->db->select('*');
					$query2 = $this->db->from('tbl_myspata_user');
					$query2 = $this->db->join('tbl_myspata_user_to_matrix', 'tbl_myspata_user.myspata_userid = tbl_myspata_user_to_matrix.myspata_userid');
					$query2 = $this->db->join('tbl_user_matrix', 'tbl_myspata_user_to_matrix.role_pengguna_id = tbl_user_matrix.role_pengguna_id', 'left');
					$query2 = $this->db->where('tbl_myspata_user.myspata_userid', $ses['user_id']);
					$query2 = $this->db->order_by("tbl_user_matrix.role_pengguna_id", "asc");
					$query2 = $this->db->order_by("tbl_user_matrix.modul_id", "asc");
					$query2 = $this->db->get();
								
					$row2 = $query2->row();
					
					$menu = array();
								
					//print_r($query2);
					
					
					foreach ($query2->result_array() as $keymenu => $rowmenu)
					{
						$menu[] = array(
							'menu_role_id'.'['.$keymenu.']' => $rowmenu['role_pengguna_id'],
							'menu_role_pengguna'.'['.$keymenu.']' => $rowmenu['role_pengguna'],
							'menu_role_kump_id'.'['.$keymenu.']' => $rowmenu['kump_pengguna_id'],
							'menu_role_kump_pengguna'.'['.$keymenu.']' => $rowmenu['nama_kump_pengguna'],
							'menu_modul_id'.'['.$keymenu.']' => $rowmenu['modul_id'],
							'menu_modul_name'.'['.$keymenu.']' => $rowmenu['modul'],
							'menu_cipta'.'['.$keymenu.']' => $rowmenu['cipta'],
							'menu_baca'.'['.$keymenu.']' => $rowmenu['baca'],
							'menu_kemaskini'.'['.$keymenu.']' => $rowmenu['kemaskini'],
							'menu_hapus'.'['.$keymenu.']' => $rowmenu['hapus'],
							'menu_sah'.'['.$keymenu.']' => $rowmenu['sah'],
							'menu_lulus'.'['.$keymenu.']' => $rowmenu['lulus']
						);
					}
					//$this->nativesession->set( 'menu', $menu );
					$this->aauth->set_session( 'menu', $menu );
					
					
					
					
					
				}//end else
/*
//////////////////////////	DISABLE SAT NO ///////////////////////////
			
//////////////////////////	DISABLE SAT NO ///////////////////////////
*/
				
				
				
				
				//redirect(site_url('main'));
			}else{
				// FAIL LOGIN
				
				$this->session->set_flashdata('login_error', TRUE);
				//redirect(site_url('auth/login'));
				echo "<script>alert('Error login!')</script>";
				redirect(site_url('auth/login'));
				
				/*
				?>
				<script>
				alert('ID Pengguna & Katalaluan tidak sah!');
				window.location= '../../../portal/';
				</script>
				<?php
				*/
			}

		}
	
	}
	
	function pilih_role($id){
			$node_id = '1';
			$menu_name = 'front';
			$menu_link = 'login_pilih_role';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$this->db->select('tbl_myspata_user.myspata_userid, tbl_user_matrix.role_pengguna_id, tbl_user_matrix.kump_pengguna_id, tbl_user_matrix.nama_kump_pengguna');
			$this->db->from('tbl_myspata_user');
			$this->db->join('tbl_myspata_user_to_matrix','tbl_myspata_user.myspata_userid = tbl_myspata_user_to_matrix.myspata_userid');
			$this->db->join('tbl_user_matrix','tbl_user_matrix.role_pengguna_id = tbl_myspata_user_to_matrix.role_pengguna_id');
			$this->db->where('tbl_myspata_user.myspata_userid',$id);
			$this->db->group_by('tbl_user_matrix.role_pengguna_id');
			$query = $this->db->get();
			
			$data['row'] = $query;
			$data_radio = array();
			
			foreach($query->result() as $dtrow){
				//$data_radio[$dtrow->role_pengguna_id] = 'Kump->'.$dtrow->kump_pengguna_id.', Role->'.$dtrow->role_pengguna_id.', Nama Kump->'.$dtrow->nama_kump_pengguna;
				$data_radio[$dtrow->role_pengguna_id] = $dtrow->nama_kump_pengguna;
			}
			
			$data['data_radio'] = $data_radio;
			
			if($this->input->post('hantar') == 'Hantar'){
				$this->aauth->set_session( 'role_user_id', $this->input->post('namaradio'));
				//$this->aauth->get_session('menu');





					$query2 = $this->db->select('*');
					$query2 = $this->db->from('tbl_myspata_user');
					$query2 = $this->db->join('tbl_myspata_user_to_matrix', 'tbl_myspata_user.myspata_userid = tbl_myspata_user_to_matrix.myspata_userid');
					$query2 = $this->db->join('tbl_user_matrix', 'tbl_myspata_user_to_matrix.role_pengguna_id = tbl_user_matrix.role_pengguna_id', 'left');
					$query2 = $this->db->where('tbl_myspata_user.myspata_userid', $id);
					$query2 = $this->db->where('tbl_user_matrix.role_pengguna_id', $this->input->post('namaradio'));
					$query2 = $this->db->order_by("tbl_user_matrix.role_pengguna_id", "asc");
					$query2 = $this->db->order_by("tbl_user_matrix.modul_id", "asc");
					$query2 = $this->db->get();
								
					$row2 = $query2->row();
					
					$menu = array();
								
					//print_r($query2);
					
					
					foreach ($query2->result_array() as $keymenu => $rowmenu)
					{
						$menu[] = array(
							'menu_role_id'.'['.$keymenu.']' => $rowmenu['role_pengguna_id'],
							'menu_role_pengguna'.'['.$keymenu.']' => $rowmenu['role_pengguna'],
							'menu_role_kump_id'.'['.$keymenu.']' => $rowmenu['kump_pengguna_id'],
							'menu_role_kump_pengguna'.'['.$keymenu.']' => $rowmenu['nama_kump_pengguna'],
							'menu_modul_id'.'['.$keymenu.']' => $rowmenu['modul_id'],
							'menu_modul_name'.'['.$keymenu.']' => $rowmenu['modul'],
							'menu_cipta'.'['.$keymenu.']' => $rowmenu['cipta'],
							'menu_baca'.'['.$keymenu.']' => $rowmenu['baca'],
							'menu_kemaskini'.'['.$keymenu.']' => $rowmenu['kemaskini'],
							'menu_hapus'.'['.$keymenu.']' => $rowmenu['hapus'],
							'menu_sah'.'['.$keymenu.']' => $rowmenu['sah'],
							'menu_lulus'.'['.$keymenu.']' => $rowmenu['lulus']
						);
					}
					//$this->nativesession->set( 'menu', $menu );
					$this->aauth->set_session( 'menu', $menu );




				
				redirect(site_url('main'),'refresh');
			}else{
			
				$this->load->view('template/default', $data);
			}
	}
	
	function logout(){
		$this->aauth->logout();
		redirect(site_url('auth/login'));
		//redirect('../../portal/');
	}
	
}
