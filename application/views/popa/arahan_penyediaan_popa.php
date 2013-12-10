<!-- page: arahan penyediaan popa, by seri, 12092013 -->


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
            POPA
        </a>   
    </li>
  </ul>
</div>

<br>
<!-- breadcrumb END -->



<!-- tab START -->
<div class="widget-body"> 
  <ul class="nav nav-tabs no-margin myTabBeauty"> 
    <li class=""> 
      <a href="#profile" data-original-title="">PSPA(O)</a>
    </li> 
    <li class=""> 
      <a href="<?php echo site_url('ptra/senarai_ptf_ptra')?>" data-original-title="">PTRA</a> 
    </li> 
    <li class="active"> 
      <a href="<?php echo site_url('popa/senarai_ptf_popa')?>">POPA</a>
    </li>
    <li class=""> 
      <a href="<?php echo site_url('pnpa/senarai_ptf_pnpa')?>">PNPA</a>
    </li>
    <li class=""> 
      <a href="<?php echo site_url('ppun/senarai_ptf_ppun')?>">PPUN</a>
    </li> 
    <li class=""> 
      <a href="<?php echo site_url('pla/senarai_ptf_pla')?>">PLA</a>
    </li>   
  </ul> 
    
    
    
    
  <!-- panel tab START -->
  <div class="tab-content" id="myTabContent"> 
    <div id="home" class="tab-pane fade active in"> 
      <div class="main-container"> 

        <?php 
          $attributes = array(
            'class' => 'form-horizontal no-margin', 
            'name' => 'arahan_penyediaan_popa',
            'id' => 'arahan_penyediaan_popa',
          );
          echo form_open('popa/arahan_penyediaan_popa',$attributes);
        ?>
        
        
        
        
        <!-- panel pilih penerima START -->   
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                  </span> Sila Pilih Penerima Arahan Penyediaan POPA
                </div> 
              </div> 



              <!-- widget body START -->
              <div class="widget-body">
                    
                <div class="control-group">
                  <label class="control-label">
                    Kementerian
                  </label>
                  <div class="controls">
                    <?php
                      $data = array(
                                    'name'        => 'kementerian',
                                    'id'          => 'kementerian',
                                    'value'       => '',
                                    'maxlength'   => '',
                                    'size'        => '50',
                                    'class'       => '50',
                                    'placeholder' => 'Kementerian Kerja Raya',
                                   );
                              
                              echo form_input($data);
                    ?>
                  </div> 
                </div> 
                    
                <div class="control-group">
                  <label class="control-label">
                    Jabatan/Agensi
                  </label>
                  <div class="controls">
                    <?php echo form_error('jabatan'); ?>
                    <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                  </div> 
                </div> 
                    
                <div class="control-group">
                  <label class="control-label" for="negeri">
                    Negeri
                  </label>
                  <div class="controls">
                    <?php echo form_error('negeri'); ?>
                    <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>
                  </div> 
                </div> 
                    
                <div class="control-group">
                  <label class="control-label" for="daerah">
                    Daerah
                  </label>
                  <div class="controls">
                    <?php echo form_error('daerah'); ?>
                    <?php echo form_dropdown('daerah', $daerah, 'id="daerah"');?>
                  </div> 
                </div> 
                    
                <div class="control-group">
                  <label class="control-label" for="katacarian">
                    Kata Carian
                  </label>
                  <div class="controls">
                    <?php echo form_error('katacarian'); ?> 
                    <?php
                      $data = array(
                                    'name'        => 'katacarian',
                                    'id'          => 'katacarian',
                                    'value'       => '',
                                    'maxlength'   => '100',
                                    'size'        => '50',
                                    'class'       => '50',
                                    'placeholder' =>  '',
                                   );
                              
                              echo form_input($data);
                    ?>
                  </div>
                </div>
                      
                <div class="control-group ">
                  <?php
                    $seterusnya = array(
                                        'name'    => '',
                                        'id'      => '',
                                        'class'   => 'rounded pull-right',
                                        'value'   => '',
                                        'content' => ' Carian',
                                        'type'    => 'submit',
                                        'data-icon' => '&#xe07f;'
                                       );
                    
                                  echo form_button($seterusnya);
                  ?>
                </div>                       
                    
              </div>
              <!-- widget body END -->
                    

                  
              <?php  echo form_close();?>
    
            </div>
          </div>
        </div>
        <!-- panel pilih penerima END -->



        <!-- panel senarai penerima START -->
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                  </span> Senarai Penerima Arahan
                </div> 
              </div> 
            
              <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination">
                  
                  <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 15 senarai
                </div>
                  <?php echo $this->pagination->create_links(); ?>
              </div>
       

                  
              <div class="pagination no-margin" align="right">
                <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                </div>
              </div>
            </div>

        </div>
    </div>
</div>
<!-- panel senarai penerima END -->




    </div>
  </div>
</div>
<!-- panel tab END -->


<!-- buttons START--> 
<div class="widget-body" align="right">
    
    </a>
    <button class="btn btn-success input-top-margin" href="#" id="confirm">
        Hantar
    </button>
</div> 
<!-- buttons END--> 


</div>
<!-- tab END-->









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
            cancel: "Cancel"
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: "ok"
        });
      };
      
     
       $("hantar").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menghantar POPA ini?", function (e) {
          if (e) {
              
              document.forms["arahan_penyediaan_popa"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
      
      $("simpan").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyimpan POPA ini?", function (e) {
          if (e) {
              
              document.forms["summary_popa"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
 
     
</script>
