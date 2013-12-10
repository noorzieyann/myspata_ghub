<?php

class UtilitiKeperluanSumber extends CI_Controller {
private $limit = 10;

function __construct()
  {
    parent::__construct();
    #load library dan helper yang dibutuhkan
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $this->load->library(array('table','validation'));
    
    $this->load->helper(array('form', 'url'));
    $this->load->helper('function_helper');
    
    //$this->load->model('pspao_model');
    $this->load->model('utilitikeperluansumber_model','',TRUE);
    $this->load->model('negeri_model');
    $this->load->model('daerah_model');
    $this->load->model('menu/sidemenu_model');
    $this->load->library('pagination');
    $this->load->library('table');
	$this->load->helper('download');
	$this->load->helper('file');
        
    //$this->output->enable_profiler(TRUE); //display query statement
    
   if(!$this->aauth->is_loggedin()){
      echo '<script>';
      echo 'alert("Belum Login");';
     echo 'window.location = "'.site_url('auth').'"';
     echo '</script>';
    }
    
    
  }
  
 
       function  sumber_manusia()
        {
        if($_POST)
        {
           
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/sumber_manusia';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                $utiliti_sumber_man_id = $this->uri->segment(3); 
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
                $data['utiliti_sumber_man_id'] = $this->session->userdata('utiliti_sumber_man_id');
                                
                $utiliti_sumber_man_id = $this->input->post('utiliti_sumber_man_id');                
                $this->session->set_userdata(array('utiliti_sumber_man_id' => $utiliti_sumber_man_id));
				
				$addSumberMan = $this->utilitikeperluansumber_model->tambahsumbermanusia();

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
                $menu_link = 'keperluan_sumber/sumber_manusia';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                $sessionarray = $this->session->all_userdata();
                $user_kemid = $sessionarray['user_kemid'];
                 if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia($user_kemid))
                {
                    $data['sumbermanusia'] = $getSumberManusia;
                }
                
                $data['countries'] = $this->negeri_model->get_negeri();
                
                 
                $this->load->view('template/default', $data);
            } 
        }
        else
        {
            
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/sumber_manusia';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $user_kemid = $sessionarray['user_kemid'];
                $data['countries'] = $this->negeri_model->get_negeri(); 
                //print_r ($data['countries']);
                 //die();
                 
                if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia($user_kemid))
                {
                    $data['sumbermanusia'] = $getSumberManusia;
                }
                if($getList = $this->utilitikeperluansumber_model->get_kementerian())
                {
                   $data['kementerian'] = $getList;
                }
                
                  if($getJabAgensi = $this->utilitikeperluansumber_model->get_jabatan_agen())
                {
                   $data['jabatan'] = $getJabAgensi;
                }
                 if($getNegeri = $this->utilitikeperluansumber_model->get_negeri_1())
                {
                   $data['negeri'] = $getNegeri;
                }
                
                  if($getDaerah = $this->utilitikeperluansumber_model->get_daerah_1())
                {
                   $data['daerah'] = $getDaerah;
                }
                if($getlevel = $this->utilitikeperluansumber_model->get_level_1())
                {
                   $data['level'] = $getlevel;
                }
                if($getperanan = $this->utilitikeperluansumber_model->get_peranan_1())
                {
                   $data['peranan'] = $getperanan;
                }
                if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
                {
                   $data['disiplin'] = $getbidang;
                }


                $this->load->view('template/default', $data);
    
        }
    }
    
    
    
/*
	Update : diana 27/10/2013 
*/   
function kemaskinisumbermanusia()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/kemaskini_sumbermanusia';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $utiliti_sumber_man_id = $this->uri->segment(3); 
               
                            
                if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia_1($utiliti_sumber_man_id))
                {
                    $data['listSumber'] = $getSumberManusia;
                    //print_r($getSumberManusia);
                
                }
               if($getList = $this->utilitikeperluansumber_model->get_kementerian())
                {
                   $data['kementerian'] = $getList;
                }
                
                  if($getJabAgensi = $this->utilitikeperluansumber_model->get_jabatan_agen())
                {
                   $data['jabatan'] = $getJabAgensi;
                }
                 if($getNegeri = $this->utilitikeperluansumber_model->get_negeri_1())
                {
                   $data['negeri'] = $getNegeri;
                }
                
                  if($getDaerah = $this->utilitikeperluansumber_model->get_daerah_1())
                {
                   $data['daerah'] = $getDaerah;
                }
                //die();
                if($getlevel = $this->utilitikeperluansumber_model->get_level_1())
                {
                   $data['level'] = $getlevel;
                }
                 if($getperanan = $this->utilitikeperluansumber_model->get_peranan_1())
                {
                   $data['peranan'] = $getperanan;
                }
                if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
                {
                   $data['disiplin'] = $getbidang;
                }

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
					
					$utiliti_sumber_man_id = $this->input->post('humanres');
					
                    $dataDetail = array(       
                                         'idkem' => $this->input->post('kementerian'),
                                         'idjab_agensi' => $this->input->post('jabatan'),
                                        'idnegeri' => $this->input->post('negeri'),
                                        'iddaerah' => $this->input->post('daerah'),
                                        'level_id' => $this->input->post('level'),
                                        'nama' => $this->input->post('nama'),
                                        //'nama_syarikat' => $this->input->post('namasyarikat'),
                                        'nric' => $this->input->post('noic'),
                                         'kump_pengguna' => $this->input->post('peranan'),
                                        'jawatan' => $this->input->post('jawatan'),
                                        'gred_jawatan' => $this->input->post('gredjawatan'),
                                        'disiplin_bidang_id' => $this->input->post('disiplin'),
                                        'gaji' => $this->input->post('gaji'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa'),
                                        
                                        );

                                       // print_r($dataDetail);
                    //die();
                    $updateSumber = $this->utilitikeperluansumber_model->update_sumber_manusia($utiliti_sumber_man_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($updateSumber)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Sumber Manusia Berjaya Dikemaskini</font><br>');
                        redirect('utilitiKeperluanSumber/sumber_manusia');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('utilitiKeperluanSumber/kemaskinisumbermanusia/'.$utiliti_sumber_man_id);
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }

            
        //updated : diana 27/10/2013
            function kemaskinisumbermanusialuaran()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/kemaskini_sum_luaran';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $utiliti_sumber_man_id = $this->uri->segment(4);
                $syarikat_id = $this->uri->segment(3); 
				
				/*$utiliti_sumber_man_id = $this->input->post('humanres');
                $syarikat_id = $this->input->post('company'); */
				
                
               
                if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia_1($utiliti_sumber_man_id))
                {
                    $data['listSumber'] = $getSumberManusia;                
                }
                if($getList = $this->utilitikeperluansumber_model->get_kementerian())
                {
                   $data['kementerian'] = $getList;
                }
				if($getJabAgensi = $this->utilitikeperluansumber_model->get_jabatan_agen())
                {
                   $data['jabatan'] = $getJabAgensi;
                }
                 if($getNegeri = $this->utilitikeperluansumber_model->get_negeri_1())
                {
                   $data['negeri'] = $getNegeri;
                }
                
                  if($getDaerah = $this->utilitikeperluansumber_model->get_daerah_1())
                {
                   $data['daerah'] = $getDaerah;
                }
                
				
                if($getlevel = $this->utilitikeperluansumber_model->get_level_1())
                {
                   $data['level'] = $getlevel;
                }
                 if($getperanan = $this->utilitikeperluansumber_model->get_peranan_1())
                {
                   $data['peranan'] = $getperanan;
                }
                if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
                {
                   $data['disiplin'] = $getbidang;
                }

                $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                $this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa','Kos Lebih Masa','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                   //upload file
					$config['upload_path'] = $this->config->item('upload_path')."utiliti/";
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '3000000';
					
					$this->load->library('upload', $config);
					
					$dataDetail = array('nama' => $this->input->post('nama'),
                                        'nric' => $this->input->post('noic'),
                                        'kump_pengguna' => $this->input->post('peranan'),
                                        'jawatan' => $this->input->post('jawatan'),
										'disiplin_bidang_id' => $this->input->post('disiplin'),
                                        'gaji' => $this->input->post('gaji'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa')
								   );
					
					
					$fileEmpty = 0;
					if(empty($_FILES['userfile']['name'])){ $fileEmpty++; }
					
					if($this->upload->do_upload('userfile'))
					{
						$lokasiFile  = $this->utilitikeperluansumber_model->get_documentInfo($utiliti_sumber_man_id);
		
						if($lokasiFile<>'')
						{
							//unlink file in directory
							$unlink = unlink($lokasiFile);
							
							if($unlink==true)
							{ 
								//upload
								$dataUpload = $this->upload->data();
											
								$dataDetail['path_suratlantikan'] =  $dataUpload['full_path'];
							}
						}
					}
					else
					{
						if($fileEmpty==0)
						{
							$this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
							redirect('utilitiKeperluanSumber/kemaskinisumbermanusialuaran/'.$syarikat_id.'/'.$utiliti_sumber_man_id);
						}
					}
					
               
                    $updateSumber = $this->utilitikeperluansumber_model->update_sumber_manusia_luaran($utiliti_sumber_man_id,$dataDetail);
                    

                    if($updateSumber)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Sumber Manusia Berjaya Dikemaskini</font><br>');
                        redirect('utilitiKeperluanSumber/kemaskinisumbermanusialuaran/'.$syarikat_id.'/'.$utiliti_sumber_man_id);
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('utilitiKeperluanSumber/kemaskinisumbermanusialuaran/'.$syarikat_id.'/'.$utiliti_sumber_man_id);
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            } 

            
            
            function pengurusan_pejabat($offset = 0)
        {
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/pengurusan_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
       

                if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej())
                {
                   $data['uruspejabat'] = $getUrusPej;
                }

                $this->load->view('template/default', $data);

         }
         
		  //added : diana 28/10/2013
          function sumber_manusia_luaran()
            {
              if($_POST)
              {
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/sumber_manusia_luaran';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                               

                $this->form_validation->set_rules('nama_syarikat','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('no_pendaftaran','NO Pendaftaran','trim|required|xss_clean');
                $this->form_validation->set_rules('alamat_syarikat','Alamat Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel','No Telefon','trim|required|xss_clean');
                $this->form_validation->set_rules('nofax','No Fax','trim|required|xss_clean');
                $this->form_validation->set_rules('email','Emel','trim|required|xss_clean');

                if($this->form_validation->run())
                {
					$data = array(  'nama_syarikat' => $this->input->post('nama_syarikat'),
                       'no_pendaftaran' => $this->input->post('no_pendaftaran'),
                        'alamat_syarikat' => $this->input->post('alamat_syarikat'),
                        'notel' => $this->input->post('notel'),
                        'nofax' => $this->input->post('nofax'),
                        'email' => $this->input->post('email')
                            );
                                                        
					$addSyarikat = $this->utilitikeperluansumber_model->tambahsyarikat($data);

					if($addSyarikat)
					{
						$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Luaran Berjaya Didaftarkan</font><br>');
						redirect('utilitiKeperluanSumber/sumber_manusia_luaran');
					}
					else
					{
						$this->session->set_flashdata('flashError', '<font color="red" size="3">AMARAN: Gagal menyimpan permohonan.</font><br><br>');
						redirect('utilitiKeperluanSumber/sumber_manusia_luaran');
					}                
                }      
                        else
                        {
                           $node_id = '18';
                            $menu_name = 'menu1';
                            $menu_link = 'keperluan_sumber/sumber_manusia_luaran';

                            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       

                              if($getSyarikat = $this->utilitikeperluansumber_model->get_allsyarikat())
                                {
                                    $data['syarikat'] = $getSyarikat;
                                }

                            $this->load->view('template/default', $data);
                        } 
                
              
              }
              else
              {
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/sumber_manusia_luaran';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name); 

                if($getSyarikat = $this->utilitikeperluansumber_model->get_allsyarikat())
                {
                    $data['syarikat'] = $getSyarikat;
                }
                
                $this->load->view('template/default', $data);
              }
         }
         
         function kemaskinisyarikat()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/kemaskini_syarikat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
              
                $syarikat_id = $this->uri->segment(3);
                
                if($getSyarikat = $this->utilitikeperluansumber_model->get_syarikat($syarikat_id))
                {
                    $data['syarikat'] = $getSyarikat;
                }
                
                $this->form_validation->set_rules('nama_syarikat','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('no_pendaftaran','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('alamat_syarikat','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('notel','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('nofax','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('email','Nama Syarikat','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');
					
					$syarikat_id = $this->input->post('company');

                    $dataDetail = array('nama_syarikat' => $this->input->post('nama_syarikat'),
                                       'no_pendaftaran' => $this->input->post('no_pendaftaran'),
                                        'alamat_syarikat' => $this->input->post('alamat_syarikat'),
                                        'notel' => $this->input->post('notel'),
                                        'nofax' => $this->input->post('nofax'),
                                        'email' => $this->input->post('email')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $updateSyarikat = $this->utilitikeperluansumber_model->update_syarikat($syarikat_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($updateSyarikat)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('utilitiKeperluanSumber/sumber_manusia_luaran');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br>');
                        redirect('utilitiKeperluanSumber/kemaskinisyarikat/'.$syarikat_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }

             
            /*
        Updated : dianaismail 26/10/2013
      */
            function tambahstaf()
         {
           if($_POST)
             {
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/tambah_staf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
              
                //$syarikat_id = $this->uri->segment(3);
                //$utiliti_sumber_man_id = $this->uri->segment(3); 
        
        $syarikat_id = $this->input->post('company');
        
                if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia_luaran($syarikat_id))
                {
                    $data['sumbermanusialuaran'] = $getSumberManusia;
                }
               
             //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                //$this->form_validation->set_rules('nama_syarikat','Nama Syarikat','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                $this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                $this->form_validation->set_rules('jawatan','Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('disiplin','Disiplin/Jawatan','trim|required|xss_clean');
                $this->form_validation->set_rules('gaji','Gaji','trim|required|xss_clean');
                $this->form_validation->set_rules('koslebihmasa','Kos Lebih Masa','trim|required|xss_clean');
                
            if($this->form_validation->run())
            {
        //upload file
        $config['upload_path'] = $this->config->item('upload_path')."utiliti/";
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '3000000';
        
        $this->load->library('upload', $config);
        
        $checkError=0;
        if(empty($_FILES['userfile']['name']))
        {  
           $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Sila isi Surat Lantikan.</font><br></strong><br>');
                   redirect('utilitiKeperluanSumber/tambahstaf/'.$syarikat_id);
        }
        
        if($this->upload->do_upload('userfile'))
        {
          //upload
          $dataUpload = $this->upload->data();
          
          $data['utiliti_sumber_man_id'] = $this->session->userdata('utiliti_sumber_man_id');
                          
          $utiliti_sumber_man_id = $this->input->post('utiliti_sumber_man_id');                
          $this->session->set_userdata(array('utiliti_sumber_man_id' => $utiliti_sumber_man_id));
          
          $addSumberMan = $this->utilitikeperluansumber_model->tambahsumbermanusialuaran($dataUpload['full_path']);
        }
        else
        {
           $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN 1: '.$this->upload->display_errors().'</font><br></strong><br>');
                   redirect('utilitiKeperluanSumber/tambahstaf/'.$syarikat_id);
        }

                if($addSumberMan)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Luaran Berjaya Didaftarkan</font><br>');
                    redirect('utilitiKeperluanSumber/tambahstaf/'.$syarikat_id);
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                    redirect('utilitiKeperluanSumber/tambahstaf/'.$syarikat_id);
                }                
            }      
            else
            {
               $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/sumber_manusia';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                 if($getSumberManusia = $this->utilitikeperluansumber_model->get_sumber_manusia())
                {
                    $data['sumbermanusia'] = $getSumberManusia;
                } 
        
        redirect('utilitiKeperluanSumber/tambahstaf/'.$syarikat_id);
                 
               // $this->load->view('template/default', $data);
            } 
                
                
                
             }
         else
             {
             
             
             $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/tambah_staf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
              
                $syarikat_id = $this->uri->segment(3);
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
                   
                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
         }

            
        /*
		Added : diana 27/10/2013
		Desc  : download file
	*/
	function muat_suratlantikan()
	{
		$node_id = '18';
		$menu_name = 'menu1';
		$menu_link = 'keperluan_sumber/tambah_staf';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
			
		$companyID = $this->uri->segment(3);
		$manusiaID = $this->uri->segment(4);
		
		$lokasiFile  = $this->utilitikeperluansumber_model->get_documentInfo($manusiaID);
		
		if($lokasiFile<>'')
		{	
			$data = file_get_contents($lokasiFile); // Read the file's contents
			$name = basename($lokasiFile);

			force_download($name, $data);
		}
		
	} 
         
      
       function tambahpejabat()
        {
        if($_POST)
        {
           
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/pengurusan_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                $urus_pej_id = $this->uri->segment(3); 
                
                
                
                if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej())
                {
                    $data['urusanpejabat'] = $getUrusPej;
                
                }
               
                
             //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('jenama1','Jenama','trim|required|xss_clean');
                $this->form_validation->set_rules('spesifikasi','Spesifikasi','trim|required|xss_clean');
                $this->form_validation->set_rules('alat_pej_tag_no','alat_pej_tag_no','trim|required|xss_clean');

            if($this->form_validation->run())
            {
                $data['urus_pej_id'] = $this->session->userdata('urus_pej_id');
                $addPejabat = $this->utilitikeperluansumber_model->tambahpejabat($urus_pej_id);
                
                $urus_pej_id = $this->input->post('urus_pej_id');                
                $this->session->set_userdata(array('urus_pej_id' => $urus_pej_id));

                if($addPejabat)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Alat Pengurusan Pejabat Berjaya Didaftarkan</font><br>');
                    redirect('utilitiKeperluanSumber/tambahpejabat');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan.</font><br></strong><br>');
                    redirect('utilitiKeperluanSumber/tambahpejabat');
                }                
            }      
            else
            {
               $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/pengurusan_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                 if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej())
                {
                    $data['urusanpejabat'] = $getUrusPej;
                
                }
 
                if($getUrusPej = $this->utilitikeperluansumber_model->get_list())
                {
                   $data['uruspejabat'] = $getUrusPej;
                }

                $this->load->view('template/default', $data);
            } 
        }
        else
        {
            
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/pengurusan_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej())
                {
                    $data['urusanpejabat'] = $getUrusPej;
                
                }
                
            if($getUrusPej = $this->utilitikeperluansumber_model->get_list())
                {
                   $data['uruspejabat'] = $getUrusPej;
                }

                $this->load->view('template/default', $data);
    
        }
    }
    
    
    
   
function kemaskinipejabat()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/kemaskini_pejabat';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $urus_pej_id = $this->uri->segment(3);

                if($getUrusPej = $this->utilitikeperluansumber_model->get_pengurusan_pej_1($urus_pej_id))
                {
                    $data['urusanpejabat'] = $getUrusPej;

                }
                else
                    echo 'gagal';
                //die();

                if($getList = $this->utilitikeperluansumber_model->get_list())
                {
                    $data['list'] = $getList;
                }

                $this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('jenama','Jenama','trim|required|xss_clean');
                $this->form_validation->set_rules('spesifikasi','Spesifikasi','trim|required|xss_clean');
                $this->form_validation->set_rules('alat_pej_tag_no','alat_pej_tag_no','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('kat_alat_pej_id' => $this->input->post('kat_alat_pej_id'),
                                        'jenama' => $this->input->post('jenama'),
                                        'spesifikasi' => $this->input->post('spesifikasi'),
                                        'alat_pej_tag_no' => $this->input->post('alat_pej_tag_no'),
                                        'kos_seunit' => $this->input->post('kos_seunit')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $updatePejabat = $this->utilitikeperluansumber_model->update_pejabat($urus_pej_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($updatePejabat)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Pengurusan Pejabat Berjaya Dikemaskini</font><br>');
                        redirect('utilitiKeperluanSumber/tambahpejabat');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('utilitiKeperluanSumber/kemaskinipejabat/'.$urus_pej_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }

            
            
            
   function tambahalatkerja()
        {
        if($_POST)
        {
           
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/peralatan_kerja';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
           
                
                $alat_kerja_id = $this->uri->segment(3); 
                
                
                
                if($getAlatKerja_1 = $this->utilitikeperluansumber_model->get_alat_kerja_1($alat_kerja_id))
                {
                    $data['alatkerja'] = $getAlatKerja_1;

                }
             //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('jenama','Jenama','trim|required|xss_clean');
                $this->form_validation->set_rules('spesifikasi','Spesifikasi','trim|required|xss_clean');
                $this->form_validation->set_rules('alat_kerja_tag_no','alat_kerja_tag_no','trim|required|xss_clean');

            if($this->form_validation->run())
            {
                
                $data['alat_kerja_id'] = $this->session->userdata('alat_kerja_id');
                $addAlatKerja = $this->utilitikeperluansumber_model->tambahalatkerja($alat_kerja_id);
                
                $alat_kerja_id = $this->input->post('alat_kerja_id');                
                $this->session->set_userdata(array('alat_kerja_id' => $alat_kerja_id));

                if($addAlatKerja)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Alat Kerja Berjaya Didaftarkan</font><br>');
                    redirect('utilitiKeperluanSumber/tambahalatkerja');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan.</font><br></strong><br>');
                    redirect('utilitiKeperluanSumber/tambahalatkerja');
                }                
            }      
            else
            {
               $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/peralatan_kerja';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                                
                if($getAlatKej = $this->utilitikeperluansumber_model->get_list_kerja())
                {
                   $data['alatkej'] = $getAlatKej;
                }

                if($getAlatKerja = $this->utilitikeperluansumber_model->get_alat_kerja())
                {
                    $data['alatkerja'] = $getAlatKerja;
                }

                $this->load->view('template/default', $data); } 
        }
        else
        {
            
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/peralatan_kerja';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
            if($getAlatKej = $this->utilitikeperluansumber_model->get_list_kerja())
                {
                   $data['alatkej'] = $getAlatKej;
                }

            if($getAlatKerja = $this->utilitikeperluansumber_model->get_alat_kerja())
                {
                    $data['alatkerja'] = $getAlatKerja;
                }

                $this->load->view('template/default', $data);
    
        }
    }
    
    
    
   
function kemaskinialatkerja()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'keperluan_sumber/kemaskini_alatkerja';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $alat_kerja_id = $this->uri->segment(3);

                 if($getAlatKerja_1 = $this->utilitikeperluansumber_model->get_alat_kerja_1($alat_kerja_id))
                {
                    $data['alatkerja'] = $getAlatKerja_1;

                }
                else
                    echo 'gagal';
                //die();

                if($getListKerja = $this->utilitikeperluansumber_model->get_list_kerja())
                {
                    $data['list'] = $getListKerja;
                }

                $this->form_validation->set_rules('kat_alat_kerja_id','Kategori Alat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('jenama','Jenama','trim|required|xss_clean');
                $this->form_validation->set_rules('spesifikasi','Spesifikasi','trim|required|xss_clean');
                $this->form_validation->set_rules('alat_kerja_tag_no','alat_kerja_tag_no','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('kat_alat_kerja_id' => $this->input->post('kat_alat_kerja_id'),
                                        'jenama' => $this->input->post('jenama'),
                                        'spesifikasi' => $this->input->post('spesifikasi'),
                                        'alat_kerja_tag_no' => $this->input->post('alat_kerja_tag_no'),
										'kos_seunit' => $this->input->post('kos_seunit')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $updateAlatKerja = $this->utilitikeperluansumber_model->update_kerja($alat_kerja_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($updateAlatKerja)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Alat Kerja Berjaya Dikemaskini</font><br>');
                        redirect('utilitiKeperluanSumber/tambahalatkerja');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('utilitiKeperluanSumber/kemaskinialatkerja/'.$alat_kerja_id.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }   
            
//populate dropdown
  function get_cities($country){
      $this->load->model('daerah_model');
      //print_r($this->city_model->get_cities($country));
      header('Content-Type: application/x-json; charset=utf-8');
      echo(json_encode($this->daerah_model->get_daerah($country)));
     // $this->output->set_output(json_encode($this->city_model->get_cities($country)));
      
}
        
}