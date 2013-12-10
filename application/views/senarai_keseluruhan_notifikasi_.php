
    <!--breadcrumb-->
    <div class="widget-body">
                  <ul class="breadcrumb-beauty">
                    <li>
                      <a href="<?php echo site_url('main')?>">
                        Notifikasi
                      </a> 
                    </li>
                 
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  
<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Senarai Keseluruhan Notifikasi
                  </div>
                </div>
                

    <div class="widget-body">
         
          
           <!--ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active"><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ptf_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ptf_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ptf_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ptf_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ptf_pla')?>">PLA</a></li>
                  </ul-->
          
          
           <!--div class="tab-content" id="myTabContent"-->
                 <!--div id="pspao" class="tab-pane fade active in"-->

                      <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_keseluruhan_notifikasi',
                           'id' => 'senarai_keseluruhan_notifikasi',
                        );
                    echo form_open('main/senarai_keseluruhan_notifikasi',$attributes); ?>
                  

<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Carian Notifikasi
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
      
                      <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tarikh Mula
                      </label>
                      <div class="controls">
                          <?php echo form_error('tarikh_mula'); ?> 
                        <div class="input-append">
                            
                            <?php
                          
                          $data = array(
                            'name'        => 'tarikh_mula',
                            'id'          => 'tarikh_mula',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 date_picker',
                            'placeholder' => 'Pilih Tarikh',
                          );

                          echo form_input($data);
                          
                          ?>
                         
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>

                      <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Tarikh Akhir
                      </label>
                      <div class="controls">
                            <?php echo form_error('tarikh_akhir'); ?> 
                        <div class="input-append">
                           <?php
                          
                          $data = array(
                            'name'        => 'tarikh_akhir',
                            'id'          => 'tarikh_akhir',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 date_picker',
                            'placeholder' => 'Pilih Tarikh',
                          );

                          echo form_input($data);
                          
                          ?>
                          
                          <span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                      </div>
                    </div>


                      
                      <div class="control-group">
                      <label class="control-label" for="katacarian">
                        Kata Carian
                      </label>
                      <div class="controls">
                           <?php echo form_error('katacarian'); ?> 
                          <?php
                          
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span5',
                            'placeholder' => 'Carian',
                          );

                          echo form_input($data);
                          
                          ?>
                        
                      </div>
                    </div>
                    
                    
                    
                    <div class="control-group ">
                        
                        
                        <?php
                            $search = array(
                                'name'    => '',
                                'id'      => '',
                                'class'   => 'icomoon-icons-container pull-right rounded',
                                'value'   => '',
                                'type'    => 'submit',
                                'content' => ' Carian',
                                'data-icon'=> '&#xe07f'
                            );

                            echo form_button($search);

                            ?>
                      
                       <!--ul class="icomoon-icons-container pull-right">
                    <li class="rounded">
                        
                        <a href="<?php echo site_url('main/senarai_notifikasi_pspao') ?>"> <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span> </a>
                           
                    </li>
		    </ul-->
                       
              
                    </div>
               

                  
         
                
          
              </div>
            </div>

          </div>
          
         
        </div>



      <!--second tab -->
     
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Notifikasi
                  </div>
                </div>
                <div class="widget-body">
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:17%">
                            Bil
                          </th>
                          <th style="width:20%">
                            Notifikasi
                          </th>
                          <th style="width:16%">
                            Status
                          </th>
                          <th style="width:16%" class="hidden-phone">
                            Tarikh
                          </th>
                          <th style="width:16%" class="hidden-phone">
                            Pelan / Kategori
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         <?php $i=1; if(!empty($data1)) : foreach ($data1 as $rec) : ?>
                        <tr>
                          <td>
                           <?php echo $i++; ?>
                          </td>
                          <td>
                            <?php echo $rec->perkara; ?>
                          </td>
                          <td>
                            <?php $status =  $rec->status; 
                            if($status==0)
                            {
                              echo '<span class="badge badge-success">Baru </span>';
                              
                            }else
                            {
                              echo '<span class="badge badge-info"> Telah Dibaca </span>';
                            }
                            ?>
                          </td>
                          <td>
                         <?php $tarikh = new DateTime($rec->tarikh_dihantar); 
                                echo $tarikh->format('d-m-Y');
                         ?>
                          </td>
                          <td>
                            <?php if($get_namakumpkand = $this->utama_model->get_kump_kand($rec->kump_kand_id)) 
                         foreach ($get_namakumpkand as $rr) 
                          echo $rr->kump_kand_kod;?>
                          </td>
                          
                        </tr>
                        
                        <?php endforeach; ?>
                            <?php endif; ?>
                        
                      </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

                

                <?php  echo form_close();?>
    <!--/div-->
               
           
         <!--div id="pspao" class="tab-pane fade active in">
         
         </div>

         <div id="ptra" class="tab-pane fade active in">
         
         </div>

         <div id="popa" class="tab-pane fade active in">
         
         </div>

         <div id="pnpa" class="tab-pane fade active in">
         
         </div>

         <div id="pla" class="tab-pane fade active in">
         
         </div-->    
               
               
    
         <!--/div-->
 </div>
    </div>       
    </div>