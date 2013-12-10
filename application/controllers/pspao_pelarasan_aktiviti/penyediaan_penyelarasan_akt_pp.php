<!-- page: penyediaan penyelarasan aktiviti pegawai pengawal, by seri idayu, 20092013 -->



<?php 
                    
  $attributes = array(
                      'class' => 'form-horizontal no-margin', 
                      'name'  => 'penyelarasan_akt_pp',
                      'id'    => 'penyelarasan_akt_pp',
                     );

                echo form_open('penyelarasan_akt/penyelarasan_akt_pp',$attributes); 
?>





<!-- div panel penyelarasan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Maklumat PSPA(O)
        </div>
      </div>
                      
      <div class="widget-body">
                      


      <!-- row tahun mula, hingga START -->
      <div class="control-group">
        <label class="control-label">
          Tempoh Mula
        </label>
        <div class="controls">
          <label>
            <div class="input-append">
              <input type="text"placeholder="22/12/12" disabled/>
            </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
              
          Hingga&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
          <div class="input-append">
            <input type="text"  placeholder="21/12/13" disabled/>
          </div>
          </label>
        </div>
      </div>
      <!-- row tahun mula, hingga END -->   



      <!-- row kementerian, jabatan/agensi START -->
      <div class="control-group">
        <label class="control-label">
          Kementerian
        </label>
        <div class="controls">
          <label>
            <div class="input-append">
              <input class="input-large" type="text" placeholder="Kementerian Kerja Raya" disabled >
            </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; 
        
          Jabatan/Agensi&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="input-append">
            <input class="input-large" type="text" placeholder="Jabatan Kerja Raya" disabled> 
          </div>
          </label>                 
        </div>
      </div>
      <!-- row kementerian, jabatan/agensi END -->


                          
      <!-- row negeri, daerah START -->
      <div class="control-group">
        <label class="control-label">
          Negeri
        </label>
        <div class="controls">
          <label>
            <div class="input-append">
              <input class="input-large" type="text" placeholder="Selangor" disabled>
            </div>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;                   
                          
          Daerah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
          <div class="input-append">
            <input class="input-large" type="text" placeholder="Shah Alam" disabled> 
          </div>
          </label>             
        </div>
      </div>
      <!-- row negeri, daerah END -->


                          
      <!-- row premis START -->                    
      <div class="control-group">
        <label class="control-label">
          Premis
        </label>
        <div class="controls">
          <input class="input-large" type="text" placeholder="Sekolah" disabled>                   
        </div>
      </div>
      <!-- row premis END -->     
                          
                      
      </div>
    </div>
  </div>
</div>
<!-- div panel penyelarasan END -->
                 


<!-- agihan peruntukan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Agihan Peruntukan
        </div>
      </div> 
                      
      <div class="widget-body">
                          
      <div class="control-group">
        <label class="control-label control-label_2" for="kementerian">
          Mohon (RM)
        </label>
        <div class="controls controls_2">
          <input class="input-large" type="text" placeholder="900000000.00" disabled>
        </div>
      </div>
                          
      <div class="control-group">
        <label class="control-label control-label_2" for="kementerian">
          Terima (RM)
        </label>
        <div class="controls controls_2">
          <input class="input-large" type="text" placeholder="890000000.00" disabled>
        </div>
      </div>
                          
      <div class="control-group">
        <label class="control-label control-label_2" for="kementerian">
          Peruntukan Yang Belum Diagihkan (RM)]
        </label>
        <div class="controls controls_2">
          <input class="input-large" type="text" placeholder="890000000.00" disabled>
        </div>
      </div> 

      </div>

    </div>
  </div>
</div>
<!-- agihan peruntukan END -->



<!-- senarai ptf START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
          </span> Senarai Pegawai Teknikal Fasiliti (PTF)
        </div>
      </div>
                
      
      <!-- table senarai START -->
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
              <?php $i=1; if(!empty($senaraiptf)) : foreach ($senaraiptf as $rec) : ?>
              <?php echo form_open('admin/update'); ?>
                        
                <tr>
                  <td>
                    <label class="radio">
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    </label>
                  </td>
                  <td align="left">
                    <?php echo $i++; ?>
                  </td>
                  <td>
                    <?php echo $rec->nama_user; ?>
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
                </tr>
                            
              <?php echo form_close(); ?>
              <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
          <!-- table senarai END -->



          <div class="clearfix">
          </div>
                    
        </div>
      </div>
                <!--/.END table section-->
    </div>
  </div>
</div>
<!-- senarai ptf END -->

                 


<!-- button START -->
<div class="next-prev-btn-container ">
  <div class="widget-body" align="right">
    <a class="btn btn-success input-top-margin" href="#" id="hantar">
      Hantar
    </a>
  </div>
</div>
<!-- button END -->
                 

<?php  echo form_close();?>





<!-- ALERT script START -->
<script type="text/javascript">
  //Alertify JS
  
  $ = function (id) 
  {
    return document.getElementById(id);
  },
   

  reset = function ()
  {
    $("toggleCSS").href = "<?php echo base_url() . 'asset/'; ?>css/alertify.core.css";
    
    alertify.set(
    {
      labels: 
      {
        ok: "OK",
        cancel: "Tidak"
      },
      delay: 5000,
      buttonReverse: false,
      buttonFocus: "ok"
    });
  };
      
     
  $("hantar").onclick = function () 
  {
    reset();
        
    alertify.confirm("Adakah ingin menghantar Pelan Penyelarasan Aktiviti ini?", function (e) 
    {
      if (e) 
      {
        window.location ="<?php echo site_url('penyelarasan_akt/senarai_penyelarasan_akt') ?>";
      } 
      else 
      {
        //alertify.error("");
      }
    });
    
    return false;
  };
      
      
  $("simpan").onclick = function () 
  {
    reset();
      
    alertify.confirm("Adakah ingin menyimpan Pelan Pemulihan / Ubah Suai / Naik Taraf Aset ini?", function (e)
    {
      if (e) 
      {
        document.forms["summary_ppun"].submit();
        
        alertify.success("Anda klik ya");
      } 
      else 
      {
        alertify.error("Anda klik tidak");
      }
    });
    
    return false;
  };
    

</script>
<!-- ALERT script END -->











     