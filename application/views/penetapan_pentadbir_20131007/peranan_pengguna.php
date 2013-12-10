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
                         'name' => 'peranan_pengguna',
                           'id' => 'peranan_pengguna',
                        );
        echo form_open('pentadbir/peranan_pengguna',$attributes); ?>
      <!--panel 1--> 
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Peranan Pengguna 
                  </div>
                </div>
               <div class="widget-body">

                    <div class="control-group">
                      <label class="control-label control-label_2">
                        Modul
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('modul'); ?>
                        <?php echo form_dropdown('modul', $modul, 'id="modul"');?>
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
          <!--/.END panel 1-->


           <!--panel 2-->
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Peranan Pengguna
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

                <!--buttons--> 
                <div class="next-prev-btn-container pull-right">
                  <div class="widget-body" align="right">
                        <a href="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>" class="btn btn-danger input-top-margin" id="error">
                    Batal
                  </a>
                 
                  <a href="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>" class="btn btn-warning2 input-top-margin" id="confirm">
                    Simpan
                  </a>
                </div> 
              </div>
                <!--/.END buttons--> 

                <?php  echo form_close();?> 
      </div>
      <!--/.END main-container-->  