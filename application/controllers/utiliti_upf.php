<?php

    class Utiliti_upf extends CI_Controller 
    {
        //private $limit = 10;

        
        function __construct()
        {
            parent::__construct();
            #load library dan helper yang dibutuhkan
            date_default_timezone_set('Asia/Kuala_Lumpur');
            $this->load->library(array('table','validation'));
            $this->load->library('Aauth');
            $this->load->helper(array('form', 'url'));
            $this->load->helper('function_helper');
    
            $this->load->model('utilitiupf_model','',TRUE);
            $this->load->model('negeri_model');
            $this->load->model('daerah_model');
            $this->load->model('menu/sidemenu_model');
            $this->load->library('pagination');
            $this->load->library('table');
        
            //$this->output->enable_profiler(TRUE); //display query statement
    
            if(!$this->aauth->is_loggedin())
            {
                echo '<script>';
                echo 'alert("Belum Login");';
                echo 'window.location = "'.site_url('auth').'"';
                echo '</script>';
            }
        }

  function unit_pengurusan_fasiliti()
       
        {
      
                $node_id = '196';
                $menu_name = 'menu1';
                $menu_link = 'unit_pengurusan_fasiliti/unit_pengurusan_fasiliti';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $upf_id = $this->uri->segment(3);
                $sessionarray = $this->session->all_userdata();
                $user_kemid = $sessionarray['user_kemid']; 
                //print_r ($data['countries']);
                 //die();
                
                $data['senaraiupf'] = $this->utilitiupf_model->get_upf($user_kemid);
                $data['countries'] = $this->negeri_model->get_negeri();  
                
                $data['kementerian'] = $this->utilitiupf_model->get_kementerian();
                $data['disiplin'] = $this->utilitiupf_model->get_bidang_1();
                $data['peranan'] = $this->utilitiupf_model->get_peranan_1();
                $data['negeri'] = $this->utilitiupf_model->get_negeri_1();
                $data['daerah'] = $this->utilitiupf_model->get_daerah_1();
                $data['jabatan'] = $this->utilitiupf_model->get_jabatan_agen();
                $data['level'] = $this->utilitiupf_model->get_level_1();
            
      
        if($_POST)
        {
                
                $this->form_validation->set_rules('namaupf','Nama UPF','trim|required|xss_clean');
                $this->form_validation->set_rules('alamatupf','Alamat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel','No.Telefon','trim|required|xss_clean');
                $this->form_validation->set_rules('nofax','No.Faks','trim|required|xss_clean');

               
                
            if($this->form_validation->run())
            {
                $data['upf_id'] = $this->session->userdata('upf_id');
                                
                $upf_id = $this->input->post('upf_id');                
                $this->session->set_userdata(array('upf_id' => $upf_id));
                
        $addUpf = $this->utilitiupf_model->tambahupf();

                if($addUpf)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Unit Pengurusan Fasiliti Berjaya Didaftarkan</font><br>');
                    redirect('utiliti_upf/unit_pengurusan_fasiliti');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan UPF.</font><br></strong><br>');
                    redirect('utiliti_upf/unit_pengurusan_fasiliti');
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



        function kemaskini_upf()
         {
            
        
                $node_id = '196';
                $menu_name = 'menu1';
                $menu_link = 'unit_pengurusan_fasiliti/kemaskini_upf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $upf_id = $this->uri->segment(3);

                
                $data['senaraiupf'] = $this->utilitiupf_model->get_upf_1($upf_id);
                //$data['countries'] = $this->negeri_model->get_negeri();  
                
                $data['kementerian'] = $this->utilitiupf_model->get_kementerian();
                $data['disiplin'] = $this->utilitiupf_model->get_bidang_1();
                $data['peranan'] = $this->utilitiupf_model->get_peranan_1();
                $data['negeri'] = $this->utilitiupf_model->get_negeri_1();
                $data['daerah'] = $this->utilitiupf_model->get_daerah_1();
                $data['jabatan'] = $this->utilitiupf_model->get_jabatan_agen();
                $data['level'] = $this->utilitiupf_model->get_level_1();
                

                $this->form_validation->set_rules('namaupf','Nama UPF','trim|required|xss_clean');
                $this->form_validation->set_rules('alamatupf','Alamat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel','No.Telefon','trim|required|xss_clean');
                $this->form_validation->set_rules('nofax','No.Faks','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');
                    $upf_id = $this->input->post('upf');

                    $dataDetail = array(           
                                            'idkem' => $this->input->post('kementerian'),
                                            'idjab_agensi' => $this->input->post('jabatan'),
                                            'idnegeri' => $this->input->post('negeri'),
                                            'iddaerah' => $this->input->post('daerah'),
                                            'nama_upf' => $this->input->post('namaupf'),
                                            'alamat_upf' => $this->input->post('alamatupf'),
                                            'notel_upf' => $this->input->post('notel'),
                                            'nofax_upf' => $this->input->post('nofax')
                                            
                                            );

                                        //print_r($dataDetail);
                    //die();
                    $update_upf = $this->utilitiupf_model->update_upf($upf_id, $dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_upf)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
                        redirect('utiliti_upf/unit_pengurusan_fasiliti');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('utiliti_upf/kemaskini_upf/'.$upf_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }


        function get_cities($country)
        {
            $this->load->model('daerah_model');
            //print_r($this->city_model->get_cities($country));
            header('Content-Type: application/x-json; charset=utf-8');
            echo(json_encode($this->daerah_model->get_daerah($country)));
            // $this->output->set_output(json_encode($this->city_model->get_cities($country)));
        }    
            
    }
    

?>