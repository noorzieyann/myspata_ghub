<?php

class Popa extends CI_Controller {
    
    
public function __construct()
  {
    parent::__construct();
    #load library dan helper yang dibutuhkan
    $this->load->library('form_validation');
    
    $this->load->helper(array('form', 'url'));
    $this->load->helper('function_helper');

    $this->load->model('pspao_model');
    $this->load->model('popa_model');
    $this->load->model('menu/sidemenu_model');    

    $this->load->library('pagination');
    $this->load->library('table');
   // $this->output->enable_profiler(TRUE); //display query statement
    
    //if(!$this->auth->is_loggedin()){
      //echo '<script>';
     // echo 'alert("Belum Login");';
     // echo 'window.location = "'.site_url('auth').'"';
     // echo '</script>';
    //}
    
  }
    

	
        //**START POPA**//
	
	function senarai_pp_popa($offset = 0)
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pegawai pengawal popa
            
            
    $node_id = '67';
    $menu_name = 'menu1';
    $menu_link = 'popa/senarai_pp_popa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
		
    $data['year_list'] =year_dropdown();  //get year list
    $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db 
    $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
    $data['premis'] = $this->popa_model->get_premis(); //dapatkan senarai premis dr db
    $data['status'] = $this->popa_model->get_status(); //dapatkan senarai premis dr db
                
    
    if($getSenPopa = $this->popa_model->get_senarai_popa())
    {
      $data['senaraipopa'] = $getSenPopa;
    }
     

    $this->load->view('template/default', $data);

  }



		
                
        
	 function senarai_ptf_popa($offset = 0)
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pegawai teknikal fasiliti popa
             
    $node_id = '71';
    $menu_name = 'menu1';
    $menu_link = 'popa/senarai_ptf_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $data['year_list'] =year_dropdown();  //get year list 
    $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
    $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
    $data['premis'] = $this->popa_model->get_premis();  //dapatkan senarai premis dr db
    $data['status'] = $this->popa_model->get_status(); //dapatkan senarai premis dr db
                

    if($getSenPopa = $this->popa_model->get_senarai_popa())
    {
      $data['senaraipopa'] = $getSenPopa;
    }

    $this->load->view('template/default', $data);
  
  }
        

        

  function senarai_pof_popa($offset = 0)
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pegawai operasi fasiliti popa
    

    $node_id = '72';
    $menu_name = 'menu1';
    $menu_link = 'popa/senarai_pof_popa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $data['year_list'] =year_dropdown();  //get year list 
    $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
    $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
    $data['premis'] = $this->popa_model->get_premis();
    $data['status'] = $this->popa_model->get_status(); //dapatkan senarai premis dr db
                
                            
    if($getSenPopa = $this->popa_model->get_senarai_popa())
    {
      $data['senaraipopa'] = $getSenPopa;
    }

   
    $this->load->view('template/default', $data);
  
}



function summary_ppd_popa_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan pnpa
             
                $node_id = '186';
                $menu_name = 'menu1';
                $menu_link = 'popa/summary_ppd_popa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
  }


        
  function senarai_ppd_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pegawai penyedia dokumen popa
            
    $node_id = '73';
    $menu_name = 'menu1';
    $menu_link = 'popa/senarai_ppd_popa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
    $data['year_list'] =year_dropdown();  //get year list 
    $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
    $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
    $data['premis'] = $this->popa_model->get_premis();
    $data['status'] = $this->popa_model->get_status(); //dapatkan senarai status dr db
        
    if($getSenPopa = $this->popa_model->get_senarai_popa())
    {
      $data['senaraipopa'] = $getSenPopa;
    }

    $this->load->view('template/default', $data);
    
  }



  function summary_ptf_popa_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '186';
                $menu_name = 'menu1';
                $menu_link = 'popa/summary_ptf_popa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_ptf_pnpa';
                $this->load->view('template/default', $data);
  } 


        
	function kandungan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: penyediaan kandungan popa


                $node_id = '74';
                $menu_name = 'menu1';
                $menu_link = 'popa/kandungan_popa';

                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->popa_model->get_premis(); //dapatkan senarai premis dr db
                
                
                 $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>',
                             ),
                 
                          array   ('2','Sivil','sayuthi Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','adib Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                      array ('5','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                      array ('6','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                      array ('7','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                      );


              

              $quantity = 5; // how many per page
              $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
              if(!$start) $start = 0; // default to zero if no $start

              $config['base_url'] = site_url('popa/model_struktur_popa_edit');
              $config['total_rows'] = count($data_1);
              $config['uri_segment'] = 3;
              $config['per_page'] = $quantity;
              $config['num_links'] = 20;
              $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
              $config['full_tag_close'] = '</div>';
              $config['next_link'] = 'Seterusnya &gt;';
              $config['prev_link'] = '&lt; Sebelumnya';

              $data['dataku'] = array_slice($data_1, $start, $quantity); 

              $this->pagination->initialize($config); 

              $data['pagination'] = $this->pagination->create_links();
            
    
    
              $this->table->set_heading('Bil', 'Kategori ID','Nama','Tindakan');

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
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
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
                                  'label'   => 'Skop dan Aktiviti Penilaian Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Penyediaan Keperluan Sumber Aktiviti Penilaian Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kawalan',
                                  'label'   => 'Kawalan Rekod Penilaian Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'rujukan',
                                  'label'   => 'Rujukan',
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
                       $data['main_content'] = 'popa/model_struktur_popa';
                       $this->load->view('template/default', $data);
                      
                     }
                
	}
	
	 
        
  function model_struktur_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: model struktur popa
            
    
    $node_id = '75';
    $menu_name = 'menu1';
    $menu_link = 'popa/model_struktur_popa';
            
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $data['year_list'] =year_dropdown();  //get year list 
    $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
    $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
    $data['premis'] = $this->popa_model->get_premis();
    $data['status'] = $this->popa_model->get_status(); //dapatkan senarai premis dr db
                
    
    $this->load->view('template/default', $data);
  }
        




  function model_struktur_popa_edit($offset = 0)
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: model struktur popa page edit
            
    $node_id = '141';
    $menu_name = 'menu1';
    $menu_link = 'popa/model_struktur_popa_edit';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $data['year_list'] =year_dropdown();  //get year list 
    $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
    $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
    $data['premis'] = $this->popa_model->get_premis();  //dapatkan senarai premis dr db
    $data['status'] = $this->popa_model->get_status(); //dapatkan senarai status dr db
                

    if($getSenKonFas = $this->popa_model->get_senarai_kont_fas())
    {
      $data['senaraikonfas'] = $getSenKonFas;
    }


    $this->load->view('template/default', $data);
  
  }



	
        
	 function treeviewskop_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: treeview popa
		$node_id = '76';
    $menu_name = 'menu1';
    $menu_link = 'popa/treeviewskop_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $this->load->view('template/default', $data);
	}


  function treeviewskop_popa_edit()
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: treeview popa
    $node_id = '144';
    $menu_name = 'menu1';
    $menu_link = 'popa/treeviewskop_popa_edit';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $this->load->view('template/default', $data);
  }

	
	 function skop_aktiviti_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: skop dan aktiviti popa
		$node_id = '77';
    $menu_name = 'menu1';
    $menu_link = 'popa/skop_aktiviti_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $this->load->view('template/default', $data);
	}


  function skop_aktiviti_popa_edit()
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: skop dan aktiviti popa
    $node_id = '146';
    $menu_name = 'menu1';
    $menu_link = 'popa/skop_aktiviti_popa_edit';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $this->load->view('template/default', $data);
  }


	
	function skop_aktiviti2_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: skop dan aktiviti 2 popa
            
    $node_id = '78';
    $menu_name = 'menu1';
    $menu_link = 'popa/skop_aktiviti2_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		$rules = array(
                            array(
                                  'field'   => 'pihakberkaitan',
                                  'label'   => 'Pihak Berkaitan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tanggungjawab',
                                  'label'   => 'Tanggungjawab',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'date_range1',
                                  'label'   => 'Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'report_range1',
                                  'label'   => 'Hingga',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'catatan',
                                  'label'   => 'Catatan',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'objeksebagai',
                                  'label'   => 'Objek Sebagai',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'bajet',
                                  'label'   => 'Bajet Aktiviti (RM)',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Sumber',
                                  'rules'   => 'required'
                               ),  
                            array(
                                  'field'   => 'output',
                                  'label'   => 'Output',
                                  'rules'   => 'required'
                               ),  
                            );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                    {
                          $data['main_content'] = 'popa/skop_aktiviti2_popa';
                          $this->load->view('template/default_pelan', $data);
	
                    }
                  else
                    {
                       $data['main_content'] = 'popa/kawalan_rekod_popa';
                       $this->load->view('template/default', $data);
                      
                     }
	}
	
  

  function skop_aktiviti2_popa_edit()
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: skop dan aktiviti 2 popa
            
    $node_id = '147';
    $menu_name = 'menu1';
    $menu_link = 'popa/skop_aktiviti2_popa_edit';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $rules = array(
                            array(
                                  'field'   => 'pihakberkaitan',
                                  'label'   => 'Pihak Berkaitan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tanggungjawab',
                                  'label'   => 'Tanggungjawab',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'date_range1',
                                  'label'   => 'Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'report_range1',
                                  'label'   => 'Hingga',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'catatan',
                                  'label'   => 'Catatan',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'objeksebagai',
                                  'label'   => 'Objek Sebagai',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'bajet',
                                  'label'   => 'Bajet Aktiviti (RM)',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Sumber',
                                  'rules'   => 'required'
                               ),  
                            array(
                                  'field'   => 'output',
                                  'label'   => 'Output',
                                  'rules'   => 'required'
                               ),  
                            );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                    {
                          $data['main_content'] = 'popa/skop_aktiviti2_popa_edit';
                          $this->load->view('template/default_pelan', $data);
  
                    }
                  else
                    {
                       $data['main_content'] = 'popa/kawalan_rekod_popa_edit';
                       $this->load->view('template/default', $data);
                      
                     }
  }      
        
        
	 function kawalan_rekod_popa($offset = 0)
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: kawalan rekod popa

    $node_id = '79';
    $menu_name = 'menu1';
    $menu_link = 'popa/kawalan_rekod_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

		
    if($getSenKaw = $this->popa_model->get_senarai_kawalan_rekod())
    {
      $data['senaraikawalan'] = $getSenKaw;
    }


    $this->load->view('template/default', $data);
	}



  function kawalan_rekod_popa_edit()
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: kawalan rekod popa

    $node_id = 148;
    $menu_name = 'menu1';
    $menu_link = 'popa/kawalan_rekod_popa_edit';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data['main_content'] = 'popa/kawalan_rekod_popa_edit';
    $this->load->view('template/default', $data);
  }

	
	function dokumen_rujukan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: dokumen rujukan popa

    $node_id = '78';
    $menu_name = 'menu1';
    $menu_link = 'popa/dokumen_rujukan_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


    if($getSenDok = $this->popa_model->get_senarai_dokumen())
    {
      $data['senaraidokumen'] = $getSenDok;
    }


    $this->load->view('template/default_pelan', $data);
	}



function treeview_popa_edit_pp ()
  {
                //nama:seri
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '134';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);
  }


function treeview_popa_edit_ppd ()
  {
                //nama:SERI
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '188';
                $menu_name = 'menu1';
                $menu_link = 'popa/treeview_popa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);
  }



function skop_aktiviti_popa_edit_ppd ()
  {

                //nama:seri
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '189';
                $menu_name = 'menu1';
                $menu_link = 'popa/skop_aktiviti_popa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }




function model_struktur_popa_edit_pp ()
  {
              $node_id = '193';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_popa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['status'] = $this->pnpa_model->get_status(); //dapatkan senarai premis dr db
               
              
               
                
              
               $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>',
                             ),
                 
                          array   ('2','Sivil','sayuthi Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','adib Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('5','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('6','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('7','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                  );
                  
               
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('pnpa/model_struktur_popa_edit_pp');
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
            
    
    
    $this->table->set_heading('Bil', 'Kategori ID','Nama','Tindakan');

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
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                              ),
                           array(
                                  'field'   => 'jabatan',
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
                                  'label'   => 'NO DPA',
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

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                         
                          $this->load->view('template/default', $data);
  
                }
                else
                {
                 
  
    $data['main_content'] = 'popa/model_struktur_popa_edit_pp';
                $this->load->view('template/default', $data);
  }
        }




function model_struktur_popa_edit_ppd ()
  {
              $node_id = '187';
                $menu_name = 'menu1';
                $menu_link = 'popa/model_struktur_popa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['status'] = $this->pnpa_model->get_status(); //dapatkan senarai premis dr db
               
              
               
                
              
               $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>',
                             ),
                 
                          array   ('2','Sivil','sayuthi Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','adib Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('5','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('6','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('7','Sivil','Hakim Mohd',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                  );
                  
               
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('popa/model_struktur_popa_edit_ppd');
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
            
    
    
    $this->table->set_heading('Bil', 'Kategori ID','Nama','Tindakan');

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
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                              ),
                           array(
                                  'field'   => 'jabatan',
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
                                  'label'   => 'NO DPA',
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

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                         
                          $this->load->view('template/default', $data);
  
                }
                else
                {
                 
  
    $data['main_content'] = 'pnpa/model_struktur_popa_edit_ppd';
                $this->load->view('template/default', $data);
  }
        }




  function dokumen_rujukan_popa_edit()
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: dokumen rujukan popa

    $node_id = '149';
    $menu_name = 'menu1';
    $menu_link = 'popa/skop_aktiviti2_popa_edit';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data['main_content'] = 'popa/dokumen_rujukan_popa_edit';
        $this->load->view('template/default_pelan', $data);
  }

	
	function summary_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary popa

    $node_id = '78';
    $menu_name = 'menu1';
    $menu_link = 'popa/skop_aktiviti2_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

		//$data['main_content'] = 'popa/summary_popa';
    $this->load->view('template/default', $data);
	}


	
  function summary_pp_popa_editpp()
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: summary pp popa
            
    $node_id = '178';
    $menu_name = 'menu1';
    $menu_link = 'popa/summary_pp_popa_editpp';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    
    $this->load->view('template/default', $data);

  }


	
	function summary_ptf_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary ptf popa
            
                $data['year_list'] =year_dropdown();  //get year list 
		$data['main_content'] = 'popa/summary_ptf_popa';
                $this->load->view('template/default_pelan', $data);
	}



  function summary_pof_popa()
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: summary ptf popa
    
    $node_id = '83';
    $menu_name = 'menu1';
    $menu_link = 'popa/summary_pof_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data['main_content'] = 'popa/summary_pof_popa';
    $this->load->view('template/default', $data);
  }
        
        
        
        function summary_ppd_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary pegawai penyedia dokumen popa
            
    $node_id = '84';
    $menu_name = 'menu1';
    $menu_link = 'popa/summary_ppd_popa';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data['main_content'] = 'popa/summary_ppd_popa';
    $this->load->view('template/default', $data);
	}
        
        
        
        function senarai_pspao_akhir()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pspao akhir
                $data['year_list'] =year_dropdown();  //get year list 
                $data['jabatan'] = $this->data_model->get_jabatan(); //dapatkan senarai jabatan dr db
                
                $this->load->library('pagination');
                $this->load->library('table');
                
                $config['total_rows'] = $this->db->get('tbl_pspao')->num_rows();
                $config['per_page'] = 10;
                $config['num_links'] = 20;
                $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
                $config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Seterusnya';
		$config['prev_link'] = 'Sebelumnya';
                
                $this->pagination->initialize($config);
		$data['records'] = $this->data_model->get_entries($config['per_page'], $this->uri->segment(3));
		$this->table->set_heading('Bil', 'PSPA ID', 'Tahun Mula', 'Tahun Akhir', 'Kementerian', 'Jabatan/Agensi', 'Negeri', 'Daerah', 'Kandungan', 'Disediakan Oleh', 'Tarikh Disediakan', 'Disemak Oleh', 'Tarikh Disemak', 'Diluluskan Oleh', 'Tarikh Diluluskan');
		
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
                
                
                $data['main_content'] = 'popa/senarai_pspao_akhir';
                $this->load->view('template/default_pelan', $data);
        
	}
        
   

  function skop_aktiviti2_popa_edit_ppd ()
  {
                //nama:seri
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '190';
                $menu_name = 'menu1';
                $menu_link = 'popa/skop_aktiviti2_popa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }



function kawalan_rekod_popa_edit_ppd ()
  {
                //nama:seri
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '193';
                $menu_name = 'menu1';
                $menu_link = 'popa/kawalan_rekod_popa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }




function dokumen_rujukan_popa_edit_ppd ()
  {
                //nama:seri
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '192';
                $menu_name = 'menu1';
                $menu_link = 'popa/dokumen_rujukan_popa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
  }



        function senarai_edaran_pspao()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai edaran pspao
                $data['year_list'] =year_dropdown();  //get year list 
                $data['jabatan'] = $this->data_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['kementerian'] = $this->data_model->get_kementerian(); //dapatkan senarai kementerian dr db
                
                $this->load->library('pagination');
                $this->load->library('table');
                
                $config['total_rows'] = $this->db->get('tbl_pspao')->num_rows();
                $config['per_page'] = 10;
                $config['num_links'] = 20;
                $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
                $config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Seterusnya';
		$config['prev_link'] = 'Sebelumnya';
                
                $this->pagination->initialize($config);
		$data['records'] = $this->data_model->get_entries($config['per_page'], $this->uri->segment(3));
		$this->table->set_heading('Bil', 'PSPA ID', 'Tahun Mula', 'Tahun Akhir', 'Kementerian', 'Jabatan/Agensi', 'Negeri', 'Daerah', 'Kandungan', 'Disediakan Oleh', 'Tarikh Disediakan', 'Disemak Oleh', 'Tarikh Disemak', 'Diluluskan Oleh', 'Tarikh Diluluskan');
		
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
                
                
                $data['main_content'] = 'popa/senarai_edaran_pspao';
                $this->load->view('template/default_pelan', $data);
        
	}
        
        
        function arahan_penyediaan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: arahan penyediaan popa oleh ptf kepada pof
                $node_id = '128';
                $menu_name = 'menu1';
                $menu_link = 'popa/arahan_penyediaan_popa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['daerah'] = $this->popa_model->get_daerah(); //dapatkan senarai daerah dr db
                $data['negeri'] = $this->popa_model->get_negeri(); //dapatkan senarai negeri dr db

                $data_1 =   array(
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '1','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '2','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '3','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '4','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '5','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '6','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '7','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '8','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '9','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '10','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '11','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '12','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '13','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '14','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '15','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        
                       );
                
                $quantity = 5; // how many per page
                $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
                if(!$start) $start = 0; // default to zero if no $start

		            // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
                $data['dataku'] = array_slice($data_1, $start, $quantity);
            
		            $config['base_url'] = site_url('popa/arahan_penyediaan_popa');
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



  function treeviewskop_popa_edit_pp ()
  {
                //nama:seri
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '179';
                $menu_name = 'menu1';
                $menu_link = 'popa/treeviewskop_popa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);

}



function summary_pp_popa ()
  {

    //nama:seri
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '81';
                $menu_name = 'menu1';
                $menu_link = 'popa/summary_pp_popa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default', $data);
  }




      function skop_aktiviti_popa_edit_pp ()
  {

                //nama:seri
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '180';
                $menu_name = 'menu1';
                $menu_link = 'popa/skop_aktiviti_popa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }




  function skop_aktiviti2_popa_edit_pp ()
  {
                //nama:seri
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '182';
                $menu_name = 'menu1';
                $menu_link = 'popa/skop_aktiviti2_popa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }



  function kawalan_rekod_popa_edit_pp ()
  {
                //nama:seri
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '183';
                $menu_name = 'menu1';
                $menu_link = 'popa/kawalan_rekod_popa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }



  function dokumen_rujukan_popa_edit_pp ()
  {
                //nama:seri
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'popa/dokumen_rujukan_popa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
  }



  function summary_pof_popa_edit()
  {

                //nama:seri
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '194';
                $menu_name = 'menu1';
                $menu_link = 'popa/summary_pof_popa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default', $data);
  }
  



  function model_struktur_popa_edit_pof()
  {

                //nama:seri
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '195';
                $menu_name = 'menu1';
                $menu_link = 'popa/model_struktur_popa_edit_pof';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default', $data);
  }




  function status_premis_popa()
  {
    //Name : Seri Idayu
    //Date : 10/09/2013
    //Desc : status premis pra pendaftaran popa


    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'popa/status_premis_popa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data['main_content'] = 'popa/status_premis_popa';
    $this->load->view('template/default', $data);
  }
  
	
	//**END POPA **//
}