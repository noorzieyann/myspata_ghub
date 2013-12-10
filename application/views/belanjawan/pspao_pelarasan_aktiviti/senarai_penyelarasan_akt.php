<!-- edited by seri 30082013 -->


<?php
  $attributes = array(
                      'class' => 'form-horizontal no-margin', 
                      'name'  => 'senarai_penyelarasan_akt',
                      'id'    => 'senarai_penyelarasan_akt',
                     );
                
                echo form_open('penyelarasan_akt/senarai_penyelarasan_akt',$attributes); ?>
                

<!-- div panel maklumat pspao START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Maklumat PSPA(O)
        </div>
      </div> 
                      
      <form class="form-horizontal no-margin">
        <div class="widget-body">


        
        <!-- row tahun mula, tahun akhir START -->
        <div class="control-group">
          <label class="control-label">
            Tahun Mula
          </label>
          <div class="controls">
            <label>
              <div class="input-append">
                <?php echo form_error('tahun'); ?> 
                <?php echo form_dropdown('tahun', $year_list, 'id="tempoh_mula"');?>  
              </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
            
            Tahun Akhir&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-append">
                <?php echo form_error('tahun'); ?> 
                <?php echo form_dropdown('tahun', $year_list, 'id="tempoh_akhir"');?>  
              </div>
            </label>
          </div>
        </div>
        <!-- row tahun mula, tahun akhir END -->



        <!-- row kementerian, jab/agensi START -->
        <div class="control-group">
          <label class="control-label">
            Kementerian
          </label>
          <div class="controls">
            <label>
              <div class="input-append">
                <?php echo form_error('kementerian'); ?> 
                <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>  
              </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
              
            Jabatan/Agensi&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-append">
                <?php echo form_error('jabatan'); ?> 
                <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?> 
              </div>     
            </label>
          </div>            
        </div>
        <!-- row kementerian, jab/agensi END -->
                          
                      

        <!-- row negeri, daerah START -->                  
        <div class="control-group">
          <label class="control-label">
            Negeri
          </label>
          <div class="controls">
            <label>
              <div class="input-append">
                <?php echo form_error('negeri'); ?> 
                <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>                    
              </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
        
            Daerah&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-append">
                <?php echo form_error('daerah'); ?> 
                <?php echo form_dropdown('daerah', $daerah, 'id="daerah"');?>                    
              </div>
            </label>
          </div>
        </div>
        <!-- row negeri, daerah END -->  
                          
        

        <!-- row premis, status START -->   
        <div class="control-group">
          <label class="control-label">
            Premis
          </label>
          <div class="controls">
            <label>
              <div class="input-append">
                <?php echo form_error('premis'); ?> 
                <?php echo form_dropdown('premis', $premis, 'id="premis"');?>                    
              </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;

            Status&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="input-append">
                <?php echo form_error('status'); ?> 
                <?php echo form_dropdown('status', $status, 'id="status"');?>                    
              </div>
            </label>
          </div>
        </div>
        <!-- row premis, status END -->  
        
                          
                          
        <!-- row kata carian START -->
        <div class="control-group"> 
          <label class="control-label">
            Kata Carian
          </label>
          <div class="controls">
            <?php
              $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => 'span8',
                            'placeholder' =>  '',
                           );

                      echo form_input($data);
            ?>
         
                 
            <div class="control-group ">
              <?php
                $seterusnya = array(
                                    'name'      => '',
                                    'id'        => '',
                                    'class'     => 'rounded pull-right ',
                                    'value'     => '',
                                    'content'   => ' Carian',
                                    'type'      => 'submit',
                                    'data-icon' => '&#xe07f;'
                                   );

                              echo form_button($seterusnya);
              ?>
            </div>
        
          </div>
 
          <?php  echo form_close();?>
                    
        </div>

        </div>

    </div>
  </div>
</div>
<!-- div panel maklumat pspao END -->

                 
                 
<!-- Senarai PSPAO START -->       
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Senarai PSPA(O) Akhir
        </div>
      </div>
                
              
      <div class="widget-body">
        <div id="dt_example" class="example_alt_pagination">
          <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
            <thead>
              <tr>
                <th style="width:5%">
                  Bil
                </th>
                <th style="width:10%">
                  Tahun Mula
                </th>
                <th style="width:10%">
                  Tahun Akhir
                </th>
                <th style="width:16%" class="hidden-phone">
                  Pemilik Dokumen 
                </th>
                <th style="width:18%" class="hidden-phone">
                  Kementerian
                </th>
                <th style="width:20%" class="hidden-phone">
                  Jabatan/Agensi
                </th>
                <th style="width:10%" class="hidden-phone">
                  Status
                </th>
                <th style="width:10%" class="hidden-phone">
                  Tindakan
                </th>
              </tr>
            </thead> 


            <tbody>
              <?php $i=1; if(!empty($senaraipspao1)) : foreach ($senaraipspao1 as $rec) : ?>
              <?php echo form_open('admin/update'); ?>
                        
                <tr>
                  <td align="left">
                    <?php echo $i++; ?>
                  </td>
                  <td>
                      <?php echo $rec->tahun_mula;?>
                  </td>
                  <td>
                    <?php echo $rec->tahun_akhir;?>
                  </td>
                  <td>
                    <?php if($getPemilikDoc = $this->penyelarasan_akt_model->get_pemilik_dokumen($rec->pspa_sedia_oleh_id))
                      foreach ($getPemilikDoc as $rr) 
                      echo $rr->nama_user;?>
                  </td>
                  <td>
                    <?php if($getkementerian = $this->penyelarasan_akt_model->get_kem_list($rec->idkem))
                      foreach ($getkementerian as $rr) 
                      echo $rr->namakem;?>
                  </td>
                  <td>
                    <?php if($getjabatan = $this->penyelarasan_akt_model->get_jab_list($rec->idjab_agensi))
                      foreach ($getjabatan as $rr) 
                      echo $rr->nama_jab_agensi;?>
                  </td>
                  <td>
                    
                    <span class="badge badge-info">
                      <?php
                        $get_status = $this->function_model->get_status_pelan($rec->pspa_id,0,0); 
                        echo $get_status;
                      ?>
                    </span>
                  </td>
                  <td align="center">



                    <?php
                          $sessionarray = $this->session->all_userdata();

                    if($sessionarray ['user_rolegroupid'] == 3)
                    {
                      echo ''?><ul class="icomoon-icons-container">
                                  <a href="<?php echo site_url('penyelarasan_akt/penyelarasan_akt_pp/'.$rec->pspa_id)?>">
                                    <li class="rounded">
                                      <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                      </span>
                                    </li>
                                  </a>
                                </ul>
                    <?php  ; } 



                    else if($sessionarray ['user_rolegroupid'] == 4)
                    {
                      echo ''?><ul class="icomoon-icons-container">
                                  <a href="<?php echo site_url('penyelarasan_akt/penyelarasan_akt_ptf/'.$rec->pspa_id)?>">
                                    <li class="rounded">
                                      <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                      </span>
                                    </li>
                                  </a>
                                </ul>
                    <?php ; } 

                    

                    else if($sessionarray ['user_rolegroupid'] == 6)
                    {
                      echo ''?><ul class="icomoon-icons-container">
                                  <a href="<?php echo site_url('penyelarasan_akt/penyelarasan_akt_pof/'.$rec->pspa_id)?>">
                                    <li class="rounded">
                                      <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                      </span>
                                    </li>
                                  </a>
                                </ul>
                    <?php ; } 



                    else if($sessionarray ['user_rolegroupid'] == 8)
                    {
                      echo ''?><ul class="icomoon-icons-container">
                                  <a href="<?php echo site_url('penyelarasan_akt/penyelarasan_akt_ppd/'.$rec->pspa_id)?>">
                                    <li class="rounded">
                                      <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                      </span>
                                    </li>
                                  </a>
                                </ul>
                    <?php ; } 



                    ?>



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
<!--Senarai PSPAO END --> 


                    

