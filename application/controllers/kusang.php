<?php

class Kusang extends CI_Controller {

		 
	function index()
	{

		
		$this->load->model('kusang/Kusang_model');
        $this->load->library('pagination');
        $this->load->library('table');
		
		$modulid = '2';
		
		$config['base_url'] = site_url('kusang/index');
		$this->db->where('modul_id', $modulid); 
        $config['total_rows'] = $this->db->get('tbl_user_matrix')->num_rows();
        $config['per_page'] = 20;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
        $config['full_tag_close'] = '</div>';
		$config['next_link'] = 'Seterusnya &gt;';
		$config['prev_link'] = '&lt; Sebelumnya';

		$this->pagination->initialize($config);
		
		$this->table->set_heading('ID', 'Kump Pengguna', 'Role Pengguna', 'Modul');

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

		
        $data['records'] = $this->Kusang_model->get_entries($config['per_page'],$modulid);
		
		
		$data['main_content'] = 'kusang/default';
  		$this->load->view('template/default', $data);
		
		
	}
	public function test(){
	
		$this->form_validation->set_rules('agreeCheck', 'Agree to the Terms and Conditions', 'required|isset');

		function terms_check() {
			if (isset($_POST['agreeCheck'])) return true;
			
			$this->form_validation->set_message('terms_check', 'THIS IS SOOOOO REQUIRED, DUDE!');
			return false;
		}		
		
	  $data['main_content'] = 'kusang/kusang';
	  $this->load->view('template/default_pelan', $data);
	}
	
	public function pageination(){

        $this->load->library('pagination');

		
		$data_1 = array('PSPAO000002 perlu pengesahan dari anda','Arahan Penyediaan PSPA(O) Akhir','Arahan Penyediaan PSPA(O) Akhir','Arahan Penyediaan PSPA(O) Akhir','Arahan Penyediaan PSPA(O) Akhir','PSPAO000002 perlu pengesahan dari anda','PSPAO000002 perlu pengesahan dari anda');
                   
           
		$quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('kusang/pageination');
		$config['total_rows'] = count($data_1);
		$config['uri_segment'] = 3;
		$config['per_page'] = $quantity;
	    $config['num_links'] = 20;
		
		$this->pagination->initialize($config); 

		$data['pagination'] = $this->pagination->create_links();
		
		//$data['main_content'] = 'kusang/pagination';
		$this->load->view('kusang/pagination',$data);
		
		
	}
	
	
}