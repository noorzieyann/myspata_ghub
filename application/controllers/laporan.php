<?php

class Laporan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		#load library dan helper yang dibutuhkan
		
		$this->load->library('form_validation');
    $this->load->helper(array('form', 'url'));
        $this->load->helper('function_helper');

    $this->load->model('laporan_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
    $this->load->library('pagination');
        $this->load->library('table');
        
    //$this->output->enable_profiler(TRUE); //display query statement
              
	}
		 
	//** LAPORAN **//

    function senarai_laporan_pspao($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
        //Name : Fatin
        //Date : 25/7/13
        //Desc : senarai laporan pspao

    $node_id = '121';
    $menu_name = 'front';
    $menu_link = 'laporan/senarai_laporan_pspao';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list
        $data['kementerian'] = $this->laporan_model->get_kementerian(); //dapatkan senarai kementerian dr db 
        $data['daerah'] = $this->laporan_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->laporan_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['status'] = $this->laporan_model->get_status(); //dapatkan senarai status dr db
    
    $data_1 =   array(
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '1','PSPAO000001','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '2','PSPAO000002','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '3','PSPAO000003','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '4','PSPAO000004','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '5','PSPAO000005','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '6','PSPAO000006','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '7','PSPAO000007','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '8','PSPAO000008','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '9','PSPAO000009','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '10','PSPAO000010','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '11','PSPAO000011','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '12','PSPAO000012','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '13','PSPAO000013','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '14','PSPAO000014','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '15','PSPAO000015','Kementerian Kerja Raya','Jabatan Kerja Raya','2001-2003','<ul class="icomoon-icons-container">
                          <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <a href=""><li class="rounded"><span class="fs1" data-icon="&#xe051" aria-hidden="true"></span></li></a>
                             </ul>'
                            ),
                        
                       );
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('laporan/senarai_laporan_pspao');
    $config['total_rows'] = count($data_1);
    $config['uri_segment'] = 3;
    $config['per_page'] = $quantity;
          $config['num_links'] = 20;
                 $config['full_tag_open'] = '<div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">';
                $config['full_tag_close'] = '</div>';
    $config['next_link'] = 'Seterusnya &gt;';
    $config['prev_link'] = '&lt; Sebelumnya';
    
    $this->pagination->initialize($config); 

    $data['pagination'] = $this->pagination->create_links();
            
    
    
    $this->table->set_heading(anchor("laporan/senarai_laporan_pspao/",'#'),
                              anchor("laporan/senarai_laporan_pspao/",'Bil','title="Klik untuk susun rekod"'),
                              anchor("laporan/senarai_laporan_pspao/",'Id','title="Klik untuk susun rekod"'),
                              anchor("laporan/senarai_laporan_pspao/",'Kementerian','title="Klik untuk susun rekod"'),
                              anchor("laporan/senarai_laporan_pspao/",'Jabatan/Agensi','title="Klik untuk susun rekod"'),
                              anchor("laporan/senarai_laporan_pspao/",'Tempoh','title="Klik untuk susun rekod"'),
                              anchor("laporan/senarai_laporan_pspao/",'Tindakan','title="Klik untuk susun rekod"'));

    $tmpl = array (
                    'table_open'          => '<table class="table table-bordered table-striped">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th class=sort_'.$sort_order.'>',
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

                  $this->load->view('template/default', $data);
  }

  //** END LAPORAN **//

}