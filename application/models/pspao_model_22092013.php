<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pspao_model extends CI_Model {

function __construct(){
	
    parent::__construct();
    date_default_timezone_set('Asia/Kuala_Lumpur');
	
}

function get_kementerian_name($user_kemid){

         $this->db->select('namakem');
        $this->db->where('idkem', $user_kemid);
        $get_namakem = $this->db->get('lkp_kementerian');
        
        return $get_namakem->result();

}
   
  function get_jabatan_name($user_jabid){


        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $user_jabid);
        $get_namakem = $this->db->get('lkp_jab_agensi');
        
        return $get_namakem->result();


  }

  function tambahpspaotahun($user_kemid)

  {

   $data = array('tahun_mula' => $this->input->post('tempoh_mula'),
                 'tahun_akhir' => $this->input->post('tempoh_akhir'),
                 'idkem' => $user_kemid
                );
        
      $tempoh = $this->db->insert('tbl_pspao_awal', $data);
      $lastid = $this->db->insert_id();

      
           
      return $lastid;
    
        

  }
    
   
   function get_ppd($user_kemid)  //dapatkan ppd kementerian
 {

       $this->db->select('tbl_myspata_user_to_matrix.*,tbl_myspata_user.*');
       $this->db->where('tbl_myspata_user.idkem',$user_kemid);
       $this->db->where('tbl_myspata_user_to_matrix.kump_pengguna_id',8);
       $this->db->from('tbl_myspata_user');
       $this->db->join('tbl_myspata_user_to_matrix', 'tbl_myspata_user_to_matrix.myspata_userid = tbl_myspata_user.myspata_userid', 'inner'); 
       $this->db->order_by('tbl_myspata_user.nama_user', 'ASC');
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

       
    
   
   } 
  
function get_detail_user($userid)  //dapatkan ppd kementerian
 {

       $this->db->select('*');
       $this->db->where('myspata_userid ',$userid);
       $this->db->from('tbl_myspata_user');
      $query = $this->db->get();

       $data = array();


      if ($query->result())
     {
   foreach ($query->result() as $row)
   {
      $data[] = $row;
      
   }
}

    
       return $data;

       
    
   
   } 



   
  function updatepspaoawal($userid,$lastid,$jabagensi,$idnegeri){

    $data = array(
              'idjab_agensi' => $jabagensi,
               'idnegeri' => $idnegeri,
               'pspa_sedia_oleh_id' => $userid,
               'pspa_tarikh_sedia' => date('Y-m-d H:i:s')
            );

  $this->db->where('pspa_awal_id', $lastid);
  $data = $this->db->update('tbl_pspao_awal', $data); 

  return $data;



  }



  function getuserdetail($userid){

        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $user_jabid);
        $get_namakem = $this->db->get('lkp_jab_agensi');
        
        return $get_namakem->result();

  }

   
   
   function get_notifikasi()
   {
       
        $data_1 =   array(
                        array('1','PSPAO000001 perlu pengesahan dari anda','23/07/2005'),
                        array('2','PPUNO000002 perlu  pengesahan dari anda','01/07/2013'),
                        array('3','PSPAO000003 perlu kelulusan dari anda','22/05/2005'),
                        array('4','PSPAO000004 perlu pengesahan dari anda','23/07/2005'),
                        array('5','PSPAO000005 perlu pengesahan dari anda','23/07/2005'),
                        array('6','PSPAO000006 perlu pengesahan dari anda','23/07/2005'),
                        array('7','PSPAO000007 perlu pengesahan dari anda','23/07/2005'),
                        array('8','PSPAO000008 perlu pengesahan dari anda','23/07/2005'),
                        array('9','PSPAO000009 perlu pengesahan dari anda','01/06/2010'),
                        array('10','PSPAO000010 perlu pengesahan dari anda','23/07/2012'),
                        array('11','PSPAO000011 perlu pengesahan dari anda','23/07/2013'),
                        array('12','PSPAO000012 perlu pengesahan dari anda','23/07/2013'),
                        array('13','PSPAO000013 perlu pengesahan dari anda','23/07/2005'),
                        array('14','PSPAO000014 perlu pengesahan dari anda','20/5/2005'),
                        array('15','PSPAO000015 perlu pengesahan dari anda','23/07/2005'),
                
                
                
                       );
                   
           return $data_1;
       
   }
   
   
   
   function get_senarai_pp_pspao()
   {
      $this->db->select('*');
      // $this->db->where('status',0);
      // $this->db->where('myspata_userid_to',$session_id);
       $this->db->from('tbl_pspao');
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data; 
   }
   
   
   function get_senarai_ptf_pspao()
   {
        

       $this->db->select('*');
      // $this->db->where('status',0);
      // $this->db->where('myspata_userid_to',$session_id);
       $this->db->from('tbl_pspao');
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

    
   }
   
      
        function get_nama_pemilik_doc($userid){

        $this->db->select('*');
       $this->db->where('myspata_userid',$userid);
       $this->db->from('tbl_myspata_user');
       $query = $this->db->get();

       $userdata = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $userdata[] = $row;
       }

       return $userdata;



        }

   
   function get_senarai_ppd_pspao()
   {
        $this->db->select('*');
      // $this->db->where('status',0);
      // $this->db->where('myspata_userid_to',$session_id);
       $this->db->from('tbl_pspao');
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

         
   }
  
  
  
   function get_senarai_pspao_baru()
   {
       
         
            $data_1 =   array(
                        array('1','2000','2005','Mohd Kamal Bin Ibrahim (Pegawai Teknikal Fasiliti)','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"> <a href="'.site_url('pspao_awal/ulasan_pp_lulus_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('2','2003','2007','Mohd Qahar Bin Sharudin (Pegawai Teknikal Fasiliti)','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ptf_sah_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                      '),
                        array('3','2004','2009','Mohd Tobib Bin Mastiki (Pegawai Teknikal Fasiliti)','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('4','2006','2011','Ahmad Tarqim Bin Mansur (Pegawai Teknikal Fasiliti)','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('5','2008','2013','Nurul Atikah Binti Yusof','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('6','2010','2015','Mohd Qahar Bin Sharudin (Pegawai Teknikal Fasiliti)','<span class="badge ">Deraf</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('7','2016','2021','Mohd Qahar Bin Sharudin (Pegawai Teknikal Fasiliti)','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('8','2018','2023','Ahmad Tarqim Bin Mansur (Pegawai Teknikal Fasiliti)','<span class="badge ">Deraf</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('9','2015','2020','Nurul Atikah Binti Yusof','<span class="badge ">Deraf</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('10','2017','2022','Nurul Atikah Binti Yusof','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('11','2013','2018','Mohd Qahar Bin Sharudin (Pegawai Teknikal Fasiliti)','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('12','2019','2024','Mohd Qahar Bin Sharudin (Pegawai Teknikal Fasiliti)','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('13','2021','2026','Mohd Qahar Bin Sharudin (Pegawai Teknikal Fasiliti)','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('14','2022','2027','Mohd Qahar Bin Sharudin (Pegawai Teknikal Fasiliti)','<span class="badge ">Deraf</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                        array('15','2023','2028','Ahmad Tarqim Bin Mansur (Pegawai Teknikal Fasiliti)','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="'.site_url('pspao_awal/ulasan_ppd_pspao').'"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a></ul>
                     '),
                
                
                
                       );
            
            return $data_1;
   }
  
    
}

?>
