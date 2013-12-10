<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pentadbir_model extends CI_Model {
	
function __construct(){
  
    parent::__construct();
    date_default_timezone_set('Asia/Kuala_Lumpur');
  
}
	
	
public function ins_user(){
	$n1 = $this->input->post('namapengguna');
	$n2 = $this->input->post('myid');
	$n3 = $this->input->post('notel');
	$n4 = $this->input->post('lvlid');
	$n5 = $this->input->post('jabatan');
	$n6 = $this->input->post('alamat');
	$n7 = $this->input->post('emel');
	$n8 = $this->input->post('nopej');
}

public function senarai_pengguna(){
	
	$sesr = $this->session->all_userdata();
	$sesm = $this->aauth->get_session('menu');
	
	$this->db->select('*');
	$this->db->from('tbl_myspata_user as a');
	$this->db->join('lkp_jab_agensi as b','a.idjab_agensi = b.idjab_agensi','left');
	
	if($sesr['user_level_id'] == 1){
	   $this->db->where('a.level_id','1');
	   $this->db->or_where('a.level_id','2');
	   $this->db->or_where('a.level_id','3');
	   //$this->db->where('');
	}else if($sesr['user_level_id'] == 2 || $sesr['user_level_id'] == 3){
	   $this->db->where('a.level_id','2');
	   $this->db->or_where('a.level_id','3');
	   $this->db->or_where('a.level_id','4');
	}else if($sesr['user_level_id'] == 4){
	   $this->db->where('a.level_id','4');
	   $this->db->or_where('a.level_id','5');
	}else if($sesr['user_level_id'] == 5){
	   $this->db->where('a.level_id','5');
	}
	
	$query = $this->db->get();
      
	return $query->result();
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
   
public function get_status($id){
	$status = 'Tidak Aktif';
	if($id == 1){ $status = 'Aktif';}
	
	return $status;
}
   
 function get_jabatan($idkem = NULL)  //dapatkan list jabatan
 {
   //$this->db->select('idjab_agensi_myspata1, nama_jab_agensi');
   $this->db->order_by('nama_jab_agensi');
   if($idkem != NULL){$this->db->where('idkem',$idkem);}
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
    
}
?>