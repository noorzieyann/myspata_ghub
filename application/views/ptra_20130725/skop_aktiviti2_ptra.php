
  <!--tab navigation--> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a data-toggle="tab" href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">POPA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PNPA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PPUN</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PLA</a></li>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Sila Kemaskini Maklumat Berikut
                 </div>
               </div>
             <div class="widget-body">
                
      <!--main container 2-->
      <div class="main-container">
        <!--section-->  
        <div class="row-fluid">
            <div class="span12">
              <div class="widget">
               <div class="widget-body">
                  <form class="form-horizontal no-margin">     
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
                  </form>
               </div>
              </div>
            </div>
          </div>
          
          <!--/.END section-->
          
          <!--panel 1-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Skop Dan Aktiviti Penerimaan Aset
                  </div>
                </div>
               <div class="widget-body">
                  <form class="form-horizontal no-margin">     
                    <div class="control-group">
                      <label class="control-label">
                      	Pihak Berkaitan
                      </label>
                      <div class="controls">
                      <input class="input-xxlarge" type="text" /></label>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                      	Tanggungjawab
                      </label>
                      <div class="controls">
                      <textarea class="input-block-level" style="width: 550px; height: 100px"></textarea>
                      </div>
                    </div>
                        <!-- date -->
                        <div class="control-group">
                      <label class="control-label">
                        Tempoh Pelaksanaan</label>
                      <div class="controls">Mula
                      <div class="input-append">
                       <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Pilih Tarikh"/>
                      <span class="add-on">
                      <i class="icon-calendar"></i>
                      </span>
                        </div>Hingga
                        <div class="input-append">
                          <input type="text" name="report_range1" id="report_range1" class="span8 report_range" placeholder="Pilih Tarikh"/>
                           <span class="add-on">
                      <i class="icon-calendar"></i>
                      </span></div></div>
                    </div> 
                    <!--END date -->
                   
                     <div class="control-group">
                      <label class="control-label">
                      	Catatan
                      </label>
                      <div class="controls">
                      <textarea class="input-block-level" style="width: 550px; height: 100px"></textarea>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Format Analisis Keperluan Sumber Aktiviti Penerimaan Aset 
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
                          <option>- Sila Pilih -</option>
                          <option>JKR</option>
                          <option>KKR</option>
                          <option>JPS</option>
                          <option>JPA</option>
                        </select>
                      </div>
                    </div>
                  
                    <div class="control-group">
                      <label class="control-label">
                        Bajet Aktiviti (RM)
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text"  name="carian" id="carian"/>                        
                      </div>
                    </div>                   
                    <div class="control-group">
                      <label class="control-label">
                        Sumber
                      </label>
                      <div class="controls">
                        <select id="jab_agensi">
                          <option>- Sila Pilih -</option>
                          <option>JKR</option>
                          <option>KKR</option>
                          <option>JPS</option>
                          <option>JPA</option>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Keperluan Sumber
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
                </div></div></div></div>
                <label>&nbsp;&nbsp;&nbsp;Kos (RM)
                <input class="input-small" type="text" /></label>
              </div>
          </div>
          <!--/.END small panel 10--> 
        </div>                                               
        </form>
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
        </div>
     <!--/.END big panel-->
                <!--buttons--> 
                <div class="widget-body" align="right">
                  <button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button>
                  <a href="<?php echo site_url('main/skop_aktiviti_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>
                  <a href="<?php echo site_url('main/skop_aktiviti_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Seterusnya
                  </button></a>
                </div> 
                <!--/.END buttons--> 
     </div>  
  <!--/.END main-container 1-->
  </div>
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->