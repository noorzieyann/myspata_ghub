<style >
    .ui-datepicker 
    {
      top: 950px !important;
   }
</style>
 
 <script type="text/javascript">

function handleChange(test) {

var strcb,strcb_length,strcb_find,strcb_new;

if (test.checked == true) { 
	strcb = test.value;
	strcb_length = strcb.length;
	strcb_find = strcb.search('cb');
	strcb_new = strcb.substring(parseInt(strcb_find)+2,parseInt(strcb_length));
document.getElementById('txttotal2').value = parseFloat(document.getElementById('txttotal2').value) + parseFloat(strcb_new) 
}
else {

	strcb = test.value;
	strcb_length = strcb.length;
	strcb_find = strcb.search('cb');
	strcb_new = strcb.substring(parseInt(strcb_find)+2,parseInt(strcb_length));
document.getElementById('txttotal2').value = parseFloat(document.getElementById('txttotal2').value) - parseFloat(strcb_new)

}

}

   </script>
   
<?php

$sessionarray = $this->session->all_userdata();
//$kand_id = array();
//$kand_detail = array();

$check_row = NULL;

if($this->uri->segment(4) != NULL){
	if(count($this->pnpa_model->get_pnpa_skop_from_segment2(($this->uri->segment(4)),($this->uri->segment(5)))) == 0){
		//echo '<script>alert("Display Field Baru")< /script>';
		
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
		
		foreach($this->pnpa_model->get_pnpa_skop_from_segment2(($this->uri->segment(4)),($this->uri->segment(5))) as $row){
			//$kand_id[] = $row->kandungan_id;
			//$kand_detail[] = $row->kand_utama_detail;
                        $pnpa_id=$row->pnpa_id;
                        $skop_aktvt_id=$row->skop_aktvt_id;
                        $pihakkaitan=$row->f8_1b1c_pihak_berkaitan;
                        $tjawab=$row->f8_1b1c_tanggungjawab;
                        $tarikh_mula=$row->f8_1b1c_tarikh_mula;
                        $tarikh_akhir=$row->f8_1b1c_tarikh_tamat;
                        $catatan=$row->catatan;
                        $objek=$row->objek_sebagai_id;
                        $bajet_aktvt=$row->bajet_aktvt;
                        $sumber=$row->sumber_id;
                        $output=$row->output;
		}
		//echo "<script>alert('Display Field dr DB HOI!')< /script>";
	}
	
	

}else{
	
	//echo "<script>alert('Dokleh display gini, segment xdok!')< /script>";
	
}

?>







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






    <?php 
	$form_name ='pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(4).'/'.$this->uri->segment(5);
	if($this->uri->segment(4) != NULL){$form_name = 'pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(4);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'skop_aktiviti2_pnpa');
	echo form_open($form_name, $attributes);
    ?>
    <?php 
	//echo form_hidden($skop_aktvt_id) ;
	//echo form_hidden($pnpa_id) ;
	$sunting = array('sunting'=>NULL);
	if($this->uri->segment(4) != NULL){
		$sunting = array('sunting'=>$this->uri->segment(4));
		//echo form_hidden('pnpa_pata_f8_1b1c_id',$pnpa_pata_f8_1b1c_id);
	}
	
	echo form_hidden($sunting);
	echo form_hidden('cek_row',$check_row);

    ?>
    <?php echo validation_errors(); ?>
    
    






         <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
         <p>
              <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'skop_aktiviti2_pnpa',
                           'id' => 'skop_aktiviti2_pnpa',
                        );
                    echo form_open('pnpa/skop_aktiviti2_pnpa/'.$this->uri->segment(4).'/'.$this->uri->segment(5),$attributes); ?>
                  
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
                    
                   <!--pnpa_id = <?php //echo $this->uri->segment(3)?>
                   butiran aktiviti= <?php //echo $this->uri->segment(4) ?>
                   -->
                   <?php if($getSko = $this->pnpa_model->get_lkpskopbutiran_1( $this->uri->segment(4),  $this->uri->segment(5)))  :foreach ($getSko as $rrq) :?>
                   <?php //echo $rrq->skop_aktvt_tajuk;?>
                   
                   
                   <?php if($getSko = $this->pnpa_model->get_lkpskopaktiviti_1( $this->uri->segment(4), $rrq->skop_aktvt_sort=$this->uri->segment(5)))  :foreach ($getSko as $rr) :?>
                   <?php //echo $rr->skop_aktvt_tajuk;?>
                   <?php endforeach; ?><?php endif; ?>
                     <!--                <div class="control-group">
                      <label class="control-label">Skop
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text" disabled placeholder="Skop 1">
                      </div>
                    </div>
                    
                    <div class="control-group">
                      <label class="control-label">Aktiviti
                      </label>
                      <div class="controls">
                        <input class="input-xxlarge" type="text" disabled placeholder="Aktiviti 1"></div>
                    </div>
                    -->
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
               </div>
               <!--end panel skop --> 




            

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
                    <?php $i=1; if(!empty($skop_a)) : foreach ($skop_a as $rec) : ?>
                    <input type="hidden" value="<?php echo $this->uri->segment(4)?>" name="pnpa_id"> 
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
                     
                     <?php endforeach; ?>
                            <?php endif; ?>
                  
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
                                <option value="<?php echo $rec8->objek_sebagai_id; ?>"><?php echo set_value('nama_jab_agensi', $rec8->objek_sebagai_kod. ':'.$rec8->objek_sebagai_teks); ?></option>
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
                                <option value="<?php echo $rec9->sumber_id; ?>"><?php echo set_value('nama_jab_agensi', $rec9->sumber); ?></option>
                                <?php endforeach; ?>
                                <?php endif; ?>
                        </select>    
                        </div></div>
                      
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
                        
                      </div></div>

               </div>
               </div>
               </div>
               </div>
               <!--end panel keperluan -->







           
            <!-- start panel Keperluan sumber 2-->
           <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span>  Keperluan Sumber
                  </div>
                </div>

                <div class="widget-body">
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
                 	 <?php $total=0; ?>
                        <?php if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
                        <?php if($this->pnpa_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),1,$this->uri->segment(5))== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModal<?php echo $rec->utiliti_sumber_man_id ?>"  data-toggle="modal">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModal<?php echo $rec->utiliti_sumber_man_id ?>"  data-toggle="modal" checked>
                               <?php echo $rec->nama; ?>
                            <?php if($this->pnpa_model->get_total_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),1,$this->uri->segment(5),1)== FALSE)
                            
                                {
                                
                                $total= $total + $rec->gaji+ $rec->kos_kerja_lebih_masa;
                                //echo $total;
                                //return $j;
                                
                                }
                                else 
                                {
                                   
                                 $total= $total + $rec->gaji;
                                //echo $total;
                                //return $jj;
                                }?>
                              </label>
                        
                        <?php }  ?>
                           <?php endforeach;?>           
                       
                    </div>
                     </div>
                     </div>
                     </div> 
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" value="<?php echo $total;  ?>" /></label>
                     <?php endif; ?>
              </div>

              
            	</div>
              <!--end rancang -->







                
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
                 	 <?php $total=0; ?>
                        <?php if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
                        <?php if($this->pnpa_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),2,$this->uri->segment(5))== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModal2<?php echo $rec->utiliti_sumber_man_id ?>"  data-toggle="modal">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModal2<?php echo $rec->utiliti_sumber_man_id ?>"  data-toggle="modal" checked>
                               <?php echo $rec->nama; ?>
                            <?php if($this->pnpa_model->get_total_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),1,$this->uri->segment(5),1)== FALSE)
                            
                                {
                                
                                $total= $total + $rec->gaji+ $rec->kos_kerja_lebih_masa;
                                //echo $total;
                                //return $j;
                                
                                }
                                else 
                                {
                                   
                                 $total= $total + $rec->gaji;
                                //echo $total;
                                //return $jj;
                                }?>
                              </label>
                        
                        <?php }  ?>
                           <?php endforeach;?>           
                       
                    </div>
                     </div>
                     </div>
                     </div> 
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" value="<?php echo $total;  ?>" /></label>
                     <?php endif; ?>
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
                 	 <?php $total=0; ?>
                        <?php if(!empty($senarai_sumber)) : foreach ($senarai_sumber as $rec) : ?>
                        <?php if($this->pnpa_model->get_sumber_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),3,$this->uri->segment(5))== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModal3<?php echo $rec->utiliti_sumber_man_id ?>"  data-toggle="modal">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" href="#myModal3<?php echo $rec->utiliti_sumber_man_id ?>"  data-toggle="modal" checked>
                               <?php echo $rec->nama; ?>
                            <?php if($this->pnpa_model->get_total_rancang(($rec->utiliti_sumber_man_id),$this->uri->segment(4),1,$this->uri->segment(5),1)== FALSE)
                            
                                {
                                
                                $total= $total + $rec->gaji+ $rec->kos_kerja_lebih_masa;
                                //echo $total;
                                //return $j;
                                
                                }
                                else 
                                {
                                   
                                 $total= $total + $rec->gaji;
                                //echo $total;
                                //return $jj;
                                }?>
                              </label>
                        
                        <?php }  ?>
                           <?php endforeach;?>           
                       
                    </div>
                     </div>
                     </div>
                     </div> 
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" value="<?php echo $total;  ?>" /></label>
                     <?php endif; ?>
              </div>

            	</div>
              <!--end isi -->






                </div>
                <!--end sumber manusia -->
            




          
        
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
                 		  
                         <?php if(!empty($senarai_alat_pej)) : foreach ($senarai_alat_pej as $rec1) : ?>
                          
                                    <label class="checkbox">
                                          <?php //echo form_error('ptf[]');?>
                                        <input id="<?php echo $rec1->urus_pej_id; ?> " type="checkbox" value="<?php echo $rec1->urus_pej_id; ?>cb<?php echo $rec1->kos_seunit; ?>" name="foto[]" onchange="handleChange(this);">
                   			 <?php echo $rec1->jenama; ?> (<?php echo $rec1->kos_seunit; ?> )
                                    <input type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="pnpa_id">
                                    <input type="hidden" value="<?php echo $this->uri->segment(5); ?>" name="skop_aktvt_id">
                                    <input type="hidden" value="1" name="kat_pej_id_foto">
                                    
                                    </label>
                  		
                        <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input type="text" id="txttotal2" value="0"  /></label>
              	</div>
            	</div>
              <!--end mesin fotostat -->








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
                      	  
                         <?php if(!empty($senarai_fax)) : foreach ($senarai_fax as $rec2) : ?>
                          
                                    <label class="checkbox">
                                          <?php //echo form_error('ptf[]');?>
                   			 <input type="checkbox" value="<?php echo set_value('fax[]',$rec2->urus_pej_id); ?>" name="fax[]">
                   			 <?php echo $rec2->jenama; ?>
                                    
                                    </label>
                  		
                        <?php endforeach;?>
                        <?php endif; ?>
                      </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div>
              <!--end fax -->







            
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
                    	  
                         <?php if(!empty($senarai_tel)) : foreach ($senarai_tel as $rec3) : ?>
                          
                                    <label class="checkbox">
                                          <?php //echo form_error('ptf[]');?>
                   			 <input type="checkbox" value="<?php echo set_value('tel[]',$rec3->urus_pej_id); ?>" name="tel[]">
                   			 <?php echo $rec3->jenama; ?>
                                    
                                    </label>
                  		
                        <?php endforeach;?>
                        <?php endif; ?>
                    </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div>
              <!--end telefon -->






                
                </div>
                <!--end sumber manusia -->





            
            
                  <p><label>3.Peralatan Kerja<label>

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
                    
                         <?php if(!empty($senarai_kom)) : foreach ($senarai_kom as $rec4) : ?>
                          
                                    <label class="checkbox">
                                          <?php //echo form_error('ptf[]');?>
                   			 <input type="checkbox" value="<?php echo set_value('kom[]',$rec4->alat_kerja_id); ?>" name="kom[]">
                   			 <?php echo $rec4->jenama; ?>
                                    
                                    </label>
                  		
                        <?php endforeach;?>
                        <?php endif; ?>
                  </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
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
                  
                         <?php if(!empty($senarai_pemeriksa)) : foreach ($senarai_pemeriksa as $rec7) : ?>
                          
                                    <label class="checkbox">
                                          <?php //echo form_error('ptf[]');?>
                   			 <input type="checkbox" value="<?php echo set_value('pem[]',$rec7->alat_kerja_id); ?>" name="pem[]">
                   			 <?php echo $rec7->jenama; ?>
                                    
                                    </label>
                  		
                        <?php endforeach;?>
                        <?php endif; ?>
                  </div>
                  </div>
                  </div>
                  </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
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
                 
                         <?php if(!empty($senarai_kenderaan)) : foreach ($senarai_kenderaan as $rec5) : ?>
                          
                                    <label class="checkbox">
                                          <?php //echo form_error('ptf[]');?>
                   			 <input type="checkbox" value="<?php echo set_value('ken[]',$rec5->alat_kerja_id); ?>" name="ken[]">
                   			 <?php echo $rec5->jenama; ?>
                                    
                                    </label>
                  		
                        <?php endforeach;?>
                        <?php endif; ?>
                  </div>
                     </div>
                     </div>
                     </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
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
                  
                         <?php if(!empty($senarai_ppe)) : foreach ($senarai_ppe as $rec6) : ?>
                          
                                    <label class="checkbox">
                                          <?php //echo form_error('ptf[]');?>
                   			 <input type="checkbox" value="<?php echo set_value('ppe[]',$rec6->alat_kerja_id); ?>" name="ppe[]">
                   			 <?php echo $rec6->jenama; ?>
                                    
                                    </label>
                  		
                        <?php endforeach;?>
                        <?php endif; ?>
                  </div>
                  </div>
                  </div>
                  </div>
                     <label>&nbsp;&nbsp;&nbsp;Kos (RM) <input class="input-small" /></label>
              	</div>
            	</div>
                </div>
        </div>
                  
                  
                  
                  </div>
            	</div>
                </div>
        </div>
             
              </div>






                    
                    <!--start div button -->
                <div align="right">
                <a href="<?php echo site_url('pnpa/skop_aktiviti_pnpa_edit_ptf/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Kembali
                  </button></a>
   		   </div>
                <!--end div button -->






                
     <!--end div tab -->







                </div>  
                </div>
<?php echo form_close(); ?>
              <!--end widget-body -->








                </div>

              <!--end div dashboard -->








            </div></div>











