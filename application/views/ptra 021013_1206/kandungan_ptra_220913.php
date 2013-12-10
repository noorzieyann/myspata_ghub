  
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
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  
    <!--tab navigation--> 
    <div class="widget-body">
<ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'kandungan_ptra',
                           'id' => 'kandungan_ptra',
                        );
                    echo form_open('ptra/kandungan_ptra',$attributes); ?>
         <!--panel 1-->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penerimaan Aset (PTRA)
                  </div>
                </div>
                <div class="widget-body">
                  
                  <div class="control-group">
                      <label class="control-label" for="tahun">
                         Tahun
                      </label>
                      <div class="controls controls-row">
                        <?php echo form_error('tahun'); ?> 
                        <?php echo form_dropdown('tahun', $year_list, 'id="tahun"')?>
                      </div>
                      </div>
                      
                      <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Kementerian
                      </label>
                      <div class="controls">
                       <?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => '',
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' => 'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?>
                      
                      </div>
                    </div>           
                    
                     <div class="control-group">
                        
                     <label class="control-label" for="jabatan">
                    Jabatan/Agensi
                      </label>
                      <div class="controls">
                           <?php echo form_error('jab_agensi'); ?> 
                        <?php echo form_dropdown('jab_agensi', $jabatan, 'id="jab_agensi"');?>
                      </div>
                    </div>
                   
                   
                    <div class="control-group">
                        
                     <label class="control-label" for="premis">
                    Premis
                      </label>
                      <div class="controls">
                        <?php echo form_error('premis'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'premis',
                            'id'          => 'premis',
                            'value'       => '',
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            //'placeholder' => 'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?>
                      
                      </div>
                    </div>
                    
                    
                     <div class="control-group">
                        
                     <label class="control-label" for="no dpa">
                    No DPA
                      </label>
                      <div class="controls">
                           
                          <?php
                          
                          $data = array(
                            'name'        => 'nodpa',
                            'id'          => 'nodpa',
                            'value'       => '',
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '1105101MYS.101200.BE001',
                          );

                          echo form_input($data);
                          
                          ?>
                       
                      </div>
                    </div>
                </div>
              </div>
            </div>
         </div>
         <!--/.END panel 1-->

    <!--panel 2-->  
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
                      <label> 1.0 Pendahuluan  <span class="popover-pop" data-original-title="1.0 Pendahuluan" data-content="Menjelaskan maklumat mengenai premis berkaitan." data-placement="right" data-icon="&#xe0f7;"></span>
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
                      </div>
                  </div>

                  <div class="control-group">
                      <label>
                        2.0 Objektif  <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menjelaskan matlamat penerimaan aset kementerian/ jabatan/ agensi." data-placement="right"  data-icon="&#xe0f7;"></span>
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

                  <div class="control-group">
                      <label>3.0 Carta Organisasi Dan Pelan Komunikasi  <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penerimaan aset (Sebagaimana JKR.PATA.F6/1a)." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;"></span>
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
                   </div>
                  </div>

                  <div class="control-group">
                      <label>4.0 Skop Dan Aktiviti Penerimaan Aset  <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penerimaan Aset" data-content="PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut: (Sebagaimana JKR.PATA.F6/1b)" data-placement="right" data-icon="&#xe0f7;"></span>
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
                   </div>
                  </div>

                  <div class="control-group">
                      <label>5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset  <span class="popover-pop" data-original-title="5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset" data-content="PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Penerimaan Aset bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F6/1c)." data-placement="right" data-icon="&#xe0f7;"></span>
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
                   </div>
                  </div>

                  <div class="control-group">
                      <label>6.0 Kawalan Rekod Penerimaan Aset  <span class="popover-pop" data-original-title="6.0 Kawalan Rekod Penerimaan Aset" data-content="Kawalan rekod penerimaan aset sebagaimana JKR.PATA.F6/1d." data-placement="right" data-icon="&#xe0f7;"></span></span>
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
                   </div>
                  </div>

                  <div class="control-group">
                      <label>7.0 Rujukan  <span class="popover-pop" data-original-title="7.0 Rujukan" data-content="Sebarang dokumen yang dirujuk dalam penyediaan PTRA sebagaimana JKR.PATA.F6/1e." data-placement="right"data-icon="&#xe0f7;"></span>
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
                   </div>
                  </div>
                
              </div>               
            </div>
          </div>
        </div>
        <!--/.END panel 2-->

                <!--buttons--> 
                <div class="next-prev-btn-container pull-right">
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

                  <a href="<?php echo site_url('ptra/kat_bangunan_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>
                  
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
                <!--/.END buttons--> 

                <?php  echo form_close();?> 

      </div>  
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->