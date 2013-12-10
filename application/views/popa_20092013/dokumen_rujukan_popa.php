<!-- page: dokumen rujukan popa, by seri, 12092013 -->
  
    
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
      


      <!-- main container START -->
      <div class="main-container">
        


        <!-- panel 1 START -->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Dokumen Rujukan
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
                  Tambah Dokumen Rujukan
                </label>
                  


                <!-- popup START -->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      ×
                    </button>
                    <h4 id="myModalLabel">
                      Tambah Dokumen Rujukan
                    </h4>
                  </div>
                  
                  <div class="modal-body">
                    <p>
                      <form class="form-horizontal no-margin">
                        
                        <div class="control-group">
                          <label class="control-label">
                            1. Tajuk Dokumen
                          </label>
                          <div class="controls">
                            <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                          </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">
                            Dokumen Rujukan
                          </label>
                          <div class="controls">
                            <input type="file"/>
                          </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">
                            2. Tajuk Dokumen
                          </label>
                          <div class="controls">
                            <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                          </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">
                            Dokumen Rujukan
                          </label>
                          <div class="controls">
                            <input type="file"/>
                          </div>
                        </div>
                
                        <div class="control-group">
                          <label class="control-label">
                            3. Tajuk Dokumen
                          </label>
                          <div class="controls">
                            <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                          </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">
                            Dokumen Rujukan
                          </label>
                          <div class="controls">
                            <input type="file"/>
                          </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">
                            4. Tajuk Dokumen
                          </label>
                          <div class="controls">
                            <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                          </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">
                            Dokumen Rujukan
                          </label>
                          <div class="controls">
                            <input type="file"/>
                          </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">
                            5. Tajuk Dokumen
                          </label>
                          <div class="controls">
                            <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                          </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">
                            Dokumen Rujukan
                          </label>
                          <div class="controls">
                            <input type="file"/>
                          </div>
                        </div>

                      </form>
                    </p>  
                  </div>



                  <!-- popup button START -->
                  <div class="modal-footer">
                    <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">
                      Batal
                    </a>
                    <a href="#" class="btn btn-warning2" data-dismiss="modal">
                      Simpan Deraf
                    </a>            
                  </div>
                  <!-- popup button END -->
        

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
                          Tajuk Dokumen
                        </th>
                        <th style="width:20%" class="hidden-phone">
                          Dokumen Rujukan
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Tindakan
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $i=1; if(!empty($senaraidokumen)) : foreach ($senaraidokumen as $rec) : ?>
                      <?php echo form_open('admin/update'); ?>
                        
                      <tr>
                        <td align="left">
                          <?php echo $i++; ?>
                        </td>
                        <td>
                          <?php echo $rec->lamp_nama_fail;?>
                        </td>
                        <td>
                          <?php echo $rec->lamp_nama_fail_asal;?>
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
      <!--/.END main-container-->
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
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->
 