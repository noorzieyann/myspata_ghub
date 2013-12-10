     <div class="widget-body" style="padding-bottom:10px">
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
                  </ul>
    </div>
    <!--END breadcrumb-->
		<div class="widget-body">                  
          <!--start div tab -->
                    <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'pspao_akhir_baru_5',
                           'id' => 'pspao_akhir_baru_5',
                        );
                    echo form_open('pspao/pspao_akhir_baru_5',$attributes); ?>
                    
                    
                 <!--start div panel PSPAO -->
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Format Pelan Pengurusan (PPA) (Operasi) Perancangan</div>
                      </div> 
                      <form class="form-horizontal no-margin">
                      <div class="widget-body">




                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Kementerian</label>
                        <div class="controls">
						<?php echo form_error('kementerian'); ?>
						<?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                   
                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Jabatan</label>
                        <div class="controls">
						<?php echo form_error('jabatan'); ?>
						<?php
                          
                          $data = array(
                            'name'        => 'jabatan',
                            'id'          => 'jabatan',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  'Jabatan Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                   
                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Negeri</label>
                        <div class="controls">
						<?php echo form_error('negeri'); ?>
						<?php
                          
                          $data = array(
                            'name'        => 'negeri',
                            'id'          => 'negeri',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  'Selangor',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                   
                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Daerah</label>
                        <div class="controls">
						<?php echo form_error('daerah'); ?>
						<?php
                          
                          $data = array(
                            'name'        => 'daerah',
                            'id'          => 'daerah',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  'Shah Alam',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                   
                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Premis</label>
                        <div class="controls">
						<?php echo form_error('premis'); ?>
						<?php
                          
                          $data = array(
                            'name'        => 'premis',
                            'id'          => 'premis',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  'Sekolah Kebangsaan Seksyen 9',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                    
                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">No. DPA</label>
                        <div class="controls">
						<?php echo form_error('nodpa'); ?>
						<?php
                          
                          $data = array(
                            'name'        => 'nodpa',
                            'id'          => 'nodpa',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  '1105101MYS.101200.BE0001',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>

                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Saiz Premis (luas/panjang/bilangan)</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'saizpremis',
                            'id'          => 'saizpremis',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  '-',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>

                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Populasi</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'populasi',
                            'id'          => 'populasi',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  '-',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>

                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Kos Perolehan (RM)</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'kosperolehan',
                            'id'          => 'kosperolehan',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  '-',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>

                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Nilai Semasa (RM)</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'nilai',
                            'id'          => 'nilai',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  '-',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>

                        <div class="control-group">
                          <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">Aset Khusus</label>
                        <div class="controls">
                          <?php echo form_error('asetkhusus'); ?> 
                          <?php echo form_dropdown('asetkhusus', $asetkhusus, 'id="asetkhusus"');?>
                        </div>
                        </div>

                        <div class="control-group">
                        <label class="control-label" style="width:300px; text-align:left; padding-left:10px;">No. DAK</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'nodak',
                            'id'          => 'nodak',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  'A01R01.T0502.01.01.001',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                       
                      </div>
</div>
<?php  echo form_close();?>
                    <!--end panel PSPAO -->
                    
                    
                    
</div>

              <!--start panel Senarai -->
                <div class="row-fluid">
                <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Anggaran Bajet yang Diperlukan (Tahun/RM)
                  </div>
                  </div>
                <div class="widget-body">
               		<div class="widget-body">
<?php /////////////////// START MODAL DOH SINI HOI! ///////////////////////  ?>                           
<style>
.modal{
	width: 760px !important;
	margin-left: -380px !important;
}
</style>
              	<div>
                  <a href="#myLampir" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe102;"> Tambah Lampiran</span>
                  </a>
                  
                  <!-- Modal //xdok modal doh tu -->
                  <div id="myLampir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myLampirLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myLampirLabel">
                        Anggaran Bajet
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                      
                        <div class="control-group">
                          <label class="control-label" style="width:480px; text-align:left; padding-left:10px;">Aset Khusus</label>
                        <div class="controls">
                          <?php echo form_dropdown('asetkhusus2', $asetkhusus, 'id="asetkhusus2"');?>
                        </div>
                        </div>
                      	
                        <div class="control-group">
                        <label class="control-label" style="width:480px; text-align:left; padding-left:10px;">No.DAK</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'nodak2',
                            'id'          => 'nodak2',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-large',
                            'placeholder' =>  'A01R01.T0502.01.01.001',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                        
                        <hr />


                        <div class="control-group">
                          <label class="control-label" style="width:480px; text-align:left; padding-left:10px;">1. Tahun</label>
                        <div class="controls">
                          <?php echo form_dropdown('tahun2', $year_list, 'id="tahun2"');?>
                        </div>
                        </div>

                        <div class="control-group">
                        <label class="control-label" style="width:600px; text-align:left; padding-left:10px;">2. Penerimaan Aset (RM)</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'penerimaan',
                            'id'          => 'penerimaan',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>

                        <div class="control-group">
                        <label class="control-label" style="width:600px; text-align:left; padding-left:10px;">3. Operasi & Penyenggaraan Aset (RM)</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'operasi',
                            'id'          => 'operasi',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>

                        <div class="control-group">
                        <label class="control-label" style="width:600px; text-align:left; padding-left:10px;">4. Penilaian Keadaan/Prestasi Aset (RM)</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'penilaian',
                            'id'          => 'penilaian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                        
                        <div class="control-group">
                        <label class="control-label" style="width:600px; text-align:left; padding-left:10px;">5. Pemulihan/Ubah Suai/ Naik Taraf Aset (RM)</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'pemulihan',
                            'id'          => 'pemulihan',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
                        
                        <div class="control-group">
                        <label class="control-label" style="width:600px; text-align:left; padding-left:10px;">6. Pelupusan Aset (RM)</label>
                        <div class="controls">
						<?php
                          
                          $data = array(
                            'name'        => 'pelupusan',
                            'id'          => 'pelupusan',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '60',
                            'class'       => 'input-small',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>


                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>
                      <button class="btn btn-warning2" data-dismiss="modal" type="button">Simpan Deraf</button>
                    </div>

                  </div></div>
                  <!-- Modal //xdok modal doh tu -->

<?php ///////////////////  END  MODAL SINI JAH ////////////////////////////  ?>
                      <div id="dt_example" class="example_alt_pagination">

                      <?php echo $this->table->generate($dataku); ?>
                       <div id="data-table_info" class="dataTables_info">Memaparkan <?php echo $this->uri->segment(3)+4; ?> dari <?php echo count($this->pspao_akhir_model->get_data_dummy()) ?> senarai
                       </div><?php echo $this->pagination->create_links(); ?>
 </div>
                  
                <!--end panel Senarai --> 
                 <div class="clearfix"></div>
                </div>
                </div>
                </div> 
                    
                <div class="next-prev-btn-container pull-right">
                    <a href="<?php echo site_url('pspao/pspao_akhir_baru_4') ?>"><button class="btn btn-danger input-top-margin" type="button"> Batal </button></a>
                    <a href="<?php echo site_url('pspao/pspao_akhir_baru_4') ?>"><button class="btn btn-primary" type="button"> Sebelum </button></a>
                    <a href="<?php echo site_url('pspao/pspao_akhir_baru_4') ?>"><button class="btn btn-primary" type="button"> Seterusnya </button></a>
            	</div>
                

               <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>
          </div>

      

      