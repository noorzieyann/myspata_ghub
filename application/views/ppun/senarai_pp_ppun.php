


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
                    echo form_open('ppun/senarai_pp_ppun',$attributes); ?>
        
              
          <!--div class="row-fluid">
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
                        <?php echo form_dropdown('tempoh_mula', $year_list, 'id="tempoh_mula"')?>
                        
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
                    <!--ul class="icomoon-icons-container pull-right">
                    <li class="rounded">
                       <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>
                    </li>
					</ul>
                        
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
          
         

        </div-->

    

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
              
                  
                  
                        
              
                     <div id="dt_example" class="example_alt_pagination">   
                    
                
                     <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th style="width:10%">PPUN ID</th>
                        <th style="width:10%">Tahun</th>
                        <th style="width:15%">Kementerian</th>
                        <th style="width:20%">Jabatan/Agensi</th>
                        <th style="width:20%">Premis</th>
                        <th style="width:10%">No DPA</th>
                        <th style="width:20%">Status</th>
                        <th style="width:20%">Tindakan</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; if(!empty($senarai_ppun)) : foreach ($senarai_ppun as $rec) : ?>
                     <tr>
                        <td> <?php echo $i++; ?></td>
                        <td><?php echo 'PPUN0000'. $rec->ppun_id; ?></td>
                        <td><?php echo $rec->tahun; ?></td>
                         <td><?php if($get_namakem = $this->ppun_model->get_namakem($rec->idkem)) 
                         foreach ($get_namakem as $rr) 
                          echo $rr->namakem;?></td>
                          <td><?php if($get_namajab_agensi = $this->ppun_model->get_namajab_agensi($rec->idjab_agensi)) 
                          foreach ($get_namajab_agensi as $rr) 
                            echo $rr->nama_jab_agensi;?></td>
                       <td><?php echo $rec->nama_premis; ?></td>
                        <td><?php echo $rec->nodpa; ?></td>
                        <td><span class="badge badge-warning">Semak</span></td>
                        <td><ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li>
                          <li class="rounded"><span class="fs1" data-icon="&#xe027" aria-hidden="true"></span></li>
                            </ul></td>
                      </tr>
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                   

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