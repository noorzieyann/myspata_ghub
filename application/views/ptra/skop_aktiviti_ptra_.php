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
        <!--panel 1-->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Skop Dan Aktiviti PTRA
                </div>
              </div>
              	<!--table section-->            	
                <div class="widget-body">                 
                  <!--table-->
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
                                if($loop_aktvt_cnt >0 ):?>
                        </tr><tr><td></td><td></td>
                        <?php endif; $loop_aktvt_cnt = $loop_aktvt_cnt+1;?>
                        
                        <td class="hidden-phone"> <?php echo $rrr->skop_aktvt_tajuk;?></td>
                        
                       <?php $cnt=$this->ptra_model->get_lkpskopbutiran_count($rr->skop_aktvt_id);
                          $loop_cnt=0;?>
                        
                         <?php if($getSko = $this->ptra_model->get_lkpskopbutiran($rrr->skop_aktvt_id,  $this->uri->segment(4)))  :foreach ($getSko as $rrq) :?>
                         <td class="hidden-phone"> <?php $a=$rrq->skop_aktvt_tajuk; echo $a;?></td> 
                       
                        <td class="hidden-phone"><?php $bajet_akt = $this->ptra_model->cal_bajet_skop($this->uri->segment(4),$rrq->skop_aktvt_id); echo $bajet_akt; ?></td>
                        <td class="hidden-phone"><span class="badge badge-success"><?php if($bajet_akt>0){ echo "Lengkap"; }else{ echo "Tidak Lengkap"; } ?></span></td>
                        <td class="hidden-phone"><a href="<?php echo site_url()?>/ptra/skop_aktiviti2_ptra/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php  echo $rrq->skop_aktvt_id; ?>">
                           <ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li></ul></a></td>
                      </tr>
                      
                            <?php if($loop_cnt < $cnt):?>
                            <tr><td></td><td></td><td></td><?php endif; ?>

                            <?php 
                                $loop_cnt= $loop_cnt +1;
                                endforeach;
                                $cnt=0;
                            ?><?php endif; ?>
                          
                       <?php endforeach; ?><?php endif; ?>
                     
                       <?php endforeach; ?><?php endif; ?>
                        
                    </tbody>
                  </table>
                  <br>
                  
                   <!--end div paging--> 
                 <label>&nbsp;&nbsp;&nbsp; 
                   Jumlah Bajet Aktiviti (RM)
<?php $ptraID = $this->uri->segment(4); ?>
					<input type="text" class="input-large required" disabled="disabled"  placeholder="" value="<?php echo $this->ptra_model->cal_bajet($ptraID); ?>" readonly /></label>
					<!--end panel skop --> 
                     </div>                     
                  </div>  
                  <!--/.END-->                    
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 1-->
	  </div>
      			    <!--buttons--> 
                <div class="widget-body" align="right">
                    <button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button>
                  <a href="<?php echo site_url('ptra/treeview_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.'edit') ?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>
                  <a href="<?php echo site_url('ptra/kawalan_rekod_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                    Seterusnya
                  </button></a>
                </div> 
                <!--/.END buttons-->   
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->