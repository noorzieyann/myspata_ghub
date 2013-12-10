<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

  class Utilitiupf_model extends CI_Model 
  {

//updated by : fatin 12/11/13
  
    function __construct() 
    {
      parent::__construct();
      date_default_timezone_set('Asia/Kuala_Lumpur');
    }
   
    
     function get_upf($upf_id)
    {
      $this->db->order_by("upf_id", "DESC");
      //$this->db->where('upf_id', $upf_id);
      $getUpf = $this->db->get('tbl_upf');
        
      return $getUpf->result();
    }
    
    //function untuk add new form sumber manusia
    function tambahupf()
    {
        $data = array(      'upf_id' => $this->input->post('upf_id'),        
                            'idkem' => $this->input->post('kementerian'),
                            'idjab_agensi' => $this->input->post('jabatan'),
                            'idnegeri' => $this->input->post('negeri'),
                            'iddaerah' => $this->input->post('daerah'),
                            'nama_upf' => $this->input->post('namaupf'),
                            'alamat_upf' => $this->input->post('alamatupf'),
                            'notel_upf' => $this->input->post('notel'),
                            'nofax_upf' => $this->input->post('nofax')
                            
                            );
        
        $upf = $this->db->insert('tbl_upf', $data);
      
        
        if($upf)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah rekod Utiliti Pengurusan Fasiliti',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
                             'modul' => 'Utiliti Pengurusan Pengguna - UPF');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    
    

    function get_upf_1($upf_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('upf_id', $upf_id);
        $getUpf = $this->db->get('tbl_upf');
        
        return $getUpf->result();
    }

    
    
    function update_upf($upf_id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('upf_id', $upf_id);
        $up_upf = $this->db->update('tbl_upf', $dataDetail);
        
        if($up_upf)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini Utiliti Pengurusan Fasiliti',
                             'masa_aktvt' => date('Y-m-d H:i:s'),
                             'modul' => 'Utiliti Pengurusan Pengguna - UPF');
            
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
        $this->db->where('kump_pengguna_id',$kump_pengguna);
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
    
}
?>
