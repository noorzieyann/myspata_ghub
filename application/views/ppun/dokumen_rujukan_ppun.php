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
         
          <!--tab navigation--> 
          <ul class="nav nav-tabs no-margin myTabBeauty">
                     <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class="active"><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
          <!--tab navigation--> 
          
           <div class="tab-content" id="myTabContent">
                 <div id="ppun" class="tab-pane fade active in">
              
          
                 
                    <?php //echo validation_errors(); ?>
                    <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'dokumen_rujukan_ppun',
                           'id' => 'dokumen_rujukan_ppun',
                        );
                    echo form_open('ppun/dokumen_rujukan_ppun',$attributes); ?>
      
      
      
      <!--second tab -->
      <div class="main-container">
          

         
          

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Dokumen Rujukan              </div>
                </div>
                
              
                
              <div class="widget-body">

               <div class="row-fluid">
                   <ul class="icomoon-icons-container">
                    <a href="#myModal"  data-toggle="modal"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li></a>
                  </ul><label class="tambah">Tambah Dokumen Rujukan</label>
                  </div>
                 
                     <div id="dt_example" class="example_alt_pagination">   
                    <?php echo $this->table->generate($dataku); ?>
                
                   <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai</div>
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                    <?php echo $this->pagination->create_links(); ?>   
                     
                      </div> 

  </div>
  
  <div class="clearfix"></div>
  
     <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                    
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel"><span class="fs1" aria-hidden="true" data-icon="&#xe025;"></span>
                        Tambah Dokumen Rujukan
                      </h4>
                    </div>
                    
                        <?php $this->load->view('ppun/popup_dokumen_rujukan_ppun')?>
                     
                   
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
        <a href="<?php echo site_url('ppun/kawalan_rekod_pemulihan_ppun') ?>">
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
                   <a href="<?php echo site_url('ppun/summary_ppun') ?>">
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


          </div

       

        ></div>

        