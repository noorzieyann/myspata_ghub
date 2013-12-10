<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pla_model extends CI_Model {
 	
 
##################################### all #####################################################
    


function get_peranan($kump_pengguna)
    {
        $this->db->select('nama_kump_pengguna');
        $this->db->where('kump_pengguna', $kump_pengguna);
        $get_peranan = $this->db->get('lkp_kump_pengguna');
        
        return $get_peranan->result();
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
   
   
   
   function get_noti_pelan($pspa_id){

    $this->db->select('notifikasi_id');
     $this->db->where('pspa_id',$pspa_id);
    $this->db->from('tbl_notifikasi_pelan');
    //$this->db->where('pla_id',$pla_id);
    
    
   $query = $this->db->get();
  $row = $query->row();

    return $row->notifikasi_id;
  }
    public function get_ulasan_terbaru($pspaid,$kump,$pla_id){
  //$this->db->select('status_ulasan');
  $this->db->where('pspa_id', $pspaid);
  $this->db->where('kump_kand_id', $kump);
        $this->db->where('rekod_pelan_id', $pla_id);
  //$this->db->order_by('statuslog_id', 'DESC');
  
  //echo $pspaid;
  //echo $kump;
  //echo $pla_id;

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
  
  
  function get_pla2($pspa_id,$pla_id)
    {
         $this->db->select('*');
         $this->db->where('pspa_id',$pspa_id);
         $this->db->where('pla_id',$pla_id);
         $this->db->where('idkem', $this->session->userdata('user_kemid'));
         //$this->db->where_not_in('pla_tarikh_sedia','0000-00-00 00:00:00');
        $this->db->from('tbl_pla');
         $this->db->order_by("pla_id", "DESC");
        
        
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;
    }
   
   
   ############################ page untuk summary pla borang baru######################################################

public function get_all_kandungan_pla($id){
    $this->db->select('*');
  $this->db->from('tbl_pla');
  $this->db->join('tbl_kandungan','tbl_pla.pla_id = tbl_kandungan.pla_id');
  $this->db->where('tbl_pla.pla_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
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


 function get_count_data($utiliti_sumber_man_id,$pla_id,$kump_pengguna)
    {
         $this->db->select('*');
         $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
         $this->db->where('pla_id', $pla_id);
         $this->db->where('kump_pengguna_id',$kump_pengguna);
         $getUrusSya = $this->db->get('tbl_pla_pata_f10_1a_modelstruktur');
         $rowcount = $getUrusSya->num_rows();
       // return $getUrusSya->result();
      
        return  $rowcount;
        
        
    }


    //function untuk add new pla
     function tambahpla()
    {

    $sessionarray = $this->session->all_userdata();

        $data = array(     

                           'tahun' => $this->input->post('tahun'),        
                           'idkem' => $sessionarray['user_kemid'],
                           'idjab_agensi' => $sessionarray['user_jabid'],
                           'idnegeri' => $sessionarray['user_negid'],
                           'iddaerah' => 0,
                            'pspa_id' => $this->uri->segment(3),
                            'pla_sedia_oleh_id' => $sessionarray['user_id'],
                            'pla_sah_oleh_id' => $sessionarray['ptfid'],
                            'pla_lulus_oleh_id' => $sessionarray['ppid'],
                            'pla_tarikh_sedia' => date('Y-m-d H:i:s'),
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa'),


                            );
        
        $sumber = $this->db->insert('tbl_pla', $data);
        $pla_id= $this->db->insert_id();
        
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
        
        $sumber2 = $this->db->insert_batch('tbl_kandungan', $data1);
      
        return $pla_id;
        
        if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat utiliti keperluan sumber- sumber manusia',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
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
    function updatepla()
    {

        $sessionarray = $this->session->all_userdata();

        $data = array(     'tahun' => $this->input->post('tahun'),       
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa'),

                            );
        
        $this->db->where('pla_id', $this->input->post('sunting'));
        $sumber = $this->db->update('tbl_pla', $data);
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
                             'aktvt' => 'Kemaskini maklumat kandungan POPA',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
                             'modul' => 'Kandungan POPA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }

    
    //segmen untuk kandungan
    public function get_pla_from_segment($id){
    $this->db->select('*');
  $this->db->from('tbl_pla');
  $this->db->join('tbl_kandungan','tbl_pla.pla_id = tbl_kandungan.pla_id');
  $this->db->where('tbl_pla.pla_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
    }


    public function update_kandungan_pla($id){

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

######################################################## page kawalan rekod ###############################
     
    function get_kawalanrekod($pla_id)
    {

        $this->db->order_by("pla_pata_f10_1d_id", "DESC");
        $this->db->where('pla_id', $pla_id);
        $getKawalanrekod = $this->db->get('tbl_pla_pata_f10_1d');
        
        return $getKawalanrekod->result();
    }
    
    
        function tambahkawalan_rekod()
    {
              $data = array(//'pla_pata_f10_1d_id' => $this->input->post('pla_pata_f10_1d_id'),
                            'f10_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f10_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1'),
                            'pla_id' => $this->input->post('no')
                            );
        
        $panel = $this->db->insert('tbl_pla_pata_f10_1d', $data);
      
        
        if($panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah kawalan rekod - POPA',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
                             'modul' => 'Kawalan Rekod POPA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    } 
   
    
    function get_kawalanrekod_1($pla_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('pla_pata_f10_1d_id', $pla_id);
        $getKawalanrekod = $this->db->get('tbl_pla_pata_f10_1d');
        
        return $getKawalanrekod->result();
    }
    
    
     function update_rekod($id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('pla_pata_f10_1d_id', $id);
        $up_rekod = $this->db->update('tbl_pla_pata_f10_1d', $dataDetail);
        if($up_rekod)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini kawalan rekod - POPA',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
                             'modul' => 'Model Struktur POPA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
 #################################### status untuk page summary : FATIN ############################################

  function get_status_summary($pla_id)
  {
    //tbl_pla_pata_f10_1a_modelstruktur
    //tbl_pla_pata_f10_1a_panel_penilai
    //tbl_pla_pata_f10_1a_pelan_kom

    $this->db->select('*');
    $this->db->from('tbl_pla_pata_f10_1a_modelstruktur');
    $this->db->join('tbl_pla_pata_f10_1a_pelan_kom','tbl_pla_pata_f10_1a_pelan_kom.pla_id= tbl_pla_pata_f10_1a_modelstruktur.pla_id');
    $this->db->join('tbl_pla_pata_f10_1a_lembaga_pemeriksa', 'tbl_pla_pata_f10_1a_lembaga_pemeriksa.pla_id = tbl_pla_pata_f10_1a_modelstruktur.pla_id');
    $this->db->where('tbl_pla_pata_f10_1a_modelstruktur.pla_id', $pla_id);

    $query = $this->db->get();
  
    $row = $query->result();
  
    return $row;

  }



  function get_status_summary2($pla_id)
  {
    //tbl_pla_pata_f10_1b_skop_pilihan
    //tbl_pla_pata_f10_1b1c

    $this->db->select('*');
    $this->db->from('tbl_pla_pata_f10_1b_skop_pilihan');
    $this->db->join('tbl_pla_pata_f10_1b1c','tbl_pla_pata_f10_1b1c.pla_id= tbl_pla_pata_f10_1b_skop_pilihan.pla_id');
    $this->db->where('tbl_pla_pata_f10_1b_skop_pilihan.pla_id', $pla_id);

    $query = $this->db->get();
  
    $row = $query->result();
  
    return $row;

  }




  function get_status_summary3($pla_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_pla_pata_f10_1d');
    $this->db->where('pla_id', $pla_id);


    $query = $this->db->get();
  

    if ($query->num_rows() > 0)
    {
      $row = $query->row(); 

      if ($row->pla_id != NULL && $row->f10_1d_jenis_rekod != NULL && $row->f10_1d_lokasi != NULL && $row->tempoh != NULL)
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




  function get_status_summary4($pla_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_lampiran');
    $this->db->where('pla_id', $pla_id);


    $query = $this->db->get();

    $row = $query->result();
  
    return $row;

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
