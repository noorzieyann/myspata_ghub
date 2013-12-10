  <?php
class Belanjawan extends CI_Controller {

  
    /*
    *   Author : Anuar
    *   Title  : PSPAO AWAL & PPUN
    */
 function __construct()
  {
    parent::__construct();
    #load library dan helper yang dibutuhkan
    $this->load->library('form_validation');
    
    $this->load->helper(array('form', 'url'));
    $this->load->helper('function_helper');
    
    //$this->load->model('pspao_model');
    //$this->load->model('pnpa_model');
    $this->load->model('popa_model');
    $this->load->model('menu/sidemenu_model');
    $this->load->model('penyelarasan_akt_model');
    //$this->load->model('pspao_akhir_model');
    $this->load->library('pagination');
                $this->load->library('table');
        
    $this->output->enable_profiler(TRUE); //display query statement
  
  }


     function agihan_belanjawan()
  {
    //name: Azian, Fatin
    //date: 08072013, 4/9/2013
    //desc: senarai agihan belanjawan
            
                $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/agihan_belanjawan';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->penyelarasan_akt_model->get_jabatan(); //dapatkan senarai jabatan dr db
                //$data['premis'] = $this->penyelarasan_akt_model->get_premis();
                //$data['status'] = $this->penyelarasan_akt_model->get_status(); //dapatkan senarai premis dr db



                if($getPspao = $this->penyelarasan_akt_model->get_pspao())
                  {
                     $data['senarai_pspao'] = $getPspao;
                  }
                            
                          $this->load->view('template/default', $data);
                      
    }

 function agihan_belanjawan_pp()
  {       
                $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/agihan_belanjawan_pp';
                
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
                
                
                
                 $rules = array(
                            array(
                                  'field'   => 'terima',
                                  'label'   => 'Terima (RM)',
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
                        //$data['main_content'] = 'belanjawan/agihan_belanjawan/agihan_belanjawan';
                        $this->load->view('template/default', $data);
                      
                }  
    
    
        }

      function agihan_belanjawan_ptf_sah()
      {       
                 $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/agihan_belanjawan_ptf_sah';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                //$data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                                
                
                 if($getAbm = $this->penyelarasan_akt_model->get_abm())
              {
                   $data['agihan'] = $getAbm;
              }
              
                   $this->load->view('template/default', $data);
        
              }

      function agihan_belanjawan_pp_lulus()
      {       
                 $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/agihan_belanjawan_pp_lulus';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                //$data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                                
                
                 if($getAbm = $this->penyelarasan_akt_model->get_abm())
              {
                   $data['agihan'] = $getAbm;
              }
              
                   $this->load->view('template/default', $data);
        
              }


      function agihan_belanjawan_ppd()
      {       
                 $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/agihan_belanjawan_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                //$data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                                
                
                 if($getAbm = $this->penyelarasan_akt_model->get_abm())
              {
                   $data['agihan'] = $getAbm;
              }
              
                   $this->load->view('template/default', $data);
        
              }

      function agihan_belanjawan_ketuajab()
      {       
                 $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/agihan_belanjawan_ketuajab';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                //$data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                                
                
                 if($getAbm = $this->penyelarasan_akt_model->get_abm())
              {
                   $data['agihan'] = $getAbm;
              }
              
                   $this->load->view('template/default', $data);
        
              }


        function agihan_belanjawan_ppd_negeri()
        {       
                 $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/agihan_belanjawan_ppd_negeri';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['daerah'] = $this->penyelarasan_akt_model->get_daerah(); //dapatkan senarai daerah dr db
                $data['negeri'] = $this->penyelarasan_akt_model->get_negeri(); //dapatkan senarai negeri dr db
                                
                
                 if($getAbm = $this->penyelarasan_akt_model->get_abm())
              {
                   $data['agihan'] = $getAbm;
              }
              
                   $this->load->view('template/default', $data);
        
              }


        function senarai_ptf_abm_pp()
        {       
                 $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/senarai_ptf_abm_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                      $data['year_list'] =year_dropdown();  //get year list 
                      $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                      $data['jabatan'] = $this->penyelarasan_akt_model->get_jabatan(); //dapatkan senarai jabatan dr db
                      
                
              if($getMyspatauser = $this->penyelarasan_akt_model->get_myspatauser())
              {
                   $data['senarai_ptf'] = $getMyspatauser;
              }
              
                   $this->load->view('template/default', $data);
        
              }


        function senarai_ppd_abm_ptf()
        {       
                 $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/senarai_ppd_abm_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                      $data['year_list'] =year_dropdown();  //get year list 
                      $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                      $data['jabatan'] = $this->penyelarasan_akt_model->get_jabatan(); //dapatkan senarai jabatan dr db
                      
                
              if($getMyspatauser = $this->penyelarasan_akt_model->get_myspatauser())
              {
                   $data['senarai_ppd'] = $getMyspatauser;
              }
              
                   $this->load->view('template/default', $data);
        
              }

        function senarai_ptf_abm_ketuajab()
        {       
                 $node_id = '69';
                $menu_name = 'menu1';
                $menu_link = 'belanjawan/agihan_belanjawan/senarai_ptf_abm_ketuajab';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                      $data['year_list'] =year_dropdown();  //get year list 
                      $data['kementerian'] = $this->penyelarasan_akt_model->get_kementerian(); //dapatkan senarai kementerian dr db
                      $data['jabatan'] = $this->penyelarasan_akt_model->get_jabatan(); //dapatkan senarai jabatan dr db
                      
                
              if($getMyspatauser = $this->penyelarasan_akt_model->get_myspatauser())
              {
                   $data['senarai_ptf'] = $getMyspatauser;
              }
              
                   $this->load->view('template/default', $data);
        
              }
                        
}
