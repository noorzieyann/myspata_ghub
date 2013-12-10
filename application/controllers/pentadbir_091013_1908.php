<?php

class Pentadbir extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -  
   *    http://example.com/index.php/welcome/index
   *  - or -
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
	$this->load->model('takwim_model');
    $this->load->model('pentadbir_model','',TRUE);
    $this->load->model('menu/sidemenu_model');
	
	
	$this->load->model('pentadbir_negeri_model');
    $this->load->model('pentadbir_daerah_model');	
	
	
    $this->load->library('pagination');
	$this->load->library('table');
	date_default_timezone_set('UTC'); 
        
    $this->output->enable_profiler(TRUE); //display query statement
              
  }
     
    
  //** Start Pentadbir **//

    function pendaftaran_pengguna()
	{
        //Name : Fatin
        //Date : 27/7/13
        //Desc : pendaftaran pengguna

    $node_id = '116';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/pendaftaran_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

		$data['sesr'] = $this->session->all_userdata();
		$data['sesm'] = $this->aauth->get_session('menu');
        $data['kementerian'] = $this->pentadbir_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->pentadbir_model->get_jabatan($data['sesr']['user_kemid']); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->pentadbir_model->get_daerah(); //dapatkan senarai daerah dr db
        $data['negeri'] = $this->pentadbir_model->get_negeri(); //dapatkan senarai negeri dr db
		
		$data['countries'] = $this->pentadbir_negeri_model->get_countries();
        
        $rules = array(
                            array(
                                  'field'   => 'namapengguna',
                                  'label'   => 'Nama Pengguna',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'myid',
                                  'label'   => 'MyID',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'notel',
                                  'label'   => 'No. Telefon',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'kementerian',
                                  'label'   => 'Kementerian',
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
                                  'field'   => 'alamat',
                                  'label'   => 'Alamat Pejabat',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'emel',
                                  'label'   => 'E-mel',
                                  'rules'   => 'required'
                               ),
                          array(
                                  'field'   => 'nopej',
                                  'label'   => 'No. Telefon Pejabat',
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
                    $data['main_content'] = 'penetapan_pentadbir/pendaftaran_pengguna';
                    $this->load->view('template/default', $data);
                      
                }
  }
  
	function get_cities($country){
      	$this->load->model('pentadbir_daerah_model');
     	//print_r($this->city_model->get_cities($country));
      	header('Content-Type: application/x-json; charset=utf-8');
      	echo(json_encode($this->pentadbir_daerah_model->get_cities($country)));
     	// $this->output->set_output(json_encode($this->city_model->get_cities($country)));
      
	}
  

  function reset_pengguna()
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : reset katalaluan pengguna
        
        
    $node_id = '118';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/reset_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $rules = array(
                            array(
                                  'field'   => 'katalaluan',
                                  'label'   => 'Katalaluan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'nokp',
                                  'label'   => 'No. Kad Pengenalan',
                                  'rules'   => 'required'
                               ),
                            array(
                                  'field'   => 'emel',
                                  'label'   => 'E-mel',
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
                    $data['main_content'] = 'penetapan_pentadbir/reset_pengguna';
                    $this->load->view('template/default', $data);
                      
                }
  }

  function peranan_pengguna($sort_by = 'title', $sort_order = 'asc', $offset = 0)
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : peranan pengguna

    $node_id = '119';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/peranan_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


        $data['modul'] = $this->pentadbir_model->get_modul(); //dapatkan senarai modul dr db

        $data_1 =   array(
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '1','Pentadbir Utama Aplikasi','Pentadbir Utama','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value="">',
                          '2','Pentadbir Aplikasi','Admin Kementerian','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '3','Pegawai Pengawal','Pegawai Pengawal Kementerian','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '4','KPKR / TKPKR (JKR)','KPKR / TKPKR Jabatan','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '5','Pegawai Teknikal Fasiliti','PTF Kementerian','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '6','Pegawai Teknikal Fasiliti','PTF Jabatan','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '7','Pegawai Teknikal Fasiliti','PTF Jabatan','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '8','Pegawai Teknikal Fasiliti', 'PTF Daerah','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '9','Pegawai Daftar dan Data Fasiliti','PDF Kementerian','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '10','Pegawai Daftar dan Data Fasiliti','PDF Jabatan','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '11','Pegawai Operasi Fasiliti','POF (Premis)','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '12','Pegawai Inspektorat Fasiliti','PIF Jabatan','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '13','Pegawai Inspektorat Fasiliti','PIF Kementerian','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '14','Pegawai Penyedia Dokumen','Penyedia Dokumen','Penyediaan Pelan Tahunan'
                            ),
                        array('<label class="checkbox"><input type="checkbox" value=""></label>',
                          '15','Pegawai Penyedia Dokumen','Penyedia Dokumen','Penyediaan Pelan Tahunan'
                            ),
                        
                       );
                   
           
    $quantity = 5; // how many per page
    $start = $this->uri->segment(3); // this is auto-incremented by the pagination class
    if(!$start) $start = 0; // default to zero if no $start

    // slice the array and only pass the slice containing what we want (i.e. the $config['per_page'] number of records starting from $start)
    $data['dataku'] = array_slice($data_1, $start, $quantity);

    $config['base_url'] = site_url('pentadbir/peranan_pengguna');
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
            
    
    
    $this->table->set_heading(anchor("pentadbir/peranan_pengguna/",'#'),
                              anchor("pentadbir/peranan_pengguna/",'Bil','title="Klik untuk susun rekod"'),
                              anchor("pentadbir/peranan_pengguna/",'Nama Kumpulan Pengguna','title="Klik untuk susun rekod"'),
                              anchor("pentadbir/peranan_pengguna/",'Peranan','title="Klik untuk susun rekod"'),
                              anchor("pentadbir/peranan_pengguna/",'Modul','title="Klik untuk susun rekod"'));

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

  function kemaskini_pengguna()
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : kemaskini profil pengguna

    $node_id = '120';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/kemaskini_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);

        $data['kementerian'] = $this->pentadbir_model->get_kementerian(); //dapatkan senarai kementerian dr db
        $data['jabatan'] = $this->pentadbir_model->get_jabatan(); //dapatkan senarai jabatan dr db
        $data['daerah'] = $this->pentadbir_model->get_daerah(); //dapatkan senarai daerah dr db
        $this->load->view('template/default', $data);
  }

  function pengurusan_pengguna()
  {
        //Name : Fatin
        //Date : 27/7/13
        //Desc : pengurusan pengguna

    $node_id = '117';
    $menu_name = 'front';
    $menu_link = 'penetapan_pentadbir/pengurusan_pengguna';
                
    $data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
    $data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
    $data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
    $data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);


	$data['kementerian'] = $this->pentadbir_model->get_kementerian(); //dapatkan senarai kementerian dr db
	$data['jabatan'] = $this->pentadbir_model->get_jabatan(); //dapatkan senarai jabatan dr db
	$data['negeri'] = $this->pentadbir_model->get_negeri(); //dapatkan senarai negeri dr db
	$data['daerah'] = $this->pentadbir_model->get_daerah(); //dapatkan senarai daerah dr db
	$data['peranan'] = $this->pentadbir_model->get_peranan(); //dapatkan senarai peranan pengguna dr db
	$data['modul'] = $this->pentadbir_model->get_modul(); //dapatkan senarai modul dr db
    
	$data['rowdt'] = $this->pentadbir_model->senarai_pengguna();
	$data['sesr'] = $this->session->all_userdata();
	$data['sesm'] = $this->aauth->get_session('menu');

	$this->load->view('template/default', $data);
 
}




 function pengurusan_takwim($year=null,$month=null)
        {   
        
            
		$node_id = '177';
		$menu_name = 'front';
		$menu_link = 'penetapan_pentadbir/takwim';
		
		$data = array('menu_name' => $menu_name, 'menu_id' => $node_id, 'main_content' => $menu_link);
		$data['menu_parent'] = $this->sidemenu_model->get_sidemenu_parent($menu_name);
		$data['menu_sub'] = $this->sidemenu_model->get_sidemenu_sub($menu_name);
		$data['menu'] = $this->sidemenu_model->get_sidemenu($menu_name);
               
            
          /*  if($this->input->post('tajuk_takwim')==''){
                     $this->form_validation->set_rules('tajuk_takwim', 'Tajuk Takwim Untuk Tambah Aktiviti', 'required');
                 }
                 
            if($this->input->post('aktiviti_takwim')==''){
                     $this->form_validation->set_rules('aktiviti_takwim', 'Aktiviti Takwim Untuk Tambah Aktiviti', 'required');
                 }
                 
            if($this->input->post('tarikh_mula')==''){
                     $this->form_validation->set_rules('tarikh_mula', 'Tarikh Mula Untuk Tambah Aktiviti', 'required');
                 }
                 
           if($this->input->post('tarikh_akhir')==''){
                     $this->form_validation->set_rules('tarikh_akhir', 'Tarikh Akhir Untuk Tambah Aktiviti', 'required');
                 }      
            
                  if ($this->form_validation->run() == FALSE)
                {*/
                         if (!$year) {
                                 $year = date('Y');
                         }
                         if (!$month) {
                                 $month = date('m');
                         }

                         $this->load->model('takwim_model');

                         if ($day = $this->input->post('day')) {
                                 $this->takwim_model->add_calendar_data(
                                         "$year-$month-$day",
                                         $this->input->post('data')
                                 );
                         }

                     $data['calendar'] = $this->takwim_model->generate($year, $month);

                      $this->load->view('template/default', $data);

               /* }
                else
                {
                       //$data['main_content'] = 'pspao/arahan_sedia_pspao';
                       //$this->load->view('template/default_pelan', $data);
                      
                }
            
            */
            
            
        }



  //** END Pentadbir **//
  

}