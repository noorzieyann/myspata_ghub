<?php

class Main_fatin extends CI_Controller {

     function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('ptra_model','',TRUE);
		$this->load->helper('function_helper');
		$this->output->enable_profiler(TRUE); //display query statement
              
	}

	function index()
	{
        //$config['base_url'] = base_url() . 'DefaultPage/index';

		$data['main_content'] = 'main';
        $this->load->view('template/default', $data);
		//$this->load->view('default');
		//$this->load->view('home', $data);
	}
	
	//** PTRA **//

    function arahan_penyediaan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : arahan penyediaan ptra
        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
		$data['main_content'] = 'ptra/arahan_penyediaan_ptra';
        $this->load->view('template/default_pelan', $data);
	}

    function status_premis_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran
		$data['main_content'] = 'ptra/status_premis_ptra';
        $this->load->view('template/default_pelan', $data);
	}

	function kat_bangunan_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : kategori aset bangunan
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
                          $this->load->view('template/default_pelan', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                		$this->load->view('template/default_pelan', $data);
                      
                }
	}

	function kat_jalan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : kategori aset jalan
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
                          $this->load->view('template/default_pelan', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                		$this->load->view('template/default_pelan', $data);
                      
                }
	}

	function kat_pembetungan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : kategori aset pembetungan
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
                          $this->load->view('template/default_pelan', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                		$this->load->view('template/default_pelan', $data);
                      
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
                          $this->load->view('template/default_pelan', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                		$this->load->view('template/default_pelan', $data);
                      
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
                          $this->load->view('template/default_pelan', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                    $this->load->view('template/default_pelan', $data);
                      
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
                          $this->load->view('template/default_pelan', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra';
                    $this->load->view('template/default_pelan', $data);
                      
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
                          $this->load->view('template/default_pelan', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/model_struktur_ptra';
                		$this->load->view('template/default_pelan', $data);
                      
                }
	}
        
        function model_struktur_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra
		$data['main_content'] = 'ptra/model_struktur_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
        function treeview_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c
		$data['main_content'] = 'ptra/treeview_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
        function skop_aktiviti_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c
		$data['main_content'] = 'ptra/skop_aktiviti_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
        function skop_aktiviti2_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c
        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
		$data['main_content'] = 'ptra/skop_aktiviti2_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
        function kawalan_rekod_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d
		$data['main_content'] = 'ptra/kawalan_rekod_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
        function dokumen_rujukan_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e
		$data['main_content'] = 'ptra/dokumen_rujukan_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
        function summary_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : summary penyediaan ptra baru

        $data['year_list'] =year_dropdown();  //get year list

		$data['main_content'] = 'ptra/summary_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
        function summary_pp_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai pengawal

        $data['year_list'] =year_dropdown();  //get year list 

		$data['main_content'] = 'ptra/summary_pp_ptra';
        $this->load->view('template/default_pelan', $data);
	}
        
        function summary_ptf_ptra()
	{
		//Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

        $data['year_list'] =year_dropdown();  //get year list 

		$data['main_content'] = 'ptra/summary_ptf_ptra';
        $this->load->view('template/default_pelan', $data);
	}
	//** END PTRA **//
}
