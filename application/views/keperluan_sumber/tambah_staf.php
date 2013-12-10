
        <!--start div widget-body -->
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
                                    <?php if (!empty($syarikat)) : foreach ($syarikat as $rec) : ?> 
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
                         </p> 
                         
                         <div class="row-fluid">
                            <div class="span12">
                              <div class="widget">
                                <div class="widget-header">
                                  <div class="title">
                                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Maklumat Syarikat
                                  </div>
                                </div>
                                <div class="widget-body">
                                               <table width="95%" border="0" align="center">
                                                <tr>
                                                   
                                                    <td width="19%" valign="top" height="50">
                                                        <label class="control-label">Nama Syarikat<span class="required"></span></label>
                                                    </td>
                                                    <td width="33%">
                                                        <label class="control-label"><?php echo $rec->nama_syarikat; ?></label><br>
                                                    </td>
                                                    
                                                    <td width="17%" valign="top">
                                                        <label class="control-label">No Pendaftaran<span class="required"></span></label>
                                                   </td>
                                                   <td> <label class="control-label"><?php echo $rec->no_pendaftaran; ?></label><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Alamat Syarikat<span class="required"></span></label>
                                                   </td>
                                                   <td><label class="control-label"><?php echo $rec->alamat_syarikat; ?></label><br>
                                                    </td>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">No Telefon<span class="required"></span></label>
                                                   </td>
                                                   <td><label class="control-label"><?php echo $rec->notel; ?></label><br>
                                                  </td>
                                                </tr>
                                                
                                                 <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">No Fax<span class="required"></span></label>
                                                   </td>
                                                   <td><label class="control-label"><?php echo $rec->nofax; ?></label><br>
                                                    </td>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Emel<span class="required"></span></label>
                                                   </td>
                                                   <td><label class="control-label"><?php echo $rec->email; ?></label><br>
                                                  </td>
                                                </tr>
                                </table>
                                <?php endforeach; ?>
                                <?php endif; ?>
                <div class="clearfix">
                    </div>
                                </div>
                              </div>
                            </div>
                         <div class="clearfix">
                    </div>
                         <div class="clearfix">
                    </div>
                     
                    <div class="clearfix">
                    </div>
                             
           <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Staf
                  </div>
                </div>
                <div class="widget-body">
                         <ul class="icomoon-icons-container">
                          <li><a href="#myModal" data-toggle="modal">
                            <span class="fs1" data-icon="&#xe102;" aria-hidden="true">  </span></a></li></ul>
                      <label class="tambah">Tambah Staf</label>
                      <div class="clearfix"></div>
                         <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:3%">Bil</th>
                          <th style="width:16%">Nama</th>
                          <th style="width:16%" class="hidden-phone">No Kad Pengenalan</th>
                          <th style="width:16%" class="hidden-phone">Peranan</th>
                          <th style="width:16%" class="hidden-phone">Jawatan</th>
                          <th style="width:16%" class="hidden-phone">Disiplin/Bidang</th>
                          <th style="width:9%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($sumbermanusialuaran)) : foreach ($sumbermanusialuaran as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td align="left"><?php echo $rec->nama; ?></td>
                                <!--<td><?php //if($getKem = $this->utilitikeperluansumber_model->get_namasya($rec->syarikat_id)) foreach ($getKem as $rr) echo $rr->nama_syarikat;?></td> -->
                                <td align="left"><?php echo $rec->nric; ?></td>
                                <td><?php if($getjab = $this->utilitikeperluansumber_model->get_peranan($rec->kump_pengguna)) foreach ($getjab as $rr) echo $rr->nama_kump_pengguna;?></td>
                                <td align="left"><?php echo $rec->jawatan; ?></td>
                                <td><?php if($getNegeri = $this->utilitikeperluansumber_model->get_disiplin($rec->disiplin_bidang_id)) foreach ($getNegeri as $ro) echo $ro->bidang;?></td>
                                
                                <td align="center">
								<ul class="icomoon-icons-container"> 
									<li class="rounded"><span class="fs1">
                                    <a class="" aria-hidden="true" data-icon="&#xe1b2;" data-original-title="Muat Turun Surat Lantikan" href="<?php echo site_url(); ?>/utilitiKeperluanSumber/muat_suratlantikan/<?php echo $this->uri->segment(3); ?>/<?php echo $rec->utiliti_sumber_man_id; ?>"></a>
									</li>
									<li class="rounded"><span class="fs2">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php echo site_url(); ?>/utilitiKeperluanSumber/kemaskinisumbermanusialuaran/<?php echo $this->uri->segment(3) ?>/<?php echo $rec->utiliti_sumber_man_id; ?>"></a>
                                    </span>
									</li>
								</ul>
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
       
            <!-- <form id="" class="" action="<?php echo site_url(); ?>/utilitiKeperluanSumber/tambahstaf" method="post"> -->
      <!-- popup -->
      <?php echo form_open_multipart('utilitiKeperluanSumber/tambahstaf/'.$this->uri->segment(3));?>
			<input type="hidden" name="company" value="<?php echo $this->uri->segment(3); ?>">
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Tambah Staf
                      </h4>
                      </div>
                      <!--start div modal body -->
                      <div class="modal-body">
                             
                                <table width="95%" border="0" align="center">
                                            
                                           <tr>
                                                   <td width="17%" valign="top"><label class="control-label">Nama<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'nama', 'value' => set_value('nama', $this->session->userdata('nama')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nama'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                 
                                                 <tr>
                                                   <td width="17%" valign="top"><label class="control-label">No Kad Pengenalan<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'noic', 'value' => set_value('noic', $this->session->userdata('noic')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('noic'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                
                                             <tr>
                                                <td width="19%" valign="top" height="50"><label class="control-label">Peranan<span class="required"></span></label></td>
                                                <td width="33%">
                                                    <div class=""><select class="required large" name="peranan">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($peranan)) : foreach ($peranan as $rec) : ?>
                                                        <option value="<?php echo $rec->kump_pengguna; ?>"><?php echo set_value('nama_kump_pengguna', $rec->nama_kump_pengguna); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                                    </div><br>
                                                </td>
                                            </tr>
                                            <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Jawatan<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'jawatan', 'value' => set_value('jawatan', $this->session->userdata('jawatan')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('jawatan'); ?></font>
                                                        </div><br>
                                                  </td>
                                             </tr>
                                               
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Disiplin/Bidang<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class=""><select class="required large" name="disiplin">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($disiplin)) : foreach ($disiplin as $rec) : ?>
                                                        <option value="<?php echo $rec->disiplin_bidang_id; ?>"><?php echo set_value('kategori', $rec->bidang); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                                    </div><br>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                   <td width="17%" valign="top"><label class="control-label">Gaji<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'gaji', 'value' => set_value('gaji', $this->session->userdata('gaji')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('gaji'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Kos Lebih Masa<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'koslebihmasa', 'value' => set_value('koslebihmasa', $this->session->userdata('koslebihmasa')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('koslebihmasa'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Surat Lantikan<span class="required">* <br/>(pdf sahaja)</span></label>
                                                   </td>
                                                   <td><div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'userfile')); ?>
                                                        <font color="red"><?php echo form_error('userfile'); ?></font>
                                                         </div><br>
                                                  </td>
                                                </tr>
                                                <input type="hidden" name="sumber_id" value="2"> <?php if (!empty($syarikat2)) : foreach ($syarikat2 as $rec) : ?> <input type="hidden" name="syarikat_id" value="<?php echo $rec->syarikat_id; ?>"><?php endforeach; ?>
                                                        <?php endif; ?>
                                </table>
                                   
                              
                          
                          </div><!--end div modal body -->
                         
                               <div class="modal-footer">
                                <input type="submit" value="Simpan" class="btn btn-warning2">
                              
                             </div>
                 
               <!--end div tab -->
                </div> 
             </form>     
                                             
                        
                    </div>
               </div>
               </div>
                </div>
             <!--start panel Senarai -->
         <?php //echo '<pre>'; print_r($this->session->all_userdata()); echo '</pre>'; ?>      
                <!--end panel Senarai --> 
               <div class="clearfix"></div>
                    
                    </div>
                    
                  
              <!--end widget-body -->