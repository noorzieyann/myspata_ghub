<ul class="breadcrumb-beauty">
    <li>
        <a href="#">
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

<br>
<!-- breadcrumb END -->

	<?php if(!empty($tab)) { echo $tab;} ?>      
	
	<?php 
		$form_name = 'pla/treeview_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
		if($this->uri->segment(5) != NULL){$form_name = 'pla/treeview_pla_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
		$attributes = array('class' => '', 'id' => 'treeview_pla_editppd');
		echo form_open($form_name, $attributes);

		$sunting = array('sunting'=>$this->uri->segment(4));
		echo form_hidden($sunting);
		
		
	  
		//if($this->uri->segment(5) != NULL)
		//{
            $g = $this->treeview_model->skop_pilihan_id('pla'); //get skop pilihan id yg berkenaan
                
            foreach ($g as $row) 
			{
                $skop_pilihan_id = $row->pla_pata_f10_1b_skop_pilihan_id;
				$kaedah_pelupusan_id = $row->kaedah_pelupusan_id;
				?>
				 <input type="hidden" id="skop_pilihan_id[]" name="skop_pilihan_id[]" value="<?php echo $skop_pilihan_id?>"/>
				<?php
            }

            $k = $this->treeview_model->skop_aktvt_id_in_db('pla');
			
            foreach ($k as $r) 
			{
                $skop_aktvt_id_in_db = $r->skop_aktvt_id;
				?>
                <input type="hidden" id="skop_aktvt_id_in_db[]" name="skop_aktvt_id_in_db[]" value="<?php echo $skop_aktvt_id_in_db?>"/>
                <?php
            }
                  
        //}
                
		echo validation_errors();

	?>
            
        <!-- panel checkbox START -->  
        <div class="row-fluid">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Skop dan Aktiviti PLA
                        </div>
                    </div>
              
                  
                    <div class="widget-body">
                       
                        <div class="row-fluid">
                            <div class="span12">
                            
							<label class="control-label_treeview">  Kaedah : &nbsp;&nbsp;
								<select class="required" name="lupus">
									<option value="">SILA PILIH</option>
									<?php $lupus =  $this->treeview_model->get_pelupusan();
										if(!empty($lupus)) : 
											foreach ($lupus as $destroy) : ?>
											<option value="<?php echo $destroy->kaedah_pelupusan_id; ?>" <?php if($destroy->kaedah_pelupusan_id == $kaedah_pelupusan_id ){ echo'selected="selected"'; } ?> ><?php echo $destroy->fld_kaedah_pelupusan; ?></option>
											<?php endforeach; ?>
									<?php endif; ?>
								</select>  
							</label><br/>
                                
                            <?php if(!empty($senarai_skop)) : foreach ($senarai_skop as $rec) : ?>
							
							<label class="checkbox">
							<?php echo form_error('skop[]'); ?>
							<?php 
							
								$c = $this->treeview_model->get_count_pelan_pilih($rec->skop_aktvt_id,'pla');
								$catatan ="";		
								//if($this->uri->segment(5) != NULL){
									if(count($c)>0){  $checked = "checked"; }else{ $checked = "";}
									
									foreach ($g as $row) { if($row->skop_aktvt_id==$rec->skop_aktvt_id){$catatan = $row->catatan;} }
									
								//}else{ $checked = "";}
							?>

							<input type="checkbox" value="<?php echo set_value('skop[]',$rec->skop_aktvt_id); ?>" name="skop[]" id="skop[]" <?php echo $checked;?>>
							<?php echo $rec->skop_aktvt_tajuk; ?><br/>
							&nbsp; Nyatakan : <input type="text" name="nyata<?php echo $rec->skop_aktvt_id; ?>" value="<?php echo $catatan; ?>" class="input-xlarge required" >
							</label>
						  
							<?php if($getKem = $this->treeview_model->get_aktiviti($rec->skop_aktvt_id,'pla')) :foreach ($getKem as $rr) : 

								$c = $this->treeview_model->get_count_pelan_pilih($rr->skop_aktvt_id,'pla');
								
								//if($this->uri->segment(5) != NULL){
									if(count($c)>0){ $checked = "checked"; }else{$checked = "";	}
								//}else{ $checked = "";}
							 ?>
							 
						   <label class="checkbox checkbox3">
						   <?php echo form_error('aktiviti[]');?>
						   <input type="checkbox" value="<?php echo set_value('skop[]',$rr->skop_aktvt_id); ?>" name="skop[]" id="skop[]" <?php echo $checked;?>>
						   <?php echo $rr->skop_aktvt_tajuk; ?>
						   </label>
						   
							<?php if($getKem = $this->treeview_model->get_butiran($rr->skop_aktvt_id,'pla')) :foreach ($getKem as $rrr) : 

							 $c = $this->treeview_model->get_count_pelan_pilih($rrr->skop_aktvt_id,'pla');
							  //if($this->uri->segment(5) != NULL){
								if(count($c)>0){
								  $checked = "checked";
								 
								}else{
								  $checked = "";
								  
								}
							 // }else{ $checked = "";  }

							?>
						   <label class="checkbox checkbox4">
						   <?php echo form_error('butiran[]');?>
						   <input type="checkbox" value="<?php echo set_value('skop[]',$rrr->skop_aktvt_id); ?>" name="skop[]" id="skop[]" <?php echo $checked;?>>
						   <?php echo $rrr->skop_aktvt_tajuk; ?>
						   </label>
						   
							
						  <?php endforeach; ?>
							<?php endif; ?>
							
						   <?php endforeach; ?>
							<?php endif; ?>
							<br/>
							<?php endforeach; ?>
							<?php endif; ?>						
                
                            
                            </div>
                        </div>                 
                        
                    </div>
                
                    
                </div>
            </div>
        </div>
        <!-- panel checkbox END -->
          
        
        
        
<!-- buttons START --> 
					<div class="widget-body" align="right">
                     <a href="<?php echo site_url('pla/summary_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">
					 <button class="btn btn-danger input-top-margin" type="button">
                        Batal
					</button>
					</a>
                    
                      <input type="submit" value="Seterusnya" class="btn btn-primary">
					  <a type="button" class="btn btn-warning2" href="#simpan" data-toggle="modal">Simpan Deraf</a>
                </div> 
<!-- buttons START -->

<div id="simpan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
<h4 id="myModalLabel">Mesej Pengesahan</h4></div>
<div class="modal-body"><p>Adakah anda ingin menyimpan deraf pla ini?</p></div>
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



	    
                    
        </div>                  
    </div>
</div>
<?php form_close(); ?>
<!-- main panel START --> 