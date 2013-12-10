<!-- page: kawalan rekod popa for ptf to edit, by seri idayu, 22092013 -->



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
                    </span> Kawalan Rekod Operasi Dan Penyenggaraan Aset
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
                    Kawalan Rekod
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
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
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
                      <th style="width:10%" class="hidden-phone" rowspan="2">
                        Jenis Rekod
                      </th>
                      <th style="width:10%" class="hidden-phone" rowspan="2">
                        Lokasi
                      </th>
                      <th style="width:30%" class="hidden-phone" colspan="2">
                        Tempoh Penyimpanan
                      </th>
                      <th style="width:8%" class="hidden-phone" rowspan="2">
                        Tindakan
                      </th>
                    </tr>
        
                    <tr>
                      <th style="width:15%">
                        Tahun Mula
                      </th>
                      <th style="width:15%" class="hidden-phone">
                        Tahun Tamat
                      </th>
                    </tr>
                  </thead>
              

                  <tbody>
                    <?php $i=1; if(!empty($senaraikawalan)) : foreach ($senaraikawalan as $rec) : ?>
                    <tr>
                      <td align="left">
                        <?php echo $i++; ?>
                      </td>
                      <td>
                        <?php echo $rec->f7_1d_jenis_rekod; ?>
                      </td>
                      <td>
                        <?php echo $rec->f7_1d_lokasi; ?>
                      </td>
                      <td>
                        <?php echo $rec->tahun_mula; ?>
                      </td>
                      <td>
                        <?php echo $rec->tahun_tamat; ?>
                      </td>
                      <td align="center">                       
                        <ul class="icomoon-icons-container">
                          <a href="<?php //echo site_url('popa/summary_pp_popa_edit_pp')?>">
                            <li class="rounded">
                              <span class="fs1" data-icon="&#xe005" aria-hidden="true">
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
 




