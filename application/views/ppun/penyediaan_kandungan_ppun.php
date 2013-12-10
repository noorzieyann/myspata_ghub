
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
                        PPUN
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
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class="active"><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
                   <div class="tab-content" id="myTabContent">
                 <div id="ppun" class="tab-pane fade active in">
 
              <?php //echo validation_errors(); ?>
              
               <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'sedia_kadungan_ppun',
                           'id' => 'sedia_kadungan_ppun',
                        );
                    echo form_open('ppun/model_struktur_ppun',$attributes); ?>
      
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> PPUN
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
                 
                      <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                       <?php echo form_error('tempoh_mula'); ?> 
                   <?php echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"')?>

                        
                       

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
                           $kementerian = array(
                                          'Kementerian Kerja Raya','Kementerian Dalam Negeri',
                               
                                                );
                       
                       
                       echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
                        
                      </div>
                    </div>
                    
                     <div class="control-group">
                        
                     <label class="control-label" for="jabatan">
                    Jabatan/Agensi
                      </label>
                      <div class="controls">
                           <?php echo form_error('jabatan'); ?> 
                        <?php 
                        
                         $jabatan = array(
                                          'Polis Diraja Malaysia','Hospital Putrajaya',
                               
                                                );
                        
                        echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                      </div>
                    </div>
                   
                   
                    <div class="control-group">
                        
                     <label class="control-label" for="premis">
                    Premis
                      </label>
                      <div class="controls">
                           <?php echo form_error('premis'); ?> 
                         <?php 
                          $premis = array(
                                          '- Pilih Premis -','Bangunan dan Struktur lain','Jalan','Pembentungan'
                               
                                                );
                         
                         echo form_dropdown('premis', $premis, 'id="premis"');?>
                      </div>
                    </div>
                    
                    
                     <div class="control-group">
                        
                     <label class="control-label" for="no dpa">
                    No DPA
                      </label>
                      <div class="controls">
                           <?php echo form_error('no_dpa'); ?> 
                          <?php
                          
                          $data = array(
                            'name'        => 'nodpa',
                            'id'          => 'nodpa',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                       
                      </div>
                    </div>
           
          
            </div>

          </div>
          
         

        </div>

    </div>

      <!--/.fluid-container-->
      
      
      
      
      <!--second tab -->
      <div class="main-container">
          

         
          

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe0b6;"></span> Kandungan
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
                   <div class="stylish-lists">
                   
               <label>
           1.0 Pendahuluan 
           <span class="popover-pop" data-original-title="1.0 Pendahuluan" 
           data-content="Menjelaskan maklumat mengenai premis berkaitan." 
           data-placement="right" data-icon="&#xe0f7;"></span>
                      </label>  
                  
            
                    <div class="wysiwyg-container">
                        <?php echo form_error('pendahuluan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'pendahuluan',
                                    'id'          => 'wysiwyg',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                    </textarea>
                   </div>

               
                   <label>
                        2.0 Objektif <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menjelaskan matlamat penerimaan aset kementerian/ jabatan/ agensi." data-placement="right"  data-icon="&#xe0f7;"></span>
                      </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('objektif'); ?> 
                   
                        <?php 
                          $data = array(
                                    'name'        => 'objektif',
                                    'id'          => 'wysiwyg2',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div>

                 <label>
                        3.0 Carta Organisasi dan Pelan Komunikasi <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penerimaan aset (Sebagaimana JKR.PATA.F6/1a)." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;"></span>
                      </label> 
                    <div class="wysiwyg-container">
                        <?php echo form_error('carta_pelan'); ?> 
                   
                         <?php 
                          $data = array(
                                    'name'        => 'carta_pelan',
                                    'id'          => 'wysiwyg3',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                   </div>
                    <label>
                        4.0 Skop dan Aktiviti PPUN <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penerimaan Aset" data-content="PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut: (Sebagaimana JKR.PATA.F6/1b)" data-placement="right" data-icon="&#xe0f7;"></span>
                      </label>        
                    <div class="wysiwyg-container">
                        <?php echo form_error('skop'); ?> 
                  
                         <?php 
                          $data = array(
                                    'name'        => 'skop',
                                    'id'          => 'wysiwyg4',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                   </div>
                  <label>
                        5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset <span class="popover-pop" data-original-title="5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset" data-content="PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Penerimaan Aset bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F6/1c)." data-placement="right" data-icon="&#xe0f7;"></span>
                      </label>  
                    <div class="wysiwyg-container">
                        <?php echo form_error('sumber'); ?> 
                   
                         <?php 
                          $data = array(
                                    'name'        => 'sumber',
                                    'id'          => 'wysiwyg5',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                   </div>
                 <label>
                        6.0 Kawalan Rekod Penerimaan Aset <span class="popover-pop" data-original-title="6.0 Kawalan Rekod Penerimaan Aset" data-content="Kawalan rekod penerimaan aset sebagaimana JKR.PATA.F6/1d." data-placement="right" data-icon="&#xe0f7;"></span>
                      </label>    
                    <div class="wysiwyg-container">
                        <?php echo form_error('kawalan'); ?> 
                    
                         <?php 
                          $data = array(
                                    'name'        => 'kawalan',
                                    'id'          => 'wysiwyg6',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                   </div>
                 <label>
                        7.0 Rujukan <span class="popover-pop" data-original-title="7.0 Rujukan" data-content="Sebarang dokumen yang dirujuk dalam penyediaan PTRA sebagaimana JKR.PATA.F6/1e." data-placement="right"data-icon="&#xe0f7;"></span>
                      </label>   
                    <div class="wysiwyg-container">
                        <?php echo form_error('rujukan'); ?> 
                    
                         <?php 
                          $data = array(
                                    'name'        => 'rujukan',
                                    'id'          => 'wysiwyg1',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                   </div>
                    


                    </div>
   
                  <div class="clearfix"> </div>
         
                
                
               
          
              </div>
            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
          <a href="<?php echo site_url('ppun/senarai_ppun') ?>">
              <?php
        $batal = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Batal'
        );

        echo form_button($batal);
        
        ?>
        </a>
        <?php
        $seterusnya = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Seterusnya'
        );

        echo form_button($seterusnya);
        
        ?>
               

</div>
<div class="clearfix"></div>
                

        </div>



        </div>
        
         <?php  echo form_close();?>
      </div>

  <div id="pspao" class="tab-pane fade active in">
         
         </div>

         <div id="ptra" class="tab-pane fade active in">
         
         </div>

         <div id="popa" class="tab-pane fade active in">
         
         </div>

         <div id="pnpa" class="tab-pane fade active in">
         
         </div>

         <div id="pla" class="tab-pane fade active in">
         
         </div>



      
      </div>
         





		</div>


