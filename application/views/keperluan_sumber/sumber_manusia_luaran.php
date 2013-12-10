
                <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active"><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia') ?>">Sumber Manusia</a></li>
                    <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/tambahpejabat') ?>">Pengurusan Pejabat</a></li>
                    <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/tambahalatkerja') ?>">Peralatan Kerja</a></li>
                 </ul>
                  <div class="tab-content" id="myTabContent">
                    <div id="home" class="tab-pane fade active in">
                      <p>
                       <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia') ?>">Dalaman</a></li>
                    <li class="active"><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia_luaran') ?>">Luaran</a></li>
                   </ul>
                  <div class="tab-content" id="myTabContent">
                    <div id="home" class="tab-pane fade active in">
                    
                              <p> 
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
                 <!--start div panel PNPA -->
                   
                   
        <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Syarikat
                  </div>
                </div>
                <div class="widget-body">
                    
                    
                    <ul class="icomoon-icons-container">
                          <li><a href="#myModal" data-toggle="modal">
                            <span class="fs1" data-icon="&#xe102;" aria-hidden="true">  </span></a></li></ul>
                      <label class="tambah">Tambah Syarikat</label>
                      <div class="clearfix"></div>
               <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:3%">Bil</th>
                          <th style="width:16%">Nama Syarikat</th>
                          <th style="width:16%">No Pendaftaran</th>
                          <th style="width:16%" class="hidden-phone">Alamat Syarikat</th>
                          <th style="width:10%" class="hidden-phone">No Telefon</th>
                          <th style="width:10%" class="hidden-phone">No Fax</th>
                          <th style="width:16%" class="hidden-phone">Emel</th>
                          <th style="width:25%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($syarikat)) : foreach ($syarikat as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td align="left"><?php echo $rec->nama_syarikat; ?></td>
                                <td align="left"><?php echo $rec->no_pendaftaran; ?></td>
                                <td align="left"><?php echo $rec->alamat_syarikat; ?></td>
                                <td align="left"><?php echo $rec->notel; ?></td>
                                <td align="left"><?php echo $rec->nofax; ?></td>
                                <td align="left"><?php echo $rec->email; ?></td>
                                
                                <td align="left"><ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe026;" data-original-title="papar" href="<?php base_url(); ?>tambahstaf/<?php echo $rec->syarikat_id; ?>"></a>
                                    </span></li></ul><ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php base_url(); ?>kemaskinisyarikat/<?php echo $rec->syarikat_id; ?>"></a>
                                    </span></li></ul>
                                </td>
                            </tr>
                                <?php echo form_close(); ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div> 
                
                <!-- modal form untuk add syarikat -->
             <form id="" class="" action="sumber_manusia_luaran" method="post"> 
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Tambah Syarikat
                      </h4>
                      </div>
                      <!--start div modal body -->
                      <div class="modal-body">
                               
                                <table width="95%" border="0" align="center">
                                           
                                           <tr>
                                                   <td width="25%" valign="top"><label class="control-label">Nama Syarikat<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'nama_syarikat', 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nama_syarikat'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="25%" valign="top">
                                                        <label class="control-label">No Pendaftaran<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'no_pendaftaran',  'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('no_pendaftaran'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                                <tr>
                                                   <td width="25%" valign="top"><label class="control-label">Alamat Syarikat<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'alamat_syarikat',  'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('alamat_syarikat'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="25%" valign="top">
                                                        <label class="control-label">No Telefon<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'notel',  'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('notel'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                                <tr>
                                                   <td width="25%" valign="top"><label class="control-label">No Fax<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'nofax',  'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nofax'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="25%" valign="top">
                                                        <label class="control-label">Emel<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'email',  'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('email'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                              
                                </table>
                                   
                              
                          
                          </div><!--end div modal body -->
                         
                               <div class="modal-footer">
                                <input type="submit" value="Simpan" class="btn btn-warning2">
                              
                             </div>
                 
               <!--end div tab -->
                </div> 
             </form> 
                        
            </div>
                    
                  </div></p>
                    </div>
                    
                  </div>
                </div>
