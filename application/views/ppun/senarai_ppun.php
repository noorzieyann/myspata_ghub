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
                         'name' => 'senarai_pp_ppun',
                           'id' => 'senarai_pp_ppun',
                        );
                    echo form_open('ppun/senarai_ptf_ppun',$attributes); ?>
              
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Pemulihan / Ubah Suai / Naik Taraf Aset (PPUN)
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
                  
                
                      <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tahun
                      </label>
                      <div class="controls">
                         <?php echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"');?>
                      </div>
                    </div>

                      <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Kementerian
                      </label>
                      <div class="controls">
                       <?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?>
                      
                      </div>
                    </div>
                    
                    
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Jabatan/Agensi
                      </label>
                      <div class="controls">
                      <?php 
                      $jabatan = array(
                                          '- Pilih Jabatan -','Polis Diraja Malaysia','Hospital Putrajaya',
                               
                                                );
                      echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                      </div>
                    </div>


					 <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Premis
                      </label>
                      <div class="controls">
                      <?php
                          
                          $data = array(
                            'name'        => 'premis',
                            'id'          => 'premis',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
                    
                    
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        No DPA
                      </label>
                      <div class="controls">
                        <?php
                          
                          $data = array(
                            'name'        => 'nodpa',
                            'id'          => 'nodpa',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>

					<div class="control-group">
                      <label class="control-label" for="report_range1">
                        Status
                      </label>
                      <div class="controls">
                     <?php $options = array(
                                ''  => '- Pilih Status -',
                                'sah'  => 'Sah',
                                'pembetulan'    => 'Pembetulan',
                                'deraf'   => 'Deraf',
                               
                              );

                          

                                echo form_dropdown('status', $options);

                                ?>
                      </div>
                    </div>


		
                      
                      <div class="control-group">
                      <label class="control-label" for="email1">
                        Kata Carian
                      </label>
                      <div class="controls">
                           <?php
                          
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                        </div>
                    </div>
                    
                    
                    
                    <div class="control-group ">
                    <?php
                            $search = array(
                                'name'    => '',
                                'id'      => '',
                                'class'   => 'icomoon-icons-container pull-right rounded',
                                'value'   => '',
                                'type'    => 'submit',
                                'content' => ' Carian',
                                'data-icon'=> '&#xe07f'
                            );

                            echo form_button($search);

                            ?>
                    </div>
                
          
              </div>
            </div>

          </div>
          
         

        </div>

    

      <!--/.fluid-container-->
      
      
      
      
      <!--second tab -->
      <div class="main-container">
          

         
          

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai PPUN
                  </div>
                  
                </div>
                
               <div class="widget-body">
                  <ul class="icomoon-icons-container">
                      <a href="../ppun/penyediaan_kandungan_ppun"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li></a>
                    </ul></div> <label>Tambah</label>
                
              <div class="widget-body">
              
              
               <div id="dt_example" class="example_alt_pagination">   
                    
                 <?php echo $this->table->generate($dataku); ?>
                     <!--table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th style="width:10%">PPUN Id</th>
                        <th style="width:7%">Tahun</th>
                        <th style="width:15%">Kementerian</th>
                        <th style="width:10%">Jabatan/Agensi</th>
                        <th style="width:20%">Premis</th>
                        <th style="width:10%">No DPA</th>
                        <th style="width:10%">Status</th>
                        <th style="width:30%">Tindakan</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>PPUN000001</td>
                        <td>2013</td>
                         <td>Kementerian Kerja Raya</td>
                          <td>Jabatan Kerja Raya</td>
                       <td>Sekolah Kebangsaan Seksyen 2</td>
                        <td>1105101MYS.101200.BE001</td>
                        <td><span class="badge badge-warning">Semak</span></td>
                        <td><ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon=" &#xe0a7" aria-hidden="true"></span></li>
                        </ul></td>
                      </tr>
                      <tr>
                         <td>2</td>
                        <td>PPUN000002</td>
                        <td>2013</td>
                         <td>Kementerian Kerja Raya</td>
                          <td>Jabatan Kerja Raya</td>
                       <td>Pejabat Ketua Daerah</td>
                        <td>1105101MYS.101200.BE002</td>
                        <td><span class="badge badge-info">Sah</span></td>
                        <td><ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon=" &#xe0a7" aria-hidden="true"></span></li>
                        </ul></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>PPUN000003</td>
                        <td>2013</td>
                         <td>Kementerian Kerja Raya</td>
                          <td>Jabatan Kerja Raya</td>
                       <td>Pejabat Ketua Pengarah</td>
                        <td>1105101MYS.101200.BE004</td>
                        <td><span class="badge">Deraf</span></td>
                        <td><ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon=" &#xe0a7" aria-hidden="true"></span></li>
                        </ul></td>
                      </tr>
                    </tbody>
                  </table-->
                   <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai</div>
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        
                        <?php echo $this->pagination->create_links(); ?>
                      <!--a id="data-table_first" class="first paginate_button paginate_button_disabled" tabindex="0">Pertama</a>
                      <a id="data-table_previous" class="previous paginate_button paginate_button_disabled" tabindex="0">Sebelum</a>
                      <span>
                      <a class="paginate_active" tabindex="0">1</a>
                      <a class="paginate_button" tabindex="0">2</a>
                      <a class="paginate_button" tabindex="0">3</a>
                      <a class="paginate_button" tabindex="0">4</a>
                      </span>
                      <a id="data-table_next" class="next paginate_button" tabindex="0">Seterusnya</a>
                      <a id="data-table_last" class="last paginate_button" tabindex="0">Akhir</a-->
                      </div> 

  </div>
  <div class="clearfix"> </div>
            
              </div>
            </div>

          </div>
          
         
		</div>
        
        
        
        
        
        </div>
        
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
        
         <script type="text/javascript">
      //Alertify JS
      $ = function (id) {
        return document.getElementById(id);
      },
      reset = function () {
        $("toggleCSS").href = "<?php echo base_url() . 'asset/'; ?>css/alertify.core.css";
        alertify.set({
          labels: {
            ok: "Ya",
            cancel: "Tidak"
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: "ok"
        });
      };
      
     
      $("salinpp").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin kandungan rekod PPUN ID PNPA000001 kepada rekod baru?", function (e) {
          if (e) {
            alertify.success("Anda Klik YA");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
      
      $("salinptf").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin kandungan rekod PPUN ID PNPA000002 kepada rekod baru?", function (e) {
          if (e) {
            alertify.success("Anda Klik YA");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
      $("salinppd").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin kandungan rekod PPUN ID PNPA000003 kepada rekod baru?", function (e) {
          if (e) {
            alertify.success("Anda Klik YA");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
     
</script>