<?php
/*
	Author : Diana Ismail
	Description : Load all model for Copy Borang
	Date : 26/11/2013
*/
class Salinplan_model extends CI_Model {

  function checkrekodcopy($idrekod,$typerekod)
  {
	$this->db->where($typerekod.'_id', $idrekod);
    $getdata = $this->db->get('tbl_'.$typerekod);
        
	$rowcount = $getdata->num_rows();
    return  $rowcount;
  }
  
  function set_copy_rekod($idrekod,$typerekod)
  {
	$keterangan="";
	if($typerekod=='ptra')
	{
		$fileIt = "f6";
	}
	else if($typerekod=='popa')
	{
		$fileIt = "f7";
	}
	else if($typerekod=='pnpa')
	{
		$fileIt = "f8";
		$keterangan = ",keterangan";
	}
	else if($typerekod=='ppun')
	{
		$fileIt = "f9";
	}
	else if($typerekod=='pla')
	{
		$fileIt = "f10";
	}
	else
	{
		return false;
	}
	
	
		$existingID = $idrekod;
/*tbl_pnpa*/
		$this->db->select('idkem,idjab_agensi,idnegeri,iddaerah,pspa_id,'.$typerekod.'_sedia_oleh_id,'.$typerekod.'_tarikh_sedia,'.$typerekod.'_sah_oleh_id,'.$typerekod.'_tarikh_sah,'.$typerekod.'_lulus_oleh_id,'.$typerekod.'_tarikh_lulus');
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod);
		$dataArray = $select->result_array();
		
		//get data
		foreach($dataArray as $getFirst=>$valueFirst){ 
		foreach($valueFirst as $getdata=>$values){
				$data[$getdata] = $values; 	}}
		
		//remove first element - id table
		//$dataRemove = array_shift($data);
		
		//insert inta origin table
		if($select->num_rows())
		{
			$insert = $this->db->insert('tbl_'.$typerekod, $data);
		}
				
		//generated id
		$newID= $this->db->insert_id();
		
/*tbl_kandungan*/
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->select('kump_kand_id,kand_utama,kand_utama_bil,kand_utama_detail,node_type,kand_type,kand_form');
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_kandungan');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		foreach($valueFirst as $getdata=>$values){
				$data[$getFirst][$getdata] = $values; }
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_kandungan', $data);
		}
		
/* tbl_pnpa_pata_f8_1a_modelstruktur */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->select('myspata_userid,utiliti_sumber_man_id,kump_pengguna_id');
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1a_modelstruktur');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		foreach($valueFirst as $getdata=>$values){
				$data[$getFirst][$getdata] = $values; }
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_'.$typerekod.'_pata_'.$fileIt.'_1a_modelstruktur', $data);
		}
	

/* tbl_pnpa_pata_f8_1a_panel_penilai */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->select('nama_penilai,nama_syarikat,panel_penilai_kategori_id,email,no_tel_pej,no_tel_bimbit,jawatan,surat_lantikan,utiliti_sumber_man_id');
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1a_panel_penilai');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		foreach($valueFirst as $getdata=>$values){
				$data[$getFirst][$getdata] = $values; }
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_'.$typerekod.'_pata_'.$fileIt.'_1a_panel_penilai', $data);
		}
		
/* tbl_pnpa_pata_f8_1a_pelan_kom */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->select('tugas_pegawai_atasan,tugas_pegawai_tjawab_kuasa,tugas_pegawai_lain');
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1a_pelan_kom');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		foreach($valueFirst as $getdata=>$values){
				$data[$getdata] = $values; }
				$data[$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert('tbl_'.$typerekod.'_pata_'.$fileIt.'_1a_pelan_kom', $data);
		}
		
/* tbl_pnpa_pata_f8_1b_skop_pilihan */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->select('skop_aktvt_id'.$keterangan);
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b_skop_pilihan');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		foreach($valueFirst as $getdata=>$values){
				$data[$getFirst][$getdata] = $values; }
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b_skop_pilihan', $data);
		}

/* tbl_pnpa_pata_f8_1b1c */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b1c');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		$count=0;
		foreach($valueFirst as $getdata=>$values){
			if($count>1){$data[$getFirst][$getdata] = $values; }
			$count++;
		}
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b1c', $data);
		}

/* tbl_pnpa_pata_f8_1b1c_sumber_man */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b1c_sumber_man');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		$count=0;
		foreach($valueFirst as $getdata=>$values){
			if($count>1){$data[$getFirst][$getdata] = $values; }
			$count++;
		}
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b1c_sumber_man', $data);
		}
		
/* tbl_pnpa_pata_f8_1b1c_urus_pej */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b1c_urus_pej');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		$count=0;
		foreach($valueFirst as $getdata=>$values){
			if($count>1){$data[$getFirst][$getdata] = $values; }
			$count++;
		}
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b1c_urus_pej', $data);
		}
		
/* tbl_pnpa_pata_f8_1b1c_alat_kerja */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b1c_alat_kerja');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		$count=0;
		foreach($valueFirst as $getdata=>$values){
			if($count>1){$data[$getFirst][$getdata] = $values; }
			$count++;
		}
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_'.$typerekod.'_pata_'.$fileIt.'_1b1c_alat_kerja', $data);
		}
	
/* tbl_pnpa_pata_f8_1d */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_'.$typerekod.'_pata_'.$fileIt.'_1d');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		$count=0;
		foreach($valueFirst as $getdata=>$values){
			if($count>1){$data[$getFirst][$getdata] = $values; }
			$count++;
		}
				$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_'.$typerekod.'_pata_'.$fileIt.'_1d', $data);
		}

/* tbl_lampiran */
		//clear existing array
		unset($dataArray);
		unset($data);
		
		$this->db->select('nama_fail,nama_fail_asal,lokasi_fail,jenis_fail,tarikh_upload,kandungan_id,lamp_page_sumber_kategori_id,lamp_page_sumber_kategori');
		$this->db->where($typerekod.'_id', $existingID);
		$select = $this->db->get('tbl_lampiran');
		$dataArray = $select->result_array();
				
		foreach($dataArray as $getFirst=>$valueFirst){ 
		foreach($valueFirst as $getdata=>$values){
			$data[$getFirst][$getdata] = $values;}
			$data[$getFirst][$typerekod.'_id'] = $newID;
		}
		
		if($select->num_rows())
		{
			$insert = $this->db->insert_batch('tbl_lampiran', $data);
		}
		
	
  }
  
  //added : diana 25/11/13 
  function updateborang_copy($typeplan)
    {

        $sessionarray = $this->session->all_userdata();

        $data = array('tahun' => $this->input->post('tahun'),       
                      'idpremis_kategori' => $this->input->post('premis'),
                      'nama_premis' => $this->input->post('namapremis'),
                      'nodpa' => $this->input->post('nodpa') 
				);
        
		//if($typeplan=='pnpa')
		///{
			$this->db->where($typeplan.'_id', $this->input->post('edit'));
			$sumber = $this->db->update('tbl_'.$typeplan, $data);
		//}
		
		if($sumber)
        {
            $dataLog = array('myspata_userid' => $sessionarray['user_id'],
                             'aktvt' => 'Kemaskini maklumat kandungan PNPA - salinan',
                             'masa_aktvt' => date('Y-m-d H:m:s'),
                             'modul' => 'Kandungan PNPA');
            
            $this->db->insert('tbl_aktvt_log', $dataLog);
            return true;
        }
        else
        {
            return false;
        } 
		
		
	}
	//end of salinplan
}
?>