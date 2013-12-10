<?php

class Pentadbir extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -  
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in 
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */

  function __construct()
  {
    parent::__construct();
    #load library dan helper yang dibutuhkan
    
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $this->load->library(array('table','validation'));
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
	$this->load->helper('function_helper');
	$this->load->model('takwim_model');
    $this->load->model('pentadbir_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
	
	
	//$this->load->model('pentadbir_negeri_model');
    //$this->load->model('pentadbir_daerah_model');	
	
	
    $this->load->library('pagination');
	$this->load->library('table');
	date_default_timezone_set('UTC'); 
        
    //$this->output->enable_profiler(TRUE); //display query statement
              
  }
     
    
  //** Start Pentadbir **//

    function pendaftaran_pengguna()
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : pendaftaran pengguna

    $node_id = '116';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/pendaftaran_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->pentadbir_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->pentadbir_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->pentadbir_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->pentadbir_model->get_negeri(); //dapatkan senarai negeri dr db
        
                $this->form_validation->set_rules('nama_user1','Nama Pengguna','trim|required|xss_clean');
                $this->form_validation->set_rules('uname1','MyID','trim|required|xss_clean');
                $this->form_validation->set_rules('no_tel1','No.Telefon','trim|required|xss_clean');
                $this->form_validation->set_rules('idkem1','Kementerian','trim|required|xss_clean');
                //$this->form_validation->set_rules('idjab_agensi1','Jabatan/Agensi','trim|required|xss_clean');
                $this->form_validation->set_rules('idnegeri1','Negeri','trim|required|xss_clean');
                //$this->form_validation->set_rules('iddaerah1','Jabatan/Agensi Daerah','trim|required|xss_clean');
                $this->form_validation->set_rules('alamat_pej1','Alamat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('no_tel_pej1','No.Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('user_email1','E-mel','trim|required|xss_clean');

                  if($this->form_validation->run())
                {
                //$data['lampiran_id'] = $this->session->userdata('lampiran_id');
                $regUser = $this->pentadbir_model->daftar_pengguna();
                
                $myspata_user_id = $this->input->post('myspata_user_id');                
                //$this->session->set_userdata(array('lampiran_id' => $lampiran_id));

                if($regUser)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Pengguna telah Berjaya Didaftarkan</font><br>');
                    redirect('pentadbir/pendaftaran_pengguna');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal mendaftar pengguna.</font><br></strong><br>');
                    redirect('pentadbir/pendaftaran_pengguna');
                }  
             }
             $this->load->view('template/default', $data);
                
  }
  
	function get_cities($country){
      	$this->load->model('pentadbir_daerah_model');
     	//print_r($this->city_model->get_cities($country));
      	header('Content-Type: application/x-json; charset=utf-8');
      	echo(json_encode($this->pentadbir_daerah_model->get_cities($country)));
     	// $this->output->set_output(json_encode($this->city_model->get_cities($country)));
      
	}
  

  function reset_pengguna()
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : reset katalaluan pengguna
        
        
    $node_id = '118';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/reset_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $rules = array(
                            array(
                                  'field'   => 'katalaluan',
                                  'label'   => 'Katalaluan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nokp',
                                  'label'   => 'No. Kad Pengenalan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'emel',
                                  'label'   => 'E-mel',
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
                    $data['main_content'] = 'penetapan_pentadbir/reset_pengguna';
                    $this->load->view('template/default', $data);
                      
                }
  }

  function peranan_pengguna()
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : peranan pengguna

    $node_id = '119';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/peranan_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
    
    $data['peranan'] = $this->pentadbir_model->get_peranan(); //dapatkan senarai peranan pengguna dr db

    $role_pengguna_id = $this->uri->segment(3);
    
        if($getListperanan = $this->pentadbir_model->get_listperanan())
                {
                    $data['peranan'] = $getListperanan;
                
                }
                
                $this->load->view('template/default', $data);
    
    }

  function xkemaskini_pengguna()
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : kemaskini profil pengguna

    $node_id = '120';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/kemaskini_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $data['kementerian'] = $this->pentadbir_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->pentadbir_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->pentadbir_model->get_daerah(); //dapatkan senarai daerah dr db
        
        $this->load->view('template/default', $data);
  }
  
  function pengurusan_pengguna()
    {
        if($_POST)
        {
           
    $node_id = '117';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/pengurusan_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


	$data['kementerian'] = $this->pentadbir_model->get_kementerian(); //dapatkan senarai kementerian dr db
	$data['jabatan'] = $this->pentadbir_model->get_jabatan(); //dapatkan senarai jabatan dr db
	$data['negeri'] = $this->pentadbir_model->get_negeri(); //dapatkan senarai negeri dr db
	$data['daerah'] = $this->pentadbir_model->get_daerah(); //dapatkan senarai daerah dr db
	$data['peranan'] = $this->pentadbir_model->get_peranan(); //dapatkan senarai peranan pengguna dr db
	$data['modul'] = $this->pentadbir_model->get_modul(); //dapatkan senarai modul dr db
    
	//$data['rowdt'] = $this->pentadbir_model->senarai_pengguna();
	//$data['sesr'] = $this->session->all_userdata();
	//$data['sesm'] = $this->aauth->get_session('menu');
        
        $myspata_userid = $this->uri->segment(3);

	if($getListuser = $this->pentadbir_model->get_listuser())
                {
                    $data['list_user'] = $getListuser;
                
                }
                
                $this->form_validation->set_rules('nama_user1','Nama Pengguna','trim|required|xss_clean');
                $this->form_validation->set_rules('uname1','MyID','trim|required|xss_clean');
                $this->form_validation->set_rules('no_tel1','No.Telefon','trim|required|xss_clean');
                $this->form_validation->set_rules('idkem1','Kementerian','trim|required|xss_clean');
                //$this->form_validation->set_rules('idjab_agensi1','Jabatan/Agensi','trim|required|xss_clean');
                $this->form_validation->set_rules('idnegeri1','Negeri','trim|required|xss_clean');
                //$this->form_validation->set_rules('iddaerah1','Jabatan/Agensi Daerah','trim|required|xss_clean');
                $this->form_validation->set_rules('alamat_pej1','Alamat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('no_tel_pej1','No.Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('user_email1','E-mel','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                $data['myspata_userid'] = $this->session->userdata('myspata_userid');
                //$addRekod = $this->pentadbir_model->tambahkawalan_rekod($myspata_userid);
                
                $myspata_userid = $this->input->post('myspata_userid');                
                $this->session->set_userdata(array('myspata_userid' => $myspata_userid));

                            
            }      
            else
            {
               $node_id = '117';
                $menu_name = 'front';
                $menu_link = 'penetapan_pentadbir/pengurusan_pengguna';

                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                 if($getListuser = $this->pentadbir_model->get_listuser())
                {
                    $data['list_user'] = $getListuser;
                
                }
                
                $this->load->view('template/default', $data);
            } 
        }
        else
        {
            
                $node_id = '117';
                $menu_name = 'front';
                $menu_link = 'penetapan_pentadbir/pengurusan_pengguna';

                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getListuser = $this->pentadbir_model->get_listuser())
                {
                    $data['list_user'] = $getListuser;
                
                }
                
                $this->load->view('template/default', $data);
    
        }
    }
    
    
    function kemaskini_pengguna()
         {
            
        
                $node_id = '18';
                $menu_name = 'menu1';
                $menu_link = 'penetapan_pentadbir/kemaskini_pengguna';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $myspata_userid = $this->uri->segment(3);

                if($getListuser1 = $this->pentadbir_model->get_listuser_1($myspata_userid))
                {
                    $data['list_user1'] = $getListuser1;
                
                }
                if($getKem = $this->pentadbir_model->get_kem_1())
                {
                    $data['kem'] = $getKem;
                }

                if($getNegeri = $this->pentadbir_model->get_negeri_1())
                {
                   $data['negeri'] = $getNegeri;
                }
                
                else
                    echo 'gagal';
                //die();


                $this->form_validation->set_rules('nama_user1','Nama Pengguna','trim|required|xss_clean');
                $this->form_validation->set_rules('uname1','MyID','trim|required|xss_clean');
                $this->form_validation->set_rules('noic','No. Kad Pengenalan','trim|required|xss_clean');
                $this->form_validation->set_rules('no_tel1','No.Telefon','trim|required|xss_clean');
                $this->form_validation->set_rules('idkem1','Kementerian','trim|required|xss_clean');
                //$this->form_validation->set_rules('idjab_agensi1','Jabatan/Agensi','trim|required|xss_clean');
                $this->form_validation->set_rules('idnegeri1','Negeri','trim|required|xss_clean');
                //$this->form_validation->set_rules('iddaerah1','Jabatan/Agensi Daerah','trim|required|xss_clean');
                $this->form_validation->set_rules('alamat_pej1','Alamat Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('no_tel_pej1','No.Telefon Pejabat','trim|required|xss_clean');
                $this->form_validation->set_rules('user_email1','E-mel','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('myspata_userid' => $this->input->post('myspata_userid'),
                                        'nama_user' => $this->input->post('nama_user1'),
                                        'uname' => $this->input->post('uname1'),
                                        'nric' => $this->input->post('noic'),
                                        'no_tel' => $this->input->post('no_tel1'),
                                        'idkem' => $this->input->post('idkem1'),
                                        'idnegeri' => $this->input->post('idnegeri1'),
                                        'alamat_pej' => $this->input->post('alamat_pej1'),
                                        'no_tel_pej' => $this->input->post('no_tel_pej1'),
                                        'user_email' => $this->input->post('user_email1'),
                                        //'user_regdate' => date('Y-m-d H:m:s'),
                                        'isaktif' => $this->input->post('isaktif')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_rekod = $this->pentadbir_model->update_rekod($myspata_userid, $dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_rekod)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
                        redirect('penetapan_pentadbir/pengurusan_pengguna');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('penetapan_pentadbir/pengurusan_pengguna/'.$myspata_userid.'');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
            

  function xpengurusan_pengguna()
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : pengurusan pengguna

    $node_id = '117';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/pengurusan_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


	$data['kementerian'] = $this->pentadbir_model->get_kementerian(); //dapatkan senarai kementerian dr db
	$data['jabatan'] = $this->pentadbir_model->get_jabatan(); //dapatkan senarai jabatan dr db
	$data['negeri'] = $this->pentadbir_model->get_negeri(); //dapatkan senarai negeri dr db
	$data['daerah'] = $this->pentadbir_model->get_daerah(); //dapatkan senarai daerah dr db
	$data['peranan'] = $this->pentadbir_model->get_peranan(); //dapatkan senarai peranan pengguna dr db
	$data['modul'] = $this->pentadbir_model->get_modul(); //dapatkan senarai modul dr db
    
	//$data['rowdt'] = $this->pentadbir_model->senarai_pengguna();
	//$data['sesr'] = $this->session->all_userdata();
	//$data['sesm'] = $this->aauth->get_session('menu');

	if($getListuser = $this->pentadbir_model->get_listuser())
                {
                    $data['list_user'] = $getListuser;
                
                }
                
                $this->load->view('template/default', $data);
    
    }


/*
         * Author : Anuar
         * Title  : Pengurusan Takwim
         * Date   : 28/7/2013
         */



 function pengurusan_takwim($year=null,$month=null)

  {   

     $this->load->model('pentadbir_takwim_model');
      
  if(($this->uri->segment(3) != NULL) && ($this->uri->segment(4) != NULL)&& ($this->uri->segment(5) != NULL)){

    $year = $this->uri->segment(3);
    $mon  = $this->uri->segment(4);
    $day  =  $this->uri->segment(5);

  }else{  

    $year =  date('Y');
    $mon  =  date('m');  
    $day  =  $this->uri->segment(3);
   }
    //echo "tahun=".$year."<br/>";
    //echo "bulan=".$mon."<br/>"; 
   //echo "day=".$day."<br/>";    

    $node_id = '177';
    $menu_name = 'front';
   
               
      
    if(($this->uri->segment(6)=='edit') || ($this->uri->segment(4)=='edit')){

    $menu_link = 'penetapan_pentadbir/senarai_takwim_aktiviti';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $tarikh = $year.'-'.$mon.'-'.$day;
    //echo $tarikh;

    $data['takwim_aktiviti'] = $this->pentadbir_takwim_model->get_takwim_aktivti($tarikh);

    $this->load->view('template/default', $data);

    }else if($this->uri->segment(6)=='delete'){

      //echo "delete";

    $this->pentadbir_takwim_model->delete_takwim_aktivti($this->uri->segment(7));

    $menu_link = 'penetapan_pentadbir/takwim';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

   

    $data['calendar'] = $this->pentadbir_takwim_model->generate($year, $month);

    $this->load->view('template/default', $data);

 }else if($this->input->post('simpan')=='simpan'){

 $this->pentadbir_takwim_model->add_calendar_data();

  $menu_link = 'penetapan_pentadbir/takwim';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

   

    $data['calendar'] = $this->pentadbir_takwim_model->generate($year, $month);

    redirect('pentadbir/pengurusan_takwim/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');

    //$this->load->view('template/default', $data);

}else if($this->uri->segment(6)=='update'){




   $menu_link = 'penetapan_pentadbir/update_takwim_aktiviti';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

   $data['aktiviti'] = $this->pentadbir_takwim_model->get_aktiviti_title($this->uri->segment(7));
   $data['r_bulan'] = $this->pentadbir_takwim_model->get_r_bulan($this->uri->segment(7));
   $data['r_tahun'] = $this->pentadbir_takwim_model->get_r_tahun($this->uri->segment(7));
    $data['alert'] = $this->pentadbir_takwim_model->get_alert_day($this->uri->segment(7));
   $data['hantar_notifi'] = $this->pentadbir_takwim_model->get_hantar_notifi($this->uri->segment(7));
   $data['flag_pspao'] = $this->pentadbir_takwim_model->get_flag_pspao($this->uri->segment(7));

    $this->load->view('template/default', $data);




}else if($this->input->post('update')=='update'){

 $this->pentadbir_takwim_model->update_calendar_data($this->input->post('takwimid'));

  $menu_link = 'penetapan_pentadbir/takwim';

  $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

     $data['calendar'] = $this->pentadbir_takwim_model->generate($year, $month);

    redirect('pentadbir/pengurusan_takwim/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');

}else if($this->uri->segment(3) !='' && $this->uri->segment(4)!=''){

$menu_link = 'penetapan_pentadbir/takwim';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

   

    $data['calendar'] = $this->pentadbir_takwim_model->generate($year, $month);

    $this->load->view('template/default', $data);
    
}else{

    redirect('pentadbir/pengurusan_takwim/'.$year.'/'.$mon,'refresh');
    /*$menu_link = 'penetapan_pentadbir/takwim';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

   

    $data['calendar'] = $this->pentadbir_takwim_model->generate($year, $month);

    $this->load->view('template/default', $data);
    */
    //   
    }       

  

               }


  //** END Pentadbir **//
  

}