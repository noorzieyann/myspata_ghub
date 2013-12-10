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
                    <li>
                      <a href="#">
                        PNPA
                      </a>   
                    </li>
                  </ul>
    </div>
   <div class="clearfix"></div>
      <br/>
    <!--breadcrumb--><?php if(!empty($tab)) { echo $tab;} ?>

     <?php 
  $form_name = 'pnpa/dokumen_rujukan_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
  if($this->uri->segment(5) != NULL){$form_name = 'pnpa/dokumen_rujukan_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
  $attributes = array('class' => 'form-horizontal no-margin', 'id' => 'dokumen_rujukan_pnpa');
  echo form_open_multipart($form_name, $attributes);
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Dokumen Rujukan</div>
              </div>
                <!--table section-->              
                <div class="widget-body">
                <ul class="icomoon-icons-container">
                    <a href="#myModal"  data-toggle="modal"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                      </li>
                    </a>
                   </ul>
                  </ul><label class="tambah">Tambah Dokumen Rujukan</label>
                  
        <!--popup-->
    <?php //echo form_open_multipart('pnpa/dokumen_rujukan_pnpa');?>
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Dokumen Rujukan
              </h4>
          </div>
            
              <p> 
        <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='pspa' >
        <input type='hidden' value='<?php echo $this->uri->segment(4); ?>' name='no' >
        <!--<input type="file" name="userfile"  />
        <input type="submit" value="upload" />-->
     
                   <div class="control-group">
                      <label class="control-label">
                        1. Tajuk Dokumen
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'nama_fail1', 'class' => 'large required')); ?>
                      <font color="red"><?php echo form_error('nama_fail'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'userfile', 'class' => 'large required')); ?>
                      <font color="red"><?php echo form_error('nama_fail_asal1'); ?></font>
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        2. Tajuk Dokumen
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'nama_fail2')); ?>
                      <font color="red"><?php echo form_error('nama_fail'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'userfile2')); ?>
                      <font color="red"><?php echo form_error('nama_fail_asal1'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        3. Tajuk Dokumen
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'nama_fail3')); ?>
                      <font color="red"><?php echo form_error('nama_fail'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'userfile3')); ?>
                      <font color="red"><?php echo form_error('nama_fail_asal1'); ?></font>
                    </div>
          </div>
                    <div class="control-group">
                      <label class="control-label">
                        4. Tajuk Dokumen
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'nama_fail4')); ?>
                      <font color="red"><?php echo form_error('nama_fail'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'userfile4')); ?>
                      <font color="red"><?php echo form_error('nama_fail_asal1'); ?></font>
            </div>
           </div>
                    <div class="control-group">
                      <label class="control-label">
                        5. Tajuk Dokumen
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'nama_fail5')); ?>
                      <font color="red"><?php echo form_error('nama_fail'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'userfile5')); ?>
                      <font color="red"><?php echo form_error('nama_fail_asal1'); ?></font>
            </div>
                    </div>
              </p>  
            
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
            <input type="submit" value="Simpan" class="btn btn-warning2"/>            
            </div>
            <!--/.END button-->
        </div>
        <!-- </form>-->
        <!--/.END popup-->
                                  
                  <!--table section-->              
                <div class="widget-body">

                   <div class="clearfix"></div>
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination" >
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table" >    
                      <thead>
                        <tr>
                          <th style="width:4%">Bil</th>
                          <th style="width:20%">Tajuk Dokumen</th>
                          <th style="width:20%">Nama Dokumen</th>
                          <th style="width:8%">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_dokumen)) : foreach ($senarai_dokumen as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo $rec->nama_fail; ?></td>
                                <td><a href="<?php echo site_url('pnpa/muat_dokumen_rujukan_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$rec->lampiran_id);?>"><?php echo $rec->nama_fail_asal; ?></a></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a class="confirmation" href="<?php echo site_url('pnpa/hapus_dokumen_rujukan_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$rec->lampiran_id);?>"><li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1" ></span></li></a>                                    
                                    </ul>
                                </td>
                            </tr>
                            <?php //echo form_close(); ?>
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
          <!--END panel 2-->
    
                <!--buttons--> 
                <div class="widget-body" align="right">
                    <a href="<?php echo site_url('pnpa/senarai_ppd_pnpa/'.$this->uri->segment(3))?>"><button class="btn btn-danger input-top-margin" type="button">
                                            Batal</button></a>
                  <a href="<?php echo site_url('pnpa/kawalan_rekod_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>
                  <a href="<?php echo site_url('pnpa/summary_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>"><button class="btn btn-primary input-top-margin" type="button">
                    Seterusnya
                  </button></a>
                   <a type="button" class="btn btn-warning2" href="#simpan" data-toggle="modal">Simpan Deraf</a>
                </div> 
                <!--/.END buttons--> 
                </div>  
      <!--/.END main-container-->                 
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->
<!-- modal untuk pengesahan -->           
<div id="simpan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
<h4 id="myModalLabel">Mesej Pengesahan</h4></div>
<div class="modal-body"><p>Adakah anda ingin menyimpan deraf PNPA ini?</p></div>
  <!--button-->
    <div class="modal-footer">
  <?php
    $batal = array(
      'name'    => '',
      'id'      => '',
      'class'   => 'btn btn-danger input-top-margin',
      'value'   => '',
      'type'    => 'button',
      'content' => 'Tidak',
      'data-dismiss'=>'modal'
    );

    echo form_button($batal);
    echo form_submit('hantar', 'Simpan Deraf','class="btn btn-primary"');
  ?>
                   
  </div>
    <!--/.END button-->
</div>
    <!-- ALERT -->
    <script type="text/javascript">
     var elems = document.getElementsByClassName('confirmation');
      var confirmIt = function (e) {
        if (!confirm('Ingin hapus Dokumen Rujukan?')) e.preventDefault();
      };
      for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
      }
      //Alertify JS
      /*$ = function (id) {
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
      
     
    $("hapus").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghapuskan dokumen ini?", function (e) {
          if (e) {
           //alertify.success("Anda klik Ya");
       self.location="<?php echo site_url('pnpa/hapus_dokumen_rujukan_pnpa/'.$this->uri->segment(3));?>";
          } 
        });
        return false;
      };
      
      
      $("hapus2").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghapuskan dokumen ini?", function (e) {
          if (e) {
            alertify.success("Anda klik Ya");
          } else {
            alertify.error("Anda klik Tidak");
          }
      
        });
        return false;
      };
      
      $("hapus3").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghapuskan dokumen ini?", function (e) {
          if (e) {
            alertify.success("Anda klik Ya");
          } else {
            alertify.error("Anda klik Tidak");
          }
        });
        return false;
      };
    
  
      
     */
</script>
 <?php echo form_close(); ?>