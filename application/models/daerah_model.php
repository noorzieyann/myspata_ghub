<?php
class Daerah_model extends CI_Model 

{
function get_daerah($country = null){
      $this->db->select('iddaerah, nama_daerah');
 
      if($country != NULL){
          $this->db->where('idnegeri', $country);
      }
 
      $query = $this->db->get('lkp_daerah');
 
      $cities = array();
 
      if($query->result()){
          foreach ($query->result() as $city) {
              $cities[$city->iddaerah] = $city->nama_daerah;
          }
      return $cities;
      }else{
          return FALSE;
      }
}
}
?>