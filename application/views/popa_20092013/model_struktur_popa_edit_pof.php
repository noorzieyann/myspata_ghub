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
                
          
   
    
<!-- div tab START -->
<div class="tab-content" id="myTabContent"> 
    <div id="home" class="tab-pane fade active in">  
         
          

            
<!-- panel utama START -->
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Model Struktur Dan Penyenggaraan Aset
                </div>
            </div>
            <?php 
                $attributes = array(
                    'class' => 'form-horizontal no-margin', 
                    'name' => 'model_struktur_popa',
                    'id' => 'model_struktur_pnoa',
                );
                echo form_open('pnpa/model_struktur_popa_edit',$attributes); ?>
                
            
            
            <!-- panel checkbox START -->
            <div class="widget-body"><br>
                
                
                
                <!-- checkbox row 1 START -->
                <div class="row-fluid"> 
                
                    
                    
                <!-- checkbox PTF START -->
                <div class="span6"> 
                    <div class="widget"> 
                        <div class="widget-header"> 
                            <div class="title"> 
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                            </span> PTF 
                            </div> 
                        </div> 
                
                        <div class="widget-body">
                        <div class="control-group"> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Abu Bakar Bin Sulaiman 
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value="" checked=""> Hussin Bin Seman
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Jamilah Binti Jamil
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Maznah Binti Hamzah
                            </label> 
                        </div> 
                        </div> 
                    </div>
                </div>
                <!-- checkbox PTF END -->
                 
                 
                 
                 
                <!-- checkbox PIF START -->
                <div class="span6"> 
                    <div class="widget"> 
                        <div class="widget-header"> 
                            <div class="title"> 
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                </span> PIF 
                            </div> 
                        </div> 
                 
                        <div class="widget-body"> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Leman Bin Ahmad 
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value="" checked=""> Adam Bin Daud
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Muhammad Bin Ismail
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Azmin Bin Bidin
                            </label> 
                        </div> 
                    </div> 
                </div> 
                <!-- checkbox PIF END -->
                   
                
                
                </div>
                <!-- checkbox row 1 END -->
                    
                
                
                
                <!-- checkbox row 2 START -->
                <div class="row-fluid">
            
                    
                    
                <!-- checkbox PDF START -->
                <div class="span6"> 
                    <div class="widget"> 
                        <div class="widget-header"> 
                            <div class="title"> 
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                </span> PDF 
                            </div> 
                        </div> 
                
                        <div class="widget-body"> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Siti Farah Binti Mustafa 
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value="" checked=""> Nurul Alya Binti Hamid
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Syed Adnan Bin Jaafar
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Rahmat Bin Sapawi
                            </label> 
                        </div> 
                    </div> 
                </div> 
                <!-- checkbox PDF END -->
                 
                 
                 
                <!-- checkbox POF START -->
                <div class="span6"> 
                    <div class="widget"> 
                        <div class="widget-header"> 
                            <div class="title"> 
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                </span> POF 
                            </div> 
                        </div> 
                 
                        <div class="widget-body"> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Nur Fazurina Binti Mohamad 
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value="" checked=""> Kamal Bin Zaid
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Razali Bin Aziz
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Sapawati Binti Abdullah
                            </label> 
                        </div> 
                    </div> 
                </div>
                <!-- checkbox POF END -->
                
                
                
                </div>
                <!-- checkbox row 2 END -->
                    
                    
                    
                    
                <!-- checkbox row 3 START -->
                <div class="row-fluid">
            
                    
                    
                    
                <!-- checkbox pegawai pentadbiran START -->
                <div class="span6"> 
                    <div class="widget"> 
                        <div class="widget-header"> 
                            <div class="title"> 
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                            </span> Pegawai Pentadbiran Dan Kewangan 
                            </div> 
                        </div> 
                
                        <div class="widget-body"> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Mohd Affandi Bin Osman
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value="" checked=""> Nurul Fazilah Binti Osman
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Nik Syahidah Binti Nik Deraman
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Mohd Aiman Bin Hisham
                            </label> 
                        </div> 
                    </div> 
                </div> 
                <!-- checkbox pegawai pentadbiran END -->
                 
                 
                 
                 
                <!-- checkbox pegawai sivil START -->
                <div class="span6"> 
                    <div class="widget"> 
                        <div class="widget-header"> 
                            <div class="title"> 
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                </span> Pegawai Penyelia Sivil Dan Struktur 
                            </div> 
                        </div> 
                 
                        <div class="widget-body"> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Mohd Affandi Bin Osman
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value="" checked=""> Nurul Fazilah Binti Osman
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Nik Syahidah Binti Nik Deraman
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Mohd Aiman Bin Hisham
                            </label> 
                        </div> 
                    </div> 
                </div>
                <!-- checkbox pegawai sivil END -->
                
                
                
                </div>
                <!-- checkbox row 3 END --> 
                    
                    
                    
                    
                <!-- checkbox row 4 START -->
                <div class="row-fluid">
                    
                    
                    
                    
                <!-- checkbox pegawai makmal START --> 
                <div class="span6"> 
                    <div class="widget"> 
                        <div class="widget-header"> 
                            <div class="title"> 
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                </span> Pegawai Penyelia Makmal
                            </div> 
                        </div> 
                
                        <div class="widget-body"> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Leman Bin Ahmad
                            </label> 
                        <label class="checkbox"> 
                            <input type="checkbox" value="" checked=""> Adam Bin Daud
                        </label> 
                        <label class="checkbox"> 
                            <input type="checkbox" value=""> Razali Bin Aziz
                        </label> 
                        <label class="checkbox"> 
                            <input type="checkbox" value=""> Mohd Aiman Bin Hisham
                        </label> 
                        </div> 
                    </div> 
                </div> 
                <!-- checkbox pegawai makmal END -->
                 
                 
                 
                 
                <!-- checkbox pegawai elektrik START -->
                <div class="span6"> 
                    <div class="widget"> 
                        <div class="widget-header"> 
                            <div class="title"> 
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                </span> Pegawai Penyelia Elektrik
                            </div> 
                        </div> 
                 
                        <div class="widget-body"> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Adam Bin Daud
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value="" checked=""> Syed Adnan Bin Jaafar
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Rahmat Bin Sapawi
                            </label> 
                            <label class="checkbox"> 
                                <input type="checkbox" value=""> Leman Bin Ahmad
                            </label> 
                        </div> 

                        <div class="clearfix"></div>
                    
                    </div> 
                </div>
                <!-- checkbox pegawai elektrik END -->
                    
                
                
                
                <!-- checkbox row 4 END -->
                </div>
                   
                
                
                
                <!-- panel kontraktor fasiliti START -->
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
                            <div class="widget-header">
                                <div class="title">
                                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Kontraktor Fasiliti
                                </div>
                            </div>
                
                            
                            
                <!-- table section START -->                
                <div class="widget-body">
                    <ul class="icomoon-icons-container">
                        <li>
                            <a href="#myModal" data-toggle="modal">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                            </a>
                        </li>
                    </ul>
                    <label class="tambah">Tambah Kontraktor Fasiliti</label>
                   
                   
                   
                <!-- popup tambah START -->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                        </button>
                        <h4 id="myModalLabel">
                            Tambah Kontraktor Fasiliti
                        </h4>
                    </div>
          
                    
                    
                    <!-- form popup START -->
                    <div class="modal-body">
                        <p>
                        <form class="form-horizontal no-margin">
                            
                            
                            
                        <div class="control-group">
                            <label class="control-label">
                                Kategori
                            </label>
                            <div class="controls">
                                <select id="subject">
                                    <option>-Sila Pilih-</option>
                                    <option>Sivil & Struktur</option>
                                    <option>Arkitek</option>
                                    <option>Teknikal </option>
                                    <option>Mekanikal</option>
                                </select> 
                            </div>
                        </div>
                    
                            
                            
                        <div class="control-group">
                            <label class="control-label">
                                Nama
                            </label>
                            <div class="controls">
                                <input class="input-large" type="text"  name="nama" id="nama"/>
                            </div>
                        </div>
                    
                            
                            
                        <div class="control-group">
                            <label class="control-label" for="date_range1">
                                E-mel
                            </label>
                            <div class="controls">
                                <input class="input-large" type="text"  name="emel" id="emel"/>
                            </div>
                        </div>
                    
                            
                            
                        <div class="control-group">
                            <label class="control-label" for="date_range1">
                                No Telefon Pejabat
                            </label>
                            <div class="controls">
                                <input class="input-large" type="text"  name="nopejabat" id="nopejabat"/>
                            </div>
                        </div> 
                    
                            
                            
                        <div class="control-group">
                            <label class="control-label" for="date_range1">
                                No Telefon Bimbit
                            </label>
                            <div class="controls">
                                <input class="input-large" type="text"  name="notel" id="notel"/>
                            </div>
                        </div> 
                    
                            
                            
                        <div class="control-group">
                            <label class="control-label" for="date_range1">
                                Jabatan
                            </label>
                            <div class="controls">
                                <input class="input-large" type="text" >
                            </div>
                        </div> 
                       
                        
                            
                        </form>
                        </p>  
                    </div>
                    <!-- form popup END -->
            
                    
                    
                    <!-- button popup START -->
                    <div class="modal-footer">
                        <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                        <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan Deraf</a>            
                    </div>
                    <!-- button popup END -->
            
                    
                    
                </div>

                <div id="dt_example" class="example_alt_pagination"> 
                      <?php echo $this->table->generate($dataku); ?>
                      
                       <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai
                       </div><?php echo $this->pagination->create_links(); ?>

                       <div class="clearfix"></div>
                </div>
                </div>
                </div>
        <!-- popup tambah END -->
                
                

                
                
                <!-- div panel senarai START -->
                <!-- <div class="main-container">
    
                <div class="row-fluid">
                    <div class="span12">
                        <div class="widget">
                             
                        <div class="widget-body">
                            <?php echo $this->table->generate($dataku); ?>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                        </div> 
                    </div> 
                </div> 
                    
                </div> -->
                <!-- div panel senarai END -->
                   
                   
                   
                   
                </div>
                <!-- table section END -->
                
                
                
                
                        </div>
                    </div>
                </div>
                <!-- panel kontraktor fasiliti END -->
               
                
           
           </div>
           <!-- panel checkbox END -->
                  
             
                  
        </div>

        <?php  echo form_close();?>
    </div>
</div>
<!-- panel utama END -->
                
                


<!-- buttons START --> 
<div align="right">
    <a href="<?php echo site_url('popa/summary_pof_popa_edit') ?>">
        <button class="btn btn-danger input-top-margin" type="button">
            Batal
        </button>
    </a>
    <a href="<?php echo site_url('popa/summary_pof_popa_edit') ?>">
        <button class="btn btn-warning2 input-top-margin" type="button">
            Simpan
        </button>
    </a>
</div>
<!-- buttons END -->   
                
                
              
    </div>
</div>
<!-- div tab END -->



</div>
<!-- div widget-body END -->
          

     
  