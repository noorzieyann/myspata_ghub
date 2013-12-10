    


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
                           'name'  => 'ulasan_ptf_sah_pspao',
                           'id'    => 'ulasan_ptf_sah_pspao',
                        );

                    echo form_open('pspao_awal/ulasan_ptf_sah_pspao/'.$this->uri->segment(3),$attributes);

                     ?>
                     

<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Permintaan Penyediaan  PSPA(O) Awal
                  </div>
                    <span class="pull-right" style="font-weight:bold">JKR.PATA-1</span>
                </div>
                
              
                
              <div class="widget-body">
              
                  
                     
                
                      <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                          
                        <?php echo form_error('tempoh_mula'); 
                      
                        ?>
                          <?php echo form_dropdown('tempoh_mula', $year_list,$tahun_mula, 'id="tempoh_mula"','class="span4 input-left-top-margins"')?>

                   
                        
                      </div>
                      </div>
                  
                  
                      <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Akhir
                      </label>
                      <div class="controls controls-row">
                          
                      
                        
                         <?php echo form_error('tempoh_akhir'); ?>
                          <?php echo form_dropdown('tempoh_akhir', $year_list,$tahun_akhir, 'id="tempoh_akhir"','class="span4 input-left-top-margins"')?>

                   

                    </li>
                      </div>
                      </div>
                      
                      <div class="control-group">
                        
                     <label class="control-label" for="kementerian">
                    Kementerian 
                      </label>
                      <div class="controls">
                            <?php echo form_error('kementerian'); ?>                     
                       <?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => $kementerian,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'disabled'    => 'disabled',
                            'class'       => 'span5',
                            'placeholder' =>  'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
               
              </div>
            </div>

          </div>
          
         

        </div>


    <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kandungan
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
               
                   <div class="stylish-lists">
                   
                  <?php 
                   //$kand_utama_bil = array();

                  $i=1; if(!empty($pspaodata)) : foreach ($pspaodata as $row) : 


                  echo '<input type="hidden" name="kand_id[]" value="'.$row->kandungan_id.'">'

                  ?>



                  

                    <label> <?php echo number_format($row->kand_utama_bil, 1); ?> <?php  echo  $row->kand_utama;?>
                     <span class="popover-pop" data-original-title="<?php echo number_format($row->kand_utama_bil, 1); ?> <?php  echo  $row->kand_utama;?>" 
           data-content="<?php echo $row->kand_utama;  ?>" 
           data-placement="right" data-icon="&#xe0f7;"></span>
                    </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('pendahuluan'); ?>
                    <?php 
                          $data = array(
                                    'name'        => 'kand_detail[]',
                                    'id'          => 'wysiwyg'.$row->kand_utama_bil,
                                    'value'       => $row->kand_utama_detail,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Penerangan secara umum fungsi dan organisasi kementerian',
                                  );

                     echo form_textarea($data); ?>
                   </div>

                    <?php endforeach; ?>
                  <?php endif; ?>

                 
                   <div style="padding-bottom:10px">
                  <a href="#myObjektif" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe082;"> Lengkapakan Ukuran dan Sasaran </span>
                  </a>

                </div>

                    </div>
   

                  <div class="clearfix"> </div>
         
                
                
               
          
              </div>
            </div>

          </div>
          
          <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Ulasan
                  </div>
                </div>
                
              
                
              <div class="widget-body">
                                
                        
                  <form class="form-horizontal no-margin">


                  
                 <div class="wysiwyg-container" style="padding-left:30px">
                     <?php echo form_error('ulasan'); ?>
                      <?php 
                          $data = array(
                                    'name'        => 'ulasan',
                                    'id'          => 'wysiwyg6',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Telah disemak dan dipersetujui',
                                  );

                     echo form_textarea($data); ?>
                    
                   </div>
                     
                  </form>
                    

                  
         
             
                
          
              </div>
            </div>
          
          
          
          
          <div class="next-prev-btn-container pull-right">
                 
                 
               <a href="<?php echo site_url('pspao_awal/senarai_ptf_pspao') ?>"> 
              <?php
        $batal = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Batal'
        );

        echo form_button($batal);
        
        ?>
        </a>
        <?php
        $betul = array(
            'name'    => 'betul',
            'id'      => 'betul',
            'class'   => 'btn btn-info input-top-margin',
            'value'   => 'betul',
            'type'    => 'submit',
            'content' => 'Pembetulan'
        );

        echo form_button($betul);
        
        ?>
        <?php
        $sah = array(
            'name'    => 'sah',
            'id'      => 'sah',
            'class'   => 'btn btn-success',
            'value'   => 'sah',
            'type'    => 'submit',
            'content' => 'Sah'
        );

        echo form_button($sah);
        
        ?>
                 
               
             
            </div>
<div class="clearfix"></div>
                

        </div>


                  <!-- Modal //xdok modal doh tu -->
                  <div id="myObjektif" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myObjektifLabel" aria-hidden="true">
                
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myObjektifLabel">
                        Ukuran dan Sasaran
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>

               
                  <?php include('ukuran_sasar_pspao.php'); ?>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>
                    
                    </div>
                  

                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
                  
                 <?php  echo form_close();?>
                 </div>          
                     
                 
                 </div>

<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script>


  $('#wysiwyg1').wysihtml5();
    
   
  
</script>

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
      
     
       /*$("sah").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin mengesahkan PSPA(O) awal ini?", function (e) {
          if (e) {
             // $("ulasan_pp_sah_pspao").submit();
              document.forms["ulasan_ptf_sah_pspao"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
       $("betul").onclick = function () {
        reset();
        alertify.confirm("'Adakah anda ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi.", function (e) {
          if (e) {
             // $("ulasan_pp_sah_pspao").submit();
              document.forms["ulasan_ptf_sah_pspao"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
 */
 
     
</script>