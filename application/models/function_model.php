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
	
	function cek_notifikasi_ptf($senarai_notifikasi_id,$kump_kand_id,$userid_to,$path){
		
		$this->db->where('senarai_notifikasi_id',$senarai_notifikasi_id);
		$this->db->where('kump_kand_id',$kump_kand_id);
		$this->db->where('myspata_userid_to',$userid_to);
		$this->db->where('notifikasi_url',$path);
		$query = $this->db->get('tbl_notifikasi');
				
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
		
	}

  function check_status_log($pspaid,$kump_kand_id,$rekod_pelan_id){

   $this->db->select('status_id');
   $this->db->from('tbl_statuslog');
   $this->db->where('pspa_id',$pspaid);
   $this->db->where('kump_kand_id',$kump_kand_id);
   $this->db->where('rekod_pelan_id',$rekod_pelan_id);
   $this->db->order_by('statuslog_id', 'DESC');

   $query = $this->db->get();
   
   
   if($query->num_rows() > 0){
   	$row = $query->row(); //kusang update 2013-11-09

   	return $row->status_id;
   }else{
	return 7;
   }

  }

function check_status_log1($pspaid,$kump_kand_id,$rekod_pelan_id){

  //$this->db->select('status_id');
   $query = $this->db->get('tbl_statuslog');
   $this->db->where('pspa_id',$pspaid);
   $this->db->where('kump_kand_id',$kump_kand_id);
   $this->db->where('rekod_pelan_id',$rekod_pelan_id);
   $this->db->order_by('statuslog_id', 'DESC');

   if($query->num_rows() > 0){
      return TRUE;
    }else{
      return FALSE;
    }

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
function get_tab($pelan)
    {
    $sessionarray = $this->session->all_userdata();
     //$this->aauth->get_session($NOTI); 
    $gettab=NULL;
    
     if($pelan==1){ $pspao='<li class="active">'; }else {$pspao='<li class="">';}
      if($pelan==2){ $ptra='<li class="active">'; }else {$ptra='<li class="">';}
      if($pelan==3){ $popa='<li class="active">'; }else {$popa='<li class="">';}
      if($pelan==4){ $pnpa='<li class="active">'; }else {$pnpa='<li class="">';}
      if($pelan==5){ $ppun='<li class="active">'; }else {$ppun='<li class="">';}
      if($pelan==6){ $pla='<li class="active">'; }else {$pla='<li class="">';}
       
     if($sessionarray ['user_rolegroupid'] == 3){$link='pspao/senarai_pspao_akhir_pp_2/';}
     else if($sessionarray ['user_rolegroupid'] == 4){$link='pspao/senarai_pspao_akhir_ptf_2/';}
     else if($sessionarray ['user_rolegroupid'] == 6){$link='pspao/senarai_pspao_akhir_ptf_2/';}
     else if($sessionarray ['user_rolegroupid'] == 7){$link='pspao/senarai_pspao_akhir_ptf_2/';}
     else if ($sessionarray ['user_rolegroupid'] == 8){$link='pspao/senarai_pspao_akhir_ppd_2/';}
     
    if($this->aauth->get_session('user_noti')!='wysiwyg')
     {
          if($this->pnpa_model->get_pelan_ptra($this->uri->segment(3),1))
                { $ptratab= $ptra.'<a href="'.site_url('ptra/senarai_ppd_ptra/'.$this->uri->segment(3)).'">PTRA</a></li>';} 
          else { $ptratab= $ptra.'<a href=""><font color="#A8A8A8">PTRA</font></a></li>';}
          
          if($this->pnpa_model->get_pelan_popa($this->uri->segment(3),1))
                { $popatab= $popa.'<a href="'.site_url('popa/senarai_ppd_popa/'.$this->uri->segment(3)).'">POPA</a></li>';} 
          else { $popatab= $popa.'<a href=""><font color="#A8A8A8">POPA</font></a></li>';}
          
          if($this->pnpa_model->get_pelan_pnpa($this->uri->segment(3),1))
                { $pnpatab= $pnpa.'<a href="'.site_url('pnpa/senarai_ppd_pnpa/'.$this->uri->segment(3)).'">PNPA</a></li>';} 
          else { $pnpatab= $pnpa.'<a href=""><font color="#A8A8A8">PNPA</font></a></li>';}
          
          if($this->pnpa_model->get_pelan_ppun($this->uri->segment(3),1))
                { $ppuntab= $ppun.'<a href="'.site_url('ppun/senarai_ppd_ppun/'.$this->uri->segment(3)).'">PPUN</a></li>';} 
          else { $ppuntab= $ppun.'<a href=""><font color="#A8A8A8">PPUN</font></a></li>';}
          
          if($this->pnpa_model->get_pelan_pla($this->uri->segment(3),1))
                { $platab= $pla.'<a href="'.site_url('pla/senarai_ppd_pla/'.$this->uri->segment(3)).'">PLA</a></li>';} 
          else { $platab= $pla.'<a href=""><font color="#A8A8A8">PLA</font></a></li>';}
           
          
          
       $gettab= '<ul class="nav nav-tabs no-margin myTabBeauty">'
               .$pspao
               .'<a href="'.site_url($link.$this->uri->segment(3)).'">PSPA(O)</a></li>'
               .$ptratab
               .$popatab
               .$pnpatab
               .$ppuntab
               .$platab
               .'</ul> <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">';
     
     } 
    else
    {
      
       $gettab= '<ul class="nav nav-tabs no-margin myTabBeauty">
                   
                    '.$pspao.'<a href="'.site_url($link.$this->uri->segment(3)).'">PSPA(O)</a></li>
                    '.$ptra.'<a href="'.site_url('ptra/senarai_ppd_ptra/'.$this->uri->segment(3)).'">PTRA</a></li>
                    '.$popa.'<a href="'.site_url('popa/senarai_ppd_popa/'.$this->uri->segment(3)).'">POPA</a></li>
                    '.$pnpa.'<a href="'.site_url('pnpa/senarai_ppd_pnpa/'.$this->uri->segment(3)).'">PNPA</a></li>
                    '.$ppun.'<a href="'.site_url('ppun/senarai_ppun/'.$this->uri->segment(3)).'">PPUN</a></li>
                    '.$pla.'<a href="'.site_url('pla/senarai_pla/'.$this->uri->segment(3)).'">PLA</a></li>
                  </ul> <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">';
    }
    
    return $gettab;
  
    }
    
    
}

?>
