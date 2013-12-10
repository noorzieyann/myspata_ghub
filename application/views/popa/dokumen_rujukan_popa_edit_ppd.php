<!-- page: dokumen rujukan popa for ppd to edit, by seri idayu, 04102013 -->





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
      <a href="<?php echo site_url('ptra/dokumen_rujukan_ptra_editppd')?>" data-original-title="">
        PTRA
      </a> 
    </li> 
                
    <li class="active"> 
      <a href="#profile" data-original-title="">
        POPA
      </a>
    </li>
                
    <li class=""> 
      <a href="<?php echo site_url('pnpa/dokumen_rujukan_pnpa_editppd')?>">
        PNPA
      </a>
    </li>
                
    <li class=""> 
      <a href="<?php echo site_url('ppun/dokumen_rujukan_ppun_editppd')?>">
        PPUN
      </a>
    </li> 
                
    <li class=""> 
      <a href="<?php echo site_url('pla/dokumen_rujukan_pla_editppd')?>">
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
          <a href="<?php echo site_url('popa/summary_ppd_popa_edit') ?>">
            <button class="btn btn-danger input-top-margin" type="button">
              Batal
            </button>
          </a>
          <a href="<?php echo site_url('popa/summary_ppd_popa_edit') ?>">
            <button class="btn btn-warning2 input-top-margin" type="button">
              Simpan
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





