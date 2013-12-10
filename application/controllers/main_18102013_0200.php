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

     $data['num_row'] = $this->utama_model->get_notif_numrow($session_id);

			
			$this->load->view('template/default', $data);
		}else{
			redirect('auth');
		}
		
		
		
	}
	
	
	
	 function update_status(){


       $this->utama_model->update_status_notifikasi();

      redirect($this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));

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


////////////////// PSPAO AWAL -START - ///////////////////

	function arahan_sedia_pspao()
	{
		//author : Anuar
		//desc : arahan sedia pspao
        //date create: 08/07/2013
		
		$node_id = '26';
		$menu_name = 'menu1';
		$menu_link = 'pspao/arahan_sedia_pspao';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
        $this->load->view('template/default', $data);
	}
        
	function senarai_notifikasi_pspao()
	{
		//author : Anuar
		//desc : senarai notifikasi pspao
        //date create: 08/07/2013
		
		$node_id = '32';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_notifikasi_pspao';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
        $this->load->view('template/default', $data);
	}
        
	function pspao_baru()
	{
		//author : Anuar
		//desc : pspao baru  
        //date create: 08/07/2013
		
		$node_id = '27';
		$menu_name = 'menu1';
		$menu_link = 'pspao/pspao_baru';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
        $this->load->view('template/default', $data);
	}
        
	function ulasan_pp_lulus_pspao()
	{
		//author : Anuar
		//desc : pspao ulasan peng. pgawal lulus
        //date create: 08/07/2013
		
		$node_id = '28';
		$menu_name = 'menu1';
		$menu_link = 'pspao/ulasan_pp_lulus_pspao';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
        $this->load->view('template/default', $data);
	}
        
	function ulasan_pp_sah_pspao()
	{
		//author : Anuar
		//desc : pspao ulasan peng. pgawal sah
        //date create: 08/07/2013
		
		$node_id = '29';
		$menu_name = 'menu1';
		$menu_link = 'pspao/ulasan_pp_sah_pspao';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
        $this->load->view('template/default', $data);
	}
        
	function senarai_pp_pspao()
	{
		//author : Anuar
		//desc : senarai pspao peng. pgawal
        //date create: 08/07/2013
		
		$node_id = '30';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_pp_pspaov';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
        $this->load->view('template/default', $data);
        }
        
	function senarai_ptf_pspao()
	{
		//author : Anuar
		//desc : senarai pspao ptf
        //date create: 08/07/2013
		
		$node_id = '31';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_ptf_pspao';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
        $this->load->view('template/default', $data);
        }

    
	
////////////////// PSPAO AWAL -END- //////////////////////	 
        
       
///////////////// -PSPAO Akhir- -START- //////////////
        
        function pspao_akhir()
        {
			$node_id = '33';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/default';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);         
        }
        
        function arahan_sedia_pspao_akhir()
        {
			$node_id = '33';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/arahan_sedia_pspao_akhir';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);         
        }
        
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
			$node_id = '36';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/pspao_akhir_baru';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
		
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
            $this->load->view('template/default',$data);            
        }
        
        function senarai_pspao_akhir_ketuajab()
        {
			$node_id = '40';
			$menu_name = 'menu1';
			$menu_link = 'pspao_akhir/senarai_pspao_akhir_ketuajab';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $this->load->view('template/default',$data);            
        }
        
///////////////// -PSPAO Akhir- -END- ////////////////	 
	 
	 
     /* START PPUN */

     function dokumen_rujukan_ppun()
	{
		//author : Anuar
		//desc : dokumen rujukan ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/dokumen_rujukan_ppun';
        $this->load->view('template/default', $data);
        }
        
        function kawalan_rekod_terima_ppun()
	{
		//author : Anuar
		//desc : kawalan rekod terima ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/kawalan_rekod_terima_ppun';
        $this->load->view('template/default', $data);
        }
        
        
        function  kemaskini_tskopaktiviti_ppun()
	{
		//author : Anuar
		//desc : kemaskini tskopaktiviti ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/kemaskini_tskopaktiviti_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  model_struktur_ppun()
	{
		//author : Anuar
		//desc : model struktur ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/model_struktur_ppun';
        $this->load->view('template/default', $data);
        }
        
        function  penyediaan_kandungan_ppun()
	{
		//author : Anuar
		//desc : penyediaan kandungan ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/penyediaan_kandungan_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  treeviewskop_ppun()
	{
		//author : Anuar
		//desc : treeviewskop ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/treeviewskop_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  tskopaktiviti_ppun()
	{
		//author : Anuar
		//desc : tskopaktiviti ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/tskopaktiviti_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  summary_ptf_ppun()
	{
		//author : Anuar
		//desc : summary ptf ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/summary_ptf_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  summary_pp_ppun()
	{
		//author : Anuar
		//desc : summary pp ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/summary_pp_ppun';
        $this->load->view('template/default', $data);
        }
       
         function  summary_ppun()
	{
		//author : Anuar
		//desc : summary ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/summary_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  senarai_ptf_ppun()
	{
		//author : Anuar
		//desc : senarai ptf ppun
                //date create: 09/07/2013
		$data['main_content'] = 'ppun/senarai_ptf_ppun';
        $this->load->view('template/default', $data);
        }
        
        function  senarai_pp_ppun()
	{
		//author : Anuar
		//desc : senarai pp ppun
                //date create: 09/07/2013
		$data['main_content'] = 'ppun/senarai_pp_ppun';
        $this->load->view('template/default', $data);
        }


      /*
     * END PPUN
     */
	
//////////////// ** PTRA ** -START- ///////////////

	//** PTRA **//

    function arahan_penyediaan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : arahan penyediaan ptra
		
		$node_id = '33';
		$menu_name = 'menu1';
		$menu_link = 'ptra/arahan_penyediaan_ptra';
			
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
		
		
        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db

        $this->load->view('template/default', $data);
	}

    function status_premis_ptra()
	{
		 //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran
		$node_id = '33';
		$menu_name = 'menu1';
		$menu_link = 'ptra/status_premis_ptra';
			
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
		
        $this->load->view('template/default', $data);
	}

	function kat_bangunan_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : kategori aset bangunan
		
		$node_id = '33';
		$menu_name = 'menu1';
		$menu_link = 'ptra/kandungan_ptra';
			
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db

        $rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'negeri',
                                  'label'   => 'Negeri',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'mukim',
                                  'label'   => 'Mukim',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'ptra/kat_bangunan_ptra';
                          $this->load->view('template/default', $data);
	
                }
                else
                {
                		$this->load->view('template/default', $data);
                      
                }
	}

	function kat_jalan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : kategori aset jalan
		$node_id = '33';
		$menu_name = 'menu1';
		$menu_link = 'ptra/kandungan_ptra';
			
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
		
		$rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'ptra/kat_jalan_ptra';
                          $this->load->view('template/default', $data);
	
                }
                else
                {
                		$this->load->view('template/default', $data);
                      
                }
	}

	function kat_pembetungan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : kategori aset pembetungan
		$node_id = '33';
		$menu_name = 'menu1';
		$menu_link = 'ptra/kandungan_ptra';
			
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db
		
		$rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'ptra/kat_pembetungan_ptra';
                          $this->load->view('template/default', $data);
	
                }
                else
                {
                		$this->load->view('template/default', $data);
                      
                }
	}

	function kat_saliran_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : kategori aset saliran
        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db
		
		$rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'negeri',
                                  'label'   => 'Negeri',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'ptra/kat_saliran_ptra';
                          $this->load->view('template/default', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                		$this->load->view('template/default', $data);
                      
                }
	}

	function senarai_pp_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai pengawal
        $data['year_list'] =year_dropdown();  //get year list 
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
		    
        $rules = array(
                            array(
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'no_dpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kata_cari',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'ptra/senarai_pp_ptra';
                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                    $this->load->view('template/default', $data);
                      
                }
	}
        
        function senarai_ptf_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai teknikal fasiliti
        $data['year_list'] =year_dropdown();  //get year list 
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
		
        $rules = array(
                            array(
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'no_dpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kata_cari',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'ptra/senarai_ptf_ptra';
                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                    $this->load->view('template/default', $data);
                      
                }
	}
        
        function kandungan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : penyediaan kandungan ptra

        //$this->output->enable_profiler(TRUE); //display query statement
            
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->ptra_model->get_premis(); //dapatkan senarai premis dr db
                
                
                $rules = array(
                            array(
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'no_dpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'pendahuluan',
                                  'label'   => 'Pendahuluan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'objektif',
                                  'label'   => 'Objektif Pengurusan Aset Tak Alih',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'carta',
                                  'label'   => 'Carta Organisasi dan Pelan Komunikasi',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'skop',
                                  'label'   => 'Skop dan Aktiviti Penerimaan Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kawalan',
                                  'label'   => 'Kawalan Rekod Penerimaan Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'rujukan',
                                  'label'   => 'Rujukan',
                                  'rules'   => 'required'
                               ),
                            
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'ptra/kandungan_ptra';
                          $this->load->view('template/default', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/model_struktur_ptra';
                		$this->load->view('template/default', $data);
                      
                }
	}
        
        function model_struktur_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra
		$data['main_content'] = 'ptra/model_struktur_ptra';
        $this->load->view('template/default', $data);
	}
        
        function treeview_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c
		$data['main_content'] = 'ptra/treeview_ptra';
        $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c
		$data['main_content'] = 'ptra/skop_aktiviti_ptra';
        $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti2_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c
        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
		$data['main_content'] = 'ptra/skop_aktiviti2_ptra';
        $this->load->view('template/default', $data);
	}
        
        function kawalan_rekod_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d
		$data['main_content'] = 'ptra/kawalan_rekod_ptra';
        $this->load->view('template/default', $data);
	}
        
        function dokumen_rujukan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e
		$data['main_content'] = 'ptra/dokumen_rujukan_ptra';
        $this->load->view('template/default', $data);
	}
        
        function summary_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : summary penyediaan ptra baru

        $data['year_list'] =year_dropdown();  //get year list

		$data['main_content'] = 'ptra/summary_ptra';
        $this->load->view('template/default', $data);
	}
        
        function summary_pp_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai pengawal

        $data['year_list'] =year_dropdown();  //get year list 

		$data['main_content'] = 'ptra/summary_pp_ptra';
        $this->load->view('template/default', $data);
	}
        
        function summary_ptf_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

        $data['year_list'] =year_dropdown();  //get year list 

		$data['main_content'] = 'ptra/summary_ptf_ptra';
        $this->load->view('template/default', $data);
	}


//////////////// ** END PTRA ** -END- /////////////

	//** Start PNPA **//

	   function senarai_pp_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai pengawal
		$data['main_content'] = 'pnpa/senarai_pp_pnpa';
                $this->load->view('template/default', $data);
	}
        
        function senarai_ptf_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai teknikal fasiliti
		$data['main_content'] = 'pnpa/senarai_ptf_pnpa';
                $this->load->view('template/default', $data);
	}

	function kandungan_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page penyediaan kandungan pnpa
		$data['main_content'] = 'pnpa/kandungan_pnpa';
                $this->load->view('template/default', $data);
	}

	
	function model_struktur_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page model struktur pnpa
		$data['main_content'] = 'pnpa/model_struktur_pnpa';
                $this->load->view('template/default', $data);
	}

	function treeview_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
		$data['main_content'] = 'pnpa/treeview_pnpa';
                $this->load->view('template/default', $data);
	}

	function skop_aktiviti_pnpa ()
	{

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti	
                $data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti2_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
		$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
	}
        
        function kawalan_rekod_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
		$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
	}
        
        function dokumen_rujukan_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
		$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
	}
        
         function summary_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan pnpa
                $data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
	}
        
        function summary_pp_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
                $data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default', $data);
	}
        
        function summary_ptf_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
                $data['main_content'] = 'pnpa/summary_ptf_pnpa';
                $this->load->view('template/default', $data);
	}

	//** END PNPA **//
	
	
	
	//**START POPA**//
	
	function senarai_pp_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pp popa
		$data['main_content'] = 'popa/senarai_pp_popa';
        $this->load->view('template/default', $data);
	}
	
	 function senarai_ptf_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai ptf popa
		$data['main_content'] = 'popa/senarai_ptf_popa';
        $this->load->view('template/default', $data);
	}
	
	 function kandungan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: penyediaan kandungan popa
		$data['main_content'] = 'popa/kandungan_popa';
        $this->load->view('template/default', $data);
	}
	
	 function model_struktur_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: model struktur popa
		$data['main_content'] = 'popa/model_struktur_popa';
        $this->load->view('template/default', $data);
	}
	
	 function treeview_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: treeview popa
		$data['main_content'] = 'popa/treeviewskop_popa';
        $this->load->view('template/default', $data);
	}
	
	 function skop_aktiviti_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: skop dan aktiviti popa
		$data['main_content'] = 'popa/skop_aktiviti_popa';
        $this->load->view('template/default', $data);
	}
	
	function skop_aktiviti2_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: skop dan aktiviti 2 popa
		$data['main_content'] = 'popa/skop_aktiviti2_popa';
        $this->load->view('template/default', $data);
	}
	
	 function kawalan_rekod_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: kawalan rekod popa
		$data['main_content'] = 'popa/kawalan_rekod_popa';
        $this->load->view('template/default', $data);
	}
	
	function dokumen_rujukan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: dokumen rujukan popa
		$data['main_content'] = 'popa/dokumen_rujukan_popa';
        $this->load->view('template/default', $data);
	}
	
	function summary_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary popa
		$data['main_content'] = 'popa/summary_popa';
        $this->load->view('template/default', $data);
	}
	
	function summary_pp_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary pp popa
		$data['main_content'] = 'popa/summary_pp_popa';
        $this->load->view('template/default', $data);
	}
	
	function summary_ptf_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary ptf popa
		$data['main_content'] = 'popa/summary_ptf_popa';
        $this->load->view('template/default', $data);
	}
	
	//**END POPA **//
	
	//**START PLA**//
	
	function senarai_pp_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page senarai pegawai pengawal
		$data['main_content'] = 'pla/senarai_pp_pla';
                $this->load->view('template/default', $data);
	}
        
        function senarai_ptf_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page senarai pegawai teknikal fasiliti
		$data['main_content'] = 'pla/senarai_ptf_pla';
                $this->load->view('template/default', $data);
	}
        
        function kandungan_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page kandungan pla
		$data['main_content'] = 'pla/kandungan_pla';
                $this->load->view('template/default', $data);
	}
        
        function model_struktur_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page model struktur pla
		$data['main_content'] = 'pla/model_struktur_pla';
                $this->load->view('template/default', $data);
	}
        
        function treeview_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page treeview
		$data['main_content'] = 'pla/treeview_pla';
                $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page skop aktiviti pla
		$data['main_content'] = 'pla/skop_aktiviti_pla';
                $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti2_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page skop aktiviti2 pla
		$data['main_content'] = 'pla/skop_aktiviti2_pla';
                $this->load->view('template/default', $data);
	}
        
        function kawalan_rekod_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page senarai kawalan rekod pelupusan
		$data['main_content'] = 'pla/kawalan_rekod_pla';
                $this->load->view('template/default', $data);
	}
        
        function dokumen_rujukan_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page senarai dokumen untuk rujukan bagi pelupusan aset
		$data['main_content'] = 'pla/dokumen_rujukan_pla';
                $this->load->view('template/default', $data);
	}
        
        function summary_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page senarai ringkasan pla
		$data['main_content'] = 'pla/summary_pla';
                $this->load->view('template/default', $data);
	}
        
        function summary_pp_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page senarai ringkasan pla untuk pegawai pengawal
		$data['main_content'] = 'pla/summary_pp_pla';
                $this->load->view('template/default', $data);
	}
        
        function summary_ptf_pla()
	{
		//nama:Azura
                //date:8/7/13
                //desc:page senarai ringkasan pla untuk pegawai teknikal fasiliti
		$data['main_content'] = 'pla/summary_ptf_pla';
                $this->load->view('template/default', $data);
	}
	
	//** END PLA **//

}
