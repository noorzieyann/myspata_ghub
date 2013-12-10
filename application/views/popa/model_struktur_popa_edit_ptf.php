<!-- page: model struktur popa edit bagi ptf, by seri, 10092013 -->



<!-- breadcrumb START -->
<div class="widget-body">
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
</div>
<br>
<!-- breadcrumb END -->

  


<!-- div widget-body START -->
<div class="widget-body"> 
    <ul class="nav nav-tabs no-margin myTabBeauty"> 
        <li class=""> 
            <a href="#profile" data-original-title="">
                PSPA(O)
            </a>
        </li> 
        <li class=""> 
            <a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">
                PTRA
            </a> 
        </li> 
        <li class="active"> 
            <a href="#profile" data-original-title="">
                POPA
            </a>
        </li>
        <li class=""> 
            <a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">
                PNPA
            </a>
        </li>
        <li class=""> 
            <a href="<?php echo site_url('ppun/senarai_ppun')?>">
                PPUN
            </a>
        </li> 
        <li class=""> 
            <a href="<?php echo site_url('pla/senarai_ppd_pla')?>">
                PLA
            </a>
        </li>   
    </ul> 
                
          
   
    
    <!-- div tab START -->
    <div class="tab-content" id="myTabContent"> 
        <div id="home" class="tab-pane fade active in">  
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
                
            

                        <!-- tab inner START -->
                        <div class="widget-body">
                            <ul class="nav nav-tabs no-margin myTabBeauty">
                                <li class="active">
                                    <a href="">
                                        Dalaman
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo site_url('popa/model_struktur_popa_edit_ptf2')?>">
                                        Luaran
                                    </a>
                                </li>
                            </ul>

                
                
                            <!-- tab section START -->
                            <div class="tab-content" id="myTabContent">
                                <div id="home" class="tab-pane fade active in">
      

                                <!--table section-->              
                                <div class="widget-body">
                                    <div id="dt_example" class="example_alt_pagination">
                                        <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                                            

                                            <thead>
                                                <tr>
                                                    <th style="width:4%">
                                                        Bil
                                                    </th>
                                                    <th style="width:15%">
                                                        Nama
                                                    </th>
                                                    <th style="width:7%">
                                                        No.KP
                                                    </th>
                                                    <th style="width:10%" class="hidden-phone">
                                                        Jawatan
                                                    </th>
                                                    <th style="width:7%" class="hidden-phone">
                                                        Gred Jawatan
                                                    </th>
                                                    <th style="width:7%" class="hidden-phone">
                                                        Gaji (RM)
                                                    </th>
                                                    <th style="width:10%" class="hidden-phone">
                                                        Lebih Masa (RM)
                                                    </th>
                                                </tr>
                                            </thead>
                      
                                            <tbody>
                                                <?php $i=1; if(!empty($sumber_dalaman)) : foreach ($sumber_dalaman as $rec) : ?>
                                                <?php //echo form_open('admin/update'); ?>
                                                    <tr>
                                                        <td align="left">
                                                            <?php echo $i++; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rec->nama; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rec->nric; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rec->jawatan; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rec->gred_jawatan; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rec->gaji; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $rec->kos_kerja_lebih_masa; ?>
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
                                </div>
                                <!-- table section END-->   
                

                                </div>                                               
                            </div>
                            <!-- tab section END -->
        

                        </div>
                        <!-- tab inner END --> 


                    </div>
                </div>  
            </div>
            <!-- panel 1 END -->
            

            </div>
        </div>
                    
          


        <!-- buttons START --> 
        <div class="widget-body" align="right">
            <a href="<?php echo site_url('popa/summary_ptf_popa_edit')?>">
                <button class="btn btn-primary input-top-margin" type="button">
                    Kembali
                  </button>
            </a>
        </div> 
        <!-- buttons END --> 


                      
    </div>  
    <!-- div tab END --> 



</div>
<!-- div widget-body END -->   


  
                
                
                
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    
                   
                
                
                
                    
                                    

                


                                    


                            



                
              

          

     
  