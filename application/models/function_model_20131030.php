<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


class Function_model extends CI_Model {

 
 function get_status_pelan($pspaid,$rekodplanid,$kumpkandid){

	//if((!empty($pspaid))&&(!empty($kump_land))){


	$this->db->select('tbl_statuslog.*,lkp_status.*');
	$this->db->where('tbl_statuslog.pspa_id',$pspaid);
	$this->db->where('tbl_statuslog.rekod_pelan_id',$rekodplanid);
	$this->db->where('tbl_statuslog.kump_kand_id',$kumpkandid);


	$this->db->from('tbl_statuslog');
	$this->db->join('lkp_status', 'tbl_statuslog.status_id = lkp_status.status_id', 'inner'); 
	$this->db->order_by('tbl_statuslog.statuslog_id', 'DESC');
	$this->db->limit("1");
	$query = $this->db->get();

	if($query->result()){
		$row = $query->row();
		return $row->nama_status;
	}else{
		return 'Tidak Lengkap';
	}
  }


    function insert_notifikasi($senarai_notifikasi_id,$kump_kand_id,$userid_from,$userid_to,$path,$remarks=NULL)
    {

     
    $data = array(
    
    'kump_kand_id' => $kump_kand_id,
    'senarai_notifikasi_id' => $senarai_notifikasi_id,
    'myspata_userid_from' => $userid_from,
    'tarikh_dihantar' => date('Y-m-d H:i:s'),
    'myspata_userid_to' => $userid_to,
    'tarikh_dibaca' => '0000-00-00 00:00:00',
    'status' => 0,
    'notifikasi_url' =>$path ,
     'remarks' =>$remarks

    );
   
    $this->db->insert('tbl_notifikasi', $data);
    $noti_id=$this->db->insert_id();
    return $noti_id;

    }

   function check_status_log($pspaid,$kump_kand_id,$rekod_pelan_id){

  $this->db->select('status_id');
   $this->db->from('tbl_statuslog');
   $this->db->where('pspa_id',$pspaid);
   $this->db->where('kump_kand_id',$kump_kand_id);
   $this->db->where('rekod_pelan_id',$rekod_pelan_id);
   $this->db->order_by('statuslog_id', 'DESC');

   $query = $this->db->get();

   $row = $query->row();

   return $row->status_id;

  }


   function get_masej($id,$kand_id)
    {
        if($kand_id==1)
             {

                //$this->db->select('tbl_myspata_user.nama_user');
                $this->db->from('tbl_pspao_awal');
                $this->db->where('pspa_awal_id', $id);
                //$this->db->join('tbl_myspata_user','tbl_myspata_user.myspata_userid= tbl_pspao_awal.pspa_semak_oleh_id');
                //$get_msg1 = $this->db->get();

                $query = $this->db->get();

                $row = $query->row();
                    $data['tahun_mula']=$row->tahun_mula;
                    $data['tahun_akhir']=$row->tahun_akhir;
                    $data['pspa_semak_oleh_id']=$row->pspa_semak_oleh_id;
                    $data['kategori']='PSPA(O) Awal';
              return $data;

                //return $get_msg1->result();
            }
        
        else if($kand_id==7)
            {
            //$this->db->select('tbl_myspata_user.nama_user');
                $this->db->from('tbl_pspao');
                $this->db->where('pspa_id', $id);
                //$this->db->join('tbl_myspata_user','tbl_myspata_user.myspata_userid= tbl_pspao_awal.pspa_semak_oleh_id');
                //$get_msg2 = $this->db->get();
                    $query = $this->db->get();
                    $row = $query->row();
                    $data['tahun_mula']=$row->tahun_mula;
                    $data['tahun_akhir']=$row->tahun_akhir;
                    $data['pspa_semak_oleh_id']=$row->pspa_semak_oleh_id;
                    $data['kategori']='PSPA(O) Akhir';
              return $data;

                //return $get_msg2->result();
            }
            
        else 
            {
            echo 'gagal';
            
            }
    }
function get_namauser($myspata_userid)
    {
       $this->db->where('myspata_userid', $myspata_userid);
        $get_nama_user = $this->db->get('tbl_myspata_user');
        
        return $get_nama_user->result();
    }

        function get_status_pelantahunan($pspaid,$rekodplanid,$kumpkandid){

   //if((!empty($pspaid))&&(!empty($kump_land))){


       $this->db->select('tbl_statuslog.*,lkp_status.*');
       $this->db->where('tbl_statuslog.pspa_id',$pspaid);
       $this->db->where('tbl_statuslog.rekod_pelan_id',$rekodplanid);
       $this->db->where('tbl_statuslog.kump_kand_id',$kumpkandid);


       $this->db->from('tbl_statuslog');
       $this->db->join('lkp_status', 'tbl_statuslog.status_id = lkp_status.status_id', 'inner'); 
       $this->db->order_by('tbl_statuslog.statuslog_id', 'DESC');
       $this->db->limit("1");
       $query = $this->db->get();

          if($query->result()){

             $row = $query->row();

          }
		  else
		  {
		    $this->db->select('nama_status');
			$this->db->where('status_id','7');
			
			$query = $this->db->get('lkp_status');
			
			$row = $query->row();
			 
		  }
		  
	  return $row->nama_status;
	  
      
    }

}

?>
