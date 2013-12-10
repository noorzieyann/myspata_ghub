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
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <p>
        <form action='model_struktur_ptra' method='post'>
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
                  <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='no' >
      
         <div class="widget-body">
          <!--start div row ptf n pif -->
          
                <div class="row-fluid">
                <!--start div panel ptf -->
                <div class="span6">
                    <div class="widget">
                	<div class="widget-header">
                            <div class="title">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PTF</div>
                        </div>
                    <div class="widget-body">
                            <?php if(!empty($senarai_ptf)) : foreach ($senarai_ptf as $rec) : ?>
                                 <div class="control-group">
                                    <label class="checkbox">
                                        <?php echo form_error('ptf[]'); ?>
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
                                          <?php echo form_error('pif[]'); ?>
                                     <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pif[]" >
                                     <?php echo $rec->nama; ?>
                                    </label>
                                    </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <!--end div panel pif -->
                </div>
          <!--end div row ptf n pif -->
          
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
                                      <?php echo form_error('pdf[]'); ?>
                                 <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pdf[]" >
                                 <?php echo $rec->nama; ?>
                                </label>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                    </div>
            	  </div>
                </div>
                <!--end div panel pif -->

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
                                      <?php echo form_error('pof[]'); ?>
                                 <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pof[]" >
                                 <?php echo $rec->nama; ?>
                                </label>
                                </div>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <!--end div panel pif -->
                </div>
              <!--end div row pdf n pof -->
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
                            <?php $i=1; if(!empty($senarai_panel)) : foreach ($senarai_panel as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo form_error('panel_penilai[]'); ?><input type="checkbox" value="<?php echo set_value('panel_penilai[]',$rec->utiliti_sumber_man_id); ?>" name='panel_penilai[]' ></td>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php if($get_nama_panelpenilai2 = $this->ptra_model->get_nama_panelpenilai($rec->disiplin_bidang_id)) foreach ($get_nama_panelpenilai2 as $rr) echo $rr->bidang;?></td>
                                <td><?php echo $rec->nama; ?></td>
                                <td><?php if($get_nama_panelpenilai = $this->ptra_model->get_syarikat($rec->syarikat_id)) foreach ($get_nama_panelpenilai as $rr) echo $rr->nama_syarikat; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container"><li class="rounded">
                                      <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                                        </ul><a href="download">Surat Lantikan.docx</a>
                                </td>
                                <td align="center"><ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php base_url(); ?>kemaskinipanel_penilai/<?php echo $rec->utiliti_sumber_man_id; ?>"></a>
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
                      
                    <div class="control-group">
                     <font color="red"><?php echo form_error('pegawaikaitan'); ?></font> 
                     <label>Tugas Dan Pegawai Atasan Yang Ada Kaitan &nbsp;&nbsp;&nbsp;
                      <?php echo form_input(array('name' => 'pegawaikaitan', 'value' => set_value('pegawaikaitan', $this->session->userdata('pegawaikaitan')), 'class' => 'xxlarge')); ?>
                         </label>
                    </div>
                    <div class="control-group">
                     <font color="red"><?php echo form_error('tjawabdankuasa'); ?></font>  
                     <label>Tanggungjawab Dan Kuasa Yang Diberikan &nbsp;&nbsp;&nbsp;&nbsp;
                      <?php echo form_input(array('name' => 'tjawabdankuasa', 'value' => set_value('tjawabdankuasa', $this->session->userdata('tjawabdankuasa')), 'class' => 'xxlarge')); ?>
                     </label>
                    </div>
                    <div class="control-group">
                      <font color="red"><?php echo form_error('pegawailain'); ?></font> 
                      <label>Tugas Pegawai-Pegawai Lain Yang Ada Kaitan&nbsp;
                       <?php echo form_input(array('name' => 'pegawailain', 'value' => set_value('pegawailain', $this->session->userdata('pegawailain')), 'class' => 'xxlarge')); ?>
                      </label>
                     </div>
                  </div>                  
                  
               </div>
              </div>
            </div>
          <!--/.END panel 3--> 
                
                <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='ptra_id'/>
   		<!--buttons--> 
                <div class="widget-body" align="right">
                    <button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button>
                  <a href="<?php echo site_url('ptra/kandungan_ptra/'.$this->uri->segment(3)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>
                  <input type="submit" value="Seterusnya" class="btn btn-primary">
                </div> 
                <!--/.END buttons-->  
      
      </div>  
      <!--/.END main-container--> 
      </form>
    </p>
    </div> 
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->
    
    
    <!--popup-->
      <form id="" class="" action="tambahpanel" method="post"> 
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Tambah Panel Penilai Teknikal
                      </h4>
                      </div>
                      <!--start div modal body -->
                       <div class="modal-body">
                             <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='no' >
                                <table width="95%" border="0" align="center">
                                            
                                           <tr>
                                               <td width="17%" valign="top"><label class="control-label">Nama<span class="required">*</span></label></td>
                                                  <td> <div class=""><?php echo form_input(array('name' => 'nama', 'value' => set_value('nama', $this->session->userdata('nama')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nama'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                 
                                                <tr>
                                                <td width="19%" valign="top" height="50"><label class="control-label">Nama Syarikat<span class="required"></span></label></td>
                                                <td width="33%">
                                                    <div class=""><select class="required large" name="syarikat_id">
                                                        <option value="">- Sila Pilih -
                                                        <?php if(!empty($syarikat)) : foreach ($syarikat as $rec) : ?>
                                                        <option value="<?php echo $rec->syarikat_id; ?>"><?php echo set_value('nama_syarikat', $rec->nama_syarikat); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                                    </div><br>
                                                </td>
                                            </tr>
                                                
                                                 <tr>
                                                   <td width="17%" valign="top"><label class="control-label">No Kad Pengenalan<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'noic', 'value' => set_value('noic', $this->session->userdata('noic')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('noic'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                            <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Jawatan<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'jawatan', 'value' => set_value('jawatan', $this->session->userdata('jawatan')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('jawatan'); ?></font>
                                                        </div><br>
                                                  </td>
                                             </tr>
                                               
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Disiplin/Bidang<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class=""><select class="required large" name="disiplin">
                                                        <option value="">- Sila Pilih -</option>
                                                        <?php if(!empty($disiplin)) : foreach ($disiplin as $rec) : ?>
                                                        <option value="<?php echo $rec->panel_penilai_kategori_id; ?>"><?php echo set_value('kategori', $rec->kategori); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                                    </div><br>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                   <td width="17%" valign="top"><label class="control-label">Gaji<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'gaji', 'value' => set_value('gaji', $this->session->userdata('gaji')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('gaji'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Kos Lebih Masa<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'koslebihmasa', 'value' => set_value('koslebihmasa', $this->session->userdata('koslebihmasa')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('koslebihmasa'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                                <input type="hidden" name="sumber_id" value="2"> <input type="hidden" name="peranan" value="10">
                                                       
                                </table>
                                   
                              
                          
                          </div><!--end div modal body -->
                         
                               <div class="modal-footer">
                                <input type="submit" value="Simpan" class="btn btn-warning2">
                              
                             </div>
                 
               <!--end div tab -->
                </div> 
             </form>
    <!--/.END popup--> 