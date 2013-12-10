
<!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'agihan_belanjawan',
                           'id' => 'agihan_belanjawan',
                        );
        echo form_open('belanjawan/search',$attributes); ?>

<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                        
                    </span> 
                        Pelan Strategi Pengurusan Aset PSPA(O) Akhir
                </div>
            </div>
              
                <div class="widget-body">
                   <div class="control-group">
                    <label class="control-label" for="report_range1">
                        Tahun Mula
                    </label>
                    <div class="controls">
                    <?php echo form_error('tahunmula'); ?> 
                    <?php echo form_dropdown('tahunmula', $year_list, 'id="tahunmula"');?>
                     </div>
              </div>

                <div class="control-group">
                    <label class="control-label" for="report_range1">
                   Tahun Akhir
                     </label>
                    <div class="controls">
                    <?php echo form_error('tahunakhir'); ?> 
                        <?php echo form_dropdown('tahunakhir', $year_list, 'id="tahunakhir"');?>    
                    </div>
              </div>
                  
             <div class="control-group">
                    <label class="control-label">
                        Kementerian
                    </label>
                    <div class="controls">
                        <?php echo form_error('kementerian'); ?> 
                        <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
                    </div>
                </div>
                    
            
                <div class="control-group">
                    <label class="control-label" for="email1">
                        Kata Carian
                    </label>
                    <div class="controls">
                    <?php echo form_error('katacarian'); ?> 
                         <?php
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '',
                          );
                          echo form_input($data);
                          ?>
                    </div>
                </div>
                        
                        
                        
                <div class="control-group">
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
                                     
             <?php  echo form_close();?>
        </div>
    </div> 
  </div>
<!-- div panel PSPAO END -->

<!--START panel 2-->
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai PSPA(O) Akhir
                  </div>
                </div>
                <!--table-->
                <div class="widget-body">
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">
                            Bil
                          </th>
                          <th style="width:20%">
                            PSPAO Id
                          </th>
                          <th style="width:10%">
                            Tahun Mula
                          </th>
                          <th style="width:10%">
                            Tahun Akhir
                          </th>
                          <th style="width:8%" class="hidden-phone">
                            Tindakan
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_pspao)) : foreach ($senarai_pspao as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo 'PSPAO0000'. $rec->pspa_id; ?></td>
                                <td><?php echo $rec->tahun_mula; ?></td>
                                <td><?php echo $rec->tahun_akhir; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a href="<?php echo site_url('belanjawan/agihan_belanjawan_pp')?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                                    </ul>
                                </td>
                            </tr>
                            <?php echo form_close(); ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--END table-->
                    <div class="clearfix">
                    </div>
                    
              </div>
            </div>
          </div>
          <!--END panel 2-->
        
    </div>  
      <!--/.END main-container--> 
