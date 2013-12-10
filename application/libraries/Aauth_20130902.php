<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
		AUTHOR : MOHD KHAIRUL RAMLI
		LAST UPDATE : 07-2013
		FILE NAME : Auth.php
		ACTUAL LOCATION : application/libraries/Auth.php
*/

class Aauth {

    public $CI;
    public $config_vars;
    public $errors = array();

    public function __construct() {

        // delete all errors at first :)
        $this->errors = array();

        $this->CI = & get_instance();

        // dependancies
        $this->CI->load->library('session');
        $this->CI->load->database();
        $this->CI->load->helper('url');

        // config/aauth.php
        $this->CI->config->load('aauth');

        // the array which came from aauth config file
        // $this->config_vars
        $this->config_vars = & $this->CI->config->item('aauth');
    }

    // ingat ekle
    public function login($username, $pass, $remember = FALSE) {


        $query = $this->CI->db->where('uname', $username);

        // database stores pasword md5 cripted
        $query = $this->CI->db->where('pswd', md5($pass));
        $query = $this->CI->db->where('isaktif', 1);
		//$query = $this->CI->db->join($this->config_vars['groups'],$this->config_vars['groups'].'.user_matrix_id = '.$this->config_vars['users'].'.myspata_userid');
        $query = $this->CI->db->get($this->config_vars['users']);

        $row = $query->row();

        if ($query->num_rows() > 0) {

            // if email and pass matches
            // create session
            $data = array(
                'user_id' => $row->myspata_userid,
                'user_nama' => $row->nama_user,
                'user_username' => $row->uname,
                'user_kemid' => $row->idkem,
                'user_jabid' => $row->idjab_agensi,
                'user_negid' => $row->idnegeri,
               	'loggedin' => TRUE
            );

            $this->CI->session->set_userdata($data);

            // update last login
            $this->_update_last_login($row->myspata_userid);
            //$this->activity();

            return TRUE;
        } else {
            //if doesnt match
            return FALSE;
        }
    }

    // do logout
    public function logout() {

        return $this->CI->session->sess_destroy();
    }

    // updates user's last activity date
    public function activity($user_id = FALSE) {

        if ($user_id == FALSE)
            $user_id = $this->CI->session->userdata('myspata_userid');

        $data['last_activity'] = date("Y-m-d H:i:s");

        $query = $this->CI->db->where('myspata_userid',$user_id);
        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    public function is_loggedin() {

        return $this->CI->session->userdata('loggedin');
    }

    // group_name or group_id
    public function is_member($group_par) {

        $user_id = $this->CI->session->userdata('myspata_userid');

        // group_id given
        if (is_numeric($group_par)) {

            $query = $this->CI->db->where('myspata_userid', $user_id);
            $query = $this->CI->db->where('user_matrix_id', $group_par);
            $query = $this->CI->db->get($this->config_vars['user_to_group']);

            $row = $query->row();

            if ($query->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        // group_name given
        else {

            $query = $this->CI->db->where('nama_kump_pengguna', $group_par);
            $query = $this->CI->db->get($this->config_vars['groups']);

            if ($query->num_rows() == 0)
                return FALSE;

            $row = $query->row();
            return $this->is_member($row->id);
        }
    }

    public function get_group_name($group_id) {

        $query = $this->CI->db->where('user_matrix_id', $group_id);
        $query = $this->CI->db->get($this->config_vars['groups']);

        if ($query->num_rows() == 0)
            return FALSE;

        $row = $query->row();
        return $row->name;
    }

    public function get_group_id($group_name) {

        $query = $this->CI->db->where('nama_kump_pengguna', $group_name);
        $query = $this->CI->db->get($this->config_vars['groups']);

        if ($query->num_rows() == 0)
            return FALSE;

        $row = $query->row();
        return $row->id;
    }

    // get user information as an array
    // you can use sessions
    public function get_user($user_id = FALSE) {

        if ($user_id == FALSE)
            $user_id = $this->CI->session->userdata('myspata_userid');

        $query = $this->CI->db->where('myspata_userid', $user_id);
        $query = $this->CI->db->get($this->config_vars['users']);

        if ($query->num_rows() <= 0)
            return FALSE;

        return $query->row();
    }

    public function get_user_id($username) {

        $query = $this->CI->db->where('uname', $username);
        $query = $this->CI->db->get($this->config_vars['users']);

        if ($query->num_rows() <= 0)
            return FALSE;

        return $query->row()->id;
    }

    public function is_admin() {
        return $this->is_member($this->config_vars['admin_group']);
    }

    // check if user banned, return false if banned or not found user 
    public function is_banned($user_id) {

        if ($user_id == FALSE)
            $user_id = $this->CI->session->userdata('myspata_userid');

        $query = $this->CI->db->where('myspata_userid', $user_id);
        $query = $this->CI->db->where('isaktif', 0);

        $query = $this->CI->db->get($this->config_vars['users']);

        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    // if a parameter is not given, it will contol just loggedin or not
    // if grup_id parameter is assigned, it will control also grup membership
    public function control($group_par = FALSE) {

        if (!$this->CI->session->userdata('loggedin')) {
            redirect($this->config_vars['login_page']);
            die();
        }

        //if no parameter given
        if ($group_id && !$this->is_member($group_par)) {
            redirect($this->config_vars['no_permission']);
            die();
        }
    }

    // return users as an object array
    public function list_users($group_par = FALSE, $limit = FALSE, $offset = FALSE, $include_banneds = FALSE) {

        // if group_par is given
        if ($group_par != FALSE) {

            if (!is_numeric($group_par))
                $group_par = $this->get_group_id($group_par);


            $this->CI->db->select('*')
                    ->from($this->config_vars['users'])
                    ->join($this->config_vars['user_to_group'], $this->config_vars['users'] . ".myspata_userid = " . $this->config_vars['user_to_group'] . ".myspata_userid")
                    ->where($this->config_vars['user_to_group'] . ".user_matrix_id", $group_par);

            // if group_par is not given, lists all users   
        } else {

            $this->CI->db->select('*')
                    ->from($this->config_vars['users']);
        }

        // banneds
        if (!$include_banneds) {
            $this->CI->db->where('isactif != ', 0);
        }


        // limit
        if ($limit) {

            if ($offset == FALSE)
                $this->CI->db->limit($limit);
            else
                $this->CI->db->limit($limit, $offset);
        }


        $query = $this->CI->db->get();

        return $query->result();
    }

    // returns groups as an object array
    public function list_groups() {

        $query = $this->CI->db->get($this->config_vars['groups']);

        return $query->result();
    }

    // if email is available, returns true 
    public function check_email($username) {

        $this->CI->db->where("uname", $username);
        $query = $this->CI->db->get($this->config_vars['users']);

        if ($query->num_rows() > 0) {

            $this->_add_err($this->config_vars['err']['username_taken']);
            $this->_add_err($this->config_vars['err']['username_taken']);
            return FALSE;
        }

        else
            return TRUE;
    }

    // it creates new user and returns its id
    public function create_user($username, $pass, $name) {

        if (!$this->check_email($username)) {

            $this->_add_err($this->config_vars['err']['username_taken']);
            return FALSE;
        }

        $data = array(
            'uname' => $username,
            'pswd' => md5($pass),
            'nama_user' => $name
        );

        if ($this->CI->db->insert($this->config_vars['users'], $data))
            return $this->CI->db->insert_id();
        else
            return FALSE;
    }

    // bans user
    public function ban_user($user_id) {

        $data = array(
            'isaktif' => 0
        );

        $this->CI->db->where('myspata_userid', $user_id);

        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    public function delete_user($user_id) {

        $this->CI->db->where('myspata_userid', $user_id);
        $this->CI->db->delete($this->config_vars['users']);
    }

    // takes the user id and updates the values given
    public function update_user($user_id, $email = FALSE, $pass = FALSE, $name = FALSE) {

        $data = array();

        if ($email != FALSE) {
            $data['uname'] = $email;
        }

        if ($pass != FALSE) {
            $data['pswd'] = md5($pass);
        }

        if ($name != FALSE) {
            $data['nama_user'] = $name;
        }

        $this->CI->db->where('myspata_userid', $user_id);
        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    public function create_group($group_name) {

        $query = $this->CI->db->get_where($this->config_vars['groups'], array('nama_kump_pengguna' => $group_name));

        if ($query->num_rows() < 1) {

            $data = array(
                'nama_kump_pengguna' => $group_name
            );

            return $this->CI->db->insert($this->config_vars['groups'], $data);
        }

        return FALSE;
    }

    public function delete_group($group_id) {

        $this->CI->db->where('user_matrix_id', $group_id);
        return $this->CI->db->delete($this->config_vars['groups']);
    }

    public function update_group($group_id, $group_name) {

        $data['nama_user'] = $group_name;

        $this->CI->db->where('user_matrix_id', $group_id);
        return $this->CI->db->update($this->config_vars['groups'], $data);
    }

    // aynısını ekleyince hata verio
    public function add_member($user_id, $group_id) {

        $data = array(
            'myspata_userid' => $user_id,
            'user_matrix_id' => $group_id
        );

        return $this->CI->db->insert($this->config_vars['user_to_group'], $data);
    }

    // fire the member from the given group
    public function fire_member($user_id, $group_id) {

        $this->CI->db->where('myspata_userid', $user_id);
        $this->CI->db->where('user_matrix_id', $group_id);
        return $this->CI->db->delete($this->config_vars['user_to_group']);
    }

    public function get_errors($divider = '<br />') {

        $msg = '';
        $msg_num = count($this->errors);



        $i = 1;
        foreach ($this->errors as $e) {

            $msg .= $e;



            if ($i != $msg_num)
                $msg .= $divider;

            $i++;
        }
        return $msg;
    }

    // return errors as an array
    public function get_error_array() {

        return $this->errors;
    }

    public function get_last_login($user_id = FALSE) {
        
    }

    ////////////////////////////////////////////
    //  System functions you wont need them   //
    ////////////////////////////////////////////
    // add an error message to error array
    private function _add_err($err_msg) {

        $this->errors[] = $err_msg;
    }

    // updates last login date and time
    private function _update_last_login($user_id = FALSE) {

        if ($user_id == FALSE)
            $user_id = $this->CI->session->userdata('myspata_userid');

        $data['last_login'] = date("Y-m-d H:i:s");

        $this->CI->db->where('myspata_userid', $user_id);
        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    // returns number of login attempts
    private function _get_login_attempts($user_id) {

        if ($user_id == FALSE)
            $user_id = $this->CI->session->userdata('myspata_userid');

        $query = $this->CI->db->where('myspata_userid', $user_id);
        $query = $this->CI->db->get($this->config_vars['users']);

        $row = $query->row();


        return $row->login_attempts;
    }

    // resets attempts
    private function _reset_login_attempts($user_id) {

        $data['login_attempts'] = 0;

        $this->CI->db->where('myspata_userid', $user_id);

        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    // increases login attempts
    private function _increase_login_attempts($email) {

        $user_id = $this->get_user_id($email);

        $data['login_attempts'] = $this->_get_login_attempts($user_id) + 1;

        $this->CI->db->where('myspata_userid', $user_id);

        return $this->CI->db->update($this->config_vars['users'], $data);
    }

}

?>
