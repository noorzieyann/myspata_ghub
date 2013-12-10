<!--main container-->
      <div class="main-container">
<?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'agihan_belanjawan_ppd_jab_premis1',
                           'id' => 'agihan_belanjawan_ppd_jab_premis1',
                        );
                    echo form_open('belanjawan/agihan_belanjawan/agihan_belanjawan_ppd_jab_premis1',$attributes); ?>
                 <!--start div panel 1-->
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Maklumat PSPA(O)
                      </div>
                      </div>
                      <div class="widget-body">
                          
                      <!--tahun mula, akhir--> 
                      <div class="control-group">
                      <label class="control-label">Tahun Mula</label>
                      <div class="controls">
                        <label>
                          <div class="input-append">
                            <input type="text" placeholder="2010" disabled/></div>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        Hingga&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="input-append">
                          <input type="text" placeholder="2011" disabled/>
                        </div>
                        </label>
                    </div> 
                      </div>
                      <!--END tahun mula, akhir--> 

                        <!--kementerian, jab/agensi--> 
                      <div class="control-group">
                      <label class="control-label">Kementerian</label>
                      <div class="controls">
                        <label>
                          <div class="input-append">
                            <input type="text" placeholder="Kementerian Kerja Raya" disabled/></div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                        Jabatan/Agensi&nbsp;&nbsp;&nbsp;&nbsp;
                        <div class="input-append">
                          <input type="text" placeholder="Jabatan Pengangkutan Jalan" disabled/>
                        </div>
                        </label>
                    </div> 
                      </div>
                       <!--END kementerian, jab/agensi-->
                       
                       <div class="control-group">
                      <label class="control-label">
                        Negeri
                      </label>
                      <div class="controls">
                        <div class="input-append">
                          <input type="text" placeholder="Selangor" disabled/>
                        </div>                      
                    </div>
                        
                    </div>
                    </div>
                    </div>
                  </div>
                 <!--end panel 1 -->
                 
          <!--START panel 2-->
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan JPJ Premis Daerah bagi Tahun 2011
                  </div>
                </div>
                <div class="widget-body">
                  <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Peruntukan Yang Belum Diagihkan (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="40,000.00">
                          </div>
                      </div>
                    </div>
                  <!--table-->
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                      <tr>
                        <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                        <th width="15%" class="hidden-phone" style="width:30%">Jabatan/Agensi Daerah</th>
                        <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Tindakan</th>
                                             
                    </thead>
                    <tbody>
                            <?php //$i=1; if(!empty($agihan)) : foreach ($agihan as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left">1<?php //echo $i++; ?></td>
                                <td>JPJ Gombak<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>10000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a href="#premis1"  data-toggle="modal"><li class="rounded">
                                            <span class="fs1" data-icon="&#xe082" aria-hidden="true"></span></li></a>
                                    </ul>
<!--popup 1-->
      <form id="" class="" action="" method="post">
        <div id="premis1" class="modal3 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Jabatan Pengangkutan Jalan Daerah Gombak
              </h4>
          </div>
            <div class="modal-body">
              <p>
        
                  <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan JPJ Premis Daerah bagi Tahun 2011
                  </div>
                </div>
                <div class="widget-body">
                  <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Mohon (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="10,000.00">
                          </div>
                      </div>
                  <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Peruntukan Yang Belum Diagihkan (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="10,000.00">
                          </div>
                      </div>
                    </div>
                  <!--table-->
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                      <tr>
                        <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                        <th width="15%" class="hidden-phone" style="width:30%">Jabatan/Agensi (Premis Negeri)</th>
                        <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>
                                             
                    </thead>
                    <tbody>
                            <?php //$i=1; if(!empty($agihan)) : foreach ($agihan as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left">1<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Gombak Setia<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>3000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">2<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Batu Caves<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>3000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">3<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Greenwood<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>2000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">4<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Batu Muda<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>2000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <?php //echo form_close(); ?>
                            <?php //endforeach; ?>
                            <?php //endif; ?>
                        </tbody>
                  </table>
                 <!--END table-->
                    <div class="clearfix">
                    </div>
                </div>
              </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
                
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
                <input type="submit" value="Batal" class="btn btn-danger input-top-margin"/>
                <input type="submit" value="Simpan" class="btn btn-warning2"/>            
            </div>
            <!--/.END button-->
        </div>
       </form>    
<!--/.END popup 1-->
                                </td>
                            </tr>
                            
                            <tr>
                                <td align="left">2<?php //echo $i++; ?></td>
                                <td>JPJ Klang<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>55000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a href="#premis2"  data-toggle="modal"><li class="rounded">
                                            <span class="fs1" data-icon="&#xe082" aria-hidden="true"></span></li></a>
                                    </ul>
<!--popup 2-->
      <form id="" class="" action="" method="post">
        <div id="premis2" class="modal3 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Jabatan Pengangkutan Jalan Daerah Klang
              </h4>
          </div>
            <div class="modal-body">
              <p>
        
                  <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan Jabatan/Agensi Negeri bagi Tahun 2011
                  </div>
                </div>
                <div class="widget-body">
                    <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Mohon (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="5,000.00">
                          </div>
                      </div>
                  <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Peruntukan Yang Belum Diagihkan (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="5,000.00">
                          </div>
                      </div>
                    </div>
                  <!--table-->
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                      <tr>
                        <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                        <th width="15%" class="hidden-phone" style="width:30%">Jabatan/Agensi (Premis Negeri)</th>
                        <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>
                                             
                    </thead>
                    <tbody>
                            <?php //$i=1; if(!empty($agihan)) : foreach ($agihan as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left">1<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Klang Lama<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>40000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">2<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Bukit Raja<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>55000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">3<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Bukit Tinggi<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>25000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">4<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Meru<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>30000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <?php //echo form_close(); ?>
                            <?php //endforeach; ?>
                            <?php //endif; ?>
                        </tbody>
                  </table>
                 <!--END table-->
                    <div class="clearfix">
                    </div>
                </div>
              </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
                
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
                <input type="submit" value="Batal" class="btn btn-danger input-top-margin"/>
                <input type="submit" value="Simpan" class="btn btn-warning2"/>            
            </div>
            <!--/.END button-->
        </div>
       </form>    
<!--/.END popup 2-->
                                </td>
                            </tr>
                            <tr>
                                <td align="left">3<?php //echo $i++; ?></td>
                                <td>JPJ Selayang<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>25000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a href="#premis3"  data-toggle="modal"><li class="rounded">
                                            <span class="fs1" data-icon="&#xe082" aria-hidden="true"></span></li></a>
                                    </ul>
<!--popup 3-->
      <form id="" class="" action="" method="post">
        <div id="premis3" class="modal3 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Jabatan Pengangkutan Jalan Daerah Selayang
              </h4>
          </div>
            <div class="modal-body">
              <p>
        
                  <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan Jabatan/Agensi Negeri bagi Tahun 2011
                  </div>
                </div>
                <div class="widget-body">
                    <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Mohon (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="5,000.00">
                          </div>
                      </div>
                  <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Peruntukan Yang Belum Diagihkan (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="5,000.00">
                          </div>
                      </div>
                    </div>
                  <!--table-->
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                      <tr>
                        <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                        <th width="15%" class="hidden-phone" style="width:30%">Jabatan/Agensi (Premis Negeri)</th>
                        <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>
                                             
                    </thead>
                    <tbody>
                            <?php //$i=1; if(!empty($agihan)) : foreach ($agihan as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left">1<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Bandar Baru Selayang<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>40000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">2<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Selayang Baru<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>55000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">3<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Selayang Height<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>25000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">4<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Selayang Lama<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>30000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <?php //echo form_close(); ?>
                            <?php //endforeach; ?>
                            <?php //endif; ?>
                        </tbody>
                  </table>
                 <!--END table-->
                    <div class="clearfix">
                    </div>
                </div>
              </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
                
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
                <input type="submit" value="Batal" class="btn btn-danger input-top-margin"/>
                <input type="submit" value="Simpan" class="btn btn-warning2"/>            
            </div>
            <!--/.END button-->
        </div>
       </form>    
<!--/.END popup 3-->
                                </td>
                            </tr>
                            <tr>
                                <td align="left">4<?php //echo $i++; ?></td>
                                <td>JPJ Shah Alam<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>30000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a href="#premis4"  data-toggle="modal"><li class="rounded">
                                            <span class="fs1" data-icon="&#xe082" aria-hidden="true"></span></li></a>
                                    </ul>
<!--popup 4-->
      <form id="" class="" action="" method="post">
        <div id="premis4" class="modal3 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Jabatan Pengangkutan Jalan Daerah Shah Alam
              </h4>
          </div>
            <div class="modal-body">
              <p>
        
                  <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan Jabatan/Agensi Negeri bagi Tahun 2011
                  </div>
                </div>
                <div class="widget-body">
                    <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Mohon (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="20,000.00">
                          </div>
                      </div>
                  <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Peruntukan Yang Belum Diagihkan (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="20,000.00">
                          </div>
                      </div>
                    </div>
                  <!--table-->
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                      <tr>
                        <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                        <th width="15%" class="hidden-phone" style="width:30%">Jabatan/Agensi (Premis Negeri)</th>
                        <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>
                                             
                    </thead>
                    <tbody>
                            <?php //$i=1; if(!empty($agihan)) : foreach ($agihan as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left">1<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Seksyen 13<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>40000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">2<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Seksyen 2<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>55000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">3<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Seksyen 7<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>25000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <tr>
                                <td align="left">4<?php //echo $i++; ?></td>
                                <td>Pejabat JPJ Seksyen 24<?php //if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td>30000.00<?php //echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
                            </tr>
                            <?php //echo form_close(); ?>
                            <?php //endforeach; ?>
                            <?php //endif; ?>
                        </tbody>
                  </table>
                 <!--END table-->
                    <div class="clearfix">
                    </div>
                </div>
              </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
                
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
                <input type="submit" value="Batal" class="btn btn-danger input-top-margin"/>
                <input type="submit" value="Simpan" class="btn btn-warning2"/>            
            </div>
            <!--/.END button-->
        </div>
       </form>    
<!--/.END popup 4-->
                                </td>
                            </tr>
                            <?php //echo form_close(); ?>
                            <?php //endforeach; ?>
                            <?php //endif; ?>
                        </tbody>
                  </table>
                 <!--END table-->
                    <div class="clearfix">
                    </div>
                </div>
              </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
          <!--END panel 2-->
                     
         <!--buttons--> 
                <div class="widget-body" align="right">
                    <a href="<?php echo site_url('belanjawan/agihan_belanjawan_ppd_jab_daerah')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Kembali
                  </button></a>
                  <a href="<?php echo site_url('belanjawan/agihan_belanjawan_ppd_jab_premis1')?>"><button class="btn btn-warning2 input-top-margin" type="button" id="hantar">
                    Simpan Deraf
                  </button></a>
                </div> 
                <!--/.END buttons--> 

                <?php //echo '<pre>'; print_r($this->session->all_userdata()); echo '</pre>'; ?>

    </div>  
      <!--/.END main-container--> 


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
      
     
      $("hantar").onclick = function () {
        reset();
        alertify.confirm("Adakah anda pasti untuk simpan?", function (e) {
          if (e) {
            
            window.location ="<?php echo site_url('belanjawan/agihan_belanjawan_ppd_jab_premis1') ?>";
            
          } else {
            alertify.error("");
          }
        });
        return false;
      };

      $("simpan").onclick = function () {
        reset();
        alertify.confirm("Adakah anda pasti untuk simpan?", function (e) {
          if (e) {
            window.location ="<?php echo site_url('belanjawan/noti') ?>";
          } 
          else {
            window.location ="<?php echo site_url('belanjawan/agihan_belanjawan_ppd_jab_premis1') ?>";
          }
        });
        return false;
      };
</script>