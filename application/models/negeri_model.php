<?php
class Negeri_model extends CI_Model {
    
function get_negeri(){
      $this->db->select('idnegeri, namanegeri');
      $query = $this->db->get('lkp_negeri');
 
      $countries = array();
 
      if($query->result()){
          foreach ($query->result() as $country) {
              $countries[$country->idnegeri] = $country->namanegeri;
          }
      return $countries;
      }
      else{
      return FALSE;
      }
}
}

?>
