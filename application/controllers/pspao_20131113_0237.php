<?php

class Pspao extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
   		$this->load->library('pagination');
    	$this->load->library('table','download');
		
		$this->load->helper(array('form', 'url'));
		$this->load->helper('function_helper');
		$this->load->helper('utiliti');
		
		$this->load->model('pspao_akhir_model');
		$this->load->model('pnpa_model');
		
		$this->load->model('function_model');
				
		//$this->output->enable_profiler(TRUE); //display query statement
		
		if(!$this->aauth->is_loggedin()){
			echo '<script>';
			echo 'alert("Belum Login");';
			echo 'window.location = "'.site_url('auth').'"';
			echo '</script>';
		}
		
	}


	function index()
	{
		// DATA-DATA YG BOLEH GUNA BILA LOGIN!
		
		//$this->aauth->is_loggedin();
		//$this->aauth->logout();
		
		if($this->aauth->is_loggedin()){
			$node_id = '1';
			$menu_name = 'front';
			$menu_link = 'main';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			$this->load->view('template/default', $data);
		}else{
			redirect('auth');
		}
		
	}
	
///////////////// -PSPAO Akhir- -START- //////////////
        
        function kusang()
        {
			$node_id = '33';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/kusang';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);         
        }
        
        function pspao_akhir()
        {
			$node_id = '33';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/default';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            //$this->load->view('template/default',$data); 
			
			
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
			
			        
        }
        
        function arahan_sedia_pspao_akhir()
        {
			$node_id = '12';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/arahan_sedia_pspao_akhir';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);




			$sessionarray = $this->session->all_userdata();
			$user_kemid = $sessionarray['user_kemid'];
		
			$data['user_list'] = $this->pspao_akhir_model->get_user_list($user_kemid,4);
		
		
			if($this->input->post('hantar')=='hantar'){
		
				//$userid = $this->input->post('userid');
				//$userdetail =  $this->pspao_model->get_detail_user($userid[0]);
				//$update_pspaoawal = $this->pspao_model->updatepspaoawalptf($userid[0],$pspao_awal_id);
				//$path = 'pspao_awal/arahan_sedia_pspao/'.$pspao_awal_id;
				//$this->function_model->insert_notifikasi(2,1,$sessionarray['user_id'],$userid[0],$path)  ; 
				//redirect('pspao_awal/senarai_pspao_baru');
			}


    if($this->input->post('hantar')=='hantar'){

        $userid = $this->input->post('userid');
        //echo $userid[0];
        $update_pspaoawal = $this->pspao_model->updatepspaoawalptf($userid[0],$pspao_awal_id);

        $path = 'pspao_awal/arahan_sedia_pspao/'.$pspao_awal_id;

        $this->function_model->insert_notifikasi(2,7,$sessionarray['user_id'],$userid[0],$path)  ; 

        //redirect('pspao_awal/senarai_pspao_baru');

    }



            $this->load->view('template/default',$data);         
        }
 
////////// 		BARU BUAT UNTUK 2 USER PTF DAN PPD ///////////// 		17 OCT 2013

        function arahan_sedia_pspao_akhir_ptf($id)
        {
			$node_id = '12';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/arahan_sedia_pspao_akhir_ptf';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);




			$sessionarray = $this->session->all_userdata();
			$user_kemid = $sessionarray['user_kemid'];
		
			$data['user_list'] = $this->pspao_akhir_model->get_user_list($user_kemid,4);
		
		
			if($this->input->post('hantar')=='Hantar'){
		
				$userid = $this->input->post('userid');
				
				$gen_key = date("Ymd").rand(55555, 99999);
				
				$path = 'pspao/arahan_sedia_pspao_akhir_ppd/'.$gen_key;
				//echo '<script>alert("masuk lah notifikasi oi")</ script>';
				$this->pspao_akhir_model->insert_sessionkey($sessionarray['user_id'],$userid[0],$id,$gen_key); //kusang update
				$this->function_model->insert_notifikasi(15,7,$sessionarray['user_id'],$userid[0],$path);
				
				//$data['detail_msg'] = $this->function_model->get_masej($pspao_awal_id,1);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Arahan sedia PSPA(O) Akhir telah dihantar. Klik butang OK untuk kembali ke Senarai PSPA(O) Awal.';
        		$data['link'] = 'pspao_awal/senarai_pspao_baru';
		
				//redirect('pspao_awal/senarai_pspao_baru');
		
			}



            $this->load->view('template/default',$data);         
        }


        function arahan_sedia_pspao_akhir_ppd($key)
        {
			$node_id = '12';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/arahan_sedia_pspao_akhir_ppd';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

			$sessionarray = $this->session->all_userdata();
			$user_kemid = $sessionarray['user_kemid'];
		
			$data['user_list'] = $this->pspao_akhir_model->get_user_list($user_kemid,8);
		
		
			if($this->input->post('hantar')=='Hantar'){
		
				$userid = $this->input->post('userid');
				
				$idpspaoawal = $this->pspao_akhir_model->get_pspao_awal_from_key($key);
				$path = 'pspao/pspao_akhir_baru/0/'.$idpspaoawal.'/'.$key;
				//echo '<script>alert("masuk lah notifikasi oi - g senarai awal")</ script>';
				$this->pspao_akhir_model->update_sessionkey($userid[0],$key);
				$this->function_model->insert_notifikasi(15,7,$sessionarray['user_id'],$userid[0],$path); 
				
				
				//$data['detail_msg'] = $this->function_model->get_masej($pspao_awal_id,1);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Arahan sedia PSPA(O) Akhir telah dihantar. Klik butang OK untuk kembali ke Senarai PSPA(O) Awal.';
        		$data['link'] = 'pspao_awal/senarai_pspao_baru';
		
				redirect('pspao_awal/senarai_pspao_baru');
		
			}



            $this->load->view('template/default',$data);         
        }
 
 ////////// 		BARU BUAT UNTUK 2 USER PTF DAN PPD ///////////// 		17 OCT 2013

 
 
        
        function senarai_template_pspao_awal()
        {
			$node_id = '34';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_template_pspao_awal';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
        
        function senarai_notifikasi_pspao_akhir()
        {
			$node_id = '35';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_notifikasi_pspao_akhir';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
        
        function pspao_akhir_baru()
        {
			$node_id = '13';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$this->form_validation->set_rules('tahun_mula', 'Tahun Mula', 'required');
			$this->form_validation->set_rules('tahun_akhir', 'Tahun Akhir', 'required');
			//$this->form_validation->set_rules('kementerian', 'Kementerian', 'required');
			$this->form_validation->set_rules('kand_visi', 'Visi', 'required');
			$this->form_validation->set_rules('kand_misi', 'Misi', 'required');
			$this->form_validation->set_rules('kand_objektif', 'Objektif', 'required');
			$this->form_validation->set_rules('kand_polisi', 'Polisi', 'required');
			$this->form_validation->set_rules('kand_pendahuluan', 'Pendahuluan', 'required');
			//$this->form_validation->set_rules('ukuran_dpa_sasaran', 'DPA Sasaran', 'required');
						
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default',$data);
			}else{
				//echo "<script>alert('Berjaya!')< /script>";
				
				$temp_url = 'pspao/pspao_akhir_baru_1';
				
				if($this->input->post('sunting') != NULL){
					//echo "<script>alert('Update Saja!')< /script>";
					$idpspao = $this->pspao_akhir_model->update_pspao_akhir($this->input->post('sunting'));
					$this->pspao_akhir_model->update_pspao_akhir_fungsiaset($this->input->post('sunting'));
					$temp_url .= '/'.$idpspao;
				}else{
					//echo "<script>alert('Insert!')< /script>";
					$idpspao = $this->pspao_akhir_model->insert_pspao_akhir();
					$this->pspao_akhir_model->insert_pspao_akhir_fungsiaset($idpspao);
					$temp_url .= '/'.$idpspao.'/'.$this->uri->segment(4);
					
				}
				//print_r($this->pspao_akhir_model->insert_pspao_akhir());
				
				//$this->load->view('template/default',$data);
				redirect($temp_url,'refresh');
			}
            //$this->load->view('template/default',$data);            
        }
		
        function pspao_akhir_baru_dariawal($id)
        {
			$node_id = '13';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_dariawal';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
						
			
			
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default',$data);
			}else{
				//echo "<script>alert('Berjaya!')< /script>";
				
				if($this->input->post('sunting') != NULL){
					echo "<script>alert('Update Saja!')</script>";
					$idpspao = $this->pspao_akhir_model->update_pspao_akhir($this->input->post('sunting'));
				}else{
					echo "<script>alert('Insert!')</script>";
					$idpspao = $this->pspao_akhir_model->insert_pspao_akhir();
				}
				//print_r($this->pspao_akhir_model->insert_pspao_akhir());
				
				//$this->load->view('template/default',$data);
				//redirect('pspao/pspao_akhir_baru_2/'.$idpspao,'refresh');
			}
            //$this->load->view('template/default',$data);            
        }
		
		
	function pspao_akhir_baru_1($idakhir,$idawal=NULL){

		$node_id = '13';
		$menu_name = 'menu1';
		$menu_link = 'pspao_akhir/pspao_akhir_baru_1';
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);  
		
			
		$data['ukuran_field'] = $this->pspao_akhir_model->get_ukuran_data();
	
		//$data['ukuran_data'] = $this->pspao_akhir_model->get_ukuran_data_title(); 
		//$data['ukuran_value'] = $this->pspao_akhir_model->get_ukuran_value($id);
	
		$sessionarray = $this->session->all_userdata(); 
		
		$data['ukuran_data'] = NULL;
		$data['ukuran_value'] = NULL;
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		//$this->form_validation->set_rules('tahun_mula', 'Tahun Mula', 'required');
	
	
		if($idawal != NULL){			
			$data['ukuran_data'] = $this->pspao_akhir_model->get_ukuran_data_title(); 
    		$data['ukuran_value'] = $this->pspao_akhir_model->get_awal_ukuran_value($idawal);
		}else{
			$data['ukuran_data'] = $this->pspao_akhir_model->get_ukuran_data_title(); 
			$data['ukuran_value'] = $this->pspao_akhir_model->get_ukuran_value($idakhir);
		}
	
		$data['testing_debug'] = '-Kosong-';
			
		/*if ($this->form_validation->run() == FALSE){
			//VALIDATION ERROR MASUK SINI
			$data['testing_debug'] = 'masuk';
			$this->load->view('template/default',$data);
		}else{
		*/
			//VALIDATION XDE ERROR MASUK SINI
			
			if($this->input->post('hantar') != NULL){
				
				$hantar_url = NULL;
				if($this->input->post('hantar') == 'Sebelum'){
					// HANTAR JUGAK TP REDIRECT KE PAGE 2
					
					//$data['testing_debug'] = $this->pspao_akhir_model->update_ukuran();
					if($idawal != NULL){
						$data['testing_debug'] = 'Sebelum | insert';
						$this->pspao_akhir_model->insert_ukuran();
					}else{
						$data['testing_debug'] = 'Sebelum | update';
						$this->pspao_akhir_model->update_ukuran();
					}
					$hantar_url = 'pspao/pspao_akhir_baru/';
				}
				if($this->input->post('hantar') == 'Seterusnya'){
					// HANTAR JUGAK TP REDIRECT KE PAGE 0
					
					if($idawal != NULL){
						$data['testing_debug'] = 'Seterusnya | insert';
						$this->pspao_akhir_model->insert_ukuran();
					}else{
						$data['testing_debug'] = 'Seterusnya | update';
						$this->pspao_akhir_model->update_ukuran();
					}
					$hantar_url = 'pspao/pspao_akhir_baru_2/';
				}
				redirect($hantar_url.$idakhir,'refresh');
			}
			
			$this->load->view('template/default',$data);
	
		//}

	}  
		
		
		
        function pspao_akhir_baru_2()
        {
			$node_id = '13';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$this->form_validation->set_rules('kand_pelaksanaan', 'Strategi Perlakasanaan', 'required');
			$this->form_validation->set_rules('kand_tadbir', 'Struktur Tadbir Urus Organisasi', 'required');
			$this->form_validation->set_rules('kand_sistem', 'Sistem, Prosedur, Piawaian dan Teknologi', 'required');
			$this->form_validation->set_rules('kand_kaedah_pelaksanaan', 'Kaedah Pelaksanaan (Dalaman dan Luaran)', 'required');
			$this->form_validation->set_rules('kand_penyediaan_pelan', 'Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset', 'required');
			$this->form_validation->set_rules('kand_pen_kep_sumber', 'Penyediaan Keperluan Sumber', 'required');
			$this->form_validation->set_rules('kand_pemantauan_pel', 'Pemantauan Pelaksanaan dan Pengukuran Output', 'required');
			$this->form_validation->set_rules('kand_kajian_semula', 'Kajian Semula Pengurusan', 'required');
			$this->form_validation->set_rules('kand_takwim_kpi', 'Takwim dan KPI Tadbir Urus Tpata', 'required');
			$this->form_validation->set_rules('kand_penutup', 'Penutup', 'required');
		
			$data['upload_error'] = NULL;
			$data['senarai_dokumen'] = $this->pspao_akhir_model->get_dokumenrujukan($this->uri->segment(3));
			
			if ($this->form_validation->run() == FALSE){
				//echo '<script>alert("test")< /script>';
				$this->load->view('template/default',$data);
			}else{
				$temp_url = 'pspao/pspao_akhir_baru_2/'.$this->uri->segment(3);
				if($this->input->post('hantar') && $this->input->post('sunting')!=NULL){
				  if($this->input->post('hantar') == 'Sebelum'){
					
					if($this->input->post('cek_row') == 0){
					  $idpspao = $this->pspao_akhir_model->insert_pspao_akhir2($this->input->post('sunting'));
					  $this->pspao_akhir_model->insert_pspao_akhir2_form1($idpspao);
					}else if($this->input->post('cek_row') == 1){
					  $idpspao = $this->pspao_akhir_model->update_pspao_akhir2($this->input->post('sunting'));
					  $this->pspao_akhir_model->update_pspao_akhir2_form1($idpspao);
					}
					$temp_url = 'pspao/pspao_akhir_baru_1/'.$idpspao;
				  	//redirect('pspao/pspao_akhir_baru_1/'.$idpspao,'refresh');
				  }
				  if($this->input->post('hantar') == 'Seterusnya'){
				  	
					if($this->input->post('cek_row') == 0){
					  $idpspao = $this->pspao_akhir_model->insert_pspao_akhir2($this->input->post('sunting'));
					  $this->pspao_akhir_model->insert_pspao_akhir2_form1($idpspao);
					}else if($this->input->post('cek_row') == 1){
					  $idpspao = $this->pspao_akhir_model->update_pspao_akhir2($this->input->post('sunting'));
					  $this->pspao_akhir_model->update_pspao_akhir2_form1($idpspao);
					}
					$temp_url = 'pspao/pspao_akhir_baru_4/'.$idpspao;
					//redirect('pspao/pspao_akhir_baru_4/'.$idpspao,'refresh');
				  }
				  
				  
				  /////// START UPLOAD LAMPIRAN ///////////// START
				  if($this->input->post('hantar') == 'Tambah'){
					$data['upload_error'] = 'Masuk dlm function upload';  
					  
				  	if($this->input->post('cek_row') == 0){
					  $idpspao = $this->pspao_akhir_model->insert_pspao_akhir2($this->input->post('sunting'));
					  $this->pspao_akhir_model->insert_pspao_akhir2_form1($idpspao);
					}else if($this->input->post('cek_row') == 1){
					  $idpspao = $this->pspao_akhir_model->update_pspao_akhir2($this->input->post('sunting'));
					  $this->pspao_akhir_model->update_pspao_akhir2_form1($idpspao);
					}
					$temp_url = 'pspao/pspao_akhir_baru_2/'.$idpspao;
					
					//////////// START FUNCTION UPLOAD ////////////
					
					$config['upload_path'] = $this->config->item('upload_path').'pspao/';
					$fullpath = base_url().$this->config->item('upload_path').'pspao/';
					//$config['allowed_types'] = 'docx|doc|ppt|pptx|xls|xlsx|jpg|png|jpeg|gif|pdf';
					$config['allowed_types'] = '*';
					$config['max_size']	= '10000';
					$config['file_name'] = 'lamp_pspao_'.sprintf("%03d", $idpspao).'_'.date("Ymd").'_'.rand(555, 999);
										
					$this->load->library('upload', $config);
					
					
					
					if ( ! $this->upload->do_upload())
					{
						$data['upload_error'] = '<span style="color:red">'.$this->upload->display_errors().'</span>';
					}
					else
					{
						//$data = array('upload_data' => $this->upload->data());
						$dataImage = $this->upload->data($data);
						$data['upload_error'] = '<span style="color:blue">Fail berjaya dimuat naik</span>';
						
						$data_file = array(
						  $this->input->post('namafile'),
						  $dataImage['file_name'],
						  $fullpath.$dataImage['file_name'],
						  $dataImage['file_type'],
						  $idpspao
						);
						
						//$this->pspao_akhir_model->get_dokumenrujukan($idpspao);
						$this->pspao_akhir_model->tambah_dokumenrujukan($data_file);
						
						//print_r($data_file);
					}					
					
					
					//////////// START FUNCTION UPLOAD ////////////
					//$this->load->view('template/default',$data);
				  }
				  /////// START UPLOAD LAMPIRAN ////////////// END
				  
				  
				}
				
				redirect($temp_url,'refresh');
				
				//echo "<script>alert('Berjaya!')< /script>";
				
		  }
			
			//insert_pspao_akhir2($idbaru);
            //$this->load->view('template/default',$data);            
        }
		
		function hapus_pspao_akhir_lampiran($id,$pspaoid){
			
			$url_betul = 'pspao/pspao_akhir_baru_2/'.$pspaoid;
			//echo $url_betul;
			$this->pspao_akhir_model->hapus_pspao_akhir_lampiran($id);
			redirect($url_betul,'refresh');
			
		}
		function hapus_pspao_akhir_lampiran_form5($id,$pspaoid,$kandid){
			
			$url_betul = 'pspao/pspao_akhir_baru_4_form5/'.$pspaoid.'/'.$kandid;
			//echo $url_betul;
			$this->pspao_akhir_model->hapus_pspao_akhir_lampiran($id);
			redirect($url_betul,'refresh');
			
		}
		
		
				
        function pspao_akhir_baru_3()
        {
			$node_id = '13';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_3';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			//$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            //$data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['asetkhusus'] = $this->pspao_akhir_model->get_asetkhusus();
			
			
			$quantity = 4; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_jkrpata2a(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir_baru_3');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_jkrpata2a());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Tahun/Fasa', 'Penerimaan<br>Aset','Operasi &<br>Penyelenggaraan<br>Aset', 'Penilai<br>Keadaan/<br>Prestasi Aset','Pemulihan/<br>Ubah Suai/<br>Naik Taraf Aset','Pelupusan<br>Aset','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No DPA',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'saizpremis',
                                  'label'   => 'Saiz Premis',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
        }
/*		// ASAL KUSANG BUAT 2013 10 20
        function pspao_akhir_baru_4($id)
        {
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_4';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['rows'] = $this->pspao_akhir_model->get_all_kandungan($id);
			$data['tahun_mula'] = $this->pspao_akhir_model->get_tahun_mula_pspao($id);
			$data['tahun_akhir'] = $this->pspao_akhir_model->get_tahun_akhir_pspao($id);
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian_pspao($id);
			
			if($this->input->post('hantar') == 'Simpan'){
				//echo "<script>alert('Simpan')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$this->pspao_akhir_model->insert_status_log($id,2);
				redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Simpan Deraf'){
				//echo "<script>alert('Simpan Deraf')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$this->pspao_akhir_model->insert_status_log($id,1);
				
				redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Sunting'){
				//echo "<script>alert('Sunting')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				
			}
			
			
            $this->load->view('template/default',$data);            
        }
*/

//		YANN BUAT INSERT NOTIFIKASI
        function pspao_akhir_baru_4($id)
        {
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_4';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			//yan
			$sessionarray = $this->session->all_userdata();
			//yan//

			$data['rows'] = $this->pspao_akhir_model->get_all_kandungan($id);
			$data['tahun_mula'] = $this->pspao_akhir_model->get_tahun_mula_pspao($id);
			$data['tahun_akhir'] = $this->pspao_akhir_model->get_tahun_akhir_pspao($id);
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian_pspao($id);
			
			
			$data['senarai_dokumen'] = $this->pspao_akhir_model->get_dokumenrujukan($id);		
			
			
			
			if($this->input->post('hantar') == 'Hantar'){
				//echo "<script>alert('Hantar')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$this->pspao_akhir_model->insert_status_log($id,2);

					//yan//
					$pspao_ptf_id   = $this->pspao_akhir_model->get_pspao_akhir_ptf_id($id); // get ptf id
					$path = 'pspao/senarai_pspao_akhir_ptf_2/'.$id;
					$this->function_model->insert_notifikasi(18,7,$sessionarray['user_id'],$pspao_ptf_id,$path);  //insert notifikasi
					//untuk hantar arahan sedia pelan tahunan
					$path1 = 'pnpa/arahan_penyediaan_pnpa_awal/'.$id;
					
					echo $this->function_model->cek_notifikasi_ptf(43,4,$pspao_ptf_id,$path1);
					if(!$this->function_model->cek_notifikasi_ptf(43,4,$pspao_ptf_id,$path1)){
						$this->function_model->insert_notifikasi(43,4,'',$pspao_ptf_id,$path1);  //insert notifikasi
					}
					
                   // $this->function_model->insert_notifikasi(43,4,'',$pspao_ptf_id,$path1);  //insert notifikasi
					

				$data['detail_msg'] = $this->function_model->get_masej($id,7);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Anda telah menghantar PSPA(O) Akhir ini untuk sahkan. Klik butang OK untuk kembali ke Senarai PSPA(O) Akhir.';
        		$data['link'] = 'pspao/senarai_pspao_akhir';

                                
				//redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Simpan Deraf'){
				
				//echo "<script>alert('Simpan Deraf')< /script>";
				//#$this->pspao_akhir_model->update_kandungan_pspao($id);
				//#$this->pspao_akhir_model->insert_status_log($id,1);
				
				$data['detail_msg'] = $this->function_model->get_masej($id,7);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Anda telah menghantar PSPA(O) Akhir ini sebagai Deraf. Klik butang OK untuk kembali ke Senarai PSPA(O) Akhir.';
        		$data['link'] = 'pspao/senarai_pspao_akhir';
				
				$pspao_ptf_id   = $this->pspao_akhir_model->get_pspao_akhir_ptf_id($id);
				$path1 = 'pnpa/arahan_penyediaan_pnpa_awal/'.$id;
				//cek_notifikasi_ptf($senarai_notifikasi_id,$kump_kand_id,$userid_to,$path)
				if(!$this->function_model->cek_notifikasi_ptf(43,4,$pspao_ptf_id,$path1)){
                	$this->function_model->insert_notifikasi(43,4,'',$pspao_ptf_id,$path1);  //insert notifikasi
				}
				//redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Sunting'){
				//echo "<script>alert('Sunting')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				
			}
			
			
            $this->load->view('template/default',$data);            
        }
		
        function pspao_akhir_baru_4_form1($id,$kandid){
			
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_4_form1';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['kandungan'] = $this->pspao_akhir_model->get_kandungan_form($kandid);
			$data['detail'] = $this->pspao_akhir_model->get_detail_form1($id);
			
			$data['ukuran_data'] = $this->pspao_akhir_model->get_ukuran_data_title(); 
			$data['ukuran_value'] = $this->pspao_akhir_model->get_ukuran_value($id);

			if($this->input->post('hantar')=='Hantar'){
				$this->pspao_akhir_model->update_ukuran();
				$this->pspao_akhir_model->update_kandungan_form($kandid);
				//echo '<script>alert("hantar doh lah")< /script>';
				redirect('pspao/pspao_akhir_baru_4/'.$id,'refresh');
			}
			
			$this->load->view('template/default',$data);  
		}
        function pspao_akhir_baru_4_form2($id,$kandid){
			
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_4_form2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['kandungan'] = $this->pspao_akhir_model->get_kandungan_form($kandid);
			$data['detail'] = $this->pspao_akhir_model->get_detail_form1($id);
			
			if($this->input->post('hantar')=='Hantar'){
				//$this->pspao_akhir_model->update_ukuran();
				//$this->pspao_akhir_model->update_kandungan_form($kandid);
				//echo '<script>alert("hantar doh lah")< /script>';
				redirect('pspao/pspao_akhir_baru_4/'.$id,'refresh');
			}
			
			$this->load->view('template/default',$data);  
		}
        function pspao_akhir_baru_4_form3($id,$kandid){
			
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_4_form3';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['kandungan'] = $this->pspao_akhir_model->get_kandungan_form($kandid);
			$data['detail'] = $this->pspao_akhir_model->get_detail_form1($id);
			
			if($this->input->post('hantar')=='Hantar'){
				$this->pspao_akhir_model->update_kandungan_form($kandid);
				$this->pspao_akhir_model->update_pspao_akhir_fungsiaset($id);
				//echo '<script>alert("hantar doh lah")< /script>';
				redirect('pspao/pspao_akhir_baru_4/'.$id,'refresh');
			}
			
			$this->load->view('template/default',$data);  
		}
        function pspao_akhir_baru_4_form4($id,$kandid){
			
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_4_form4';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['kandungan'] = $this->pspao_akhir_model->get_kandungan_form($kandid);
			$data['detail'] = $this->pspao_akhir_model->get_detail_form1($id);
			
			if($this->input->post('hantar')=='Hantar'){
				$this->pspao_akhir_model->update_kandungan_form($kandid);
				$this->pspao_akhir_model->update_pspao_akhir2_form1($id);
				//echo '<script>alert("hantar doh lah")< /script>';
				redirect('pspao/pspao_akhir_baru_4/'.$id,'refresh');
			}
			
			$this->load->view('template/default',$data);  
		}
        function pspao_akhir_baru_4_form5($id,$kandid){
			
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_4_form5';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['kandungan'] = $this->pspao_akhir_model->get_kandungan_form($kandid);
			$data['detail'] = $this->pspao_akhir_model->get_detail_form1($id);
			
			$data['senarai_dokumen'] = $this->pspao_akhir_model->get_dokumenrujukan($id);
			$data['upload_error'] = NULL;
			
			if($this->input->post('hantar')=='Hantar'){
				//$this->pspao_akhir_model->update_kandungan_form($kandid);
				//$this->pspao_akhir_model->update_pspao_akhir2_form1($id);
				//echo '<script>alert("hantar doh lah")< /script>';





				redirect('pspao/pspao_akhir_baru_4/'.$id,'refresh');
			}
			
			if($this->input->post('hantar')=='Tambah'){
				
					//////////// START FUNCTION UPLOAD ////////////
					
					$config['upload_path'] = $this->config->item('upload_path').'pspao/';
					$fullpath = base_url().$this->config->item('upload_path').'pspao/';
					$config['allowed_types'] = 'docx|doc|ppt|pptx|xls|xlsx|jpg|png|jpeg|gif|pdf';
					$config['max_size']	= '10000';
					$config['file_name'] = 'lamp_pspao_'.sprintf("%03d", $id).'_'.date("Ymd").'_'.rand(555, 999);
										
					$this->load->library('upload', $config);
					
					
					
					if ( ! $this->upload->do_upload())
					{
						$data['upload_error'] = '<span style="color:red">'.$this->upload->display_errors().'</span>';
					}
					else
					{
						//$data = array('upload_data' => $this->upload->data());
						$dataImage = $this->upload->data($data);
						$data['upload_error'] = '<span style="color:blue">Fail berjaya dimuat naik</span>';
						
						$data_file = array(
						  $this->input->post('namafile'),
						  $dataImage['file_name'],
						  $fullpath.$dataImage['file_name'],
						  $dataImage['file_type'],
						  $id
						);
						
						//$this->pspao_akhir_model->get_dokumenrujukan($idpspao);
						$this->pspao_akhir_model->tambah_dokumenrujukan($data_file);
						redirect('pspao/pspao_akhir_baru_4_form5/'.$id.'/'.$kandid,'refresh');
						//print_r($data_file);
					}					
					
					
					//////////// START FUNCTION UPLOAD ////////////
				
				
				
			}
			
			$this->load->view('template/default',$data);  
		}
		
		
        function pspao_akhir_baru_5()
        {
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru_5';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			//$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            //$data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['asetkhusus'] = $this->pspao_akhir_model->get_asetkhusus();
			
			
			$quantity = 4; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_jkrpata2a(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir_baru_5');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_jkrpata2a());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Tahun/Fasa', 'Penerimaan<br>Aset','Operasi &<br>Penyelenggaraan<br>Aset', 'Penilai<br>Keadaan/<br>Prestasi Aset','Pemulihan/<br>Ubah Suai/<br>Naik Taraf Aset','Pelupusan<br>Aset','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No DPA',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'saizpremis',
                                  'label'   => 'Saiz Premis',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION pspao_akhir_jkrpata2a_ptf
		


        function pspao_akhir_sunting_pp()
        {
			$node_id = '37';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_sunting_pp';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);         
        }
        
        function pspao_akhir_sunting_ptf()
        {
			$node_id = '38';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_sunting_ptf';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
        
        function senarai_pspao_akhir_ptf()
        {
			$node_id = '39';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ptf';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION senarai_pspao_akhir_ptf


        function senarai_pspao_akhir_ptf_2($id)
        {
			$node_id = '15';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ptf_2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$sessionarray = $this->session->all_userdata();
			
			$data['rows'] = $this->pspao_akhir_model->get_all_kandungan($id);
			$data['tahun_mula'] = $this->pspao_akhir_model->get_tahun_mula_pspao($id);
			$data['tahun_akhir'] = $this->pspao_akhir_model->get_tahun_akhir_pspao($id);
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian_pspao($id);
			
			$data['ulasan'] = $this->pspao_akhir_model->get_ulasan_terbaru($id,7);
			$data['statusid'] = $this->function_model->check_status_log($id,7,0);
			$data['ceklomp'] = $this->pspao_akhir_model->get_pspao_sah_value($id);
			
			if($this->input->post('hantar') == 'Sah'){
				//echo "<script>alert('Simpan')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$this->pspao_akhir_model->update_pspao_date_sah($id);
				$this->pspao_akhir_model->insert_status_log($id,4);
				
				$path = 'pspao/senarai_pspao_akhir_pp_2/'.$id;
				$this->function_model->insert_notifikasi(20,7,$sessionarray['user_id'],$this->pspao_akhir_model->get_ppid_pspao($id),$path);  	//PP dpt notis luluskan
				$path2 = 'pspao/senarai_pspao_akhir_ppd_2/'.$id;
				$this->function_model->insert_notifikasi(17,7,$sessionarray['user_id'],$this->pspao_akhir_model->get_ppdid_pspao($id),$path2);	//PPd dpt notis telah diluluskan
				
				$data['detail_msg'] = $this->function_model->get_masej($id,7);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Borang PSPA(O) Awal telah berjaya sahkan. Klik butang OK untuk kembali ke Senarai PSPA(O) Akhir.';
        		$data['link'] = 'pspao/senarai_pspao_akhir';
				
				//redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Pembetulan'){
				//echo "<script>alert('Simpan Deraf')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$this->pspao_akhir_model->insert_status_log($id,3); //1=xx,2=xxx,3=pembetulan,4=sah
				
				$path = 'pspao/senarai_pspao_akhir_ppd_2/'.$id;
				$this->function_model->insert_notifikasi(19,7,$sessionarray['user_id'],$this->pspao_akhir_model->get_ppdid_pspao($id),$path); 
				
				$data['detail_msg'] = $this->function_model->get_masej($id,7);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Borang PSPA(O) Awal telah dihantar untuk pembetulan. Klik butang OK untuk kembali ke Senarai PSPA(O) Akhir.';
        		$data['link'] = 'pspao/senarai_pspao_akhir';
				
				//redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Sunting'){
				//echo "<script>alert('Sunting')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				redirect('pspao/senarai_pspao_akhir_ptf_2/'.$id,'refresh');
				
			}
			
			
            $this->load->view('template/default',$data);            
        }



        function senarai_pspao_akhir_ppd_2($id)
        {
			$node_id = '15';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ppd_2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$sessionarray = $this->session->all_userdata();
			
			$data['rows'] = $this->pspao_akhir_model->get_all_kandungan($id);
			$data['tahun_mula'] = $this->pspao_akhir_model->get_tahun_mula_pspao($id);
			$data['tahun_akhir'] = $this->pspao_akhir_model->get_tahun_akhir_pspao($id);
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian_pspao($id);
			
			if($this->pspao_akhir_model->get_ulasan_terbaru($id,7)){
				$data['ulasan'] = $this->pspao_akhir_model->get_ulasan_terbaru($id,7);
			}else{
				$data['ulasan'] = NULL;
			}
			//$data['ulasan'] = $this->pspao_akhir_model->get_ulasan_terbaru($id,7);
			$data['statusid'] = $this->function_model->check_status_log($id,7,0);
			
			if($this->input->post('hantar') == 'Hantar'){
				//echo "<script>alert('Simpan')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$ceklomp = $this->pspao_akhir_model->get_pspao_sah_value($id);
				if($ceklomp == '0000-00-00'){
					$this->pspao_akhir_model->insert_status_log($id,2);
				
					$path = 'pspao/senarai_pspao_akhir_ptf_2/'.$id;
					$this->function_model->insert_notifikasi(18,7,$sessionarray['user_id'],$this->pspao_akhir_model->get_ptfid_pspao($id),$path); 
				}else{
					$this->pspao_akhir_model->insert_status_log($id,4);
				
					$path = 'pspao/senarai_pspao_akhir_pp_2/'.$id;
					$this->function_model->insert_notifikasi(20,7,$sessionarray['user_id'],$this->pspao_akhir_model->get_ppid_pspao($id),$path);
				}
				
				$data['detail_msg'] = $this->function_model->get_masej($id,7);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Borang PSPA(O) Awal telah berjaya dihantar untuk disemak. Klik butang OK untuk kembali ke Senarai PSPA(O) Akhir.';
        		$data['link'] = 'pspao/senarai_pspao_akhir';
				
				//redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Simpan Deraf'){
				//echo "<script>alert('Simpan Deraf')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$this->pspao_akhir_model->insert_status_log($id,1); //1=xx,2=xxx,3=pembetulan,4=sah
				
				$data['detail_msg'] = $this->function_model->get_masej($id,7);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Borang PSPA(O) Awal telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PSPA(O) Akhir.';
        		$data['link'] = 'pspao/senarai_pspao_akhir';
				
				//redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Sunting'){
				//echo "<script>alert('Sunting')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				redirect('pspao/senarai_pspao_akhir_ppd_2/'.$id,'refresh');
				
			}
			
			
            $this->load->view('template/default',$data);            
        }


        function senarai_pspao_akhir_pp_2($id)
        {
			$node_id = '15';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_pp_2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$sessionarray = $this->session->all_userdata();
			
			$data['rows'] = $this->pspao_akhir_model->get_all_kandungan($id);
			$data['tahun_mula'] = $this->pspao_akhir_model->get_tahun_mula_pspao($id);
			$data['tahun_akhir'] = $this->pspao_akhir_model->get_tahun_akhir_pspao($id);
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian_pspao($id);
			
			$data['ulasan'] = $this->pspao_akhir_model->get_ulasan_terbaru($id,7);
			$data['statusid'] = $this->function_model->check_status_log($id,7,0);
			
			if($this->input->post('hantar') == 'Lulus'){
				//echo "<script>alert('Simpan')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$this->pspao_akhir_model->update_pspao_date_lulus($id);
				$this->pspao_akhir_model->insert_status_log($id,6);
				
				$path = 'pspao/senarai_pspao_akhir_ptf_2/'.$id;
				$this->function_model->insert_notifikasi(22,7,$sessionarray['user_id'],$this->pspao_akhir_model->get_ptfid_pspao($id),$path); 
				$path2 = 'pspao/senarai_pspao_akhir_ppd_2/'.$id;
				$this->function_model->insert_notifikasi(22,7,$sessionarray['user_id'],$this->pspao_akhir_model->get_ppdid_pspao($id),$path2);
			
				$data['detail_msg'] = $this->function_model->get_masej($id,7);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Borang PSPA(O) Awal telah berjaya diluluskan. Klik butang OK untuk kembali ke Senarai PSPA(O) Akhir.';
        		$data['link'] = 'pspao/senarai_pspao_akhir';
				
				//redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Pembetulan'){
				//echo "<script>alert('Simpan Deraf')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				$this->pspao_akhir_model->insert_status_log($id,3); //1=xx,2=xxx,3=pembetulan,4=sah
				
				$path = 'pspao/senarai_pspao_akhir_ppd_2/'.$id;
				$this->function_model->insert_notifikasi(19,7,$sessionarray['user_id'],$this->pspao_akhir_model->get_ppdid_pspao($id),$path); 
				
				$data['detail_msg'] = $this->function_model->get_masej($id,7);
				$data['main_content'] = 'alert';
        		$data['msg'] = 'Borang PSPA(O) Awal telah dihantar untuk pembetulan. Klik butang OK untuk kembali ke Senarai PSPA(O) Akhir.';
        		$data['link'] = 'pspao/senarai_pspao_akhir';
				
				//redirect('pspao/senarai_pspao_akhir','refresh');
				
			}else if($this->input->post('hantar') == 'Sunting'){
				//echo "<script>alert('Sunting')< /script>";
				$this->pspao_akhir_model->update_kandungan_pspao($id);
				redirect('pspao/senarai_pspao_akhir_pp_2/'.$id,'refresh');
				
			}
			
			
            $this->load->view('template/default',$data);            
        }


        function senarai_pspao_akhir_ketuajab_2()
        {
			$node_id = '39';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ketuajab_2';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/senarai_pspao_akhir_ketuajab_2');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION senarai_pspao_akhir_ketuajab_2



		
        function senarai_pspao_akhir_pp()
        {
			$node_id = '39';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_pp';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy(), $start, $quantity);

			$config['base_url'] = site_url('pspao/senarai_pspao_akhir_pp');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION senarai_pspao_akhir_pp
		
        
        function senarai_pspao_akhir_ketuajab()
        {
			$node_id = '40';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ketuajab';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			$quantity = 5; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_ketua_jabatan(), $start, $quantity);

			$config['base_url'] = site_url('pspao/senarai_pspao_akhir_ketuajab');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_ketua_jabatan());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Bil', 'PSPAO ID','Tempoh', 'Peringkat','Pemilik Dokumen','Tarikh Disediakan','Status','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'tahun1',
                                  'label'   => 'Tahun Awal',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tahun2',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'status',
                                 'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
//end table	
        }
		

        function pspao_akhir_jkrpata2a_pp()
        {
			$node_id = '157';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_jkrpata2a_pp';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			//$data['year_list'] =year_dropdown();
			//$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            //$data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['asetkhusus'] = $this->pspao_akhir_model->get_asetkhusus();
			
			
			$quantity = 4; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_jkrpata2a(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir_jkrpata2a_pp');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_jkrpata2a());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Tahun/Fasa', 'Penerimaan<br>Aset','Operasi &<br>Penyelenggaraan<br>Aset', 'Penilai<br>Keadaan/<br>Prestasi Aset','Pemulihan/<br>Ubah Suai/<br>Naik Taraf Aset','Pelupusan<br>Aset','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No DPA',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'saizpremis',
                                  'label'   => 'Saiz Premis',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION pspao_akhir_jkrpata2a_pp
		

        function pspao_akhir_jkrpata2a_ptf()
        {
			$node_id = '158';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_jkrpata2a_ptf';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			//$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            //$data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['asetkhusus'] = $this->pspao_akhir_model->get_asetkhusus();
			
			
			$quantity = 4; // how many per page
			$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
			if(!$start) $start = 0; // default to zero if no $start

			$data['dataku'] = array_slice($this->pspao_akhir_model->get_data_dummy_jkrpata2a(), $start, $quantity);

			$config['base_url'] = site_url('pspao/pspao_akhir_jkrpata2a_ptf');
			$config['total_rows'] = count($this->pspao_akhir_model->get_data_dummy_jkrpata2a());
			$config['uri_segment'] = 3;
			$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
            $config['full_tag_close'] = '</div>';
			$config['next_link'] = 'Seterusnya &gt;';
			$config['prev_link'] = '&lt; Sebelumnya';
		
			$this->pagination->initialize($config); 

			$data['pagination'] = $this->pagination->create_links();
            
   			$this->table->set_heading('Tahun/Fasa', 'Penerimaan<br>Aset','Operasi &<br>Penyelenggaraan<br>Aset', 'Penilai<br>Keadaan/<br>Prestasi Aset','Pemulihan/<br>Ubah Suai/<br>Naik Taraf Aset','Pelupusan<br>Aset','Tindakan');

			$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
            );

			$this->table->set_template($tmpl);
             
			$rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           	array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                        	array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No DPA',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'saizpremis',
                                  'label'   => 'Saiz Premis',
                                  'rules'   => 'required'
                               ),
			);
			$this->form_validation->set_rules($rules);
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default', $data);
			}else{
				$this->load->view('template/default', $data);
			}
	
//end table
		}
		//END OF FUNCTION pspao_akhir_jkrpata2a_ptf
		
				
        
///////////////// -PSPAO Akhir- -END- ////////////////	 








//////////////////// baru punya senarai pspao //////////////////// natang 


        function senarai_pspao_akhir()
        {
			$node_id = '15';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			if($getptflist= $this->pspao_akhir_model->get_senarai_ptf_pspao_akhir())
			{
			   $data['result'] = $getptflist;
			}
			
			$this->load->view('template/default', $data);

		}

        function senarai_pspao_awal($key)
        {
			$node_id = '12';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_awal';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			$data['year_list'] =year_dropdown();
			$data['kementerian'] = $this->pspao_akhir_model->get_kementerian(); //dapatkan senarai kementerian dr db
            $data['jabatan'] = $this->pspao_akhir_model->get_jabatan();
			$data['status'] = $this->pspao_akhir_model->get_status();
			
			
			if($getptflist= $this->pspao_akhir_model->get_senarai_pspao())
			{
			   $data['result'] = $getptflist;
			}
			
			$this->load->view('template/default', $data);

		}
		
		
		
		
	function check_user_login_page(){
	
		$sessionarray = $this->session->all_userdata();
		$kump_pengguna_id = $sessionarray['user_rolegroupid'];
	
		$mu = $this->aauth->get_session('menu');
		//echo $kump_pengguna_id;
	
		if(($mu[2]['menu_role_kump_id[2]'])==3){	//////////////	KUMPULAN PENGGUNA => PP
			
			if($mu[2]['menu_role_id[2]'] == 5){
				
				//echo '<script>alert("create baru pspao (PP Kem)")</ script>';
				redirect('main/senarai_keseluruhan_notifikasi');
                //redirect('pspao/pspao_akhir_baru');
			}else{
				//echo '<script>alert("create baru pspao (PP Jab/agensi)")</ script>';
				redirect('main/senarai_keseluruhan_notifikasi');
				//redirect('pspao/pspao_akhir_baru');
		}
			
		}else if(($mu[2]['menu_role_kump_id[2]'])==4){	//////////////	KUMPULAN PENGGUNA => PTF
			
			$sessionarray = $this->session->all_userdata();    
			$userid = $sessionarray['user_id'];
			$getpspaoid = $this->pspao_akhir_model->get_pspao_id($userid);
			//echo "ddd=".$getpspaawalid;
	
			if($getpspaoid == 0){ ////////////////	CEK DULU KALO XDOK PSPAO -> ASIGN PPD TUK BUAT PSPAO
				if($mu[2]['menu_role_id[2]'] == 9){
					//echo '<script>alert("Asign PPD buat PSPAO sbb blm ada pspao (PTF Kem)")< /script>';
					redirect('main/senarai_keseluruhan_notifikasi');     
				}else{
					//echo '<script>alert("Asign PPD buat PSPAO sbb blm ada pspao (PTF Jab/Agensi)")< /script>';
					redirect('main/senarai_keseluruhan_notifikasi');     
				}
			}else{ //////////////////	KALO DAH ADA PSPAO -> SENARAI PSPAO TUK SEDIAKAN PSPAO
				if($mu[2]['menu_role_id[2]'] == 9){
					//echo '<script>alert("Senarai pspao carry id -> '.$getpspaoid.' (PTF Kem)")</ script>';
					redirect('main/senarai_keseluruhan_notifikasi');
					//redirect('main/senarai_keseluruhan_notifikasi');
				}else{
					//echo '<script>alert("Senarai pspao carry id -> '.$getpspaoid.' (PTF Jab)")</ script>';
					redirect('main/senarai_keseluruhan_notifikasi');
					//redirect('pspao/senarai_pspao_akhir');
				}
			}
	
		}else{	//////////////	KUMPULAN PENGGUNA => PPD
			if($mu[2]['menu_role_id[2]'] == 28){
				//echo '<script>alert("sediakan PSPAO (PPD Kem)")< /script>';
				redirect('main/senarai_keseluruhan_notifikasi');
				//redirect('pspao/senarai_pspao_akhir');
			}else{
				//echo '<script>alert("sediakan PSPAO (PPD Jab/Agensi)")< /script>';
				redirect('main/senarai_keseluruhan_notifikasi');
				//redirect('pspao/senarai_pspao_akhir');
			}
		}
	
	}
			
	
	
}