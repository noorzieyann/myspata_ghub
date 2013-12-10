<?php

class Sidemenu_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    	
    function get_sidemenu_parent($menuname = 'front'){
		
        //$query = $this->db->get('tbl_user_matrix');
		
		$this->db->where('sidemenu_menu',$menuname);
		$this->db->where('sidemenu_node','0');
		$this->db->order_by('sidemenu_sort','ASC');
		$query = $this->db->get('tbl_sidemenu');
        return $query;
		//return $query->row();
    }
	
    function get_sidemenu_sub($menuname = 'front'){
		
        //$query = $this->db->get('tbl_user_matrix');
		
		$this->db->where('sidemenu_menu',$menuname);
		$this->db->where('sidemenu_node !=','0');
		$this->db->order_by('sidemenu_sort','ASC');
		$query = $this->db->get('tbl_sidemenu');
        return $query;
		//return $query->row();
    }
	
	function get_sidemenu($menuname = 'front'){
		$this->db->where('sidemenu_menu',$menuname);
		$this->db->order_by('sidemenu_sort','ASC');
		$query = $this->db->get('tbl_sidemenu');
        return $query;
	}

}
?>