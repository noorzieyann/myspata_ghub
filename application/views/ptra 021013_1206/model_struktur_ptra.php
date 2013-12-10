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
        <p><form action='tambahpanel_penilai' method='post'>
      <!--main container-->
      <div class="main-container">
        <!--panel 1-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Model Struktur Organisasi Penerimaan Aset Di Premis 
                  </div>
                </div>
      <div class="widget-body">
          
          <!--start div row ptf n pif -->
       			      <div class="row-fluid">

                <!--start div panel ptf -->
            		  <div class="span6">
              		<div class="widget">
                	<div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PTF
                  </div></div>
                	<div class="widget-body">
                    <?php if(!empty($senarai_ptf)) : foreach ($senarai_ptf as $rec) : ?>
                 			 <div class="control-group">
                 			    <label class="checkbox">
                   			 <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="ptf[]" >
                   			 <?php echo $rec->nama; ?>
                  			</label>
                  			</div>
                    <?php endforeach; ?>
                    <?php endif; ?>
              		</div>
                  </div>
                  </div><!--end div panel ptf -->
                
                <!--start div panel pif -->
            		  <div class="span6">
            		  <div class="widget">
            		    <div class="widget-header">
            		      <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PIF</div>
          		        </div>
            		    <div class="widget-body">
                    <?php if(!empty($senarai_pif)) : foreach ($senarai_pif as $rec) : ?>
                       <div class="control-group">
                          <label class="checkbox">
                         <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pif[]" >
                         <?php echo $rec->nama; ?>
                        </label>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
          		      </div> <!--end div panel pif -->
                    </div><!--end div row ptf n pif -->
                </div>
                <!--start div row pof n pdf -->
       			    <div class="row-fluid">

                <!--start div panel pdf -->
       			    <div class="span6">
              	<div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PDF </div></div>
                <div class="widget-body">
                    <?php if(!empty($senarai_pdf)) : foreach ($senarai_pdf as $rec) : ?>
                       <div class="control-group">
                          <label class="checkbox">
                         <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pdf[]" >
                         <?php echo $rec->nama; ?>
                        </label>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
            	   </div>
                </div><!--end div panel pif -->

              <!--start div panel pof -->
       			    <div class="span6">
       			      <div class="widget">
       			        <div class="widget-header">
       			          <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> POF</div>
   			            </div>
       			       <div class="widget-body">
                    <?php if(!empty($senarai_pof)) : foreach ($senarai_pof as $rec) : ?>
                       <div class="control-group">
                          <label class="checkbox">
                         <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pof[]" >
                         <?php echo $rec->nama; ?>
                        </label>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div><!--end div panel pif -->
                </div><!--end div row pdf n pof -->
            </div>
                
      </div>
              </div>
            </div>
          </div>
          <!--/.END panel 1--> 

                    <?php 
                        echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

                        if($this->session->flashdata('flashError'))
                        {
                            echo '<div class="mws-form-message error">';
                            echo '<i class="icol-ban"></i> ' .$this->session->flashdata('flashError');
                            echo '</div>';
                        }
                        if($this->session->flashdata('flashComfirm'))
                        {
                            echo '<div class="mws-form-message success">';
                            echo '<i class="icol-accept"></i> ' .$this->session->flashdata('flashComfirm');
                            echo '</div>';
                        }
                    ?>

		  <!--panel 2-->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">               
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Panel Penilai Teknikal
                  </div>
                </div>             
               <div class="widget-body">
                  <ul class="icomoon-icons-container">
                    <a href="#myModal"  data-toggle="modal"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li>
                    </a>
                   </ul>
                  <label class="tambah">Tambah Panel Penilai Teknikal</label>
                  <div class="clearfix"></div>                  
                  
                  <!--table section-->  
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">#</th>
                          <th style="width:4%">Bil</th>
                          <th style="width:10%">Kategori Id</th>
                          <th style="width:20%">Nama</th>
                          <th style="width:20%" class="hidden-phone">Nama Syarikat</th>
                          <th style="width:15%" class="hidden-phone">Surat Lantikan</th>
                          <th style="width:8%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_panel2)) : foreach ($senarai_panel2 as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><input type="checkbox" value="" ></td>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php if($get_nama_panelpenilai = $this->ptra_model->get_kat_penilai($rec->panel_penilai_kategori_id)) foreach ($get_nama_panelpenilai as $rr) echo $rr->kategori;?></td>
                                <td><?php echo $rec->nama_penilai; ?></td>
                                <td><?php echo $rec->nama_syarikat; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container"><li class="rounded">
                                      <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                                        </ul><a href="download">Surat Lantikan.docx</a>
                                </td>
                                <td align="center"><ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php base_url(); ?>kemaskinipanel_penilai/<?php echo $rec->ptra_pata_f6_1a_panel_penilai_id; ?>"></a>
                                    </span></li></ul>
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
          <!--/.END panel 2--> 

<!--popup-->
      <form id="" class="" action="tambahpanel_penilai" method="post">
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Panel Penilai Teknikal
              </h4>
          </div>
            <div class="modal-body">
              <p>
                  <div class="control-group">
                    <label class="control-label">
                      Kategori<span class="required">*</span>
                    </label>
                      <div class="controls">
                        <select class="required large" name="panel_penilai_kategori_id">
                          <option>- Sila Pilih -</option>
                          <?php if(!empty($senarai_panel1)) : foreach ($senarai_panel1 as $rec) : ?>
                                                <option value="<?php echo $rec->panel_penilai_kategori_id; ?>"><?php echo set_value('kategori', $rec->kategori); ?></option>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                      </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">
                      Nama<span class="required">*</span>
                    </label>
                      <div class="controls"><?php echo form_input(array('name' => 'nama_penilai1', 'value' => set_value('nama_penilai', $this->session->userdata('nama_penilai')), 'class' => 'large required')); ?>
                      <font color="red"><?php echo form_error('nama_penilai'); ?></font>
                      </div>
                  </div> 
                  <div class="control-group">
                    <label class="control-label">
                      Nama Syarikat<span class="required">*</span>
                    </label>
                      <div class="controls"><?php echo form_input(array('name' => 'nama_syarikat1', 'value' => set_value('nama_syarikat', $this->session->userdata('nama_syarikat')), 'class' => 'large required')); ?>
                        <font color="red"><?php echo form_error('nama_syarikat'); ?></font>
                      </div>
                  </div>                   
                    <div class="control-group">
                      <label class="control-label">
                        E-mel<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'emel', 'value' => set_value('email', $this->session->userdata('email')), 'class' => 'large required')); ?>
                        <font color="red"><?php echo form_error('email'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        No. Telefon Pejabat<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'notel_pej', 'value' => set_value('no_tel_pej', $this->session->userdata('no_tel_pej')), 'class' => 'large required')); ?>
                        <font color="red"><?php echo form_error('no_tel_pej'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        No. Telefon Bimbit<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'notel_bimbit', 'value' => set_value('no_tel_bimbit', $this->session->userdata('no_tel_bimbit')), 'class' => 'large required')); ?>
                        <font color="red"><?php echo form_error('no_tel_bimbit'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Jawatan<span class="required">*</span>
                      </label>
                      <div class="controls"><?php echo form_input(array('name' => 'jawatan1', 'value' => set_value('jawatan', $this->session->userdata('jawatan')), 'class' => 'large required')); ?>
                        <font color="red"><?php echo form_error('jawatan'); ?></font>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Surat Lantikan<span class="required">*</span>
                      </label>
                      <div class="controls">
                        <font color="red"><?php echo form_error('nama_penilai'); ?></font>
                      </div>
                    </div>                          
                </form>
              </p>  
            </div>
            <!--button-->
          <div class="modal-footer">
                <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <input type="submit" value="Simpan Deraf" class="btn btn-warning2">            
            </div>
            <!--/.END button-->
        </div>
    <!--/.END popup--> 

          
          <!--panel 3--> 
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Komunikasi Bagi Aktiviti Penerimaan Dan Pendaftaran Aset
                  </div>
                </div>
               <div class="widget-body">
                  <form class="form-horizontal no-margin">     
                    <div class="control-group">
                      <label>Tugas Dan Pegawai Atasan Yang Ada Kaitan &nbsp;&nbsp;&nbsp;
                      <input class="input-xxlarge" type="text" /></label>
                    </div>
                    <div class="control-group">
                      <label>Tanggungjawab Dan Kuasa Yang Diberikan &nbsp;&nbsp;&nbsp;&nbsp;
                      <input class="input-xxlarge" type="text" ></label>
                    </div>
                    <div class="control-group">
                      <label>Tugas Pegawai-Pegawai Lain Yang Ada Kaitan&nbsp;
                        <input class="input-xxlarge" type="text" >
                      </label>
                     </div>                  
                  </form>
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 3--> 

   				      <!--buttons--> 
                <div class="widget-body" align="right">
                    <button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button>
                  <a href="<?php echo site_url('ptra/kandungan_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>
                  <a href="<?php echo site_url('ptra/treeview_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Seterusnya
                  </button></a>
                </div> 
                <!--/.END buttons-->       
      </div>  
      <!--/.END main-container--> 
      </form></p>
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->