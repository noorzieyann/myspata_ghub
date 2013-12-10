<!--main container-->
      <div class="main-container">
<?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'agihan_belanjawan_pp_lulus',
                           'id' => 'agihan_belanjawan_pp_lulus',
                        );
                    echo form_open('belanjawan/agihan_belanjawan/agihan_belanjawan_pp_lulus',$attributes); ?>
                 <!--start div panel PNPA -->
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Sila Kemaskini Maklumat Berikut
                      </div>
                      </div>
                      <div class="widget-body">
                        
                      <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Tahun Mula
                      </label>
                      <div class="controls">
                          <label>
                            <input type="text" placeholder="2010" disabled/>
                        Hingga
                          <input type="text" placeholder="2011" disabled/>
                          </label>
                        </div>
                    </div>   

                        <div class="control-group">
                        <label class="control-label">Kementerian</label>
                        <div class="controls">
                             <input class="input-large" type="text" placeholder="Kementerian Kerja Raya" disabled> </div>
                        </div>
                    
                        
                          
                        <div class="control-group">
                        <label class="control-label">PSPA(O)</label>
                        <div class="controls">
                             <input class="input-large" type="text" placeholder="PSPA00001" disabled>                   
                        </div>
                        </div>
                      
                      
                    <!--end panel PNPA -->
                    </div></div></div></div>
                 
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Agihan Belanjawan
                      </div>
                      </div> 
                      
                      <div class="widget-body">
                       <div class="control-group">
                        <label class="control-label" for="kementerian">Tahun</label>
                          <div class="controls">
                            <input class="input-large" type="text" placeholder="2011" disabled>
                        </div>
                        </div>
                      </div>

                      <div class="widget-body">
                       <div class="control-group">
                        <label class="control-label" for="kementerian">Mohon (RM)</label>
                          <div class="controls">
                            <input class="input-large" type="text" placeholder="800,000.00" disabled>
                        </div>
                        </div>
                          
                          <div class="control-group">
                        <label class="control-label" for="kementerian">Terima (RM)</label>
                          <div class="controls">
                            <input class="input-large" type="text" placeholder="740,000.00" disabled>
                            </div>
                          </div>
                        </div>

                    <!--end panel agihan -->
                    </div></div></div>
                 
                 
          <!--START panel 2-->
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan
                  </div>
                </div>
                  <!--table-->
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left">    
                      <thead>
                      <tr>
                        <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                        <th width="15%" class="hidden-phone" style="width:30%">Kementerian</th>
                        <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>
                                             
                    </thead>
                    <tbody>
                            <?php //$i=1; if(!empty($agihan)) : foreach ($agihan as $rec) : ?>
  
                        
                            <tr>
                                <td align="left">1<?php //echo $i++; ?></td>
                                <td>Kementerian Kerja Raya</td>
                                <td>370,000.00</td>
                                <td>350,000.00</td>
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

          <!--START panel 2-->
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Agihan Belanjawan
                  </div>
                </div>
                  <!--table-->
                  <div class="widget-body">
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                      <tr>
                        <th width="13%"  class="hidden-phone" style="width:4%">Bil</th>
                        <th width="15%" class="hidden-phone" style="width:30%">Jabatan/Agensi</th>
                        <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>
                                             
                    </thead>
                    <tbody>
                            <?php $i=1; if(!empty($agihan)) : foreach ($agihan as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td><?php echo $rec->jum_kos_mohon; ?></td>
                                <td><?php echo $rec->jum_kos_terima; ?></td>
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
                <!--/.END table section-->
              </div>
            </div>
          </div>
          <!--END panel 2-->
                     
          <!--panel 3-->
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Catatan
                  </div>
                </div>
                <div class="widget-body">
                   
                      <div class="">
                        <textarea class="input-block-level" placeholder="" style="height: 100px"></textarea>
                      </div>
                </div>
              </div>
            </div>
         </div>
         <!--END panel 3-->

         <!--panel 4-->
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Ulasan
                  </div>
                </div>
                <div class="widget-body">
                   
                      <div class="">
                        <textarea class="input-block-level" placeholder="" style="height: 100px"></textarea>
                      </div>
                </div>
              </div>
            </div>
         </div>
         <!--END panel 4-->
                     
         <!--buttons--> 
            <div class="next-prev-btn-container ">
                <div class="widget-body" align="right">
                    <a href="<?php echo site_url('ptra/senarai_ppd_ptra') ?>">
                      <button class="btn btn-danger input-top-margin" type="button">
                        Batal</button></a>
                      <button class="btn btn-info hidden-tablet" type="button" id="pembetulan">
                      Pembetulan</button>
                      <button class="btn btn-success" type="button" id="lulus">
                        Lulus</button>
             </div>
                </div>   
                </div>
          <!--/.END buttons--> 

    </div>  
      <!--/.END main-container--> 

<!-- ALERT -->
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
      
     
      $("lulus").onclick = function () {
        reset();
        alertify.confirm("Adakah pasti untuk lulus?", function (e) {
          if (e) {

            window.location ="<?php echo site_url('belanjawan/agihan_belanjawan_ptf_sah') ?>";
            
          } else {
            //alertify.error("");
          }
        });
        return false;
      };
      

      $("pembetulan").onclick = function () {
        reset();
        alertify.confirm("Adakah anda pasti untuk menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi. ", function (e) {
          if (e) {
            alertify.success("Notifikasi telah dihantar.");
          } else {
            //alertify.error("");
          }
        });
        return false;
      };
</script>