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
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />
    <!--tab navigation--> 
    <div class="widget-body">
	<?php 
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
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>">ptra</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">
        <!--panel 1-->  
	<?php 
		$form_name = 'ptra/treeview_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
		if($this->uri->segment(5) != NULL){$form_name = 'ptra/treeview_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
		$attributes = array('class' => '', 'id' => 'treeview_ptra_editppd');
		echo form_open($form_name, $attributes);

		$sunting = array('sunting'=>NULL);
		//if($this->uri->segment(5) != NULL){
		$sunting = array('sunting'=>$this->uri->segment(4));
		  echo form_hidden($sunting);
		//}
		//echo form_hidden($sunting);


		//if($this->uri->segment(5) != NULL)
		//{
			$g = $this->ptra_model->skop_pilihan_id(); //get skop pilihan id yg berkenaan

			foreach ($g as $row) 
			{
				$skop_pilihan_id = $row->ptra_pata_f6_1b_skop_pilihan_id;
				?>
				<input type="hidden" id="skop_pilihan_id[]" name="skop_pilihan_id[]" value="<?php echo $skop_pilihan_id?>"/>
				<?php
			   
			}

			$k = $this->ptra_model->skop_aktvt_id_in_db();
			foreach ($k as $r)
			{
				$skop_aktvt_id_in_db = $r->skop_aktvt_id;

				?>
				 <input type="hidden" id="skop_aktvt_id_in_db[]" name="skop_aktvt_id_in_db[]" value="<?php echo $skop_aktvt_id_in_db?>"/>
				<?php
			}
                  
       // }

		echo validation_errors(); ?>

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Skop Dan Aktiviti Penerimaan Aset
                  </div>
                </div>
            <div class="widget-body">
        	
			<?php if(!empty($senarai_skop)) : foreach ($senarai_skop as $rec) : 

                     ?>
                    <label class="checkbox">
                    <?php echo form_error('skop[]'); ?>
                    <?php 



                    $c = $this->ptra_model->get_count_pelan_pilih($rec->skop_aktvt_id);
                        //print_r($c); 


                     //   if($this->uri->segment(5) != NULL){
                        if(count($c)>0){
                          $checked = "checked";
                          foreach ($c as $row) {
                       //      $keterangan = $row->keterangan;

                          }
                         
                          //echo "dd=".$keterangan;
                        }else{
                          $checked = "";
                         // $keterangan = "";
                        }
                     // }else{
                     //    $keterangan = "";
                     //   $checked = "";
                     // }


                    ?>

                    <input type="checkbox" value="<?php echo set_value('skop[]',$rec->skop_aktvt_id); ?>" name="skop[]" id="skop[]" <?php echo $checked;?>>
                    <?php //echo $rec->skop_aktvt_tajuk, '   (' ,$rec->skop_aktvt_id,')'; ?>
                    <?php echo $rec->skop_aktvt_tajuk; ?></label>
                  
				  
                    <?php //if(!empty($senarai_aktiviti)) : foreach ($senarai_aktiviti as $a) : ?>
                    
                    <?php if($getKem = $this->ptra_model->get_aktiviti($rec->skop_aktvt_id)) :foreach ($getKem as $rr) : 

                    $c = $this->ptra_model->get_count_pelan_pilih($rr->skop_aktvt_id);
                    //  if($this->uri->segment(5) != NULL){
                        if(count($c)>0){
                          $checked = "checked";
                          //foreach ($c as $row) {
                          //   $keterangan = $row->keterangan;
							//}
                         
                          //echo "dd=".$keterangan;
                        }else{
                          $checked = "";
                         // $keterangan = "";
                        }
                    //  }else{
                    //     $keterangan = "";
                    //    $checked = "";
                    //  }
                      
                      
                    ?>
                   <label class="checkbox checkbox3">
                   <?php echo form_error('aktiviti[]');?>
                   <input type="checkbox" value="<?php echo set_value('skop[]',$rr->skop_aktvt_id); ?>" name="skop[]" id="skop[]" <?php echo $checked;?>>
                   <?php //echo $rr->skop_aktvt_tajuk,'   (' , $rr->skop_aktvt_id ,')'; ?>
                   <?php echo $rr->skop_aktvt_tajuk; ?>
                   </label>
                   
                   <?php //if($getKem = $this->ptra_model->get_aktiviti($rec->skop_aktvt_id)) foreach ($getKem as $rr) echo $rr->skop_aktvt_tajuk;?>
                    <?php if($getKem = $this->ptra_model->get_butiran($rr->skop_aktvt_id)) :foreach ($getKem as $rrr) : 

                     $c = $this->ptra_model->get_count_pelan_pilih($rrr->skop_aktvt_id);
                      if($this->uri->segment(5) != NULL){
                        if(count($c)>0){
                          $checked = "checked";
                         
                          //echo "dd=".$keterangan;
                        }else{
                          $checked = "";
                          
                        }
                      }else{
                         
                        $checked = "";
                      }

                    ?>
                   <label class="checkbox checkbox4">
                   <?php echo form_error('butiran[]');?>
                   <input type="checkbox" value="<?php echo set_value('skop[]',$rrr->skop_aktvt_id); ?>" name="skop[]" id="skop[]" <?php echo $checked;?>>
                   <?php //echo $rrr->skop_aktvt_tajuk,'   (' ,$rrr->skop_aktvt_id ,')'; ?>
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
          <!--/.END panel 1-->
          
                <!--buttons--> 
                <div class="widget-body" align="right">
                   <a href="<?php echo site_url('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Kembali
                  </button></a>
                     <!--<a href="<?php echo site_url('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-warning2 input-top-margin" type="button">
                        Simpan
                      </button></a>-->
                      <input type="submit" value="Seterusnya" class="btn btn-primary">
                </div> 
                <!--/.END buttons-->

	  </div>  
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->