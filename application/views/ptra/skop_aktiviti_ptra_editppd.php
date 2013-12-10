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
     
	 <?php if(!empty($tab)) { echo $tab;} ?>

           <!--start div panel skop --> 
           <div class="row-fluid">
				    <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Skop dan Aktiviti PNPA
                  </div>
                </div>
                <div class="widget-body">
                  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th width="3%" style="width:3%">Bil</th>
                        <th width="20%" class="hidden-phone" style="width:20%">Skop</th>
                        <th width="15%" class="hidden-phone" style="width:15%">Aktiviti</th>
                        <th width="15%" class="hidden-phone" style="width:15%">Butiran Aktiviti</th>
                        <th width="15%" class="hidden-phone" style="width:15%">Bajet Aktiviti (RM)</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Status</th>
                        <th width="10%" class="hidden-phone" style="width:10%">Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; //if(!empty($skop)) : foreach ($skop as $rec) : ?>
                        <?php //echo form_open('admin/update'); ?>
                        
                       <?php if($getSko = $this->ptra_model->get_lkpskop($this->uri->segment(4)))  :foreach ($getSko as $rr) :?> 
							<tr>
								<td><span class="name"><?php echo $i++; ?></span></td>
								<td class="hidden-phone"> <?php echo $rr->skop_aktvt_tajuk;?></td>
								
								<?php   $loop_aktvt_cnt=0;
										if($getSko = $this->ptra_model->get_lkpskopaktiviti($rr->skop_aktvt_id, $this->uri->segment(4)))  :foreach ($getSko as $rrr) :
											if($loop_aktvt_cnt >0 ):
								?>
							</tr>
							<tr><td></td><td></td>
								<?php 		endif; 
										$loop_aktvt_cnt++;
								?>
								<td class="hidden-phone"> <?php echo $rrr->skop_aktvt_tajuk;?></td>
								<?php 
										$cnt=$this->ptra_model->get_lkpskopbutiran_count($rr->skop_aktvt_id);
										$loop_cnt=0;
										
										if($getSko = $this->ptra_model->get_lkpskopbutiran($rrr->skop_aktvt_id,  $this->uri->segment(4)))  :foreach ($getSko as $rrq) :
								?>
								<td class="hidden-phone"> <?php $a=$rrq->skop_aktvt_tajuk; echo $a;?></td> 
						   
								<td class="hidden-phone"><?php $bajet_akt = $this->ptra_model->cal_bajet_skop($this->uri->segment(4),$rrq->skop_aktvt_id); echo $bajet_akt; ?></td>
								<td class="hidden-phone"><span class="badge badge-success"><?php if($bajet_akt>0){ echo "Lengkap"; }else{ echo "Tidak Lengkap"; } ?></span></td>
								<td class="hidden-phone"><a href="<?php echo site_url()?>/ptra/skop_aktiviti2_ptra_editppd/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php  echo $rrq->skop_aktvt_id; ?>">
							   <ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li></ul></a></td>
							</tr>
                      
                            <?php if($loop_cnt < $cnt):?>
							<tr><td></td><td></td><td></td><?php endif; ?>

                            <?php 
                                $loop_cnt++;
                                endforeach;
                                $cnt=0;
                            ?><?php endif; ?>
                          
                       <?php endforeach; ?><?php endif; ?>
                     
                       <?php endforeach; ?><?php endif; ?>
                     
                      <?php //endforeach; ?>
                      <?php //endif; ?>
                    </tbody>
                  </table>
                  <br>
                  
                   <!--end div paging--> 
                 <label>&nbsp;&nbsp;&nbsp; 
                   Jumlah Bajet Aktiviti (RM)
<?php $ptraID = $this->uri->segment(4); ?>
					<input type="text" class="input-large required" disabled="disabled" placeholder="" value="<?php echo $this->ptra_model->cal_bajet($ptraID) ?>"/></label>

          <!--end panel skop --> 
          </div>
          </div>
          </div>
          </div>
          
          <!--start div button -->
                <div align="right">
                <a href="<?php echo site_url('ptra/treeview_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.'edit') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Sebelum
                      </button></a>
                     <a href="<?php echo site_url('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-warning2 input-top-margin" type="button">
                        Simpan
                      </button></a>
               		   </div>
                     <!--end div button -->
                
         <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>