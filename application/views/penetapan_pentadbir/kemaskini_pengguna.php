<!--main container-->
      <div class="main-container">

          <?php if (!empty($list_user1)) : foreach ($list_user1 as $rec) : ?>
                         <?php 
                            echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

                              if($this->session->flashdata('flashError'))
                                {
                                  echo '<div class="mws-form-message error">';
                                            echo '<i class="icol-ban"></i> ' .$this->session->flashdata('flashError');
                                            echo '</div>';
                                        }
                                        if($this->session->flashdata('flashComfirm'))
                                        {
                                            echo '<div class="mws-form-message success">';
                                            echo '<i class="icol-accept"></i> ' .$this->session->flashdata('flashComfirm');
                                            echo '</div>';
                                        }                                                   
                                ?>  
          
        <form id="" class="form-horizontal no-margin" action="kemaskini_pengguna" method="post" name="pentadbir/pendaftaran_pengguna">
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
                      <label class="control-label">
                        Nama Pengguna<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <?php echo form_input(array('name' => 'nama_user1', 'value' => set_value('nama_user', $rec->nama_user), 'class' => 'input-xlarge required')); ?>
                      
                      <span class="popover-pop" data-original-title="Tips: Nama Pengguna" data-content="Merujuk kepada MyKAD" data-placement="right"  data-icon="&#xe0f6;"></span>
                      <font color="red"><?php echo form_error('nama_user1'); ?></font>
                      </div>
                    </div>
                  
                    <div class="control-group">
                      <label class="control-label">
                        No.Kad Pengenalan<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <?php echo form_input(array('name' => 'noic', 'value' => set_value('nric', $rec->nric), 'class' => 'input-xlarge required')); ?>
                      
                          <span class="popover-pop" data-original-title="Contoh:" data-content="821202024837" data-placement="right"  data-icon="&#xe0f6;"></span>
                    <font color="red"><?php echo form_error('noic'); ?></font>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">
                        No.Telefon<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <?php echo form_input(array('name' => 'no_tel1', 'value' => set_value('no_tel', $rec->no_tel), 'class' => 'input-xlarge required')); ?>
                      
                          <span class="popover-pop" data-original-title="Contoh:" data-content="60388881234 atau 0193937508" data-placement="right"  data-icon="&#xe0f6;"></span>
                    <font color="red"><?php echo form_error('no_tel1'); ?></font>
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
                      <label class="control-label" for="kementerian">
                        Kementerian<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <select class="input-large required" name="idkem1"> 
                                                                <?php if($getKem = $this->pentadbir_model->get_kem_1($rec->idkem)) : foreach ($getKem as $row) :?>
                                                                <option value="<?php echo $rec->idkem; ?>"><?php echo $row->namakem; ?></option>
                                                                <?php endforeach; endif;
                                                                //die(); ?>
                                                            </select>
                      <font color="red"><?php echo form_error('idkem1'); ?></font>                              
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="negeri">
                        Negeri<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <select class="input-large required" name="idnegeri1"> 
                                                                <?php if($getNegeri = $this->pentadbir_model->get_negeri_1($rec->idnegeri)) : foreach ($getNegeri as $row) :?>
                                                                <option value="<?php echo $rec->idnegeri; ?>"><?php echo $row->namanegeri; ?></option>
                                                                <?php endforeach; endif;
                                                                //die(); ?>
                                                            </select>
                        <font color="red"><?php echo form_error('idnegeri1'); ?></font>
                                                    </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">
                        Alamat Pejabat<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <?php echo form_textarea(array('name' => 'alamat_pej1', 'value' => set_value('alamat_pej', $rec->alamat_pej), 'class' => 'input-xlarge required')); ?>
                      <font color="red"><?php echo form_error('alamat_pej1'); ?></font>
                      </div>
                    </div>
                   
                   <div class="control-group">
                      <label class="control-label">
                        No.Telefon Pejabat<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <?php echo form_input(array('name' => 'no_tel_pej1', 'value' => set_value('no_tel_pej', $rec->no_tel_pej), 'class' => 'input-xlarge required')); ?>
                      
                          <span class="popover-pop" data-original-title="Contoh:" data-content="60388881234" data-placement="right"  data-icon="&#xe0f6;"></span>
                    <font color="red"><?php echo form_error('no_tel_pej1'); ?></font>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">
                        E-mel<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <?php echo form_input(array('name' => 'user_email1', 'value' => set_value('user_email', $rec->user_email), 'class' => 'input-xlarge required')); ?>
                      
                          <span class="popover-pop" data-original-title="Contoh:" data-content="Alamat e-mel yang sah. nama@jkr.com.my" data-placement="right"  data-icon="&#xe0f6;"></span>
                    <font color="red"><?php echo form_error('user_email1'); ?></font>
                      </div>
                    </div>
                   
                   <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Status
                      </label>
                      <div class="controls">
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
          <input type="hidden" name="isaktif" value="1">
          <!--/.END panel 2-->

    <?php endforeach; ?>
          <?php endif; ?>
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
        </form>
          
      </div>
      </div>

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
        alertify.confirm("Adakah pasti ingin menyimpan?", function (e) {
          if (e) {
              
              //document.forms["arahan_penyediaan_pnpa"].submit();
            alertify.success("Telah dihantar");
           
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
    