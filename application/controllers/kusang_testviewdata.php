<?php

class Kusang_testviewdata extends CI_Controller {

		 
	function index()
	{

		
        $this->load->library('pagination');
        $this->load->library('table');
		$this->load->model('kusang/kusang_model');
        
        //$this->table->set_heading('Id', 'The Title', 'The Content');
		
        $config['base_url'] = site_url('kusang/index');
        $config['total_rows'] = $this->db->get('tbl_user_matrix')->num_rows();
        //$config['total_rows'] = $this->kusang_model->get_entries()->num_rows();
        $config['per_page'] = 20;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
        $config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Seterusnya &gt;';
		$config['prev_link'] = '&lt; Sebelumnya';
        
        $this->pagination->initialize($config);
        
        //$data['records'] = $this->db->get('tbl_user_matrix', $config['per_page'], $this->uri->segment(3));
		$data['records'] = $this->Kusang_model->get_data();
		
		
		$tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

		$this->table->set_template($tmpl);
        
		
		$data['main_content'] = 'kusang/default';
  		$this->load->view('template/default', $data);
		
		//$data['main_content'] = 'kusang/default';
        //$this->load->view('template/default', $data);
	}
	
	
}