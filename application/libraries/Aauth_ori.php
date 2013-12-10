<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Aauth
 *
 * @author Emre Akay
 * 
 */

/**
 * Coming with v2
 * Private messsages
 * Email and pass validation with form helper
 * laguage file support
 * forget pass
 * performance impr.
 * 
 */
//last activity check email
class Aauth_ori {

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
        $this->CI->config->load('aauth_ori');

        // the array which came from aauth config file
        // $this->config_vars
        $this->config_vars = & $this->CI->config->item('aauth');
    }

    // remember ekle
    public function login($email, $pass, $remember = FALSE) {


        $query = $this->CI->db->where('email', $email);

        // database stores pasword md5 cripted
        $query = $this->CI->db->where('pass', md5($pass));
        $query = $this->CI->db->where('banned', 0);
        $query = $this->CI->db->get($this->config_vars['users']);

        $row = $query->row();

        if ($query->num_rows() > 0) {

            // if email and pass matches
            // create session
            $data = array(
                'id' => $row->id,
                'name' => $row->name,
                'email' => $row->email,
                'loggedin' => TRUE
            );

            $this->CI->session->set_userdata($data);

            // update last login
            $this->_update_last_login($row->id);
            $this->activity();

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
            $user_id = $this->CI->session->userdata('id');

        $data['last_activity'] = date("Y-m-d H:i:s");

        $query = $this->CI->db->where('id',$user_id);
        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    public function is_loggedin() {

        return $this->CI->session->userdata('loggedin');
    }

    // group_name or group_id
    public function is_member($group_par) {

        $user_id = $this->CI->session->userdata('id');

        // group_id given
        if (is_numeric($group_par)) {

            $query = $this->CI->db->where('user_id', $user_id);
            $query = $this->CI->db->where('group_id', $group_par);
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

            $query = $this->CI->db->where('name', $group_par);
            $query = $this->CI->db->get($this->config_vars['groups']);

            if ($query->num_rows() == 0)
                return FALSE;

            $row = $query->row();
            return $this->is_member($row->id);
        }
    }

    public function get_group_name($group_id) {

        $query = $this->CI->db->where('id', $group_id);
        $query = $this->CI->db->get($this->config_vars['groups']);

        if ($query->num_rows() == 0)
            return FALSE;

        $row = $query->row();
        return $row->name;
    }

    public function get_group_id($group_name) {

        $query = $this->CI->db->where('name', $group_name);
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
            $user_id = $this->CI->session->userdata('id');

        $query = $this->CI->db->where('id', $user_id);
        $query = $this->CI->db->get($this->config_vars['users']);

        if ($query->num_rows() <= 0)
            return FALSE;

        return $query->row();
    }

    public function get_user_id($email) {

        $query = $this->CI->db->where('email', $email);
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
            $user_id = $this->CI->session->userdata('id');

        $query = $this->CI->db->where('id', $user_id);
        $query = $this->CI->db->where('banned', 1);

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
                    ->join($this->config_vars['user_to_group'], $this->config_vars['users'] . ".id = " . $this->config_vars['user_to_group'] . ".user_id")
                    ->where($this->config_vars['user_to_group'] . ".group_id", $group_par);

            // if group_par is not given, lists all users   
        } else {

            $this->CI->db->select('*')
                    ->from($this->config_vars['users']);
        }

        // banneds
        if (!$include_banneds) {
            $this->CI->db->where('banned != ', 1);
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
    public function check_email($email) {

        $this->CI->db->where("email", $email);
        $query = $this->CI->db->get($this->config_vars['users']);

        if ($query->num_rows() > 0) {

            $this->_add_err($this->config_vars['err']['email_taken']);
            $this->_add_err($this->config_vars['err']['email_taken']);
            return FALSE;
        }

        else
            return TRUE;
    }

    // it creates new user and returns its id
    public function create_user($email, $pass, $name) {

        if (!$this->check_email($email)) {

            $this->_add_err($this->config_vars['err']['email_taken']);
            return FALSE;
        }

        $data = array(
            'email' => $email,
            'pass' => md5($pass),
            'name' => $name
        );

        if ($this->CI->db->insert($this->config_vars['users'], $data))
            return $this->CI->db->insert_id();
        else
            return FALSE;
    }

    // bans user
    public function ban_user($user_id) {

        $data = array(
            'banned' => 1
        );

        $this->CI->db->where('id', $user_id);

        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    public function delete_user($user_id) {

        $this->CI->db->where('id', $user_id);
        $this->CI->db->delete($this->config_vars['users']);
    }

    // takes the user id and updates the values given
    public function update_user($user_id, $email = FALSE, $pass = FALSE, $name = FALSE) {

        $data = array();

        if ($email != FALSE) {
            $data['email'] = $email;
        }

        if ($pass != FALSE) {
            $data['pass'] = md5($pass);
        }

        if ($name != FALSE) {
            $data['name'] = $name;
        }

        $this->CI->db->where('id', $user_id);
        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    public function create_group($group_name) {

        $query = $this->CI->db->get_where($this->config_vars['groups'], array('name' => $group_name));

        if ($query->num_rows() < 1) {

            $data = array(
                'name' => $group_name
            );

            return $this->CI->db->insert($this->config_vars['groups'], $data);
        }

        return FALSE;
    }

    public function delete_group($group_id) {

        $this->CI->db->where('id', $group_id);
        return $this->CI->db->delete($this->config_vars['groups']);
    }

    public function update_group($group_id, $group_name) {

        $data['name'] = $group_name;

        $this->CI->db->where('id', $group_id);
        return $this->CI->db->update($this->config_vars['groups'], $data);
    }

    // aynısını ekleyince hata verio
    public function add_member($user_id, $group_id) {

        $data = array(
            'user_id' => $user_id,
            'group_id' => $group_id
        );

        return $this->CI->db->insert($this->config_vars['user_to_group'], $data);
    }

    // fire the member from the given group
    public function fire_member($user_id, $group_id) {

        $this->CI->db->where('user_id', $user_id);
        $this->CI->db->where('group_id', $group_id);
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
            $user_id = $this->CI->session->userdata('id');

        $data['last_login'] = date("Y-m-d H:i:s");

        $this->CI->db->where('id', $user_id);
        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    // returns number of login attempts
    private function _get_login_attempts($user_id) {

        if ($user_id == FALSE)
            $user_id = $this->CI->session->userdata('id');

        $query = $this->CI->db->where('id', $user_id);
        $query = $this->CI->db->get($this->config_vars['users']);

        $row = $query->row();


        return $row->login_attempts;
    }

    // resets attempts
    private function _reset_login_attempts($user_id) {

        $data['login_attempts'] = 0;

        $this->CI->db->where('id', $user_id);

        return $this->CI->db->update($this->config_vars['users'], $data);
    }

    // increases login attempts
    private function _increase_login_attempts($email) {

        $user_id = $this->get_user_id($email);

        $data['login_attempts'] = $this->_get_login_attempts($user_id) + 1;

        $this->CI->db->where('id', $user_id);

        return $this->CI->db->update($this->config_vars['users'], $data);
    }

}

?>
