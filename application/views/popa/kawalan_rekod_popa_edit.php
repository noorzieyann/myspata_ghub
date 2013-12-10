
    <!--tab navigation--> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""> 
            <a href="#profile" data-original-title="">PSPA(O)</a>
        </li> 
                
        <li class=""> 
            <a href="<?php echo site_url('ptra/senarai_ptf_ptra')?>" data-original-title="">PTRA</a> 
        </li> 
                
        <li class="active"> 
            <li class="">=""><a href="<?php echo site_url('popa/senarai_ptf_popa')?>">POPA</a>
        </li>
                
        <li class=""> 
            <a href="<?php echo site_url('pnpa/senarai_ptf_pnpa')?>">PNPA</a>
        </li>
                
        <li class=""> 
            <a href="<?php echo site_url('ppun/senarai_ptf_ppun')?>">PPUN</a>
        </li> 
                
        <li class=""> 
            <a href="<?php echo site_url('pla/senarai_ptf_pla')?>">PLA</a>
        </li>   
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">
        <!--panel 1-->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Kawalan Rekod Operasi Dan Penyenggaraan Aset
                </div>
              </div>
              	<!--table section-->            	
                <div class="widget-body">
                  <ul class="icomoon-icons-container">
                    <li>
                       
                        <a href="#myModal" data-toggle="modal">
                  
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                       </a>
                    </li>
                  </ul><label class="tambah">Tambah Kawalan Rekod</label>                
        
        <!--popup-->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Tambah Kawalan Rekod
              </h4>
          </div>
            <div class="modal-body">
              <p>
				<form class="form-horizontal no-margin">
                    <div class="control-group">
                      <label class="control-label">
                        Jenis Rekod
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text"  name="premis" id="premis"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Lokasi
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text"  name="premis" id="premis"/>
                      </div>
                    </div>
                    <hr>
                    <div class="control-group">
                      <label class="control-label">
                        Tempoh Penyimpanan
                      </label>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tarikh Mula
                      </label>
                      <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Pilih Tarikh"/>
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tarikh Tamat
                      </label>
                      <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Pilih Tarikh"/>
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>                           
                  </form>
              </p>  
            </div>
            <!--button-->
        	<div class="modal-footer">
        		<a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan Deraf</a>            
            </div>
            <!--/.END button-->
        </div>
		<!--/.END popup-->
                                  
                  <!--table-->
                  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th style="width:2%" rowspan="2">
                          Bil
                        </th>
                        <th style="width:20%" class="hidden-phone" rowspan="2">
                          Jenis Rekod
                        </th>
                        <th style="width:20%" class="hidden-phone" rowspan="2">Lokasi</th>
                        <th style="width:12%" class="hidden-phone" colspan="2">
                          Tempoh Penyimpanan</th>
                        <th style="width:8%" class="hidden-phone" rowspan="2">
                        Tindakan</th>
                      </tr>
                      <tr>
                        <th style="width:8%">Tarikh Mula</th>
                        <th style="width:8%" class="hidden-phone">Tarikh Tamat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="name">
                            1
                          </span>
                        </td>
                        <td class="hidden-phone">Dokumen A</td>
                        <td class="hidden-phone">Lokasi A</td>
                        <td class="hidden-phone">24/11/2001</td>
                        <td class="hidden-phone">24/11/2002                        </td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li>
                        </ul>                    
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            2
                          </span>
                        </td>
                        <td class="hidden-phone">Dokumen B</td>
                        <td class="hidden-phone">Lokasi B</td>
                        <td class="hidden-phone">07/08/2002</td>
                        <td class="hidden-phone">07/08/2003                        </td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li>
                        </ul>                    
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            3
                          </span>
                        </td>
                        <td class="hidden-phone">Dokumen C</td>
                        <td class="hidden-phone">Lokasi C</td>
                        <td class="hidden-phone">09/02/2003</td>
                        <td class="hidden-phone">09/02/2004                        </td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li>
                        </ul>                    
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            4
                          </span>
                        </td>
                        <td class="hidden-phone">Dokumen D</td>
                        <td class="hidden-phone">Lokasi D</td>
                        <td class="hidden-phone">14/11/2004</td>
                        <td class="hidden-phone">14/11/2005</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li>
                        </ul>                    
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5
                          </span>
                        </td>
                        <td class="hidden-phone">Dokumen E</td>
                        <td class="hidden-phone">Lokasi E</td>
                        <td class="hidden-phone">15/08/2005</td>
                        <td class="hidden-phone">15/08/2006                        </td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li>
                        </ul>                    
                      </td>
                      </tr>
                    </tbody>
                  </table>
                  <!--/.END table-->
                  <!--pagination-->
                  <p>Memaparkan 5 dari 10 senarai</p>
                  <div class="pagination no-margin" align="right">
                    <ul>
                      <li>
                        <a href="#" data-original-title="">
                          Pertama
                        </a>
                      </li>
                      <li >
                        <a href="#" data-original-title="">
                          Sebelum
                        </a>
                      </li>
                      <li class="active">
                        <a href="#" data-original-title="">
                          1
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          2
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          3
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          4
                        </a>
                      </li>
                     
                     <li class="hidden-phone">
                        <a href="#" data-original-title="">
                          Seterusnya
                        </a>
                        </li>
                      <li class="hidden-phone">
                        <a href="#" data-original-title="">
                          Akhir
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!--/END pagination-->                             
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 1-->
	  </div>
      			<!--buttons--> 
                <div class="widget-body" align="right">
                  <a href="<?php echo site_url('popa/summary_pp_popa') ?>">
                    <button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button>
                </a>
                  <a href="<?php echo site_url('popa/summary_pp_popa') ?>">
        <button class="btn btn-warning2 input-top-margin" type="button">
            Simpan
        </button>
    </a>
                </div> 
                <!--/.END buttons-->   
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->
 