<?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_penyelarasan_akt',
                           'id' => 'senarai_penyelarasan_akt',
                        );
                    echo form_open('penyelarasan_akt/senarai_penyelarasan_akt',$attributes); ?>
                 <!--start div panel PNPA -->
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Maklumat PSPA(O)
                      </div>
                      </div> 
                      <form class="form-horizontal no-margin">
                      <div class="widget-body">
                        

                        <div class="control-group">
                        <label class="control-label">Kementerian</label>
                        <div class="controls">
                            <?php echo form_error('kementerian'); ?> 
                            <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>  </div>
                        </div>
                    
                        <div class="control-group">
                        <label class="control-label">Jabatan/Agensi</label>
                        <div class="controls">
                            <?php echo form_error('jabatan'); ?> 
                          <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>                    
                        </div>
                        </div>
                          
                          <div class="control-group">
                        <label class="control-label">Negeri</label>
                        <div class="controls">
                            <?php echo form_error('negeri'); ?> 
                          <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>                    
                        </div>
                        </div>
                          
                          <div class="control-group">
                        <label class="control-label">Daerah</label>
                        <div class="controls">
                            <?php echo form_error('daerah'); ?> 
                          <?php echo form_dropdown('daerah', $daerah, 'id="daerah"');?>                    
                        </div>
                        </div>
                          
                        <div class="control-group">
                        <label class="control-label">Premis</label>
                        <div class="controls">
                            <?php echo form_error('premis'); ?> 
                          <?php echo form_dropdown('premis', $premis, 'id="premis"');?>                    
                        </div>
                        </div>
                          
                          
                       <div class="control-group">
                        <label class="control-label">Kata Carian</label>
                      <div class="controls">
                          <?php echo form_error('katacarian'); ?> 
                         <?php
                          
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-large',
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

                    <!--end panel PNPA -->
                    </div></div></div>
                 
                 
                 
                            <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Senarai PSPA(O) Awal
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
                  
                   <div id="dt_example" class="example_alt_pagination">   
                    <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:5%">Bil</th>
                        <th style="width:10%">Tempoh Mula</th>
                        <th style="width:10%">Tempoh Hingga</th>
                        <th style="width:30%">Pemilik Dokumen</th>
                        <th style="width:30%">Status</th>
                        <th style="width:25%">Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>2000</td>
                        <td>2005</td>
                        <td>Mohd Kamal Bin Ibrahim (Pegawai Teknikal Fasiliti)</td>
                        <td><span class="badge badge-info">Sah</span></td>
                        <td><a href="<?php echo site_url('penyelarasan_akt/penyelarasan_akt_pp') ?>"><ul class="icomoon-icons-container">
                                    <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></ul></a></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>2003</td>
                        <td>2007</td>
                         <td>Mohd Qahar Bin Sharudin (Pegawai Teknikal Fasiliti)</td>
                        <td><span class="badge badge-inverse">Pembetulan</span></td>
                        <td><a href="<?php echo site_url('penyelarasan_akt/penyelarasan_akt_ptf') ?>"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></ul></a></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>2004</td>
                        <td>2009</td>
                         <td>Mohd Tobib Bin Mastiki (Pegawai Teknikal Fasiliti)</td>
                        <td><span class="badge badge-pembetulan">Deraf</span></td>
                        <td><a href="<?php echo site_url('penyelarasan_akt/penyelarasan_akt_penyedia_doc') ?>"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></ul></a></td>
                      </tr>
                    </tbody>
                  </table>


                    <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai</div>
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                      <a id="data-table_first" class="first paginate_button paginate_button_disabled" tabindex="0">Pertama</a>
                      <a id="data-table_previous" class="previous paginate_button paginate_button_disabled" tabindex="0">Sebelum</a>
                      <span>
                      <a class="paginate_active" tabindex="0">1</a>
                      <a class="paginate_button" tabindex="0">2</a>
                      <a class="paginate_button" tabindex="0">3</a>
                      <a class="paginate_button" tabindex="0">4</a>
                      </span>
                      <a id="data-table_next" class="next paginate_button" tabindex="0">Seterusnya</a>
                      <a id="data-table_last" class="last paginate_button" tabindex="0">Akhir</a>
                      </div> 

                 
                     </div>
<div class="clearfix"> </div>
                  
         
             
          
              </div>
            </div>

          </div>
          
         

        </div>

 <?php  echo form_close();?>