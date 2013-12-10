<?php

class Kusang_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_entries($per_page,$modul)
    {
        //$query = $this->db->get('tbl_user_matrix');
		
		$this->db->select('user_matrix_id, nama_kump_pengguna, role_pengguna, modul');
		$this->db->where('modul_id', $modul); 
		$query = $this->db->get('tbl_user_matrix', $per_page, $this->uri->segment(3));
        return $query;
    }


}