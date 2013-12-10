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
   //$this->db->where('fld_negara', 'Malaysia');
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


function get_kump_agensi()  //dapatkan list kategori aset
 {
   $this->db->select('idkatagensi, fld_katagensidesc');
   $this->db->order_by("fld_katagensidesc", "ASC");
   $query = $this->db->get('lkp_katagensi');
  

   $kump = array();
  
   
   if($query->result())
   {
       
      $kump[''] = '- Pilih Kumpulan Agensi -';    // default selection item
      foreach ($query->result() as $kmp) 
        {
          $kump[$kmp->idkatagensi] = $kmp->fld_katagensidesc;
              
        }
      return $kump;
     
    }
   }
   
  //function untuk cari kategori premis
    function get_kat_premis()
    {
        $getList = $this->db->get(' lkp_premis_kategori');
        return $getList->result();
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
   
   //get list pengguna
   function get_myspatauser()
    {

        $getMyspatauser = $this->db->get('tbl_myspata_user');
        
        return $getMyspatauser->result();
    }


  function get_ptra()
    {

        $getPtra = $this->db->get('tbl_ptra');
        
        return $getPtra->result();
      }

  function get_kawalanrekod()
    {

        $getKawalanrekod = $this->db->get('tbl_ptra_pata_f6_1d');
        
        return $getKawalanrekod->result();
    }

  function get_dokumenrujukan()
    {

        $getDokumenrujukan = $this->db->get('tbl_lampiran');
        
        return $getDokumenrujukan->result();
    }
    
  //model struktur ptra dalaman  
  function get_sumberman_dalaman()
    {

        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $this->db->where('sumber_id', '1');
        $getSumberman_dalaman = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getSumberman_dalaman->result();
    }
   
   //model struktur ptra luaran
   function get_sumberman_luaran()
    {

        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $this->db->where('sumber_id', '2');
        $getSumberman_luaran = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getSumberman_luaran->result();
    }
    
    //function untuk add new ptra
    function tambahptra()
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
        
        $sumber = $this->db->insert('tbl_ptra', $data);
        $ptra_id= $this->db->insert_id();
        
        $data1 = array(   array(   'ptra_id' =>$ptra_id, 
                                   'kump_kand_id' => $this->input->post('kump_kand_id'),
                                   'kand_utama' => $this->input->post('kand_utama'),        
                                   'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                   'kand_utama_detail' => $this->input->post('pendahuluan'),
                                   'node_type' => $this->input->post('node_type'),
                                   'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array(  'ptra_id' =>$ptra_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                    'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array(   'ptra_id' =>$ptra_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                    'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array(  'ptra_id' =>$ptra_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                    'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array(  'ptra_id' =>$ptra_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                    'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array(  'ptra_id' =>$ptra_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                    'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array(  'ptra_id' =>$ptra_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_rujukan'),        
                                    'kand_utama_bil' => $this->input->post('kand_utama_bil_rujukan'),
                                    'kand_utama_detail' => $this->input->post('rujukan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   )
            );
        
        $sumber2 = $this->db->insert_batch('tbl_kandungan', $data1);
      
        
        if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- sumber manusia',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Kandungan PTRA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    
    //MODEL STRUKTUR ORGANISASI
    //ptf
function get_ptf()
    {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 4');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }
function get_pif()
    {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 7');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }
function get_pdf()
    {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 5');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }
function get_pof()
    {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 6');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }
    

    // PANEL PENILAI TEKNIKAL

    //function list panel dlm table
    function get_panelpenilai()
    {

        $this->db->order_by("ptra_pata_f6_1a_panel_penilai_id", "DESC");
        $getPanelpenilai = $this->db->get('tbl_ptra_pata_f6_1a_panel_penilai');
        
        return $getPanelpenilai->result();
    }

    //function untuk add new data panel penilai
    function tambahpanel_penilai($ptra_pata_f6_1a_panel_penilai_id)
    {
              $data = array('ptra_pata_f6_1a_panel_penilai_id' => $this->input->post('ptra_pata_f6_1a_panel_penilai_id'),
                            'panel_penilai_kategori_id' => $this->input->post('panel_penilai_kategori_id'),
                            'nama_penilai' => $this->input->post('nama_penilai1'),
                            'nama_syarikat' => $this->input->post('nama_syarikat1'),
                            'email' => $this->input->post('emel'),
                            'no_tel_pej' => $this->input->post('notel_pej'),
                            'no_tel_bimbit' => $this->input->post('notel_bimbit'),
                            'jawatan' => $this->input->post('jawatan1')
                            );
        
        $panel = $this->db->insert('tbl_ptra_pata_f6_1a_panel_penilai', $data);
      
        
        if($panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat panel penilai teknikal - PTRA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Model Struktur PTRA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    
    //function get nama panel penilai based on id panelkategori
    function get_nama_panelpenilai()
    {
        $get_nama_panelpenilai = $this->db->get('lkp_panel_penilai_kategori');
        
        return $get_nama_panelpenilai->result();
    }
    
    
    //function get list panel dlm table
   function get_panelpenilai_1($ptra_pata_f6_1a_panel_penilai_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('ptra_pata_f6_1a_panel_penilai_id', $ptra_pata_f6_1a_panel_penilai_id);
        $getPanelpenilai = $this->db->get('tbl_ptra_pata_f6_1a_panel_penilai');
        
        return $getPanelpenilai->result();
    }
    
    
    //function update panel penilai teknikal
    function update_panel($id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('ptra_pata_f6_1a_panel_penilai_id', $id);
        $up_panel = $this->db->update('tbl_ptra_pata_f6_1a_panel_penilai', $dataDetail);
        if($up_panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini maklumat panel penilai teknikal - PTRA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Model Struktur PTRA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        }
    }

    //function utk kategori panel penilai
    function get_kat_penilai($panel_penilai_kategori_id)
    {
        $this->db->select('kategori');
        $this->db->where('panel_penilai_kategori_id', $panel_penilai_kategori_id);
        $getKatpen = $this->db->get('lkp_panel_penilai_kategori');
        
        return $getKatpen->result();
    }
    
    
    //KANDUNGAN
    
    function get_ptra_from_segment($id)
    {
   	$this->db->select('*');
	$this->db->from('tbl_ptra');
	$this->db->join('tbl_kandungan','tbl_ptra.ptra = tbl_kandungan.ptra_id');
	$this->db->where('tbl_ptra.ptra_id',$id);
   	$query = $this->db->get();
	
	$row = $query->result();
	
	return $row;
	
    }
    
    function insert_ptra()
    {
	$sessionarray = $this->session->all_userdata();
	
	$data = array(
		'tahun' => $this->input->post('tahun'),
		'idkem' => $sessionarray['user_kemid'],
		'idjab_agensi' => $sessionarray['user_jabid'],
		'idnegeri' => $sessionarray['user_negid'],
		'ptra_sedia_oleh_id' => $sessionarray['user_negid'],
		'ptra_tarikh_sedia' => date('Y-m-d')
	);

	$this->db->insert('tbl_ptra', $data);
	$idbaru = $this->db->insert_id();
	//$idbaru = 1;

	$kand_utama_bil = $this->input->post('kand_utama_bil');
	$kand_utama = $this->input->post('kand_utama');
	
	$data2 = array(
	
		array(
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[0],
			'kand_utama' => $kand_utama[0],
			'kand_utama_detail' => $this->input->post('kand_pendahuluan'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[1],
			'kand_utama' => $kand_utama[1],
			'kand_utama_detail' => $this->input->post('kand_objektif'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[2],
			'kand_utama' => $kand_utama[2],
			'kand_utama_detail' => $this->input->post('kand_carta'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[3],
			'kand_utama' => $kand_utama[3],
			'kand_utama_detail' => $this->input->post('kand_skop'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[4],
			'kand_utama' => $kand_utama[4],
			'kand_utama_detail' => $this->input->post('kand_sumber'),
			'node_type' => '0',
			'kand_type' => '2'
		),
		array(
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[5],
			'kand_utama' => $kand_utama[5],
			'kand_utama_detail' => $this->input->post('kand_kawalan'),
			'node_type' => '0',
			'kand_type' => '1'
		),
                array(
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
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
        
     function update_ptra($id)
        {
	$sessionarray = $this->session->all_userdata();
	
	$data = array(
		'tahun' => $this->input->post('tahun'),
		'idkem' => $sessionarray['user_kemid'],
		'idjab_agensi' => $sessionarray['user_jabid'],
		'idnegeri' => $sessionarray['user_negid'],
		'pspa_sedia_oleh_id' => $sessionarray['user_negid'],
		'pspa_tarikh_sedia' => date('Y-m-d')
	);
	$this->db->where('ptra_id', $id);
	$this->db->update('tbl_ptra', $data);
	//$idbaru = $this->db->insert_id();
	$idbaru = $id;

	$kand_id = $this->input->post('kand_id');
	$kand_utama_bil = $this->input->post('kand_utama_bil');
	$kand_utama = $this->input->post('kand_utama');
	
	$data2 = array(
	
		array(
			'kandungan_id' => $kand_id[0],
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[0],
			'kand_utama' => $kand_utama[0],
			'kand_utama_detail' => $this->input->post('kand_pendahuluan'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kandungan_id' => $kand_id[1],
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[1],
			'kand_utama' => $kand_utama[1],
			'kand_utama_detail' => $this->input->post('kand_objektif'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kandungan_id' => $kand_id[2],
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[2],
			'kand_utama' => $kand_utama[2],
			'kand_utama_detail' => $this->input->post('kand_carta'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kandungan_id' => $kand_id[3],
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[3],
			'kand_utama' => $kand_utama[3],
			'kand_utama_detail' => $this->input->post('kand_skop'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kandungan_id' => $kand_id[4],
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[4],
			'kand_utama' => $kand_utama[4],
			'kand_utama_detail' => $this->input->post('kand_sumber'),
			'node_type' => '0',
			'kand_type' => '1'
		),
		array(
			'kandungan_id' => $kand_id[5],
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[5],
			'kand_utama' => $kand_utama[5],
			'kand_utama_detail' => $this->input->post('kand_kawalan'),
			'node_type' => '0',
			'kand_type' => '1'
		),
                array(
			'kandungan_id' => $kand_id[6],
			'kump_kand_id' => '2',
			'ptra_id' => $idbaru,
			'kand_utama_bil' => $kand_utama_bil[6],
			'kand_utama' => $kand_utama[6],
			'kand_utama_detail' => $this->input->post('kand_rujukan'),
			'node_type' => '0',
			'kand_type' => '1'
		),
	
	);
	
	$this->db->update_batch('tbl_kandungan', $data2, 'kandungan_id');
	
	return $idbaru;

        }


}
?>