<?php

class Main extends CI_Controller {

		 
	function index()
	{
        //$config['base_url'] = base_url() . 'DefaultPage/index';
		$data['main_content'] = 'main';
        $this->load->view('template/default', $data);
		//$this->load->view('default');
	}

        function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
		$this->load->model('ppun_model','',TRUE);
		$this->load->model('pnpa_model','',TRUE);
		$this->load->helper('function_helper');
		$this->load->model('pspao_model');
		//$this->output->enable_profiler(TRUE); //display query statement
              
	}
    
        //Utiliti Keperluan Sumber//
        
         function sumber_manusia()
        {
             
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->ppun_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->ppun_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->ppun_model->get_premis();
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
                                  'rules'   => 'required'
                               ),array(
                                  'field'   => 'noKP',
                                  'label'   => 'No Kad Pengenalan',
                                  'rules'   => 'required'
                                 )
                    
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'keperluan_sumber/sumber_manusia';
                          $this->load->view('template/default_pelan', $data);
	
                }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }       
        }
        
        function tambah_sumber_manusia()
        {
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->ppun_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->ppun_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->ppun_model->get_premis();
                
                 $rules = array(
                            array(
                                  'field'   => 'nama',
                                  'label'   => 'Nama',
                                  'rules'   => 'required'
                               ),
                            
                            array(
                                  'field'   => 'noKP',
                                  'label'   => 'No Kad Pengenalan',
                                  'rules'   => 'required'
                                 ),
                            array(
                                  'field'   => 'jawatan',
                                  'label'   => 'Jawatan',
                                  'rules'   => 'required'
                               ),
                     array(
                                  'field'   => 'gred',
                                  'label'   => 'Gred Jawatan',
                                  'rules'   => 'required'
                               ),
                     array(
                                  'field'   => 'bidang',
                                  'label'   => 'Bidang',
                                  'rules'   => 'required'
                               ),
                     array(
                                  'field'   => 'gaji',
                                  'label'   => 'Gaji (RM)',
                                  'rules'   => 'required'
                               ),
                     array(
                                  'field'   => 'koslebihmasa',
                                  'label'   => 'Kos Kerja Lebih Masa (RM)',
                                  'rules'   => 'required'
                               )
                    
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                     $data['main_content'] = 'keperluan_sumber/tambah_sumber_manusia';
                     $this->load->view('template/default_pelan',$data); 
                }
                else
                {
                       $data['main_content'] = 'keperluan_sumber/sumber_manusia';
                        $this->load->view('template/default_pelan',$data); 
                      
                }  
        }
        
        function pengurusan_pejabat()
        {
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['negeri'] = $this->pnpa_model->get_negeri();
                $data['daerah'] = $this->pnpa_model->get_daerah();
                
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/ Agensi',
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
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                                 ),
                    
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
        
                    $data['main_content'] = 'keperluan_sumber/pengurusan_pejabat';
                     $this->load->view('template/default_pelan',$data); 
            
            }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }  
        }
        
        
        function tambah_pengurusan_pejabat()
        {
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['negeri'] = $this->pnpa_model->get_negeri();
                $data['daerah'] = $this->pnpa_model->get_daerah();
                 $data['alatpejabat'] = $this->pnpa_model->get_kat_peng_pej();
                
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
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
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                                 ),
                         array(
                                  'field'   => 'kos',
                                  'label'   => 'Kos',
                                  'rules'   => 'required'
                                 ),
                        array(
                                  'field'   => 'alatpejabat',
                                  'label'   => 'Pengurusan Pejabat',
                                  'rules'   => 'required'
                                 ),
                        array(
                                  'field'   => 'jenama',
                                  'label'   => 'Jenama',
                                  'rules'   => 'required'
                                 ),
                        array(
                                  'field'   => 'spesifikasi',
                                  'label'   => 'Spesifikasi',
                                  'rules'   => 'required'
                                 ),
                        array(
                                  'field'   => 'notag',
                                  'label'   => 'No Tag',
                                  'rules'   => 'required'
                                 )
                    
                    );

                    $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                     {
        
                            $data['main_content'] = 'keperluan_sumber/tambah_pengurusan_pejabat';
                            $this->load->view('template/default_pelan',$data); 
            
                    }
                else
                {
                        $data['main_content'] = 'keperluan_sumber/pengurusan_pejabat';
                        $this->load->view('template/default_pelan',$data);
                      
                }  
        }
        function peralatan_kerja()
        {
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['negeri'] = $this->pnpa_model->get_negeri();
                $data['daerah'] = $this->pnpa_model->get_daerah();
                 $data['alatkeje'] = $this->pnpa_model->get_kat_alat_keje();
                
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
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
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                                 ),
                    
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
        
                     $data['main_content'] = 'keperluan_sumber/peralatan_kerja';
                     $this->load->view('template/default_pelan',$data); 
            
                 }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }  
        }
        
        
        function tambah_peralatan_kerja()
        {
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['negeri'] = $this->pnpa_model->get_negeri();
                $data['daerah'] = $this->pnpa_model->get_daerah();
                $data['alatkeje'] = $this->pnpa_model->get_kat_alat_keje();
                
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
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
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                                 ),
                     
                            array(
                                  'field'   => 'kos',
                                  'label'   => 'Kos',
                                  'rules'   => 'required'
                                 ),
                           array(
                                  'field'   => 'alatkeje',
                                  'label'   => 'Peralatan Kerja',
                                  'rules'   => 'required'
                                 ),
                            array(
                                  'field'   => 'jenama',
                                  'label'   => 'Jenama',
                                  'rules'   => 'required'
                                 ),
                            array(
                                  'field'   => 'spesifikasi',
                                  'label'   => 'Spesifikasi',
                                  'rules'   => 'required'
                                 ),
                            array(
                                  'field'   => 'notag',
                                  'label'   => 'No Tag',
                                  'rules'   => 'required'
                                 )
                    
                        );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
        
                        $data['main_content'] = 'keperluan_sumber/tambah_peralatan_kerja';
                        $this->load->view('template/default_pelan',$data); 
            
                 }
                else
                {
                       $data['main_content'] = 'keperluan_sumber/peralatan_kerja';
                        $this->load->view('template/default_pelan',$data); 
                      
                }  
        }
        
        // end Keperluan Sumber
	 
        // start Penyelarsan Aktiviti
        
        function  senarai_penyelarasan_akt()
	{
            
                 $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['negeri'] = $this->pnpa_model->get_negeri();
                $data['daerah'] = $this->pnpa_model->get_daerah();
                
                
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
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
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                                 ),
                     
                      array(
                                  'field'   => 'katacarin',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                                 ),
                      );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                        {
        
                            $data['main_content'] = 'belanjawan/pspao_pelarasan_aktiviti/senarai_penyelarasan_akt';
                            $this->load->view('template/default_pelan', $data);
            
                        }
                     else
                        {
                            $data['main_content'] = 'belanjawan/pspao_pelarasan_aktiviti/senarai_penyelarasan_akt';
                            $this->load->view('template/default_pelan', $data);
                      
                        }  
		
		
                 }
        
        function penyelarasan_akt_penyedia_doc()
	{
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['negeri'] = $this->pnpa_model->get_negeri();
                $data['daerah'] = $this->pnpa_model->get_daerah();
                
                
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
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
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                                 ),
                     
                      array(
                                  'field'   => 'katacarin',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                                 ),
                      );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                        {
		
                            $data['main_content'] = 'belanjawan/pspao_pelarasan_aktiviti/penyelarasan_akt_penyedia_doc';
                         $this->load->view('template/default_pelan', $data);
                        }
                else
                        {
                        $data['main_content'] = 'belanjawan/pspao_pelarasan_aktiviti/senarai_penyelarasan_akt';
                        $this->load->view('template/default_pelan', $data);
                      
                        }  
		
		
        }
        
        
        function penyelarasan_akt_ptf()
	{
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['negeri'] = $this->pnpa_model->get_negeri();
                $data['daerah'] = $this->pnpa_model->get_daerah();
                
                
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
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
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                                 ),
                     
                            array(
                                  'field'   => 'katacarin',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                                 ),
                      );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                    {
		
                            $data['main_content'] = 'belanjawan/pspao_pelarasan_aktiviti/penyelarasan_akt_ptf';
                            $this->load->view('template/default_pelan', $data);
                    }
                    else
                    {
                        $data['main_content'] = 'belanjawan/pspao_pelarasan_aktiviti/senarai_penyelarasan_akt';
                        $this->load->view('template/default_pelan', $data);
                      
                        }  
		
		
             }
        
        
        function penyelarasan_akt_pp()
	{
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['negeri'] = $this->pnpa_model->get_negeri();
                $data['daerah'] = $this->pnpa_model->get_daerah();
                
                
                
                 $rules = array(
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan',
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
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                                 ),
                     
                            array(
                                  'field'   => 'katacarin',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                                 ),
                      );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                        {
		
                          $data['main_content'] = 'belanjawan/pspao_pelarasan_aktiviti/penyelarasan_akt_pp';
                         $this->load->view('template/default_pelan', $data);
                         }
                else
                        {
                        $data['main_content'] = 'belanjawan/pspao_pelarasan_aktiviti/senarai_penyelarasan_akt';
                        $this->load->view('template/default_pelan', $data);
                      
                        }  
		
		
        }
        
        //end Penyelarasan Akti


	//** Start PNPA **//

	   function senarai_pp_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai pengawal
		//$data['main_content'] = 'pnpa/senarai_pp_pnpa';
                //$this->load->view('template/default_pelan', $data);
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['status'] = $this->pnpa_model->get_status(); //dapatkan senarai premis dr db
                
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
                                  'label'   => 'noDPA',
                                  'rules'   => 'required'
                               ),
                        array(
                                  'field'   => 'status',
                                 'label'   => 'status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'katacarian',
                                  'rules'   => 'required'
                               ),
                            
                            
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {
                          $data['main_content'] = 'pnpa/senarai_pp_pnpa';
                          $this->load->view('template/default_pelan', $data);
	
                }
                else
                {
                 
	
		$data['main_content'] = 'pnpa/senarai_pp_pnpa';
                $this->load->view('template/default_pelan', $data);
                }
        }
        
        function senarai_ptf_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai teknikal fasiliti
            
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis();
                $data['status'] = $this->pnpa_model->get_status(); //dapatkan senarai premis dr db
                
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
                                  'label'   => 'noDPA',
                                  'rules'   => 'required'
                               ),
                             array(
                                  'field'   => 'status',
                                 'label'   => 'status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
                                  'label'   => 'katacarian',
                                  'rules'   => 'required'
                               ),
                            
                            
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                     {
                          $data['main_content'] = 'pnpa/senarai_ptf_pnpa';
                          $this->load->view('template/default_pelan', $data);
	
                        }
                else
                        {
                            $data['main_content'] = 'pnpa/senarai_ptf_pnpa';
                            $this->load->view('template/default_pelan', $data);
                    }
        }

	function kandungan_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page penyediaan kandungan pnpa
		//$data['main_content'] = 'pnpa/kandungan_pnpa';
                //$this->load->view('template/default_pelan', $data);
            
            
                //$this->output->enable_profiler(TRUE); //display query statement
            
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis(); //dapatkan senarai premis dr db
                
                
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
                          $data['main_content'] = 'pnpa/kandungan_pnpa';
                          $this->load->view('template/default_pelan', $data);
	
                        }
                else
                         {
                      $data['main_content'] = 'pnpa/model_struktur_pnpa';
                     $this->load->view('template/default_pelan', $data);
                      
                        }
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
	
	
	
	
	
	
}
