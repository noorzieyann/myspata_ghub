<!--main container-->
      <div class="main-container">
          
          <?php 
                        //echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

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

        <form id="" class="form-horizontal no-margin" action="pendaftaran_pengguna" method="post" name="pentadbir/pendaftaran_pengguna">
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
                      <div class="controls"><?php echo form_input(array('name' => 'nama_user1', 'value' => set_value('nama_user', $this->session->userdata('nama_user')), 'class' => 'input-xlarge required')); ?>
                      
                      <span class="popover-pop" data-original-title="Tips: Nama Pengguna" data-content="Merujuk kepada MyKAD" data-placement="right"  data-icon="&#xe0f6;"></span>
                      <font color="red"><?php echo form_error('nama_user1'); ?></font>
                      </div>
                    </div>
                  
                    <div class="control-group">
                      <label class="control-label">
                        MyID<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'uname1', 'value' => set_value('uname', $this->session->userdata('uname')), 'class' => 'input-medium required')); ?>
                      
                          <span class="popover-pop" data-original-title="Contoh:" data-content="821202024837" data-placement="right"  data-icon="&#xe0f6;"></span>
                    <font color="red"><?php echo form_error('uname1'); ?></font>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">
                        No.Telefon<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'no_tel1', 'value' => set_value('no_tel', $this->session->userdata('no_tel')), 'class' => 'input-medium required')); ?>
                      
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
                          <select class="required large" name="idkem1">
                                                        <option value="">- Sila Pilih -</option>
                                                        <?php if(!empty($kementerian)) : foreach ($kementerian as $rec) : ?>
                                                        <option value="<?php echo $rec->idkem; ?>"><?php echo set_value('namakem', $rec->namakem); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                      <font color="red"><?php echo form_error('idkem1'); ?></font>                              
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="negeri">
                        Negeri<span class="required">*</span>
                      </label>
                      <div class="controls">
                          <select class="required large" name="idnegeri1">
                                                        <option value="">- Sila Pilih -</option>
                                                        <?php if(!empty($negeri)) : foreach ($negeri as $rec) : ?>
                                                        <option value="<?php echo $rec->idnegeri; ?>"><?php echo set_value('namanegeri', $rec->namanegeri); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                        <font color="red"><?php echo form_error('idnegeri1'); ?></font>
                                                    </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">
                        Alamat Pejabat<span class="required">*</span>
                      </label>
                      <div class="controls">
                      <textarea class="input-block-level" style="width: 400px; height: 100px" name="alamat_pej1"></textarea>
                      <font color="red"><?php echo form_error('alamat_pej1'); ?></font>
                      </div>
                    </div>
                   
                   <div class="control-group">
                      <label class="control-label">
                        No.Telefon Pejabat<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'no_tel_pej1', 'value' => set_value('no_tel_pej', $this->session->userdata('no_tel_pej')), 'class' => 'input-medium required')); ?>
                      
                          <span class="popover-pop" data-original-title="Contoh:" data-content="60388881234" data-placement="right"  data-icon="&#xe0f6;"></span>
                    <font color="red"><?php echo form_error('no_tel_pej1'); ?></font>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">
                        E-mel<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'user_email1', 'value' => set_value('user_email', $this->session->userdata('user_email')), 'class' => 'input-medium required')); ?>
                      
                          <span class="popover-pop" data-original-title="Contoh:" data-content="Alamat e-mel yang sah. nama@jkr.com.my" data-placement="right"  data-icon="&#xe0f6;"></span>
                    <font color="red"><?php echo form_error('user_email1'); ?></font>
                      </div>
                    </div>
                  
               </div>
              </div>
            </div>
          </div>
          <input type="hidden" name="isaktif" value="1">
          <!--/.END panel 2-->

    
                <!--buttons--> 
                <div class="widget-body" align="right">
                <input type="submit" value="Simpan" class="btn btn-warning2">
                <input type="reset" value="Setkan Semula" class="btn btn-info">  
                  
                </div> 
                <!--/.END buttons--> 
        </form>
      </div>
      <!--/.END main-container-->  