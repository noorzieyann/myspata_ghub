<?php

class Ptra extends CI_Controller {

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

    $this->load->model('ptra_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
    $this->load->library('pagination');
        $this->load->library('table');
        $this->load->helper('download');
        
    //$this->output->enable_profiler(TRUE); //display query statement
              
	}
		 
    
	//** Start PTRA **//

  function arahan_penyediaan_ptra()
	{
		    //Name : Fatin
        //Date : 24/7/13
        //Desc : arahan penyediaan ptra
        
    $node_id = '122';
    $menu_name = 'menu1';
    $menu_link = 'ptra/arahan_penyediaan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
		    
        $data_1 =   array(
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '1','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '2','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '3','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '4','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '5','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '6','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '7','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '8','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '9','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '10','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '11','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '12','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '13','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '14','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label>',
                          '15','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        
                       );
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/arahan_penyediaan_ptra');
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
            
    
    
    $this->table->set_heading('#','Bil', 'Nama', 'Kementerian','Jabatan/Agensi');

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

        $this->load->view('template/default', $data);
        
	}

	function senarai_pp_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai pengawal

    $node_id = '98';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_pp_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
          $data_1 =   array(
                        array('1','PTRA000001','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                           
                              </ul>'
                            ),
                        array('2','PTRA000002','2013','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                             <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                            </ul>'
                            ),
                        array('3','PTRA000003','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                  </ul>'
                            
                            ),
                        array('4','PTRA000004','2007','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                             
                        </ul>'),
                        array('5','PTRA000005','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                              
                            </ul>
                     '),
                        array('6','PTRA000006','2010','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                               </ul>
                     '),
                        array('7','PTRA000007','2009','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                              

                            </ul>
                     '),
                        array('8','PTRA000008','2017','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                </ul>
                     '),
                        array('9','PTRA000009','2016','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                             
                        </ul>
                     '),
                        array('10','PTRA000010','2014','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                  </ul>
                     '),
                        array('11','PTRA000011','2019','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                               </ul>
                     '),
                        array('12','PTRA000012','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                             </ul>
                     '),
                        array('13','PTRA000013','2025','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                             </ul>
                     '),
                        array('14','PTRA000014','2022','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                             </ul>
                     '),
                        array('15','PTRA000015','2020','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                   </ul>
                     '),
                
                
                
                       );
                   
           
		$quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('ptra/senarai_pp_ptra');
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
            
    
		
		$this->table->set_heading('Bil', 'PTRA Id', 'Tahun','Kementerian','Jabatan/Agensi','Premis','No DPA','Status','Tindakan');

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


		$rules = array(
                            array(
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'no_dpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kata_carian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/senarai_pp_ptra';
                		    $this->load->view('template/default', $data);
                      
                }
	}
        
        function senarai_ptf_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai teknikal fasiliti

    $node_id = '99';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_ptf_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
		

        $data_1 =   array(
                        array('1','PTRA000001','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                            <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         
                              </ul>'
                            ),
                        array('2','PTRA000002','2013','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                             <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                             <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                             </ul>'
                            ),
                        array('3','PTRA000003','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                                 </ul>'
                            
                            ),
                        array('4','PTRA000004','2007','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                              <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         
                        </ul>'),
                        array('5','PTRA000005','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         
                            </ul>
                     '),
                        array('6','PTRA000006','2010','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                              <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         </ul>
                     '),
                        array('7','PTRA000007','2009','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                                 <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                       

                            </ul>
                     '),
                        array('8','PTRA000008','2017','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                           </ul>
                     '),
                        array('9','PTRA000009','2016','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                        
                        </ul>
                     '),
                        array('10','PTRA000010','2014','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                           </ul>
                     '),
                        array('11','PTRA000011','2019','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                           </ul>
                     '),
                        array('12','PTRA000012','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                            </ul>
                     '),
                        array('13','PTRA000013','2025','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         </ul>
                     '),
                        array('14','PTRA000014','2022','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         </ul>
                     '),
                        array('15','PTRA000015','2020','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                    </ul>
                     '),
                
                
                
                       );
                   
           
		$quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('ptra/senarai_ptf_ptra');
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
            
    
		
		$this->table->set_heading('Bil', 'PTRA Id', 'Tahun','Kementerian','Jabatan/Agensi','Premis','No DPA','Status','Tindakan');

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

		$rules = array(
                            array(
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'no_dpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kata_carian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

        				  $this->load->view('template/default', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/senarai_ptf_ptra';
                		    $this->load->view('template/default', $data);
                      
                }
	}

	function senarai_ppd_ptra($sort_by = 'title', $sort_order = 'asc', $offset = 0)
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : senarai pegawai pengawal

    $node_id = '100';
    $menu_name = 'menu1';
    $menu_link = 'ptra/senarai_ppd_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['status'] = $this->ptra_model->get_status(); //dapatkan senarai status dr db
             
             
              $data_1 =   array(
                        array('1','PTRA000001','2003','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                            <a href="summary_pp_ptra_editpp"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;" id="salinpp"></span></li>
                              </ul>'
                            ),
                        array('2','PTRA000002','2004','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                             <a href="summary_ptf_ptra_editptf"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;" id="salinptf"></span></li>
                              </ul>'
                            ),
                        array('3','PTRA000003','2006','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="summary_ptra_editppd"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;" id="salinppd"></span></li>
                              </ul>'
                            ),
                        array('4','PTRA000004','2007','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('5','PTRA000005','2007','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('6','PTRA000006','2008','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('7','PTRA000007','2009','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('8','PTRA000008','2010','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('9','PTRA000009','2011','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('10','PTRA000010','2013','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('11','PTRA000011','2014','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('12','PTRA000012','2015','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('13','PTRA000013','2017','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('14','PTRA000014','2020','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-pembetulan">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                        array('15','PTRA000015','2022','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                              </ul><ul class="icomoon-icons-container">
                                <a href="index.html"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                              </ul>'
                              ),
                      );
                   
           
		$quantity = 5; // how many per page
		$start = $this->uri->segment(3); // this is auto-incremented by the pagination class
		if(!$start) $start = 0; // default to zero if no $start

		// slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
		$data['dataku'] = array_slice($data_1, $start, $quantity);

		$config['base_url'] = site_url('ptra/senarai_ppd_ptra');
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
            
    
		
		$this->table->set_heading(anchor("ptra/senarai_ppd_ptra/",'Bil','title="Klik untuk susun rekod"'), 
                              anchor("ptra/senarai_ppd_ptra/",'PTRA Id','title="Klik untuk susun rekod"'),
                              anchor("ptra/senarai_ppd_ptra/",'Tahun','title="Klik untuk susun rekod"'),
                              anchor("ptra/senarai_ppd_ptra/",'Kementerian','title="Klik untuk susun rekod"'),
                              anchor("ptra/senarai_ppd_ptra/",'Jabatan/Agensi','title="Klik untuk susun rekod"'),
                              anchor("ptra/senarai_ppd_ptra/",'Premis','title="Klik untuk susun rekod"'),
                              anchor("ptra/senarai_ppd_ptra/",'No DPA','title="Klik untuk susun rekod"'),
                              anchor("ptra/senarai_ppd_ptra/",'Status','title="Klik untuk susun rekod"'),
                              anchor("ptra/senarai_ppd_ptra/",'Tindakan','title="Klik untuk susun rekod"'));

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


		$rules = array(
                            array(
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'no_dpa',
                                  'label'   => 'No Dpa',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'status',
                                  'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kata_carian',
                                  'label'   => 'Kata Carian',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
	
                }
                else
                {
                        $data['main_content'] = 'ptra/senarai_ppd_ptra';
                		    $this->load->view('template/default', $data);
                      
                }
	}

function status_premis_ptra()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['main_content'] = 'ptra/status_premis_ptra';
        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '102';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim(); //dapatkan senarai mukim dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db

        $rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'negeri',
                                  'label'   => 'Negeri',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'mukim',
                                  'label'   => 'Mukim',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        //$data['main_content'] = 'ptra/kandungan_ptra';
                        //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/kandungan_ptra'));
                      
                }
  }

  function kat_jalan_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset jalan

    $node_id = '103';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_jalan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
    
        $rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        //$data['main_content'] = 'ptra/kandungan_ptra';
                        //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/kandungan_ptra'));
                      
                }
  }

  function kat_pembetungan_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset pembetungan

    $node_id = '104';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_pembetungan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db
    
        $rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        //$data['main_content'] = 'ptra/kandungan_ptra';
                        //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/kandungan_ptra'));
                      
                }
  }

  function kat_saliran_ptra()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset saliran

    $node_id = '105';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_saliran_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db
    
        $rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'negeri',
                                  'label'   => 'Negeri',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        //$data['main_content'] = 'ptra/kandungan_ptra';
                        //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/kandungan_ptra'));
                      
                }
  }

        
        function kandungan_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : penyediaan kandungan ptra

        //$this->output->enable_profiler(TRUE); //display query statement

            $node_id = '106';
            $menu_name = 'menu1';
            $menu_link = 'ptra/kandungan_ptra';
                        
            $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
            $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
            $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
            $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

            
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->ptra_model->get_premis(); //dapatkan senarai premis dr db

                $rules = array(
                            array(
                                  'field'   => 'tahun',
                                  'label'   => 'Tahun',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'premis',
                                  'label'   => 'Premis',
                                  'rules'   => 'required'
                               ),   
                            
                            
                            array(
                                  'field'   => 'pendahuluan',
                                  'label'   => 'Pendahuluan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'objektif',
                                  'label'   => 'Objektif Pengurusan Aset Tak Alih',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'carta',
                                  'label'   => 'Carta Organisasi dan Pelan Komunikasi',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'skop',
                                  'label'   => 'Skop dan Aktiviti Penerimaan Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'sumber',
                                  'label'   => 'Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kawalan',
                                  'label'   => 'Kawalan Rekod Penerimaan Aset',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'rujukan',
                                  'label'   => 'Rujukan',
                                  'rules'   => 'required'
                               ),
                            
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
	
                }
                else
                {
                        //$data['main_content'] = 'ptra/model_struktur_ptra';
                		    //$this->load->view('template/default', $data);
                  redirect(site_url('ptra/model_struktur_ptra'));
                      
                }
	}
        
        function model_struktur_ptra($sort_by = 'title', $sort_order = 'asc', $offset = 0)
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '107';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul><a href="download">Surat Lantikan.docx</a>',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                          array   ('2','Sivil','Sayuthi Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','Adib Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('5','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('6','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('7','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                  );
                  
               
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/model_struktur_ptra');
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
            
    
    
    $this->table->set_heading(anchor("ptra/model_struktur_ptra/",'Bil','title="Klik untuk susun rekod"'), 
                              anchor("ptra/model_struktur_ptra/",'Kategori ID','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra/",'Nama','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra/",'Syarikat','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra/",'Surat Lantikan','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra/",'Tindakan','title="Klik untuk susun rekod"'));

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
        
        function treeview_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c

    $node_id = '108';
    $menu_name = 'menu1';
    $menu_link = 'ptra/treeview_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '109';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti2_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c

    $node_id = '110';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
        $this->load->view('template/default', $data);
	}
        
        function kawalan_rekod_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d

    $node_id = '111';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kawalan_rekod_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
	}
        
        function dokumen_rujukan_ptra($sort_by = 'title', $sort_order = 'asc', $offset = 0)
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e

    $node_id = '112';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data_1 =   array(
                        array('1','Senarai Pekerja Tambahan','Dokumen A',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1"></span></li>
                              </ul>'
                            ),
                        array('2','Status Aset Dalam Negeri','Dokumen B',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"  id="hapus2"></span></li>
                              </ul>'
                            ),
                        array('3','Penyata Kewangan Premis A','Dokumen C',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"  id="hapus3"></span></li>
                              </ul>'
                            ),
                        array('4','Salinan Jabatan','Dokumen D',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('5','Pelan Penilaian Aset A','Dokumen E',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('6','Senarai Bahan Bekalan','Dokumen F',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('7','Senarai Pembekal','Dokumen G',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('8','Pelan Penilaian  Aset B','Dokumen H',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('9','Status Aset Jabatan','Dokumen I',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('10','Senarai Aset Dalam Penilaian','Dokumen J',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('11','Senarai Bangunan Daerah A','Dokumen K',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('12','Senarai Saliran Daerah B','Dokumen L',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('13','Senarai Jalan Daerah C','Dokumen M',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('14','Pelan Penilaian Aset G','Dokumen N',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('15','Penyata Kewangan Jabatan D','Dokumen P',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                       );
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/dokumen_rujukan_ptra');
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
            
    
    
    $this->table->set_heading(anchor("ptra/dokumen_rujukan_ptra/",'Bil','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Tajuk Dokumen','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Dokumen Rujukan','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Tindakan','title="Klik untuk susun rekod"'));

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
        
        function summary_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : summary penyediaan ptra baru

    $node_id = '113';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list
        $this->load->view('template/default', $data);
	}
        
        function summary_pp_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai pengawal

    $node_id = '114';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_pp_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
	}
        
        function summary_ptf_ptra()
	{
		    //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

    $node_id = '115';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptf_ptra';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
	}
	//** END PTRA **//



  //******* Start PTRA EDIT PP *******//

  function status_premis_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra_editpp()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '102';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim(); //dapatkan senarai mukim dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db

        $rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'negeri',
                                  'label'   => 'Negeri',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'mukim',
                                  'label'   => 'Mukim',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/summarry_ptf_ptra_editpp';
                        $this->load->view('template/default', $data);
                      
                }
  }

  function download()

  {
  $data = file_get_contents("/var/www/html/myspata/application/views/ptra/suratLantikan.pdf"); // Read the file's contents
  $name = 'suratLantikan.pdf';

  force_download($name, $data);
  }
        
        function model_struktur_ptra_editpp($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '142';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul><a href="download">Surat Lantikan.docx</a>',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                          array   ('2','Sivil','Sayuthi Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','Adib Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('5','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('6','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('7','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                  );
                  
               
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/model_struktur_ptra_editpp');
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
            
    
    
    $this->table->set_heading(anchor("ptra/model_struktur_ptra_editpp/",'Bil','title="Klik untuk susun rekod"'), 
                              anchor("ptra/model_struktur_ptra_editpp/",'Kategori ID','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editpp/",'Nama','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editpp/",'Syarikat','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editpp/",'Surat Lantikan','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editpp/",'Tindakan','title="Klik untuk susun rekod"'));

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
        
        function treeview_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c

    $node_id = '143';
    $menu_name = 'menu1';
    $menu_link = 'ptra/treeview_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '145';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c

    $node_id = '150';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
        $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d

    $node_id = '151';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kawalan_rekod_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function dokumen_rujukan_ptra_editpp($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e

    $node_id = '152';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data_1 =   array(
                        array('1','Senarai Pekerja Tambahan','Dokumen A',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1"></span></li>
                              </ul>'
                            ),
                        array('2','Status Aset Dalam Negeri','Dokumen B',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"  id="hapus2"></span></li>
                              </ul>'
                            ),
                        array('3','Penyata Kewangan Premis A','Dokumen C',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"  id="hapus3"></span></li>
                              </ul>'
                            ),
                        array('4','Salinan Jabatan','Dokumen D',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('5','Pelan Penilaian Aset A','Dokumen E',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('6','Senarai Bahan Bekalan','Dokumen F',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('7','Senarai Pembekal','Dokumen G',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('8','Pelan Penilaian  Aset B','Dokumen H',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('9','Status Aset Jabatan','Dokumen I',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('10','Senarai Aset Dalam Penilaian','Dokumen J',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('11','Senarai Bangunan Daerah A','Dokumen K',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('12','Senarai Saliran Daerah B','Dokumen L',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('13','Senarai Jalan Daerah C','Dokumen M',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('14','Pelan Penilaian Aset G','Dokumen N',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('15','Penyata Kewangan Jabatan D','Dokumen P',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                       );
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/dokumen_rujukan_ptra_editpp');
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
            
    
    
    $this->table->set_heading(anchor("ptra/dokumen_rujukan_ptra/",'Bil','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Tajuk Dokumen','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Dokumen Rujukan','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Tindakan','title="Klik untuk susun rekod"'));

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
        
        function summary_pp_ptra_editpp()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

    $node_id = '155';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_pp_ptra_editpp';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
  }
  //******* END PTRA EDIT PP *******//



//******* Start PTRA EDIT PTF *******//

  function status_premis_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra_editptf()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '102';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim(); //dapatkan senarai mukim dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db

        $rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'negeri',
                                  'label'   => 'Negeri',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'mukim',
                                  'label'   => 'Mukim',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/summarry_ptf_ptra_editptf';
                        $this->load->view('template/default', $data);
                      
                }
  }
        
        function model_struktur_ptra_editptf($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '142';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul><a href="download">Surat Lantikan.docx</a>',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>',
                             ),
                 
                          array   ('2','Sivil','Sayuthi Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','Adib Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('5','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('6','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('7','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                  );
                  
               
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/model_struktur_ptra_editptf');
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
            
    
    
    $this->table->set_heading(anchor("ptra/model_struktur_ptra_editptf/",'Bil','title="Klik untuk susun rekod"'), 
                              anchor("ptra/model_struktur_ptra_editptf/",'Kategori ID','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editptf/",'Nama','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editptf/",'Syarikat','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editptf/",'Surat Lantikan','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editptf/",'Tindakan','title="Klik untuk susun rekod"'));

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
        
        function treeview_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c

    $node_id = '143';
    $menu_name = 'menu1';
    $menu_link = 'ptra/treeview_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '145';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c

    $node_id = '150';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
        $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d

    $node_id = '151';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kawalan_rekod_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function dokumen_rujukan_ptra_editptf($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e

    $node_id = '152';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data_1 =   array(
                        array('1','Senarai Pekerja Tambahan','Dokumen A',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1"></span></li>
                              </ul>'
                            ),
                        array('2','Status Aset Dalam Negeri','Dokumen B',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"  id="hapus2"></span></li>
                              </ul>'
                            ),
                        array('3','Penyata Kewangan Premis A','Dokumen C',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"  id="hapus3"></span></li>
                              </ul>'
                            ),
                        array('4','Salinan Jabatan','Dokumen D',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('5','Pelan Penilaian Aset A','Dokumen E',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('6','Senarai Bahan Bekalan','Dokumen F',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('7','Senarai Pembekal','Dokumen G',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('8','Pelan Penilaian  Aset B','Dokumen H',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('9','Status Aset Jabatan','Dokumen I',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('10','Senarai Aset Dalam Penilaian','Dokumen J',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('11','Senarai Bangunan Daerah A','Dokumen K',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('12','Senarai Saliran Daerah B','Dokumen L',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('13','Senarai Jalan Daerah C','Dokumen M',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('14','Pelan Penilaian Aset G','Dokumen N',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('15','Penyata Kewangan Jabatan D','Dokumen P',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                       );
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/dokumen_rujukan_ptra_editptf');
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
            
    
    
    $this->table->set_heading(anchor("ptra/dokumen_rujukan_ptra/",'Bil','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Tajuk Dokumen','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Dokumen Rujukan','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Tindakan','title="Klik untuk susun rekod"'));

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
        
        function summary_ptf_ptra_editptf()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

    $node_id = '155';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptf_ptra_editptf';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
  }
  //******* END PTRA EDIT PTF *******//




  //******* Start PTRA EDIT PPD *******//

  function status_premis_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : status premis pra pendaftaran

    $node_id = '101';
    $menu_name = 'menu1';
    $menu_link = 'ptra/status_premis_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $this->load->view('template/default', $data);
  }

  function kat_bangunan_ptra_editppd()
  {
        //Name : Fatin
        //Date : 24/7/13
        //Desc : kategori aset bangunan

    $node_id = '102';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kat_bangunan_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['kementerian'] = $this->ptra_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->ptra_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->ptra_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->ptra_model->get_negeri(); //dapatkan senarai negeri dr db
        $data['negara'] = $this->ptra_model->get_negara(); //dapatkan senarai negara dr db
        $data['mukim'] = $this->ptra_model->get_mukim(); //dapatkan senarai mukim dr db
        $data['katprem'] = $this->ptra_model->get_kat_premis_aset(); //dapatkan senarai kat_premis_aset dr db

        $rules = array(
                            array(
                                  'field'   => 'kump_agensi',
                                  'label'   => 'Kumpulan Agensi',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'jab_agensi',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),   
                            array(
                                  'field'   => 'negara',
                                  'label'   => 'Negara',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'negeri',
                                  'label'   => 'Negeri',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'daerah',
                                  'label'   => 'Daerah',
                                  'rules'   => 'required'
                               ),
                           array(
                                  'field'   => 'mukim',
                                  'label'   => 'Mukim',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katprem',
                                  'label'   => 'Kategori Premis Aset',
                                  'rules'   => 'required'
                               ),
                 );

                  $this->form_validation->set_rules($rules); //validate form
                
                  if ($this->form_validation->run() == FALSE)
                {

                          $this->load->view('template/default', $data);
  
                }
                else
                {
                        $data['main_content'] = 'ptra/kandungan_ptra_editppd';
                        $this->load->view('template/default', $data);
                      
                }
  }
        
        function model_struktur_ptra_editppd($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : model stuktur ptra

    $node_id = '142';
    $menu_name = 'menu1';
    $menu_link = 'ptra/model_struktur_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data_1 =   array(
                         array('1','Sivil','Zuhairi Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul><a href="download">Surat Lantikan.docx</a>',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>',
                             ),
                 
                          array   ('2','Sivil','Sayuthi Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 
                         array ('3','Sivil','Adib Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                
                       array ('4','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('5','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('6','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                             ),
                 array ('7','Sivil','Hakim Mohd','Nilam Bestari Sdn.Bhd','<ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                        </ul>Surat Lantikan.docx',
                             ' <ul class="icomoon-icons-container">
                          <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                        </ul>'
                            ),
                  );
                  
               
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/model_struktur_ptra_editppd');
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
            
    
    
    $this->table->set_heading(anchor("ptra/model_struktur_ptra_editppd/",'Bil','title="Klik untuk susun rekod"'), 
                              anchor("ptra/model_struktur_ptra_editppd/",'Kategori ID','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editppd/",'Nama','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editppd/",'Syarikat','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editppd/",'Surat Lantikan','title="Klik untuk susun rekod"'),
                              anchor("ptra/model_struktur_ptra_editppd/",'Tindakan','title="Klik untuk susun rekod"'));

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
        
        function treeview_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : treeview skop aktiviti ptra 1b 1c

    $node_id = '143';
    $menu_name = 'menu1';
    $menu_link = 'ptra/treeview_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : table skop aktiviti 1b 1c

    $node_id = '145';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function skop_aktiviti2_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : keperluan sumber skop aktiviti 1b 1c

    $node_id = '150';
    $menu_name = 'menu1';
    $menu_link = 'ptra/skop_aktiviti2_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['objek'] = $this->ptra_model->get_objek_sebagai(); //dapatkan senarai objek sebagai dr db
        $this->load->view('template/default', $data);
  }
        
        function kawalan_rekod_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : kawalan rekod ptra 1d

    $node_id = '151';
    $menu_name = 'menu1';
    $menu_link = 'ptra/kawalan_rekod_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $this->load->view('template/default', $data);
  }
        
        function dokumen_rujukan_ptra_editppd($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : dokumen rujukan 1e

    $node_id = '152';
    $menu_name = 'menu1';
    $menu_link = 'ptra/dokumen_rujukan_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

    $data_1 =   array(
                        array('1','Senarai Pekerja Tambahan','Dokumen A',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1"></span></li>
                              </ul>'
                            ),
                        array('2','Status Aset Dalam Negeri','Dokumen B',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"  id="hapus2"></span></li>
                              </ul>'
                            ),
                        array('3','Penyata Kewangan Premis A','Dokumen C',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"  id="hapus3"></span></li>
                              </ul>'
                            ),
                        array('4','Salinan Jabatan','Dokumen D',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('5','Pelan Penilaian Aset A','Dokumen E',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('6','Senarai Bahan Bekalan','Dokumen F',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('7','Senarai Pembekal','Dokumen G',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('8','Pelan Penilaian  Aset B','Dokumen H',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('9','Status Aset Jabatan','Dokumen I',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('10','Senarai Aset Dalam Penilaian','Dokumen J',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('11','Senarai Bangunan Daerah A','Dokumen K',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('12','Senarai Saliran Daerah B','Dokumen L',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('13','Senarai Jalan Daerah C','Dokumen M',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('14','Pelan Penilaian Aset G','Dokumen N',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                        array('15','Penyata Kewangan Jabatan D','Dokumen P',
                            '<ul class="icomoon-icons-container">
                            <li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true"></span></li>
                              </ul>'
                              ),
                       );
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('ptra/dokumen_rujukan_ptra_editppd');
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
            
    
    
    $this->table->set_heading(anchor("ptra/dokumen_rujukan_ptra/",'Bil','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Tajuk Dokumen','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Dokumen Rujukan','title="Klik untuk susun rekod"'),
                              anchor("ptra/dokumen_rujukan_ptra/",'Tindakan','title="Klik untuk susun rekod"'));

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
        
        function summary_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : summary penyediaan ptra baru

    $node_id = '153';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list
        $this->load->view('template/default', $data);
  }
        
        function summary_ptf_ptra_editppd()
  {
        //Name : Fatin
        //Date : 8/7/13
        //Desc : summary pegawai teknikal fasiliti

    $node_id = '155';
    $menu_name = 'menu1';
    $menu_link = 'ptra/summary_ptf_ptra_editppd';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['year_list'] =year_dropdown();  //get year list 
        $this->load->view('template/default', $data);
  }
  //******* END PTRA EDIT PPD *******//

}