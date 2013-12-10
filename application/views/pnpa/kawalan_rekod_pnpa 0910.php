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
         <div class="tab-content" id="myTabContent">
         <div id="home" class="tab-pane fade active in">
         <p>
           <form class="form-horizontal no-margin">
               <div class="widget-body"> 
             
       			<div class="row-fluid">
            	<div class="span12">
              	<div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>  Kawalan Rekod Penilaian Aset</div></div>
                     <div class="widget-body">
              
                  <ul class="icomoon-icons-container"   >
                          <li><a href="#myModal"  data-toggle="modal">
                    <span class="fs1" data-icon="&#xe102;" aria-hidden="true">  </span></a>
                  </li>
                          
                        </ul>
                      <label class="tambah">Tambah Kawalan Rekod</label>
                    <div class="controls2">
                    
                     </div>
                     
                     
                          <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Kawalan Rekod Penilaian Aset
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                    	<div class="control-group">
                      <label class="control-label">Jenis Rekod
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                    	<div class="control-group">
                      <label class="control-label">Lokasi
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                      <hr>
                    	<div class="control-group">
                      <label class="control-label">Tempoh Penyimpanan
                      </label>
                    <div class="controls">
                        
                    </div>
                    </div>
                    	<div class="control-group">
                      <label class="control-label">Tarikh Mula
                      </label>
                    <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Pilih Tarikh">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                   
                  	<div class="control-group">
                      <label class="control-label">Tarikh Tamat
                      </label>
                   <div class="controls">
                        <div class="input-append">
                          <input type="text" name="date_range1" id="date_range1" class="span8 date_picker" placeholder="Pilih Tarikh">
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    	
                      </p>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan Deraf</a></div>
                  </div>
                      <!--table-->
                      <div class="clearfix">
                    </div>
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                    <thead>
                      <tr>
                        <th style="width:4%" rowspan="2">Bil</th>
                        <th style="width:10%" class="hidden-phone" rowspan="2">Jenis Rekod</th>
                        <th style="width:10%" class="hidden-phone" rowspan="2">Lokasi</th>
                        <th style="width:30%" class="hidden-phone" colspan="2">Tempoh Penyimpanan</th>
                        <th style="width:8%" class="hidden-phone" rowspan="2">Tindakan</th>
                      </tr>
                      <tr>
                        <th style="width:15%">Tahun Mula</th>
                        <th style="width:15%" class="hidden-phone">Tahun Tamat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; if(!empty($senarai_kawalan)) : foreach ($senarai_kawalan as $rec) : ?>
                      <tr>
                        <td align="left"><?php echo $i++; ?></td>
                        <td><?php echo $rec->f8_1d_jenis_rekod; ?></td>
                        <td><?php echo $rec->f8_1d_lokasi; ?></td>
                        <td><?php echo $rec->tahun_mula; ?></td>
                        <td><?php echo $rec->tahun_tamat; ?></td>
                        <td align="center">                       
                          <ul class="icomoon-icons-container">
                            <a href="<?php //echo site_url('ptra/summary_pp_ptra_editpp')?>"><li class="rounded"><span class="fs1" data-icon="&#xe005" aria-hidden="true"></span></li></a>
                              </ul>                   
                      </td>
                            </tr>
                            <?php echo form_close(); ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--END table-->
                   <div class="clearfix">
                    </div>
                    
                  </div>
                </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
            	<div align="right">
            		<button class="btn btn-danger input-top-margin" type="button">
                        Batal
                  </button>
                     <a href="<?php echo site_url('pnpa/skop_aktiviti_pnpa') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Sebelum
                      </button></a>
                      <a href="<?php echo site_url('pnpa/dokumen_rujukan_pnpa') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Seterusnya
                      </button></a> </form>
           	  </div>
                
                
             </div>
      </div>
   		   </div>
		</div>