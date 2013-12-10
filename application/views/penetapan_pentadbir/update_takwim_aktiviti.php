
  

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
                      <input type="hidden" id="takwimid" name="takwimid" value="<?php echo $this->uri->segment(7); ?>"/>
                
              <div class="widget-body">
              
                   <div class="widget">
                     <div class="widget-header">
                      <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe052;"></span> Update Takwim Aktiviti Bagi Tarikh <?php echo $this->uri->segment(5).'/'.$this->uri->segment(4).'/'.$this->uri->segment(3)  ?>
                  </div>
                     </div>
                       
                      
                     <div class="row-fluid">
                       <div class="span12">
                        <div class="widget-body">
               
                             


                                            <div class="control-group">
                                              <label class="control-label">
                                                Aktiviti Takwim
                                              </label>
                                              <div class="controls">
                                                <?php

                                                  $data = array(
                                                    'name'        => 'aktiviti_takwim',
                                                    'id'          => 'aktiviti_takwim',
                                                    'value'       =>  $aktiviti,
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

                                                      if($r_bulan==1){ 

                                                         
                                                         $checked = 'checked';

                                                      }else{


                                                       
                                                        $checked = '';

                                                      }


                                                  $data = array(
                                                    'name'        => 'repeat_bulan',
                                                    'id'          => 'repeat_bulan',
                                                    'value'       => '1',
                                                    'checked'    => $checked 
                                          
                                                   
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


                                                  if($r_tahun==1){ 
                                                         
                                                         
                                                      $checked = 'checked';

                                                      }else{

                                                       
                                                        $checked = '';

                                                      }


                                                  $data = array(
                                                    'name'        => 'repeat_tahun',
                                                    'id'          => 'repeat_tahun',
                                                     'value'       => '1',
                                                     'checked'    => $checked 
                                          
                                                   
                                                  );

                                                  echo form_checkbox($data);

                                                  ?>

                                                  </label>  
                                                </div>
                                              </div>
                                            </div>  


                                            <div class="control-group">
                                              <label class="control-label" for="date_range1">
                                                Hantar Notifikasi
                                              </label>
                                              <div class="controls">
                                                <div class="input-append">
                                                  <label class="checkbox">
                                                  <?php


                                                  if($hantar_notifi==1){ 
                                                         
                                                         
                                                      $checked = 'checked';

                                                      }else{

                                                       
                                                        $checked = '';

                                                      }


                                                  $data = array(
                                                    'name'        => 'hantar_notif',
                                                    'id'          => 'hantar_notif',
                                                    'value'       => '1',
                                                     'checked'    => $checked 
                                          
                                                   
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
                                                    'value'       => $alert,
                                                    'maxlength'   => '100',
                                                    'size'        => '50',
                                                    'class'       => 'span3',
                                                    'placeholder' =>  '',
                                                    'onkeypress'=>'return isNumberKey(event)'
                                                  );

                                                  echo form_input($data);

                                                  ?>
                                              </div>
                                            </div>  


                                       <div class="control-group">
                                              <label class="control" for="date_range1">
                                                <?php


                                                if($flag_pspao==1){ 
                                                         
                                                         
                                                      $checked = 'checked';

                                                      }else{

                                                       
                                                        $checked = '';

                                                      }


                                                  $data = array(
                                                    'name'        => 'flag_pspao',
                                                    'id'          => 'flag_pspao',
                                                    'value'       => '1',
                                                   'checked'    => $checked 
                                          
                                                   
                                                  );

                                                  echo form_checkbox($data);

                                                  ?><span style="margin-left: 10px;margin-top: 2px;position: absolute;">
                                                 Sila Pilih Disini Jika Takwim Aktiviti Adalah Penyediaan PSPAO Awal
                                                  </span>
                                                  </label>  
                                               
                                            </div>  
                     </div>





                     </div>





                   </div>


                  
                </div>
                  
                  
           
            
 
 <div class="next-prev-btn-container pull-right">
                 
                 
              
              <?php
        $batal = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Batal',
            'onclick' =>"history.back()"
        );

        echo form_button($batal);
        
        ?>
  
        <?php
        $betul = array(
            'name'    => 'update',
            'id'      => 'update',
            'class'   => 'btn btn-info input-top-margin',
            'value'   => 'update',
            'type'    => 'submit',
            'content' => 'Simpan'
        );

        echo form_button($betul);
        
        ?>
       
                 
               
             
            </div>
     <div class="clearfix"></div>
              </div>



                       

                
              <?php  echo form_close();?>

          
              </div>






            </div>

          </div>

          <script> //function for numeric input text
            function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
          </script>
         