


<?php

class Senaraipspao extends CI_Controller {
    
    
public function __construct()
  {
    parent::__construct();
    #load library dan helper yang dibutuhkan
    $this->load->library('form_validation');
    
    $this->load->helper(array('form', 'url'));
    $this->load->helper('function_helper');

    $this->load->model('pspao_model');
    $this->load->model('popa_model');
    $this->load->model('menu/sidemenu_model');    

    $this->load->library('pagination');
    $this->load->library('table');
   // $this->output->enable_profiler(TRUE); //display query statement
    
    if(!$this->aauth->is_loggedin()){
      echo '<script>';
      echo 'alert("Belum Login");';
      echo 'window.location = "'.site_url('auth').'"';
      echo '</script>';
    }
    
  }





  function senarai_edaran_pspao()
  {
    //name: Seri Idayu
    //date: 30072013
    //desc: senarai edaran pspao
            
            
                $node_id = '16';
                $menu_name = 'menu1';
                $menu_link = 'main/senarai_edaran_pspao';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
    
                $data['year_list'] =year_dropdown();  //get year list
                $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db 
                $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->popa_model->get_premis(); //dapatkan senarai premis dr db
                $data['status'] = $this->popa_model->get_status(); //dapatkan senarai premis dr db
                
                


$data_1 =   array(
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','1','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','2','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','3','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','4','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','5','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','6','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','7','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','8','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','9','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','10','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','11','Sharifah Nadiah Syed Waris','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','12','Ahmad Zuhairi Haji Saman','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','13','Nuraini Haizi Abd Ghani','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','14','Darleena Hanis Hariz','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        array('<label class="checkbox"> <input type="checkbox" value=""></label>','15','Megat Daud Megat Abu','Kementerian Kerja Raya','Jabatan Kerja Raya Malaysia'
                            ),
                        
                       );


                $quantity = 5; // how many per page
                $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
                if(!$start) $start = 0; // default to zero if no $start


                // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
                $data['dataku'] = array_slice($data_1, $start, $quantity);
                

                $config['base_url'] = site_url('senaraipspao/senarai_edaran_pspao');
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


                $this->table->set_heading('', 'Bil','Nama', 'Kementerian','Jabatan/Agensi');

                
    

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
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
                                  'rules'   => 'required'
                              ),
                           array(
                                  'field'   => 'jabatan',
                                  'label'   => 'Jabatan/Agensi',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'katacarian',
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
                 
  
    $data['main_content'] = 'senaraipspao/senarai_edaran_pspao';
    $this->load->view('template/default', $data);

  }

}



  function senarai_pspao_akhir()
  {
    //name: Seri Idayu
    //date: 08072013
    //desc: senarai pegawai penyedia dokumen popa
            
                $node_id = '16';
                $menu_name = 'menu1';
                $menu_link = 'main/senarai_pspao_akhir';
                
                $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
                $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
                $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
                $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
 
                $data['year_list'] =year_dropdown();  //get year list 
                $data['kementerian'] = $this->popa_model->get_kementerian(); //dapatkan senarai kementerian dr db
                $data['jabatan'] = $this->popa_model->get_jabatan(); //dapatkan senarai jabatan dr db
                $data['premis'] = $this->popa_model->get_premis();
                $data['status'] = $this->popa_model->get_status(); //dapatkan senarai premis dr db



                $data_1 =   array(
                        array('1','PSPAO000001','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0001','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('2','PSPAO000002','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0002','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('3','PSPAO00003','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0003','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('4','PSPAO00004','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0004','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('5','PSPAO00005','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0001','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('6','PSPAO00006','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0002','<span class="badge badge-success">Lulus</span>','<<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('7','PSPAO00007','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0003','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('8','PSPAO00008','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0004','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('9','PSPAO00009','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0001','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('10','PSPAO00010','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0002','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('11','PSPAO00011','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0003','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('12','PSPAO00012','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0004','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('13','PSPAO00013','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0001','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('14','PSPAO00014','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0002','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('15','PSPAO00015','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0003','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('16','PSPAO00016','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0004','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('17','PSPAO00017','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0001','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('18','PSPAO00018','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0002','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('19','PSPAO00019','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0003','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  array('20','PSPAO000020','2013','Kementerian Kerja Raya','Jabatan Kerja Raya',
                            'Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE0004','<span class="badge badge-success">Lulus</span>','<ul class="icomoon-icons-container">
                                <a href="senarai_edaran_pspao"><li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe0fb;"></span></li></a>
                              </ul>'
                            ),
                  
                  );


              $quantity = 5; // how many per page
              $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
              if(!$start) $start = 0; // default to zero if no $start

              // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
              $data['dataku'] = array_slice($data_1, $start, $quantity);

              $config['base_url'] = site_url('senaraipspao/senarai_pspao_akhir');
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


              $this->table->set_heading('Bil', 'PSPAO ID','Tahun', 'Kementerian','Jabatan/Agensi','Premis','NO DPA','Status','Tindakan');

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
                                  'field'   => 'tempohmula',
                                  'label'   => 'Tahun Mula',
                                  'rules'   => 'required'
                              ),
                            array(
                                  'field'   => 'tempohakhir',
                                  'label'   => 'Tahun Akhir',
                                  'rules'   => 'required'
                              ),
                           array(
                                  'field'   => 'jabatan',
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
                                  'label'   => 'NO DPA',
                                  'rules'   => 'required'
                               ),
                        array(
                                  'field'   => 'status',
                                 'label'   => 'Status',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'katacarian',
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
                 
  
                $data['main_content'] = 'senaraipspao/senarai_pspao_akhir';
                $this->load->view('template/default', $data);
  }

}



        }