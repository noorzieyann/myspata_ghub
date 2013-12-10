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
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />
  <!--tab navigation--> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
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

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'skop_aktiviti2_ptra',
                           'id' => 'skop_aktiviti2_ptra',
                        );
                    echo form_open('ptra/skop_aktiviti2_ptra',$attributes); ?>
        <!--section-->  
        <div class="row-fluid">
            <div class="span12">
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
                      <input class="input-xxlarge" type="text" placeholder="Pihak berkaitan yang terlibat"/></label>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Tanggungjawab
                      </label>
                      <div class="controls wysiwyg-container">
                    <textarea id="wysiwyg" class="input-block-level" placeholder="Tanggungjawab pegawai yang berkenaan" style="height: 80px">
                    </textarea>
                  </div>
                    </div> 
                    
                    <!-- date -->
                    <div class="control-group">
                      <label class="control-label">Tempoh Pelaksanaan</label>
                      <div class="controls">
                        <label>Mula
                          <div class="input-append">
                            <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="02/03/12"/>
                              <span class="add-on">
                                <i class="icon-calendar"></i>
                              </span>
                          </div>Hingga
                          <div class="input-append">
                            <input type="text" name="report_range1" id="report_range1" class="span8 report_range" placeholder="13/09/2013"/>
                              <span class="add-on">
                                <i class="icon-calendar"></i>
                              </span>
                          </div>
                        </label>
                      </div>
                    </div> 
                    <!--END date -->
                   
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Catatan
                      </label>
                      <div class="controls wysiwyg-container">
                    <textarea id="wysiwyg2" class="input-block-level" placeholder="Sila ambil perhatian dan tindakan.." style="height: 80px">
                    </textarea>
                  </div>
                    </div>                
                
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
                       <div class="controls">
                         <select id="subject">
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
                        <input class="input-large" type="text"  name="carian" id="carian" placeholder="91,000.00"/>                        
                      </div>
                    </div>                   
                    <div class="control-group">
                      <label class="control-label">
                        Sumber
                      </label>
                      <div class="controls">
                        <select id="jab_agensi">
                          <option>Dalaman</option>
                          <option>Luaran</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Output
                      </label>
                      <div class="controls wysiwyg-container">
                    <textarea id="wysiwyg3" class="input-block-level" placeholder="Baik" style="height: 80px">
                    </textarea>
                  </div>
                    </div>
                 
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
                          <input type="checkbox" value="a" checked="checked">
                          <a href="#myModal"  data-toggle="modal">Husin Bin Hasan</a>
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
                          Rahmah Binti Chik
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a">
                          Sulaiman Bin Malik
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
                          Shariff Bin Ghazali
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a">
                          Husin Bin Hasan
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="a" checked="checked">
                          Husin Bin Hasan
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b">
                          Rahmah Binti Chik
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a" checked="checked">
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
                      <label>Sila buat pemilihan untuk Husin Bin Hasan</label> 
                      <label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Gaji</label>

                      <label class="radio"><input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Gaji dan Kos Lebih Masa</label>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a></div>
                  </div>
                  <!-- end modal -->
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
                          <a href="#myModal"  data-toggle="modal">Husin Bin Hasan</a>
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b">
                          Rahmah Binti Chik
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a" checked="checked">
                          Sulaiman Bin Malik
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
                          Shariff Bin Ghazali
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a">
                          Husin Bin Hasan
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
                          Rahmah Binti Chik
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a">
                          Sulaiman Bin Malik
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="a" checked="checked">
                          <a href="#myModal"  data-toggle="modal">Husin Bin Hasan</a>
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="a" checked="checked">
                          Canon iR 5065
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="b" checked="checked">
                          IntelliFAX 1840c
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a">
                          Color Inkjet FAX Machine A
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="a" checked="checked">
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
                          <input type="checkbox" value="a" checked="checked">
                          Alat 1
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
                          Alat 2
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a" checked="checked">
                          Alat 3
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="b" checked="checked">
                          Nissan Almera
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a" checked="checked">
                          Produa Myvi SE
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
                          Honda Jazz Hybrid
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a">
                          Proton Saga FL
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b" checked="checked">
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
                          <input type="checkbox" value="b" checked="checked">
                          Mask
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a" checked="checked">
                          Glove
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="b">
                          Helmet
                        </label>
                        <label class="checkbox">
                          <input type="checkbox" value="a" checked="checked">
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
                    <a href="<?php echo site_url('pnpa/summary_ptf_ptra_editptf') ?>"><button class="btn btn-danger input-top-margin" type="button">
                  Batal
                  </button></a>
                  <a href="<?php echo site_url('ptra/skop_aktiviti_ptra_editptf')?>"><button class="btn btn-warning2 input-top-margin" type="button">
                    Simpan
                  </button></a>
                </div> 
                <!--/.END buttons--> 
                <?php  echo form_close();?>
     </div>  
  <!--/.END main-container 1-->
  </div>
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->