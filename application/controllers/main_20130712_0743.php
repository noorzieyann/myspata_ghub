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
	
    /*
    *   Author : Anuar
    *   Title  : PSPAO AWAL & PPUN
    */

     /*
	 
      START PSPAO AWAL
     */
     function arahan_sedia_pspao()
	{
		//author : Anuar
		//desc : arahan sedia pspao
        //date create: 08/07/2013
		$data['main_content'] = 'pspao/arahan_sedia_pspao';
        $this->load->view('template/default', $data);
	}
        
        function senarai_notifikasi_pspao()
	{
		//author : Anuar
		//desc : senarai notifikasi pspao
        //date create: 08/07/2013
		$data['main_content'] = 'pspao/senarai_notifikasi_pspao';
        $this->load->view('template/default', $data);
	}
        
        function pspao_baru()
	{
		//author : Anuar
		//desc : pspao baru  
        //date create: 08/07/2013
		$data['main_content'] = 'pspao/pspao_baru';
        $this->load->view('template/default', $data);
	}
        
        function ulasan_pp_lulus_pspao()
	{
		//author : Anuar
		//desc : pspao ulasan peng. pgawal lulus
        //date create: 08/07/2013
		$data['main_content'] = 'pspao/ulasan_pp_lulus_pspao';
        $this->load->view('template/default', $data);
	}
        
        function ulasan_pp_sah_pspao()
	{
		//author : Anuar
		//desc : pspao ulasan peng. pgawal sah
        //date create: 08/07/2013
		$data['main_content'] = 'pspao/ulasan_pp_sah_pspao';
        $this->load->view('template/default', $data);
	}
        
        
        function senarai_pp_pspao()
	{
		//author : Anuar
		//desc : senarai pspao peng. pgawal
        //date create: 08/07/2013
		$data['main_content'] = 'pspao/senarai_pp_pspao';
        $this->load->view('template/default', $data);
        }
        
         function senarai_ptf_pspao()
	{
		//author : Anuar
		//desc : senarai pspao ptf
        //date create: 08/07/2013
		$data['main_content'] = 'pspao/senarai_ptf_pspao';
        $this->load->view('template/default', $data);
        }

    
     /*
     * END PSPAO AWAL
     */
     /*
	 
      START PPUN
     */

     function dokumen_rujukan_ppun()
	{
		//author : Anuar
		//desc : dokumen rujukan ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/dokumen_rujukan_ppun';
        $this->load->view('template/default', $data);
        }
        
        function kawalan_rekod_terima_ppun()
	{
		//author : Anuar
		//desc : kawalan rekod terima ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/kawalan_rekod_terima_ppun';
        $this->load->view('template/default', $data);
        }
        
        
        function  kemaskini_tskopaktiviti_ppun()
	{
		//author : Anuar
		//desc : kemaskini tskopaktiviti ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/kemaskini_tskopaktiviti_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  model_struktur_ppun()
	{
		//author : Anuar
		//desc : model struktur ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/model_struktur_ppun';
        $this->load->view('template/default', $data);
        }
        
        function  penyediaan_kandungan_ppun()
	{
		//author : Anuar
		//desc : penyediaan kandungan ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/penyediaan_kandungan_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  treeviewskop_ppun()
	{
		//author : Anuar
		//desc : treeviewskop ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/treeviewskop_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  tskopaktiviti_ppun()
	{
		//author : Anuar
		//desc : tskopaktiviti ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/tskopaktiviti_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  summary_ptf_ppun()
	{
		//author : Anuar
		//desc : summary ptf ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/summary_ptf_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  summary_pp_ppun()
	{
		//author : Anuar
		//desc : summary pp ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/summary_pp_ppun';
        $this->load->view('template/default', $data);
        }
       
         function  summary_ppun()
	{
		//author : Anuar
		//desc : summary ppun
                //date create: 08/07/2013
		$data['main_content'] = 'ppun/summary_ppun';
        $this->load->view('template/default', $data);
        }
        
         function  senarai_ptf_ppun()
	{
		//author : Anuar
		//desc : senarai ptf ppun
                //date create: 09/07/2013
		$data['main_content'] = 'ppun/senarai_ptf_ppun';
        $this->load->view('template/default', $data);
        }
        
        function  senarai_pp_ppun()
	{
		//author : Anuar
		//desc : senarai pp ppun
                //date create: 09/07/2013
		$data['main_content'] = 'ppun/senarai_pp_ppun';
        $this->load->view('template/default', $data);
        }


      /*
     * END PPUN
     */
	
	function pspaoakhir()
	{
		$data['main_content'] = 'pspao_akhir/default';
        $this->load->view('template/default', $data);
	}

	//** PTRA **//
	function senarai_pp_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : senarai pegawai pengawal
		$data['main_content'] = 'ptra/senarai_pp_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function senarai_ptf_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : senarai pegawai teknikal fasiliti
		$data['main_content'] = 'ptra/senarai_ptf_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function kandungan_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : penyediaan kandungan ptra
		$data['main_content'] = 'ptra/kandungan_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function model_struktur_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : model stuktur ptra
		$data['main_content'] = 'ptra/model_struktur_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function treeview_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : treeview skop aktiviti ptra 1b 1c
		$data['main_content'] = 'ptra/treeview_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function skop_aktiviti_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : table skop aktiviti 1b 1c
		$data['main_content'] = 'ptra/skop_aktiviti_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function skop_aktiviti2_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : keperluan sumber skop aktiviti 1b 1c
		$data['main_content'] = 'ptra/skop_aktiviti2_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function kawalan_rekod_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : kawalan rekod ptra 1d
		$data['main_content'] = 'ptra/kawalan_rekod_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function dokumen_rujukan_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : dokumen rujukan 1e
		$data['main_content'] = 'ptra/dokumen_rujukan_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : summary penyediaan ptra baru
		$data['main_content'] = 'ptra/summary_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_pp_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : summary pegawai pengawal
		$data['main_content'] = 'ptra/summary_pp_ptra';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_ptf_ptra()
	{
		//Nama : Fatin
                //Date : 8/7/13
                //Desc : summary pegawai teknikal fasiliti
		$data['main_content'] = 'ptra/summary_ptf_ptra';
                $this->load->view('template/default_pelan', $data);
	}
	//** END PTRA **//

	//** Start PNPA **//

	   function senarai_pp_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai pengawal
		$data['main_content'] = 'pnpa/senarai_pp_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function senarai_ptf_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page senarai pegawai teknikal fasiliti
		$data['main_content'] = 'pnpa/senarai_ptf_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	function kandungan_pnpa()
	{
		//nama:yann
                //date:8/7/13
                //desc:page penyediaan kandungan pnpa
		$data['main_content'] = 'pnpa/kandungan_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	
	function model_struktur_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page model struktur pnpa
		$data['main_content'] = 'pnpa/model_struktur_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	function treeview_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page treeview untuk skop n aktiviti
		$data['main_content'] = 'pnpa/treeview_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	function skop_aktiviti_pnpa ()
	{

                //nama:yann
                //date:8/7/13
                //desc:page table skop n aktiviti	
                $data['main_content'] = 'pnpa/skop_aktiviti_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function skop_aktiviti2_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:table untuk keperluan sumber
		$data['main_content'] = 'pnpa/skop_aktiviti2_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function kawalan_rekod_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page untuk kawalan rekod
		$data['main_content'] = 'pnpa/kawalan_rekod_pnpa';
                 $this->load->view('template/default_pelan', $data);
	}
        
        function dokumen_rujukan_pnpa ()
	{
                //nama:yann
                //date:8/7/13
                //desc:page untuk dokumen rujukan
		$data['main_content'] = 'pnpa/dokumen_rujukan_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
         function summary_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk penyediaan pnpa
                $data['main_content'] = 'pnpa/summary_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_pp_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk pengawai pengawal
                $data['main_content'] = 'pnpa/summary_pp_pnpa';
                $this->load->view('template/default_pelan', $data);
	}
        
        function summary_ptf_pnpa ()
	{

		//nama:yann
                //date:8/7/13
                //desc:summary page untuk pegawai teknikal fasiliti
                $data['main_content'] = 'pnpa/summary_ptf_pnpa';
                $this->load->view('template/default_pelan', $data);
	}

	//** END PNPA **//
	
	
	
	//**START POPA**//
	
	function senarai_pp_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai pp popa
		$data['main_content'] = 'popa/senarai_pp_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function senarai_ptf_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: senarai ptf popa
		$data['main_content'] = 'popa/senarai_ptf_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function kandungan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: penyediaan kandungan popa
		$data['main_content'] = 'popa/kandungan_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function model_struktur_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: model struktur popa
		$data['main_content'] = 'popa/model_struktur_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function treeview_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: treeview popa
		$data['main_content'] = 'popa/treeviewskop_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function skop_aktiviti_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: skop dan aktiviti popa
		$data['main_content'] = 'popa/skop_aktiviti_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function skop_aktiviti2_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: skop dan aktiviti 2 popa
		$data['main_content'] = 'popa/skop_aktiviti2_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	 function kawalan_rekod_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: kawalan rekod popa
		$data['main_content'] = 'popa/kawalan_rekod_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function dokumen_rujukan_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: dokumen rujukan popa
		$data['main_content'] = 'popa/dokumen_rujukan_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function summary_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary popa
		$data['main_content'] = 'popa/summary_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function summary_pp_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary pp popa
		$data['main_content'] = 'popa/summary_pp_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	function summary_ptf_popa()
	{
		//name: Seri Idayu
		//date: 08072013
		//desc: summary ptf popa
		$data['main_content'] = 'popa/summary_ptf_popa';
        $this->load->view('template/default_pelan', $data);
	}
	
	//**END POPA **//
}
