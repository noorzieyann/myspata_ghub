<!-- page: kawalan rekod popa, by seri, 12092013 -->


<!-- tab navigation START --> 
<div class="widget-body">
  <ul class="nav nav-tabs no-margin myTabBeauty">
    <li class=""> 
      <a href="#profile" data-original-title="">PSPA(O)</a>
    </li> 
    <li class=""> 
      <a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a> 
    </li> 
    <li class="active"> 
      <a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a>
    </li>
    <li class=""> 
      <a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a>
    </li>
    <li class=""> 
      <a href="<?php echo site_url('ppun/senarai_ppd_ppun')?>">PPUN</a>
    </li> 
    <li class=""> 
      <a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a>
    </li>   
  </ul>
     


  <!-- tab section START -->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <p>

        <?php 
          $attributes = array(
                              'class' => 'form-horizontal no-margin', 
                              'name' => 'kawalan_rekod_popa',
                              'id' => 'kawalan_rekod_popa',
                             );
                        
                        echo form_open('popa/kawalan_rekod_popa',$attributes); 
        ?>   
      

      <!-- main container START-->
      <div class="main-container">
        

        <!-- panel 1 START -->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Kawalan Rekod Operasi Dan Penyenggaraan Aset
                </div>
              </div>


              <!-- table section START -->            	
              <div class="widget-body">
                <ul class="icomoon-icons-container">
                  <li>
                    <a href="#myModal" data-toggle="modal">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;">
                      </span>
                    </a>
                  </li>
                </ul>
                <label class="tambah">
                  Tambah Kawalan Rekod
                </label> 
                <div class="clearfix">
                </div>               
        

                <!-- popup START -->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      ×
                    </button>
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
                                  <i class="icon-calendar">
                                  </i>
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
                                  <i class="icon-calendar">
                                  </i>
                                </span>
                            </div>
                          </div>
                        </div>

                      </form>
                    </p>  
                  </div>


                  <!-- button popup START -->
        	        <div class="modal-footer">
        		        <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">
                      Batal
                    </a>
                    <a href="#" class="btn btn-warning2" data-dismiss="modal">
                      Simpan Deraf
                    </a>            
                  </div>
                  <!-- button popup END -->

                </div>
		            <!-- popup END -->

                                  
                <!-- table START -->
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-bordered table-hover pull-left" id="data-table">
                    <thead>
                      <tr>
                        <th style="width:2%">
                          Bil
                        </th>
                        <th style="width:20%" class="hidden-phone">
                          Jenis Rekod
                        </th>
                        <th style="width:20%" class="hidden-phone">
                          Lokasi
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Tarikh Mula
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Tarikh Tamat
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Tindakan
                        </th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php $i=1; if(!empty($senaraikawalan)) : foreach ($senaraikawalan as $rec) : ?>
                      <?php echo form_open('admin/update'); ?>
                        
                      <tr>
                        <td align="left">
                          <?php echo $i++; ?>
                        </td>
                        <td>
                          <?php echo $rec->f7_1d_jenis_rekod;?>
                        </td>
                        <td>
                          <?php echo $rec->f7_1d_lokasi;?>
                        </td>
                        <td>
                          <?php echo $rec->tahun_mula;?>
                        </td>
                        <td>
                          <?php echo $rec->tahun_tamat;?>
                        </td>
                        <td align="center">
                          <ul class="icomoon-icons-container">
                            <a href="<?php echo site_url('popa/summary_pp_popa_editpp')?>">
                              <li class="rounded">
                                <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                </span>
                              </li>
                            </a>
                          </ul>
                        </td>
                      </tr>
                  
                      <?php echo form_close(); ?>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>

                  <div class="clearfix">
                  </div>
                
                </div>
                <!-- table END -->
                   
               
              </div>
              <!-- table section END -->  


            </div>
          </div>
	      </div>
        <!-- panel 1 END --> 
      			
            
      </div> 
      <!-- main container END -->


    </div>
  </div>  
  <!-- tab section END -->



  <!-- buttons START --> 
  <div class="widget-body" align="right">
    <a href="<?php echo site_url('popa/summary_ppd_popa') ?>">
      <button class="btn btn-danger input-top-margin" type="button">
        Batal
      </button>
    </a>
    <a href="<?php echo site_url('popa/skop_aktiviti_popa') ?>">
      <button class="btn btn-primary input-top-margin" type="button">
        Sebelum
      </button>
    </a>
    <a href="<?php echo site_url('popa/dokumen_rujukan_popa') ?>">
      <button class="btn btn-primary input-top-margin" type="button">
        Seterusnya
      </button>
    </a>
  </div> 
  <!-- buttons END -->  



</div>
<!-- tab navigation END -->




 