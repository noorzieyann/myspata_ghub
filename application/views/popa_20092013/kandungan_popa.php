
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
                  
         <div class="tab-content" id="myTabContent">
         <div id="home" class="tab-pane fade active in">
             
             
              <?php //echo validation_errors(); ?>
              
               <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'kandungan_popa',
                           'id' => 'kandungan_popa',
                        );
                    echo form_open('popa/kandungan_popa',$attributes); ?>
      
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Operasi dan Penyenggaraan Aset
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
                 
                      <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                       <?php echo form_error('tahun'); ?> 
                   <?php echo form_dropdown('tahun', $year_list, 'id="tempoh_mula"')?>

                        
                       

                    </li>
                      </div>
                      </div>
                      
                      <div class="control-group">
                        
                     <label class="control-label" for="kementerian">
                    Kementerian 
                      </label>
                          <div class="controls">
                      <input class="input-large" type="text" placeholder="Kementerian Kerja Raya" disabled>
                      </div>
                    </div>
                    
                     <div class="control-group">
                        
                     <label class="control-label" for="jabatan">
                    Jabatan/Agensi
                      </label>
                      <div class="controls">
                           <?php echo form_error('jabatan'); ?> 
                        <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                      </div>
                    </div>
                   
                   
                    <div class="control-group">
                        
                     <label class="control-label" for="premis">
                    Premis
                      </label>
                      <div class="controls">
                           <?php echo form_error('premis'); ?> 
                         <?php echo form_dropdown('premis', $premis, 'id="premis"');?>
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
                            'name'        => 'no_dpa',
                            'id'          => 'nodpa',
                            'value'       => '',
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => 'input-large',
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
             
             
             
               <div class="row-fluid">

            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe0b6;"></span> Kandungan
                  </div>
                </div>
              <div class="widget-body">
            
                   <div class="control-group">
                    <label> 1.0 Pendahuluan  <span class="popover-pop"aria-hidden="true" data-icon="&#xe0f7;" data-placement="right" data-original-title="1.0 Pendahuluan"style="cursor: pointer" data-content="Menjelaskan maklumat mengenai premis berkaitan" >
                   </span></label> 
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
                      </div></div>
<br>            
                    <div class="control-group">
                    <label>
                        2.0 Objektif  <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menjelaskan matlamat operasi dan penyenggaraan aset kementerian/ jabatan/ agensi." data-placement="right"  data-icon="&#xe0f7;"></span>
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
                  </div>
<br>

                    <div class="control-group">
                    <label>3.0 Carta Organisasi Dan Pelan Komunikasi  <span class="popover-pop" data-original-title="Carta Organisasi Dan Pelan Komunikasi" data-content="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penyenggaraan aset (Sebagaimana JKR.PATA.F7/1a)." data-placement="right"  data-icon="&#xe0f7;"></span>
                      </label>    
                    <div class="wysiwyg-container">
                     <?php echo form_error('carta'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'carta',
                                    'id'          => 'wysiwyg3',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div></div>
<br>
                    <div class="control-group">
                    <label>4.0 Skop Dan Aktiviti Operasi dan Penyengaraan Aset  <span class="popover-pop" data-original-title="Skop Dan Aktiviti Operasi dan Penyenggaraan Aset" data-content="PIF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut:( Sebagaimana JKR.PATA.F7/1b)" data-placement="right"  data-icon="&#xe0f7;"></span>
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
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div></div>
                   <br>

                   <div class="control-group">
                    <label>5.0 Penyediaan Keperluan Sumber Operasi dan Penyenggaraan Aset  <span class="popover-pop" data-original-title="Penyediaan Keperluan Sumber Aktiviti Operasi dan Penyenggaraan Aset" data-content="PIF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Operasi dan Penyenggaraan Aset peringkat premis bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F7/1c)." data-placement="right"  data-icon="&#xe0f7;"></span>
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
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div></div>
                   <br>
                   <div class="control-group">
                    <label>6.0 Kawalan Rekod Penyenggaraan Aset  <span class="popover-pop" data-original-title="Kawalan Rekod Penyenggaraan Aset" data-content="Kawalan rekod penyenggaraan aset sebagaimana JKR.PATA.F7/1d." data-placement="right"  data-icon="&#xe0f7;"></span>
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
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div></div>
                   <br>
                   <div class="control-group">
                    <label>7.0 Rujukan  <span class="popover-pop" data-original-title="Rujukan" data-content="Sebarang dokumen yang dirujuk dalam penyediaan POPA sebagaimana JKR.PATA.F7/1e." data-placement="right"  data-icon="&#xe0f7;"></span>
                      </label>
                    <div class="wysiwyg-container">
                     <?php echo form_error('rujukan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'rujukan',
                                    'id'          => 'wysiwyg7',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div></div> 
                  </div>
              </div></div></div>
              </div><div class="next-prev-btn-container pull-right">
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
               

</div></div>
              <?php  echo form_close();?>
                </div>
         </div>
                </div>
   
   
  