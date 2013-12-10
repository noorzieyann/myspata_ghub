       

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
                         'name' => 'tskopaktiviti',
                           'id' => 'tskopaktiviti',
                        );
                    echo form_open('ppun/tskopaktiviti',$attributes); ?>


          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Skop dan Aktiviti PPUN
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
               
                     <div id="dt_example" class="example_alt_pagination">   
                    
                
                     <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th style="width:10%">Skop</th>
                        <th style="width:10%">Aktiviti</th>
                        <th style="width:15%">Butiran Aktiviti</th>
                        <th style="width:20%">Sub Butiran Aktiviti</th>
                        <th style="width:20%">Bajet Aktiviti (RM)</th>
                       
                        <th style="width:20%">Status</th>
                        <th style="width:20%">Tindakan</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td rowspan="7">1</td>
                        <td rowspan="7">Ubah Suai ASet</td>
                        <td rowspan="2">Reka bentuk dan skop kerja dilaksana secara berperingkat- peringkat</td>
                         <td>Sumber Dalaman</td>
                          <td>&nbsp;</td>
                       <td>80000.00</td>
                        <td><span class="badge badge-pembetulan">Pembetulan</span></td>
                        <td><ul class="icomoon-icons-container"><a href="<?php echo site_url('ppun/kemaskini_tskopaktiviti_ppd_ppun'); ?>"><li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li></a></ul></td>
                      </tr>
             <tr>
                        <td>Sumber Luaran</td>
                          <td>Perundingan</td>
                       <td>7000.00</td>
                        <td><span class="badge badge-success">Lengkap</span></td>
                        <td><ul class="icomoon-icons-container"><a href="<?php echo site_url('ppun/kemaskini_tskopaktiviti_ppd_ppun'); ?>"><li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li></a></ul></td>
                      </tr>
                      
                                            <tr>
                        <td rowspan="3">Kerja Pemulihan Lokasi Kemudahan Infrastruktur</td>
                         <td>Skop kerja berdasarkan bentuk sedia ada/asal</td>
                          <td>&nbsp;</td>
                       <td>13000.00</td>
                        <td><span class="badge badge-success">Lengkap</span></td>
                        <td><ul class="icomoon-icons-container"><a href="<?php echo site_url('ppun/kemaskini_tskopaktiviti_ppd_ppun'); ?>"><li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li></a></ul></td>
                      </tr>
                      
                       <tr>
                        <td>Skop kerja menempati kehendak penyampaian perkhidmatan</td>
                          <td>&nbsp;</td>
                       <td>9000.00</td>
                        <td><span class="badge badge-pembetulan">Pembetulan</span></td>
                        <td><ul class="icomoon-icons-container"><a href="<?php echo site_url('ppun/kemaskini_tskopaktiviti_ppd_ppun'); ?>"><li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li></a></ul></td>
                      </tr>
                      
                       <tr>
                        <td>Kos seperti yang dipersetujui</td>
                          <td>&nbsp;</td>
                       <td>13000.00</td>
                        <td><span class="badge badge-success">Lengkap</span></td>
                        <td><ul class="icomoon-icons-container"><a href="<?php echo site_url('ppun/kemaskini_tskopaktiviti_ppd_ppun'); ?>"><li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li></a></ul></td>
                      </tr>
                      
                       <tr>
                        <td>Kerja Ubah Suai/Naik Taraf</td>
                         <td>Reka bentuk bercirikan kelestarian </td>
                          <td>&nbsp;</td>
                       <td>23000.00</td>
                        <td><span class="badge badge-pembetulan">Pembetulan</span></td>
                        <td><ul class="icomoon-icons-container"><a href="<?php echo site_url('ppun/kemaskini_tskopaktiviti_ppd_ppun'); ?>"><li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li></a></ul></td>
                      </tr>
                      
                       <tr>
                        <td>Keadaan Fizikal</td>
                         <td>Reka bentuk memenuhi peraturan</td>
                          <td>Reka bentuk memenuhi skop</td>
                       <td>45000.00</td>
                        <td><span class="badge badge-success">Lengkap</span></td>
                        <td><ul class="icomoon-icons-container"><a href="<?php echo site_url('ppun/kemaskini_tskopaktiviti_ppd_ppun'); ?>"><li class="rounded"><span class="fs1" data-icon="&#xe005;" aria-hidden="true"></span></li></a></ul></td>
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
  <div class="clearfix"> </div>
  
     <div class="control-group">
                      <div class="control-group">
                      <label>Jumlah Bajet Aktiviti (RM)&nbsp;
                       
                        <?php
                          
                          $data = array(
                            'name'        => 'jumlah_bajet',
                            'id'          => 'jumlah_bajet',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-large',
                            'placeholder' =>  '89,000.00',
                              'disabled'=>'disabled'
                          );

                          echo form_input($data);
                          
                          ?>
                      </label>
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
           <a href="<?php echo site_url('ppun/treeviewskop_ppun') ?>">  
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
     <a href="<?php echo site_url('ppun/kawalan_rekod_terima_ppun') ?>">
     
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
                

        </div>
        

    </div>

      <!--/.fluid-container-->
      
       <?php  echo form_close();?>
        </div>
        
        
       
     
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



      
      </div>
         