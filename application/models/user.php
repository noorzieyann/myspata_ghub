<?php

class User_model extends Model {
	
	function User_model(){
		parent:Model();
	}
	
	function check_login($username, $password){
		$md5_password = md5($password);
		
		$query_str = "SELECT myspata_userid FROM tbl_myspata_user WHERE uname = ? AND pswd = ?";
		$result = $this->db->query($query_str, array($username, $md5_password));
		
		if ($result->num_rows() == 1){
			return $result->row(0)->myspata_userid;
		}
		else{
			return false;
		}
		
	}
}