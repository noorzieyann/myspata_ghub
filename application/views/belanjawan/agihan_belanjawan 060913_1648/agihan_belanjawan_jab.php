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
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Sila Kemaskini Maklumat Berikut
                      </div>
                      </div>
                      <div class="widget-body">
                        
                      <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Tempoh Mula
                      </label>
                      <div class="controls"><label>
                      
                       <input type="text"placeholder="22/12/12"/>
                    Hingga
                      <input type="text"  placeholder="21/12/13"/>
                      </label>

                    </div>
                    </div>   

                        <div class="control-group">
                        <label class="control-label">Kementerian</label>
                        <div class="controls">
                             <input class="input-large" type="text" placeholder="Kementerian Kerja Raya" > </div>
                        </div>
                    
                        
                          
                        <div class="control-group">
                        <label class="control-label">PSPA(O)</label>
                        <div class="controls">
                             <input class="input-large" type="text" placeholder="PSPA000001" >                   
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
                        <label class="control-label" for="kementerian">Mohon (RM)</label>
                          <div class="controls">
                            <input class="input-large" type="text" placeholder="900000000.00">
                        </div>
                        </div>
                          
                          <div class="control-group">
                        <label class="control-label" for="kementerian">Terima (RM)</label>
                          <div class="controls">
                            <input class="input-large" type="text" placeholder="890000000.00" >
                        </div>
                        </div>
                          
                        
</div>

                    <!--end panel agihan -->
                    </div></div></div>
                 
                 
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
                        <label class="control-label control-label_2" for="kementerian">Peruntukan Yang Belum Diagihkan (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="890000000.00">
                        </div>
                        </div>

             <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th width="13%"  class="hidden-phone" style="width:13%">Bil</th>
                        <th width="15%" class="hidden-phone" style="width:15%">Kementerian</th>
                        <th width="15%" class="hidden-phone" style="width:15%">Minta(RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima(RM)</th>
                        
                      
                     
                    </thead>
                    <tbody>
                      <tr>
                        <td  class="hidden-phone">1</td>
                        <td class="hidden-phone">Selangor</td>
                       
                        <td class="hidden-phone">100,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text"  name="" id="" value="4000900.00"></td>
                      
                      </tr>
                      <tr>
                        <td class="hidden-phone">2</td>
                        <td class="hidden-phone">Kelantan</td>
                        <td class="hidden-phone">300,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="1200900.00" name="" id=""/></td>
                       
                      </tr>
                      <tr>
                        <td  class="hidden-phone">3</td>
                        <td class="hidden-phone">Johor</td>
                       
                        <td class="hidden-phone">100,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text"  name="" id="" value="4000900.00"></td>
                      
                      </tr>
                      <tr>
                        <td class="hidden-phone">4</td>
                        <td class="hidden-phone">Pahang</td>
                        <td class="hidden-phone">300,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="1200900.00" name="" id=""/></td>
                       
                      </tr>
                      <tr>
                        <td  class="hidden-phone">5</td>
                        <td class="hidden-phone">Melaka</td>
                       
                        <td class="hidden-phone">100,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text"  name="" id="" value="4000900.00"></td>
                      
                      </tr>
                      <tr>
                        <td class="hidden-phone">6</td>
                        <td class="hidden-phone">Perlis</td>
                        <td class="hidden-phone">300,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="1200900.00" name="" id=""/></td>
                       
                      </tr>
                      
                      
                    
                      
                     
                    </tbody>
                  </table>
                 <!-- end tab -->
               

                    <!--end panel PNPA -->
                    </div></div></div>
                     
                 
                     
                     
                     
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
                     
                     <div class="next-prev-btn-container ">
                <div class="widget-body" align="right">
                    <a class="btn btn-danger input-top-margin" href="<?php echo site_url('belanjawan/agihan_belanjawan') ?>" id="error">
                    Batal
                  </a>
                  <a class="btn btn-warning2 input-top-margin" href="#" id="pembetulan">
                    Simpan Deraf
                  </a>
                  <a class="btn btn-success" href="#" id="hantar">
                    Hantar
                  </a>
                </div></div>
                 
                 

 <?php  echo form_close();?>


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