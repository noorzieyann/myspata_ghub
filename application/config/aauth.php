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

$config['upload_path'] = 'uploads/';

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
    'users' => 'tbl_myspata_user',
    // the group table
    'groups' => 'tbl_user_matrix',
    // 
    'user_to_group' => 'tbl_myspata_user_to_matrix',
    //error mesages
    // change to your language

    'err' => array(
    
        'username_taken' => 'Username dah ada org amek'
    )


    
    
);


/* End of file autoload.php */
/* Location: ./application/config/autoload.php */