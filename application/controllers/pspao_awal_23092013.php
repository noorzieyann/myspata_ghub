<?php


       //author : Anuar
       //date create: 08/07/2013

class Pspao_awal extends CI_Controller {
    
    
       public function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library('form_validation');
		
		$this->load->helper(array('form', 'url'));
		$this->load->helper('function_helper');
		
		$this->load->model('pspao_model');
		$this->load->library('pagination');
                $this->load->library('table');
                $this->load->library('session');
		$this->output->enable_profiler(TRUE); //display query statement
		
		if(!$this->aauth->is_loggedin()){
			echo '<script>';
			echo 'alert("Belum Login");';
			echo 'window.location = "'.site_url('auth').'"';
			echo '</script>';
		}
               
		
	}
    


    function pspao_tahun(){


    $node_id = '11';
    $menu_name = 'menu1';
    $menu_link = 'pspao/pspao_tahun';


    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

   $user_kemid = $this->session->userdata('user_kemid'); 
   $user_jabid = $this->session->userdata('user_jabid'); 

     $data['year_list'] = year_dropdown(); //get year list from function_helper
     $data['kementerian'] = $this->pspao_model->get_kementerian_name($user_kemid);
     $data['jabatan'] = $this->pspao_model->get_jabatan_name($user_jabid);


     if(isset($_POST["seterusnya"])){


         $this->form_validation->set_rules('tempoh_mula','Tempoh Mula','trim|required|xss_clean');
         $this->form_validation->set_rules('tempoh_akhir','Tempoh Akhir','trim|required|xss_clean');

         if($this->form_validation->run())
            {

           
               $addpspaotahun = $this->pspao_model->tambahpspaotahun($user_kemid);

                if($addpspaotahun)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Tempoh Pelan Berjaya Didaftarkan</font><br>');
                    redirect('pspao_awal/arahan_sedia_pspao/'.$addpspaotahun);
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan Tempoh Pelan.</font><br></strong><br>');
                    redirect('pspao_awal/pspao_tahun');
                }          

            }

      }


    $this->load->view('template/default', $data);
    }
    
       //desc : arahan sedia pspao
        
        function arahan_sedia_pspao()
	{
		
		$node_id = '11';
		$menu_name = 'menu1';
		$menu_link = 'pspao/arahan_sedia_pspao';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $user_kemid = $this->session->userdata('user_kemid');
                
              
     if($getpspaouserlist= $this->pspao_model->get_ppd($user_kemid))
    {
       $data['user_list'] = $getpspaouserlist;
    }


       $f =  $this->input->post('check');
       //echo "f=".$f."<br/>";
        
       $lastid = $this->input->post('lastid');
//echo "lastid=".$lastid."<br/>";
       $userid = $this->input->post('userid');
 //echo $userid[0];
      $userdetail =  $this->pspao_model->get_detail_user($userid[0]);
//print_r($userdetail);
      foreach ($userdetail as $row){

        $jabagensi = $row->idjab_agensi;
       // echo "jabagensi=".$jabagensi;
        $negeriId = $row->idnegeri;
        //echo "jabagensi=".$negeriId;
      }
     
        if(($this->input->post('hantar'))==1){

      

               $addppd = $this->pspao_model->updatepspaoawal($userid[0],$lastid,$jabagensi,$negeriId);

               redirect('pspao_awal/senarai_pspao_baru');
                 
           
               
     

    }



    $this->load->view('template/default', $data);


             
				
						
	   }
        
        
        //desc : senarai notifikasi pspao
         
        function senarai_notifikasi_pspao()
	{
		
		
		
		$node_id = '32';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_notifikasi_pspao';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data_1 = $this->pspao_model->get_notifikasi(); //get data from model
                
                
                
                
                //pagination setting
                $quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('pspao_awal/senarai_notifikasi_pspao');
		$config['total_rows'] = count($data_1);
		$config['uri_segment'] = 3;
		$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
                $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
                $config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Seterusnya &gt;';
		$config['prev_link'] = '&lt; Sebelumnya';
		
		$this->pagination->initialize($config); 

		$data['pagination'] = $this->pagination->create_links();
                //end pagination
                
                //table setting
                $this->table->set_heading('Bil', 'Perkara', 'Tarikh');

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
                //end table setting
                
                //form validation 
                $rules = array(
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               )   
                           
                 );
                
                
                $this->form_validation->set_rules($rules);
               
                
                 if ($this->form_validation->run() == FALSE)
                {
                     
                      $this->load->view('template/default', $data);
                }
                else
                {
                      // $data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }
            
                
		
		
	}
        
        //desc : pspao baru  
        
        function pspao_baru()
	{
		
		$node_id = '13';
		$menu_name = 'menu1';
		$menu_link = 'pspao/pspao_awal_baru';
                
     $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		 $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		 $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		 $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
      $data['year_list'] = year_dropdown(); //get year list from function_helper
      $data['kementerian'] = $this->pspao_model->get_kementerian_name($this->session->userdata('user_kemid'));
                
      $this->form_validation->set_rules('tahun_mula', 'Tahun Mula', 'required');
    $this->form_validation->set_rules('tahun_akhir', 'Tahun Akhir', 'required');
      //$this->form_validation->set_rules('kementerian', 'Kementerian', 'required');
     $this->form_validation->set_rules('kand_visi', 'Visi', 'required');
      $this->form_validation->set_rules('kand_misi', 'Misi', 'required');
      $this->form_validation->set_rules('kand_objektif', 'Objektif', 'required');
      //$this->form_validation->set_rules('kand_polisi', 'Polisi', 'required');
      $this->form_validation->set_rules('kand_pendahuluan', 'Pendahuluan', 'required');
      //$this->form_validation->set_rules('ukuran_dpa_sasaran', 'DPA Sasaran', 'required');      
                     
      if ($this->form_validation->run() == FALSE){
        $this->load->view('template/default',$data);
      }else{
       // echo "<script>alert('Berjaya!')< /script>";
        
        if($this->input->post('sunting') != NULL){
          //echo "<script>alert('Update Saja!')< /script>";
          $idpspao = $this->pspao_model->update_pspao_awal($this->input->post('sunting'));
        }else{
          //echo "<script>alert('Insert!')< /script>";
          $idpspao = $this->pspao_model->insert_pspao_awal();

            if($idpspao){

               $idstatuslog = $this->pspao_model->insert_status_log($idpspao);

            }

        }
        //print_r($this->pspao_akhir_model->insert_pspao_akhir());
        
        //$this->load->view('template/default',$data);
        redirect('pspao_awal/senarai_pspao_baru/'.$idpspao,'refresh');
      }
	
	}
        
        //desc : pspao ulasan peng. pgawal lulus
       
        
        function ulasan_pp_lulus_pspao()
	{
		
	
		$node_id = '13';
		$menu_name = 'menu1';
		$menu_link = 'pspao/ulasan_pp_lulus_pspao';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                
                 $data['year_list'] =year_dropdown(); //get year list from function_helper
                
                 $rules = array(
                            array(
                                  'field'   => 'tempoh_mula',
                                  'label'   => 'Tempoh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tempoh_akhir',
                                  'label'   => 'Tempoh Akhir',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'pendahuluan',
                                  'label'   => 'Pendahuluan',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'visi',
                                  'label'   => 'Visi Pengurusan Aset Tak Alih',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'misi',
                                  'label'   => 'Misi Pengurusan Aset Tak Alih',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'objektif',
                                  'label'   => 'Objektif Pengurusan Aset Tak Alih',
                                  'rules'   => 'required'
                               ),
                          /*  array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                                 ),
                          array(
                                  'field'   => 'ulasan',
                                  'label'   => 'Ulasan',
                                  'rules'   => 'required'
                                 )
                    */
                 );
                 
                 
                 $this->form_validation->set_rules($rules); //validate form
                 
                  if ($this->form_validation->run() == FALSE)
                {
                      
                        $this->load->view('template/default', $data);
	
                }
                else
                {
                      // $data['main_content'] = 'pspao/senarai_pp_pspao';
                      // $this->load->view('template/default_pelan', $data);
                    redirect(site_url('pspao_awal/senarai_pp_pspao'));	  
                }

		
		
	}
        
        //desc : pspao ulasan peng. pgawal sah
        
        
        function ulasan_ptf_sah_pspao($id)
	{
		
		
		$node_id = '13';
		$menu_name = 'menu1';
		$menu_link = 'pspao/ulasan_ptf_sah_pspao';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);   
                
    $data['year_list'] =year_dropdown(); //get year list from function_helper

    $data['kementerian'] = $this->pspao_model->get_kem_name($id); 

    $data['tahun_mula'] = $this->pspao_model->get_tahun_mula($id); 


    $data['tahun_akhir'] = $this->pspao_model->get_tahun_akhir($id);

    $data['pspaodata'] = $this->pspao_model->get_pspao_detail($id);

      /*$this->form_validation->set_rules('tempoh_mula', 'Tahun Mula', 'required');
      $this->form_validation->set_rules('tempoh_akhir', 'Tahun Akhir', 'required');
      $this->form_validation->set_rules('kand_visi', 'Visi', 'required');
      $this->form_validation->set_rules('kand_misi', 'Misi', 'required');
      $this->form_validation->set_rules('kand_objektif', 'Objektif', 'required');
      $this->form_validation->set_rules('kand_pendahuluan', 'Pendahuluan', 'required');
      */
        if($this->input->post('sah') != NULL){

         $update_pspao = $this->pspao_model->update_pspao_awal_edit($id); 

 redirect(site_url('pspao_awal/senarai_pspao_baru'));

}else{
          $this->load->view('template/default', $data);
	}	

         //$update_pspao = $this->pspao_model->update_pspao_awal_edit($id);     

         // $this->load->view('template/default', $data);
		
	}
      
	   //desc : pspao ulasan peng. penyedia dokumen
        
        
        function ulasan_ppd_pspao()
	{
		
		
		$node_id = '13';
		$menu_name = 'menu1';
		$menu_link = 'pspao/ulasan_ppd_pspao';
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);   
                
                $data['year_list'] =year_dropdown(); //get year list from function_helper
                
                //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tempoh_mula',
                                  'label'   => 'Tempoh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tempoh_akhir',
                                  'label'   => 'Tempoh Akhir',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'pendahuluan',
                                  'label'   => 'Pendahuluan',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'visi',
                                  'label'   => 'Visi Pengurusan Aset Tak Alih',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'misi',
                                  'label'   => 'Misi Pengurusan Aset Tak Alih',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'objektif',
                                  'label'   => 'Objektif Pengurusan Aset Tak Alih',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                                 )
                     ,
                           
                    
                 );
                 
                 
                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                      
                      
                {
                      
                    
                     $this->load->view('template/default', $data);
	
                }
                else
                {
                   redirect(site_url('pspao_awal/senarai_ppd_pspao'));	    
                      
                }
		
		
	}
     
	    
        
	//desc : senarai pspao peng. pgawal
        
        function senarai_pp_pspao()
	{

		
		$node_id = '30';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_pp_pspao';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $data['year_list'] =year_dropdown();  //get year list from function_helper


    if(isset($_POST["carian"])) {  //function when user click button carian 

         


    }else{
      
     if($getpplist= $this->pspao_model->get_senarai_pp_pspao())
    {
       $data['result'] = $getpplist;
    }
          
     }           /*
                
                //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ) 
                           
                 );
                 
                 
                 $this->form_validation->set_rules($rules);
                
                 if ($this->form_validation->run() == FALSE)
                {
                  */          
		  
                   $this->load->view('template/default', $data);

               /* }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }
              */
		
             }
			 
			 
			 //desc : senarai pspao peng. pgawal
        
        function senarai_pspao_baru_lama()
	{

		
		$node_id = '13';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_pspao_baru';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list from function_helper
             
                $data_1 = $this->pspao_model->get_senarai_pspao_baru(); //get data from model
                
                //pagination setting
                $quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('pspao_awal/senarai_pp_pspao');
		$config['total_rows'] = count($data_1);
		$config['uri_segment'] = 3;
		$config['per_page'] = $quantity;
	        $config['num_links'] = 20;
                 $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
                $config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Seterusnya &gt;';
		$config['prev_link'] = '&lt; Sebelumnya';
		
		$this->pagination->initialize($config); 

		$data['pagination'] = $this->pagination->create_links();
                //end pagination
                
                //table setting
                $this->table->set_heading('Bil', 'Tempoh Mula', 'Tempoh Akhir','Pemilik Dokumen','Status','Tindakan');

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
                // end table setting
                
                //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ) 
                           
                 );
                 
                 
                 $this->form_validation->set_rules($rules);
                
                 if ($this->form_validation->run() == FALSE)
                {
                            
		  
                   $this->load->view('template/default', $data);

                }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }

		
             }
			 
			 
        
        //desc : senarai pspao ptf
        
        function senarai_pspao_baru()
	{

		
		$node_id = '31';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_pspao_baru';
              
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                
    $data['year_list'] =year_dropdown();  //get year list from function_helper

    if($getptflist= $this->pspao_model->get_senarai_ptf_pspao())
    {
       $data['result'] = $getptflist;
    }
 
       /*
                //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ) 
                           
                 );
                 
                 
                  $this->form_validation->set_rules($rules);
                
                  if ($this->form_validation->run() == FALSE)
                {
                 */ 
                   $this->load->view('template/default', $data);

               /* }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }
*/
		
        }

   




       //desc : senarai pspao ppd
        
        function senarai_ppd_pspao()
	{

    $node_id = '42';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_ppd_pspao';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $data['year_list'] =year_dropdown();  //get year list from function_helper
      
    $data['year_list'] =year_dropdown();  //get year list from function_helper

    if($getppdlist= $this->pspao_model->get_senarai_ppd_pspao())
    {
       $data['result'] = $getppdlist;
    }            
                
               
                $this->load->view('template/default', $data);
        }  
        
}

?>
