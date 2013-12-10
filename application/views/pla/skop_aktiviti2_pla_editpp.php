
<!-- breadcrumb START -->
<ul class="breadcrumb-beauty">
    <li>
        <a href="#">
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
            PLA
        </a>   
    </li>
</ul>

<br>
<!-- breadcrumb END -->

  <!--tab navigation--> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class="active"><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
  <!--main container 1-->
  <div class="main-container">
     <!--big panel-->  
     <div class="row-fluid">
        <div class="span12">
           <div class="widget">
              <div class="widget-header">
                 <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Sila Kemaskini Maklumat Berikut
                 </div>
               </div>
             <div class="widget-body">
             
                  <form class="form-horizontal no-margin"> 


              <div class="row-fluid">
               <div class="span12">
              <div class="widget">
                <div class="widget-body">    
                    <div class="control-group">
                      <label class="control-label">
                        Skop
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text" placeholder="Aset Bangunan" disabled name="skop" id="skop">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Kaedah Pelupusan
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text" placeholder="Jualan" disabled name="kaedah Pelupusan" id="kaedah pelupusan">
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
                        <input class="input-xxlarge" type="text" placeholder="Aktiviti 1.1" disabled name="butiran" id="butiran">
                      </div>
                    </div>                  
                  </form>
               </div>
             </div></div>
          
          <!--/.END section-->
          
          <!--panel 1-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> JKR.PATA.F10/1b (Skop Dan Aktiviti Pelupusan Aset)
                  </div>
                </div>
               <div class="widget-body">
                  <form class="form-horizontal no-margin">     
                    <div class="control-group">
                      <label class="control-label">
                      	Pihak Berkaitan
                      </label>
                      <div class="controls">
                      <input class="input-xxlarge" type="text" placeholder="Pihak berkaitan yang terlibat"/></label>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                      	Tanggungjawab
                      </label>
                      <div class="controls">
                      <textarea id="wysiwyg" class="input-block-level" placeholder="Tanggungjawab pegawai yang berkenaan" style="height: 80px">
                    </textarea>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">
                        Tempoh Pelaksanaan</label>
                      <div class="controls">Mula
                      <div class="input-append">
                       <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="15/6/2013"/>
                      <span class="add-on">
                      <i class="icon-calendar"></i>
                      </span>
                        </div>Hingga
                        <div class="input-append">
                          <input type="text" name="report_range1" id="report_range1" class="span8 report_range" placeholder="15/6/2018/>
                           <span class="add-on">
                      <i class="icon-calendar"></i>
                      </span></div></div>
                    </div>   
                   
                     <div class="control-group">
                      <label class="control-label" for='Report_range1'>
                      	Catatan
                      </label>
                      <div class="controls">
                      <textarea id="wysiwyg2" class="input-block-level" placeholder="Sila ambil perhatian dan tindakan dengan kadar segera" style="height: 80px">
                    </textarea>
                      </label>
                      </div>
                     </div>                  
                  </form>
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 1--> 
          
          <!--panel 2--> 
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> JKR.PATA.F10/1c (Format Analisis Keperluan Sumber Aktiviti Pelupusan Aset)
                  </div>
                </div>
               <div class="widget-body">
                  <form class="form-horizontal no-margin">
                    <div class="control-group">
                      <label class="control-label" for="DateOfBirthMonth">
                        Objek Sebagai
                      </label>
                      <div class="controls controls-row">
                        
                        <select id="jab_agensi">
                          <!--<option>- Pilih -</option>-->
                          <option>14000</option>
                          <option>22000</option>
                          <option>23000</option>
                          <option>24000</option>
                          <option>26000</option>
                          <option>27000</option>
                          <option>28000</option>
                          <option>29000</option>
                          <option>32000</option>
                          <option>33000</option>
                          <option>51000</option>
                        </select>
                      </div>
                    </div>
                  
                    <div class="control-group">
                      <label class="control-label">
                        Bajet Aktiviti (RM)
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text" placeholder="85,000.00" name="carian" id="carian"/>                        
                      </div>
                    </div>                   
                    <div class="control-group">
                      <label class="control-label">
                        Sumber
                      </label>
                      <div class="controls">
                        <select id="jab_agensi">
                           <!--<option>- Pilih -</option> -->
                          <option>Dalaman</option>
                          <option>Luaran</option>
                          </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Output
                      </label>
                      <div class="controls">
                        <textarea class="input-block-level" style="width: 550px; height: 100px"></textarea>
                      </div>
                    </div>
                  </form>
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 2--> 

		  <!--panel 3-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Keperluan Sumber
                  </div>
                </div>
      <div class="widget-body">
        <form class="form-horizontal no-margin">
        <label>1. Sumber Manusia</label>
        <div class="row-fluid">
          <!--small panel 1-->
          <div class="span4">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Rancang</div>
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
                          <input type="checkbox" value="" checked="">
                          NorAzian MohdNoor
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Mohd Adib Bin Baharuddin
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mohd Sayuti Mohd Zain
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Luqman Hakim Bin Nasran
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          NorAzian MohdNoor
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mohd Adib Bin Baharuddin
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Mohd Sayuti Mohd Zain
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Luqman Hakim Bin Nasran
                        </label>
                        
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
            </div>
          </div>
          <!--/.END small panel 1--> 
          <!--small panel 2-->
          <div class="span4">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Lulus</div>
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
                          <input type="checkbox" value="" checked="">
                          NorAzian MohdNoor
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Mohd Adib Bin Baharuddin
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mohd Sayuti Mohd Zain
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Luqman Hakim Bin Nasran
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          NorAzian MohdNoor
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mohd Adib Bin Baharuddin
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Mohd Sayuti Mohd Zain
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Luqman Hakim Bin Nasran
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
              </div>
          </div>
          <!--/.END small panel 2-->
          <!--small panel 3-->
          <div class="span4">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Isi</div>
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
                          <input type="checkbox" value="">
                          NorAzian MohdNoor
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Mohd Adib Bin Baharuddin
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mohd Sayuti Mohd Zain
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Luqman Hakim Bin Nasran
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          NorAzian MohdNoor
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mohd Adib Bin Baharuddin
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mohd Sayuti Mohd Zain
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Luqman Hakim Bin Nasran
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
            </div>
          </div>
          <!--/.END small panel 3--> 
        </div> 
        <label>2. Pengurusan Pejabat</label>           
        <div class="row-fluid">
          <!--small panel 4-->
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
                          <input type="checkbox" value="" checked="">
                          Canon iR 5065
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Canon iR 5075
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Canon iR 7105
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Canon iR 7095
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
            </div>
          </div>
          <!--/.END small panel 4--> 
          <!--small panel 5-->
             <div class="span4">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Fax</div>
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
                          <input type="checkbox" value="" checked="">
                          Brother FAX-1270E
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          IntelliFAX 1840c
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Color Inkjet FAX Machine A
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Color Inkjet FAX Machine B
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
              </div>
          </div>
          <!--/.END small panel 5--> 
          <!--small panel 6-->
             <div class="span4">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Telefon</div>
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
                          <input type="checkbox" value="">
                          YLX-728 Black
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          CT-CID507
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          YLX-728 White
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          MT-102
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
              </div>
          </div>
          <!--/.END small panel 6-->
        </div> 
        <label>3. Peralatan Kerja</label>           
        <div class="row-fluid">
          <!--small panel 7-->
            <div class="span3">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Komputer</div>
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
                          <input type="checkbox" value="" checked="">
                          Apple
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          IBM
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Dell
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Lenovo
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
              </div>
          </div>
          <!--/.END small panel 7-->
          <!--small panel 8-->
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
                          <input type="checkbox" value="">
                          Alat 1
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Alat 2
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Alat 3
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Alat 4
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Alat 5
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Alat 6
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Alat 7
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Alat 8
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
              </div>
          </div>
          <!--/.END small panel 8-->
          <!--small panel 9-->
            <div class="span3">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Kenderaan</div>
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
                          <input type="checkbox" value="" checked="">
                          Proton Saga FL
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Nissan Almera
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Produa Myvi SE
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Honda Jazz Hybrid
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Proton Saga FLX
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Nissan Caldina
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Produa Myvi SE
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Honda Jazz Hybrid
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
              </div>
          </div>
          <!--/.END small panel 9-->
          <!--small panel 10-->
            <div class="span3">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> PPE</div>
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
                          <input type="checkbox" value="" checked="">
                          Google
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mask
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="" checked="">
                          Glove
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Helmet
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Google
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Mask
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Glove
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="">
                          Helmet
                        </label>
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
              </div>
          </div>
          <!--/.END small panel 10--> 
        </div>                                               
       
      </div>
              </div>
            </div>
          </div>
          <!--/.END panel 3--> 
          
   			         
      </div>  
      <!--/.END main-container 2-->      
      		     </div>         
  		      </div>
           </div>
       
     <!--/.END big panel-->
    
  <!--buttons--> 
                <div class="widget-body" align="right">
                    <a href="<?php echo site_url('pla/summary_pp_pla_editpp') ?>">
                    <button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button>
                  <a href="<?php echo site_url('pla/skop_aktiviti_pla_editpp') ?>">
                  <button class="btn btn-primary input-top-margin" type="button">
                    Simpan
                  </button>
                  </a>
                </div>
                   
                <!--/.END buttons-->
      </div>
  </div>  
  <!--/.END main-container 1-->
  </div>
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->
 
      
