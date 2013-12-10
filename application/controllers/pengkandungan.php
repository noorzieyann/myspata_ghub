<?php

class Pengkandungan extends CI_Controller {

  
    /*
    *   Author : Anuar
    *   Title  : PSPAO AWAL & PPUN
    */
 public function __construct()
  {
    parent::__construct();
    #load library dan helper yang dibutuhkan
    $this->load->library('form_validation');
    
    $this->load->helper(array('form', 'url'));
    $this->load->helper('function_helper');
    
    $this->load->model('pspao_model');
    $this->load->model('pnpa_model');
    $this->load->model('menu/sidemenu_model');
    $this->load->model('utilitiKeperluanSumber_model');
    $this->load->library('pagination');
                $this->load->library('table');

                $this->load->helper('download');
        
   // $this->output->enable_profiler(TRUE); //display query statement
    
    if(!$this->aauth->is_loggedin()){
     echo '<script>';
    echo 'alert("Belum Login");';
      echo 'window.location = "'.site_url('auth').'"';
   echo '</script>';
    }
    
  }

  function peng_kand()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai pengawal
		//$data['main_content'] = 'penetapan_pentadbir';
                //$this->load->view('template/default_pelan', $data);


                $node_id = '181';
                $menu_name = 'front';
                $menu_link = 'penetapan_pentadbir/utiliti_pengurusan_kandungan';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
      
             $rules = array(
                           
                            array(
                                  'field'   => 'katkand',
                                  'label'   => 'Kategori Kandungan',
                                  'rules'   => 'required'
                              ),
                           array(
                                  'field'   => 'senaraikand',
                                  'label'   => 'Senarai',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'bil',
                                  'label'   => 'Bil',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'kandungan',
                                  'label'   => 'kandungan',
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
                 
	
	               	$data['main_content'] = 'penetapan_pentadbir/utiliti_pengurusan_kandungan';
                $this->load->view('template/default', $data);
	}
        }


      }