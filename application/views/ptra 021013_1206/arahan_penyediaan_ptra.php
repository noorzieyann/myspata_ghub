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
                         'name' => 'arahan_penyediaan_ptra',
                           'id' => 'arahan_penyediaan_ptra',
                        );
        echo form_open('ptra/arahan_penyediaan_ptra',$attributes); ?>
        <!--panel 1-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span>  Sila Pilih Penerima Arahan Penyediaan PTRA
                  </div>
                </div>
                <div class="widget-body">
                    <div class="control-group">
                      <label class="control-label control-label_2">
                        Kementerian
                      </label>
                      <div class="controls controls_2">
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
                      <label class="control-label control-label_2">
                        Jabatan/Agensi
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('jabatan'); ?>
                        <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="negeri">
                        Negeri
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('negeri'); ?>
                        <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label control-label_2" for="DateOfBirthMonth">
                        Daerah
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('daerah'); ?>
                        <?php echo form_dropdown('daerah', $daerah, 'id="daerah"');?>
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
                        <div class="control-group ">
                          <?php
                              $seterusnya = array(
                                  'name'    => '',
                                  'id'      => '',
                                  'class'   => 'rounded pull-right',
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>  Senarai Penerima Arahan
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
                  <div class="pagination no-margin" align="right">
                   <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        <?php echo $this->pagination->create_links(); ?>  
                  <!--/END pagination-->  
                
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 2-->
    
                <!--buttons--> 
                <div class="widget-body" align="right">
                  <a class="btn btn-success input-top-margin" href="#" id="hantar">
                    Hantar
                  </a>
                </div> 
                <!--/.END buttons--> 
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
            ok: "OK",
            cancel: "Tidak"
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: "ok"
        });
      };
      
     
       $("hantar").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghantar Pelan Penerimaan Aset ini?", function (e) {
          if (e) {
              
              //document.forms["arahan_penyediaan_pnpa"].submit();
            alertify.success("Arahan penyediaan telah dihantar");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
      
      $("simpan").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menyimpan Pelan Pemulihan / Ubah Suai / Naik Taraf Aset ini?", function (e) {
          if (e) {
              
              document.forms["summary_ppun"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
</script>