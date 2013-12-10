

<!-- breadcrumb START -->
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
    <!-- breadcrumb END -->



     <?php 
	$form_name = 'pnpa/model_struktur_pnpa';
	if($this->uri->segment(4) != NULL){$form_name = 'pnpa/model_struktur_pnpa/'.$this->uri->segment(4);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'model_struktur_pnpa');
	echo form_open($form_name, $attributes);
?>
<?php 
	//echo form_hidden($kand_utama_bil);
	//echo form_hidden($kand_utama);
	$sunting = array('sunting'=>NULL);
	if($this->uri->segment(4) != NULL){
		$sunting = array('sunting'=>$this->uri->segment(4));
		//echo form_hidden('pnpa_pata_f8_1a_modelstruktur_id',$pnpa_pata_f8_1a_modelstruktur_id);
	}
	echo form_hidden($sunting);

?>
<?php echo validation_errors(); ?>




    
    
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
      </div>






         <!-- div tab START -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
         <p>
         <form action='<?php echo site_url(); ?>pnpa/model_struktur_pnpa/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4); ?>' method='post'>
           




           <!-- div panel Model struktur START -->           
           <div class="row-fluid">
           <div class="span12">
           <div class="widget">
           <div class="widget-header">
           <div class="title">
            <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
            </span> Model Struktur Penilaian Aset Di Premis
            </div>
            </div>
             <input type='hidden' value='<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4); ?>' name='no' >

               <div class="widget-body"> 
                
                



                <!-- div row ptf n pif START -->
       		<div class="row-fluid">

                



                <!-- div panel ptf START -->
                    <div class="span6">
                    <div class="widget">
                    <div class="widget-header">
                      <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PTF
                      </div></div>
                       <div class="widget-body">
                      
                         <?php if(!empty($senarai_ptf)) : foreach ($senarai_ptf as $rec) : ?>
                            <?php if($this->pnpa_model->get_model_ptf(($rec->utiliti_sumber_man_id),$this->uri->segment(4))== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" checked>
                               <?php echo $rec->nama; ?>
                               </label>
                        
                        <?php }  ?> 
                               
                           
                               
                           
                        <?php endforeach;?>
                        <?php endif; ?>
              		</div>
                      </div>
                      </div>
                      <!--end div panel ptf -->





                
                <!--start div panel pif -->
            		  <div class="span6">
            		  <div class="widget">
            		    <div class="widget-header">
            		      <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PIF</div>
          		        </div>
            		    <div class="widget-body">
                                
                                <?php if(!empty($senarai_pif)) : foreach ($senarai_pif as $rec) : ?>
                                   <?php if($this->pnpa_model->get_model_ptf(($rec->utiliti_sumber_man_id),$this->uri->segment(4))== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('pif[]',$rec->utiliti_sumber_man_id); ?>" name="pif[]">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('pif[]',$rec->utiliti_sumber_man_id); ?>" name="pif[]" checked>
                               <?php echo $rec->nama; ?>
                               </label>
                        
                        <?php }  ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                </div>
          		      </div> <!--end div panel pif -->




                            </div>
                            <!--end div row ptf n pif -->




                            
                        </div>
                
                




                <!--start div row pof n pdf -->
       			<div class="row-fluid">

                




                <!--start div panel pdf -->
       			   <div class="span6">
                            <div class="widget">
                            <div class="widget-header">
                            <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PDF </div></div>
                            <div class="widget-body">
                                
                                 <?php if(!empty($senarai_pdf)) : foreach ($senarai_pdf as $rec) : ?>
                                    <?php if($this->pnpa_model->get_model_ptf(($rec->utiliti_sumber_man_id),$this->uri->segment(4))== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('pdf[]',$rec->utiliti_sumber_man_id); ?>" name="pdf[]">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('pdf[]',$rec->utiliti_sumber_man_id); ?>" name="pdf[]" checked>
                               <?php echo $rec->nama; ?>
                               </label>
                        
                        <?php }  ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                              </div>
                             </div>
                            </div>
                            <!--end div panel pif -->

                        




                        <!--start div panel pof -->
       			    <div class="span6">
       			      <div class="widget">
       			        <div class="widget-header">
       			          <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> POF</div>
                                </div>
                               <div class="widget-body">
                                  
                                  <?php if(!empty($senarai_pof)) : foreach ($senarai_pof as $rec) : ?>
                                       <?php if($this->pnpa_model->get_model_ptf(($rec->utiliti_sumber_man_id),$this->uri->segment(4))== FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('pof[]',$rec->utiliti_sumber_man_id); ?>" name="pof[]">
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('pof[]',$rec->utiliti_sumber_man_id); ?>" name="pof[]" checked>
                               <?php echo $rec->nama; ?>
                               </label>
                        
                        <?php }  ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                 </div>
                               </div><!--end div panel pif -->





                             </div>
                             <!--end div row pdf n pof -->




                        </div>
                





              <!--start div panel penilai teknikal -->
              <div class="row-fluid">
            	<div class="span12">
              	<div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Panel Penilai Teknikal</div></div>
                <div class="widget-body">
                  





                  <!--start div widget body -->
                		
                  <div class="widget-body">           
                   




                   <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">#</th>
                          <th style="width:4%">Bil</th>
                          <th style="width:10%">Kategori Id</th>
                          <th style="width:20%">Nama</th>
                          <th style="width:20%" class="hidden-phone">Nama Syarikat</th>
                          <th style="width:15%" class="hidden-phone">Surat Lantikan</th>
                          <th style="width:8%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_panel)) : foreach ($senarai_panel as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo form_error('panel_penilai[]'); ?> 
                              <?php if($this->pnpa_model->get_model_panel(($rec->utiliti_sumber_man_id),$this->uri->segment(4))== FALSE)
                                { 
                                 echo ''; 
                                    
                              ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('panel_penilai[]',$rec->utiliti_sumber_man_id); ?>" name="panel_penilai[]">
                              <?php //echo $rec->nama; ?> 
                              
                            </label>
                             <?php  }else 
                            
                              {
                                echo ''; 
                            ?>      <label class="checkbox">
                               <input type="checkbox" value="<?php echo set_value('panel_penilai[]',$rec->utiliti_sumber_man_id); ?>" name="panel_penilai[]" checked>
                               <?php //echo $rec->nama; ?>
                               </label>
                        
                                <?php }  ?></td>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php if($get_nama_panelpenilai = $this->pnpa_model->get_nama_panelpenilai($rec->disiplin_bidang_id)) foreach ($get_nama_panelpenilai as $rr) echo $rr->bidang;?></td>
                                <td><?php echo $rec->nama; ?></td>
                                <td><?php if($get_nama_panelpenilai = $this->pnpa_model->get_syarikat($rec->syarikat_id)) foreach ($get_nama_panelpenilai as $rr) echo $rr->nama_syarikat; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container"><li class="rounded">
                                      <span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                                        </ul><a href="download">Surat Lantikan.docx</a>
                                </td>
                                

                                <td class="hidden-phone">
                          <a href="<?php echo site_url('pnpa/papar_panel_penilai_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4)).'/'.$rec->utiliti_sumber_man_id; ?>">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
                          </span></li></ul></a>
                      </td>
                            

                            </tr>
                            <?php //echo form_close(); ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--END table-->






               <div class="clearfix"></div>
                </div>
                <!--end div panel penilai -->





                  </div>





          
            <!--start div pelan Komunikasi -->
             	<div class="row-fluid">
            	<div class="span12">
              <div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Panel Komunikasi Bagi Aktiviti Penilaian Aset</div></div>
                <div class="widget-body">
                    <?php $i=1; if(!empty($pelan_kom)) : foreach ($pelan_kom as $rec1) : ?>
               		<div class="control-group">
                     
                     <label>Tugas Dan Pegawai Atasan Yang Ada Kaitan &nbsp;&nbsp;&nbsp;
                      <?php echo form_input(array('name' => 'tjawabdankuasa', 'value' => set_value('tjawabdankuasa', $rec1->tugas_pegawai_atasan))); ?>
                         </label>
                    </div>
                    
                    <div class="control-group">
                       
                     <label>Tanggungjawab Dan Kuasa Yang Diberikan &nbsp;&nbsp;&nbsp;&nbsp;
                      <?php echo form_input(array('name' => 'tjawabdankuasa', 'value' => set_value('tjawabdankuasa', $rec1->tugas_pegawai_tjawab_kuasa))); ?>
                     </label>
                    </div>
                    
                    <div class="control-group">
                      
                      <label>Tugas Pegawai-Pegawai Lain Yang Ada Kaitan&nbsp;
                      <?php echo form_input(array('name' => 'pegawailain', 'value' => set_value('pegawailain', $rec1->tugas_pegawai_lain))); ?>
                      </label>
                     </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
             	</div>
            	</div>
              </div>
              <!--end div pelan komunikasi -->




          
              </div>
            	</div>
           	  </div>
              </div>
              <!--end div panel model struktur -->





                <input type='hidden' value='<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4); ?>' name='pnpa_id'/>
                
                




                <!--start div button -->
                <div align="right">
                <a href="<?php echo site_url('pnpa/summary_pof_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Kembali
                  </button></a>
   		   </div>
                <!--end div button -->
                
		 


     <!--end div tab -->




                </div>  
                </div>

              <!--end widget-body -->




                
              </div>
           </div>
         </form>
         </div>
        </div>







