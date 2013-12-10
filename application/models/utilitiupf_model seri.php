<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

  class Utilitiupf_model extends CI_Model 
  {


  
    function __construct() 
    {
      parent::__construct();
      date_default_timezone_set('Asia/Kuala_Lumpur');
    }
   

    function get_kementerian()  //dapatkan list kementerian
    {
      $this->db->select('idkem, namakem');
      $this->db->order_by("namakem", "ASC");
      $query = $this->db->get('lkp_kementerian');
  
      $kementerian = array();
     
      return $kementerian;
    }
   

    function get_jab_agensi()
    {
      $this->db->order_by('nama_jab_agensi', 'ASC');
      $getList = $this->db->get('lkp_jab_agensi');

      return $getList->result();
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
    function get_jab_agensix($idjab_agensi)
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
    

     function get_upf()
    {
      $this->db->order_by("upf_id", "DESC");
      $getUpf = $this->db->get('tbl_upf');
        
      return $getUpf->result();
    }

    
    function get_upf_1($upf_id)
    {
        //$this->db->select('urus_pej_id');
        $this->db->where('upf_id', $upf_id);
        $getUpf = $this->db->get('tbl_upf');
        
        return $getUpf->result();
    }

    //function untuk add new form sumber manusia
    function tambahupf($upf_id)
    {
        $data = array(      'upf_id' => $this->input->post('upf_id'),        
                            'idkem' => $this->input->post('kementerian'),
                            'idjab_agensi' => $this->input->post('jabatan'),
                            'idnegeri' => $this->input->post('negeri'),
                            'iddaerah' => $this->input->post('daerah'),
                            'nama_upf' => $this->input->post('namaupf'),
                            'alamat_upf' => $this->input->post('alamatupf'),
                            'notel_upf' => $this->input->post('tel_upf'),
                            'nofax_upf' => $this->input->post('fax_upf')
                            
                            );
        
        $upf = $this->db->insert('tbl_upf', $data);
      
        
        if($upf)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah rekod Utiliti Pengurusan Pengguna',
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


    function update_upf($upf_id,$dataDetail)
    {
        date_default_timezone_set('Asia/Kuala_Lumpur');
        $this->db->where('upf_id', $id);
        $up_upf = $this->db->update('tbl_upf', $dataDetail);
        if($up_upf)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Kemaskini Utiliti Pengurusan Pengguna',
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
    
}
?>
