<?php

  class Popa extends CI_Controller 
  {
    
    
    function __construct()
    {
      parent::__construct();

      #load library dan helper yang diperlukan

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
      $this->load->model('popa_model','',TRUE);
      $this->load->model('menu/sidemenu_model');
      $this->load->model('utilitikeperluansumber_model');
      $this->load->library('pagination');
      $this->load->library('table');
      $sessionarray = $this->session->all_userdata();
      $this->load->helper('download');
      $this->load->model('function_model');
	  
	$this->load->model('ptra_model'); 
	$this->load->model('function_model');       
	$this->load->model('salinplan_model'); 
	$this->load->model('treeview_model'); 
	$this->load->model('skopaktiviti_model'); 
     // $this->output->enable_profiler(TRUE); //display query statement
    
      
      if(!$this->aauth->is_loggedin())
      {
        echo '<script>';
        echo 'alert("Belum Login");';
        echo 'window.location = "'.site_url('auth').'"';
        echo '</script>';
      }
    
    }
    

	

    //**START POPA**//
	
	  function senarai_pp_popa()
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
      $data['status'] = $this->popa_model->get_status(); //dapatkan senarai status dr db
                
    
      if($getSenPopa = $this->popa_model->get_senarai_popa())
      {
        $data['senaraipopa'] = $getSenPopa;
      }
     

      $this->load->view('template/default', $data);

    }



		
                
        
    function senarai_ptf_popa()
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
        

        

    function senarai_pof_popa()
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
 
     /* $data['year_list'] =year_dropdown();  //get year list 
      $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
      $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
      $data['premis'] = $this->popa_model->get_premis();  //dapatkan senarai premis dr db
      $data['status'] = $this->popa_model->get_status(); //dapatkan senarai status dr db
      */
       $sessionarray = $this->session->all_userdata();
    $pspa_id = $this->uri->segment(3);  
    if($getPnpa1 = $this->function_model->get_tab(3))
    {
       $data['tab'] = $getPnpa1;
    }  
      if($getSenPopa = $this->popa_model->get_senarai_popa($pspa_id))
      {
        $data['senaraipopa'] = $getSenPopa;
      }

      $this->load->view('template/default', $data);
    
    }




    function summary_pp_popa_edit()
    {
      //name: Seri Idayu
      //date: 08072013
      //desc: summary pp popa edit
       

      $node_id = '178';
      $menu_name = 'menu1';
      $menu_link = 'popa/summary_pp_popa_edit';

      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

      $data['year_list'] =year_dropdown();  //get year list 

      $this->load->view('template/default', $data);

    }




    function summary_ptf_popa_edit ()
    {
      //nama: seri idayu
      //date:8/7/13
      //desc:summary page untuk pegawai teknikal fasiliti
            
                
      $node_id = '186';
      $menu_name = 'menu1';
      $menu_link = 'popa/summary_ptf_popa_edit';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
      $data['year_list'] =year_dropdown();  //get year list 
          
      $this->load->view('template/default', $data);
    } 




    function summary_pof_popa_edit()
    {

      //nama:seri
      //date:8/7/13
      //desc:summary page untuk pof popa
      

      $node_id = '194';
      $menu_name = 'menu1';
      $menu_link = 'popa/summary_pof_popa_edit';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
      $data['year_list'] =year_dropdown();  //get year list 
      $this->load->view('template/default', $data);
    }




    function summary_ppd_popa_edit ()
    {
      //nama:seri idayu
      //date:8/7/13
      //desc:summary page untuk penyediaan popa
             

      $node_id = '186';
      $menu_name = 'menu1';
      $menu_link = 'popa/summary_ppd_popa_edit';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
      $data['year_list'] =year_dropdown();  //get year list
      $this->load->view('template/default', $data);
    }


//update: fatin 22/11/13 

    function kandungan_popa()

    {
		  //name: Seri Idayu
		  //date: 08072013
		  //desc: penyediaan kandungan popa


                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'popa/kandungan_popa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                if($getPnpa1 = $this->function_model->get_tab(3))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                //$data['year_list'] =year_dropdown();  //get year list 
				//get data year from table pspao
				$dataYear = $this->pnpa_model->get_year_pspao($this->uri->segment(3));
				
				//called function for selected year only
				$data['year_list_selected'] = year_dropdown_selected($dataYear[0],$dataYear[1]);

                if($getSumberManusia = $this->popa_model->get_kat_premis())
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

                    $popa_id = $this->popa_model->updatepopa();

                      redirect('popa/model_struktur_popa/'.$this->uri->segment(3).'/'.$popa_id,'refresh');
               

                  }else{


                          $get_pspa_ptf_id = $this->popa_model->get_pspao_akhir_ptf($this->uri->segment(3));

                          $get_pspa_pp_id = $this->popa_model->get_pspao_akhir_pp($this->uri->segment(3));

                          $newdata = array(
                           'ptfid'  => $get_pspa_ptf_id,
                           'ppid'     => $get_pspa_pp_id,
                          
                          );

                          $this->session->set_userdata($newdata);


                    $popa_id = $this->popa_model->tambahpopa(); 

                  }



                   if($popa_id)
                    {

                        //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('popa/model_struktur_popa/'.$this->uri->segment(3).'/'.$popa_id,'refresh');
                    }
                    else
                    {
                        //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                        redirect('popa/kandungan_popa/'.$this->uri->segment(3).'/'.$popa_id);
                    }      

                }


             } 
               
          $this->load->view('template/default', $data);
               
	}
        
        

    function kandungan_popa2()
    {
      $node_id = '13';
      $menu_name = 'menu1';
      $menu_link = 'popa/kandungan_popa';
      
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      

      if($getSumberManusia = $this->popa_model->get_kat_premis())
      {
        $data['katpremis'] = $getSumberManusia;
      }

      $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
      
      $this->form_validation->set_rules('tahun','Tahun','trim|required|xss_clean');
                        
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



      if ($this->form_validation->run() == FALSE)
      {
        $this->load->view('template/default',$data);
      }


      else
      {
        if($this->input->post('sunting') != NULL)
        {
          $idpopa = $this->popa_model->update_popa($this->input->post('sunting'));
        }
        else
        {
          $idpopa = $this->popa_model->insert_popa();
        }
        
        redirect('popa/tambahpanel_penilai/'.$idpopa,'refresh');
      }
                       
    }


                
      
        
    function model_struktur_popa()
     {
        $node_id = '75';
        $menu_name = 'menu1';
        $menu_link = 'popa/model_struktur_popa';
            
        $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
        $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
        $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
        $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
         if($getPnpa1 = $this->function_model->get_tab(3))
        {
           $data['tab'] = $getPnpa1;
        } 
        if($getKontraktor_fasiliti = $this->popa_model->get_senarai_kont_fas())
        {
          $data['kontraktor_fasiliti'] = $getKontraktor_fasiliti;
        }

        if($getPtf = $this->popa_model->get_ptf())
        {
          $data['senarai_ptf'] = $getPtf;
        }

        if($getPif = $this->popa_model->get_pif())
        {
          $data['senarai_pif'] = $getPif;
        }

        if($getPdf = $this->popa_model->get_pdf())
        {
          $data['senarai_pdf'] = $getPdf;
        }

        if($getPof = $this->popa_model->get_pof())
        {
          $data['senarai_pof'] = $getPof;
        }

        if($getPentadbiran = $this->popa_model->get_pentadbiran())
        {
          $data['senarai_pentadbiran'] = $getPentadbiran;
        }

        if($getSivil = $this->popa_model->get_sivil())
        {
          $data['senarai_sivil'] = $getSivil;
        }

        if($getMekanikal = $this->popa_model->get_mekanikal())
        {
          $data['senarai_mekanikal'] = $getMekanikal;
        } 

        if($getElektrik = $this->popa_model->get_elektrik())
        {
          $data['senarai_elektrik'] = $getElektrik;
        }
        if($getKatkon = $this->popa_model->get_kontraktor())
        {
          $data['kontraktor'] = $getKatkon;
        }
        $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();

      if ($_POST)
            {
 
            if($this->input->post('simpankontraktor') == 'Simpan')
                 {
                        $this->form_validation->set_rules('nama_kontraktor','Nama','trim|required|xss_clean');
                        $this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                        $this->form_validation->set_rules('syarikat_id','Nama Syarikat','trim|required|xss_clean');
                        $this->form_validation->set_rules('emel','Emel','trim|required|xss_clean');
                        $this->form_validation->set_rules('no_tel_bimbit','No telefon bimbit','trim|required|xss_clean');
                        
                        //validation untuk popup sumber dalaman
                        if($this->form_validation->run())
                         {
                              $check_data = $this->popa_model->count_data_in_tbl_popa_pata_f7_model();

                              if($check_data == 0)
                                  {
                                    $this->popa_model->tambahmodelpopa();

                                  }
                            else
                                {
                                    $this->popa_model->updatemodelstruktur();
                                   //$this->ptra_model->updatepanelkom();
                                     $this->popa_model->updatekontraktorfasiliti();

                                }
                            $this->popa_model->tambahkontraktorfasiliti();
                            redirect('popa/model_struktur_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 
                        } 
               
                     else
                        {

                        $this->load->view('template/default', $data);
           
                        }
                 }
                         
//deraf
              else if ($this->input->post('simpan') == 'Seterusnya')
                 {
                    
                              $check_data = $this->popa_model->count_data_in_tbl_popa_pata_f7_model();

                              if($check_data == 0)
                                  {
                                    $this->popa_model->tambahmodelpopa();

                                  }
                            else
                                {
                               // echo 'xyah bt';                                  
                                     $this->popa_model->updatemodelstruktur();
                                   //$this->ptra_model->updatepanelkom();
                                     $this->popa_model->updatekontraktorfasiliti();

                                }
                            // echo 'jd kot';    
                   redirect('popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 

                      }

        }
      else 
      {
       

        $this->load->view('template/default', $data);
      }


    } 

    function model_struktur_popa_edit()
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




    function model_struktur_popa_edit_pp ()
    {
      //Name: Seri Idayu
      //Date: 21/09/2013
      //Desc: Model struktur POPA edit page for pegawai pengawal


      $node_id = '193';
      $menu_name = 'menu1';
      $menu_link = 'popa/model_struktur_popa_edit_pp';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                         
      if($getSumberman_dalaman = $this->popa_model->get_sumberman_dalaman())
      {
        $data['sumber_dalaman'] = $getSumberman_dalaman;
      }
              
      
      $this->load->view('template/default', $data);

    }
	
        
    



    function model_struktur_popa_edit_pp2 ()
    {
      //Name: Seri Idayu
      //Date: 21/09/2013
      //Desc: Model struktur POPA edit page for pegawai pengawal, for tab luaran


      $node_id = '193';
      $menu_name = 'menu1';
      $menu_link = 'popa/model_struktur_popa_edit_pp2';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                         
      if($getKontraktor_fasiliti = $this->popa_model->get_senarai_kont_fas())
      {
        $data['kontraktor_fasiliti'] = $getKontraktor_fasiliti;
      }
              
      $this->load->view('template/default', $data);

    }





    function model_struktur_popa_edit_ptf ()
    {
      //Name: Seri Idayu
      //Date: 21/09/2013
      //Desc: Model struktur POPA edit page for ptf


      $node_id = '193';
      $menu_name = 'menu1';
      $menu_link = 'popa/model_struktur_popa_edit_ptf';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                         
      if($getSumberman_dalaman = $this->popa_model->get_sumberman_dalaman())
      {
        $data['sumber_dalaman'] = $getSumberman_dalaman;
      }
              
      
      $this->load->view('template/default', $data);

    }




    function model_struktur_popa_edit_ptf2 ()
    {
      //Name: Seri Idayu
      //Date: 21/09/2013
      //Desc: Model struktur POPA edit page for ptf, for tab luaran


      $node_id = '193';
      $menu_name = 'menu1';
      $menu_link = 'popa/model_struktur_popa_edit_ptf2';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                         
      if($getKontraktor_fasiliti = $this->popa_model->get_senarai_kont_fas())
      {
        $data['kontraktor_fasiliti'] = $getKontraktor_fasiliti;
      }
      

      $this->load->view('template/default', $data);

    }





    function model_struktur_popa_edit_pof()
    {
      //nama:seri
      //date:8/7/13
      //desc:summary page untuk pof
      

      $node_id = '195';
      $menu_name = 'menu1';
      $menu_link = 'popa/model_struktur_popa_edit_pof';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                

      if($getSumberman_dalaman = $this->popa_model->get_sumberman_dalaman())
      {
        $data['sumber_dalaman'] = $getSumberman_dalaman;
      }

                
      $this->load->view('template/default', $data);
    }





    function model_struktur_popa_edit_pof2()
    {
      //nama:seri
      //date:8/7/13
      //desc:summary page untuk pof, for tab luaran
            

      $node_id = '195';
      $menu_name = 'menu1';
      $menu_link = 'popa/model_struktur_popa_edit_pof2';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                

      if($getKontraktor_fasiliti = $this->popa_model->get_senarai_kont_fas())
      {
        $data['kontraktor_fasiliti'] = $getKontraktor_fasiliti;
      }
                
      
      $this->load->view('template/default', $data);
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
      $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
      $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
      $data['premis'] = $this->popa_model->get_premis();   //dapatkan senarai jabatan dr db
      $data['status'] = $this->popa_model->get_status(); //dapatkan senarai premis dr db
               
      $data['main_content'] = 'popa/model_struktur_popa_edit_ppd';
      
      if($getKontraktor_fasiliti = $this->popa_model->get_senarai_kont_fas())
      {
        $data['kontraktor_fasiliti'] = $getKontraktor_fasiliti;
      }

      if($getPtf = $this->popa_model->get_ptf())
      {
        $data['senarai_ptf'] = $getPtf;
      }

      if($getPif = $this->popa_model->get_pif())
      {
        $data['senarai_pif'] = $getPif;
      }

      if($getPdf = $this->popa_model->get_pdf())
      {
        $data['senarai_pdf'] = $getPdf;
      }

      if($getPof = $this->popa_model->get_pof())
      {
        $data['senarai_pof'] = $getPof;
      }

      if($getPentadbiran = $this->popa_model->get_pentadbiran())
      {
        $data['senarai_pentadbiran'] = $getPentadbiran;
      }

      if($getSivil = $this->popa_model->get_sivil())
      {
        $data['senarai_sivil'] = $getSivil;
      }

      if($getMekanikal = $this->popa_model->get_mekanikal())
      {
        $data['senarai_mekanikal'] = $getMekanikal;
      }

      if($getElektrik = $this->popa_model->get_elektrik())
      {
        $data['senarai_elektrik'] = $getElektrik;
      }
              
      $this->load->view('template/default', $data);
    }
        
function kemaskini_kontraktor_fasiliti()
    {
      $node_id = '18';
      $menu_name = 'menu1';
      $menu_link = 'popa/kemaskini_kontraktor_fasiliti';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
        if($getPnpa1 = $this->function_model->get_tab(3))
        {
           $data['tab'] = $getPnpa1;
        }      
      if($getKontraktor_fasiliti = $this->popa_model->get_kontraktor2($this->uri->segment(5)))
                {
                    $data['senarai_kontraktor'] = $getKontraktor_fasiliti;
                 
                }
    if($getKatkon = $this->popa_model->get_kontraktor())
        {
          $data['kontraktor'] = $getKatkon;
        }
            $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();
    if($getKatkon = $this->popa_model->get_kontraktor())
        {
          $data['kontraktor'] = $getKatkon;
        }
                $this->form_validation->set_rules('nama','Nama Kontraktor','trim|required|xss_clean');
                $this->form_validation->set_rules('syarikat_id','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('emel','Email','trim|required|xss_clean');
                $this->form_validation->set_rules('no_tel_bimbit','No. Telefon Bimbit','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                   
                    $update_kontraktor = $this->popa_model->updatekontraktorfasilitibaru($this->uri->segment(5));
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_kontraktor)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kontraktor Fasiliti Berjaya Dikemaskini</font><br>');
                        redirect('popa/model_struktur_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('popa/kemaskini_kontraktor_fasiliti/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(4),'refresh');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
            

function pelan_komunikasi_popa()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'popa/pelan_komunikasi_popa';

      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      $data['negeri'] = $this->popa_model->get_negeri();

         if($getPnpa1 = $this->function_model->get_tab(3))
        {
           $data['tab'] = $getPnpa1;
        }
      if($getUpf = $this->popa_model->get_upf())
        {
          $data['senaraiupf'] = $getUpf;
        }

      if($getPelan_komunikasi = $this->popa_model->get_senarai_pelan_komunikasi())
      {
        $data['pelan_komunikasi'] = $getPelan_komunikasi;
      }

      if($getPihak_pembekal = $this->popa_model->get_senarai_pihak_pembekal())
      {
        $data['pihak_pembekal'] = $getPihak_pembekal;
      }

      if($getAlat_ganti = $this->popa_model->get_senarai_alat_ganti())
      {
        $data['alat_ganti'] = $getAlat_ganti;
      }
         
      
      if ($_POST)
      {
          
       if($this->input->post('simpanpelankom') == 'Simpan')
       {
           $this->form_validation->set_rules('perkara','Perkara','trim|required|xss_clean');
            $this->form_validation->set_rules('alamat_kom','Alamat','trim|required|xss_clean');
            $this->form_validation->set_rules('no_tel_kom','No Telefon','trim|required|xss_clean');
            $this->form_validation->set_rules('no_fax_kom','No Faks','trim|required|xss_clean');
            

                        //validation untuk popup sumber dalaman
                        if($this->form_validation->run())
                         {
                               //echo 'jd laaa';
                            $this->popa_model->tambahpelanKom();
                             // echo 'xjd laaa';
                            redirect('popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                   
                        }
                        else
                        {

                        $this->load->view('template/default', $data);
           
                        }
       }
       
       else if($this->input->post('simpan') == 'Seterusnya')
       {
                  $check_data = $this->popa_model->count_data_in_tbl_popa_pelan_kecemasan_alatganti();
                  $check_data2 = $this->popa_model->count_data_in_tbl_popa_pelan_kecemasan();

                              if($check_data == 0 && $check_data2 == 0)
                                  { 
                                   $this->popa_model->tambahalatgantipopa();
                                    //echo 'jd bt'; 
                                  }
                            else
                                {
                                //echo 'xyah bt';                                  
                                     $this->popa_model->updatealatgantipopa();
                                   $this->popa_model->updateupfpopa();
                                     //$this->popa_model->updatekontraktorfasiliti();

                                }
                            // echo 'jd kot';    
                   redirect('popa/treeviewskop_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 
       }
       
        else if($this->input->post('simpanpembekal') == 'Simpan')
       {
             $this->form_validation->set_rules('nama_pembekal','Nama Pembekal','trim|required|xss_clean');
            $this->form_validation->set_rules('alamat_pembekal','Alamat Pembekal','trim|required|xss_clean');
            $this->form_validation->set_rules('jalan_pembekal','Jalan','trim|required|xss_clean');
            $this->form_validation->set_rules('bandar_pembekal','Bandar','trim|required|xss_clean');
             $this->form_validation->set_rules('negeri','negeri','trim|required|xss_clean');
            $this->form_validation->set_rules('poskod_pembekal','Poskod','trim|required|xss_clean');
            $this->form_validation->set_rules('no_tel_pembekal','No Telefon','trim|required|xss_clean');
            $this->form_validation->set_rules('no_faks_pembekal','No Faks','trim|required|xss_clean');
            $this->form_validation->set_rules('emel_pembekal','Emel','trim|required|xss_clean');
            
            

                        //validation untuk popup sumber dalaman
                        if($this->form_validation->run())
                         {
                               //echo 'jd laaa';
                            $this->popa_model->tambahpembekal();
                             // echo 'xjd laaa';
                             redirect('popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                   
                        }
                        else
                        {

                        $this->load->view('template/default', $data);
           
                        }
                 
       }
        else if($this->input->post('simpanalatganti') == 'Simpan')
       {
            $this->form_validation->set_rules('pembekal_id_alat_ganti','Pembekal','trim|required|xss_clean');
            $this->form_validation->set_rules('nama_alat_ganti','Nama Alat Ganti','trim|required|xss_clean');
            

                        //validation untuk popup sumber dalaman
                        if($this->form_validation->run())
                         {
                               //echo 'jd laaa';
                            $this->popa_model->tambahalatganti();
                             // echo 'xjd laaa';
                            redirect('popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                   
                        }
                        else
                        {

                        $this->load->view('template/default', $data);
           
                        }
       
       }
   
       else
       {
           echo 'jxd laaa';
       }
      }
     
      $this->load->view('template/default', $data);
    }
 function kemaskini_pelan_kom_pembekal()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'popa/kemaskini_pelan_kom_pembekal';

      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      $data['negeri'] = $this->popa_model->get_negeri();

         if($getPnpa1 = $this->function_model->get_tab(3))
        {
           $data['tab'] = $getPnpa1;
        }
       if($getPihak_pembekal = $this->popa_model->get_pembekal($this->uri->segment(5)))
      {
        $data['pihak_pembekal'] = $getPihak_pembekal;
      }

       
       $this->form_validation->set_rules('nama_pembekal','Nama Pembekal','trim|required|xss_clean');
            $this->form_validation->set_rules('alamat_pembekal','Alamat Pembekal','trim|required|xss_clean');
            $this->form_validation->set_rules('jalan_pembekal','Jalan','trim|required|xss_clean');
            $this->form_validation->set_rules('bandar_pembekal','Bandar','trim|required|xss_clean');
            $this->form_validation->set_rules('negeri','negeri','trim|required|xss_clean');
            $this->form_validation->set_rules('poskod_pembekal','Poskod','trim|required|xss_clean');
            $this->form_validation->set_rules('no_tel_pembekal','No Telefon','trim|required|xss_clean');
            $this->form_validation->set_rules('no_faks_pembekal','No Faks','trim|required|xss_clean');
            $this->form_validation->set_rules('emel_pembekal','Emel','trim|required|xss_clean');
            

                if($this->form_validation->run())
                {
                   
                   $this->popa_model->updatepelanKompembekal($this->uri->segment(5));
                   redirect('popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                   
                }
      $this->load->view('template/default', $data);

    }
    
    function kemaskini_pelan_kom()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'popa/kemaskini_pelan_kom';

      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      $data['negeri'] = $this->popa_model->get_negeri();

         if($getPnpa1 = $this->function_model->get_tab(3))
        {
           $data['tab'] = $getPnpa1;
        }
       if($getPihak_pembekal = $this->popa_model->get_pelan_kom($this->uri->segment(5)))
      {
        $data['pelan_kom'] = $getPihak_pembekal;
      }

        $this->form_validation->set_rules('perkara','Perkara','trim|required|xss_clean');
            $this->form_validation->set_rules('alamat_kom','Alamat','trim|required|xss_clean');
            $this->form_validation->set_rules('no_tel_kom','No Telefon','trim|required|xss_clean');
            $this->form_validation->set_rules('no_fax_kom','No Faks','trim|required|xss_clean');
            

                if($this->form_validation->run())
                {
                   
                   $this->popa_model->updatepelanKom($this->uri->segment(5));
                   redirect('popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                   
                }
      $this->load->view('template/default', $data);

    }
     
    function kemaskini_alat_ganti()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'popa/kemaskini_alat_ganti';

      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      $data['negeri'] = $this->popa_model->get_negeri();

         if($getPnpa1 = $this->function_model->get_tab(3))
        {
           $data['tab'] = $getPnpa1;
        }
         if($getPihak_pembekal = $this->popa_model->get_senarai_pihak_pembekal())
      {
        $data['pihak_pembekal'] = $getPihak_pembekal;
      }

       if($getPihak_pembekal = $this->popa_model->get_alatganti($this->uri->segment(5)))
      {
        $data['alat_ganti'] = $getPihak_pembekal;
      }
            $this->form_validation->set_rules('pembekal_id_alat_ganti','Pembekal','trim|required|xss_clean');
            $this->form_validation->set_rules('nama_alat_ganti','Nama Alat Ganti','trim|required|xss_clean');
                    

                if($this->form_validation->run())
                {
                   
                   $this->popa_model->updatealatganti($this->uri->segment(5));
                   redirect('popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                   
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
                
		if($getPOPA = $this->function_model->get_tab(3))
		{
		   $data['tab'] = $getPOPA;
		}
		
		$data['senarai_skop'] = $this->treeview_model->get_skop('popa');
	
		if ($_POST)
		{
            
			if ($this->input->post('hantar') == 'Simpan Deraf')
			{
				if($this->input->post('sunting') != NULL)
				{
					$this->treeview_model->updatetreeview('popa');
				}
				else
				{
					$this->treeview_model->tambahtreeview('popa');
				}

				$this->popa_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
	
				$data['main_content'] = 'alert';
				$data['msg'] = 'Borang POPA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai POPA.';
				$data['link'] = 'popa/senarai_ppd_popa/'.$this->uri->segment(3);
				$this->load->view('template/default', $data);
		   
			}
			else if($this->input->post('sunting') != NULL)
			{
				$update = $this->treeview_model->updatetreeview('popa');
				redirect('popa/skop_aktiviti_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
			}
			else
			{
				$addTreeview = $this->treeview_model->tambahtreeview('popa');

				if($addTreeview)
				{
					redirect('popa/skop_aktiviti_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
				}
				else
				{
				   redirect('popa/treeviewskop_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
				}      
		   } 
		}
		else
		{
			$this->load->view('template/default', $data); 
		} 
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





    function treeviewskop_popa_edit_ptf ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page treeview untuk skop n aktiviti for ptf edit
            
            
      $node_id = '179';
      $menu_name = 'menu1';
      $menu_link = 'popa/treeviewskop_popa_edit_ptf';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
      $this->load->view('template/default', $data);
    }





    function treeviewskop_popa_edit_pof ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page treeview untuk skop n aktiviti for pof edit
            
            
      $node_id = '179';
      $menu_name = 'menu1';
      $menu_link = 'popa/treeviewskop_popa_edit_pof';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
      $this->load->view('template/default', $data);
    }




    function treeviewskop_popa_edit_ppd ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page treeview untuk skop n aktiviti for pof edit
		//updated : diana 28/11/13
            
            
      $node_id = '179';
      $menu_name = 'menu1';
      $menu_link = 'popa/treeviewskop_popa_edit_ppd';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
		if($getPOPA = $this->function_model->get_tab(3))
		{
		   $data['tab'] = $getPOPA;
		}
		
		$data['senarai_skop'] = $this->treeview_model->get_skop('popa');
	
		if ($_POST)
		{
            
			if ($this->input->post('hantar') == 'Simpan Deraf')
			{
				$this->treeview_model->updatetreeview('popa');
				
				$this->popa_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
	
				$data['main_content'] = 'alert';
				$data['msg'] = 'Borang POPA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai POPA.';
				$data['link'] = 'popa/senarai_ppd_popa/'.$this->uri->segment(3);
				$this->load->view('template/default', $data);
		   
			}
			else
			{
				$addTreeview = $this->treeview_model->updatetreeview('popa');

				if($addTreeview)
				{
					redirect('popa/skop_aktiviti_popa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
				}
				else
				{
				   redirect('popa/treeviewskop_popa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
				}      
		   } 
		}
		else
		{
			$this->load->view('template/default', $data); 
		} 
    }


    function skop_aktiviti_popa()
    {
      //name: Seri Idayu
      //date: 08072013
      //desc: skop dan aktiviti popa
//updated : diana 28/11/13

		$node_id = '77';
		$menu_name = 'menu1';
		$menu_link = 'popa/skop_aktiviti_popa';


		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
		
		if($getPOPA = $this->function_model->get_tab(3))
		{
		   $data['tab'] = $getPOPA;
		}
		
		$data['senarai_skop'] = $this->treeview_model->get_skop('popa');
        $data['skop'] = $this->treeview_model->get_allskop('popa');
		
		
		if ($_POST)
		{
			if ($this->input->post('hantar') == 'Simpan Deraf')
			{				
				$this->popa_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
				$data['main_content'] = 'alert';
				$data['msg'] = 'Borang POPA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai POPA.';
				$data['link'] = 'popa/senarai_ppd_popa/'.$this->uri->segment(3);
				$this->load->view('template/default', $data);
		   
			}
		}
		else
		{
			$this->load->view('template/default', $data);
		}
    }




    function skop_aktiviti_popa_edit()
    {
      //name: Seri Idayu
      //date: 08072013
      //desc: skop dan aktiviti popa page edit


      $node_id = '146';
      $menu_name = 'menu1';
      $menu_link = 'popa/skop_aktiviti_popa_edit';

      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
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
            
                
      $this->load->view('template/default', $data);
    }




    function skop_aktiviti_popa_edit_ptf ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page table skop n aktiviti for ptf to edit
            
      
      $node_id = '180';
      $menu_name = 'menu1';
      $menu_link = 'popa/skop_aktiviti_popa_edit_ptf';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                
      $this->load->view('template/default', $data);
    }





    function skop_aktiviti_popa_edit_pof ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page table skop n aktiviti for pof to edit
            
                
      $node_id = '180';
      $menu_name = 'menu1';
      $menu_link = 'popa/skop_aktiviti_popa_edit_pof';
                
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
       //updated :diana     
      
      $node_id = '189';
      $menu_name = 'menu1';
      $menu_link = 'popa/skop_aktiviti_popa_edit_ppd';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
      if($getPOPA = $this->function_model->get_tab(3))
		{
		   $data['tab'] = $getPOPA;
		}
		
		$data['senarai_skop'] = $this->treeview_model->get_skop('popa');
        $data['skop'] = $this->treeview_model->get_allskop('popa');
		
		
		if ($_POST)
		{
			if ($this->input->post('hantar') == 'Simpan Deraf')
			{				
				$this->popa_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah

				$data['main_content'] = 'alert';
				$data['msg'] = 'Borang POPA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai POPA.';
				$data['link'] = 'popa/senarai_ppd_popa/'.$this->uri->segment(3);
				$this->load->view('template/default', $data);
		   
			}
		}
		else
		{
			$this->load->view('template/default', $data);
		}
    }



	
    function skop_aktiviti2_popa()
    {
		  //name: Seri Idayu
		  //date: 08072013
		  //desc: skop dan aktiviti 2 popa
      

      //update : diana 29/11/13
      

		$node_id = '78';
		$menu_name = 'menu1';
		$menu_link = 'popa/skop_aktiviti2_popa';

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

			if($getPOPA = $this->function_model->get_tab(3))
			{
				   $data['tab'] = $getPOPA;
			}

			if($_POST)
			{
				if($this->input->post('rancang') != NULL)
				{
					$check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('popa');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('popa');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('popa');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','popa');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','popa');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','popa');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','popa');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','popa');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','popa');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','popa');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','popa');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','popa');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','popa');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','popa'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','popa');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','popa');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','popa');
					}

					$this->skopaktiviti_model->tambahsumberrancang("rancang",'popa');
					redirect('popa/skop_aktiviti2_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
		   


//endofrancang          //  }else if($this->input->post('hantar') == 'Lulus'){      
            }else if($this->input->post('lulus') != NULL){      

                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('popa');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('popa');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('popa');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','popa');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','popa');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','popa');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','popa');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','popa');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','popa');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','popa');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','popa');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','popa');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','popa');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','popa'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','popa');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','popa');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','popa');
					}

                      $this->skopaktiviti_model->tambahsumberrancang("lulus",'popa');

                      redirect('popa/skop_aktiviti2_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
                     

//endoflulus                    //}else if($this->input->post('hantar') == 'Isi'){
          }else if($this->input->post('isi') != NULL){

                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('popa');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('popa');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('popa');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','popa');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','popa');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','popa');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','popa');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','popa');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','popa');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','popa');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','popa');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','popa');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','popa');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','popa'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','popa');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','popa');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','popa');
					}
					
                    $this->skopaktiviti_model->tambahsumberrancang("isi",'popa');

                    redirect('popa/skop_aktiviti2_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
//endofisi                     
                    }else{ //add new record

                    
                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('popa');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('popa');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('popa');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','popa');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','popa');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','popa');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','popa');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','popa');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','popa');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','popa');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','popa');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','popa');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','popa');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','popa'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','popa');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','popa');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','popa');
					}

					redirect('popa/skop_aktiviti_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    
                }

			}
			else
			{
				$this->load->view('template/default', $data);
			}

    }
	
  



    function skop_aktiviti2_popa_edit()
    {
      //name: Seri Idayu
      //date: 08072013
      //desc: skop dan aktiviti 2 popa for edit
            
    
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
                
            
      $this->load->view('template/default', $data);
    }




    function skop_aktiviti2_popa_edit_ppd ()
    {
      //nama:seri
      //date:8/7/13
      //desc:skop aktiviti 2 popa utk edit oleh ppd
       //updated : diana    
      
      $node_id = '190';
      $menu_name = 'menu1';
      $menu_link = 'popa/skop_aktiviti2_popa_edit_ppd';
                
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

			if($getPOPA = $this->function_model->get_tab(3))
			{
				   $data['tab'] = $getPOPA;
			}

			if($_POST)
			{
				if($this->input->post('rancang') != NULL)
				{
					$check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('popa');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('popa');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('popa');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','popa');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','popa');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','popa');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','popa');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','popa');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','popa');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','popa');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','popa');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','popa');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','popa');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','popa'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','popa');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','popa');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','popa');
					}

					$this->skopaktiviti_model->tambahsumberrancang("rancang",'popa');
					redirect('popa/skop_aktiviti_popa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
		   


//endofrancang          //  }else if($this->input->post('hantar') == 'Lulus'){      
            }else if($this->input->post('lulus') != NULL){      

                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('popa');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('popa');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('popa');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','popa');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','popa');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','popa');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','popa');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','popa');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','popa');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','popa');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','popa');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','popa');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','popa');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','popa'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','popa');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','popa');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','popa');
					}

                      $this->skopaktiviti_model->tambahsumberrancang("lulus",'popa');

                      redirect('popa/skop_aktiviti_popa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
                     

//endoflulus                    //}else if($this->input->post('hantar') == 'Isi'){
          }else if($this->input->post('isi') != NULL){

                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('popa');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('popa');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('popa');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','popa');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','popa');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','popa');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','popa');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','popa');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','popa');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','popa');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','popa');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','popa');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','popa');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','popa'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','popa');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','popa');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','popa');
					}
					
                    $this->skopaktiviti_model->tambahsumberrancang("isi",'popa');

                    redirect('popa/skop_aktiviti_popa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
//endofisi                     
                    }else{ //add new record

                    
                    $check_data = $this->skopaktiviti_model->count_data_in_tbl_1b1c('popa');
                     
                    if($check_data == 0){ 
						$this->skopaktiviti_model->tambahskopaktiviti('popa');
					}else{
						$this->skopaktiviti_model->updateskopaktiviti('popa');
                    }
					  
					  
                    $foto = $this->input->post('foto');
					$this->skopaktiviti_model->delete_urus_pej('foto','popa');
                    if(is_array($foto)){
						$this->skopaktiviti_model->insert_urus_pej('foto','popa');
					}


                    $fax = $this->input->post('fax');
					$this->skopaktiviti_model->delete_urus_pej('fax','popa');
					if(is_array($fax)){
						$this->skopaktiviti_model->insert_urus_pej('fax','popa');
					}

                    $tel = $this->input->post('tel');
                    $this->skopaktiviti_model->delete_urus_pej('tel','popa');
					if(is_array($tel)){
						$this->skopaktiviti_model->insert_urus_pej('tel','popa');
					}

                    $kom = $this->input->post('kom');
                    $this->skopaktiviti_model->delete_alat_kerja('kom','popa');
					if(is_array($kom)){
						$this->skopaktiviti_model->insert_alat_kerja('kom','popa');
					}

                    $pem = $this->input->post('pem');
                    $this->skopaktiviti_model->delete_alat_kerja('pem','popa');
                    if(is_array($pem)){
						$this->skopaktiviti_model->insert_alat_kerja('pem','popa');
                    }

					
                    $ken = $this->input->post('ken');
					$this->skopaktiviti_model->delete_alat_kerja('ken','popa'); 
                    if(is_array($ken)){
						$this->skopaktiviti_model->insert_alat_kerja('ken','popa');
					}


                    $ppe = $this->input->post('ppe');
					$this->skopaktiviti_model->delete_alat_kerja('ppe','popa');
					if(is_array($ppe)){
					$this->skopaktiviti_model->insert_alat_kerja('ppe','popa');
					}

					redirect('popa/skop_aktiviti_popa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    
                }

			}
			else
			{
				$this->load->view('template/default', $data);
			}
    }
     
        
 //update: fatin 22/11/13
    function kawalan_rekod_popa()
    {
               
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'popa/kawalan_rekod_popa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                if($getPnpa1 = $this->function_model->get_tab(3))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                if($getKawalanrekod = $this->popa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
               
                
        if($_POST)
        {
             
            
                   if ($this->input->post('hantar') == 'Simpan Deraf')
                 {
                     

                   $this->popa_model->insert_status_log($this->uri->segment(3),1,$this->uri->segment(4)); //1=xx,2=xxx,3=pembetulan,4=sah
                    //echo 'ok';
                    //$data['detail_msg'] = $this->function_model->get_masej($id,7);
                    $data['main_content'] = 'alert';
                    $data['msg'] = 'Borang POPA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai POPA.';
                    $data['link'] = 'popa/senarai_ppd_popa/'.$this->uri->segment(3);
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
                //$data['popa_pata_f7_1d_id'] = $this->session->userdata('popa_pata_f7_1d_id');
                $addRekod = $this->popa_model->tambahkawalan_rekod();
                
               // $popa_pata_f7_1d_id = $this->input->post('popa_pata_f7_1d_id');                
                //$this->session->set_userdata(array('popa_pata_f7_1d_id' => $popa_pata_f7_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('popa/kawalan_rekod_popa/'.$this->uri->segment(3).'/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('popa/kawalan_rekod_popa/'.$this->uri->segment(3).'/'.$no,'refresh');
                }                
            }
            } 
           $this->load->view('template/default', $data); 
        }
        else
        {$this->load->view('template/default', $data);
    
        }
        
    }
    
    //update: fatin 22/11/13
    function kemaskinikawalan_rekod()
    
      {
        
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'popa/kemaskinikawalan_rekod';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$popa_pata_f7_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->popa_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f7_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f7_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->popa_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan Rekod Berjaya Dikemaskini</font><br>');
          
          redirect('popa/kawalan_rekod_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('popa/kemaskinikawalan_rekod/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
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


      if($getSenKaw = $this->popa_model->get_senarai_kawalan_rekod())
      {
        $data['senaraikawalan'] = $getSenKaw;
      }
      

      $this->load->view('template/default', $data);
    }





    function kawalan_rekod_popa_edit_ptf ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page untuk kawalan rekod
    

      $node_id = '183';
      $menu_name = 'menu1';
      $menu_link = 'popa/kawalan_rekod_popa_edit_ptf';
                
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





    function kawalan_rekod_popa_edit_pof ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page untuk kawalan rekod bagi edit pof
    

      $node_id = '183';
      $menu_name = 'menu1';
      $menu_link = 'popa/kawalan_rekod_popa_edit_pof';
                
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





    //update: fatin 23/11/13
    function kawalan_rekod_popa_edit_ppd ()  
    
      //nama:seri
      //date:8/7/13
      //desc:page untuk kawalan rekod popa edit by ppd
    
    {
        
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'popa/kawalan_rekod_popa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                if($getPnpa1 = $this->function_model->get_tab(3))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                //$popa_pata_f7_1d_id = $this->uri->segment(4); 
                 $no= $this->input->post('no');               
                
                if($getKawalanrekod = $this->popa_model->get_kawalanrekod($this->uri->segment(4)))
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
                //$data['popa_pata_f7_1d_id'] = $this->session->userdata('popa_pata_f7_1d_id');
                $addRekod = $this->popa_model->tambahkawalan_rekod();
                
               // $popa_pata_f7_1d_id = $this->input->post('popa_pata_f7_1d_id');                
                //$this->session->set_userdata(array('popa_pata_f7_1d_id' => $popa_pata_f7_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('popa/kawalan_rekod_popa_edit_ppd/'.$this->uri->segment(3).'/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('popa/kawalan_rekod_popa_edit_ppd/'.$this->uri->segment(3).'/'.$no,'refresh');
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
    
    

  //update: fatin 23/11/13
  function kemaskinikawalan_rekod_ppd()
    
    {
      
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'popa/kemaskinikawalan_rekod_ppd';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$popa_pata_f7_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->popa_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f7_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f7_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->popa_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('popa/kawalan_rekod_popa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('popa/kemaskinikawalan_rekod_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

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


      if($getSenDok = $this->popa_model->get_senarai_dokumen())
      {
        $data['senaraidokumen'] = $getSenDok;
      }
      

      $this->load->view('template/default', $data);
    }





    function dokumen_rujukan_popa_edit_ptf ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page untuk dokumen rujukan for ptf to edit
            
            
      $node_id = '138';
      $menu_name = 'menu1';
      $menu_link = 'popa/dokumen_rujukan_popa_edit_ptf';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


      if($getSenDok = $this->popa_model->get_senarai_dokumen())
      {
        $data['senaraidokumen'] = $getSenDok;
      }
      

      $this->load->view('template/default', $data);

    }





    function dokumen_rujukan_popa_edit_pof ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page untuk dokumen rujukan for pof to edit
            
            
      $node_id = '138';
      $menu_name = 'menu1';
      $menu_link = 'popa/dokumen_rujukan_popa_edit_pof';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


      if($getSenDok = $this->popa_model->get_senarai_dokumen())
      {
        $data['senaraidokumen'] = $getSenDok;
      }
      

      $this->load->view('template/default', $data);
    }


  


    function dokumen_rujukan_popa_edit_ppd ()
    {
      //nama:seri
      //date:8/7/13
      //desc:page untuk dokumen rujukan for ppd to edit
            
            
      $node_id = '192';
      $menu_name = 'menu1';
      $menu_link = 'popa/dokumen_rujukan_popa_edit_ppd';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    
      if($getSenDok = $this->popa_model->get_senarai_dokumen())
      {
        $data['senaraidokumen'] = $getSenDok;
      }

      $this->load->view('template/default', $data);
    }




    //updated: fatin 25/11/13
    //updated:azian 08/12/13
    function summary_popa()
    {
		  //name: Seri Idayu
		  //date: 08072013
		  //desc: summary popa

    
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'popa/summary_popa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                if($getPnpa1 = $this->function_model->get_tab(3))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                
                
                 $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $popa_id = $this->uri->segment(4);

                $data['rows'] = $this->popa_model->get_all_kandungan_popa($popa_id);
                if($getstatus = $this->function_model->check_status_log($id,3,$popa_id))
                 {
                     $data['statusid'] = $getstatus;
                }
                else
                {
                    $data['statusid'] ='';
                }
                //$data['statusid'] = $this->function_model->check_status_log($id,4,$popa_id);
                 if($getulasan = $this->popa_model->get_ulasan_terbaru($id,2,$popa_id))
                 {
                     $data['ulasan'] = $getulasan;
                }
                else
                {
                    $data['ulasan'] ='';
                }
                 //$data['ulasan'] = $this->popa_model->get_ulasan_terbaru($id,4,$popa_id);
                if($getPnpa = $this->popa_model->get_popa2($id,$popa_id))
                {
                    $data['senarai_popa'] = $getPnpa;
                }
              
      if($this->input->post('hantar') == 'hantar'){
          $this->popa_model->insert_status_log($id,2,$popa_id);
        
          $path = 'popa/summary_ptf_popa/'.$id.'/'.$popa_id;
          $this->function_model->insert_notifikasi(48,3,$sessionarray['user_id'],$this->popa_model->get_ptfid_popa($id),$path); 
        
          $path = 'popa/summary_pif_popa/'.$id.'/'.$popa_id;
          $this->function_model->insert_notifikasi(52,3,$sessionarray['user_id'],$this->popa_model->get_pifid_popa($id,1),$path); 
        
        //$data['detail_msg'] = $this->function_model->get_masej($id,7);
        $data['main_content'] = 'alert';
            $data['msg'] = 'Borang POPA  telah berjaya dihantar untuk disemak. Klik butang OK untuk kembali ke Senarai POPA.';
            $data['link'] = 'popa/senarai_ppd_popa/'.$id;
        
        //redirect('pspao/senarai_pspao_akhir','refresh');
        
      }else if($this->input->post('hantar') == 'Simpan Deraf'){
        //echo "<script>alert('Simpan Deraf')< /script>";
        //$this->pspao_akhir_model->update_kandungan_pspao($id);
        $this->popa_model->insert_status_log($id,1,$popa_id); //1=xx,2=xxx,3=pembetulan,4=sah
        
        //$data['detail_msg'] = $this->function_model->get_masej($id,7);
        $data['main_content'] = 'alert';
            $data['msg'] = 'Borang POPA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai POPA.';
            $data['link'] = 'popa/senarai_ppd_popa/'.$id.'/'.$popa_id;
        
        //redirect('pspao/senarai_pspao_akhir','refresh');
        
      }else if($this->input->post('hantar') == 'Sunting'){
        //echo "<script>alert('Sunting')< /script>";
        $this->popa_model->update_kandungan_popa($id);
        redirect('popa/summary_popa/'.$this->uri->segment(3).'/'.$popa_id,'refresh');
        
      }
      
                //$data['main_content'] = 'popa/summary_popa';
                $this->load->view('template/default', $data);
  }


	
  
    function summary_pp_popa ()
    {
      //nama:seri
      //date:8/7/13
      //desc:summary page untuk pengawai pengawal
       //updated:azian 08/12/13
      

      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'popa/summary_pp_popa';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
       $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $popa_id = $this->uri->segment(4);
               // $data['rows'] = $this->popa_model->get_all_kandungan_ptra($popa_id);
                $data['statusid'] = $this->function_model->check_status_log($id,4,$popa_id);
                 $data['ulasan'] = $this->popa_model->get_ulasan_terbaru($id,4,$popa_id);
                 if($getPopa1 = $this->function_model->get_tab(3))
                    {
                       $data['tab'] = $getPopa1;
                    }
                
                if($getPtra = $this->popa_model->get_popa2($id,$popa_id))
                {
                   $data['senarai_popa'] = $getPtra;
                }
                    
                 if($this->input->post('lulus')=='lulus')
                     {
                       $this->popa_model->update_popa_date_lulus($id,$popa_id); //update date lulus

                       $this->popa_model->insert_status_log_ulasan($id,6,$popa_id);  //insert status & ulasan
                          
                       /*****hantar notifikasi kepada pif yg ptra dah diluluskan*****/
                        $path = 'popa/summary_pif_popa/'.$id.'/'.$popa_id;

                       $this->function_model->insert_notifikasi(113,3,$sessionarray['user_id'],$this->popa_model->get_pifid_popa($id,1),$path); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada pof yg ptra dah diluluskan*****/
                        $path2 = 'popa/summary_pof_popa/'.$id.'/'.$popa_id;

                       $this->function_model->insert_notifikasi(113,3,$sessionarray['user_id'],$this->popa_model->get_pofid_popa($id,1),$path2); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada ptf yg ptra dah diluluskan*****/
                        $path3 = 'popa/summary_ptf_popa/'.$id.'/'.$popa_id;

                       $this->function_model->insert_notifikasi(113,3,$sessionarray['user_id'],$this->popa_model->get_ptfid_popa($id),$path3); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada ppd yg ptra dah diluluskan*****/
                        $path4 = 'popa/summary_popa/'.$id.'/'.$popa_id;

                        $this->function_model->insert_notifikasi(113,3,$sessionarray['user_id'],$this->popa_model->get_ppdid_popa($id,$popa_id),$path4); //insert notifikasi

                       /******** end **********/
                             
                        $data['main_content'] = 'alert';
                        $data['msg'] = 'Borang POPA telah berjaya diluluskan.Klik butang OK untuk kembali ke Senarai POPA.';
                        $data['link'] = 'popa/senarai_ppd_popa/'.$id;
                       
                       
                        
                     }
                 else if($this->input->post('betul')=='betul')
                   {


                      $this->popa_model->insert_status_log_ulasan($id,3,$popa_id);

                     /*****hantar notifikasi kepada ppd yg pspao perlu di betulkan*****/

                       $path = 'popa/summary_popa/'.$id.'/'.$popa_id;

                       $this->function_model->insert_notifikasi(59,3,$sessionarray['user_id'],$this->popa_model->get_ppdid_popa($id,$popa_id),$path); //insert notifikasi

                       /******** end **********/

                         $data['main_content'] = 'alert';
                        $data['msg'] = 'Arahan pembetulan telah berjaya dihantar kepada Pegawai Penyedia Dokumen.Klik butang OK untuk kembali ke Senarai POPA.';
                        $data['link'] = 'popa/senarai_ppd_popa/'.$id;
                       

                    }          
                
      $this->load->view('template/default', $data);
    }




	
  	function summary_ptf_popa()
    {
		  //name: Seri Idayu
		  //date: 08072013
		  //desc: summary ptf popa
       //updated:azian 08/12/13
      
      
                $node_id = '65';
                $menu_name = 'menu1';
                $menu_link = 'popa/summary_ptf_popa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                if($getPopa1 = $this->function_model->get_tab(3))
                    {
                       $data['tab'] = $getPopa1;
                    }
                

                $data['year_list'] =year_dropdown();  //get year list 
    //$data['main_content'] = 'popa/summary_ptf_popa';
          

     
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $popa_id = $this->uri->segment(4);
                $data['rows'] = $this->popa_model->get_all_kandungan_pnpa($popa_id);
                
                if($getPtra = $this->popa_model->get_popa2($id,$popa_id))
                {
                   $data['senarai_popa'] = $getPtra;
                }
                 $this->load->view('template/default_pelan', $data);
	 }





    function summary_pof_popa()
    {
      //name: Seri Idayu
      //date: 08072013
      //desc: summary ptf popa
       //updated:azian 08/12/13
      
    

      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'popa/summary_pof_popa';

      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 $sessionarray = $this->session->all_userdata();
        $id = $this->uri->segment(3); 
        $popa_id = $this->uri->segment(4);
        $data['rows'] = $this->popa_model->get_all_kandungan_pnpa($popa_id);
         $data['statusid'] = $this->function_model->check_status_log($id,4,$popa_id);
         $data['ulasan'] = $this->popa_model->get_ulasan_terbaru($id,3,$popa_id);
         if($getPtra = $this->popa_model->get_popa2($id,$popa_id))
                {
                   $data['senarai_popa'] = $getPtra;
                }   
                
           if($getPopa1 = $this->function_model->get_tab(3))
                    {
                       $data['tab'] = $getPopa1;
                    }
                
        if($this->input->post('sah') == 'sah')
                    {

                          $this->popa_model->update_pnpa_date_sah($id,$popa_id); //update sah date

                          $this->popa_model->insert_status_log_ulasan($id,4,$popa_id); //insert status & ulasan

                    /****** hantar notifikasi kpd pp ada pnpa perlu diluluskan ******/
                           $path = 'popa/summary_pp_popa/'.$id.'/'.$popa_id;
                           $this->function_model->insert_notifikasi(107,3,$sessionarray['user_id'],$this->popa_model->get_ppid_popa($id),$path); //insert notifikasi

                    /****** hantar notifikasi kpd ppd ada pnpa telah disahkan******/
                           $path2 = 'popa/summary_popa/'.$id.'/'.$popa_id;
                           $this->function_model->insert_notifikasi(54,3,$sessionarray['user_id'],$this->popa_model->get_ppdid_popa($id,$popa_id),$path2); //insert notifikasi

                            //$data['detail_msg'] = $this->function_model->get_masej($id,7);
                            $data['main_content'] = 'alert';
                            $data['msg'] = 'Borang POPA  telah berjaya dihantar untuk diluluskan. Klik butang OK untuk kembali ke Senarai POPA.';
                            $data['link'] = 'popa/senarai_ppd_popa/'.$id;

                //redirect('pspao/senarai_pspao_akhir','refresh');
                
            }
                           else if($this->input->post('betul')=='betul'){

                        $this->popa_model->insert_status_log_ulasan($id,3,$popa_id); //insert status & ulasan

                         /****** hantar notifikasi kpd ppd ada pspao perlu dibetulkan ******/

                          //$pspao_awal_ppd_id   = $this->pspao_model->get_pspao_ppd_id($pspaid); // get ppd id

                           $path3 = 'popa/summary_popa/'.$id.'/'.$popa_id;

                           $this->function_model->insert_notifikasi(59,4,$sessionarray['user_id'],$this->popa_model->get_ppdid_popa($id,$popa_id),$path3); //insert notifikasi

                          /******* end ********/


                            $data['main_content'] = 'alert';
                            $data['msg'] = 'Arahan pembetulan telah berjaya dihantar kepada Pegawai Penyedia Dokumen.Klik butang OK untuk kembali ke Senarai POPA.';
                            $data['link'] = 'popa/senarai_ppd_popa/'.$id;
                           
                          //redirect(site_url('pspao_awal/senarai_pspao_baru'));

                         }
                       
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
                              '1',
                              'Sharifah Nadiah Syed Waris',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '2',
                              'Ahmad Zuhairi Haji Saman',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '3',
                              'Nuraini Haizi Abd Ghani',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '4',
                              'Darleena Hanis Hariz',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '5',
                              'Megat Daud Megat Abu',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '6',
                              'Sharifah Nadiah Syed Waris',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '7',
                              'Ahmad Zuhairi Haji Saman',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '8',
                              'Nuraini Haizi Abd Ghani',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '9',
                              'Darleena Hanis Hariz',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '10',
                              'Megat Daud Megat Abu',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '11',
                              'Sharifah Nadiah Syed Waris',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '12',
                              'Ahmad Zuhairi Haji Saman',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '13',
                              'Nuraini Haizi Abd Ghani',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '14',
                              'Darleena Hanis Hariz',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                              '15',
                              'Megat Daud Megat Abu',
                              'Kementerian Kerja Raya',
                              'Jabatan Kerja Raya Malaysia'
                             ),
                        
                       );



                
      $quantity = 5; // how many per page
      $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
      

      if(!$start) $start = 0; // default to zero if no $start

                
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
        
        
        



  





      



  


  
  



  





  
  

	//**END POPA **//

}




