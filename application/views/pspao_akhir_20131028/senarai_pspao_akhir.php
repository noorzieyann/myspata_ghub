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
                        Senarai PSPA(O) Awal
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

                       $attributes = array(
                           'class' => 'form-horizontal no-margin', 
                           'name'  => 'senarai_ptf_pspao',
                           'id'    => 'senarai_ptf_pspao',
                        );
                    echo form_open('pspao_awal/senarai_pspao_baru',$attributes); ?>

<!--div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Strategi Pengurusan  Aset PSPA(O) Awal
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
               
                      <div class="control-group">
                      <label class="control-label" for="DateOfBirthMonth">
                        Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                       
                    <?php echo form_error('tarikh_mula'); 
                   
                    ?> 

                          <?php echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"','class="span4 input-left-top-margins"')?>

                   
                       
                      </div>
                      </div>

                  <div class="control-group">
                      <label class="control-label" for="DateOfBirthMonth">
                        Tempoh Akhir
                      </label>
                      <div class="controls controls-row">
                       
                   <?php echo form_error('tarikh_akhir'); ?> 

                          <?php echo form_dropdown('tempoh_akhir', $year_list, 'id="tempoh_mula"','class="span4 input-left-top-margins"')?>

                   

                      </div>
                      </div>
                  
                      <div class="control-group">
                      <label class="control-label" for="email1">
                        Kementerian
                      </label>
                      <div class="controls">
                            <?php echo form_error('kementerian'); ?>
                         <?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  'Masukkan Kementerian',
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
                    
                     <div class="control-group">
                      <label class="control-label">
                        Status
                      </label>
                      <div class="controls">
                          <?php echo form_error('status'); ?> 
                         <?php $options = array(
                                ''  => '- Pilih Status -',
                                'sah'  => 'Sah',
                                'pembetulan'    => 'Pembetulan',
                                'deraf'   => 'Deraf',
                               
                              );

                          

                                echo form_dropdown('status', $options);

                                ?>
                       
                      </div>
                    </div>
                    
                    <div class="control-group ">
                   
                        <?php
                            $search = array(
                                'name'    => 'carian',
                                'id'      => 'carian',
                                'class'   => 'icomoon-icons-container pull-right rounded',
                                'value'   => '',
                                'type'    => 'submit',
                                'content' => ' Carian',
                                'data-icon'=> '&#xe07f'
                            );

                            echo form_button($search);

                            ?>
                    </div>
              
                    

                
          
              </div>
            </div>

          </div>
          
         

        </div-->


    <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Senarai PSPA(O) Akhir
                  

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
                        <td>
                        <a href="#myModal<?php echo $rec->pspa_id ?>" data-toggle="modal" data-original-title="Klik disini bagi memaparkan sejarah status" data-placement="top">
                        <span class="badge badge-info">

                          <?php

                              $get_status = $this->function_model->get_status_pelan($rec->pspa_id,0,7); 
                          
                            echo $get_status;

                            ?>
                        </span>
                        </a>
                        </td>
                        <td>


                          <ul class="icomoon-icons-container">

                            <?php
/*

                          <a href="<?php echo site_url('pspao/senarai_pspao_akhir_ptf_2/'.$rec->pspa_id) ?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                          <a href="<?php echo site_url('pspao/senarai_pspao_akhir_pp_2/'.$rec->pspa_id) ?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                           <a href="<?php echo site_url('pspao/senarai_pspao_akhir_ppd_2/'.$rec->pspa_id) ?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
*/
                          ?>
						  <?php
                          if((($mu[2]['menu_sah[2]'])==1)&&(($mu[2]['menu_kemaskini[2]'])==1)){ ?>

                          <a href="<?php echo site_url('pspao/senarai_pspao_akhir_ptf_2/'.$rec->pspa_id) ?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                          
                          <?php
                          }else if(($mu[2]['menu_sah[2]'])==1){ ?>

                          <a href="<?php echo site_url('pspao/senarai_pspao_akhir_ptf_2/'.$rec->pspa_id) ?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                          
                          <?php
                          }else if(($mu[2]['menu_lulus[2]'])==1){ ?>

                          <a href="<?php echo site_url('pspao/senarai_pspao_akhir_pp_2/'.$rec->pspa_id) ?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                          
                          <?php
                          }else if(($mu[2]['menu_kemaskini[2]'])==1){ ?>

                           <a href="<?php echo site_url('pspao/senarai_pspao_akhir_ppd_2/'.$rec->pspa_id) ?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                         
                          <?php
                          }
                          ?>
                        
                          
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
        
         <!--div id="pspao" class="tab-pane fade active in">
         
         </div>

         <div id="ptra" class="tab-pane fade active in">
         
         </div>

         <div id="popa" class="tab-pane fade active in">
         
         </div>

         <div id="pnpa" class="tab-pane fade active in">
         
         </div>

         <div id="pla" class="tab-pane fade active in">
         
         </div>

                 </div-->
    </div>
    
<!--start model sejarah status -->
 <?php if(!empty($result)) : foreach ($result as $rec) : ?>
  <div id="myModal<?php echo $rec->pspa_id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sejarah Status PSPA(O) Awal
                      </h4>
                    </div>
                   
                    <div class="modal-body">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left">
                            <tr>
                                <td>Bil</td>
                                <td>Status</td>
                                <td>Tarikh Status</td>
                                <td>Kategori</td>
                                <td>Dari</td>
                                <td>Ulasan</td>
                            </tr>
                            <?php  $i=1; if($getSts = $this->pspao_akhir_model->get_senarai_status($rec->pspa_id,7))  :foreach ($getSts as $rr) :?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $rr->nama_status; ?></td>
                                <td><?php echo $rr->status_tarikh; ?></td>
                                <td><?php if($getSta = $this->pspao_akhir_model->get_namakategoristatus($rr->kump_kand_id))  :foreach ($getSta as $rq): ?><?php echo $rq->kump_kand_kod; ?><?php endforeach; ?>
                             <?php endif; ?></td>
                                <td><?php echo $rr->nama_user; ?></td>
                                <td><?php echo $rr->status_ulasan; ?></td>
                                
                            </tr>
                            <?php endforeach; ?>
                             <?php endif; ?>
                        </table>
                        
                    </div>
                  
                   
                  </div>
                 <?php endforeach; ?>
                   <?php endif; ?>
<!-- end modal -->

