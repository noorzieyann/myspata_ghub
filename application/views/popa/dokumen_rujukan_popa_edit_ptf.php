<!-- page: dokumen rujukan to edit for ptf, by seri idayu, 22092013 -->



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
      POPA
    </a>   
  </li>
</ul>

<br>
<!-- breadcrumb END --> 



<!-- tab navigation START --> 
<div class="widget-body">
  <ul class="nav nav-tabs no-margin myTabBeauty">
    <li class=""> 
      <a href="#profile" data-original-title="">
        PSPA(O)
      </a>
    </li> 
    <li class=""> 
      <a href="<?php echo site_url('ptra/senarai_pp_ptra')?>">
        PTRA
      </a> 
    </li> 
    <li class="active"> 
      <a href="#profile" data-original-title="">
        POPA
      </a>
    </li>
    <li class=""> 
      <a href="<?php echo site_url('pnpa/senarai_pp_pnpa')?>">
        PNPA
      </a>
    </li>
    <li class=""> 
      <a href="<?php echo site_url('ppun/senarai_pp_ppun')?>">
        PPUN
      </a>
    </li> 
    <li class=""> 
      <a href="<?php echo site_url('pla/senarai_pp_pla')?>">
        PLA
      </a>
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
                

        
              <!-- popup START -->
              <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                  </button>
                  <h4 id="myModalLabel">
                    Dokumen Rujukan
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


                <!-- button START -->
                <div class="modal-footer">
                  <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">
                    Batal
                  </a>
                  <a href="#" class="btn btn-warning2" data-dismiss="modal">
                    Simpan Deraf
                  </a>            
                </div>
                <!-- button END -->


              </div>
		          <!-- popup END -->


                   

              <!-- table START -->
              <div id="dt_example" class="example_alt_pagination">
                <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                  

                  <thead>
                    <tr>
                      <th style="width:4%" rowspan="2">
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
                            <a href="">
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
              <!-- table END--> 



              </div>
              <!-- table section END -->



            </div>
          </div>
        </div>
        <!-- panel 1 END -->




      	<!-- buttons START --> 
        <div class="widget-body" align="right">
          <a href="<?php echo site_url('popa/summary_ptf_popa_edit') ?>">
            <button class="btn btn-primary input-top-margin" type="button">
              Kembali
            </button>
          </a>
        </div> 
        <!-- buttons END --> 



      </div> 
      <!-- main container END --> 


    </div>
  </div>  
  <!-- tab section END -->


</div>
<!-- tab navigation END --> 
 




