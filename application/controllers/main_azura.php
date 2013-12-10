<?php

class Main extends CI_Controller {

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
		 
	function index()
	{
        //$config['base_url'] = base_url() . 'DefaultPage/index';
		$data['main_content'] = 'main';
        $this->load->view('template/default', $data);
		//$this->load->view('default');
	}
        
        //**START PLA**//
	
	function senarai_pp_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page senarai pegawai pengawal
		$data['main_content'] = 'pla/senarai_pp_pla';
         $this->load->view('template/default', $data);
	}
        
        function senarai_ptf_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page senarai pegawai teknikal fasiliti
		$data['main_content'] = 'pla/senarai_ptf_pla';
        $this->load->view('template/default', $data);
	}
        
        function kandungan_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page kandungan pla
		$data['main_content'] = 'pla/kandungan_pla';
        $this->load->view('template/default', $data);
	}
        
        function model_struktur_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page model struktur pla
		$data['main_content'] = 'pla/model_struktur_pla';
        $this->load->view('template/default', $data);
	}
        
        function treeview_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page treeview
		$data['main_content'] = 'pla/treeview_pla';
        $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page skop aktiviti pla
		$data['main_content'] = 'pla/skop_aktiviti_pla';
        $this->load->view('template/default', $data);
	}
        
        function skop_aktiviti2_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page skop aktiviti2 pla
		$data['main_content'] = 'pla/skop_aktiviti2_pla';
        $this->load->view('template/default', $data);
	}
        
        function kawalan_rekod_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page senarai kawalan rekod pelupusan
		$data['main_content'] = 'pla/kawalan_rekod_pla';
        $this->load->view('template/default', $data);
	}
        
        function dokumen_rujukan_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page senarai dokumen untuk rujukan bagi pelupusan aset
		$data['main_content'] = 'pla/dokumen_rujukan_pla';
        $this->load->view('template/default', $data);
	}
        
        function summary_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page senarai ringkasan pla
		$data['main_content'] = 'pla/summary_pla';
        $this->load->view('template/default', $data);
	}
        
        function summary_pp_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page senarai ringkasan pla untuk pegawai pengawal
		$data['main_content'] = 'pla/summary_pp_pla';
        $this->load->view('template/default', $data);
	}
        
        function summary_ptf_pla()
	{
		//nama:Azura
        //date:8/7/13
        //desc:page senarai ringkasan pla untuk pegawai teknikal fasiliti
		$data['main_content'] = 'pla/summary_ptf_pla';
        $this->load->view('template/default', $data);
	}
}
?>
