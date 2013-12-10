    

    
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


<div class="widget-body"><!--/tab navigation-->
          
 <ul class="nav nav-tabs no-margin myTabBeauty">
                     <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class="active"><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
         
          <div class="tab-content" id="myTabContent"><!--tab section-->
              <div id="ppun" class="tab-pane fade active in">
                  
                  
                  
                  <!--main container 1-->
  <div class="main-container">
     <!--big panel-->  
     <div class="row-fluid">
        <div class="span12">
           <div class="widget">
              <div class="widget-header">
                 <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Sila Kemaskini Maklumat Berikut
                 </div>
               </div>
             <div class="widget-body">
                 
                  <!--main container 2-->
      <div class="main-container">

                  
                 
                    <?php //echo validation_errors(); ?>
                     <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'kemaskini_tskopaktiviti_ppun',
                           'id' => 'kemaskini_tskopaktiviti_ppun',
                        );
                    echo form_open('ppun/kemaskini_tskopaktiviti_ppun',$attributes); ?>
                  
                  
                  <!--panel 1 -->
                    <div class="widget">
                  <div class="widget-body">
                  
                  <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Skop
                      </label>
                      <div class="controls">
                       <?php echo form_error('skop'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'skop',
                            'id'          => 'skop',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span9',
                            'placeholder' =>  'Ubah Suai Aset',
                              'disabled' => 'disabled'
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
                    
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Aktiviti
                      </label>
                      <div class="controls">
                      <?php echo form_error('aktiviti'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'aktiviti',
                            'id'          => 'aktiviti',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span9',
                            'placeholder' =>  'Reka bentuk dan skop kerja yang dilakukan',
                               'disabled' => 'disabled'
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
                    
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Butiran Aktiviti
                      </label>
                      <div class="controls">
                      <?php echo form_error('butir_aktiviti'); ?>
                        <?php
                          
                          $data = array(
                            'name'        => 'butir_aktiviti',
                            'id'          => 'butir_aktiviti',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span9',
                            'placeholder' =>  'Sumber Dalaman',
                               'disabled' => 'disabled'
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
                    
           </div>
               </div>
                <!-- end panel 2-->
                  
                     <!--panel 1-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Skop Dan Aktiviti Pemulihan/ Ubah Suai/ Naik Taraf Aset
                  </div>
                </div>
               <div class="widget-body">
                   
                   
                 <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Pihak Berkaitan
                      </label>
                      <div class="controls">
                       <?php echo form_error('p_kaitan'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'p_kaitan',
                            'id'          => 'p_kaitan',
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
                      <label class="control-label" for="report_range1">
                        Tanggungjawab
                      </label>
                      <div class="controls">
                      <?php echo form_error('tanggungjawab'); ?>
                       <?php 
                          $data = array(
                                    'name'        => 'tanggungjawab',
                                    'id'          => 'wysiwyg',
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
                  
                     <div class="control-group">
                      <label class="control-label">
                      	Tempoh Pelaksanaan
                      </label>
                      	<div class="controls">
                        <!--date mula-->
                        <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Mula
                      </label>
                      <div class="controls">
                        <div class="input-append">
                            <?php echo form_error('tarikh_mula'); ?>
                           <?php
                          
                          $data = array(
                            'name'        => 'tarikh_mula',
                            'id'          => 'tarikh_mula',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 report_range',
                            'placeholder' =>  'Pilih Tarikh',
                          );

                          echo form_input($data);
                          
                          ?>
                            
                            <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <!--date tamat-->
                    <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tamat
                      </label>
                      <div class="controls">
                        <div class="input-append">
                         <?php echo form_error('tarikh_akhir'); ?>
                             <?php
                          
                          $data = array(
                            'name'        => 'tarikh_akhir',
                            'id'          => 'tarikh_akhir',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 report_range',
                            'placeholder' =>  'Pilih Tarikh',
                          );

                          echo form_input($data);
                          
                          ?>
                            <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                 
                        </div>
                        </div>

             

                    <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Catatan
                      </label>
                      <div class="controls">
                     <?php echo form_error('catatan'); ?>
                        <?php 
                          $data = array(
                                    'name'        => 'catatan',
                                    'id'          => 'wysiwyg2',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 100px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                      </div>
                    </div>
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 2--> 
          
          
           <!--panel 3--> 
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Format Analisis Keperluan Sumber Pemulihan/ Ubah Suai/ Naik Taraf Aset
                  </div>
                </div>
               <div class="widget-body">
                  
                  <div class="control-group">
                      <label class="control-label">
                        Objek Sebagai
                      </label>
                      <div class="controls">
                       <?php echo form_error('objek_sebagai'); ?>
                          <?php $options = array(
                                ''  => '- Pilih Status -',
                                'sah'  => 'Bangunan dan Pembaikan Bangunan',
                                'pembetulan'    => 'Bekalan dan Bahan Lain',
                                'deraf'   => 'Perhubungan dan Utiliti',
                               
                              );

                          

                                echo form_dropdown('objek_sebagai', $options);

                                ?>
                      </div>
                    </div>


                    <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Bajet Aktiviti (RM)
                      </label>
                      <div class="controls">
                      <?php echo form_error('bajet_aktiviti'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'bajet_aktiviti',
                            'id'          => 'bajet_aktiviti',
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
                      <label class="control-label">
                        Sumber
                                              </label>
                      <div class="controls">
                          <?php echo form_error('sumber'); ?>
                         <?php $options = array(
                                ''  => '- Pilih Status -',
                                'JKR'  => 'JKR',
                                'KKR'    => 'KKR',
                                'JPS'   => 'JPS',
                               
                              );

                          

                                echo form_dropdown('sumber', $options);

                                ?>
                      </div>
                    </div>


                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Output
                      </label>
                      <div class="controls">
                      <?php echo form_error('output'); ?>
                        <?php 
                          $data = array(
                                    'name'        => 'output',
                                    'id'          => 'wysiwyg1',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 100px',
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
          <!--/.END panel 3--> 

          
           <!--panel 4-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Keperluan Sumber
                  </div>
                </div>
      <div class="widget-body">
        <form class="form-horizontal no-margin">
        <label>1. Sumber Manusia</label>
        <div class="row-fluid">
          <!--small panel 1-->
          <div class="span4">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Rancang</div>
               </div>
               <div class="widget-body">
               <div id="scrollbar-three">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                       
                   
                   
                  <label class="checkbox">
                   <a href="#myModal"  data-toggle="modal">   
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                      </a>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Adam Bin Daud";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Razali Bin Aziz";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                  

                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
               
                  
                       <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                </label>
            </div>
          </div>
          <!--/.END small panel 1-->
          
            <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p><label>Sila buat pemilihan untuk Leman Bin Ahmad</label> 
                      <label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Gaji</label>

                      <label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Gaji dan Kos Lebih Masa</label>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a></div>
                  </div><!-- end modal -->
          
           
          <!--small panel 2-->
          <div class="span4">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Lulus</div>
                </div>
                <div class="widget-body">
               <div id="scrollbar1">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                        
                   <label class="checkbox">
                    <a href="#myModal"  data-toggle="modal">  
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                      </a>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Adam Bin Daud";
                      ?>
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Razali Bin Aziz";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                   
                   
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                
                <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
              </div>
          </div>
          <!--/.END small panel 2-->
          <!--small panel 3-->
          <div class="span4">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Isi</div>
              </div>
             <div class="widget-body">
               <div id="scrollbar2">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                       

                  <label class="checkbox">
                   <a href="#myModal"  data-toggle="modal">  
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                      </a>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Adam Bin Daud";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Razali Bin Aziz";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Razali Bin Aziz";
                      ?>
                  </label>
 <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                   <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                   <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                   <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                  </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
               
                
                 <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                </label>
            </div>
          </div>
          <!--/.END small panel 3--> 
        </div> 
        <label>2. Pengurusan Pejabat</label>           
        <div class="row-fluid">
          <!--small panel 4-->
          <div class="span4">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Mesin Fotostat
                </div>
              </div>
              <div class="widget-body">
               <div id="scrollbar3">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                       <label class="checkbox">
                   
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Canon iR 5065";
                      ?>
                  </label>
                  <label class="checkbox">
                    
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Canon iR 5075";
                      ?>
                     
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Canon iR 7105";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Canon iR 7095";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Canon iR 7095";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                  <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Canon iR 7095";
                      ?>
                 
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Canon iR 7095";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Canon iR 7095";
                      ?>
                   
                  </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
            </div>
          </div>
          <!--/.END small panel 4--> 
          <!--small panel 5-->
             <div class="span4">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Fax</div>
                </div>
                <div class="widget-body">
               <div id="scrollbar4">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                       

                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Brother FAX-1270E";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "IntelliFAX 1840c";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Color Inkjet Fax Machine 123";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Color Inkjet Fax Machine";
                      ?>
                    
                  </label>
                   <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Color Inkjet Fax Machine";
                      ?>
                   
                  </label>
                   <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Color Inkjet Fax Machine";
                      ?>
                    
                  </label>
                   <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Color Inkjet Fax Machine";
                      ?>
                   
                  </label>
                   <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Color Inkjet Fax Machine";
                      ?>
                    
                  </label>
                   <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Color Inkjet Fax Machine";
                      ?>
                    
                  </label>
                
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                 <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
              </div>
          </div>
          <!--/.END small panel 5--> 
          <!--small panel 6-->
             <div class="span4">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Telefon</div>
                </div>
                <div class="widget-body">
               <div id="scrollbar5">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                       

                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "YLX_728 Black";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "CT-CID507";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "YLX-738 White";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "MT-102";
                      ?>
                    
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "MT-102";
                      ?>
                    
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "MT-102";
                      ?>
                    
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "MT-102";
                      ?>
                    
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "MT-102";
                      ?>
                    
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "MT-102";
                      ?>
                    
                  </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
              </div>
          </div>
          <!--/.END small panel 6-->
        </div> 
        <label>3. Peralatan Kerja</label>           
        <div class="row-fluid">
          <!--small panel 7-->
            <div class="span3">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Komputer</div>
                </div>
                <div class="widget-body">
               <div id="scrollbar6">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                        
                    <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Apple";
                      ?>
                  
                  </label>
                  <label class="checkbox">
                    
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "IBM";
                      ?>
                     
                  </label>
                  <label class="checkbox">
                   
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Lenovo";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                   
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Dell";
                      ?>
                   
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Dell";
                      ?>
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Dell";
                      ?>
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Dell";
                      ?>
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Dell";
                      ?>
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Dell";
                      ?>
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Dell";
                      ?>
                  </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
              </div>
          </div>
          <!--/.END small panel 7-->
          <!--small panel 8-->
            <div class="span3">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Pemeriksaan
                  </div>
                </div>
                <div class="widget-body">
               <div id="scrollbar7">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                       
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                  </label>

                <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Alat 1";
                      ?>
                  </label>

                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                 <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
              </div>
          </div>
          <!--/.END small panel 8-->
          <!--small panel 9-->
            <div class="span3">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Kenderaan</div>
                </div>
                <div class="widget-body">
               <div id="scrollbar8">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                       <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Proton Perdana Fuga";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Volkswagen";
                      ?>
                  </label>

                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                 <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
              </div>
          </div>
          <!--/.END small panel 9-->
          <!--small panel 10-->
            <div class="span3">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> PPE</div>
                </div>
                <div class="widget-body">
               <div id="scrollbar9">
                    <div class="scrollbar">
                      <div class="track">
                        <div class="thumb">
                          <div class="end">
                          </div>
                        </div>
                      </div>
                    </div>
             <div class="viewport">
               <div class="overview">
                         <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mask";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mask";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Shields";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mask";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mask";
                      ?>
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mask";
                      ?>
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mask";
                      ?>
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mask";
                      ?>
                  </label>
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mask";
                      ?>
                  </label>
                 
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
               <?php
                          
                          $data = array(
                            'name'        => 'kos',
                            'id'          => 'kos',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
              </div>
          </div>
          <!--/.END small panel 10--> 
        </div>                                               
        </form>
      </div>
              </div>
            </div>
          </div>
          <!--/.END panel 4-->  
          
      
            </div>  <!--main container 2-->
             
             </div>
             </div>  
             </div>
         </div>
     
     
      <div class="next-prev-btn-container pull-right">
     <a href="<?php echo site_url('ppun/tskopaktiviti_ptf_ppun') ?>">             
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
          <a href="<?php echo site_url('ppun/tskopaktiviti_ptf_ppun') ?>">
        <?php
        $simpan = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-warning2  input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Simpan'
        );

        echo form_button($simpan);
        
        ?>
          </a>
          <!--a href="<?php echo site_url('ppun/tskopaktiviti_ptf_ppun') ?>">
                 <?php
       /* $seterusnya = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary input-top-margin',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Seterusnya'
        );

        echo form_button($seterusnya);
        */
        ?>
          </a-->
                 
              </div>
<div class="clearfix"></div>
     
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

        </div><!--end tab section-->
        </div><!--/.END tab navigation-->





