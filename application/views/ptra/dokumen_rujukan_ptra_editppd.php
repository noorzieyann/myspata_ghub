<!-- breadcrumb START -->
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
    
<div class="clearfix">
</div>
    
<br/>
<!-- breadcrumb END -->






<?php if(!empty($tab)) 
      { 
        echo $tab;
      } 
?>




<?php $form_name = 'ptra/dokumen_rujukan_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
  
      if($this->uri->segment(5) != NULL)
      {
        $form_name = 'ptra/dokumen_rujukan_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);
      }

      $attributes = array('class' => 'form-horizontal no-margin', 'id' => 'dokumen_rujukan_ptra');
  
      echo form_open_multipart($form_name, $attributes);
?>



          
<?php echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

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





<!-- panel 1 START -->       
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
          </span> Dokumen Rujukan
        </div>
      </div>
      

      <!-- table section 1 START -->            	
      <div class="widget-body">
        <ul class="icomoon-icons-container">
          <a href="#myModal"  data-toggle="modal">
            <li>
              <span class="fs1" aria-hidden="true" data-icon="&#xe102;">
              </span>
            </li>
          </a>
        </ul>
      </ul>
      
      <label class="tambah">
        Tambah Dokumen Rujukan
      </label>
                  
      


      <!-- popup tambah START -->
      <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            ×
          </button>
          
          <h4 id="myModalLabel">
            Dokumen Rujukan
          </h4>
        </div>
        
        <div class="modal-body">
          <p> 
            <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='pspa' >
            <input type='hidden' value='<?php echo $this->uri->segment(4); ?>' name='no' >
        
     
              <div class="control-group">
                <label class="control-label">
                  1. Tajuk Dokumen
                </label>
                <div class="controls">
                  <?php echo form_input(array('name' => 'nama_fail1', 'class' => 'large required')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail'); ?>
                    </font>
                </div>
              </div>
                    
              <div class="control-group">
                <label class="control-label">
                  Dokumen Rujukan
                </label>
                <div class="controls">
                  <?php echo form_input(array('type' => 'file', 'name' => 'userfile', 'class' => 'large required')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail_asal1'); ?>
                    </font>
                </div>
              </div>
              


              <div class="control-group">
                <label class="control-label">
                  2. Tajuk Dokumen
                </label>
                <div class="controls">
                  <?php echo form_input(array('name' => 'nama_fail2')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail'); ?>
                    </font>
                </div>
              </div>
        
              <div class="control-group">
                <label class="control-label">
                  Dokumen Rujukan
                </label>
                <div class="controls">
                  <?php echo form_input(array('type' => 'file', 'name' => 'userfile2')); ?>
                      <font color="red">
                        <?php echo form_error('nama_fail_asal1'); ?>
                      </font>
                </div>
              </div>
                    


              <div class="control-group">
                <label class="control-label">
                  3. Tajuk Dokumen
                </label>
                <div class="controls">
                  <?php echo form_input(array('name' => 'nama_fail3')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail'); ?>
                    </font>
                </div>
              </div>
                    
              <div class="control-group">
                <label class="control-label">
                  Dokumen Rujukan
                </label>
                <div class="controls">
                  <?php echo form_input(array('type' => 'file', 'name' => 'userfile3')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail_asal1'); ?>
                    </font>
                </div>
              </div>



              <div class="control-group">
                <label class="control-label">
                  4. Tajuk Dokumen
                </label>
                <div class="controls">
                  <?php echo form_input(array('name' => 'nama_fail4')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail'); ?>
                    </font>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">
                  Dokumen Rujukan
                </label>
                <div class="controls">
                  <?php echo form_input(array('type' => 'file', 'name' => 'userfile4')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail_asal1'); ?>
                    </font>
                </div>
              </div>



              <div class="control-group">
                <label class="control-label">
                  5. Tajuk Dokumen
                </label>
                <div class="controls">
                  <?php echo form_input(array('name' => 'nama_fail5')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail'); ?>
                    </font>
                </div>
              </div>
               
              <div class="control-group">
                <label class="control-label">
                  Dokumen Rujukan
                </label>
                <div class="controls">
                  <?php echo form_input(array('type' => 'file', 'name' => 'userfile5')); ?>
                    <font color="red">
                      <?php echo form_error('nama_fail_asal1'); ?>
                    </font>
                </div>
              </div>
              
            </p>  
          </div>



          <!-- button popup START -->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">
              Batal
            </a>
            <input type="submit" value="Simpan" class="btn btn-warning2"/>            
          </div>
          <!-- button popup END -->


        </div>
        <!-- popup tambah END -->
                                  
                  



        <!-- table section 2 START -->              
        <div class="widget-body">

          <div class="clearfix">
          </div>
                  


          <!-- table START -->
          <div id="dt_example" class="example_alt_pagination">
            <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      

              <thead>
                <tr>
                  <th style="width:4%">
                    Bil
                  </th>
                  <th style="width:20%">
                    Tajuk Dokumen
                  </th>
                  <th style="width:20%">
                    Dokumen Rujukan
                  </th>
                  <th style="width:8%">
                    Tindakan
                  </th>
                </tr>
              </thead>



              <tbody>
                <?php $i=1; if(!empty($senarai_dokumen)) : foreach ($senarai_dokumen as $rec) : ?>
                <?php //echo form_open('admin/update'); ?>
                    


                  <tr>
                    <td align="left">
                      <?php echo $i++; ?>
                    </td>
                    
                    <td>
                      <?php echo $rec->nama_fail; ?>
                    </td>

                    <td>
                      <a href="<?php echo site_url('ptra/muat_dokumen_rujukan_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$rec->lampiran_id);?>">
                        <?php echo $rec->nama_fail_asal; ?>
                      </a>
                    </td>
                      
                    <td align="center">
                      <ul class="icomoon-icons-container">
                        <a class="confirmation" href="<?php echo site_url('ptra/hapus_dokumen_rujukan_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$rec->lampiran_id);?>">
                          <li class="rounded">
                            <span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1" >
                            </span>
                          </li>
                        </a>                                    
                      </ul>
                    </td>
        
                  </tr>
                            

                <?php echo form_close(); ?>
                <?php endforeach; ?>
                <?php endif; ?>
            
              </tbody>
            </table>
                    
            <div class="clearfix">
            </div>
                    
          </div>
          <!-- table END -->


        </div>
        <!-- table section 2 END -->


        </div>
        <!-- table section 1 END -->


      </div>
    </div>
  </div>
  <!-- panel 1 END -->




    
  <!-- buttons START --> 
  <div class="widget-body" align="right">
    
    <a href="<?php echo site_url('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">
      <button class="btn btn-primary input-top-margin" type="button">
        Kembali
      </button>
    </a>

    <a href="<?php echo site_url('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">
      <button class="btn btn-warning2 input-top-margin" type="button">
        Simpan
      </button>
    </a>
    
  </div> 
  <!-- buttons END --> 
         







<!-- modal untuk pengesahan START -->           
<div id="simpan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> 
      ×
    </button>
    <h4 id="myModalLabel">
      Mesej Pengesahan
    </h4>
  </div>
  
  <div class="modal-body">
    <p>
      Adakah anda ingin menyimpan deraf PTRA ini?
    </p>
  </div>
  

  <!-- button START -->
  <div class="modal-footer">
    
    <?php $batal = array( 'name'        => '',
                          'id'          => '',
                          'class'       => 'btn btn-danger input-top-margin',
                          'value'       => '',
                          'type'        => 'button',
                          'content'     => 'Tidak',
                          'data-dismiss'=>'modal');

          echo form_button($batal);
          echo form_submit('hantar', 'Simpan Deraf','class="btn btn-primary"');
    ?>
                   
  </div>
  <!-- button END -->
</div>
<!-- modal untuk pengesahan END -->     







<!-- ALERT START -->
<script type="text/javascript">
     
  var elems = document.getElementsByClassName('confirmation');
  var confirmIt = function (e) 

  {
    if (!confirm('Ingin hapus Dokumen Rujukan?')) e.preventDefault();
  };
      
  for (var i = 0, l = elems.length; i < l; i++) 
  {
    elems[i].addEventListener('click', confirmIt, false);
  }

</script>

 <?php echo form_close(); ?>
 <!-- ALERT END -->






