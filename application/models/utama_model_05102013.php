<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Utama_model extends CI_Model {

 
     function get_notifikasi($session_id)
   {
         
   

       $this->db->select('*');
       $this->db->where('status',0);
       $this->db->where('myspata_userid_to',$session_id);
       $this->db->from('tbl_notifikasi');

       $data = array();

       $query = $this->db->get();

       

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

    
   }
   
   function get_title_notifikasi($senarai_notifikasi_id){

      $this->db->select('notifikasi_tajuk');
      $this->db->from('lkp_senarai_notifikasi');
      $this->db->where('senarai_notifikasi_id',$senarai_notifikasi_id);
      $query = $this->db->get();
  
      $row = $query->row();
  
      return $row->notifikasi_tajuk;
  

    }

   
   function get_notif_numrow($session_id){
       $this->db->select('*');
       $this->db->where('status',0);
       $this->db->where('myspata_userid_to',$session_id);
       $this->db->from('tbl_notifikasi');
       $query = $this->db->get();
       
       return $query->num_rows();
   }

  function get_kump_kand($kump_kand_id)
   {
      
       $this->db->select('*');
       $this->db->where('kump_kand_id',$kump_kand_id);
       $this->db->from('lkp_kump_kand');
       $query = $this->db->get();

       $kump_kand = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $kump_kand[] = $row;
       }

       return $kump_kand;

   }


   function get_all_notification($session_id){

        $this->db->select('*');
        $this->db->where('myspata_userid_to',$session_id);
       $this->db->from('tbl_notifikasi');
       $query = $this->db->get();
         $data1 = array();

        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
        $data1[] = $row;
         }
         }

         return $data1;

}

    function get_keseluruhan_notifikasi($tarikh_mula=null,$tarikh_akhir=null,$katacarian=null,$session_id)
   {
 $data1 = array();


     
    if(((!empty($tarikh_mula)) && (!empty($tarikh_akhir))) && (!empty($katacarian))){


       
       $this->db->select('*');
        $this->db->where('myspata_userid_to',$session_id);
        $this->db->where('tarikh_dihantar BETWEEN "'. date('Y-m-d', strtotime($tarikh_mula)).
       '" and "'. date('Y-m-d', strtotime($tarikh_akhir)).'" AND perkara LIKE "%'.$katacarian.'%"');
      
       $this->db->from('tbl_notifikasi');
       $query = $this->db->get();
      

   if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        $data1[] = $row;
       }
    }


    }
    elseif((!empty($tarikh_mula)) && (!empty($tarikh_akhir))){

        $this->db->select('*');
        $this->db->where('myspata_userid_to',$session_id);
        $this->db->where('tarikh_dihantar BETWEEN "'. date('Y-m-d', strtotime($tarikh_mula)).
       '" AND "'. date('Y-m-d', strtotime($tarikh_akhir)).'"');
      
       $this->db->from('tbl_notifikasi');
       $query = $this->db->get();
      

       if ($query->num_rows() > 0) {
       foreach ($query->result() as $row) {
        $data1[] = $row;
        }
      }



    }
   else
   {

      $this->db->select('*');
        $this->db->where('myspata_userid_to',$session_id);
       $this->db->where('perkara LIKE "%'.$katacarian.'%"');
      
       $this->db->from('tbl_notifikasi');
       $query = $this->db->get();

       if ($query->num_rows() > 0) {
       foreach ($query->result() as $row) {
        $data1[] = $row;
        }
      }


   }

   
    
     return $data1;
     
     }
      
    
}

?>
