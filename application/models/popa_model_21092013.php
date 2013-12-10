<?php

class Popa_model extends CI_model 
{
    function get_entries($per_page)
    {
        $query = $this->db->get('tbl_popa');	
        $this->db->select('popa_id, tahun, idkem, idjab_agensi, iddaerah, idpremis_kategori, nodpa');
	    $query = $this->db->get('tbl_popa', $per_page, $this->uri->segment(3));
        
        return $query;
    }
    
    
    
    function get_kontraktor($per_page)
    {
        $this->db->select('popa_pata_f7_1a_kontraktor_fasiliti_id, nama_kontraktor_fasiliti, kontraktor_fasiliti_kategori_id, popa_id, email, no_tel_pej, no_tel_bimbit');
	    $query = $this->db->get('tbl_popa_pata_f7_1a_kontraktor_fasiliti', $per_page, $this->uri->segment(3));
        
        return $query;
    }
    
    
    
    function get_kementerian()  //dapatkan list kementerian
    {
        $this->db->select('idkem, namakem');
        $this->db->order_by("namakem", "ASC");
        $query = $this->db->get('lkp_kementerian');
            
        $kementerian = array();
   
        if($query->result())
        {
            $kementerian[''] = '- Pilih Kementerian -';    // default selection item
            foreach ($query->result() as $kem) 
            {
                $kementerian[$kem->idkem] = $kem->namakem;
            }
        
            return $kementerian;
        }
   } 
    
  
   
    function get_jabatan()  //dapatkan list jabatan
    {
        $this->db->select('idjab_agensi_myspata1, nama_jab_agensi');
        $this->db->order_by('nama_jab_agensi', 'ASC');
        $query = $this->db->get('lkp_jab_agensi');
   
        $jabatan = array();
 
        if($query->result())
        {
            $jabatan[''] = '- Pilih Jabatan/Agensi -';    // default selection item
            foreach ($query->result() as $jab) 
            {
                $jabatan[$jab->idjab_agensi_myspata1] = $jab->nama_jab_agensi;
            }
      
            return $jabatan;
     
        }
    }  
    
    
    
    function get_premis()  //dapatkan list premis
    {
        $this->db->select('idpremis_kategori, jenis_premis');
        $this->db->order_by("jenis_premis", "ASC");
        $query = $this->db->get('lkp_premis_kategori');
  
        $premis = array();
  
        if($query->result())
        {
            $premis[''] = '- Pilih Premis -';    // default selection item
            foreach ($query->result() as $prem) 
            {
                $premis[$prem->idpremis_kategori] = $prem->jenis_premis;
            }
            
            return $premis;
        }
    }   
    
    
    
    
    function get_negeri()  //dapatkan list negeri
    {
        $this->db->select('idnegeri, namanegeri');
        $this->db->order_by("namanegeri", "ASC");
        $query = $this->db->get('lkp_negeri');
  
        $negeri = array();
  
        if($query->result())
        {
            $negeri[''] = '- Pilih Negeri -';    // default selection item
            foreach ($query->result() as $neg) 
            {
                $negeri[$neg->idnegeri] = $neg->namanegeri;
            }
            
            return $negeri;
        }
    }  
    
    
    
    
    function get_kategori()  //dapatkan list kategori
    {
        $this->db->select('kontraktor_fasiliti_kategori, kategori');
        $this->db->order_by("kategori", "ASC");
        $query = $this->db->get('lkp_kontraktor_fasiliti_kategori');
  
        $kategori = array();
  
        if($query->result())
        {
            $kategori[''] = '- Pilih Kategori -';    // default selection item
            foreach ($query->result() as $kat) 
            {
               $kategori[$kat->kontraktor_fasiliti_kategori] = $kat->kategori;
            }
            
            return $kategori;
       }
    }  
    
    
    
    function get_objeksebagai()  //dapatkan list objek sebagai
    {
        $this->db->select('objek_sebagai_id, objek_sebagai_teks ');
        $this->db->order_by("objek_sebagai_teks", "ASC");
        $query = $this->db->get('lkp_objek_sebagai');
  
        $objeksebagai = array();
  
        if($query->result())
        {
            $objeksebagai[''] = '- Pilih Objek Sebagai -';    // default selection item
            foreach ($query->result() as $obj) 
            {
               $objeksebagai[$obj->objek_sebagai_id] = $obj->objek_sebagai_teks;
            }
            
            return $objeksebagai;
       }
    }  
    
    
    
    function get_sumber()  //dapatkan list objek sebagai
    {
        $this->db->select('sumber_id, sumber');
        $this->db->order_by("sumber", "ASC");
        $query = $this->db->get('lkp_sumber');
  
        $sumber = array();
  
        if($query->result())
        {
            $sumber[''] = '- Pilih Sumber -';    // default selection item
            foreach ($query->result() as $sum) 
            {
               $sumber[$sum->sumber_id] = $sum->sumber;
            }
            
            return $sumber;
       }
    }  
    
    
    
    function get_status()  //dapatkan list status
    {
        $this->db->select('sumber_id, sumber');
        $this->db->order_by("sumber", "ASC");
        $query = $this->db->get('lkp_sumber');
  
        $sumber = array();
  
        if($query->result())
        {
            $sumber[''] = '- Pilih Status -';    // default selection item
            foreach ($query->result() as $sum) 
            {
               $sumber[$sum->sumber_id] = $sum->sumber;
            }
            
            return $sumber;
       }
    } 



    function get_daerah()  //dapatkan list daerah
    {
        $this->db->select('iddaerah, nama_daerah');
        $this->db->order_by("nama_daerah", "ASC");
        $query = $this->db->get('lkp_daerah');
  
        $daerah = array();
  
        if($query->result())
        {
          $daerah[''] = '- Pilih Daerah -';    // default selection item
          foreach ($query->result() as $dae) 
           {
              $daerah[$dae->iddaerah] = $dae->nama_daerah;
              
           }
        return $daerah;
        }
    } 



    function get_senarai_popa()
    {
        $getSenaraiPopa = $this->db->get('tbl_popa');
        
        return $getSenaraiPopa->result();
    }



    function get_kem_list($idkem) //dapatkan list kementerian
    {
        $this->db->select('namakem');
        $this->db->where('idkem', $idkem);
        $getKemList = $this->db->get('lkp_kementerian');

        return $getKemList->result();
    }



    function get_jab_list($idjab_agensi) //dapatkan list jabatan
    {
        $this->db->select('nama_jab_agensi');
        $this->db->where('idjab_agensi', $idjab_agensi);
        $getJabList = $this->db->get('lkp_jab_agensi');

        return $getJabList->result();
    }



    function get_prem_list($idpremis_kategori) //dapatkan list premis
    {
        $this->db->select('jenis_premis');
        $this->db->where('idpremis_kategori', $idpremis_kategori);
        $getPremList = $this->db->get('lkp_premis_kategori');

        return $getPremList->result();
    }



    function get_stat_list($pspa_id) //dapatkan list status
    {
        $this->db->select('status_id');
        //$this->db->join('tbl_statuslog as L', 'P.pspa_id = L.pspa_id');
        $this->db->where('statuslog_id', $pspa_id);
        $getStatList = $this->db->get('tbl_statuslog');

        return $getStatList->result();
    }



    function get_senarai_kont_fas()  //dapatkan senarai kontraktor fasiliti
    {
        $getSenaraiKonFas = $this->db->get('tbl_popa_pata_f7_1a_kontraktor_fasiliti');
        
        return $getSenaraiKonFas->result();
    }



    function get_kont_list($kontraktor_fasiliti_kategori) //dapatkan kategori kontraktor fasiliti
    {
        $this->db->select('kategori');
        $this->db->where('kontraktor_fasiliti_kategori', $kontraktor_fasiliti_kategori);
        $getKontList = $this->db->get('lkp_kontraktor_fasiliti_kategori');

        return $getKontList->result();
    }



    function get_senarai_kawalan_rekod() //dapatkan senarai kawalan rekod
    {
        $getSenaraiKawalan = $this->db->get('tbl_popa_pata_f7_1d');

        return $getSenaraiKawalan->result();
    } 



    function get_senarai_dokumen() //dapatkan senarai dokumen rujukan
    {
        $getSenaraiDokumen = $this->db->get('tbl_lampiran');

        return $getSenaraiDokumen->result();
    }  



    
}