<?php

class Ptra extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $this->load->library(array('table','validation'));
		
		//$this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
        $this->load->helper('function_helper');
    
    $this->load->model('ptra_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
    $this->load->library('pagination');
        $this->load->library('table');
        $this->load->helper('download');
        
    $this->output->enable_profiler(TRUE); //display query statement
              
	if(!$this->aauth->is_loggedin()){
      echo '<script>';
      echo 'alert("Belum Login");';
     echo 'window.location = "'.site_url('auth').'"';
     echo '</script>';
    }
    
    
  }
		 
    
  //** Start PTRA **//
  function arahan_penyediaan_ptra()
	{
        //Name : Fatin
        //Date : 24/7/13
        //Desc : arahan penyediaan ptra
        
    $node_id = '122';
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
		    
        if($getMyspatauser = $this->ptra_model->get_myspatauser())
              {
                   $data['senarai_ppd'] = $getMyspatauser;
              }
              
                   $this->load->view('template/default', $data);
        
              }

     function senarai_pp_ptra()
     {
	//Name : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai pengawal

    $node_id = '98';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_pp_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
    if($getPtra = $this->ptra_model->get_ptra())
    {
       $data['senarai_ptra'] = $getPtra;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
        function senarai_ptf_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai teknikal fasiliti

    $node_id = '99';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_ptf_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
		

        if($getPtra = $this->ptra_model->get_ptra())
    {
       $data['senarai_ptra'] = $getPtra;
    }
              
            $this->load->view('template/default', $data);
        
  }

	function senarai_ppd_ptra()
	{
		    //Name : Fatin
        //Date : 3/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '100';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_ppd_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
    

    if($getPtra = $this->ptra_model->get_ptra())
    {
       $data['senarai_ptra'] = $getPtra;
    }
              
            $this->load->view('template/default', $data);
        
  }

  function search() {
    
    $query_array = array(
      'tahun' => $this->input->post('thn'),
      'idjab_agensi' => $this->input->post('jab_ag'),
      'nama_premis' => $this->input->post('prem'),
      'nodpa' => $this->input->post('dpa'),
    );
    
    $query_id = $this->input->save_query($query_array);
    
    redirect("ptra/senarai_ppd_ptra/$query_id");
    
  }

function status_premis_ptra()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['main_content'] = 'ptra/status_premis_ptra';
        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '102';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim(); //dapatkan senarai mukim dr db
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

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        //$data['main_content'] = 'ptra/kandungan_ptra';
                        //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/kandungan_ptra'));
                      
                }
  }

  function kat_jalan_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset jalan

    $node_id = '103';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_jalan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
    
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

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        //$data['main_content'] = 'ptra/kandungan_ptra';
                        //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/kandungan_ptra'));
                      
                }
  }

  function kat_pembetungan_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset pembetungan

    $node_id = '104';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_pembetungan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
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

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        //$data['main_content'] = 'ptra/kandungan_ptra';
                        //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/kandungan_ptra'));
                      
                }
  }

  function kat_saliran_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset saliran

    $node_id = '105';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_saliran_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
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

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        //$data['main_content'] = 'ptra/kandungan_ptra';
                        //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/kandungan_ptra'));
                      
                }
  }

        
        function kandungan_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : penyediaan kandungan ptra

        //$this->output->enable_profiler(TRUE); //display query statement

            $node_id = '106';
            $menu_name = 'menu1';
            $menu_link = 'ptra/kandungan_ptra';
                        
            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

            
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

                          $this->load->view('template/default', $data);
	
                }
                else
                {
                        //$data['main_content'] = 'ptra/model_struktur_ptra';
                		    //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/tambahpanel_penilai'));
                      
                }
	}
        
        function model_struktur_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '107';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getPanelpenilai = $this->ptra_model->get_panelpenilai())
    {
       $data['senarai_panel'] = $getPanelpenilai;
    }
              
            $this->load->view('template/default', $data);
        
  }

    function tambahpanel_penilai()
        {
        if($_POST)
        {
           
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/model_struktur_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                $ptra_pata_f6_1a_panel_penilai_id = $this->uri->segment(3); 
                
                
                
                if($getPanelpenilai = $this->ptra_model->get_panelpenilai())
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                
                }
                
                $this->form_validation->set_rules('panel_penilai_kategori_id','Kategori Panel Penilai','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_penilai1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_syarikat1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_pej','No. Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');
                //$this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                $data['ptra_pata_f6_1a_panel_penilai_id'] = $this->session->userdata('ptra_pata_f6_1a_panel_penilai_id');
                $addPanel = $this->ptra_model->tambahpanel_penilai($ptra_pata_f6_1a_panel_penilai_id);
                
                $ptra_pata_f6_1a_panel_penilai_id = $this->input->post('ptra_pata_f6_1a_panel_penilai_id');                
                $this->session->set_userdata(array('ptra_pata_f6_1a_panel_penilai_id' => $ptra_pata_f6_1a_panel_penilai_id));

                if($addPanel)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Alat Pengurusan Pejabat Berjaya Didaftarkan</font><br>');
                    redirect('ptra/tambahpanel_penilai');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan.</font><br></strong><br>');
                    redirect('ptra/tambahpanel_penilai');
                }                
            }      
            else
            {
               $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/model_struktur_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                 if($getPanelpenilai = $this->ptra_model->get_panelpenilai())
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                
                }
 
                if($getPanelpenilai = $this->ptra_model->get_nama_panelpenilai())
                {
                   $data['senarai_panel1'] = $getPanelpenilai;
                }

                $this->load->view('template/default', $data);
            } 
        }
        else
        {
            
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/model_struktur_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getPanelpenilai = $this->ptra_model->get_panelpenilai())
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                
                }
                
            if($getPanelpenilai = $this->ptra_model->get_nama_panelpenilai())
                {
                   $data['senarai_panel1'] = $getPanelpenilai;
                }

                $this->load->view('template/default', $data);
    
        }
    }

    function kemaskinipanel_penilai()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinipanel_penilai';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $ptra_pata_f6_1a_panel_penilai_id = $this->uri->segment(3);

                if($getPanelpenilai = $this->ptra_model->get_panelpenilai_1($ptra_pata_f6_1a_panel_penilai_id))
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                   // print_r($getPanelpenilai);
                   // die();

                }
                else
                    echo 'gagal';
                //die();

                if($get_nama_panelpenilai = $this->ptra_model->get_nama_panelpenilai())
                {
                    $data['list_namapanel'] = $get_nama_panelpenilai;
                }

                $this->form_validation->set_rules('panel_penilai_kategori_id','Kategori Panel Penilai','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_penilai1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_syarikat1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_pej','No. Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');
                //$this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('panel_penilai_kategori_id' => $this->input->post('panel_penilai_kategori_id'),
                                        'nama_penilai' => $this->input->post('nama_penilai1'),
                                        'nama_syarikat' => $this->input->post('nama_syarikat1'),
                                        'email' => $this->input->post('emel'),
                                        'no_tel_pej' => $this->input->post('notel_pej'),
                                        'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                                        'jawatan' => $this->input->post('jawatan1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_Panel = $this->ptra_model->update_panel($ptra_pata_f6_1a_panel_penilai_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_Panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('ptra/tambahpanel_penilai');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinipanel_penilai/'.$ptra_pata_f6_1a_panel_penilai_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }





        
        function treeview_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c

    $node_id = '108';
    $menu_name = 'menu1';
    $menu_link = 'ptra/treeview_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '109';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti2_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c

    $node_id = '110';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
        $this->load->view('template/default', $data);
	}
        
  function kawalan_rekod_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d

    $node_id = '111';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kawalan_rekod_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getKawalanrekod = $this->ptra_model->get_kawalanrekod())
    {
       $data['senarai_kawalan'] = $getKawalanrekod;
    }
              
            $this->load->view('template/default', $data);
        
  }


function tambahkawalan()
        {
        if($_POST)
        {
           
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kawalan_rekod_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                $urus_pej_id = $this->uri->segment(3); 
                
                
                if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej_1($urus_pej_id))
                {
                    $data['urusanpejabat'] = $getUrusPej;

                }
                
               
             //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('jenama','Jenama','trim|required|xss_clean');
                $this->form_validation->set_rules('spesifikasi','Spesifikasi','trim|required|xss_clean');
                $this->form_validation->set_rules('alat_pej_tag_no','alat_pej_tag_no','trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data['urus_pej_id'] = $this->session->userdata('urus_pej_id');
                $addPejabat = $this->utilitikeperluansumber_model->tambahpejabat($urus_pej_id);
                
                $urus_pej_id = $this->input->post('urus_pej_id');                
                $this->session->set_userdata(array('urus_pej_id' => $urus_pej_id));

                if($addPejabat)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Tabung Bantuan Berjaya Didaftarkan</font><br>');
                    redirect('index.php/utilitiKeperluanSumber/tambahpejabat');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan.</font><br></strong><br>');
                    redirect('index.php/utilitiKeperluanSumber/tambahpejabat');
                }                
            }      
            else
            {
               /* $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/pengurusan_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                                
                 
                if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej())
                {
                   $data['uruspejabat'] = $getUrusPej;
                }

                $this->load->view('template/default', $data);
           */ } 
        }
        else
        {
            
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/pengurusan_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
                        
           /* if($getInfoTabung = $this->User_model->get_infotabung($this->session->userdata('rnNo')))
            {
                $data['infotabung'] = $getInfoTabung;
                
                foreach ($getInfoTabung as $rec)
                {
                    $data['codetabung'] = $getInfoTabung;
                    $data['code_tabung'] = $rec->codeTabung;
                }
            }
*/
            if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej())
                {
                   $data['uruspejabat'] = $getUrusPej;
                }

                $this->load->view('template/default', $data);
    
        }
    }

        
  function dokumen_rujukan_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e

    $node_id = '112';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan())
    {
       $data['senarai_dokumen'] = $getDokumenrujukan;
    }
              
            $this->load->view('template/default', $data);
        
  }

  function tambahdokumen()
        {
        if($_POST)
        {
           
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/dokumen_rujukan_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                $urus_pej_id = $this->uri->segment(3); 
                
                
                
                if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej_1($urus_pej_id))
                {
                    $data['urusanpejabat'] = $getUrusPej;

                }
                
               
                
             //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('jenama','Jenama','trim|required|xss_clean');
                $this->form_validation->set_rules('spesifikasi','Spesifikasi','trim|required|xss_clean');
                $this->form_validation->set_rules('alat_pej_tag_no','alat_pej_tag_no','trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data['urus_pej_id'] = $this->session->userdata('urus_pej_id');
                $addPejabat = $this->utilitikeperluansumber_model->tambahpejabat($urus_pej_id);
                
                $urus_pej_id = $this->input->post('urus_pej_id');                
                $this->session->set_userdata(array('urus_pej_id' => $urus_pej_id));

                if($addPejabat)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Tabung Bantuan Berjaya Didaftarkan</font><br>');
                    redirect('index.php/utilitiKeperluanSumber/tambahpejabat');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan.</font><br></strong><br>');
                    redirect('index.php/utilitiKeperluanSumber/tambahpejabat');
                }                
            }      
            else
            {
               /* $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/pengurusan_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                                
                 
                if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej())
                {
                   $data['uruspejabat'] = $getUrusPej;
                }

                $this->load->view('template/default', $data);
           */ } 
        }
        else
        {
            
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/pengurusan_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
                        
           /* if($getInfoTabung = $this->User_model->get_infotabung($this->session->userdata('rnNo')))
            {
                $data['infotabung'] = $getInfoTabung;
                
                foreach ($getInfoTabung as $rec)
                {
                    $data['codetabung'] = $getInfoTabung;
                    $data['code_tabung'] = $rec->codeTabung;
                }
            }
*/
            if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej())
                {
                   $data['uruspejabat'] = $getUrusPej;
                }

                $this->load->view('template/default', $data);
    
        }
    }


        
        function summary_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : summary penyediaan ptra baru

    $node_id = '113';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list
        $this->load->view('template/default', $data);
	}
        
        function summary_pp_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai pengawal

    $node_id = '114';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_pp_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
	}
        
        function summary_ptf_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

    $node_id = '115';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptf_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
	}
	//** END PTRA **//



  //******* Start PTRA EDIT PP *******//

  function status_premis_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra_editpp()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '102';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kump_agensi'] = $this->ptra_model->get_kump_agensi(); //dapatkan senarai kementerian dr db
        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim(); //dapatkan senarai mukim dr db
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

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/summarry_ptf_ptra_editpp';
                        $this->load->view('template/default', $data);
                      
                }
  }

  function download()

  {
  $data = file_get_contents("/xampp/xamppfiles/htdocs/myspata/application/views/ptra/suratLantikan.pdf"); // Read the file's contents
  $name = 'suratLantikan.pdf';

  force_download($name, $data);
  }
        
  
  function model_struktur_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '142';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getSumberman_dalaman = $this->ptra_model->get_sumberman_dalaman())
    {
       $data['sumber_dalaman'] = $getSumberman_dalaman;
    }
              
            $this->load->view('template/default', $data);
        
  }
  
  function model_struktur_ptra_editpp2()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '142';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra_editpp2';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getSumberman_luaran = $this->ptra_model->get_sumberman_luaran())
    {
       $data['sumber_luaran'] = $getSumberman_luaran;
    }
              
            $this->load->view('template/default', $data);
        
  }

        
        function treeview_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c

    $node_id = '143';
    $menu_name = 'menu1';
    $menu_link = 'ptra/treeview_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '145';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c

    $node_id = '150';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
        $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d

    $node_id = '151';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kawalan_rekod_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getKawalanrekod = $this->ptra_model->get_kawalanrekod())
    {
       $data['senarai_kawalan'] = $getKawalanrekod;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
  function dokumen_rujukan_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e

    $node_id = '152';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan())
    {
       $data['senarai_dokumen'] = $getDokumenrujukan;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
  function summary_pp_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

    $node_id = '155';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_pp_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
  }
  //******* END PTRA EDIT PP *******//



//******* Start PTRA EDIT PTF *******//

  function status_premis_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra_editptf()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '102';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim(); //dapatkan senarai mukim dr db
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

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/summarry_ptf_ptra_editptf';
                        $this->load->view('template/default', $data);
                      
                }
  }
        
  function model_struktur_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '142';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getSumberman_dalaman = $this->ptra_model->get_sumberman_dalaman())
    {
       $data['sumber_dalaman'] = $getSumberman_dalaman;
    }
              
            $this->load->view('template/default', $data);
        
  }
  
  function model_struktur_ptra_editptf2()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '142';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra_editptf2';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getSumberman_dalaman = $this->ptra_model->get_sumberman_dalaman())
    {
       $data['sumber_dalaman'] = $getSumberman_dalaman;
    }
              
            $this->load->view('template/default', $data);
        
  }


  function kemaskinipanel_penilai_ptf()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinipanel_penilai';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $ptra_pata_f6_1a_panel_penilai_id = $this->uri->segment(3);

                if($getPanelpenilai = $this->ptra_model->get_panelpenilai_1($ptra_pata_f6_1a_panel_penilai_id))
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                   // print_r($getPanelpenilai);
                   // die();

                }
                else
                    echo 'gagal';
                //die();

                if($get_nama_panelpenilai = $this->ptra_model->get_nama_panelpenilai())
                {
                    $data['list_namapanel'] = $get_nama_panelpenilai;
                }

                $this->form_validation->set_rules('panel_penilai_kategori_id','Kategori Panel Penilai','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_penilai1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_syarikat1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_pej','No. Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');
                //$this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('panel_penilai_kategori_id' => $this->input->post('panel_penilai_kategori_id'),
                                        'nama_penilai' => $this->input->post('nama_penilai1'),
                                        'nama_syarikat' => $this->input->post('nama_syarikat1'),
                                        'email' => $this->input->post('emel'),
                                        'no_tel_pej' => $this->input->post('notel_pej'),
                                        'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                                        'jawatan' => $this->input->post('jawatan1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_Panel = $this->ptra_model->update_panel($ptra_pata_f6_1a_panel_penilai_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_Panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('ptra/model_struktur_ptra_editptf');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinipanel_penilai/'.$ptra_pata_f6_1a_panel_penilai_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
        
        function treeview_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c

    $node_id = '143';
    $menu_name = 'menu1';
    $menu_link = 'ptra/treeview_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '145';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c

    $node_id = '150';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
        $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d

    $node_id = '151';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kawalan_rekod_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getKawalanrekod = $this->ptra_model->get_kawalanrekod())
    {
       $data['senarai_kawalan'] = $getKawalanrekod;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
  function dokumen_rujukan_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e

    $node_id = '152';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan())
    {
       $data['senarai_dokumen'] = $getDokumenrujukan;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
        function summary_ptf_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

    $node_id = '155';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptf_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
  }
  //******* END PTRA EDIT PTF *******//




  //******* Start PTRA EDIT PPD *******//

  function status_premis_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra_editppd()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '102';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim(); //dapatkan senarai mukim dr db
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

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra_editppd';
                        $this->load->view('template/default', $data);
                      
                }
  }
        
        function model_struktur_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '142';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


     if($getPanelpenilai = $this->ptra_model->get_panelpenilai())
    {
       $data['senarai_panel'] = $getPanelpenilai;
    }
              
            $this->load->view('template/default', $data);
        
  }

  function kemaskinipanel_penilai_ppd()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinipanel_penilai';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $ptra_pata_f6_1a_panel_penilai_id = $this->uri->segment(3);

                if($getPanelpenilai = $this->ptra_model->get_panelpenilai_1($ptra_pata_f6_1a_panel_penilai_id))
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                   // print_r($getPanelpenilai);
                   // die();

                }
                else
                    echo 'gagal';
                //die();

                if($get_nama_panelpenilai = $this->ptra_model->get_nama_panelpenilai())
                {
                    $data['list_namapanel'] = $get_nama_panelpenilai;
                }

                $this->form_validation->set_rules('panel_penilai_kategori_id','Kategori Panel Penilai','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_penilai1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_syarikat1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_pej','No. Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');
                //$this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('panel_penilai_kategori_id' => $this->input->post('panel_penilai_kategori_id'),
                                        'nama_penilai' => $this->input->post('nama_penilai1'),
                                        'nama_syarikat' => $this->input->post('nama_syarikat1'),
                                        'email' => $this->input->post('emel'),
                                        'no_tel_pej' => $this->input->post('notel_pej'),
                                        'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                                        'jawatan' => $this->input->post('jawatan1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_Panel = $this->ptra_model->update_panel($ptra_pata_f6_1a_panel_penilai_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_Panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('ptra/model_struktur_ptra_editppd');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinipanel_penilai/'.$ptra_pata_f6_1a_panel_penilai_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }

        
        function treeview_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c

    $node_id = '143';
    $menu_name = 'menu1';
    $menu_link = 'ptra/treeview_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }

        
        function skop_aktiviti_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '145';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c

    $node_id = '150';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
        $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d

    $node_id = '151';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kawalan_rekod_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        if($getKawalanrekod = $this->ptra_model->get_kawalanrekod())
    {
       $data['senarai_kawalan'] = $getKawalanrekod;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
        function dokumen_rujukan_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e

    $node_id = '152';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan())
    {
       $data['senarai_dokumen'] = $getDokumenrujukan;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
        function summary_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : summary penyediaan ptra baru

    $node_id = '153';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list
        $this->load->view('template/default', $data);
  }
        
        function summary_ptf_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

    $node_id = '155';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptf_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
  }
  //******* END PTRA EDIT PPD *******//

}