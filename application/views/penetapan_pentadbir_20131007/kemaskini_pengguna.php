<!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'kemaskini_pengguna',
                           'id' => 'kemaskini_pengguna',
                        );
        echo form_open('pentadbir/kemaskini_pengguna',$attributes); ?>
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
                        <?php
                          
                          $data = array(
                            'name'        => 'namapengguna',
                            'id'          => 'namapengguna',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => 'span6',
                            'placeholder' =>  'Sharifah Nadiah Syed Waris',
                          );

                          echo form_input($data);
                          
                          ?>
                           </div>
                  </div>
                  
                    <div class="control-group">
                      <label class="control-label control-label_2" for="nokp">
                        No. Kad Pengenalan
                      </label>
                      <div class="controls controls_2">
                        <?php
                          
                          $data = array(
                            'name'        => 'nokp',
                            'id'          => 'nokp',
                            'value'       => '',
                            'maxlength'   => '14',
                            'size'        => '50',
                            'class'       => 'span3',
                            'placeholder' =>  '830911145660',
                          );

                          echo form_input($data);
                          
                          ?>
                          </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="notel">
                        No. Telefon
                      </label>
                      <div class="controls controls_2">
                        <?php
                          
                          $data = array(
                            'name'        => 'notel',
                            'id'          => 'notel',
                            'value'       => '',
                            'maxlength'   => '11',
                            'size'        => '50',
                            'class'       => 'span2',
                            'placeholder' =>  '0123884628',
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Maklumat Rasmi Jabatan 
                  </div>
                </div>
               <div class="widget-body">
                    
                    <div class="control-group">
                      <label class="control-label control-label_2" for="negeri">
                        Kementerian
                      </label>
                      <div class="controls controls_2">
                     <?php $options = array(
                              
                                'kkr'  => 'Kementerian Kerja Raya',
                                'kkm'    => 'Kementerian Kesihatan'
                               
                              );

                          

                                echo form_dropdown('kem', $options);

                                ?>
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
                     <?php $options = array(
                              
                                'jkr'  => 'Jabatan Kerja Raya Malaysia',
                                'llm'    => 'Lembaga Lebuhraya Malaysia'
                               
                              );

                          

                                echo form_dropdown('kem', $options);

                                ?>
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
                      <textarea class="input-block-level" style="width: 400px; height: 100px" placeholder="CAWANGAN PERKHIDMATAN KEJURUTERAAN SENGGARA ARAS 3, BLOK CIBU PEJABAT JKR MALAYSIA JALAN SULTAN SALAHUDDIN 50582 KUALA LUMPUR"></textarea>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="emel">
                        E-mel
                      </label>
                      <div class="controls controls_2">
                        <?php
                          
                          $data = array(
                            'name'        => 'emel',
                            'id'          => 'emel',
                            'value'       => '',
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => 'span4',
                            'placeholder' =>  'Nadiah@jkr.gov.my',
                          );

                          echo form_input($data);
                          
                          ?>
                          </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="nopej">
                        No. Telefon Pejabat
                      </label>
                      <div class="controls controls_2">
                        <?php
                          
                          $data = array(
                            'name'        => 'nopej',
                            'id'          => 'nopej',
                            'value'       => '',
                            'maxlength'   => '11',
                            'size'        => '50',
                            'class'       => 'span2',
                            'placeholder' =>  '0326967164',
                          );

                          echo form_input($data);
                          
                          ?>
                          </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2" for="report_range1">
                        Status
                      </label>
                      <div class="controls controls_2">
                     <?php $options = array(
                              
                                'aktif'  => 'Aktif',
                                'tidakaktif'    => 'Tidak Aktif'
                               
                              );

                          

                                echo form_dropdown('status', $options);

                                ?>
                      </div>
                    </div>
                  
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 2-->

    
                <!--buttons--> 
                <div class="next-prev-btn-container ">
                <div class="widget-body" align="right">
                  <div class="widget-body" align="right">
                    <a href="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>" class="btn btn-danger input-top-margin" id="error">
                    Batal
                  </a>
                  <button class="btn btn-inverse hidden-tablet" type="button" id="hapus">
                    Hapus
                  </button>
                  <a href="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>" class="btn btn-warning2 input-top-margin" id="simpan">
                    Simpan
                  </a>
                </div>   
                </div>
                <!--/.END buttons-->
                <?php  echo form_close();?>
      </div>
      <!--/.END main-container--> 

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
      
     
      $("hapus").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghapuskan pengguna ini?", function (e) {
          if (e) {
            alertify.success("Maklumat pengguna telah dihapuskan");
            window.location ="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>";
            
          } else {
            //alertify.error("");
          }
        });
        return false;
      };


      $("simpan").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menyimpan maklumat pengguna ini?", function (e) {
          if (e) {
            alertify.success("Maklumat pengguna telah disimpan");
            window.location ="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>";
          } else {
            //alertify.error("");
          }
        });
        return false;
      };
      
     
</script>