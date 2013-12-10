<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Pspao_model extends CI_Model {

  function __construct(){
  
    parent::__construct();
    date_default_timezone_set('Asia/Kuala_Lumpur');
  
}


function get_kementerian_name($user_kemid){

         $this->db->select('namakem');
        $this->db->where('idkem', $user_kemid);
        $get_namakem = $this->db->get('lkp_kementerian');


          
             $row = $get_namakem->row();

          
       return $row->namakem;
        
        //return $get_namakem->result();

}
   
  function get_jabatan_name($user_jabid){


        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $user_jabid);
        $get_namakem = $this->db->get('lkp_jab_agensi');
        
        return $get_namakem->result();


  }

  function tambahpspaotahun($user_kemid)

  {

   $data = array('tahun_mula' => $this->input->post('tempoh_mula'),
                 'tahun_akhir' => $this->input->post('tempoh_akhir'),
                 'idkem' => $user_kemid
                );
        
      $tempoh = $this->db->insert('tbl_pspao_awal', $data);
      $lastid = $this->db->insert_id();

      
           
      return $lastid;
    
        

  }


   function get_ppd($user_kemid)  //dapatkan ppd kementerian
 {

       $this->db->select('tbl_myspata_user_to_matrix.*,tbl_myspata_user.*');
       $this->db->where('tbl_myspata_user.idkem',$user_kemid);
       $this->db->where('tbl_myspata_user_to_matrix.kump_pengguna_id',8);
       $this->db->from('tbl_myspata_user');
       $this->db->join('tbl_myspata_user_to_matrix', 'tbl_myspata_user_to_matrix.myspata_userid = tbl_myspata_user.myspata_userid', 'inner'); 
       $this->db->order_by('tbl_myspata_user.nama_user', 'ASC');
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

       
    
   
   } 
  
function get_detail_user($userid)  //dapatkan ppd kementerian
 {

       $this->db->select('*');
       $this->db->where('myspata_userid ',$userid);
       $this->db->from('tbl_myspata_user');
      $query = $this->db->get();

       $data = array();


      if ($query->result())
     {
   foreach ($query->result() as $row)
   {
      $data[] = $row;
      
   }
}

    
       return $data;

       
    
   
   } 



   
  function updatepspaoawal($userid,$lastid,$jabagensi,$idnegeri){

    $data = array(
              'idjab_agensi' => $jabagensi,
               'idnegeri' => $idnegeri,
               'pspa_sedia_oleh_id' => $userid,
               'pspa_tarikh_sedia' => date('Y-m-d H:i:s')
            );

  $this->db->where('pspa_id', $lastid);
  $data = $this->db->update('tbl_pspao_awal', $data); 

  return $data;



  }



  function getuserdetail($userid){

        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $user_jabid);
        $get_namakem = $this->db->get('lkp_jab_agensi');
        
        return $get_namakem->result();

  }

   
   
   
   function get_senarai_pp_pspao()
   {
      $this->db->select('*');
      // $this->db->where('status',0);
      // $this->db->where('myspata_userid_to',$session_id);
       $this->db->from('tbl_pspao');
       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data; 
   }
   
   
  function get_senarai_ptf_pspao()

   {
       
    
       $this->db->select('*');
      // $this->db->where('status',0);
       $this->db->where('idkem', $this->session->userdata('user_kemid'));
       $this->db->where_not_in('pspa_tarikh_sedia','0000-00-00 00:00:00');
       $this->db->from('tbl_pspao_awal');



       $query = $this->db->get();

       $data = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $data[] = $row;
       }

       return $data;

    
   }
   
   
      
    function get_nama_pemilik_doc($userid){

       $this->db->select('*');
       $this->db->where('myspata_userid',$userid);
       $this->db->from('tbl_myspata_user');
       $query = $this->db->get();

       $userdata = array();

       if($query->result())
       foreach ($query->result() as $row) {
         
         $userdata[] = $row;
       }

       return $userdata;


    }

   
   public function get_pspao_awal_from_segment($id){

  $this->db->select('*');
  $this->db->from('tbl_pspao');
  $this->db->join('tbl_kandungan','tbl_pspao.pspa_id = tbl_kandungan.pspa_id');
  $this->db->where('tbl_pspao.pspa_id',$id);
    $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  
}
  

  public function insert_pspao_awal(){

  $sessionarray = $this->session->all_userdata();
  
  $data = array(
    'tahun_mula' => $this->input->post('tahun_mula'),
    'tahun_akhir' => $this->input->post('tahun_akhir'),
    'idkem' => $sessionarray['user_kemid'],
    'idjab_agensi' => $sessionarray['user_jabid'],
    'idnegeri' => $sessionarray['user_negid'],
    'pspa_sedia_oleh_id' => $sessionarray['user_negid'],
    'pspa_tarikh_sedia' => date('Y-m-d')
  );

  $this->db->insert('tbl_pspao_awal', $data);
  $idbaru = $this->db->insert_id();
  //echo $idbaru;
  //$idbaru = 1;

  $kand_utama_bil = $this->input->post('kand_utama_bil');
  $kand_utama = $this->input->post('kand_utama');
  
  $data2 = array(
  
    array(
      'kump_kand_id' => '1',
      'pspa_awal_id' => $idbaru,
      'kand_utama_bil' => $kand_utama_bil[0],
      'kand_utama' => $kand_utama[0],
      'kand_utama_detail' => $this->input->post('kand_pendahuluan'),
      'node_type' => '0',
      'kand_type' => '1'
    ),
    array(
      'kump_kand_id' => '1',
      'pspa_awal_id' => $idbaru,
      'kand_utama_bil' => $kand_utama_bil[1],
      'kand_utama' => $kand_utama[1],
      'kand_utama_detail' => $this->input->post('kand_visi'),
      'node_type' => '0',
      'kand_type' => '1'
    ),
    array(
      'kump_kand_id' => '1',
      'pspa_awal_id' => $idbaru,
      'kand_utama_bil' => $kand_utama_bil[2],
      'kand_utama' => $kand_utama[2],
      'kand_utama_detail' => $this->input->post('kand_misi'),
      'node_type' => '0',
      'kand_type' => '1'
    ),
    array(
      'kump_kand_id' => '1',
      'pspa_awal_id' => $idbaru,
      'kand_utama_bil' => $kand_utama_bil[3],
      'kand_utama' => $kand_utama[3],
      'kand_utama_detail' => $this->input->post('kand_objektif'),
      'node_type' => '0',
      'kand_type' => '1'
    )
    
    
  );
  
  $this->db->insert_batch('tbl_kandungan', $data2);
  
  return $idbaru;
  

}

public function insert_status_log($idpspao){

$sessionarray = $this->session->all_userdata();

$checkButton  = $this->input->post('simpan');

if($checkButton==1){

$status = 1;

}
else{
$status = 2;

}
  
  $data = array(
    'status_id' => $status,
    'status_tarikh' => date('Y-m-d H:i:s'),
    'myspata_userid' => $sessionarray['user_id'],
    'pspa_id' => $idpspao,
    'kump_kand_id' => 1,
    'rekod_pelan_id' => 0
    
  );

  $this->db->insert('tbl_statuslog', $data);


}


public function update_pspao_awal($id){
  $sessionarray = $this->session->all_userdata();
  
  $data = array(
    'tahun_mula' => $this->input->post('tahun_mula'),
    'tahun_akhir' => $this->input->post('tahun_akhir'),
    'idkem' => $sessionarray['user_kemid'],
    'idjab_agensi' => $sessionarray['user_jabid'],
    'idnegeri' => $sessionarray['user_negid'],
    'pspa_sedia_oleh_id' => $sessionarray['user_negid'],
    'pspa_tarikh_sedia' => date('Y-m-d')
  );
  $this->db->where('pspa_id', $id);
  $this->db->update('tbl_pspao_awal', $data);
  //$idbaru = $this->db->insert_id();
  $idbaru = $id;

  $kand_id = $this->input->post('kand_id');
  $kand_utama_bil = $this->input->post('kand_utama_bil');
  $kand_utama = $this->input->post('kand_utama');
  
  $data2 = array(
  
    array(
      'kandungan_id' => $kand_id[0],
      'kump_kand_id' => '1',
      'pspa_awal_id' => $idbaru,
      'kand_utama_bil' => $kand_utama_bil[0],
      'kand_utama' => $kand_utama[0],
      'kand_utama_detail' => $this->input->post('kand_pendahuluan'),
      'node_type' => '0',
      'kand_type' => '1'
    ),
    array(
      'kandungan_id' => $kand_id[1],
      'kump_kand_id' => '1',
      'pspa_awal_id' => $idbaru,
      'kand_utama_bil' => $kand_utama_bil[1],
      'kand_utama' => $kand_utama[1],
      'kand_utama_detail' => $this->input->post('kand_visi'),
      'node_type' => '0',
      'kand_type' => '1'
    ),
    array(
      'kandungan_id' => $kand_id[2],
      'kump_kand_id' => '1',
      'pspa_awal_id' => $idbaru,
      'kand_utama_bil' => $kand_utama_bil[2],
      'kand_utama' => $kand_utama[2],
      'kand_utama_detail' => $this->input->post('kand_misi'),
      'node_type' => '0',
      'kand_type' => '1'
    ),
    array(
      'kandungan_id' => $kand_id[3],
      'kump_kand_id' => '1',
      'pspa_awal_id' => $idbaru,
      'kand_utama_bil' => $kand_utama_bil[3],
      'kand_utama' => $kand_utama[3],
      'kand_utama_detail' => $this->input->post('kand_objektif'),
      'node_type' => '0',
      'kand_type' => '1'
    )
  
  );
  
  $this->db->update_batch('tbl_kandungan', $data2, 'kandungan_id');
  
  return $idbaru;

}


public function get_pspao_detail($id){

  $this->db->select('*');
  $this->db->from('tbl_pspao_awal');
  $this->db->join('tbl_kandungan','tbl_pspao_awal.pspa_awal_id = tbl_kandungan.pspa_awal_id');
  $this->db->where('tbl_pspao_awal.pspa_awal_id',$id);
  $query = $this->db->get();
  
  $row = $query->result();
  
  return $row;
  

}

public function get_kem_name($id){

  $this->db->select('*');
  $this->db->from('tbl_pspao_awal');
  $this->db->join('lkp_kementerian','tbl_pspao_awal.idkem = lkp_kementerian.idkem');
  $this->db->where('tbl_pspao_awal.pspa_awal_id',$id);
  $query = $this->db->get();
  
  $row = $query->row();
  
  return $row->namakem;
  

}
  

  public function get_tahun_mula($id){

  $this->db->select('tahun_mula');
  $this->db->from('tbl_pspao_awal');
   $this->db->where('pspa_awal_id',$id);
   $query = $this->db->get();
  
  $row = $query->row();
  
  return $row->tahun_mula;
  

  }

  public function get_tahun_akhir($id){

  $this->db->select('tahun_akhir');
  $this->db->from('tbl_pspao_awal');
   $this->db->where('pspa_awal_id',$id);
  $query = $this->db->get();
  
  $row = $query->row();
  
  return $row->tahun_akhir;
  

  }


  public function update_pspao_awal_edit($id)

  {

    $data = array(
    'tahun_mula' => $this->input->post('tempoh_mula'),
    'tahun_akhir' => $this->input->post('tempoh_akhir'),
    
    );
   
    $this->db->where('pspa_awal_id', $id);
    $this->db->update('tbl_pspao_awal', $data);

 
 $checkButton  = $this->input->post('sah');

if($checkButton=='sah'){

$status = 4;

}else
{
$status = 3;

}




  $data2 = array(

   'status_ulasan' => $this->input->post('ulasan'),
    'status_id '   => $status,
    'status_tarikh' => date('Y-m-d H:i:s'),
    );

  $this->db->where('kump_kand_id', 1);
  $this->db->where('pspa_id ', $id);
  $this->db->insert('tbl_statuslog', $data2);


   $input1 = $this->input->post('kand_id');
   $input2 = $this->input->post('kand_detail');

   $data3 = array();
  
  for($i=0;$i<count($input1);$i++){
    $data3[$i]['kandungan_id'] = $input1[$i];
    $data3[$i]['kand_utama_detail'] = $input2[$i];
  }
  
  $this->db->update_batch('tbl_kandungan', $data3, 'kandungan_id');
  
  return $data3;
  
   } 
    
}

?>
