<?php

class Black extends CI_Controller {


	function index()
	{
        //$config['base_url'] = base_url() . 'DefaultPage/index';
            $data['main_content'] = 'blackforest/default';
            $this->load->view('template/default', $data);
            //$this->load->view('default');
	}
	
	function forms()
	{
            //Nama : Azian
            //Edit : 
            $data['main_content'] = 'blackforest/forms';
            $this->load->view('template/default', $data);
	}
        
        function charts()
	{
            //Nama : Azian
            //Edit : 
            $data['main_content'] = 'blackforest/charts';
            $this->load->view('template/default', $data);
	}
	
}
