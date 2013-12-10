<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  |  Aauth Config
  | -------------------------------------------------------------------
  | A library Basic Authorization for CodeIgniter 2.x
 */


// Config variables

$config['aauth'] = array(
    'login_page' => '/auth',
    // if user don't have permisssion to see the page he will be
    // redirected the page spesificed below
    'no_permission' => '/',
    //name of admin group
    'admin_group' => 'Admin',
    //the new user is added in it
    'default_group' => 'default',
    // The table which contains users
    'users' => 'aauth_users',
    // the group table
    'groups' => 'aauth_groups',
    // 
    'user_to_group' => 'aauth_users_to_group',
    //error mesages
    // change to your language

    'err' => array(
    
        'username_taken' => 'Username dah ada org amek'
    )


    
    
);


/* End of file autoload.php */
/* Location: ./application/config/autoload.php */