<?php

class Pnpa extends CI_Controller {

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
    //$this->load->model('pspao_model');
    $this->load->library('Aauth');
    $this->load->model('pnpa_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
    $this->load->model('utilitikeperluansumber_model');
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
  
  
 //** Start PNPA **//
 function arahan_penyediaan_pnpa()
  {
      
        
    $node_id = '123';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/arahan_penyediaan_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->pnpa_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->pnpa_model->get_negeri(); //dapatkan senarai negeri dr db
        
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
 function senarai_pp_pnpa()
  {
        //Name : Azian
        //Date : 12/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '41';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/senarai_pp_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        //$data['year_list'] =year_dropdown();  //get year list 
        //$data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        //$data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
    if($getPnpa = $this->pnpa_model->get_pnpa())
    {
       $data['senarai_pnpa'] = $getPnpa;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
        
        function senarai_ptf_pnpa()
  {
        //Name : Azian
        //Date : 12/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '41';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/senarai_ptf_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        //$data['year_list'] =year_dropdown();  //get year list 
        //$data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        //$data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
    if($getPnpa = $this->pnpa_model->get_pnpa())
    {
       $data['senarai_pnpa'] = $getPnpa;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
       function senarai_ppd_pnpa()
  {
        //Name : Azian
        //Date : 11/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '44';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/senarai_ppd_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


       // $data['year_list'] =year_dropdown();  //get year list 
       // $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
       // $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
       // $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
    

    if($getPnpa = $this->pnpa_model->get_pnpa())
    {
       $data['senarai_pnpa'] = $getPnpa;
    }
              
            $this->load->view('template/default', $data);
        
  }

   function senarai_pif_pnpa()
  {
        //Name : Azian
        //Date : 11/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '44';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/senarai_pif_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


       // $data['year_list'] =year_dropdown();  //get year list 
       // $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
       // $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
       // $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
    

    if($getPnpa = $this->pnpa_model->get_pnpa())
    {
       $data['senarai_pnpa'] = $getPnpa;
    }
              
            $this->load->view('template/default', $data);
        
  }

	function kandungan_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page penyediaan kandungan pnpa
		//$data['main_content'] = 'pnpa/kandungan_pnpa';
                //$this->load->view('template/default_pelan', $data);
            if($_POST)
            {
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kandungan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis(); //dapatkan senarai premis dr db
                //$session_id = $this->session->userdata('user_id'); 
                $pnpa_id = $this->uri->segment(3); 
                
                
                if($getSumberManusia = $this->pnpa_model->get_kat_premis())
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
                    $data['pnpa_id'] = $this->session->userdata('pnpa_id');
                    //$addPnpa = $this->pnpa_model->tambahpnpa($pnpa_id);

                    if($this->input->post('pnpa_id')!= NULL)
                        {
                            $pnpa_id = $this->pnpa_model->updatepnpa($this->input->post('pnpa_id'));
                        }
                    else
                        {
                           $pnpa_id = $this->pnpa_model->tambahpnpa();  
                        }
               
                    $this->session->set_userdata(array('pnpa_id' => $pnpa_id));

                    if($pnpa_id)
                    {

                        //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('pnpa/model_struktur_pnpa/'.$pnpa_id,'refresh');
                    }
                    else
                    {
                        //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                        redirect('pnpa/kandungan_pnpa');
                    }                
                }      
            else
            {
               $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kandungan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                 $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis(); //dapatkan senarai premis dr db
                 if($getSumberManusia = $this->pnpa_model->get_kat_premis())
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
                $menu_link = 'pnpa/kandungan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pnpa_model->get_premis(); //dapatkan senarai premis dr db
                //$session_id = $this->session->userdata('user_id'); 
               if($getSumberManusia = $this->pnpa_model->get_kat_premis())
                {
                    $data['katpremis'] = $getSumberManusia;
                
                }
                
                
                
                $this->load->view('template/default', $data);
            }
               
	}

	
    function model_struktur_pnpa()
         {
                //Name : Azian
                //Date : 13/9/13
                //Desc : model stuktur pnpa
          if ($_POST)
          {
            $node_id = '58';
            $menu_name = 'menu1';
            $menu_link = 'pnpa/model_struktur_pnpa';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      

            if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
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

           /*  $this->form_validation->set_rules('ptf', 'PTF', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pif', 'PIF', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pdf', 'PDF', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pof', 'POF', 'trim|required|xss_clean');
            $this->form_validation->set_rules('panel_penilai', 'Panel Penilai', 'trim|required|xss_clean'); */
            $this->form_validation->set_rules('pegawaikaitan', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
           // $this->form_validation->set_rules('tjawabdankuasa', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
           // $this->form_validation->set_rules('pegawailain', 'Tugas Pegawai-Pegawai Lain Yang Ada Kaitan', 'trim|required|xss_clean');


            
            if($this->form_validation->run())
                {
                    $data['pnpa_id'] = $this->session->userdata('pnpa_id');
                    //$addPnpa = $this->pnpa_model->tambahpnpa($pnpa_id);

                  if($this->input->post('pnpa_id')!= NULL)
                    {
                        if($this->input->post('cek_row') == 0)
                          {
                              // INSERT BARU DLM model struktur 
                              $pnpa_id = $this->pnpa_model->tambahmodelpnpa($this->input->post('pnpa_id'));
                              //echo "<script>alert('insert dlm table model struktur')< /script>";
            
                          }
                        else if($this->input->post('cek_row') == 1)
                          {
                              // UPDATE DLM model struktur
                              $pnpa_id = $this->pnpa_model->updatemodelpnpa($this->input->post('pnpa_id'));
                              //echo "<script>alert('update pnpa model struktur')< /script>";
                           }     
          
                          //$this->load->view('template/default',$data);
                          redirect('pnpa/model_struktur_pnpa/'.$pnpa_id,'refresh');
              
                    } 

                  }

            else  
                {
                      redirect('pnpa/model_struktur_pnpa/'.$pnpa_id,'refresh');

                }

                    redirect('pnpa/model_struktur_pnpa/'.$pnpa_id,'refresh');
                    $this->load->view('template/default', $data);
          }
          else 
          {

            $node_id = '58';
            $menu_name = 'menu1';
            $menu_link = 'pnpa/model_struktur_pnpa';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      

            if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
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
        
	function treeview_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '59';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
	
                $this->load->view('template/default', $data);
	}

	function skop_aktiviti_pnpa ()
	{

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '60';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti2_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '61';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
		//$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
	}
        
        function kawalan_rekod_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '63';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		//$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
	}
        
        function dokumen_rujukan_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '62';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		//$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
	}
        
         function summary_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan pnpa
             
                $node_id = '66';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
	}
   function summary_ppd_pnpa_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan pnpa
             
                $node_id = '132';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_ppd_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function summary_pp_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '64';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_pp_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default', $data);
	}
        
         function summary_pp_pnpa_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '130';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_pp_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default', $data);
  }
        function summary_ptf_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '65';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_ptf_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_ptf_pnpa';
                $this->load->view('template/default', $data);
	}

  function summary_ptf_pnpa_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '131';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_ptf_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_ptf_pnpa';
                $this->load->view('template/default', $data);
  } 
  

  function download()

  {
  $data = file_get_contents("/var/www/html/myspata/application/views/pnpa/suratLantikan.pdf"); // Read the file's contents
  $name = 'suratLantikan.pdf';

  force_download($name, $data);
}


  function model_struktur_pnpa_edit ($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
              $node_id = '133';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa_edit';
                
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

    $config['base_url'] = site_url('pnpa/model_struktur_pnpa_edit');
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
            
    
    
    $this->table->set_heading(anchor("pnpa/model_struktur_pnpa_edit/",'Bil','title="Klik untuk susun rekod"'), 
                              anchor("pnpa/model_struktur_pnpa_edit/",'Kategori ID','title="Klik untuk susun rekod"'),
                              anchor("pnpa/model_struktur_pnpa_edit/",'Nama','title="Klik untuk susun rekod"'),
                              anchor("pnpa/model_struktur_pnpa_edit/",'Syarikat','title="Klik untuk susun rekod"'),
                              anchor("pnpa/model_struktur_pnpa_edit/",'Surat Lantikan','title="Klik untuk susun rekod"'),
                              anchor("pnpa/model_struktur_pnpa_edit/",'Tindakan','title="Klik untuk susun rekod"'));

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
                 
  
    $data['main_content'] = 'pnpa/model_struktur_pnpa';
                $this->load->view('template/default', $data);
  }
        }
        
  function treeview_pnpa_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '134';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);
  }

  function skop_aktiviti_pnpa_edit ()
  {

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '135';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_pnpa_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '136';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_pnpa_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '137';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }
        
        function dokumen_rujukan_pnpa_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
  }

  function model_struktur_pnpa_edit_ppd ()
  {
              $node_id = '133';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa_edit_ppd';
                
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

    $config['base_url'] = site_url('pnpa/model_struktur_pnpa_edit_ppd');
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
            
    
    
    $this->table->set_heading('Bil', 'Kategori ID','Nama','Syarikat', 'Surat Lantikan','Tindakan');

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
                 
  
    $data['main_content'] = 'pnpa/model_struktur_pnpa_ppd';
                $this->load->view('template/default', $data);
  }
        }
        
  function treeview_pnpa_edit_ppd ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '134';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);
  }

  function skop_aktiviti_pnpa_edit_ppd ()
  {

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '135';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_pnpa_edit_ppd ()
  {
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '136';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_pnpa_edit_ppd ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '137';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }
        
        function dokumen_rujukan_pnpa_edit_ppd ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
  }


  function model_struktur_pnpa_edit_pp ()
  {
              $node_id = '133';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa_edit_pp';
                
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

    $config['base_url'] = site_url('pnpa/model_struktur_pnpa_edit_pp');
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
            
    
    
    $this->table->set_heading('Bil', 'Kategori ID','Nama','Syarikat', 'Surat Lantikan','Tindakan');

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
                 
  
    $data['main_content'] = 'pnpa/model_struktur_pnpa_pp';
                $this->load->view('template/default', $data);
  }
        }
        
  function treeview_pnpa_edit_pp ()
  {
                //nama:yann
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

  function skop_aktiviti_pnpa_edit_pp ()
  {

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '135';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_pnpa_edit_pp ()
  {
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '136';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_pnpa_edit_pp ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '137';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }
        
        function dokumen_rujukan_pnpa_edit_pp ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
  }

 
  //tambah panel penilai dekat pelan
  function tambahpanel()
         {
           if($_POST)
             {
               $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa';
                
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
                    //$pnpa_id = $this->uri->segment(3);
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    redirect('pnpa/model_struktur_pnpa/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan panel penilai.</font><br></strong><br>');
                    redirect('pnpa/kandungan_pnpa');
                }                
            }      
            else
            {
               $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa';
                
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
                $menu_link = 'pnpa/model_struktur_pnpa';
                
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


	//** END PNPA **//
	
	
}
