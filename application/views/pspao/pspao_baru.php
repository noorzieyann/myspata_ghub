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
                         'name' => 'pspao_baru',
                           'id' => 'pspao_baru',
                        );
                    echo form_open('pspao_awal/pspao_baru',$attributes); ?>


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

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                     <?php //echo form_error('tempoh_mula'); ?> 
                        
                     <?php 
                    
                             $year_list = array('2013','2014','2015');


                     echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"','class="span4 input-left-top-margins"')?>
                 
                     
                      </div>
                      </div>
                  
                  
                    <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Akhir
                      </label>
                      <div class="controls controls-row">
                      <div class="error"> 
                        <?php //echo form_error('tempoh_akhir'); ?> 
                        <?php 
                        $year_list2 = array('2019','2020','2021');

                        echo form_dropdown('tempoh_akhir', $year_list2, 'id="tempoh_mula"','class="span4 input-left-top-margins"')?>

                   

                    
                      </div>
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
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
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
                   

                    <label> 1.0 Pendahuluan
                    <span class="popover-pop" data-original-title="1.0 Pendahuluan" 
           data-content="Menerangkan secara umum fungsi dan organisasi kementerian/ jabatan/ agensi serta struktur PATA dalam organisasi." 
           data-placement="right" data-icon="&#xe0f7;"></span>
                     </label>
                    
                    <div class="wysiwyg-container">
                        <?php echo form_error('pendahuluan'); ?>
                         <?php 
                          $data = array(
                                    'name'        => 'pendahuluan',
                                    'id'          => 'wysiwyg',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                  
                   </div>

                    <label> 2.0 Visi Pengurusan Aset Tak Alih 
                    <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menetapkan hala tuju, fokus dan sasaran kecemerlangan PATA kementerian/ jabatan/ agensi pada masa akan datang." data-placement="right"  data-icon="&#xe0f7;"></span>
                    </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('visi'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'visi',
                                    'id'          => 'wysiwyg2',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div>

                    <label> 3.0 Misi Pengurusan Aset Tak Alih
                    <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Menetapkan tindakan - tindakan strategik untuk mencapai visi kementerian/ jabatan/ agensi." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;"></span>
                    </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('misi'); ?> 
                   <?php 
                          $data = array(
                                    'name'        => 'misi',
                                    'id'          => 'wysiwyg3',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div>

                    <label> 4.0 Objektif Pengurusan Aset Tak Alih
                    <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penerimaan Aset" data-content="Menjelaskan matlamat aset mengikut keperluan dan kehendak kementerian/ jabatan/ agensi." data-placement="right" data-icon="&#xe0f7;"></span>
                     </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('objektif'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'objektif',
                                    'id'          => 'wysiwyg4',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div>
                    
                    <?php echo form_error('objektif'); ?> 
                   <div style="padding-bottom:10px">
                  <a href="#myObjektif" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe082;"> Ukuran dan Sasaran </span>
                  </a>

                  <!-- Modal //xdok modal doh tu -->
                  <div id="myObjektif" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myObjektifLabel" aria-hidden="true">
                  <?php echo form_open('pspao_awal/pspao_baru'); ?>
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

						<?php echo validation_errors(); ?>
                  
                      	<?php 
						   $attributes = array(
							   'class' => 'form-horizontal no-margin', 
							   'name'  => 'ukuran_sasar_pspao',
							   'id'    => 'ukuran_sasar_pspao',
							);
                    		echo form_open('pspao_awal/pspao_baru',$attributes); 
						?>
						<?php include('ukuran_sasar_pspao.php'); ?>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>
                      <?php echo form_submit('mysubmit', 'Simpan Deraf','class="btn btn-warning2"') ?> 
                    </div>
                    <?php  echo form_close();?>

                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
                  
                </div>
                
                
               
          
              </div>
            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
             
            
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
          <a href="<?php echo site_url('pspao_awal/senarai_ppd_pspao') ?>">
        <?php
        $sebelum = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Sebelum'
        );

        echo form_button($sebelum);
        
        ?>
              </a>
        <?php
        $simpan_deraf = array(
            'name'    => '',
            'id'      => 'simpan',
            'class'   => 'btn btn-warning2',
            'value'   => '',
            'type'    => '',
            'content' => 'Simpan Deraf'
        );

        echo form_button($simpan_deraf);
        
        ?>
        <?php
        $hantar = array(
            'name'    => '',
            'id'      => 'hantar',
            'class'   => 'btn btn-success',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Hantar'
        );

        echo form_button($hantar);
        
        ?>
       
       

</div>
<div class="clearfix"></div>
                

        </div>
    
     <?php  echo form_close();?>
                 </div>          
            
         <!--div id="pspao" class="tab-pane fade active in">
         
         </div>

         <div id="ptra" class="tab-pane fade active in">
         
         </div>

         <div id="popa" class="tab-pane fade active in">
         
         </div>

         <div id="pnpa" class="tab-pane fade active in">
         
         </div>

         <div id="pla" class="tab-pane fade active in">
         
         </div>     
                     
                     
                     
                 </div-->
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
      
     
       $("hantar").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menghantar PSPA(O) awal ini?", function (e) {
          if (e) {
               document.forms["pspao_baru"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
      
       $("simpan").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyimpan PSPA(O) awal ini?", function (e) {
          if (e) {
               document.forms["pspao_baru"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
 
     
</script>
    
 