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
       $this->db->order_by('tbl_statuslog.status_tarikh', 'DESC');
       $query = $this->db->get();

          if($query->result()){

             $row = $query->row();

          }
          
       return $row->nama_status;

       /*$data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }
      */
    /*}elseif((!empty($pspaid))&&(!empty($pelanid))){

       
       $this->db->select('tbl_statuslog.*,lkp_status.*');
       $this->db->where('tbl_statuslog.pspa_id',$pspaid);
       $this->db->where('tbl_statuslog.pelan_id',$pelanid);
       $this->db->from('tbl_statuslog');
       $this->db->join('lkp_status', 'tbl_statuslog.status_id = lkp_status.status_id', 'inner'); 
       $this->db->order_by('tbl_statuslog.status_tarikh', 'DESC');
       $query = $this->db->get();

       $row = $query->row();

       return $row->nama_status;

       
       }
        
    }
    */
    }
}

?>
