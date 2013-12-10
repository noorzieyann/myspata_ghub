<!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_ptf_abm_ketuajab',
                           'id' => 'senarai_ptf_abm_ketuajab',
                        );
        echo form_open('belanjawan/agihan_belanjawan/senarai_ptf_abm_ketuajab',$attributes); ?>
       

    <!--START panel 2-->
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Pegawai Teknikal Fasiliti (PTF)
                  </div>
                </div>
                
                  <!--table-->
                  <div class="widget-body">
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:2%">
                            #
                          </th>
                          <th style="width:4%">
                            Bil
                          </th>
                          <th style="width:15%">
                            Nama
                          </th>
                          <th style="width:20%" class="hidden-phone">
                            Kementerian
                          </th>
                          <th style="width:20%" class="hidden-phone">
                            Jabatan/Agensi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_ptf)) : foreach ($senarai_ptf as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td><label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></label></td>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo $rec->nama_user; ?></td>
                                <td><?php if($get_namakem = $this->agihan_model->get_namakem($rec->idkem)) foreach ($get_namakem as $rr) echo $rr->namakem;?></td>
                                <td><?php if($get_namajab_agensi = $this->agihan_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
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
                <!--/.END table section-->
              </div>
            </div>
          </div>
          <!--END panel 2-->
    
                <!--buttons--> 
                <div class="widget-body" align="right">
                  <a class="btn btn-success input-top-margin" href="#" id="hantar">
                    Hantar
                  </a>
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
            ok: "OK",
            cancel: "Tidak"
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: "ok"
        });
      };
      
     
       $("hantar").onclick = function () {
        reset();
        alertify.confirm("Adakah anda pasti untuk hantar?", function (e) {
          if (e) {

            window.location ="<?php echo site_url('belanjawan/senarai_ptf_abm_ketuajab') ?>";
            
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