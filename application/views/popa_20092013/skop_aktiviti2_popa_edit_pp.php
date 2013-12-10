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
                        Perangcangan
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
                        PNPA
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
                    <li class="active"><a href="">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
        
        
        
        
<!-- tab section START -->
<div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
        <div class="main-container">
     
            
            
        <!-- big panel START -->  
        <div class="row-fluid">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Sila Kemaskini Maklumat Berikut
                        </div>
                    </div>
             
                    
                    
                    <div class="widget-body">
                    <div class="main-container">
          
          
                    
                    <?php //echo validation_errors(); ?>
                        <?php 
                            $attributes = array(
                                'class' => 'form-horizontal no-margin', 
                                'name' => 'skop_aktiviti2_popa_edit_pp',
                                'id' => 'skop_aktiviti2_popa_edit_pp',
                            );
                            echo form_open('main/skop_aktiviti2_popa_edit_pp',$attributes); ?>
                        
                        
                    <!-- panel 1 START -->
                    <div class="widget"> 
                        <div class="widget-body">
                       
                            
                            
                            
                        <div class="control-group">
                            <label class="control-label">
                                Skop
                            </label>
                            <div class="controls">
                                <input class="input-xxlarge" type="text" placeholder="Kerja Tanah" disabled name="skop" id="skop">
                            </div>
                        </div>
                            
                            
                            
                        <div class="control-group">
                            <label class="control-label">
                                Aktiviti
                            </label>
                            <div class="controls">
                                <input class="input-xxlarge" type="text" placeholder="Aktiviti 1" disabled name="aktiviti" id="aktiviti">
                            </div>
                        </div>
                    
                            
                            
                        <div class="control-group">
                            <label class="control-label">
                                Butiran Aktiviti
                            </label>
                            <div class="controls">
                                <input class="input-xxlarge" type="text" placeholder="Butiran Aktiviti 1" disabled name="butiran" id="butiran">
                            </div>
                        </div>
                            
                            
                     
                        </div>
                    </div>
                    <!-- panel 1 End -->
          
                    
                    
                    
                    <!-- panel 2 START -->  
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">
                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Skop dan Aktiviti Operasi dan Penyenggaraan
                                    </div>
                                </div>
                                
                                
                                
                                <div class="widget-body">
                              
                                    
                                    
                                    
                                <div class="control-group">
                                    <label class="control-label">
                                        Pihak Berkaitan
                                    </label>
                                    <div class="controls">
                                        <?php echo form_error('pihakberkaitan'); ?> 
                                        <?php 
                                            $data = array(
                                                'name'        => 'pihakberkaitan',
                                                'id'          => 'pihakberkaitan',
                                                'class'       => 'input-large',
                                                'placeholder' => 'Isi Ruangan Ini',
                                            );
                                            echo form_input($data); 
                                        ?>
                                    </div>
                                </div>
                                    
                                  
                                    
                                    
                                    
                                    
                                <div class="control-group">
                                    <label class="control-label">
                                        Tanggungjawab
                                    </label>
                                    <div class="controls wysiwyg-container">
                                        <?php echo form_error('tanggungjawab'); ?> 
                                        <?php 
                                            $data = array(
                                                'name'        => 'tanggungjawab',
                                                'id'          => 'wysiwyg9',
                                                'value'       => '',
                                                'rows'        => '5',
                                                'cols'        => '10',
                                                'style'       => 'height: 80px',
                                                'class'       => 'input-block-level',
                                                'placeholder' => 'Isi Ruangan Ini',
                                            );
                                            echo form_textarea($data); 
                                        ?>
                                    </div>
                                </div>
                                    
                                    
                                    
                                <div class="control-group">
                                    <label class="control-label" for="report_range1">
                                        Tempoh Pelaksanaan
                                    </label>
                                    <div class="controls">
                                        <label>Mula
                                            <div class="input-append">
                                                <?php
                                                    $data = array(
                                                        'name'        => 'tarikh_mula',
                                                        'id'          => 'tarikh_mula',
                                                        'value'       => '',
                                                        'maxlength'   => '',
                                                        'size'        => '',
                                                        'class'       => 'span8 report_range',
                                                        'placeholder' =>  'Pilih Tarikh',
                                                    );
                                                    echo form_input($data);
                                                ?>
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                
                                                Hingga
                                            <div class="input-append">
                                                <input type="text" name="report_range1" id="report_range1" class="span8 report_range" placeholder="Pilih Tarikh"/>
                                                <span class="add-on">
                                                    <i class="icon-calendar"></i>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                   
                                    
                                    
                                <div class="control-group">
                                    <label class="control-label">
                                        Catatan
                                    </label>
                                    <div class="controls wysiwyg-container">
                                        <?php echo form_error('catatan'); ?> 
                                        <?php 
                                            $data = array(
                                                'name'        => 'catatan',
                                                'id'          => 'wysiwyg10',
                                                'value'       => '',
                                                'rows'        => '5',
                                                'cols'        => '10',
                                                'style'       => 'height: 80px',
                                                'class'       => 'input-block-level',
                                                'placeholder' => 'Isi Ruangan Ini',
                                            );
                                            echo form_textarea($data); 
                                        ?>
                                    </div>
                                </div> 
                                    
                                   
                                
                                </div>
              
                                
                            </div>
                        </div>
                    </div>
                    <!-- panel 2 END --> 
          
                    
                    
                    
                    <!-- panel 3 START --> 
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">
                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Format Analisis Keperluan Sumber Aktiviti Operasi dan Penyenggaraan Aset 
                                    </div>
                                </div>
                        
                                
                                <div class="widget-body">
                               
                                    
                                    
                                <div class="control-group">
                                    <label class="control-label" for="DateOfBirthMonth">
                                        Objek Sebagai
                                    </label>
                                    <div class="controls controls-row">
                                        <select id="subject">
                                            <option>-Sila Pilih-</option>
                                            <option>14000: Elaun Lebih Masa</option>
                                            <option>22000: Pengangkutan Barang</option>
                                            <option>23000: Perhubungan dan Utiliti</option>
                                            <option>24000: Sewaan</option>
                                            <option>Other</option>
                                        </select>    
                                    </div>
                                </div>
                  
                                    
                                    
                                <div class="control-group">
                                    <label class="control-label">
                                        Bajet Aktiviti (RM)
                                    </label>
                                    <div class="controls">
                                        <input class="input-large" type="text"  name="carian" id="bajet"/>                        
                                    </div>
                                </div> 
                                    
                                    
                                    
                                <div class="control-group">
                                    <label class="control-label">
                                        Sumber
                                    </label>
                                    <div class="controls controls-row">
                                        <input class="input-large" type="text"  placeholder=""></div>
                                    </div>
                                </div>
                    
                                    
                                    
                                <div class="control-group">
                                    <label class="control-label">
                                        Output
                                    </label>
                                    <div class="controls wysiwyg-container">
                                        <textarea name="textarea" class="input-block-level" 
                     style="height: 100px; width: 550px" placeholder="">
                                        </textarea>
                                        ?>
                                    </div>
                                </div>
                               
                                </div>
              
                            
                            </div>
                        </div>
                    </div>
                    <!-- panel 3 END --> 

                    
                    
                    
                    <!-- panel 4 START -->  
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">
                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Keperluan Sumber
                                    </div>
                                </div>
                                
                                
                                <div class="widget-body">
                               
                                    
                                    
                                
                                <!-- checkbox row 1 START -->
                                <label>1. Sumber Manusia</label>
                                <div class="row-fluid">
          
                                
                                 
                                <!-- checkbox rancang START -->    
                                <div class="span4">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Rancang
                                            </div>
                                        </div>
               
                                        <div class="widget-body">
                                            <div id="scrollbar-three">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Husin Bin Hasan
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Rahmah Binti Chik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Sulaiman Bin Malik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Shariff Bin Ghazali
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Husin Bin Hasan
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Rahmah Binti Chik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Sulaiman Bin Malik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Shariff Bin Ghazali
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Husin Bin Hasan
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Rahmah Binti Chik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Sulaiman Bin Malik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Shariff Bin Ghazali
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
            
                                    </div>
                                </div>
                                <!-- checkbox rancang END -->
          
                                
                            
                                
          
                                <!-- checkbox lulus START -->
                                <div class="span4">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Lulus
                                            </div>
                                        </div>
                
                  
                                        <div class="widget-body">
                                            <div id="scrollbar1">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Husin Bin Hasan
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Rahmah Binti Chik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Sulaiman Bin Malik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Shariff Bin Ghazali
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Husin Bin Hasan
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Rahmah Binti Chik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Sulaiman Bin Malik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Shariff Bin Ghazali
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                                        
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
              
                                    
                                    </div>
                                </div>
                                <!-- checkbox lulus END -->
          
                                
                                
                                
                                <!-- checkbox isi START -->
                                <div class="span4">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Isi
                                            </div>
                                        </div>
                                
                                        
                                        <div class="widget-body">
                                            <div id="scrollbar2">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Husin Bin Hasan
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Rahmah Binti Chik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Sulaiman Bin Malik
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Shariff Bin Ghazali
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                                        
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
            
                                    
                                    </div>
                                </div>
                                <!-- checkbox isi END --> 
        
                                
                                
                                
                                </div> 
                                <!-- checkbox row 1 END -->
        
                                
                                
                                
                                
                                <!-- checkbox row 2 START -->
                                <label>2. Pengurusan Pejabat</label>           
                                <div class="row-fluid">
          
                                    
                                    
                                <!-- checkbox fotostat START -->
                                <div class="span4">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Mesin Fotostat
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="widget-body">
                                            <div id="scrollbar3">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Canon iR 5065
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Canon iR 5075
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Canon iR 7105
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Canon iR 7095
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                                        
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
                                        
                                        
                                    </div>
                                </div>
                                <!-- checkbox fotostat END --> 
          
                                
                                
                                
                                <!-- checkbox fax START -->
                                <div class="span4">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Fax
                                            </div>
                                        </div>
                
                                        
                                        <div class="widget-body">
                                            <div id="scrollbar4">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Brother FAX-1270E
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                IntelliFAX 1840c
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Color Inkjet FAX Machine A
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Color Inkjet FAX Machine B
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                                        
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
              
                                    
                                    </div>
                                </div>
                                <!-- checkbox fax END --> 
          
                                
                                
                                
                                <!-- checkbox telefon START -->
                                <div class="span4">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Telefon
                                            </div>
                                        </div>
                
                                        
                                        <div class="widget-body">
                                            <div id="scrollbar5">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                YLX-728 Black
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                CT-CID507
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                YLX-728 White
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                MT-102
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                                        
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
              
                                    
                                    </div>
                                </div>
                                <!-- checkbox telefon END -->
        
                                
                                
                                </div>
                                <!-- checkbox row 2 END -->
        
                                
                                
                                
                                
                                <!-- checkbox row 3 START -->
                                <label>3. Peralatan Kerja</label>           
                                <div class="row-fluid">
          
                                    
                                    
                                <!-- checkbox komputer START -->
                                <div class="span3">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Komputer
                                            </div>
                                        </div>
                
                                        
                                        <div class="widget-body">
                                            <div id="scrollbar6">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Apple
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                IBM
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Dell
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Lenovo
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
              
                                    
                                    </div>
                                </div>
                                <!-- checkbox komputer END -->
          
                                
                                
                                <!-- checkbox pemeriksaan START -->
                                <div class="span3">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Pemeriksaan
                                            </div>
                                        </div>
                
                                        
                                        <div class="widget-body">
                                            <div id="scrollbar7">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                        <div class="viewport">
                                            <div class="overview">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="a">
                                                        Alat 1
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="b">
                                                        Alat 2
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="a">
                                                        Alat 3
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="b">
                                                        Alat 4
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="a">
                                                        Alat 1
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="b">
                                                        Alat 2
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="a">
                                                        Alat 3
                                                </label>
                                                <label class="checkbox">
                                                    <input type="checkbox" value="b">
                                                        Alat 4
                                                </label>
                                            </div>
                                        </div>
                                            
                                            
                                            </div>
                                        </div>
                
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
              
                                    
                                    </div>
                                </div>
                                <!-- checkbox komputer END -->
          
                                
                                
                                
                                <!-- checkbox kenderaan START -->
                                <div class="span3">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Kenderaan
                                            </div>
                                        </div>
                
                                        
                                        <div class="widget-body">
                                            <div id="scrollbar8">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Proton Saga FL
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Nissan Almera
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Produa Myvi SE
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Honda Jazz Hybrid
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Proton Saga FL
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Nissan Almera
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Produa Myvi SE
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Honda Jazz Hybrid
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
              
                                    
                                    </div>
                                </div>
                                <!-- checkbox kenderaan END -->
          
                                
                                
                                
                                <!-- checkbox PPE START -->
                                <div class="span3">
                                    <div class="widget">
                                        <div class="widget-header">
                                            <div class="title">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> PPE
                                            </div>
                                        </div>
                
                                        
                                        <div class="widget-body">
                                            <div id="scrollbar9">
                                                <div class="scrollbar">
                                                    <div class="track">
                                                        <div class="thumb">
                                                            <div class="end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
             
                                                
                                                <div class="viewport">
                                                    <div class="overview">
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Google
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Mask
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Glove
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Helmet
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Google
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Mask
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="a">
                                                                Glove
                                                        </label>
                                                        <label class="checkbox">
                                                            <input type="checkbox" value="b">
                                                                Helmet
                                                        </label>
                                                    </div>
                                                </div>
                                            
                                            
                                            </div>
                                        </div>
                
                                        <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                                            <input class="input-small" type="text" />
                                        </label>
              
                                    </div>
                                </div>
                                <!-- checkbox PPE END --> 
        
                                
                                
                                
                                </div>
                                <!-- checkbox row 3 END -->
                                
        
                                
                                
                               
                            </div>
              
                            
                        </div>
                    </div>
                </div>
                <!-- panel 4 END -->
          
   				
                
                
                <!-- buttons START --> 
                <div class="widget-body" align="right">
                    <a href="<?php echo site_url('popa/summary_pp_popa_edit') ?>">
                        <button class="btn btn-danger input-top-margin" type="button">
                            Batal
                        </button>
                    </a>
                    <a href="<?php echo site_url('popa/treeviewskop_popa_edit_pp') ?>">
                        <button class="btn btn-primary input-top-margin" type="button">
                            Sebelum
                        </button>
                    </a>
                    <a href="<?php echo site_url('popa/summary_pp_popa_edit') ?>">
                        <button class="btn btn-warning2 input-top-margin" type="button">
                            Simpan
                        </button>
                    </a>
                    
                </div> 
                <!-- buttons END -->         
      
                
                    <?php  echo form_close();?>
                    </div>  
      		    </div>         
  		    
                    
                    
                    
                </div>
           </div>
        </div>
        <!-- big panel START -->
     
        
        
        
        </div>  
    </div>
</div>
<!-- tab section END -->
  
    

</div>  
<!-- tab navigation END -->
  