<!-- breadcrumb START -->
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
            POPA
        </a>   
    </li>
</ul>

<br>
<!-- breadcrumb END -->

	<?php if(!empty($tab)) { echo $tab;} ?>      
	
	<?php 
		$form_name = 'popa/treeviewskop_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
		if($this->uri->segment(5) != NULL){$form_name = 'popa/treeviewskop_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
		$attributes = array('class' => '', 'id' => 'treeviewskop_popa');
		echo form_open($form_name, $attributes);

		$sunting = array('sunting'=>NULL);
		if($this->uri->segment(5) != NULL)
		{
			$sunting = array('sunting'=>$this->uri->segment(4));
			echo form_hidden($sunting);
		}
		
	  
		if($this->uri->segment(5) != NULL)
		{
            $g = $this->treeview_model->skop_pilihan_id('popa'); //get skop pilihan id yg berkenaan
                
            foreach ($g as $row) 
			{
                $skop_pilihan_id = $row->popa_pata_f7_1b_skop_pilihan_id;
				?>
				 <input type="hidden" id="skop_pilihan_id[]" name="skop_pilihan_id[]" value="<?php echo $skop_pilihan_id?>"/>
				<?php
            }

            $k = $this->treeview_model->skop_aktvt_id_in_db('popa');
			
            foreach ($k as $r) 
			{
                $skop_aktvt_id_in_db = $r->skop_aktvt_id;
				?>
                <input type="hidden" id="skop_aktvt_id_in_db[]" name="skop_aktvt_id_in_db[]" value="<?php echo $skop_aktvt_id_in_db?>"/>
                <?php
            }
                  
        }
                
		echo validation_errors();

	?>
            
        <!-- panel checkbox START -->  
        <div class="row-fluid">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Skop dan Aktiviti POPA
                        </div>
                    </div>
              
                  
                    <div class="widget-body">
                       
                        <div class="row-fluid">
                            <div class="span12">
                            
                            <?php $countSkop=0; ?>    
                            <?php if(!empty($senarai_skop)) : 
									foreach ($senarai_skop as $rec) : 
									$countSkop++;
							?>
							<label class="checkbox">
							<?php echo form_error('skop[]'); ?>
							<?php 
							
								$c = $this->treeview_model->get_count_pelan_pilih($rec->skop_aktvt_id,'popa');
								
								if($this->uri->segment(5) != NULL){
									if(count($c)>0){  $checked = "checked"; }else{ $checked = "";}
								}else{ $checked = "";}
							?>

							<input type="checkbox" value="<?php echo set_value('skop[]',$rec->skop_aktvt_id); ?>" name="skop[]"  <?php echo $checked;?> class="skop">
							<?php echo $rec->skop_aktvt_tajuk; ?>
							</label>
						  
							<?php $countAktiviti=0; 
								if($getKem = $this->treeview_model->get_aktiviti($rec->skop_aktvt_id,'popa')) :
									foreach ($getKem as $rr) : 
									$countAktiviti++;
									$c = $this->treeview_model->get_count_pelan_pilih($rr->skop_aktvt_id,'popa');
								
									if($this->uri->segment(5) != NULL){
										if(count($c)>0){ $checked = "checked"; }else{$checked = "";	}
									}else{ $checked = "";}
							 ?>
							 
						   <label class="checkbox checkbox3">
						   <?php echo form_error('aktiviti[]');?>
						   <input type="checkbox" value="<?php echo set_value('skop[]',$rr->skop_aktvt_id); ?>" name="skop[]" id="skop<?php echo $countSkop; ?>" <?php echo $checked;?> class="aktiviti">
						   <?php echo $rr->skop_aktvt_tajuk; ?>
						   </label>
						   
							<?php //$countButiran=0;id="butiran<?php echo $countButiran;
							if($getKem = $this->treeview_model->get_butiran($rr->skop_aktvt_id,'popa')) :
								foreach ($getKem as $rrr) : 
								//$countButiran++;
									$c = $this->treeview_model->get_count_pelan_pilih($rrr->skop_aktvt_id,'popa');
									if($this->uri->segment(5) != NULL){
										if(count($c)>0){ $checked = "checked";
										}else{ $checked = "";}
									}else{
									 $checked = "";  }
							?>
						   <label class="checkbox checkbox4">
						   <?php echo form_error('butiran[]');?>
						   <input type="checkbox" value="<?php echo set_value('skop[]',$rrr->skop_aktvt_id); ?>" name="skop[]"  id="aktiviti<?php echo $countAktiviti; ?>" <?php echo $checked;?> class="butiran">
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
                  	<a href="<?php echo site_url('popa/model_struktur_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/edit') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Sebelum
                      </button></a>
                      <input type="submit" value="Seterusnya" class="btn btn-primary">
					  <a type="button" class="btn btn-warning2" href="#simpan" data-toggle="modal">Simpan Deraf</a>
                </div> 
<!-- buttons START -->

<div id="simpan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
<h4 id="myModalLabel">Mesej Pengesahan</h4></div>
<div class="modal-body"><p>Adakah anda ingin menyimpan deraf POPA ini?</p></div>
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
<script type="text/javascript" src="<?php echo base_url() . 'asset/js/jquery.min.js'; ?>"></script>        
<script type="text/javascript">
$(document).ready(function(){ 
	$('.butiran').click(function(){
		//alert(this.id);
		//if($('#'+(this.id)).is(':checked')){alert(this.id);}
	});
	
	$('.aktiviti').click(function(){
		//alert(this.id);
	});
});
</script>
</script>
    
  