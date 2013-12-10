
<?php 
$attributes = array(
'class' => 'form-horizontal no-margin', 
'name' => 'agihan_belanjawan',
'id' => 'agihan_belanjawan',
);
echo form_open('belanjawan/agihan_belanjawan',$attributes); ?>

<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                        
                    </span> 
                        Pelan Strategi Pengurusan Aset PSPA(O) Akhir
                </div>
            </div>
              
                <div class="widget-body">
            
                    
                
                <div class="control-group">
                    <label class="control-label" for="report_range1">
                        Tempoh Mula
                    </label>
                    <div class="controls">
                    <?php echo form_error('tempohmula'); ?> 
                    <?php echo form_dropdown('tempohmula', $year_list, 'id="tempohmula"');?>
                     </div>
              </div>



                <div class="control-group">
                    <label class="control-label" for="report_range1">
                   Tempoh Akhir
                     </label>
                    <div class="controls">
                    <?php echo form_error('tempohakhir'); ?> 
                        <?php echo form_dropdown('tempohakhir', $year_list, 'id="tempohakhir"');?>    
                    </div>
              </div>
                  
             <div class="control-group">
                    <label class="control-label">
                        Kementerian
                    </label>
                    <div class="controls">
                        <?php echo form_error('kementerian'); ?> 
                        <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
                    </div>
                </div>
                    
                
                                     
                    
                <div class="control-group">
                    <label class="control-label">
                        Jabatan/Agensi
                    </label>
                    <div class="controls">
                        <?php echo form_error('jabatan'); ?> 
                        <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                    </div>
                </div>
                    
                    
                
                    
                    
                
                    
                    
                <div class="control-group">
                    <label class="control-label">
                        Status
                    </label>
                    <div class="controls">
                    <?php echo form_error('status'); ?> 
                          <?php echo form_dropdown('status', $status, 'id="status_id"');?>
                    </div>
                </div>
                    
            
                <div class="control-group">
                    <label class="control-label" for="email1">
                        Kata Carian
                    </label>
                    <div class="controls">
                    <?php echo form_error('katacarian'); ?> 
                         <?php
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '',
                          );
                          echo form_input($data);
                          ?>
                    </div>
                </div>
                        
                        
                        
                <div class="control-group">
                    <?php
                      $seterusnya = array(
                      'name'    => '',
                      'id'      => '',
                      'class'   => 'rounded pull-right ',
                      'value'   => '',
                      'content' => ' Carian',
                      'type'    => 'submit',
                      'data-icon' => '&#xe07f;'
                      );
                      echo form_button($seterusnya);
                      ?>
                      </div>
                </div> 
                    
                    
                </div> 
                                     
             <?php  echo form_close();?>
        </div>
    </div> 
  </div>
<!-- div panel PSPAO END -->
 


<!-- div panel senarai START -->
<div class="main-container">
    
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Senarai PSPA(O) Akhir
                  </div> 
            </div> 
                
            
            <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination"> 
                      <?php echo $this->table->generate($dataku); ?>
                       <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai
                       </div>
                       <?php echo $this->pagination->create_links(); ?>
                </div>
                <div class="clearfix">
            </div>
       </div> 
   
</div>
<!-- div panel senarai END -->



