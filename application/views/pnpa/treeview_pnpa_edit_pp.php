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
         <div class="tab-content" id="myTabContent">
         <div id="home" class="tab-pane fade active in">
         <p> 
         <form action='<?php echo site_url(); ?>/pnpa/treeview_pnpa_edit_pp/<?php echo $this->uri->segment(3); ?>' method='post'>
           
           
             <div class="row-fluid">
        <div class="span12">
              <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Skop Dan Aktiviti Penilaian Aset
                </div>
                </div>
                <div class="widget-body">
                
                    
                    <?php if(!empty($senarai_skop)) : foreach ($senarai_skop as $rec) : ?>
                    <label class="checkbox">
                    <?php //echo form_error('skop[]'); ?>
                    <input type="checkbox" value="<?php echo set_value('skop[]',$rec->skop_aktvt_id); ?>" name="skop[]" >
                    <?php echo $rec->skop_aktvt_tajuk; ?></label>
                  
                    <label class="control-label_treeview">Keterangan
                    <textarea name="keterangan" style="height: 80px; width:800px"  placeholder=""></textarea></label>
                    
                    <?php //if(!empty($senarai_aktiviti)) : foreach ($senarai_aktiviti as $a) : ?>
                    
                    <?php if($getKem = $this->pnpa_model->get_aktiviti($rec->skop_aktvt_id)) :foreach ($getKem as $rr) : ?>
                   <label class="checkbox checkbox3">
                   <?php //echo form_error('aktiviti[]');?>
                   <input type="checkbox" value="<?php echo set_value('aktivit[]',$rr->skop_aktvt_id); ?>" name="aktiviti[]" >
                   <?php echo $rr->skop_aktvt_tajuk; ?>
                   </label>
                    
                   <?php //if($getKem = $this->pnpa_model->get_aktiviti($rec->skop_aktvt_id)) foreach ($getKem as $rr) echo $rr->skop_aktvt_tajuk;?>
                    <?php if($getKem = $this->pnpa_model->get_butiran($rr->skop_aktvt_id)) :foreach ($getKem as $rrr) : ?>
                   <label class="checkbox checkbox4">
                   <?php //echo form_error('butiran[]');?>
                   <input type="checkbox" value="<?php echo set_value('butiran[]',$rrr->skop_aktvt_id); ?>" name="butiran[]" >
                   <?php echo $rrr->skop_aktvt_tajuk; ?>
                   </label>
                    
                  <?php endforeach; ?>
                    <?php endif; ?>
                    
                   <?php endforeach; ?>
                    <?php endif; ?>
                    <br/>
                    <?php endforeach; ?>
                    <?php endif; ?>
                   <input type='hidden' value='<?php echo $this->uri->segment(4); ?>' name='pnpa_id' >
                   <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='no' >
                </div>
               </div>
               </div>
               </div>
           
             <!--start div button -->
                <div align="right">
                <a href="<?php echo site_url('pnpa/summary_pp_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Kembali
                  </button></a>
         </div>
                <!--end div button -->
                
             </form>       
            </div>
            </div>
            </div>
          