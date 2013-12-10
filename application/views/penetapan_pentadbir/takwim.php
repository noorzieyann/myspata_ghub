

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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe052;"></span> Takwim Aktiviti
                  </div>
                     </div>
                       
                      
                     <div class="row-fluid">
                       <div class="span12">
                        <div class="widget-body">
                           <?php echo validation_errors(); ?>  
                   
                      
                      
                            <?php
                           echo $calendar;
                            ?>
                    
                            
                            
                     </div>
                     </div>
                   </div>
 
                  
                </div>
                  
                  
             


                
              </div>
                
              <?php  echo form_close();?>
          
              </div>
            </div>

          </div>
         