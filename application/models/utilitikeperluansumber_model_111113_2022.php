<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Utilitikeperluansumber_model extends CI_Model {


  
  function __construct() 
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }
    
     
    
    
     //function untuk add new form sumber manusia
    function tambahpnpa($pnpa_id)
    {
        $data = array(     'tahun' => $this->input->post('tahun'),        
                             'idkem' => $this->input->post('kementerian'),
                             'idjab_agensi' => $this->input->post('jabatan'),
                            //'idnegeri' => $this->input->post('negeri'),
                            //'iddaerah' => $this->input->post('daerah'),
                            'nama_premis' => $this->input->post('nama_premis'),
                            'idpremis_kategori' => $this->input->post('idpremis_kategori'),
                            'nodpa' => $this->input->post('jawatan')
                            );
        
        $sumber = $this->db->insert('tbl_utiliti_sumber_man', $data);
      
        
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
    
    //function untuk add new form sumber manusia
    function get_sumber_manusia($idkem)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('sumber_id = "1"');
        $this->db->where('idkem', $idkem);
        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $getSumberManusia = $this->db->get('tbl_utiliti_sumber_man');
        
        
        return $getSumberManusia->result();
    }
     //function untuk add new form sumber manusia luaran
    function get_sumber_manusia_luaran($syarikat_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('sumber_id = "2"');
        $this->db->where('syarikat_id', $syarikat_id);
        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $getSumberManusia = $this->db->get('tbl_utiliti_sumber_man');
        
        
        return $getSumberManusia->result();
    }
    
    
    //function untuk add new form sumber manusia
    function tambahsumbermanusia()
    {
        $data = array(     'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'idkem' => $this->input->post('kementerian'),
                             'idjab_agensi' => $this->input->post('jabatan'),
                            'idnegeri' => $this->input->post('negeri'),
                            'iddaerah' => $this->input->post('daerah'),
                            'nama' => $this->input->post('nama'),
                            'nric' => $this->input->post('noic'),
                            'kump_pengguna' => $this->input->post('peranan'),
                            'level_id' => $this->input->post('level'),
                            'jawatan' => $this->input->post('jawatan'),
                            'gred_jawatan' => $this->input->post('gredjawatan'),
                            'disiplin_bidang_id' => $this->input->post('disiplin'),
                            'gaji' => $this->input->post('gaji'),
                            'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa'),
                            'sumber_id' => $this->input->post('sumber_id')
                            
                            );
        
        $sumber = $this->db->insert('tbl_utiliti_sumber_man', $data);
      
        
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
    
    //function untuk add new form panel penilai teknikal dekat pelan
    function tambahsumberpanel()
    {
        $data = array(     //'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'nama' => $this->input->post('nama_luar'),
                             'syarikat_id' => $this->input->post('syarikat_id_luar'),
                            'nric' => $this->input->post('noic_luar'),
                            'kump_pengguna' => $this->input->post('peranan_luar'),
                           'jawatan' => $this->input->post('jawatan_luar'),
                            'disiplin_bidang_id' => $this->input->post('disiplin_luar'),
                            'gaji' => $this->input->post('gaji_luar'),
                            'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa_luar'),
                            'sumber_id' => $this->input->post('sumber_id_luar')
                            
                            );
        
        $sumber3 = $this->db->insert('tbl_utiliti_sumber_man', $data);
     
        
        if($sumber3)
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
    
     //function untuk add new form n update sumber manusia
     function get_kem($idkem)
    {
        $this->db->select('namakem');
        $this->db->where('idkem',$idkem);
        $getKem = $this->db->get('lkp_kementerian');
        
        return $getKem->result();
    }
    
    //function untuk add new form n update sumber manusia
    function get_jab_agensi($idjab_agensi)
    {
        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi',$idjab_agensi);
        $getList = $this->db->get('lkp_jab_agensi');
        return $getList->result();
    }
    
    //function untuk add new form n update sumber manusia
    function get_negeri($idnegeri)
    {
        $this->db->select('namanegeri');
        $this->db->where('idnegeri',$idnegeri);
        $getList = $this->db->get('lkp_negeri');
        return $getList->result();
    }
    //function untuk add new form n update sumber manusia
    function get_daerah($iddaerah,$idnegeri)
    {
        $this->db->select('nama_daerah');
        $this->db->where('iddaerah',$iddaerah);
        $this->db->where('idnegeri',$idnegeri);
        $getList = $this->db->get('lkp_daerah');
        return $getList->result();
    }
     function get_daerah_2($iddaerah,$idnegeri)
    {
        $this->db->select('nama_daerah');
        $this->db->where('iddaerah',$iddaerah);
        $this->db->where('idnegeri',$idnegeri);
        $getList = $this->db->get('lkp_daerah');
        return $getList->result();
    }
	/*
		Added : Diana 27/10/2013
		load selected daerah based negeri
	*/
      function get_daerah_basednegeri($idnegeri)
    {
        $this->db->where('idnegeri',$idnegeri);
        $getList = $this->db->get('lkp_daerah');
        return $getList->result();
    }
    //function untuk add new form n update sumber manusia
    function get_level($level_id)
    {
        $this->db->select('level_desc');
        $this->db->where('level_id',$level_id);
        $getList = $this->db->get('lkp_level');
        return $getList->result();
    }
    function get_peranan($kump_pengguna)
    {
        $this->db->select('nama_kump_pengguna');
        $this->db->where('kump_pengguna',$kump_pengguna);
        $getList = $this->db->get('lkp_kump_pengguna');
        return $getList->result();
    }
    function get_disiplin($disiplin_bidang_id)
    {
        $this->db->select('bidang');
        $this->db->where('disiplin_bidang_id',$disiplin_bidang_id);
        $getList = $this->db->get('lkp_disiplin_bidang');
        return $getList->result();
    }
     function get_namasya($syarikat_id)
    {
        $this->db->select('nama_syarikat');
        $this->db->where('syarikat_id',$syarikat_id);
        $getList = $this->db->get('tbl_syarikat');
        return $getList->result();
    }
    
    
    // function untuk update sumber manusia
   function get_sumber_manusia_1($utiliti_sumber_man_id)
    {
        //$this->db->select('utiliti_sumber_man_id');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $getSumberMan = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getSumberMan->result();
    }
    
    
     // function untuk update sumber manusia
    function update_sumber_manusia($utiliti_sumber_man_id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $manusia = $this->db->update('tbl_utiliti_sumber_man', $dataDetail);
		
        if($manusia)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'kemaskini maklumat utiliti keperluan sumber- sumber manusia',
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
    
    /*
		updated : diana 27/10/2013 
	*/
     // function untuk update sumber manusia luaran
    function update_sumber_manusia_luaran($utiliti_sumber_man_id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $manusia = $this->db->update('tbl_utiliti_sumber_man', $dataDetail);
		
        if($manusia)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'kemaskini maklumat utiliti keperluan sumber- sumber manusia',
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

    //funtion untuk kategori sumber manusia
    function get_sumber_manusia_2($kat_alat_pej_id)
    {
        $this->db->select('alat_pej');
        $this->db->where('kat_alat_pej_id', $kat_alat_pej_id);
        $getKatPej = $this->db->get('lkp_kat_alat_pej');
        
        return $getKatPej->result();
    }
    
     //function untuk add new form n update urus pejabat
    function get_kementerian()
    {
        $getList = $this->db->get('lkp_kementerian');
        return $getList->result();
    }
    //function untuk add new form n update urus pejabat
    function get_jabatan_agen()
    {
        $getList = $this->db->get('lkp_jab_agensi');
        return $getList->result();
    }
    //function untuk add new form n update urus pejabat
    function get_negeri_1()
    {
        $getList = $this->db->get('lkp_negeri');
        return $getList->result();
    }
    //function untuk add new form n update urus pejabat
    function get_daerah_1()
    {
        $getList = $this->db->get('lkp_daerah');
        return $getList->result();
    }
    //function untuk add new form n update urus pejabat
    function get_level_1()
    {
        $getList = $this->db->get('lkp_level');
        return $getList->result();
    }
    //function untuk add new form n update urus pejabat
    function get_peranan_1()
    {
        $getList = $this->db->get('lkp_kump_pengguna');
        return $getList->result();
    }
    //function untuk add new form n update urus pejabat
    function get_bidang_1()
    {
        $getList = $this->db->get('lkp_disiplin_bidang');
        return $getList->result();
    }
    function get_syarikat_1()
    {
        $getList = $this->db->get('tbl_syarikat');
        return $getList->result();
    }
    
    
    
    //function untuk add new form urus pejabat
    function get_pengurusan_pej()
    {
        //$this->db->select('urus_pej_id');
       // $this->db->where('kat_alat_pej_id', $kat_alat_pej_id);
        $this->db->order_by("urus_pej_id", "DESC");
        $getUrusPej = $this->db->get('tbl_urus_pej');
        
        
        return $getUrusPej->result();
    }
    
    
    //function untuk add new form urus pejabat
    function tambahpejabat($urus_pej_id)
    {
        $data = array('urus_pej_id' => $this->input->post('urus_pej_id'),
                             'kat_alat_pej_id' => $this->input->post('kat_alat_pej_id'),
                            'jenama' => $this->input->post('jenama1'),
                            'spesifikasi' => $this->input->post('spesifikasi'),
                            'alat_pej_tag_no' => $this->input->post('alat_pej_tag_no'),
							'kos_seunit' => $this->input->post('kos_seunit')
                            );
        
        $pejabat = $this->db->insert('tbl_urus_pej', $data);
      
        
        if($pejabat)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- pengurusan pejabat',
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
    
    
    //function untuk add new form n update urus pejabat
    function get_list()
    {
        $getList = $this->db->get('lkp_kat_alat_pej');
        return $getList->result();
    }
    
    
    // function untuk update urus pejabat
   function get_pengurusan_pej_1($urus_pej_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('urus_pej_id', $urus_pej_id);
        $getUrusPej = $this->db->get('tbl_urus_pej');
        
        return $getUrusPej->result();
    }
    
    
     // function untuk update urus pejabat
    function update_pejabat($id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
       $this->db->where('urus_pej_id', $id);
        $permohonan = $this->db->update('tbl_urus_pej', $dataDetail);
        if($permohonan)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'kemaskini maklumat utiliti keperluan sumber- pengurusan pejabat',
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

    //funtion untuk kategori alat pejabat
    function get_kat_pej($kat_alat_pej_id)
    {
        $this->db->select('alat_pej');
        $this->db->where('kat_alat_pej_id', $kat_alat_pej_id);
        $getKatPej = $this->db->get('lkp_kat_alat_pej');
        
        return $getKatPej->result();
    }
    
    
    
    
     
    //function untuk add new form alat kerja
    function get_alat_kerja()
    {
        //$this->db->select('urus_pej_id');
       // $this->db->where('kat_alat_pej_id', $kat_alat_pej_id);
        $this->db->order_by("alat_kerja_id", "DESC");
        $getAlatKerja = $this->db->get('tbl_alat_kerja');
        
        
        return $getAlatKerja->result();
    }
    
    
    //function untuk add new form alat kerja
     function tambahalatkerja($alat_kerja_id)
    {
        $data = array('alat_kerja_id' => $this->input->post('alat_kerja_id'),
                             'kat_alat_kerja_id' => $this->input->post('kat_alat_kerja_id'),
                            'jenama' => $this->input->post('jenama'),
                            'spesifikasi' => $this->input->post('spesifikasi'),
                            'alat_kerja_tag_no' => $this->input->post('alat_kerja_tag_no'),
							'kos_seunit' => $this->input->post('kos_seunit')
                            );
        
        $alatkerja = $this->db->insert('tbl_alat_kerja', $data);
      
        
        if($alatkerja)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- Alat Kerja',
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
    
    
    //function untuk add new form n update alat kerja
    function get_list_kerja()
    {
        $getListKerja = $this->db->get('lkp_kat_alat_kerja');
        return $getListKerja->result();
    }
    
    
    // function untuk update alat kerja
   function get_alat_kerja_1($alat_kerja_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('alat_kerja_id', $alat_kerja_id);
        $getUrusPej = $this->db->get('tbl_alat_kerja');
        
        return $getUrusPej->result();
    }
    
    
     // function untuk update alat kerja
    function update_kerja($id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
       $this->db->where('alat_kerja_id', $id);
        $kerja = $this->db->update('tbl_alat_kerja', $dataDetail);
        if($kerja)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'kemaskini maklumat utiliti keperluan sumber- pengurusan pejabat',
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

    //funtion untuk kategori alat kerja
    function get_kat_alat_kerja($kat_alat_kerja_id)
    {
        $this->db->select('alat_kerja');
        $this->db->where('kat_alat_kerja_id', $kat_alat_kerja_id);
        $getKatKerja = $this->db->get('lkp_kat_alat_kerja');
        
        return $getKatKerja->result();
    }
    
    //funtion untuk Syarikat
    function get_allsyarikat()
    {
        //$this->db->select('urus_pej_id');
       // $this->db->where('kat_alat_pej_id', $kat_alat_pej_id);
        $this->db->order_by("syarikat_id", "DESC");
        $getSyarikat2 = $this->db->get('tbl_syarikat');
        
        
        return $getSyarikat2->result();
    }  
   //function tambah syarikat
    function tambahsyarikat($data)
    { 
        $syarikat = $this->db->insert('tbl_syarikat', $data);
      
        if($syarikat)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat Syarikat',
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
    
    
    
     // function untuk update urus pejabat
    function update_syarikat($syarikat_id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('syarikat_id', $syarikat_id);
        $permohonan = $this->db->update('tbl_syarikat', $dataDetail);
        if($permohonan)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'kemaskini maklumat syarikat',
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
    
    
    // function untuk update syarikat
   function get_syarikat($syarikat_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('syarikat_id', $syarikat_id);
        $getUrusSya = $this->db->get('tbl_syarikat');
        
        return $getUrusSya->result();
    }
/*
        update: diana 26/10/2013
        function untuk add new form sumber manusia
    */
    //function tambahsumbermanusialuaran()
    function tambahsumbermanusialuaran($dataUpload)
    {
        $data = array(     'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             
                            'nama' => $this->input->post('nama'),
                            'nric' => $this->input->post('noic'),
                            'kump_pengguna' => $this->input->post('peranan'),
                            'syarikat_id' => $this->input->post('syarikat_id'),
                            'jawatan' => $this->input->post('jawatan'),
                            //'gred_jawatan' => $this->input->post('gredjawatan'),
                            'disiplin_bidang_id' => $this->input->post('disiplin'),
                            'gaji' => $this->input->post('gaji'),
                            'kos_kerja_lebih_masa' => $this->input->post('koslebihmasa'),
                            'sumber_id' => $this->input->post('sumber_id'),
                            'path_suratlantikan' => $dataUpload
                            );
        
        $sumber = $this->db->insert('tbl_utiliti_sumber_man', $data);
      
        
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
	
	
	 //added : diana 27/10/2013
	function get_documentInfo($idDoc)
	{
		$this->db->where('utiliti_sumber_man_id', $idDoc);
        $retrieveDoc = $this->db->get('tbl_utiliti_sumber_man');
		$ret = $retrieveDoc->row();
		return $ret->path_suratlantikan;
	}
    
    
}
?>
