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
                    <li class=""><a href="<?php echo site_url('main/senarai_ptf_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('main/senarai_ptf_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('main/senarai_ptf_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('main/senarai_ptf_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_pp_ptra',
                           'id' => 'senarai_pp_ptra',
                        );
        echo form_open('main/senarai_pp_ptra',$attributes); ?>
        <!--panel 1-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span>  Sila Pilih Penerima Arahan Penyediaan PTRA
                  </div>
                </div>
                <div class="widget-body">
                    <div class="control-group">
                      <label class="control-label">
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
                      <label class="control-label">
                        Jabatan/Agensi
                      </label>
                      <div class="controls">
                        <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="negeri">
                        Negeri
                      </label>
                      <div class="controls">
                        <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label" for="DateOfBirthMonth">
                        Daerah
                      </label>
                      <div class="controls">
                        <?php echo form_dropdown('daerah', $daerah, 'id="daerah"');?>
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
                        <div class="widget-body">
                        <ul class="icomoon-icons-container pull-right">
                            <li class="rounded">
                              <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>
                        </li>
                          </ul>
                        </div>                        
                      </div>                      
                    </div>
                    
                  <?php  echo form_close();?>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>  Senarai Penerima Arahan
                </div>
              </div>
                <!--table section-->              
                <div class="widget-body">
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th style="width:1%">
                          (/)
                        </th>
                        <th style="width:1%">
                          Bil
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Nama
                        </th>
                        <th style="width:12%" class="hidden-phone">
                          Kementerian</th>
                        <th style="width:12%" class="hidden-phone">
                          Jabatan/Agensi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                          </label>
                        </td>
                        <td>
                          <span class="name">
                            1
                          </span>
                        </td>
                        <td class="hidden-phone">Sharifah Nadiah Syed Waris</td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                      </tr>
                      <tr>
                        <td><label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                          </label>
                        </td>
                        <td>
                          <span class="name">
                            2
                          </span>
                        </td>
                        <td class="hidden-phone">Ahmad Zuhairi Haji Saman</td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                      </tr>
                      <tr>
                        <td><label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                          </label>
                        </td>
                        <td>
                          <span class="name">
                            3
                          </span>
                        </td>
                        <td class="hidden-phone">Nuraini Haizi Abd Ghani</td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                      </tr>
                      <tr>
                        <td><label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                          </label>
                        </td>
                        <td>
                          <span class="name">
                            4
                          </span>
                        </td>
                        <td class="hidden-phone">Darleena Hanis Hariz</td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                      </tr>
                      <tr>
                        <td><label class="radio">
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                          </label>
                        </td>
                        <td>
                          <span class="name">
                            5
                          </span>
                        </td>
                        <td class="hidden-phone">Megat Daud Megat Abu</td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                  <!--/.END table-->
                  <!--pagination-->
                  <p>Memaparkan 5 dari 10 senarai</p>
                  <div class="pagination no-margin" align="right">
                    <ul>
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
                  </div>
                  <!--/END pagination-->                     
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 2-->
    </div>  
      <!--/.END main-container-->
      <!--buttons--> 
                <div class="widget-body" align="right">
                    <button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button>
                  <a class="btn btn-success input-top-margin" href="#" id="confirm">
                    Hantar
                  </a>
                </div> 
                <!--/.END buttons-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->