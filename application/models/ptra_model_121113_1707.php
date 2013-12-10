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
  
      return $mukim;
     
    
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
   
   //function untuk cari kategori premis
    function get_kat_premis()
    {
        $getList = $this->db->get('lkp_premis_kategori');
        return $getList->result();
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
      
   function get_syarikat($syarikat_id)
    {
        $this->db->select('nama_syarikat');
        $this->db->where('syarikat_id', $syarikat_id);
        $getUrusSya = $this->db->get('tbl_syarikat');
        
        return $getUrusSya->result();
    }   
    

  function get_kawalanrekod()
    {

        $this->db->order_by("ptra_pata_f6_1d_id", "DESC");
        $getKawalanrekod = $this->db->get('tbl_ptra_pata_f6_1d');
        
        return $getKawalanrekod->result();
    }
    
    function get_kawalanrekod_1($ptra_pata_f6_1d_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('ptra_pata_f6_1d_id', $ptra_pata_f6_1d_id);
        $getKawalanrekod = $this->db->get('tbl_ptra_pata_f6_1d');
        
        return $getKawalanrekod->result();
    }
    
    function tambahkawalan_rekod($ptra_pata_f6_1d_id)
    {
              $data = array('ptra_pata_f6_1d_id' => $this->input->post('ptra_pata_f6_1d_id'),
                            'f6_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f6_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1')
                            );
        
        $panel = $this->db->insert('tbl_ptra_pata_f6_1d', $data);
      
        
        if($panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah kawalan rekod - PTRA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Kawalan Rekod PTRA');
            
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
        $this->db->where('ptra_pata_f6_1d_id', $id);
        $up_rekod = $this->db->update('tbl_ptra_pata_f6_1d', $dataDetail);
        if($up_rekod)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini kawalan rekod - PTRA',
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

  function get_dokumenrujukan()
    {

        $getDokumenrujukan = $this->db->get('tbl_lampiran');
        
        return $getDokumenrujukan->result();
    }
    
  function tambahdokumen($lampiran_id)
    {
              $data = array( array('lampiran_id' => $this->input->post('lampiran_id'),
                            'nama_fail' => $this->input->post('nama_fail1'),
                            'nama_fail_asal' => $this->input->post('nama_fail_asal1'),
                            ),
                  
                      array('lampiran_id' => $this->input->post('lampiran_id'),
                            'nama_fail' => $this->input->post('nama_fail2'),
                            'nama_fail_asal' => $this->input->post('nama_fail_asal2'),
                            )
                  );
        
        $panel = $this->db->insert_batch('tbl_lampiran', $data);
      
        
        if($panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah kawalan rekod - PTRA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Kawalan Rekod PTRA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }  
    
    
  //MODEL STRUKTUR ORGANISASI 
  
 //segmen untuk model
    public function get_model_from_segment($id){
   	$this->db->select('*');
	$this->db->from('tbl_ptra_pata_f6_1a_modelstruktur');
	$this->db->join('tbl_ptra_pata_f6_1a_panel_penilai','tbl_ptra_pata_f6_1a_modelstruktur.ptra_id = tbl_ptra_pata_f6_1a_panel_penilai.ptra_id');
        $this->db->join('tbl_ptra_pata_f6_1a_pelan_kom','tbl_ptra_pata_f6_1a_modelstruktur.ptra_id = tbl_ptra_pata_f6_1a_pelan_kom.ptra_id');
	$this->db->where('tbl_ptra_pata_f6_1a_modelstruktur.ptra_id',$id);
   	$query = $this->db->get();
	
	$row = $query->result();
	
	return $row;
	
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
    
    
    //list ptf
    function get_ptf()
    {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 4');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }

    //list pif
    function get_pif()
    {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 7');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }

    //list pdf
    function get_pdf()
    {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 5');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }

    //list pof
    function get_pof()
    {
       // $this->db->select('nama');
        $this->db->where('kump_pengguna = 6');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }
    

  // PANEL PENILAI TEKNIKAL
    
  //function untuk add new model struktur ptra
   function tambahmodelptra()
     {
  /*    $sessionarray = $this->session->all_userdata();
         $data1 = array(   array(
                                  'ptra_id' => $this->input->post('ptra_id'),
                                  'utiliti_sumber_man_id' => $this->input->post('ptf[]')       
                                
                                ),
            
                            array( 'ptra_id' => $this->input->post('ptra_id'),
                                  'utiliti_sumber_man_id' => $this->input->post('pif[]')       
                                
                                   ),
                           array( 'ptra_id' => $this->input->post('ptra_id'),
                                  'utiliti_sumber_man_id' => $this->input->post('pdf[]')       
                                
                                   ),
                            array( 'ptra_id' => $this->input->post('ptra_id'),
                                  'utiliti_sumber_man_id' => $this->input->post('pof[]')       
                                
                                   ),
                            );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data1);
      */
       
       // insert data ptf
    foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                        'utiliti_sumber_man_id' => $ptf
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
     //insert data pif
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                        'utiliti_sumber_man_id' => $pif
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
    
    //insert data pdf
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                        'utiliti_sumber_man_id' => $pdf
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
    
    // insert data pof
    foreach ($this->input->post('pof')as $pof)
    {
        $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                        'utiliti_sumber_man_id' => $pof
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
   
    //insert panel penilai
    foreach ($this->input->post('panel_penilai')as $panel_penilai)
    {
        $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                       'utiliti_sumber_man_id' => $panel_penilai
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_panel_penilai', $data);
        
    }
    // insert data pelan kecemasan
   $data = array(        'ptra_id'=>$this->input->post('ptra_id'),
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawapdankuasa'),
                         'tugas_pegawai_lain' => $this->input->post('pegawailain')

                        );
     $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_pelan_kom', $data);
    
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
    
    //function list panel dlm table
    function get_panelpenilai()
    {
        $this->db->where('sumber_id = 2'); 
        $this->db->where('kump_pengguna = 10'); 
        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $getPanelpenilai = $this->db->get('tbl_utiliti_sumber_man');
        
        
        return $getPanelpenilai->result();
    }
    
    //function get nama panel penilai based on id panelkategori
    function get_nama_panelpenilai($disiplin_bidang_id)
    {
        $this->db->select('bidang');
        $this->db->where('disiplin_bidang_id', $disiplin_bidang_id);
        $get_nama_panelpenilai = $this->db->get('lkp_disiplin_bidang');
        
        return $get_nama_panelpenilai->result();
    }
    
    
   //function get list panel dlm table
   function get_panelpenilai_1($utiliti_sumber_man_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $getPanelpenilai = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getPanelpenilai->result();
    }
    
    
    //function update panel penilai teknikal
    function update_panel($id,$dataDetail)
    {
        //date_default_timezone_set('Asia/Kuala_Lumpur');
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
    
    
    //KANDUNGAN (khairul)
    
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
        
    //function untuk add new ptra (azian)
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
        return $ptra_id;
        
        if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah kandungan PTRA',
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
        
    
    /* update : diana 12/11/13 */
	function removesumberrancang($idsumber)
    {
			$this->db->where("ptra_pata_f6_1b1c_sumber_man_id", $idsumber);
			$this->db->delete("tbl_ptra_pata_f6_1b1c_sumber_man");
	}
	
	function tambahsumberrancang($cat)
    {
				
         if($cat=="rancang"){
          $value1 = $this->input->post('kat_sumber_man_id_rancang');
          $value2 = $this->input->post('utiliti_sumber_man_id_rancang');
		  
		  $index = $this->input->post('indexofrancang');
		  //$flag = $index+1;
		  $flag = $index;
		  $gajikosflag = $this->input->post('kosflag'.$flag);
		  $kosgaji = $this->input->post('gaji_rancang');
          $koskerjalebihmasa = $this->input->post('kos_rancang');
		  
         }else if($cat=="lulus"){
          $value1 = $this->input->post('kat_sumber_man_id_lulus');
          $value2 = $this->input->post('utiliti_sumber_man_id_lulus');
		  
		  $index = $this->input->post('indexoflulus');
		  //$flag = $index+1;
		  $flag = $index;
		  $gajikosflag = $this->input->post('kosflagl'.$flag);
		  $kosgaji = $this->input->post('gaji_lulus');
          $koskerjalebihmasa = $this->input->post('kos_lulus');
		  
         }else{
          $value1 = $this->input->post('kat_sumber_man_id_isi');
          $value2 = $this->input->post('utiliti_sumber_man_id_isi');
		  
		  $index = $this->input->post('indexofisi');
		  //$flag = $index+1;
		  $flag = $index;
		  $gajikosflag = $this->input->post('kosflagi'.$flag);
		  $kosgaji = $this->input->post('gaji_isi');
          $koskerjalebihmasa = $this->input->post('kos_isi');
         }

		
		$ptraid = $this->input->post('ptra_id');
		
        $skopaktvtid = $this->input->post('skop_aktvt_id');
		
        $data = array('ptra_id' => $ptraid,
		'gaji_kos_flag' => $gajikosflag,
		'skop_aktvt_id' => $skopaktvtid,
		'utiliti_sumber_man_id' =>$value2[$index],
		'kos_gaji' => $kosgaji[$index],
		'kos_kerja_lebih_masa' => $koskerjalebihmasa[$index],
		'kat_sumber_man_id' => $value1                     
                            );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_sumber_man', $data);
	}
	
	/*
		desc : calculate all bajet
	*/
	
	function cal_man_cost($ptra_id)
	{
		//main table
		//$this->db->select_sum('bajet_aktvt');
		$this->db->select('*');
		$this->db->where('ptra_id', $ptra_id);
		$this->db->where('kat_sumber_man_id', 3); //only isi shaja
		$query_cost = $this->db->get('tbl_ptra_pata_f6_1b1c_sumber_man');

		if ($query_cost->num_rows() > 0)
		{
			$gaji = 0;
			foreach ($query_cost->result() as $rows)
			{
				$flag_gaji = ($rows->gaji_kos_flag)*1;
				$kos_gaji = ($rows->kos_gaji)*1;
				$kos_lebih_masa = ($rows->kos_kerja_lebih_masa)*1;
				
				if($flag_gaji===1) //for kos_gaji only
				{
					$gaji+= $kos_gaji;
				}
				else if($flag_gaji===2) //for both of kos gaji + lebih masa
				{
					$gaji+= $kos_gaji+$kos_lebih_masa;
				}
				
			}
			
		} 	
		else
		{
			$gaji = 0;
		}
		
		return $gaji;
	}
	
	function cal_alatkerja_cost($ptra_id)
	{
		$this->db->select('kos_seunit');
		$this->db->where('ptra_id', $ptra_id);
        $query_alatkerja = $this->db->get('tbl_ptra_pata_f6_1b1c_alat_kerja');
		

		if ($query_alatkerja->num_rows() > 0)
		{
			$alatkerja = 0;
			foreach ($query_alatkerja->result() as $rows)
			{
				$alatkerja+=$rows->kos_seunit;			
			}
		} 	
		else
		{
			$alatkerja = 0;
		}
		
		return $alatkerja;
	}
	
	function cal_pejabat_cost($ptra_id)
	{
		$this->db->select('kos_seunit');
		$this->db->where('ptra_id', $ptra_id);
        $query_pejabat = $this->db->get('tbl_ptra_pata_f6_1b1c_urus_pej');
		

		if ($query_pejabat->num_rows() > 0)
		{
			$pejabat = 0;
			foreach ($query_pejabat->result() as $rows)
			{
				$pejabat+=$rows->kos_seunit;			
			}
		} 	
		else
		{
			$pejabat = 0;
		}
		
		return $pejabat;
	}
	


	//function calBajet($ptra_id,$skop_aktiviti_id)
	function cal_bajet($ptra_id)
	{
		//tbl_ptra_pata_f6_1b1c
		//tbl_ptra_pata_f6_1b1c_sumber_man
		//tbl_ptra_pata_f6_1b1c_alat_kerja
		//tbl_ptra_pata_f6_1b1c_urus_pej
		
		//main table
		$this->db->select('bajet_aktvt');
		$this->db->where('ptra_id', $ptra_id);
        $query_bajet = $this->db->get('tbl_ptra_pata_f6_1b1c');
		  
		if ($query_bajet->num_rows() > 0)
		{
			$bajet_aktiviti = 0;
			foreach ($query_bajet->result() as $rows)
			{
				//$row = $query_bajet->row(); 
				$bajet_aktiviti+= $rows->bajet_aktvt;
			}
			
			$human_cost = $this->cal_man_cost($ptra_id);
			$alat_cost = $this->cal_alatkerja_cost($ptra_id);
			$pejabat_cost = $this->cal_pejabat_cost($ptra_id);
			
			$total_cost = $bajet_aktiviti+$human_cost+$alat_cost+$pejabat_cost;
		} 		
		else
		{
			$total_cost = 0;
		}
		
		return number_format($total_cost,2);
	}
	
	//calculation based on skop id begin here...
  
  function cal_man_cost_skop($ptra_id,$skop_aktiviti_id)
	{
		//main table
		//$this->db->select_sum('bajet_aktvt');
		$this->db->select('*');
		$this->db->where('ptra_id', $ptra_id);
		$this->db->where('kat_sumber_man_id', 3); //only isi shaja
        $this->db->where('skop_aktvt_id', $skop_aktiviti_id);
        $query_cost = $this->db->get('tbl_ptra_pata_f6_1b1c_sumber_man');

		
		if ($query_cost->num_rows() > 0)
		{
			$gaji = 0;
			foreach ($query_cost->result() as $rows)
			{
				$flag_gaji = ($rows->gaji_kos_flag)*1;
				$kos_gaji = ($rows->kos_gaji)*1;
				$kos_lebih_masa = ($rows->kos_kerja_lebih_masa)*1;
				
				if($flag_gaji===1) //for kos_gaji only
				{
					$gaji+= $kos_gaji;
				}
				else if($flag_gaji===2) //for both of kos gaji + lebih masa
				{
					$gaji+= $kos_gaji+$kos_lebih_masa;
				}
				
			}
			
		} 	
		else
		{
			$gaji = 0;
		}
		
		return $gaji;
	}
	
	function cal_alatkerja_cost_skop($ptra_id,$skop_aktiviti_id)
	{
		$this->db->select('kos_seunit');
		$this->db->where('ptra_id', $ptra_id);
		$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
        $query_alatkerja = $this->db->get('tbl_ptra_pata_f6_1b1c_alat_kerja');
		

		if ($query_alatkerja->num_rows() > 0)
		{
			$alatkerja = 0;
			foreach ($query_alatkerja->result() as $rows)
			{
				$alatkerja+=$rows->kos_seunit;			
			}
		} 	
		else
		{
			$alatkerja = 0;
		}
		
		return $alatkerja;
	}
	
	function cal_pejabat_cost_skop($ptra_id,$skop_aktiviti_id)
	{
		$this->db->select('kos_seunit');
		$this->db->where('ptra_id', $ptra_id);
		$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
        $query_pejabat = $this->db->get('tbl_ptra_pata_f6_1b1c_urus_pej');
		

		if ($query_pejabat->num_rows() > 0)
		{
			$pejabat = 0;
			foreach ($query_pejabat->result() as $rows)
			{
				$pejabat+=$rows->kos_seunit;			
			}
		} 	
		else
		{
			$pejabat = 0;
		}
		
		return $pejabat;
	}
	
	function cal_bajet_skop($ptra_id,$skop_aktiviti_id)
	{
		//tbl_ptra_pata_f6_1b1c
		//tbl_ptra_pata_f6_1b1c_sumber_man
		//tbl_ptra_pata_f6_1b1c_alat_kerja
		//tbl_ptra_pata_f6_1b1c_urus_pej
		
		//main table
		$this->db->select('bajet_aktvt');
		$this->db->where('ptra_id', $ptra_id);
		$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
        $query_bajet = $this->db->get('tbl_ptra_pata_f6_1b1c');
				
		if ($query_bajet->num_rows() > 0)
		{
			$bajet_aktiviti = 0;
			foreach ($query_bajet->result() as $rows)
			{
				//$row = $query_bajet->row(); 
				$bajet_aktiviti+= $rows->bajet_aktvt;
			}
			
			$human_cost = $this->cal_man_cost_skop($ptra_id,$skop_aktiviti_id);
			$alat_cost = $this->cal_alatkerja_cost_skop($ptra_id,$skop_aktiviti_id);
			$pejabat_cost = $this->cal_pejabat_cost_skop($ptra_id,$skop_aktiviti_id);
			
			$total_cost = $bajet_aktiviti+$human_cost+$alat_cost+$pejabat_cost;
			
		} 		
		else
		{
			$total_cost = 0;
		}
		
		return number_format($total_cost,2);
	}
	
	########################################################### page treeview ################################## 

    //page treeview
	function get_skop()
	{
		//$this->db->select('skop_aktvt_tajuk');
		//$this->db->where('skop_aktvt_id',$skop_aktvt_id);
		$this->db->like('skop_aktvt_kategori', 'skop', 'both');
		$this->db->like('kand_kump_kod', 'ptra');
		$query = $this->db->get('lkp_skop_aktvt');
		
		return $query->result();
	}
   
	function get_count_pelan_pilih($skop_aktvt_id)
    {

		$this->db->select('*');
		$this->db->where('skop_aktvt_id',$skop_aktvt_id);
		$this->db->where('ptra_id',$this->uri->segment(4));
		$query = $this->db->get('tbl_ptra_pata_f6_1b_skop_pilihan');

		return $query->result();

    }
   
    function skop_pilihan_id()
	{

		$this->db->select('ptra_pata_f6_1b_skop_pilihan_id');
		$this->db->where('ptra_id',$this->uri->segment(4));
		$query = $this->db->get('tbl_ptra_pata_f6_1b_skop_pilihan');

		return $query->result();

    }   
    
      function skop_aktvt_id_in_db()
	{

     $this->db->select('skop_aktvt_id');
     $this->db->where('ptra_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_ptra_pata_f6_1b_skop_pilihan');

     return $query->result();

    }
    

    
	function tambahtreeviewptra()
    {
  
		$input1 = $this->input->post('skop');

		$data3 = array();
  

		for($i=0;$i<count($input1);$i++)
		{
			$data3[$i]['skop_aktvt_id'] = $input1[$i];
			$data3[$i]['ptra_id'] = $this->uri->segment(4);
		}
     
		$sumber = $this->db->insert_batch('tbl_ptra_pata_f6_1b_skop_pilihan', $data3);
  
    
		if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat treeview PTRA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'treeviewptra');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    



    function updatetreeviewptra(){

    $skop = $this->input->post('skop'); //skop aktiviti id yg di pilih

    $skop_pilih_id = $this->input->post('skop_pilihan_id'); //id skop pilihan in db
    
    $skop_aktvt_id_in_db = $this->input->post('skop_aktvt_id_in_db'); //skop aktiviti id dlm db
	
	$ptraid = $this->uri->segment(4);
  

	if($ptraid<>0){
	
		$this->db->where_in('ptra_id',$ptraid);
		$run = $this->db->delete('tbl_ptra_pata_f6_1b_skop_pilihan');
		
		if($run)
		{
			$input1 = $this->input->post('skop');
			$data3 = array();
  

			for($i=0;$i<count($input1);$i++)
			{
				$data3[$i]['skop_aktvt_id'] = $input1[$i];
				
				$data3[$i]['ptra_id'] = $this->uri->segment(4);
			}
		 
		
			$sumber = $this->db->insert_batch('tbl_ptra_pata_f6_1b_skop_pilihan', $data3);
	  
		
			if($sumber)
			{
				$dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
								 'aktvt' => 'Kemaskini maklumat treeview PTRA',
								 'masa_aktvt' => date('Y-m-d H:m:s'),
								 'modul' => 'ptratreeview');
				
				$this->db->insert('tbl_aktvt_log', $dataLog);
				return true;
			}
			else
			{
				return false;
			} 
			
		}
	}
	
}
     
     
  
   function check_skop_parent_or_child($skopid){
   
     $this->db->select('*');
     $this->db->where('skop_aktvt_id',$skopid);
     $this->db->where('skop_node_type',0);
     $query = $this->db->get('lkp_skop_aktvt');
  
      $rowcount = $query->num_rows();

       return $rowcount;
    }
    



    function get_check_skopid_exist_or_not($skop_aktvt_id){

     $this->db->select('*');
     $this->db->where('skop_aktvt_id',$skop_aktvt_id);
     $this->db->where('ptra_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_ptra_pata_f6_1b_skop_pilihan');
  
     $rowcount = $query->num_rows();

     return $rowcount;
     

    }


    function getcountlkpskopaktvt(){

     $this->db->select('*');
     $this->db->where('kand_kump_kod','ptra');
     $query = $this->db->get('lkp_skop_aktvt');
  
     $rowcount = $query->num_rows();

     return $rowcount;

    }
    
    
    function get_butiran($skop_aktvt_id)
    {
        //$this->db->select('skop_aktvt_tajuk');
       //$this->db->where('skop_aktvt_sort','skop_aktvt_id');
        $this->db->where('skop_aktvt_sort', $skop_aktvt_id);
         $this->db->where('skop_node_type =1' );
       //$this->db->having('skop_aktvt_sort' ,1, FALSE);
        $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
        $get_skopAkt1 = $this->db->get('lkp_skop_aktvt');
        
        return $get_skopAkt1->result();
    }
    
 
    
     function get_lkpskop($ptra_id)
    {    
         $this->db->select('*');
         $this->db->from('tbl_ptra_pata_f6_1b_skop_pilihan');
         $this->db->order_by("ptra_pata_f6_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'skop', 'both');
         $this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.ptra_id',$ptra_id);
         $query = $this->db->get();
        
         $row = $query->result();
  
   return $row;
     }
    
     function get_lkpskopaktiviti_1($ptra_id,$skop_aktvt_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_ptra_pata_f6_1b_skop_pilihan');
         $this->db->order_by("ptra_pata_f6_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'aktiviti', 'after');
          $this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.ptra_id',$ptra_id);
         $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
         //$this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $query->result();
  
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
    
   #################################################### page skop and aktiviti ################################################
    function get_aktiviti($skop_aktvt_id)
    {
        //$this->db->select('skop_aktvt_tajuk');
       //$this->db->where('skop_aktvt_sort','skop_aktvt_id');
        $this->db->where('skop_aktvt_sort', $skop_aktvt_id);
         $this->db->where('skop_node_type =1' );
       //$this->db->having('skop_aktvt_sort' ,1, FALSE);
        $this->db->like('skop_aktvt_kategori', 'aktiviti', 'after');
        $get_skopAkt1 = $this->db->get('lkp_skop_aktvt');
        
        return $get_skopAkt1->result();
    }
    
    
     function get_lkpskopaktiviti($skop_aktvt_id, $ptra_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_ptra_pata_f6_1b_skop_pilihan');
         $this->db->order_by("ptra_pata_f6_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'aktiviti', 'after');
          $this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.ptra_id',$ptra_id);
         $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
         //$this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $query->result();
	
	 return $row;
    
    
    }
    
    function get_lkpskopbutiran_count($skop_aktvt_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_ptra_pata_f6_1b_skop_pilihan');
         $this->db->join('lkp_skop_aktvt','tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
          $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
          
         //$this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $this->db->count_all_results();
	
	 return $row;
    
    
    }
    
     function get_lkpskopbutiran($skop_aktvt_id, $ptra_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_ptra_pata_f6_1b_skop_pilihan');
         $this->db->order_by("ptra_pata_f6_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
          $this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.ptra_id',$ptra_id);
          $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
         //$this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $query->result();
	
	 return $row;
    
    
    }
    
       
    function get_allskop()
    {
        $query = $this->db->get('tbl_ptra_pata_f6_1b_skop_pilihan');
        
        $row = $query->result();
	
	return $row;
    }    
	
	
	#################################################### page skop and aktiviti2 ################################
    
    
    function insert_ptra_tbl_ptra_alat_kerja($funcname){

      if($funcname=='kom'){

        foreach ($this->input->post('kom')as $kom)
            {

                $strcb=$kom;
                //echo $strcb . '<br/>';

                $strcb_length = intval(strlen($strcb));
                //echo $strcb_length. '<br/>';

                $strcb_find = intval(stripos($strcb,"cb"));
               // echo $strcb_find . '</br>';

                $str_right_len= $strcb_length-($strcb_find+2);
                //echo $str_right_len . '</br>';

                $strcb_new = substr($strcb,-$str_right_len);
                //echo ($strcb_new) . '</br>';

                $strcb_id = substr($strcb,0,$strcb_find);
               // echo ($strcb_id);
             
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => 1,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_alat_kerja', $data);
            }


      }else if($funcname=='pem'){

        foreach ($this->input->post('pem')as $pem)
            {

                $strcb=$pem;
                //echo $strcb . '<br/>';

                $strcb_length = intval(strlen($strcb));
               // echo $strcb_length. '<br/>';

                $strcb_find = intval(stripos($strcb,"cb"));
                //echo $strcb_find . '</br>';

                $str_right_len= $strcb_length-($strcb_find+2);
                //echo $str_right_len . '</br>';

                $strcb_new = substr($strcb,-$str_right_len);
                //echo ($strcb_new) . '</br>';

                $strcb_id = substr($strcb,0,$strcb_find);
                //echo ($strcb_id);
             
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => 2,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_alat_kerja', $data);
            }


      }else if($funcname=='ken'){

        foreach ($this->input->post('ken')as $ken)
            {

                $strcb=$ken;
                //echo $strcb . '<br/>';

                $strcb_length = intval(strlen($strcb));
               // echo $strcb_length. '<br/>';

                $strcb_find = intval(stripos($strcb,"cb"));
                //echo $strcb_find . '</br>';

                $str_right_len= $strcb_length-($strcb_find+2);
                //echo $str_right_len . '</br>';

                $strcb_new = substr($strcb,-$str_right_len);
                //echo ($strcb_new) . '</br>';

                $strcb_id = substr($strcb,0,$strcb_find);
                //echo ($strcb_id);
             
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => 3,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_alat_kerja', $data);
            }

      }else if($funcname=='ppe'){

         foreach ($this->input->post('ppe')as $ppe)
            {

                $strcb=$ppe;
                //echo $strcb . '<br/>';

                $strcb_length = intval(strlen($strcb));
               // echo $strcb_length. '<br/>';

                $strcb_find = intval(stripos($strcb,"cb"));
                //echo $strcb_find . '</br>';

                $str_right_len= $strcb_length-($strcb_find+2);
               // echo $str_right_len . '</br>';

                $strcb_new = substr($strcb,-$str_right_len);
               // echo ($strcb_new) . '</br>';

                $strcb_id = substr($strcb,0,$strcb_find);
               // echo ($strcb_id);
             
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => 4,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_alat_kerja', $data);
            }

      }

    }

    
    
     function delete_ptra_tbl_ptra_alat_kerja($funcname){
   
      if($funcname=='kom'){

      $this->db->where('kat_alat_kerja_id',1);
      $this->db->where('ptra_id',$this->input->post('ptra_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_ptra_pata_f6_1b1c_alat_kerja');
            



      }else if($funcname=='pem'){

       $this->db->where('kat_alat_kerja_id',2); 
      $this->db->where('ptra_id',$this->input->post('ptra_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_ptra_pata_f6_1b1c_alat_kerja');
            



      }else if($funcname=='ken'){
        $this->db->where('kat_alat_kerja_id',3);

        $this->db->where('ptra_id',$this->input->post('ptra_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_ptra_pata_f6_1b1c_alat_kerja');
            



      }else if($funcname=='ppe'){

        $this->db->where('kat_alat_kerja_id',4);
      $this->db->where('ptra_id',$this->input->post('ptra_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_ptra_pata_f6_1b1c_alat_kerja');
            


      }
          
      
    }
    
    
    function insert_ptra_urus_pej($funcname){


      if($funcname=='foto'){

        foreach ($this->input->post('foto')as $foto)
            {

                $strcb=$foto;
                //echo $strcb . '<br/>';

                $strcb_length = intval(strlen($strcb));
               // echo $strcb_length. '<br/>';

                $strcb_find = intval(stripos($strcb,"cb"));
                //echo $strcb_find . '</br>';

                $str_right_len= $strcb_length-($strcb_find+2);
                //echo $str_right_len . '</br>';

                $strcb_new = substr($strcb,-$str_right_len);
                //echo ($strcb_new) . '</br>';

                $strcb_id = substr($strcb,0,$strcb_find);
                //echo ($strcb_id);
             
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => intval($strcb_id),
                              'kat_alat_pej_id' => 1,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_urus_pej', $data);
            }


      }else if($funcname=='fax'){

          foreach ($this->input->post('fax')as $fax)
            {

                $strcb=$fax;
                //echo $strcb . '<br/>';

                $strcb_length = intval(strlen($strcb));
               // echo $strcb_length. '<br/>';

                $strcb_find = intval(stripos($strcb,"cb"));
                //echo $strcb_find . '</br>';

                $str_right_len= $strcb_length-($strcb_find+2);
                //echo $str_right_len . '</br>';

                $strcb_new = substr($strcb,-$str_right_len);
                //echo ($strcb_new) . '</br>';

                $strcb_id = substr($strcb,0,$strcb_find);
                //echo ($strcb_id);
             
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => intval($strcb_id),
                              'kat_alat_pej_id' => 2,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_urus_pej', $data);
            }

      }else if($funcname=='tel'){


        foreach ($this->input->post('tel')as $tel)
            {

                $strcb=$tel;
                //echo $strcb . '<br/>';

                $strcb_length = intval(strlen($strcb));
               // echo $strcb_length. '<br/>';

                $strcb_find = intval(stripos($strcb,"cb"));
                //echo $strcb_find . '</br>';

                $str_right_len= $strcb_length-($strcb_find+2);
                //echo $str_right_len . '</br>';

                $strcb_new = substr($strcb,-$str_right_len);
                //echo ($strcb_new) . '</br>';

                $strcb_id = substr($strcb,0,$strcb_find);
                //echo ($strcb_id);
             
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => intval($strcb_id),
                              'kat_alat_pej_id' => 3,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_urus_pej', $data);
            }

      }

    }

    
    function delete_ptra_urus_pej($funcname){

       if($funcname=='foto'){

      $this->db->where('kat_alat_pej_id',1);
      $this->db->where('ptra_id',$this->input->post('ptra_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_ptra_pata_f6_1b1c_urus_pej');

       }else if($funcname=='fax'){

      $this->db->where('kat_alat_pej_id',2);
      $this->db->where('ptra_id',$this->input->post('ptra_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_ptra_pata_f6_1b1c_urus_pej');

       }else if($funcname=='tel'){

      $this->db->where('kat_alat_pej_id',3);
      $this->db->where('ptra_id',$this->input->post('ptra_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_ptra_pata_f6_1b1c_urus_pej');

       } 
     
            

    }
    
    function updateskopaktivitipenilaiaset(){


       $data = array(     
                            'f6_1b1c_pihak_berkaitan' => $this->input->post('pihakkaitan'),        
                            'f6_1b1c_tanggungjawab' => $this->input->post('tjawab'),
                            'f6_1b1c_tarikh_mula' => $this->input->post('tarikh_mula'),
                            'f6_1b1c_tarikh_tamat' => $this->input->post('tarikh_akhir'),
                            'catatan' => $this->input->post('catatan'),
                            'objek_sebagai_id' => $this->input->post('objek'),
                            'bajet_aktvt' => $this->input->post('bajet_aktvt'),
                            'sumber_id' => $this->input->post('sumber'),
                            'output' => $this->input->post('output')
                            );
        
        $this->db->where('ptra_id',$this->input->post('ptra_id'));
        $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
        $this->db->update('tbl_ptra_pata_f6_1b1c', $data);

    }

    
    
      function count_data_in_tbl_ptra_pata_f6_1b1c(){

         $this->db->select('*');
         $this->db->where('ptra_id', $this->uri->segment(4));
         $this->db->where('skop_aktvt_id',$this->uri->segment(5));
         $getdata = $this->db->get('tbl_ptra_pata_f6_1b1c');

         $rowcount = $getdata->num_rows();
        
         return  $rowcount;

    }
    
       function tambahskopaktivitipenilaiaset(){

      $data = array(      'ptra_id' => $this->input->post('ptra_id'),
                            'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                            'f6_1b1c_pihak_berkaitan' => $this->input->post('pihakkaitan'),        
                            'f6_1b1c_tanggungjawab' => $this->input->post('tjawab'),
                            'f6_1b1c_tarikh_mula' => $this->input->post('tarikh_mula'),
                            'f6_1b1c_tarikh_tamat' => $this->input->post('tarikh_akhir'),
                            'catatan' => $this->input->post('catatan'),
                            'objek_sebagai_id' => $this->input->post('objek'),
                            'bajet_aktvt' => $this->input->post('bajet_aktvt'),
                            'sumber_id' => $this->input->post('sumber'),
                            'output' => $this->input->post('output')
                            );
        

        $this->db->insert('tbl_ptra_pata_f6_1b1c', $data);

    }
    
    //segemn untuk skop
public function get_ptra_skop_from_segment2($id,$skop_aktvt_id)
  {
   	$this->db->select('*');
	$this->db->from('tbl_ptra_pata_f6_1b1c');
	$this->db->join('lkp_skop_aktvt','tbl_ptra_pata_f6_1b1c.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
	//$this->db->limit(11,6);
	$this->db->where('tbl_ptra_pata_f6_1b1c.ptra_id',$id);
        $this->db->where('tbl_ptra_pata_f6_1b1c.skop_aktvt_id',$skop_aktvt_id);
        
   	$query = $this->db->get();
	
	$row = $query->result();
	
	return $row;
	
}
 
 function get_lkpskopbutiran_1($ptra_id, $skop_aktvt_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_ptra_pata_f6_1b_skop_pilihan');
         $this->db->order_by("ptra_pata_f6_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
          $this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.ptra_id',$ptra_id);
          $this->db->where('lkp_skop_aktvt.skop_aktvt_id', $skop_aktvt_id);
         //$this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $query->result();
	
	 return $row;
    
    
    }
   
     function get_obj_sebagai()
    {
       // $this->db->select('nama');
       // $this->db->where('kat_alat_kerja_id = 4');
        $get_nama_panelpenilai1 = $this->db->get('lkp_objek_sebagai');
        
        return $get_nama_panelpenilai1->result();
    } 
    
     function get_sumber_id()
    {
       // $this->db->select('nama');
       // $this->db->where('kat_alat_kerja_id = 4');
        $get_nama_panelpenilai1 = $this->db->get('lkp_sumber');
        
        return $get_nama_panelpenilai1->result();
    }
 
    
   //page skop aktiviti2 
    function get_sum_man()
    {
       // $this->db->select('nama');
        $this->db->where('sumber_id = 1');
        $get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_panelpenilai1->result();
    }
    
function get_sumber_rancang($utiliti_sumber_man_id,$ptra_id,$kat_sumber_man_id, $skop_aktvt_id)
    {
         $this->db->select('*');
         //$this->db->from('tbl_ptra_pata_f6_1b1c_sumber_man');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('ptra_id', $ptra_id);
        $this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
         $this->db->where('skop_aktvt_id', $skop_aktvt_id);
        $getUrusSya = $this->db->get('tbl_ptra_pata_f6_1b1c_sumber_man');
        
        return $getUrusSya->result();
       
    }
    
    
    function get_total_rancang($utiliti_sumber_man_id,$ptra_id,$kat_sumber_man_id, $skop_aktvt_id, $gaji_kos_flag)
    {
         $this->db->select('*');
         //$this->db->from('tbl_ptra_pata_f6_1b1c_sumber_man');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('ptra_id', $ptra_id);
        $this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
         $this->db->where('skop_aktvt_id', $skop_aktvt_id);
         $this->db->where('gaji_kos_flag', $gaji_kos_flag);
        $getUrusSya = $this->db->get('tbl_ptra_pata_f6_1b1c_sumber_man');
        
        return $getUrusSya->result();
        
    }
	
	//added : diana 6/11/2013
	function get_total_pejabat($ptra_id,$skop_aktvt_id,$urus_pej_id,$kat_alat_pej_id)
    {
        $this->db->where('ptra_id', $ptra_id);
		$this->db->where('skop_aktvt_id', $skop_aktvt_id);
		$this->db->where('urus_pej_id', $urus_pej_id);
		$this->db->where('kat_alat_pej_id', $kat_alat_pej_id);

        $getUrusSya = $this->db->get('tbl_ptra_pata_f6_1b1c_urus_pej');
        
        return $getUrusSya->result();
        
    }
	//added : diana 7/11/2013
	function get_total_peralatan($ptra_id,$skop_aktvt_id,$alat_kerja_id,$kat_alat_kerja_id)
    {
        $this->db->where('ptra_id', $ptra_id);
		$this->db->where('skop_aktvt_id', $skop_aktvt_id);
		$this->db->where('alat_kerja_id', $alat_kerja_id);
		$this->db->where('kat_alat_kerja_id', $kat_alat_kerja_id);

        $getUrusSya = $this->db->get('tbl_ptra_pata_f6_1b1c_alat_kerja');
        
        return $getUrusSya->result();
        
    }
	
      function get_alat_pej()
    {
       // $this->db->select('nama');
        $this->db->where('kat_alat_pej_id = 1');
        $get_nama_panelpenilai1 = $this->db->get('tbl_urus_pej');
        
        return $get_nama_panelpenilai1->result();
    }
    function get_fax()
    {
       // $this->db->select('nama');
        $this->db->where('kat_alat_pej_id = 2');
        $get_nama_panelpenilai1 = $this->db->get('tbl_urus_pej');
        
        return $get_nama_panelpenilai1->result();
    }
    function get_telefon()
    {
       // $this->db->select('nama');
        $this->db->where('kat_alat_pej_id = 3');
        $get_nama_panelpenilai1 = $this->db->get('tbl_urus_pej');
        
        return $get_nama_panelpenilai1->result();
    }
    
     function get_komputer()
    {
       // $this->db->select('nama');
        $this->db->where('kat_alat_kerja_id = 1');
        $get_nama_panelpenilai1 = $this->db->get('tbl_alat_kerja');
        
        return $get_nama_panelpenilai1->result();
    }
     function get_pemeriksaan()
    {
       // $this->db->select('nama');
        $this->db->where('kat_alat_kerja_id = 2');
        $get_nama_panelpenilai1 = $this->db->get('tbl_alat_kerja');
        
        return $get_nama_panelpenilai1->result();
    }
     function get_kenderaan()
    {
       // $this->db->select('nama');
        $this->db->where('kat_alat_kerja_id = 3');
        $get_nama_panelpenilai1 = $this->db->get('tbl_alat_kerja');
        
        return $get_nama_panelpenilai1->result();
    }
     function get_ppe()
    {
       // $this->db->select('nama');
        $this->db->where('kat_alat_kerja_id = 4');
        $get_nama_panelpenilai1 = $this->db->get('tbl_alat_kerja');
        
        return $get_nama_panelpenilai1->result();
    }
    
   function tambahskopaktiviti2()
    {
        $data = array(      'ptra_id' => $this->input->post('ptra_id'),
                            'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                            'f6_1b1c_pihak_berkaitan' => $this->input->post('pihakkaitan'),        
                            'f6_1b1c_tanggungjawab' => $this->input->post('tjawab'),
                            'f6_1b1c_tarikh_mula' => $this->input->post('tarikh_mula'),
                            'f6_1b1c_tarikh_tamat' => $this->input->post('tarikh_akhir'),
                            'catatan' => $this->input->post('catatan'),
                            'objek_sebagai_id' => $this->input->post('objek'),
                            'bajet_aktvt' => $this->input->post('bajet_aktvt'),
                            'sumber_id' => $this->input->post('sumber'),
                            'output' => $this->input->post('output')
                            );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c', $data);
       
         foreach ($this->input->post('foto')as $foto)
            {

                $strcb=$foto;
                //echo $strcb . '<br/>';

                $strcb_length = intval(strlen($strcb));
               // echo $strcb_length. '<br/>';

                $strcb_find = intval(stripos($strcb,"cb"));
                //echo $strcb_find . '</br>';

                $str_right_len= $strcb_length-($strcb_find+2);
                //echo $str_right_len . '</br>';

                $strcb_new = substr($strcb,-$str_right_len);
                //echo ($strcb_new) . '</br>';

                $strcb_id = substr($strcb,0,$strcb_find);
                //echo ($strcb_id);

             
             
             
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => intval($strcb_id),
                              'kat_alat_pej_id' => $this->input->post('kat_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_urus_pej', $data);
            }
	}
	


//end


    public function get_all_kandungan_ptra($id)
    {
      $this->db->select('*');
      $this->db->from('tbl_ptra');
      $this->db->join('tbl_kandungan','tbl_ptra.ptra_id = tbl_kandungan.ptra_id');
      $this->db->where('tbl_ptra.ptra_id',$id);
      
      $query = $this->db->get();
      $row = $query->result();
  
      return $row;
    }






    public function get_ulasan_terbaru($pspaid,$kump,$ptra_id)
    {
      $this->db->where('pspa_id', $pspaid);
      $this->db->where('kump_kand_id', $kump);
      $this->db->where('rekod_pelan_id', $ptra_id);
  
      $query = $this->db->get('tbl_statuslog');
  
    
      if($query->num_rows())
      {
        $row = $query->row();
        $value=$row->status_ulasan;
      }
    
      else
      {
        $value='';
      }
      
      return $value;
    }





    function get_ptra2($pspa_id,$ptra_id)
    {
         $this->db->select('*');
         $this->db->where('pspa_id',$pspa_id);
         $this->db->where('ptra_id',$ptra_id);
         $this->db->where('idkem', $this->session->userdata('user_kemid'));
         //$this->db->where_not_in('pnpa_tarikh_sedia','0000-00-00 00:00:00');
        $this->db->from('tbl_ptra');
         $this->db->order_by("ptra_id", "DESC");
        
        
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;
    }





    function update_ptra_date_lulus($id,$ptra_id)
    {
      $data = array('ptra_tarikh_lulus' => date('Y-m-d'));
  
      $this->db->where('pspa_id', $id);
      $this->db->where('ptra_id', $ptra_id);
      $this->db->update('tbl_ptra', $data);
    }




    public function insert_status_log_ulasan($id,$status,$ptra_id)
    {
      $sessionarray = $this->session->all_userdata();

      $data = array(
                    'status_id'      => $status,
                    'status_tarikh'  => date('Y-m-d H:i:s'),
                    'myspata_userid' => $sessionarray['user_id'],
                    'status_ulasan'  => $this->input->post('ulasan'),
                    'pspa_id'        => $id,
                    'kump_kand_id'   => 4,
                    'rekod_pelan_id' => $pnpa_id
                   );

      $this->db->insert('tbl_statuslog', $data);
    }




    public function get_pifid_ptra($id,$ptra)
    {
      $this->db->select('pif_id');
      $this->db->where('pspa_id', $id);
      $this->db->where('ptra', $ptra);
      $query = $this->db->get('tbl_notifikasi_pelan');
  
      if ($query->num_rows() > 0)
      {
        $row = $query->row(); 
        return $row->pif_id;
      } 
    }



    public function get_pofid_ptra($id,$ptra)
    {
      $this->db->select('pof_id');
      $this->db->where('pspa_id', $id);
      $this->db->where('ptra',$ptra);
      
      $query = $this->db->get('tbl_notifikasi_pelan');
  
      if ($query->num_rows() > 0)
      {
        $row = $query->row(); 
        return $row->pof_id;
      } 
    }



    public function get_ptfid_ptra($id)
    {
      $this->db->select('pspa_semak_oleh_id');
      $this->db->where('pspa_id', $id);
  
      $query = $this->db->get('tbl_pspao');
  
      if ($query->num_rows() > 0)
      {
        $row = $query->row(); 
        return $row->pspa_semak_oleh_id;
      } 
    }



    public function get_ppdid_ptra($id,$ptra_id)
    {
      $this->db->select('ptra_sedia_oleh_id');
      $this->db->where('pspa_id', $id);
      $this->db->where('ptra_id', $ptra_id);
  
      $query = $this->db->get('tbl_ptra');
  
      if ($query->num_rows() > 0)
      {
        $row = $query->row(); 
        return $row->ptra_sedia_oleh_id;
      } 
    }



    

}
?>