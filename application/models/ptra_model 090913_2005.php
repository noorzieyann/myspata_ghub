<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Ptra_model extends CI_Model {
    
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

   function get_mukim()  //dapatkan list mukim
 {
   $this->db->select('idmukim, nama_mukim');
   $this->db->order_by("nama_mukim", "ASC");
   $query = $this->db->get('lkp_mukim');
  

   $mukim = array();
  
   
   if($query->result())
   {
       
          $mukim[''] = '- Pilih Mukim -';    // default selection item
          foreach ($query->result() as $muk) 
           {
              $mukim[$muk->idmukim] = $muk->nama_mukim;
              
           }
      return $mukim;
     
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

   function get_negara()  //dapatkan list negara
 {
   $this->db->select('idnegara, fld_negara');
   $this->db->order_by("fld_negara", "ASC");
   $query = $this->db->get('lkp_negara');
  

   $negara = array();
  
   
   if($query->result())
   {
       
          $negara[''] = '- Pilih Negara -';    // default selection item
          foreach ($query->result() as $nega) 
           {
              $negara[$nega->idnegara] = $nega->fld_negara;
              
           }
      return $negara;
     
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

   function get_peranan()  //dapatkan list peranan pengguna
 {
   $this->db->select('user_matrix_id, role_pengguna');
   $this->db->group_by("role_pengguna_id", "ASC");
   $this->db->order_by("role_pengguna", "ASC");
   $query = $this->db->get('tbl_user_matrix');
  

   $role = array();
  
   
   if($query->result())
   {
       
      $role[''] = '- Pilih Peranan Pengguna -';    // default selection item
      foreach ($query->result() as $rol) 
        {
          $role[$rol->user_matrix_id] = $rol->role_pengguna;
              
        }
      return $role;
     
    }
   }

   function get_modul()  //dapatkan list modul pengguna
 {
   $this->db->select('modul_id, nama_modul');
   $this->db->order_by("nama_modul", "ASC");
   $query = $this->db->get('lkp_modul');
  

   $modul = array();
  
   
   if($query->result())
   {
       
      $modul[''] = '- Pilih Modul -';    // default selection item
      foreach ($query->result() as $mod) 
        {
          $modul[$mod->modul_id] = $mod->nama_modul;
              
        }
      return $modul;
     
    }
   }  
    
}
?>