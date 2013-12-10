<?php

class Main extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library('form_validation');
		 $this->load->library('pagination');
        $this->load->library('table');	
		$this->load->helper(array('form', 'url'));
		$this->load->helper('function_helper');
		$this->load->model('utama_model');
        $this->load->model('takwim_model');
		//$this->load->model('pspao_model','pspao_akhir_model','pnpa_model','ppun_model','ptra_model','popa_model','takwim_model');
				
		//$this->output->enable_profiler(TRUE); //display query statement
		date_default_timezone_set('Asia/Kuala_Lumpur');
		if(!$this->aauth->is_loggedin()){
			echo '<script>';
			echo 'alert("Belum Login");';
			echo 'window.location = "'.site_url('auth').'"';
			echo '</script>';
		}
		
	}



		/*
         * Author : Anuar
         * Title  : Senarai Keseluruhan Notifikasi baru
         * Date   : 28/7/2013
         */
        

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
			
			 $session_id = $this->session->userdata('user_id'); 
              
       if($getNotifikasi = $this->utama_model->get_notifikasi($session_id))
    {
       $data['data'] = $getNotifikasi;
       //$data['num_row'] = count($data['data']);
    }
          if($getNotifikasiTak = $this->utama_model->get_notifikasi_takwin($session_id))
           {
               $data['datatakwin'] = $getNotifikasiTak;
                                               //$data['num_row'] = count($data['data']);
           }

     $data['num_row'] = $this->utama_model->get_notif_numrow($session_id);

			
			$this->load->view('template/default', $data);
		}else{
			redirect('auth');
		}
		
		
		
	}
	
	/*
         * Author : Anuar
         * Title  : update status notifikasi
         * Date   : 28/7/2013
         */
        
	
	 function update_status(){


      $this->utama_model->update_status_notifikasi();

      //redirect($this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7));
      redirect($this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8)); // kusang update
    }
	
	
        /*
         * Author : Anuar
         * Title  : Senarai Keseluruhan Notifikasi
         * Date   : 28/7/2013
         */
        
        
           
        function senarai_keseluruhan_notifikasi($offset = 0)
        {
            $node_id = '68';
	        $menu_name = 'front';
	        $menu_link = 'senarai_keseluruhan_notifikasi';
			
	        $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

		     $session_id = $this->session->userdata('user_id'); 



			if ($_POST)
			{

				if($this->input->post('katacarian')==''){

                $this->form_validation->set_rules('tarikh_mula','Tarikh Mula','trim|required|xss_clean');
                $this->form_validation->set_rules('tarikh_akhir','arikh Akhir','trim|required|xss_clean');

				if ($this->form_validation->run())
                        {


                       if($getAllNotifikasi = $this->utama_model->get_keseluruhan_notifikasi(
	                   $this->input->post('tarikh_mula'),
	                   $this->input->post('tarikh_akhir'),
	                   $this->input->post('katacarian'),
	                   $session_id)){

	           			 

	          			  $data['data1'] = $getAllNotifikasi;
	            
	          			  }
 				
					}
                 }else{

                 	 if($getAllNotifikasi = $this->utama_model->get_keseluruhan_notifikasi(
	                   $this->input->post('tarikh_mula'),
	                   $this->input->post('tarikh_akhir'),
	                   $this->input->post('katacarian'),
	                   $session_id)){

	           			 

	          			  $data['data1'] = $getAllNotifikasi;
	            
	          			  }
                 }


                       
                     $this->load->view('template/default',$data);

			} else{



         if($getAllNotifikasi = $this->utama_model->get_all_notification($session_id))
            {
            $data['data1'] = $getAllNotifikasi;
             }

				
	          			  

						$this->load->view('template/default',$data);

			}  
                  
            
            
            
        
                   
        }
	         
       

        /*  Author : Khairul
         *  Title  : Deshboard
         *  Date   : 11/7/2013
         */
        
        ////////// -Dashboard- Start //////////
        
        function dashboard()
        { 	
		
		
			$node_id = '2';
			$menu_name = 'front';
			$menu_link = 'main_30072013';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);
        }
        
        ////////// -Dashboard- End  ///////////
		
		        ////////// -Takwim- Start //////////
        
         ////////// -Takwim- Start //////////
        /*
         * Author : Anuar
         * Title  : Takwim
         * Date   : 28/7/2013
         */
        
         function takwim($year=null,$month=null)
        { 	
		
		
			$node_id = '7';
			$menu_name = 'front';
			$menu_link = 'takwim/takwim';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
		   	   date_default_timezone_set('UTC');

		    if (!$year) {

              $year = date('Y');
            
             }
            if (!$month) {
                                
              $month = date('m');
                         
            }

            $this->load->model('takwim_model');

                      

            $data['calendar'] = $this->takwim_model->generate($year, $month);
		   
		   
		    $this->load->view('template/default',$data);
        }


        ////////// -Takwim- End  ///////////




        ////////// -Fungsi- Start ///////////

        function fungsi()
        {
			
			$node_id = '7';
			$menu_name = 'menu1';
			$menu_link = 'main';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

         $session_id = $this->session->userdata('user_id'); 
              
       if($getNotifikasi = $this->utama_model->get_notifikasi($session_id))
    {
       $data['data'] = $getNotifikasi;
       //$data['num_row'] = count($data['data']);
    }

    // $data['num_row'] = count($data['data']);
 $data['num_row'] = $this->utama_model->get_notif_numrow($session_id);
            

            $this->load->view('template/default',$data);
        }

        ////////// -Fungsi-  End  ///////////
		
        ////////// -Laporan-  Start  ///////////

        function laporan()
        { 	
		
		
			$node_id = '4';
			$menu_name = 'front';
			$menu_link = 'laporan/default';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);
        }
        ////////// -Laporan-  End  ///////////


        ////////// -Penetapan Pentadbir-  Start  ///////////

        function penetapan_pentadbir()
        { 	
		
		
			$node_id = '5';
			$menu_name = 'front';
			$menu_link = 'penetapan_pentadbir/default';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);
        }
        ////////// -Penetapan Pentadbir-  End  ///////////

        ////////// -Bantuan Atas Talian-  Start  ///////////

        function bantuan()
        { 	
		
		
			$node_id = '6';
			$menu_name = 'front';
			$menu_link = 'bantuan_online/default';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);
        }
        ////////// -Penetapan Pentadbir-  End  ///////////


    
}
