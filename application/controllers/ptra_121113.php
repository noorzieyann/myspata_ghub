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
    $this->load->helper('download');
    
    $this->load->model('utilitikeperluansumber_model');
    $this->load->model('ptra_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
    
    $this->load->library('pagination');
    $this->load->library('table');
        
  // $this->output->enable_profiler(TRUE); //display query statement
              
	if(!$this->aauth->is_loggedin()){
      echo '<script>';
      echo 'alert("Belum Login");';
     echo 'window.location = "'.site_url('auth').'"';
     echo '</script>';
    }
    
    
  }
  
  function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('upload_success', $data);
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
                                  'field'   => 'jabatan',
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

        //not use
        function kandungan_ptra()
        {	
        if($_POST)
            {
                $node_id = '18';
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
                //$session_id = $this->session->userdata('user_id'); 
                $ptra_id = $this->uri->segment(3); 
                
                
                if($getSumberManusia = $this->ptra_model->get_kat_premis())
                {
                    $data['katpremis'] = $getSumberManusia;
                
                }
               
               
                $this->form_validation->set_rules('tahun','Tahun','trim|required|xss_clean');
               // $this->form_validation->set_rules('jabatan','Jabatan','trim|required|xss_clean');
                $this->form_validation->set_rules('premis','Premis','trim|required|xss_clean');
                $this->form_validation->set_rules('namapremis','Nama Premis','trim|required|xss_clean');
                $this->form_validation->set_rules('nodpa','NO DPA','trim|required|xss_clean');
                $this->form_validation->set_rules('pendahuluan','Pendahuluan','trim|required|xss_clean');
                $this->form_validation->set_rules('objektif','Objektif','trim|required|xss_clean');
                $this->form_validation->set_rules('carta','Carta','trim|required|xss_clean');
                $this->form_validation->set_rules('skop','Skop','trim|required|xss_clean');
                $this->form_validation->set_rules('sumber','Sumber','trim|required|xss_clean');
                $this->form_validation->set_rules('kawalan','Kawalan','trim|required|xss_clean');
                $this->form_validation->set_rules('rujukan','Rujukan','trim|required|xss_clean');
              
              
                if($this->form_validation->run())
                {
                    $data['ptra_id'] = $this->session->userdata('ptra_id');
                    //$addptra = $this->ptra_model->tambahptra($ptra_id);

                    if($this->input->post('sunting')!= NULL)
                        {
                            $ptra_id = $this->ptra_model->updateptra($this->input->post('sunting'));
                        }
                    else
                        {
                           $ptra_id = $this->ptra_model->tambahptra();  
                        }
               
                    $this->session->set_userdata(array('sunting' => $ptra_id));

                    if($ptra_id)
                    {

                        //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('ptra/model_struktur_ptra/'.$ptra_id,'refresh');
                    }
                    else
                    {
                        //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                        redirect('ptra/kandungan_ptra');
                    }                
                }      
            else
            {
               $node_id = '18';
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
                 if($getSumberManusia = $this->ptra_model->get_kat_premis())
                {
                    $data['katpremis'] = $getSumberManusia;
                
                }
                 
                 
                $this->load->view('template/default', $data);
            } 
            }
            else
            {
                $node_id = '18';
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
                //$session_id = $this->session->userdata('user_id'); 
               if($getSumberManusia = $this->ptra_model->get_kat_premis())
                {
                    $data['katpremis'] = $getSumberManusia;
                
                }
                
                
                
                $this->load->view('template/default', $data);
            }
               
	}
        
        
        function kandungan_ptra2()
        {
			$node_id = '13';
			$menu_name = 'menu1';
			$menu_link = 'ptra/kandungan_ptra';
			
			$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
			$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
			$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
			$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
			if($getSumberManusia = $this->ptra_model->get_kat_premis())
                        {
                            $data['katpremis'] = $getSumberManusia;

                        }
                        
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			
			$this->form_validation->set_rules('tahun','Tahun','trim|required|xss_clean');
                        // $this->form_validation->set_rules('jabatan','Jabatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('premis','Premis','trim|required|xss_clean');
                        $this->form_validation->set_rules('namapremis','Nama Premis','trim|required|xss_clean');
                        $this->form_validation->set_rules('nodpa','NO DPA','trim|required|xss_clean');
                        $this->form_validation->set_rules('pendahuluan','Pendahuluan','trim|required|xss_clean');
                        $this->form_validation->set_rules('objektif','Objektif','trim|required|xss_clean');
                        $this->form_validation->set_rules('carta','Carta','trim|required|xss_clean');
                        $this->form_validation->set_rules('skop','Skop','trim|required|xss_clean');
                        $this->form_validation->set_rules('sumber','Sumber','trim|required|xss_clean');
                        $this->form_validation->set_rules('kawalan','Kawalan','trim|required|xss_clean');
                        $this->form_validation->set_rules('rujukan','Rujukan','trim|required|xss_clean');
			
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/default',$data);
			}else{
				//echo "<script>alert('Berjaya!')< /script>";
				
				if($this->input->post('sunting') != NULL){
					//echo "<script>alert('Update Saja!')< /script>";
					$idptra = $this->ptra_model->update_ptra($this->input->post('sunting'));
				}else{
					//echo "<script>alert('Insert!')< /script>";
					$idptra = $this->ptra_model->insert_ptra();
				}
				//print_r($this->pspao_akhir_model->insert_pspao_akhir());
				
				//$this->load->view('template/default',$data);
				redirect('ptra/tambahpanel_penilai/'.$idptra,'refresh');
			}
            //$this->load->view('template/default',$data);            
        }
        
        function model_struktur_ptra()
	
	//Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra
          {
          if ($_POST)
          {
            $node_id = '58';
            $menu_name = 'menu1';
            $menu_link = 'ptra/model_struktur_ptra';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
            $$ptra_pata_f6_1a_panel_penilai_id = $this->uri->segment(3);
            $no= $this->input->post('no');
            
            if($getPanelpenilai = $this->ptra_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->ptra_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->ptra_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->ptra_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->ptra_model->get_pof())
            {
               $data['senarai_pof'] = $getPof;
            }
            if($getperanan = $this->utilitikeperluansumber_model->get_peranan_1())
            {
                $data['peranan'] = $getperanan;
            }
            if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
            {
                $data['disiplin'] = $getbidang;
            }
            if($getbidang = $this->utilitikeperluansumber_model->get_syarikat_1())
            {
               $data['syarikat'] = $getbidang;
            }
            
             $this->form_validation->set_rules('ptf[]', 'PTF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pif[]', 'PIF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pdf[]', 'PDF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');
         
            $this->form_validation->set_rules('panel_penilai[]', 'Panel Penilai', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('pegawaikaitan', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
            $this->form_validation->set_rules('tjawabdankuasa', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pegawailain', 'Tugas Pegawai-Pegawai Lain Yang Ada Kaitan', 'trim|required|xss_clean');


            
            if($this->form_validation->run())
            {
                $data['ptra_id'] = $this->session->userdata('ptra_id');
                
                $data['ptra_pata_f6_1a_modelstruktur_id'] = $this->session->userdata('ptra_pata_f6_1a_modelstruktur_id');
                $addSumberMan = $this->ptra_model->tambahmodelptra($ptra_pata_f6_1a_modelstruktur_id);
                
                $ptra_pata_f6_1a_modelstruktur_id = $this->input->post('ptra_pata_f6_1a_modelstruktur_id');                
                $this->session->set_userdata(array('ptra_pata_f6_1a_modelstruktur_id' => $ptra_pata_f6_1a_modelstruktur_id));

                if($addSumberMan)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                    redirect('ptra/skop_aktiviti_ptra/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                    redirect('ptra/model_struktur_ptra/'.$no,'refresh');
                }                
            } 
         else {
             
          

            $node_id = '58';
            $menu_name = 'menu1';
           // $menu_link = 'ptra/model_struktur_ptra';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
             $ptra_pata_f6_1a_modelstruktur_id = $this->uri->segment(3);

            if($getPanelpenilai = $this->ptra_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }
            

            if($getPtf = $this->ptra_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->ptra_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->ptra_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->ptra_model->get_pof())
            {
               $data['senarai_pof'] = $getPof;
            }
            if($getperanan = $this->utilitikeperluansumber_model->get_peranan_1())
            {
                $data['peranan'] = $getperanan;
            }
            if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
            {
                $data['disiplin'] = $getbidang;
            }
            if($getbidang = $this->utilitikeperluansumber_model->get_syarikat_1())
            {
               $data['syarikat'] = $getbidang;
            }

        
                   $this->load->view('template/default', $data);
         }
         
          
          }
          else 
          {

            $node_id = '58';
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

            if($getPtf = $this->ptra_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->ptra_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->ptra_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->ptra_model->get_pof())
            {
               $data['senarai_pof'] = $getPof;
            }
            if($getperanan = $this->utilitikeperluansumber_model->get_peranan_1())
            {
                $data['peranan'] = $getperanan;
            }
            if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())//
            {
                $data['disiplin'] = $getbidang;
            }
            if($getbidang = $this->utilitikeperluansumber_model->get_syarikat_1())//
            {
               $data['syarikat'] = $getbidang;
            }

           
                    $this->load->view('template/default', $data);
          }
      } 
  

    function tambahpanel()
        {
           if($_POST)
             {
               $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'ptra/model_struktur_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

              $no= $this->input->post('no');
              //print_r($no);
              //die();
                
                 //$syarikat_id = $this->uri->segment(3);
                 $utiliti_sumber_man_id = $this->uri->segment(3); 
                
                //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('syarikat_id','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                //$this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa','Kos Lebih Masa','trim|required|xss_clean');

               
                
            if($this->form_validation->run())
            {
                $data['utiliti_sumber_man_id'] = $this->session->userdata('utiliti_sumber_man_id');
                $addSumberMan = $this->utilitikeperluansumber_model->tambahsumberpanel($utiliti_sumber_man_id);
                
                $utiliti_sumber_man_id = $this->input->post('utiliti_sumber_man_id');                
                $this->session->set_userdata(array('utiliti_sumber_man_id' => $utiliti_sumber_man_id));

                if($addSumberMan)
                {
                    //$ptra_id = $this->uri->segment(3);
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Teknikal Berjaya Didaftarkan</font><br>');
                    redirect('ptra/model_struktur_ptra/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan panel penilai.</font><br></strong><br>');
                    redirect('ptra/kandungan_ptra');
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
                 
                 if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia())
                {
                    $data['sumbermanusia'] = $getSumberManusia;
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

                //$syarikat_id = $this->uri->segment(3);
                if($getSyarikat = $this->utilitikeperluansumber_model->get_syarikat($syarikat_id))
                {
                    $data['syarikat'] = $getSyarikat;
                }
                 if($getSyarikat = $this->utilitikeperluansumber_model->get_syarikat($syarikat_id))
                {
                    $data['syarikat2'] = $getSyarikat;
                }
               
                if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia_luaran($syarikat_id))
                {
                    $data['sumbermanusialuaran'] = $getSumberManusia;
                }
                if($getperanan = $this->utilitikeperluansumber_model->get_peranan_1())
                {
                   $data['peranan'] = $getperanan;
                }
                if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
                {
                   $data['disiplin'] = $getbidang;
                }
                 if($getbidang = $this->utilitikeperluansumber_model->get_syarikat_1())
                {
                   $data['syarikat'] = $getbidang;
                }
                
               
                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
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
             
                $utiliti_sumber_man_id = $this->uri->segment(3);

                if($getPanelpenilai = $this->ptra_model->get_panelpenilai_1($utiliti_sumber_man_id))
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                   // print_r($getPanelpenilai);
                   // die();

                }
                
                if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
                {
                   $data['disiplin'] = $getbidang;
                }
                
                if($getbidang = $this->utilitikeperluansumber_model->get_syarikat_1())
                {
                   $data['syarikat'] = $getbidang;
                }


                //$syarikat_id = $this->uri->segment(3);
                 $utiliti_sumber_man_id = $this->uri->segment(3); 
                
                //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('nama1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('syarikat_id1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                //$this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin_bidang_id1','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji1','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa1','Kos Lebih Masa','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),
                                        'nama' => $this->input->post('nama1'),
                                        'syarikat_id' => $this->input->post('syarikat_id1'),
                                        'nric' => $this->input->post('noic'),
                                        'jawatan' => $this->input->post('jawatan1'),
                                        'disiplin_bidang_id' => $this->input->post('disiplin_bidang_id1'),
                                        'gaji' => $this->input->post('gaji1'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_disiplin = $this->utilitikeperluansumber_model->update_disiplin($utiliti_sumber_man_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_disiplin)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Panel Penilai Teknikal Berjaya Dikemaskini</font><br>');
                        redirect('ptra/model_struktur_ptra');
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
            
            
        function kemaskinipanel_penilai_editppd()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinipanel_penilai_editppd';
                
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
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Panel Penilai Teknikal Berjaya Dikemaskini</font><br>');
                        redirect('ptra/model_struktur_ptra_editppd');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinipanel_penilai_editppd/'.$ptra_pata_f6_1a_panel_penilai_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }

    //edited : diana 11/11/13    
   /* function treeview_ptra ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
				
            if ($_POST){
            
                $node_id = '59';
                $menu_name = 'menu1';
                $menu_link = 'ptra/treeview_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$skop_aktvt_id = $this->uri->segment(3);
                $ptra_pata_f6_1b_skop_pilihan_id = $this->uri->segment(3);
                $no= $this->input->post('no');
                
                 $data['senarai_skop'] = $this->ptra_model->get_skop();
           
                 $this->form_validation->set_rules('skop[]', 'Skop', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('aktiviti[]', 'Aktiviti', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('butiran[]', 'Butiran Aktiviti', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                if($this->form_validation->run())
                    {
                        $data['ptra_id'] = $this->session->userdata('ptra_id');

                        $data['ptra_pata_f6_1b_skop_pilihan_id'] = $this->session->userdata('ptra_pata_f6_1b_skop_pilihan_id');
                        $addTreeview = $this->ptra_model->tambahtreeviewptra($ptra_pata_f6_1b_skop_pilihan_id);

                        $ptra_pata_f6_1b_skop_pilihan_id = $this->input->post('ptra_pata_f6_1b_skop_pilihan_id');                
                        $this->session->set_userdata(array('ptra_pata_f6_1b_skop_pilihan_id' => $ptra_pata_f6_1b_skop_pilihan_id));

                        if($addTreeview)
                        {
                           // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('ptra/skop_aktiviti_ptra/'.$no,'refresh');
                        }
                        else
                        {
                            $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                            redirect('ptra/treeview_ptra/'.$no,'refresh');
                        }                
                    } 
                 else 
                   {

                        $node_id = '58';
                        $menu_name = 'menu1';
                       // $menu_link = 'ptra/model_struktur_ptra';

                        $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                        $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                        $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                        $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                        $ptra_pata_f6_1a_modelstruktur_id = $this->uri->segment(3);
                        $no= $this->input->post('no'); 

                        $this->load->view('template/default', $data);
                     }
                     
                 }
             
            else
            {
              $node_id = '59';
                $menu_name = 'menu1';
                $menu_link = 'ptra/treeview_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
               $ptra_pata_f6_1b_skop_pilihan_id = $this->uri->segment(3);
                
                $data['senarai_skop'] = $this->ptra_model->get_skop();
               
                $this->load->view('template/default', $data);  
            }
	}
    */    
    
	//edited : diana 11/11/13
	function treeview_ptra ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
				$node_id = '59';
                $menu_name = 'menu1';
                $menu_link = 'ptra/treeview_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['senarai_skop'] = $this->ptra_model->get_skop();

                if ($_POST){

                /*$this->form_validation->set_rules('skop[]', 'Skop', 'trim|required|xss_clean');
                $this->form_validation->set_rules('aktiviti[]', 'Aktiviti', 'trim|required|xss_clean');
                $this->form_validation->set_rules('butiran[]', 'Butiran Aktiviti', 'trim|required|xss_clean');
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean');

                if($this->form_validation->run())
                 {*/
                   if($this->input->post('sunting') != NULL){

                   // echo "sunting";

                    $update = $this->ptra_model->updatetreeviewptra();
                    redirect('ptra/skop_aktiviti_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
              

                   }else{

                     // echo "tambah";

                      $addTreeview = $this->ptra_model->tambahtreeviewptra();

                      if($addTreeview)
                        {
                            $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                          //  redirect('ptra/skop_aktiviti_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }
                        else
                        {
                           $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                           // redirect('ptra/treeview_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }      
                   } 

                 /*}else{

                $this->load->view('template/default', $data); 
               
                } 
                */
                }else{

                $this->load->view('template/default', $data); 
               
                } 
                
               
	}
	
	//Name : Fatin
	//Date : 8/7/13
	//Desc : treeview skop aktiviti ptra 1b 1c
	//updated : diana 11/11/13
  function treeview_ptra_editppd ()
  {

		$node_id = '143';
		$menu_name = 'menu1';
		$menu_link = 'ptra/treeview_ptra_editppd';
					
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
        $data['senarai_skop'] = $this->ptra_model->get_skop($this->uri->segment(4));
        $data['senarai_treeview'] = $this->ptra_model->get_skop_summary_ptra($this->uri->segment(4));
                //$data['aktiviti_tajuk'] = $this->ptra_model->get_treeview_summary_ptra($this->uri->segment(4));
                
  
                if ($_POST){

                /*$this->form_validation->set_rules('skop[]', 'Skop', 'trim|required|xss_clean');
                $this->form_validation->set_rules('aktiviti[]', 'Aktiviti', 'trim|required|xss_clean');
                $this->form_validation->set_rules('butiran[]', 'Butiran Aktiviti', 'trim|required|xss_clean');
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean');

                if($this->form_validation->run())
                 {*/
                   if($this->input->post('sunting') != NULL){

                   // echo "sunting";

                    $update = $this->ptra_model->updatetreeviewptra();
                    redirect('ptra/skop_aktiviti_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
              

                   }else{

                     // echo "tambah";

                      $addTreeview = $this->ptra_model->tambahtreeviewptra();

                      if($addTreeview)
                        {
                            //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('ptra/skop_aktiviti_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }
                        else
                        {
                           //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                            redirect('ptra/treeview_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }      
                   } 

                 /*}else{

                $this->load->view('template/default', $data); 
               
                } 
                */
                }else{

                $this->load->view('template/default', $data); 
               
                } 
                
               
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

        $data['senarai_skop'] = $this->ptra_model->get_skop();
        $data['skop'] = $this->ptra_model->get_allskop();
        
        $this->load->view('template/default', $data);
	}
    
	/* skop aktivit is here */
	//edit : diana 12/11/13
   /* function skop_aktiviti2_ptra()
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
	*/
	
	function set_skop_aktiviti_ptra($idsumber)
	{
      $this->load->model('ptra_model');
      header('Content-Type: application/x-json; charset=utf-8');
	  echo(json_encode($this->ptra_model->removesumberrancang($idsumber)));
	}
	
	function skop_aktiviti2_ptra()
	{
                $node_id = '110';
				$menu_name = 'menu1';
				$menu_link = 'ptra/skop_aktiviti2_ptra';
							
				$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
				$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
				$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
				$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['obj_sbg'] = $this->ptra_model->get_obj_sebagai();
                $data['sumber_id'] = $this->ptra_model->get_sumber_id();
                $data['senarai_sumber'] = $this->ptra_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->ptra_model->get_alat_pej();
                $data['senarai_fax'] = $this->ptra_model->get_fax();
                $data['senarai_tel'] = $this->ptra_model->get_telefon();
                $data['senarai_kom'] = $this->ptra_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->ptra_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->ptra_model->get_kenderaan();
                $data['senarai_ppe'] = $this->ptra_model->get_ppe();



                if($_POST){

                 /* 
                 $this->form_validation->set_rules('pihakkaitan', 'Pihak Berkaitan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tjawab', 'Tanggungjawab', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('objek', 'Objek Sebagai', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('bajet_aktvt', 'Bajet Aktiviti', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('sumber', 'Sumber', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('output', 'Output Mula', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                 if($this->form_validation->run()){  //check validation
                  */
                   // if($this->input->post('hantar') == 'Rancang'){ //kalo sunting
				   
					if($this->input->post('rancang') != NULL){

                     //check data exist or not
                      $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->ptra_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->ptra_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('foto');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('foto');
                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('fax');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('fax');
					}


                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('tel');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('kom');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('pem');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ken');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ppe');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ppe');


                      }



                    
					$this->ptra_model->tambahsumberrancang("rancang");
					redirect('ptra/skop_aktiviti2_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
               


//endofrancang					//	}else if($this->input->post('hantar') == 'Lulus'){      
						}else if($this->input->post('lulus') != NULL){      

                      //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->ptra_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->ptra_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('foto');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('fax');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('tel');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('kom');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('pem');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ken');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ppe');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ppe');


                      }

                      $this->ptra_model->tambahsumberrancang("lulus");

                      redirect('ptra/skop_aktiviti2_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
                     

//endoflulus                    //}else if($this->input->post('hantar') == 'Isi'){
					}else if($this->input->post('isi') != NULL){

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->ptra_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->ptra_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('foto');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('fax');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('tel');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('kom');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('pem');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ken');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ppe');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ppe');


                      }
                      $this->ptra_model->tambahsumberrancang("isi");

                      redirect('ptra/skop_aktiviti2_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
//endofisi                     
                    }else{ //add new record

                      //echo "tambah";
                      $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->ptra_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->ptra_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('foto');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('fax');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('tel');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('kom');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('pem');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ken');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ppe');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ppe');


                      }


                   

                        // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                    redirect('ptra/skop_aktiviti_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');                  
					}
                }
				else
				{
					$this->load->view('template/default', $data);
				}  
            
    }
	

  function kawalan_rekod_ptra()
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
           
                $ptra_pata_f6_1d_id = $this->uri->segment(3); 
                                
                
                if($getKawalanrekod = $this->ptra_model->get_kawalanrekod())
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
                $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
                $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                $data['ptra_pata_f6_1d_id'] = $this->session->userdata('ptra_pata_f6_1d_id');
                $addRekod = $this->ptra_model->tambahkawalan_rekod($ptra_pata_f6_1d_id);
                
                $ptra_pata_f6_1d_id = $this->input->post('ptra_pata_f6_1d_id');                
                $this->session->set_userdata(array('ptra_pata_f6_1d_id' => $ptra_pata_f6_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('ptra/kawalan_rekod_ptra');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('ptra/kawalan_rekod_ptra');
                }                
            }      
            else
            {
               $node_id = '18';
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
        }
        else
        {
            
                $node_id = '18';
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
    }
    
    
    function kemaskinikawalan_rekod()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinikawalan_rekod';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $ptra_pata_f6_1d_id = $this->uri->segment(3);

                if($getKawalanrekod = $this->ptra_model->get_kawalanrekod_1($ptra_pata_f6_1d_id))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                   // print_r($getPanelpenilai);
                   // die();

                }
                else
                    echo 'gagal';
                //die();


                $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
                $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
                $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('f6_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                                        'f6_1d_lokasi' => $this->input->post('lokasi1'),
                                        'tempoh' => $this->input->post('tempoh1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_rekod = $this->ptra_model->update_rekod($ptra_pata_f6_1d_id, $dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_rekod)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
                        redirect('ptra/kawalan_rekod_ptra');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinikawalan_rekod/'.$ptra_pata_f6_1d_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
            

        
  function dokumen_rujukan_ptra()
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
           
                $lampiran_id = $this->uri->segment(3); 
                                
                
                if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan())
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }
                
                $this->form_validation->set_rules('nama_fail1','Tajuk Dokumen','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_fail_asal1','Dokumen Rujukan','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_fail2','Tajuk Dokumen','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_fail_asal2','Dokumen Rujukan','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                $data['lampiran_id'] = $this->session->userdata('lampiran_id');
                $addDoc = $this->ptra_model->tambahdokumen($lampiran_id);
                
                $lampiran_id = $this->input->post('lampiran_id');                
                $this->session->set_userdata(array('lampiran_id' => $lampiran_id));

                if($addDoc)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Dokumen rujukan Berjaya Didaftarkan</font><br>');
                    redirect('ptra/dokumen_rujukan_ptra');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('ptra/dokumen_rujukan_ptra');
                }                
            }      
            else
            {
               $node_id = '18';
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
        }
        else
        {
            
                $node_id = '18';
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
        

/*
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
*/


   //edited : diana 10/11/13
   function skop_aktiviti2_ptra_editppd ()
 {

	$node_id = '150';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
	
                $data['obj_sbg'] = $this->ptra_model->get_obj_sebagai();
                $data['sumber_id'] = $this->ptra_model->get_sumber_id();
                $data['senarai_sumber'] = $this->ptra_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->ptra_model->get_alat_pej();
                $data['senarai_fax'] = $this->ptra_model->get_fax();
                $data['senarai_tel'] = $this->ptra_model->get_telefon();
                $data['senarai_kom'] = $this->ptra_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->ptra_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->ptra_model->get_kenderaan();
                $data['senarai_ppe'] = $this->ptra_model->get_ppe();



                if($_POST){

                 /* 
                 $this->form_validation->set_rules('pihakkaitan', 'Pihak Berkaitan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tjawab', 'Tanggungjawab', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('objek', 'Objek Sebagai', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('bajet_aktvt', 'Bajet Aktiviti', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('sumber', 'Sumber', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('output', 'Output Mula', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                 if($this->form_validation->run()){  //check validation
                  */
                   // if($this->input->post('hantar') == 'Rancang'){ //kalo sunting
				   
					if($this->input->post('rancang') != NULL)
					{
                      $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_1b1c();
                      
                      if($check_data == 0)
					  { 
                        $this->ptra_model->tambahskopaktivitipenilaiaset();
                      }
					  else
					  {
                        $this->ptra_model->updateskopaktivitipenilaiaset();
                      }

						$foto = $this->input->post('foto');
						if(is_array($foto))
						{
							//delete
							$this->ptra_model->delete_ptra_urus_pej('foto');
							//insert
							$this->ptra_model->insert_ptra_urus_pej('foto');
						}

						$fax = $this->input->post('fax');
						if(is_array($fax))
						{
							//delete
							$this->ptra_model->delete_ptra_urus_pej('fax');
							//insert
							$this->ptra_model->insert_ptra_urus_pej('fax');
						}

						$tel = $this->input->post('tel');
                        if(is_array($tel))
						{
							//delete
							$this->ptra_model->delete_ptra_urus_pej('tel');
							//insert
							$this->ptra_model->insert_ptra_urus_pej('tel');
						}

						$kom = $this->input->post('kom');
                        if(is_array($kom))
						{
							//delete
							$this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('kom');
							//insert
							$this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('kom');
						}


						$pem = $this->input->post('pem');
						if(is_array($pem))
						{
							//delete
							$this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('pem');
							//insert
							$this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('pem');
						}

						$ken = $this->input->post('ken');
						if(is_array($ken))
						{
							//delete
							$this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ken');
							//insert
							$this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ken');
						}

						$ppe = $this->input->post('ppe');
						if(is_array($ppe))
						{
							//delete
							$this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ppe');
							//insert
							$this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ppe');
						}

						$this->ptra_model->tambahsumberrancang("rancang");
						redirect('ptra/skop_aktiviti2_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
               


//endofrancang					//	}else if($this->input->post('hantar') == 'Lulus'){      
						}else if($this->input->post('lulus') != NULL){      

                      //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->ptra_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->ptra_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('foto');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('fax');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('tel');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('kom');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('pem');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ken');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ppe');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ppe');


                      }

                      $this->ptra_model->tambahsumberrancang("lulus");

                      redirect('ptra/skop_aktiviti2_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
                     

//endoflulus                    //}else if($this->input->post('hantar') == 'Isi'){
					}else if($this->input->post('isi') != NULL){

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->ptra_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->ptra_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('foto');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('fax');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('tel');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('kom');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('pem');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ken');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ppe');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ppe');


                      }
                      $this->ptra_model->tambahsumberrancang("isi");

                      redirect('ptra/skop_aktiviti2_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
//endofisi                     
                    }else{ //add new record

                      //echo "tambah";
                      $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->ptra_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->ptra_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('foto');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('fax');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->ptra_model->delete_ptra_urus_pej('tel');
                        //insert
                        $this->ptra_model->insert_ptra_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('kom');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('pem');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ken');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->ptra_model->delete_ptra_tbl_ptra_alat_kerja('ppe');
                        //insert
                        $this->ptra_model->insert_ptra_tbl_ptra_alat_kerja('ppe');


                      }


                     // $this->ptra_model->tambahskopaktiviti2();

                        // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('ptra/skop_aktiviti_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    
                }

		}else{ 
		$this->load->view('template/default', $data);
		}  
	               
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
    
    if($getPtf = $this->ptra_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->ptra_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->ptra_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->ptra_model->get_pof())
            {
               $data['senarai_pof'] = $getPof;
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

        /*
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

  */
        
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
        
   /*     function skop_aktiviti2_ptra_editppd()
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
       */ 
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