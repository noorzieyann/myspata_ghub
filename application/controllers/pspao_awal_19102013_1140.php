<?php


       //author : Anuar
       //date create: 08/07/2013

class Pspao_awal extends CI_Controller {
    
    
       public function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		$this->load->library('form_validation');
		
		$this->load->helper(array('form', 'url'));
		$this->load->helper('function_helper');
		
		$this->load->model('pspao_model');
		$this->load->library('pagination');
                $this->load->library('table');
                $this->load->library('session');
	//	$this->output->enable_profiler(TRUE); //display query statement
		
		if(!$this->aauth->is_loggedin()){
			echo '<script>';
			echo 'alert("Belum Login");';
			echo 'window.location = "'.site_url('auth').'"';
			echo '</script>';
		}
               
		
	}
    

function check_user_login_page(){

   $sessionarray = $this->session->all_userdata();
   $kump_pengguna_id = $sessionarray['user_rolegroupid'];

    $mu = $this->aauth->get_session('menu');
   //echo $kump_pengguna_id;

   if(($mu[2]['menu_role_kump_id[2]'])==3){

    redirect('pspao_awal/pspao_tahun');

   }else if(($mu[2]['menu_role_kump_id[2]'])==4){

     $sessionarray = $this->session->all_userdata();
    
    $userid = $sessionarray['user_id'];

    $getpspaawalid = $this->pspao_model->get_pspao_awal_id($userid);
    //echo "ddd=".$getpspaawalid;

    if($getpspaawalid != 0){


    redirect('pspao_awal/arahan_sedia_pspao/'.$getpspaawalid);
     
    }else{

  redirect('pspao_awal/senarai_pspao_baru');

    }

   }else{

   redirect('pspao_awal/senarai_pspao_baru');

   }

}



    function pspao_tahun(){


    $node_id = '11';
    $menu_name = 'menu1';
    $menu_link = 'pspao/pspao_tahun';


    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

   $user_kemid = $this->session->userdata('user_kemid'); 
   $user_jabid = $this->session->userdata('user_jabid'); 

     $data['year_list'] = year_dropdown(); //get year list from function_helper
     $data['kementerian'] = $this->pspao_model->get_kementerian_name($user_kemid);
     $data['jabatan'] = $this->pspao_model->get_jabatan_name($user_jabid);


     if(isset($_POST["seterusnya"])){


         $this->form_validation->set_rules('tempoh_mula','Tempoh Mula','trim|required|xss_clean');
         $this->form_validation->set_rules('tempoh_akhir','Tempoh Akhir','trim|required|xss_clean');

         if($this->form_validation->run())
            {

           
               $addpspaotahun = $this->pspao_model->tambahpspaotahun($user_kemid);

                if($addpspaotahun)
                {
                     redirect('pspao_awal/arahan_sedia_pspao_ptf/'.$addpspaotahun);
                }
                      

            }

      }


    $this->load->view('template/default', $data);
    }
    

    function arahan_sedia_pspao_ptf($pspao_awal_id){

    $node_id = '11';
    $menu_name = 'menu1';
    $menu_link = 'pspao/arahan_sedia_pspao_ptf';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $sessionarray = $this->session->all_userdata();
    $user_kemid = $sessionarray['user_kemid'];

    if($getptflist= $this->pspao_model->get_user_list($user_kemid,4))
    {
       $data['user_list'] = $getptflist; //get ptf bwh kementerian ptf yg login
    }


    if($this->input->post('hantar')=='hantar'){

        $userid = $this->input->post('userid');
        //echo $userid[0];
        $userdetail =  $this->pspao_model->get_detail_user($userid[0]);

        $update_pspaoawal = $this->pspao_model->updatepspaoawalptf($userid[0],$pspao_awal_id);

        $path = 'pspao_awal/arahan_sedia_pspao/'.$pspao_awal_id;

        $this->function_model->insert_notifikasi(2,1,$sessionarray['user_id'],$userid[0],$path)  ; 

        redirect('pspao_awal/senarai_pspao_baru');

    }

   $this->load->view('template/default', $data);   

    }
       //desc : arahan sedia pspao
        
        function arahan_sedia_pspao($pspao_awal_id)
	{
		
		$node_id = '11';
		$menu_name = 'menu1';
		$menu_link = 'pspao/arahan_sedia_pspao';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $sessionarray = $this->session->all_userdata();
    //$user_kemid = $sessionarray['user_kemid'];
    
              
     if($getpspaouserlist= $this->pspao_model->get_user_list($sessionarray['user_kemid'],8))
    {
       $data['user_list'] = $getpspaouserlist; //get ppd bwh kementerian ptf yg login
    }



     if(($this->input->post('hantar')=='hantar')){

        $userid = $this->input->post('userid');
        //echo $userid[0];
        $userdetail =  $this->pspao_model->get_detail_user($userid[0]);
        //print_r($userdetail);

        foreach ($userdetail as $row){

        $jabagensi = $row->idjab_agensi;
       // echo "jabagensi=".$jabagensi;
        $negeriId = $row->idnegeri;
        //echo "jabagensi=".$negeriId;
       }

      

              $addppd = $this->pspao_model->updatepspaoawal($userid[0],$pspao_awal_id,$jabagensi,$negeriId);

              if($addppd){

                 $idstatuslog = $this->pspao_model->insert_status_log($pspao_awal_id,1);
              
              }


              $path = 'pspao_awal/pspao_baru';
             // $path = site_url('pspao_awal/pspao_baru');

              //echo 'path='.$path;
              //$path2 = urlencode($path);
              //echo 'path2='.$path2;
           
             $this->function_model->insert_notifikasi(3,1,$sessionarray['user_id'],$userid[0],$path)  ; 
       
              redirect('pspao_awal/senarai_pspao_baru');
                 
           
               

       }        




    $this->load->view('template/default', $data);       
				
						
	   }
        
        
       
        
        //desc : pspao baru  
        
        function pspao_baru()
	{
		
		$node_id = '13';
		$menu_name = 'menu1';
		$menu_link = 'pspao/pspao_awal_baru';
                
     $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		 $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		 $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		 $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

      $sessionarray = $this->session->all_userdata();
                
      $data['year_list'] = year_dropdown(); //get year list from function_helper
      $data['kementerian'] = $this->pspao_model->get_kementerian_name($this->session->userdata('user_kemid'));
        
      $data['tahun_mula'] = $this->pspao_model->get_tempoh_mula();
      $data['tahun_akhir'] = $this->pspao_model->get_tempoh_akhir();

      $pspao_awal_id   = $this->pspao_model->get_pspaoawalid();

      //$this->form_validation->set_rules('tahun_mula', 'Tahun Mula', 'required');
      //$this->form_validation->set_rules('tahun_akhir', 'Tahun Akhir', 'required');
      $this->form_validation->set_rules('kand_visi', 'Visi', 'required');
      $this->form_validation->set_rules('kand_misi', 'Misi', 'required');
      $this->form_validation->set_rules('kand_objektif', 'Objektif', 'required');
      $this->form_validation->set_rules('kand_pendahuluan', 'Pendahuluan', 'required');
      
                     
      if ($this->form_validation->run() == FALSE){
        $this->load->view('template/default',$data);
      }else{

       // echo "<script>alert('Berjaya!')< /script>";
        
        if($this->input->post('hantar') =='hantar'){

           // echo "test";
           
           

             $idpspao = $this->pspao_model->update_pspao_awal($pspao_awal_id);

             if($idpspao){

               $idstatuslog = $this->pspao_model->insert_status_log($pspao_awal_id,2);

            }

        $pspao_awal_ptf_id   = $this->pspao_model->get_pspao_ptf_id($pspao_awal_id); // get ptf id

       $path = 'pspao_awal/ulasan_ptf_sah_pspao/'.$pspao_awal_id;

       $this->function_model->insert_notifikasi(4,1,$sessionarray['user_id'],$pspao_awal_ptf_id,$path);  //insert notifikasi

      redirect('pspao_awal/senarai_pspao_baru');
 			/*echo '<script>';
			echo 'alert("Adakah anda ingin menghantar PSPA(O) awal ini?");';
			echo 'window.location = "'.site_url('pspao_awal/senarai_pspao_baru').'"';
			echo '</script>';
			*/
          }else{

            $idpspao = $this->pspao_model->update_pspao_awal($pspao_awal_id);

            if($idpspao){

               $idstatuslog = $this->pspao_model->insert_status_log($pspao_awal_id,1);

            }

            

          }

       

        $this->load->view('template/default',$data);
       //redirect('pspao_awal/ukuran_sasar_pspao/'.$pspao_awal_id,'refresh');

      }
	
	}


function ukuran_sasar_pspao($pspaid){

     $node_id = '13';
     $menu_name = 'menu1';
     $menu_link = 'pspao/ukuran_sasar_pspao';
                
     $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
     $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
     $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
     $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $this->load->view('template/default',$data);
}


  function pspao_baru_copy($pspaoid)
  {
    
      $node_id = '13';
      $menu_name = 'menu1';
      $menu_link = 'pspao/pspao_baru_copy';
                
     $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
     $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
     $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
     $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

     $data['year_list'] = year_dropdown(); //get year list from function_helper

     $id = $this->pspao_model->get_pspaoawalid();
     $data['tempoh_mula'] = $this->pspao_model->get_tahun_mula($id); 
     $data['tempoh_akhir'] = $this->pspao_model->get_tahun_akhir($id);

     $sessionarray = $this->session->all_userdata();


     $data['rows'] = $this->pspao_model->get_pspao_detail($pspaoid);
     
     $data['kementerian'] = $this->pspao_model->get_kem_name($pspaoid);

     $data['pspaodata'] = $this->pspao_model->get_pspao_detail($pspaoid);
    // echo "getvalue=".$_GET['hantar'];

     if($this->input->post('hantar') =='hantar'){

      //echo "hantar";

     $hantar = $this->pspao_model->insert_pspao_awal($id);

     if($hantar){

           $idstatuslog = $this->pspao_model->insert_status_log($id,2);

       }
        $pspao_awal_ptf_id   = $this->pspao_model->get_pspao_ptf_id($pspao_awal_id); // get ptf id

       $path = 'pspao_awal/ulasan_ptf_sah_pspao/'.$pspaoid;

       $this->function_model->insert_notifikasi(4,1,$sessionarray['user_id'],$pspao_awal_ptf_id,$path); //insert notifikasi


       redirect(site_url('pspao_awal/senarai_pspao_baru'));

     }else if($this->input->post('simpan') =='simpan'){
      
      $simpan = $this->pspao_model->insert_pspao_awal($id);

      if($simpan){

           $idstatuslog = $this->pspao_model->insert_status_log($id,1);

       }

       redirect(site_url('pspao_awal/senarai_pspao_baru'));

     }else{
       
     $this->load->view('template/default',$data);

      }
   }

        
        //desc : pspao ulasan peng. pgawal lulus
       
        
        function ulasan_pp_lulus_pspao($id)
	{
		
	
		   $node_id = '13';
		   $menu_name = 'menu1';
		   $menu_link = 'pspao/ulasan_pp_lulus_pspao';
                
       $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
       $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
       $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
       $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
       $data['year_list'] =year_dropdown(); //get year list from function_helper
       $data['kementerian'] = $this->pspao_model->get_kem_name($id); 

       $data['tahun_mula'] = $this->pspao_model->get_tahun_mula($id); 
       $data['tahun_akhir'] = $this->pspao_model->get_tahun_akhir($id);
       $data['pspaodata'] = $this->pspao_model->get_pspao_detail($id);
                 
           $sessionarray = $this->session->all_userdata();    
                 
                  //if ($this->form_validation->run() == FALSE)
                //{
       if($this->input->post('lulus') =='lulus' ){

        $update = $this->pspao_model->update_pspao_awal_edit($id); 

        $this->pspao_model->update_pspao_date_lulus($id);

        if($update){

        $idstatuslog = $this->pspao_model->insert_status_log_ulasan($id,6);

        }
        

        /*****hantar notifikasi kepada ppd yg pspao dh diluluskan*****/

       $pspao_awal_ppd_id   = $this->pspao_model->get_pspao_ppd_id($id); // get ppd id

       $path = 'pspao_awal/ulasan_ppd_pspao/'.$id;

       $this->function_model->insert_notifikasi(11,1,$sessionarray['user_id'],$pspao_awal_ppd_id,$path); //insert notifikasi
      
       /******** end **********/

         /*****hantar notifikasi kepada ppd utk create pspao akhir*****/
          $pspao_awal_ppd_id   = $this->pspao_model->get_pspao_ppd_id($id); // get ppd id

       $path3 = 'pspao_awal/ulasan_ppd_pspao/'.$id;

       $this->function_model->insert_notifikasi(9,1,$sessionarray['user_id'],$pspao_awal_ppd_id,$path3); //insert notifikasi
      
       /******** end **********/

       /*****hantar notifikasi kepada ptf yg pspao dah diluluskan*****/

       $pspao_awal_ptf_id   = $this->pspao_model->get_pspao_ptf_id($id); // get ppd id

       $path2 = 'pspao_awal/ulasan_ptf_sah_pspao/'.$id;

       $this->function_model->insert_notifikasi(11,1,$sessionarray['user_id'],$pspao_awal_ptf_id,$path2); //insert notifikasi

       /******** end **********/

        /*****hantar notifikasi kepada ketua jabatan/agensi dalam kementerian sama utk pnyediaan pelan*****/

        $kjabatan_agensi_id = $this->pspao_model->get_ketua_jab_agensi_id($sessionarray['user_kemid']); //get ketua jabatan/agensi id
        //print_r($kjabatan_agensi_id);

        $count_row = count($kjabatan_agensi_id); //count array data
        //echo $count_row;

        //for($i=0;$i<$count_row;$i++){
        foreach($kjabatan_agensi_id as $row){

         $path4 = 'pspao/arahan_sedia_pspao_akhir';

         $this->function_model->insert_notifikasi(23,1,$sessionarray['user_id'],$row->myspata_userid,$path4); //insert notifikasi
 
        }
    

       /******** end **********/



       redirect(site_url('pspao_awal/senarai_pspao_baru'));

       }else if($this->input->post('betul') =='betul' ){

         //$update = $this->pspao_model->update_pspao_awal_edit($id); 

         if($update){

         $idstatuslog = $this->pspao_model->insert_status_log_ulasan($id,3);

         }

        /*****hantar notifikasi kepada ppd yg pspao perlu di betulkan*****/

       $pspao_awal_ppd_id   = $this->pspao_model->get_pspao_ppd_id($id); // get ppd id

       $path = 'pspao_awal/ulasan_ppd_pspao/'.$id;

       $this->function_model->insert_notifikasi(14,1,$sessionarray['user_id'],$pspao_awal_ppd_id,$path); //insert notifikasi

       /******** end **********/

       /*****hantar notifikasi kepada ptf yg pspao perlu di betulkan just inform*****/

       $pspao_awal_ptf_id   = $this->pspao_model->get_pspao_ptf_id($id); // get ppd id

       $path2 = 'pspao_awal/ulasan_ptf_sah_pspao/'.$id;

       $this->function_model->insert_notifikasi(13,1,$sessionarray['user_id'],$pspao_awal_ptf_id,$path2); //insert notifikasi

       /******** end **********/


       redirect(site_url('pspao_awal/senarai_pspao_baru'));


       }else{
                      
        $this->load->view('template/default', $data);
	     }
                //}
                
		
	}
        
        //desc : pspao ulasan peng. pgawal sah
        
        
        function ulasan_ptf_sah_pspao($id)
	{
		
		
		$node_id = '13';
		$menu_name = 'menu1';
		$menu_link = 'pspao/ulasan_ptf_sah_pspao';

    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);  

    $sessionarray = $this->session->all_userdata(); 
                
    $data['year_list'] =year_dropdown(); //get year list from function_helper

    $data['kementerian'] = $this->pspao_model->get_kem_name($id); 

    $data['tahun_mula'] = $this->pspao_model->get_tahun_mula($id); 


    $data['tahun_akhir'] = $this->pspao_model->get_tahun_akhir($id);

    $data['pspaodata'] = $this->pspao_model->get_pspao_detail($id);

      /*$this->form_validation->set_rules('tempoh_mula', 'Tahun Mula', 'required');
      $this->form_validation->set_rules('tempoh_akhir', 'Tahun Akhir', 'required');
      $this->form_validation->set_rules('kand_visi', 'Visi', 'required');
      $this->form_validation->set_rules('kand_misi', 'Misi', 'required');
      $this->form_validation->set_rules('kand_objektif', 'Objektif', 'required');
      $this->form_validation->set_rules('kand_pendahuluan', 'Pendahuluan', 'required');
      */



  if($this->input->post('sah') =='sah' ){


   $update = $this->pspao_model->update_pspao_awal_edit($id); 

    $this->pspao_model->update_pspao_date_sah($id);

   if($update){

   $idstatuslog = $this->pspao_model->insert_status_log_ulasan($id,4);

     }

      /*****hantar notifikasi kepada ppd yg pspao dh disahkan*****/

       $pspao_awal_ppd_id   = $this->pspao_model->get_pspao_ppd_id($id); // get ppd id

       $path = 'pspao_awal/ulasan_ppd_pspao/'.$id;

       $this->function_model->insert_notifikasi(5,1,$sessionarray['user_id'],$pspao_awal_ppd_id,$path); //insert notifikasi

       /******** end **********/

        /*****hantar notifikasi kepada pp yg pspao perlu diluluskan*****/

       $pspao_awal_pp_id   = $this->pspao_model->get_pspao_pp_id($id); // get pp id

       $path2 = 'pspao_awal/ulasan_pp_lulus_pspao/'.$id;

       $this->function_model->insert_notifikasi(8,1,$sessionarray['user_id'],$pspao_awal_pp_id,$path2); //insert notifikasi

       /******** end **********/

      redirect(site_url('pspao_awal/senarai_pspao_baru'));

}else if($this->input->post('betul') =='betul'){

   //$update = $this->pspao_model->update_pspao_awal_edit($id);

  //if($update){

        $idstatuslog = $this->pspao_model->insert_status_log_ulasan($id,3);

   //  } 

      /*****hantar notifikasi kepada pp yg pspao perlu dibetulkn just inform*****/

       $pspao_awal_pp_id   = $this->pspao_model->get_pspao_pp_id($id); // get pp id

       $path = 'pspao_awal/ulasan_pp_lulus_pspao/'.$id;

       $this->function_model->insert_notifikasi(7,1,$sessionarray['user_id'],$pspao_awal_pp_id,$path); //insert notifikasi

       /******** end **********/


     /****** hantar notifikasi kpd ppd ada pspao perlu dibetulkan ******/

      $pspao_awal_ppd_id   = $this->pspao_model->get_pspao_ppd_id($id); // get ppd id

       $path2 = 'pspao_awal/ulasan_ppd_pspao/'.$id;

       $this->function_model->insert_notifikasi(7,1,$sessionarray['user_id'],$pspao_awal_ppd_id,$path2); //insert notifikasi

      /******* end ********/


      redirect(site_url('pspao_awal/senarai_pspao_baru'));

}else{
          $this->load->view('template/default', $data);
	}	


	}
      
	   //desc : pspao ulasan peng. penyedia dokumen
        
        
        function ulasan_ppd_pspao($pspaoid)
	{
		
		
            		$node_id = '13';
            		$menu_name = 'menu1';
            		$menu_link = 'pspao/ulasan_ppd_pspao';
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);   
                
                $data['year_list'] =year_dropdown(); //get year list from function_helper
                $data['kementerian'] = $this->pspao_model->get_kem_name($pspaoid); 
                $data['tahun_mula'] = $this->pspao_model->get_tahun_mula($pspaoid);
                $data['tahun_akhir'] = $this->pspao_model->get_tahun_akhir($pspaoid);

                $data['pspaodata'] = $this->pspao_model->get_pspao_detail($pspaoid);

                $data['status_pspao'] = $this->pspao_model->get_latest_status_pspao($pspaoid);
                
                /*$this->form_validation->set_rules('kand_detail', 'Visi', 'required');
                $this->form_validation->set_rules('kand_misi', 'Misi', 'required');
                $this->form_validation->set_rules('kand_objektif', 'Objektif', 'required');
                $this->form_validation->set_rules('kand_pendahuluan', 'Pendahuluan', 'required');
      
                 
               
                if ($this->form_validation->run() == FALSE){
                      
                   $this->load->view('template/default',$data); 
                   
	
                }
                else
                {*/

                  // echo "<script>alert('Berjaya!')< /script>";

                  if($this->input->post('hantar') =='hantar'){


                    $idpspao = $this->pspao_model->update_pspao_awal_edit($pspaoid); 

                    if($idpspao){

                     $idstatuslog = $this->pspao_model->insert_status_log($pspaoid,2);

                    }

                    /****** hantar notifikasi kpd ptf ada pspao perlu disahkan ******/

                    $pspao_awal_ptf_id   = $this->pspao_model->get_pspao_ptf_id($pspaoid); // get ppd id

                     $path = 'pspao_awal/ulasan_ptf_sah_pspao/'.$pspaoid;

                     $this->function_model->insert_notifikasi(4,1,$sessionarray['user_id'],$pspao_awal_ptf_id,$path); //insert notifikasi

                    /******* end ********/


                    redirect(site_url('pspao_awal/senarai_pspao_baru'));

                  }else if($this->input->post('simpan') =='simpan'){

                     $idpspao = $this->pspao_model->update_pspao_awal_edit($pspaoid); 

                      if($idpspao){

                      $idstatuslog = $this->pspao_model->insert_status_log($pspaoid,1);

                       }

                    redirect(site_url('pspao_awal/senarai_pspao_baru'));


                  }else{

                    $this->load->view('template/default',$data); 
                    
                  }

                   //redirect(site_url('pspao_awal/senarai_pspao_baru'));	    
                      
                //}
            
		
	}
     
	    
        
	//desc : senarai pspao peng. pgawal
        
        function senarai_pp_pspao()
	{

		
		$node_id = '30';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_pp_pspao';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $data['year_list'] =year_dropdown();  //get year list from function_helper


    if(isset($_POST["carian"])) {  //function when user click button carian 

         


    }else{
      
     if($getpplist= $this->pspao_model->get_senarai_pp_pspao())
    {
       $data['result'] = $getpplist;
    }
          
     }           /*
                
                //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ) 
                           
                 );
                 
                 
                 $this->form_validation->set_rules($rules);
                
                 if ($this->form_validation->run() == FALSE)
                {
                  */          
		  
                   $this->load->view('template/default', $data);

               /* }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }
              */
		
             }
			 
			
			 
        
        //desc : senarai pspao baru
        
        function senarai_pspao_baru()
	{

		
		$node_id = '31';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_pspao_baru';
              
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
                
    $data['year_list'] =year_dropdown();  //get year list from function_helper

   $sessionarray = $this->session->all_userdata();
   $kump_pengguna_id = $sessionarray['user_rolegroupid'];

   $data['pspao_awal_id']   = $this->pspao_model->get_pspaoawalid();

    if($getptflist= $this->pspao_model->get_senarai_pspao())
    {
       $data['result'] = $getptflist;
    }
 
       /*
                //form validation
                 $rules = array(
                            array(
                                  'field'   => 'tarikh_mula',
                                  'label'   => 'Tarikh Mula',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'tarikh_akhir',
                                  'label'   => 'Tarikh Akhir',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ), 
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ) 
                           
                 );
                 
                 
                  $this->form_validation->set_rules($rules);
                
                  if ($this->form_validation->run() == FALSE)
                {
                 */ 
                   $this->load->view('template/default', $data);

               /* }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }
*/
		
        }

   




       //desc : senarai pspao ppd
        
      /*  function senarai_ppd_pspao()
	{

    $node_id = '42';
		$menu_name = 'menu1';
		$menu_link = 'pspao/senarai_ppd_pspao';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
                
    $data['year_list'] =year_dropdown();  //get year list from function_helper
      
    $data['year_list'] =year_dropdown();  //get year list from function_helper

    if($getppdlist= $this->pspao_model->get_senarai_ppd_pspao())
    {
       $data['result'] = $getppdlist;
    }            
                
               
                $this->load->view('template/default', $data);
        }  
        */
        
}

?>
