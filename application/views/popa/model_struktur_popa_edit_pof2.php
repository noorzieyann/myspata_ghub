<!-- page: model struktur popa for edit by pof for tab luaran, by seri idayu, 21092013 -->



<!-- breadcrumb START -->
<div class="widget-body">
  <ul class="breadcrumb-beauty">
    <li>
      <a href="<?php echo site_url('main')?>">
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
        PTRA
      </a>   
    </li>
  </ul>
</div>
<br />
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
      <a href="<?php echo site_url('popa/senarai_pof_popa')?>" >
        PTRA
      </a>
    </li>
    <li class="active">
      <a href="<?php echo site_url('popa/senarai_pof_popa')?>">
        POPA
      </a>
    </li>
    <li class="">
      <a href="<?php echo site_url('pnpa/senarai_pof_pnpa')?>">
        PNPA
      </a>
    </li>
    <li class="">
      <a href="<?php echo site_url('ppun/senarai_pof_ppun')?>">
        PPUN
      </a>
    </li>
    <li class="">
      <a href="<?php echo site_url('pla/senarai_pof_pla')?>">
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
                  <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                  </span> Model Struktur Dan Penyenggaraan Aset
                </div>
              </div>
              
              <div class="widget-body">
                <ul class="nav nav-tabs no-margin myTabBeauty">
                  <li class="">
                    <a href="<?php echo site_url('popa/model_struktur_popa_edit_pof')?>">
                      Dalaman
                    </a>
                  </li>
                  <li class="active">
                    <a href="">
                      Luaran
                    </a>
                  </li>
                </ul>
                  
  


                <!-- tab section START -->
                <div class="tab-content" id="myTabContent">
                  <div id="home" class="tab-pane fade active in">
      

                    <!-- table section START -->            	
                    <div class="widget-body">
                      <div class="widget-body">
                        <form class="form-horizontal no-margin"> 
                          <div class="control-group">
                            <label>
                              Nama Kontraktor : Syarikat Arkitek Delima Berhad
                            </label>
                          </div>
                          <div class="control-group">
                            <label>
                              No. Pendaftaran Syarikat : 78091123-R
                            </label>
                          </div>
                        </form>   
                      </div>
                    

                      <!-- table START -->
                      <div id="dt_example" class="example_alt_pagination">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                        
                          <thead>
                            <tr>
                              <th style="width:4%">
                                Bil
                              </th>
                              <th style="width:10%">
                                Kategori
                              </th>
                              <th style="width:15%">
                                Nama
                              </th>
                              <th style="width:7%">
                                Nama Syarikat
                              </th>
                              <th style="width:7%" class="hidden-phone">
                                E-mel
                              </th>
                              <th style="width:10%" class="hidden-phone">
                                No. Telefon Pejabat
                              </th>
                              <th style="width:10%">
                                No. Telefon Bimbit
                              </th>
                            </tr>
                          </thead>
                      

                          <tbody>
                            <?php $i=1; if(!empty($kontraktor_fasiliti)) : foreach ($kontraktor_fasiliti as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                            
                            <tr>
                              <td align="left">
                                <?php echo $i++; ?>
                              </td>
                              <td>
                                <?php if($getkatkontraktor = $this->popa_model->get_kont_list($rec->kontraktor_fasiliti_kategori_id))
                                    foreach ($getkatkontraktor as $rr) 
                                    echo $rr->kategori;
                                  ?>
                              </td>
                              <td>
                                <?php echo $rec->nama_kontraktor_fasiliti; ?>
                              </td>
                              <td>
                                <?php echo $rec->nama_syarikat; ?>
                              </td>
                              <td>
                                <?php echo $rec->email; ?>
                              </td>
                              <td>
                                <?php echo $rec->no_tel_pej; ?>
                              </td>
                              <td align="center">
                                <?php echo $rec->no_tel_bimbit; ?>
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
                <!-- tab section END -->
        

              </div> 

            </div>
          </div>  
        </div>
        <!-- panel 1 END -->  



      </div>
      <!-- main container END -->


    </div>
                    
         


    <!-- buttons START --> 
    <div class="widget-body" align="right">
      <a href="<?php echo site_url('popa/summary_pof_popa_edit')?>">
        <button class="btn btn-primary input-top-margin" type="button">
          Kembali
        </button>
      </a>
    </div> 
    <!-- buttons END --> 




  </div>
  <!-- tab section END --> 



</div> 
<!-- tab navigation START --> 




  