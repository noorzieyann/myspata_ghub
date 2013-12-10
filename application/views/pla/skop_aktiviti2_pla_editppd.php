<style >
    .ui-datepicker 
    {
      top: 700px !important;
     
   }
</style><!--breadcrumb-->
 
 <script type="text/javascript">

function handleChange(test,option) {

var strcb,strcb_length,strcb_find,strcb_new;


	
if (test.checked == true) { 
	strcb = test.value;
	strcb_length = strcb.length;
	strcb_find = strcb.search('cb');
	strcb_new = strcb.substring(parseInt(strcb_find)+2,parseInt(strcb_length));
    txttotal.value = (parseFloat(txttotal.value) + parseFloat(strcb_new)).toFixed(2); 
}
else {

	strcb = test.value;
	strcb_length = strcb.length;
	strcb_find = strcb.search('cb');
	strcb_new = strcb.substring(parseInt(strcb_find)+2,parseInt(strcb_length));
	
	txttotal.value = (parseFloat(txttotal.value) - parseFloat(strcb_new)).toFixed(2);
	
	

}

}

   </script>
   
<?php

$sessionarray = $this->session->all_userdata();
//$kand_id = array();
//$kand_detail = array();

$check_row = NULL;

if($this->uri->segment(5) != NULL){
	if(count($this->skopaktiviti_model->get_skop_from_segment2($this->uri->segment(4),$this->uri->segment(5),'pla')) == 0){
		$check_row = 0;
                $pihakkaitan='';
                $tjawab='';
                $tarikh_mula='';
                $tarikh_akhir='';
                $catatan='';
                $objek='';
                $bajet_aktvt='';
                $sumber='';
                $output='';


	}else{
		
		$check_row = 1;
		
		foreach($this->skopaktiviti_model->get_skop_from_segment2($this->uri->segment(4),$this->uri->segment(5),'pla') as $row){

			$pla_id=$row->pla_id;
			$skop_aktvt_id=$row->skop_aktvt_id;
			$pihakkaitan=$row->f10_1b1c_pihak_berkaitan;
			$tjawab=$row->f10_1b1c_tanggungjawab;
			$tarikh_mula=$row->f10_1b1c_tarikh_mula;
			$tarikh_akhir=$row->f10_1b1c_tarikh_tamat;
			$catatan=$row->catatan;
			$objek=$row->objek_sebagai_id;
			$bajet_aktvt=$row->bajet_aktvt;
			$sumber=$row->sumber_id;
			$output=$row->output;
		}
		
	}
	
	

}

?>

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
                        PLA
                      </a>   
                    </li>
                  </ul>
    </div>
	<br/>   
    <!--END breadcrumb-->
     <?php if(!empty($tab)) { echo $tab;} ?>
    <!--breadcrumb-->
    <?php 
	$form_name ='pla/skop_aktiviti2_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);
	
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'skop_aktiviti2_pla_editppd');
	echo form_open($form_name, $attributes);
    ?>
    <?php 

	$sunting = array('sunting'=>NULL);
	if($this->uri->segment(3) != NULL){
		$sunting = array('sunting'=>$this->uri->segment(4));
		
	}
	
	echo form_hidden($sunting);
	echo form_hidden('cek_row',$check_row);

    ?>
    <?php echo validation_errors(); ?>
    
             <div class="row-fluid">
		<div class="span12">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span>  Sila Kemaskini Maklumat Berikut
                </div>
                </div>
                <div class="widget-body">

           <!--start div panel skop -->   
          	<div class="row-fluid">
		<div class="span12">
             	<div class="widget">
                <div class="widget-body">
                    
                  
					<?php if($getSko = $this->skopaktiviti_model->get_lkpskopbutiran_1( $this->uri->segment(4),  $this->uri->segment(5),'pla')):
							foreach ($getSko as $rrq) :?>
                   
					<?php if($getSko = $this->skopaktiviti_model->get_lkpskopaktiviti_1( $this->uri->segment(4), $rrq->skop_aktvt_sort, 'pla')):
							foreach ($getSko as $rr) :?>
                   
					<?php 	endforeach; ?>
					<?php endif; ?>
                     
                    <div class="control-group">
                      <label class="control-label">Butiran Aktiviti
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text" value="<?php echo $rrq->skop_aktvt_tajuk;?>" disabled>
                      </div></div>
                      <?php endforeach; ?><?php endif; ?>
                   
                   
                   
                 
              </div>
               </div>
               </div>
               </div><!--end panel skop --> 
            

             <!-- start panel skop2-->
                <div class="row-fluid">
		<div class="span12">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Skop dan Aktiviti Penilaian Aset
                </div>
                </div>
                <div class="widget-body">
                    <input type="hidden" value="<?php echo $this->uri->segment(4)?>" name="rekodid"> 
                    <input type="hidden" value="<?php echo $this->uri->segment(4)?>" name="no"> 
                     <input type="hidden" value="<?php echo $this->uri->segment(5)?>" name="skop_aktvt_id"> 
                    <div class="control-group">
                      <label class="control-label">Pihak Berkaitan
                      </label>
                      <div class="controls">
                          <?php
                            if($this->input->post('pihakkaitan') !=NULL){
                                    $pihakkaitan = $this->input->post('pihakkaitan');
                            }
                       ?> 
                        <?php echo form_input(array('name' => 'pihakkaitan', 'value' => $pihakkaitan, 'class' => 'input-xxlarge required')); ?>
                         <font color="red"><?php echo form_error('pihakkaitan'); ?></font>
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Tanggungjawab
                      </label>
                      <div class="controls">
                          <?php
                            if($this->input->post('tjawab') !=NULL){
                                    $tjawab = $this->input->post('tjawab');
                            }
                         ?> 
                          <?php echo form_textarea(array('name' => 'tjawab', 
                              'value' => $tjawab,
                              'class' => 'input-xxlarge required',
                              'style'=>"height: 100px; width: 530px")); 
                          ?>
                         <font color="red"><?php echo form_error('tjawab'); ?></font>
                        
                  </div>
                    </div>
                     
                    <div class="control-group">
                      <label class="control-label" for="date_range1">
                        Tarikh Mula
                      </label>
                      <div class="controls">
                           <?php
                            if($this->input->post('tarikh_mula') !=NULL){
                                    $tarikh_mula = $this->input->post('tarikh_mula');
                            }
                             ?> 
                          <?php echo form_error('tarikh_mula'); ?> 
                        <div class="input-append">
                            
                            <?php
                          
                          $data = array(
                            'name'        => 'tarikh_mula',
                            'id'          => 'date',
                            'value'       => $tarikh_mula,
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 date_picker',
                            'placeholder' => 'Pilih Tarikh',
                          );

                          echo form_input($data);
                          
                          ?>
                         
                          <span class="add-on">
                            <i class="icon-calendar"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label" for="report_range1">
                        Tarikh Akhir
                      </label>
                      <div class="controls">
                          <?php
                            if($this->input->post('tarikh_akhir') !=NULL){
                                    $tarikh_akhir = $this->input->post('tarikh_akhir');
                            }
                             ?> 
                            <?php echo form_error('tarikh_akhir'); ?> 
                        <div class="input-append">
                           <?php
                          
                          $data = array(
                            'name'        => 'tarikh_akhir',
                            'id'          => 'date2',
                            'value'       => $tarikh_akhir,
                            'maxlength'   => '',
                            'size'        => '',
                            'class'       => 'span8 date_picker',
                            'placeholder' => 'Pilih Tarikh',
                          );

                          echo form_input($data);
                          
                          ?>
                          
                          <span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                      </div>
                    </div>
                     
                     
                      
                       <div class="control-group">
                      <label class="control-label">Catatan
                      </label>
                      <div class="controls">
                          <?php
                            if($this->input->post('catatan') !=NULL){
                                    $catatan = $this->input->post('catatan');
                            }
                             ?> 
                      <?php echo form_textarea(array('name' => 'catatan', 
                              'value' => $catatan,
                              'class' => 'input-xxlarge required',
                              'style'=>"height: 100px; width: 530px")); 
                       ?>
                         <font color="red"><?php echo form_error('catatan'); ?></font>
                        
                      </div></div>
                  
              </div>
               </div>
               </div>
               </div><!--end panel skop 2 -->
               

               <!--start panel Keperluan Sumber -->
               <div class="row-fluid">
				        <div class="span12">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Format Analisis Keperluan Sumber Aktiviti Penilaian Aset
                </div>
                </div>
               
              <div class="widget-body">
                
                    <div class="control-group">
                      <label class="control-label">Objek Sebagai
                      </label>
                      <div class="controls">
			<select class="required large" name="objek">
                                <option value="">SILA PILIH</option>
                                <?php if(!empty($obj_sbg)) : foreach ($obj_sbg as $rec8) : ?>
                                 <?php if($objek ==$rec8->objek_sebagai_id ){?>
                                <option value="<?php echo $rec8->objek_sebagai_id; ?>" selected="selected"><?php echo set_value('nama_jab_agensi', $rec8->objek_sebagai_kod. ':'.$rec8->objek_sebagai_teks); ?></option>
                                <?php } else{ ?>
                                <option value="<?php echo $rec8->objek_sebagai_id; ?>"><?php echo set_value('nama_jab_agensi', $rec8->objek_sebagai_kod. ':'.$rec8->objek_sebagai_teks); ?></option>
                                <?php } ?>
                                
                                  <?php endforeach; ?>
                                <?php endif; ?>
                        </select>  
                    </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Bajet Aktiviti (RM)
                      </label>
                      <div class="controls">
                          <?php
                            if($this->input->post('bajet_aktvt') !=NULL){
                                    $bajet_aktvt = $this->input->post('bajet_aktvt');
                            }
                             ?> 
                       <?php echo form_input(array('name' => 'bajet_aktvt', 'value' => $bajet_aktvt, 'class' => 'input-xxlarge required')); ?>
                         <font color="red"><?php echo form_error('bajet_aktvt'); ?></font>
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Sumber
                      </label>
                    <div class="controls">
                       <select class="required large" name="sumber">
                                <option value="">SILA PILIH</option>
                                <?php if(!empty($sumber_id)) : foreach ($sumber_id as $rec9) : ?>
                                <?php if($sumber==$rec9->sumber_id){ ?>
                                <option value="<?php echo $rec9->sumber_id; ?>" selected="selected"><?php echo set_value('nama_jab_agensi', $rec9->sumber); ?></option>
                                <?php }else{ ?>
                                <option value="<?php echo $rec9->sumber_id; ?>"><?php echo set_value('nama_jab_agensi', $rec9->sumber); ?></option>
                               <?php } ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                        </select>    
                        </div>
					</div>
                      
                      <div class="control-group">
                      <label class="control-label">Output
                      </label>
                      <div class="controls">
                          <?php
                            if($this->input->post('output') !=NULL){
                                    $output = $this->input->post('output');
                            }
                             ?> 
                       <?php echo form_textarea(array('name' => 'output', 
                              'value' => $output,
                              'class' => 'input-xxlarge required',
                              'style'=>"height: 100px; width: 530px")); 
                       ?>
                         <font color="red"><?php echo form_error('output'); ?></font>
                        
                      </div>
					  </div>

               </div>
               </div>
               </div>
               </div><!--end panel keperluan -->
           
            <!-- start panel Keperluan sumber 2-->
           <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Keperluan Sumber
                  </div>
                </div>

                <div class="widget-body" id="skop">
                  <p><br />
                   <label> 1.Sumber Manusia</label> </p>

              <!--start sumber manusia -->
              <div class="row-fluid">
<!-- start rancang -->
            	 <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Rancang</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar-three">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 	 <?php $total=0; $run_numb=0; ?>
					 
                        <?php if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
                        <?php 	
							if($this->skopaktiviti_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),1,$this->uri->segment(5),'pla')== FALSE)
							{ 
								echo ''; 
								?>    
								<label class="checkbox">
										  <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModal<?php echo $rec->utiliti_sumber_man_id ?>" id="<?php echo $run_numb; ?>" class="planning" data-toggle="modal">
										  <?php echo $rec->nama; ?>
								</label>
                       <?php
							}
							else{
							$runQuery = $this->skopaktiviti_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),1,$this->uri->segment(5),'pla');
							foreach ($runQuery as $rQ){$idExisting = $rQ->pla_pata_f10_1b1c_sumber_man_id; }			
                       ?>    
							<input type="hidden" value="<?php echo $idExisting; ?>" name="txtrancang_sumberget" id="txtrancang_sumberget<?php echo $run_numb; ?>"  />
							<label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModal<?php echo $rec->utiliti_sumber_man_id ?>" id="<?php echo $run_numb; ?>" class="planning"   checked>
                               <?php echo $rec->nama; ?>
							   
                            <?php if($this->skopaktiviti_model->get_total_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),1,$this->uri->segment(5),1,'pla')== FALSE)
								{
									$total= $total + $rec->gaji+ $rec->kos_kerja_lebih_masa;
                                }
                                else 
                                { 
                                 $total= $total + $rec->gaji;
                                }
								
							 ?>
							
                              </label>
                        
                        <?php }  ?>
                           <?php $run_numb++; endforeach; ?>           
                       <?php endif; ?>
                    </div>
                     </div>
                     </div>
                     </div> 
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" value="<?php echo number_format($total,2);  ?>" /></label>
                     
              </div>

              
            	</div><!--end rancang -->
                
<!-- start lulus-->
                <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Lulus</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar1">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 	 <?php $total=0; $run_numb2=0; ?>
                        <?php if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
                        <?php if($this->skopaktiviti_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),2,$this->uri->segment(5),'pla')== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModaly<?php echo $rec->utiliti_sumber_man_id ?>" id="<?php echo $run_numb2; ?>" class="accepted" data-toggle="modal">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }else 
                            {
							$runQuery = $this->skopaktiviti_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),2,$this->uri->segment(5),'pla');
							foreach ($runQuery as $rQ){$idExisting = $rQ->pla_pata_f10_1b1c_sumber_man_id; }			
                       ?>    
							<input type="hidden" value="<?php echo $idExisting; ?>" name="txtlulus_sumberget" id="txtlulus_sumberget<?php echo $run_numb2; ?>"  />
                            <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModaly<?php echo $rec->utiliti_sumber_man_id ?>" id="<?php echo $run_numb2; ?>" class="accepted" checked>
                               <?php echo $rec->nama; ?>
                       <?php 
								
								if($this->skopaktiviti_model->get_total_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),2,$this->uri->segment(5),1,'pla')== FALSE)
								{
									$total= $total + $rec->gaji+ $rec->kos_kerja_lebih_masa;
                                }
                                else 
                                { 
									$total= $total + $rec->gaji;
                                }
								
						?>
                              </label>
                        
                        <?php }  ?>
                           <?php $run_numb2++; endforeach;?>           
                       <?php endif; ?>
                    </div>
                     </div>
                     </div>
                     </div> 
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" value="<?php echo number_format($total,2);  ?>" /></label>
                     
              </div>

                </div>
            	<!-- end lulus-->
                
<!-- start isi-->
                <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Isi</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar2">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 	 <?php $total=0; $run_numb3=0; ?>
                        <?php if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
                        <?php if($this->skopaktiviti_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),3,$this->uri->segment(5),'pla')== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModalx<?php echo $rec->utiliti_sumber_man_id ?>" id="<?php echo $run_numb3; ?>" class="proceed"  data-toggle="modal">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }
							else 
                            {
                                $runQuery = $this->skopaktiviti_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),3,$this->uri->segment(5),'pla');
								foreach ($runQuery as $rQ){$idExisting = $rQ->pla_pata_f10_1b1c_sumber_man_id; }			
                       ?>    
							<input type="hidden" value="<?php echo $idExisting; ?>" name="txtisi_sumberget" id="txtisi_sumberget<?php echo $run_numb3; ?>"  />
                            <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModalx<?php echo $rec->utiliti_sumber_man_id ?>" id="<?php echo $run_numb3; ?>" class="proceed" checked>
                               <?php echo $rec->nama; ?>
                            <?php if($this->skopaktiviti_model->get_total_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),3,$this->uri->segment(5),1,'pla')== FALSE)
								{
                                
									$total= $total + $rec->gaji+ $rec->kos_kerja_lebih_masa;
                                  }
                                else 
                                {
                                   
                                 $total= $total + $rec->gaji;
                                
                                }?>
                              </label>
                        
                        <?php }  ?>
                           <?php $run_numb3++; endforeach;?>           
                        <?php endif; ?>
                    </div>
                     </div>
                     </div>
                     </div> 
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" value="<?php echo number_format($total,2);  ?>" /></label>
                     
              </div>

            	</div><!--end isi -->
                </div><!--end sumber manusia -->
            
          
        
                  <p><label>2.Pengurusan Pejabat<label>
<!-- start pengurusan pejabat-->   
              <div class="row-fluid">
                <!--start mesin fotostat -->  
                <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Mesin Fotostat</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar3">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 		  
                         <?php $calVal = 0; $count=1; if(!empty($senarai_alat_pej)) : foreach ($senarai_alat_pej as $rec1) : ?>
                          
                                    <label class="checkbox">
                                    <input id="mach<?php echo $count; ?>" type="checkbox" value="<?php echo $rec1->urus_pej_id; ?>cb<?php echo $rec1->kos_seunit; ?>" name="foto[]" 
									 onclick="calText('machince','mach','txttotal2')" <?php //onchange="handleChange(this,'foto');" ?>
									<?php if($checkPjbt = $this->skopaktiviti_model->get_total_pejabat($this->uri->segment(4),$this->uri->segment(5),$rec1->urus_pej_id,$rec1->kat_alat_pej_id,'pla')) { echo "checked"; } 
											
											foreach ($checkPjbt as $chckpjbt) :
												$calVal+= $chckpjbt->kos_seunit;
											endforeach;
									?> class="machince"  >
                   			        <?php echo $rec1->jenama; ?> 
                                    <input type="hidden" id="machs<?php echo $count; ?>" value="<?php echo $rec1->kos_seunit; ?>" <?php //id="cb<?php echo $countMesin; "?> >
									<input type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="rekodid">
                                    <input type="hidden" value="<?php echo $this->uri->segment(5); ?>" name="skop_aktvt_id">
                                    <input type="hidden" value="1" name="kat_pej_id_foto">
                                    
                                    </label>
                  		
                        <?php $count++; endforeach; ?>
                        <?php endif; ?>
                    </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input type="text" id="txttotal2" name="txttotal2" value="<?php echo number_format($calVal,2); ?>"  /></label>
              	</div>
            	</div><!--end mesin fotostat -->

            	<!--start fax -->
              <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Fax</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar4">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                      	  
                         <?php $calValFax=0; $autoNumb=1; if(!empty($senarai_fax)) : foreach ($senarai_fax as $rec2) : ?>
                          
                            <label class="checkbox">
                            <input id="fax<?php echo $autoNumb; ?>" type="checkbox" value="<?php echo $rec2->urus_pej_id; ?>cb<?php echo $rec2->kos_seunit; ?>" 
							name="fax[]" onclick="calText('machincefax','fax','txtFax');" <?php //onchange="handleChange(this,'fax');" ?>
							<?php if($checkPjbt = $this->skopaktiviti_model->get_total_pejabat($this->uri->segment(4),$this->uri->segment(5),$rec2->urus_pej_id,$rec2->kat_alat_pej_id,'pla')) { echo "checked"; } 
											
									foreach ($checkPjbt as $chckpjbt) :
										$calValFax+= $chckpjbt->kos_seunit;
									endforeach;
							?> class="machincefax" >
                   			<?php echo $rec2->jenama; ?>
							<input type="hidden" id="faxs<?php echo $autoNumb; ?>" value="<?php echo $rec2->kos_seunit; ?>" <?php //id="cb<?php echo $countMesin; "?> >
                            </label>
                  		
                        <?php $autoNumb++; endforeach;?>
                        <?php endif; ?>
						
                      </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" name="txtFax" id="txtFax" value="<?php echo number_format($calValFax,2); ?>" /></label>
              	</div>
            	</div><!--end fax -->
            
             <!--start telefon -->
             <div class="span4">
              	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Telefon</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar5">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                  <label class="checkbox">
                         <?php $calValTel=0; $count=1; if(!empty($senarai_tel)) : foreach ($senarai_tel as $rec3) : ?>
                         <label class="checkbox">
                              <input id="tel<?php echo $count; ?>" type="checkbox" value="<?php echo $rec3->urus_pej_id; ?>cb<?php echo $rec3->kos_seunit; ?>" name="tel[]" <?php //onchange="handleChange(this,'tel');" ?>
							  onclick="calText('machTel','tel','txtTel')"
							  <?php if($checkPjbt = $this->skopaktiviti_model->get_total_pejabat($this->uri->segment(4),$this->uri->segment(5),$rec3->urus_pej_id,$rec3->kat_alat_pej_id,'pla')) { echo "checked"; } 
											
									foreach ($checkPjbt as $chckpjbt) :
										$calValTel+= $chckpjbt->kos_seunit;
									endforeach;
							  ?>  class="machTel" >
                   			 <?php echo $rec3->jenama; ?>
							 <input type="hidden" id="tels<?php echo $count; ?>" value="<?php echo $rec3->kos_seunit; ?>">
                         </label>
						 <?php $count++; endforeach;?>
                        <?php endif; ?>
                    </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" name="txtTel" id="txtTel" value="<?php echo number_format($calValTel,2); ?>" /></label>
              	</div>
            	</div><!--end telefon -->
                
                </div><!--end sumber manusia -->
            
            
                  <p><label> 3. Peralatan Kerja<label>

                  <!--end telefon -->
                  <div class="row-fluid">
                  <!-- -->
                  <div class="span3">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Komputer</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar6">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                    
                         <?php $calValKom=0; $count=1; if(!empty($senarai_kom)) : foreach ($senarai_kom as $rec4) : ?>
                          <label class="checkbox">
                             <input id="kom<?php echo $count; ?>" type="checkbox" value="<?php echo $rec4->alat_kerja_id; ?>cb<?php echo $rec4->kos_seunit; ?>"  name="kom[]" 
							 onclick="calText('machKom','kom','txtKom')"
							 class="machKom" 
							 <?php if($checkAlat = $this->skopaktiviti_model->get_total_peralatan($this->uri->segment(4),$this->uri->segment(5),$rec4->alat_kerja_id,$rec4->kat_alat_kerja_id,'pla')) { echo "checked"; } 
											
									foreach ($checkAlat as $chckalat) :
										$calValKom+= $chckalat->kos_seunit;
									endforeach;
							  ?>
							 >
                   			 <?php echo $rec4->jenama; ?>
                             <input type="hidden" id="koms<?php echo $count; ?>" value="<?php echo $rec4->kos_seunit; ?>">     
                          </label>
                  		
                        <?php $count++; endforeach;?>
                        <?php endif; ?>
                  </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" name="txtKom" id="txtKom" value="<?php echo number_format($calValKom,2); ?>"  /></label>
              	</div>
            	</div>

             	<div class="span3">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Pemeriksaan</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar7">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                  
                         <?php $calValPeriksa=0; $count=1; if(!empty($senarai_pemeriksa)) : foreach ($senarai_pemeriksa as $rec7) : ?>
						 
                          <label class="checkbox">
							  <input id="perk<?php echo $count; ?>" type="checkbox" value="<?php echo $rec7->alat_kerja_id; ?>cb<?php echo $rec7->kos_seunit; ?>" name="pem[]"
							  class="mchecker" 
							  onclick="calText('mchecker','perk','txtPeriksa')"
							  <?php if($checkAlat = $this->skopaktiviti_model->get_total_peralatan($this->uri->segment(4),$this->uri->segment(5),$rec7->alat_kerja_id,$rec7->kat_alat_kerja_id,'pla')) { echo "checked"; } 
											
									foreach ($checkAlat as $chckalat) :
										$calValPeriksa+= $chckalat->kos_seunit;
									endforeach;
							  ?>
							  >
							  <?php echo $rec7->jenama; ?>
                              <input type="hidden" id="perks<?php echo $count; ?>" value="<?php echo $rec7->kos_seunit; ?>">     
                          </label>
                  		
                        <?php $count++; endforeach;?>
                        <?php endif; ?>
                  </div>
                  </div>
                  </div>
                  </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" name="txtPeriksa" id="txtPeriksa" value="<?php echo number_format($calValPeriksa,2); ?>" /></label>
              	</div>
            	</div>
                
                
            	 <div class="span3">
             	  <div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Kenderaan</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar8">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                 
                         <?php $calValKend=0; $count=1; if(!empty($senarai_kenderaan)) : foreach ($senarai_kenderaan as $rec5) : ?>
                          
                          <label class="checkbox">
							  <input id="kend<?php echo $count; ?>" type="checkbox" value="<?php echo $rec5->alat_kerja_id; ?>cb<?php echo $rec5->kos_seunit; ?>" name="ken[]"
							  class="mkend" 
							  onclick="calText('mkend','kend','txtKend')"
							  <?php if($checkAlat = $this->skopaktiviti_model->get_total_peralatan($this->uri->segment(4),$this->uri->segment(5),$rec5->alat_kerja_id,$rec5->kat_alat_kerja_id,'pla')) { echo "checked"; } 
											
									foreach ($checkAlat as $chckalat) :
										$calValKend+= $chckalat->kos_seunit;
									endforeach;
							  ?>
							  >
							  <?php echo $rec5->jenama; ?>
							  <input type="hidden" id="kends<?php echo $count; ?>" value="<?php echo $rec5->kos_seunit; ?>">  
                          </label>
                  		
                        <?php $count++; endforeach;?>
                        <?php endif; ?>
                  </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" name="txtKend" id="txtKend" value="<?php echo number_format($calValKend,2); ?>" /></label>
              	</div>
            	</div>
            
 				<div class="span3">
             	<div class="widget">
                <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  PPE</div>
                </div>
                <div class="widget-body">
                	<div id="scrollbar9">
                    <div class="scrollbar">
                    <div class="track">
                    <div class="thumb">
                    <div class="end"></div>
                    </div>
                    </div>
                    </div>
                    <div class="viewport">
                    <div class="overview">
                  
                         <?php $calValPPE=0; $count=1; if(!empty($senarai_ppe)) : foreach ($senarai_ppe as $rec6) : ?>
                          
                            <label class="checkbox">
                             <input id="ppe<?php echo $count; ?>" type="checkbox" value="<?php echo $rec6->alat_kerja_id; ?>cb<?php echo $rec6->kos_seunit; ?>" name="ppe[]"
							  class="mppe" 
							  onclick="calText('mppe','ppe','txtPPE')"
							  <?php if($checkAlat = $this->skopaktiviti_model->get_total_peralatan($this->uri->segment(4),$this->uri->segment(5),$rec6->alat_kerja_id,$rec6->kat_alat_kerja_id,'pla')) { echo "checked"; } 
											
									foreach ($checkAlat as $chckalat) :
										$calValPPE+= $chckalat->kos_seunit;
									endforeach;
							  ?>
							 >
                   			 <?php echo $rec6->jenama; ?>
                             <input type="hidden" id="ppes<?php echo $count; ?>" value="<?php echo $rec6->kos_seunit; ?>">         
                            </label>
                  		
                        <?php $count++; endforeach;?>
                        <?php endif; ?>
                  </div>
                  </div>
                  </div>
                  </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" id="txtPPE" name="txtPPE" value="<?php echo number_format($calValPPE,2) ?>" /></label>
              	</div>
            	</div>
                </div>
        </div>
                  
                  
                  
                  </div>
            	</div>
                </div>
        </div>
             
              </div><div align="right">
                
                     <a href="<?php echo site_url('pla/skop_aktiviti_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.'edit') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Sebelum
                      </button></a>
                      <input type="submit" value="Seterusnya" class="btn btn-primary"> 
             </div><!--end div button -->
     <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>

              <!--end div dashboard -->
            </div></div></div>
     
     
		<input type="hidden" name="indexofrancang" id="indexofrancang"  >
		<input type="hidden" name="indexoflulus" id="indexoflulus"  >
		<input type="hidden" name="indexofisi" id="indexofisi"  >
		
		<input type="hidden"  name="currentrancang" id="currentrancang"  >
		<input type="hidden" name="currentlulus" id="currentlulus"  >
		<input type="hidden" name="currentisi" id="currentisi"  >
		
       <!-- Modal Rancang -->
        <?php $count=0; if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
       <!--<form id="" class="" action="<?php// echo site_url(); ?>/ptra/sumberrancang" method="post"> -->
                  <div id="myModal<?php echo $rec->utiliti_sumber_man_id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p><label>Sila buat pemilihan untuk <?php echo $rec->nama; ?></label> 
                      <label class="radio"><input type="radio" name="kosflag<?php echo $count; ?>" id="optionsRadios2" value="1" checked="checked">Gaji</label>
					  <label class="radio"><input type="radio" name="kosflag<?php echo $count; ?>" id="optionsRadios" value="2">Gaji dan Kos Lebih Masa</label>
					  
                   <input type="hidden" name="utiliti_sumber_man_id_rancang[]" value="<?php echo $rec->utiliti_sumber_man_id; ?>" >
                   <input type="hidden" name="gaji_rancang[]" value="<?php echo $rec->gaji; ?>" >
                   <input type="hidden" name="kos_rancang[]" value="<?php echo $rec->kos_kerja_lebih_masa; ?>" >
                   <input type="hidden" name="skop_aktvt_id" value="<?php echo $this->uri->segment(5)?>">
                   <input type="hidden" name="rekodid" value="<?php echo $this->uri->segment(4)?>">
                   <input type="hidden" name="kat_sumber_man_id_rancang" value="1">
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                     <!--<input type="submit" name="rancang_hapus" value="Padam" class="btn btn-warning" id="rancang_hapus<?php echo $count; ?>">-->
					 <input type="submit" name="rancang" value="Simpan" class="btn btn-success" id="rancang<?php echo $count; ?>">
                              </div>
                  </div><!-- end modal -->
      <!-- </form> -->      
                   <?php $count++; endforeach;?>
                   <?php endif; ?>

       
        <!-- Modal Lulus -->
        <?php $count=0; if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
     <!--  <form id="" class="" action="<?php echo site_url(); ?>/ptra/sumberrancang" method="post"> -->
                  <div id="myModaly<?php echo $rec->utiliti_sumber_man_id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p><label>Sila buat pemilihan untuk <?php echo $rec->nama; ?></label> 
						<label class="radio"><input type="radio" name="kosflagl<?php echo $count; ?>" id="optionsRadios2" value="1" checked>Gaji</label>
						<label class="radio"><input type="radio" name="kosflagl<?php echo $count; ?>" id="optionsRadios2" value="2">Gaji dan Kos Lebih Masa</label>
						
                   <input type="hidden" name="utiliti_sumber_man_id_lulus[]" value="<?php echo $rec->utiliti_sumber_man_id; ?>" >
                   <input type="hidden" name="gaji_lulus[]" value="<?php echo $rec->gaji; ?>" >
                   <input type="hidden" name="kos_lulus[]" value="<?php echo $rec->kos_kerja_lebih_masa; ?>" >
                   <input type="hidden" name="skop_aktvt_id" value="<?php echo $this->uri->segment(5)?>">
                   <input type="hidden" name="rekodid" value="<?php echo $this->uri->segment(4)?>">
                   <input type="hidden" name="kat_sumber_man_id_lulus" value="2">
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
					<!--<input type="submit" name="lulus_hapus" value="Padam" class="btn btn-warning" id="lulus_hapus<?php echo $count; ?>" >-->
                    <input type="submit" name="lulus" value="Simpan" class="btn btn-success" id="lulus<?php echo $count; ?>" >
                              </div>
                  </div><!-- end modal -->
      <!-- </form>   -->    
                   <?php $count++; endforeach;?>
                   <?php endif; ?>

        
         <!-- Modal isi -->
        <?php $count=0; if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
      <!-- <form id="" class="" action="<?php echo site_url(); ?>/ptra/sumberrancang" method="post"> -->
                  <div id="myModalx<?php echo $rec->utiliti_sumber_man_id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Sila Kemaskini Maklumat Berikut
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p><label>Sila buat pemilihan untuk <?php echo $rec->nama; ?><!--(<?php //echo $rec->gaji; ?>)(<?php //echo $rec->kos_kerja_lebih_masa; ?>)(<?php //echo $rec->utiliti_sumber_man_id; ?>)<?php //echo $this->uri->segment(3)?><?php //echo $this->uri->segment(4)?> --></label> 
						<label class="radio"><input type="radio" name="kosflagi<?php echo $count; ?>" id="optionsRadios2" value="1" checked>Gaji</label>
						<label class="radio"><input type="radio" name="kosflagi<?php echo $count; ?>" id="optionsRadios2" value="2">Gaji dan Kos Lebih Masa</label>
                   <input type="hidden" name="utiliti_sumber_man_id_isi[]" value="<?php echo $rec->utiliti_sumber_man_id; ?>" >
                   <input type="hidden" name="gaji_isi[]" value="<?php echo $rec->gaji; ?>" >
                   <input type="hidden" name="kos_isi[]" value="<?php echo $rec->kos_kerja_lebih_masa; ?>" >
                   <input type="hidden" name="skop_aktvt_id" value="<?php echo $this->uri->segment(5)?>">
                   <input type="hidden" name="rekodid" value="<?php echo $this->uri->segment(4)?>">
                   <input type="hidden" name="kat_sumber_man_id_isi" value="3">
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
						<!--<input type="submit" name="isi_hapus" value="Padam" class="btn btn-warning" id="isi_hapus<?php echo $count; ?>" >-->
						<input type="submit" name="isi" value="Simpan" class="btn btn-success" id="isi<?php echo $count; ?>" >
                              </div>
                  </div><!-- end modal -->
      <!-- </form>   -->    
                   <?php $count++; endforeach;?>
                   <?php endif; ?>		
       
<?php echo form_close(); ?>
<script type="text/javascript" src="<?php echo base_url() . 'asset/js/jquery.min.js'; ?>"></script>        
<script type="text/javascript">
$(document).ready(function(){ 
	$('.planning').click(function(){
		$('#indexofrancang').val(this.id);
		if($('#txtrancang_sumberget'+this.id).length !=0)
		{ 
			var jgk = $('#txtrancang_sumberget'+this.id).val(); 
			$('#currentrancang').val(jgk); 
						
			$.ajax({
                type: "POST",
                url: "<?php echo site_url(); ?>/pla/set_skop_aktiviti/"+jgk, 
               
                success: function() 
                {
                   location.reload();
                }
                 
            });
			
		}
		else{ $('#currentrancang').val(''); }
	 });
	 
	  $('.accepted').click(function(){
	 $('#indexoflulus').val(this.id);
	 if($('#txtlulus_sumberget'+this.id).length !=0)
		{ 
			var jgk = $('#txtlulus_sumberget'+this.id).val(); 
			$('#currentlulus').val(jgk); 
			
			$.ajax({
                type: "POST",
                url: "<?php echo site_url(); ?>/pla/set_skop_aktiviti/"+jgk, 
               
                success: function() 
                {
                   location.reload();
                }
                 
            });
			
		}
		else{ $('#currentlulus').val('');}
	 });
 
	 $('.proceed').click(function(){
	 $('#indexofisi').val(this.id);
	 if($('#txtisi_sumberget'+this.id).length !=0)
		{ 
			var jgk = $('#txtisi_sumberget'+this.id).val(); 
			$('#currentisi').val(jgk); 
			
			$.ajax({
                type: "POST",
                url: "<?php echo site_url(); ?>/pla/set_skop_aktiviti/"+jgk, 
               
                success: function() 
                {
                   location.reload();
                }
                 
            });
		}
		else{ $('#currentisi').val(''); }
	 });
	 
	 	 
	//$('.machincefax').click(function(){
	//	var countChck,total=0,totals=0;
		
	//	countChck = $('.machincefax').length;
		
	//	for (var i = 1; i < countChck+1; i++)
	//	{
	//		if($('#fax'+i).is(':checked')){ totals = $('#faxs'+i).val(); total+=totals*1; }
	//	}
		
	//});
	

 });

 function calText(txtClass,txtChck,txtVal)
	{
		var countChck,total=0,totals=0;
		
		countChck = $('.'+txtClass).length;
				
		for (var i = 1; i < countChck*1+1; i++)
		{
			if($('#'+txtChck+i).is(':checked')){ totals = $('#'+txtChck+'s'+i).val(); total+=totals*1; }
		}
		
		$('#'+txtVal).val(total.toFixed(2));
	}
</script>