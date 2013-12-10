<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


       //author : Anuar
       //date create: 08/07/2013

class Takwim extends CI_Controller {
    
    
    
     public function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library('form_validation');
		
		$this->load->helper(array('form', 'url'));
		$this->load->helper('function_helper');
		
		$this->load->model('takwim_model');
                $this->load->library('pagination');
                $this->load->library('table');
				
		//$this->output->enable_profiler(TRUE); //display query statement
		
		if(!$this->aauth->is_loggedin()){
			echo '<script>';
			echo 'alert("Belum Login");';
			echo 'window.location = "'.site_url('auth').'"';
			echo '</script>';
		}
		
	}
    
    
      function takwim($year=null,$month=null)
        {   
          
            
		$node_id = '7';
		$menu_name = 'front';
		$menu_link = 'takwim/takwim';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
		
		$data = array(
               3  => 'http://example.com/news/article/2006/03/',
               7  => 'http://example.com/news/article/2006/07/',
               13 => 'http://example.com/news/article/2006/13/',
               26 => 'http://example.com/news/article/2006/26/'
             );
               
          /*  
            if($this->input->post('tajuk_takwim')==''){
                     $this->form_validation->set_rules('tajuk_takwim', 'Tajuk Takwim Untuk Tambah Aktiviti', 'required');
                 }
                 
            if($this->input->post('aktiviti_takwim')==''){
                     $this->form_validation->set_rules('aktiviti_takwim', 'Aktiviti Takwim Untuk Tambah Aktiviti', 'required');
                 }
                 
            if($this->input->post('tarikh_mula')==''){
                     $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula Untuk Tambah Aktiviti', 'required');
                 }
                 
           if($this->input->post('tarikh_akhir')==''){
                     $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir Untuk Tambah Aktiviti', 'required');
                 }      
            
                  if ($this->form_validation->run() == FALSE)
                {
					*/
                         if (!$year) {
                                 $year = date('Y');
                         }
                         if (!$month) {
                                 $month = date('m');
                         }

                         $this->load->model('takwim_model');

                         if ($day = $this->input->post('day')) {
                                 $this->takwim_model->add_calendar_data(
                                         "$year-$month-$day",
                                         $this->input->post('data')
                                 );
                         }

                     $data['calendar'] = $this->takwim_model->generate($year, $month,$data);
				

                      $this->load->view('template/default', $data);

             /*   }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }
            */
            
            
            
        }
        
        
      
}

    
?>
