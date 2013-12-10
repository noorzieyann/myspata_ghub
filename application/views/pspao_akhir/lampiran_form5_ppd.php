               <div class="widget-body">
                  <div class="clearfix"></div>
                  <!--table-->


                    <?php $sessionarray = $this->session->all_userdata(); ?>
                    <?php if($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                  <a href="#myLampir" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe102;"> Tambah Lampiran</span>
                  </a>
                  	<?php } ?>

                  
                  
                  <div id="dt_example" class="example_alt_pagination" >
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table" >    
                      <thead>
                        <tr>
                          <th style="width:4%">Bil</th>
                          <th style="width:20%">Tajuk Dokumen</th>
                          <th style="width:20%">Nama Dokumen</th>
                          <?php if($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                          <th style="width:8%">Tindakan</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_dokumen)) : foreach ($senarai_dokumen as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo $rec->nama_fail; ?></td>
                                <td><a href="<?php echo $rec->lokasi_fail; ?>" target="_blank"><?php echo $rec->nama_fail_asal; ?></a></td>
                                <?php if($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a class="confirmation" href="<?php echo site_url('pspao/hapus_pspao_akhir_lampiran_form5_ppd/'.$rec->lampiran_id.'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$statusid);?>"><li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1" ></span></li></a>                                    
                                    </ul>
                                </td>
                                <?php } ?>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                  <!--END table-->
                  <div class="clearfix"></div>
                    
                  </div>
                </div>


                  <!-- Modal //xdok modal doh tu -->
                  <div id="myLampir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myLampirLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myLampirLabel">
                        Tambah Lampiran
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                      
                        <table width="100%">
                          <tr>
                            <td>1. Tajuk Dokumen</td>
                            <td width="30%"><?php echo form_input('namafile', '', 'class="input-xlarge" placeholder="Nama Fail"'); ?></td>
                          </tr>
                          <tr>
                            <td>2. Muat Naik Dokumen</td>
                            <td><?php echo form_upload('userfile', '', 'class="input-xlarge" placeholder="Nama Fail"') ?></td>
                          </tr>
                        </table>
                      	

                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>
                      <?php echo form_submit('hantar', 'Tambah','class="btn btn-primary"'); ?> 
                    </div>

                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
                  
