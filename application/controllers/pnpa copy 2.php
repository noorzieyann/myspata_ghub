<?php

class Pnpa extends CI_Controller {

function __construct()
  {
    parent::__construct();
    #load library dan helper yang dibutuhkan
     date_default_timezone_set('Asia/Kuala_Lumpur');
    $this->load->library(array('table','validation'));
    //$this->load->library('form_validation');
    
    $this->load->helper(array('form', 'url'));
    $this->load->helper('function_helper');
    $this->load->model('utama_model');
     $this->load->model('pspao_model');
    $this->load->model('negeri_model');
     $this->load->model('daerah_model');
    $this->load->library('Aauth');
    $this->load->model('pnpa_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
    $this->load->model('utilitikeperluansumber_model');
    $this->load->library('pagination');
    $this->load->library('table');
    $sessionarray = $this->session->all_userdata();
    $this->load->helper('download');
    $this->load->model('function_model');     
   //$this->output->enable_profiler(TRUE); //display query statement
    
    if(!$this->aauth->is_loggedin()){
     echo '<script>';
    echo 'alert("Belum Login");';
      echo 'window.location = "'.site_url('auth').'"';
   echo '</script>';
    }
    
  }
  
  
  function arahan_penyediaan_pnpa_awal()
  {
       $node_id = '123';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/arahan_penyediaan_pnpa_awal';
    
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
     $id= $this->uri->segment(3); 
    if($_POST)
        {
             if($this->input->post('pegawai')=='pof')
                {  redirect('pnpa/arahan_penyediaan_pnpa_pof/'.$id);
                
                }
            else if($this->input->post('pegawai')=='pif')
                {  redirect('pnpa/arahan_penyediaan_pnpa_pif/'.$id);
                
                }
            else if($this->input->post('pegawai')=='ppd')
                {  redirect('pnpa/arahan_penyediaan_pnpa_ppd/'.$id);
                
                }
            else
            {
              echo 'gagal kalih gak';
             }  
         }
    
  $this->load->view('template/default', $data);
  }

  function arahan_penyediaan_pnpa_pof()
  {
    $node_id = '123';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/arahan_penyediaan_pnpa_pof';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $id= $this->uri->segment(3); 
    $sessionarray = $this->session->all_userdata();
    $user_kemid = $sessionarray['user_kemid'];

   $data['user_list'] = $this->pnpa_model->get_user_pelan_list($user_kemid,6);
    
   
    if($this->input->post('hantar')=='hantar'){

     
    
        $i=0;
        $var='bagi';
          
         if($this->input->post('ptra')!='')
             {
             $i=1;
             $var= $var.' PTRA';
         } 
         
         if($this->input->post('popa')!='' && $i==0)
            {$i=1;
             $var= $var.' POPA';
             
            }
         else if($this->input->post('popa')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'POPA';
             }
      
        if($this->input->post('pnpa')!='' && $i==0)
            {$i=1;
             $var= $var.' PNPA';
             
            }
         else if($this->input->post('pnpa')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PNPA';
             }
             
        if($this->input->post('ppun')!='' && $i==0)
            {$i=1;
             $var= $var.' PPUN';
             
            }
         else if($this->input->post('ppun')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PPUN';
             }
      if($this->input->post('pla')!='' && $i==0)
            {$i=1;
             $var= $var.' PLA';
             
            }
         else if($this->input->post('pla')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PLA';
             }
   
            if ($i==1){

                    $strnew = $var;
                    //echo $strnew;
                    }


                    if ($i==2){

                            //ubah yg akhir jadi dan
                            $tamat = strrpos($var,'@');
                            $strnew = substr_replace($var,'dan',$tamat,1);
                            //echo $strnew.'<br>';

                    }

                    if ($i>2) {


                            //ubah yg akhir jadi dan
                            $tamat = strrpos($var,'@');
                            $strnew = substr_replace($var,'dan',$tamat,1);
                    //  echo $strnew.'<br>';

                            $strnew = str_replace('@',',',$strnew);
                    //  echo $strnew.'<br>';

                            $strnew = str_replace(' ,',',',$strnew);
                            //echo $strnew;
                    }

        $userid = $this->input->post('userid');
        $userdetail =  $this->pspao_model->get_detail_user($userid[0]);
    
        $path = 'pnpa/arahan_penyediaan_pnpa_ppd2/'.$id;

        $noti_id=$this->function_model->insert_notifikasi(42,4,$sessionarray['user_id'],$userid[0],$path,$strnew); 
         
        
        $this->pnpa_model->tambaharahanpelanpof($noti_id,$id); 
        
        //$data['detail_msg'] = $this->function_model->get_masej($pspao_awal_id,1);
        $data['main_content'] = 'alert';
        $data['msg'] = 'Anda telah berjaya menghantar arahan penyediaan bagi Pelan Tahunan.Klik butang OK untuk kembali ke arahan penyediaan pelan.';
        $data['link'] = 'pnpa/arahan_penyediaan_pnpa_awal/'.$id;
    }


    
  $this->load->view('template/default', $data);
  }
  
 //** Start PNPA **//
 function arahan_penyediaan_pnpa_pif($id)
  {
      
        
    $node_id = '123';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/arahan_penyediaan_pnpa_pif';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
   
    $id= $this->uri->segment(3); 
    $sessionarray = $this->session->all_userdata();
    $user_kemid = $sessionarray['user_kemid'];
    $data['user_list'] = $this->pnpa_model->get_user_pelan_list($user_kemid,7);
   
    if($this->input->post('hantar')=='hantar')
    {

        $i=0;
        $var='bagi';
          
         if($this->input->post('ptra')!='')
             {
             $i=1;
             $var= $var.' PTRA';
         } 
         
         if($this->input->post('popa')!='' && $i==0)
            {$i=1;
             $var= $var.' POPA';
             
            }
         else if($this->input->post('popa')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'POPA';
             }
      
        if($this->input->post('pnpa')!='' && $i==0)
            {$i=1;
             $var= $var.' PNPA';
             
            }
         else if($this->input->post('pnpa')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PNPA';
             }
             
        if($this->input->post('ppun')!='' && $i==0)
            {$i=1;
             $var= $var.' PPUN';
             
            }
         else if($this->input->post('ppun')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PPUN';
             }
      if($this->input->post('pla')!='' && $i==0)
            {$i=1;
             $var= $var.' PLA';
             
            }
         else if($this->input->post('pla')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PLA';
             }
   
            if ($i==1){

                    $strnew = $var;
                    //echo $strnew;
                    }


                    if ($i==2){

                            //ubah yg akhir jadi dan
                            $tamat = strrpos($var,'@');
                            $strnew = substr_replace($var,'dan',$tamat,1);
                            //echo $strnew.'<br>';

                    }

                    if ($i>2) {


                            //ubah yg akhir jadi dan
                            $tamat = strrpos($var,'@');
                            $strnew = substr_replace($var,'dan',$tamat,1);
                    //  echo $strnew.'<br>';

                            $strnew = str_replace('@',',',$strnew);
                    //  echo $strnew.'<br>';

                            $strnew = str_replace(' ,',',',$strnew);
                            //echo $strnew;
                    }

        $userid = $this->input->post('userid');
        $userdetail =  $this->pspao_model->get_detail_user($userid[0]);
    
        $path = 'pnpa/arahan_penyediaan_pnpa_ppd2/'.$id;

        $noti_id=$this->function_model->insert_notifikasi(43,4,$sessionarray['user_id'],$userid[0],$path,$strnew); 
       
        $this->pnpa_model->tambaharahanpelanpif($noti_id,$id); 

        //print_r($noti_pelan);
        //die();
        //$data['detail_msg'] = $this->function_model->get_masej($pspao_awal_id,1);
        $data['main_content'] = 'alert';
        $data['msg'] = 'Anda telah berjaya menghantar arahan penyediaan bagi Pelan Tahunan.Klik butang OK untuk kembali ke arahan penyediaan pelan.';
        $data['link'] = 'pnpa/arahan_penyediaan_pnpa_awal/'.$id;

        //redirect('pspao_awal/senarai_pspao_baru');
    
    }




        $this->load->view('template/default', $data);
        
  }
  function arahan_penyediaan_pnpa_ppd()
  {
      
        
    $node_id = '123';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/arahan_penyediaan_pnpa_ppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $id= $this->uri->segment(3); 
    $sessionarray = $this->session->all_userdata();
    $user_kemid = $sessionarray['user_kemid'];

    $data['user_list'] = $this->pnpa_model->get_user_pelan_list($user_kemid,8);
  
   if($this->input->post('hantar')=='hantar'){

     
    
        $i=0;
        $var='bagi';
          
         if($this->input->post('ptra')!='')
             {
             $i=1;
             $var= $var.' PTRA';
         } 
         
         if($this->input->post('popa')!='' && $i==0)
            {$i=1;
             $var= $var.' POPA';
             
            }
         else if($this->input->post('popa')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'POPA';
             }
      
        if($this->input->post('pnpa')!='' && $i==0)
            {$i=1;
             $var= $var.' PNPA';
             
            }
         else if($this->input->post('pnpa')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PNPA';
             }
             
        if($this->input->post('ppun')!='' && $i==0)
            {$i=1;
             $var= $var.' PPUN';
             
            }
         else if($this->input->post('ppun')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PPUN';
             }
      if($this->input->post('pla')!='' && $i==0)
            {$i=1;
             $var= $var.' PLA';
             
            }
         else if($this->input->post('pla')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PLA';
             }
   
            if ($i==1){

                    $strnew = $var;
                    //echo $strnew;
                    }


                    if ($i==2){

                            //ubah yg akhir jadi dan
                            $tamat = strrpos($var,'@');
                            $strnew = substr_replace($var,'dan',$tamat,1);
                            //echo $strnew.'<br>';

                    }

                    if ($i>2) {


                            //ubah yg akhir jadi dan
                            $tamat = strrpos($var,'@');
                            $strnew = substr_replace($var,'dan',$tamat,1);
                    //  echo $strnew.'<br>';

                            $strnew = str_replace('@',',',$strnew);
                    //  echo $strnew.'<br>';

                            $strnew = str_replace(' ,',',',$strnew);
                            //echo $strnew;
                    }

        $userid = $this->input->post('userid');
        $userdetail =  $this->pspao_model->get_detail_user($userid[0]);
    
        $notifikasi =  $this->pnpa_model->get_noti_pelan($id);
        $path = 'pspao/senarai_pspao_akhir_ppd_2/'.$id.'/'.$notifikasi;

        $noti_id=$this->function_model->insert_notifikasi(40,4,$sessionarray['user_id'],$userid[0],$path,$strnew); 
         
        
        $this->pnpa_model->tambaharahanpelanppd($noti_id,$id); 
        
        //$data['detail_msg'] = $this->function_model->get_masej($pspao_awal_id,1);
        $data['main_content'] = 'alert';
        $data['msg'] = 'Anda telah berjaya menghantar arahan penyediaan bagi Pelan Tahunan.Klik butang OK untuk kembali ke arahan penyediaan pelan.';
        $data['link'] = 'pnpa/arahan_penyediaan_pnpa_awal/'.$id;
    }


        $this->load->view('template/default', $data);
        
  }
function arahan_penyediaan_pnpa_ppd2()
  {
      
        
    $node_id = '123';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/arahan_penyediaan_pnpa_ppd2';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $id= $this->uri->segment(3); 
    $sessionarray = $this->session->all_userdata();
    $user_kemid = $sessionarray['user_kemid'];

    $data['user_list'] = $this->pnpa_model->get_user_pelan_list($user_kemid,8);
  
   if($this->input->post('hantar')=='hantar'){

     
    
        $i=0;
        $var='bagi';
          
         if($this->input->post('ptra')!='')
             {
             $i=1;
             $var= $var.' PTRA';
         } 
         
         if($this->input->post('popa')!='' && $i==0)
            {$i=1;
             $var= $var.' POPA';
             
            }
         else if($this->input->post('popa')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'POPA';
             }
      
        if($this->input->post('pnpa')!='' && $i==0)
            {$i=1;
             $var= $var.' PNPA';
             
            }
         else if($this->input->post('pnpa')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PNPA';
             }
             
        if($this->input->post('ppun')!='' && $i==0)
            {$i=1;
             $var= $var.' PPUN';
             
            }
         else if($this->input->post('ppun')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PPUN';
             }
      if($this->input->post('pla')!='' && $i==0)
            {$i=1;
             $var= $var.' PLA';
             
            }
         else if($this->input->post('pla')!='' && $i>0)
             {
             $i=$i+1;
             $var= $var.' @ '.'PLA';
             }
   
            if ($i==1){

                    $strnew = $var;
                    //echo $strnew;
                    }


                    if ($i==2){

                            //ubah yg akhir jadi dan
                            $tamat = strrpos($var,'@');
                            $strnew = substr_replace($var,'dan',$tamat,1);
                            //echo $strnew.'<br>';

                    }

                    if ($i>2) {


                            //ubah yg akhir jadi dan
                            $tamat = strrpos($var,'@');
                            $strnew = substr_replace($var,'dan',$tamat,1);
                    //  echo $strnew.'<br>';

                            $strnew = str_replace('@',',',$strnew);
                    //  echo $strnew.'<br>';

                            $strnew = str_replace(' ,',',',$strnew);
                            //echo $strnew;
                    }

        $userid = $this->input->post('userid');
        $userdetail =  $this->pspao_model->get_detail_user($userid[0]);
    
        $notifikasi =  $this->pnpa_model->get_noti_pelan($id);
        $path = 'pspao/senarai_pspao_akhir_ppd_2/'.$id.'/'.$notifikasi;

        $noti_id=$this->function_model->insert_notifikasi(40,4,$sessionarray['user_id'],$userid[0],$path,$strnew); 
         
        
        $this->pnpa_model->tambaharahanpelanppd($noti_id,$id); 
        
        //$data['detail_msg'] = $this->function_model->get_masej($pspao_awal_id,1);
        $data['main_content'] = 'alert';
        $data['msg'] = 'Anda telah berjaya menghantar arahan penyediaan bagi Pelan Tahunan.Klik butang OK untuk kembali ke arahan penyediaan pelan.';
        $data['link'] = 'pnpa/arahan_penyediaan_pnpa_awal/'.$id;
    }


        $this->load->view('template/default', $data);
        
  }


 function senarai_pp_pnpa()
  {
        //Name : Azian
        //Date : 12/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/senarai_pp_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        //$data['year_list'] =year_dropdown();  //get year list 
        //$data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        //$data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
    if($getPnpa = $this->pnpa_model->get_pnpa($pspa_id))
    {
       $data['senarai_pnpa'] = $getPnpa;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
        
        function senarai_ptf_pnpa()
  {
        //Name : Azian
        //Date : 12/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/senarai_ptf_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        //$data['year_list'] =year_dropdown();  //get year list 
        //$data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        //$data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
    if($getPnpa = $this->pnpa_model->get_pnpa())
    {
       $data['senarai_pnpa'] = $getPnpa;
    }
              
            $this->load->view('template/default', $data);
        
  }
        
       function senarai_ppd_pnpa()
  {
        //Name : Azian
        //Date : 11/9/13
        //Desc : senarai pegawai pengawal
		/*
		 Updated : diana 31/10/2013 - data
		*/

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/senarai_ppd_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
	$sessionarray = $this->session->all_userdata();
    $pspa_id = $this->uri->segment(3);  
	 if($getPnpa1 = $this->function_model->get_tab(4))
    {
       $data['tab'] = $getPnpa1;
    }
    if($getPnpa = $this->pnpa_model->get_pnpa_status($pspa_id))
    {
       $data['senarai_pnpa'] = $getPnpa;
    }
              
    $this->load->view('template/default', $data);
        
  }

   function senarai_pif_pnpa()
  {
        //Name : Azian
        //Date : 11/9/13
        //Desc : senarai pegawai pengawal

    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/senarai_pif_pnpa';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


       // $data['year_list'] =year_dropdown();  //get year list 
       // $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
       // $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
       // $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
    

    if($getPnpa = $this->pnpa_model->get_pnpa())
    {
       $data['senarai_pnpa'] = $getPnpa;
    }
              
            $this->load->view('template/default', $data);
        
  }

 /* function kandungan_pnpa()
  {
    //nama:yann
                //date:8/7/13
                //desc:page penyediaan kandungan pnpa
    //$data['main_content'] = 'pnpa/kandungan_pnpa';
                //$this->load->view('template/default_pelan', $data);
            if($_POST)
            {
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kandungan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                $pnpa_id = $this->uri->segment(3); 
                $kand_id= $this->input->post('kandungan_id');
                
                if($getSumberManusia = $this->pnpa_model->get_kat_premis())
                {
                    $data['katpremis'] = $getSumberManusia;
                
                }
               
               
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
                    $data['pnpa_id'] = $this->session->userdata('pnpa_id');
                    //$addPnpa = $this->pnpa_model->tambahpnpa($pnpa_id);

                    if($this->input->post('sunting')!= NULL)
                        {
                            $pnpa_id = $this->pnpa_model->updatepnpa($this->input->post('sunting'));
                            $pnpa_id = $this->pnpa_model->updatepnpa2();
                        }
                    else
                        {
                           $pnpa_id = $this->pnpa_model->tambahpnpa();  
                        }
               
                    $this->session->set_userdata(array('sunting' => $pnpa_id));

                    if($pnpa_id)
                    {

                        //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('pnpa/model_struktur_pnpa/'.$pnpa_id,'refresh');
                    }
                    else
                    {
                        //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                        redirect('pnpa/kandungan_pnpa');
                    }                
                }      
            else
            {
               $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kandungan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                 $data['year_list'] =year_dropdown();  //get year list 
                if($getSumberManusia = $this->pnpa_model->get_kat_premis())
                {
                    $data['katpremis'] = $getSumberManusia;
                
                }
                 
                 
                $this->load->view('template/default', $data);
            } 
            }
            else
            {
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kandungan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['year_list'] =year_dropdown();  //get year list 
                //$session_id = $this->session->userdata('user_id'); 
               if($getSumberManusia = $this->pnpa_model->get_kat_premis())
                {
                    $data['katpremis'] = $getSumberManusia;
                
                }
                
                
                
                $this->load->view('template/default', $data);
            }
               
  }

  */
   
   
    //updated : diana 31/10/2013 
   function kandungan_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page penyediaan kandungan pnpa
		//$data['main_content'] = 'pnpa/kandungan_pnpa';
                //$this->load->view('template/default_pelan', $data);
 
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kandungan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                if($getPnpa1 = $this->function_model->get_tab(4))
                    {
                       $data['tab'] = $getPnpa1;
                    }
                //$data['year_list'] =year_dropdown();  //get year list 
				//get data year from table pspao
				$dataYear = $this->pnpa_model->get_year_pspao($this->uri->segment(3));
				
				//called function for selected year only
				$data['year_list_selected'] = year_dropdown_selected($dataYear[0],$dataYear[1]);

                if($getSumberManusia = $this->pnpa_model->get_kat_premis())
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

                    $pnpa_id = $this->pnpa_model->updatepnpa();

                      redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$pnpa_id,'refresh');
               

                  }else{


                          $get_pspa_ptf_id = $this->pnpa_model->get_pspao_akhir_ptf($this->uri->segment(3));

                          $get_pspa_pp_id = $this->pnpa_model->get_pspao_akhir_pp($this->uri->segment(3));

                          $newdata = array(
                           'ptfid'  => $get_pspa_ptf_id,
                           'ppid'     => $get_pspa_pp_id,
                          
                          );

                          $this->session->set_userdata($newdata);


                    $pnpa_id = $this->pnpa_model->tambahpnpa(); 

                  }



                   if($pnpa_id)
                    {

                        //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$pnpa_id,'refresh');
                    }
                    else
                    {
                        //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                        redirect('pnpa/kandungan_pnpa/'.$this->uri->segment(3).'/'.$pnpa_id);
                    }      

                }


             } 
               
                
              
                $this->load->view('template/default', $data);
            
               
	}

   
   
   
    /*function model_struktur_pnpa()
         {
                //Name : Azian
                //Date : 13/9/13
                //Desc : model stuktur pnpa
          if ($_POST)
          {
            $node_id = '14';
            $menu_name = 'menu1';
            $menu_link = 'pnpa/model_struktur_pnpa';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
            $pnpa_pata_f8_1a_modelstruktur_id = $this->uri->segment(3);
            $no= $this->input->post('no');
            if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
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
            
             $this->form_validation->set_rules('ptf[]', 'PTF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pif[]', 'PIF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pdf[]', 'PDF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');
         
            $this->form_validation->set_rules('panel_penilai[]', 'Panel Penilai', 'trim|required|xss_clean'); 
            $this->form_validation->set_rules('pegawaikaitan', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
            $this->form_validation->set_rules('tjawabdankuasa', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
            $this->form_validation->set_rules('pegawailain', 'Tugas Pegawai-Pegawai Lain Yang Ada Kaitan', 'trim|required|xss_clean');


            
            if($this->form_validation->run())
            {
                $data['pnpa_id'] = $this->session->userdata('pnpa_id');
               
                if($this->input->post('sunting') != NULL){
          
          if($this->input->post('cek_row') == 0){
            // INSERT BARU DLM KANDUNGAN START DR ID 7
            
            $pnpa_id = $this->pnpa_model->tambahmodelpnpa($this->input->post('sunting'));
            //echo "<script>alert('insert pspao akhir')< /script>";
            
          }else if($this->input->post('cek_row') == 1){
            // UPDATE DLM KANDUNGAN
            
            $pnpa_id = $this->pnpa_model->updatemodelpnpa($this->input->post('sunting'));
            //echo "<script>alert('update pspao akhir')< /script>";
          }
          
          //$this->load->view('template/default',$data);
          redirect('pnpa/treeview_pnpa/'.$no,'refresh');
          
          
        }else{
          //echo "<script>alert('xdok id')< /script>";
        }
            } 
         else {
             
          

            $node_id = '14';
            $menu_name = 'menu1';
            $menu_link = 'pnpa/model_struktur_pnpa';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
             $pnpa_pata_f8_1a_modelstruktur_id = $this->uri->segment(3);
             $no= $this->input->post('no'); 
             
            if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
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

            $node_id = '14';
            $menu_name = 'menu1';
            $menu_link = 'pnpa/model_struktur_pnpa';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      

            if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
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

      */



function model_struktur_pnpa(){

            $node_id = '14';
            $menu_name = 'menu1';
            $menu_link = 'pnpa/model_struktur_pnpa';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


            $data['senarai_panel1'] = $this->pnpa_model->get_panelpenilai_sumber(1);
            $data['senarai_panel2'] = $this->pnpa_model->get_panelpenilai_sumber(2);
            $data['senarai_ptf'] = $this->pnpa_model->get_ptf();
            $data['senarai_pif'] = $this->pnpa_model->get_pif();
            $data['senarai_pdf'] = $this->pnpa_model->get_pdf();
            $data['senarai_pof'] = $this->pnpa_model->get_pof();
            $data['peranan'] = $this->utilitikeperluansumber_model->get_peranan_1();
            $data['disiplin'] = $this->utilitikeperluansumber_model->get_bidang_1();
            $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();
            $data['jabatan'] = $this->pnpa_model->get_jabatan_agen();
            $data['level'] = $this->utilitikeperluansumber_model->get_level_1();
            $data['countries'] = $this->negeri_model->get_negeri();

 if ($_POST)
            {
                       
             if($this->input->post('sumberluaran') == 'Simpan')
                 {
                        $this->form_validation->set_rules('nama_luar','Nama','trim|required|xss_clean');
                        $this->form_validation->set_rules('syarikat_id_luar','Nama Syarikat','trim|required|xss_clean');
                        $this->form_validation->set_rules('noic_luar','No Kad Pengenalan','trim|required|xss_clean');
                        //$this->form_validation->set_rules('peranan_luar','Peranan','trim|required|xss_clean');
                        $this->form_validation->set_rules('jawatan_luar','Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('disiplin_luar','Disiplin/Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('gaji_luar','Gaji','trim|required|xss_clean');
                        $this->form_validation->set_rules('koslebihmasa_luar','Kos Lebih Masa','trim|required|xss_clean');
                        
                        //validation untuk popup sumber luaran
                        if($this->form_validation->run())
                         {
                            $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_model();
                        
                            if($check_data == 0)
                            {
                            $this->pnpa_model->tambahmodelpnpa();
                            
                            }
                            else
                            {

                           $this->pnpa_model->updatemodelstruktur();
                           $this->pnpa_model->updatepanelkom();
                           $this->pnpa_model->updatepanelpenilai();
                           } 
                     
                        $this->utilitikeperluansumber_model->tambahsumberpanel();
                        redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 
                        } 
               
                     else
                        {

                        $this->load->view('template/default', $data);
           
                        }
                 }
               
              else if($this->input->post('sumberdalaman') == 'Simpan')
                 {
                        $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                        $this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                        $this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                        $this->form_validation->set_rules('level','Peringkat','trim|required|xss_clean');
                        $this->form_validation->set_rules('jawatan','Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('gredjawatan','Gred Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('disiplin','Disiplin/Jawatan','trim|required|xss_clean');
                        $this->form_validation->set_rules('gaji','Gaji','trim|required|xss_clean');
                        $this->form_validation->set_rules('koslebihmasa','Kos Lebih Masa','trim|required|xss_clean');
 
                        //validation untuk popup sumber dalaman
                        if($this->form_validation->run())
                         {
                              $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_model();

                              if($check_data == 0)
                                  {
                                    $this->pnpa_model->tambahmodelpnpa();

                                  }
                            else
                                {
                                   $this->pnpa_model->updatemodelstruktur();
                                   $this->pnpa_model->updatepanelkom();
                                   $this->pnpa_model->updatepanelpenilai();

                                }
                            $this->utilitikeperluansumber_model->tambahsumbermanusia();
                            redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 
                        } 
               
                     else
                        {

                        $this->load->view('template/default', $data);
           
                        }
                 }
               
               else 
                 {
                    // $this->form_validation->set_rules('ptf[]', 'PTF', 'trim|required|xss_clean');
                    // $this->form_validation->set_rules('pif[]', 'PIF', 'trim|required|xss_clean');
                     //$this->form_validation->set_rules('pdf[]', 'PDF', 'trim|required|xss_clean');
                    // $this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');
                    // $this->form_validation->set_rules('panel_penilai[]', 'Panel Penilai', 'trim|required|xss_clean'); 
                     
                     $this->form_validation->set_rules('pegawaikaitan', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
                     $this->form_validation->set_rules('tjawabdankuasa', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
                     $this->form_validation->set_rules('pegawailain', 'Tugas Pegawai-Pegawai Lain Yang Ada Kaitan', 'trim|required|xss_clean');

                     if($this->form_validation->run())
                         {
                              $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_model();

                              if($check_data == 0)
                                  {
                                    $this->pnpa_model->tambahmodelpnpa();

                                  }
                            else
                                {
                                   $this->pnpa_model->updatemodelstruktur();
                                   $this->pnpa_model->updatepanelkom();
                                   $this->pnpa_model->updatepanelpenilai();

                                }
                           
                             redirect('pnpa/treeview_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                 
                        } 
               
                     else
                        {

                        $this->load->view('template/default', $data);
           
                        }
                     
                   
                      

                      }
                 
        }
                    
            
            else{
            
            $this->load->view('template/default', $data);

          }
  }
  function kemaskinipanel_penilai_pnpa()
    {
            
        
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kemaskinipanel_penilai_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $utiliti_sumber_man_id = $this->uri->segment(5);

                if($getPanelpenilai = $this->pnpa_model->get_panelpenilai_1($utiliti_sumber_man_id))
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                   // print_r($getPanelpenilai);
                   // die();

                }
                
                if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
                {
                   $data['disiplin'] = $getbidang;
                }
                
                if($getbidang = $this->utilitikeperluansumber_model->get_syarikat_1())
                {
                   $data['syarikat'] = $getbidang;
                }


                //$syarikat_id = $this->uri->segment(3);
                 $utiliti_sumber_man_id = $this->uri->segment(5); 
                
                //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                //$this->form_validation->set_rules('nama1','Nama','trim|required|xss_clean');
                //$this->form_validation->set_rules('syarikat_id1','Nama Syarikat','trim|required|xss_clean');
                //$this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                //$this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                //$this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');
                //$this->form_validation->set_rules('disiplin_bidang_id1','Disiplin/Jawatan','trim|required|xss_clean');
                //$this->form_validation->set_rules('gaji1','Gaji','trim|required|xss_clean');
                //$this->form_validation->set_rules('koslebihmasa1','Kos Lebih Masa','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),
                                        'nama' => $this->input->post('nama1'),
                                        'syarikat_id' => $this->input->post('syarikat_id1'),
                                        'nric' => $this->input->post('noic'),
                                        'jawatan' => $this->input->post('jawatan1'),
                                        'disiplin_bidang_id' => $this->input->post('disiplin_bidang_id1'),
                                        'gaji' => $this->input->post('gaji1'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_panel = $this->utilitikeperluansumber_model->update_panel($utiliti_sumber_man_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Panel Penilai Teknikal Berjaya Dikemaskini</font><br>');
                        redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('pnpa/kemaskinipanel_penilai_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$pnpa_pata_f8_1a_panel_penilai_id.'refresh');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }

 
       
	function treeview_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['senarai_skop'] = $this->pnpa_model->get_skop();

                if ($_POST){

                /*$this->form_validation->set_rules('skop[]', 'Skop', 'trim|required|xss_clean');
                $this->form_validation->set_rules('aktiviti[]', 'Aktiviti', 'trim|required|xss_clean');
                $this->form_validation->set_rules('butiran[]', 'Butiran Aktiviti', 'trim|required|xss_clean');
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean');

                if($this->form_validation->run())
                 {*/
                   if($this->input->post('sunting') != NULL){

                   // echo "sunting";

                    $update = $this->pnpa_model->updatetreeviewpnpa();
                    redirect('pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
              

                   }else{

                     // echo "tambah";

                      $addTreeview = $this->pnpa_model->tambahtreeviewpnpa();

                      if($addTreeview)
                        {
                            //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }
                        else
                        {
                           //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                            redirect('pnpa/treeview_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }      
                   } 

                 /*}else{

                $this->load->view('template/default', $data); 
               
                } 
                */
                }else{

                $this->load->view('template/default', $data); 
               
                } 
                
               
	}
        
 
 
 
        
  /*function treeview_pnpa ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            if ($_POST){
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$skop_aktvt_id = $this->uri->segment(3);
                $pnpa_pata_f8_1b_skop_pilihan_id = $this->uri->segment(3);
                $no= $this->input->post('no');
                
                 $data['senarai_skop'] = $this->pnpa_model->get_skop();
           
                 //$this->form_validation->set_rules('skop[]', 'Skop', 'trim|required|xss_clean');
                // $this->form_validation->set_rules('aktiviti[]', 'Aktiviti', 'trim|required|xss_clean');
                // $this->form_validation->set_rules('butiran[]', 'Butiran Aktiviti', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                //if($this->form_validation->run())
                  //  {
                        $data['pnpa_id'] = $this->session->userdata('pnpa_id');

                        $data['pnpa_pata_f8_1b_skop_pilihan_id'] = $this->session->userdata('pnpa_pata_f8_1b_skop_pilihan_id');
                        $addTreeview = $this->pnpa_model->tambahtreeviewpnpa();

                        $pnpa_pata_f8_1b_skop_pilihan_id = $this->input->post('pnpa_pata_f8_1b_skop_pilihan_id');                
                        $this->session->set_userdata(array('pnpa_pata_f8_1b_skop_pilihan_id' => $pnpa_pata_f8_1b_skop_pilihan_id));

                       if($addTreeview)
                        {
                           // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('pnpa/skop_aktiviti_pnpa/'.$no,'refresh');
                        }
                        else
                        {
                            $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                            redirect('pnpa/skop_aktiviti_pnpa/'.$no,'refresh');
                        }                
                   // } 
               /*  else 
                   {

                        $node_id = '58';
                        $menu_name = 'menu1';
                       // $menu_link = 'pnpa/model_struktur_pnpa';

                        $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                        $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                        $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                        $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                        $pnpa_pata_f8_1a_modelstruktur_id = $this->uri->segment(3);
                        $no= $this->input->post('no'); 

                        $this->load->view('template/default', $data);
                     }

              
            }
            
            
            
            else
            {
              $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
               $pnpa_pata_f8_1b_skop_pilihan_id = $this->uri->segment(3);
                
                $data['senarai_skop'] = $this->pnpa_model->get_skop();
               
                $this->load->view('template/default', $data);  
            }
  }
     */   
      
  function skop_aktiviti_pnpa ()
  {

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['pnpa_id'] = $this->session->userdata('pnpa_id');
                
                //$pnpa_id= $this->uri->segment(3);
                //$pnpa_id= $this->input->post('no');
                $data['senarai_skop'] = $this->pnpa_model->get_skop();
                $data['skop'] = $this->pnpa_model->get_allskop();
                
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }
  
  //added : diana 8/11/13 
	function set_skop_aktiviti_pnpa($idsumber){
      $this->load->model('pnpa_model');
      header('Content-Type: application/x-json; charset=utf-8');
	  echo(json_encode($this->pnpa_model->removesumberrancang($idsumber)));
	}
	
  //added : diana 8/11/13
          function skop_aktiviti2_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa';

                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();



                if($_POST){

                 /* 
                 $this->form_validation->set_rules('pihakkaitan', 'Pihak Berkaitan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tjawab', 'Tanggungjawab', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('objek', 'Objek Sebagai', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('bajet_aktvt', 'Bajet Aktiviti', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('sumber', 'Sumber', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('output', 'Output Mula', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                 if($this->form_validation->run()){  //check validation
                  */
                   // if($this->input->post('hantar') == 'Rancang'){ //kalo sunting
				   
					if($this->input->post('rancang') != NULL){
                     // print_r($_POST);

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }



                    
					$this->pnpa_model->tambahsumberrancang("rancang");
					redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
               


//endofrancang					//	}else if($this->input->post('hantar') == 'Lulus'){      
						}else if($this->input->post('lulus') != NULL){      

                      //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }

                      $this->pnpa_model->tambahsumberrancang("lulus");

                      redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
                     

//endoflulus                    //}else if($this->input->post('hantar') == 'Isi'){
					}else if($this->input->post('isi') != NULL){

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }
                      $this->pnpa_model->tambahsumberrancang("isi");

                      redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
//endofisi                     
                    }else{ //add new record

                      //echo "tambah";
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }


                     // $this->pnpa_model->tambahskopaktiviti2();

                        // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    


                      /*if($skopAktiviti2)
                        {
                           // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }
                        else
                        {
                            //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                            redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                        } 
                          */
                    }


                // }  //end validation
                  

                }else{


                $this->load->view('template/default', $data);
      

                }  
               
                                
        }

  //edit : diana 6/11/13
  /*    function skop_aktiviti2_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa';

                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();



                if($_POST){

                 /* 
                 $this->form_validation->set_rules('pihakkaitan', 'Pihak Berkaitan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tjawab', 'Tanggungjawab', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('objek', 'Objek Sebagai', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('bajet_aktvt', 'Bajet Aktiviti', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('sumber', 'Sumber', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('output', 'Output Mula', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                 if($this->form_validation->run()){  //check validation
                  */
       /*          if($this->input->post('hantar') == 'Rancang'){ //kalo sunting

                     // print_r($_POST);

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }



                    
					$this->pnpa_model->tambahsumberrancang("rancang");
					redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
               


                    }else if($this->input->post('hantar') == 'Lulus'){      

                      //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }

                      $this->pnpa_model->tambahsumberrancang("lulus");

                      redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                     

                    }else if($this->input->post('hantar') == 'Isi'){

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }
                      $this->pnpa_model->tambahsumberrancang("isi");

                      redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                     
                    }else{ //add new record

                      //echo "tambah";
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }


                     // $this->pnpa_model->tambahskopaktiviti2();

                        // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    


                      /*if($skopAktiviti2)
                        {
                           // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }
                        else
                        {
                            //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                            redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                        } 
                          */
   /*                 }


                // }  //end validation
                  

                }else{


                $this->load->view('template/default', $data);
      

                }  
               
                                
        }
	*/	
  	/*	
        function skop_aktiviti2_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa';

                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();



                if($_POST){

                 /* 
                 $this->form_validation->set_rules('pihakkaitan', 'Pihak Berkaitan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tjawab', 'Tanggungjawab', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('objek', 'Objek Sebagai', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('bajet_aktvt', 'Bajet Aktiviti', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('sumber', 'Sumber', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('output', 'Output Mula', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                 if($this->form_validation->run()){  //check validation
                  */
           /*         if($this->input->post('hantar') == 'rancang'){ //kalo sunting

                     // print_r($_POST);

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }



                      $this->pnpa_model->tambahsumberrancang("rancang"); 

                     

                    redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                   


                    }else if($this->input->post('hantar') == 'lulus'){      

                      //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }

                      $this->pnpa_model->tambahsumberrancang("lulus");

                      redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                     

                    }else if($this->input->post('hantar') == 'isi'){

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }
                      $this->pnpa_model->tambahsumberrancang("isi");

                      redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                     
                    }else{ //add new record

                      //echo "tambah";
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }


                     // $this->pnpa_model->tambahskopaktiviti2();

                        // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    


                      /*if($skopAktiviti2)
                        {
                           // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }
                        else
                        {
                            //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                            redirect('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                        } 
                          */
                 //   }


                // }  //end validation
                  
/*
                }else{


                $this->load->view('template/default', $data);
      

                }  
               
                                
        }
  
	*/
        
       /* function skop_aktiviti2_pnpa ()
  {
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
            if($_POST)
            {
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();
           
                
                 $pnpa_pata_f8_1b1c_id = $this->uri->segment(3); 
                 $no= $this->input->post('no');
                 $this->form_validation->set_rules('pihakkaitan', 'Pihak Berkaitan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tjawab', 'Tanggungjawab', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('objek', 'Objek Sebagai', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('bajet_aktvt', 'Bajet Aktiviti', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('sumber', 'Sumber', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('output', 'Output Mula', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                if($this->form_validation->run())
                    {
                        $data['pnpa_id'] = $this->session->userdata('pnpa_id');

                        $data['pnpa_pata_f8_1b1c_id'] = $this->session->userdata('pnpa_pata_f8_1b1c_id');
                        $skopAktiviti2 = $this->pnpa_model->tambahskopaktiviti2();

                        $pnpa_pata_f8_1b1c_id = $this->input->post('pnpa_pata_f8_1b1c_id');                
                        $this->session->set_userdata(array('pnpa_pata_f8_1b1c_id' => $pnpa_pata_f8_1b1c_id));

                        if($skopAktiviti2)
                        {
                           // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('pnpa/skop_aktiviti_pnpa/'.$no,'refresh');
                        }
                        else
                        {
                            $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                            redirect('pnpa/skop_aktiviti_pnpa/'.$no,'refresh');
                        } 
                        
                        //echo "<script>alert('Berjaya!')< /script>";
        
        if($this->input->post('sunting') != NULL){
          
          if($this->input->post('cek_row') == 0){
            // INSERT BARU DLM KANDUNGAN START DR ID 7
            
            $pnpa_id = $this->pnpa_model->tambahskopaktiviti2($this->input->post('sunting'));
            //echo "<script>alert('insert pspao akhir')< /script>";
            
          }else if($this->input->post('cek_row') == 1){
            // UPDATE DLM KANDUNGAN
             redirect('pnpa/skop_aktiviti_pnpa/'.$no,'refresh');
            //$pnpa_id = $this->pnpa_model->update_skopaktiviti2($this->input->post('sunting'));
            //echo "<script>alert('update pspao akhir')< /script>";
          }
          
          //$this->load->view('template/default',$data);
          redirect('pnpa/skop_aktiviti_pnpa/'.$no,'refresh');
          
          
        }else{
          //echo "<script>alert('xdok id')< /script>";
        }
                        
                    } 
                 else 
                   {

                        $node_id = '14';
                        $menu_name = 'menu1';
                       // $menu_link = 'pnpa/model_struktur_pnpa';

                        $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                        $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                        $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                        $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                        $pnpa_pata_f8_1a_modelstruktur_id = $this->uri->segment(3);
                        $no= $this->input->post('no'); 

                        $this->load->view('template/default', $data);
                     }

                
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }
        
        else
        {
            $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();
           
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
        }
        }
        */
        function kawalan_rekod_pnpa ()
       
        {
        if($_POST)
        {
                
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$pnpa_pata_f8_1d_id = $this->uri->segment(4); 
                 $no= $this->input->post('no');               
                
                if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
                $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
                $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                //$data['pnpa_pata_f8_1d_id'] = $this->session->userdata('pnpa_pata_f8_1d_id');
                $addRekod = $this->pnpa_model->tambahkawalan_rekod();
                
               // $pnpa_pata_f8_1d_id = $this->input->post('pnpa_pata_f8_1d_id');                
                //$this->session->set_userdata(array('pnpa_pata_f8_1d_id' => $pnpa_pata_f8_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('pnpa/kawalan_rekod_pnpa/'.$this->uri->segment(3).'/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('pnpa/kawalan_rekod_pnpa/'.$this->uri->segment(3).'/'.$no,'refresh');
                }                
            }      
            else
            {
               $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                 if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod())
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->load->view('template/default', $data);
            } 
        }
        else
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->load->view('template/default', $data);
    
        }
    }
    
     function kemaskinikawalan_rekod()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'pnpa/kemaskinikawalan_rekod';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$pnpa_pata_f8_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f8_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f8_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->pnpa_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('pnpa/kawalan_rekod_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('pnpa/kemaskinikawalan_rekod/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }





function kemaskinikawalan_rekod_ptf()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'pnpa/kemaskinikawalan_rekod_ptf';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$pnpa_pata_f8_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f8_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f8_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->pnpa_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('pnpa/kawalan_rekod_pnpa_edit_ptf/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('pnpa/kemaskinikawalan_rekod_ptf/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }





    function kemaskinikawalan_rekod_pif()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'pnpa/kemaskinikawalan_rekod_pif';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$pnpa_pata_f8_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f8_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f8_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->pnpa_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('pnpa/kawalan_rekod_pnpa_edit_pif/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('pnpa/kemaskinikawalan_rekod_pif/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }






    function kemaskinikawalan_rekod_pof()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'pnpa/kemaskinikawalan_rekod_pof';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$pnpa_pata_f8_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f8_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f8_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->pnpa_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('pnpa/kawalan_rekod_pnpa_edit_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('pnpa/kemaskinikawalan_rekod_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }



        
    
               function dokumen_rujukan_pnpa ()
 {
              
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
    
    /*
     Update : diana 23/10/13
     Desc : Upload module
    */
            
        {
        if($_POST)
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$no=$this->uri->segment(3);               
                $pspa= $this->input->post('pspa');
				$no= $this->input->post('no');

                if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($no))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                }
                
                $this->form_validation->set_rules('nama_fail1','Tajuk Dokumen','trim|required|xss_clean');             

                if($this->form_validation->run())
                {
     $data['lampiran_id'] = $this->session->userdata('lampiran_id');      
     
     //$config['upload_path'] = 'uploads/';
   $config['upload_path'] = $this->config->item('upload_path')."pnpa/";
    $config['allowed_types'] = '*'; 
   //$config['allowed_types'] = 'docx|doc|ppt|pptx|xls|xlsx|jpg|png|jpeg|gif|pdf';
   //$config['allowed_types'] = 'ppt|pptx|xls|xlsx|jpg|png|jpeg|gif|pdf';
     $config['max_size'] = '3000000';
        
     $this->load->library('upload', $config);
     
     $checkError = 0;
     //check validation
     if(empty($_FILES['userfile']['name'])){ $checkError++;}
     if($_POST['nama_fail2']<>''){if(empty($_FILES['userfile2']['name'])){ $checkError++;}}
     if($_POST['nama_fail3']<>''){if(empty($_FILES['userfile3']['name'])){ $checkError++;}}
     if($_POST['nama_fail4']<>''){if(empty($_FILES['userfile4']['name'])){ $checkError++;}}
     if($_POST['nama_fail5']<>''){if(empty($_FILES['userfile5']['name'])){ $checkError++;}}
     
     if($checkError>0)
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Perlu Diisi</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$no);
     }
     
     //first file
     if($this->upload->do_upload('userfile'))
     {
      $dataImage = $this->upload->data();
   
      $aPass = array($this->input->post('nama_fail1'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
     }
     else
     {
    
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">'.$this->upload->display_errors().' AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$no,'refresh');
     }
     
     //second file
   if($_POST['nama_fail2']<>''){
     if($this->upload->do_upload('userfile2'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail2'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
      
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$no,'refresh');
     }
  }
     
   
     //third file
   if($_POST['nama_fail3']<>''){
     if($this->upload->do_upload('userfile3'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail3'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$no,'refresh');
     }
  }
     
     //fourth file
   if($_POST['nama_fail4']<>''){
     if($this->upload->do_upload('userfile4'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail4'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
     }
     else
     {
     $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$no,'refresh');
     }
  }
     
   
     //fifth file
   if($_POST['nama_fail5']<>''){
     if($this->upload->do_upload('userfile5'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail5'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$no,'refresh');
     }
  }
         
     $lampiran_id = $this->input->post('lampiran_id');                
     $this->session->set_userdata(array('lampiran_id' => $lampiran_id));

    if($addDoc)
     {  
      $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Dokumen rujukan Berjaya Didaftarkan</font><br>');
      redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$no,'refresh');
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$no,'refresh');
     }
   
    }      
    else
    {
       $node_id = '14';
     $menu_name = 'menu1';
     $menu_link = 'pnpa/dokumen_rujukan_pnpa';
     
     $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
     $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
     $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
     $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
      
      if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($this->uri->segment(3)))
     {
      $data['senarai_dokumen'] = $getDokumenrujukan;
     
     }
     
     $this->load->view('template/default', $data);
    } 
   
        }
        else
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }
                
                $this->load->view('template/default', $data);
    
        }
     }
  
   
 }
  
  /*
    Added : diana 25/10/2013
    Desc  : delete file & update table lampiran
  */
  function hapus_dokumen_rujukan_pnpa()
  {
    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/dokumen_rujukan_pnpa';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
	$pspa =   $this->uri->segment(3);
    $pnpaID = $this->uri->segment(4);
    $lampiranID = $this->uri->segment(5);
    
    
    $fileInfo = $this->pnpa_model->get_documentInfo($lampiranID);
    $lokasiFile = $fileInfo[0];
    
    if($lokasiFile<>'')
    {
      $delete = $this->pnpa_model->deleteDoc($lampiranID);
      
      if($delete===true)
      {
        //unlink file in directory
        $unlink = unlink($lokasiFile);
        
        if($unlink==true)
        { 
          $this->session->set_flashdata('flashError', '<strong><font color="blue" size="3">Dokumen Rujukan Berjaya Dihapus</font><br></strong><br>');
          redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$pnpaID);
        }
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
          redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$pnpaID);
        }
      }
      else
      {
        $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
        redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$pnpaID);
      }
    }
    else
    {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
        redirect('pnpa/dokumen_rujukan_pnpa/'.$pspa.'/'.$pnpaID);
    }
      
      
  }
  
  /*
    Added : diana 25/10/2013
    Desc  : download file
  */
  function muat_dokumen_rujukan_pnpa($lampiran_id)
  {
    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/dokumen_rujukan_pnpa';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
     
	$pnpaID = $this->uri->segment(4);
    $lampiranID = $this->uri->segment(5);
    
    $fileInfo = $this->pnpa_model->get_documentInfo($lampiranID);
    $lokasiFile = $fileInfo[0];
    
    if($lokasiFile<>'')
    { 
      $data = file_get_contents($lokasiFile); // Read the file's contents
      $name = $fileInfo[1];

      force_download($name, $data);
    }
    
  }
  
  
         function summary_pnpa ()
  {
                //updated by:fatin 311013
                //nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan pnpa
             
                $node_id = '66';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $pnpa_id = $this->uri->segment(4);
                $data['rows'] = $this->pnpa_model->get_all_kandungan_pnpa($pnpa_id);
                if($getstatus = $this->function_model->check_status_log($id,4,$pnpa_id))
                 {
                     $data['statusid'] = $getstatus;
                }
                //$data['statusid'] = $this->function_model->check_status_log($id,4,$pnpa_id);
                 if($getulasan = $this->pnpa_model->get_ulasan_terbaru($id,4,$pnpa_id))
                 {
                     $data['ulasan'] = $getulasan;
                }
                else
                {
                    $data['ulasan'] ='';
                }
                 //$data['ulasan'] = $this->pnpa_model->get_ulasan_terbaru($id,4,$pnpa_id);
                if($getPnpa = $this->pnpa_model->get_pnpa2($id,$pnpa_id))
                {
                    $data['senarai_pnpa'] = $getPnpa;
                }
              
      if($this->input->post('hantar') == 'hantar'){
          $this->pnpa_model->insert_status_log($id,2,$pnpa_id);
        
          $path = 'pnpa/summary_ptf_pnpa/'.$id.'/'.$pnpa_id;
          $this->function_model->insert_notifikasi(48,4,$sessionarray['user_id'],$this->pnpa_model->get_ptfid_pnpa($id),$path); 
        
          $path = 'pnpa/summary_pif_pnpa/'.$id.'/'.$pnpa_id;
          $this->function_model->insert_notifikasi(52,4,$sessionarray['user_id'],$this->pnpa_model->get_pifid_pnpa($id,1),$path); 
        
        //$data['detail_msg'] = $this->function_model->get_masej($id,7);
        $data['main_content'] = 'alert';
            $data['msg'] = 'Borang PNPA  telah berjaya dihantar untuk disemak. Klik butang OK untuk kembali ke Senarai PNPA.';
            $data['link'] = 'pnpa/senarai_ppd_pnpa/'.$id;
        
        //redirect('pspao/senarai_pspao_akhir','refresh');
        
      }else if($this->input->post('hantar') == 'Simpan Deraf'){
        //echo "<script>alert('Simpan Deraf')< /script>";
        //$this->pspao_akhir_model->update_kandungan_pspao($id);
        $this->pnpa_model->insert_status_log($id,1,$pnpa_id); //1=xx,2=xxx,3=pembetulan,4=sah
        
        //$data['detail_msg'] = $this->function_model->get_masej($id,7);
        $data['main_content'] = 'alert';
            $data['msg'] = 'Borang PNPA telah disimpan sebagai deraf. Klik butang OK untuk kembali ke Senarai PNPA.';
            $data['link'] = 'pnpa/senarai_ppd_pnpa/'.$id.'/'.$pnpa_id;
        
        //redirect('pspao/senarai_pspao_akhir','refresh');
        
      }else if($this->input->post('hantar') == 'Sunting'){
        //echo "<script>alert('Sunting')< /script>";
        $this->pnpa_model->update_kandungan_pnpa($id);
        redirect('pnpa/summary_pnpa/'.$this->uri->segment(3).'/'.$pnpa_id,'refresh');
        
      }
      
                //$data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
  }
           
  
   function summary_ppd_pnpa_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan pnpa
             
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_ppd_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
  }
        
          
        function summary_pp_pnpa ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_pp_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $pnpa_id = $this->uri->segment(4);
                $data['rows'] = $this->pnpa_model->get_all_kandungan_pnpa($pnpa_id);
                $data['statusid'] = $this->function_model->check_status_log($id,4,$pnpa_id);
                 $data['ulasan'] = $this->pnpa_model->get_ulasan_terbaru($id,4,$pnpa_id);
                if($getPnpa = $this->pnpa_model->get_pnpa2($id,$pnpa_id))
                {
                   $data['senarai_pnpa'] = $getPnpa;
                }
                    
                 if($this->input->post('lulus')=='lulus')
                     {
                       $this->pnpa_model->update_pnpa_date_lulus($id,$pnpa_id); //update date lulus

                       $this->pnpa_model->insert_status_log_ulasan($id,6,$pnpa_id);  //insert status & ulasan
                          
                       /*****hantar notifikasi kepada pif yg pnpa dah diluluskan*****/
                        $path = 'pnpa/summary_pif_pnpa/'.$id.'/'.$pnpa_id;

                       $this->function_model->insert_notifikasi(113,4,$sessionarray['user_id'],$this->pnpa_model->get_pifid_pnpa($id,1),$path); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada pof yg pnpa dah diluluskan*****/
                        $path2 = 'pnpa/summary_pof_pnpa/'.$id.'/'.$pnpa_id;

                       $this->function_model->insert_notifikasi(113,4,$sessionarray['user_id'],$this->pnpa_model->get_pofid_pnpa($id,1),$path2); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada ptf yg pnpa dah diluluskan*****/
                        $path3 = 'pnpa/summary_ptf_pnpa/'.$id.'/'.$pnpa_id;

                       $this->function_model->insert_notifikasi(113,4,$sessionarray['user_id'],$this->pnpa_model->get_ptfid_pnpa($id),$path3); //insert notifikasi

                       /******** end **********/
                           
                       /*****hantar notifikasi kepada ppd yg pnpa dah diluluskan*****/
                        $path4 = 'pnpa/summary_pnpa/'.$id.'/'.$pnpa_id;

                        $this->function_model->insert_notifikasi(113,4,$sessionarray['user_id'],$this->pnpa_model->get_ppdid_pnpa($id,$pnpa_id),$path4); //insert notifikasi

                       /******** end **********/
                             
                        $data['main_content'] = 'alert';
                        $data['msg'] = 'Borang PNPA telah berjaya diluluskan.Klik butang OK untuk kembali ke Senarai PNPA.';
                        $data['link'] = 'pnpa/senarai_ppd_pnpa/'.$id;
                       
                       
                        
                     }
                 else if($this->input->post('betul')=='betul')
                   {


                      $this->pnpa_model->insert_status_log_ulasan($id,3,$pnpa_id);

                     /*****hantar notifikasi kepada ppd yg pspao perlu di betulkan*****/

                       $path = 'pnpa/summary_pnpa/'.$id.'/'.$pnpa_id;

                       $this->function_model->insert_notifikasi(59,4,$sessionarray['user_id'],$this->pnpa_model->get_ppdid_pnpa($id,$pnpa_id),$path); //insert notifikasi

                       /******** end **********/

                         $data['main_content'] = 'alert';
                        $data['msg'] = 'Arahan pembetulan telah berjaya dihantar kepada Pegawai Penyedia Dokumen.Klik butang OK untuk kembali ke Senarai PNPA.';
                        $data['link'] = 'pnpa/senarai_ppd_pnpa/'.$id;
                       

                    }
                
                
                //$data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
  }  







        function summary_pif_pnpa ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai inspektorat fasiliti
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_pif_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $pnpa_id = $this->uri->segment(4);
                $data['rows'] = $this->pnpa_model->get_all_kandungan_pnpa($pnpa_id);
                 $data['statusid'] = $this->function_model->check_status_log($id,4,$pnpa_id);
                 $data['ulasan'] = $this->pnpa_model->get_ulasan_terbaru($id,4,$pnpa_id);
                if($getPnpa = $this->pnpa_model->get_pnpa2($id,$pnpa_id))
                    {
                       $data['senarai_pnpa'] = $getPnpa;
                    }
                    
        if($this->input->post('sah') == 'sah')
                    {

                          $this->pnpa_model->update_pnpa_date_sah($id,$pnpa_id); //update sah date

                          $this->pnpa_model->insert_status_log_ulasan($id,4,$pnpa_id); //insert status & ulasan

                    /****** hantar notifikasi kpd pp ada pnpa perlu diluluskan ******/
                           $path = 'pnpa/summary_pp_pnpa/'.$id.'/'.$pnpa_id;
                           $this->function_model->insert_notifikasi(107,4,$sessionarray['user_id'],$this->pnpa_model->get_ppid_pnpa($id),$path); //insert notifikasi

                    /****** hantar notifikasi kpd ppd ada pnpa telah disahkan******/
                           $path2 = 'pnpa/summary_pnpa/'.$id.'/'.$pnpa_id;
                           $this->function_model->insert_notifikasi('54',4,$sessionarray['user_id'],$this->pnpa_model->get_ppdid_pnpa($id,$pnpa_id),$path2); //insert notifikasi

                            //$data['detail_msg'] = $this->function_model->get_masej($id,7);
                            $data['main_content'] = 'alert';
                            $data['msg'] = 'Borang PNPA  telah berjaya dihantar untuk diluluskan. Klik butang OK untuk kembali ke Senarai PNPA.';
                            $data['link'] = 'pnpa/senarai_ppd_pnpa/'.$id;

                //redirect('pspao/senarai_pspao_akhir','refresh');
                
            }
                           else if($this->input->post('betul')=='betul'){

                        $this->pnpa_model->insert_status_log_ulasan($id,3,$pnpa_id); //insert status & ulasan

                         /****** hantar notifikasi kpd ppd ada pspao perlu dibetulkan ******/

                          //$pspao_awal_ppd_id   = $this->pspao_model->get_pspao_ppd_id($pspaid); // get ppd id

                           $path3 = 'pnpa/summary_pnpa/'.$id.'/'.$pnpa_id;

                           $this->function_model->insert_notifikasi(59,4,$sessionarray['user_id'],$this->pnpa_model->get_ppdid_pnpa($id,$pnpa_id),$path3); //insert notifikasi

                          /******* end ********/


                            $data['main_content'] = 'alert';
                            $data['msg'] = 'Arahan pembetulan telah berjaya dihantar kepada Pegawai Penyedia Dokumen.Klik butang OK untuk kembali ke Senarai PSPA(O) Awal.';
                            $data['link'] = 'pnpa/senarai_ppd_pnpa/'.$id;
                            
                          //redirect(site_url('pspao_awal/senarai_pspao_baru'));

                         }
                       
                //$data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
    }
        





        function summary_pof_pnpa ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai inspektorat fasiliti
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_pof_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $pnpa_id = $this->uri->segment(4);
                $data['rows'] = $this->pnpa_model->get_all_kandungan_pnpa($pnpa_id);
                 $data['statusid'] = $this->function_model->check_status_log($id,4,$pnpa_id);
                 $data['ulasan'] = $this->pnpa_model->get_ulasan_terbaru($id,4,$pnpa_id);
                if($getPnpa = $this->pnpa_model->get_pnpa2($id,$pnpa_id))
                    {
                       $data['senarai_pnpa'] = $getPnpa;
                    }
                    
        if($this->input->post('sah') == 'sah')
                    {

                          $this->pnpa_model->update_pnpa_date_sah($id,$pnpa_id); //update sah date

                          $this->pnpa_model->insert_status_log_ulasan($id,4,$pnpa_id); //insert status & ulasan

                    /****** hantar notifikasi kpd pp ada pnpa perlu diluluskan ******/
                           $path = 'pnpa/summary_pp_pnpa/'.$id.'/'.$pnpa_id;
                           $this->function_model->insert_notifikasi(107,4,$sessionarray['user_id'],$this->pnpa_model->get_ppid_pnpa($id),$path); //insert notifikasi

                    /****** hantar notifikasi kpd ppd ada pnpa telah disahkan******/
                           $path2 = 'pnpa/summary_pnpa/'.$id.'/'.$pnpa_id;
                           $this->function_model->insert_notifikasi('',4,$sessionarray['user_id'],$this->pnpa_model->get_ppdid_pnpa($id,$pnpa_id),$path2); //insert notifikasi

                            //$data['detail_msg'] = $this->function_model->get_masej($id,7);
                            $data['main_content'] = 'alert';
                            $data['msg'] = 'Borang PNPA  telah berjaya dihantar untuk diluluskan. Klik butang OK untuk kembali ke Senarai PNPA.';
                            $data['link'] = 'pnpa/senarai_ppd_pnpa/'.$id;

                //redirect('pspao/senarai_pspao_akhir','refresh');
                
            }
                           else if($this->input->post('betul')=='betul'){

                        $this->pnpa_model->insert_status_log_ulasan($id,3,$pnpa_id); //insert status & ulasan

                         /****** hantar notifikasi kpd ppd ada pspao perlu dibetulkan ******/

                          //$pspao_awal_ppd_id   = $this->pspao_model->get_pspao_ppd_id($pspaid); // get ppd id

                           $path3 = 'pnpa/summary_pnpa/'.$id.'/'.$pnpa_id;

                           $this->function_model->insert_notifikasi(59,4,$sessionarray['user_id'],$this->pnpa_model->get_ppdid_pnpa($id,$pnpa_id),$path3); //insert notifikasi

                          /******* end ********/


                            $data['main_content'] = 'alert';
                            $data['msg'] = 'Arahan pembetulan telah berjaya dihantar kepada Pegawai Penyedia Dokumen.Klik butang OK untuk kembali ke Senarai PSPA(O) Awal.';
                            $data['link'] = 'pnpa/senarai_ppd_pnpa/'.$id;
                           
                          //redirect(site_url('pspao_awal/senarai_pspao_baru'));

                         }
                       
                //$data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default', $data);
    }





        
         function summary_pp_pnpa_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_pp_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default', $data);
  }
        

  function summary_ptf_pnpa_edit ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_ptf_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$data['main_content'] = 'pnpa/summary_ptf_pnpa';
                $this->load->view('template/default', $data);
  } 
  

  function download()

  {
  $data = file_get_contents("/var/www/html/myspata/application/views/pnpa/suratLantikan.pdf"); // Read the file's contents
  $name = 'suratLantikan.pdf';

  force_download($name, $data);
}


  function model_struktur_pnpa_edit ($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
              $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                $data['year_list'] =year_dropdown();  //get year list 
                //$data['kementerian'] = $this->pnpa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                //$data['jabatan'] = $this->pnpa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                //$data['premis'] = $this->pnpa_model->get_premis();
                //$data['status'] = $this->pnpa_model->get_status(); //dapatkan senarai premis dr db
               
              
               
                
              
               $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul><a href="download">Surat Lantikan.docx</a>',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>',
                             ),
                 
                          array   ('2','Sivil','sayuthi Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','adib Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('5','Sivil','Hakim Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('6','Sivil','Hakim Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('7','Sivil','Hakim Mohd','Setia Maju Sdn. Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                  );
                  
               
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('pnpa/model_struktur_pnpa_edit');
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
            
    
    
    $this->table->set_heading(anchor("pnpa/model_struktur_pnpa_edit/",'Bil','title="Klik untuk susun rekod"'), 
                              anchor("pnpa/model_struktur_pnpa_edit/",'Kategori ID','title="Klik untuk susun rekod"'),
                              anchor("pnpa/model_struktur_pnpa_edit/",'Nama','title="Klik untuk susun rekod"'),
                              anchor("pnpa/model_struktur_pnpa_edit/",'Syarikat','title="Klik untuk susun rekod"'),
                              anchor("pnpa/model_struktur_pnpa_edit/",'Surat Lantikan','title="Klik untuk susun rekod"'),
                              anchor("pnpa/model_struktur_pnpa_edit/",'Tindakan','title="Klik untuk susun rekod"'));

    $tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class=sort_'.$sort_order.'>',
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
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                              ),
                           array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'no_dpa',
                                  'label'   => 'NO DPA',
                                  'rules'   => 'required'
                               ),
                        array(
                                  'field'   => 'status',
                                 'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
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
                 
  
    $data['main_content'] = 'pnpa/model_struktur_pnpa';
                $this->load->view('template/default', $data);
  }
        }
        
  function treeview_pnpa_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
            
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);
  }

  function skop_aktiviti_pnpa_edit ()
  {

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_pnpa_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
            
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_pnpa_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }
        
        function dokumen_rujukan_pnpa_edit ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
  }

  //name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
  function model_struktur_pnpa_edit_ppd ()
  {

            $node_id = '14';
            $menu_name = 'menu1';
            $menu_link = 'pnpa/model_struktur_pnpa_edit_ppd';

            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


            $data['senarai_panel'] = $this->pnpa_model->get_panelpenilai();
            $data['senarai_ptf'] = $this->pnpa_model->get_ptf();
            $data['senarai_pif'] = $this->pnpa_model->get_pif();
            $data['senarai_pdf'] = $this->pnpa_model->get_pdf();
            $data['senarai_pof'] = $this->pnpa_model->get_pof();
            $data['peranan'] = $this->utilitikeperluansumber_model->get_peranan_1();
            $data['disiplin'] = $this->utilitikeperluansumber_model->get_bidang_1();
            $data['syarikat'] = $this->utilitikeperluansumber_model->get_syarikat_1();


            if ($_POST)
            {

             $this->form_validation->set_rules('ptf[]', 'PTF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pif[]', 'PIF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pdf[]', 'PDF', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');
         
             $this->form_validation->set_rules('panel_penilai[]', 'Panel Penilai', 'trim|required|xss_clean'); 
             $this->form_validation->set_rules('pegawaikaitan', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
             $this->form_validation->set_rules('tjawabdankuasa', 'Tugas Dan Pegawai Atasan Yang Ada Kaitan ', 'trim|required|xss_clean');
             $this->form_validation->set_rules('pegawailain', 'Tugas Pegawai-Pegawai Lain Yang Ada Kaitan', 'trim|required|xss_clean');

              if($this->form_validation->run())
            {

              if($this->input->post('sunting') != NULL){
                //echo "seterus";

               $this->pnpa_model->updatemodelstruktur();
               $this->pnpa_model->updatepanelkom();
               $this->pnpa_model->updatepanelpenilai();

              

              redirect('pnpa/treeview_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
          

              }else{

               // echo "sunting";

               $this->pnpa_model->tambahmodelpnpa();

               redirect('pnpa/treeview_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
          
              }

            }else{
            
            $this->load->view('template/default', $data);

            }

            }else{
            
            $this->load->view('template/default', $data);

          }
  }


  function kemaskinipanel_penilai_pnpa_ppd()
    {
            
        
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kemaskinipanel_penilai_pnpa_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
                $utiliti_sumber_man_id = $this->uri->segment(5);

                if($getPanelpenilai = $this->pnpa_model->get_panelpenilai_1($utiliti_sumber_man_id))
                {
                    $data['senarai_panel2'] = $getPanelpenilai;
                   // print_r($getPanelpenilai);
                   // die();

                }
                
                if($getbidang = $this->utilitikeperluansumber_model->get_bidang_1())
                {
                   $data['disiplin'] = $getbidang;
                }
                
                if($getbidang = $this->utilitikeperluansumber_model->get_syarikat_1())
                {
                   $data['syarikat'] = $getbidang;
                }


                //$syarikat_id = $this->uri->segment(3);
                 $utiliti_sumber_man_id = $this->uri->segment(5); 
                
                //$this->form_validation->set_rules('kat_alat_pej_id','Kategori Alat Pejabat','trim|required|xss_clean');
                //$this->form_validation->set_rules('nama1','Nama','trim|required|xss_clean');
                //$this->form_validation->set_rules('syarikat_id1','Nama Syarikat','trim|required|xss_clean');
                //$this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                //$this->form_validation->set_rules('peranan','Peranan','trim|required|xss_clean');
                //$this->form_validation->set_rules('jawatan1','Jawatan','trim|required|xss_clean');
                //$this->form_validation->set_rules('disiplin_bidang_id1','Disiplin/Jawatan','trim|required|xss_clean');
                //$this->form_validation->set_rules('gaji1','Gaji','trim|required|xss_clean');
                //$this->form_validation->set_rules('koslebihmasa1','Kos Lebih Masa','trim|required|xss_clean');


                if($this->form_validation->run())
                {
                    //$id = $this->input->post('urus_pej_id');

                    $dataDetail = array('utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),
                                        'nama' => $this->input->post('nama1'),
                                        'syarikat_id' => $this->input->post('syarikat_id1'),
                                        'nric' => $this->input->post('noic'),
                                        'jawatan' => $this->input->post('jawatan1'),
                                        'disiplin_bidang_id' => $this->input->post('disiplin_bidang_id1'),
                                        'gaji' => $this->input->post('gaji1'),
                                        'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa1')
                                        );

                                        //print_r($dataDetail);
                    //die();
                    $update_panel = $this->utilitikeperluansumber_model->update_panel($utiliti_sumber_man_id,$dataDetail);
                    //$updatePermohonanDetail = $this->User_model->update_permohonandetail($recordId,$dataDetail,$rnNo = $this->session->userdata('rnNo'));

                    if($update_panel)
                    {
                        $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Panel Penilai Teknikal Berjaya Dikemaskini</font><br>');
                        redirect('pnpa/model_struktur_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    }
                    else
                    {
                        $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');
                        redirect('pnpa/kemaskinipanel_penilai_pnpa_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$pnpa_pata_f8_1a_panel_penilai_id.'refresh');
                    } 
                }

                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
  
    //name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
  function treeview_pnpa_edit_ppd ()
  {

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['senarai_skop'] = $this->pnpa_model->get_skop($this->uri->segment(4));
                $data['senarai_treeview'] = $this->pnpa_model->get_skop_summary_pnpa($this->uri->segment(4));
                //$data['aktiviti_tajuk'] = $this->pnpa_model->get_treeview_summary_pnpa($this->uri->segment(4));
                
  
                if ($_POST){

                /*$this->form_validation->set_rules('skop[]', 'Skop', 'trim|required|xss_clean');
                $this->form_validation->set_rules('aktiviti[]', 'Aktiviti', 'trim|required|xss_clean');
                $this->form_validation->set_rules('butiran[]', 'Butiran Aktiviti', 'trim|required|xss_clean');
                $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required|xss_clean');

                if($this->form_validation->run())
                 {*/
                   if($this->input->post('sunting') != NULL){

                   // echo "sunting";

                    $update = $this->pnpa_model->updatetreeviewpnpa();
                    redirect('pnpa/skop_aktiviti_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
              

                   }else{

                     // echo "tambah";

                      $addTreeview = $this->pnpa_model->tambahtreeviewpnpa();

                      if($addTreeview)
                        {
                            //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                            redirect('pnpa/skop_aktiviti_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }
                        else
                        {
                           //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                            redirect('pnpa/treeview_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                        }      
                   } 

                 /*}else{

                $this->load->view('template/default', $data); 
               
                } 
                */
                }else{

                $this->load->view('template/default', $data); 
               
                } 
                
               
    }

  //name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
  function skop_aktiviti_pnpa_edit_ppd ()
  {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_skop'] = $this->pnpa_model->get_skop_summary_pnpa($this->uri->segment(4));
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }
        

	//name : fatin
	//date : 26/10/13
   //edited : diana 10/11/13
	
   function skop_aktiviti2_pnpa_edit_ppd ()
 {
	$node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit_ppd';

                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();



                if($_POST){

                 /* 
                 $this->form_validation->set_rules('pihakkaitan', 'Pihak Berkaitan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tjawab', 'Tanggungjawab', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('catatan', 'Catatan', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('objek', 'Objek Sebagai', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('bajet_aktvt', 'Bajet Aktiviti', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('sumber', 'Sumber', 'trim|required|xss_clean');
                 $this->form_validation->set_rules('output', 'Output Mula', 'trim|required|xss_clean');
                 //$this->form_validation->set_rules('pof[]', 'POF', 'trim|required|xss_clean');

                 if($this->form_validation->run()){  //check validation
                  */
                   // if($this->input->post('hantar') == 'Rancang'){ //kalo sunting
				   
					if($this->input->post('rancang') != NULL)
					{
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                      
                      if($check_data == 0)
					  { 
                        $this->pnpa_model->tambahskopaktivitipenilaiaset();
                      }
					  else
					  {
                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

						$foto = $this->input->post('foto');
						if(is_array($foto))
						{
							//delete
							$this->pnpa_model->delete_pnpa_urus_pej('foto');
							//insert
							$this->pnpa_model->insert_pnpa_urus_pej('foto');
						}

						$fax = $this->input->post('fax');
						if(is_array($fax))
						{
							//delete
							$this->pnpa_model->delete_pnpa_urus_pej('fax');
							//insert
							$this->pnpa_model->insert_pnpa_urus_pej('fax');
						}

						$tel = $this->input->post('tel');
                        if(is_array($tel))
						{
							//delete
							$this->pnpa_model->delete_pnpa_urus_pej('tel');
							//insert
							$this->pnpa_model->insert_pnpa_urus_pej('tel');
						}

						$kom = $this->input->post('kom');
                        if(is_array($kom))
						{
							//delete
							$this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
							//insert
							$this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');
						}


						$pem = $this->input->post('pem');
						if(is_array($pem))
						{
							//delete
							$this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
							//insert
							$this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');
						}

						$ken = $this->input->post('ken');
						if(is_array($ken))
						{
							//delete
							$this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
							//insert
							$this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');
						}

						$ppe = $this->input->post('ppe');
						if(is_array($ppe))
						{
							//delete
							$this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
							//insert
							$this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');
						}

						$this->pnpa_model->tambahsumberrancang("rancang");
						redirect('pnpa/skop_aktiviti2_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
               


//endofrancang					//	}else if($this->input->post('hantar') == 'Lulus'){      
						}else if($this->input->post('lulus') != NULL){      

                      //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }

                      $this->pnpa_model->tambahsumberrancang("lulus");

                      redirect('pnpa/skop_aktiviti2_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
                     

//endoflulus                    //}else if($this->input->post('hantar') == 'Isi'){
					}else if($this->input->post('isi') != NULL){

                     //echo "rancang"; 
                     //check data exist or not
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }
                      $this->pnpa_model->tambahsumberrancang("isi");

                      redirect('pnpa/skop_aktiviti2_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/#skop','refresh');
//endofisi                     
                    }else{ //add new record

                      //echo "tambah";
                      $check_data = $this->pnpa_model->count_data_in_tbl_pnpa_pata_f8_1b1c();
                        //echo "check=".$check_data;
                      if($check_data == 0){ 

                        $this->pnpa_model->tambahskopaktivitipenilaiaset();

                      }else{

                        $this->pnpa_model->updateskopaktivitipenilaiaset();
                      }

                       $foto = $this->input->post('foto');
                      
                      //echo is_array($foto)? 'Array' : 'not array';

                      if(is_array($foto)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('foto');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('foto');


                      }

                                            

                       $fax = $this->input->post('fax');
                       if(is_array($fax)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('fax');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('fax');


                      }




                       $tel = $this->input->post('tel');
                       //echo "isi=".count($isi);

                       if(is_array($tel)){

                        //delete
                        $this->pnpa_model->delete_pnpa_urus_pej('tel');
                        //insert
                        $this->pnpa_model->insert_pnpa_urus_pej('tel');


                      }



                        $kom = $this->input->post('kom');
                        //echo "kom=".count($kom);

                        if(is_array($kom)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('kom');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('kom');


                      }


                       $pem = $this->input->post('pem');
                       //echo "pem=".count($pem);
                       if(is_array($pem)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('pem');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('pem');


                      }

                       $ken = $this->input->post('ken');
                       //echo "ken=".count($ken);
                       if(is_array($ken)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ken');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ken');


                      }


                       $ppe = $this->input->post('ppe');
                       //echo "ppe=".count($ppe);
                      if(is_array($ppe)){

                       $this->pnpa_model->delete_pnpa_tbl_pnpa_alat_kerja('ppe');
                        //insert
                        $this->pnpa_model->insert_pnpa_tbl_pnpa_alat_kerja('ppe');


                      }


                     // $this->pnpa_model->tambahskopaktiviti2();

                        // $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Sumber Manusia Berjaya Didaftarkan</font><br>');
                        redirect('pnpa/skop_aktiviti_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),'refresh');
                    
                }

		}else{ 
		$this->load->view('template/default', $data);
		}  
	               
 }
		
//name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view

/*
        function skop_aktiviti2_pnpa_edit_ppd ()
 {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['skop_a'] = $this->pnpa_model->get_skop2_summary_pnpa($this->uri->segment(5));
                //$data['senarai_sumber'] = $this->pnpa_model->get_sumber_summary_pnpa($this->uri->segment(3));

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();
          
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }
  */
        
  //name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
        function kawalan_rekod_pnpa_edit_ppd ()
  {
        if($_POST)
        {
                
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$pnpa_pata_f8_1d_id = $this->uri->segment(4); 
                 $no= $this->input->post('no');               
                
                if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->form_validation->set_rules('jenis_rekod1','Jenis Rekod','trim|required|xss_clean');
                $this->form_validation->set_rules('lokasi1','Lokasi','trim|required|xss_clean');
                $this->form_validation->set_rules('tempoh1','Tempoh','trim|required|xss_clean');

                if($this->form_validation->run())
                {
                //$data['pnpa_pata_f8_1d_id'] = $this->session->userdata('pnpa_pata_f8_1d_id');
                $addRekod = $this->pnpa_model->tambahkawalan_rekod();
                
               // $pnpa_pata_f8_1d_id = $this->input->post('pnpa_pata_f8_1d_id');                
                //$this->session->set_userdata(array('pnpa_pata_f8_1d_id' => $pnpa_pata_f8_1d_id));

                if($addRekod)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Kawalan Rekod Berjaya Didaftarkan</font><br>');
                    redirect('pnpa/kawalan_rekod_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$no,'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
                    redirect('pnpa/kawalan_rekod_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$no,'refresh');
                }                
            }      
            else
            {
               $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
                 
                 if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod())
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->load->view('template/default', $data);
            } 
        }
        else
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                $this->load->view('template/default', $data);
    
        }
    }

  function kemaskinikawalan_rekod_ppd()
    {
      $node_id = '14';
      $menu_name = 'menu1';
      $menu_link = 'pnpa/kemaskinikawalan_rekod_ppd';
                
      $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
      $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
      $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
      $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
             
      //$pnpa_pata_f8_1d_id = $this->uri->segment(3);

      $no= $this->input->post('no');  

      
      if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod_1($this->uri->segment(5)))
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
        $dataDetail = array('f8_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f8_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                           );

        $update_rekod = $this->pnpa_model->update_rekod($this->uri->segment(5), $dataDetail);

                    
        if($update_rekod)
        {
          $this->session->set_flashdata('flashComfirm', '<font color="blue" size="2">BERJAYA: Kawalan rekod Berjaya Dikemaskini</font><br>');
          
          redirect('pnpa/kawalan_rekod_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        }
        
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="2">AMARAN: Gagal mengemaskini rekod.</font><br></strong><br>');

          redirect('pnpa/kemaskinikawalan_rekod_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
        } 
      }

      $this->load->view('template/default', $data);        
    }
       
  //name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
        function dokumen_rujukan_pnpa_edit_ppd ()
  {
              
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
    
    /*
     Update : diana 23/10/13
     Desc : Upload module
    */
            
        {
        if($_POST)
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                //$no=$this->uri->segment(3);               
                $pspa= $this->input->post('pspa');
                $no= $this->input->post('no');

                if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($no))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                }
                
                $this->form_validation->set_rules('nama_fail1','Tajuk Dokumen','trim|required|xss_clean');             

                if($this->form_validation->run())
                {
     $data['lampiran_id'] = $this->session->userdata('lampiran_id');      
     
     //$config['upload_path'] = 'uploads/';
   $config['upload_path'] = $this->config->item('upload_path')."pnpa/";
    $config['allowed_types'] = '*'; 
   //$config['allowed_types'] = 'docx|doc|ppt|pptx|xls|xlsx|jpg|png|jpeg|gif|pdf';
   //$config['allowed_types'] = 'ppt|pptx|xls|xlsx|jpg|png|jpeg|gif|pdf';
     $config['max_size'] = '3000000';
        
     $this->load->library('upload', $config);
     
     $checkError = 0;
     //check validation
     if(empty($_FILES['userfile']['name'])){ $checkError++;}
     if($_POST['nama_fail2']<>''){if(empty($_FILES['userfile2']['name'])){ $checkError++;}}
     if($_POST['nama_fail3']<>''){if(empty($_FILES['userfile3']['name'])){ $checkError++;}}
     if($_POST['nama_fail4']<>''){if(empty($_FILES['userfile4']['name'])){ $checkError++;}}
     if($_POST['nama_fail5']<>''){if(empty($_FILES['userfile5']['name'])){ $checkError++;}}
     
     if($checkError>0)
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Perlu Diisi</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$no);
     }
     
     //first file
     if($this->upload->do_upload('userfile'))
     {
      $dataImage = $this->upload->data();
   
      $aPass = array($this->input->post('nama_fail1'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
     }
     else
     {
    
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">'.$this->upload->display_errors().' AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$no,'refresh');
     }
     
     //second file
   if($_POST['nama_fail2']<>''){
     if($this->upload->do_upload('userfile2'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail2'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
      
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$no,'refresh');
     }
  }
     
   
     //third file
   if($_POST['nama_fail3']<>''){
     if($this->upload->do_upload('userfile3'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail3'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$no,'refresh');
     }
  }
     
     //fourth file
   if($_POST['nama_fail4']<>''){
     if($this->upload->do_upload('userfile4'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail4'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
     }
     else
     {
     $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$no,'refresh');
     }
  }
     
   
     //fifth file
   if($_POST['nama_fail5']<>''){
     if($this->upload->do_upload('userfile5'))
     {
      $dataImage = $this->upload->data();
     
      $aPass = array($this->input->post('nama_fail5'),$dataImage['file_name'],$dataImage['full_path'],$dataImage['file_type'],$this->input->post('no'));
      $addDoc = $this->pnpa_model->tambahdokumen($aPass);
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN : Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$no,'refresh');
     }
  }
         
     $lampiran_id = $this->input->post('lampiran_id');                
     $this->session->set_userdata(array('lampiran_id' => $lampiran_id));

    if($addDoc)
     {  
      $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Dokumen rujukan Berjaya Didaftarkan</font><br>');
      redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$no,'refresh');
     }
     else
     {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan rekod.</font><br></strong><br>');
      redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$no,'refresh');
     }
   
    }      
    else
    {
       $node_id = '14';
     $menu_name = 'menu1';
     $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_ppd';
     
     $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
     $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
     $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
     $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);       
      
      if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($this->uri->segment(3)))
     {
      $data['senarai_dokumen'] = $getDokumenrujukan;
     
     }
     
     $this->load->view('template/default', $data);
    } 
   
        }
        else
        {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_ppd';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
          
                if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }
                
                $this->load->view('template/default', $data);
    
        }
     }
  
   
 }
  
  /*
    Added : diana 25/10/2013
    Desc  : delete file & update table lampiran
  */
  function hapus_dokumen_rujukan_pnpa_ppd()
  {
    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_ppd';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
    $pspa =   $this->uri->segment(3);
    $pnpaID = $this->uri->segment(4);
    $lampiranID = $this->uri->segment(5);
    
    
    $fileInfo = $this->pnpa_model->get_documentInfo($lampiranID);
    $lokasiFile = $fileInfo[0];
    
    if($lokasiFile<>'')
    {
      $delete = $this->pnpa_model->deleteDoc($lampiranID);
      
      if($delete===true)
      {
        //unlink file in directory
        $unlink = unlink($lokasiFile);
        
        if($unlink==true)
        { 
          $this->session->set_flashdata('flashError', '<strong><font color="blue" size="3">Dokumen Rujukan Berjaya Dihapus</font><br></strong><br>');
          redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$pnpaID);
        }
        else
        {
          $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
          redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$pnpaID);
        }
      }
      else
      {
        $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
        redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$pnpaID);
      }
    }
    else
    {
      $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">Dokumen Rujukan Gagal Dihapus</font><br></strong><br>');
        redirect('pnpa/dokumen_rujukan_pnpa_edit_ppd/'.$pspa.'/'.$pnpaID);
    }
      
      
  }
  
  /*
    Added : diana 25/10/2013
    Desc  : download file
  */
  function muat_dokumen_rujukan_pnpa_ppd($lampiran_id)
  {
    $node_id = '14';
    $menu_name = 'menu1';
    $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_ppd';
    
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
      
     
    $pnpaID = $this->uri->segment(4);
    $lampiranID = $this->uri->segment(5);
    
    $fileInfo = $this->pnpa_model->get_documentInfo($lampiranID);
    $lokasiFile = $fileInfo[0];
    
    if($lokasiFile<>'')
    { 
      $data = file_get_contents($lokasiFile); // Read the file's contents
      $name = $fileInfo[1];

      force_download($name, $data);
    }
    
  }



//name : fatin
//date : 25/10/13
//desc : for summary_pp_pnpa view
  function model_struktur_pnpa_edit_pp ()
  {

              $node_id = '13';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['pelan_kom'] = $this->pnpa_model->get_model_summary_pnpa($this->uri->segment(4));
 
                $data['year_list'] =year_dropdown();  //get year list 
                
                if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
            {
               $data['senarai_pof'] = $getPof;
            }
                
              
                $this->load->view('template/default', $data);
  
    }




   
  //xguna pun           
  function treeview_pnpa_edit_pp ()
  {

                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/treeview_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
  
                $this->load->view('template/default', $data);
  }


//name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
  function skop_aktiviti_pnpa_edit_pp ()
  {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_skop'] = $this->pnpa_model->get_skop_summary_pnpa($this->uri->segment(3));
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }
       
//name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view 
        function skop_aktiviti2_pnpa_edit_pp()
  {
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['skop_a'] = $this->pnpa_model->get_skop2_summary_pnpa($this->uri->segment(3));
                //$data['senarai_sumber'] = $this->pnpa_model->get_sumber_summary_pnpa($this->uri->segment(3));

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();
          
    //$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default', $data);
  }
        

 //name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
        function kawalan_rekod_pnpa_edit_pp ()
  {
    

                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_kawalan'] = $this->pnpa_model->get_kawalan_summary_pnpa($this->uri->segment(3));

                if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }

                
                //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }
        

//name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
        function dokumen_rujukan_pnpa_edit_pp ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_pnpa view

                $node_id = '137';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_dokumen'] = $this->pnpa_model->get_dokumen_summary_pnpa($this->uri->segment(3));
                
                //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';

                if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }

                $this->load->view('template/default', $data);
  }







  function summary_ptf_pnpa ()
  {

    //nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
            
                $node_id = '65';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/summary_ptf_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $sessionarray = $this->session->all_userdata();
                $id = $this->uri->segment(3); 
                $pnpa_id = $this->uri->segment(4);
                $data['rows'] = $this->pnpa_model->get_all_kandungan_pnpa($pnpa_id);
                if($getPnpa = $this->pnpa_model->get_pnpa2($id,$pnpa_id))
                {
                  $data['senarai_pnpa'] = $getPnpa;
                }
                $this->load->view('template/default', $data);
  }






function model_struktur_pnpa_edit_ptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_pnpa view

              $node_id = '13';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa_edit_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['pelan_kom'] = $this->pnpa_model->get_model_summary_pnpa($this->uri->segment(4));
 
                $data['year_list'] =year_dropdown();  //get year list 
                
                if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
            {
               $data['senarai_pof'] = $getPof;
            }
                
              
                $this->load->view('template/default', $data);
  
    }




    function model_struktur_pnpa_edit_pif ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pif_pnpa view

              $node_id = '13';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa_edit_pif';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['pelan_kom'] = $this->pnpa_model->get_model_summary_pnpa($this->uri->segment(4));
 
                $data['year_list'] =year_dropdown();  //get year list 
                
                if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
            {
               $data['senarai_pof'] = $getPof;
            }
                
              
                $this->load->view('template/default', $data);
  
    }






    function model_struktur_pnpa_edit_pof ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pof_pnpa view

              $node_id = '13';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa_edit_pof';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['pelan_kom'] = $this->pnpa_model->get_model_summary_pnpa($this->uri->segment(4));
 
                $data['year_list'] =year_dropdown();  //get year list 
                
                if($getPanelpenilai = $this->pnpa_model->get_panelpenilai())
            {
               $data['senarai_panel'] = $getPanelpenilai;
            }

            if($getPtf = $this->pnpa_model->get_ptf())
            {
               $data['senarai_ptf'] = $getPtf;
            }
            
            if($getPif = $this->pnpa_model->get_pif())
            {
               $data['senarai_pif'] = $getPif;
            }

            if($getPdf = $this->pnpa_model->get_pdf())
            {
               $data['senarai_pdf'] = $getPdf;
            }

            if($getPof = $this->pnpa_model->get_pof())
            {
               $data['senarai_pof'] = $getPof;
            }
                
              
                $this->load->view('template/default', $data);
  
    }





  function skop_aktiviti_pnpa_edit_ptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_pnpa view  


                $node_id = '134';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_skop'] = $this->pnpa_model->get_skop_summary_pnpa($this->uri->segment(3));
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }





  function skop_aktiviti_pnpa_edit_pif ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pif_pnpa view  


                $node_id = '134';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit_pif';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_skop'] = $this->pnpa_model->get_skop_summary_pnpa($this->uri->segment(3));
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }





  function skop_aktiviti_pnpa_edit_pof ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pof_pnpa view  


                $node_id = '134';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti_pnpa_edit_pof';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_skop'] = $this->pnpa_model->get_skop_summary_pnpa($this->uri->segment(3));
            
                //$data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default', $data);
  }





  function skop_aktiviti2_pnpa_edit_ptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_pnpa view 

                $node_id = '135';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['skop_a'] = $this->pnpa_model->get_skop2_summary_pnpa($this->uri->segment(3));

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();

                $this->load->view('template/default', $data);
  }






  function skop_aktiviti2_pnpa_edit_pif ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pif_pnpa view 

                $node_id = '135';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit_pif';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['skop_a'] = $this->pnpa_model->get_skop2_summary_pnpa($this->uri->segment(3));

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();

                $this->load->view('template/default', $data);
  }





  function skop_aktiviti2_pnpa_edit_pof ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pof_pnpa view 

                $node_id = '135';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/skop_aktiviti2_pnpa_edit_pof';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['skop_a'] = $this->pnpa_model->get_skop2_summary_pnpa($this->uri->segment(3));

                $data['obj_sbg'] = $this->pnpa_model->get_obj_sebagai();
                $data['sumber_id'] = $this->pnpa_model->get_sumber_id();
                $data['senarai_sumber'] = $this->pnpa_model->get_sum_man();
                $data['senarai_alat_pej'] = $this->pnpa_model->get_alat_pej();
                $data['senarai_fax'] = $this->pnpa_model->get_fax();
                $data['senarai_tel'] = $this->pnpa_model->get_telefon();
                $data['senarai_kom'] = $this->pnpa_model->get_komputer();
                $data['senarai_pemeriksa'] = $this->pnpa_model->get_pemeriksaan();
                $data['senarai_kenderaan'] = $this->pnpa_model->get_kenderaan();
                $data['senarai_ppe'] = $this->pnpa_model->get_ppe();

                $this->load->view('template/default', $data);
  }





  function kawalan_rekod_pnpa_edit_ptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_pnpa view  

                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_kawalan'] = $this->pnpa_model->get_kawalan_summary_pnpa($this->uri->segment(3));

                if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }

                
                //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }





  function kawalan_rekod_pnpa_edit_pif ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pif_pnpa view  

                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_pif';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_kawalan'] = $this->pnpa_model->get_kawalan_summary_pnpa($this->uri->segment(3));


                if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }





  function kawalan_rekod_pnpa_edit_pof ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pof_pnpa view  

                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/kawalan_rekod_pnpa_edit_pof';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_kawalan'] = $this->pnpa_model->get_kawalan_summary_pnpa($this->uri->segment(3));


                if($getKawalanrekod = $this->pnpa_model->get_kawalanrekod($this->uri->segment(4)))
                {
                    $data['senarai_kawalan'] = $getKawalanrekod;
                
                }
                
                //$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default', $data);
  }





  function dokumen_rujukan_pnpa_edit_ptf ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_ptf_pnpa view

                $node_id = '137';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_dokumen'] = $this->pnpa_model->get_dokumen_summary_pnpa($this->uri->segment(3));
                
                //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';

                if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }

                $this->load->view('template/default', $data);
  }






  function dokumen_rujukan_pnpa_edit_pif ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pif_pnpa view

                $node_id = '137';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_pif';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_dokumen'] = $this->pnpa_model->get_dokumen_summary_pnpa($this->uri->segment(3));
                
                //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';

                if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }

                $this->load->view('template/default', $data);
  }






  function dokumen_rujukan_pnpa_edit_pof ()
  {
    //name : seri
    //date : 27/10/13
    //desc : for summary_pof_pnpa view

                $node_id = '137';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/dokumen_rujukan_pnpa_edit_pof';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                $data['senarai_dokumen'] = $this->pnpa_model->get_dokumen_summary_pnpa($this->uri->segment(3));
                
                //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';

                if($getDokumenrujukan = $this->pnpa_model->get_dokumenrujukan($this->uri->segment(4)))
                {
                    $data['senarai_dokumen'] = $getDokumenrujukan;
                
                }

                $this->load->view('template/default', $data);
  }






  function papar_panel_penilai_pp ()
  {
    //name : seri
    //date : 01/11/13
    //desc : for summary_pp_pnpa view & model_struktur_pnpa_edit_pp view 

                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/papar_panel_penilai_pp';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['senarai_panel'] = $this->pnpa_model->get_panelpenilai_1($this->uri->segment(5));

               
                 $this->load->view('template/default', $data);
  }





  function papar_panel_penilai_ptf ()
  {
    //name : seri
    //date : 01/11/13
    //desc : for summary_ptf_pnpa view & model_struktur_pnpa_edit_ptf view 

                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/papar_panel_penilai_ptf';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['senarai_panel'] = $this->pnpa_model->get_panelpenilai_1($this->uri->segment(5));

               
                 $this->load->view('template/default', $data);
  }





function papar_panel_penilai_pif ()
  {
    //name : seri
    //date : 01/11/13
    //desc : for summary_pif_pnpa view & model_struktur_pnpa_edit_pif view 

                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/papar_panel_penilai_pif';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['senarai_panel'] = $this->pnpa_model->get_panelpenilai_1($this->uri->segment(5));

               
                 $this->load->view('template/default', $data);
  }






  function papar_panel_penilai_pof ()
  {
    //name : seri
    //date : 01/11/13
    //desc : for summary_pof_pnpa view & model_struktur_pnpa_edit_pof view 

                $node_id = '138';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/papar_panel_penilai_pof';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                $data['senarai_panel'] = $this->pnpa_model->get_panelpenilai_1($this->uri->segment(5));

               
                 $this->load->view('template/default', $data);
  }

  

 
  //tambah panel penilai dekat pelan
 /* function tambahpanel()
         {
           if($_POST)
             {
               $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

              $no= $this->input->post('no');
              //print_r($no);
              //die();
                
                //$syarikat_id = $this->uri->segment(3);
                 //$utiliti_sumber_man_id = $this->uri->segment(3); 
                
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
                
                $addSumberMan = $this->utilitikeperluansumber_model->tambahsumberpanel();
               
                if($addSumberMan)
                {
                    //$pnpa_id = $this->uri->segment(3);
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    //redirect('pnpa/model_struktur_pnpa/'.$no,'refresh');
                     redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                    
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan panel penilai.</font><br></strong><br>');
                    //redirect('pnpa/kandungan_pnpa/'.$no,'refresh');
                     redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
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
         
         
         
       function  tambahsumbermanusia()
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
           
                //$utiliti_sumber_man_id = $this->uri->segment(3); 
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
        $addSumberMan = $this->utilitikeperluansumber_model->tambahsumbermanusia();

                if($addSumberMan)
                {
                    $this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    //redirect('utilitiKeperluanSumber/sumber_manusia');
                     redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
                }
                else
                {
                    $this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan permohonan sumber manusia.</font><br></strong><br>');
                    //redirect('utilitiKeperluanSumber/sumber_manusia');
                    redirect('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),'refresh');
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
    


*/
//tambah panel penilai dekat pelan
  function sumberrancang()
         {
           if($_POST)
             {
               
              $no= $this->input->post('pnpa_id');
              $no2= $this->input->post('skop_aktvt_id');
             if($this->input->post('kosflag')=='1')
             {
                 $this->input->post('gaji');
                 
             }
              else
              {
                   $this->input->post('gaji');
                    $this->input->post('kos');
              }
              
                //$syarikat_id = $this->uri->segment(3);
             $pnpa_pata_f8_1b1c_sumber_man_id = $this->uri->segment(3); 
                
             $this->form_validation->set_rules('kosflag','Kategori Alat Pejabat','trim|required|xss_clean');
               // $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
               // $this->form_validation->set_rules('syarikat_id','Nama Syarikat','trim|required|xss_clean');
                //$this->form_validation->set_rules('noic','No Kad Pengenalan','trim|required|xss_clean');
                
                
            if($this->form_validation->run())
            {
                $data['pnpa_pata_f8_1b1c_sumber_man_id'] = $this->session->userdata('pnpa_pata_f8_1b1c_sumber_man_id');
                $addSumberMan = $this->pnpa_model->tambahsumberrancang();
                
                $pnpa_pata_f8_1b1c_sumber_man_id = $this->input->post('pnpa_pata_f8_1b1c_sumber_man_id');                
                $this->session->set_userdata(array('pnpa_pata_f8_1b1c_sumber_man_id' => $pnpa_pata_f8_1b1c_sumber_man_id));

                if($addSumberMan)
                {
                    //$pnpa_id = $this->uri->segment(3);
                    //$this->session->set_flashdata('flashComfirm', '<font color="blue" size="3">BERJAYA: Panel Penilai Berjaya Didaftarkan</font><br>');
                    redirect('pnpa/model_struktur_pnpa/'.$no.'/'.$no2,'refresh');
                }
                else
                {
                    //$this->session->set_flashdata('flashError', '<strong><font color="red" size="3">AMARAN: Gagal menyimpan panel penilai.</font><br></strong><br>');
                    redirect('pnpa/skop_aktiviti2_pnpa/'.$no.'/'.$no2,'refresh');
                }                
            }      
            else
            {
               $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa';
                
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
             
             
             $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'pnpa/model_struktur_pnpa';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

                //$syarikat_id = $this->uri->segment(3);
                if($getSyarikat = $this->utilitikeperluansumber_model->get_syarikat($syarikat_id))
                {
                    $data['syarikat'] = $getSyarikat;
                }
                
               
                //$data['main_content'] = 'keperluan_sumber/kemaskinipejabat';
                $this->load->view('template/default', $data);        
            }
         }


        function checkbox ()
  {
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
            
            
                $node_id = '14';
                $menu_name = 'menu1';
                $menu_link = 'checkbox';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    //$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default', $data);
  }

         
         
  //** END PNPA **//
  

}