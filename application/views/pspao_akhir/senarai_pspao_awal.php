    <!--breadcrumb-->
    <div class="widget-body">
                  <ul class="breadcrumb-beauty">
                    <li>
                      <a href="<?php echo site_url('main')?>">
                        Fungsi
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        Perancangan
                      </a>  
                    </li>
                    <li>
                      <a href="#">
                        Permintaan Penyediaan
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        Senarai Template PSPA(O) Awal
                      </a>   
                    </li>
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  


<div class="widget-body">
         
          
           <!--ul class="nav nav-tabs no-margin myTabBeauty">
                     <li class="active"><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ptf_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ptf_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ptf_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ptf_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ptf_pla')?>">PLA</a></li>
                  </ul-->
    
    
    <!--div class="tab-content" id="myTabContent">
                 <div id="pspao" class="tab-pane fade active in"-->

  
                    <?php //echo validation_errors(); ?>
                 
                    <?php 

                  $mu = $this->aauth->get_session('menu');

                  //echo "mu gak eh = ".$mu[2]['menu_cipta[2]'];
				  	?>



    <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Senarai Template PSPA(O) Awal
                  

                  </div>
                  
                </div>
                
              
                
              <div class="widget-body">
              <div class="row-fluid">
<?php /*
                   <ul class="icomoon-icons-container">
                      <?php 

                           if(($mu[2]['menu_cipta[2]'])==1){ ?>

                         <a href="<?php echo site_url('pspao/pspao_akhir_baru') ?>"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li>
                  </ul><label class="tambah">Tambah PSPA(O) Baru</label></a>
                          <?php
                          }
					  ?>
*/ ?>                   
                   
                  </div>
                  
                   <div id="dt_example" class="example_alt_pagination">   
                
                     <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                    <thead>
                      <tr>
                        <th style="width:5%">Bil</th>
                        <th style="width:15%">Tempoh Mula</th>
                        <th style="width:15%">Tempoh Hingga</th>
                        <th style="width:15%">Kementerian</th>
                        <th style="width:25%">Pemilik Dokumen</th>
                        <th style="width:15%">Status</th>
                        <th style="width:25%">Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; if(!empty($result)) : foreach ($result as $rec) : ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $rec->tahun_mula; ?></td>
                        <td><?php echo $rec->tahun_akhir; ?></td>
                        <td> <?php  
                        if($get_kemname = $this->pspao_akhir_model->get_kementerian_name($rec->idkem)) 
                        
                          echo $get_kemname; 

                          ?></td>
                        <td><?php if($get_namapemilikdoc = $this->pspao_akhir_model->get_nama_pemilik_doc($rec->pspa_sedia_oleh_id)) 
                         foreach ($get_namapemilikdoc as $row) 
                          echo $row->nama_user;  ?></td>
                        <td><span class="badge badge-info">

                          <?php

                              $get_status = $this->function_model->get_status_pelan($rec->pspa_awal_id,0,1); 
                          
                            echo $get_status;

                            ?>
                        </span></td>
                        <td>


                          <ul class="icomoon-icons-container">

                          <a href="<?php echo site_url('pspao/pspao_akhir_baru/0/'.$rec->pspa_awal_id.'/'.$this->uri->segment(3)) ?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                        
                          
                        </ul></td>
                      </tr>
                      <?php endforeach; ?>
                            <?php endif; ?>
                    </tbody>
                  </table>


                    
                  <div class="clearfix"> </div>
         
              
                
          
              </div>
            </div>

          </div>
 <?php  echo form_close();?>

        </div>
	  </div>
        
    </div>