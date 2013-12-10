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
                  
                  
                      <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_ppd_ppun',
                           'id' => 'senarai_ppd_ppun',
                        );
                    echo form_open('ppun/summary_ppd_ppun',$attributes); ?>
              

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-body">
              
                  
                
                     <div class="alert alert-block alert-info fade in">
            <button data-dismiss="alert" class="close" type="button">
              ×
            </button>
            <span class="h-merah">
              90%
            </span>   dokumen ini telah dilengkapkan
            
           
          </div>
            
             
            <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> PPUN
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
              <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tahun
                      </label>
                      <div class="controls">
                           <?php echo form_error('tempoh_mula'); ?>
                         <?php echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"')?>
                        
                      </div>
                    </div>


               <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Kementerian
                      </label>
                      <div class="controls">
                      <?php //echo form_error('kementerian'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => 'Kementerian Kerja Raya',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span9',
                            'placeholder' =>  '',
                               'disabled'   => 'disabled'
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div> 

                    <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Jabatan / Agensi
                      </label>
                     <div class="controls">
                         <?php //echo form_error('jabatan'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'jabatan',
                            'id'          => 'jabatan',
                            'value'       => 'Jabatan Kerja Raya',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span9',
                            'placeholder' =>  '',
                               'disabled'   => 'disabled'
                          );

                          echo form_input($data);
                          
                          ?>
                     </div>
                    </div>           
                  


                   <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Premis
                      </label>
                     <div class="controls">
                      <?php //echo form_error('premis'); ?>
                     <?php
                          
                          $data = array(
                            'name'        => 'premis',
                            'id'          => 'premis',
                            'value'       => 'Pejabat Kerajaan',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span9',
                            'placeholder' =>  '',
                               'disabled'   => 'disabled'
                          );

                          echo form_input($data);
                          
                          ?>
                     
                     </div>
                    </div>  


                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        No DPA
                      </label>
                     <div class="controls">
                         <?php //echo form_error('nodpa'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'nodpa',
                            'id'          => 'nodpa',
                            'value'       => '1101MYS.050700.BB0001',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span9',
                            'placeholder' =>  'Pejabat Kerajaan',
                               'disabled'   => 'disabled'
                          );

                          echo form_input($data);
                          
                          ?> 
                     
                     </div>
                    </div>        
      

                  
                 
                      </div> 

  </div>
        

        <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila kemaskini Maklumat Berikut
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              

               
                     <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th style="width:30%">Kandungan</th>
                      
                        <th style="width:10%">Tindakan</th>
                        <th style="width:30%">Status</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.0</td>
                        <td><?php echo form_error('pendahuluan'); ?>Pendahuluan</td>
                        <td><ul class="icomoon-icons-container">
                        <a href="#pendahuluan"  data-toggle="modal">
                        <li class="rounded">
                        <span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span>
                        </li>
                        </a>
                        </ul></td>
                        <td><span class="badge badge-success">Semak</span></td>
                        
                      </tr>
                      <tr>
                         <td>2.0</td>
                        <td><?php echo form_error('objektif'); ?>Objektif</td>
                         <td><ul class="icomoon-icons-container">
                           <a href="#objektif"  data-toggle="modal">
                          <li class="rounded">
                        <span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span>
                      </li>
                    </a>
                       </ul></td>
                        <td><span class="badge badge-success">Sah</span></td>
                       
                      </tr>
                      <tr>
                        <td>3.0</td>
                        <td><?php echo form_error('carta'); ?>Carta Organisasi dan Pelan Komunikasi</td>
                       <td><ul class="icomoon-icons-container">
                         <a href="#carta"  data-toggle="modal">
                         <li class="rounded">
                          <span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span>
                        </li>
                      </a>
                       </ul></td>
                        <td><span class="badge badge-success">Deraf</span></td>
                        
                      </tr>

                       <tr>
                        <td>4.0</td>
                        <td><?php echo form_error('skopaktiviti'); ?>Skop dan Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset</td>
                       <td><ul class="icomoon-icons-container">
                         <a href="#skopaktiviti"  data-toggle="modal">
                         <li class="rounded">
                          <span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span>
                        </li>
                      </a>
                       </ul></td>
                        <td><span class="badge badge-success">Deraf</span></td>
                        
                      </tr>

                       <tr>
                        <td>5.0</td>
                        <td><?php echo form_error('keperluansumber'); ?>Penyediaan Keperluan Sumber Aktiviti Pemulihan/Ubah Suai/ Naik Taraf Aset</td>
                       <td><ul class="icomoon-icons-container">
                         <a href="#keperluansumber"  data-toggle="modal">
                         <li class="rounded">
                          <span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span>
                        </li>
                      </a>
                       </ul></td>
                        <td><span class="badge">Deraf</span></td>
                        
                      </tr>

                       <tr>
                        <td>6.0</td>
                        <td><?php echo form_error('kwlrekodaset'); ?>Kawalan Rekod Pemulihan/Ubah Suai/Naik taraf Aset</td>
                       <td><ul class="icomoon-icons-container">
                         <a href="#kwlrekodaset"  data-toggle="modal">
                         <li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li>
                       </a>
                       </ul></td>
                        <td><span class="badge">Deraf</span></td>
                        
                      </tr>

                       <tr>
                        <td>7.0</td>
                        <td><?php echo form_error('rujukan'); ?>Rujukan</td>
                        <td><ul class="icomoon-icons-container">
                           <a href="#rujukan"  data-toggle="modal">
                         <li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li>
                       </a>
                       </ul></td>
                        <td><span class="badge">Deraf</span></td>
                        
                      </tr>
                    </tbody>
                  </table>  






                  
                 
                      </div> 

  </div>

  <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Kemaskini Borang Berikut
                  </div>
                </div>
                
              
                
              <div class="widget-body">
             


                     <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th style="width:30%">Nama Borang</th>
                        <th style="width:10%">Tindakan</th>
                        <th style="width:30%">Status</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>JKR.PATA.F9/1a</td>
                       <td><ul class="icomoon-icons-container">
                         <li class="rounded"><a href="<?php echo site_url('ppun/model_struktur_ppun')?>"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></a></li>
                       </ul></td>
                        <td><span class="badge badge-success">Semak</span></td>
                        
                      </tr>
                      <tr>
                         <td>2</td>
                        <td>JKR.PATA.F9/1b</td>
                        <td><ul class="icomoon-icons-container">
                         <li class="rounded"><a href="<?php echo site_url('ppun/treeviewskop_ppun')?>"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></a></li>
                       </ul></td>
                        <td><span class="badge badge-success">Sah</span></td>
                        
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>JKR.PATA.F9/1c</td>
                       <td><ul class="icomoon-icons-container">
                      <li class="rounded"><a href="<?php echo site_url('ppun/tskopaktiviti_ppun')?>"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></a></li>
                        </ul></td>
                        <td><span class="badge badge-success">Deraf</span></td>
                        
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>JKR.PATA.F9/1d</td>
                       <td><ul class="icomoon-icons-container">
                       <li class="rounded"><a href="<?php echo site_url('ppun/kawalan_rekod_pemulihan_ppun')?>"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></a></li>
                       </ul></td>
                        <td><span class="badge">Deraf</span></td>
                        
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>JKR.PATA.F9/1e</td>
                       <td><ul class="icomoon-icons-container">
                        <li class="rounded"><a href="<?php echo site_url('ppun/dokumen_rujukan_ppun')?>"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></a></li>
                      </ul></td>
                        <td><span class="badge">Deraf</span></td>
                        
                      </tr>
                    </tbody>
                  </table>

                  
                 
                      </div> 

  </div>   
           
           

  <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Ulasan
                  </div>
                </div>
                
              
                
              <div class="widget-body">
             

 
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

  </div>   
      


           
           
           
                
            
            
          </div>
          
         
            

        </div>

    </div>

 <div class="next-prev-btn-container pull-right">
                  
          <a href="<?php echo site_url('ppun/senarai_ppd_ppun') ?>">        
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
        $pembetulan = array(
            'name'    => '',
            'id'      => 'betul',
            'class'   => 'btn btn-info input-top-margin',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Pembetulan'
        );

        echo form_button($pembetulan);
        
        ?>
        <?php
        $lulus = array(
            'name'    => 'hantar',
            'id'      => 'hantar',
            'class'   => 'btn btn-success',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Hantar'
        );

        echo form_button($lulus);
        
        ?>
              
</div>
<div class="clearfix"></div>

      
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




 <!-- Modal -->
                  <div id="pendahuluan" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                   
                        <?php //$this->load->view('ppun/popup_pendahuluan_ppun');?>
                        <!--popup pendahuluan-->
                       
      
            <div class="modal-body">
              <p>
				
                  
                  <div class="control-group">
                      <label>
                        1.0 Pendahuluan
                      </label>                  
                  <div class="wysiwyg-container">
                     <?php 
                          $data = array(
                                    'name'        => 'pendahuluan',
                                    'id'          => 'wysiwyg',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                  </div>
                  </div>
                
              </p>  
            </div>
            <!--button-->
        	<div class="modal-footer">
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
        <?php
        $simpan= array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-info',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Simpan'
        );

        echo form_button($simpan);
        
        ?>                       
            </div>
            <!--/.END button-->
        
                     
                   
                  </div>



                   <div id="objektif" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    
                        <?php //$this->load->view('ppun/popup_objektif_ppun');?>
                     
  <div class="modal-body">
              <p>
				
                  
                  <div class="control-group">
                      <label>
                        2.0 Objektif
                      </label>                  
                  <div class="wysiwyg-container">
                       <?php 
                          $data = array(
                                    'name'        => 'objektif',
                                    'id'          => 'wysiwyg2',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                  </div>
                  </div>
                
              </p>  
            </div>
            <!--button-->
        	<div class="modal-footer">
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
        <?php
        $simpan= array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-info',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Simpan'
        );

        echo form_button($simpan);
        
        ?>                       
            </div>
            <!--/.END button-->
                   
                  </div>



                     <div id="carta" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                   
                         <?php //$this->load->view('ppun/popup_org_kom_ppun');?>
                         
  <div class="modal-body">
              <p>
				
                  
                  <div class="control-group">
                      <label>
                        3.0 Carta Organisasi dan Pelan Komunikasi
                      </label>                  
                  <div class="wysiwyg-container">
                        <?php 
                          $data = array(
                                    'name'        => 'carta',
                                    'id'          => 'wysiwyg3',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                  </div>
                  </div>
                
              </p>  
            </div>
            <!--button-->
        	<div class="modal-footer">
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
        <?php
        $simpan= array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-info',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Simpan'
        );

        echo form_button($simpan);
        
        ?>                       
            </div>
            <!--/.END button-->
                      
                   
                  </div>

 <div id="skopaktiviti" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    
                       
                          <?php //$this->load->view('ppun/popup_skopaktiviti_ppun');?>

                <div class="modal-body">
                             <p>


                                 <div class="control-group">
                                     <label>
                                       4.0 Skop dan Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset
                                     </label>                  
                                 <div class="wysiwyg-container">
                                      <?php 
                                         $data = array(
                                                   'name'        => 'skopaktiviti',
                                                   'id'          => 'wysiwyg4',
                                                   'value'       => '',
                                                   'rows'        => '5',
                                                   'cols'        => '10',
                                                   'style'       => 'height: 80px',
                                                   'class'       => 'input-block-level',
                                             'placeholder'       => '',
                                                 );

                                    echo form_textarea($data); ?>
                                 </div>
                                 </div>

                             </p>  
                           </div>
                           <!--button-->
                               <div class="modal-footer">
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
                       <?php
                       $simpan= array(
                           'name'    => '',
                           'id'      => '',
                           'class'   => 'btn btn-info',
                           'value'   => '',
                           'type'    => 'button',
                           'content' => 'Simpan'
                       );

                       echo form_button($simpan);

                       ?>                       
                           </div>
                           <!--/.END button-->

                   
                  </div>


                  <div id="keperluansumber" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    
                        <?php //$this->load->view('ppun/popup_keperluansumber_ppun');?>
                       

<div class="modal-body">
              <p>
				
                  
                  <div class="control-group">
                      <label>
                        5.0 Penyediaan Keperluan Sumber Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset
                      </label>                  
                  <div class="wysiwyg-container">
                       <?php 
                          $data = array(
                                    'name'        => 'keperluansumber',
                                    'id'          => 'wysiwyg5',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                  </div>
                  </div>
                
              </p>  
            </div>
            <!--button-->
        	<div class="modal-footer">
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
        <?php
        $simpan= array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-info',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Simpan'
        );

        echo form_button($simpan);
        
        ?>                       
            </div>
            <!--/.END button-->
 
                     
                   
                  </div>

                  <div id="kwlrekodaset" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    
                       <?php //$this->load->view('ppun/popup_kawalan_rekod_aset_ppun');?>
                      
<div class="modal-body">
              <p>
				
                  
                  <div class="control-group">
                      <label>
                        6.0 Kawalan Rekod Pemulihan/ Ubah Suai/ Naik Taraf Aset
                      </label>                  
                  <div class="wysiwyg-container">
                       <?php 
                          $data = array(
                                    'name'        => 'kwlrekodaset',
                                    'id'          => 'wysiwyg1',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                  </div>
                  </div>
                
              </p>  
            </div>
            <!--button-->
        	<div class="modal-footer">
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
        <?php
        $simpan= array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-info',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Simpan'
        );

        echo form_button($simpan);
        
        ?>                       
            </div>
            <!--/.END button-->

                      
                   
                  </div>


                   <div id="rujukan" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                   
                        <?php //$this->load->view('ppun/popup_rujukan_ppun');?>
                      
<div class="modal-body">
              <p>
				
                  
                  <div class="control-group">
                      <label>
                        7.0 Rujukan
                      </label>                  
                  <div class="wysiwyg-container">
                        <?php 
                          $data = array(
                                    'name'        => 'rujukan',
                                    'id'          => 'wysiwyg7',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => '',
                                  );

                     echo form_textarea($data); ?>
                  </div>
                  </div>
                
              </p>  
            </div>
            <!--button-->
        	<div class="modal-footer">
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
        <?php
        $simpan= array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-info',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Simpan'
        );

        echo form_button($simpan);
        
        ?>  
          <?php
        $hantar= array(
            'name'    => 'hantar',
            'id'      => 'hantar',
            'class'   => 'btn btn-info',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Hantar'
        );

        echo form_button($hantar);
        
        ?>                 
            </div>
            <!--/.END button-->
                   
                  </div>










  </div>

    </div>  
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
        alertify.confirm("Adakah anda ingin menghantar Pelan Pemulihan / Ubah Suai / Naik Taraf Aset ini?", function (e) {
          if (e) {
              
              document.forms["senarai_ppd_ppun"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
       $("betul").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin meluluskan Pelan Pemulihan / Ubah Suai / Naik Taraf Aset ini?", function (e) {
          if (e) {
              
              document.forms["senarai_ppd_ppun"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
 
     
</script>
    