<?php
	class Skopaktiviti_model extends CI_Model {
		
		#################################################    SKOP AKTIVITI    ###########################
		
		function get_lkpskop($idrekod,$typePlan)
		{    
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('*');
			$this->db->from('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');
			$this->db->order_by($typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan_id', 'ASC');
			$this->db->join('lkp_skop_aktvt','tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
			$this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'skop', 'both');
			$this->db->where('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.'.$typePlan.'_id',$idrekod);
			$query = $this->db->get();
			
			 $row = $query->result();
	  
			return $row;
		 }
		 
		function get_lkpskopaktiviti($skop_aktvt_id, $idrekod ,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			 
			$this->db->select('*');
			$this->db->from('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');
			$this->db->order_by($typePlan."_pata_".$fileIt ."_1b_skop_pilihan_id ", "ASC");
			$this->db->join('lkp_skop_aktvt','tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
			$this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'aktiviti', 'after');
			$this->db->where('tbl_'.$typePlan.'_pata_'.$fileIt .'_1b_skop_pilihan.'.$typePlan.'_id',$idrekod);
			$this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
			//$this->db->where('tbl_pnpa_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
			$query = $this->db->get();

			$row = $query->result();

			return $row;		
		
		}
		
		 function get_lkpskopaktiviti_1($idrekod,$skop_aktvt_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('*');
			$this->db->from('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');
			$this->db->order_by($typePlan."_pata_".$fileIt ."_1b_skop_pilihan_id ", "ASC");
			$this->db->join('lkp_skop_aktvt','tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
			$this->db->like('lkp_skop_aktvt.skop_aktvt_kategori', 'aktiviti', 'after');
			$this->db->where('tbl_'.$typePlan.'_pata_'.$fileIt .'_1b_skop_pilihan.'.$typePlan.'_id',$idrekod);
			$this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
			//$this->db->where('tbl_pnpa_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
			$query = $this->db->get();

			$row = $query->result();

			return $row;
		
		}
		
		function get_lkpskopbutiran_count($skop_aktvt_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('*');
			$this->db->from('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');
			$this->db->join('lkp_skop_aktvt','tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
			$this->db->like('skop_aktvt_kategori', 'butiran', 'after');
			$this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);

			//$this->db->where('tbl_pnpa_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
			$querys = $this->db->get();
			$row = $querys->num_rows();
			//$row = $this->db->count_all_results();

			return $row;
		
		}
		
		function get_lkpskopbutiran($skop_aktvt_id, $idrekod,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			 
			$this->db->select('*');
			$this->db->from('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');
			$this->db->order_by($typePlan."_pata_".$fileIt."_1b_skop_pilihan_id ", "ASC");
			$this->db->join('lkp_skop_aktvt','tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
			$this->db->like('skop_aktvt_kategori', 'butiran', 'after');
			$this->db->where('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.'.$typePlan.'_id',$idrekod);
			$this->db->where('lkp_skop_aktvt.skop_aktvt_sort', $skop_aktvt_id);
			//$this->db->where('tbl_pnpa_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_sort');
			$query = $this->db->get();

			$row = $query->result();

			return $row;
		
		
		}
		
		
		function cal_man_cost_skop($idrekod,$skop_aktiviti_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			//$this->db->select_sum('bajet_aktvt');
			$this->db->select('*');
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('kat_sumber_man_id', 3); //only isi shaja
			$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
			$query_cost = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_sumber_man');

			
			if ($query_cost->num_rows() > 0)
			{
			  $gaji = 0;
			  foreach ($query_cost->result() as $rows)
			  {
				$flag_gaji = ($rows->gaji_kos_flag)*1;
				$kos_gaji = ($rows->kos_gaji)*1;
				$kos_lebih_masa = ($rows->kos_kerja_lebih_masa)*1;
				
				if($flag_gaji===1) //for kos_gaji only
				{
				  $gaji+= $kos_gaji;
				}
				else if($flag_gaji===2) //for both of kos gaji + lebih masa
				{
				  $gaji+= $kos_gaji+$kos_lebih_masa;
				}
				
			  }
			  
			}   
			else
			{
			  $gaji = 0;
			}
			
			return $gaji;
		  }
		  
		function cal_alatkerja_cost_skop($idrekod,$skop_aktiviti_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('kos_seunit');
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
			$query_alatkerja = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_alat_kerja');
			

			if ($query_alatkerja->num_rows() > 0)
			{
			  $alatkerja = 0;
			  foreach ($query_alatkerja->result() as $rows)
			  {
				$alatkerja+=$rows->kos_seunit;      
			  }
			}   
			else
			{
			  $alatkerja = 0;
			}
			
			return $alatkerja;
		  }
		  
		function cal_pejabat_cost_skop($idrekod,$skop_aktiviti_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('kos_seunit');
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
			$query_pejabat = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_urus_pej');
			

			if ($query_pejabat->num_rows() > 0)
			{
			  $pejabat = 0;
			  foreach ($query_pejabat->result() as $rows)
			  {
				$pejabat+=$rows->kos_seunit;      
			  }
			}   
			else
			{
			  $pejabat = 0;
			}
			
			return $pejabat;
		  }
		
		
		function cal_bajet_skop($idrekod,$skop_aktiviti_id,$typePlan)
		{
			
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('bajet_aktvt');
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('skop_aktvt_id', $skop_aktiviti_id);
			$query_bajet = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c');
				
			if ($query_bajet->num_rows() > 0)
			{
			  $bajet_aktiviti = 0;
			  foreach ($query_bajet->result() as $rows)
			  {
				//$row = $query_bajet->row(); 
				$bajet_aktiviti+= $rows->bajet_aktvt;
			  }
			  /* Here calculate 1b1c but meantime user don want this calculation */
			 /* $human_cost = $this->cal_man_cost_skop($idrekod,$skop_aktiviti_id,$typePlan);
			  $alat_cost = $this->cal_alatkerja_cost_skop($idrekod,$skop_aktiviti_id,$typePlan);
			  $pejabat_cost = $this->cal_pejabat_cost_skop($idrekod,$skop_aktiviti_id,$typePlan);
			  
			  $total_cost = $bajet_aktiviti+$human_cost+$alat_cost+$pejabat_cost;
			*/
			  $total_cost = $bajet_aktiviti;
			}     
			else
			{
			  $total_cost = 0;
			}
			
			return number_format($total_cost,2);
		}
		
		function cal_man_cost($idrekod,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('*');
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('kat_sumber_man_id', 3); //only isi shaja
				$query_cost = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_sumber_man');

			if ($query_cost->num_rows() > 0)
			{
			  $gaji = 0;
			  foreach ($query_cost->result() as $rows)
			  {
				$flag_gaji = ($rows->gaji_kos_flag)*1;
				$kos_gaji = ($rows->kos_gaji)*1;
				$kos_lebih_masa = ($rows->kos_kerja_lebih_masa)*1;
				
				if($flag_gaji===1) //for kos_gaji only
				{
				  $gaji+= $kos_gaji;
				}
				else if($flag_gaji===2) //for both of kos gaji + lebih masa
				{
				  $gaji+= $kos_gaji+$kos_lebih_masa;
				}
				
			  }
			  
			}   
			else
			{
			  $gaji = 0;
			}
			
			return $gaji;
		  }
		  
		function cal_alatkerja_cost($idrekod,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('kos_seunit');
			$this->db->where($typePlan.'_id', $idrekod);
				$query_alatkerja = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_alat_kerja');
			

			if ($query_alatkerja->num_rows() > 0)
			{
			  $alatkerja = 0;
			  foreach ($query_alatkerja->result() as $rows)
			  {
				$alatkerja+=$rows->kos_seunit;      
			  }
			}   
			else
			{
			  $alatkerja = 0;
			}
			
			return $alatkerja;
		  }
		  
		function cal_pejabat_cost($idrekod,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('kos_seunit');
			$this->db->where($typePlan.'_id', $idrekod);
				$query_pejabat = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_urus_pej');
			

			if ($query_pejabat->num_rows() > 0)
			{
			  $pejabat = 0;
			  foreach ($query_pejabat->result() as $rows)
			  {
				$pejabat+=$rows->kos_seunit;      
			  }
			}   
			else
			{
			  $pejabat = 0;
			}
			
			return $pejabat;
		  }
		  
	
		function cal_bajet($idrekod,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('bajet_aktvt');
			$this->db->where($typePlan.'_id', $idrekod);
			$query_bajet = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c');
			  
			if ($query_bajet->num_rows() > 0)
			{
			  $bajet_aktiviti = 0;
			  foreach ($query_bajet->result() as $rows)
			  {
				//$row = $query_bajet->row(); 
				$bajet_aktiviti+= $rows->bajet_aktvt;
			  }
			
			/* Here calculate 1b1c but meantime user don want this calculation */
			/*  $human_cost = $this->cal_man_cost($idrekod,$typePlan);
			  $alat_cost = $this->cal_alatkerja_cost($idrekod,$typePlan);
			  $pejabat_cost = $this->cal_pejabat_cost($idrekod,$typePlan);
			  
			  $total_cost = $bajet_aktiviti+$human_cost+$alat_cost+$pejabat_cost;
			 */
			 $total_cost = $bajet_aktiviti;
			}     
			else
			{
			  $total_cost = 0;
			}
			
			return number_format($total_cost,2);
		}
		
		#################################################    SKOP AKTIVITI 2  #######################################
		
		//view page & load in controller
		function get_obj_sebagai()
		{
			$get_nama_panelpenilai1 = $this->db->get('lkp_objek_sebagai');
			return $get_nama_panelpenilai1->result();
		} 
		
		function get_sumber_id()
		{
			$get_nama_panelpenilai1 = $this->db->get('lkp_sumber');
			return $get_nama_panelpenilai1->result();
		}
		
		function get_sum_man()
		{
			$this->db->where('sumber_id = 1');
			$get_nama_panelpenilai1 = $this->db->get('tbl_utiliti_sumber_man');
			
			return $get_nama_panelpenilai1->result();
		}
		
		function get_alat_pej()
		{
		   
			$this->db->where('kat_alat_pej_id = 1');
			$get_nama_panelpenilai1 = $this->db->get('tbl_urus_pej');
			
			return $get_nama_panelpenilai1->result();
		}
	
		function get_fax()
		{
			$this->db->where('kat_alat_pej_id = 2');
			$get_nama_panelpenilai1 = $this->db->get('tbl_urus_pej');
			
			return $get_nama_panelpenilai1->result();
		}
	
		function get_telefon()
		{
			$this->db->where('kat_alat_pej_id = 3');
			$get_nama_panelpenilai1 = $this->db->get('tbl_urus_pej');
			
			return $get_nama_panelpenilai1->result();
		}
    
		function get_komputer()
		{
			$this->db->where('kat_alat_kerja_id = 1');
			$get_nama_panelpenilai1 = $this->db->get('tbl_alat_kerja');

			return $get_nama_panelpenilai1->result();
		}
	
		function get_pemeriksaan()
		{
			$this->db->where('kat_alat_kerja_id = 2');
			$get_nama_panelpenilai1 = $this->db->get('tbl_alat_kerja');

			return $get_nama_panelpenilai1->result();
		}
	
		function get_kenderaan()
		{
			$this->db->where('kat_alat_kerja_id = 3');
			$get_nama_panelpenilai1 = $this->db->get('tbl_alat_kerja');

			return $get_nama_panelpenilai1->result();
		}
		
		function get_ppe()
		{
		
			$this->db->where('kat_alat_kerja_id = 4');
			$get_nama_panelpenilai1 = $this->db->get('tbl_alat_kerja');

			return $get_nama_panelpenilai1->result();
		}
		
		//action
		
		public function get_skop_from_segment2($idrekod,$skop_aktvt_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('*');
			$this->db->from('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c');
			$this->db->join('lkp_skop_aktvt','tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
			//$this->db->limit(11,6);
			$this->db->where('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c.'.$typePlan.'_id',$idrekod);
			$this->db->where('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c.skop_aktvt_id',$skop_aktvt_id);
				
			$query = $this->db->get();
		  
			$row = $query->result();
		  
			return $row;
		  
		}
		
		 function get_lkpskopbutiran_1($idrekod, $skop_aktvt_id, $typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			 
			$this->db->select('*');
			$this->db->from('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');
			$this->db->order_by($typePlan."_pata_".$fileIt."_1b_skop_pilihan_id ", "ASC");
			$this->db->join('lkp_skop_aktvt','tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.skop_aktvt_id = lkp_skop_aktvt.skop_aktvt_id');
			$this->db->like('skop_aktvt_kategori', 'butiran', 'after');
			$this->db->where('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan.'.$typePlan.'_id',$idrekod);
			$this->db->where('lkp_skop_aktvt.skop_aktvt_id', $skop_aktvt_id);

			$query = $this->db->get();

			$row = $query->result();
	  
			return $row;
		}
		
		function get_sumber_rancang($utiliti_sumber_man_id,$idrekod,$kat_sumber_man_id, $skop_aktvt_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('*');
			$this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
			$this->db->where('skop_aktvt_id', $skop_aktvt_id);
			$getUrusSya = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_sumber_man');
			
			return $getUrusSya->result();
		   
		}
		
		function get_total_rancang($utiliti_sumber_man_id,$idrekod,$kat_sumber_man_id, $skop_aktvt_id, $gaji_kos_flag,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('*');
			$this->db->where('utiliti_sumber_man_id', $utiliti_sumber_man_id);
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('kat_sumber_man_id', $kat_sumber_man_id);
			$this->db->where('skop_aktvt_id', $skop_aktvt_id);
			$this->db->where('gaji_kos_flag', $gaji_kos_flag);
			$getUrusSya = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_sumber_man');
			
			return $getUrusSya->result();
			
		}
  

		function get_total_pejabat($idrekod,$skop_aktvt_id,$urus_pej_id,$kat_alat_pej_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('skop_aktvt_id', $skop_aktvt_id);
			$this->db->where('urus_pej_id', $urus_pej_id);
			$this->db->where('kat_alat_pej_id', $kat_alat_pej_id);

			$getUrusSya = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_urus_pej');

			return $getUrusSya->result();
		}

		
		function get_total_peralatan($idrekod,$skop_aktvt_id,$alat_kerja_id,$kat_alat_kerja_id,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->where($typePlan.'_id', $idrekod);
			$this->db->where('skop_aktvt_id', $skop_aktvt_id);
			$this->db->where('alat_kerja_id', $alat_kerja_id);
			$this->db->where('kat_alat_kerja_id', $kat_alat_kerja_id);

			$getUrusSya = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_alat_kerja');

			return $getUrusSya->result();
		}
		
		/* POST ACTION */
		function count_data_in_tbl_1b1c($typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->select('*');
			$this->db->where($typePlan.'_id', $this->uri->segment(4));
			$this->db->where('skop_aktvt_id',$this->uri->segment(5));
			$getdata = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c');

			$rowcount = $getdata->num_rows();

			return  $rowcount;

		}
		
		function tambahskopaktiviti($typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$data = array($typePlan.'_id' => $this->input->post('rekodid'),
						'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
						$fileIt.'_1b1c_pihak_berkaitan' => $this->input->post('pihakkaitan'),        
						$fileIt.'_1b1c_tanggungjawab' => $this->input->post('tjawab'),
						$fileIt.'_1b1c_tarikh_mula' => $this->input->post('tarikh_mula'),
						$fileIt.'_1b1c_tarikh_tamat' => $this->input->post('tarikh_akhir'),
						'catatan' => $this->input->post('catatan'),
						'objek_sebagai_id' => $this->input->post('objek'),
						'bajet_aktvt' => $this->input->post('bajet_aktvt'),
						'sumber_id' => $this->input->post('sumber'),
						'output' => $this->input->post('output')
						);
			

			$this->db->insert('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c', $data);

		}
		
		function updateskopaktiviti($typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$data = array($fileIt.'_1b1c_pihak_berkaitan' => $this->input->post('pihakkaitan'),        
						$fileIt.'_1b1c_tanggungjawab' => $this->input->post('tjawab'),
						$fileIt.'_1b1c_tarikh_mula' => $this->input->post('tarikh_mula'),
						$fileIt.'_1b1c_tarikh_tamat' => $this->input->post('tarikh_akhir'),
						'catatan' => $this->input->post('catatan'),
						'objek_sebagai_id' => $this->input->post('objek'),
						'bajet_aktvt' => $this->input->post('bajet_aktvt'),
						'sumber_id' => $this->input->post('sumber'),
						'output' => $this->input->post('output')
						);

			$this->db->where($typePlan.'_id',$this->input->post('rekodid'));
			$this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
			$this->db->update('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c', $data);
		}
		
		function delete_urus_pej($funcname,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			if($funcname=='foto'){ $typefunc = 1; } 
			else if($funcname=='fax'){ $typefunc = 2; } 
			else if($funcname=='tel'){ $typefunc = 3; } 
		   
			$this->db->where('kat_alat_pej_id',$typefunc);
			$this->db->where($typePlan.'_id',$this->input->post('rekodid'));
			$this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
			$this->db->delete('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_urus_pej');	

		}
		
		function insert_urus_pej($funcname,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			if($funcname=='foto'){ $typefunc = 1; $boxname = 'foto'; } 
			else if($funcname=='fax'){ $typefunc = 2; $boxname = 'fax'; } 
			else if($funcname=='tel'){ $typefunc = 3; $boxname = 'tel'; }
			
			foreach ($this->input->post($boxname)as $loopBox)
			{
				$strcb=$loopBox;
				$strcb_length = intval(strlen($strcb));
				$strcb_find = intval(stripos($strcb,"cb"));
				$str_right_len= $strcb_length-($strcb_find+2);
				$strcb_new = substr($strcb,-$str_right_len);
				$strcb_id = substr($strcb,0,$strcb_find);
	

				$data= array($typePlan.'_id'=>$this->input->post('rekodid'),
							'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
							'urus_pej_id' => intval($strcb_id),
							'kat_alat_pej_id' => $typefunc,
							'kos_seunit' =>$strcb_new
							);

				$sumber = $this->db->insert('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_urus_pej', $data);
			}
		}
		
		function delete_alat_kerja($funcname,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			if($funcname=='kom'){ $typefunc = 1;}
			else if($funcname=='pem'){ $typefunc = 2;}
			else if($funcname=='ken'){ $typefunc = 3;}
			else if($funcname=='ppe'){ $typefunc = 4;}


			$this->db->where('kat_alat_kerja_id',$typefunc);
			$this->db->where($typePlan.'_id',$this->input->post('rekodid'));
			$this->db->where('skop_aktvt_id',$this->input->post('skop_aktvt_id'));
			$this->db->delete('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_alat_kerja');
		}


		function insert_alat_kerja($funcname,$typePlan)
		{

			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			if($funcname=='kom'){ $typefunc = 1; $boxname = 'kom'; }
			else if($funcname=='pem'){ $typefunc = 2; $boxname = 'pem'; }
			else if($funcname=='ken'){ $typefunc = 3; $boxname = 'ken'; }
			else if($funcname=='ppe'){ $typefunc = 4; $boxname = 'ppe';}
			

			foreach ($this->input->post($boxname)as $loopBox)
			{
				$strcb=$loopBox;
				$strcb_length = intval(strlen($strcb));
				$strcb_find = intval(stripos($strcb,"cb"));
				$str_right_len= $strcb_length-($strcb_find+2);
				$strcb_new = substr($strcb,-$str_right_len);
				$strcb_id = substr($strcb,0,$strcb_find);
				
			 
				$data= array( $typePlan.'_id'=>$this->input->post('rekodid'),
                              'skop_aktvt_id' => $this->input->post('skop_aktvt_id'),
                              'alat_kerja_id' => intval($strcb_id),
                              'kat_alat_kerja_id' => $typefunc,
                              'kos_seunit' =>$strcb_new
                    
                    );
        
                $sumber = $this->db->insert('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_alat_kerja', $data);
			}
		}
		
		
		function removesumberrancang($idsumber)
		{
			$typePlan='popa';
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}
			
			$this->db->where($typePlan."_pata_".$fileIt."_1b1c_sumber_man_id", $idsumber);
			$sumber = $this->db->delete("tbl_".$typePlan."_pata_".$fileIt."_1b1c_sumber_man");
			
		}
  
		function tambahsumberrancang($cat,$typePlan)
		{
			if($typePlan=='popa')
			{
				$fileIt = 'f7';
			}
			else if($typePlan=='pla')
			{
				$fileIt = 'f10';
			}
			else if($typePlan=='ppun')
			{
				$fileIt = 'f9';
			}

			if($cat=="rancang")
			{
				$value1 = $this->input->post('kat_sumber_man_id_rancang');
				$value2 = $this->input->post('utiliti_sumber_man_id_rancang');

				$index = $this->input->post('indexofrancang');
				//$flag = $index+1;
				$flag = $index;
				$gajikosflag = $this->input->post('kosflag'.$flag);
				$kosgaji = $this->input->post('gaji_rancang');
				$koskerjalebihmasa = $this->input->post('kos_rancang');

			}
			else if($cat=="lulus")
			{
				$value1 = $this->input->post('kat_sumber_man_id_lulus');
				$value2 = $this->input->post('utiliti_sumber_man_id_lulus');

				$index = $this->input->post('indexoflulus');
				//$flag = $index+1;
				$flag = $index;
				$gajikosflag = $this->input->post('kosflagl'.$flag);
				$kosgaji = $this->input->post('gaji_lulus');
				$koskerjalebihmasa = $this->input->post('kos_lulus');

			}
			else
			{
				$value1 = $this->input->post('kat_sumber_man_id_isi');
				$value2 = $this->input->post('utiliti_sumber_man_id_isi');

				$index = $this->input->post('indexofisi');
				//$flag = $index+1;
				$flag = $index;
				$gajikosflag = $this->input->post('kosflagi'.$flag);
				$kosgaji = $this->input->post('gaji_isi');
				$koskerjalebihmasa = $this->input->post('kos_isi');
			}


		$rekodid = $this->input->post('rekodid');

		$skopaktvtid = $this->input->post('skop_aktvt_id');

		$data = array($typePlan.'_id' => $rekodid,
					'gaji_kos_flag' => $gajikosflag,
					'skop_aktvt_id' => $skopaktvtid,
					'utiliti_sumber_man_id' =>$value2[$index],
					'kos_gaji' => $kosgaji[$index],
					'kos_kerja_lebih_masa' => $koskerjalebihmasa[$index],
					'kat_sumber_man_id' => $value1                     
					);

		$sumber = $this->db->insert('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b1c_sumber_man', $data);


		}
	}
?>