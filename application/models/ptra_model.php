<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Ptra_model extends CI_Model {
    
    ##################################### all #####################################################
    

//copy dr pnpa 13/11/13
/*function get_peranan($kump_pengguna)
    {
        $this->db->select('nama_kump_pengguna');
        $this->db->where('kump_pengguna', $kump_pengguna);
        $get_peranan = $this->db->get('lkp_kump_pengguna');
        
        return $get_peranan->result();
    }*/

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

function get_bidang($disiplin_bidang_id)
    {
        $this->db->select('bidang');
        $this->db->where('disiplin_bidang_id', $disiplin_bidang_id);
        $get_bidang = $this->db->get('lkp_disiplin_bidang');
        
        return $get_bidang->result();
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


   function get_daerah()  //dapatkan list daerah
 {
    /*$this->db->select('iddaerah, nama_daerah');
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
    * */
    $this->db->where('idnegeri = 10');
    $getList = $this->db->get('lkp_daerah');
        return $getList->result();
   }


   function get_mukim()  //dapatkan list mukim
 {
  /*$this->db->select('idmukim, nama_mukim');
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
     */
           $this->db->where('idnegeri = 10');
       $this->db->where('iddaerah = 9');
     $getList = $this->db->get('lkp_mukim');
        return $getList->result();
   }

   function get_negeri()  //dapatkan list negeri
 {
/*$this->db->select('idnegeri, namanegeri');
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
     
    }*/
        $getList = $this->db->get('lkp_negeri');
        return $getList->result();
   }
   function get_negara()  //dapatkan list negara
 {/* $this->db->select('idnegara, fld_negara');
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
     
    }*/
       
        $getList = $this->db->get('lkp_negara');
        return $getList->result();
   } 
   function get_katagensi()  //dapatkan list negara
 {
  
        $getList = $this->db->get('lkp_katagensi');
        return $getList->result();
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
 
  
    
 
 ######################################################### page kandungan ###############################   
 

function get_pspao_akhir_ptf($pspaid){

  $this->db->select('pspa_semak_oleh_id');
  $this->db->from('tbl_pspao');
  $this->db->where('pspa_id',$pspaid);
  $query = $this->db->get();
  
  $row = $query->row();
  
  return $row->pspa_semak_oleh_id;

    }

    function get_pspao_akhir_pp($pspaid){

  $this->db->select('pspa_lulus_oleh_id');
  $this->db->from('tbl_pspao');
  $this->db->where('pspa_id',$pspaid);
  $query = $this->db->get();
  
  $row = $query->row();
  
  return $row->pspa_lulus_oleh_id;

    }


 function get_count_data($utiliti_sumber_man_id,$ptra_id,$kump_pengguna)
    {
         $this->db->select('*');
         $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
         $this->db->where('ptra_id', $ptra_id);
         $this->db->where('kump_pengguna_id',$kump_pengguna);
         $getUrusSya = $this->db->get('tbl_ptra_pata_f6_1a_modelstruktur');
         $rowcount = $getUrusSya->num_rows();
       // return $getUrusSya->result();
        
        

        return  $rowcount;
        
        
    }

    function get_count_panel($utiliti_sumber_man_id,$ptra_id)
    {
         $this->db->select('*');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('ptra_id', $ptra_id);
        $getUrusSya = $this->db->get('tbl_ptra_pata_f6_1a_panel_penilai');
         $rowcount = $getUrusSya->num_rows();

        return $rowcount;
        
    }
    
    //061113 yann
    function get_kem($idkem)
    {
        $this->db->select('namakem');
        $this->db->where('idkem',$idkem);
        $getKem = $this->db->get('lkp_kementerian');
        
        return $getKem->result();
    }
    
    function get_level($level_id)
    {
        $this->db->select('level_desc');
        $this->db->where('level_id',$level_id);
        $getList = $this->db->get('lkp_level');
        return $getList->result();
    }
     function get_jab_agensi($idjab_agensi)
    {
        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi',$idjab_agensi);
        $getList = $this->db->get('lkp_jab_agensi');
        return $getList->result();
    }
     
    function get_jabatan_agen()
    {
        $this->db->where('idkem',$this->session->userdata('user_kemid'));
        $getList = $this->db->get('lkp_jab_agensi');
        return $getList->result();
    }


   //function untuk cari kategori premis
    /*function get_kat_premis()
    {
        $getList = $this->db->get(' lkp_premis_kategori');
        return $getList->result();
    }   */ 
    
    //function untuk add new ptra
     function tambahptra()
    {

$sessionarray = $this->session->all_userdata();

        $data = array(     

                           'tahun' => $this->input->post('tahun'),        
                           'idkem' => $sessionarray['user_kemid'],
                           'idjab_agensi' => $sessionarray['user_jabid'],
                           'idnegeri' => $sessionarray['user_negid'],
                           'iddaerah' => 0,
                            'pspa_id' => $this->uri->segment(3),
                            'ptra_sedia_oleh_id' => $sessionarray['user_id'],
                            'ptra_sah_oleh_id' => $sessionarray['ptfid'],
                            'ptra_lulus_oleh_id' => $sessionarray['ppid'],
                            'ptra_tarikh_sedia' => date('Y-m-d H:i:s'),
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa'),


                            );
        
        $sumber = $this->db->insert('tbl_ptra', $data);
        $ptra_id= $this->db->insert_id();
        
        $data1 = array(   array( 'ptra_id' =>$ptra_id, 
                                  'kump_kand_id' => $this->input->post('kump_kand_id'),
                                  'kand_utama' => $this->input->post('kand_utama'),        
                                  'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                  'kand_utama_detail' => $this->input->post('pendahuluan'),
                                  'node_type' => $this->input->post('node_type'),
                                  'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array( 'ptra_id' =>$ptra_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                     'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array( 'ptra_id' =>$ptra_id,
                               'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                     'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'ptra_id' =>$ptra_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                     'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'ptra_id' =>$ptra_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                     'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'ptra_id' =>$ptra_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                     'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'ptra_id' =>$ptra_id,
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


    //function update tble ptra
  function updatemodelstruktur()
      {

      $this->db->where('ptra_id', $this->uri->segment(4));
      $delete_modelstruktur = $this->db->delete('tbl_ptra_pata_f6_1a_modelstruktur');  //delete data table modelstruktur
     
    if($delete_modelstruktur){  //dh bjaya delete masuk blik data yg update table modelstruktur
 
      // insert data ptf
    if ($this->input->post('ptf')!=NUll){
    foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$ptf,
                        'kump_pengguna_id'=>4
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
    }
     //insert data pif
    if ($this->input->post('pif')!=NUll){
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pif,
                        'kump_pengguna_id'=>7
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
    }
    //insert data pdf
    if ($this->input->post('pdf')!=NUll){
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pdf,
                        'kump_pengguna_id'=>5
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
    }
    // insert data pof
    if ($this->input->post('pof')!=NUll){
    foreach ($this->input->post('pof')as $pof)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pof,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
    }
      }

}
function updatepanelpenilai(){

      $this->db->where('ptra_id', $this->uri->segment(4));
      $delete_panel_penilai = $this->db->delete('tbl_ptra_pata_f6_1a_panel_penilai');  //

      if($delete_panel_penilai){

//insert panel penilai
    if ($this->input->post('panel_penilai')!=NUll){
    foreach ($this->input->post('panel_penilai')as $panel_penilai)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                       'utiliti_sumber_man_id'=>$panel_penilai,

                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_panel_penilai', $data);
        
    }
    }

  }


}
  
  function updatepanelkom(){


     
        $data = array(   
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawabdankuasa'),
                         'tugas_pegawai_lain' => $this->input->post('pegawailain')
                    );
        
        
        $this->db->where('ptra_id', $this->uri->segment(4));
       $this->db->update('tbl_ptra_pata_f6_1a_pelan_kom', $data);
       
    }
   

    
    //function update tble ptra
    
    
    function updateptra()
    {

        $sessionarray = $this->session->all_userdata();

        $data = array(     'tahun' => $this->input->post('tahun'),       
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa'),

                            );
        
        $this->db->where('ptra_id', $this->input->post('sunting'));
        $sumber = $this->db->update('tbl_ptra', $data);
        //$ppun_id= $this->db->insert_id();



  $kand_id = $this->input->post('kand_id');
 

        
        $data1 = array(   array( 
                                  'kandungan_id'=>$kand_id[0],
                                  'kand_utama_detail' => $this->input->post('pendahuluan'),
                                 
                                ),
            
                            array( 'kandungan_id'=>$kand_id[1],
                                     'kand_utama_detail' => $this->input->post('objektif'),
                                   
                                   ),
                           array( 
                                    'kandungan_id'=>$kand_id[2],
                                    'kand_utama_detail' => $this->input->post('carta'),
                                   
                                   ),
                            array( 
                                    'kandungan_id'=>$kand_id[3],
                                     'kand_utama_detail' => $this->input->post('skop'),
                                    
                                   ),
                            array( 
                                     'kandungan_id'=>$kand_id[4],
                                     'kand_utama_detail' => $this->input->post('sumber'),
                                  
                                   ),
                            array( 

                                     'kandungan_id'=>$kand_id[5],
                                     'kand_utama_detail' => $this->input->post('kawalan'),
                                    
                                   ),
                            array( 
                                    'kandungan_id'=>$kand_id[6],
                                    'kand_utama_detail' => $this->input->post('rujukan'),
                                  
                                   )
            );
        
        $sumber2 = $this->db->update_batch('tbl_kandungan', $data1,'kandungan_id');
      
        return $this->input->post('sunting');
        if($sumber)
        {
            $dataLog = array('myspata_userid' => $sessionarray['user_id'],
                             'aktvt' => 'Kemaskini maklumat kandungan PTRA',
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
    
     /* function updateptra($id)
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
        
        
        $this->db->where('ptra_id', $id);
  $this->db->update('tbl_ptra', $data);
        $ptra_id = $id;
    }
    
     //function update tble ptra
    function updateptra2()
    {
        
        $ptra_id = $this->uri->segment(3);
        $kand_id = $this->input->post('kandungan_id');
        $data2 = array(   array( 'ptra_id' =>$ptra_id,
                                  'kandungan_id' =>$kand_id[0],
                                  'kump_kand_id' => $this->input->post('kump_kand_id'),
                                  'kand_utama' => $this->input->post('kand_utama'),        
                                  'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                  'kand_utama_detail' => $this->input->post('pendahuluan'),
                                  'node_type' => $this->input->post('node_type'),
                                  'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array( 'ptra_id' =>$ptra_id,
                                'kandungan_id' =>$kand_id[1],
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                     'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array( 'ptra_id' =>$ptra_id,
                               'kandungan_id' =>$kand_id[2],
                               'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                     'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'ptra_id' =>$ptra_id,
                                'kandungan_id' =>$kand_id[3],
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                     'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'ptra_id' =>$ptra_id,
                                'kandungan_id' =>$kand_id[4],
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                     'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'ptra_id' =>$ptra_id,
                                'kandungan_id' =>$kand_id[5],
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                     'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'ptra_id' =>$ptra_id,
                                'kandungan_id' =>$kand_id[6],
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_rujukan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_rujukan'),
                                     'kand_utama_detail' => $this->input->post('rujukan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   )
            );
        
        
       // $this->db->where('kandungan_id', $kand_id);
        $this->db->update_batch('tbl_kandungan', $data2,'kandungan_id');
  
  return $ptra_id;
      
        
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
    */
 //segmen untuk kandungan
    public function get_ptra_from_segment($id){
    $this->db->select('*');
  $this->db->from('tbl_ptra');
  $this->db->join('tbl_kandungan','tbl_ptra.ptra_id = tbl_kandungan.ptra_id');
  $this->db->where('tbl_ptra.ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


public function update_kandungan_ptra($id){
  
  $input1 = $this->input->post('kand_id');
  $input2 = $this->input->post('kand_detail');
    
  $datang = array();
  
  for($i=0;$i<count($input1);$i++){
    $datang[$i]['kandungan_id'] = $input1[$i];
    $datang[$i]['kand_utama_detail'] = $input2[$i];
  }
  
  
  //print_r($datang);
  $this->db->update_batch('tbl_kandungan', $datang, 'kandungan_id');
  
  return $datang;
  
    
}
    
 ############################################################## page model struktur #########################################
    
//function list panel dlm table

      function get_panelpenilai()
    {
        $this->db->where('sumber_id = 2'); 
        $this->db->where('kump_pengguna = 10'); 
        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $getPanelpenilai = $this->db->get('tbl_utiliti_sumber_man');
        
        
        return $getPanelpenilai->result();
    }
    //update 061113 yann
      function get_panelpenilai_sumber($sumber)
    {
        $this->db->where('sumber_id',$sumber); 
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
        $this->db->where('utiliti_sumber_man_id', $id);
        $up_panel = $this->db->update('tbl_utiliti_sumber_man', $dataDetail);
        if($up_panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini maklumat panel penilai teknikal - PTRA',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
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
    
 //page model struktur
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
    
  function get_pelan_kom($idptra)
  {

  $this->db->select('*');
  $this->db->from('tbl_ptra_pata_f6_1a_pelan_kom');
  $this->db->where('ptra_id',$idptra);

  $query = $this->db->get();
    
  $row = $query->result();
  
  return $row;

    }
    
   
   function tambahmodelptra()
     {
  
       // insert data ptf
    if ($this->input->post('ptf')!=NUll){
    foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$ptf,
                        'kump_pengguna_id'=>4
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }}
     //insert data pif
    if ($this->input->post('pif')!=NUll){
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pif,
                        'kump_pengguna_id'=>7
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }}
    
    //insert data pdf
     if ($this->input->post('pdf')!=NUll){
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pdf,
                        'kump_pengguna_id'=>5
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
     }
    // insert data pof
    if ($this->input->post('pof')!=NUll){
    foreach ($this->input->post('pof')as $pof)
    
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pof,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_modelstruktur', $data);
    }
     }
    //insert panel penilai
     if ($this->input->post('panel_penilai')!=NUll){
     foreach ($this->input->post('panel_penilai')as $panel_penilai)
    {
        $data= array( 'ptra_id'=>$this->uri->segment(4),
                       'utiliti_sumber_man_id'=>$panel_penilai,

                    );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1a_panel_penilai', $data);
        
    }
     }
    // insert data pelan kecemasan
    $data = array(       'ptra_id'=>$this->uri->segment(4),
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawabdankuasa'),
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
   
   
   
   
    //function update tble ptra
   function updatemodelptra($id)
    {
        $data = array(     'ptra_id'=>$this->input->post('no'),
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawabdankuasa'),
                         'tugas_pegawai_lain' => $this->input->post('pegawailain')
                    );
        
        
        $this->db->where('ptra_id', $id);
  $this->db->update('tbl_ptra_pata_f6_1a_pelan_kom', $data);
        $ptra_id = $id;
    }
   
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
  
    function get_syarikat($syarikat_id)
    {
        $this->db->select('nama_syarikat');
        $this->db->where('syarikat_id', $syarikat_id);
        $getUrusSya = $this->db->get('tbl_syarikat');
        
        return $getUrusSya->result();
    }
  function count_data_in_tbl_ptra_pata_f6_model(){

         $this->db->select('*');
         $this->db->where('ptra_id', $this->uri->segment(4));
        // $this->db->where('utiliti_sumber_man_id',$this->uri->segment(4));
         $getdata = $this->db->get('tbl_ptra_pata_f6_1a_modelstruktur');

         $rowcount = $getdata->num_rows();
        
         return  $rowcount;

    }

	//added : diana 20/11/13
	function get_suratInfo($idPanel)
	{
		$this->db->where('utiliti_sumber_man_id', $idPanel);
        $retrieveDoc = $this->db->get('tbl_utiliti_sumber_man');
		$ret = $retrieveDoc->row();

		return $ret->path_suratlantikan;
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
   
   function get_count_pelan_pilih($skop_aktvt_id){

     $this->db->select('*');
     $this->db->where('skop_aktvt_id',$skop_aktvt_id);
     $this->db->where('ptra_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_ptra_pata_f6_1b_skop_pilihan');
  
    // $rowcount = $query->num_rows();

     //return $rowcount;
     //$row = $query->result();

     return $query->result();

    }
   
     function skop_pilihan_id(){

     $this->db->select('ptra_pata_f6_1b_skop_pilihan_id');
     $this->db->where('ptra_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_ptra_pata_f6_1b_skop_pilihan');

     return $query->result();

    }   
    
      function skop_aktvt_id_in_db(){

     $this->db->select('skop_aktvt_id');
     $this->db->where('ptra_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_ptra_pata_f6_1b_skop_pilihan');

     return $query->result();

    }
    

    
	//added : diana 15/11/13
	//function untuk add new model struktur ptra
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
         /*    
          foreach ($this->input->post('fax')as $fax)
            {
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('kat_pej_id_fax')
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_urus_pej', $data);
            }
            
           foreach ($this->input->post('tel')as $tel)
            {
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $tel,
                              'kat_pej_id' => $this->input->post('kat_pej_id_tel')
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_urus_pej', $data);
            }
            
             foreach ($this->input->post('kom')as $foto)
            {
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('urus_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b_skop_pilihan', $data);
            }
             foreach ($this->input->post('foto')as $foto)
            {
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('urus_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b_skop_pilihan', $data);
            }
             foreach ($this->input->post('foto')as $foto)
            {
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('urus_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b_skop_pilihan', $data);
            }
             foreach ($this->input->post('foto')as $foto)
            {
                $data= array( 'ptra_id'=>$this->input->post('ptra_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('urus_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_ptra_pata_f6_1b_skop_pilihan', $data);
            }
        */
    }


     function get_model_ptf($utiliti_sumber_man_id,$ptra_id)
    {
         $this->db->select('*');
         //$this->db->from('tbl_ptra_pata_f6_1b1c_sumber_man');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('ptra_id', $ptra_id);
        //$this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
        // $this->db->where('skop_aktvt_id', $skop_aktvt_id);
        $getUrusSya = $this->db->get('tbl_ptra_pata_f6_1a_modelstruktur');
        
        return $getUrusSya->result();
        
    }
    function get_model_panel($utiliti_sumber_man_id,$ptra_id)
    {
         $this->db->select('*');
         //$this->db->from('tbl_ptra_pata_f6_1b1c_sumber_man');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('ptra_id', $ptra_id);
        //$this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
        // $this->db->where('skop_aktvt_id', $skop_aktvt_id);
        $getUrusSya = $this->db->get('tbl_ptra_pata_f6_1a_panel_penilai');
        
        return $getUrusSya->result();
        
    }
    
      /*function tambahsumberrancang()
    {
        $data = array(      'ptra_id' => $this->input->post('ptra_id'),
                            'gaji_kos_flag' => $this->input->post('kosflag'),
                            'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                            'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),
                            'kos_gaji' => $this->input->post('gaji'),
                            'kos_kerja_lebih_masa' => $this->input->post('kos'),
                            'kat_sumber_man_id' => $this->input->post('kat_sumber_man_id'),
                            
                            );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_sumber_man', $data);
        
    }
*/

    /*function tambahsumberrancang($cat)
    {
         if($cat=="rancang"){

          $value1 = $this->input->post('kat_sumber_man_id_rancang');
          $value2 = $this->input->post('utiliti_sumber_man_id_rancang');
         }else if($cat=="lulus"){
          $value1 = $this->input->post('kat_sumber_man_id_lulus');
          $value2 = $this->input->post('utiliti_sumber_man_id_lulus');
         }else{
          $value1 = $this->input->post('kat_sumber_man_id_isi');
          $value2 = $this->input->post('utiliti_sumber_man_id_isi');
         }


        $data = array(      'ptra_id' => $this->input->post('ptra_id'),
                            'gaji_kos_flag' => $this->input->post('kosflag'),
                            'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                            'utiliti_sumber_man_id' =>$value2,
                            'kos_gaji' => $this->input->post('gaji'),
                            'kos_kerja_lebih_masa' => $this->input->post('kos'),
                            'kat_sumber_man_id' => $value1,
                            
                            );
        
        $sumber = $this->db->insert('tbl_ptra_pata_f6_1b1c_sumber_man', $data);
        
    }*/
  
  /*function tambahsumberrancang($cat)
    {
        
         if($cat=="rancang"){
          $value1 = $this->input->post('kat_sumber_man_id_rancang');
          $value2 = $this->input->post('utiliti_sumber_man_id_rancang');
      
      $index = $this->input->post('indexofrancang');
      $kosgaji = $this->input->post('gaji_rancang');
          $koskerjalebihmasa = $this->input->post('kos_rancang');
      
         }else if($cat=="lulus"){
          $value1 = $this->input->post('kat_sumber_man_id_lulus');
          $value2 = $this->input->post('utiliti_sumber_man_id_lulus');
      
      $index = $this->input->post('indexoflulus');
      $kosgaji = $this->input->post('gaji_lulus');
          $koskerjalebihmasa = $this->input->post('kos_lulus');
      
         }else{
          $value1 = $this->input->post('kat_sumber_man_id_isi');
          $value2 = $this->input->post('utiliti_sumber_man_id_isi');
      
      $index = $this->input->post('indexofisi');
      $kosgaji = $this->input->post('gaji_isi');
          $koskerjalebihmasa = $this->input->post('kos_isi');
         }

    
    $ptraid = $this->input->post('ptra_id');
    $gajikosflag = $this->input->post('kosflag');
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
    */
  
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

     ######################################################## page kawalan rekod ###############################
     
    function get_kawalanrekod($ptra_id)
    {

        $this->db->order_by("ptra_pata_f6_1d_id", "DESC");
        $this->db->where('ptra_id', $ptra_id);
        $getKawalanrekod = $this->db->get('tbl_ptra_pata_f6_1d');
        
        return $getKawalanrekod->result();
    }
    
    
        function tambahkawalan_rekod()
    {
              $data = array(//'ptra_pata_f6_1d_id' => $this->input->post('ptra_pata_f6_1d_id'),
                            'f6_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f6_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1'),
                            'ptra_id' => $this->input->post('no')
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
    
   
    
    function get_kawalanrekod_1($ptra_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('ptra_pata_f6_1d_id', $ptra_id);
        $getKawalanrekod = $this->db->get('tbl_ptra_pata_f6_1d');
        
        return $getKawalanrekod->result();
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
                             'masa_aktvt' => date('Y-m-d H:i:s'),
                             'modul' => 'Model Struktur PTRA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        }
    }
    

    ################################ page dokumen rujukan ##################################################
    
      
  function get_dokumenrujukan($ptra_id)
  {
    $this->db->order_by("lampiran_id", "DESC");
    $this->db->where('ptra_id', $ptra_id);
    $getDokumenrujukan = $this->db->get('tbl_lampiran');
        
    return $getDokumenrujukan->result();
  }

  
   
  //add : diana ismail 25/10/2013
  function get_documentInfo($lampiran_id)
  {
    $this->db->where('lampiran_id', $lampiran_id);
        $retrieveDoc = $this->db->get('tbl_lampiran');
    $ret = $retrieveDoc->row();

    $docInfo = array($ret->lokasi_fail,$ret->nama_fail_asal);
    return $docInfo;
  }
  
    






  //Edited by : Seri
  //Date      : 14112013
  //Desc      : Add new document for PTRA (Borang 1e)

  function tambahdokumen($dataFile=array())
  {
    $no=$this->uri->segment(3);
           
    
    foreach($dataFile as $valueDesc)
    { 
      $fileData[] = $valueDesc; 
    }
   

    $data = array(  'nama_fail'      => $fileData[0],
                    'nama_fail_asal' => $fileData[1],
                    'lokasi_fail'    =>$fileData[2],
                    'jenis_fail'     =>$fileData[3],
                    'tarikh_upload'  => date('Y-m-d H:i:s'),
                    'ptra_id'        => $fileData[4]);
    
    $panel = $this->db->insert('tbl_lampiran', $data);
   
        
    if($panel)
    {
      $dataLog = array( 'myspata_userid' => $this->session->userdata('user_id'),
                        'aktvt'          => 'Tambah kawalan rekod - PTRA',
                        'masa_aktvt'     => date('Y-m-d H:i:s'),
                        'modul'          => 'Kawalan Rekod PTRA');
            
      $this->db->insert('tbl_aktvt_log', $dataLog);
    
      return true;
    }
        

    else
    {
      return false;
    } 
  }







  
  /*
    Added : Diana 25/10/2013
    Desc : Delete file
  */
    function deleteDoc($docID)
  {
    $docDelete = $this->db->delete('tbl_lampiran', array('lampiran_id' => $docID)); 
    return $docDelete;
  }
      
   
    ############################ page untuk summary ptra borang baru######################################################

public function get_all_kandungan_ptra($id){
    $this->db->select('*');
  $this->db->from('tbl_ptra');
  $this->db->join('tbl_kandungan','tbl_ptra.ptra_id = tbl_kandungan.ptra_id');
  $this->db->where('tbl_ptra.ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
    
    
    
    ###################################### page untuj senarai ppd ptra#####################################################################
    

  

function get_ptra($pspa_id)
    {
    $this->db->where('pspa_id',$pspa_id);
        $getPtra = $this->db->get('tbl_ptra');
        
        return $getPtra->result();
    
    
    
    }
  
  //added : diana 31/10/2013
  function get_ptra_status($pspa_id)
    {
    /*$this->db->where('pspa_id',$pspa_id);
        $getPtra = $this->db->get('tbl_ptra');
        
        return $getPtra->result();*/
    
    $this->db->select('*');
    $this->db->from('tbl_ptra');
    $this->db->join('tbl_myspata_user','tbl_ptra.ptra_sedia_oleh_id = tbl_myspata_user.myspata_userid');
    $this->db->where('pspa_id',$pspa_id);
        $getPtra = $this->db->get();
        
        return $getPtra->result();
    
    }
  

######################################### page summary pp ptra ##################################################
//name : fatin
//date : 26/10/13
//desc : for summary_pp_ptra view
 
function get_model_summary_ptra($id){
        
    $this->db->select('*');
  $this->db->from('tbl_ptra_pata_f6_1a_pelan_kom');
  $this->db->where('ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_skop_summary_ptra($id){
        
    $this->db->select('*');
  $this->db->from('tbl_ptra_pata_f6_1b_skop_pilihan');
  $this->db->where('ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_skop2_summary_ptra($id){
        
    $this->db->select('*');
  $this->db->from('tbl_ptra_pata_f6_1b1c');
  $this->db->where('ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_sumber_summary_ptra($id){
        
    $this->db->select('*');
  $this->db->from('tbl_ptra_pata_f6_1b1c_sumber_man');
  $this->db->where('ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_pej_summary_ptra($id){
        
    $this->db->select('*');
  $this->db->from('tbl_ptra_pata_f6_1b1c_urus_pej');
  $this->db->where('ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_kawalan_summary_ptra($id){
        
    $this->db->select('*');
  $this->db->from('tbl_ptra_pata_f6_1d');
  $this->db->where('ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_dokumen_summary_ptra($id){
        
    $this->db->select('*');
  $this->db->from('tbl_lampiran');
  $this->db->where('ptra_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}

 
######################################### page untuk arahan sedia pof,pif,ppd #####################################################################
     function get_user_pelan_list($user_kemid,$kump_pengguna_id)  //dapatkan senarai user
 {

      $this->db->select('tbl_myspata_user_to_matrix.*,tbl_myspata_user.*,a.kump_pengguna_id');
       $this->db->where('tbl_myspata_user.idkem',$user_kemid);
       $this->db->where('a.kump_pengguna_id',$kump_pengguna_id);
       $this->db->from('tbl_myspata_user');
       $this->db->join('tbl_myspata_user_to_matrix', 'tbl_myspata_user_to_matrix.myspata_userid = tbl_myspata_user.myspata_userid', 'inner');
       $this->db->join('tbl_user_matrix as a', 'a.role_pengguna_id = tbl_myspata_user_to_matrix.role_pengguna_id');
       $this->db->group_by('tbl_myspata_user.myspata_userid');
       $this->db->order_by('tbl_myspata_user.nama_user', 'ASC');
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

       
    
   
   } 
  
##################### page arahan sedia #############
    function tambaharahanpelanpif($noti_id,$id)
    {
        //$pof=$this->input->post('userid1');
        $pif=$this->input->post('userid');
        $data = array(   'pspa_id' => $id,   
                         'notifikasi_id' => $noti_id,        
                            'ptra' => $this->input->post('ptra'),
                            'popa' => $this->input->post('popa'),
                            'pnpa' => $this->input->post('pnpa'),
                            'ppun' => $this->input->post('ppun'),
                            'pla' => $this->input->post('pla'),
                            //'pof_id' => $pof[0],
                            'pif_id' => $pif[0]
            
                           );
        
        $sumber = $this->db->insert('tbl_notifikasi_pelan', $data);

    }
      function tambaharahanpelanpof($noti_id,$id)
    {
        $pof=$this->input->post('userid');
        //$pif=$this->input->post('userid');
        $data = array(   'pspa_id' => $id,   
                         'notifikasi_id' => $noti_id,        
                            'ptra' => $this->input->post('ptra'),
                            'popa' => $this->input->post('popa'),
                            'pnpa' => $this->input->post('pnpa'),
                            'ppun' => $this->input->post('ppun'),
                            'pla' => $this->input->post('pla'),
                            'pof_id' => $pof[0],
                            //'pif_id' => $pif[0]
            
                           );
        
        $sumber = $this->db->insert('tbl_notifikasi_pelan', $data);

    }
      function tambaharahanpelanppd($noti_id,$id)
    {
        //$pof=$this->input->post('userid1');
        //$pif=$this->input->post('userid');
        $data = array(   'pspa_id' => $id,   
                         'notifikasi_id' => $noti_id,        
                            'ptra' => $this->input->post('ptra'),
                            'popa' => $this->input->post('popa'),
                            'pnpa' => $this->input->post('pnpa'),
                            'ppun' => $this->input->post('ppun'),
                            'pla' => $this->input->post('pla'),
                            //'pof_id' => $pof[0],
                            //'pif_id' => $pif[0]
            
                           );
        
        $sumber = $this->db->insert('tbl_notifikasi_pelan', $data);

    }
    
    
    public function get_pelan_arahan($id,$ptra,$popa,$pnpa,$ppun,$pla){
        
    $this->db->select('*');
  $this->db->from('tbl_notifikasi_pelan');
  $this->db->where('pspa_id',$id);
  $this->db->where('ptra',$ptra);
   $this->db->where('popa',$popa);
   $this->db->where('pnpa',$pnpa);
    $this->db->where('ppun',$ppun);
     $this->db->where('pla',$pla);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
 public function get_pelan_ptra($id,$ptra){
        
    $this->db->select('*');
  $this->db->from('tbl_notifikasi_pelan');
  $this->db->where('pspa_id',$id);
  $this->db->where('ptra',$ptra);
   
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
 public function get_pelan_popa($id,$popa){
        
    $this->db->select('*');
  $this->db->from('tbl_notifikasi_pelan');
  $this->db->where('pspa_id',$id);
  $this->db->where('popa',$popa);
   
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
 public function get_pelan_pnpa($id,$pnpa){
        
    $this->db->select('*');
  $this->db->from('tbl_notifikasi_pelan');
  $this->db->where('pspa_id',$id);
  $this->db->where('pnpa',$pnpa);
   
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
 public function get_pelan_ppun($id,$ppun){
        
    $this->db->select('*');
  $this->db->from('tbl_notifikasi_pelan');
  $this->db->where('pspa_id',$id);
  $this->db->where('ppun',$ppun);
   
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
 public function get_pelan_pla($id,$pla){
        
    $this->db->select('*');
  $this->db->from('tbl_notifikasi_pelan');
  $this->db->where('pspa_id',$id);
  $this->db->where('pla',$pla);
   
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
 
public function insert_status_log($id_pspao_akhir,$status,$ptra_id){

$sessionarray = $this->session->all_userdata();


  $data = array(
    'status_id' => $status,
    'status_tarikh' => date('Y-m-d H:i:s'),
    'myspata_userid' => $sessionarray['user_id'],
    //'status_ulasan' => $status_ulasan,
    'pspa_id' => $id_pspao_akhir,
    'kump_kand_id' => 2,
    'rekod_pelan_id' => $ptra_id
    
  );

  $this->db->insert('tbl_statuslog', $data);


}

function get_ptra_sah_value($ptra_id,$pspa_id){

    $this->db->select('ptra_tarikh_sah');
    $this->db->from('tbl_ptra');
    $this->db->where('pspa_id',$pspa_id);
    $this->db->where('ptra_id',$ptra_id);
    
    $query = $this->db->get();
    $row = $query->row();
  
    return $row->ptra_tarikh_sah;
  }
        
 public function get_ptfid_ptra($id){
  $this->db->select('pspa_semak_oleh_id');
  $this->db->where('pspa_id', $id);
  $query = $this->db->get('tbl_pspao');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pspa_semak_oleh_id;
  } 
  }
  public function get_ppid_ptra($id){
  $this->db->select('pspa_lulus_oleh_id');
  $this->db->where('pspa_id', $id);
  $query = $this->db->get('tbl_pspao');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pspa_lulus_oleh_id;
  } 
  }
   public function get_ppdid_ptra($id,$ptra_id){
  $this->db->select('ptra_sedia_oleh_id');
  $this->db->where('pspa_id', $id);
        $this->db->where('ptra_id', $ptra_id);
  $query = $this->db->get('tbl_ptra');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->ptra_sedia_oleh_id;
  } 
  }
  public function get_pifid_ptra($id,$ptra){
  $this->db->select('pif_id');
  $this->db->where('pspa_id', $id);
  $this->db->where('ptra', $ptra);
  $query = $this->db->get('tbl_notifikasi_pelan');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pif_id;
  } 
  }
  
  public function get_pofid_ptra($id,$ptra){
  $this->db->select('pof_id');
  $this->db->where('pspa_id', $id);
        $this->db->where('ptra',$ptra);
  $query = $this->db->get('tbl_notifikasi_pelan');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pof_id;
  } 
  }
  


  function get_ptra2($pspa_id,$ptra_id)
    {
         $this->db->select('*');
         $this->db->where('pspa_id',$pspa_id);
         $this->db->where('ptra_id',$ptra_id);
         $this->db->where('idkem', $this->session->userdata('user_kemid'));
         //$this->db->where_not_in('ptra_tarikh_sedia','0000-00-00 00:00:00');
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
    
 public function insert_status_log_ulasan($id,$status,$ptra_id){

$sessionarray = $this->session->all_userdata();


  $data = array(
    'status_id' => $status,
    'status_tarikh' => date('Y-m-d H:i:s'),
    'myspata_userid' => $sessionarray['user_id'],
    'status_ulasan' => $this->input->post('ulasan'),
    'pspa_id' => $id,
    'kump_kand_id' => 4,
    'rekod_pelan_id' => $ptra_id
    
  );

  $this->db->insert('tbl_statuslog', $data);


}
function update_ptra_date_sah($id,$ptra_id){

$data = array(

    'ptra_tarikh_sah' => date('Y-m-d')
  );
  $this->db->where('pspa_id', $id);
  $this->db->where('ptra_id', $ptra_id);
  $this->db->update('tbl_ptra', $data);


}
function update_ptra_date_lulus($id,$ptra_id){

$data = array(

    'ptra_tarikh_lulus' => date('Y-m-d')
  );
  $this->db->where('pspa_id', $id);
  $this->db->where('ptra_id', $ptra_id);
  $this->db->update('tbl_ptra', $data);


}

//added : diana 31/10/2013 
//desc : popup status
function get_senarai_status($pspa_id,$kump_kand_id,$rekod_pelan_id)
   {
       
    
       $this->db->select('*');
      $this->db->from('tbl_statuslog');
       $this->db->where('pspa_id', $pspa_id);
       $this->db->where('kump_kand_id', $kump_kand_id);
     $this->db->where('rekod_pelan_id', $rekod_pelan_id);
       $this->db->join('lkp_status','lkp_status.status_id= tbl_statuslog.status_id');
       $this->db->join('tbl_myspata_user','tbl_myspata_user.myspata_userid= tbl_statuslog.myspata_userid');
      
         $this->db->order_by("statuslog_id", "DESC");



       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

    
   }   
   
   //added : diana 31/10/2013 
//desc : popup status
   function get_namakategoristatus($kump_kand_id)
    {
        $this->db->select('*');
        $this->db->where('kump_kand_id', $kump_kand_id);
        $get_namasta = $this->db->get('lkp_kump_kand');
        
        return $get_namasta->result();
    }
  
  //get year 
  function get_year_pspao($pspao_id)
  {
        $this->db->where('pspa_id', $pspao_id);
        $get_allyear = $this->db->get('tbl_pspao');
    
    $row = $get_allyear->row();
         
    $data = array($row->tahun_mula, $row->tahun_akhir);
    
        return $data;
  }
  
  /*
    add  : diana 31/10/2013
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
      
	  /*
      $human_cost = $this->cal_man_cost($ptra_id);
      $alat_cost = $this->cal_alatkerja_cost($ptra_id);
      $pejabat_cost = $this->cal_pejabat_cost($ptra_id);
      
      $total_cost = $bajet_aktiviti+$human_cost+$alat_cost+$pejabat_cost;
	  */
	  $total_cost = $bajet_aktiviti;
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
      
	  /*
      $human_cost = $this->cal_man_cost_skop($ptra_id,$skop_aktiviti_id);
      $alat_cost = $this->cal_alatkerja_cost_skop($ptra_id,$skop_aktiviti_id);
      $pejabat_cost = $this->cal_pejabat_cost_skop($ptra_id,$skop_aktiviti_id);
      
      $total_cost = $bajet_aktiviti+$human_cost+$alat_cost+$pejabat_cost;
	  */
	  $total_cost = $bajet_aktiviti;
      
    }     
    else
    {
      $total_cost = 0;
    }
    
    return number_format($total_cost,2);
  }
  
   function get_noti_pelan($pspa_id){

    $this->db->select('notifikasi_id');
    $this->db->from('tbl_notifikasi_pelan');
    //$this->db->where('ptra_id',$ptra_id);
     $this->db->where('pspa_id',$pspa_id);
    
   $query = $this->db->get();
  $row = $query->row();

    return $row->notifikasi_id;
  }
    public function get_ulasan_terbaru($pspaid,$kump,$ptra_id){
  //$this->db->select('status_ulasan');
  $this->db->where('pspa_id', $pspaid);
  $this->db->where('kump_kand_id', $kump);
        $this->db->where('rekod_pelan_id', $ptra_id);
  //$this->db->order_by('statuslog_id', 'DESC');
  
  //echo $pspaid;
  //echo $kump;
  //echo $ptra_id;

  $query = $this->db->get('tbl_statuslog');
  
  //if($query){ 
    
    //$row = $query->row();
    if($query->num_rows())
    {
      //foreach ($query as result() as $row) {
      $row = $query->row();
      $value=$row->status_ulasan;
      //}
      
     // echo 'lalu code'.$value;
    }
    else
      {
        $value='';
      }
    return $value;

    //return $row->status_ulasan;
  //}else{
    //return FALSE;
  //}
  }
   ///////////// status untuk page summary, by seri /////////////////////////

  function get_status_summary($ptra_id)
  {
    //tbl_ptra_pata_f6_1a_modelstruktur
    //tbl_ptra_pata_f6_1a_panel_penilai
    //tbl_ptra_pata_f6_1a_pelan_kom

    $this->db->select('*');
    $this->db->from('tbl_ptra_pata_f6_1a_modelstruktur');
    $this->db->join('tbl_ptra_pata_f6_1a_pelan_kom','tbl_ptra_pata_f6_1a_pelan_kom.ptra_id= tbl_ptra_pata_f6_1a_modelstruktur.ptra_id');
    $this->db->join('tbl_ptra_pata_f6_1a_panel_penilai', 'tbl_ptra_pata_f6_1a_panel_penilai.ptra_id = tbl_ptra_pata_f6_1a_modelstruktur.ptra_id');
    $this->db->where('tbl_ptra_pata_f6_1a_modelstruktur.ptra_id', $ptra_id);

    $query = $this->db->get();
  
    $row = $query->result();
  
    return $row;

  }



  function get_status_summary2($ptra_id)
  {
    //tbl_ptra_pata_f6_1b_skop_pilihan
    //tbl_ptra_pata_f6_1b1c

    $this->db->select('*');
    $this->db->from('tbl_ptra_pata_f6_1b_skop_pilihan');
    $this->db->join('tbl_ptra_pata_f6_1b1c','tbl_ptra_pata_f6_1b1c.ptra_id= tbl_ptra_pata_f6_1b_skop_pilihan.ptra_id');
    $this->db->where('tbl_ptra_pata_f6_1b_skop_pilihan.ptra_id', $ptra_id);

    $query = $this->db->get();
  
    $row = $query->result();
  
    return $row;

  }




  function get_status_summary3($ptra_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_ptra_pata_f6_1d');
    $this->db->where('ptra_id', $ptra_id);


    $query = $this->db->get();
  

    if ($query->num_rows() > 0)
    {
      $row = $query->row(); 

      if ($row->ptra_id != NULL && $row->f6_1d_jenis_rekod != NULL && $row->f6_1d_lokasi != NULL && $row->tempoh != NULL)
      {
        return true;
      }

      else
      {
        return false;
      }

    }

    return false;

  }




  function get_status_summary4($ptra_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_lampiran');
    $this->db->where('ptra_id', $ptra_id);


    $query = $this->db->get();

    $row = $query->result();
  
    return $row;

  }


  //update Yann 271113
 function tambahpraptra()
    {

$sessionarray = $this->session->all_userdata();
$idkatagensi=$this->input->post('kumpagensi');
$idkem=$this->input->post('idkem');
$idjab=$this->input->post('jabatan');
$idnegara=$this->input->post('negara');
$idnegeri=$this->input->post('negeri');
$iddaerah=$this->input->post('daerah');
$idmukim=$this->input->post('mukim');
$idkatpremis=$this->input->post('kat_premis');

        $data = array(     
                            'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                            'idnegeri' => $idnegeri,
                            'iddaerah' =>  $iddaerah,
                            'idmukim' =>  $idmukim,
                            'idpremis_kategori' => $this->input->post('premis'),
                            'idpremis' => $idkatpremis,
                            'no_dpa' => $idkatagensi.$idkem.$idjab.$idnegara.'.'.$idnegeri.$iddaerah.$idmukim.'.'.$idkatpremis
                           


                            );
        
        $sumber = $this->db->insert('tbl_ptra_prereg_premis', $data);
        $ptra_reg= $this->db->insert_id();
        //$nodpa='no_dpa';
        return $ptra_reg;
    }

    function updatepraptra($ptra_prereg_premis_id){

$sessionarray = $this->session->all_userdata();
$idkatagensi=$this->input->post('kumpagensi');
$idkem=$this->input->post('idkem');
$idjab=$this->input->post('jabatan');
$idnegara=$this->input->post('negara');
$idnegeri=$this->input->post('negeri');
$iddaerah=$this->input->post('daerah');
$idmukim=$this->input->post('mukim');
$idkatpremis=$this->input->post('kat_premis');
$nodpa=$idkatagensi.$idkem.$idjab.$idnegara.'.'.$idnegeri.$iddaerah.$idmukim.'.'.$idkatpremis;
        $data = array(     
                            'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                            'idnegeri' => $idnegeri,
                            'iddaerah' =>  $iddaerah,
                            'idmukim' =>  $idmukim,
                            'idpremis_kategori' => $this->input->post('premis'),
                            'idpremis' => $idkatpremis,
                            'no_dpa' => $nodpa
                           


                            );
        
        $this->db->where('ptra_prereg_premis_id', $ptra_prereg_premis_id);
     $this->db->update('tbl_ptra_prereg_premis', $data);
      return $nodpa;
    }
    
    function updateptradpa($nodpa)
    {
      $data1 = array(     
                            'nodpa' =>$nodpa,
                           


                            );
        
        $this->db->where('ptra_id', $this->uri->segment(4));
      $this->db->update('tbl_ptra', $data1);
       
      
       
    }
        function tambahprajlnptra()
    {

$sessionarray = $this->session->all_userdata();
$idkatagensi=$this->input->post('kumpagensi');
$idkem=$this->input->post('idkem');
$idjab=$this->input->post('jabatan');
$idnegara=$this->input->post('negara');

        $data = array(     
                            'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                           'idpremis_kategori' => $this->input->post('premis'),
                           'no_dpa' => $idkatagensi.$idkem.$idjab.$idnegara.'.'
                           );
        
        $sumber = $this->db->insert('tbl_ptra_prereg_premis', $data);
        $ptra_reg= $this->db->insert_id();
        //$nodpa='no_dpa';
        return $ptra_reg;
    }
    
    function updatepraptrajalan($ptra_prereg_premis_id){

        $sessionarray = $this->session->all_userdata();
        $idkatagensi=$this->input->post('kumpagensijalan');
        $idkem=$this->input->post('idkemjalan');
        $idjab=$this->input->post('jabatanjalan');
        $idnegara=$this->input->post('negarajalan');
        $nodpa=$idkatagensi.$idkem.$idjab.$idnegara.'.';
        
        $data = array(     
                            'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                           'idpremis_kategori' => $this->input->post('premisjalan'),
                           'no_dpa' => $nodpa
                           );
        
        $this->db->where('ptra_prereg_premis_id', $ptra_prereg_premis_id);
        $this->db->update('tbl_ptra_prereg_premis', $data);
        return $nodpa;
    }
     function tambahprapemptra()
    {

        $sessionarray = $this->session->all_userdata();
        $idkatagensi=$this->input->post('kumpagensi');
        $idkem=$this->input->post('idkem');
        $idjab=$this->input->post('jabatan');
        $idnegara=$this->input->post('negara');
        $idnegeri=$this->input->post('negeri');
        $iddaerah=$this->input->post('daerah');
        $idkatpremis=$this->input->post('kat_premis');
                $data = array(     
                            'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                            'idnegeri' => $idnegeri,
                            'iddaerah' =>  $iddaerah,
                            'idpremis_kategori' => $this->input->post('premis'),
                            'idpremis' => $idkatpremis,
                            'no_dpa' => $idkatagensi.$idkem.$idjab.$idnegara.'.'.$idnegeri.$iddaerah.'.'.$idkatpremis
                           


                            );
        
        $sumber = $this->db->insert('tbl_ptra_prereg_premis', $data);
        $ptra_reg= $this->db->insert_id();
        //$nodpa='no_dpa';
        return $ptra_reg;
    }
    
    function updatepraptrapem($ptra_prereg_premis_id){

        $sessionarray = $this->session->all_userdata();
        $idkatagensi=$this->input->post('kumpagensipem');
        $idkem=$this->input->post('idkempem');
        $idjab=$this->input->post('jabatanpem');
        $idnegara=$this->input->post('negarapem');
        $idnegeri=$this->input->post('negeripem');
        $iddaerah=$this->input->post('daerahpem');
        $idkatpremis=$this->input->post('kat_premispem');
        $nodpa=$idkatagensi.$idkem.$idjab.$idnegara.'.'.$idnegeri.$iddaerah.'.'.$idkatpremis;
        
        $data = array(    'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                            'idnegeri' => $idnegeri,
                            'iddaerah' =>  $iddaerah,
                            'idpremis_kategori' => $this->input->post('premispem'),
                            'idpremis' => $idkatpremis,
                           'no_dpa' => $nodpa
                           );
        
        $this->db->where('ptra_prereg_premis_id', $ptra_prereg_premis_id);
        $this->db->update('tbl_ptra_prereg_premis', $data);
        return $nodpa;
    }
     function tambahprasaliranptra()
    {

$sessionarray = $this->session->all_userdata();
$idkatagensi=$this->input->post('kumpagensi');
$idkem=$this->input->post('idkem');
$idjab=$this->input->post('jabatan');
$idnegara=$this->input->post('negara');
$idkatpremis=$this->input->post('kat_premis');

        $data = array(     
                            'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                           'idpremis_kategori' => $this->input->post('premis'),
                            'idpremis' => $idkatpremis,
                            'no_dpa' => $idkatagensi.$idkem.$idjab.$idnegara.'.'.$idkatpremis
                           


                            );
        
        $sumber = $this->db->insert('tbl_ptra_prereg_premis', $data);
        $ptra_reg= $this->db->insert_id();
        //$nodpa='no_dpa';
        return $ptra_reg;
    }
     function updatepraptrasaliran($ptra_prereg_premis_id){

        $sessionarray = $this->session->all_userdata();
        $idkatagensi=$this->input->post('kumpagensisaliran');
        $idkem=$this->input->post('idkemsaliran');
        $idjab=$this->input->post('jabatansaliran');
        $idnegara=$this->input->post('negarasaliran');
        $idkatpremis=$this->input->post('kat_premissaliran');
        $nodpa=$idkatagensi.$idkem.$idjab.$idnegara.'.'.$idkatpremis;
        
        $data = array(    'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                            'idpremis_kategori' => $this->input->post('premissaliran'),
                            'idpremis' => $idkatpremis,
                           'no_dpa' => $nodpa
                           );
        
        $this->db->where('ptra_prereg_premis_id', $ptra_prereg_premis_id);
        $this->db->update('tbl_ptra_prereg_premis', $data);
        return $nodpa;
    }
    
    function get_nodpa($ptra_reg)
    {
      $this->db->select('*');
    $this->db->from('tbl_ptra_prereg_premis');
    $this->db->where('ptra_prereg_premis_id', $ptra_reg);


    $query = $this->db->get();

    $row = $query->result();
  
    return $row;  
    }
    function get_kem1($idkem)
    {
      $this->db->select('*');
    $this->db->from('lkp_kementerian');
    $this->db->where('idkem', $idkem);


    $query = $this->db->get();

    $row = $query->result();
  
    return $row;  
    }
    
    function get_count_nodpa($ptra_id){

     $this->db->select('*');
     //$query = $this->db->get('tbl_ptra');
     $this->db->from('tbl_ptra');
      $this->db->join('tbl_ptra_prereg_premis','tbl_ptra.nodpa = tbl_ptra_prereg_premis.no_dpa');
    
     $this->db->where('tbl_ptra.ptra_id',$ptra_id);
      $query = $this->db->get();
  
     $row = $query->result();
  
  return $row;
    }
    
     function get_katpremis_aset($idpremis_kategori)
    {
      $this->db->select('*');
    //$this->db->from('tbl_ptra_prareg_premis');
      $this->db->from('tbl_ptra');
      $this->db->where('tbl_ptra.ptra_id',$this->uri->segment(4));
      $this->db->join('tbl_ptra_prereg_premis','tbl_ptra.nodpa = tbl_ptra_prereg_premis.no_dpa');
    
     //$this->db->where('tbl_ptra.ptra_id',$this->uri->segment(4));
     
    $this->db->where('tbl_ptra_prereg_premis.idpremis_kategori', $idpremis_kategori);


    $query = $this->db->get();

    $row = $query->result();
  
    return $row;  
    }
	
	//updated: diana 5/12/13
	function get_daerah_negeri($idnegeri)  //dapatkan list daerah
	{
		$this->db->where('idnegeri_myspata1',$idnegeri);
		$this->db->order_by('nama_daerah', 'ASC');
		$getList = $this->db->get('lkp_daerah');
		
		if($getList->result())
		{
			foreach ($getList->result() as $city) 
			{
              $cities[$city->iddaerah_myspata1] = $city->nama_daerah;
			}
		   return $cities;
		}
	}
	
	//updated : diana 5/12/13
	function get_mukim_daerahnegeri($idnegeri,$iddaerah)  //dapatkan list mukim
	{
		$this->db->where('idnegeri_myspata1',$idnegeri);
		$this->db->where('iddaerah_myspata1',$iddaerah);
		$this->db->order_by('fld_mukimdesc', 'ASC');
		$getList = $this->db->get('lkp_mukim');
		
		if($getList->result())
		{
			foreach ($getList->result() as $mkm) 
			{
              $mukim[$mkm->idmukim_myspata1] = $mkm->fld_mukimdesc;
			}
		   return $mukim;
		}
	}
	
	//updated : diana 6/12/13
	function tambahpraptra_copy($ptra_id)
    {
		$sessionarray = $this->session->all_userdata();
		$idkatagensi=$this->input->post('kumpagensi');
		$idkem=$this->input->post('idkem');
		$idjab=$this->input->post('jabatan');
		$idnegara=$this->input->post('negara');
		$idnegeri=$this->input->post('negeri');
		$iddaerah=$this->input->post('daerah');
		$idmukim=$this->input->post('mukim');
		$idkatpremis=$this->input->post('kat_premis');

		$data = array(     
					'idkatagensi' =>$idkatagensi,
					'idkem' => $idkem,        
					'idjab_agensi' =>  $idjab,
					'idnegara' => $idnegara,
					'idnegeri' => $idnegeri,
					'iddaerah' =>  $iddaerah,
					'idmukim' =>  $idmukim,
					'idpremis_kategori' => $this->input->post('premis'),
					'idpremis' => $idkatpremis,
					'no_dpa' => $idkatagensi.$idkem.$idjab.$idnegara.'.'.$idnegeri.$iddaerah.$idmukim.'.'.$idkatpremis,
					'ptra_id' => $ptra_id
				);

		$sumber = $this->db->insert('tbl_ptra_prereg_premis', $data);
		$ptra_reg= $this->db->insert_id();
		return $ptra_reg;
    }
	
	//added diana 6/12/13
	function tambahprajlnptra_copy($ptra_id)
    {
		$sessionarray = $this->session->all_userdata();
		$idkatagensi=$this->input->post('kumpagensi');
		$idkem=$this->input->post('idkem');
		$idjab=$this->input->post('jabatan');
		$idnegara=$this->input->post('negara');

		$data = array(     
						'idkatagensi' =>$idkatagensi,
						'idkem' => $idkem,        
						'idjab_agensi' =>  $idjab,
						'idnegara' => $idnegara,
						'idpremis_kategori' => $this->input->post('premis'),
						'no_dpa' => $idkatagensi.$idkem.$idjab.$idnegara.'.',
						'ptra_id' => $ptra_id
						   );

		$sumber = $this->db->insert('tbl_ptra_prereg_premis', $data);
		$ptra_reg= $this->db->insert_id();
		//$nodpa='no_dpa';
		return $ptra_reg;
    }
	
	//added : diana 6/11/13
	function tambahprapemptra_copy($ptra_id)
    {
        $sessionarray = $this->session->all_userdata();
        $idkatagensi=$this->input->post('kumpagensi');
        $idkem=$this->input->post('idkem');
        $idjab=$this->input->post('jabatan');
        $idnegara=$this->input->post('negara');
        $idnegeri=$this->input->post('negeri');
        $iddaerah=$this->input->post('daerah');
        $idkatpremis=$this->input->post('kat_premis');
		
                $data = array(     
                            'idkatagensi' =>$idkatagensi,
                           'idkem' => $idkem,        
                           'idjab_agensi' =>  $idjab,
                            'idnegara' => $idnegara,
                            'idnegeri' => $idnegeri,
                            'iddaerah' =>  $iddaerah,
                            'idpremis_kategori' => $this->input->post('premis'),
                            'idpremis' => $idkatpremis,
                            'no_dpa' => $idkatagensi.$idkem.$idjab.$idnegara.'.'.$idnegeri.$iddaerah.'.'.$idkatpremis,
                           'ptra_id' => $ptra_id
						   );
        
        $sumber = $this->db->insert('tbl_ptra_prereg_premis', $data);
        $ptra_reg= $this->db->insert_id();
        //$nodpa='no_dpa';
        return $ptra_reg;
    }
	
	//added : 8/11/13
	function get_nodpa_dpa($ptra_reg)
    {
		$this->db->select('no_dpa');
		$this->db->from('tbl_ptra_prereg_premis');
		$this->db->where('ptra_id', $ptra_reg);


		$query = $this->db->get();

		$nodpa="";
		
		foreach($query->result()as $row)
		{
			$nodpa = $row->no_dpa;
		}
	  
		return $nodpa;  
    }
}
?>