<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pentadbir_model extends CI_Model {
    
function get_kementerian()  //dapatkan list kementerian
 {
   $getKem = $this->db->get('lkp_kementerian');
        
        return $getKem->result();
    }   

function get_namakem($idkem)
    {
        $this->db->select('namakem');
        $this->db->where('idkem', $idkem);
        $get_namakem = $this->db->get('lkp_kementerian');
        
        return $get_namakem->result();
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
   $getNegeri = $this->db->get('lkp_negeri');
        
        return $getNegeri->result();
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
   
   function daftar_pengguna()
    {
       date_default_timezone_set('Asia/Kuala_Lumpur');
       
              $data = array('myspata_userid' => $this->input->post('myspata_userid'),
                            'nama_user' => $this->input->post('nama_user1'),
                            'uname' => $this->input->post('uname1'),
                            'nric' => $this->input->post('uname1'),
                            'no_tel' => $this->input->post('no_tel1'),
                            'idkem' => $this->input->post('idkem1'),
                            'idnegeri' => $this->input->post('idnegeri1'),
                            'alamat_pej' => $this->input->post('alamat_pej1'),
                            'no_tel_pej' => $this->input->post('no_tel_pej1'),
                            'user_email' => $this->input->post('user_email1'),
                            'user_regdate' => date('Y-m-d H:m:s'),
                            'isaktif' => $this->input->post('isaktif')
                            );
        
        $pengguna = $this->db->insert('tbl_myspata_user', $data);
      
        
        if($pengguna)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Pendaftaran Pengguna',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Penetapan Pentadbir');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    
    
    function get_listuser()
    {
        $this->db->order_by("myspata_userid", "DESC");
        $getListuser = $this->db->get('tbl_myspata_user');
        
        return $getListuser->result();
    }
    
    function get_listuser_1($myspata_userid)
    {
        $this->db->where('myspata_userid', $myspata_userid);
        $getListuser1 = $this->db->get('tbl_myspata_user');
        
        return $getListuser1->result();
    }
    
    function get_listperanan()
    {
        $this->db->order_by("kump_pengguna_id", "ASC");
        $getListperanan = $this->db->get('lkp_role_pengguna');
        
        return $getListperanan->result();
    }
    
    function get_kem_1()
    {
        $getKem = $this->db->get('lkp_kementerian');
        return $getKem->result();
    }
    
    function get_negeri_1()
    {
        $getNegeri = $this->db->get('lkp_negeri');
        return $getNegeri->result();
    }
    
}
?>