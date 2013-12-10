<!--breadcrumb-->
<?php  
$countCopy = 1;
$sessionarray = $this->session->all_userdata();
  $attributes = array(
                      'class' => 'form-horizontal no-margin', 
                      'name'  => 'senarai_ppd_ptra',
                      'id'    => 'senarai_ppd_ptra',
                     );
                
                echo form_open('ptra/senarai_ppd_ptra/'.$this->uri->segment(3) ,$attributes); ?>
        
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
     
    <!--breadcrumb-->
         <!--start panel Senarai -->
         <div class="clearfix"></div>
         <?php if(!empty($tab)) { echo $tab;} ?>
          <!--START panel 2-->
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Pelan Penerimaan Aset (PTRA)
                  </div>
                </div>
                <!--table section-->
                <div  class="widget-body">
                    <?php  if($this->aauth->get_session('user_noti')!='wysiwyg')
                {?><ul class="icomoon-icons-container">
                    <a href="<?php echo site_url('ptra/status_premis_ptra/'.$this->uri->segment(3)) ?>"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                    </li></a>
                  </ul><label class="tambah">Tambah PTRA</label>
                  
                   <?php } ?>
                  <div class="clearfix"></div>
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                                            <thead>
                        <tr>
                          <th style="width:4%">Bil</th>
                          <th style="width:6%">Tahun</th>
                          <th style="width:15%" class="hidden-phone">Kementerian</th>
                          <th style="width:15%" class="hidden-phone">Jabatan/Agensi</th>
                          <th style="width:15%" class="hidden-phone">Premis</th>
                          <th style="width:15%" class="hidden-phone">Pemilik Dokumen</th>
                          <th style="width:6%">Tarikh Sedia</th>
                          <th style="width:7%" class="hidden-phone">Status</th>
                          <th style="width:8%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                     <tbody>
                            <?php $i=1; if(!empty($senarai_ptra)) : foreach ($senarai_ptra as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
							<?php  $get_status = $this->function_model->get_status_pelantahunan($rec->pspa_id,$rec->ptra_id,4); 
									if ($sessionarray ['user_rolegroupid'] != 8 && $get_status == 'Deraf'){}else { ?>
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php if($rec->tahun==0){ echo "-"; }else{ echo $rec->tahun; } ?></td>
                                <td><?php if($get_namakem = $this->ptra_model->get_namakem($rec->idkem)) foreach ($get_namakem as $rr) echo $rr->namakem;?></td>
                                <td><?php if($get_namajab_agensi = $this->ptra_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr) echo $rr->nama_jab_agensi;?></td>
								<td><?php if($rec->nama_premis==''&& $rec->nodpa==''){ echo "-";} else{ echo $rec->nama_premis.'( '.$rec->nodpa.' )'; } ?></td>
                                <td><?php echo $rec->nama_user; ?></td>
                                <td><?php echo $rec->ptra_tarikh_sedia; ?></td>
                                <td><a href="#myModal<?php echo $rec->ptra_id ?>" data-toggle="modal" data-original-title="Klik disini bagi memaparkan sejarah status" data-placement="top">
                                <span class="badge badge-info"><?php echo $get_status;?></span></a>
								<br/>
								<?php if(($rec->tahun==0)&& $rec->nama_premis=='' && $rec->nodpa=='' ){ ?>
									<span class="badge badge-important">Salinan</span>
									<?php } ?>
								</td>
                        <td align="center">
                                    
                    <?php
                         

                    if($sessionarray ['user_rolegroupid'] == 3)
                    {
                      echo ''?><ul class="icomoon-icons-container">
                                  <a href="<?php echo site_url('ptra/summary_pp_ptra/'.$this->uri->segment(3).'/'.$rec->ptra_id)?>">
                                    <li class="rounded">
                                      <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                      </span>
                                    </li>
                                  </a>
                                </ul>
                    <?php  ; } 



                    else if($sessionarray ['user_rolegroupid'] == 4)
                    {
                      echo ''?><ul class="icomoon-icons-container">
                                  <a href="<?php echo site_url('ptra/summary_ptf_ptra/'.$this->uri->segment(3).'/'.$rec->ptra_id)?>">
                                    <li class="rounded">
                                      <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                      </span>
                                    </li>
                                  </a>
                                </ul>
                    <?php ; } 

                    

                    else if($sessionarray ['user_rolegroupid'] == 6)
                    {
                      echo ''?><ul class="icomoon-icons-container">
                                  <a href="<?php echo site_url('ptra/summary_ptf_ptra/'.$this->uri->segment(3).'/'.$rec->ptra_id)?>">
                                    <li class="rounded">
                                      <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                      </span>
                                    </li>
                                  </a>
                                </ul>
                    <?php ; } 



                    else if($sessionarray ['user_rolegroupid'] == 8)
                    {
                      ?><ul class="icomoon-icons-container">
						<?php if(($rec->tahun==0)&& $rec->nama_premis=='' && $rec->nodpa=='' ){ ?>
								<a href="<?php echo site_url('ptra/status_premis_ptra_copy/'.$this->uri->segment(3).'/'.$rec->ptra_id)?>">
								<li class="rounded">
								  <span class="fs1" data-icon="&#xe026" aria-hidden="true">
								  </span>
								</li>
							  </a>
							  
					    <?php } else {?>
							  <a href="<?php echo site_url('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$rec->ptra_id)?>">
								<li class="rounded">
								  <span class="fs1" data-icon="&#xe026" aria-hidden="true">
								  </span>
								</li>
							  </a>
							  <?php
						}
									/*
										function of copy : 
										available for user ppd sahaja 
										& pnpa y lulus 
										& leh d lihat melalui notifikasi
									*/
																	
									if($this->aauth->get_session('user_noti')!='wysiwyg' && $get_status == 'Lulus')
									//if($get_status == 'Lulus')
									{
										
										?>
										<a href="#copy<?php echo $countCopy;?>" title="Salin rekod ini?"  data-toggle="modal" id="<?php echo $rec->ptra_id;?>"  >
											<li class="rounded">
											  <span class="fs1" data-icon="&#xe02c" aria-hidden="true"></span>
											</li>
										</a>
										<?php //for modal ?>
										<div id="copy<?php echo $countCopy;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										 <div class="modal-header">
										 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
										 <h4 id="myModalLabel">Mesej Pengesahan</h4></div>
										 <div class="modal-body"><p>Adakah anda ingin membuat salinan rekod ini? </p></div>

										  <div class="modal-footer">
										<?php
											$batal = array(
											   'name'    => '',
											   'id'      => '',
											   'class'   => 'btn btn-danger input-top-margin',
											   'value'   => '',
											   'type'    => 'button',
											   'content' => 'Tidak',
											   'data-dismiss'=>'modal'
											);

											echo form_button($batal);

											?>
											<?php
											$lulus= array(
											   'name'    => '',
											   'id'      => '',
											   'class'   => 'btn btn-info',
											   'value'   => '',
											   'type'    => 'button',
											   'content' => 'Ya'
											);

											echo '<a href="'.site_url('ptra/copyborang/'.$this->uri->segment(3).'/'.$rec->ptra_id).'">'.form_button($lulus)."</a>";

										?>                       
										</div>
										</div>
										<?php  
										$countCopy++;
									} 
								?>
                                </ul>
                    <?php  } 
                    
                     else if($sessionarray ['user_rolegroupid'] == 7)
                    {
                      echo ''?><ul class="icomoon-icons-container">
                                  <a href="<?php echo site_url('ptra/summary_ptf_ptra/'.$this->uri->segment(3).'/'.$rec->ptra_id)?>">
                                    <li class="rounded">
                                      <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                                      </span>
                                    </li>
                                  </a>
                                </ul>
                    <?php ; } 



                    ?></td>
                            </tr>
                            <?php echo form_close(); ?>
                           <?php //endif; ?>   <?php } endforeach; ?>
                            <?php endif; ?>
                          
                        </tbody>
                    </table>
                    <!--END table-->
                    <div class="clearfix">
                    </div>
                    
                  </div>
                </div>
                </div>
                </div> 
                </div>  
</div>
               <!--end div tab -->
                </div>  
               
<!--start model sejarah status -->
 <?php if(!empty($senarai_ptra)) : foreach ($senarai_ptra as $rec) :?>
  <div id="myModal<?php echo $rec->ptra_id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sejarah Status PTRA
                      </h4>
                    </div>
                   
                    <div class="modal-body">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left">
                            <tr>
                                <td>Bil</td>
                                <td>Status</td>
                                <td>Tarikh Status</td>
                                <td>Kategori</td>
                                <td>Dari</td>
                                <td>Ulasan</td>
                            </tr>
                            <?php  $i=1; if($getSts = $this->ptra_model->get_senarai_status($this->uri->segment(3),2,$rec->ptra_id))  :foreach ($getSts as $rr) :?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $rr->nama_status; ?></td>
                                <td><?php echo $rr->status_tarikh; ?></td>
                                <td><?php if($getSta = $this->ptra_model->get_namakategoristatus($rr->kump_kand_id))  :foreach ($getSta as $rq): ?><?php echo $rq->kump_kand_kod; ?><?php endforeach; ?>
                             <?php endif; ?></td>
                                <td><?php echo $rr->nama_user; ?></td>
                                <td><?php echo $rr->status_ulasan; ?></td>
                                
                            </tr>
                            <?php endforeach; ?>
                             <?php endif; ?>
                        </table>
                        
                    </div>
                  
                   
                  </div>
                 <?php endforeach; ?>
                   <?php endif; ?>
<!-- end modal -->


         