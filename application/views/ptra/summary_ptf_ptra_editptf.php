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
    <!--breadcrumb-->
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
    <!--status info-->
    <div class="alert alert-block alert-info fade in">
            <button data-dismiss="alert" class="close" type="button">
              ×
            </button>
              <h5 style="color:#FF0000">90%
              <a class="alert-heading">dokumen ini telah dilengkapkan</a>
              </h5>
    </div>
    <!--/.END status info-->
      <!--main container-->
      <div class="main-container">

              <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'summary_ptra_editptf',
                           'id' => 'summary_ptra_editptf',
                        );
                    echo form_open('ptra/summary_ptra_editptf',$attributes); ?>
      	 <!--panel 1-->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penerimaan Aset (PTRA)
                  </div>
                </div>
                <div class="widget-body">

                  <div class="control-group">
                      <label class="control-label">
                        Tahun
                      </label>
                      <div class="controls">
                        <input class="input-small" type="text" placeholder="2013" name="tahun" id="tahun">
                      </div>
                    </div> 
                  
                    <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="Kementerian Kerja Raya" disabled name="kementerian" id="kementerian">
                      </div>
                    </div>                   
                    <div class="control-group">
                      <label class="control-label">
                        Jabatan/Agensi
                      </label>
                      <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="Jabatan Kerja Raya" disabled name="jab_agensi" id="jab_agensi">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Premis
                      </label>
                      <div class="controls">
                        <input class="input-xlarge" type="text" placeholder="Pejabat Kerajaan" disabled name="premis" id="premis">
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        No DPA
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text" placeholder="1101MYS.050700.BB0001" disabled name="nodpa" id="nodpa">
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Kemaskini Maklumat Pra Pendaftaran Premis</div>
              </div>
                <!--table section-->              
                <div class="widget-body"> 
              <!--table-->
                  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th style="width:2%">
                          Bil
                        </th>
                        <th style="width:25%" class="hidden-phone">Nama Borang</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                        <th style="width:8%" class="hidden-phone">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="name">
                            1.0</span>
                        </td>
                        <td class="hidden-phone">Pra Pendaftaran Premis</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="<?php echo site_url('ptra/status_premis_ptra_editptf')?>"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                    
                      </td>
                      </tr>
                    </tbody>
                  </table>
                  <!--/.END table-->               
            </div>
                <!--/.END table section-->
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Kemaskini Maklumat Berikut</div>
              </div>
                <!--table section-->              
                <div class="widget-body"> 
              <!--table-->
                  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th style="width:2%">
                          Bil
                        </th>
                        <th style="width:25%" class="hidden-phone">Kandungan</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                        <th style="width:8%" class="hidden-phone">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="name">
                            1.0</span>
                        </td>
                        <td class="hidden-phone">Pendahuluan</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="#myModal"  data-toggle="modal"><li class="rounded">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                    
                      </td>
                      </tr>
                       <div class="controls2"></div>                 
        
        <!--popup pendahuluan-->
        <div id="myModal" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Sila Kemaskini Maklumat Berikut
              </h4>
          </div>
            <div class="modal-body">
              <p>
        <form class="form-horizontal no-margin">
                  
                  <div class="control-group">
                      <label>
                        1.0 Pendahuluan
                      </label>                  
                  <div class="wysiwyg-container">
                    <textarea id="wysiwyg" class="input-block-level" placeholder="" style="height: 80px">
                    Menjelaskan maklumat mengenai premis berkaitan.
                    </textarea>
                  </div>
                  </div>
                </form>
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a>            
            </div>
            <!--/.END button-->
        </div>
    <!--/.END popup pendahuluan-->
        
                      <tr>
                        <td>
                          <span class="name">
                            2.0</span></td>
                        <td class="hidden-phone">Objektif</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="#objektif"  data-toggle="modal"><li class="rounded">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>
                      </td>
                      </tr>
                      <div class="controls2"></div>                 
        
        <!--popup objektif-->
        <div id="objektif" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Sila Kemaskini Maklumat Berikut
              </h4>
          </div>
            <div class="modal-body">
              <p>
        <form class="form-horizontal no-margin">
                  
                  <div class="control-group">
                      <label>
                        2.0 Objektif
                      </label>                  
                  <div class="wysiwyg-container">
                    <textarea id="wysiwyg2" class="input-block-level" placeholder="" style="height: 80px">
                    Menjelaskan matlamat penerimaan aset kementerian/jabatan/agensi.
                    </textarea>
                  </div>
                  </div>
                </form>
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a>            
            </div>
            <!--/.END button-->
        </div>
    <!--/.END popup objektif-->
        
                      <tr>
                        <td>
                          <span class="name">
                            3.0</span></td>
                        <td class="hidden-phone">Carta Organisasi dan Pelan Komunikasi</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="#carta"  data-toggle="modal"><li class="rounded">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                   
                      </td>
                      </tr>
                      <div class="controls2"></div>                 
        
        <!--popup carta-->
        <div id="carta" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Sila Kemaskini Maklumat Berikut
              </h4>
          </div>
            <div class="modal-body">
              <p>
        <form class="form-horizontal no-margin">
                  
                  <div class="control-group">
                      <label>
                        3.0 Carta Organisasi dan Pelan Komunikasi
                      </label>                  
                  <div class="wysiwyg-container">
                    <textarea id="wysiwyg3" class="input-block-level" placeholder="" style="height: 80px">
                    Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penerimaan aset.
                    </textarea>
                  </div>
                  </div>
                </form>
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a>            
            </div>
            <!--/.END button-->
        </div>
    <!--/.END popup carta-->
                      
                      <tr>
                        <td>
                          <span class="name">
                            4.0</span></td>
                        <td class="hidden-phone">Skop dan Aktiviti Penerimaan Aset</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="#skop"  data-toggle="modal"><li class="rounded">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                  
                      </td>
                      </tr>
                      <div class="controls2"></div>                 
        
        <!--popup skop-->
        <div id="skop" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Sila Kemaskini Maklumat Berikut
              </h4>
          </div>
            <div class="modal-body">
              <p>
        <form class="form-horizontal no-margin">
                  
                  <div class="control-group">
                      <label>
                        4.0 Skop dan Aktiviti Penerimaan Aset
                      </label>                  
                  <div class="wysiwyg-container">
                    <textarea id="wysiwyg4" class="input-block-level" placeholder="" style="height: 80px">
                    PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut.
                    </textarea>
                  </div>
                  </div>
                </form>
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a>            
            </div>
            <!--/.END button-->
        </div>
    <!--/.END popup skop-->
                      
                      <tr>
                        <td>
                          <span class="name">
                            5.0</span></td>
                        <td class="hidden-phone">Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="#sedia"  data-toggle="modal"><li class="rounded">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                    
                      </td>
                      </tr>
                      <div class="controls2"></div>                 
        
        <!--popup penyediaan-->
        <div id="sedia" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Sila Kemaskini Maklumat Berikut
              </h4>
          </div>
            <div class="modal-body">
              <p>
        <form class="form-horizontal no-margin">
                  
                  <div class="control-group">
                      <label>
                        5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset
                      </label>                  
                  <div class="wysiwyg-container">
                    <textarea id="wysiwyg5" class="input-block-level" placeholder="" style="height: 80px">
                    PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Penerimaan Aset bagi tujuan permohonan peruntukan.
                    </textarea>
                  </div>
                  </div>
                </form>
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a>            
            </div>
            <!--/.END button-->
        </div>
    <!--/.END popup penyediaan-->
                      
                      <tr>
                        <td>
                          <span class="name">
                            6.0</span></td>
                        <td class="hidden-phone">Kawalan Rekod Penerimaan Aset</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="#kawal"  data-toggle="modal"><li class="rounded">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge">
                            Deraf
                          </span>
                        </td>                   
                      </td>
                      </tr>
                      <div class="controls2"></div>                 
        
        <!--popup kawalan-->
        <div id="kawal" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Sila Kemaskini Maklumat Berikut
              </h4>
          </div>
            <div class="modal-body">
              <p>
        <form class="form-horizontal no-margin">
                  
                  <div class="control-group">
                      <label>
                        6.0 Kawalan Rekod Penerimaan Aset
                      </label>                  
                  <div class="wysiwyg-container">
                    <textarea id="wysiwyg6" class="input-block-level" placeholder="" style="height: 80px">
                    Kawalan rekod penerimaan aset sebagaimana JKR.PATA.F6/1d.
                    </textarea>
                  </div>
                  </div>
                </form>
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a>            
            </div>
            <!--/.END button-->
        </div>
    <!--/.END popup kawalan-->
                      
                      <tr>
                        <td>
                          <span class="name">
                            7.0</span></td>
                        <td class="hidden-phone">Rujukan</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="#rujukan"  data-toggle="modal"><li class="rounded">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge">
                            Deraf
                          </span>
                        </td>                   
                      </td>
                      </tr>
                      <div class="controls2"></div>                 
        
        <!--popup rujukan-->
        <div id="rujukan" class="modal2 hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Sila Kemaskini Maklumat Berikut
              </h4>
          </div>
            <div class="modal-body">
              <p>
        <form class="form-horizontal no-margin">
                  
                  <div class="control-group">
                      <label>
                        7.0 Rujukan
                      </label>                  
                  <div class="wysiwyg-container">
                    <textarea id="wysiwyg7" class="input-block-level" placeholder="" style="height: 80px">
                    Sebarang dokumen yang dirujuk dalam penyediaan PTRA sebagaimana JKR.PATA.F6/1e.
                    </textarea>
                  </div>
                  </div>
            
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan</a>            
            </div>
            <!--/.END button-->
        </div>
    <!--/.END popup rujukan-->
                      
                    </tbody>
                  </table>
                  <!--/.END table-->               
            </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 3-->
              
        <!--panel 4-->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Kemaskini Borang Berikut</div>
              </div>
              	<!--table section-->            	
                <div class="widget-body"> 
              <!--table-->
                  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th style="width:2%">
                          Bil
                        </th>
                        <th style="width:25%" class="hidden-phone">Nama Borang</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                        <th style="width:8%" class="hidden-phone">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="name">
                            1</span>
                        </td>
                        <td class="hidden-phone">Model Struktur Organisasi Penerimaan Aset Di Premis</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <a href="<?php echo site_url('ptra/model_struktur_ptra_editptf')?>"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                    
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            2</span></td>
                        <td class="hidden-phone">Skop Dan Aktiviti Penerimaan Aset</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <a href="<?php echo site_url('ptra/treeview_ptra_editptf')?>"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            3</span></td>
                        <td class="hidden-phone">Format Analisis Keperluan Sumber Aktiviti Penerimaan Aset</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <a href="<?php echo site_url('ptra/treeview_ptra_editptf')?>"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul> 
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                   
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            4</span></td>
                        <td class="hidden-phone">Kawalan Rekod Penerimaan Aset</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <a href="<?php echo site_url('ptra/kawalan_rekod_ptra_editptf')?>"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>  
                        <td class="hidden-phone">
                          <span class="badge">
                            Deraf
                          </span>
                        </td>                  
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5</span></td>
                        <td class="hidden-phone">Dokumen Rujukan</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <a href="<?php echo site_url('ptra/dokumen_rujukan_ptra_editptf')?>"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></a></ul>
                        <td class="hidden-phone">  
                          <span class="badge">
                            Deraf
                          </span>
                        </td>                   
                      </td>
                      </tr>
                    </tbody>
                  </table>
                  <!--/.END table-->               
            </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 4-->
        
        <!--panel 5-->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Ulasan
                  </div>
                </div>
                <div class="widget-body">
                    <div class="control-group">
                      <label class="control-label" for="ulasan">
                      <div class="controls">
                        <textarea class="input-block-level" placeholder="Ulasan ..." style="height: 100px"></textarea>
                      </div>
                    </div>         
                </div>
              </div>
            </div>
         </div>
         <!--/.END panel 5-->

   				      <!--buttons--> 
                <div class="next-prev-btn-container ">
                <div class="widget-body" align="right">
                    <a href="<?php echo site_url('ptra/senarai_ppd_ptra') ?>">
                      <button class="btn btn-danger input-top-margin" type="button">
                        Batal</button></a>
                <button class="btn btn-info hidden-tablet" type="button" id="pembetulan">
                    Pembetulan
                  </button>
                  <button class="btn btn-success" type="button" id="sah">
                    Sah
                  </button>
             </div>
                </div>   
                </div>
                <!--/.END buttons--> 
                <?php  echo form_close();?> 
      </div>  
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->

    <!-- ALERT -->
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
      
     
      $("sah").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin mengesahkan rekod PTRA ID PTRA00002?", function (e) {
          if (e) {

            window.location ="<?php echo site_url('ptra/senarai_ppd_ptra') ?>";
            
          } else {
            //alertify.error("");
          }
        });
        return false;
      };

      $("pembetulan").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi. ", function (e) {
          if (e) {
            alertify.success("Notifikasi telah dihantar.");
          } else {
            //alertify.error("");
          }
        });
        return false;
      };

</script>