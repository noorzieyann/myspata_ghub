<style>
    
    .sort_asc:after {
      content: "▲";
    }
    .sort_desc:after {
      content: "▼";
    }
  </style>

<!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'pengurusan_pengguna',
                           'id' => 'pengurusan_pengguna',
                        );
        echo form_open('penetapan_pentadbir/pengurusan_pengguna',$attributes); ?>
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
                      <label class="control-label control-label_2" for="negeri">
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
                          <?php echo form_error('jabatan'); ?>
                        <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
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
                        Peranan Pengguna
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('peranan'); ?>
                        <?php echo form_dropdown('peranan', $peranan, 'id="peranan"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2">
                        Modul
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('modul'); ?>
                        <?php echo form_dropdown('modul', $modul, 'id="modul"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="email1">
                        Kata Carian
                      </label>
                      <div class="controls controls_2">
                        <?php
                          
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                        </div>
                      </div>

                        <div class="control-group ">
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Pengguna
                </div>
              </div>
                <!--table section-->              
                <div class="widget-body">
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                  <?php echo $this->table->generate($dataku); ?>
                  

                  </div>
                  <!--/.END table-->
                  <!--pagination-->
                  <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 15 senarai</div>
                  <!--<p>Memaparkan 5 dari 10 senarai</p>-->
                  <div class="pagination no-margin" align="right">
                     
                  
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        
                        <?php echo $this->pagination->create_links(); ?>                   
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 2-->
        <?php  echo form_close();?>
    </div>  
    <!--/.END main-container-->  