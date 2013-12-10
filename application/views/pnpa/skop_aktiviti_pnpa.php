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
    <div class="clearfix"></div>
      <br/>
    <!--breadcrumb-->
    <?php if(!empty($tab)) { echo $tab;} ?>
        <?php 
  $form_name = 'pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
  if($this->uri->segment(5) != NULL){$form_name = 'pnpa/skop_aktiviti_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
  $attributes = array('class' => 'form-horizontal no-margin', 'id' => 'skop_aktiviti_pnpa');
  echo form_open($form_name, $attributes);
?>

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
                        
                       <?php if($getSko = $this->pnpa_model->get_lkpskop($this->uri->segment(4)))  :foreach ($getSko as $rr) :?> 
                        <tr>
                        <td><span class="name"><?php echo $i++; ?></span></td>
                        <td class="hidden-phone"> <?php echo $rr->skop_aktvt_tajuk;?></td>
                        
                        <?php   $loop_aktvt_cnt=0;
                                if($getSko = $this->pnpa_model->get_lkpskopaktiviti($rr->skop_aktvt_id, $this->uri->segment(4)))  :foreach ($getSko as $rrr) :
                                if($loop_aktvt_cnt >0 ):?>
                        </tr><tr><td></td><td></td>
                        <?php endif; $loop_aktvt_cnt = $loop_aktvt_cnt+1;?>
                        
                        <td class="hidden-phone"> <?php echo $rrr->skop_aktvt_tajuk;?></td>
                        
                       <?php $cnt=$this->pnpa_model->get_lkpskopbutiran_count($rr->skop_aktvt_id);
                          $loop_cnt=0;?>
                        
                         <?php if($getSko = $this->pnpa_model->get_lkpskopbutiran($rrr->skop_aktvt_id,  $this->uri->segment(4)))  :foreach ($getSko as $rrq) :?>
                         <td class="hidden-phone"> <?php $a=$rrq->skop_aktvt_tajuk; echo $a;?></td> 
                       
                        <td class="hidden-phone"><?php $bajet_akt = $this->pnpa_model->cal_bajet_skop($this->uri->segment(4),$rrq->skop_aktvt_id); echo $bajet_akt; ?></td>
                        <td class="hidden-phone"><span class="badge badge-success"><?php if($bajet_akt>0){ echo "Lengkap"; }else{ echo "Tidak Lengkap"; } ?></span></td>
                        <td class="hidden-phone"><a href="<?php echo site_url()?>/pnpa/skop_aktiviti2_pnpa/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php  echo $rrq->skop_aktvt_id; ?>">
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
                     
                      <?php //endforeach; ?>
                      <?php //endif; ?>
                    </tbody>
                  </table>
                  <br>
                  
                   <!--end div paging--> 
                 <label>&nbsp;&nbsp;&nbsp; 
                   Jumlah Bajet Aktiviti (RM)
<?php $pnpaID = $this->uri->segment(4); ?>
					<input type="text" class="input-large required" disabled="disabled"  placeholder="" value="<?php echo $this->pnpa_model->cal_bajet($pnpaID) ?>" readonly /></label>
          <!--end panel skop --> 
          </div>
          </div>
          </div>
          </div>
          
          <!--start div button --> 
          <div align="right">
            		<a href="<?php echo site_url('pnpa/senarai_ppd_pnpa/'.$this->uri->segment(3))?>"><button class="btn btn-danger input-top-margin" type="button">
                                            Batal</button></a>
                     <a href="<?php echo site_url('pnpa/treeview_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.'edit') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Sebelum
                      </button></a>
                      <a href="<?php echo site_url('pnpa/kawalan_rekod_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Seterusnya
                      </button></a>
                      <a type="button" class="btn btn-warning2" href="#simpan" data-toggle="modal">Simpan Deraf</a>  
        			</div><!--end div button--> 
         <!--end div tab -->
                </div>  
                </div>

             
              <!--end widget-body -->
              
    <!-- modal untuk pengesahan -->           
<div id="simpan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
<h4 id="myModalLabel">Mesej Pengesahan</h4></div>
<div class="modal-body"><p>Adakah anda ingin menyimpan deraf PNPA ini?</p></div>
  <!--button-->
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
    echo form_submit('hantar', 'Simpan Deraf','class="btn btn-primary"');
  ?>
                   
  </div>
    <!--/.END button-->
</div>
              
              
              
  <?php echo form_close(); ?>
<?php 
 //session_start(); 
 //print_r($_SESSION);
 ?> 