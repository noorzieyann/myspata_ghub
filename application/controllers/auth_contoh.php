<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_contoh extends CI_Controller
{
    var $user = false;
    function __construct() 
    {
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->model('Auth_model');
    }
    
    function index()
    {
        /*
        echo '<pre>';
        print_r($this->session->all_userdata());
        echo $this->session->userdata('ip_address');
        echo '</pre>';
        */
        
        
        $is_logged_in = $this->session->userdata('is_logged_in');

        if(!isset($is_logged_in) || $is_logged_in !== true)
        {
            $this->session->sess_destroy();
            $data['main_content'] = 'auth/login';
            $this->load->view('includes/template', $data);
        }
    }
    
    function login_validation()
    {
        $this->form_validation->set_rules('userName', 'Nama Pengguna', 'trim|required|xss_clean|callback_validate_credentials');
        $this->form_validation->set_rules('userPassword', 'Kata Laluan', 'required|md5|trim');

        if($this->form_validation->run())
        {
            if($userTypeList = $this->Auth_model->get_userType($this->input->post('userName')))
            {
                $data['record'] = $userTypeList;
                foreach ($userTypeList as $row)
                {
                    $userType = $row->userType;
                }
                $data = array('userName' => $this->input->post('userName'),
                              'userType' => $userType,
                              'is_logged_in' => 1);
            }
                
            $this->session->set_userdata($data);
            redirect('home');
        } 
        else
        {
            $this->session->sess_destroy();

            $data['main_content'] = 'login';
            $this->load->view('includes/template', $data);
        } 
    }
        
    function validate_credentials()
    {
        if($this->Auth_model->can_log_in())
        {
            return true;
	}
	else
	{
            $this->form_validation->set_message('validate_credentials', 'Kombinasi Nama Pengguna/Kata Laluan tidak betul');
            return false;
	}
    }
    
    function logout()
    {
        $this->session->sess_destroy();
		redirect('login');
    }
    
}
?>
