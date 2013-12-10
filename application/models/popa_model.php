<?php

class Popa_model extends CI_model 
{
    
    
##################################### all #####################################################
  
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
    //$this->db->where('popa_id',$popa_id);
    
    
   $query = $this->db->get();
  $row = $query->row();

    return $row->notifikasi_id;
  }


   /* public function get_ulasan_terbaru($pspaid,$kump,$popa_id)

    {
          //$this->db->select('status_ulasan');
          $this->db->where('pspa_id', $pspaid);
          $this->db->where('kump_kand_id', $kump);
                $this->db->where('rekod_pelan_id', $popa_id);
          //$this->db->order_by('statuslog_id', 'DESC');
          
          //echo $pspaid;
          //echo $kump;
          //echo $popa_id;

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
  
  */
  
    
############################ page untuk summary popa borang baru : FATIN ##########################################

public function get_all_kandungan_popa($id){
    $this->db->select('*');
  $this->db->from('tbl_popa');
  $this->db->join('tbl_kandungan','tbl_popa.popa_id = tbl_kandungan.popa_id');
  $this->db->where('tbl_popa.popa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


################################################ page kandungan : FATIN ########################################   
 

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
  //function untuk add new popa
     function tambahpopa()
    {

    $sessionarray = $this->session->all_userdata();

        $data = array(     

                           'tahun' => $this->input->post('tahun'),        
                           'idkem' => $sessionarray['user_kemid'],
                           'idjab_agensi' => $sessionarray['user_jabid'],
                           'idnegeri' => $sessionarray['user_negid'],
                           'iddaerah' => 0,
                            'pspa_id' => $this->uri->segment(3),
                            'popa_sedia_oleh_id' => $sessionarray['user_id'],
                            'popa_sah_oleh_id' => $sessionarray['ptfid'],
                            'popa_lulus_oleh_id' => $sessionarray['ppid'],
                            'popa_tarikh_sedia' => date('Y-m-d H:i:s'),
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa'),


                            );
        
        $sumber = $this->db->insert('tbl_popa', $data);
        $popa_id= $this->db->insert_id();
        
        $data1 = array(   array( 'popa_id' =>$popa_id, 
                                  'kump_kand_id' => $this->input->post('kump_kand_id'),
                                  'kand_utama' => $this->input->post('kand_utama'),        
                                  'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                  'kand_utama_detail' => $this->input->post('pendahuluan'),
                                  'node_type' => $this->input->post('node_type'),
                                  'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array( 'popa_id' =>$popa_id,
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                     'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array( 'popa_id' =>$popa_id,
                               'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                     'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'popa_id' =>$popa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                     'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'popa_id' =>$popa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                     'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'popa_id' =>$popa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                     'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'popa_id' =>$popa_id,
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_rujukan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_rujukan'),
                                     'kand_utama_detail' => $this->input->post('rujukan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   )
            );
        
        $sumber2 = $this->db->insert_batch('tbl_kandungan', $data1);
      
        return $popa_id;
        
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





    //function update tble popa
    function updatepopa()
    {

        $sessionarray = $this->session->all_userdata();

        $data = array(     'tahun' => $this->input->post('tahun'),       
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa'),

                            );
        
        $this->db->where('popa_id', $this->input->post('sunting'));
        $sumber = $this->db->update('tbl_popa', $data);
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
    public function get_popa_from_segment($id)
    {
        
    $this->db->select('*');
    $this->db->from('tbl_popa');
    $this->db->join('tbl_kandungan','tbl_popa.popa_id = tbl_kandungan.popa_id');
    $this->db->where('tbl_popa.popa_id',$id);
    $query = $this->db->get();
  
        $row = $query->result();

        return $row;
  
    }


    public function update_kandungan_popa($id){

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
    
    
############################################## page kawalan rekod : FATIN ####################################
     
    function get_kawalanrekod($popa_id)
    {

        $this->db->order_by("popa_pata_f7_1d_id", "DESC");
        $this->db->where('popa_id', $popa_id);
        $getKawalanrekod = $this->db->get('tbl_popa_pata_f7_1d');
        
        return $getKawalanrekod->result();
    }
    
    
        function tambahkawalan_rekod()
    {
              $data = array(//'popa_pata_f7_1d_id' => $this->input->post('popa_pata_f7_1d_id'),
                            'f7_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f7_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1'),
                            'popa_id' => $this->input->post('no')
                            );
        
        $panel = $this->db->insert('tbl_popa_pata_f7_1d', $data);
      
        
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
   
    
    function get_kawalanrekod_1($popa_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('popa_pata_f7_1d_id', $popa_id);
        $getKawalanrekod = $this->db->get('tbl_popa_pata_f7_1d');
        
        return $getKawalanrekod->result();
    }
    
    
     function update_rekod($id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('popa_pata_f7_1d_id', $id);
        $up_rekod = $this->db->update('tbl_popa_pata_f7_1d', $dataDetail);
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

  function get_status_summary($popa_id)
  {
    //tbl_popa_pata_f7_1a_modelstruktur
    //tbl_popa_pata_f7_1a_panel_penilai
    //tbl_popa_pata_f7_1a_pelan_kom

    $this->db->select('*');
    $this->db->from('tbl_popa_pata_f7_1a_modelstruktur');
    //$this->db->join('tbl_popa_pata_f7_1a_pelan_kom','tbl_popa_pata_f7_1a_pelan_kom.popa_id= tbl_popa_pata_f7_1a_modelstruktur.popa_id');
    $this->db->join('tbl_popa_pata_f7_1a_kontraktor_fasiliti', 'tbl_popa_pata_f7_1a_kontraktor_fasiliti.popa_id = tbl_popa_pata_f7_1a_modelstruktur.popa_id');
    $this->db->where('tbl_popa_pata_f7_1a_modelstruktur.popa_id', $popa_id);

    $query = $this->db->get();
  
    $row = $query->result();
  
    return $row;

  }



  function get_status_summary2($popa_id)
  {
    //tbl_popa_pata_f7_1b_skop_pilihan
    //tbl_popa_pata_f7_1b1c

    $this->db->select('*');
    $this->db->from('tbl_popa_pata_f7_1b_skop_pilihan');
    $this->db->join('tbl_popa_pata_f7_1b1c','tbl_popa_pata_f7_1b1c.popa_id= tbl_popa_pata_f7_1b_skop_pilihan.popa_id');
    $this->db->where('tbl_popa_pata_f7_1b_skop_pilihan.popa_id', $popa_id);

    $query = $this->db->get();
  
    $row = $query->result();
  
    return $row;

  }



  function get_status_summary3($popa_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_popa_pata_f7_1d');
    $this->db->where('popa_id', $popa_id);


    $query = $this->db->get();
  

    if ($query->num_rows() > 0)
    {
      $row = $query->row(); 

      if ($row->popa_id != NULL && $row->f7_1d_jenis_rekod != NULL && $row->f7_1d_lokasi != NULL && $row->tempoh != NULL)
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


  function get_status_summary4($popa_id)
  {
    $this->db->select('*');
    $this->db->from('tbl_lampiran');
    $this->db->where('popa_id', $popa_id);


    $query = $this->db->get();

    $row = $query->result();
  
    return $row;

  }
    
    
    
    
    
  
    
    
    
    
    
    function get_popa()
    {

        $getPopa = $this->db->get('tbl_popa');
        
        return $getPopa->result();
    }



    function get_entries($per_page)
    {
        $query = $this->db->get('tbl_popa');	
        $this->db->select('popa_id, tahun, idkem, idjab_agensi, iddaerah, idpremis_kategori, nodpa');
	    $query = $this->db->get('tbl_popa', $per_page, $this->uri->segment(3));
        
        return $query;
    }
    
    
    
            
    /*function get_kontraktor($per_page)
    {
        $this->db->select('popa_pata_f7_1a_kontraktor_fasiliti_id, nama_kontraktor_fasiliti, kontraktor_fasiliti_kategori_id, popa_id, email, no_tel_pej, no_tel_bimbit');
	    $query = $this->db->get('tbl_popa_pata_f7_1a_kontraktor_fasiliti', $per_page, $this->uri->segment(3));
        
        return $query;
    }
    */
    
   
    
    
    
    function get_negeri()  //dapatkan list negeri
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
    
    
    
    
    function get_kategori()  //dapatkan list kategori
    {
        $this->db->select('kontraktor_fasiliti_kategori, kategori');
        $this->db->order_by("kategori", "ASC");
        $query = $this->db->get('lkp_kontraktor_fasiliti_kategori');
  
        $kategori = array();
  
        if($query->result())
        {
            $kategori[''] = '- Pilih Kategori -';    // default selection item
            foreach ($query->result() as $kat) 
            {
               $kategori[$kat->kontraktor_fasiliti_kategori] = $kat->kategori;
            }
            
            return $kategori;
       }
    }  
    
    
    
    function get_objeksebagai()  //dapatkan list objek sebagai
    {
        $this->db->select('objek_sebagai_id, objek_sebagai_teks ');
        $this->db->order_by("objek_sebagai_teks", "ASC");
        $query = $this->db->get('lkp_objek_sebagai');
  
        $objeksebagai = array();
  
        if($query->result())
        {
            $objeksebagai[''] = '- Pilih Objek Sebagai -';    // default selection item
            foreach ($query->result() as $obj) 
            {
               $objeksebagai[$obj->objek_sebagai_id] = $obj->objek_sebagai_teks;
            }
            
            return $objeksebagai;
       }
    }  
    
    
    
    function get_sumber()  //dapatkan list objek sebagai
    {
        $this->db->select('sumber_id, sumber');
        $this->db->order_by("sumber", "ASC");
        $query = $this->db->get('lkp_sumber');
  
        $sumber = array();
  
        if($query->result())
        {
            $sumber[''] = '- Pilih Sumber -';    // default selection item
            foreach ($query->result() as $sum) 
            {
               $sumber[$sum->sumber_id] = $sum->sumber;
            }
            
            return $sumber;
       }
    }  
    
    
    
    function get_status()  //dapatkan list status
    {
        $this->db->select('sumber_id, sumber');
        $this->db->order_by("sumber", "ASC");
        $query = $this->db->get('lkp_sumber');
  
        $sumber = array();
  
        if($query->result())
        {
            $sumber[''] = '- Pilih Status -';    // default selection item
            foreach ($query->result() as $sum) 
            {
               $sumber[$sum->sumber_id] = $sum->sumber;
            }
            
            return $sumber;
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




    function get_nodpa()  //dapatkan list daerah
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


//update 10/12/13-yann
    function get_senarai_popa($pspa_id)
    {
        $this->db->select('*');
	$this->db->from('tbl_popa');
        $this->db->join('tbl_myspata_user','tbl_popa.popa_sedia_oleh_id = tbl_myspata_user.myspata_userid');
        $this->db->where('pspa_id',$pspa_id);
        $getSenaraiPopa = $this->db->get();
        
        return $getSenaraiPopa->result();
        
        
    }



    function get_kem_list($idkem) //dapatkan list kementerian
    {
        $this->db->select('namakem');
        $this->db->where('idkem', $idkem);
        $getKemList = $this->db->get('lkp_kementerian');

        return $getKemList->result();
    }



    function get_jab_list($idjab_agensi) //dapatkan list jabatan
    {
        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $idjab_agensi);
        $getJabList = $this->db->get('lkp_jab_agensi');

        return $getJabList->result();
    }



    function get_prem_list($idpremis_kategori) //dapatkan list premis
    {
        $this->db->select('jenis_premis');
        $this->db->where('idpremis_kategori', $idpremis_kategori);
        $getPremList = $this->db->get('lkp_premis_kategori');

        return $getPremList->result();
    }





    function get_kat_premis()  //function untuk cari kategori premis
    {
        $getList = $this->db->get(' lkp_premis_kategori');
        return $getList->result();
    }  



    function get_stat_list($pspa_id) //dapatkan list status
    {
        $this->db->select('status_id');
        //$this->db->join('tbl_statuslog as L', 'P.pspa_id = L.pspa_id');
        $this->db->where('statuslog_id', $pspa_id);
        $getStatList = $this->db->get('tbl_statuslog');

        return $getStatList->result();
    }



    function get_senarai_kont_fas()  //dapatkan senarai kontraktor fasiliti
    {
        $this->db->where('sumber_id = 2'); 
        $this->db->where('kump_pengguna = 12'); 
        $this->db->order_by("utiliti_sumber_man_id", "DESC");
        $getSenKonFas = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getSenKonFas->result();
    }



    function get_kont_list($kontraktor_fasiliti_kategori_id) //dapatkan kategori kontraktor fasiliti
    {
        $this->db->select('kategori');
        $this->db->where('kontraktor_fasiliti_kategori_id', $kontraktor_fasiliti_kategori_id);
        $getKontList = $this->db->get('lkp_kontraktor_fasiliti_kategori');

        return $getKontList->result();
    }




    function get_nama_kontraktorfasiliti($disiplin_bidang_id)
    {
        $this->db->select('bidang');
        $this->db->where('disiplin_bidang_id', $disiplin_bidang_id);
        $get_nama_panelpenilai = $this->db->get('lkp_disiplin_bidang');
        
        return $get_nama_panelpenilai->result();
    }





    function get_syarikat($syarikat_id)
    {
        $this->db->select('nama_syarikat');
        $this->db->where('syarikat_id', $syarikat_id);
        $getUrusSya = $this->db->get('tbl_syarikat');
        
        return $getUrusSya->result();
    }



    function get_senarai_kawalan_rekod() //dapatkan senarai kawalan rekod
    {
        $getSenaraiKawalan = $this->db->get('tbl_popa_pata_f7_1d');

        return $getSenaraiKawalan->result();
    } 



    function get_senarai_dokumen() //dapatkan senarai dokumen rujukan
    {
        $getSenaraiDokumen = $this->db->get('tbl_lampiran');

        return $getSenaraiDokumen->result();
    }  


   
    function get_sumberman_dalaman()  //model struktur popa dalaman  
    {

        $getSumberman_dalaman = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getSumberman_dalaman->result();
    }




    function get_ptf()
    {
       // $this->db->select('nama');
        $this->db->where('sumber_id = 1');
        $this->db->where('kump_pengguna = 4');
        $get_nama_kontraktorfasiliti1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_kontraktorfasiliti1->result();
    }



    function get_pif()
    {
       // $this->db->select('nama');
        $this->db->where('sumber_id = 1');
        $this->db->where('kump_pengguna = 7');
        $get_nama_kontraktorfasiliti1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_kontraktorfasiliti1->result();
    }



    function get_pdf()
    {
       // $this->db->select('nama');
       $this->db->where('sumber_id = 1');
        $this->db->where('kump_pengguna = 5');
        $get_nama_kontraktorfasiliti1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_kontraktorfasiliti1->result();
    }



    function get_pof()
    {
       // $this->db->select('nama');
        $this->db->where('sumber_id = 1');
        $this->db->where('kump_pengguna = 6');
        $get_nama_kontraktorfasiliti1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_kontraktorfasiliti1->result();
    }



    function get_pentadbiran()
    {
       // $this->db->select('nama');
        $this->db->where('sumber_id = 1');
        $this->db->where('disiplin_bidang_id = 22');
        $get_nama_kontraktorfasiliti1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_kontraktorfasiliti1->result();
    }



    function get_sivil()
    {
       // $this->db->select('nama');
        $this->db->where('sumber_id = 1');
        $this->db->where('disiplin_bidang_id = 23');
        $get_nama_kontraktorfasiliti1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_kontraktorfasiliti1->result();
    }




    function get_mekanikal()
    {
       // $this->db->select('nama');
        $this->db->where('sumber_id = 1');
        $this->db->where('disiplin_bidang_id = 24');
        $get_nama_kontraktorfasiliti1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_kontraktorfasiliti1->result();
    }




    function get_elektrik()
    {
       // $this->db->select('nama');
        $this->db->where('sumber_id = 1');
        $this->db->where('disiplin_bidang_id = 25');
        $get_nama_kontraktorfasiliti1 = $this->db->get('tbl_utiliti_sumber_man');
        
        return $get_nama_kontraktorfasiliti1->result();
    }


    function get_senarai_pihak_pembekal()
    {
        $getSenaraiPihakPembekal = $this->db->get('tbl_pembekal');
        
        return $getSenaraiPihakPembekal->result();
    }




    function get_senarai_alat_ganti()
    {
        $getSenaraiAlatGanti = $this->db->get('tbl_alatganti');
        
        return $getSenaraiAlatGanti->result();
    }


//if($query->result())
 //update azian

   function tambahmodelpopa()
     {
  
       // insert data ptf
    if ($this->input->post('ptf')!=NUll){
    foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$ptf,
                        'kump_pengguna_id'=>4
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }}
     //insert data pif
    if ($this->input->post('pif')!=NUll){
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pif,
                        'kump_pengguna_id'=>7
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }}
    
    //insert data pdf
     if ($this->input->post('pdf')!=NUll){
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pdf,
                        'kump_pengguna_id'=>5
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
    // insert data pof
    if ($this->input->post('pentadbir')!=NUll){
    foreach ($this->input->post('pentadbir')as $pentadbir)
    
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pentadbir,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
     
     if ($this->input->post('sivil')!=NUll){
    foreach ($this->input->post('sivil')as $sivil)
    
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$sivil,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
     if ($this->input->post('mekanikal')!=NUll){
    foreach ($this->input->post('mekanikal')as $mekanikal)
    
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$mekanikal,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
     if ($this->input->post('elektrik')!=NUll){
    foreach ($this->input->post('elektrik')as $elektrik)
    
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$elektrik,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
    //insert panel penilai
     if ($this->input->post('kontraktor_fasiliti')!=NUll){
     foreach ($this->input->post('kontraktor_fasiliti')as $kontraktor_fasiliti)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                       'utiliti_sumber_man_id'=>$kontraktor_fasiliti,

                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_kontraktor_fasiliti', $data);
        
    }
     }
   
   if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat model struktur popa',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Pelan Tahunan-POPA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
   
   

 function get_count_data($utiliti_sumber_man_id,$popa_id,$kump_pengguna)
    {
         $this->db->select('*');
         $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
         $this->db->where('popa_id', $popa_id);
         $this->db->where('kump_pengguna_id',$kump_pengguna);
         $getUrusSya = $this->db->get('tbl_popa_pata_f7_1a_modelstruktur');
         $rowcount = $getUrusSya->num_rows();
       // return $getUrusSya->result();
        
        

        return  $rowcount;
        
        
    }
     function get_count_dataKon($utiliti_sumber_man_id,$popa_id)
    {
         $this->db->select('*');
         $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
         $this->db->where('popa_id', $popa_id);
        // $this->db->where('kump_pengguna_id',$kump_pengguna);
         $getUrusSya = $this->db->get('tbl_popa_pata_f7_1a_kontraktor_fasiliti');
         $rowcount = $getUrusSya->num_rows();
       // return $getUrusSya->result();
        
        

        return  $rowcount;
        
        
    }
function count_data_in_tbl_popa_pata_f7_model(){

         $this->db->select('*');
         $this->db->where('popa_id', $this->uri->segment(4));
        // $this->db->where('utiliti_sumber_man_id',$this->uri->segment(4));
         $getdata = $this->db->get('tbl_popa_pata_f7_1a_modelstruktur');

         $rowcount = $getdata->num_rows();
        
         return  $rowcount;

    }

 function updatemodelstruktur()
      {

      $this->db->where('popa_id', $this->uri->segment(4));
      $delete_modelstruktur = $this->db->delete('tbl_popa_pata_f7_1a_modelstruktur');  //delete data table modelstruktur
     
    if($delete_modelstruktur){  //dh bjaya delete masuk blik data yg update table modelstruktur
 
      // insert data ptf
    if ($this->input->post('ptf')!=NUll){
    foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$ptf,
                        'kump_pengguna_id'=>4
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
    }
     //insert data pif
    if ($this->input->post('pif')!=NUll){
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pif,
                        'kump_pengguna_id'=>7
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
    }
    //insert data pdf
    if ($this->input->post('pdf')!=NUll){
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pdf,
                        'kump_pengguna_id'=>5
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
    }
    // insert data pof
    if ($this->input->post('pentadbir')!=NUll){
    foreach ($this->input->post('pentadbir')as $pentadbir)
    
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pentadbir,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
     
     if ($this->input->post('sivil')!=NUll){
    foreach ($this->input->post('sivil')as $sivil)
    
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$sivil,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
     if ($this->input->post('mekanikal')!=NUll){
    foreach ($this->input->post('mekanikal')as $mekanikal)
    
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$mekanikal,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
     if ($this->input->post('elektrik')!=NUll){
    foreach ($this->input->post('elektrik')as $elektrik)
    
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$elektrik,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_modelstruktur', $data);
    }
     }
   
      }

}
function updatekontraktorfasiliti(){

      $this->db->where('popa_id', $this->uri->segment(4));
      $delete_panel_penilai = $this->db->delete('tbl_popa_pata_f7_1a_kontraktor_fasiliti');  //

      if($delete_panel_penilai){

//insert panel penilai
    if ($this->input->post('kontraktor_fasiliti')!=NUll){
    foreach ($this->input->post('kontraktor_fasiliti')as $kontraktor_fasiliti)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                       'utiliti_sumber_man_id'=>$kontraktor_fasiliti,

                    );
        
        $sumber = $this->db->insert('tbl_popa_pata_f7_1a_kontraktor_fasiliti', $data);
        
    }
    }

  }


}
  function get_kontraktor()
    {
        //$this->db->select('nama_syarikat');
        //$this->db->where('syarikat_id', $syarikat_id);
        $getUrusSya = $this->db->get(' lkp_disiplin_bidang');
        
        return $getUrusSya->result();
    }

     function tambahkontraktorfasiliti()
    {
        $data = array(     //'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'nama' => $this->input->post('nama_kontraktor'),
                             'syarikat_id' => $this->input->post('syarikat_id'),
                            'kump_pengguna' => $this->input->post('peranan'),
                            'sumber_id' => $this->input->post('sumber_id'),
                            'emel' => $this->input->post('emel'),
                            'no_tel_bimbit' => $this->input->post('no_tel_bimbit'),
                            'disiplin_bidang_id' => $this->input->post('kontraktor_fasiliti_kategori_id'),
            
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
      function updatekontraktorfasilitibaru($utiliti_sumber_man_id)
    {
        $data = array(     //'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'nama' => $this->input->post('nama'),
                             'syarikat_id' => $this->input->post('syarikat_id'),
                            'emel' => $this->input->post('emel'),
                             'kump_pengguna' => 12,
                             'sumber_id' => 2,
                            'no_tel_bimbit' => $this->input->post('no_tel_bimbit'),
                            'disiplin_bidang_id' => $this->input->post('kontraktor_fasiliti_kategori_id'),
            
                            );
        
       //$this->db->insert('tbl_utiliti_sumber_man', $data);
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
         $sumber3 = $this->db->update('tbl_utiliti_sumber_man', $data);
        
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
     function get_kontraktor2($utiliti_sumber_man_id)
    {
        //$this->db->select('nama_syarikat');
        $this->db->where('utiliti_sumber_man_id',$utiliti_sumber_man_id);
        $getUrusSya = $this->db->get('tbl_utiliti_sumber_man');
        
        return $getUrusSya->result();
    }

    function get_upf()  //dapatkan list premis
    { 
        $sessionarray = $this->session->all_userdata();
         $this->db->where('idkem',$sessionarray['user_kemid']);
         $this->db->where('idjab_agensi' ,$sessionarray['user_jabid']);
         $this->db->where('idnegeri',$sessionarray['user_negid']);
          $this->db->where('level_id',$sessionarray['user_level_id']);
         
          
         
        //$this->db->order_by("alamat_upf", "ASC");
        $query = $this->db->get('tbl_upf');

        return $query->result();
    }   

    function get_senarai_pelan_komunikasi()
    {
        $this->db->where('pelan_kom_kecemasan_perkara_flag',0);
        $this->db->where('popa_id',$this->uri->segment(4));
        $getSenaraiPelanKomunikasi = $this->db->get('tbl_popa_pelan_kom_kecemasan');
        
        return $getSenaraiPelanKomunikasi->result();
    }

  function tambahpelanKom()
    {
        $data = array(     //'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'perkara' => $this->input->post('perkara'),
                             'pelan_kom_kecemasan_alamat' => $this->input->post('alamat_kom'),
                            'pelan_kom_kecemasan_notel' => $this->input->post('no_tel_kom'),
                            'pelan_kom_kecemasan_nofaks' => $this->input->post('no_fax_kom'),
                            'pelan_kom_kecemasan_perkara_flag' => 0,
                            'popa_id' => $this->uri->segment(4),
                             'upf_id' =>0
                            );
        
        $this->db->insert('tbl_popa_pelan_kom_kecemasan', $data);
     
    }    
        
   function get_count_datapembekal($alatganti_id,$popa_id)
    {
         $this->db->select('*');
         $this->db->where('alatganti_id',$alatganti_id);
         $this->db->where('popa_id', $popa_id);
        // $this->db->where('kump_pengguna_id',$kump_pengguna);
         $getUrusSya = $this->db->get('tbl_popa_pelan_kecemasan_alatganti');
         $rowcount = $getUrusSya->num_rows();
       // return $getUrusSya->result();
        
        

        return  $rowcount;
        
        
    }
     function get_count_datakecemasan($upf_id,$popa_id)
    {
         $this->db->select('*');
         $this->db->where('upf_id',$upf_id);
         $this->db->where('popa_id', $popa_id);
         $this->db->where('pelan_kom_kecemasan_perkara_flag',1);
        // $this->db->where('kump_pengguna_id',$kump_pengguna);
         $getUrusSya = $this->db->get('tbl_popa_pelan_kom_kecemasan');
         $rowcount = $getUrusSya->num_rows();
       // return $getUrusSya->result();
        
        

        return  $rowcount;
        
        
    }
 function get_pelan_kom($popa_pelan_kom_kecemasan_id)
    {
        //$this->db->select('*');
        $this->db->where('popa_pelan_kom_kecemasan_id', $popa_pelan_kom_kecemasan_id);
        $getUrusSya = $this->db->get('tbl_popa_pelan_kom_kecemasan');
        
        return $getUrusSya->result();
    }
   function get_pembekal($pembekal_id)
    {
        //$this->db->select('*');
        $this->db->where('pembekal_id', $pembekal_id);
        $getUrusSya = $this->db->get('tbl_pembekal');
        
        return $getUrusSya->result();
    }
function get_alatganti($alatganti_id)
    {
        $this->db->select('*');    
        $this->db->from('tbl_popa_pelan_kecemasan_alatganti');
        // $this->db->where('utiliti_sumber_man_id',$this->uri->segment(4));
        $this->db->join('tbl_alatganti','tbl_popa_pelan_kecemasan_alatganti.alatganti_id = tbl_alatganti.alatganti_id');
        $this->db->where('tbl_popa_pelan_kecemasan_alatganti.alatganti_id', $alatganti_id);
        
        $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
       
    }
function count_data_in_tbl_popa_pelan_kecemasan_alatganti(){

         $this->db->select('*');
         $this->db->from('tbl_popa_pelan_kecemasan_alatganti');
         $this->db->where('popa_id', $this->uri->segment(4));
        // $this->db->where('utiliti_sumber_man_id',$this->uri->segment(4));
          //$this->db->join('tbl_popa_pelan_kom_kecemasan','tbl_popa_pelan_kecemasan_alatganti.popa_id = tbl_popa_pelan_kom_kecemasan.popa_id');
        //$this->db->where('tbl_popa_pelan_kom_kecemasan.upf_id',0);         
        //$this->db->join('tbl_popa_pelan_kom_kecemasan')
         $getdata = $this->db->get();

         $rowcount = $getdata->num_rows();
       // $rowcount = $this->db->count_all_results();
         return  $rowcount;

    }
function tambahalatgantipopa()
     {
  
       // insert data ptf
    if ($this->input->post('alatganti_id')!=NUll){
    foreach ($this->input->post('alatganti_id')as $alatganti_id)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'alatganti_id'=>$alatganti_id,
                        'pembekal_id'=>$this->input->post('pembekal_id_alat[]')
                    );
        
        $sumber = $this->db->insert('tbl_popa_pelan_kecemasan_alatganti', $data);
    }}
  
if ($this->input->post('upf_id')!=NUll){
    foreach ($this->input->post('upf_id')as $upf_id)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'upf_id'=>$upf_id,
                        'pelan_kom_kecemasan_perkara_flag'=>1
                    );
        
        $sumber1 = $this->db->insert('tbl_popa_pelan_kom_kecemasan', $data);
    }}
    }
   
   function tambahpembekal()
    {
        $data = array(     //'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'pembekal_nama' => $this->input->post('nama_pembekal'),
                             'pembekal_alamat' => $this->input->post('alamat_pembekal'),
                            'pembekal_alamat_jalan' => $this->input->post('jalan_pembekal'),
                            'pembekal_alamat_bandar' => $this->input->post('bandar_pembekal'),
                            'pembekal_alamat_negeri_id' =>  $this->input->post('negeri'),
                            'pembekal_alamat_poskod' =>  $this->input->post('poskod_pembekal'),
                             'pembekal_notel'=> $this->input->post('no_tel_pembekal'),
                              'pembekal_nofaks'=> $this->input->post('no_faks_pembekal'),
                             'pembekal_email'=> $this->input->post('emel_pembekal'),
                            );
        
        $this->db->insert('tbl_pembekal', $data);
     
    }    
    
    function tambahalatganti()
    {
        $data = array(     //'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'pembekal_id' => $this->input->post('pembekal_id_alat_ganti'),
                             'alatganti_nama' => $this->input->post('nama_alat_ganti')
                            );
        
        $this->db->insert('tbl_alatganti', $data);
     
    }    
function count_data_in_tbl_popa_pelan_kecemasan(){

         $this->db->select('*');
         $this->db->from('tbl_popa_pelan_kom_kecemasan');
         $this->db->where('popa_id', $this->uri->segment(4));
        $this->db->where('pelan_kom_kecemasan_perkara_flag',1);
          //$this->db->join('tbl_popa_pelan_kom_kecemasan','tbl_popa_pelan_kecemasan_alatganti.popa_id = tbl_popa_pelan_kom_kecemasan.popa_id');
        //$this->db->where('tbl_popa_pelan_kom_kecemasan.upf_id',0);         
        //$this->db->join('tbl_popa_pelan_kom_kecemasan')
         $getdata = $this->db->get();

         $rowcount = $getdata->num_rows();
       // $rowcount = $this->db->count_all_results();
         return  $rowcount;

    }
   /* function updatealatgantipopa()
     
  {

      $this->db->where('popa_id', $this->uri->segment(4));
      $delete_modelstruktur = $this->db->delete('tbl_popa_pelan_kecemasan_alatganti');  //delete data table modelstruktur
     
    if($delete_modelstruktur){  //dh bjaya delete masuk blik data yg update table modelstruktur
 
       // insert data ptf
    if ($this->input->post('alatganti_id')!=NUll){
    foreach ($this->input->post('alatganti_id')as $alatganti_id)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'alatganti_id'=>$alatganti_id,
                        'pembekal_id'=>$this->input->post('pembekal_id_alat[]')
                    );
        
        $sumber = $this->db->insert('tbl_popa_pelan_kecemasan_alatganti', $data);
    }}
    }
  }*/
  function updateupfpopa()
     
  {

      $this->db->where('popa_id', $this->uri->segment(4));
      $this->db->where('pelan_kom_kecemasan_perkara_flag',1);
      $delete_modelstruktur = $this->db->delete('tbl_popa_pelan_kom_kecemasan');  //delete data table modelstruktur
     
    if($delete_modelstruktur){ 
    if ($this->input->post('upf_id')!=NUll){
    foreach ($this->input->post('upf_id')as $upf_id)
    {
        $data= array( 'popa_id'=>$this->uri->segment(4),
                        'upf_id'=>$upf_id,
                        'pelan_kom_kecemasan_perkara_flag'=>1
                    );
        
        $sumber1 = $this->db->insert('tbl_popa_pelan_kom_kecemasan', $data);
    }}
    }
  }
  
  function updatepelanKom($popa_pelan_kom_kecemasan_id)
    {
        $data = array(     //'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'perkara' => $this->input->post('perkara'),
                             'pelan_kom_kecemasan_alamat' => $this->input->post('alamat_kom'),
                            'pelan_kom_kecemasan_notel' => $this->input->post('no_tel_kom'),
                            'pelan_kom_kecemasan_nofaks' => $this->input->post('no_fax_kom'),
                            //'pelan_kom_kecemasan_perkara_flag' => 0,
                            //'popa_id' => $this->uri->segment(4),
                            // 'upf_id' =>0
                            );
         $this->db->where('popa_pelan_kom_kecemasan_id', $popa_pelan_kom_kecemasan_id);
        $this->db->update('tbl_popa_pelan_kom_kecemasan', $data);
        //$this->db->insert('tbl_popa_pelan_kom_kecemasan', $data);
     
    }  
    
    function updatepelanKompembekal($pembekal_id)
    {
        $data = array(           
                              'pembekal_nama' => $this->input->post('nama_pembekal'),
                             'pembekal_alamat' => $this->input->post('alamat_pembekal'),
                            'pembekal_alamat_jalan' => $this->input->post('jalan_pembekal'),
                            'pembekal_alamat_bandar' => $this->input->post('bandar_pembekal'),
                            'pembekal_alamat_negeri_id' =>  $this->input->post('negeri'),
                            'pembekal_alamat_poskod' =>  $this->input->post('poskod_pembekal'),
                             'pembekal_notel'=> $this->input->post('no_tel_pembekal'),
                              'pembekal_nofaks'=> $this->input->post('no_faks_pembekal'),
                             'pembekal_email'=> $this->input->post('emel_pembekal'),
                           
                            );
         $this->db->where('pembekal_id', $pembekal_id);
        $this->db->update('tbl_pembekal', $data);
        //$this->db->insert('tbl_popa_pelan_kom_kecemasan', $data);
     
    } 
     function updatealatganti($alatganti_id)
    {
         
         $data = array(     //'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),        
                             'pembekal_id' => $this->input->post('pembekal_id_alat_ganti'),
                             'alatganti_nama' => $this->input->post('nama_alat_ganti')
                            );
         
         $this->db->where('alatganti_id', $alatganti_id);
        $this->db->update('tbl_alatganti', $data);
       
    }
    
    //page summary
     function get_popa2($pspa_id,$popa_id)
    {
         $this->db->select('*');
         $this->db->where('pspa_id',$pspa_id);
         $this->db->where('popa_id',$popa_id);
         $this->db->where('idkem', $this->session->userdata('user_kemid'));
         //$this->db->where_not_in('ptra_tarikh_sedia','0000-00-00 00:00:00');
        $this->db->from('tbl_popa');
         $this->db->order_by("popa_id", "DESC");
        
        
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;
    }
    
    public function insert_status_log($id_pspao_akhir,$status,$popa_id){

$sessionarray = $this->session->all_userdata();


  $data = array(
    'status_id' => $status,
    'status_tarikh' => date('Y-m-d H:i:s'),
    'myspata_userid' => $sessionarray['user_id'],
    //'status_ulasan' => $status_ulasan,
    'pspa_id' => $id_pspao_akhir,
    'kump_kand_id' => 3,
    'rekod_pelan_id' => $popa_id
    
  );

  $this->db->insert('tbl_statuslog', $data);


}
 public function insert_status_log_ulasan($id,$status,$popa_id){

$sessionarray = $this->session->all_userdata();


  $data = array(
    'status_id' => $status,
    'status_tarikh' => date('Y-m-d H:i:s'),
    'myspata_userid' => $sessionarray['user_id'],
    'status_ulasan' => $this->input->post('ulasan'),
    'pspa_id' => $id,
    'kump_kand_id' => 3,
    'rekod_pelan_id' => $popa_id
    
  );

  $this->db->insert('tbl_statuslog', $data);


}

public function get_ptfid_popa($id){
  $this->db->select('pspa_semak_oleh_id');
  $this->db->where('pspa_id', $id);
  $query = $this->db->get('tbl_pspao');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pspa_semak_oleh_id;
  } 
  }
  public function get_ppid_popa($id){
  $this->db->select('pspa_lulus_oleh_id');
  $this->db->where('pspa_id', $id);
  $query = $this->db->get('tbl_pspao');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pspa_lulus_oleh_id;
  } 
  }
   public function get_ppdid_popa($id,$popa_id){
  $this->db->select('popa_sedia_oleh_id');
  $this->db->where('pspa_id', $id);
        $this->db->where('popa_id', $popa_id);
  $query = $this->db->get('tbl_popa');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->popa_sedia_oleh_id;
  } 
  }
  public function get_pifid_popa($id,$popa){
  $this->db->select('pif_id');
  $this->db->where('pspa_id', $id);
  $this->db->where('popa', $popa);
  $query = $this->db->get('tbl_notifikasi_pelan');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pif_id;
  } 
  }
  
  public function get_pofid_popa($id,$popa){
  $this->db->select('pof_id');
  $this->db->where('pspa_id', $id);
        $this->db->where('popa',$popa);
  $query = $this->db->get('tbl_notifikasi_pelan');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pof_id;
  } 
  }
  
  function update_popa_date_lulus($id,$popa_id){

$data = array(

    'popa_tarikh_lulus' => date('Y-m-d')
  );
  $this->db->where('pspa_id', $id);
  $this->db->where('popa_id', $popa_id);
  $this->db->update('tbl_popa', $data);


}

 public function get_ulasan_terbaru($pspaid,$kump,$popa_id){
  //$this->db->select('status_ulasan');
  $this->db->where('pspa_id', $pspaid);
  $this->db->where('kump_kand_id', $kump);
        $this->db->where('rekod_pelan_id', $popa_id);
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
  function update_popa_date_sah($id,$popa_id){

$data = array(

    'popa_tarikh_sah' => date('Y-m-d')
  );
  $this->db->where('pspa_id', $id);
  $this->db->where('popa_id', $ptra_id);
  $this->db->update('tbl_popa', $data);


}


    
}
?>