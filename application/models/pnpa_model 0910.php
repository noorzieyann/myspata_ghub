<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pnpa_model extends CI_Model {
    
    
 //current 
function get_pnpa()
    {

        $getPtra = $this->db->get('tbl_pnpa');
        
        return $getPtra->result();
    }

function get_namakem($idkem)
    {
        $this->db->select('namakem');
        $this->db->where('idkem', $idkem);
        $get_namakem = $this->db->get('lkp_kementerian');
        
        return $get_namakem->result();
    }

function get_namajab_agensi($idjab_agensi)
    {
        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $idjab_agensi);
        $get_namajab_agensi = $this->db->get('lkp_jab_agensi');
        
        return $get_namajab_agensi->result();
    }

    function get_panelpenilai()
    {
        $this->db->where('sumber_id = 2'); 
        $this->db->where('kump_pengguna = 10'); 
         $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $getPanelpenilai = $this->db->get('tbl_utiliti_sumber_man');
        
        
        return $getPanelpenilai->result();
    }


function get_nama_panelpenilai($disiplin_bidang_id)
    {
        $this->db->select('bidang');
        $this->db->where('disiplin_bidang_id', $disiplin_bidang_id);
        $get_nama_panelpenilai = $this->db->get('lkp_disiplin_bidang');
        
        return $get_nama_panelpenilai->result();
    }

function get_kawalanrekod()
    {

        $getKawalanrekod = $this->db->get('tbl_pnpa_pata_f8_1d');
        
        return $getKawalanrekod->result();
    }
function get_dokumenrujukan()
    {

        $getDokumenrujukan = $this->db->get('tbl_lampiran');
        
        return $getDokumenrujukan->result();
    }
    

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

    
function get_skop()
    {
        //$this->db->select('skop_aktvt_tajuk');
        //$this->db->where('skop_aktvt_id',$skop_aktvt_id);
        $this->db->like('skop_aktvt_kategori', 'skop', 'both');
        $this->db->like('kand_kump_kod', 'pnpa');
        $query1 = $this->db->get('lkp_skop_aktvt');
        
        return $query1->result();
    
    //$this->db->select('skop_aktvt_id,skop_aktvt_tajuk');
   
   /* $this->db->order_by("skop_aktvt_id", "ASC");
    $this->db->like('skop_aktvt_kategori', 'skop');
    $query = $this->db->get('lkp_skop_aktvt');
  

   $skop = array();
  
   if($query->result())
   {
       
          //$skop[''] = '- Pilih Premis -';    // default selection item
          foreach ($query->result() as $s) 
           {
              $skop[$s->skop_aktvt_id] = $s->skop_aktvt_tajuk;
              
           }
      return $skop;
     
    }
    */
    
    }
    
    
    
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
    
    
    function get_allskop()
    {
        $query = $this->db->get('tbl_pnpa_pata_f8_1b_skop_pilihan');
        
        $row = $query->result();
	
	return $row;
        
        /* $this->db->select('*');
         $this->db->from('tbl_pnpa_pata_f8_1b_skop_pilihan');
         $this->db->join('lkp_skop_aktvt','tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
            $this->db->like('skop_aktvt_kategori', 'skop', 'both');
        $query = $this->db->get();
        
        $row = $query->result();
	
	return $row;
        
        */
    }
    
     function get_lkpskop($pnpa_id)
    {    
         $this->db->select('*');
         $this->db->from('tbl_pnpa_pata_f8_1b_skop_pilihan');
         $this->db->order_by("pnpa_pata_f8_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'skop', 'both');
         $this->db->where('tbl_pnpa_pata_f8_1b_skop_pilihan.pnpa_id',$pnpa_id);
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
    
     function get_lkpskopaktiviti($skop_aktvt_id, $pnpa_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_pnpa_pata_f8_1b_skop_pilihan');
         $this->db->order_by("pnpa_pata_f8_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'aktiviti', 'after');
          $this->db->where('tbl_pnpa_pata_f8_1b_skop_pilihan.pnpa_id',$pnpa_id);
         $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
         //$this->db->where('tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $query->result();
	
	 return $row;
    
    
    }
    
     function get_lkpskopbutiran($skop_aktvt_id, $pnpa_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_pnpa_pata_f8_1b_skop_pilihan');
         $this->db->order_by("pnpa_pata_f8_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
          $this->db->where('tbl_pnpa_pata_f8_1b_skop_pilihan.pnpa_id',$pnpa_id);
          $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
         //$this->db->where('tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
         $query = $this->db->get();
        
         $row = $query->result();
	
	 return $row;
    
    
    }
   function get_lkpskopbutiran_count($skop_aktvt_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_pnpa_pata_f8_1b_skop_pilihan');
         $this->db->join('lkp_skop_aktvt','tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
          $this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
          
         //$this->db->where('tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
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
    
    //demo
    
    
  
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
   
  //function untuk add new pnpa
    function tambahpnpa()
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
        
        $sumber = $this->db->insert('tbl_pnpa', $data);
        $pnpa_id= $this->db->insert_id();
        
        $data1 = array(   array( 'pnpa_id' =>$pnpa_id, 
                                  'kump_kand_id' => $this->input->post('kump_kand_id'),
                                  'kand_utama' => $this->input->post('kand_utama'),        
                                  'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                  'kand_utama_detail' => $this->input->post('pendahuluan'),
                                  'node_type' => $this->input->post('node_type'),
                                  'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array( 'pnpa_id' =>$pnpa_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                     'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array( 'pnpa_id' =>$pnpa_id,
                               'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                     'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                     'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                     'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                     'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_rujukan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_rujukan'),
                                     'kand_utama_detail' => $this->input->post('rujukan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   )
            );
        
        $sumber2 = $this->db->insert_batch('tbl_kandungan', $data1);
      
        return $pnpa_id;
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
    public function get_pnpa_from_segment($id){
   	$this->db->select('*');
	$this->db->from('tbl_pnpa');
	$this->db->join('tbl_kandungan','tbl_pnpa.pnpa_id = tbl_kandungan.pnpa_id');
	$this->db->where('tbl_pnpa.pnpa_id',$id);
   	$query = $this->db->get();
	
	$row = $query->result();
	
	return $row;
	
}
 //segmen untuk model
    public function get_model_from_segment($id){
   	$this->db->select('*');
	$this->db->from('tbl_pnpa_pata_f8_1a_modelstruktur');
	$this->db->join('tbl_pnpa_pata_f8_1a_panel_penilai','tbl_pnpa_pata_f8_1a_modelstruktur.pnpa_id = tbl_pnpa_pata_f8_1a_panel_penilai.pnpa_id');
        $this->db->join('tbl_pnpa_pata_f8_1a_pelan_kom','tbl_pnpa_pata_f8_1a_modelstruktur.pnpa_id = tbl_pnpa_pata_f8_1a_pelan_kom.pnpa_id');
	$this->db->where('tbl_pnpa_pata_f8_1a_modelstruktur.pnpa_id',$id);
   	$query = $this->db->get();
	
	$row = $query->result();
	
	return $row;
	
}
    //function update tble pnpa
    
      function updatepnpa($id)
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
        
        
        $this->db->where('pnpa_id', $id);
	$this->db->update('tbl_pnpa', $data);
        $pnpa_id = $id;
        
        $data2 = array(   array( 'pnpa_id' =>$pnpa_id, 
                                  'kump_kand_id' => $this->input->post('kump_kand_id'),
                                  'kand_utama' => $this->input->post('kand_utama'),        
                                  'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                  'kand_utama_detail' => $this->input->post('pendahuluan'),
                                  'node_type' => $this->input->post('node_type'),
                                  'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array( 'pnpa_id' =>$pnpa_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                     'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array( 'pnpa_id' =>$pnpa_id,
                               'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                     'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                     'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                     'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                     'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_rujukan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_rujukan'),
                                     'kand_utama_detail' => $this->input->post('rujukan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   )
            );
        
        $this->db->update_batch('tbl_kandungan', $data2);
	
	return $pnpa_id;
      
        
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

    
   //function untuk cari kategori premis
    function get_kat_premis()
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

 //function untuk add new model struktur pnpa
   function tambahmodelpnpa()
     {
  
       // insert data ptf
    foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                        'utiliti_sumber_man_id'=>$ptf
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
     //insert data pif
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                        'utiliti_sumber_man_id'=>$pif
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
    
    //insert data pdf
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                        'utiliti_sumber_man_id'=>$pdf
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
    
    // insert data pof
    foreach ($this->input->post('pof')as $pof)
    {
        $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                        'utiliti_sumber_man_id'=>$pof
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
   
    //insert panel penilai
    foreach ($this->input->post('panel_penilai')as $panel_penilai)
    {
        $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                       'utiliti_sumber_man_id'=>$panel_penilai
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_panel_penilai', $data);
        
    }
    // insert data pelan kecemasan
   $data = array(        'pnpa_id'=>$this->input->post('pnpa_id'),
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawabdankuasa'),
                         'tugas_pegawai_lain' => $this->input->post('pegawailain')

                        );
     $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_pelan_kom', $data);
    
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
    //function update tble pnpa
   
//function untuk add new model struktur pnpa
   function tambahtreeviewpnpa()
     {
  
       // insert data skop
    foreach ($this->input->post('skop')as $skop)
    {
        $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                        'skop_aktvt_id'=>$skop
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b_skop_pilihan', $data);
    }
     //insert data pilihan
    foreach ($this->input->post('aktiviti')as $aktiviti)
    {
        $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                        'skop_aktvt_id'=>$aktiviti
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b_skop_pilihan', $data);
    }
    
    //insert data butiran
    foreach ($this->input->post('butiran')as $butiran)
    {
        $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                        'skop_aktvt_id'=>$butiran
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b_skop_pilihan', $data);
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


   
}
?>
