<style>
    
    .sort_asc:after {
      content: "▲";
    }
    .sort_desc:after {
      content: "▼";
    }
  </style>

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
                    <li class="active"><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul> 
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container 1-->
  <div class="main-container">
     <!--big panel-->  
     <div class="row-fluid">
        <div class="span12">
           <div class="widget">
              <div class="widget-header">
                 <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Laporan Perancangan PSPA(O)
                 </div>
               </div>
             <div class="widget-body">
                
      <!--main container 2-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_laporan_pspao',
                           'id' => 'senarai_laporan_pspao',
                        );
                    echo form_open('laporan/senarai_laporan_pspao',$attributes); ?>
        <!--panel 1-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Carian Laporan Perancangan PSPA(O)
                  </div>
                </div>
                <div class="widget-body">

                  <!-- kementerian, negeri -->
                    <div class="control-group">
                      <label class="control-label">Kementerian</label>
                      <div class="controls">
                        <label>
                          <div class="input-append">
                            <?php echo form_error('kementerian'); ?>
                        <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
                          </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                          Negeri&nbsp;&nbsp;&nbsp;&nbsp;
                          <div class="input-append">
                            <?php echo form_error('negeri'); ?>
                        <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>
                          </div>
                        </label>
                      </div>
                    </div> 
                    <!--END kementerian, negeri --> 

                    <!-- status, daerah -->
                    <div class="control-group">
                      <label class="control-label">Status</label>
                      <div class="controls">
                        <label>
                          <div class="input-append">
                            <?php echo form_error('status'); ?>
                        <?php echo form_dropdown('status', $status, 'id="status"');?>
                          </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                          Daerah&nbsp;&nbsp;&nbsp;&nbsp;
                          <div class="input-append">
                            <?php echo form_error('daerah'); ?>
                        <?php echo form_dropdown('daerah', $daerah, 'id="daerah"');?>
                          </div>
                        </label>
                      </div>
                    </div> 
                    <!--END status, daerah -->

                    <!-- date -->
                    <div class="control-group">
                      <label class="control-label">Tempoh Mula</label>
                      <div class="controls">
                        <label>
                          <div class="input-append">
                            <?php echo form_dropdown('tahun', $year_list, 'id="tahun"');?>
                          </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                          Hingga&nbsp;&nbsp;&nbsp;&nbsp;
                          <div class="input-append">
                            <?php echo form_dropdown('tahun', $year_list, 'id="tahun"');?>
                          </div>
                        </label>
                      </div>
                    </div> 
                    <!--END date -->

                    <div class="control-group">
                      <label class="control-label" for="email1">
                        Kata Carian
                      </label>
                      <div class="controls">
                        <?php
                          
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => 'span8',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
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
                    
                  <?php  echo form_close();?>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>  Senarai Laporan Perancangan PSPA(O)
                </div>
              </div>
                <!--table section-->              
                <div class="widget-body">
                  <ul class="icomoon-icons-container pull-right">
                    <a href="#"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe1b2;"></span>
                    </li></a>
                    <a href="#"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span>
                    </li></a>
                    <a href="#"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe1b5;"></span>
                    </li></a>
                  </ul>
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
               </div>         
            </div>
           </div>
        </div>
     <!--/.END big panel-->
                <!--buttons--> 
                
                <!--/.END buttons--> 
     </div>  
  <!--/.END main-container 1-->
  </div>
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->