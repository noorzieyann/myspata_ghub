<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 * @property Login_control $Login_control
 * @property Aauth $aauth Description
 */
class Auth_test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Your own constructor code
        $this->load->library("Aauth");
		$this->output->enable_profiler(TRUE); //display query statement
    }
    
    function ayar() {
        
        //echo $this->aauth->_get_login_attempts(4);
        
        //echo $this->aauth->get_user_id('emre@emreakay.com');
        
        //$this->aauth->_increase_login_attempts('emre@emreakay.com');
        
        $this->aauth->_reset_login_attempts(1);
    }

	public function test(){
		//$this->list_groups();
		//print_r($this->aauth->get_user(1));
		$userdata = $this->aauth->get_user(1);
		//print_r($userdata);
		foreach($userdata as $key => $data){
			echo "userdata['".$key."']".$data;
			echo "<br />";
		}
		
		
		
	}
	
	public function get_user_detail($id){
		//sini function
	}

    public function index() {


        if ($this->aauth->login('830228035115', 'kusang'))
            echo 'tmm';
        
        //echo date("Y-m-d H:i:s");
    }

    
    public function is_loggedin() {

        if ($this->aauth->is_loggedin())
            echo 'girdin';
    }

    public function logout() {

        $this->aauth->logout();
    }

    public function is_member() {

        if ($this->aauth->is_member('Admin'))
            echo 'uye';
    }

    public function is_admin() {

        if ($this->aauth->is_member('Admin'))
            echo 'adminovic';
    }

    public function group() {

        echo $this->aauth->get_group_id("Admin");
    }

    public function list_users() {
        echo '<pre>';
        print_r($this->aauth->list_users("Admin"));
        echo '</pre>';
    }

    public function list_groups() {
        echo '<pre>';
        print_r($this->aauth->list_groups());
        echo '</pre>';
    }

    public function check_email() {

        if ($this->aauth->check_email("emre@emreakay.com"))
            echo 'uygun ';
        else
            echo 'alindi ';

        echo $this->aauth->get_errors();

        echo ' sadsad';
    }

    public function get_user() {
        print_r($this->aauth->get_user(1));
    }

    function create_user() {
        $a = $this->aauth->create_user("ess@as.com", "asd", "asdasd");

        print_r($this->aauth->get_user($a));
    }

    public function is_banned() {
        print_r($this->aauth->is_banned(6));
    }

    function ban_user() {

        $a = $this->aauth->ban_user(6);

        print_r($a);
    }

    function update_user() {
        $a = $this->aauth->update_user(3, "xxx@ssdas.com", "asd", "asdasd");

        print_r($a);
    }

    function create_group() {

        $a = $this->aauth->create_group("denemeee");
    }

    function delete_group() {

        $a = $this->aauth->delete_group(3);
    }

    function update_group() {

        $a = $this->aauth->update_group(4, "zxxx");
    }

    function add_member() {

        $a = $this->aauth->add_member(1, 4);
    }

    function fire_member() {

        $a = $this->aauth->fire_member(1, 4);
    }
    
    

}

/* End of file welcome.php */
