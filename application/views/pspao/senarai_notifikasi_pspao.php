     <style>
    
    .sort_asc:after {
      content: "▲";
    }
    .sort_desc:after {
      content: "▼";
    }
                
  </style>     
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

                      <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_notifikasi',
                           'id' => 'senarai_notifikasi',
                        );
                    echo form_open('pspao_awal/senarai_notifikasi_pspao',$attributes); ?>
                  

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
      <div class="main-container">
          

         
          

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
                    
 
                         <?php echo $this->table->generate($dataku); ?>
                        
                     <!--table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th style="width:50%">Perkara</th>
                        <th style="width:90%">Tarikh</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                        
                      <?php 
                       
                     /*  foreach($dataku as $rows){
                      echo '<tr><td>'.$rows.'</td></tr>';
                      echo '<br>'; 
                      }
                        */
                    ?>
                                 
                      
                    </tbody>
                  </table-->
                         
                        
                   <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai</div>
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        
                      <?php echo $this->pagination->create_links(); ?>


                        <!--a id="data-table_first" class="first paginate_button paginate_button_disabled" tabindex="0">Pertama</a>
                      <a id="data-table_previous" class="previous paginate_button paginate_button_disabled" tabindex="0">Sebelum</a>
                      <span>
                      <a class="paginate_active" tabindex="0">1</a>
                      <a class="paginate_button" tabindex="0">2</a>
                      <a class="paginate_button" tabindex="0">3</a>
                      <a class="paginate_button" tabindex="0">4</a>
                      </span>
                      <a id="data-table_next" class="next paginate_button" tabindex="0">Seterusnya</a>
                      <a id="data-table_last" class="last paginate_button" tabindex="0">Akhir</a-->
                      </div> 

  </div>
  <div class="clearfix"> </div>
                  

                   
              </div>
          
              </div>
            </div>

          </div>
          
         

        </div>
                

                <?php  echo form_close();?>
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