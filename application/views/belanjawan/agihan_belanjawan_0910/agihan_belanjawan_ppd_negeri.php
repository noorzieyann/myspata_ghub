<!--main container-->
      <div class="main-container">
      <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'agihan_belanjawan_ppd_negeri',
                           'id' => 'agihan_belanjawan_ppd_negeri',
                        );
                    echo form_open('belanjawan/agihan_belanjawan/agihan_belanjawan_ppd_negeri',$attributes); ?>
                 <!--start div panel PNPA -->
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Maklumat Pelan
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
                        <label class="control-label" for="report_range1">
                          <?php echo form_label('Negeri', 'namanegeri'); ?>
                        </label>
                        <div class="controls">
                          <?php echo form_error('namanegeri'); ?>
                        <?php echo form_dropdown('negi', $negeri, 
                            set_value('namanegeri'), 'id="namanegeri"'); ?>
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
                <div class="widget-body">
                  <div class="control-group">
                        <label class="control-label control-label_2" for="peruntukan">Peruntukan Yang Belum Diagihkan (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="150,000.00">
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
                        <th width="15%" class="hidden-phone" style="width:30%">Daerah</th>
                        <th width="15%" class="hidden-phone" style="width:10%">Mohon (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima (RM)</th>
                                             
                    </thead>
                    <tbody>
                            <?php $i=1; if(!empty($agihan)) : foreach ($agihan as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php if($get_namadaerah = $this->agihan_model->get_namadaerah($rec->iddaerah)) foreach ($get_namadaerah as $rr) echo $rr->nama_daerah;?></td>
                                <td><?php echo $rec->jum_kos_mohon; ?></td>
                                <td><input class="input-small" type="text"></td>
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
                     
                     <!--buttons--> 
                <div class="widget-body" align="right">
                  <a href="<?php echo site_url('belanjawan/senarai_ptf_abm_ketuajab')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Seterusnya
                  </button></a>
                </div> 
                <!--/.END buttons-->

              <?php  echo form_close();?>

        
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
        alertify.confirm("Adakah anda ingin menghantar angihan belanjawan?", function (e) {
          if (e) {

            window.location ="<?php echo site_url('belanjawan/agihan_belanjawan') ?>";
            
          } else {
            alertify.error("");
          }
        });
        return false;
      };

      $("pembetulan").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi. ", function (e) {
          if (e) {
            alertify.success("Notofikasi Pembetulan telah dihantar");
          } 
          else {
            alertify.error("");
          }
        });
        return false;
      };
</script>