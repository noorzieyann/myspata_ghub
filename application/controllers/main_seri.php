<?php

class Main extends CI_Controller {
    
    
function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('data_model','',TRUE);
                $this->load->helper('function_helper');
                $this->load->model('data_model');
               // $this->output->enable_profiler(TRUE); //display query statement
              
	}    
    

function index()
	{
        //$config['base_url'] = base_url() . 'DefaultPage/index';
		$data['main_content'] = 'main';
        $this->load->view('template/default', $data);
		//$this->load->view('default');
	}
    
        
    
/*
 * START PSPAO AWAL
*/
function arahan_sedia_pspao()
	{
        //author : Anuar
	//desc : arahan sedia pspao
        //date create: 08/07/2013
	$data['main_content'] = 'pspao/arahan_sedia_pspao';
        $this->load->view('template/default_pelan', $data);
	}
        
function senarai_notifikasi_pspao()
	{
	//author : Anuar
	//desc : senarai notifikasi pspao
        //date create: 08/07/2013
	$data['main_content'] = 'pspao/senarai_notifikasi_pspao';
        $this->load->view('template/default_pelan', $data);
	}
        
function pspao_baru()
	{
	//author : Anuar
	//desc : pspao baru  
        //date create: 08/07/2013
	$data['main_content'] = 'pspao/pspao_baru';
        $this->load->view('template/default_pelan', $data);
	}
        
function ulasan_pp_lulus_pspao()
	{
	//author : Anuar
	//desc : pspao ulasan peng. pgawal lulus
        //date create: 08/07/2013
	$data['main_content'] = 'pspao/ulasan_pp_lulus_pspao';
        $this->load->view('template/default_pelan', $data);
	}
        
function ulasan_pp_sah_pspao()
	{
        //author : Anuar
	//desc : pspao ulasan peng. pgawal sah
        //date create: 08/07/2013
	$data['main_content'] = 'pspao/ulasan_pp_sah_pspao';
        $this->load->view('template/default_pelan', $data);
	}
        
        
function senarai_pp_pspao()
	{
	//author : Anuar
	//desc : senarai pspao peng. pgawal
        //date create: 08/07/2013
	$data['main_content'] = 'pspao/senarai_pp_pspao';
        $this->load->view('template/default_pelan', $data);
        }
        
function senarai_ptf_pspao()
	{
	//author : Anuar
	//desc : senarai pspao ptf
        //date create: 08/07/2013
	$data['main_content'] = 'pspao/senarai_ptf_pspao';
        $this->load->view('template/default_pelan', $data);
        }

    
/*
* END PSPAO AWAL
*/
        
        
        

/*  Author : Khairul
*  Title  : Deshboard
*  Date   : 11/7/2013
*/
        
////////// -Dashboard- Start //////////
        
function dashboard()
        {
        $data['main_content'] = 'dashboard/default';
        $this->load->view('template/default',$data);
        }
        
////////// -Dashboard- End  ///////////


////////// -Fungsi- Start ///////////

function fungsi()
        {
        $data['main_content'] = 'fungsi/default';
        $this->load->view('template/default_pelan',$data);
        }

////////// -Fungsi-  End  ///////////

        
////////// -PSPAO Akhir- Start //////////
        
function pspao_akhir()
        {
        $data['main_content'] = 'pspao_akhir/default';
        $this->load->view('template/default_pelan',$data);            
        }

function arahan_sedia_pspao_akhir()
        {
        $data['main_content'] = 'pspao_akhir/arahan_sedia_pspao_akhir';
        $this->load->view('template/default_pelan',$data);         
        }
        
function senarai_template_pspao_awal()
        {
        $data['main_content'] = 'pspao_akhir/senarai_template_pspao_awal';
        $this->load->view('template/default_pelan',$data);            
        }
        
function senarai_notifikasi_pspao_akhir()
        {
        $data['main_content'] = 'pspao_akhir/senarai_notifikasi_pspao_akhir';
        $this->load->view('template/default_pelan',$data);            
        }
        
function pspao_akhir_baru()
        {
        $data['main_content'] = 'pspao_akhir/pspao_akhir_baru';
        $this->load->view('template/default_pelan',$data);            
        }
        
////////// -PSPAO Akhir-  End  //////////
        
        
        
        
/* START PPUN */

function dokumen_rujukan_ppun()
	{
        //author : Anuar
	//desc : dokumen rujukan ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/dokumen_rujukan_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function kawalan_rekod_terima_ppun()
	{
        //author : Anuar
	//desc : kawalan rekod terima ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/kawalan_rekod_terima_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  kemaskini_tskopaktiviti_ppun()
	{
	//author : Anuar
	//desc : kemaskini tskopaktiviti ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/kemaskini_tskopaktiviti_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  model_struktur_ppun()
	{
	//author : Anuar
	//desc : model struktur ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/model_struktur_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  penyediaan_kandungan_ppun()
	{
	//author : Anuar
	//desc : penyediaan kandungan ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/penyediaan_kandungan_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  treeviewskop_ppun()
	{
	//author : Anuar
	//desc : treeviewskop ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/treeviewskop_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  tskopaktiviti_ppun()
	{
	//author : Anuar
	//desc : tskopaktiviti ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/tskopaktiviti_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  summary_ptf_ppun()
	{
	//author : Anuar
	//desc : summary ptf ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/summary_ptf_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  summary_pp_ppun()
	{
	//author : Anuar
	//desc : summary pp ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/summary_pp_ppun';
        $this->load->view('template/default_pelan', $data);
        }
       
function  summary_ppun()
	{
	//author : Anuar
	//desc : summary ppun
        //date create: 08/07/2013
	$data['main_content'] = 'ppun/summary_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  senarai_ptf_ppun()
	{
	//author : Anuar
	//desc : senarai ptf ppun
        //date create: 09/07/2013
	$data['main_content'] = 'ppun/senarai_ptf_ppun';
        $this->load->view('template/default_pelan', $data);
        }
        
function  senarai_pp_ppun()
	{
	//author : Anuar
	//desc : senarai pp ppun
        //date create: 09/07/2013
	$data['main_content'] = 'ppun/senarai_pp_ppun';
        $this->load->view('template/default_pelan', $data);
        }

/*
* END PPUN
*/
        
  
        

//** PTRA **//
        
function senarai_pp_ptra()
	{
	//Nama : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai pengawal
	$data['main_content'] = 'ptra/senarai_pp_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
function senarai_ptf_ptra()
	{
	//Nama : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai teknikal fasiliti
	$data['main_content'] = 'ptra/senarai_ptf_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
function kandungan_ptra()
	{
	//Nama : Fatin
        //Date : 8/7/13
        //Desc : penyediaan kandungan ptra
	$data['main_content'] = 'ptra/kandungan_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
function model_struktur_ptra()
	{
	//Nama : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra
	$data['main_content'] = 'ptra/model_struktur_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
function treeview_ptra()
	{
	//Nama : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c
	$data['main_content'] = 'ptra/treeview_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
function skop_aktiviti_ptra()
	{
	//Nama : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c
	$data['main_content'] = 'ptra/skop_aktiviti_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
function skop_aktiviti2_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : keperluan sumber skop aktiviti 1b 1c
		$data['main_content'] = 'ptra/skop_aktiviti2_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function kawalan_rekod_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : kawalan rekod ptra 1d
		$data['main_content'] = 'ptra/kawalan_rekod_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function dokumen_rujukan_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : dokumen rujukan 1e
		$data['main_content'] = 'ptra/dokumen_rujukan_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : summary penyediaan ptra baru
		$data['main_content'] = 'ptra/summary_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_pp_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : summary pegawai pengawal
		$data['main_content'] = 'ptra/summary_pp_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_ptf_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : summary pegawai teknikal fasiliti
		$data['main_content'] = 'ptra/summary_ptf_ptra';
                $this->load->view('template/default_pelan', $data);
	}
	//** END PTRA **//
        
        
       //** Start PNPA **//

	   function senarai_pp_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai pengawal
		$data['main_content'] = 'pnpa/senarai_pp_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function senarai_ptf_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai teknikal fasiliti
		$data['main_content'] = 'pnpa/senarai_ptf_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	function kandungan_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page penyediaan kandungan pnpa
		$data['main_content'] = 'pnpa/kandungan_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	
	function model_struktur_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page model struktur pnpa
		$data['main_content'] = 'pnpa/model_struktur_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	function treeview_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
		$data['main_content'] = 'pnpa/treeview_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	function skop_aktiviti_pnpa ()
	{

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti	
                $data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function skop_aktiviti2_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
		$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function kawalan_rekod_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
		$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default_pelan', $data);
	}
        
        function dokumen_rujukan_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
		$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
         function summary_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan pnpa
                $data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_pp_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
                $data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_ptf_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
                $data['main_content'] = 'pnpa/summary_ptf_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	//** END PNPA **// 
        
        
        
        //**START POPA**//
	
	function senarai_pp_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pp popa
		
                $data['year_list'] =year_dropdown();  //get year list 
                $data['jabatan'] = $this->data_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->data_model->get_premis(); //dapatkan senarai premis dr db
                
                
                
                //$this->load->model('data_model');
                $this->load->library('pagination');
                $this->load->library('table');
		
		//$modulid = '2';
		
		//$config['base_url'] = site_url('popa/index');
		//$this->db->where('modul_id', $modulid); 
                $config['total_rows'] = $this->db->get('tbl_popa')->num_rows();
                $config['per_page'] = 10;
                $config['num_links'] = 20;
                $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
                $config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Seterusnya';
		$config['prev_link'] = 'Sebelumnya';

		$this->pagination->initialize($config);
		$data['records'] = $this->data_model->get_entries($config['per_page'], $this->uri->segment(3));
		$this->table->set_heading('Bil', 'POPA ID', 'Tahun', 'Kementerian', 'Jabatan/Agensi', 'Premis', 'No DPA', 'Status', 'Tindakan');

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

		
                
		
		$data['main_content'] = 'popa/senarai_pp_popa';
                $this->load->view('template/default_pelan', $data);
		//$data['main_content'] = 'popa/senarai_pspao_akhir';
  		//$this->load->view('template/default', $data);        
	}
	
        
	 function senarai_ptf_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai ptf popa
		$data['main_content'] = 'popa/senarai_ptf_popa';
                $this->load->view('template/default_pelan', $data);
	}
	
        
        
        function senarai_pof_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pof popa
            
                $data['year_list'] =year_dropdown();  //get year list 
                $data['jabatan'] = $this->data_model->get_jabatan(); //dapatkan senarai jabatan dr db
                
                $this->load->library('pagination');
                $this->load->library('table');
                
                $config['total_rows'] = $this->db->get('tbl_popa')->num_rows();
                $config['per_page'] = 10;
                $config['num_links'] = 20;
                $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
                $config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Seterusnya';
		$config['prev_link'] = 'Sebelumnya';
                
                $this->pagination->initialize($config);
		$data['records'] = $this->data_model->get_entries($config['per_page'], $this->uri->segment(3));
		$this->table->set_heading('Bil', 'POPA ID', 'Tahun', 'Kementerian', 'Jabatan/Agensi', 'Premis', 'No DPA', 'Status', 'Tindakan');
                
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
                
                
		$data['main_content'] = 'popa/senarai_pof_popa';
                $this->load->view('template/default_pelan', $data);
	}
        
	function kandungan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: penyediaan kandungan popa
                $data['year_list'] =year_dropdown();  //get year list 
                $data['jabatan'] = $this->data_model->get_jabatan(); //dapatkan senarai jabatan dr db
		$data['premis'] = $this->data_model->get_premis(); //dapatkan senarai premis dr db
                
                $rules = array(
                            array(
                                  'field'   => 'tempoh_mula',
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
                                  'label'   => 'Objektif',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'carta_pelan',
                                  'label'   => 'Carta Organisasi dan Pelan Komunikasi',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'skop',
                                  'label'   => 'Skop dan Aktiviti Operasi dan Penyenggaraan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Penyediaan Keperluan Sumber Aktiviti Operasi dan Penyenggaraan Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kawalan',
                                  'label'   => 'Kawalan Rekod Operasi dan Penyenggaraan Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'rujukan',
                                  'label'   => 'Rujukan',
                                  'rules'   => 'required'
                               ),
                            //array(
                                  //'field'   => 'kementerian',
                                  //'label'   => 'Kementerian',
                                 // 'rules'   => 'required'
                                 //)
                    
                            );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                    {
                          $data['main_content'] = 'popa/kandungan_popa';
                          $this->load->view('template/default_pelan', $data);
	
                    }
                  else
                    {
                       $data['main_content'] = 'popa/model_struktur_popa';
                       $this->load->view('template/default_pelan', $data);
                      
                     }
                
	}
	
	 
        
        function model_struktur_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: model struktur popa
		$data['main_content'] = 'popa/model_struktur_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function treeview_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: treeview popa
		$data['main_content'] = 'popa/treeviewskop_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function skop_aktiviti_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: skop dan aktiviti popa
		$data['main_content'] = 'popa/skop_aktiviti_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function skop_aktiviti2_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: skop dan aktiviti 2 popa
		$data['main_content'] = 'popa/skop_aktiviti2_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function kawalan_rekod_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: kawalan rekod popa
		$data['main_content'] = 'popa/kawalan_rekod_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function dokumen_rujukan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: dokumen rujukan popa
		$data['main_content'] = 'popa/dokumen_rujukan_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function summary_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary popa
		$data['main_content'] = 'popa/summary_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function summary_pp_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary pp popa
		$data['main_content'] = 'popa/summary_pp_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function summary_ptf_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary ptf popa
		$data['main_content'] = 'popa/summary_ptf_popa';
        $this->load->view('template/default_pelan', $data);
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
                $data['kementerian'] = $this->data_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->data_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['negeri'] = $this->data_model->get_negeri(); //dapatkan senarai negeri dr db
                $data['daerah'] = $this->data_model->get_jabatan(); //dapatkan senarai daerah dr db
                
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
            
		$data['main_content'] = 'popa/arahan_penyediaan_popa';
                $this->load->view('template/default_pelan', $data);
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