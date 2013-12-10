<?php
$sessionarray = $this->session->all_userdata();
//$kand_id = array();
//$kand_detail = array();

$check_row = NULL;

if($this->uri->segment(3) != NULL){
	if(count($this->pnpa_model->get_model_from_segment(($this->uri->segment(3)))) == 0){
		//echo '<script>alert("Display Field Baru")< /script>';
		
		$check_row = 0;
                $ptf = array('');
        $pif = array('');
        $pdf = array('');
        $pof = array('');
        $panel_penilai = array('');
        $pegawaikaitan='';
        $tjawabdankuasa='';
        $pegawailain= '';


	}else{
		
		$check_row = 1;
		
		foreach($this->pnpa_model->get_model_from_segment(($this->uri->segment(3))) as $row){
			//$kand_id[] = $row->kandungan_id;
			//$kand_detail[] = $row->kand_utama_detail;
                        $pnpa_pata_f8_1a_modelstruktur_id = $row->pnpa_pata_f8_1a_modelstruktur_id;
			$ptf[] = $row->utiliti_sumber_man_id;
			$pif[] = $row->utiliti_sumber_man_id;
                        $pdf[] = $row->utiliti_sumber_man_id;
                        $pof[] = $row->utiliti_sumber_man_id;
                        $panel_penilai[] = $row->utiliti_sumber_man_id;
                        $pegawaikaitan= $row->tugas_pegawai_atasan;
                        $tjawabdankuasa= $row->tugas_pegawai_tjawab_kuasa;
                        $pegawailain= $row->tugas_pegawai_lain;
                         $pnpa_id= $row->pnpa_id;
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
     <?php 
	$form_name = 'pnpa/model_struktur_pnpa';
	if($this->uri->segment(3) != NULL){$form_name = 'pnpa/model_struktur_pnpa/'.$this->uri->segment(3);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'model_struktur_pnpa');
	echo form_open($form_name, $attributes);
?>
<?php 
	//echo form_hidden($kand_utama_bil);
	//echo form_hidden($kand_utama);
	$sunting = array('sunting'=>NULL);
	if($this->uri->segment(3) != NULL){
		$sunting = array('sunting'=>$this->uri->segment(3));
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
         <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
         <p>
         <form action='<?php echo site_url(); ?>pnpa/model_struktur_pnpa/<?php echo $this->uri->segment(3); ?>' method='post'>
           <!--start div panel Model struktur -->           
           <div class="row-fluid">
           <div class="span12">
           <div class="widget">
           <div class="widget-header">
           <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Model Struktur Penilaian Aset Di Premis
            </div>
            </div>
             <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='no' >

               <div class="widget-body"> 
                
                <!--start div row ptf n pif -->
       		<div class="row-fluid">

                <!--start div panel ptf -->
                    <div class="span6">
                    <div class="widget">
                    <div class="widget-header">
                      <div class="title">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PTF
                      </div></div>
                       <div class="widget-body">
                      
                         <?php if(!empty($senarai_ptf)) : foreach ($senarai_ptf as $rec) : ?>
                            <?php if($this->pnpa_model->get_model_ptf(($rec->utiliti_sumber_man_id),$this->uri->segment(3))== FALSE)
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
                      </div><!--end div panel ptf -->
                
                <!--start div panel pif -->
            		  <div class="span6">
            		  <div class="widget">
            		    <div class="widget-header">
            		      <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PIF</div>
          		        </div>
            		    <div class="widget-body">
                                
                                <?php if(!empty($senarai_pif)) : foreach ($senarai_pif as $rec) : ?>
                                   <?php if($this->pnpa_model->get_model_ptf(($rec->utiliti_sumber_man_id),$this->uri->segment(3))== FALSE)
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
                            </div><!--end div row ptf n pif -->
                            
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
                                    <?php if($this->pnpa_model->get_model_ptf(($rec->utiliti_sumber_man_id),$this->uri->segment(3))== FALSE)
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
                            </div><!--end div panel pif -->

                        <!--start div panel pof -->
       			    <div class="span6">
       			      <div class="widget">
       			        <div class="widget-header">
       			          <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> POF</div>
                                </div>
                               <div class="widget-body">
                                  
                                  <?php if(!empty($senarai_pof)) : foreach ($senarai_pof as $rec) : ?>
                                       <?php if($this->pnpa_model->get_model_ptf(($rec->utiliti_sumber_man_id),$this->uri->segment(3))== FALSE)
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
                             </div><!--end div row pdf n pof -->
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
                            <ul class="icomoon-icons-container">
                            <li><a href="#myModal"  data-toggle="modal">
                            <span class="fs1" data-icon="&#xe102;" aria-hidden="true"></span>
                            </a></li></ul><label class="tambah"> Tambah Panel Penilai Teknikal</label>

                    <div class="controls2">
                    </div>          <!--table-->
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
                              <?php if($this->pnpa_model->get_model_panel(($rec->utiliti_sumber_man_id),$this->uri->segment(3))== FALSE)
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
                                <td align="center">
                                  <ul class="icomoon-icons-container"><li class="rounded">
                                    <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                                      </ul>
                            </tr>
                            <?php //echo form_close(); ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--END table-->
               <div class="clearfix"></div>
                </div>
                </div>
                <!--end div panel penilai -->
          
            <!--start div pelan Komunikasi -->
             	<div class="row-fluid">
            	<div class="span12">
              <div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Panel Komunikasi Bagi Aktiviti Penilaian Aset</div></div>
                <div class="widget-body">
               		<div class="control-group">
                     <font color="red"><?php echo form_error('pegawaikaitan'); ?></font> 
                     <label>Tugas Dan Pegawai Atasan Yang Ada Kaitan &nbsp;&nbsp;&nbsp;
                      <?php //$pegawaikaitan='';
                            if($this->input->post('pegawaikaitan') !=NULL){
                                    $pegawaikaitan = $this->input->post('pegawaikaitan');
                            }
                       ?> 
                      <?php echo form_input(array('name' => 'pegawaikaitan', 'value' => $pegawaikaitan, 'class' => 'input-xxlarge')); ?>
                         </label>
                    </div>
                    
                    <div class="control-group">
                     <font color="red"><?php echo form_error('tjawabdankuasa'); ?></font>  
                     <label>Tanggungjawab Dan Kuasa Yang Diberikan &nbsp;&nbsp;&nbsp;&nbsp;
                      <?php  //$tjawabdankuasa='';
                            if($this->input->post('tjawabdankuasa') !=NULL){
                                    $tjawabdankuasa = $this->input->post('tjawabdankuasa');
                            }
                       ?> 
                    <?php echo form_input(array('name' => 'tjawabdankuasa', 'value' => $tjawabdankuasa, 'class' => 'input-xxlarge')); ?>
                     </label>
                    </div>
                    
                    <div class="control-group">
                      <font color="red"><?php echo form_error('pegawailain'); ?></font> 
                      <label>Tugas Pegawai-Pegawai Lain Yang Ada Kaitan&nbsp;
                       <?php //$pegawailain='';
                            if($this->input->post('pegawailain') !=NULL){
                                    $pegawailain = $this->input->post('pegawailain');
                            }
                       ?> 
                      <?php echo form_input(array('name' => 'pegawailain', 'value' => $pegawailain, 'class' => 'input-xxlarge')); ?>
                      </label>
                     </div>
                  </div>
             	</div>
            	</div>
              </div><!--end div pelan komunikasi -->
          
              </div>
            	</div>
           	  </div>
              </div><!--end div panel model struktur -->
                <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='pnpa_id'/>
                <!--start div button -->
                <div align="right">
                <button class="btn btn-danger input-top-margin" type="button">
                        Batal
                  </button>
                     <a href="<?php echo site_url('pnpa/kandungan_pnpa/'.$this->uri->segment(3)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Sebelum
                      </button></a>
                      <input type="submit" value="Seterusnya" class="btn btn-primary">
   		   </div><!--end div button -->
		 <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                
              </div>
           </div>
         </form>
         </div>
        </div>

         <!-- popup tambah panel penilai teknikal -->
         
          <form id="" class="" action="<?php echo site_url(); ?>/pnpa/tambahpanel" method="post"> 
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Tambah Panel Penilai
                      </h4>
                      </div>
                      <!--start div modal body -->
                       <div class="modal-body">
                             <input type='hidden' value='<?php echo $this->uri->segment(3); ?>' name='no' >
                                <table width="95%" border="0" align="center">
                                            
                                           <tr>
                                                   <td width="17%" valign="top"><label class="control-label">Nama<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'nama', 'value' => set_value('nama', $this->session->userdata('nama')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nama'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                 
                                                <tr>
                                                <td width="19%" valign="top" height="50"><label class="control-label">Nama Syarikat<span class="required"></span></label></td>
                                                <td width="33%">
                                                    <div class=""><select class="required large" name="syarikat_id">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($syarikat)) : foreach ($syarikat as $rec) : ?>
                                                        <option value="<?php echo $rec->syarikat_id; ?>"><?php echo set_value('nama_syarikat', $rec->nama_syarikat); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                                    </div><br>
                                                </td>
                                            </tr>
                                                
                                                 <tr>
                                                   <td width="17%" valign="top"><label class="control-label">No Kad Pengenalan<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'noic', 'value' => set_value('noic', $this->session->userdata('noic')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('noic'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                            <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Jawatan<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'jawatan', 'value' => set_value('jawatan', $this->session->userdata('jawatan')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('jawatan'); ?></font>
                                                        </div><br>
                                                  </td>
                                             </tr>
                                               
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Disiplin/Bidang<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class=""><select class="required large" name="disiplin">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($disiplin)) : foreach ($disiplin as $rec) : ?>
                                                        <option value="<?php echo $rec->disiplin_bidang_id; ?>"><?php echo set_value('kategori', $rec->bidang); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                                    </div><br>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                   <td width="17%" valign="top"><label class="control-label">Gaji<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'gaji', 'value' => set_value('gaji', $this->session->userdata('gaji')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('gaji'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Kos Lebih Masa<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'koslebihmasa', 'value' => set_value('koslebihmasa', $this->session->userdata('koslebihmasa')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('koslebihmasa'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                            <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Surat Lantikan<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'name', 'value' => set_value('nama_fail_asal', $this->session->userdata('nama_fail_asal')), 'class' => 'large required')); ?>
                                                          <font color="red"><?php echo form_error('nama_fail_asal1'); ?></font>
                                                      </div><br>
                                                  </td>
                                                </tr>

                                                <input type="hidden" name="sumber_id" value="2"> <input type="hidden" name="peranan" value="10">
                                                       
                                </table>
                                   
                              
                          
                          </div><!--end div modal body -->
                         
                               <div class="modal-footer">
                                <input type="submit" value="Simpan" class="btn btn-warning2">
                              
                             </div>
                 
               <!--end div tab -->
                </div> 
             </form>
