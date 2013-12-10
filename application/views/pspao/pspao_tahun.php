    <!--breadcrumb-->
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
                        Permintaan Penyediaan
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        PSPA(O) Awal
                      </a>   
                    </li>
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  


<div class="widget-body">
         
          
           <!--ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active"><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ptf_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ptf_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ptf_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ptf_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ptf_pla')?>">PLA</a></li>
                  </ul>
    
    
    <div class="tab-content" id="myTabContent">
                 <div id="pspao" class="tab-pane fade active in"-->
        

                
                    <?php //echo validation_errors(); ?>
                    <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'pspao_tahun',
                           'id' => 'pspao_tahun',
                        );
                    echo form_open('pspao_awal/pspao_tahun',$attributes); ?>

                    <?php 
                        //echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

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


          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Permintaan Penyediaan  PSPA(O) Awal
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
                      <div class="control-group">
                        
                     <label class="control-label" for="kementerian">
                    Kementerian 
                      </label>
                      <div class="controls">
                          <?php echo form_error('kementerian'); ?> 
                          <?php
                           
                            

                          $data = array(
                            'disabled'=>'diabled',
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       =>  $kementerian,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?>
                       
                          
                      </div>
                    </div>
                   

                   <div class="control-group">
                        
                     <label class="control-label" for="jabatan">
                    Jabatan / Agensi 
                      </label>
                      <div class="controls">
                          <?php echo form_error('jabatan'); ?> 
                          <?php
                            foreach ($jabatan as $rr) 


                          $data = array(
                            'disabled'=>'diabled',
                            'name'        => 'jabatan',
                            'id'          => 'jabatan',
                            'value'       => $rr->nama_jab_agensi,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  'Jabatan Kerja Raya',
                          );

                          echo form_input($data);
                         
                          ?>
                       
                          
                      </div>
                    </div>
                   
                     
                      <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                     <?php echo form_error('tempoh_mula'); ?> 
                        
                      <?php echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"',
                      'class="span4 input-left-top-margins"')?>

                   
                      </div>
                      </div>
                  
                  
                    <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Akhir
                      </label>
                      <div class="controls controls-row">
                      <div class="error"> 
                        <?php echo form_error('tempoh_akhir'); ?> 
                        <?php echo form_dropdown('tempoh_akhir', $year_list, 'id="tempoh_mula"',
                        'class="span4 input-left-top-margins"')?>

                   

                    
                      </div>
                      </div>
                    </div>
                      
                      
           
                  
                    

              </div>
            </div>

          </div>
          
           
        <div class="next-prev-btn-container pull-right">
               
         <!--a href="<?php echo site_url('ppun/senarai_ppun') ?>">
         <?php
        $batal = array(
            'name'    => 'batal',
            'id'      => 'batal',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Batal'
        );

        echo form_button($batal);
        
        ?>
        </a-->
           
  
        <?php
        $seterusnya = array(
            'name'    => 'seterusnya',
            'id'      => 'seterusnya',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Seterusnya'
        );

        echo form_button($seterusnya);
        
        ?>
     
</div>

        </div>

     <?php  echo form_close();?>
                 </div>          
            
      
    </div>
    
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
      
     
      /* $("batal").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menghantar PSPA(O) awal ini?", function (e) {
          if (e) {
               document.forms["pspao_tahun"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
      
       $("seterusnya").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyimpan PSPA(O) awal ini?", function (e) {
          if (e) {
               document.forms["pspao_tahun"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
 */
     
</script>
    
 