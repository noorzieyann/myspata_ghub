<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Function_model extends CI_Model {

 
  function get_status_pelan($pspaid,$rekodplanid,$kumpkandid){

   //if((!empty($pspaid))&&(!empty($kump_land))){


       $this->db->select('tbl_statuslog.*,lkp_status.*');
       $this->db->where('tbl_statuslog.pspa_id',$pspaid);
       $this->db->where('tbl_statuslog.rekod_pelan_id',$rekodplanid);
       $this->db->where('tbl_statuslog.kump_kand_id',$kumpkandid);


       $this->db->from('tbl_statuslog');
       $this->db->join('lkp_status', 'tbl_statuslog.status_id = lkp_status.status_id', 'inner'); 
      $this->db->order_by('tbl_statuslog.statuslog_id', 'DESC');
       $this->db->limit("1");
       $query = $this->db->get();

          if($query->result()){

             $row = $query->row();

          }
          
       return $row->nama_status;

      
    }



    function insert_notifikasi($senarai_notifikasi_id,$kump_kand_id,$userid_from,$userid_to,$path){

     
    $data = array(
    
    'kump_kand_id' => $kump_kand_id,
    'senarai_notifikasi_id' => $senarai_notifikasi_id,
    'myspata_userid_from' => $userid_from,
    'tarikh_dihantar' => date('Y-m-d H:i:s'),
    'myspata_userid_to' => $userid_to,
    'tarikh_dibaca' => '0000-00-00 00:00:00',
    'status' => 0,
    'notifikasi_url' =>$path ,

    );
   
    $this->db->insert('tbl_notifikasi', $data);


    }

   function check_status_log($pspaid,$kump_kand_id,$rekod_pelan_id){

  $this->db->select('status_id');
   $this->db->from('tbl_statuslog');
   $this->db->where('pspa_id',$pspaid);
   $this->db->where('kump_kand_id',$kump_kand_id);
   $this->db->where('rekod_pelan_id',$rekod_pelan_id);
   $this->db->order_by('statuslog_id', 'DESC');

   $query = $this->db->get();

   $row = $query->row();

   return $row->status_id;

  }

}

?>
