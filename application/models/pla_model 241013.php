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
 
   function get_namajab_agensi($idjab_agensi)
    {
        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $idjab_agensi);
        $get_namajab_agensi = $this->db->get('lkp_jab_agensi');
        
        return $get_namajab_agensi->result();
    }
 
 function get_negeri()  //dapatkan list kementerian
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
   
  
   
   function get_kat_premis()  //dapatkan list kategori premis
 {
   $getList = $this->db->get(' lkp_premis_kategori');
        return $getList->result();
   }
 
   
   function get_syarikat($syarikat_id)
    {
        $this->db->select('nama_syarikat');
        $this->db->where('syarikat_id', $syarikat_id);
        $getUrusSya = $this->db->get('tbl_syarikat');
        
        return $getUrusSya->result();
    }
   
   function get_pp()
 {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 3');
        $get_nama_lembagapemeriksa1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_lembagapemeriksa1->result();
 }
   
   function get_ptf()
 {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 4');
        $get_nama_lembagapemeriksa1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_lembagapemeriksa1->result();
 }
    
    
   function get_pif()
 {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 7');
        $get_nama_lembagapemeriksa1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_lembagapemeriksa1->result();
 }
   
   
   function get_pdf()
 {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 5');
        $get_nama_lembagapemeriksa1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_lembagapemeriksa1->result();
 }

 
   function get_pof()
 {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 6');
        $get_nama_lembagapemeriksa1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_lembagapemeriksa1->result();
 }
   
 
   function get_skop()
    {
        //$this->db->select('skop_aktvt_tajuk');
        //$this->db->where('skop_aktvt_id',$skop_aktvt_id);
        $this->db->like('skop_aktvt_kategori', 'skop', 'both');
        $this->db->like('kand_kump_kod', 'PLA');
        $query = $this->db->get('lkp_skop_aktvt');
        return $query->result();
	}	
		
   
   function get_kaedah_lupus()  //dapatkan list kategori premis
 {
   $getList = $this->db->get(' lkp_kaedah_pelupusan');
        return $getList->result();
 }
 
 
   function get_skop_lupus()  //dapatkan list kategori premis
 {
   $getList = $this->db->get(' lkp_skop_pelupusan');
        return $getList->result();
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
 
 function get_myspatauser()
    {

        $getMyspatauser = $this->db->get('tbl_myspata_user');
        
        return $getMyspatauser->result();
    }
 
 
 function get_pla() //dapatkan senarai PLA
 {
   $getPla = $this->db->get('tbl_pla');
        
        return $getPla->result();
   }
 
 
 //function untuk add new pla
    function tambahpla()
    {
        $data = array(     'tahun' => $this->input->post('tahun'),        
                             'idkem' => $this->input->post('kementerian'),
                             'idjab_agensi' => $this->input->post('jabatan'),
                            //'idnegeri' => $this->input->post('negeri'),
                            //'iddaerah' => $this->input->post('daerah'),
                            
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa')
                            );
        
        $sumber = $this->db->insert('tbl_pla', $data);
        $pla_id= $this->db->insert_id();
        
        $data1 = array(   array(   'pla_id' =>$pla_id, 
                                   'kump_kand_id' => $this->input->post('kump_kand_id'),
                                   'kand_utama' => $this->input->post('kand_utama'),        
                                   'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                   'kand_utama_detail' => $this->input->post('pendahuluan'),
                                   'node_type' => $this->input->post('node_type'),
                                   'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array(  'pla_id' =>$pla_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                    'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array(   'pla_id' =>$pla_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                    'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array(  'pla_id' =>$pla_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                    'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array(  'pla_id' =>$pla_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                    'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array(  'pla_id' =>$pla_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                    'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array(  'pla_id' =>$pla_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_rujukan'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_rujukan'),
                                    'kand_utama_detail' => $this->input->post('rujukan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   )
            );
        
        $sumber2 = $this->db->insert_batch('tbl_kandungan', $data1);
        return $pla_id;
        
        if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- sumber manusia',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Kandungan PLA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
 
  	  
function get_lembagapemeriksa()
    {
        	
		//$this->db->order_by("pla_pata_f10_1a_lembaga_pemeriksa_id", "DESC");
       // $getLembagapemeriksa = $this->db->get('tbl_pla_pata_f10_1a_lembaga_pemeriksa');
        
        //return $getLembagapemeriksa->result();
        $this->db->where('sumber_id = 2'); 
        $this->db->where('kump_pengguna = 11'); 
        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $getLembagapemeriksa = $this->db->get('tbl_utiliti_sumber_man');
        
        
        return $getLembagapemeriksa->result();
    }


function get_kat_lembagapemeriksa($lembaga_pemeriksa_kategori_id)
    {
        $this->db->select('kategori');
        $this->db->where('lembaga_pemeriksa_kategori_id', $lembaga_pemeriksa_kategori_id);
        $get_kat_lembagapemeriksa = $this->db->get('lkp_lembaga_pemeriksa_kategori');
        
        return $get_kat_lembagapemeriksa->result();
    }
	
//function get list lembaga pemeriksa dlm table
    function get_lembagapemeriksa_1($pla_pata_f10_1a_lembaga_pemeriksa_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('pla_pata_f10_1a_lembaga_pemeriksa_id', $pla_pata_f10_1a_lembaga_pemeriksa_id);
        $getLembagapemeriksa = $this->db->get('tbl_pla_pata_f10_1a_lembaga_pemeriksa');
        
        return $getLembagapemeriksa->result();
    }	
	
	
//function untuk add new data panel penilai
    function tambah_lembagapemeriksa($pla_pata_f10_1a_lembaga_pemeriksa_id)
    {
              $data = array('pla_pata_f10_1a_lembaga_pemeriksa_id' => $this->input->post('pla_pata_f10_1a_lembaga_pemeriksa_id'),
                            'lembaga_pemeriksa_kategori_id' => $this->input->post('lembaga_pemeriksa_kategori_id'),
                            'nama_lembagapemeriksa' => $this->input->post('nama_lembagapemeriksa1'),
                            'nama_syarikat' => $this->input->post('nama_syarikat1'),
                            'email' => $this->input->post('emel'),
                            'no_tel_pej' => $this->input->post('notel_pej'),
                            'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                            'jawatan' => $this->input->post('jawatan1')
                            );
        
        $panel = $this->db->insert('tbl_pla_pata_f10_1a_lembaga_pemeriksa', $data);
      
        
        if($panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat ahli lembaga pemeriksa - pla',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Model Struktur pla');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
	
	//function update lembaga pemeriksa
    function update_lembagapemeriksa($id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('pla_pata_f10_1a_lembaga_pemeriksa_id', $id);
        $up_lembagapemeriksa = $this->db->update('tbl_pla_pata_f10_1a_lembaga_pemeriksa', $dataDetail);
        if($up_lembagapemeriksa)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini maklumat ahli lembaga pemeriksaan - PLA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Model Struktur PLA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        }
    }

//function get nama lembaga pemeriksa based on id lembaga pemeriksa kategori
    function get_nama_lembagapemeriksa($disiplin_bidang_id)
    {
        //$get_nama_lembagapemeriksa = $this->db->get('lkp_lembaga_pemeriksa_kategori');
        
        //return $get_nama_lembagapemeriksa->result();
        $this->db->select('bidang');
        $this->db->where('disiplin_bidang_id', $disiplin_bidang_id);
        $get_nama_lembagapemeriksa = $this->db->get('lkp_disiplin_bidang');
        
        return $get_nama_lembagapemeriksa->result();
    }


    function get_kawalanrekod()
    {

        $this->db->order_by("pla_pata_f10_1d_id", "DESC");
        $getKawalanrekod = $this->db->get('tbl_pla_pata_f10_1d');
        
        return $getKawalanrekod->result();
    }
    
    function get_kawalanrekod_1($pla_pata_f10_1d_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('pla_pata_f10_1d_id', $pla_pata_f10_1d_id);
        $getKawalanrekod = $this->db->get('tbl_pla_pata_f10_1d');
        
        return $getKawalanrekod->result();
    }
    
    function tambahkawalan_rekod($pla_pata_f10_1d_id)
    {
              $data = array('pla_pata_f10_1d_id' => $this->input->post('pla_pata_f10_1d_id'),
                            'f10_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f10_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                            );
        
        $panel = $this->db->insert('tbl_pla_pata_f10_1d', $data);
      
        
        if($panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah kawalan rekod - PLA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Kawalan Rekod PLA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    
    function update_rekod($id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('pla_pata_f10_1d_id', $id);
        $up_rekod = $this->db->update('tbl_pla_pata_f10_1d', $dataDetail);
        if($up_rekod)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini kawalan rekod -PLA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Model Struktur PLA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
    function get_dokumenrujukan()
    {

        $getDokumenrujukan = $this->db->get('tbl_lampiran');
        
        return $getDokumenrujukan->result();
    } 
	
	
	function tambahdokumen($lampiran_id)
    {
              $data = array('lampiran_id' => $this->input->post('lampiran_id'),
                            'nama_fail' => $this->input->post('nama_fail1'),
                            'nama_fail_asal' => $this->input->post('nama_fail_asal1'),
                            );
        
        $panel = $this->db->insert('tbl_lampiran', $data);
      
        
        if($panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah kawalan rekod - PLA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Kawalan Rekod PLA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
	
	//model struktur pla dalaman  
    function get_sumberman_dalaman()
    {

        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $this->db->where('sumber_id', '1');
        $getSumberman_dalaman = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getSumberman_dalaman->result();
    }
   
   //model struktur pla luaran
    function get_sumberman_luaran()
    {

        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $this->db->where('sumber_id', '2');
        $getSumberman_luaran = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getSumberman_luaran->result();
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

      
    }
    
	
	function insert_pla()
    {
	$sessionarray = $this->session->all_userdata();
	
	$data = array(
		'tahun' => $this->input->post('tahun'),
		'idkem' => $sessionarray['user_kemid'],
		'idjab_agensi' => $sessionarray['user_jabid'],
		'idnegeri' => $sessionarray['user_negid'],
		'pla_sedia_oleh_id' => $sessionarray['user_negid'],
		'pla_tarikh_sedia' => date('Y-m-d')
	);

	$this->db->insert('tbl_pla', $data);
	$idbaru = $this->db->insert_id();
	//$idbaru = 1;

	$kand_utama_bil = $this->input->post('kand_utama_bil');
	$kand_utama = $this->input->post('kand_utama');
	
	$data2 = array(
	
		array(
			'kump_kand_id' => '2',
			'pla_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[0],
			'kand_utama' => $kand_utama[0],
			'kand_utama_detail' => $this->input->post('kand_pendahuluan'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kump_kand_id' => '2',
			'pla_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[1],
			'kand_utama' => $kand_utama[1],
			'kand_utama_detail' => $this->input->post('kand_objektif'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kump_kand_id' => '2',
			'pla_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[2],
			'kand_utama' => $kand_utama[2],
			'kand_utama_detail' => $this->input->post('kand_carta'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kump_kand_id' => '2',
			'pla_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[3],
			'kand_utama' => $kand_utama[3],
			'kand_utama_detail' => $this->input->post('kand_skop'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kump_kand_id' => '2',
			'pla_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[4],
			'kand_utama' => $kand_utama[4],
			'kand_utama_detail' => $this->input->post('kand_sumber'),
			'node_type' => '0',
			'kand_type' => '2'
		),
		array(
			'kump_kand_id' => '2',
			'pla_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[5],
			'kand_utama' => $kand_utama[5],
			'kand_utama_detail' => $this->input->post('kand_kawalan'),
			'node_type' => '0',
			'kand_type' => '1'
		),
                array(
			'kump_kand_id' => '2',
			'pla_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[6],
			'kand_utama' => $kand_utama[6],
			'kand_utama_detail' => $this->input->post('kand_rujukan'),
			'node_type' => '0',
			'kand_type' => '1'
		),
	
	);
	
	$this->db->insert_batch('tbl_kandungan', $data2);
	
	return $idbaru;
	

        }
	
	
	//function update tble pla
    
      function updatepla()
    {
        $data = array(     'tahun' => $this->input->post('tahun'),        
                             'idkem' => $this->input->post('kementerian'),
                             'idjab_agensi' => $this->input->post('jabatan'),
                            //'idnegeri' => $this->input->post('negeri'),
                            //'iddaerah' => $this->input->post('daerah'),
                            
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa')
                            );
        
        
        $this->db->where('pla_id', $id);
	    $this->db->update('tbl_pla', $data);
        $pla_id = $id;
        
        $data1 = array(   array( 'pla_id' =>$pla_id, 
                                  'kump_kand_id' => $this->input->post('kump_kand_id'),
                                  'kand_utama' => $this->input->post('kand_utama'),        
                                  'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                  'kand_utama_detail' => $this->input->post('pendahuluan'),
                                  'node_type' => $this->input->post('node_type'),
                                  'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array( 'pla_id' =>$pla_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                     'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array( 'pla_id' =>$pla_id,
                               'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                     'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pla_id' =>$pla_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                     'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pla_id' =>$pla_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                     'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pla_id' =>$pla_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                     'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pla_id' =>$pla_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_rujukan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_rujukan'),
                                     'kand_utama_detail' => $this->input->post('rujukan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   )
            );
        
        $this->db->update_batch('tbl_kandungan', $data2, 'kandungan_id');
	
	return $pla_id;
      
        
        if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- sumber manusia',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Utiliti');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    
    //segmen untuk kandungan
    public function get_pla_from_segment($id)
 {
   	$this->db->select('*');
	$this->db->from('tbl_pla');
	$this->db->join('tbl_kandungan','tbl_pla.pla_id = tbl_kandungan.pla_id');
	$this->db->where('tbl_pla.pla_id',$id);
   	$query = $this->db->get();
	
	$row = $query->result();
	
	return $row;
	
 }
	
    //segmen untuk model
    public function get_model_from_segment($id)
 {
   	$this->db->select('*');
	$this->db->from('tbl_pla_pata_f10_1a_modelstruktur');
	$this->db->join('tbl_pla_pata_f10_1a_lembaga_pemeriksa','tbl_pla_pata_f10_1a_modelstruktur.pla_id = tbl_pla_pata_f10_1a_lembaga_pemeriksa.pla_id');
        $this->db->join('tbl_pla_pata_f10_1a_pelan_kom','tbl_pla_pata_f10_1a_modelstruktur.pla_id = tbl_pla_pata_f10_1a_pelan_kom.pla_id');
	$this->db->where('tbl_pla_pata_f10_1a_modelstruktur.pla_id',$id);
   	$query = $this->db->get();
	
	$row = $query->result();
	
	return $row;
	
 }
 
 
 function get_aktiviti($skop_aktvt_id)
    {
        //$this->db->select('skop_aktvt_tajuk');
       //$this->db->where('skop_aktvt_sort','skop_aktvt_id');
        $this->db->where('skop_aktvt_sort', $skop_aktvt_id);
         $this->db->where('skop_node_type =1' );
		 //$this->db->where('kump_kand_kod ="PLA"');
       //$this->db->having('skop_aktvt_sort' ,1, FALSE);
        $this->db->like('skop_aktvt_kategori', 'aktiviti', 'after');
        $get_skopAkt1 = $this->db->get('lkp_skop_aktvt');
		
        
        return $get_skopAkt1->result();
    }
    
    
    function get_butiran($skop_aktvt_id)
    {
        //$this->db->select('skop_aktvt_tajuk');
       //$this->db->where('skop_aktvt_sort','skop_aktvt_id');
        $this->db->where('skop_aktvt_sort', $skop_aktvt_id);
         $this->db->where('skop_node_type =1' );
		// $this->db->where('kump_kand ="PLA"');
       //$this->db->having('skop_aktvt_sort' ,1, FALSE);
        $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
        $get_skopAkt1 = $this->db->get('lkp_skop_aktvt');
        
        return $get_skopAkt1->result();
    }
 
 
 function get_allskop()
    {
        $query = $this->db->get('tbl_pla_pata_f10_1b_skop_pilihan');
        
        $row = $query->result();
	
	return $row;
        
        /* $this->db->select('*');
         $this->db->from('tbl_pla_pata_f10_1b_skop_pilihan');
         $this->db->join('lkp_skop_aktvt','tbl_pla_pata_f10_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
            $this->db->like('skop_aktvt_kategori', 'skop', 'both');
        $query = $this->db->get();
        
        $row = $query->result();
	
	return $row;
        
        */
    }
    
     function get_lkpskop($pla_id)
    {    
         $this->db->select('*');
         $this->db->from('tbl_pla_pata_f10_1b_skop_pilihan');
         $this->db->order_by("pla_pata_f10_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_pla_pata_f10_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'skop', 'both');
         $this->db->where('tbl_pla_pata_f10_1b_skop_pilihan.pla_id',$pla_id);
         $query = $this->db->get();
        
         $row = $query->result();
	
	 return $row;
        
        
       /* $this->db->select('skop_aktvt_tajuk');
        $this->db->like('skop_aktvt_kategori', 'skop', 'both');
        $this->db->where('skop_aktvt_id',$skop_aktvt_id);
         
        $getKem = $this->db->get('lkp_skop_aktvt');
        
        return $getKem->result();
      
        */
    }
    
     function get_lkpskopaktiviti($skop_aktvt_id, $pla_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_pla_pata_f10_1b_skop_pilihan');
         $this->db->order_by("pla_pata_f10_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_pla_pata_f10_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'aktiviti', 'after');
          $this->db->where('tbl_pla_pata_f10_1b_skop_pilihan.pla_id',$pla_id);
         $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
         //$this->db->where('tbl_pla_pata_f10_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $query->result();
	
	 return $row;
    
    
    }
    
     function get_lkpskopbutiran($skop_aktvt_id, $pla_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_pla_pata_f10_1b_skop_pilihan');
         $this->db->order_by("pla_pata_f10_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_pla_pata_f10_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
          $this->db->where('tbl_pla_pata_f10_1b_skop_pilihan.pla_id',$pla_id);
          $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
         //$this->db->where('tbl_pla_pata_f10_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $query->result();
	
	 return $row;
    
    
    }
  
  
   function get_lkpskopbutiran_count($skop_aktvt_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_pla_pata_f10_1b_skop_pilihan');
         $this->db->join('lkp_skop_aktvt','tbl_pla_pata_f10_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
          $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
          
         //$this->db->where('tbl_pla_pata_f10_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $this->db->count_all_results();
	
	 return $row;
    
    
    }
     
     
     function get_lkpskopAkt($skop_aktvt_id)
    {
        $this->db->select('skop_aktvt_tajuk');
        $this->db->like('skop_aktvt_kategori', 'aktiviti', 'after');
        $this->db->where('skop_aktvt_id',$skop_aktvt_id);
         
        $getKem = $this->db->get('lkp_skop_aktvt');
        
        return $getKem->result();
    }
	
	
	//function untuk add new model struktur pla
     function tambahmodelpla()
    {
    	
	// insert data pp
     foreach ($this->input->post('pp')as $pp)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                      'utiliti_sumber_man_id'=>$ptf
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1a_modelstruktur', $data);
    }	
  
    // insert data ptf
     foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                      'utiliti_sumber_man_id'=>$ptf
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1a_modelstruktur', $data);
    }
     //insert data pif
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                        'utiliti_sumber_man_id'=>$pif
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1a_modelstruktur', $data);
    }
    
    //insert data pdf
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                        'utiliti_sumber_man_id'=>$pdf
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1a_modelstruktur', $data);
    }
    
    // insert data pof
    foreach ($this->input->post('pof')as $pof)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                        'utiliti_sumber_man_id'=>$pof
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1a_modelstruktur', $data);
    }
   
    //insert lembaga pemeriksaan
    foreach ($this->input->post('ahli_lembagapemeriksaan')as $ahli_lembagapemeriksaan)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                       'utiliti_sumber_man_id'=>$ahli_lembagapemeriksaan
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1a_lembaga_pemeriksa', $data);
        
    }
    // insert data pelan kecemasan
   $data = array(        'pla_id'=>$this->input->post('pla_id'),
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawabdankuasa'),
                         'tugas_pegawai_lain' => $this->input->post('pegawailain')

                        );
     $sumber = $this->db->insert('tbl_pla_pata_f10_1a_pelan_kom', $data);
    
   if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- sumber manusia',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Utiliti');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    
    //function update tble pla
   function updatemodelpla($id)
    {
        $data = array(   'pla_id'=>$this->input->post('no'),
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawabdankuasa'),
                         'tugas_pegawai_lain' => $this->input->post('pegawailain')
                    );
        
        
        $this->db->where('pla_id', $id);
	    $this->db->update('tbl_pla_pata_f10_1a_pelan_kom', $data);
        $pla_id = $id;
    }
    
    
//function untuk add new model struktur pla
   function tambahtreeviewpla()
     {
  
       // insert data skop
    foreach ($this->input->post('skop')as $skop)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                      'keterangan'=>$this->input->post('keterangan'),
                        'skop_aktvt_id'=>$skop
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1b_skop_pilihan', $data);
    }
     //insert data aktiviti
    foreach ($this->input->post('aktiviti')as $aktiviti)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                        'skop_aktvt_id'=>$aktiviti
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1b_skop_pilihan', $data);
    }
    
    //insert data butiran
    foreach ($this->input->post('butiran')as $butiran)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                      'skop_aktvt_id'=>$butiran
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1b_skop_pilihan', $data);
    }
    
   if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- sumber manusia',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Utiliti');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
	
	
	//function untuk add new model struktur pla
  /* function tambahtreeviewpla()
     {
  
       // insert data skop
    foreach ($this->input->post('skop')as $skop)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                        'skop_aktvt_id'=>$skop
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1b_skop_pilihan', $data);
    }
     //insert data pilihan
    foreach ($this->input->post('aktiviti')as $aktiviti)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                        'skop_aktvt_id'=>$aktiviti
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1b_skop_pilihan', $data);
    }
    
    //insert data butiran
    foreach ($this->input->post('butiran')as $butiran)
    {
        $data= array( 'pla_id'=>$this->input->post('pla_id'),
                        'skop_aktvt_id'=>$butiran
                    );
        
        $sumber = $this->db->insert('tbl_pla_pata_f10_1b_skop_pilihan', $data);
    }
    
   if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- sumber manusia',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Utiliti');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }*/

}
?>
