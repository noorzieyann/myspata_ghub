



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
                        PSPA(O) Awal
                      </a>   
                    </li>
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  


<div class="widget-body">
         
          
         

                
                    <?php //echo validation_errors(); ?>
                    <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'pspao_baru_copy',
                           'id' => 'pspao_baru_copy',
                        );
                    echo form_open('pspao_awal/pspao_baru_copy/'.$this->uri->segment(3),$attributes); ?>


          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Permintaan Penyediaan  PSPA(O) Awal
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
 
                     
                      <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                     <?php echo form_error('tempoh_mula'); ?> 
                        
                     <?php 
                    
                        


                     echo form_dropdown('tempoh_mula', $year_list,$tempoh_mula, 'id="tempoh_mula"','class="span4 input-left-top-margins"')?>
                 
                     
                      </div>
                      </div>
                  
                  
                    <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Akhir
                      </label>
                      <div class="controls controls-row">
                      <div class="error"> 
                        <?php echo form_error('tempoh_akhir'); ?> 
                        <?php 
                        

                        echo form_dropdown('tempoh_akhir', $year_list,$tempoh_akhir, 'id="tempoh_mula"','class="span4 input-left-top-margins"')?>

                   

                    
                      </div>
                      </div>
                    </div>
                      
                      <div class="control-group">
                        
                     <label class="control-label" for="kementerian">
                    Kementerian 
                      </label>
                      <div class="controls">
                          <?php echo form_error('kementerian'); ?> 
                          <?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => $kementerian,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'disabled'    => 'disabled',
                            'placeholder' =>  'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?>
                       
                          
                      </div>
                    </div>
                   
           
                  
                    

              </div>
            </div>

          </div>
          
         

        </div>



     <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kandungan
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
                
                   <div class="stylish-lists">
                   
                    <?php 
                   //$kand_utama_bil = array();

                  $i=1; if(!empty($pspaodata)) : foreach ($pspaodata as $row) : 


                  echo '<input type="hidden" name="kand_id[]" value="'.$row->kandungan_id.'">';
                  echo '<input type="hidden" name="kand_utama[]" value="'.$row->kand_utama.'">';
                  echo '<input type="hidden" name="kand_bil[]" value="'.$row->kand_utama_bil.'">';
                  ?>

                    <label> <?php echo number_format($row->kand_utama_bil, 1); ?> <?php  echo  $row->kand_utama;?>
                     <span class="popover-pop" data-original-title="<?php echo number_format($row->kand_utama_bil, 1); ?> <?php  echo  $row->kand_utama;?>" 
           data-content="<?php echo $row->kand_utama;  ?>" 
           data-placement="right" data-icon="&#xe0f7;"></span>
                    </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('pendahuluan'); ?>
                    <?php 
                          $data = array(
                                    'name'        => 'kand_detail[]',
                                    'id'          => 'wysiwyg'.$row->kand_utama_bil,
                                    'value'       => $row->kand_utama_detail,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Penerangan secara umum fungsi dan organisasi kementerian',
                                  );

                     echo form_textarea($data); ?>
                   </div>

                    <?php endforeach; ?>
                  <?php endif; ?>

                 

             </div>
               
                  
                </div>
                
                
               
          
              </div>
            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
             
         <a href="<?php echo site_url('pspao_awal/senarai_pspao_baru') ?>">     
        <?php
        $batal = array(
            'name'    => 'batal',
            'id'      => 'batal',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'onclick' =>"history.back()",
            'type'    => 'button',
            'content' => 'Batal'
        );

        echo form_button($batal);
        
        ?>
        </a>
          
        <?php
        $seterus = array(
            'name'    => 'seterus',
            'id'      => 'seterus',
            'class'   => 'btn btn-primary',
            'value'   => 'seterus',
            'type'    => 'submit',
            'content' => 'Seterusnya'
        );

        echo form_button($seterus);
        
        ?>
       

</div>
<div class="clearfix"></div>
                

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
    

    <script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script>


  $('#wysiwyg1').wysihtml5();
    
   
  
</script>
     