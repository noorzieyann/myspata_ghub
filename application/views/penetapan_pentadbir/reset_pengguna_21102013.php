<!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'reset_pengguna',
                           'id' => 'reset_pengguna',
                        );
        echo form_open('pentadbir/reset_pengguna',$attributes); ?>
      <!--panel 1--> 
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Set Semula Katalaluan 
                  </div>
                </div>
               <div class="widget-body">
                    <div class="control-group">
                      <label class="control-label control-label_2" for="katalaluan">
                        Masukkan Katalaluan Baru
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('katalaluan'); ?>
                        <?php
                          
                          $data = array(
                            'name'        => 'katalaluan',
                            'id'          => 'katalaluan',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => 'span2',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                          <span class="popover-pop" data-original-title="Katalaluan Baru" data-content="Masukkan katalaluan yang baru" data-placement="right"  data-icon="&#xe0f6;"></span>
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
                            'placeholder' =>  '810305145660',
                          );

                          echo form_input($data);
                          
                          ?>
                          <span class="popover-pop" data-original-title="Contoh:" data-content="821202024837" data-placement="right"  data-icon="&#xe0f6;"></span>
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
                            'maxlength'   => '11',
                            'size'        => '50',
                            'class'       => 'span4',
                            'placeholder' =>  'Nadiah@jkr.gov.my',
                          );

                          echo form_input($data);
                          
                          ?>
                          <span class="popover-pop" data-original-title="Contoh:" data-content="Alamat e-mel yang sah. nama@jkr.com.my" data-placement="right"  data-icon="&#xe0f6;"></span>
                    </div>
                    </div>

               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 1-->

                <!--buttons--> 
                <div class="next-prev-btn-container pull-right">
                        <a href="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>">
                      <button class="btn btn-danger input-top-margin" type="button">
                        Batal</button></a>
                  
                  <?php
                  $tukar = array(
                      'name'    => '',
                      'id'      => 'kemaskini',
                      'class'   => 'btn btn-primary',
                      'value'   => '',
                      'type'    => 'submit',
                      'content' => 'Tukar Katalaluan'
                  );

                  echo form_button($tukar);
                  
                  ?>
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
      
     
      $("kemaskini").onclick = function () {
        reset();
        alertify.confirm("Kemaskini katalaluan?", function (e) {
          if (e) {

            window.location ="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>";
            
          } else {
            //alertify.error("");
          }
        });
        return false;
      };

</script>