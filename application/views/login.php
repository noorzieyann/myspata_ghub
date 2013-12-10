          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe088;"></span> Log Masuk
                  </div>
                </div>
                <div class="widget-body">
                  <div class="row-fluid">
                    <div class="span6 offset3">
                      <div class="signup">
                        <?php echo form_open(site_url('auth/login'),'class="signup-wrapper"') ?>
                          <div class="header" style="margin-bottom:0px;">
                            <h2>Log Masuk</h2>
                            <p>Sila masukkan No/KP dan kata laluan yang sah untuk menggunakan sistem<p>
                          </div>
                          <div class="content">
                            <?php echo form_input(array('id' => 'username', 'name' => 'username')) ?>
                            <?php echo form_password(array('id' => 'password', 'name' => 'password')) ?>
                          </div>
<?php 
	if($this->session->flashdata('login_error')){
		echo "<span style=\"color:red\">No KP dan Kata Laluan tidak sah!</span>";
	}
	echo validation_errors(); 
?>
                          <div class="actions">
                            <?php echo form_submit(array('name' => 'submit'), 'Log Masuk','class="btn btn-info btn-small"') ?>
                            <span class="checkbox-wrapper">
                              <a href="#" class="pull-left">Lupa Katalaluan</a><a href="<?php echo site_url('pentadbir/pendaftaran_pengguna') ?>">Daftar Pengguna</a>
                            </span>
                            <div class="clearfix"></div>
                          </div>
                        <?php echo form_close(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
