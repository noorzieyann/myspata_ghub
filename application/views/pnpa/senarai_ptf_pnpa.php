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
                        PNPA
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
                    <li class="active"><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
    <!--breadcrumb-->
          <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
               <!--start panel Senarai -->
                <div class="row-fluid">
                <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai PNPA
                  </div>
                  </div>
                <div class="widget-body">
                    
                    <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">Bil</th>
                          <th style="width:7%">PNPA Id</th>
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
                            <?php $i=1; if(!empty($senarai_pnpa)) : foreach ($senarai_pnpa as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo 'PNPA0000'. $rec->pnpa_id; ?></td>
                                <td><?php echo $rec->tahun; ?></td>
                                <td><?php if($get_namakem = $this->pnpa_model->get_namakem($rec->idkem)) foreach ($get_namakem as $rr) echo $rr->namakem;?></td>
                                <td><?php if($get_namajab_agensi = $this->pnpa_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td><?php echo $rec->nama_premis; ?></td>
                                <td><?php echo $rec->nodpa; ?></td>
                                <td></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a href="<?php echo site_url('pnpa/summary_ptf_pnpa_edit')?>"><li class="rounded"><span class="fs1" data-icon="&#xe026" aria-hidden="true"></span></li></a>
                                    </ul>
                                </td>
                            </tr>
                            <?php echo form_close(); ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--END table-->
                <!--end panel Senarai --> 
                 <div class="clearfix"></div>
                </div>
                </div>
                </div>
              </div>


               <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>
       

      


        

          
          
        
          
          
        
   