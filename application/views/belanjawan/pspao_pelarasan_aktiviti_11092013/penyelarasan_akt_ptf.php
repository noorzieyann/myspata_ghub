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
                        <label class="control-label">Jabatan/Agensi</label>
                        <div class="controls">
                           <input class="input-large" type="text" placeholder="Jabatan Kerja Raya" >                  
                        </div>
                        </div>
                          
                          <div class="control-group">
                        <label class="control-label">Negeri</label>
                        <div class="controls">
                            <input class="input-large" type="text" placeholder="Selangor" >                    
                        </div>
                        </div>
                          
                          <div class="control-group">
                        <label class="control-label">Daerah</label>
                        <div class="controls">
                             <input class="input-large" type="text" placeholder="Shah Alam" >              
                        </div>
                        </div>
                          
                        <div class="control-group">
                        <label class="control-label">Premis</label>
                        <div class="controls">
                             <input class="input-large" type="text" placeholder="Sekolah" >                   
                        </div>
                        </div>
                          
                      
                      
                    <!--end panel PNPA -->
                    </div></div></div></div>
                 
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Agihan Peruntukan
                      </div>
                      </div> 
                      
                      <div class="widget-body">
                          
                        <div class="control-group">
                        <label class="control-label control-label_2" for="kementerian">Mohon (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="900000000.00" disabled>
                        </div>
                        </div>
                          
                          <div class="control-group">
                        <label class="control-label control-label_2" for="kementerian">Terima (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="890000000.00" disabled>
                        </div>
                        </div>
                          
                          
                          <div class="control-group">
                        <label class="control-label control-label_2" for="kementerian">Peruntukan Yang Belum Diagihkan (RM)</label>
                          <div class="controls controls_2">
                            <input class="input-large" type="text" placeholder="890000000.00">
                        </div>
                        </div> 

                    <!--end panel agihan -->
                    </div></div></div>
                 
                 
                 <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Sila Kemaskini Maklumat Berikut
                      </div>
                      </div> 
                      
                      <div class="widget-body">
                        <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active"><a data-toggle="tab" href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">POPA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PNPA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PPUN</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PLA</a></li>
                  </ul>
         <div class="tab-content" id="myTabContent">
             <div id="home" class="tab-pane fade active in">
             <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th width="13%" rowspan="2" class="hidden-phone" style="width:13%">Skop</th>
                        <th width="15%" rowspan="2" class="hidden-phone" style="width:15%">Aktiviti</th>
                        <th width="15%" rowspan="2" class="hidden-phone" style="width:15%">Butiran Aktiviti</th>
                        <th width="10%" rowspan="2" class="hidden-phone" style="width:10%">Objek Sebagai / Kepala Peruntukan</th>
                        <th colspan="3" class="hidden-phone" style="width:10%">Jumlah Kos (RM)</th>
                      </tr>
                      <tr>
                        <th width="10%" class="hidden-phone" style="width:10%">Mohon</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Terima</th>
                        <th width="10%" class="hidden-phone" style="width:10%">% Yang Diterima</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td rowspan="2" class="hidden-phone">Kerja Tanah</td>
                        <td rowspan="2" class="hidden-phone">Aktiviti 1</td>
                        <td class="hidden-phone">Butiran Aktiviti 1</td>
                        <td class="hidden-phone">14000</td>
                        <td class="hidden-phone">100,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text"  name="" id="" value="4000900.00"></td>
                        <td class="hidden-phone">90</td>
                      </tr>
                      <tr>
                        <td class="hidden-phone">Butiran Aktiviti  2</td>
                        <td class="hidden-phone">22000</td>
                        <td class="hidden-phone">300,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="1200900.00" name="" id=""/></td>
                        <td class="hidden-phone">86</td>
                      </tr>
                      <tr>
                        <td rowspan="5" class="hidden-phone">Struktur</td>
                        <td rowspan="3" class="hidden-phone">Aktiviti 1</td>
                        <td class="hidden-phone">Butiran Aktiviti  3</td>
                        <td class="hidden-phone">23000</td>
                        <td class="hidden-phone">620,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="3005900.00" name="" id=""/></td>
                        <td class="hidden-phone">97</td>
                      </tr>
                      <tr>
                        <td class="hidden-phone">Butiran Aktiviti  4</td>
                        <td class="hidden-phone">27000</td>
                        <td class="hidden-phone">392,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="3452220.00" name="" id=""/></td>
                        <td class="hidden-phone">79</td>
                      </tr>
                      
                      <tr>
                        <td class="hidden-phone">Butiran Aktiviti  5</td>
                        <td class="hidden-phone">32000</td>
                        <td class="hidden-phone">220,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="564000.00"  name="" id=""/></td>
                        <td class="hidden-phone">88</td>
                      </tr>
                      
                      <tr>
                        <td rowspan="2" class="hidden-phone">Aktiviti 2</td>
                        <td class="hidden-phone">Butiran Aktiviti 6</td>
                        <td class="hidden-phone">28000</td>
                        <td class="hidden-phone">19,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="5490900.00"  name="" id=""/></td>
                        <td class="hidden-phone">90</td>
                      </tr>
                      
                      <tr>
                        <td class="hidden-phone">Butiran Aktiviti 7</td>
                        <td class="hidden-phone">51000</td>
                        <td class="hidden-phone">34,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="4000900.00" name="" id=""/></td>
                        <td class="hidden-phone">92</td>
                      </tr>
                      
                      <tr>
                        <td rowspan="2" class="hidden-phone">Kerja Luar Bandar</td>
                        <td rowspan="2" class="hidden-phone">Aktiviti 1</td>
                        <td class="hidden-phone">Butiran Aktiviti 8</td>
                        <td class="hidden-phone">32000</td>
                        <td class="hidden-phone">100,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text" value="10000900.00" name="" id=""/></td>
                        <td class="hidden-phone">80</td>
                      </tr>
                      
                      <tr>
                        <td class="hidden-phone">Butiran Aktiviti 9</td>
                        <td class="hidden-phone">26000</td>
                        <td class="hidden-phone">23,000.00</td>
                        <td class="hidden-phone"><input class="input-small" type="text"value="4000900.00"  name="" id=""/></td>
                        <td class="hidden-phone">70</td>
                      </tr>
                      <tr bgcolor="#FFCC00">
                        <td colspan="4" class="hidden-phone"><strong>Jumlah Keseluruhan</strong></td>
                        <td class="hidden-phone"><strong>900000000.00</strong></td>
                        <td class="hidden-phone"><strong>
                        <input class="input-small" type="text"  name="" id="" value="890000000.00"/>
                        </strong></td>
                        <td class="hidden-phone"><strong>100</strong></td>
                      </tr>
                    </tbody>
                  </table>
                 <!-- end tab -->
             </div>
         </div>  
                       

                    <!--end panel PNPA -->
                    </div></div></div>
                     
                     
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
                        <textarea class="input-block-level" placeholder="Catatan ..." style="height: 100px"></textarea>
                      </div>
</div>

                    <!--end panel agihan -->
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
                    <a class="btn btn-danger input-top-margin" href="<?php echo site_url('penyelarasan_akt/senarai_penyelarasan_akt') ?>" id="error">
                    Batal
                  </a>
                  <a class="btn btn-info input-top-margin" href="#" id="pembetulan">
                    Pembetulan
                  </a>
                  <a class="btn btn-success" href="#" id="sah">
                    Sah
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
      
     
      $("sah").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin mengesahkan permohohan pengagihan belanjawan?", function (e) {
          if (e) {

            window.location ="<?php echo site_url('penyelarasan_akt/senarai_penyelarasan_akt') ?>";
            
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