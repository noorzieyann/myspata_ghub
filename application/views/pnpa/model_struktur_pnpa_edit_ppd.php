<?php
$sessionarray = $this->session->all_userdata();


 if($this->uri->segment(5) != NULL){

   foreach($this->pnpa_model->get_pelan_kom(($this->uri->segment(4))) as $row){

   $pegawaikaitan= $row->tugas_pegawai_atasan;
   echo "ss=".$pegawaikaitan;
   $tjawabdankuasa= $row->tugas_pegawai_tjawab_kuasa;
   //echo $tjawabdankuasa;
   $pegawailain= $row->tugas_pegawai_lain;
  // echo $pegawailain;
   }



}else{

          $ptf = array('');
        $pif = array('');
        $pdf = array('');
        $pof = array('');
        $panel_penilai = array('');
  $pegawaikaitan='';
  $pegawailain='';
  $tjawabdankuasa='';
}

?>  
<?php 
                       // echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

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
  $form_name = 'pnpa/model_struktur_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
  if($this->uri->segment(5) != NULL){$form_name = 'pnpa/model_struktur_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
  $attributes = array('class' => 'form-horizontal no-margin', 'id' => 'model_struktur_pnpa_edit_ppd');
  echo form_open($form_name, $attributes);
?>
<?php 

  $sunting = array('sunting'=>NULL);
  if($this->uri->segment(5) != NULL){
    $sunting = array('sunting'=>$this->uri->segment(4));
      echo form_hidden($sunting);
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
         <!--form action='<?php echo site_url(); ?>pnpa/model_struktur_pnpa/<?php echo $this->uri->segment(3); ?>' method='post'-->
           <!--start div panel Model struktur -->           
           <div class="row-fluid">
           <div class="span12">
           <div class="widget">
           <div class="widget-header">
           <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Model Struktur Penilaian Aset Di Premis
            </div>
            </div>
             <input type='hidden' value='<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4); ?>' name='no' >

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
                      </div><!--end div panel ptf -->
                
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
                            </div><!--end div panel pif -->

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
                             </div><!--end div row pdf n pof -->
                        </div>
                   
              <!--start div panel penilai teknikal -->
              <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Panel Penilai Teknikal (Dalaman)</div></div>
              
                  <!--start div widget body -->
                    <div class="widget-body">
                            <ul class="icomoon-icons-container">
                            <li><a href="#myModal1"  data-toggle="modal">
                            <span class="fs1" data-icon="&#xe102;" aria-hidden="true"></span>
                            </a></li></ul><label class="tambah"> Tambah Panel Penilai Teknikal (Dalaman)</label>

                    <div class="clearfix"></div> 
                    
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">#</th>
                          <th style="width:4%">Bil</th>
                          <th style="width:10%">Kategori</th>
                          <th style="width:20%">Nama</th>
                          <th style="width:20%" class="hidden-phone">Kementerian</th>
                          <th style="width:15%" class="hidden-phone">Jabatan</th>
                         <th style="width:15%" class="hidden-phone">Peringkat</th>
                          <th style="width:8%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_panel1)) : foreach ($senarai_panel1 as $rec) : ?>
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
                                <td><?php if($getKem = $this->pnpa_model->get_kem($rec->idkem)) foreach ($getKem as $rr) echo $rr->namakem;?></td>
                                <td><?php if($getjab = $this->pnpa_model->get_jab_agensi($rec->idjab_agensi)) foreach ($getjab as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td><?php if($getLevel = $this->pnpa_model->get_level($rec->level_id)) foreach ($getLevel as $rr) echo $rr->level_desc;?></td>
                                <td align="center">
                                  <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php echo site_url(); ?>/pnpa/kemaskinipanel_penilai_pnpa_ppd/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php echo $rec->utiliti_sumber_man_id; ?>"></a>
                                    </span></li></ul>
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
                   </div>
              </div>
              </div>
                <!--end div panel penilai -->
         
    
              <!--start div panel penilai teknikal -->
              <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Panel Penilai Teknikal (Luaran)</div></div>
                
                  <!--start div widget body -->
                    <div class="widget-body">
                            <ul class="icomoon-icons-container">
                            <li><a href="#myModal"  data-toggle="modal">
                            <span class="fs1" data-icon="&#xe102;" aria-hidden="true"></span>
                            </a></li></ul><label class="tambah"> Tambah Panel Penilai Teknikal (Luaran)</label>

                    <div class="clearfix"></div> 
                    
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table2">    
                      <thead>
                        <tr>
                          <th style="width:4%">#</th>
                          <th style="width:4%">Bil</th>
                          <th style="width:10%">Kategori</th>
                          <th style="width:20%">Nama</th>
                          <th style="width:20%" class="hidden-phone">Nama Syarikat</th>
                          <th style="width:15%" class="hidden-phone">Surat Lantikan</th>
                          <th style="width:8%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_panel2)) : foreach ($senarai_panel2 as $rec) : ?>
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
                                <td align="center">
                                  <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php echo site_url(); ?>/pnpa/kemaskinipanel_penilai_pnpa_ppd2/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php echo $rec->utiliti_sumber_man_id; ?>"></a>
                                    </span></li></ul>
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
                  
                </div>
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

                  <?php $i=1; if(!empty($pelan_kom)) : foreach ($pelan_kom as $rec1) : ?>
                  <div class="control-group">
                     
                     <label>Tugas Dan Pegawai Atasan Yang Ada Kaitan &nbsp;&nbsp;&nbsp;
                      <?php echo form_input(array('class' => 'input-xxlarge required', 'name' => 'tjawabdankuasa', 'value' => set_value('tjawabdankuasa', $rec1->tugas_pegawai_atasan))); ?>
                         </label>
                    </div>
                    
                    <div class="control-group">
                       
                     <label>Tanggungjawab Dan Kuasa Yang Diberikan &nbsp;&nbsp;&nbsp;&nbsp;
                      <?php echo form_input(array('class' => 'input-xxlarge required', 'name' => 'tjawabdankuasa', 'value' => set_value('tjawabdankuasa', $rec1->tugas_pegawai_tjawab_kuasa))); ?>
                     </label>
                    </div>
                    
                    <div class="control-group">
                      
                      <label>Tugas Pegawai-Pegawai Lain Yang Ada Kaitan&nbsp;
                      <?php echo form_input(array('class' => 'input-xxlarge required', 'name' => 'pegawailain', 'value' => set_value('pegawailain', $rec1->tugas_pegawai_lain))); ?>
                      </label>
                     </div>
                     <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
              </div>
              </div>
              </div><!--end div pelan komunikasi -->
          
              </div>
              </div>
              </div>
              </div><!--end div panel model struktur -->
                <input type='hidden' value='<?php echo $this->uri->segment(4); ?>' name='pnpa_id'/>
                <!--start div button -->
                <div align="right">
                <a href="<?php echo site_url('pnpa/summary_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Kembali
                  </button></a>
                     <?php
                        $simpan = array(
                            'name'    => 'simpan',
                            'id'      => 'simpan',
                            'class'   => 'btn btn-warning2',
                            'value'   => '',
                            'type'    => 'submit',
                            'content' => 'Simpan'
                        );

                        echo form_button($simpan);
                        
                        ?>
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

         <!-- popup tambah panel penilai teknikal -->
         
                    <?php echo form_open_multipart('pnpa/tambahpanel/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>
          
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
                             <input type='hidden' value='<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5); ?>' name='param' >
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
                                                   <td><div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'userfile', 'id' => 'userfile','value' => '', 'class' => 'large required')); ?>
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
 <?php echo form_open_multipart('pnpa/tambahsumbermanusia/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>
            <div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Tambah Sumber Manusia
                      </h4>
                      </div>
                      <!--start div modal body -->
                      <div class="modal-body">
                          
                              <?php $sessionarray = $this->session->all_userdata();?>
                                <table width="95%" border="0" align="center">
                                            <tr>
                                                <td width="17%" valign="top" height="50">
                                                    <label class="control-label">Kementerian<span class="required"></span></label>
                                                </td>
                                                <td width="31%"> 
                                                    <div class="">
                                                   <input class="input-large" type="text"  placeholder="<?php echo $sessionarray['user_kementerian'];?>" disabled>
                      <input class="input-large" type="hidden" name="kementerian" value="<?php echo $sessionarray['user_kemid'];?>" >
                                                    </div><br>
                                                </td>
                                            </tr>
<tr>                                        <tr>
                                                <td width="19%" valign="top" height="50"><label class="control-label">Jabatan<span class="required"></span></label></td>
                                                <td width="33%">
                                                    <div class=""><select class="required large" name="jabatan">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($jabatan)) : foreach ($jabatan as $rec) : ?>
                                                        <option value="<?php echo $rec->idjab_agensi; ?>"><?php echo set_value('nama_jab_agensi', $rec->nama_jab_agensi); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                                    </div><br>
                                                </td>
                                            </tr>
                                            <tr><?php $cities['#'] = 'SILA PILIH'; ?>
                                                <td width="19%" valign="top" height="50"><label class="control-label">Negeri<span class="required"></span></label></td>
                                                <td width="33%">
                                                    <div class=""><?php echo form_dropdown('negeri', $countries, '#', 'id="country"'); ?>
                                                    </div><br>
                                                </td>
                                            </tr>
                                    
                                            <tr>
                                                <td width="19%" valign="top" height="50"><label class="control-label">Daerah<span class="required"></span></label></td>
                                                <td width="33%">
                                                    <div class=""><?php echo form_dropdown('daerah', $cities, '#', 'id="cities"'); ?>
                                                    </div><br>
                                                </td>
                                            </tr>
                                           
                                           <tr><td colspan='2' ><hr></td></tr>
                                           <tr>
                                                   <td width="17%" valign="top"><label class="control-label">Nama<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'nama', 'value' => set_value('nama', $this->session->userdata('nama')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nama'); ?></font>
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
                                                <td width="19%" valign="top" height="50"><label class="control-label">Peranan<span class="required"></span></label></td>
                                                <td width="33%">
                                                    <div class=""><select class="required large" name="peranan">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($peranan)) : foreach ($peranan as $rec) : ?>
                                                        <option value="<?php echo $rec->kump_pengguna; ?>"><?php echo set_value('nama_kump_pengguna', $rec->nama_kump_pengguna); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                                    </div><br>
                                                </td>
                                            </tr>
                                             
                                            <tr>
                                                <td width="19%" valign="top" height="50"><label class="control-label">Peringkat<span class="required"></span></label></td>
                                                <td width="33%">
                                                    <div class=""><select class="required large" name="level">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($level)) : foreach ($level as $rec) : ?>
                                                        <option value="<?php echo $rec->level_id; ?>"><?php echo set_value('level_desc', $rec->level_desc); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
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
                                                   <td width="17%" valign="top"><label class="control-label">Gred Jawatan<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'gredjawatan', 'value' => set_value('gredjawatan', $this->session->userdata('gredjawatan')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('gredjawatan'); ?></font>
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
                                                <input type="hidden" name="sumber_id" value="1">
                                </table>
                                   
<script type="text/javascript" src="<?php echo base_url() . 'asset/js/jquery.min.js'; ?>"></script>        
<script type="text/javascript">// <![CDATA[
    $(document).ready(function(){       
        $('#country').change(function(){ //any select change on the dropdown with id country trigger this code         
            $("#cities > option").remove(); //first of all clear select items
            var idnegeri = $('#country').val();  // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                //url: "http://myspata.narsb.com/myspata/index.php/utilitiKeperluanSumber/get_cities/"+idnegeri, //here we are calling our user controller and get_cities method with the country_id
               url: "<?php echo site_url(); ?>/utilitiKeperluanSumber/get_cities/"+idnegeri, //here we are calling our user controller and get_cities method with the country_id
               
                success: function(cities) //we're calling the response json array 'cities'
                {
                    $.each(cities,function(id,city) //here we're doing a foeach loop round each city with id as the key and city as the value
                    {
                        var opt = $('<option />'); // here we're creating a new select option with for each city
                        opt.val(id);
                        opt.text(city);
                        $('#cities').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
                    });
                    
                }
                 
            });
             
        });
    });
    // ]]>
</script>
                          
                          </div><!--end div modal body -->
                         
                               <div class="modal-footer">
                                <input type="submit" value="Simpan" class="btn btn-warning2">
                              
                             </div>
                 
               <!--end div tab -->
                </div> 
             </form> 