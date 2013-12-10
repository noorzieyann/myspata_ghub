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
       $this->db->order_by('tarikh_dihantar','DESC');

       $data = array();

       $query = $this->db->get();

       

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

    
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
       $this->db->order_by('tarikh_dihantar','DESC');
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
       $this->db->order_by('tarikh_dihantar','DESC');
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
        $this->db->order_by('tarikh_dihantar','DESC');
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
       $this->db->order_by('tarikh_dihantar','DESC');
       $query = $this->db->get();

       if ($query->num_rows() > 0) {
       foreach ($query->result() as $row) {
        $data1[] = $row;
        }
      }


   }

   
    
     return $data1;
     
     }


    function get_title_notifikasi($senarai_notifikasi_id){

      $this->db->select('notifikasi_tajuk');
      $this->db->from('lkp_senarai_notifikasi');
      $this->db->where('senarai_notifikasi_id',$senarai_notifikasi_id);
      $query = $this->db->get();
  
      $row = $query->row();
  
      return $row->notifikasi_tajuk;
  

    }

    //edit by harry, 28102013, to combine remarks and notifikasi tajuk
 
   function get_remarks($notifikasi_id){

	 $this->db->select('remarks');
      $this->db->from('tbl_notifikasi');
      $this->db->where('notifikasi_id',$notifikasi_id);
      $query = $this->db->get();
  
      $row = $query->row();
  
      return $row->remarks;
  


    } 

   function  update_status_notifikasi(){

     $data = array(
    
     'status' => 1,
     'tarikh_dibaca' => date('Y-m-d H:i:s')
       );

    $this->db->where('notifikasi_id', $this->uri->segment(3));
    $this->db->update('tbl_notifikasi', $data);

   }

   //fatin 18/10/13
   function get_sender($myspata_userid)
    {
        $this->db->where('myspata_userid', $myspata_userid);
        $get_sender1 = $this->db->get('tbl_myspata_user');
        
        return $get_sender1->result();
    }
    

//yan 2110
    function get_notifikasi_takwin($myspata_userid_to)
   {
         
   
       $this->db->select('*');
       //$this->db->where('status',0);
       $this->db->where('myspata_userid_to',$myspata_userid_to);
       $this->db->from('tbl_takwim_notifikasi');
       //$this->db->join('tbl_takwim_aktvt','tbl_takwim_notifikasi.takwim_aktvt_id = tbl_takwim_aktvt.takwim_aktvt_id');
      // $this->db->order_by('takwin_tarikh','DESC');

       $query = $this->db->get();
        
         $row = $query->result();
  
      return $row;

      
    
   } 
}

?>
