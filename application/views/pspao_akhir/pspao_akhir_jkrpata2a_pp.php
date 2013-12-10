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
                         'name' => 'pspao_akhir_jkrpata2a_pp',
                           'id' => 'pspao_akhir_jkrpata2a_pp',
                        );
                    echo form_open('pspao/pspao_akhir_jkrpata2a_pp',$attributes); ?>
                    
                    
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
                    <button class="btn btn-danger input-top-margin" type="button"> Batal </button>
                    <a href="javascript:window.history.back()"><button class="btn btn-primary" type="button"> Sebelum </button></a>
                    <a href="<?php echo site_url('pspao/pspao_akhir_sunting_pp') ?>"><button class="btn btn-primary" type="button"> Seterusnya </button></a>
            	</div>
                

               <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>
          </div>

      

      