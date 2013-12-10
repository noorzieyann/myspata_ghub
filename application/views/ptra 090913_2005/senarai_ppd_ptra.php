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
                         'name' => 'senarai_ppd_ptra',
                           'id' => 'senarai_ppd_ptra',
                        );
        echo form_open('ptra/senarai_ppd_ptra',$attributes); ?>
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
                      <label class="control-label" for="date_range1">
                        Tahun
                      </label>
                      <div class="controls">
                        <?php echo form_error('tahun'); ?>
                         <?php echo form_dropdown('tahun', $year_list, 'id="tahun"');?>
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
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' => 'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?>
                      
                      </div>
                    </div>
                    
                    
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Jabatan/Agensi
                      </label>
                      <div class="controls">
                        <?php echo form_error('jab_agensi'); ?>
                      <?php echo form_dropdown('jab_agensi', $jabatan, 'id="jab_agensi"');?>
                      </div>
                    </div>


                  <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Premis
                      </label>
                      <div class="controls">
                      <?php
                          
                          $data = array(
                            'name'        => 'premis',
                            'id'          => 'premis',
                            'value'       => '',
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
                    
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
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
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>

          <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Status
                      </label>
                      <div class="controls">
                        <?php echo form_error('status'); ?>
                        <?php echo form_dropdown('status', $status, 'id="status"');?>
                      </div>
                    </div>
                      
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
          <!--/.END panel 1-->

    <!--panel 2-->
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai PTRA
                </div>
              </div>
                <!--table section-->              
                <div class="widget-body">
                  <ul class="icomoon-icons-container">
                    <a href="status_premis_ptra"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li></a>
                  </ul><label class="tambah">Tambah PTRA</label>

                   <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                  <?php echo $this->table->generate($dataku); ?>
                  </div>
                  <!--/.END table-->

                  <!--pagination-->
                  <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 15 senarai</div>
                  <div class="pagination no-margin" align="right">
                  <!--/END pagination-->  
                  
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
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->

    <!-- ALERT -->
    <script type="text/javascript">
      //Alertify JS
      $ = function (id) {
        return document.getElementById(id);
      },
      reset = function () {
        $("toggleCSS").href = "<?php echo base_url() . 'asset/'; ?>css/alertify.core.css";
        alertify.set({
          labels: {
            ok: "Ya",
            cancel: "Tidak"
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: "ok"
        });
      };
      
     
      $("salinpp").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin kandungan rekod PTRA000001 kepada rekod baru?", function (e) {
          if (e) {
            alertify.success("Anda Klik Ya");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
      
      $("salinptf").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin kandungan rekod PTRA000002 kepada rekod baru?", function (e) {
          if (e) {
            alertify.success("Anda Klik Ya");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
      $("salinppd").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin kandungan rekod PTRA000003 kepada rekod baru?", function (e) {
          if (e) {
            alertify.success("Anda Klik Ya");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
     
</script>