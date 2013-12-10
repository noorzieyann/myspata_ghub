<?php

class Ptra extends CI_Controller {

function __construct()
  {
    parent::__construct();
    #load library dan helper yang dibutuhkan
     date_default_timezone_set('Asia/Kuala_Lumpur');
    $this->load->library(array('table','validation'));
    //$this->load->library('form_validation');
    
    $this->load->helper(array('form', 'url'));
    $this->load->helper('function_helper');
    $this->load->model('utama_model');
    $this->load->model('pspao_model');
    $this->load->model('negeri_model');
    $this->load->model('daerah_model');
    $this->load->library('Aauth');
    $this->load->model('pnpa_model','',TRUE);
    $this->load->model('ptra_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
    $this->load->model('utilitikeperluansumber_model');
    $this->load->library('pagination');
    $this->load->library('table');
    $this->load->model('function_model');

    $this->load->helper('download');
        
   //$this->output->enable_profiler(TRUE); //display query statement
    
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
    $config['max_size'] = '100';
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
        
    $node_id = '123';
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

     

function status_premis_ptra()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
    
    if($getPnpa1 = $this->function_model->get_tab(2))
                    {
                       $data['tab'] = $getPnpa1;
                    }
  if($_POST)
        {
             if($this->input->post('status')=='baru' && $this->input->post('kataset')=='bangunan')
                {  redirect('ptra/kat_bangunan_ptra/'.$this->uri->segment(3));
                
                }
            else if($this->input->post('status')=='baru' && $this->input->post('kataset')=='jalan')
                {  redirect('ptra/kat_jalan_ptra/'.$this->uri->segment(3));
                
                }
            else if($this->input->post('status')=='baru' && $this->input->post('kataset')=='pembetungan')
                {  redirect('ptra/kat_pembetungan_ptra/'.$this->uri->segment(3));
                
                }
           else if($this->input->post('status')=='baru' && $this->input->post('kataset')=='saliran')
                {  redirect('ptra/kat_saliran_ptra/'.$this->uri->segment(3));
                
                }
          else if($this->input->post('status')=='sedia')
                {  redirect('ptra/kandungan_ptra/'.$this->uri->segment(3));
                
                }
                else
            {
              echo 'gagal kalih gak';
             }  
         }
    
        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

$data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
       $data['jabatan'] = $this->ptra_model->get_jabatan_agen(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim();
         $data['katagensi'] = $this->ptra_model->get_katagensi();//dapatkan senarai mukim dr db
       // $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db

        if($_POST)
            {
              $ptra_reg=$this->ptra_model->tambahpraptra();
                       //return $ptra_reg;
                        //echo $ptra_reg;
                   redirect('ptra/kandungan_ptra/'.$this->uri->segment(3).'/0/'.$ptra_reg,'refresh'); 
              //redirect('ptra/kandungan_ptra/'.$this->uri->segment(3),'refresh');
               //
             }    
            $this->load->view('template/default', $data);
  }

  function kat_jalan_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset jalan

    $node_id = '14';
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

    $node_id = '14';
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

    $node_id = '14';
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

  
////here start copy from PNPA////  
  
   function senarai_pp_ptra()
  {
        //Name : Fatin
        //Date : 12/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_pp_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        //$data['year_list'] =year_dropdown();  //get year list 
        //$data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        //$data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
    if($getPtra = $this->ptra_model->get_ptra($pspa_id))
    {
       $data['senarai_ptra'] = $getPtra;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
        
        function senarai_ptf_ptra()
  {
        //Name : Fatin
        //Date : 12/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_ptf_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        //$data['year_list'] =year_dropdown();  //get year list 
        //$data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        //$data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
    if($getPtra = $this->ptra_model->get_ptra())
    {
       $data['senarai_ptra'] = $getPtra;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
       function senarai_ppd_ptra()
  {
        //Name : Fatin
        //Date : 11/9/13
        //Desc : senarai pegawai pengawal
    /*
     Updated : diana 31/10/2013 - data
    */

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_ppd_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
    $sessionarray = $this->session->all_userdata();
    $pspa_id = $this->uri->segment(3);  
    
    if($getPnpa1 = $this->function_model->get_tab(2))
    {
       $data['tab'] = $getPnpa1;
    }
    if($getPtra = $this->ptra_model->get_ptra_status($pspa_id))
    {
       $data['senarai_ptra'] = $getPtra;
    }
              
    $this->load->view('template/default', $data);
        
  }

  
    //updated : fatin 12/11/13
    //updated : diana 31/10/2013 
   function kandungan_ptra()
  {
    //nama:yann
                //date:8/7/13
                //desc:page penyediaan kandungan ptra
    //$data['main_content'] = 'ptra/kandungan_ptra';
                //$this->load->view('template/default_pelan', $data);
 
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kandungan_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                if($getPnpa1 = $this->function_model->get_tab(2))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                //$data['year_list'] =year_dropdown();  //get year list 
        //get data year from table pspao
        $dataYear = $this->pnpa_model->get_year_pspao($this->uri->segment(3));
        
        //called function for selected year only
        $data['year_list_selected'] = year_dropdown_selected($dataYear[0],$dataYear[1]);

                if($getSumberManusia = $this->ptra_model->get_kat_premis())
                {
                    
                $data['katpremis'] = $getSumberManusia;
                
                }

            if($_POST)
            {

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

                  if($this->input->post('sunting')!= NULL)
                  {

                    $ptra_id = $this->ptra_model->updateptra();

                      redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$ptra_id,'refresh');
               

                  }else{


                          $get_pspa_ptf_id = $this->ptra_model->get_pspao_akhir_ptf($this->uri->segment(3));

                          $get_pspa_pp_id = $this->ptra_model->get_pspao_akhir_pp($this->uri->segment(3));

                          $newdata = array(
                           'ptfid'  => $get_pspa_ptf_id,
                           'ppid'     => $get_pspa_pp_id,
                          
                          );

                          $this->session->set_userdata($newdata);


                    $ptra_id = $this->ptra_model->tambahptra(); 

                  }



                   if($ptra_id)
                    {

                        //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$ptra_id,'refresh');
                    }
                    else
                    {
                        //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                        redirect('ptra/kandungan_ptra/'.$this->uri->segment(3).'/'.$ptra_id);
                    }      

                }


             } 
               
                
              
                $this->load->view('template/default', $data);
            
               
  }

   
// Azian
		// updated diana 14/11/13
		function model_struktur_ptra()
        {

            $node_id = '14';
            $menu_name = 'menu1';
            $menu_link = 'ptra/model_struktur_ptra';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


            $data['senarai_panel1'] = $this->ptra_model->get_panelpenilai_sumber(1);
            $data['senarai_panel2'] = $this->ptra_model->get_panelpenilai_sumber(2);
            $data['senarai_ptf'] = $this->ptra_model->get_ptf();
            $data['senarai_pif'] = $this->ptra_model->get_pif();
            $data['senarai_pdf'] = $this->ptra_model->get_pdf();
            $data['senarai_pof'] = $this->ptra_model->get_pof();
            $data['peranan'] = $this->utilitikeperluansumber_model->get_peranan_1();
            $data['disiplin'] = $this->utilitikeperluansumber_model->get_bidang_1();
            $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();
            $data['jabatan'] = $this->utilitikeperluansumber_model->get_jabatan_agen();
            $data['level'] = $this->utilitikeperluansumber_model->get_level_1();
            $data['countries'] = $this->negeri_model->get_negeri();
			
			if($getPtra1 = $this->function_model->get_tab(4))
            {
                   $data['tab'] = $getPtra1;
            }

            if ($_POST)
            {
				if($this->input->post('sumberluaran') == 'Simpan')
                 {
                        $this->form_validation->set_rules('nama_luar','Nama','trim|required|xss_clean');
                        $this->form_validation->set_rules('syarikat_id_luar','Nama Syarikat','trim|required|xss_clean');
                        $this->form_validation->set_rules('noic_luar','No Kad Pengenalan','trim|required|xss_clean');
                        //$this->form_validation->set_rules('peranan_luar','Peranan','trim|required|xss_clean');
                        $this->form_validation->set_rules('jawatan_luar','Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('disiplin_luar','Disiplin/Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('gaji_luar','Gaji','trim|required|xss_clean');
                        $this->form_validation->set_rules('koslebihmasa_luar','Kos Lebih Masa','trim|required|xss_clean');
                        
                        //validation untuk popup sumber luaran
                        if($this->form_validation->run())
                         {
                            $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_model();
                        
                            if($check_data == 0)
                            {
                            $this->ptra_model->tambahmodelptra();
                            
                            }
                            else
                            {

                           $this->ptra_model->updatemodelstruktur();
                           $this->ptra_model->updatepanelkom();
                           $this->ptra_model->updatepanelpenilai();
                           } 
                     
                        $this->utilitikeperluansumber_model->tambahsumberpanel();
                        //redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 
                        } 
               
                     else
                        {

                        $this->load->view('template/default', $data);
           
                        }
                 }

            else if($this->input->post('sumberdalaman') == 'Simpan')
                 {
                        $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                        $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                        $this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                        $this->form_validation->set_rules('level','Peringkat','trim|required|xss_clean');
                        $this->form_validation->set_rules('jawatan','Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('gredjawatan','Gred Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('disiplin','Disiplin/Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('gaji','Gaji','trim|required|xss_clean');
                        $this->form_validation->set_rules('koslebihmasa','Kos Lebih Masa','trim|required|xss_clean');
 
                        //validation untuk popup sumber dalaman
                        if($this->form_validation->run())
                         {
                              $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_model();

                              if($check_data == 0)
                                  {
                                    $this->ptra_model->tambahmodelptra();

                                  }
                            else
                                {
                                   $this->ptra_model->updatemodelstruktur();
                                   $this->ptra_model->updatepanelkom();
                                   $this->ptra_model->updatepanelpenilai();

                                }
                            $this->utilitikeperluansumber_model->tambahsumbermanusia();
                            redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 
                        } 
               
                     else
                        {

                        $this->load->view('template/default', $data);
           
                        }
                 }
               else if ($this->input->post('hantar') == 'Simpan Deraf')
                 {
                    
                              $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_model();

                              if($check_data == 0)
                                  {
                                    $this->ptra_model->tambahmodelptra();

                                  }
                            else
                                {
                                   $this->ptra_model->updatemodelstruktur();
                                   $this->ptra_model->updatepanelkom();
                                   $this->ptra_model->updatepanelpenilai();

                                }
                           
                   $this->ptra_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
        //echo 'ok';
                    //$data['detail_msg'] = $this->function_model->get_masej($id,7);
                    $data['main_content'] = 'alert';
                    $data['msg'] = 'Borang PTRA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PTRA.';
                    $data['link'] = 'ptra/senarai_ppd_ptra/'.$this->uri->segment(3);
                    $this->load->view('template/default', $data);
                   
                      

                      }

               else 
                 {
                    // $this->form_validation->set_rules('ptf[]', 'PTF', 'trim|required|xss_clean');
                    // $this->form_validation->set_rules('pif[]', 'PIF', 'trim|required|xss_clean');
                     //$this->form_validation->set_rules('pdf[]', 'PDF', 'trim|required|xss_clean');
                    // $this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');
                    // $this->form_validation->set_rules('panel_penilai[]', 'Panel Penilai', 'trim|required|xss_clean'); 
                     
                     $this->form_validation->set_rules('pegawaikaitan', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
                     $this->form_validation->set_rules('tjawabdankuasa', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
                     $this->form_validation->set_rules('pegawailain', 'Tugas Pegawai-Pegawai Lain Yang Ada Kaitan', 'trim|required|xss_clean');

                     if($this->form_validation->run())
                         {
                              $check_data = $this->ptra_model->count_data_in_tbl_ptra_pata_f6_model();

                              if($check_data == 0)
                                  {
                                    $this->ptra_model->tambahmodelptra();

                                  }
                            else
                                {
                                   $this->ptra_model->updatemodelstruktur();
                                   $this->ptra_model->updatepanelkom();
                                   $this->ptra_model->updatepanelpenilai();

                                }
                           
                             redirect('ptra/treeview_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 
                        } 
               
                     else
                        {

                        $this->load->view('template/default', $data);
           
                        }
                     
                   
                      

                      }
                 
        }
                    
            
            else{
            
            $this->load->view('template/default', $data);

          }
  }

  //edited by : fatin 8/11/13
  function kemaskinipanel_penilai_ptra()
    {
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinipanel_penilai_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $no= $this->input->post('no');
                 
            
                $data['senarai_panel2'] = $this->ptra_model->get_panelpenilai_1($this->uri->segment(5));
                $data['peranan'] = $this->utilitikeperluansumber_model->get_peranan_1();
                $data['disiplin'] = $this->utilitikeperluansumber_model->get_bidang_1();
                $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();
                $data['jabatan'] = $this->utilitikeperluansumber_model->get_jabatan_agen();
                $data['level'] = $this->utilitikeperluansumber_model->get_level_1();
                $data['countries'] = $this->negeri_model->get_negeri();
                

                //$syarikat_id = $this->uri->segment(3);
                //$utiliti_sumber_man_id = $this->uri->segment(5); 
                
                $this->form_validation->set_rules('jabatan','Jabatan','trim|required|xss_clean');
                $this->form_validation->set_rules('negeri','Negeri','trim|required|xss_clean');
                $this->form_validation->set_rules('daerah','Daerah','trim|required|xss_clean');
                $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                $this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                $this->form_validation->set_rules('level','Peringkat','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gredjawatan','Gred Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa','Kos Lebih Masa','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                  
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array(       
                                        //'idkem' => $this->input->post('kementerian'),
                                        'idjab_agensi' => $this->input->post('jabatan'),
                                        'idnegeri' => $this->input->post('negeri'),
                                        'iddaerah' => $this->input->post('daerah'),
                                        'nama' => $this->input->post('nama'),
                                        'nric' => $this->input->post('noic'),
                                        'kump_pengguna' => $this->input->post('peranan'),
                                        'level_id' => $this->input->post('level'),
                                        'jawatan' => $this->input->post('jawatan'),
                                        'gred_jawatan' => $this->input->post('gredjawatan'),
                                        'disiplin_bidang_id' => $this->input->post('disiplin'),
                                        'gaji' => $this->input->post('gaji'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa'),
                                        
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_panel = $this->ptra_model->update_panel($this->uri->segment(5), $dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Panel Penilai Teknikal Berjaya Dikemaskini</font><br>');
                        redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinipanel_penilai_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }

//edited by : fatin 8/11/13
 function kemaskinipanel_penilai_ptra2()
    {
            
        
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinipanel_penilai_ptra2';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $no= $this->input->post('no');
                 
                $data['senarai_panel2'] = $this->ptra_model->get_panelpenilai_1($this->uri->segment(5));
                $data['peranan'] = $this->utilitikeperluansumber_model->get_peranan_1();
                $data['disiplin'] = $this->utilitikeperluansumber_model->get_bidang_1();
                $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();
                

                //$syarikat_id = $this->uri->segment(3);
                 $utiliti_sumber_man_id = $this->uri->segment(5); 
                
                $this->form_validation->set_rules('nama1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('syarikat_id1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin_bidang_id1','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji1','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa1','Kos Lebih Masa','trim|required|xss_clean');


                if($this->form_validation->run())
                {

                    $dataDetail = array('nama' => $this->input->post('nama1'),
                                        'syarikat_id' => $this->input->post('syarikat_id1'),
                                        'nric' => $this->input->post('noic'),
                                        'jawatan' => $this->input->post('jawatan1'),
                                        'disiplin_bidang_id' => $this->input->post('disiplin_bidang_id1'),
                                        'gaji' => $this->input->post('gaji1'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_panel = $this->ptra_model->update_panel($this->uri->segment(5), $dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Panel Penilai Teknikal Berjaya Dikemaskini</font><br>');
                        redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinipanel_penilai_ptra2/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            } 

       
  //edited : diana 11/11/13
  function treeview_ptra ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
    $node_id = '14';
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
                           // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                           redirect('ptra/skop_aktiviti_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
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
     
      
  function skop_aktiviti_ptra()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '14';
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
        
     
//edit : diana 12.11.13
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
               


                    //endofrancang  //  }else if($this->input->post('hantar') == 'Lulus'){      
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
    
    
  //edited : fatin 13/11/13
        function kawalan_rekod_ptra ()
       
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kawalan_rekod_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                if($getPnpa1 = $this->function_model->get_tab(2))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                //$ptra_pata_f6_1d_id = $this->uri->segment(4); 
                 $no= $this->input->post('no');               
                
                if($getKawalanrekod = $this->ptra_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
            
            
        if($_POST)
        {
                
                
                
                $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
                $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
                $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                //$data['ptra_pata_f6_1d_id'] = $this->session->userdata('ptra_pata_f6_1d_id');
                $addRekod = $this->ptra_model->tambahkawalan_rekod();
                
               // $ptra_pata_f6_1d_id = $this->input->post('ptra_pata_f6_1d_id');                
                //$this->session->set_userdata(array('ptra_pata_f6_1d_id' => $ptra_pata_f6_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('ptra/kawalan_rekod_ptra/'.$this->uri->segment(3).'/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('ptra/kawalan_rekod_ptra/'.$this->uri->segment(3).'/'.$no,'refresh');
                }                
            }      
            else
            {
                
                $this->load->view('template/default', $data);
            } 
        }
        else
        {
                
                $this->load->view('template/default', $data);
    
        }
    }
    
    
    //edited : fatin 13/11/13
     function kemaskinikawalan_rekod()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'ptra/kemaskinikawalan_rekod';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$ptra_pata_f6_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->ptra_model->get_kawalanrekod_1($this->uri->segment(5)))
      {
        $data['senarai_kawalan'] = $getKawalanrekod;
      }
      
      else
      {
        echo 'gagal';
      }


      $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
      $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
      $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');


      if($this->form_validation->run())
      {
        $dataDetail = array('f6_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f6_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->ptra_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('ptra/kawalan_rekod_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('ptra/kemaskinikawalan_rekod/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }




function kemaskinikawalan_rekod_ptf()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'ptra/kemaskinikawalan_rekod_ptf';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$ptra_pata_f6_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->ptra_model->get_kawalanrekod_1($this->uri->segment(5)))
      {
        $data['senarai_kawalan'] = $getKawalanrekod;
      }
      
      else
      {
        echo 'gagal';
      }


      $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
      $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
      $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');


      if($this->form_validation->run())
      {
        $dataDetail = array('f6_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f6_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->ptra_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('ptra/kawalan_rekod_ptra_editptf/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('ptra/kemaskinikawalan_rekod_ptf/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }


    
   function dokumen_rujukan_ptra()
  {
    //Name : Seri
    //Date : 14/11/2013
    //Desc : Page untuk dokumen rujukan PTRA + upload download function
        

    {
       
      $node_id = '18';
      $menu_name = 'menu1';
      $menu_link = 'ptra/dokumen_rujukan_ptra';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                                
      if($getPtra1 = $this->function_model->get_tab(2))
      {
        $data['tab'] = $getPtra1;
      }
                

      if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan($this->uri->segment(4)))
      {
        $data['senarai_dokumen'] = $getDokumenrujukan;
      }







      if($_POST)
      {

        if ($this->input->post('hantar') == 'Simpan Deraf')
        {
                     
          $this->ptra_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
          $data['main_content'] = 'alert';
          $data['msg'] = 'Borang PTRA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PTRA.';
          $data['link'] = 'ptra/senarai_ppd_ptra/'.$this->uri->segment(3);
        }


        else
        {
          $pspa= $this->input->post('pspa');
          $no= $this->input->post('no'); 

          $this->form_validation->set_rules('nama_fail1','Tajuk Dokumen','trim|required|xss_clean'); 




          if($this->form_validation->run())
          {
            $data['lampiran_id'] = $this->session->userdata('lampiran_id');      
     
            $config['upload_path'] = $this->config->item('upload_path')."ptra/";
            $config['allowed_types'] = '*'; 
            $config['max_size'] = '3000000';
            $this->load->library('upload', $config);
     
            $checkError = 0;



            if(empty($_FILES['userfile']['name']))
            { 
              $checkError++;
            }


            if($_POST['nama_fail2']<>'')
            {
              if(empty($_FILES['userfile2']['name']))
                { 
                  $checkError++;
                }
            }


            if($_POST['nama_fail3']<>'')
            {
              if(empty($_FILES['userfile3']['name']))
              { 
                $checkError++;
              }
            }
  

            if($_POST['nama_fail4']<>'')
            {
              if(empty($_FILES['userfile4']['name']))
              { 
                $checkError++;
              }
            }


            if($_POST['nama_fail5']<>'')
            {
              if(empty($_FILES['userfile5']['name']))
              { 
                $checkError++;
              }
            }

     
            if($checkError>0)
            {
              $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Perlu Diisi</font><br></strong><br>');
              redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$no);
            } 



            //first file
            if($this->upload->do_upload('userfile'))
            {
              $dataImage = $this->upload->data();
   
              $aPass = array($this->input->post('nama_fail1'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
              $addDoc = $this->ptra_model->tambahdokumen($aPass);
            }
     

            else
            {
              $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">'.$this->upload->display_errors().' AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
              redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$no,'refresh');
            }
     
     

            //second file
            if($_POST['nama_fail2']<>'')
            {
              if($this->upload->do_upload('userfile2'))
              {
                $dataImage = $this->upload->data();
     
                $aPass = array($this->input->post('nama_fail2'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
                $addDoc = $this->ptra_model->tambahdokumen($aPass);
              }
     

              else
              {
                $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
                redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$no,'refresh');
              }
            }  



            //third file
            if($_POST['nama_fail3']<>'')
            {
              if($this->upload->do_upload('userfile3'))
              {
                $dataImage = $this->upload->data();
     
                $aPass = array($this->input->post('nama_fail3'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
                $addDoc = $this->ptra_model->tambahdokumen($aPass);
              }
     

              else
              {
                $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
                redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$no,'refresh');
              }
            }
     


            //fourth file
            if($_POST['nama_fail4']<>'')
            {
              if($this->upload->do_upload('userfile4'))
              {
                $dataImage = $this->upload->data();
     
                $aPass = array($this->input->post('nama_fail4'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
                $addDoc = $this->ptra_model->tambahdokumen($aPass);
              }
              

              else
              {
                $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
                redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$no,'refresh');
              }
            }  



            //fifth file
            if($_POST['nama_fail5']<>'')
            {
              if($this->upload->do_upload('userfile5'))
              {
                $dataImage = $this->upload->data();
     
                $aPass = array($this->input->post('nama_fail5'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
                $addDoc = $this->ptra_model->tambahdokumen($aPass);
              }
     

              else
              {
                $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
                redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$no,'refresh');
              }
            }




         
            $lampiran_id = $this->input->post('lampiran_id');                
            $this->session->set_userdata(array('lampiran_id' => $lampiran_id));

            
            if($addDoc)
            {  
              $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Dokumen rujukan Berjaya Didaftarkan</font><br>');
              redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$no,'refresh');
            }
     

            else
            {
              $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
              redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$no,'refresh');
            }
   
          }      
          




          else
          {
            $this->load->view('template/default', $data);
          }  

        }




        $this->load->view('template/default', $data);
      }
      




      else
      {
        $this->load->view('template/default', $data);
      }


    } 

            
  }
  
  /*
    Added : diana 25/10/2013
    Desc  : delete file & update table lampiran
  */
  function hapus_dokumen_rujukan_ptra()
  {
    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
    $pspa =   $this->uri->segment(3);
    $ptraID = $this->uri->segment(4);
    $lampiranID = $this->uri->segment(5);
    
    
    $fileInfo = $this->ptra_model->get_documentInfo($lampiranID);
    $lokasiFile = $fileInfo[0];
    
    if($lokasiFile<>'')
    {
      $delete = $this->ptra_model->deleteDoc($lampiranID);
      
      if($delete===true)
      {
        //unlink file in directory
        $unlink = unlink($lokasiFile);
        
        if($unlink==true)
        { 
          $this->session->set_flashdata('flashError', '<strong><font color="blue" size="3">Dokumen Rujukan Berjaya Dihapus</font><br></strong><br>');
          redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$ptraID);
        }
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
          redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$ptraID);
        }
      }
      else
      {
        $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
        redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$ptraID);
      }
    }
    else
    {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
        redirect('ptra/dokumen_rujukan_ptra/'.$pspa.'/'.$ptraID);
    }
      
      
  }
  
  /*
    Added : diana 25/10/2013
    Desc  : download file
  */
  function muat_dokumen_rujukan_ptra($lampiran_id)
  {
    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
     
  $ptraID = $this->uri->segment(4);
    $lampiranID = $this->uri->segment(5);
    
    $fileInfo = $this->ptra_model->get_documentInfo($lampiranID);
    $lokasiFile = $fileInfo[0];
    
    if($lokasiFile<>'')
    { 
      $data = file_get_contents($lokasiFile); // Read the file's contents
      $name = $fileInfo[1];

      force_download($name, $data);
    }
    
  }
  
  
         //edited : fatin 13/11/13
         function summary_ptra ()
  {
                //updated by:fatin 311013
                //nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan ptra
             
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/summary_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $ptra_id = $this->uri->segment(4);
                $data['rows'] = $this->ptra_model->get_all_kandungan_ptra($ptra_id);
                
                //tab
                if($getPnpa1 = $this->function_model->get_tab(2))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                
                if($getstatus = $this->function_model->check_status_log1($id,4,$ptra_id))
                 {
                     $data['statusid'] = $getstatus;
                }
                else
                {
                    $data['statusid'] ='';
                }
                //$data['statusid'] = $this->function_model->check_status_log($id,4,$ptra_id);
                 if($getulasan = $this->ptra_model->get_ulasan_terbaru($id,4,$ptra_id))
                 {
                     $data['ulasan'] = $getulasan;
                }
                else
                {
                    $data['ulasan'] ='';
                }
                 //$data['ulasan'] = $this->ptra_model->get_ulasan_terbaru($id,4,$ptra_id);
                if($getPtra = $this->ptra_model->get_ptra2($id,$ptra_id))
                {
                    $data['senarai_ptra'] = $getPtra;
                }
              
      if($this->input->post('hantar') == 'hantar'){
          $this->ptra_model->insert_status_log($id,2,$ptra_id);
        
          $path = 'ptra/summary_ptf_ptra/'.$id.'/'.$ptra_id;
          $this->function_model->insert_notifikasi(48,2,$sessionarray['user_id'],$this->ptra_model->get_ptfid_ptra($id),$path); 
        
          //$path = 'ptra/summary_pif_ptra/'.$id.'/'.$ptra_id;
          //$this->function_model->insert_notifikasi(52,4,$sessionarray['user_id'],$this->ptra_model->get_pifid_ptra($id,1),$path); 
        
        //$data['detail_msg'] = $this->function_model->get_masej($id,7);
        $data['main_content'] = 'alert';
            $data['msg'] = 'Borang PTRA  telah berjaya dihantar untuk disemak. Klik butang OK untuk kembali ke Senarai PTRA.';
            $data['link'] = 'ptra/senarai_ppd_ptra/'.$id;
        
        //redirect('pspao/senarai_pspao_akhir','refresh');
        
      }else if($this->input->post('hantar') == 'Simpan Deraf'){
        //echo "<script>alert('Simpan Deraf')< /script>";
        //$this->pspao_akhir_model->update_kandungan_pspao($id);
        $this->ptra_model->insert_status_log($id,1,$ptra_id); //1=xx,2=xxx,3=pembetulan,4=sah
        
        //$data['detail_msg'] = $this->function_model->get_masej($id,7);
        $data['main_content'] = 'alert';
            $data['msg'] = 'Borang PTRA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PTRA.';
            $data['link'] = 'ptra/senarai_ppd_ptra/'.$id.'/'.$ptra_id;
        
        //redirect('pspao/senarai_pspao_akhir','refresh');
        
      }else if($this->input->post('hantar') == 'Sunting'){
        //echo "<script>alert('Sunting')< /script>";
        $this->ptra_model->update_kandungan_ptra($id);
        redirect('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$ptra_id,'refresh');
        
      }
      
                //$data['main_content'] = 'ptra/summary_ptra';
                $this->load->view('template/default', $data);
  }
           
  
   function summary_ppd_ptra_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan ptra
             
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/summary_ppd_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'ptra/summary_ptra';
                $this->load->view('template/default', $data);
  }
        
          
        function summary_pp_ptra ()
  {

                //nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal

                //edited by : seri
                // date     : 15112013
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/summary_pp_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $ptra_id = $this->uri->segment(4);
                $data['rows'] = $this->ptra_model->get_all_kandungan_ptra($ptra_id);
                $data['statusid'] = $this->function_model->check_status_log($id,4,$ptra_id);
                 $data['ulasan'] = $this->ptra_model->get_ulasan_terbaru($id,4,$ptra_id);
                if($getPtra = $this->ptra_model->get_ptra2($id,$ptra_id))
                {
                   $data['senarai_ptra'] = $getPtra;
                }
                    
                 if($this->input->post('lulus')=='lulus')
                     {
                       $this->ptra_model->update_ptra_date_lulus($id,$ptra_id); //update date lulus

                       $this->ptra_model->insert_status_log_ulasan($id,6,$ptra_id);  //insert status & ulasan
                          
                       /*****hantar notifikasi kepada pif yg ptra dah diluluskan*****/
                        $path = 'ptra/summary_pif_ptra/'.$id.'/'.$ptra_id;

                       $this->function_model->insert_notifikasi(113,2,$sessionarray['user_id'],$this->ptra_model->get_pifid_ptra($id,1),$path); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada pof yg ptra dah diluluskan*****/
                        $path2 = 'ptra/summary_pof_ptra/'.$id.'/'.$ptra_id;

                       $this->function_model->insert_notifikasi(113,2,$sessionarray['user_id'],$this->ptra_model->get_pofid_ptra($id,1),$path2); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada ptf yg ptra dah diluluskan*****/
                        $path3 = 'ptra/summary_ptf_ptra/'.$id.'/'.$ptra_id;

                       $this->function_model->insert_notifikasi(113,2,$sessionarray['user_id'],$this->ptra_model->get_ptfid_ptra($id),$path3); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada ppd yg ptra dah diluluskan*****/
                        $path4 = 'ptra/summary_ptra/'.$id.'/'.$ptra_id;

                        $this->function_model->insert_notifikasi(113,2,$sessionarray['user_id'],$this->ptra_model->get_ppdid_ptra($id,$ptra_id),$path4); //insert notifikasi

                       /******** end **********/
                             
                        $data['main_content'] = 'alert';
                        $data['msg'] = 'Borang PNPA telah berjaya diluluskan.Klik butang OK untuk kembali ke Senarai PNPA.';
                        $data['link'] = 'ptra/senarai_ppd_ptra/'.$id;
                       
                       
                        
                     }
                 else if($this->input->post('betul')=='betul')
                   {


                      $this->ptra_model->insert_status_log_ulasan($id,3,$ptra_id);

                     /*****hantar notifikasi kepada ppd yg pspao perlu di betulkan*****/

                       $path = 'ptra/summary_ptra/'.$id.'/'.$ptra_id;

                       $this->function_model->insert_notifikasi(59,2,$sessionarray['user_id'],$this->ptra_model->get_ppdid_ptra($id,$ptra_id),$path); //insert notifikasi

                       /******** end **********/

                         $data['main_content'] = 'alert';
                        $data['msg'] = 'Arahan pembetulan telah berjaya dihantar kepada Pegawai Penyedia Dokumen.Klik butang OK untuk kembali ke Senarai PNPA.';
                        $data['link'] = 'ptra/senarai_ppd_ptra/'.$id;
                       

                    }
                
                
                //$data['main_content'] = 'ptra/summary_ptra';
                $this->load->view('template/default', $data);
  }  


        
         function summary_pp_ptra_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/summary_pp_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'ptra/summary_pp_ptra';
                $this->load->view('template/default', $data);
  }
        

  function summary_ptf_ptra_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/summary_ptf_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'ptra/summary_ptf_ptra';
                $this->load->view('template/default', $data);
  } 
  

  function download()

  {
  $data = file_get_contents("/var/www/html/myspata/application/views/ptra/suratLantikan.pdf"); // Read the file's contents
  $name = 'suratLantikan.pdf';

  force_download($name, $data);
}


  function model_struktur_ptra_edit ($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
              $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/model_struktur_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                $data['year_list'] =year_dropdown();  //get year list 
                //$data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
                //$data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
                //$data['premis'] = $this->ptra_model->get_premis();
                //$data['status'] = $this->ptra_model->get_status(); //dapatkan senarai premis dr db
               
              
               
                
              
               $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul><a href="download">Surat Lantikan.docx</a>',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>',
                             ),
                 
                          array   ('2','Sivil','sayuthi Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','adib Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('5','Sivil','Hakim Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('6','Sivil','Hakim Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('7','Sivil','Hakim Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
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

    $config['base_url'] = site_url('ptra/model_struktur_ptra_edit');
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
            
    
    
    $this->table->set_heading(anchor("ptra/model_struktur_ptra_edit/",'Bil','title="Klik untuk susun rekod"'), 
                              anchor("ptra/model_struktur_ptra_edit/",'Kategori ID','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_edit/",'Nama','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_edit/",'Syarikat','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_edit/",'Surat Lantikan','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_edit/",'Tindakan','title="Klik untuk susun rekod"'));

    $tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class=sort_'.$sort_order.'>',
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
                 
  
    $data['main_content'] = 'ptra/model_struktur_ptra';
                $this->load->view('template/default', $data);
  }
        }
        
  function treeview_ptra_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/treeview_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);
  }

  function skop_aktiviti_ptra_edit ()
  {

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/skop_aktiviti_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'ptra/skop_aktiviti_ptra';
                $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_ptra_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/skop_aktiviti2_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
    //$data['main_content'] = 'ptra/skop_aktiviti2_ptra';
                $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_ptra_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kawalan_rekod_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'ptra/kawalan_rekod_ptra';
                 $this->load->view('template/default', $data);
  }
        
        function dokumen_rujukan_ptra_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/dokumen_rujukan_ptra_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'ptra/dokumen_rujukan_ptra';
                $this->load->view('template/default', $data);
  }

  //name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view
  function model_struktur_ptra_editppd ()
  {

            $node_id = '14';
            $menu_name = 'menu1';
            $menu_link = 'ptra/model_struktur_ptra_editppd';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            $data['pelan_kom'] = $this->ptra_model->get_model_summary_ptra($this->uri->segment(4));


            $data['senarai_panel1'] = $this->ptra_model->get_panelpenilai_sumber(1);
            $data['senarai_panel2'] = $this->ptra_model->get_panelpenilai_sumber(2);
            $data['senarai_ptf'] = $this->ptra_model->get_ptf();
            $data['senarai_pif'] = $this->ptra_model->get_pif();
            $data['senarai_pdf'] = $this->ptra_model->get_pdf();
            $data['senarai_pof'] = $this->ptra_model->get_pof();
            $data['peranan'] = $this->utilitikeperluansumber_model->get_peranan_1();
            $data['disiplin'] = $this->utilitikeperluansumber_model->get_bidang_1();
            $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();
            $data['jabatan'] = $this->utilitikeperluansumber_model->get_jabatan_agen();
            $data['level'] = $this->utilitikeperluansumber_model->get_level_1();
            $data['countries'] = $this->negeri_model->get_negeri();


            if ($_POST)
            {

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

              if($this->input->post('sunting') != NULL){
                //echo "seterus";

               $this->ptra_model->updatemodelstruktur();
               $this->ptra_model->updatepanelkom();
               $this->ptra_model->updatepanelpenilai();

              

              redirect('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
          

              }else{

               // echo "sunting";

               $this->ptra_model->tambahmodelptra();

               redirect('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
          
              }

            }else{
            
            $this->load->view('template/default', $data);

            }

            }else{
            
            $this->load->view('template/default', $data);

          }
  }


  //edited by : fatin 8/11/13
  function kemaskinipanel_penilai_ptra_ppd()
    {
            
        
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinipanel_penilai_ptra_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $no= $this->input->post('no');
                 
            
                $data['senarai_panel2'] = $this->ptra_model->get_panelpenilai_1($this->uri->segment(5));
                $data['peranan'] = $this->utilitikeperluansumber_model->get_peranan_1();
                $data['disiplin'] = $this->utilitikeperluansumber_model->get_bidang_1();
                $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();
                $data['jabatan'] = $this->utilitikeperluansumber_model->get_jabatan_agen();
                $data['level'] = $this->utilitikeperluansumber_model->get_level_1();
                $data['countries'] = $this->negeri_model->get_negeri();
                

                //$syarikat_id = $this->uri->segment(3);
                //$utiliti_sumber_man_id = $this->uri->segment(5); 
                
                $this->form_validation->set_rules('jabatan','Jabatan','trim|required|xss_clean');
                $this->form_validation->set_rules('negeri','Negeri','trim|required|xss_clean');
                $this->form_validation->set_rules('daerah','Daerah','trim|required|xss_clean');
                $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                $this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                $this->form_validation->set_rules('level','Peringkat','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gredjawatan','Gred Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa','Kos Lebih Masa','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                  
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array(       
                                        //'idkem' => $this->input->post('kementerian'),
                                        'idjab_agensi' => $this->input->post('jabatan'),
                                        'idnegeri' => $this->input->post('negeri'),
                                        'iddaerah' => $this->input->post('daerah'),
                                        'nama' => $this->input->post('nama'),
                                        'nric' => $this->input->post('noic'),
                                        'kump_pengguna' => $this->input->post('peranan'),
                                        'level_id' => $this->input->post('level'),
                                        'jawatan' => $this->input->post('jawatan'),
                                        'gred_jawatan' => $this->input->post('gredjawatan'),
                                        'disiplin_bidang_id' => $this->input->post('disiplin'),
                                        'gaji' => $this->input->post('gaji'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa'),
                                        
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_panel = $this->ptra_model->update_panel($this->uri->segment(5), $dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Panel Penilai Teknikal Berjaya Dikemaskini</font><br>');
                        redirect('ptra/model_struktur_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinipanel_penilai_ptra_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
            
    //edited by : fatin 8/11/13        
   function kemaskinipanel_penilai_ptra_ppd2()
    {
            
        
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kemaskinipanel_penilai_ptra_ppd2';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $no= $this->input->post('no');
                 
                $data['senarai_panel2'] = $this->ptra_model->get_panelpenilai_1($this->uri->segment(5));
                $data['peranan'] = $this->utilitikeperluansumber_model->get_peranan_1();
                $data['disiplin'] = $this->utilitikeperluansumber_model->get_bidang_1();
                $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();
                

                //$syarikat_id = $this->uri->segment(3);
                 $utiliti_sumber_man_id = $this->uri->segment(5); 
                
                $this->form_validation->set_rules('nama1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('syarikat_id1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin_bidang_id1','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji1','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa1','Kos Lebih Masa','trim|required|xss_clean');


                if($this->form_validation->run())
                {

                    $dataDetail = array('nama' => $this->input->post('nama1'),
                                        'syarikat_id' => $this->input->post('syarikat_id1'),
                                        'nric' => $this->input->post('noic'),
                                        'jawatan' => $this->input->post('jawatan1'),
                                        'disiplin_bidang_id' => $this->input->post('disiplin_bidang_id1'),
                                        'gaji' => $this->input->post('gaji1'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_panel = $this->ptra_model->update_panel($this->uri->segment(5), $dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Panel Penilai Teknikal Berjaya Dikemaskini</font><br>');
                        redirect('ptra/model_struktur_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('ptra/kemaskinipanel_penilai_ptra_ppd2/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
            
  
    //name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view
 
  //updated : diana 11/11/13
  function treeview_ptra_editppd ()
  {

    $node_id = '14';
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

        
        function skop_aktiviti_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
     //edited : diana 10/11/13
   function skop_aktiviti2_ptra_editppd ()
 {

  $node_id = '14';
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
               


//endofrancang          //  }else if($this->input->post('hantar') == 'Lulus'){      
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
 
 
        
//updated : fatin 13/11/13       
  //name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view
        function kawalan_rekod_ptra_editppd ()
  {
        if($_POST)
        {
                
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kawalan_rekod_ptra_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$ptra_pata_f6_1d_id = $this->uri->segment(4); 
                 $no= $this->input->post('no');               
                
                if($getKawalanrekod = $this->ptra_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
                $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
                $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                //$data['ptra_pata_f6_1d_id'] = $this->session->userdata('ptra_pata_f6_1d_id');
                $addRekod = $this->ptra_model->tambahkawalan_rekod();
                
               // $ptra_pata_f6_1d_id = $this->input->post('ptra_pata_f6_1d_id');                
                //$this->session->set_userdata(array('ptra_pata_f6_1d_id' => $ptra_pata_f6_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('ptra/kawalan_rekod_ptra_editppd/'.$this->uri->segment(3).'/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('ptra/kawalan_rekod_ptra_editppd/'.$this->uri->segment(3).'/'.$no,'refresh');
                }                
            }      
            else
            {
               $node_id = '14';
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
        }
        else
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kawalan_rekod_ptra_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getKawalanrekod = $this->ptra_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->load->view('template/default', $data);
    
        }
    }

  function kemaskinikawalan_rekod_ppd()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'ptra/kemaskinikawalan_rekod_ppd';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$ptra_pata_f6_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->ptra_model->get_kawalanrekod_1($this->uri->segment(5)))
      {
        $data['senarai_kawalan'] = $getKawalanrekod;
      }
      
      else
      {
        echo 'gagal';
      }


      $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
      $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
      $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');


      if($this->form_validation->run())
      {
        $dataDetail = array('f6_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f6_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->ptra_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('ptra/kawalan_rekod_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('ptra/kemaskinikawalan_rekod_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }

    
       
  //name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view
        function dokumen_rujukan_ptra_editppd ()
  {
              
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
    
    /*
     Update : diana 23/10/13
     Desc : Upload module
    */
            
        {
        if($_POST)
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/dokumen_rujukan_ptra_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$no=$this->uri->segment(3);               
                $pspa= $this->input->post('pspa');
                $no= $this->input->post('no');

                if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan($no))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                }
                
                $this->form_validation->set_rules('nama_fail1','Tajuk Dokumen','trim|required|xss_clean');             

                if($this->form_validation->run())
                {
     $data['lampiran_id'] = $this->session->userdata('lampiran_id');      
     
     //$config['upload_path'] = 'uploads/';
    $config['upload_path'] = $this->config->item('upload_path')."ptra/";
    $config['allowed_types'] = '*'; 
   //$config['allowed_types'] = 'docx|doc|ppt|pptx|xls|xlsx|jpg|png|jpeg|gif|pdf';
   //$config['allowed_types'] = 'ppt|pptx|xls|xlsx|jpg|png|jpeg|gif|pdf';
     $config['max_size'] = '3000000';
        
     $this->load->library('upload', $config);
     
     $checkError = 0;
     //check validation
     if(empty($_FILES['userfile']['name'])){ $checkError++;}
     if($_POST['nama_fail2']<>''){if(empty($_FILES['userfile2']['name'])){ $checkError++;}}
     if($_POST['nama_fail3']<>''){if(empty($_FILES['userfile3']['name'])){ $checkError++;}}
     if($_POST['nama_fail4']<>''){if(empty($_FILES['userfile4']['name'])){ $checkError++;}}
     if($_POST['nama_fail5']<>''){if(empty($_FILES['userfile5']['name'])){ $checkError++;}}
     
     if($checkError>0)
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Perlu Diisi</font><br></strong><br>');
      redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$no);
     }
     
     //first file
     if($this->upload->do_upload('userfile'))
     {
      $dataImage = $this->upload->data();
   
      $aPass = array($this->input->post('nama_fail1'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->ptra_model->tambahdokumen($aPass);
     }
     else
     {
    
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">'.$this->upload->display_errors().' AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$no,'refresh');
     }
     
     //second file
   if($_POST['nama_fail2']<>''){
     if($this->upload->do_upload('userfile2'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail2'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->ptra_model->tambahdokumen($aPass);
      
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$no,'refresh');
     }
  }
     
   
     //third file
   if($_POST['nama_fail3']<>''){
     if($this->upload->do_upload('userfile3'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail3'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->ptra_model->tambahdokumen($aPass);
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$no,'refresh');
     }
  }
     
     //fourth file
   if($_POST['nama_fail4']<>''){
     if($this->upload->do_upload('userfile4'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail4'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->ptra_model->tambahdokumen($aPass);
     }
     else
     {
     $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$no,'refresh');
     }
  }
     
   
     //fifth file
   if($_POST['nama_fail5']<>''){
     if($this->upload->do_upload('userfile5'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail5'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->ptra_model->tambahdokumen($aPass);
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$no,'refresh');
     }
  }
         
     $lampiran_id = $this->input->post('lampiran_id');                
     $this->session->set_userdata(array('lampiran_id' => $lampiran_id));

    if($addDoc)
     {  
      $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Dokumen rujukan Berjaya Didaftarkan</font><br>');
      redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$no,'refresh');
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$no,'refresh');
     }
   
    }      
    else
    {
       $node_id = '14';
     $menu_name = 'menu1';
     $menu_link = 'ptra/dokumen_rujukan_ptra_editppd';
     
     $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
     $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
     $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
     $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
      
      if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan($this->uri->segment(3)))
     {
      $data['senarai_dokumen'] = $getDokumenrujukan;
     
     }
     
     $this->load->view('template/default', $data);
    } 
   
        }
        else
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/dokumen_rujukan_ptra_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }
                
                $this->load->view('template/default', $data);
    
        }
     }
  
   
 }
  
  /*
    Added : diana 25/10/2013
    Desc  : delete file & update table lampiran
  */
  function hapus_dokumen_rujukan_ptra_ppd()
  {
    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra_editppd';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
    $pspa =   $this->uri->segment(3);
    $ptraID = $this->uri->segment(4);
    $lampiranID = $this->uri->segment(5);
    
    
    $fileInfo = $this->ptra_model->get_documentInfo($lampiranID);
    $lokasiFile = $fileInfo[0];
    
    if($lokasiFile<>'')
    {
      $delete = $this->ptra_model->deleteDoc($lampiranID);
      
      if($delete===true)
      {
        //unlink file in directory
        $unlink = unlink($lokasiFile);
        
        if($unlink==true)
        { 
          $this->session->set_flashdata('flashError', '<strong><font color="blue" size="3">Dokumen Rujukan Berjaya Dihapus</font><br></strong><br>');
          redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$ptraID);
        }
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
          redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$ptraID);
        }
      }
      else
      {
        $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
        redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$ptraID);
      }
    }
    else
    {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
        redirect('ptra/dokumen_rujukan_ptra_editppd/'.$pspa.'/'.$ptraID);
    }
      
      
  }
  
  /*
    Added : diana 25/10/2013
    Desc  : download file
  */
  function muat_dokumen_rujukan_ptra_ppd($lampiran_id)
  {
    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra_editppd';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
     
    $ptraID = $this->uri->segment(4);
    $lampiranID = $this->uri->segment(5);
    
    $fileInfo = $this->ptra_model->get_documentInfo($lampiranID);
    $lokasiFile = $fileInfo[0];
    
    if($lokasiFile<>'')
    { 
      $data = file_get_contents($lokasiFile); // Read the file's contents
      $name = $fileInfo[1];

      force_download($name, $data);
    }
    
  }



//name : fatin
//date : 25/10/13
//desc : for summary_pp_ptra view
  function model_struktur_ptra_editpp ()
  {

              $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/model_struktur_ptra_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['pelan_kom'] = $this->ptra_model->get_model_summary_ptra($this->uri->segment(4));
 
                $data['year_list'] =year_dropdown();  //get year list 
                
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


   
  //xguna pun           
  function treeview_ptra_editpp ()
  {

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/treeview_ptra_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);
  }


//name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view
  function skop_aktiviti_ptra_editpp ()
  {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/skop_aktiviti_ptra_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_skop'] = $this->ptra_model->get_skop_summary_ptra($this->uri->segment(3));
            
                //$data['main_content'] = 'ptra/skop_aktiviti_ptra';
                $this->load->view('template/default', $data);
  }
       
//name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view 
        function skop_aktiviti2_ptra_editpp()
  {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/skop_aktiviti2_ptra_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['skop_a'] = $this->ptra_model->get_skop2_summary_ptra($this->uri->segment(3));
                //$data['senarai_sumber'] = $this->ptra_model->get_sumber_summary_ptra($this->uri->segment(3));

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
          
    //$data['main_content'] = 'ptra/skop_aktiviti2_ptra';
                $this->load->view('template/default', $data);
  }
        

 //name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view
        function kawalan_rekod_ptra_editpp ()
  {
    

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kawalan_rekod_ptra_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_kawalan'] = $this->ptra_model->get_kawalan_summary_ptra($this->uri->segment(3));

                if($getKawalanrekod = $this->ptra_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }

                
                //$data['main_content'] = 'ptra/kawalan_rekod_ptra';
                 $this->load->view('template/default', $data);
  }
        

//name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view
        function dokumen_rujukan_ptra_editpp ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_ptra view

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/dokumen_rujukan_ptra_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_dokumen'] = $this->ptra_model->get_dokumen_summary_ptra($this->uri->segment(3));
                
                //$data['main_content'] = 'ptra/dokumen_rujukan_ptra';

                if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }

                $this->load->view('template/default', $data);
  }







  function summary_ptf_ptra ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/summary_ptf_ptra';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $ptra_id = $this->uri->segment(4);
                $data['rows'] = $this->ptra_model->get_all_kandungan_ptra($ptra_id);
                if($getPtra = $this->ptra_model->get_ptra2($id,$ptra_id))
                {
                  $data['senarai_ptra'] = $getPtra;
                }
                $this->load->view('template/default', $data);
  }






function model_struktur_ptra_editptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_ptra view

              $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/model_struktur_ptra_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['pelan_kom'] = $this->ptra_model->get_model_summary_ptra($this->uri->segment(4));
 
                $data['year_list'] =year_dropdown();  //get year list 
                
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



  function skop_aktiviti_ptra_editptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_ptra view  


                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/skop_aktiviti_ptra_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_skop'] = $this->ptra_model->get_skop_summary_ptra($this->uri->segment(3));
            
                //$data['main_content'] = 'ptra/skop_aktiviti_ptra';
                $this->load->view('template/default', $data);
  }



  function skop_aktiviti2_ptra_editptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_ptra view 

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/skop_aktiviti2_ptra_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['skop_a'] = $this->ptra_model->get_skop2_summary_ptra($this->uri->segment(3));

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

                $this->load->view('template/default', $data);
  }




  function kawalan_rekod_ptra_editptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_ptra view  

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/kawalan_rekod_ptra_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_kawalan'] = $this->ptra_model->get_kawalan_summary_ptra($this->uri->segment(3));

                if($getKawalanrekod = $this->ptra_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }

                
                //$data['main_content'] = 'ptra/kawalan_rekod_ptra';
                 $this->load->view('template/default', $data);
  }



  function dokumen_rujukan_ptra_editptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_ptra view

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/dokumen_rujukan_ptra_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_dokumen'] = $this->ptra_model->get_dokumen_summary_ptra($this->uri->segment(3));
                
                //$data['main_content'] = 'ptra/dokumen_rujukan_ptra';

                if($getDokumenrujukan = $this->ptra_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }

                $this->load->view('template/default', $data);
  }



  function papar_panel_penilai_pp ()
  {
    //name : seri
    //date : 01/11/13
    //desc : for summary_pp_ptra view & model_struktur_ptra_editpp view 

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/papar_panel_penilai_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['senarai_panel'] = $this->ptra_model->get_panelpenilai_1($this->uri->segment(5));

               
                 $this->load->view('template/default', $data);
  }



  function papar_panel_penilai_ptf ()
  {
    //name : seri
    //date : 01/11/13
    //desc : for summary_ptf_ptra view & model_struktur_ptra_editptf view 

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'ptra/papar_panel_penilai_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['senarai_panel'] = $this->ptra_model->get_panelpenilai_1($this->uri->segment(5));

               
                 $this->load->view('template/default', $data);
  }



 
  //tambah panel penilai dekat pelan
  function tambahpanel()
         {
           if($_POST)
             {
               $node_id = '14';
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
                 //$utiliti_sumber_man_id = $this->uri->segment(3); 
                
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
                
                $addSumberMan = $this->utilitikeperluansumber_model->tambahsumberpanel();
               
                if($addSumberMan)
                {
                    //$ptra_id = $this->uri->segment(3);
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    //redirect('ptra/model_struktur_ptra/'.$no,'refresh');
                     redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan panel penilai.</font><br></strong><br>');
                    //redirect('ptra/kandungan_ptra/'.$no,'refresh');
                     redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                }                
            }      
            else
            {
                 
                $this->load->view('template/default', $data);
            } 
                
                
                
             }
         else
             {
             
                $this->load->view('template/default', $data);        
            }
         }
         
         
         
       function  tambahsumbermanusia()
        {
        if($_POST)
        {
           
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/sumber_manusia';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                //$utiliti_sumber_man_id = $this->uri->segment(3); 
                $sessionarray = $this->session->all_userdata();
                $user_kemid = $sessionarray['user_kemid'];
                
                
                if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia($user_kemid))
                {
                    $data['sumbermanusia'] = $getSumberManusia;
                
                }
                $data['countries'] = $this->negeri_model->get_negeri();
                
             //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                 $this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                  $this->form_validation->set_rules('level','Peringkat','trim|required|xss_clean');
               $this->form_validation->set_rules('jawatan','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gredjawatan','Gred Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa','Kos Lebih Masa','trim|required|xss_clean');

               
                
            if($this->form_validation->run())
            {   
        $addSumberMan = $this->utilitikeperluansumber_model->tambahsumbermanusia();

                if($addSumberMan)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    //redirect('utilitiKeperluanSumber/sumber_manusia');
                     redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                    //redirect('utilitiKeperluanSumber/sumber_manusia');
                    redirect('ptra/model_struktur_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                }                
            }      
            else
            {
                $this->load->view('template/default', $data);
            } 
        }
        else
        {

                $this->load->view('template/default', $data);
    
        }
    }
    



//tambah panel penilai dekat pelan
  function sumberrancang()
         {
           if($_POST)
             {
               
              $no= $this->input->post('ptra_id');
              $no2= $this->input->post('skop_aktvt_id');
             if($this->input->post('kosflag')=='1')
             {
                 $this->input->post('gaji');
                 
             }
              else
              {
                   $this->input->post('gaji');
                    $this->input->post('kos');
              }
              
                //$syarikat_id = $this->uri->segment(3);
             $ptra_pata_f6_1b1c_sumber_man_id = $this->uri->segment(3); 
                
             $this->form_validation->set_rules('kosflag','Kategori Alat Pejabat','trim|required|xss_clean');
               // $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
               // $this->form_validation->set_rules('syarikat_id','Nama Syarikat','trim|required|xss_clean');
                //$this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                
                
            if($this->form_validation->run())
            {
                $data['ptra_pata_f6_1b1c_sumber_man_id'] = $this->session->userdata('ptra_pata_f6_1b1c_sumber_man_id');
                $addSumberMan = $this->ptra_model->tambahsumberrancang();
                
                $ptra_pata_f6_1b1c_sumber_man_id = $this->input->post('ptra_pata_f6_1b1c_sumber_man_id');                
                $this->session->set_userdata(array('ptra_pata_f6_1b1c_sumber_man_id' => $ptra_pata_f6_1b1c_sumber_man_id));

                if($addSumberMan)
                {
                    //$ptra_id = $this->uri->segment(3);
                    //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    redirect('ptra/model_struktur_ptra/'.$no.'/'.$no2,'refresh');
                }
                else
                {
                    //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan panel penilai.</font><br></strong><br>');
                    redirect('ptra/skop_aktiviti2_ptra/'.$no.'/'.$no2,'refresh');
                }                
            }      
            else
            {
               $node_id = '14';
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
             
             
             $node_id = '14';
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
                
               
                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
         }


        function checkbox ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'checkbox';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'ptra/dokumen_rujukan_ptra';
                $this->load->view('template/default', $data);
  }

         
         
  //** END PTRA **//
  

}