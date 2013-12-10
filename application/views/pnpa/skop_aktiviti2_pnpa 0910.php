<style >
    .ui-datepicker 
    {
      top: 950px !important;
   }
</style>
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
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class="active"><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
    <!--breadcrumb-->
         <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
         <p><form class="form-horizontal no-margin">
             
             
             <div class="row-fluid">
		<div class="span12">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span>  Sila Kemaskini Maklumat Berikut
                </div>
                </div>
                <div class="widget-body">

           <!--start div panel skop -->   
          	<div class="row-fluid">
		<div class="span12">
             	<div class="widget">
                <div class="widget-body">
                    
                   pnpa_id = <?php echo $this->uri->segment(3)?>
                   butiran aktiviti= <?php echo $this->uri->segment(4) ?>
                   
              
                                     <div class="control-group">
                      <label class="control-label">Skop
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text" disabled placeholder="Skop 1">
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Aktiviti
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text" disabled placeholder="Aktiviti 1"></div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Butiran Aktiviti
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text" value="<?php echo $rrq->skop_aktvt_tajuk;?>" disabled>
                      </div></div>
                      
              </div>
               </div>
               </div>
               </div><!--end panel skop --> 
             
             <!-- start panel skop2-->
                <div class="row-fluid">
		<div class="span12">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Skop dan Aktiviti Penilaian Aset
                </div>
                </div>
                <div class="widget-body">
                    
                    <div class="control-group">
                      <label class="control-label">Pihak Berkaitan
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text"  placeholder="">
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Tanggungjawab
                      </label>
                      <div class="controls">
                        <textarea name="textarea" class="input-block-level" 
                     style="height: 100px; width: 550px"  placeholder=""></textarea>
                  </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tarikh Mula
                      </label>
                      <div class="controls">
                          <?php echo form_error('tarikh_mula'); ?> 
                        <div class="input-append">
                            
                            <?php
                          
                          $data = array(
                            'name'        => 'tarikh_mula',
                            'id'          => 'date',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 date_picker',
                            'placeholder' => 'Pilih Tarikh',
                          );

                          echo form_input($data);
                          
                          ?>
                         
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Tarikh Akhir
                      </label>
                      <div class="controls">
                            <?php echo form_error('tarikh_akhir'); ?> 
                        <div class="input-append">
                           <?php
                          
                          $data = array(
                            'name'        => 'tarikh_akhir',
                            'id'          => 'date2',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 date_picker',
                            'placeholder' => 'Pilih Tarikh',
                          );

                          echo form_input($data);
                          
                          ?>
                          
                          <span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Tempoh Pelaksanaan
                      </label>
                      <div class="controls"><label>Mula
                      <div class="input-append">
                       <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Pilih Tarikh"/>
                      
                      
                      
                      <span class="add-on">
                      <i class="icon-calendar"></i>
                      </span>
                        </div>
                      Hingga
 <div class="input-append">
   <input type="text" name="report_range1" id="report_range1" class="span8 report_range" placeholder="Pilih Tarikh"/>
   <span class="add-on">
                      <i class="icon-calendar"></i>
                      </span></label>

                      </div>
                    </div>
                    </div>   
                      
                       <div class="control-group">
                      <label class="control-label">Catatan
                      </label>
                      <div class="controls">
                       <textarea name="textarea" class="input-block-level" 
                     style="height: 100px; width: 550px"  placeholder=""></textarea>
                   
                      </div></div>
                  
              </div>
               </div>
               </div>
               </div><!--end panel skop 2 -->
               

               <!--start panel Keperluan Sumber -->
               <div class="row-fluid">
				        <div class="span12">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Format Analisis Keperluan Sumber Aktiviti Penilaian Aset
                </div>
                </div>
               
              <div class="widget-body">
                
                    <div class="control-group">
                      <label class="control-label">Objek Sebagai
                      </label>
                      <div class="controls">
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
                      <label class="control-label">Bajet Aktiviti (RM)
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text"  placeholder=""></div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Sumber
                      </label>
                    <div class="controls">
                        <select id="subject">
			<option>-Sila Pilih-</option>			              
                        <option>Dalaman</option>
                          <option>Luaran</option>
                        </select>    
                        </div></div>
                      
                      <div class="control-group">
                      <label class="control-label">Output
                      </label>
                      <div class="controls">
                       <textarea name="textarea" class="input-block-level" 
                     style="height: 100px; width: 550px" placeholder=""></textarea>
                      </div></div>

               </div>
               </div>
               </div>
               </div><!--end panel keperluan -->
           
            <!-- start panel Keperluan sumber 2-->
           <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Keperluan Sumber
                  </div>
                </div>

                <div class="widget-body">
                  <p><br />
                   <label> 1.Sumber Manusia</label> </p>

              <!--start sumber manusia -->
              <div class="row-fluid">
              <!-- start rancang -->
            	 <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Rancang</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar-three">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 	  <label class="checkbox"><input type="checkbox" value=""><a href="#myModal"  data-toggle="modal"> NoorAzian MohdNoor</a></label>
                      <label class="checkbox"><input type="checkbox" value="" >Mohd Adib bin Baharuddin</label>
                      <label class="checkbox"><input type="checkbox" value="">Mohd Sayuti Mohd Zain</label>
                      <label class="checkbox"><input type="checkbox" value="" >Luqman Hakim Bin Nasran</label> 
                      <label class="checkbox"><input type="checkbox" value="">NoorAzian MohdNoor</label>
                      <label class="checkbox"><input type="checkbox" value="" >Mohd Adib bin Baharuddin</label>
                      <label class="checkbox"><input type="checkbox" value="">Mohd Sayuti Mohd Zain</label>
                      <label class="checkbox"><input type="checkbox" value="" >Luqman Hakim Bin Nasran</label> 
                     </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>

                <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p><label>Sila buat pemilihan untuk NoorAzian MohdNoor</label> 
                      <label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Gaji</label>

                      <label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Gaji dan Kos Lebih Masa</label>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a></div>
                  </div><!-- end modal -->
            	</div><!--end rancang -->
                
                <!-- start lulus-->
                <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Lulus</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar1">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 	  <label class="checkbox"><input type="checkbox" value=""><a href="#myModal"  data-toggle="modal"> NoorAzian MohdNoor</a></label>
                      <label class="checkbox"><input type="checkbox" value="" >Mohd Adib bin Baharuddin</label>
                      <label class="checkbox"><input type="checkbox" value="">Mohd Sayuti Mohd Zain</label>
                      <label class="checkbox"><input type="checkbox" value="" >Luqman Hakim Bin Nasran</label> 
                      <label class="checkbox"><input type="checkbox" value="">NoorAzian MohdNoor</label>
                      <label class="checkbox"><input type="checkbox" value="" >Mohd Adib bin Baharuddin</label>
                      <label class="checkbox"><input type="checkbox" value="">Mohd Sayuti Mohd Zain</label>
                      <label class="checkbox"><input type="checkbox" value="" >Luqman Hakim Bin Nasran</label> 
                     </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div><!-- end lulus-->
                
                <!-- start isi-->
                <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Isi</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar2">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 	  <label class="checkbox"><input type="checkbox" value=""><a href="#myModal"  data-toggle="modal"> NoorAzian MohdNoor</a></label>
                      <label class="checkbox"><input type="checkbox" value="" >Mohd Adib bin Baharuddin</label>
                      <label class="checkbox"><input type="checkbox" value="">Mohd Sayuti Mohd Zain</label>
                      <label class="checkbox"><input type="checkbox" value="" >Luqman Hakim Bin Nasran</label> 
                      <label class="checkbox"><input type="checkbox" value="">NoorAzian MohdNoor</label>
                      <label class="checkbox"><input type="checkbox" value="" >Mohd Adib bin Baharuddin</label>
                      <label class="checkbox"><input type="checkbox" value="">Mohd Sayuti Mohd Zain</label>
                      <label class="checkbox"><input type="checkbox" value="" >Luqman Hakim Bin Nasran</label> 
                     </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div><!--end isi -->
                </div><!--end sumber manusia -->
            
          
        
                  <p><label>2.Pengurusan Pejabat<label>
               <!-- start pengurusan pejabat-->   
              <div class="row-fluid">
                <!--start mesin fotostat -->  
                <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Mesin Fotostat</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar3">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 		<label class="checkbox"><input type="checkbox" value="" >Canon iR 5065</label>
                        <label class="checkbox"><input type="checkbox" value="" >Canon iR 5075</label>
                        <label class="checkbox"><input type="checkbox" value="" >Canon iR </label>
                        <label class="checkbox"><input type="checkbox" value="" >Canon iR 7105</label>
                        <label class="checkbox"><input type="checkbox" value="" >Canon iR 5075</label>
                        <label class="checkbox"><input type="checkbox" value="" >Canon iR</label>
                        <label class="checkbox"><input type="checkbox" value="" >Canon iR 7105</label>
                        <label class="checkbox"><input type="checkbox" value="" >Canon iR</label>
                   </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div><!--end mesin fotostat -->

            	<!--start fax -->
              <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Fax</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar4">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                      <label class="checkbox">
                        <input type="checkbox" value=""checked>
                       Brother FAX-1270E
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" value="" >
                        IntelliFAX 1840c 
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" value="">
                      Color Inkjet Fax Machine 123
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" value="" checked>
                       Color Inkjet Fax Machine
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" value="" checked>
                       Color Inkjet Fax Machine
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" value="" checked>
                       Color Inkjet Fax Machine
                      </label>
                      </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div><!--end fax -->
            
             <!--start telefon -->
             <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Telefon</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar5">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                  <label class="checkbox">
                    <input type="checkbox" value="">
                   YLX-728 Black
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    CT-CID507
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="">
                  YLX-728 White
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    MT-102
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    MT-102
                  </label></div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div><!--end telefon -->
                
                </div><!--end sumber manusia -->
            
            
                  <p><label>3.Peralatan Kerja<label>

                  <!--end telefon -->
                  <div class="row-fluid">
                  <!-- -->
                  <div class="span3">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Komputer</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar6">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                   Apple
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    IBM
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="">
                 Lenovo
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Dell
                  </label> 
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Dell
                  </label> 
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Dell
                  </label> 
                  </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div>

             	<div class="span3">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Pemeriksaan</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar7">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                  <label class="checkbox">
                    <input type="checkbox" value="">
                   Alat 1
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Alat 2
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="">
                  Alat 3
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                   Alat 4
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                   Alat 5
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                   Alat 6
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                   Alat 7
                  </label>
                  </div>
                  </div>
                  </div>
                  </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div>
                
                
            	 <div class="span3">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Kenderaan</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar8">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                  <label class="checkbox">
                    <input type="checkbox" value="">
                   Proton Perdana Fuga
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                   Volkswagen Jetta
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="">
                  Lancer Evolution IX
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Nissan Almera
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    BMW
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Savvy
                  </label>
                  </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div>
            
 				<div class="span3">
             	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  PPE</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar9">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                  <label class="checkbox">
                    <input type="checkbox" value="">
                    Helmets 
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Goggles
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="">
                 Shields
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Mask
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                   Topeng
                  </label>
                  <label class="checkbox">
                    <input type="checkbox" value="" checked>
                    Boot
                  </label>
                  </div>
                  </div>
                  </div>
                  </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div>
                </div>
        </div>
                  
                  
                  
                  </div>
            	</div>
                </div>
        </div>
             
              </div><div align="right">
                <button class="btn btn-danger input-top-margin" type="button">
                        Batal
                  </button>
                     <a href="<?php echo site_url('pnpa/skop_aktiviti_pnpa') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Sebelum
                      </button></a>
                      <a href="<?php echo site_url('pnpa/skop_aktiviti_pnpa') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Seterusnya
                      </button></a> </form>
             </div><!--end div button -->
     <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>

              <!--end div dashboard -->
            </div></div>