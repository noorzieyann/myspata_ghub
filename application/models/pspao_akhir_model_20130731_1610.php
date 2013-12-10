<?php

class Pspao_akhir_model extends CI_Model {
    
  
public function get_kementerian(){
	$this->db->select('idkem, namakem');
	$this->db->order_by("namakem", "ASC");
	$query = $this->db->get('lkp_kementerian');
	$kementerian = array();
	
	if($query->result()){
    	$kementerian[''] = '- Pilih Kementerian -';
		foreach ($query->result() as $kem){
        	$kementerian[$kem->idkem] = $kem->namakem;
		}
		return $kementerian;
	}
} 
 
public function get_jabatan(){
	$this->db->select('idjab_agensi_myspata1, nama_jab_agensi');
	$this->db->order_by("nama_jab_agensi", "ASC");
	$query = $this->db->get('lkp_jab_agensi');
	$jabatan = array();
	
	if($query->result()){
    	$jabatan[''] = '- Pilih Kementerian -';
		foreach ($query->result() as $jab){
        	$jabatan[$jab->idjab_agensi_myspata1] = $jab->nama_jab_agensi;
		}
		return $jabatan;
	}
} 

public function get_status(){
   	$this->db->select('status_id, nama_status');
   	$this->db->order_by("nama_status", "ASC");
   	$query = $this->db->get('lkp_status');
	$status = array();
	
	if($query->result()){
		$status[''] = '- Pilih Status -';
        foreach ($query->result() as $sta){
        	$status[$sta->status_id] = $sta->nama_status;
        }
      	return $status;
	}
}   

public function get_data_dummy(){
	
	$data_1 =   array(
					array('1','PSPAO000001','2013','Kementerian','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  	array('2','PSPAO000002','2013','Jabatan','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('3','PSPAO000003','2013','Jabatan','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('4','PSPAO000004','2013','Kementerian','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('5','PSPAO000005','2013','Agensi','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('6','PSPAO000006','2013','Agensi','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('7','PSPAO000007','2013','Kementerian','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('8','PSPAO000008','2013','Kementerian','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('9','PSPAO000009','2013','Jabatan','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('10','PSPAO000010','2013','Jabatan','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('11','PSPAO000011','2013','Jabatan','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('12','PSPAO000012','2013','Agensi','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('13','PSPAO000013','2013','Agensi','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('14','PSPAO000014','2013','Kementerian','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('15','PSPAO000015','2013','Jabatan','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('16','PSPAO000016','2013','Agensi','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('17','PSPAO000017','2013','Jabatan','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('18','PSPAO000018','2013','Jabatan','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('19','PSPAO000019','2013','Jabatan','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  array('20','PSPAO000020','2013','Jabatan','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a></ul><ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span></li></a></ul>' ),
                  
                  );

	return $data_1;
	
}

public function get_data_dummy_ketua_jabatan(){
	
	$data_1 =   array(
					array('1','PSPAO000001','2013','Kementerian','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  	array('2','PSPAO000002','2013','Jabatan','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('3','PSPAO000003','2013','Jabatan','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('4','PSPAO000004','2013','Kementerian','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('5','PSPAO000005','2013','Agensi','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('6','PSPAO000006','2013','Agensi','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('7','PSPAO000007','2013','Kementerian','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('8','PSPAO000008','2013','Kementerian','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('9','PSPAO000009','2013','Jabatan','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('10','PSPAO000010','2013','Jabatan','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('11','PSPAO000011','2013','Jabatan','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('12','PSPAO000012','2013','Agensi','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('13','PSPAO000013','2013','Agensi','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('14','PSPAO000014','2013','Kementerian','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('15','PSPAO000015','2013','Jabatan','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('16','PSPAO000016','2013','Agensi','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('17','PSPAO000017','2013','Jabatan','Mohd Kamil bin Ibrahim<br>(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge">Deraf</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('18','PSPAO000018','2013','Jabatan','Mohd Qoha bin Salehudin<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-info">Sah</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('19','PSPAO000019','2013','Jabatan','Mohd Saleh bin Yaakob<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-inverse">Pembetulan</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  array('20','PSPAO000020','2013','Jabatan','Mohd Khairul bin Ramli<br />(Pegawai Teknikal Fasiliti)','02/01/2013','<span class="badge badge-warning">Semak</span>','<ul class="icomoon-icons-container"><a href="#"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a></ul>' ),
                  
                  );

	return $data_1;
	
}



/*   
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
*/
   
    
}
