<?php


       //author : Anuar
       //date create: 08/07/2013

class Ppun extends CI_Controller {
    
    
       public function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library('form_validation');
		
		$this->load->helper(array('form', 'url'));
		$this->load->helper('function_helper');
		
		$this->load->model('ppun_model');
         $this->load->library('pagination');
         $this->load->library('table');
				
	//	$this->output->enable_profiler(TRUE); //display query statement
		
		if(!$this->aauth->is_loggedin()){
			echo '<script>';
			echo 'alert("Belum Login");';
			echo 'window.location = "'.site_url('auth').'"';
			echo '</script>';
		}
		
	}
    
    
       //desc : dokumen rujukan ppun
        
        function dokumen_rujukan_ppun()
	{
		
		$node_id = '45';
		$menu_name = 'menu1';
		$menu_link = 'ppun/dokumen_rujukan_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
		
		$data_1 = $this->ppun_model->get_dokumen_rujukan(); //get data from model
		       
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ppun/dokumen_rujukan_ppun');
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
            
    
    
    $this->table->set_heading('Bil', 'Tajuk Dokumen', 'Dokumen Rujukan','Tindakan');

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
		
		
                $this->load->view('template/default', $data);
	}
         //desc : kawalan rekod terima ppun
         
        function arahan_penyediaan()
	{
		
		
		
		$node_id = '169';
		$menu_name = 'menu1';
		$menu_link = 'ppun/arahan_penyediaan_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
		
		 $data['kementerian'] = $this->ppun_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ppun_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ppun_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ppun_model->get_negeri(); //dapatkan senarai negeri dr db
		
		  $data_1 = $this->ppun_model->get_arahan_sedia_ppun(); //get data from model
		
		  $data['year_list'] =year_dropdown();  //get year list function_helper
		  
		  
		           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('pnpa/arahan_penyediaan_pnpa');
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
            
    
    
    $this->table->set_heading('#','Bil', 'Nama', 'Kementerian','Jabatan/Agensi');

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

        $this->load->view('template/default', $data);
		
           
	}
        
		
		
        
        //desc : kawalan rekod terima ppun
         
        function kawalan_rekod_pemulihan_ppun()
	{
		
		
		
		$node_id = '46';
		$menu_name = 'menu1';
		$menu_link = 'ppun/kawalan_rekod_pemulihan_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $this->load->view('template/default', $data);
	}
        
        //desc : kemaskini tskopaktiviti ppun 
        
        function kemaskini_tskopaktiviti_ppun()
	{
		
		$node_id = '47';
		$menu_name = 'menu1';
		$menu_link = 'ppun/kemaskini_tskopaktiviti_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //form validation
                $rules = array(
                            array(
                                  'field'   => 'skop',
                                  'label'   => 'Skop',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'aktiviti',
                                  'label'   => 'Aktiviti',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'butir_aktiviti',
                                  'label'   => 'Butir Aktiviti',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'p_kaitan',
                                  'label'   => 'Pihak Berkaitan',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tanggungjawab',
                                  'label'   => 'Tanggungjawab',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ) , 
                            array(
                                  'field'   => 'catatan',
                                  'label'   => 'Catatan',
                                  'rules'   => 'required'
                               ) , 
                            array(
                                  'field'   => 'objek_sebagai',
                                  'label'   => 'Objek Sebagai',
                                  'rules'   => 'required'
                               )  , 
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Sumber',
                                  'rules'   => 'required'
                               )   , 
                            array(
                                  'field'   => 'output',
                                  'label'   => 'Output',
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
                // $data['main_content'] = 'ppun/tskopaktiviti_ppun';
               // $this->load->view('template/default_pelan', $data);
                      
                }
                
                
               
	}
	
	
	   function kemaskini_tskopaktiviti_ptf_ppun()
	{
		
		$node_id = '174';
		$menu_name = 'menu1';
		$menu_link = 'ppun/kemaskini_tskopaktiviti_ptf_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //form validation
                $rules = array(
                            array(
                                  'field'   => 'skop',
                                  'label'   => 'Skop',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'aktiviti',
                                  'label'   => 'Aktiviti',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'butir_aktiviti',
                                  'label'   => 'Butir Aktiviti',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'p_kaitan',
                                  'label'   => 'Pihak Berkaitan',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tanggungjawab',
                                  'label'   => 'Tanggungjawab',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ) , 
                            array(
                                  'field'   => 'catatan',
                                  'label'   => 'Catatan',
                                  'rules'   => 'required'
                               ) , 
                            array(
                                  'field'   => 'objek_sebagai',
                                  'label'   => 'Objek Sebagai',
                                  'rules'   => 'required'
                               )  , 
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Sumber',
                                  'rules'   => 'required'
                               )   , 
                            array(
                                  'field'   => 'output',
                                  'label'   => 'Output',
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
                // $data['main_content'] = 'ppun/tskopaktiviti_ppun';
               // $this->load->view('template/default_pelan', $data);
                      
                }
                
                
               
	}
        
		   function kemaskini_tskopaktiviti_ppd_ppun()
	{
		
		$node_id = '175';
		$menu_name = 'menu1';
		$menu_link = 'ppun/kemaskini_tskopaktiviti_ppd_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //form validation
                $rules = array(
                            array(
                                  'field'   => 'skop',
                                  'label'   => 'Skop',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'aktiviti',
                                  'label'   => 'Aktiviti',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'butir_aktiviti',
                                  'label'   => 'Butir Aktiviti',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'p_kaitan',
                                  'label'   => 'Pihak Berkaitan',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tanggungjawab',
                                  'label'   => 'Tanggungjawab',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ) , 
                            array(
                                  'field'   => 'catatan',
                                  'label'   => 'Catatan',
                                  'rules'   => 'required'
                               ) , 
                            array(
                                  'field'   => 'objek_sebagai',
                                  'label'   => 'Objek Sebagai',
                                  'rules'   => 'required'
                               )  , 
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Sumber',
                                  'rules'   => 'required'
                               )   , 
                            array(
                                  'field'   => 'output',
                                  'label'   => 'Output',
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
                // $data['main_content'] = 'ppun/tskopaktiviti_ppun';
               // $this->load->view('template/default_pelan', $data);
                      
                }
                
                
               
	}
		
		
		   function kemaskini_tskopaktiviti_pp_ppun()
	{
		
		$node_id = '176';
		$menu_name = 'menu1';
		$menu_link = 'ppun/kemaskini_tskopaktiviti_pp_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //form validation
                $rules = array(
                            array(
                                  'field'   => 'skop',
                                  'label'   => 'Skop',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'aktiviti',
                                  'label'   => 'Aktiviti',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'butir_aktiviti',
                                  'label'   => 'Butir Aktiviti',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'p_kaitan',
                                  'label'   => 'Pihak Berkaitan',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tanggungjawab',
                                  'label'   => 'Tanggungjawab',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ) , 
                            array(
                                  'field'   => 'catatan',
                                  'label'   => 'Catatan',
                                  'rules'   => 'required'
                               ) , 
                            array(
                                  'field'   => 'objek_sebagai',
                                  'label'   => 'Objek Sebagai',
                                  'rules'   => 'required'
                               )  , 
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Sumber',
                                  'rules'   => 'required'
                               )   , 
                            array(
                                  'field'   => 'output',
                                  'label'   => 'Output',
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
                // $data['main_content'] = 'ppun/tskopaktiviti_ppun';
               // $this->load->view('template/default_pelan', $data);
                      
                }
                
                
               
	}
		
		
        //desc : model struktur ppun
       
        
        function model_struktur_ppun()
	{
		
	
		$node_id = '48';
		$menu_name = 'menu1';
		$menu_link = 'ppun/model_struktur_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $this->load->view('template/default', $data);
	}
        
        //desc : penyediaan kandungan ppun
        
        function penyediaan_kandungan_ppun()
	{
		
		
		$node_id = '49';
		$menu_name = 'menu1';
		$menu_link = 'ppun/penyediaan_kandungan_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                 $data['year_list'] =year_dropdown();  //get year list function_helper
                //$data['kementerian'] = $this->ppun_model->get_kementerian(); //dapatkan senarai kementerian dr db
                //$data['jabatan'] = $this->ppun_model->get_jabatan(); //dapatkan senarai jabatan dr db
                //$data['premis'] = $this->ppun_model->get_premis(); //dapatkan senarai premis dr db
                 
                 //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tempoh_mula',
                                  'label'   => 'Tempoh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'nodpa',
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
                                  'field'   => 'carta_pelan',
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
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                                 )
                    
                 ); 
                 
                 
                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                           $this->load->view('template/default', $data);
	
                }
                else
                {
                  $data['main_content'] = 'ppun/model_struktur_ppun';
                $this->load->view('template/default', $data);
					/*
					$node_id = '48';
		$menu_name = 'menu1';
		$menu_link = 'ppun/model_struktur_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                      // $data['main_content'] = 'ppun/model_struktur_ppun';
                      $this->load->view('template/default_pelan', $data);
                     */
					// redirect(site_url("ppun/model_struktur_ppun")); 
                }
                
                
               
	}
        
        
	//desc : treeviewskop ppun
        
        function treeviewskop_ppun()
	{

		
		$node_id = '50';
		$menu_name = 'menu1';
		$menu_link = 'ppun/treeviewskop_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $this->load->view('template/default', $data);
        }
        
        //desc : tskopaktiviti ppun
        
        function tskopaktiviti_ppun()
	{

		
		$node_id = '51';
		$menu_name = 'menu1';
		$menu_link = 'ppun/tskopaktiviti_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $this->load->view('template/default', $data);
        }
		
		  
        //desc : tskopaktiviti ptf ppun
        
        function tskopaktiviti_ptf_ppun()
	{

		
		$node_id = '171';
		$menu_name = 'menu1';
		$menu_link = 'ppun/tskopaktiviti_ptf_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $this->load->view('template/default', $data);
        }
        
		
		 //desc : tskopaktiviti ptf ppun
        
        function tskopaktiviti_ppd_ppun()
	{

		
		$node_id = '172';
		$menu_name = 'menu1';
		$menu_link = 'ppun/tskopaktiviti_ppd_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $this->load->view('template/default', $data);
        }
        
		 //desc : tskopaktiviti pt ppun
        
        function tskopaktiviti_pp_ppun()
	{

		
		$node_id = '173';
		$menu_name = 'menu1';
		$menu_link = 'ppun/tskopaktiviti_pp_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $this->load->view('template/default', $data);
        }
        
        
        //desc : summary ptf ppun
        
        function summary_ptf_ppun()
	{

		
		$node_id = '52';
		$menu_name = 'menu1';
		$menu_link = 'ppun/summary_ptf_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                
    $data['year_list'] = year_dropdown();  //get year list function_helper 
    $data['kandungan'] = $this->ppun_model->get_kandungan();
             
        
        if(isset($_POST["simpan_pendahuluan"])) {



          $this->ppun_model->update_kandungan($this->input->post('pendahuluan'),$this->uri->segment(3));

          $this->load->view('template/default', $data);

        } //elseif() {


       // }


        else {

                 //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tempoh_mula',
                                  'label'   => 'Tempoh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                          
                  );
              
                
                 
                 if($this->input->post('pendahuluan')==''){
                     $this->form_validation->set_rules('pendahuluan', 'Pedahuluan', 'required');
                 }
                 
                 if($this->input->post('objektif')==''){
                     $this->form_validation->set_rules('objektif', 'Objektif', 'required');
                 }
                 
                 if($this->input->post('carta')==''){
                     $this->form_validation->set_rules('carta', 'Carta Organisasi dan Pelan Komunikasi', 'required');
                 }
                 
                 if($this->input->post('skopaktiviti')==''){
                     $this->form_validation->set_rules('skopaktiviti', 'Skop dan Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset', 'required');
                 }
                 
                 if($this->input->post('keperluansumber')==''){
                     $this->form_validation->set_rules('keperluansumber', 'Penyediaan Keperluan Sumber Aktiviti Pemulihan/Ubah Suai/ Naik Taraf Aset', 'required');
                 }
                 
                 if($this->input->post('kwlrekodaset')==''){
                     $this->form_validation->set_rules('kwlrekodaset', 'Kawalan Rekod Pemulihan/Ubah Suai/Naik taraf Aset', 'required');
                 }
                 
                 if($this->input->post('rujukan')==''){
                     $this->form_validation->set_rules('rujukan', 'Rujukan', 'required');
                 }
                 
                 if($this->input->post('ulasan')==''){
                     $this->form_validation->set_rules('ulasan', 'Ulasan', 'required');
                 }
              
                $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                        
                      $this->load->view('template/default', $data);

                 }     

               /* }
                else
                {
                      // $data['main_content'] = 'ppun/senarai_ptf_ppun';
                      // $this->load->view('template/default_pelan', $data);
                      
                }
             */
                
                
        }

      }

        //desc : summary pp ppun
        
         function summary_pp_ppun()
	{

		
		$node_id = '53';
		$menu_name = 'menu1';
		$menu_link = 'ppun/summary_pp_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                 $data['year_list'] =year_dropdown();  //get year list 
                 $data['kandungan'] = $this->ppun_model->get_kandungan();
                
                 //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tempoh_mula',
                                  'label'   => 'Tempoh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                           
                          
                  );
                 
                 
                  
                 if($this->input->post('pendahuluan')==''){
                     $this->form_validation->set_rules('pendahuluan', 'Pedahuluan', 'required');
                 }
                 
                 if($this->input->post('objektif')==''){
                     $this->form_validation->set_rules('objektif', 'Objektif', 'required');
                 }
                 
                 if($this->input->post('carta')==''){
                     $this->form_validation->set_rules('carta', 'Carta Organisasi dan Pelan Komunikasi', 'required');
                 }
                 
                 if($this->input->post('skopaktiviti')==''){
                     $this->form_validation->set_rules('skopaktiviti', 'Skop dan Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset', 'required');
                 }
                 
                 if($this->input->post('keperluansumber')==''){
                     $this->form_validation->set_rules('keperluansumber', 'Penyediaan Keperluan Sumber Aktiviti Pemulihan/Ubah Suai/ Naik Taraf Aset', 'required');
                 }
                 
                 if($this->input->post('kwlrekodaset')==''){
                     $this->form_validation->set_rules('kwlrekodaset', 'Kawalan Rekod Pemulihan/Ubah Suai/Naik taraf Aset', 'required');
                 }
                 
                 if($this->input->post('rujukan')==''){
                     $this->form_validation->set_rules('rujukan', 'Rujukan', 'required');
                 }
                 
                 if($this->input->post('ulasan')==''){
                     $this->form_validation->set_rules('ulasan', 'Ulasan', 'required');
                 }
                 
                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          
                    $this->load->view('template/default', $data);

                }
                else
                {
                  
		//$data['main_content'] = 'ppun/senarai_pp_ppun';
                //$this->load->view('template/default_pelan', $data);    
                      
                }
                         
               
        }


       //desc : summary ppd ppun
        
         function summary_ppd_ppun()
	{

		
		$node_id = '158';
		$menu_name = 'menu1';
		$menu_link = 'ppun/summary_ppd_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                 $data['year_list'] =year_dropdown();  //get year list 
                 $data['kandungan'] = $this->ppun_model->get_kandungan();
                
                 //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tempoh_mula',
                                  'label'   => 'Tempoh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                           
                          
                  );
                 
                 
                  
                 if($this->input->post('pendahuluan')==''){
                     $this->form_validation->set_rules('pendahuluan', 'Pedahuluan', 'required');
                 }
                 
                 if($this->input->post('objektif')==''){
                     $this->form_validation->set_rules('objektif', 'Objektif', 'required');
                 }
                 
                 if($this->input->post('carta')==''){
                     $this->form_validation->set_rules('carta', 'Carta Organisasi dan Pelan Komunikasi', 'required');
                 }
                 
                 if($this->input->post('skopaktiviti')==''){
                     $this->form_validation->set_rules('skopaktiviti', 'Skop dan Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset', 'required');
                 }
                 
                 if($this->input->post('keperluansumber')==''){
                     $this->form_validation->set_rules('keperluansumber', 'Penyediaan Keperluan Sumber Aktiviti Pemulihan/Ubah Suai/ Naik Taraf Aset', 'required');
                 }
                 
                 if($this->input->post('kwlrekodaset')==''){
                     $this->form_validation->set_rules('kwlrekodaset', 'Kawalan Rekod Pemulihan/Ubah Suai/Naik taraf Aset', 'required');
                 }
                 
                 if($this->input->post('rujukan')==''){
                     $this->form_validation->set_rules('rujukan', 'Rujukan', 'required');
                 }
                 
                 if($this->input->post('ulasan')==''){
                     $this->form_validation->set_rules('ulasan', 'Ulasan', 'required');
                 }
                 
                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          
                    $this->load->view('template/default', $data);

                }
                else
                {
                  
		//$data['main_content'] = 'ppun/senarai_pp_ppun';
                //$this->load->view('template/default_pelan', $data);    
                      
                }
                         
               
        }






        //desc : summary ppun
        
        function summary_ppun()
	{

		
		$node_id = '54';
		$menu_name = 'menu1';
		$menu_link = 'ppun/summary_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                 $data['year_list'] =year_dropdown();  //get year list
                 $data['kandungan'] = $this->ppun_model->get_kandungan(); 
                
                 
                 //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tempoh_mula',
                                  'label'   => 'Tempoh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'nodpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                           
                          
                  );
                 
                  if($this->input->post('pendahuluan')==''){
                     $this->form_validation->set_rules('pendahuluan', 'Pedahuluan', 'required');
                 }
                 
                 if($this->input->post('objektif')==''){
                     $this->form_validation->set_rules('objektif', 'Objektif', 'required');
                 }
                 
                 if($this->input->post('carta')==''){
                     $this->form_validation->set_rules('carta', 'Carta Organisasi dan Pelan Komunikasi', 'required');
                 }
                 
                 if($this->input->post('skopaktiviti')==''){
                     $this->form_validation->set_rules('skopaktiviti', 'Skop dan Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset', 'required');
                 }
                 
                 if($this->input->post('keperluansumber')==''){
                     $this->form_validation->set_rules('keperluansumber', 'Penyediaan Keperluan Sumber Aktiviti Pemulihan/Ubah Suai/ Naik Taraf Aset', 'required');
                 }
                 
                 if($this->input->post('kwlrekodaset')==''){
                     $this->form_validation->set_rules('kwlrekodaset', 'Kawalan Rekod Pemulihan/Ubah Suai/Naik taraf Aset', 'required');
                 }
                 
                 if($this->input->post('rujukan')==''){
                     $this->form_validation->set_rules('rujukan', 'Rujukan', 'required');
                 }
                 
                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('template/default', $data);

                }
                else
                {
                     
		//$data['main_content'] = 'ppun/senarai_pp_ppun';
                //$this->load->view('template/default_pelan', $data); 
                      
                }
                
                
        }
        
        
        //desc : senarai ptf ppun
        
      function senarai_ptf_ppun()
	{

		
		$node_id = '55';
		$menu_name = 'menu1';
		$menu_link = 'ppun/senarai_ptf_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
         
    if($getSenaraiPTF = $this->ppun_model->get_senarai_ppun())
    {
       $data['senarai_ppun'] = $getSenaraiPTF;
    }

               /* 
                 $data['year_list'] =year_dropdown();  //get year list 
                //$data['jabatan'] = $this->ppun_model->get_jabatan(); //dapatkan senarai jabat$dataan dr db
                 
                 $data_1 = $this->ppun_model->get_senarai_ptf(); //get data from model
                 
                //pagination setting 
                $quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('ppun/senarai_ptf_ppun');
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
            
    
		//table setting
		$this->table->set_heading('Bil', 'PPUN Id', 'Tahun','Kementerian','Jabatan/Agensi','Premis','No DPA','Status','Tindakan');

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
       */      
                
                
                $this->load->view('template/default', $data);
        }  
        
		
		  //desc : senarai ppun
        
      function senarai_ppun()
	{

		
		$node_id = '170';
		$menu_name = 'menu1';
		$menu_link = 'ppun/senarai_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                 $data['year_list'] =year_dropdown();  //get year list 
                //$data['jabatan'] = $this->ppun_model->get_jabatan(); //dapatkan senarai jabat$dataan dr db
                 
                 $data_1 = $this->ppun_model->get_senarai_ptf(); //get data from model
                 
                //pagination setting 
                $quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('ppun/senarai_ptf_ppun');
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
            
    
		//table setting
		$this->table->set_heading('Bil', 'PPUN Id', 'Tahun','Kementerian','Jabatan/Agensi','Premis','No DPA','Status','Tindakan');

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
             
                
                
                $this->load->view('template/default', $data);
        }  
        
		
		
		
		
		//desc : senarai ppd ppun
        
      function senarai_ppd_ppun()
	{

		
		$node_id = '157';
		$menu_name = 'menu1';
		$menu_link = 'ppun/senarai_ppd_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
     if($getSenaraiPTF = $this->ppun_model->get_senarai_ppun())
    {
       $data['senarai_ppun'] = $getSenaraiPTF;
    }
     

            /*    
                 $data['year_list'] =year_dropdown();  //get year list 
                //$data['jabatan'] = $this->ppun_model->get_jabatan(); //dapatkan senarai jabat$dataan dr db
                 
                 $data_1 = $this->ppun_model->get_senarai_ppd(); //get data from model
                 
                //pagination setting 
                $quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('ppun/senarai_ppd_ppun');
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
            
    
		//table setting
		$this->table->set_heading('Bil', 'PPUN Id', 'Tahun','Kementerian','Jabatan/Agensi','Premis','No DPA','Status','Tindakan');

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
             
        */        
                
                $this->load->view('template/default', $data);
        }  
        
		
		
		
		
        //desc : senarai pp ppun
        
        function senarai_pp_ppun()
	{

		
		$node_id = '56';
		$menu_name = 'menu1';
		$menu_link = 'ppun/senarai_pp_ppun';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


    if($getSenaraiPTF = $this->ppun_model->get_senarai_ppun())
    {
       $data['senarai_ppun'] = $getSenaraiPTF;
    }
                
           /*     $data['year_list'] =year_dropdown();  //get year list 
                //$data['jabatan'] = $this->ppun_model->get_jabatan(); //dapatkan senarai jabatan dr db

                 $data_1 = $this->ppun_model->get_senarai_pp(); //get data from model
                 
                 
                 //pagination setting
		$quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('ppun/senarai_pp_ppun');
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
            
    
		//table setting
		$this->table->set_heading('Bil', 'PPUN Id', 'Tahun','Kementerian','Jabatan/Agensi','Premis','No DPA','Status','Tindakan');

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
             
          */      
                 
                
                $this->load->view('template/default', $data);
        }
         
        
}

?>
