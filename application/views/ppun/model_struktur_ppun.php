    
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
                        PPUN
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />    



<div class="widget-body">
          
          <ul class="nav nav-tabs no-margin myTabBeauty">
                     <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class="active"><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
                  
                   <div class="tab-content" id="myTabContent">
                 <div id="ppun" class="tab-pane fade active in">
          
                      
                    <?php //echo validation_errors(); ?>
                   <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'model_struktur_ppun',
                           'id' => 'model_struktur_ppun',
                        );
                    echo form_open('ppun/model_struktur_ppun',$attributes); ?>
      

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Model Struktur Organisasi Pemulihan/ Ubah Suai/ Naik Taraf Aset Di Premis
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
            
                <div class="row-fluid">

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> PTF
                  </div>
                </div>
                <div class="widget-body">
                  <div class="input-prepend">
                    <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Adam Bin Daud";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Razali Bin Aziz";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                  <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                    
                  </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> PIF
                  </div>
                </div>
                <div class="widget-body">
                  <div class="input-append">
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Adam Bin Daud";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Razali Bin Aziz";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                    
                  </label>
                  </div>
                </div>
              </div>
            </div>

         

          </div>

             
              <div class="row-fluid">

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> PDF
                  </div>
                </div>
                <div class="widget-body">
                  <div class="input-prepend">
                   <label class="checkbox">
                   <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Adam Bin Daud";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Razali Bin Aziz";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Aiman Bin Hisham";
                      ?>
                    
                  </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> POF
                  </div>
                </div>
                <div class="widget-body">
                  <div class="input-append">
                    <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Nurul Fazillah Binti Ishak";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Nurul Fazillah Binti Ishak";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Nurul Fazillah Binti Ishak";
                      ?>
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Nurul Fazillah Binti Ishak";
                      ?>
                  </label>
                  </div>
                </div>
              </div>
            </div>

         

          </div>
      
                   
              
               <div class="row-fluid">

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Pegawai Pentadbiran Dan Kewangan
                  </div>
                </div>
                <div class="widget-body">
                  <div class="input-prepend">
                    <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Affandi Bin Osman";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Affandi Bin Osman";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Affandi Bin Osman";
                      ?>
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Affandi Bin Osman";
                      ?>
                  </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Pengawai Penyelia Sivil Dan Struktur
                  </div>
                </div>
                <div class="widget-body">
                  <div class="input-append">
                    <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Mohd Affandi Bin Osman";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Nurul Fazillah Binti Ishak";
                      ?>
                  
                  
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Nik Syahidan Binti Nik Deraman";
                      ?>
                  
                  </label>
                  <label class="checkbox">
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                  </label>
                  </div>
                </div>
              </div>
            </div>

         

          </div>
    
                    
               
                <div class="row-fluid">

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Pegawai Penyelia Mekanikal
                  </div>
                </div>
                <div class="widget-body">
                  <div class="input-prepend">
                    <label class="checkbox">
                 
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                 
                  </label>
                  <label class="checkbox">
                   
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo " Mohd Aiman Bin Hisham";
                      ?>
                    Adam Bin Daud
                  </label>
                  <label class="checkbox">
                   
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo " Mohd Aiman Bin Hisham";
                      ?>
                   Razali Bin Aziz
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo " Mohd Aiman Bin Hisham";
                      ?>
                   
                  </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="span6">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Pegawai Penyelia Elektrik
                  </div>
                </div>
                <div class="widget-body">
                  <div class="input-append">
                   <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Adam Bin Daud";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                    <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Syed Adnan Bin Jaafar";
                      ?>
                   
                  </label>
                  <label class="checkbox">
                   
                     <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Rahmat Bin Sapawi";
                      ?>
                    
                  </label>
                  <label class="checkbox">
                      <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Leman Bin Ahmad";
                      ?>
                   
                  </label>
                  </div>
                </div>
              </div>
            </div>

         

          </div>
          
          <!--panel 3--> 
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Komunikasi Bagi Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset
                  </div>
                </div>
               <div class="widget-body">
                  <form class="form-horizontal no-margin">     
                    <div class="control-group">
                      <label>Tugas Dan Pegawai Atasan Yang Ada Kaitan &nbsp;&nbsp;&nbsp;
                       <?php
                          
                          $data = array(
                            'name'        => 'tugas_pegawai_atasan',
                            'id'          => 'tugas_pegawai_atasan',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-xxlarge',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
                    </div>
                    <div class="control-group">
                      <label>Tanggungjawab Dan Kuasa Yang Diberikan &nbsp;&nbsp;&nbsp;&nbsp;
                       <?php
                          
                          $data = array(
                            'name'        => 'tggjwb_kuasa',
                            'id'          => 'tggjwb_kuasa',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-xxlarge',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?></label>
                    </div>
                    <div class="control-group">
                      <label>Tugas Pegawai-Pegawai Lain Yang Ada Kaitan&nbsp;
                        <?php
                          
                          $data = array(
                            'name'        => 'tugas_pegawai_lain',
                            'id'          => 'tugas_pegawai_lain',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-xxlarge',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                      </label>
                     </div>                  
                  </form>
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 3--> 
                
         
  
          
            </div>
            

          </div>
          
         
        <div class="next-prev-btn-container pull-right">
              <a href="<?php echo site_url('ppun/senarai_ppun') ?>">    
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
            <a href="<?php echo site_url('ppun/penyediaan_kandungan_ppun') ?>">   
        <?php
        $sebelum = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Sebelum'
        );

        echo form_button($sebelum);
        
        ?>
            </a>
            <a href="<?php echo site_url('ppun/treeviewskop_ppun') ?>">   
        <?php
        $seterusnya = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Seterusnya'
        );

        echo form_button($seterusnya);
        
        ?>
            </a>

</div>
<div class="clearfix"></div>
                

        </div>
        

    </div>

      <!--/.fluid-container-->
      
      
                 </form>


        </div>
        
        
       
     
      </div>

  <div id="pspao" class="tab-pane fade active in">
         
         </div>

         <div id="ptra" class="tab-pane fade active in">
         
         </div>

         <div id="popa" class="tab-pane fade active in">
         
         </div>

         <div id="pnpa" class="tab-pane fade active in">
         
         </div>

         <div id="pla" class="tab-pane fade active in">
         
         </div>



      
      </div>
         