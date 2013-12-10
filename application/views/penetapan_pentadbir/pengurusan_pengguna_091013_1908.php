<style>
    
    .sort_asc:after {
      content: "▲";
    }
    .sort_desc:after {
      content: "▼";
    }
  </style>

<!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'pengurusan_pengguna',
                           'id' => 'pengurusan_pengguna',
                        );
        echo form_open('penetapan_pentadbir/pengurusan_pengguna',$attributes); ?>
      <!--panel 1--> 
      <?php /*
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
                      <label class="control-label control-label_2" for="negeri">
                        Kementerian
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('kementerian'); ?>
                        <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
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
                          <?php echo form_error('jabatan'); ?>
                        <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                      </div>
                    </div>
                  
                    <div class="control-group">
                      <label class="control-label control-label_2" for="negeri">
                        Jabatan/Agensi Negeri
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('negeri'); ?>
                        <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>
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
                        Peranan Pengguna
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('peranan'); ?>
                        <?php echo form_dropdown('peranan', $peranan, 'id="peranan"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2">
                        Modul
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('modul'); ?>
                        <?php echo form_dropdown('modul', $modul, 'id="modul"');?>
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
          </div>
          <!--/.END panel 1-->
	  */?>

          <!--panel 2-->
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Pengguna
                </div>
              </div>
                <!--table section-->              
                <div class="widget-body">
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                  
                  	<table class="table table-bordered table-striped">
                    	<tr>
                        	<th>Bil.</th>
                        	<th>Nama Pengguna</th>
                        	<th>e-Mail</th>
                        	<th>Status</th>
                            <?php if($sesm[0]['menu_kemaskini[0]'] == 1){ ?>
                        	<th>Tindakan</th>
                            <?php } ?>
                        </tr>
                        <?php $i = 1 ?>
                        <?php foreach($rowdt as $row){ ?>
                    	<tr>
                        	<td><?php echo $i ?></td>
                        	<td><?php echo $row->nama_user ?></td>
                        	<td><?php echo $row->user_email ?></td>
                        	<td><?php echo $this->pentadbir_model->get_status($row->isaktif) ?></td>
                            <?php if($sesm[0]['menu_kemaskini[0]'] == 1){ ?>
                        	<td>
							  <?php
							  	echo '<ul class="icomoon-icons-container">';
								echo '<a href="'.site_url('pentadbir/reset_pengguna/'.$row->myspata_userid).'"><li class="rounded"><span class="fs1" data-icon="&#xe08f" aria-hidden="true"></span></li></a>';
								echo '<a href="'.site_url('pentadbir/peranan_pengguna/'.$row->myspata_userid).'"><li class="rounded"><span class="fs1" data-icon="&#xe075" aria-hidden="true"></span></li></a>';
								echo '<a href="'.site_url('pentadbir/kemaskini_pengguna/'.$row->myspata_userid).'"><li class="rounded"><span class="fs1" data-icon="&#xe005" aria-hidden="true"></span></li></a>';
                             	echo '</ul>';
							  ?>
                            </td>
                            <?php } ?>
                        </tr>
                        <?php $i++; ?>
                        <?php } ?>
                    </table>                  

                  </div>
                  <!--/.END table-->
                  <!--pagination-->
                  <!--<p>Memaparkan 5 dari 10 senarai</p>-->
                  <div class="pagination no-margin" align="right">
                     
                  
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 2-->
        <?php  echo form_close();?>
    </div>  
    <!--/.END main-container-->  