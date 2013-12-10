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
        
        <!--panel 1
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
                      <label class="control-label" for="tahun">
                        Tahun
                      </label>
                      <div class="controls">
                        <?php echo form_error('tahun'); ?>
                         <?php echo form_dropdown('tahun', $year_list, 'id="tahun"');?>
                      </div>
                    </div>
                  
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
                        <?php echo form_error('jab_agensi'); ?>
                        <?php echo form_dropdown('jab_agensi', $jabatan, 'id="jab_agensi"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">
                        Premis
                      </label>
                      <div class="controls">
                        <?php
                          
                          $data = array(
                            'name'        => 'premis',
                            'id'          => 'premis',
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

                    <div class="control-group">
                      <label class="control-label" for="email1">
                        No DPA
                      </label>
                      <div class="controls">
                        <?php
                          
                          $data = array(
                            'name'        => 'nodpa',
                            'id'          => 'nodpa',
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
                    
                    <div class="control-group">
                      <label class="control-label">
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
          /.END panel 1-->

		<!--panel 2-->
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Pelan Penerimaan Aset (PTRA)
                </div>
              </div>
              	<!--table section-->            	
                <div class="widget-body">
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">Bil</th>
                          <th style="width:7%">PTRA Id</th>
                          <th style="width:7%">Tahun</th>
                          <th style="width:20%" class="hidden-phone">Kementerian</th>
                          <th style="width:18%" class="hidden-phone">Jabatan/Agensi</th>
                          <th style="width:18%" class="hidden-phone">Premis</th>
                          <th style="width:10%" class="hidden-phone">No. DPA</th>
                          <th style="width:7%" class="hidden-phone">Status</th>
                          <th style="width:8%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_ptra)) : foreach ($senarai_ptra as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo 'PTRA0000'. $rec->ptra_id; ?></td>
                                <td><?php echo $rec->tahun; ?></td>
                                <td><?php if($get_namakem = $this->ptra_model->get_namakem($rec->idkem)) foreach ($get_namakem as $rr) echo $rr->namakem;?></td>
                                <td><?php if($get_namajab_agensi = $this->ptra_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td><?php echo $rec->nama_premis; ?></td>
                                <td><?php echo $rec->nodpa; ?></td>
                                <td class="hidden-phone">
                                    <span class="badge">
                                      Deraf
                                    </span>
                                  </td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a href="<?php echo site_url('ptra/summary_pp_ptra_editpp')?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                                    </ul>
                                </td>
                            </tr>
                            <?php echo form_close(); ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--END table-->
                    <div class="clearfix">
                    </div>
                    
                  </div>
                </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
          <!--END panel 2-->
        
    </div>  
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->