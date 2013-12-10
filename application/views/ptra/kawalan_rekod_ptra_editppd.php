<!--breadcrumb-->
    <div class="widget-body">
                  <ul class="breadcrumb-beauty">
                    <li>
                      <a href="<?php echo site_url('main')?>">
                        Fungsi
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        Perancangan
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
                    <li>
                      <a href="#">
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
     
    <div class="clearfix"></div>
      <br/>
<?php if(!empty($tab)) { echo $tab;} ?>
    <?php 
  $form_name = 'ptra/kawalan_rekod_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
  if($this->uri->segment(5) != NULL){$form_name = 'ptra/kawalan_rekod_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
  $attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kawalan_rekod_ptra_editppd');
  echo form_open($form_name, $attributes);
?>
          
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
          
          
        <!--panel 1-->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Kawalan Rekod Penerimaan Aset
                </div>
              </div>
                <!--table section-->              
                <div class="widget-body"> 
                <ul class="icomoon-icons-container">
                    <a href="#myModal"  data-toggle="modal"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li>
                  </a>
                   </ul>
                   <label class="tambah">Tambah Kawalan Rekod</label>
                  <div class="controls2"></div>     
                  <div class="clearfix"></div>            
        
            
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                    <thead>
                      <tr>
                        <th style="width:4%">Bil</th>
                        <th style="width:30%" class="hidden-phone">Jenis Rekod</th>
                        <th style="width:10%" class="hidden-phone">Lokasi</th>
                        <th style="width:10%" class="hidden-phone">Tempoh Penyimpanan</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; if(!empty($senarai_kawalan)) : foreach ($senarai_kawalan as $rec) : ?>
                      <tr>
                        <td align="left"><?php echo $i++; ?></td>
                        <td><?php echo $rec->f6_1d_jenis_rekod; ?></td>
                        <td><?php echo $rec->f6_1d_lokasi; ?></td>
                        <td><?php echo $rec->tempoh; ?></td>
                        
                        <td align="center">
                          <ul class="icomoon-icons-container">
                           <li class="rounded">
                            <span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php echo site_url(); ?>/ptra/kemaskinikawalan_rekod_ppd/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php echo $rec->ptra_pata_f6_1d_id; ?>">
                                        </a>
                                    </span></li></ul>
                                </td>
                            </tr>
                            
                            <?php endforeach; ?>
                            <?php endif; ?>
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
        <!--/.END panel 1-->
                <!--start div button -->
                <div align="right">
                <a href="<?php echo site_url('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Kembali
                  </button></a>
                     <a href="<?php echo site_url('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-warning2 input-top-margin" type="button">
                        Simpan
                      </button></a>
                     </div>
                     <!--end div button -->   
    </div>
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->
    
    
     <!--popup-->
        <form id="" class="" action="kawalan_rekod_ptra/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4) ?>" method="post">
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Kawalan Rekod
              </h4>
          </div>
            <div class="modal-body">
              <p>
        
                    <div class="control-group">
                      <label class="control-label">
                        Jenis Rekod<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'jenis_rekod1', 'value' => set_value('f6_1d_jenis_rekod', $this->session->userdata('f6_1d_jenis_rekod')), 'class' => 'large required')); ?>
                      <font color="red"><?php echo form_error('jenis_rekod1'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Lokasi<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'lokasi1', 'value' => set_value('f6_1d_lokasi', $this->session->userdata('f6_1d_lokasi')), 'class' => 'large required')); ?>
                      <font color="red"><?php echo form_error('lokasi1'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Tempoh Penyimpanan<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'tempoh1', 'value' => set_value('tempoh', $this->session->userdata('tempoh')), 'class' => 'large required')); ?>
                      <font color="red"><?php echo form_error('tempoh1'); ?></font>
                      </div>
                    </div>
                    
              </p>  
            </div>
            <input type="hidden" name="no" value="<?php echo $this->uri->segment(4)?>">
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
            <input type="submit" value="Simpan" class="btn btn-warning2">            
            </div>
            <!--/.END button-->
        </div>
        </form>
    <!--/.END popup-->