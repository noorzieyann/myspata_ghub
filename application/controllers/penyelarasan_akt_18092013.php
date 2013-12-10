<?php
  class Penyelarasan_akt extends CI_Controller 
  {

  
    /*
    *   Author : Anuar
    *   Title  : PSPAO AWAL & PPUN
    */

    // Edited by : Seri  05092013



    public function __construct()
    {
      parent::__construct();

      #load library dan helper yang dibutuhkan
      //$this->load->library('form_validation');
      
      $this->load->helper(array('form', 'url'));
      $this->load->helper('function_helper');
    
      $this->load->model('pspao_model');
      $this->load->model('pnpa_model');
      $this->load->model('popa_model');
      $this->load->model('menu/sidemenu_model');
      $this->load->model('penyelarasan_akt_model');
      $this->load->model('pspao_akhir_model');
      $this->load->library('pagination');
      $this->load->library('table');
        
      $this->output->enable_profiler(TRUE); //display query statement
    
      //if(!$this->aauth->is_loggedin()){
      //echo '<script>';
      //echo 'alert("Belum Login");';
      //echo 'window.location = "'.site_url('auth').'"';
      //echo '</script>';
      //}
   }
    
  
   function  senarai_penyelarasan_akt($offset = 0)
	 {
      $node_id = '70';
      $menu_name = 'menu1';
      $menu_link = 'belanjawan/pspao_pelarasan_aktiviti/senarai_penyelarasan_akt';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
      $data['year_list'] =year_dropdown();  //get year list 
      $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
      $data['jabatan'] = $this->penyelarasan_akt_model->get_jabatan(); //dapatkan senarai jabatan dr db
      $data['premis'] = $this->penyelarasan_akt_model->get_premis();
      $data['negeri'] = $this->penyelarasan_akt_model->get_negeri();
      $data['daerah'] = $this->penyelarasan_akt_model->get_daerah();


      if($getSenPspao = $this->penyelarasan_akt_model->get_senarai_pspao())
      {
        $data['senaraipspao1'] = $getSenPspao;
      }

      $this->load->view('template/default', $data);
		

    }



    function penyelarasan_akt_ppd()
    {
      $node_id = '125';
      $menu_name = 'menu1';
      $menu_link = 'belanjawan/pspao_pelarasan_aktiviti/penyelarasan_akt_ppd';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
      $data['year_list'] =year_dropdown();  //get year list 
      $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
      $data['jabatan'] = $this->penyelarasan_akt_model->get_jabatan(); //dapatkan senarai jabatan dr db
      $data['premis'] = $this->penyelarasan_akt_model->get_premis();
      $data['negeri'] = $this->penyelarasan_akt_model->get_negeri();
      $data['daerah'] = $this->penyelarasan_akt_model->get_daerah();
                
      
      if($getSenPtf = $this->penyelarasan_akt_model->get_senarai_ptf())
      {
        $data['senaraiptf'] = $getSenPtf;
      }
     
      
      $this->load->view('template/default', $data);
     
    }
        
        

    function penyelarasan_akt_ptf()
	 {       
      $node_id = '127';
      $menu_name = 'menu1';
      $menu_link = 'belanjawan/pspao_pelarasan_aktiviti/penyelarasan_akt_ptf';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
      $data['year_list'] =year_dropdown();  //get year list 
      $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
      $data['jabatan'] = $this->penyelarasan_akt_model->get_jabatan(); //dapatkan senarai jabatan dr db
      $data['premis'] = $this->penyelarasan_akt_model->get_premis();
      $data['negeri'] = $this->penyelarasan_akt_model->get_negeri();
      $data['daerah'] = $this->penyelarasan_akt_model->get_daerah();
                
        $this->load->view('template/default', $data);
      
    }
        
        

    function penyelarasan_akt_pp()
	 {       
      $node_id = '126';
      $menu_name = 'menu1';
      $menu_link = 'belanjawan/pspao_pelarasan_aktiviti/penyelarasan_akt_pp';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
      $data['year_list'] =year_dropdown();  //get year list 
      $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
      $data['jabatan'] = $this->penyelarasan_akt_model->get_jabatan(); //dapatkan senarai jabatan dr db
      $data['premis'] = $this->penyelarasan_akt_model->get_premis();
      $data['negeri'] = $this->penyelarasan_akt_model->get_negeri();
      $data['daerah'] = $this->penyelarasan_akt_model->get_daerah();
                

      if($getSenPtf = $this->penyelarasan_akt_model->get_senarai_ptf())
      {
        $data['senaraiptf'] = $getSenPtf;
      }        
      
    
      $this->load->view('template/default', $data);
		
    }


      
  }


