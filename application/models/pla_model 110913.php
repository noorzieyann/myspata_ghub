<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pla_model extends CI_Model {
 
function get_status() //dapatkan senarai status
 {
   $this->db->select('status_id, nama_status');
   $this->db->order_by("nama_status", "ASC");
   $query = $this->db->get('lkp_status');
  

   $status = array();
  
   
   if($query->result())
   {
       
          $status[''] = '- Pilih Status -';    // default selection item
          foreach ($query->result() as $sta) 
           {
              $status[$sta->status_id] = $sta->nama_status;
              
           }
      return $status;
     
    }
   }
  
function get_kementerian()  //dapatkan list kementerian
 {
   $this->db->select('idkem, namakem');
   $this->db->order_by("namakem", "ASC");
   $query = $this->db->get('lkp_kementerian');
  
 
   $kementerian = array();
   
   
   
   if($query->result())
   {
       
          $kementerian[''] = '- Pilih Kementerian -';    // default selection item
          foreach ($query->result() as $kem) 
           {
              $kementerian[$kem->idkem] = $kem->namakem;
              
           }
      return $kementerian;
     
    }
   } 
 
   
 function get_jabatan()  //dapatkan list jabatan
 {
   $this->db->select('idjab_agensi_myspata1, nama_jab_agensi');
   $this->db->order_by('nama_jab_agensi', 'ASC');
   $query = $this->db->get('lkp_jab_agensi');
   
   $jabatan = array();
  
   
   if($query->result())
   {
       
          $jabatan[''] = '- Pilih Jabatan/Agensi -';    // default selection item
          foreach ($query->result() as $jab) 
           {
              $jabatan[$jab->idjab_agensi_myspata1] = $jab->nama_jab_agensi;
              
           }
      return $jabatan;
     
    }
   }  
   
   function get_premis()  //dapatkan list jabatan
 {
   $this->db->select('idpremis_kategori, jenis_premis');
   $this->db->order_by("jenis_premis", "ASC");
   $query = $this->db->get('lkp_premis_kategori');
  

   $premis = array();
  
   
   if($query->result())
   {
       
          $premis[''] = '- Pilih Premis -';    // default selection item
          foreach ($query->result() as $prem) 
           {
              $premis[$prem->idpremis_kategori] = $prem->jenis_premis;
              
           }
      return $premis;
     
    }
   }   

   function get_objek_sebagai()  //dapatkan list objek sebagai
 {
   $this->db->select('objek_sebagai_id, objek_sebagai_kod');
   $this->db->order_by("objek_sebagai_kod", "ASC");
   $query = $this->db->get('lkp_objek_sebagai');
  

   $objek = array();
  
   
   if($query->result())
   {
       
      $objek[''] = '- Pilih Objek Sebagai -';    // default selection item
      foreach ($query->result() as $obj) 
        {
          $objek[$obj->objek_sebagai_id] = $obj->objek_sebagai_kod;
              
        }
      return $objek;
     
    }
   }    
   

   
   
   function get_negeri()  //dapatkan list jabatan
 {
   $this->db->select('idnegeri, namanegeri');
   $this->db->order_by("namanegeri", "ASC");
   $query = $this->db->get('lkp_negeri');
  

   $negeri = array();
  
   
   if($query->result())
   {
       
          $negeri[''] = '- Pilih Negeri -';    // default selection item
          foreach ($query->result() as $neg) 
           {
              $negeri[$neg->idnegeri] = $neg->namanegeri;
              
           }
      return $negeri;
     
    }
   }   
   
   function get_daerah()  //dapatkan list jabatan
 {
   $this->db->select('iddaerah, nama_daerah');
   $this->db->order_by("nama_daerah", "ASC");
   $query = $this->db->get('lkp_daerah');
  

   $daerah = array();
  
   
   if($query->result())
   {
       
          $daerah[''] = '- Pilih Daerah -';    // default selection item
          foreach ($query->result() as $dae) 
           {
              $daerah[$dae->iddaerah] = $dae->nama_daerah;
              
           }
      return $daerah;
     
    }
   }   
 
   function get_kat_premis_aset()  //dapatkan list kategori aset
 {
   $this->db->select('idpremis_kategori, jenis_premis');
   $this->db->order_by("jenis_premis", "ASC");
   $query = $this->db->get('lkp_premis_kategori');
  

   $katprem = array();
  
   
   if($query->result())
   {
       
      $katprem[''] = '- Pilih Kategori Premis Aset -';    // default selection item
      foreach ($query->result() as $kpr) 
        {
          $katprem[$kpr->idpremis_kategori] = $kpr->jenis_premis;
              
        }
      return $katprem;
     
    }
   }
   
   function get_kat_peng_pej()  //dapatkan list jabatan
 {
   $this->db->select('kat_alat_pej_id, alat_pej');
   $this->db->order_by("alat_pej", "ASC");
   $query = $this->db->get('lkp_kat_alat_pej');
  

   $alatpejabat = array();
  
   
   if($query->result())
   {
       
          $alatpejabat[''] = '- Pilih Alat Pengurusan Pejabat -';    // default selection item
          foreach ($query->result() as $alatpej) 
           {
              $alatpejabat[$alatpej->kat_alat_pej_id] = $alatpej->alat_pej;
              
           }
      return $alatpejabat;
     
    }
   }   
 
   function get_kat_alat_keje()  //dapatkan list jabatan
 {
   $this->db->select('kat_alat_keje_id, alat_keje');
   $this->db->order_by("alat_keje", "ASC");
   $query = $this->db->get('lkp_kat_alat_keje');
  

   $alatkeje = array();
  
   
   if($query->result())
   {
       
          $alatkeje[''] = '- Pilih Peralatan Kerja -';    // default selection item
          foreach ($query->result() as $alatkej) 
           {
              $alatkeje[$alatkej->kat_alat_keje_id] = $alatkej->alat_keje;
              
           }
      return $alatkeje;
     
    }
   }   
   
    
}
?>
