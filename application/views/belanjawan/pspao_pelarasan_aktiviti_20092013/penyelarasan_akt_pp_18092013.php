<?php 
                    
$attributes = array(
                    'class' => 'form-horizontal no-margin', 
                    'name' => 'penyelarasan_akt_pp',
                    'id' => 'penyelarasan_akt_pp',
                   );

              echo form_open('penyelarasan_akt/penyelarasan_akt_pp',$attributes); ?>



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
                      
      <div class="control-group">
        <label class="control-label" for="report_range1">
          Tempoh Mula
        </label>
        <div class="controls">
          <label>
            <input type="text"placeholder="22/12/12"/>
              Hingga
            <input type="text"  placeholder="21/12/13"/>
          </label>
        </div>
      </div>   

      <div class="control-group">
        <label class="control-label">
          Kementerian
        </label>
        <div class="controls">
          <input class="input-large" type="text" placeholder="Kementerian Kerja Raya" > 
        </div>
      </div>
                    
      <div class="control-group">
        <label class="control-label">
          Jabatan/Agensi
        </label>
        <div class="controls">
          <input class="input-large" type="text" placeholder="Jabatan Kerja Raya" >                  
        </div>
      </div>
                          
      <div class="control-group">
        <label class="control-label">
          Negeri
        </label>
        <div class="controls">
          <input class="input-large" type="text" placeholder="Selangor" >                    
        </div>
      </div>
                          
      <div class="control-group">
        <label class="control-label">
          Daerah
        </label>
        <div class="controls">
          <input class="input-large" type="text" placeholder="Shah Alam" >              
        </div>
      </div>
                          
      <div class="control-group">
        <label class="control-label">
          Premis
        </label>
        <div class="controls">
          <input class="input-large" type="text" placeholder="Sekolah" >                   
        </div>
      </div>
                          
                      
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
          <input class="input-large" type="text" placeholder="890000000.00">
        </div>
      </div> 

      </div>

    </div>
  </div>
</div>
<!-- agihan peruntukan END -->
                 
                 
                
<!-- div catatan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Catatan
        </div>
      </div> 
                      
      <div class="widget-body">
        <div class="">
          <textarea class="input-block-level" placeholder="Catatan ..." style="height: 100px">
          </textarea>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- div catatan END -->
                     
                     

<!-- div catatan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Ulasan
        </div>
      </div>
                
      <div class="widget-body">
        <div class="">
          <textarea class="input-block-level" placeholder="Ulasan ..." style="height: 100px">
          </textarea>
        </div>
      </div>
              
    </div>
  </div>
</div>
<!-- div catatan END -->



<!-- button START -->
<div class="next-prev-btn-container ">
  <div class="widget-body" align="right">
    <a class="btn btn-danger input-top-margin" href="<?php echo site_url('penyelarasan_akt/senarai_penyelarasan_akt') ?>" id="error">
      Batal
    </a>
    <a class="btn btn-info input-top-margin" href="#" id="pembetulan">
      Pembetulan
    </a>
    <a class="btn btn-success" href="#" id="lulus">
      Lulus
    </a>
  </div>
</div>
<!-- button END -->
                 

 <?php  echo form_close();?>











     