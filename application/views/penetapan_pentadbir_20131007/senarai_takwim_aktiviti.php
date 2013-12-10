 <style>
.modal2{

  width:80% !important;
  left:30%;

}

 </style>


  

    <!--breadcrumb-->

    <div class="widget-body">
                  <ul class="breadcrumb-beauty">
                    <li>
                      <a href="<?php echo site_url('main')?>">
                        Takwim
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Takwim Tatacara Pengurusan Aset Tak Alih Kerajaan 
                  </div>
                </div>
           
                 <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'takwim',
                           'id' => 'takwim',
                        );
                    echo form_open('pentadbir/pengurusan_takwim',$attributes); ?>
                     
                
              <div class="widget-body">
              
                   <div class="widget">
                     <div class="widget-header">
                      <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe052;"></span> Senarai Takwim Aktiviti Bagi Tarikh <?php echo $this->uri->segment(5).'/'.$this->uri->segment(4).'/'.$this->uri->segment(3)  ?>
                  </div>
                     </div>
                       
                      
                     <div class="row-fluid">
                       <div class="span12">
                        <div class="widget-body">
                          
 <div class="row-fluid">
                   <ul class="icomoon-icons-container">
                      

                         <a href="#myModal"  data-toggle="modal"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li>
                  </ul><label class="tambah">Tambah Aktiviti</label></a>
                          
                   
                  </div>

                                  
                   <div id="dt_example" class="example_alt_pagination">   
                
                     <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                    <thead>
                      <tr>
                        <th style="width:5%">Bil</th>
                        <th style="width:25%">Aktiviti Takwim</th>
                        <th style="width:15%">Repeat Bulan</th>
                        <th style="width:15%">Repeat Tahun</th>
                        <th style="width:15%">Takwim Alert</th>
                        <th style="width:15%">Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; if(!empty($takwim_aktiviti)) : foreach ($takwim_aktiviti as $rec) : 

                      echo '<input type="hidden" name="takwim_id[]" value="'.$rec->takwim_aktvt_id.'">'

                      ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $rec->takwim_aktvt; ?></td>
                        <td><?php echo $rec->repeat_bulan ; ?></td>
                        <td><?php echo $rec->repeat_tahun; ?></td>
                       <td><?php echo $rec->takwim_alert_hari; ?></td>
                        
                        <td>


                         
                           <a href="<?php echo site_url('pentadbir/pengurusan_takwim/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/update/'.$rec->takwim_aktvt_id) ?>" data-toggle="modal"> 
                          <ul class="icomoon-icons-container"><li class="rounded">
                              <span class="fs1" data-icon="&#xe005" aria-hidden="true"></span></li> </ul></a>
                        

                          <!--a href="#myModal<?php echo $rec->takwim_aktvt_id ?>" data-toggle="modal"> 
                          <ul class="icomoon-icons-container"><li class="rounded">
                          <span class="fs1" data-icon="&#xe005" aria-hidden="true"></span>
                          </li> </ul></a-->
                        

                          <a href="<?php echo site_url('pentadbir/pengurusan_takwim/'.date('Y').'/'.date('m').'/'.date('d').'/delete/'.$rec->takwim_aktvt_id) ?>"> <ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" data-icon="&#xe0a8" aria-hidden="true"></span></li> </ul></a>
                        
                        
                       </td>
                      </tr>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>


                    
                  <div class="clearfix"> </div>
         
              
                
          
              </div>
                            
                            
                     </div>
                     </div>
                   </div>
 
                  
                </div>
                  
                  
                <!-- Modal -->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">


                   
                   
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel"><span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>
                        Pengurusan Aktiviti Takwim Bagi Tarikh
                      </h4>
                    </div>
                   
                    

                        <div class="modal-body">
                                     
            <div class="row-fluid">
                       
                   
                  </div>

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Tambah Takwim Aktiviti
                  </div>
                </div>
                <div class="widget-body">
                 
                  <p>
                                            
                                            <div class="control-group">
                                              <label class="control-label">
                                                Aktiviti Takwim
                                              </label>
                                              <div class="controls">
                                                <?php

                                                  $data = array(
                                                    'name'        => 'aktiviti_takwim',
                                                    'id'          => 'aktiviti_takwim',
                                                    'value'       => '',
                                                    'maxlength'   => '100',
                                                    'size'        => '50',
                                                    'class'       => 'span9',
                                                    'placeholder' =>  '',
                                                  );

                                                  echo form_input($data);

                                                  ?>
                                              </div>
                                            </div>


                                            <div class="control-group">
                                              <label class="control-label" for="date_range1">
                                                Tarikh
                                              </label>
                                              <div class="controls">
                                                <div class="input-append">
                                                  
                                                       <?php

                                                  $data = array(
                                                    'name'        => 'tarikh',
                                                    'id'          => 'tarikh',
                                                    'value'       => $this->uri->segment(3).'-'.$this->uri->segment(4).'-'.$this->uri->segment(5),
                                                    'maxlength'   => '',
                                                    'size'        => '',
                                                    'class'       => 'span8 date_picker',
                                                    'placeholder' =>  'Pilih Tarikh',
                                                    'readonly'    => 'readonly'
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
                                              <label class="control-label" for="date_range1">
                                                Repeat Bulan
                                              </label>
                                              <div class="controls">
                                                <div class="input-append">
                                                  <label class="checkbox">
                                                  <?php

                                                  $data = array(
                                                    'name'        => 'repeat_bulan',
                                                    'id'          => 'repeat_bulan',
                                                    'value'       => '1',
                                          
                                                   
                                                  );

                                                  echo form_checkbox($data);

                                                  ?>

                                                  </label>  
                                                </div>
                                              </div>
                                            </div>                           
                                             <div class="control-group">
                                              <label class="control-label" for="date_range1">
                                                Repeat Tahun
                                              </label>
                                              <div class="controls">
                                                <div class="input-append">
                                                  <label class="checkbox">
                                                  <?php

                                                  $data = array(
                                                    'name'        => 'repeat_tahun',
                                                    'id'          => 'repeat_tahun',
                                                    'value'       => '1',
                                          
                                                   
                                                  );

                                                  echo form_checkbox($data);

                                                  ?>

                                                  </label>  
                                                </div>
                                              </div>
                                            </div> 

                                            <div class="control-group">
                                              <label class="control-label">
                                                Takwim Alert
                                              </label>
                                              <div class="controls">
                                                <?php

                                                  $data = array(
                                                    'name'        => 'takwim_alert',
                                                    'id'          => 'takwim_alert',
                                                    'value'       => '',
                                                    'maxlength'   => '100',
                                                    'size'        => '50',
                                                    'class'       => 'span9',
                                                    'placeholder' =>  '',
                                                  );

                                                  echo form_input($data);

                                                  ?>
                                              </div>
                                            </div>      
                                      </p>  


                </div>
              </div>
            </div>
          </div>

                                    </div>
                          <div class="modal-footer">

                         <?php
                                $batal = array(
                                    'name'    => '',
                                    'id'      => '',
                                    'class'   => 'btn btn-danger input-top-margin ',
                                    'data-dismiss'=>'modal',
                                    'value'   => '',
                                    'type'    => 'button',
                                    'content' => 'Batal'
                                );

                                echo form_button($batal);

                                ?>
                                <?php
                                $simpan= array(
                                    'name'    => 'simpan',
                                    'id'      => 'simpan',
                                    'class'   => 'btn btn-info',
                                    'value'   => 'simpan',
                                    'type'    => 'submit',
                                    'content' => 'Simpan'
                                );

                                echo form_button($simpan);

                                ?>                     
                        </div>


                                          </div>
                
              </div>
                
              <?php  echo form_close();?>
          
              </div>
            </div>

          </div>
         