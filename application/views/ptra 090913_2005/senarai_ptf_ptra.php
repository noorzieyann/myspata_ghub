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
                        Perangcangan
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
    <!--END breadcrumb-->
    <br />
    <!--tab navigation--> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_ptf_ptra',
                           'id' => 'senarai_ptf_ptra',
                        );
        echo form_open('ptra/senarai_ptf_ptra',$attributes); ?>
        <!--panel 1-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penerimaan Aset (PTRA)
                  </div>
                </div>
                <div class="widget-body">
                  
                    <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tahun
                      </label>
                      <div class="controls">
                        <?php echo form_error('tahun'); ?>
                         <?php echo form_dropdown('tahun', $year_list, 'id="tahun"');?>
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
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' => 'Kementerian Kerja Raya',
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
                        <?php echo form_error('jab_agensi'); ?>
                      <?php echo form_dropdown('jab_agensi', $jabatan, 'id="jab_agensi"');?>
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
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
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
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
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
                        <?php echo form_error('status'); ?>
                        <?php echo form_dropdown('status', $status, 'id="status"');?>
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
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                        </div>
                    </div>

                <div class="control-group ">
                          <?php
                    $seterusnya = array(
                        'name'    => '',
                        'id'      => '',
                        'class'   => 'rounded pull-right ',
                        'value'   => '',
                        'content' => ' Carian',
                        'type'    => 'submit',
                        'data-icon' => '&#xe07f;'
                    );

                    echo form_button($seterusnya);
                    
                    ?>
                       
                      </div>
                </div>
                
              </div>
            </div>
          </div>
          <!--/.END panel 1-->

		<!--panel 2-->
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai PTRA
                </div>
              </div>
              	<!--table section-->             
                <div class="widget-body">
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                  <?php echo $this->table->generate($dataku); ?>
                  <!--<table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th style="width:2%">
                          Bil
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          PTRA Id
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Tahun</th>
                        <th style="width:12%" class="hidden-phone">
                          Kementerian</th>
                        <th style="width:12%" class="hidden-phone">
                          Jabatan/Agensi</th>
                        <th style="width:12%" class="hidden-phone">
                          Premis</th>
                        <th style="width:12%" class="hidden-phone">
                          No DPA</th>
                        <th style="width:6%" class="hidden-phone">
                          Status
                        </th>
                        <th style="width:12%" class="hidden-phone">
                          Tindakan
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="name">
                            1
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000001</td>
                        <td class="hidden-phone">
                          2003
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Sekolah Menengah Bangi
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-info">
                            Sah
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><a href=""><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></a></li></ul>                    
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            2
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000002</td>
                        <td class="hidden-phone">
                          2006
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Pejabat Daerah Gombak
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge">
                            Deraf
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><a href=""><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></a></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            3
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000003</td>
                        <td class="hidden-phone">
                          2009
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Bahagian Teknologi Negeri Selangor</td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-warning">
                            Semak
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><a href=""><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></a></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            4
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000004</td>
                        <td class="hidden-phone">
                          2012
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Pejabat Ketua Pengarah
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-info">
                            Sah
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><a href=""><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></a></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000005</td>
                        <td class="hidden-phone">
                          2015
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Kompleks Pejabat JKR
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge">
                            Deraf
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><a href=""><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></a></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            6
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000006</td>
                        <td class="hidden-phone">
                          2017
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Unit Audit Dalam
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-info">
                            Sah
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><a href=""><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></a></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            7
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000007</td>
                        <td class="hidden-phone">
                          2019
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Unit Kawal Selia FELDA
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-info">
                            Sah
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><a href=""><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></a></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            8
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000008</td>
                        <td class="hidden-phone">
                          2020
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Pejabat Ketua Setiausaha Kanan
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-info">
                            Sah
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><a href=""><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></a></li></ul></td>
                      </tr>
                    </tbody>
                  </table>-->

                  </div>
                  <!--/.END table-->
                  <!--pagination-->
                  <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 15 senarai</div>
                  <!--<p>Memaparkan 5 dari 10 senarai</p>-->
                  <div class="pagination no-margin" align="right">
                    <!--<ul>
                      <li>
                        <a href="#" data-original-title="">
                          Pertama
                        </a>
                      </li>
                      <li >
                        <a href="#" data-original-title="">
                          Sebelum
                        </a>
                      </li>
                      <li class="active">
                        <a href="#" data-original-title="">
                          1
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          2
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          3
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          4
                        </a>
                      </li>
                     
                     <li class="hidden-phone">
                        <a href="#" data-original-title="">
                          Seterusnya
                        </a>
                        </li>
                      <li class="hidden-phone">
                        <a href="#" data-original-title="">
                          Akhir
                        </a>
                      </li>
                    </ul>
                  </div>-->
                  <!--/END pagination-->  
                  
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        
                        <?php echo $this->pagination->create_links(); ?>                   
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 2-->
        <?php  echo form_close();?>
    </div>  
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->