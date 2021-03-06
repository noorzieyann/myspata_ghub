<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pnpa_model extends CI_Model {
    
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


 function get_count_data($utiliti_sumber_man_id,$pnpa_id,$kump_pengguna)
    {
         $this->db->select('*');
         $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
         $this->db->where('pnpa_id', $pnpa_id);
         $this->db->where('kump_pengguna_id',$kump_pengguna);
         $getUrusSya = $this->db->get('tbl_pnpa_pata_f8_1a_modelstruktur');
         $rowcount = $getUrusSya->num_rows();
       // return $getUrusSya->result();
        
        

        return  $rowcount;
        
        
    }

    function get_count_panel($utiliti_sumber_man_id,$pnpa_id)
    {
         $this->db->select('*');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('pnpa_id', $pnpa_id);
        $getUrusSya = $this->db->get('tbl_pnpa_pata_f8_1a_panel_penilai');
         $rowcount = $getUrusSya->num_rows();

        return $rowcount;
        
    }
    

   //function untuk cari kategori premis
    function get_kat_premis()
    {
        $getList = $this->db->get(' lkp_premis_kategori');
        return $getList->result();
    }    
    
    //function untuk add new pnpa
     function tambahpnpa()
    {

$sessionarray = $this->session->all_userdata();

        $data = array(     

                           'tahun' => $this->input->post('tahun'),        
                           'idkem' => $sessionarray['user_kemid'],
                           'idjab_agensi' => $sessionarray['user_jabid'],
                           'idnegeri' => $sessionarray['user_negid'],
                           'iddaerah' => 0,
                            'pspa_id' => $this->uri->segment(3),
                            'pnpa_sedia_oleh_id' => $sessionarray['user_id'],
                            'pnpa_sah_oleh_id' => $sessionarray['ptfid'],
                            'pnpa_lulus_oleh_id' => $sessionarray['ppid'],
                            'pnpa_tarikh_sedia' => date('Y-m-d H:i:s'),
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa'),


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


    //function update tble pnpa
  function updatemodelstruktur()
    {

      $this->db->where('pnpa_id', $this->uri->segment(4));
      $delete_modelstruktur = $this->db->delete('tbl_pnpa_pata_f8_1a_modelstruktur');  //delete data table modelstruktur
     
    if($delete_modelstruktur){  //dh bjaya delete masuk blik data yg update table modelstruktur
 
      // insert data ptf
              foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$ptf,
                        'kump_pengguna_id'=>4
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
     //insert data pif
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pif,
                        'kump_pengguna_id'=>7
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
    
    //insert data pdf
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pdf,
                        'kump_pengguna_id'=>5
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
    
    // insert data pof
    foreach ($this->input->post('pof')as $pof)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pof,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }

      }

}

function updatepanelpenilai(){

      $this->db->where('pnpa_id', $this->uri->segment(4));
      $delete_panel_penilai = $this->db->delete('tbl_pnpa_pata_f8_1a_panel_penilai');  //

      if($delete_panel_penilai){

//insert panel penilai
    foreach ($this->input->post('panel_penilai')as $panel_penilai)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                       'utiliti_sumber_man_id'=>$panel_penilai,

                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_panel_penilai', $data);
        
    }

  }


}
  
  function updatepanelkom(){


     
        $data = array(   
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawabdankuasa'),
                         'tugas_pegawai_lain' => $this->input->post('pegawailain')
                    );
        
        
        $this->db->where('pnpa_id', $this->uri->segment(4));
       $this->db->update('tbl_pnpa_pata_f8_1a_pelan_kom', $data);
       
    }
   

    
    //function update tble pnpa
    
    
    function updatepnpa()
    {

        $sessionarray = $this->session->all_userdata();

        $data = array(     'tahun' => $this->input->post('tahun'),       
                            'idpremis_kategori' => $this->input->post('premis'),
                            'nama_premis' => $this->input->post('namapremis'),
                            'nodpa' => $this->input->post('nodpa'),

                            );
        
        $this->db->where('pnpa_id', $this->input->post('sunting'));
        $sumber = $this->db->update('tbl_pnpa', $data);
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
                             'aktvt' => 'Kemaskini maklumat kandungan PNPA',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Kandungan PNPA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    
     /* function updatepnpa($id)
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
    }
    
     //function update tble pnpa
    function updatepnpa2()
    {
        
        $pnpa_id = $this->uri->segment(3);
        $kand_id = $this->input->post('kandungan_id');
        $data2 = array(   array( 'pnpa_id' =>$pnpa_id,
                                  'kandungan_id' =>$kand_id[0],
                                  'kump_kand_id' => $this->input->post('kump_kand_id'),
                                  'kand_utama' => $this->input->post('kand_utama'),        
                                  'kand_utama_bil' => $this->input->post('kand_utama_bil'),
                                  'kand_utama_detail' => $this->input->post('pendahuluan'),
                                  'node_type' => $this->input->post('node_type'),
                                  'kand_type' => $this->input->post('kand_type'),
                                ),
            
                            array( 'pnpa_id' =>$pnpa_id,
                                'kandungan_id' =>$kand_id[1],
                                    'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_obj'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_obj'),
                                     'kand_utama_detail' => $this->input->post('objektif'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                           array( 'pnpa_id' =>$pnpa_id,
                               'kandungan_id' =>$kand_id[2],
                               'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_carta'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_carta'),
                                     'kand_utama_detail' => $this->input->post('carta'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kandungan_id' =>$kand_id[3],
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_skop'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_skop'),
                                     'kand_utama_detail' => $this->input->post('skop'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kandungan_id' =>$kand_id[4],
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_sumber'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_sumber'),
                                     'kand_utama_detail' => $this->input->post('sumber'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
                                'kandungan_id' =>$kand_id[5],
                                'kump_kand_id' => $this->input->post('kump_kand_id'),
                                    'kand_utama' => $this->input->post('kand_utama_kawalan'),        
                                     'kand_utama_bil' => $this->input->post('kand_utama_bil_kawalan'),
                                     'kand_utama_detail' => $this->input->post('kawalan'),
                                    'node_type' => $this->input->post('node_type'),
                                    'kand_type' => $this->input->post('kand_type'),
                                   ),
                            array( 'pnpa_id' =>$pnpa_id,
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
    */
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


public function update_kandungan_pnpa($id){
  
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
        $up_panel = $this->db->update('tbl_utiliti_smber_man', $dataDetail);
        if($up_panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini maklumat panel penilai teknikal - PNPA',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
                             'modul' => 'Model Struktur PNPA');
            
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
    
        function get_pelan_kom($idpnpa){

  $this->db->select('*');
  $this->db->from('tbl_pnpa_pata_f8_1a_pelan_kom');
  $this->db->where('pnpa_id',$idpnpa);

  $query = $this->db->get();
    
  $row = $query->result();
  
  return $row;

    }
    
   
   function tambahmodelpnpa()
     {
  
       // insert data ptf
    foreach ($this->input->post('ptf')as $ptf)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$ptf,
                        'kump_pengguna_id'=>4
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
     //insert data pif
    foreach ($this->input->post('pif')as $pif)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pif,
                        'kump_pengguna_id'=>7
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
    
    //insert data pdf
    foreach ($this->input->post('pdf')as $pdf)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pdf,
                        'kump_pengguna_id'=>5
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
    
    // insert data pof
    foreach ($this->input->post('pof')as $pof)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                        'utiliti_sumber_man_id'=>$pof,
                        'kump_pengguna_id'=>6
                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_modelstruktur', $data);
    }
   
    //insert panel penilai
    foreach ($this->input->post('panel_penilai')as $panel_penilai)
    {
        $data= array( 'pnpa_id'=>$this->uri->segment(4),
                       'utiliti_sumber_man_id'=>$panel_penilai,

                    );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1a_panel_penilai', $data);
        
    }

    // insert data pelan kecemasan
    $data = array(       'pnpa_id'=>$this->uri->segment(4),
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
   function updatemodelpnpa($id)
    {
        $data = array(     'pnpa_id'=>$this->input->post('no'),
                         'tugas_pegawai_atasan' => $this->input->post('pegawaikaitan'),        
                         'tugas_pegawai_tjawab_kuasa' => $this->input->post('tjawabdankuasa'),
                         'tugas_pegawai_lain' => $this->input->post('pegawailain')
                    );
        
        
        $this->db->where('pnpa_id', $id);
	$this->db->update('tbl_pnpa_pata_f8_1a_pelan_kom', $data);
        $pnpa_id = $id;
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
  
    function get_syarikat($syarikat_id)
    {
        $this->db->select('nama_syarikat');
        $this->db->where('syarikat_id', $syarikat_id);
        $getUrusSya = $this->db->get('tbl_syarikat');
        
        return $getUrusSya->result();
    }
  

   ########################################################### page treeview ################################## 

    //page treeview
function get_skop()
    {
        //$this->db->select('skop_aktvt_tajuk');
        //$this->db->where('skop_aktvt_id',$skop_aktvt_id);
        $this->db->like('skop_aktvt_kategori', 'skop', 'both');
        $this->db->like('kand_kump_kod', 'pnpa');
        $query = $this->db->get('lkp_skop_aktvt');
        
        return $query->result();
    }
   
   function get_count_pelan_pilih($skop_aktvt_id){

     $this->db->select('*');
     $this->db->where('skop_aktvt_id',$skop_aktvt_id);
     $this->db->where('pnpa_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_pnpa_pata_f8_1b_skop_pilihan');
  
    // $rowcount = $query->num_rows();

     //return $rowcount;
     //$row = $query->result();

     return $query->result();

    }
   
     function skop_pilihan_id(){

     $this->db->select('pnpa_pata_f8_1b_skop_pilihan_id');
     $this->db->where('pnpa_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_pnpa_pata_f8_1b_skop_pilihan');

     return $query->result();

    }   
    
      function skop_aktvt_id_in_db(){

     $this->db->select('skop_aktvt_id');
     $this->db->where('pnpa_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_pnpa_pata_f8_1b_skop_pilihan');

     return $query->result();

    }
    

    
//function untuk add new model struktur pnpa
   function tambahtreeviewpnpa()
     {
  
   $input1 = $this->input->post('skop');
  //print_r($input1);
   $input2 = $this->input->post('keterangan');
   //print_r($input2);

   $data3 = array();
  

  for($i=0;$i<count($input1);$i++){

    $data3[$i]['skop_aktvt_id'] = $input1[$i];
   // echo $input1[$i];
    $t = $this->check_skop_parent_or_child($input1[$i]); 
    //echo "".$t."<br>";

    if($t > 0){

      $data3[$i]['keterangan'] = $input2[$t];

    }else{

      $data3[$i]['keterangan'] = '';

    }

    $data3[$i]['pnpa_id'] = $this->uri->segment(4);
  }
    
 
     
   $sumber = $this->db->insert_batch('tbl_pnpa_pata_f8_1b_skop_pilihan', $data3);
  
    
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
    



    function updatetreeviewpnpa(){

    $skop = $this->input->post('skop'); //skop aktiviti id yg di pilih
 
    $keterangan = $this->input->post('keterangan'); //keterangan

    $skop_pilih_id = $this->input->post('skop_pilihan_id'); //id skop pilihan in db
    
    $skop_aktvt_id_in_db = $this->input->post('skop_aktvt_id_in_db'); //skop aktiviti id dlm db
  
    $update = array();
    $update_ktrg = array();
    $delete = array();

    $insert = array();
    $insert_ktrg = array();


    foreach ($skop_aktvt_id_in_db as $k => $sprow) {

      foreach ($skop as $j => $skoprow) {


          $i=0;
        if($sprow==$skoprow){

          $update[] = $sprow;
          if(array_key_exists($skoprow,$keterangan)){
       $update_ktrg[] = $keterangan[$skoprow];
      }else{
   $update_ktrg[] = '';

      }
          $i=1;
          break;
         }
      
      }
      if($i==0){ 

      $delete[]=$sprow;

      }
      
    }

    foreach ($skop as $j => $skoprow) {
      foreach ($update as $u => $updt ) {

        $i=0;
        if($updt==$skoprow){

      
       $i=1;
       break;
        }

      }
 if($i==0){ 

      $insert[]=$skoprow;

      if(array_key_exists($skoprow,$keterangan)){
       $insert_ktrg[] = $keterangan[$skoprow];
      }else{
   $insert_ktrg[] = '';

      }

      }

    }

  // print_r($insert);
 // print_r($update);
 // print_r($delete);
   //insert 
    //$data3 = array();

   for($i=0;$i<count($insert);$i++){
    //$data3['skop_aktvt_id '] = $insert[$i];

    //$data3['keterangan'] = $insert_ktrg[$i];
  
    //$data3['pnpa_id'] = $this->uri->segment(4);

    $data = array(
               'skop_aktvt_id' => $insert[$i],
               'keterangan' => $insert_ktrg[$i],
               'pnpa_id' => $this->uri->segment(4)
            );

   $this->db->insert('tbl_pnpa_pata_f8_1b_skop_pilihan', $data); 
     
  //  $this->db->insert_batch('tbl_pnpa_pata_f8_1b_skop_pilihan', $data3);
  }
    //update
      //$data4 = array();

 for($i=0;$i<count($update);$i++){

    //$data4[$i]['skop_aktvt_id '] = $update[$i];

    //$data4[$i]['keterangan'] = $update_ktrg[$i];
    //$data4[$i]['pnpa_pata_f8_1b_skop_pilihan_id']=$update[$i];

     
     $data = array(
               'skop_aktvt_id' => $update[$i],
               'keterangan' => $update_ktrg[$i],
              
            );


   $this->db->where('skop_aktvt_id', $update[$i]);
   $this->db->where('pnpa_id', $this->uri->segment(4));
   $this->db->update('tbl_pnpa_pata_f8_1b_skop_pilihan', $data); 

      }
   //$this->db->update_batch('tbl_pnpa_pata_f8_1b_skop_pilihan', $data4,'pnpa_pata_f8_1b_skop_pilihan_id');


//delete

if(count($delete) > 0){
    $this->db->where_in('skop_aktvt_id',$delete);
    $this->db->delete('tbl_pnpa_pata_f8_1b_skop_pilihan');
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
     $this->db->where('pnpa_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_pnpa_pata_f8_1b_skop_pilihan');
  
     $rowcount = $query->num_rows();

     return $rowcount;
     

    }


    function getcountlkpskopaktvt(){

     $this->db->select('*');
     $this->db->where('kand_kump_kod','pnpa');
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
     }
    
     function get_lkpskopaktiviti_1($pnpa_id,$skop_aktvt_id)
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
    
       
    function get_allskop()
    {
        $query = $this->db->get('tbl_pnpa_pata_f8_1b_skop_pilihan');
        
        $row = $query->result();
	
	return $row;
    }
    
    #################################################### page skop and aktiviti2 ################################
    
    
    function insert_pnpa_tbl_pnpa_alat_kerja($funcname){

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
             
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => 1,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_alat_kerja', $data);
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
             
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => 2,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_alat_kerja', $data);
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
             
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => 3,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_alat_kerja', $data);
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
             
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => 4,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_alat_kerja', $data);
            }

      }

    }

    
    
     function delete_pnpa_tbl_pnpa_alat_kerja($funcname){
   
      if($funcname=='kom'){

      $this->db->where('kat_alat_kerja_id',1);
      $this->db->where('pnpa_id',$this->input->post('pnpa_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_pnpa_pata_f8_1b1c_alat_kerja');
            



      }else if($funcname=='pem'){

       $this->db->where('kat_alat_kerja_id',2); 
      $this->db->where('pnpa_id',$this->input->post('pnpa_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_pnpa_pata_f8_1b1c_alat_kerja');
            



      }else if($funcname=='ken'){
        $this->db->where('kat_alat_kerja_id',3);

        $this->db->where('pnpa_id',$this->input->post('pnpa_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_pnpa_pata_f8_1b1c_alat_kerja');
            



      }else if($funcname=='ppe'){

        $this->db->where('kat_alat_kerja_id',4);
      $this->db->where('pnpa_id',$this->input->post('pnpa_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_pnpa_pata_f8_1b1c_alat_kerja');
            


      }
          
      
    }
    
    
    function insert_pnpa_urus_pej($funcname){


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
             
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => intval($strcb_id),
                              'kat_alat_pej_id' => 1,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_urus_pej', $data);
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
             
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => intval($strcb_id),
                              'kat_alat_pej_id' => 2,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_urus_pej', $data);
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
             
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => intval($strcb_id),
                              'kat_alat_pej_id' => 3,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_urus_pej', $data);
            }

      }

    }

    
    function delete_pnpa_urus_pej($funcname){

       if($funcname=='foto'){

      $this->db->where('kat_alat_pej_id',1);
      $this->db->where('pnpa_id',$this->input->post('pnpa_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_pnpa_pata_f8_1b1c_urus_pej');

       }else if($funcname=='fax'){

      $this->db->where('kat_alat_pej_id',2);
      $this->db->where('pnpa_id',$this->input->post('pnpa_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_pnpa_pata_f8_1b1c_urus_pej');

       }else if($funcname=='tel'){

      $this->db->where('kat_alat_pej_id',3);
      $this->db->where('pnpa_id',$this->input->post('pnpa_id'));
      $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
      $this->db->delete('tbl_pnpa_pata_f8_1b1c_urus_pej');

       } 
     
            

    }
    
    function updateskopaktivitipenilaiaset(){


       $data = array(     
                            'f8_1b1c_pihak_berkaitan' => $this->input->post('pihakkaitan'),        
                            'f8_1b1c_tanggungjawab' => $this->input->post('tjawab'),
                            'f8_1b1c_tarikh_mula' => $this->input->post('tarikh_mula'),
                            'f8_1b1c_tarikh_tamat' => $this->input->post('tarikh_akhir'),
                            'catatan' => $this->input->post('catatan'),
                            'objek_sebagai_id' => $this->input->post('objek'),
                            'bajet_aktvt' => $this->input->post('bajet_aktvt'),
                            'sumber_id' => $this->input->post('sumber'),
                            'output' => $this->input->post('output')
                            );
        
        $this->db->where('pnpa_id',$this->input->post('pnpa_id'));
        $this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
        $this->db->update('tbl_pnpa_pata_f8_1b1c', $data);

    }

    
    
      function count_data_in_tbl_pnpa_pata_f8_1b1c(){

         $this->db->select('*');
         $this->db->where('pnpa_id', $this->uri->segment(4));
         $this->db->where('skop_aktvt_id',$this->uri->segment(5));
         $getdata = $this->db->get('tbl_pnpa_pata_f8_1b1c');

         $rowcount = $getdata->num_rows();
        
         return  $rowcount;

    }
    
       function tambahskopaktivitipenilaiaset(){

      $data = array(      'pnpa_id' => $this->input->post('pnpa_id'),
                            'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                            'f8_1b1c_pihak_berkaitan' => $this->input->post('pihakkaitan'),        
                            'f8_1b1c_tanggungjawab' => $this->input->post('tjawab'),
                            'f8_1b1c_tarikh_mula' => $this->input->post('tarikh_mula'),
                            'f8_1b1c_tarikh_tamat' => $this->input->post('tarikh_akhir'),
                            'catatan' => $this->input->post('catatan'),
                            'objek_sebagai_id' => $this->input->post('objek'),
                            'bajet_aktvt' => $this->input->post('bajet_aktvt'),
                            'sumber_id' => $this->input->post('sumber'),
                            'output' => $this->input->post('output')
                            );
        

        $this->db->insert('tbl_pnpa_pata_f8_1b1c', $data);

    }
    
    //segemn untuk skop
public function get_pnpa_skop_from_segment2($id,$skop_aktvt_id)
  {
   	$this->db->select('*');
	$this->db->from('tbl_pnpa_pata_f8_1b1c');
	$this->db->join('lkp_skop_aktvt','tbl_pnpa_pata_f8_1b1c.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
	//$this->db->limit(11,6);
	$this->db->where('tbl_pnpa_pata_f8_1b1c.pnpa_id',$id);
        $this->db->where('tbl_pnpa_pata_f8_1b1c.skop_aktvt_id',$skop_aktvt_id);
        
   	$query = $this->db->get();
	
	$row = $query->result();
	
	return $row;
	
}
 
 function get_lkpskopbutiran_1($pnpa_id, $skop_aktvt_id)
    {
         
         $this->db->select('*');
         $this->db->from('tbl_pnpa_pata_f8_1b_skop_pilihan');
         $this->db->order_by("pnpa_pata_f8_1b_skop_pilihan_id ", "ASC");
         $this->db->join('lkp_skop_aktvt','tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
         $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
          $this->db->where('tbl_pnpa_pata_f8_1b_skop_pilihan.pnpa_id',$pnpa_id);
          $this->db->where('lkp_skop_aktvt.skop_aktvt_id', $skop_aktvt_id);
         //$this->db->where('tbl_pnpa_pata_f8_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
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
    
function get_sumber_rancang($utiliti_sumber_man_id,$pnpa_id,$kat_sumber_man_id, $skop_aktvt_id)
    {
         $this->db->select('*');
         //$this->db->from('tbl_pnpa_pata_f8_1b1c_sumber_man');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('pnpa_id', $pnpa_id);
        $this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
         $this->db->where('skop_aktvt_id', $skop_aktvt_id);
        $getUrusSya = $this->db->get('tbl_pnpa_pata_f8_1b1c_sumber_man');
        
        return $getUrusSya->result();
       
    }
    
    
    function get_total_rancang($utiliti_sumber_man_id,$pnpa_id,$kat_sumber_man_id, $skop_aktvt_id, $gaji_kos_flag)
    {
         $this->db->select('*');
         //$this->db->from('tbl_pnpa_pata_f8_1b1c_sumber_man');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('pnpa_id', $pnpa_id);
        $this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
         $this->db->where('skop_aktvt_id', $skop_aktvt_id);
         $this->db->where('gaji_kos_flag', $gaji_kos_flag);
        $getUrusSya = $this->db->get('tbl_pnpa_pata_f8_1b1c_sumber_man');
        
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
        $data = array(      'pnpa_id' => $this->input->post('pnpa_id'),
                            'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                            'f8_1b1c_pihak_berkaitan' => $this->input->post('pihakkaitan'),        
                            'f8_1b1c_tanggungjawab' => $this->input->post('tjawab'),
                            'f8_1b1c_tarikh_mula' => $this->input->post('tarikh_mula'),
                            'f8_1b1c_tarikh_tamat' => $this->input->post('tarikh_akhir'),
                            'catatan' => $this->input->post('catatan'),
                            'objek_sebagai_id' => $this->input->post('objek'),
                            'bajet_aktvt' => $this->input->post('bajet_aktvt'),
                            'sumber_id' => $this->input->post('sumber'),
                            'output' => $this->input->post('output')
                            );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c', $data);
       
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

             
             
             
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => intval($strcb_id),
                              'kat_alat_pej_id' => $this->input->post('kat_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_urus_pej', $data);
            }
         /*    
          foreach ($this->input->post('fax')as $fax)
            {
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('kat_pej_id_fax')
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_urus_pej', $data);
            }
            
           foreach ($this->input->post('tel')as $tel)
            {
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $tel,
                              'kat_pej_id' => $this->input->post('kat_pej_id_tel')
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_urus_pej', $data);
            }
            
             foreach ($this->input->post('kom')as $foto)
            {
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('urus_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b_skop_pilihan', $data);
            }
             foreach ($this->input->post('foto')as $foto)
            {
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('urus_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b_skop_pilihan', $data);
            }
             foreach ($this->input->post('foto')as $foto)
            {
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('urus_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b_skop_pilihan', $data);
            }
             foreach ($this->input->post('foto')as $foto)
            {
                $data= array( 'pnpa_id'=>$this->input->post('pnpa_id'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'urus_pej_id' => $foto,
                              'kat_pej_id' => $this->input->post('urus_pej_id_foto')
                    
                    );
        
                $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b_skop_pilihan', $data);
            }
        */
    }


     function get_model_ptf($utiliti_sumber_man_id,$pnpa_id)
    {
         $this->db->select('*');
         //$this->db->from('tbl_pnpa_pata_f8_1b1c_sumber_man');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('pnpa_id', $pnpa_id);
        //$this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
        // $this->db->where('skop_aktvt_id', $skop_aktvt_id);
        $getUrusSya = $this->db->get('tbl_pnpa_pata_f8_1a_modelstruktur');
        
        return $getUrusSya->result();
        
    }
    function get_model_panel($utiliti_sumber_man_id,$pnpa_id)
    {
         $this->db->select('*');
         //$this->db->from('tbl_pnpa_pata_f8_1b1c_sumber_man');
        $this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
        $this->db->where('pnpa_id', $pnpa_id);
        //$this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
        // $this->db->where('skop_aktvt_id', $skop_aktvt_id);
        $getUrusSya = $this->db->get('tbl_pnpa_pata_f8_1a_panel_penilai');
        
        return $getUrusSya->result();
        
    }
    
      /*function tambahsumberrancang()
    {
        $data = array(      'pnpa_id' => $this->input->post('pnpa_id'),
                            'gaji_kos_flag' => $this->input->post('kosflag'),
                            'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                            'utiliti_sumber_man_id' => $this->input->post('utiliti_sumber_man_id'),
                            'kos_gaji' => $this->input->post('gaji'),
                            'kos_kerja_lebih_masa' => $this->input->post('kos'),
                            'kat_sumber_man_id' => $this->input->post('kat_sumber_man_id'),
                            
                            );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_sumber_man', $data);
        
    }
*/

    function tambahsumberrancang($cat)
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


        $data = array(      'pnpa_id' => $this->input->post('pnpa_id'),
                            'gaji_kos_flag' => $this->input->post('kosflag'),
                            'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                            'utiliti_sumber_man_id' =>$value2,
                            'kos_gaji' => $this->input->post('gaji'),
                            'kos_kerja_lebih_masa' => $this->input->post('kos'),
                            'kat_sumber_man_id' => $value1,
                            
                            );
        
        $sumber = $this->db->insert('tbl_pnpa_pata_f8_1b1c_sumber_man', $data);
        
    }


     ######################################################## page kawalan rekod ###############################
     
    function get_kawalanrekod($pnpa_id)
    {

        $this->db->order_by("pnpa_pata_f8_1d_id", "DESC");
        $this->db->where('pnpa_id', $pnpa_id);
        $getKawalanrekod = $this->db->get('tbl_pnpa_pata_f8_1d');
        
        return $getKawalanrekod->result();
    }
    
    
        function tambahkawalan_rekod()
    {
              $data = array(//'pnpa_pata_f8_1d_id' => $this->input->post('pnpa_pata_f8_1d_id'),
                            'f8_1d_jenis_rekod' => $this->input->post('jenis_rekod1'),
                            'f8_1d_lokasi' => $this->input->post('lokasi1'),
                            'tempoh' => $this->input->post('tempoh1'),
                            'pnpa_id' => $this->input->post('no')
                            );
        
        $panel = $this->db->insert('tbl_pnpa_pata_f8_1d', $data);
      
        
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
    
   
    
    function get_kawalanrekod_1($pnpa_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('pnpa_pata_f8_1d_id', $pnpa_id);
        $getKawalanrekod = $this->db->get('tbl_pnpa_pata_f8_1d');
        
        return $getKawalanrekod->result();
    }
    
     function update_rekod($id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('pnpa_pata_f8_1d_id', $id);
        $up_rekod = $this->db->update('tbl_pnpa_pata_f8_1d', $dataDetail);
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
    

    ################################ page dokumen rujukan ##################################################
    
      
  function get_dokumenrujukan($pnpa_id)
    {
        $this->db->order_by("lampiran_id", "DESC");
        $this->db->where('pnpa_id', $pnpa_id);
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
  
    //update : diana ismail 23/10/2013
  function tambahdokumen($dataFile=array())
    {
      $no=$this->uri->segment(3);
            /*$data = array( array('lampiran_id' => $this->input->post('lampiran_id'),
                            'nama_fail' => $this->input->post('nama_fail1'),
                            'nama_fail_asal' => $this->input->post('nama_fail_asal1'),
                            'pnpa_id' => $this->input->post('no')
                            ),
                  
       array('lampiran_id' => $this->input->post('lampiran_id'),
                            'nama_fail' => $this->input->post('nama_fail2'),
                            'nama_fail_asal' => $this->input->post('nama_fail_asal2'),
                           'pnpa_id' => $this->input->post('no')
                            )
                  );
   
   $panel = $this->db->insert_batch('tbl_lampiran', $data); */
   
   foreach($dataFile as $valueDesc){ $fileData[] = $valueDesc; }
   
   $data = array(  'nama_fail' => $fileData[0],
       'nama_fail_asal' => $fileData[1],
       'lokasi_fail' =>$fileData[2],
       'jenis_fail' =>$fileData[3],
       'tarikh_upload' => date('Y-m-d H:i:s'),
        'pnpa_id' => $fileData[4]
        );
    
   $panel = $this->db->insert('tbl_lampiran', $data);
   
        
        if($panel)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah kawalan rekod - PTRA',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
                             'modul' => 'Kawalan Rekod PTRA');
            
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
      
   
    ############################ page untuk summary pnpa borang baru######################################################

public function get_all_kandungan_pnpa($id){
    $this->db->select('*');
  $this->db->from('tbl_pnpa');
  $this->db->join('tbl_kandungan','tbl_pnpa.pnpa_id = tbl_kandungan.pnpa_id');
  $this->db->where('tbl_pnpa.pnpa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
    
    
    
    ###################################### page untuj senarai ppd pnpa#####################################################################
    

	

function get_pnpa($pspa_id)
    {
		$this->db->where('pspa_id',$pspa_id);
        $getPtra = $this->db->get('tbl_pnpa');
        
        return $getPtra->result();
		
		
		
    }
	
	//added : diana 31/10/2013
	function get_pnpa_status($pspa_id)
    {
		/*$this->db->where('pspa_id',$pspa_id);
        $getPtra = $this->db->get('tbl_pnpa');
        
        return $getPtra->result();*/
		
		$this->db->select('*');
		$this->db->from('tbl_pnpa');
		$this->db->join('tbl_myspata_user','tbl_pnpa.pnpa_sedia_oleh_id = tbl_myspata_user.myspata_userid');
		$this->db->where('pspa_id',$pspa_id);
        $getPtra = $this->db->get();
        
        return $getPtra->result();
		
    }
	

######################################### page summary pp pnpa ##################################################
//name : fatin
//date : 26/10/13
//desc : for summary_pp_pnpa view
 
function get_model_summary_pnpa($id){
        
    $this->db->select('*');
  $this->db->from('tbl_pnpa_pata_f8_1a_pelan_kom');
  $this->db->where('pnpa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_skop_summary_pnpa($id){
        
    $this->db->select('*');
  $this->db->from('tbl_pnpa_pata_f8_1b_skop_pilihan');
  $this->db->where('pnpa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_skop2_summary_pnpa($id){
        
    $this->db->select('*');
  $this->db->from('tbl_pnpa_pata_f8_1b1c');
  $this->db->where('pnpa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_sumber_summary_pnpa($id){
        
    $this->db->select('*');
  $this->db->from('tbl_pnpa_pata_f8_1b1c_sumber_man');
  $this->db->where('pnpa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_pej_summary_pnpa($id){
        
    $this->db->select('*');
  $this->db->from('tbl_pnpa_pata_f8_1b1c_urus_pej');
  $this->db->where('pnpa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_kawalan_summary_pnpa($id){
        
    $this->db->select('*');
  $this->db->from('tbl_pnpa_pata_f8_1d');
  $this->db->where('pnpa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}


function get_dokumen_summary_pnpa($id){
        
    $this->db->select('*');
  $this->db->from('tbl_lampiran');
  $this->db->where('pnpa_id',$id);
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
 
public function insert_status_log($id_pspao_akhir,$status,$pnpa_id){

$sessionarray = $this->session->all_userdata();


  $data = array(
    'status_id' => $status,
    'status_tarikh' => date('Y-m-d H:i:s'),
    'myspata_userid' => $sessionarray['user_id'],
    //'status_ulasan' => $status_ulasan,
    'pspa_id' => $id_pspao_akhir,
    'kump_kand_id' => 4,
    'rekod_pelan_id' => $pnpa_id
    
  );

  $this->db->insert('tbl_statuslog', $data);


}

function get_pnpa_sah_value($pnpa_id,$pspa_id){

    $this->db->select('pnpa_tarikh_sah');
    $this->db->from('tbl_pnpa');
    $this->db->where('pspa_id',$pspa_id);
    $this->db->where('pnpa_id',$pnpa_id);
    
    $query = $this->db->get();
    $row = $query->row();
  
    return $row->pnpa_tarikh_sah;
  }
        
 public function get_ptfid_pnpa($id){
  $this->db->select('pspa_semak_oleh_id');
  $this->db->where('pspa_id', $id);
  $query = $this->db->get('tbl_pspao');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pspa_semak_oleh_id;
  } 
  }
  public function get_ppid_pnpa($id){
  $this->db->select('pspa_lulus_oleh_id');
  $this->db->where('pspa_id', $id);
  $query = $this->db->get('tbl_pspao');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pspa_lulus_oleh_id;
  } 
  }
   public function get_ppdid_pnpa($id,$pnpa_id){
  $this->db->select('pnpa_sedia_oleh_id');
  $this->db->where('pspa_id', $id);
        $this->db->where('pnpa_id', $pnpa_id);
  $query = $this->db->get('tbl_pnpa');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pnpa_sedia_oleh_id;
  } 
  }
  public function get_pifid_pnpa($id,$pnpa){
  $this->db->select('pif_id');
  $this->db->where('pspa_id', $id);
  $this->db->where('pnpa', $pnpa);
  $query = $this->db->get('tbl_notifikasi_pelan');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pif_id;
  } 
  }
  
  public function get_pofid_pnpa($id,$pnpa){
  $this->db->select('pof_id');
  $this->db->where('pspa_id', $id);
        $this->db->where('pnpa',$pnpa);
  $query = $this->db->get('tbl_notifikasi_pelan');
  
  if ($query->num_rows() > 0){
     $row = $query->row(); 
     return $row->pof_id;
  } 
  }
  


  function get_pnpa2($pspa_id,$pnpa_id)
    {
         $this->db->select('*');
         $this->db->where('pspa_id',$pspa_id);
         $this->db->where('pnpa_id',$pnpa_id);
         $this->db->where('idkem', $this->session->userdata('user_kemid'));
         //$this->db->where_not_in('pnpa_tarikh_sedia','0000-00-00 00:00:00');
        $this->db->from('tbl_pnpa');
         $this->db->order_by("pnpa_id", "DESC");
        
        
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;
    }
    
 public function insert_status_log_ulasan($id,$status,$pnpa_id){

$sessionarray = $this->session->all_userdata();


  $data = array(
    'status_id' => $status,
    'status_tarikh' => date('Y-m-d H:i:s'),
    'myspata_userid' => $sessionarray['user_id'],
    'status_ulasan' => $this->input->post('ulasan'),
    'pspa_id' => $id,
    'kump_kand_id' => 4,
    'rekod_pelan_id' => $pnpa_id
    
  );

  $this->db->insert('tbl_statuslog', $data);


}
function update_pnpa_date_sah($id,$pnpa_id){

$data = array(

    'pnpa_tarikh_sah' => date('Y-m-d')
  );
  $this->db->where('pspa_id', $id);
  $this->db->where('pnpa_id', $pnpa_id);
  $this->db->update('tbl_pnpa', $data);


}
function update_pnpa_date_lulus($id,$pnpa_id){

$data = array(

    'pnpa_tarikh_lulus' => date('Y-m-d')
  );
  $this->db->where('pspa_id', $id);
  $this->db->where('pnpa_id', $pnpa_id);
  $this->db->update('tbl_pnpa', $data);


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
	
	function cal_man_cost($pnpa_id)
	{
		//main table
		//$this->db->select_sum('bajet_aktvt');
		$this->db->select('*');
		$this->db->where('pnpa_id', $pnpa_id);
        $query_cost = $this->db->get('tbl_pnpa_pata_f8_1b1c_sumber_man');

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
	
	function cal_alatkerja_cost($pnpa_id)
	{
		$this->db->select('kos_seunit');
		$this->db->where('pnpa_id', $pnpa_id);
        $query_alatkerja = $this->db->get('tbl_pnpa_pata_f8_1b1c_alat_kerja');
		

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
	
	function cal_pejabat_cost($pnpa_id)
	{
		$this->db->select('kos_seunit');
		$this->db->where('pnpa_id', $pnpa_id);
        $query_pejabat = $this->db->get('tbl_pnpa_pata_f8_1b1c_urus_pej');
		

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
	
	//function calBajet($pnpa_id,$skop_aktiviti_id)
	function cal_bajet($pnpa_id)
	{
		//tbl_pnpa_pata_f8_1b1c
		//tbl_pnpa_pata_f8_1b1c_sumber_man
		//tbl_pnpa_pata_f8_1b1c_alat_kerja
		//tbl_pnpa_pata_f8_1b1c_urus_pej
		
		//main table
		$this->db->select('bajet_aktvt');
		$this->db->where('pnpa_id', $pnpa_id);
        $query_bajet = $this->db->get('tbl_pnpa_pata_f8_1b1c');
		  
		if ($query_bajet->num_rows() > 0)
		{
			$row = $query_bajet->row(); 
			
			$bajet_aktiviti = $row->bajet_aktvt;
			
			$human_cost = $this->cal_man_cost($pnpa_id);
			$alat_cost = $this->cal_alatkerja_cost($pnpa_id);
			$pejabat_cost = $this->cal_pejabat_cost($pnpa_id);
			
			$total_cost = $bajet_aktiviti+$human_cost+$alat_cost+$pejabat_cost;
		} 		
		else
		{
			$total_cost = 0;
		}
		
		return number_format($total_cost,2);
	}
	
	//calculation based on skop id begin here...
  
  function cal_man_cost_skop($pnpa_id,$skop_aktiviti_id)
	{
		//main table
		//$this->db->select_sum('bajet_aktvt');
		$this->db->select('*');
		$this->db->where('pnpa_id', $pnpa_id);
        $this->db->where('skop_aktvt_id', $skop_aktiviti_id);
        $query_cost = $this->db->get('tbl_pnpa_pata_f8_1b1c_sumber_man');

		
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
	
	function cal_alatkerja_cost_skop($pnpa_id,$skop_aktiviti_id)
	{
		$this->db->select('kos_seunit');
		$this->db->where('pnpa_id', $pnpa_id);
		$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
        $query_alatkerja = $this->db->get('tbl_pnpa_pata_f8_1b1c_alat_kerja');
		

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
	
	function cal_pejabat_cost_skop($pnpa_id,$skop_aktiviti_id)
	{
		$this->db->select('kos_seunit');
		$this->db->where('pnpa_id', $pnpa_id);
		$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
        $query_pejabat = $this->db->get('tbl_pnpa_pata_f8_1b1c_urus_pej');
		

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
	
	function cal_bajet_skop($pnpa_id,$skop_aktiviti_id)
	{
		//tbl_pnpa_pata_f8_1b1c
		//tbl_pnpa_pata_f8_1b1c_sumber_man
		//tbl_pnpa_pata_f8_1b1c_alat_kerja
		//tbl_pnpa_pata_f8_1b1c_urus_pej
		
		//main table
		$this->db->select('bajet_aktvt');
		$this->db->where('pnpa_id', $pnpa_id);
		$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
        $query_bajet = $this->db->get('tbl_pnpa_pata_f8_1b1c');
				
		if ($query_bajet->num_rows() > 0)
		{
			$row = $query_bajet->row(); 
			
			$bajet_aktiviti = $row->bajet_aktvt;
			
			$human_cost = $this->cal_man_cost_skop($pnpa_id,$skop_aktiviti_id);
			$alat_cost = $this->cal_alatkerja_cost_skop($pnpa_id,$skop_aktiviti_id);
			$pejabat_cost = $this->cal_pejabat_cost_skop($pnpa_id,$skop_aktiviti_id);
			
			$total_cost = $bajet_aktiviti+$human_cost+$alat_cost+$pejabat_cost;
			
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
    //$this->db->where('pnpa_id',$pnpa_id);
     $this->db->where('pspa_id',$pspa_id);
    
   $query = $this->db->get();
  $row = $query->row();

    return $row->notifikasi_id;
  }
    public function get_ulasan_terbaru($pspaid,$kump,$pnpa_id){
  $this->db->select('status_ulasan');
  $this->db->where('pspa_id', $pspaid);
  $this->db->where('kump_kand_id', $kump);
        $this->db->where('rekod_pelan_id', $pnpa_id);
  $this->db->order_by('statuslog_id', 'DESC');
  
  $query = $this->db->get('tbl_statuslog');
  
  if($query){ 
    
    $row = $query->row();
    return $row->status_ulasan;
  }else{
    return FALSE;
  }
  }
  
}
?>
