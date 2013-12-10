<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Laporan_model extends CI_Model {
    
function get_status()  //dapatkan list jabatan
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

    function get_daerah()  //dapatkan list daerah
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

   function get_negeri()  //dapatkan list negeri
 {
   $this->db->select('idnegeri, namanegeri');
   $this->db->order_by("namanegeri", "ASC");
   $query = $this->db->get('lkp_negeri');
  

   $negeri = array();
  
   
   if($query->result())
   {
       
          $negeri[''] = '- Pilih Negeri -';    // default selection item
          foreach ($query->result() as $nege) 
           {
              $negeri[$nege->idnegeri] = $nege->namanegeri;
              
           }
      return $negeri;
     
    }
   }
    
}
?>