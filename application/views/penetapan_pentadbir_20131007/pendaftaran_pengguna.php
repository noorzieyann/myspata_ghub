<!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'pendaftaran_pengguna',
                           'id' => 'pendaftaran_pengguna',
                        );
        echo form_open('pentadbir/pendaftaran_pengguna',$attributes); ?>
      <!--panel 1--> 
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Maklumat Pengguna 
                  </div>
                </div>
               <div class="widget-body">
                    <div class="control-group">
                      <label class="control-label control-label_2" for="namapengguna">
                        Nama Pengguna
                      </label>
                      <div class="controls controls_2">
                        
                        <?php echo form_error('namapengguna'); ?>
                        <?php
                          
                          $data = array(
                            'name'        => 'namapengguna',
                            'id'          => 'namapengguna',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => 'span6',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                          <span class="popover-pop" data-original-title="Tips: Nama Pengguna" data-content="Merujuk kepada MyKAD" data-placement="right"  data-icon="&#xe0f6;"></span>
                    </div>
                  </div>
                  
                    <div class="control-group">
                      <label class="control-label control-label_2" for="myid">
                        MyID
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('myid'); ?>
                        <?php
                          
                          $data = array(
                            'name'        => 'myid',
                            'id'          => 'myid',
                            'value'       => '',
                            'maxlength'   => '14',
                            'size'        => '50',
                            'class'       => 'span3',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                          <span class="popover-pop" data-original-title="Contoh:" data-content="821202024837" data-placement="right"  data-icon="&#xe0f6;"></span>
                    </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="notel">
                        No. Telefon
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('notel'); ?>
                        <?php
                          
                          $data = array(
                            'name'        => 'notel',
                            'id'          => 'notel',
                            'value'       => '',
                            'maxlength'   => '11',
                            'size'        => '50',
                            'class'       => 'span2',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                          <span class="popover-pop" data-original-title="Contoh:" data-content="60388881234 atau 0193937508" data-placement="right"  data-icon="&#xe0f6;"></span>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Maklumat Rasmi Jabatan 
                  </div>
                </div>
               <div class="widget-body">
                    
                    
                  <div class="control-group">
                      <label class="control-label control-label_2" for="kementerian">
                        Kementerian
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('kementerian'); ?>
                        <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
                      </div>
                    </div>

                    <div class="control-group">
                       <label class="control-label control-label_2">
                        <div class="input-append"><label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                            Jabatan
                          </label></div>
                          <div class="input-append"><label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            Agensi
                          </label></div>
                        </label>
                        <div class="controls controls_2">
                          <?php echo form_error('kementerian'); ?>
                        <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="negeri">
                        Jabatan/Agensi Negeri
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('negeri'); ?>
                        <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="daerah">
                        Jabatan/Agensi Daerah
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('daerah'); ?>
                        <?php echo form_dropdown('daerah', $daerah, 'id="daerah"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2">
                        Alamat Pejabat
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('alamat'); ?>
                      <textarea class="input-block-level" style="width: 400px; height: 100px"></textarea>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="emel">
                        E-mel
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('emel'); ?>
                        <?php
                          
                          $data = array(
                            'name'        => 'emel',
                            'id'          => 'emel',
                            'value'       => '',
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => 'span4',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                          <span class="popover-pop" data-original-title="Contoh:" data-content="Alamat e-mel yang sah. nama@jkr.com.my" data-placement="right"  data-icon="&#xe0f6;"></span>
                    </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="nopej">
                        No. Telefon Pejabat
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('nopej'); ?>
                        <?php
                          
                          $data = array(
                            'name'        => 'nopej',
                            'id'          => 'nopej',
                            'value'       => '',
                            'maxlength'   => '11',
                            'size'        => '50',
                            'class'       => 'span2',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                          <span class="popover-pop" data-original-title="Contoh:" data-content="60388881234" data-placement="right"  data-icon="&#xe0f6;"></span>
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
                  $daftar = array(
                      'name'    => '',
                      'id'      => 'confirm',
                      'class'   => 'btn btn-success',
                      'value'   => '',
                      'type'    => 'submit',
                      'content' => 'Daftar'
                  );

                  echo form_button($daftar);
                  
                  ?>
                  
                  <?php
                  $set = array(
                      'name'    => '',
                      'id'      => 'forever',
                      'class'   => 'btn btn-info',
                      'value'   => '',
                      'type'    => 'submit',
                      'content' => 'Setkan Semula'
                  );

                  echo form_button($set);
                  
                  ?>
                </div> 
                <!--/.END buttons--> 
                <?php  echo form_close();?> 
      </div>
      <!--/.END main-container-->  