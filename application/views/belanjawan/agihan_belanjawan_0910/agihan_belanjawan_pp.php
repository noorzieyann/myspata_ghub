<!--main container-->
      <div class="main-container">
<?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'agihan_belanjawan_pp',
                           'id' => 'agihan_belanjawan_pp',
                        );
                    echo form_open('belanjawan/agihan_belanjawan/agihan_belanjawan_pp',$attributes); ?>
                 <!--start div panel PNPA -->
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Maklumat PSPA(O)
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
                            <input class="input-large" type="text">
                        </div>
                        </div>
                          
                        </div>

                    <!--end panel agihan -->
                    </div></div></div>

                     
                     <!--buttons--> 
                <div class="widget-body" align="right">
                  <a href="<?php echo site_url('belanjawan/senarai_ptf_abm_pp')?>"><button class="btn btn-primary input-top-margin" type="button">
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