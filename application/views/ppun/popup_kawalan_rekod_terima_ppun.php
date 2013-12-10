<?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'popup_dokumen_rujukan_ppun',
                           'id' => 'popup_dokumen_rujukan_ppun',
                        );
                    echo form_open('main/popup_dokumen_rujukan_ppun',$attributes); ?>


<div class="modal-body">
              <p>
				
                    <div class="control-group">
                      <label class="control-label">
                        Jenis Rekod
                      </label>
                      <div class="controls">
                        <?php
                          
                          $data = array(
                            'name'        => 'jenis_rekod',
                            'id'          => 'jenis_rekod',
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
                        Lokasi
                      </label>
                      <div class="controls">
                        <?php
                          
                          $data = array(
                            'name'        => 'lokasi',
                            'id'          => 'lokasi',
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
                    <hr>
                    <div class="control-group">
                      <label class="control-label">
                        Tempoh Penyimpanan
                      </label>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tarikh Mula
                      </label>
                      <div class="controls">
                        <div class="input-append">
                               <?php
                          
                          $data = array(
                            'name'        => 'tarikh_mula',
                            'id'          => 'tarikh_mula',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 date_picker',
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
                    <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tarikh Tamat
                      </label>
                      <div class="controls">
                        <div class="input-append">
                          <?php
                          
                          $data = array(
                            'name'        => 'tarikh_akhir',
                            'id'          => 'tarikh_akhir',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 date_picker',
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
                 
              </p>  
            </div>
  <div class="modal-footer">
                
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
        $simpan= array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-warning2',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Simpan Deraf'
        );

        echo form_button($simpan);
        
        ?>                     
</div>
   <?php  echo form_close();?>