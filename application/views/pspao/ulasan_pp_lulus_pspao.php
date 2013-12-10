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
         
          
           <!--ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active"><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ptf_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ptf_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ptf_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ptf_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ptf_pla')?>">PLA</a></li>
                  </ul>
    
    
    <div class="tab-content" id="myTabContent">
                 <div id="pspao" class="tab-pane fade active in"-->
        
                    <?php //echo validation_errors(); ?>
                  
                   <?php 
                       $attributes = array(
                           'class' => 'form-horizontal no-margin', 
                           'name'  => 'ulasan_pp_lulus_pspao',
                           'id'    => 'ulasan_pp_lulus_pspao',
                        );
                    echo form_open('pspao_awal/ulasan_pp_lulus_pspao/'.$this->uri->segment(3),$attributes); ?>
                     
                    <?php if($ulasan != NULL){ ?>
            <!--status info-->
            <div class="alert alert-block alert-warning fade in">
                    <button data-dismiss="alert" class="close" type="button">
                      ×
                    </button>
                      <h5 style="color:#FF0000">Ulasan : 
                      <a class="alert-heading"><?php echo $ulasan; ?></a>
                      </h5>
            </div>
            <!--/.END status info-->
<?php } ?>

                     
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Permintaan Penyediaan  PSPA(O) Awal
                  </div>
                    <span class="pull-right" style="font-weight:bold">JKR.PATA-1</span>
                </div>
                
              
                
              <div class="widget-body">
              
                     
                      <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                       
                    <?php echo form_error('tempoh_mula'); 
                    
                    
                    ?> 
           <?php echo form_dropdown('tempoh_mula', $year_list,$tahun_mula, 'disabled="disabled"','id="tempoh_mula"','class="span4 input-left-top-margins"')?>

                     
                       
                    </li>
                      </div>
                      </div>
                  
                  
                    <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Akhir
                      </label>
                      <div class="controls controls-row">
              
                      <?php echo form_error('tempoh_akhir'); ?>    
             <?php echo form_dropdown('tempoh_akhir', $year_list,$tahun_akhir, 'disabled="disabled"', 'id="tempoh_mula"','class="span4 input-left-top-margins"')?>

                   

                    </li>
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
                            'disabled'    => 'disabled',
                            'size'        => '50',
                            'class'       => 'span5',
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


                  echo '<input type="hidden" name="kand_id[]" value="'.$row->kandungan_id.'">'

                  ?>

                   <label> <?php echo number_format($row->kand_utama_bil, 1); ?> <?php  echo  $row->kand_utama;?>
                    
                     <a id="popoverOption" href="#"  
                      rel="popover" data-placement="top" data-original-title="<?php echo $row->kand_utama_detail ?>" data-icon="&#xe0f7;"></a>


                     <!--span class="popover-pop" data-original-title="<?php echo number_format($row->kand_utama_bil, 1); ?> <?php  echo  $row->kand_utama;?>" 
           data-content="<?php echo $row->kand_utama;  ?>" 
           data-placement="right" data-icon="&#xe0f7;"></span-->
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
                                    'readonly'  => 'readonly',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Penerangan secara umum fungsi dan organisasi kementerian',
                                  );

                     echo form_textarea($data); ?>
                   </div>

 
                <?php endforeach; ?>
                  <?php endif; ?>   

                    

                    </div>
   

               

                  <div class="clearfix"> </div>
         
                
                
               
          
              </div>
            </div>

          </div>
          

          
          
          
          <div class="next-prev-btn-container pull-right ">
                 
               
            <a href="<?php echo site_url('pspao_awal/senarai_pspao_baru') ?>">   
              <?php
        $batal = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'onclick' =>"history.back()",
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
                     <script>
$('#popoverOption').popover({ trigger: "hover" });</script>

    
    