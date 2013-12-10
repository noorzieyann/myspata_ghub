<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Ppun_model extends CI_Model {
    
  
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
   
   function get_premis()  //dapatkan list jabatan
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
 
   function get_negeri()  //dapatkan list negeri
 {
   $this->db->select('idnegeri, namanegeri');
   $this->db->order_by("namanegeri", "ASC");
   $query = $this->db->get('lkp_negeri');
  

   $negeri = array();
  
   
   if($query->result())
   {
       
          $negeri[''] = '- Pilih Negeri -';    // default selection item
          foreach ($query->result() as $nege) 
           {
              $negeri[$nege->idnegeri] = $nege->namanegeri;
              
           }
      return $negeri;
     
    }
   }

   function get_negara()  //dapatkan list negara
 {
   $this->db->select('idnegara, fld_negara');
   $this->db->order_by("fld_negara", "ASC");
   $query = $this->db->get('lkp_negara');
  

   $negara = array();
  
   
   if($query->result())
   {
       
          $negara[''] = '- Pilih Negara -';    // default selection item
          foreach ($query->result() as $nega) 
           {
              $negara[$nega->idnegara] = $nega->fld_negara;
              
           }
      return $negara;
     
    }
   } 
    
    
    function get_senarai_ptf()
    {
          
                     
              $data_1 =   array(
                        array('1','PPUN000001','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                            <a href="'.site_url('ppun/summary_pp_ppun').'"> <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true" id="salinpp"></span></li>
                         
                              </ul>'
                            ),
                        array('2','PPUN000002','2013','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                             <a href="'.site_url('ppun/summary_ptf_ppun').'"> <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                             <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true" id="salinptf"></span></li>
                             </ul>'
                            ),
                        array('3','PPUN000003','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/summary_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true" id="salinppd"></span></li>
                                 </ul>'
                            
                            ),
                        array('4','PPUN000004','2007','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                             <a href="'.site_url('ppun/summary_ptf_ppun').'">   <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                              <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         
                        </ul>'),
                        array('5','PPUN000005','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                            <a href="'.site_url('ppun/summary_ptf_ppun').'">    <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         
                            </ul>
                     '),
                        array('6','PPUN000006','2010','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                           <a href="'.site_url('ppun/summary_ptf_ppun').'">     <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                              <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         </ul>
                     '),
                        array('7','PPUN000007','2009','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                             <a href="'.site_url('ppun/summary_ptf_ppun').'">   <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                                 <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                       

                            </ul>
                     '),
                        array('8','PPUN000008','2017','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                         <a href="'.site_url('ppun/summary_ptf_ppun').'">       <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                           </ul>
                     '),
                        array('9','PPUN000009','2016','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/summary_ptf_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                        
                        </ul>
                     '),
                        array('10','PPUN000010','2014','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                            <a href="'.site_url('ppun/summary_ptf_ppun').'">    <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                           </ul>
                     '),
                        array('11','PPUN000011','2019','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                          <a href="'.site_url('ppun/summary_ptf_ppun').'">      <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                           </ul>
                     '),
                        array('12','PPUN000012','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                           <a href="'.site_url('ppun/summary_ptf_ppun').'">     <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                            </ul>
                     '),
                        array('13','PPUN000013','2025','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                        <a href="'.site_url('ppun/summary_ptf_ppun').'">        <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         </ul>
                     '),
                        array('14','PPUN000014','2022','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                            <a href="'.site_url('ppun/summary_ptf_ppun').'">    <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                         </ul>
                     '),
                        array('15','PPUN000015','2020','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                            <a href="'.site_url('ppun/summary_ptf_ppun').'">    <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                               <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                    </ul>
                     '),
                
                
                
                       );
              
              return $data_1;
    }
    
    
    
    function get_senarai_pp()
    {
        
                  $data_1 =   array(
                        array('1','PPUN000001','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                          <a href="'.site_url('ppun/senarai_pp_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                           
                              </ul>'
                            ),
                        array('2','PPUN000002','2013','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                          <a href="'.site_url('ppun/senarai_pp_ppun').'">   <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            </ul>'
                            ),
                        array('3','PPUN000003','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_pp_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                  </ul>'
                            
                            ),
                        array('4','PPUN000004','2007','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_pp_ppun').'">   <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                             
                        </ul>'),
                        array('5','PPUN000005','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                            <a href="'.site_url('ppun/senarai_pp_ppun').'">     <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                              
                            </ul>
                     '),
                        array('6','PPUN000006','2010','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_pp_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                               </ul>
                     '),
                        array('7','PPUN000007','2009','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_pp_ppun').'">   <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                              

                            </ul>
                     '),
                        array('8','PPUN000008','2017','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <a href="'.site_url('ppun/senarai_pp_ppun').'"> <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                </ul>
                     '),
                        array('9','PPUN000009','2016','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                             
                        </ul>
                     '),
                        array('10','PPUN000010','2014','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                             <a href="'.site_url('ppun/senarai_pp_ppun').'">    <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                  </ul>
                     '),
                        array('11','PPUN000011','2019','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_pp_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                               </ul>
                     '),
                        array('12','PPUN000012','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_pp_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                             </ul>
                     '),
                        array('13','PPUN000013','2025','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_pp_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                             </ul>
                     '),
                        array('14','PPUN000014','2022','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_pp_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                             </ul>
                     '),
                        array('15','PPUN000015','2020','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_pp_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                   </ul>
                     '),
                
                
                
                       );
                  
                  return $data_1;
    }
	
	
	
	
    function get_senarai_ppd()
    {
        
                  $data_1 =   array(
                        array('1','PPUN000001','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-warning">Semak</span>',
                            '<ul class="icomoon-icons-container">
                           <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                           
                              </ul>'
                            ),
                        array('2','PPUN000002','2013','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                           <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                            </ul>'
                            ),
                        array('3','PPUN000003','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                             <a href="'.site_url('ppun/senarai_ppd_ppun').'">   <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                  </ul>'
                            
                            ),
                        array('4','PPUN000004','2007','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                             
                        </ul>'),
                        array('5','PPUN000005','2005','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                             <a href="'.site_url('ppun/senarai_ppd_ppun').'">   <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                              
                            </ul>
                     '),
                        array('6','PPUN000006','2010','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                               </ul>
                     '),
                        array('7','PPUN000007','2009','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                              

                            </ul>
                     '),
                        array('8','PPUN000008','2017','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                                </ul>
                     '),
                        array('9','PPUN000009','2016','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                             
                        </ul>
                     '),
                        array('10','PPUN000010','2014','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                  </ul>
                     '),
                        array('11','PPUN000011','2019','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                               </ul>
                     '),
                        array('12','PPUN000012','2018','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_ppd_ppun').'"> <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                             </ul>
                     '),
                        array('13','PPUN000013','2025','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-inverse">Pembetulan</span>',
                            '<ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li>
                             </ul>
                     '),
                        array('14','PPUN000014','2022','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge">Deraf</span>',
                            '<ul class="icomoon-icons-container">
                               <a href="'.site_url('ppun/senarai_ppd_ppun').'"> <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                             </ul>
                     '),
                        array('15','PPUN000015','2020','Kementerian Kerja Raya','Jabatan Kerja Raya','Sekolah Kebangsaan Seksyen 2','1105101MYS.101200.BE001','<span class="badge badge-info">Sah</span>',
                            '<ul class="icomoon-icons-container">
                              <a href="'.site_url('ppun/senarai_ppd_ppun').'">  <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span>
                                </li></a>
                                   </ul>
                     '),
                
                
                
                       );
                  
                  return $data_1;
    }
	
	
	
	
	function get_dokumen_rujukan(){
		
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
					   
                 return   $data_1;
		
	}
    
	
	function get_arahan_sedia_ppun(){
		
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
					   return $data_1;
	}
}
?>
