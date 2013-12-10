<?php

    class Utiliti_upf extends CI_Controller 
    {
        private $limit = 10;

        
        function __construct()
        {
            parent::__construct();
            #load library dan helper yang dibutuhkan
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $this->load->library(array('table','validation'));
    
            $this->load->helper(array('form', 'url'));
            $this->load->helper('function_helper');
    
            $this->load->model('pspao_model');
            $this->load->model('utilitiupf_model','',TRUE);
            $this->load->model('negeri_model');
            $this->load->model('daerah_model');
            $this->load->model('menu/sidemenu_model');
            $this->load->library('pagination');
            $this->load->library('table');
        
            $this->output->enable_profiler(TRUE); //display query statement
    
            if(!$this->aauth->is_loggedin())
            {
                echo '<script>';
                echo 'alert("Belum Login");';
                echo 'window.location = "'.site_url('auth').'"';
                echo '</script>';
            }
        }





        function get_cities($country)
        {
            $this->load->model('daerah_model');
            //print_r($this->city_model->get_cities($country));
            header('Content-Type: application/x-json; charset=utf-8');
            echo(json_encode($this->daerah_model->get_daerah($country)));
            // $this->output->set_output(json_encode($this->city_model->get_cities($country)));
        }

  

 
       function  unit_pengurusan_fasiliti()
        {
            if($_POST)
            {
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'unit_pengurusan_fasiliti/unit_pengurusan_fasiliti';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
                $upf_id = $this->uri->segment(3); 
                 
                
                if($getUpf = $this->utilitiupf_model->get_upf())
                {
                    $data['senaraiupf'] = $getUpf;
                }
                $data['countries'] = $this->negeri_model->get_negeri();


                $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('alamat','No Kad Pengenalan','trim|required|xss_clean');
                $this->form_validation->set_rules('notel','Peranan','trim|required|xss_clean');
                $this->form_validation->set_rules('nofax','Peringkat','trim|required|xss_clean');
                



                if($this->form_validation->run())
                {
                    $data['utiliti_sumber_man_id'] = $this->session->userdata('utiliti_sumber_man_id');
                    $addSumberMan = $this->utilitikeperluansumber_model->tambahsumbermanusia($utiliti_sumber_man_id);
                    
                    $utiliti_sumber_man_id = $this->input->post('utiliti_sumber_man_id');                
                    $this->session->set_userdata(array('utiliti_sumber_man_id' => $utiliti_sumber_man_id));

                    
                    if($addSumberMan)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('utilitiKeperluanSumber/sumber_manusia');
                    }
                
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                        redirect('utilitiKeperluanSumber/sumber_manusia');
                    }                
                } 




                else
                {
                    $node_id = '18';
                    $menu_name = 'menu1';
                    $menu_link = 'unit_pengurusan_fasiliti/unit_pengurusan_fasiliti';
                
                    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                
                    if($getUpf = $this->utilitiupf_model->get_upf())
                    {
                        $data['senaraiupf'] = $getUpf;
                    }
                
                    $data['countries'] = $this->negeri_model->get_negeri();
                
                 
                    $this->load->view('template/default', $data);
                }
            }  






            else
            {
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'unit_pengurusan_fasiliti/unit_pengurusan_fasiliti';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['countries'] = $this->negeri_model->get_negeri(); 
                //$data['cities'] = $this->daerah_model->get_daerah(); 


                if($getUpf = $this->utilitiupf_model->get_upf())
                {
                    $data['senaraiupf'] = $getUpf;
                }
               
                if($getJabAgensi = $this->utilitiupf_model->get_jab_agensi())
                {
                   $data['jabatan'] = $getJabAgensi;
                }



                $this->load->view('template/default', $data);
    
            }
        }


    }

?>





    
    
