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
                        Perangcangan
                      </a>  
                    </li>
                    <li>
                      <a href="#">
                        Pelan
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        PSPA(O)
                      </a>   
                    </li>
                    <li>
                      <a href="#">
                        PNPA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />
        <div class="widget-body">
     <ul class="nav nav-tabs no-margin myTabBeauty">
                     <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class="active"><a href="">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
 

        
           

<!-- div tab START -->

<div class="tab-content" id="myTabContent">
<div id="home" class="tab-pane fade active in">
<p>   
 
    
<!-- div panel PSPAO START -->
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
              
            
            <form class="form-horizontal no-margin">
                <div class="widget-body">
            
                    
                
                <div class="control-group">
                    <label class="control-label" for="report_range1">
                        Tempoh Mula
                    </label>
                    <div class="controls">
                    
                    <label>
                    <div class="input-append">
                        <?php echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"')?>
                    </div>
                        
                        &nbsp; &nbsp; Hingga
                    <div class="input-append">
                        <?php echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"')?>
                    </div>
                    
                    </label>
                    </div>
              </div>
                  
             
                
                                     
                    
                <div class="control-group">
                    <label class="control-label">
                        Jabatan/Agensi
                    </label>
                    <div class="controls">
                        <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                    </div>
                </div>
                    
                    
                
                    
                    
                
                    
                    
                <div class="control-group">
                    <label class="control-label">
                        Status
                    </label>
                    <div class="controls">
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
                    
            
                <div class="control-group">
                    <label class="control-label" for="email1">
                        Kata Carian
                    </label>
                    <div class="controls">
                    <?php
                          
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-large',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                     ?>
                    </div>
                </div>
                        
                        
                        
                <div class="control-group">
                    <ul class="icomoon-icons-container pull-right">
                        <li class="rounded">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>
                        </li>
                    </ul>
                </div> 
                    
                    
                </div>                      
             </form>
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
                <?php echo $this->table->generate($records); ?>
                <?php echo $this->pagination->create_links(); ?>
            </div>
       </div> 
   </div> 

</div> 
       
</div>
<!-- div panel senarai END -->



