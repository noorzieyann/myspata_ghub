<?php

class Pla extends CI_Controller {

	
    /*
    *   Author : Azura
    *   Title  : PLA
    */
 function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->load->library(array('table','validation'));
		
	$this->load->helper(array('form', 'url'));
      $this->load->helper('function_helper');
      $this->load->model('utama_model');
      $this->load->model('pspao_model');
      $this->load->model('negeri_model');
      $this->load->model('daerah_model');
      $this->load->library('Aauth');
      $this->load->model('pnpa_model','',TRUE);
      $this->load->model('pla_model','',TRUE);
      $this->load->model('menu/sidemenu_model');
      $this->load->model('utilitikeperluansumber_model');
      $this->load->library('pagination');
      $this->load->library('table');
      $sessionarray = $this->session->all_userdata();
      $this->load->helper('download');
      $this->load->model('function_model');
	  
	$this->load->model('popa_model','',TRUE);
	$this->load->model('ptra_model'); 
	$this->load->model('salinplan_model'); 
	$this->load->model('treeview_model'); 
	$this->load->model('skopaktiviti_model'); 
        
     //   $this->output->enable_profiler(TRUE); //display query statement
              
	   if(!$this->aauth->is_loggedin()){
        echo '<script>';
        echo 'alert("Belum Login");';
        echo 'window.location = "'.site_url('auth').'"';
        echo '</script>';
    }
    
    
  }
	//** Start PLA **//

           function arahan_penyediaan_pla()
        {
                //nama:Azura
                //date:8/7/13
                //desc:page arahan penyediaan pla
               // $data['main_content'] = 'pla/arahan_penyediaan_pla';
                //$this->load->view('template/default_pelan', $data);
        //}
                $node_id = '129';
                $menu_name = 'menu1';
                $menu_link = 'pla/arahan_penyediaan_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->pla_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->pla_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->pla_model->get_premis();
                $data['negeri'] = $this->pla_model->get_negeri();
                $data['daerah'] = $this->pla_model->get_daerah();
                
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

    $config['base_url'] = site_url('pla/arahan_penyediaan_pla');
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
        
                          
                            $this->load->view('template/default', $data);
            
                        }
                     else
                        {
                            $data['main_content'] = 'pla/arahan_penyediaan_pla';
                            $this->load->view('template/default', $data);
                      
                        }  
		
		
                 }
  
  
	   function senarai_pp_pla()
	{
		        //nama:Azura
                //date:11/9/13
                //desc:page senarai pegawai pengawal
		        //$data['main_content'] = 'pla/senarai_pp_pla';
                //$this->load->view('template/default_pelan', $data);


                $node_id = '85';
                $menu_name = 'menu1';
                $menu_link = 'pla/senarai_pp_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                
                if($getPla = $this->pla_model->get_pla())
              {
                $data['senarai_pla'] = $getPla;
              }
              
                $this->load->view('template/default', $data);
                
       }
        
		
        function senarai_ptf_pla()
	{
		        //nama:Azura
                //date:11/9/13
                //desc:page senarai pegawai teknikal fasiliti
            
                $node_id = '86';
                $menu_name = 'menu1';
                $menu_link = 'pla/senarai_ptf_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
                if($getPla = $this->pla_model->get_pla())
              {
                $data['senarai_pla'] = $getPla;
              }
              
                $this->load->view('template/default', $data);
              
        }
        
        function senarai_ppd_pla()
	{
                //nama:Azura
                //date:11/9/13
                //desc:page senarai pegawai penyedia dokumen
            
                $node_id = '87';
                $menu_name = 'menu1';
                $menu_link = 'pla/senarai_ppd_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
              if($getPla = $this->pla_model->get_pla())
    {          
       $data['senarai_pla'] = $getPla;
    }
              
            $this->load->view('template/default', $data);
        
    }

                        

//updated: fatin 25/11/13    
    function kandungan_pla()
    {
		  //name: Azura
		  //date: 08072013
		  //desc: penyediaan kandungan pla


                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pla/kandungan_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                if($getPnpa1 = $this->function_model->get_tab(6))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                //$data['year_list'] =year_dropdown();  //get year list 
				//get data year from table pspao
				$dataYear = $this->pnpa_model->get_year_pspao($this->uri->segment(3));
				
				//called function for selected year only
				$data['year_list_selected'] = year_dropdown_selected($dataYear[0],$dataYear[1]);

                if($getSumberManusia = $this->pla_model->get_kat_premis())
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

                    $pla_id = $this->pla_model->updatepla();

                      redirect('pla/model_struktur_pla/'.$this->uri->segment(3).'/'.$pla_id,'refresh');
               

                  }else{


                          $get_pspa_ptf_id = $this->pla_model->get_pspao_akhir_ptf($this->uri->segment(3));

                          $get_pspa_pp_id = $this->pla_model->get_pspao_akhir_pp($this->uri->segment(3));

                          $newdata = array(
                           'ptfid'  => $get_pspa_ptf_id,
                           'ppid'     => $get_pspa_pp_id,
                          
                          );

                          $this->session->set_userdata($newdata);


                    $pla_id = $this->pla_model->tambahpla(); 

                  }



                   if($pla_id)
                    {

                        //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('pla/model_struktur_pla/'.$this->uri->segment(3).'/'.$pla_id,'refresh');
                    }
                    else
                    {
                        //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                        redirect('pla/kandungan_pla/'.$this->uri->segment(3).'/'.$pla_id);
                    }      

                }


             } 
               
          $this->load->view('template/default', $data);
               
	}
        

	
	   function model_struktur_pla()
	{
		//Name : Azura
                //Date : 8/7/13
                //Desc : model stuktur pla

            if ($_POST)
          {
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


                if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa())
            {
               $data['senarai_lembagapemeriksa'] = $getLembagapemeriksa;
            }

            if($getPp = $this->pla_model->get_pp())
            {
               $data['senarai_pp'] = $getPp;
            }
			
            if($getPtf = $this->pla_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
			
            if($getPdf = $this->pla_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPif = $this->pla_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPof = $this->pla_model->get_pof())
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
            
             $this->form_validation->set_rules('pp[]', 'PP', 'trim|required|xss_clean');
             $this->form_validation->set_rules('ptf[]', 'PTF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pdf[]', 'PDF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pif[]', 'PIF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');
         
            $this->form_validation->set_rules('ahli_lembagapemeriksa[]', 'Ahli Lembaga Pemeriksa', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('pegawaikaitan', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
            $this->form_validation->set_rules('tjawabdankuasa', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pegawailain', 'Tugas Pegawai-Pegawai Lain Yang Ada Kaitan', 'trim|required|xss_clean');


            
            if($this->form_validation->run())
            {
                $data['pla_id'] = $this->session->userdata('pla_id');
                
                $data['pla_pata_f10_1a_modelstruktur_id'] = $this->session->userdata('pla_pata_f10_1a_modelstruktur_id');
                $addSumberMan = $this->pla_model->tambahmodelpla($pla_pata_f10_1a_modelstruktur_id);
                
                $pla_pata_f10_1a_modelstruktur_id = $this->input->post('pla_pata_f10_1a_modelstruktur_id');                
                $this->session->set_userdata(array('pla_pata_f10_1a_modelstruktur_id' => $pla_pata_f10_1a_modelstruktur_id));

                if($addSumberMan)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                    redirect('pla/treeview_pla/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                    redirect('pla/model_struktur_pla/'.$no,'refresh');
                }                
            } 
         else {
             
          

            $node_id = '58';
            $menu_name = 'menu1';
           // $menu_link = 'pla/model_struktur_pla';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
             $pla_pata_f10_1a_modelstruktur_id = $this->uri->segment(3);

            if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa())
            {
               $data['senarai_lembagapemeriksa'] = $getLembagapemeriksa;
            }

            if($getPp = $this->pla_model->get_pp())
            {
               $data['senarai_pp'] = $getPp;
            }
            
            if($getPtf = $this->pla_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            
            if($getPdf = $this->pla_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPif = $this->pla_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPof = $this->pla_model->get_pof())
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
            $menu_link = 'pla/model_struktur_pla';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      

            if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa())
            {
               $data['senarai_lembagapemeriksa'] = $getLembagapemeriksa;
            }

            if($getPp = $this->pla_model->get_pp())
            {
               $data['senarai_pp'] = $getPp;
            }
            
            if($getPtf = $this->pla_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            
            if($getPdf = $this->pla_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPif = $this->pla_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPof = $this->pla_model->get_pof())
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

       function tambah_lembagapemeriksa1()
        {
         if($_POST)
        {
           
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                $pla_pata_f10_1a_lembaga_pemeriksa_id = $this->uri->segment(3); 
                
                
                
                if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa())
                {
                    $data['senarai_lembagapemeriksa2'] = $getLembagapemeriksa;
                
                }
                
                $this->form_validation->set_rules('lembaga_pemeriksa_kategori_id','Kategori Lembaga Pemeriksa','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_lembagapemeriksa1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_syarikat1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_pej','No. Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');
                //$this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data['pla_pata_f10_1a_lembaga_pemeriksa_id'] = $this->session->userdata('pla_pata_f10_1a_lembaga_pemeriksa_id');
                $addPanel = $this->pla_model->tambah_lembagapemeriksa($pla_pata_f10_1a_lembaga_pemeriksa_id);
                
                $pla_pata_f10_1a_lembaga_pemeriksa_id = $this->input->post('pla_pata_f10_1a_lembaga_pemeriksa_id');                
                $this->session->set_userdata(array('pla_pata_f10_1a_lembaga_pemeriksa_id' => $pla_pata_f10_1a_lembaga_pemeriksa_id));

                if($addPanel)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Alat Pengurusan Pejabat Berjaya Didaftarkan</font><br>');
                    redirect('pla/tambah_lembagapemeriksa');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan.</font><br></strong><br>');
                    redirect('pla/tambah_lembagapemeriksa');
                }                
            }      
            else
            {
               $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                 if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa())
                {
                    $data['senarai_lembagapemeriksa2'] = $getLembagapemeriksa;
                
                }
 
                if($getLembagapemeriksa = $this->pla_model->get_nama_lembagapemeriksa())
                {
                   $data['senarai_lembagapemeriksa1'] = $getLembagapemeriksa;
                }

                $this->load->view('template/default', $data);
            } 
        }
        else
        {
            
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa())
                {
                    $data['senarai_lembagapemeriksa2'] = $getLembagapemeriksa;
                
                }
                
            if($getLembagapemeriksa = $this->pla_model->get_nama_lembagapemeriksa())
                {
                   $data['senarai_lembagapemeriksa1'] = $getLembagapemeriksa;
                }

                $this->load->view('template/default', $data);
    
        }
    }

    
    //tambah panel penilai dekat pelan
  function tambah_lembagapemeriksa()
         {
           if($_POST)
             {
               $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla';
                
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
                    //$pla_id = $this->uri->segment(3);
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    redirect('pla/model_struktur_pla/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan panel penilai.</font><br></strong><br>');
                    redirect('pla/kandungan_pla');
                }                
            }      
            else
            {
               $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla';
                
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
             
             
             $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla';
                
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
	
    
    function kemaskini_lembagapemeriksa()
         {
            
        
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/kemaskini_lembagapemeriksa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $pla_pata_f10_1a_lembaga_pemeriksa_id = $this->uri->segment(3);

                if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa_1($pla_pata_f10_1a_lembaga_pemeriksa_id))
                {
                    $data['senarai_lembagapemeriksa2'] = $getLembagapemeriksa;
                   // print_r($getLembagapemeriksa);
                   // die();

                }
                else
                    echo 'gagal';
                //die();

                if($get_nama_lembagapemeriksa = $this->pla_model->get_nama_lembagapemeriksa())
                {
                    $data['list_nama_lembagapemeriksa'] = $get_nama_lembagapemeriksa;
                
                $this->form_validation->set_rules('lembaga_pemeriksa_kategori_id','Kategori Lembaga Pemeriksa','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_lembagapemeriksa1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_syarikat1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_pej','No. Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');
                //$this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('lembaga_pemeriksa_kategori_id' => $this->input->post('lembaga_pemeriksa_kategori_id'),
                                        'nama_lembaga_pemeriksa' => $this->input->post('nama_lembagapemeriksa1'),
                                        'nama_syarikat' => $this->input->post('nama_syarikat1'),
                                        'email' => $this->input->post('emel'),
                                        'no_tel_pej' => $this->input->post('notel_pej'),
                                        'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                                        'jawatan' => $this->input->post('jawatan1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_lembagapemeriksa = $this->pla_model->update_lembagapemeriksa($pla_pata_f10_1a_lembaga_pemeriksa_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_lembagapemeriksa)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('pla/tambah_lembagapemeriksa');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('pla/kemaskini_lembagapemeriksa/'.$pla_pata_f10_1a_lembaga_pemeriksa_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
            }
	   
       
       function model_struktur_pla_editpp ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page model struktur pla
            
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                if($getSumberman_dalaman = $this->pla_model->get_sumberman_dalaman())
               {
                $data['sumber_dalaman'] = $getSumberman_dalaman;
               }
              
                $this->load->view('template/default', $data);
	}
       
	   
	   function model_struktur_pla_editpp2 ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page model struktur pla
            
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla_editpp2';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                if($getSumberman_luaran = $this->pla_model->get_sumberman_luaran())
               {
                $data['sumber_luaran'] = $getSumberman_luaran;
               }
              
                $this->load->view('template/default', $data);
	}
	   
	   
	   function papar_lembagapemeriksa_pp()
         {
            
        
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/papar_lembagapemeriksa_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $pla_pata_f10_1a_lembaga_pemeriksa_id = $this->uri->segment(3);

                if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa_1($pla_pata_f10_1a_lembaga_pemeriksa_id))
                {
                    $data['senarai_lembagapemeriksa2'] = $getLembagapemeriksa;
                   
                }
                else
                    echo 'gagal';
                //die();

                if($get_nama_lembagapemeriksa = $this->pla_model->get_nama_lembagapemeriksa())
                {
                    $data['list_nama_lembagapemeriksa'] = $get_nama_lembagapemeriksa;
                }

                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('lembaga_pemeriksa_kategori_id' => $this->input->post('lembaga_pemeriksa_kategori_id'),
                                        'nama_lembagapemeriksa' => $this->input->post('nama_lembaga_pemeriksa1'),
                                        'nama_syarikat' => $this->input->post('nama_syarikat1'),
                                        'email' => $this->input->post('emel'),
                                        'no_tel_pej' => $this->input->post('notel_pej'),
                                        'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                                        'jawatan' => $this->input->post('jawatan1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_lembagapemeriksa = $this->pla_model->update_lembagapemeriksa($pla_pata_f10_1a_lembaga_pemeriksa_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_lembagapemeriksa)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('pla/model_struktur_pla_editpp');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('pla/papar_lembagapemeriksa_pp/'.$pla_pata_f10_1a_lembaga_pemeriksa_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
	   
	   
	   function model_struktur_pla_editptf ()
	{
                //Name : Azura
               //Date : 22/9/13
               //Desc : model stuktur pla

               $node_id = '58';
               $menu_name = 'menu1';
               $menu_link = 'pla/model_struktur_pla_editptf';
                
               $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
               $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
               $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
               $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


               if($getSumberman_dalaman = $this->pla_model->get_sumberman_dalaman())
              {
               $data['sumber_dalaman'] = $getSumberman_dalaman;
              }
              
               $this->load->view('template/default', $data);
	}
	   
	   function kemaskini_lembaga_pemeriksa_ptf()
         {
            
        
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/kemaskini_lembaga_pemeriksa_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $pla_pata_f10_1a_panel_penilai_id = $this->uri->segment(3);

                if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa_1($pla_pata_f10_1a_lembaga_pemeriksa_id))
                {
                    $data['senarai_ahli2'] = $getLembagapemeriksa;
                   // print_r($getPanelpenilai);
                   // die();

                }
                else
                    echo 'gagal';
                //die();

                if($get_nama_lembagapemeriksa = $this->pla_model->get_nama_lembagapemeriksa())
                {
                    $data['list_nama_lembagapemeriksa'] = $get_nama_lembagapemeriksa;
                }

                $this->form_validation->set_rules('lembaga_pemeriksa_kategori_id','Kategori Ahli Lembaga Pemeriksa','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_lembaga_pemeriksa1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_syarikat1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_pej','No. Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');
                //$this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('lembaga_pemeriksa_kategori_id' => $this->input->post('lembaga_pemeriksa_kategori_id'),
                                        'nama_lembagapemeriksa' => $this->input->post('nama_lembaga_pemeriksa1'),
                                        'nama_syarikat' => $this->input->post('nama_syarikat1'),
                                        'email' => $this->input->post('emel'),
                                        'no_tel_pej' => $this->input->post('notel_pej'),
                                        'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                                        'jawatan' => $this->input->post('jawatan1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_lembagapemeriksa = $this->pla_model->update_lembagapemeriksa($pla_pata_f10_1a_lembaga_pemeriksa_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_lembagapemeriksa)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('pla/model_struktur_pla_editptf');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('pla/kemaskini_lembagapemeriksa/'.$pla_pata_f10_1a_lembaga_pemeriksa_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
	   
	   
       function model_struktur_pla_editptf2()
    {
               //Name : Azura
               //Date : 22/9/13
               //Desc : model stuktur pla

               $node_id = '58';
               $menu_name = 'menu1';
               $menu_link = 'pla/model_struktur_pla_editptf2';
                
               $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
               $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
               $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
               $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


               if($getSumberman_luaran = $this->pla_model->get_sumberman_luaran())
              {
               $data['sumber_luaran'] = $getSumberman_luaran;
              }
              
               $this->load->view('template/default', $data);
        
    }


	   function model_struktur_pla_editppd ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page model struktur pla
            
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
              
              if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa())
             {
              $data['senarai_lembagapemeriksa'] = $getLembagapemeriksa;
             }
              
            $this->load->view('template/default', $data);
	}
	   
	     
	   function kemaskini_lembagapemeriksa_ppd()
    {
            
        
                $node_id = '58';
                $menu_name = 'menu1';
                $menu_link = 'pla/kemaskini_lembagapemeriksa_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $pla_pata_f10_1a_lembaga_pemeriksa_id = $this->uri->segment(3);

                if($getLembagapemeriksa = $this->pla_model->get_lembagapemeriksa_1($pla_pata_f10_1a_lembaga_pemeriksa_id))
                {
                    $data['senarai_lembagapemeriksa2'] = $getLembagapemeriksa;
                   

                }
                else
                    echo 'gagal';
                //die();

                if($get_nama_lembagapemeriksa = $this->pla_model->get_nama_lembagapemeriksa())
                {
                    $data['list_nama_lembagapemeriksa'] = $get_nama_lembagapemeriksa;
                }

                $this->form_validation->set_rules('lembaga_pemeriksa_kategori_id','Kategori Ahli Lembaga Pemeriksa','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_lembagapemeriksa1','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('nama_syarikat1','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','E-mel','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_pej','No. Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');
                //$this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('lembaga_pemeriksa_kategori_id' => $this->input->post('lembaga_pemeriksa_kategori_id'),
                                        'nama_lembaga_pemeriksa' => $this->input->post('nama_lembagapemeriksa1'),
                                        'nama_syarikat' => $this->input->post('nama_syarikat1'),
                                        'email' => $this->input->post('emel'),
                                        'no_tel_pej' => $this->input->post('notel_pej'),
                                        'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                                        'jawatan' => $this->input->post('jawatan1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_lembagapemeriksa = $this->pla_model->update_lembagapemeriksa($pla_pata_f10_1a_lembaga_pemeriksa_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_lembagapemeriksa)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('pla/model_struktur_pla_editppd');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('pla/kemaskini_lembagapemeriksa_ppd/'.$pla_pata_f10_1a_lembaga_pemeriksa_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
    }
	   
	   
	   function treeview_pla ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            	 //updated : diana 2/12/13

    $node_id = '90';
	$menu_name = 'menu1';
	$menu_link = 'pla/treeview_pla';

	$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
	$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
	$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
	$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

		//$this->load->view('template/default', $data);
	  
		if($getPLA = $this->function_model->get_tab(6))
		{
		   $data['tab'] = $getPLA;
		}
		
		$data['senarai_skop'] = $this->treeview_model->get_skop('pla');
	
		if ($_POST)
		{
            
			if ($this->input->post('hantar') == 'Simpan Deraf')
			{
				if($this->input->post('sunting') != NULL)
				{
					$this->treeview_model->updatetreeview('pla');
				}
				else
				{
					$this->treeview_model->tambahtreeview('pla');
				}

				$this->pla_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
	
				$data['main_content'] = 'alert';
				$data['msg'] = 'Borang PLA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PLA.';
				$data['link'] = 'pla/senarai_ppd_pla/'.$this->uri->segment(3);
				$this->load->view('template/default', $data);
		   
			}
			else if($this->input->post('sunting') != NULL)
			{
				$update = $this->treeview_model->updatetreeview('pla');
				redirect('pla/skop_aktiviti_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
			}
			else
			{
				$addTreeview = $this->treeview_model->tambahtreeview('pla');

				if($addTreeview)
				{
					redirect('pla/skop_aktiviti_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
				}
				else
				{
				   redirect('pla/treeview_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
				}      
		   } 
		}
		else
		{
			$this->load->view('template/default', $data); 
		} 
	}
         
		 function treeview_pla_editpp ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '90';
                $menu_name = 'menu1';
                $menu_link = 'pla/treeview_pla_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
	
                $this->load->view('template/default', $data);
	}
		 
		 function treeview_pla_editptf ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '90';
                $menu_name = 'menu1';
                $menu_link = 'pla/treeview_pla_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
	
                $this->load->view('template/default', $data);
	}
		 
		 function treeview_pla_editppd ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            //updated : diana 28/11/13

		$node_id = '90';
		$menu_name = 'menu1';
		$menu_link = 'pla/treeview_pla_editppd';

		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                               
  
		if($getpla = $this->function_model->get_tab(6))
		{
		   $data['tab'] = $getpla;
		}
		
		$data['senarai_skop'] = $this->treeview_model->get_skop('pla');
	
		if ($_POST)
		{
            
			if ($this->input->post('hantar') == 'Simpan Deraf')
			{
				$this->treeview_model->updatetreeview('pla');
				
				$this->pla_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
	
				$data['main_content'] = 'alert';
				$data['msg'] = 'Borang PLA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PLA.';
				$data['link'] = 'pla/senarai_ppd_pla/'.$this->uri->segment(3);
				$this->load->view('template/default', $data);
		   
			}
			else
			{
				$addTreeview = $this->treeview_model->updatetreeview('pla');

				if($addTreeview)
				{
					redirect('pla/skop_aktiviti_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
				}
				else
				{
				   redirect('pla/treeview_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
				}      
		   } 
		}
		else
		{
			$this->load->view('template/default', $data); 
		} 
	}
		 
	     function skop_aktiviti_pla ()
	{

                //nama:Azura
                //date:8/7/13
                //desc:page table skop n aktiviti
            //updated : diana
            
                $node_id = '91';
                $menu_name = 'menu1';
                $menu_link = 'pla/skop_aktiviti_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                if($getPLA = $this->function_model->get_tab(6))
				{
				   $data['tab'] = $getPLA;
				}
				
				$data['senarai_skop'] = $this->treeview_model->get_skop('pla');
				$data['skop'] = $this->treeview_model->get_allskop('pla');
				
				
				if ($_POST)
				{
					if ($this->input->post('hantar') == 'Simpan Deraf')
					{				
						$this->pla_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah

						$data['main_content'] = 'alert';
						$data['msg'] = 'Borang PLA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PLA.';
						$data['link'] = 'pla/senarai_ppd_pla/'.$this->uri->segment(3);
						$this->load->view('template/default', $data);
				   
					}
				}
				else
				{
					$this->load->view('template/default', $data);
				}
	}
        
		function skop_aktiviti_pla_editpp ()
	{

                //nama:Azura
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '91';
                $menu_name = 'menu1';
                $menu_link = 'pla/skop_aktiviti_pla_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pla/skop_aktiviti_pla';
                $this->load->view('template/default', $data);
	}
		
		function skop_aktiviti_pla_editptf ()
	{

                //nama:Azura
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '91';
                $menu_name = 'menu1';
                $menu_link = 'pla/skop_aktiviti_pla_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pla/skop_aktiviti_pla';
                $this->load->view('template/default', $data);
	}
		
		function skop_aktiviti_pla_editppd ()
	{

                //nama:Azura
                //date:8/7/13
                //desc:page table skop n aktiviti
				//updated : diana 4/12/13
            
                $node_id = '91';
                $menu_name = 'menu1';
                $menu_link = 'pla/skop_aktiviti_pla_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                if($getPLA = $this->function_model->get_tab(6))
				{
				   $data['tab'] = $getPLA;
				}
				
				$data['senarai_skop'] = $this->treeview_model->get_skop('pla');
				$data['skop'] = $this->treeview_model->get_allskop('pla');
				
				
				if ($_POST)
				{
					if ($this->input->post('hantar') == 'Simpan Deraf')
					{				
						$this->pla_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah

						$data['main_content'] = 'alert';
						$data['msg'] = 'Borang PLA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PLA.';
						$data['link'] = 'pla/senarai_ppd_pla/'.$this->uri->segment(3);
						$this->load->view('template/default', $data);
				   
					}
				}
				else
				{
					$this->load->view('template/default', $data);
				}
				
	}
		
    function set_skop_aktiviti($idsumber)
	{
		$this->load->model('skopaktiviti_model');
		header('Content-Type: application/x-json; charset=utf-8');
		echo(json_encode($this->skopaktiviti_model->removesumberrancang($idsumber)));
	}
	
    function skop_aktiviti2_pla ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '92';
                $menu_name = 'menu1';
                $menu_link = 'pla/skop_aktiviti2_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            $data['obj_sbg'] = $this->skopaktiviti_model->get_obj_sebagai();
			$data['sumber_id'] = $this->skopaktiviti_model->get_sumber_id();
			$data['senarai_sumber'] = $this->skopaktiviti_model->get_sum_man();
			$data['senarai_alat_pej'] = $this->skopaktiviti_model->get_alat_pej();
			$data['senarai_fax'] = $this->skopaktiviti_model->get_fax();
			$data['senarai_tel'] = $this->skopaktiviti_model->get_telefon();
			$data['senarai_kom'] = $this->skopaktiviti_model->get_komputer();
			$data['senarai_pemeriksa'] = $this->skopaktiviti_model->get_pemeriksaan();
			$data['senarai_kenderaan'] = $this->skopaktiviti_model->get_kenderaan();
			$data['senarai_ppe'] = $this->skopaktiviti_model->get_ppe();

			if($getPLA = $this->function_model->get_tab(6))
			{
				   $data['tab'] = $getPLA;
			}

			if($_POST)
			{
				if($this->input->post('rancang') != NULL)
				{
					$check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('pla');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('pla');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('pla');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','pla');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','pla');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','pla');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','pla');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','pla');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','pla');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','pla');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','pla');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','pla');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','pla');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','pla'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','pla');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','pla');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','pla');
					}

					$this->skopaktiviti_model->tambahsumberrancang("rancang",'pla');
					redirect('pla/skop_aktiviti2_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
		   


//endofrancang          //  }else if($this->input->post('hantar') == 'Lulus'){      
            }else if($this->input->post('lulus') != NULL){      

                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('pla');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('pla');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('pla');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','pla');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','pla');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','pla');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','pla');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','pla');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','pla');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','pla');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','pla');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','pla');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','pla');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','pla'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','pla');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','pla');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','pla');
					}

                      $this->skopaktiviti_model->tambahsumberrancang("lulus",'pla');

                      redirect('pla/skop_aktiviti2_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
                     

//endoflulus                    //}else if($this->input->post('hantar') == 'Isi'){
          }else if($this->input->post('isi') != NULL){

                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('pla');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('pla');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('pla');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','pla');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','pla');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','pla');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','pla');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','pla');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','pla');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','pla');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','pla');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','pla');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','pla');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','pla'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','pla');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','pla');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','pla');
					}
					
                    $this->skopaktiviti_model->tambahsumberrancang("isi",'pla');

                    redirect('pla/skop_aktiviti2_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
//endofisi                     
                    }else{ //add new record

                    
                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('pla');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('pla');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('pla');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','pla');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','pla');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','pla');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','pla');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','pla');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','pla');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','pla');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','pla');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','pla');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','pla');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','pla'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','pla');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','pla');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','pla');
					}

					redirect('pla/skop_aktiviti_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    
                }

			}
			else
			{
				$this->load->view('template/default', $data);
			}
	}
        
		function skop_aktiviti2_pla_editpp ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '92';
                $menu_name = 'menu1';
                $menu_link = 'pla/skop_aktiviti2_pla_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
		//$data['main_content'] = 'pla/skop_aktiviti2_pla';
                $this->load->view('template/default', $data);
	}
		
		function skop_aktiviti2_pla_editptf ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '92';
                $menu_name = 'menu1';
                $menu_link = 'pla/skop_aktiviti2_pla_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
		//$data['main_content'] = 'pla/skop_aktiviti2_pla';
                $this->load->view('template/default', $data);
	}
		
		function skop_aktiviti2_pla_editppd ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:table untuk keperluan sumber
            //update: diana 4/12/13
            
                $node_id = '92';
                $menu_name = 'menu1';
                $menu_link = 'pla/skop_aktiviti2_pla_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
			$data['obj_sbg'] = $this->skopaktiviti_model->get_obj_sebagai();
			$data['sumber_id'] = $this->skopaktiviti_model->get_sumber_id();
			$data['senarai_sumber'] = $this->skopaktiviti_model->get_sum_man();
			$data['senarai_alat_pej'] = $this->skopaktiviti_model->get_alat_pej();
			$data['senarai_fax'] = $this->skopaktiviti_model->get_fax();
			$data['senarai_tel'] = $this->skopaktiviti_model->get_telefon();
			$data['senarai_kom'] = $this->skopaktiviti_model->get_komputer();
			$data['senarai_pemeriksa'] = $this->skopaktiviti_model->get_pemeriksaan();
			$data['senarai_kenderaan'] = $this->skopaktiviti_model->get_kenderaan();
			$data['senarai_ppe'] = $this->skopaktiviti_model->get_ppe();

			if($getPLA = $this->function_model->get_tab(6))
			{
				   $data['tab'] = $getPLA;
			}

			if($_POST)
			{
				if($this->input->post('rancang') != NULL)
				{
					$check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('pla');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('pla');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('pla');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','pla');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','pla');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','pla');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','pla');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','pla');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','pla');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','pla');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','pla');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','pla');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','pla');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','pla'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','pla');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','pla');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','pla');
					}

					$this->skopaktiviti_model->tambahsumberrancang("rancang",'pla');
					redirect('pla/skop_aktiviti_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
		   


//endofrancang          //  }else if($this->input->post('hantar') == 'Lulus'){      
            }else if($this->input->post('lulus') != NULL){      

                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('pla');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('pla');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('pla');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','pla');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','pla');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','pla');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','pla');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','pla');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','pla');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','pla');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','pla');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','pla');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','pla');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','pla'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','pla');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','pla');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','pla');
					}

                      $this->skopaktiviti_model->tambahsumberrancang("lulus",'pla');

                      redirect('pla/skop_aktiviti_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
                     

//endoflulus                    //}else if($this->input->post('hantar') == 'Isi'){
          }else if($this->input->post('isi') != NULL){

                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('pla');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('pla');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('pla');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','pla');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','pla');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','pla');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','pla');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','pla');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','pla');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','pla');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','pla');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','pla');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','pla');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','pla'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','pla');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','pla');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','pla');
					}
					
                    $this->skopaktiviti_model->tambahsumberrancang("isi",'pla');

                    redirect('pla/skop_aktiviti_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
//endofisi                     
                    }else{ //add new record

                    
                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('pla');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('pla');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('pla');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','pla');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','pla');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','pla');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','pla');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','pla');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','pla');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','pla');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','pla');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','pla');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','pla');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','pla'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','pla');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','pla');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','pla');
					}

					redirect('pla/skop_aktiviti_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    
                }

			}
			else
			{
				$this->load->view('template/default', $data);
			}
	}
		
        
        
        //updated: fatin 24/11/13
    function kawalan_rekod_pla()
    
    {
               
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pla/kawalan_rekod_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                if($getPnpa1 = $this->function_model->get_tab(6))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                if($getKawalanrekod = $this->pla_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
               
                
        if($_POST)
        {
             
            
                   if ($this->input->post('hantar') == 'Simpan Deraf')
                 {
                     

                   $this->pla_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
                    //echo 'ok';
                    //$data['detail_msg'] = $this->function_model->get_masej($id,7);
                    $data['main_content'] = 'alert';
                    $data['msg'] = 'Borang PLA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PLA.';
                    $data['link'] = 'pla/senarai_ppd_pla/'.$this->uri->segment(3);
                    //$this->load->view('template/default', $data);
                   
                      }
                      else
                      {
                $no= $this->input->post('no');
                $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
                $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
                $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                //$data['pla_pata_f10_1d_id'] = $this->session->userdata('pla_pata_f10_1d_id');
                $addRekod = $this->pla_model->tambahkawalan_rekod();
                
               // $pla_pata_f10_1d_id = $this->input->post('pla_pata_f10_1d_id');                
                //$this->session->set_userdata(array('pla_pata_f10_1d_id' => $pla_pata_f10_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('pla/kawalan_rekod_pla/'.$this->uri->segment(3).'/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('pla/kawalan_rekod_pla/'.$this->uri->segment(3).'/'.$no,'refresh');
                }                
            }
            } 
           $this->load->view('template/default', $data); 
        }
        else
        {$this->load->view('template/default', $data);
    
        }
        
    }
    
    //updated: fatin 24/11/13
    function kemaskinikawalan_rekod()
    
      {
        
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'pla/kemaskinikawalan_rekod';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$pla_pata_f10_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->pla_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f10_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f10_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->pla_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan Rekod Berjaya Dikemaskini</font><br>');
          
          redirect('pla/kawalan_rekod_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('pla/kemaskinikawalan_rekod/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }
    
		
		
	function kawalan_rekod_pla_editpp ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '93';
                $menu_name = 'menu1';
                $menu_link = 'pla/kawalan_rekod_pla_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		//$data['main_content'] = 'pla/kawalan_rekod_pla';
                 $this->load->view('template/default', $data);
	}
		
	function kawalan_rekod_pla_editptf ()
	{
                //nama:Azura
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '93';
                $menu_name = 'menu1';
                $menu_link = 'pla/kawalan_rekod_pla_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		//$data['main_content'] = 'pla/kawalan_rekod_pla';
                 $this->load->view('template/default', $data);
	}
		


    //update: fatin 24/11/13
    function kawalan_rekod_pla_editppd()
    
      //nama:azura
      //date:8/7/13
      //desc:page untuk kawalan rekod pla edit by ppd
    
    {
        
        $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pla/kawalan_rekod_pla_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                //tab
                if($getPnpa1 = $this->function_model->get_tab(6))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                //$pla_pata_f10_1d_id = $this->uri->segment(4); 
                 $no= $this->input->post('no');               
                
                if($getKawalanrekod = $this->pla_model->get_kawalanrekod($this->uri->segment(4)))
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
                //$data['pla_pata_f10_1d_id'] = $this->session->userdata('pla_pata_f10_1d_id');
                $addRekod = $this->pla_model->tambahkawalan_rekod();
                
               // $pla_pata_f10_1d_id = $this->input->post('pla_pata_f10_1d_id');                
                //$this->session->set_userdata(array('pla_pata_f10_1d_id' => $pla_pata_f10_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('pla/kawalan_rekod_pla_editppd/'.$this->uri->segment(3).'/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('pla/kawalan_rekod_pla_editppd/'.$this->uri->segment(3).'/'.$no,'refresh');
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


  
//update: fatin 24/11/13
  function kemaskinikawalan_rekod_ppd()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'pla/kemaskinikawalan_rekod_ppd';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$pla_pata_f10_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->pla_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f10_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f10_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->pla_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('pla/kawalan_rekod_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('pla/kemaskinikawalan_rekod_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }
        
		
        function dokumen_rujukan_pla ()
	{
                //nama:Azura
                //date:17/9/13
                //desc:page untuk dokumen rujukan
            
            if($_POST)
        {
                $node_id = '94';
                $menu_name = 'menu1';
                $menu_link = 'pla/dokumen_rujukan_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		        $lampiran_id = $this->uri->segment(3); 
                                
                
                if($getDokumenrujukan = $this->pla_model->get_dokumenrujukan())
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
                $addDoc = $this->pla_model->tambahdokumen($lampiran_id);
                
                $lampiran_id = $this->input->post('lampiran_id');                
                $this->session->set_userdata(array('lampiran_id' => $lampiran_id));

                if($addDoc)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Dokumen rujukan Berjaya Didaftarkan</font><br>');
                    redirect('pla/dokumen_rujukan_pla');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('pla/dokumen_rujukan_pla');
                }                
            }      
            else
            {
               $node_id = '94';
                $menu_name = 'menu1';
                $menu_link = 'pla/dokumen_rujukan_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                 if($getDokumenrujukan = $this->pla_model->get_dokumenrujukan())
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }
                
                $this->load->view('template/default', $data);
            } 
        }
        else
        {
            
                $node_id = '94';
                $menu_name = 'menu1';
                $menu_link = 'pla/dokumen_rujukan_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getDokumenrujukan = $this->pla_model->get_dokumenrujukan())
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }
                
                $this->load->view('template/default', $data);
    
        }
    }
         
		 function dokumen_rujukan_pla_editpp ()
	{
                //nama:Azura
                //date:17/9/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '94';
                $menu_name = 'menu1';
                $menu_link = 'pla/dokumen_rujukan_pla_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		        if($getDokumenrujukan = $this->pla_model->get_dokumenrujukan())
               {
                $data['senarai_dokumen'] = $getDokumenrujukan;
               }
              
                $this->load->view('template/default', $data);
	}
		 
		 function dokumen_rujukan_pla_editptf ()
	{
                //nama:Azura
                //date:17/9/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '94';
                $menu_name = 'menu1';
                $menu_link = 'pla/dokumen_rujukan_pla_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		        if($getDokumenrujukan = $this->pla_model->get_dokumenrujukan())
               {
                $data['senarai_dokumen'] = $getDokumenrujukan;
               }
              
                $this->load->view('template/default', $data);
	}
		 
		 function dokumen_rujukan_pla_editppd ()
	{
                //nama:Azura
                //date:17/9/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '94';
                $menu_name = 'menu1';
                $menu_link = 'pla/dokumen_rujukan_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		        if($getDokumenrujukan = $this->pla_model->get_dokumenrujukan())
               {
                $data['senarai_dokumen'] = $getDokumenrujukan;
               }
              
                $this->load->view('template/default', $data);
	}
	
        
        //updated: fatin 26/11/13
         function summary_pla ()
	{

		//nama:Azura
                //date:8/7/13
                //desc:summary page untuk penyediaan pla
             
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pla/summary_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                if($getPnpa1 = $this->function_model->get_tab(6))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $pla_id = $this->uri->segment(4);
                $data['rows'] = $this->pla_model->get_all_kandungan_pla($pla_id);
                if($getstatus = $this->function_model->check_status_log($id,4,$pla_id))
                 {
                     $data['statusid'] = $getstatus;
                }
                else
                {
                    $data['statusid'] ='';
                }
                //$data['statusid'] = $this->function_model->check_status_log($id,4,$pla_id);
                 if($getulasan = $this->pla_model->get_ulasan_terbaru($id,4,$pla_id))
                 {
                     $data['ulasan'] = $getulasan;
                }
                else
                {
                    $data['ulasan'] ='';
                }
                 //$data['ulasan'] = $this->pla_model->get_ulasan_terbaru($id,4,$pla_id);
                if($getPnpa = $this->pla_model->get_pla2($id,$pla_id))
                {
                    $data['senarai_pla'] = $getPnpa;
                }
              
      if($this->input->post('hantar') == 'hantar'){
          $this->pla_model->insert_status_log($id,2,$pla_id);
        
          $path = 'pla/summary_ptf_pla/'.$id.'/'.$pla_id;
          $this->function_model->insert_notifikasi(48,6,$sessionarray['user_id'],$this->pla_model->get_ptfid_pla($id),$path); 
        
          $path = 'pla/summary_pif_pla/'.$id.'/'.$pla_id;
          $this->function_model->insert_notifikasi(52,6,$sessionarray['user_id'],$this->pla_model->get_pifid_pla($id,1),$path); 
        
        //$data['detail_msg'] = $this->function_model->get_masej($id,7);
        $data['main_content'] = 'alert';
            $data['msg'] = 'Borang PLA  telah berjaya dihantar untuk disemak. Klik butang OK untuk kembali ke Senarai PLA.';
            $data['link'] = 'pla/senarai_ppd_pla/'.$id;
        
        //redirect('pspao/senarai_pspao_akhir','refresh');
        
      }else if($this->input->post('hantar') == 'Simpan Deraf'){
        //echo "<script>alert('Simpan Deraf')< /script>";
        //$this->pspao_akhir_model->update_kandungan_pspao($id);
        $this->pla_model->insert_status_log($id,1,$pla_id); //1=xx,2=xxx,3=pembetulan,4=sah
        
        //$data['detail_msg'] = $this->function_model->get_masej($id,7);
        $data['main_content'] = 'alert';
            $data['msg'] = 'Borang PLA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PLA.';
            $data['link'] = 'pla/senarai_ppd_pla/'.$id.'/'.$pla_id;
        
        //redirect('pspao/senarai_pspao_akhir','refresh');
        
      }else if($this->input->post('hantar') == 'Sunting'){
        //echo "<script>alert('Sunting')< /script>";
        $this->pla_model->update_kandungan_pla($id);
        redirect('pla/summary_pla/'.$this->uri->segment(3).'/'.$pla_id,'refresh');
        
      }
      
                //$data['main_content'] = 'pla/summary_pla';
                $this->load->view('template/default', $data);
  }
  
        
		
        function summary_pla_editppd ()
	{

		//nama:Azura
                //date:8/7/13
                //desc:summary page untuk penyediaan pla
             
                $node_id = '95';
                $menu_name = 'menu1';
                $menu_link = 'pla/summary_pla_editppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pla/summary_pla';
                $this->load->view('template/default', $data);
	}
		
        function summary_pp_pla ()
	{

		//nama:Azura
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '96';
                $menu_name = 'menu1';
                $menu_link = 'pla/summary_pp_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $this->load->view('template/default', $data);
	}
        
		function summary_pp_pla_editpp ()
	{

		//nama:Azura
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '96';
                $menu_name = 'menu1';
                $menu_link = 'pla/summary_pp_pla_editpp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $this->load->view('template/default', $data);
	}
		
        function summary_ptf_pla ()
	{

		//nama:Azura
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '97';
                $menu_name = 'menu1';
                $menu_link = 'pla/summary_ptf_pla';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $this->load->view('template/default', $data);
	}
        
		function summary_ptf_pla_editptf ()
	{

		//nama:Azura
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '97';
                $menu_name = 'menu1';
                $menu_link = 'pla/summary_ptf_pla_editptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $this->load->view('template/default', $data);
	}
	
	
	//tambah panel penilai dekat pelan
  function tambahpanel()
         {
           if($_POST)
             {
               $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pla/';
                
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
                    //$pla_id = $this->uri->segment(3);
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    redirect('pla/model_struktur_pla/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan panel penilai.</font><br></strong><br>');
                    redirect('pla/kandungan_pla');
                }                
            }      
            else
            {
               $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'pla/model_struktur_pla';
                
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
                $menu_link = 'pla/model_struktur_pla';
                
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
	
	//** END PLA **//
	
	}

