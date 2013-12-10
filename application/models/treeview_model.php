<?php
class Treeview_model extends CI_Model {

	//view   
    function getcountlkpskopaktvt($typePlan){

		$this->db->select('*');
		$this->db->where('kand_kump_kod', $typePlan);
		$query = $this->db->get('lkp_skop_aktvt');
	  
		$rowcount = $query->num_rows();

		return $rowcount;

    }
    
    
    function get_butiran($skop_aktvt_id)
    {
        //$this->db->select('skop_aktvt_tajuk');
       //$this->db->where('skop_aktvt_sort','skop_aktvt_id');
        $this->db->where('skop_aktvt_sort', $skop_aktvt_id);
         $this->db->where('skop_node_type =1' );
       //$this->db->having('skop_aktvt_sort' ,1, FALSE);
        $this->db->like('skop_aktvt_kategori', 'butiran', 'after');
        $get_skopAkt1 = $this->db->get('lkp_skop_aktvt');
        
        return $get_skopAkt1->result();
    }
    
 
    
     
    
    
    
    
   
     function get_lkpskopAkt($skop_aktvt_id)
    {
        $this->db->select('skop_aktvt_tajuk');
        $this->db->like('skop_aktvt_kategori', 'aktiviti', 'after');
        $this->db->where('skop_aktvt_id',$skop_aktvt_id);
         
        $getKem = $this->db->get('lkp_skop_aktvt');
        
        return $getKem->result();
	}
	
######################################################


	 function get_aktiviti($skop_aktvt_id,$typePlan)
    {
        //$this->db->select('skop_aktvt_tajuk');
       //$this->db->where('skop_aktvt_sort','skop_aktvt_id');
        $this->db->where('skop_aktvt_sort', $skop_aktvt_id);
         $this->db->where('skop_node_type =1' );
       //$this->db->having('skop_aktvt_sort' ,1, FALSE);
        $this->db->like('skop_aktvt_kategori', 'aktiviti', 'after');
        $get_skopAkt1 = $this->db->get('lkp_skop_aktvt');
        
        return $get_skopAkt1->result();
    }
       
       
    function get_allskop($typePlan)
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
		
        $query = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');
        
        $row = $query->result();
	
		return $row;
    }
	
	//both view - treeview & skopaktiviti
	function get_skop($typePlan)
    {		
        //$this->db->select('skop_aktvt_tajuk');
        //$this->db->where('skop_aktvt_id',$skop_aktvt_id);
        $this->db->like('skop_aktvt_kategori', 'skop', 'both');
        $this->db->like('kand_kump_kod', $typePlan);
        $query = $this->db->get('lkp_skop_aktvt');
        
        return $query->result();
    }
   
   //view
	function get_count_pelan_pilih($skop_aktvt_id,$typePlan)
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
		$this->db->where('skop_aktvt_id',$skop_aktvt_id);
		$this->db->where($typePlan.'_id',$this->uri->segment(4));
		$query = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');

		return $query->result();

    }
   
    function skop_pilihan_id($typePlan)
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

		//$this->db->select($typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan_id');
		$this->db->where($typePlan.'_id',$this->uri->segment(4));
		$query = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');

		return $query->result();

    }   
    
    function skop_aktvt_id_in_db($typePlan)
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
		
		$this->db->select('skop_aktvt_id');
		$this->db->where($typePlan.'_id',$this->uri->segment(4));
		$query = $this->db->get('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');

		return $query->result();

    }
	
	//just for pla
	function get_pelupusan()
	{
		//$this->db->where($typePlan.'_id',$this->uri->segment(4));
		$query = $this->db->get('lkp_kaedah_pelupusan');

		return $query->result();
	}
	
	//pla
	function check_skop_parent_or_child($skopid){
   
     $this->db->select('*');
     $this->db->where('skop_aktvt_id',$skopid);
     $this->db->where('skop_node_type',0);
     $query = $this->db->get('lkp_skop_aktvt');
  
      $rowcount = $query->num_rows();

       return $rowcount;
    }
    
    function get_check_skopid_exist_or_not($skop_aktvt_id){

     $this->db->select('*');
     $this->db->where('skop_aktvt_id',$skop_aktvt_id);
     $this->db->where('pla_id',$this->uri->segment(4));
     $query = $this->db->get('tbl_pla_pata_f10_1b_skop_pilihan');
  
     $rowcount = $query->num_rows();

     return $rowcount;
 
    }
	
	//IU for treeview
	
	function tambahtreeview($typePlan)
	{
		if($typePlan=='popa')
		{
			$fileIt = 'f7';
		}
		else if($typePlan=='ppun')
		{
			$fileIt = 'f9';
		}
		
		if($typePlan=='pla')
		{
			$fileIt = 'f10';
			
			//ada tambahan kaedah pelupusan & catatan
			
			$lupus = $this->input->post('lupus');
			
			$input1 = $this->input->post('skop');

			$data3 = array();
	  
			for($i=0;$i<count($input1);$i++)
			{
				$data3[$i]['skop_aktvt_id'] = $input1[$i];
				$data3[$i][$typePlan.'_id'] = $this->uri->segment(4);
				$data3[$i]['kaedah_pelupusan_id'] = $lupus;
				
				$t = $this->check_skop_parent_or_child($input1[$i]);

				if($t > 0)
				{ 
					$data3[$i]['catatan'] = $this->input->post('nyata'.$input1[$i]); 
				}
				else
				{ 
					$data3[$i]['catatan'] ='';
				}
			}
		}
		else
		{
			$input1 = $this->input->post('skop');
			$data3 = array();
	  
			for($i=0;$i<count($input1);$i++)
			{
				$data3[$i]['skop_aktvt_id'] = $input1[$i];
				$data3[$i][$typePlan.'_id'] = $this->uri->segment(4);
			}
		}
		
		$sumber = $this->db->insert_batch('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan', $data3);
  
    
		if($sumber)
        {
            $dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
                             'aktvt' => 'Tambah maklumat treeview '.$typePlan,
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'treeview'.$typePlan);
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
    }
    


    function updatetreeview($typePlan)
	{
		if($typePlan=='popa')
		{
			$fileIt = 'f7';
		}
		else if($typePlan=='pla')
		{
			$fileIt = 'f10';
			//ada tambahan kaedah pelupusan & catatan
			$lupus = $this->input->post('lupus');
			//$catatan = $this->input->post('nyata');
		}
		else if($typePlan=='ppun')
		{
			$fileIt = 'f9';
		}
		
		
		$skop = $this->input->post('skop'); //skop aktiviti id yg di pilih

		$skop_pilih_id = $this->input->post('skop_pilihan_id'); //id skop pilihan in db
		
		$skop_aktvt_id_in_db = $this->input->post('skop_aktvt_id_in_db'); //skop aktiviti id dlm db
		
		$idPlan = $this->uri->segment(4);


		if($idPlan<>0){
	
		$this->db->where_in($typePlan.'_id',$idPlan);
		$run = $this->db->delete('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan');
		
		if($run)
		{
			$input1 = $this->input->post('skop');
			$data3 = array();
  

			for($i=0;$i<count($input1);$i++)
			{
				$data3[$i]['skop_aktvt_id'] = $input1[$i];
				$data3[$i][$typePlan.'_id'] = $this->uri->segment(4);
				
				if($typePlan=='pla')
				{
					$data3[$i]['kaedah_pelupusan_id'] = $lupus;
					
					$t = $this->check_skop_parent_or_child($input1[$i]);

					if($t > 0)
					{ 
						$data3[$i]['catatan'] = $this->input->post('nyata'.$input1[$i]); 
					}
					else
					{ 
						$data3[$i]['catatan'] ='';
					}
				}
			}
		 
			$sumber = $this->db->insert_batch('tbl_'.$typePlan.'_pata_'.$fileIt.'_1b_skop_pilihan', $data3);
	  
		
			if($sumber)
			{
				$dataLog = array('myspata_userid' => $this->session->userdata('user_id'),
								 'aktvt' => 'Kemaskini maklumat treeview '.$typePlan,
								 'masa_aktvt' => date('Y-m-d H:m:s'),
								 'modul' => 'treeview'.$typePlan);
				
				$this->db->insert('tbl_aktvt_log', $dataLog);
				return true;
			}
			else
			{
				return false;
			} 
			
		}
	}
	}
}
?>