     <style>
    
    .sort_asc:after {
      content: "▲";
    }
    .sort_desc:after {
      content: "▼";
    }
  </style>    
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
                        PPUN
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
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class="active"><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
          
          
           <div class="tab-content" id="myTabContent">
                 <div id="ppun" class="tab-pane fade active in">
              
          
       
                   <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'kawalan_rekod_terima_ppun',
                           'id' => 'kawalan_rekod_terima_ppun',
                        );
                    echo form_open('ppun/kawalan_rekod_pemulihan_ppun',$attributes); ?>

      
      
      
      <!--second tab -->
      <div class="main-container">
          

         
          

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Kawalan Rekod Pemulihan/ Ubah Suai/ Naik Taraf Aset
                  </div>
                </div>
                
              
                
              <div class="widget-body">

               <div class="row-fluid">
                   <ul class="icomoon-icons-container">
                    <a href="#myModal"  data-toggle="modal"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li></a>
                  </ul><label class="tambah">Tambah Kawalan Rekod Pemulihan/ Ubah Suai/ Naik Taraf Aset</label>
                  </div>
                        
                  
                     <div id="dt_example" class="example_alt_pagination">   
                    
                
                     <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th rowspan="2" style="width:3%;vertical-align: top;" class="sort_asc">Bil</th>
                        <th rowspan="2" style="width:25%;vertical-align: top;" class="sort_asc">Jenis Rekod</th>
                        <th rowspan="2" style="width:25%;vertical-align: top;" class="sort_asc">Lokasi</th>
                        <th colspan="2" style="width:15%;vertical-align: top;" class="sort_asc">Tempoh Penyimpanan</th>
                        
                        <th rowspan="2" style="width:30%;vertical-align: top;" class="sort_asc">Tindakan</th>
                       
                      </tr>
                       <tr>
                        
                        <th style="width:10%">Tarikh Mula</th>
                        <th style="width:20%">Tarikh Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Dokumen A</td>
                        <td>Lokasi A</td>
                         
                        <td>01/02/2007</td>
                        <td>01/02/2008</td>
                        <td><ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li>
                        <!--li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon=" &#xe0a7" aria-hidden="true"></span></li-->
                        </ul></td>
                      </tr>
                      <tr>
                         <td>2</td>
                        <td>Dokumen B</td>
                        <td>Lokasi B</td>
                        
                        <td>09/12/2009</td>
                        <td>09/09/2009</td>
                        <td><ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li>
                        <!--li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon=" &#xe0a7" aria-hidden="true"></span></li-->
                        </ul></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Dokumen C</td>
                        <td>Lokasi C</td>
                        
                              <td>10/08/2010</td>
                        <td>10/08/2012</td>
                        <td><ul class="icomoon-icons-container">
                                <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li>
                        <!--li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon=" &#xe0a7" aria-hidden="true"></span></li-->
                        </ul></td>
                      </tr>
                    </tbody>
                  </table>
                   <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai</div>
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                      <a id="data-table_first" class="first paginate_button paginate_button_disabled" tabindex="0">Pertama</a>
                      <a id="data-table_previous" class="previous paginate_button paginate_button_disabled" tabindex="0">Sebelum</a>
                      <span>
                      <a class="paginate_active" tabindex="0">1</a>
                      <a class="paginate_button" tabindex="0">2</a>
                      <a class="paginate_button" tabindex="0">3</a>
                      <a class="paginate_button" tabindex="0">4</a>
                      </span>
                      <a id="data-table_next" class="next paginate_button" tabindex="0">Seterusnya</a>
                      <a id="data-table_last" class="last paginate_button" tabindex="0">Akhir</a>
                      </div> 

  </div>
  
  <div class="clearfix"></div>
  
     <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel"><span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>
                        Tambah Kawalan Rekod Penerimaan Aset
                      </h4>
                    </div>
                   
                        <?php $this->load->view('ppun/popup_kawalan_rekod_terima_ppun');?>
                           
                     
                  </div>
                       
                  

                   

                  
         
                
             
                
          
              </div>
            </div>

          </div>
          
         
		</div>
        
        
        
        
        
        </div>
        
        
       
       
        
           
               <div class="next-prev-btn-container pull-right">
                <a href="<?php echo site_url('ppun/senarai_ppun') ?>">
                 <?php
        $batal = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Batal'
        );

        echo form_button($batal);
        
        ?>
        </a>
           <a href="<?php echo site_url('ppun/tskopaktiviti_ppun') ?>">
        <?php
        $sebelum = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Sebelum'
        );

        echo form_button($sebelum);
        
        ?>
           </a>
           <a href="<?php echo site_url('ppun/dokumen_rujukan_ppun') ?>">
        <?php
        $seterusnya = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Seterusnya'
        );

        echo form_button($seterusnya);
        
        ?>
           </a>
</div>
<div class="clearfix"></div>
             

                  <?php  echo form_close();?>
                   
         </div>

         <div id="pspao" class="tab-pane fade active in">
         
         </div>

         <div id="ptra" class="tab-pane fade active in">
         
         </div>

         <div id="popa" class="tab-pane fade active in">
         
         </div>

         <div id="pnpa" class="tab-pane fade active in">
         
         </div>

         <div id="pla" class="tab-pane fade active in">
         
         </div>


          </div></div>