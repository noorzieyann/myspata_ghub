<!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
                <p> 
               <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                    <div class="widget-header">
                                <div class="title">
                                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kemaskini Maklumat Panel Penilai Teknikal
                                </div>
                    </div> 
                        
                    <div class="widget-body">
                   
                       <?php if (!empty($senarai_panel2)) : foreach ($senarai_panel2 as $rec) : ?>
                         <?php 
                            echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

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
                                     
                                    <form id="" class="" action="<?php echo site_url() ?>/pnpa/kemaskinipanel_penilai_pnpa2/<?php echo $this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5) ?>" method="post">
                                    <table width="" border="0" align="center">
                                                <tr>
                                                   <td width="15%" valign="top">
                                                        <label class="control-label">Nama<span class="required">*</span></label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <?php echo form_input(array('name' => 'nama1', 
                                                                                        'value' => set_value('nama1', $rec->nama), 
                                                                                        'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('nama1'); ?></font>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Nama Syarikat<span class="required">*</span></label>
                                                   </td>
                                                   <td width="30%">
                                                    <div class="">
                                                        <select class="input-xlarge required" name="syarikat_id1">
                                                                
                                                                <?php if($getUrusSya = $this->pnpa_model->get_syarikat($rec->syarikat_id)) : foreach ($getUrusSya as $row) :?>
                                                                <option value="<?php echo $rec->syarikat_id; ?>"><?php echo $row->nama_syarikat; ?></option>
                                                                <?php endforeach; endif;
                                                                //die(); ?>
                                                                
                                                                <?php if(!empty($syarikat)) : foreach ($syarikat as $rw) : ?>
                                                                <option value="<?php echo $rec->syarikat_id; ?>"><?php echo set_value('nama_syarikat', $rw->nama_syarikat); ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                                
                                                            </select> 
       
                                                        </div>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td width="15%" valign="top">
                                                        <label class="control-label">No Kad Pengenalan<span class="required">*</span></label>
                                                   </td>
                                                   <td width="30%">
                                                    <div class="">
                                                            <?php echo form_input(array('name' => 'noic', 'value' => set_value('nric', $rec->nric), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('noic'); ?></font>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Jawatan<span class="required">*</span></label>
                                                   </td>
                                                   <td> 
                                                    <div class="">
                                                            <?php echo form_input(array('name' => 'jawatan1', 'value' => set_value('jawatan', $rec->jawatan), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('jawatan1'); ?></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                        
                                        
                                                <tr>
                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Disiplin/Bidang<span class="required">*</span></label>
                                                    </td>
                                                    <td width="30%"> 
                                                        <div class="">
                                                            <select class="input-xlarge required" name="disiplin_bidang_id1">
                                                                
                                                                <?php if($get_nama_panelpenilai = $this->pnpa_model->get_nama_panelpenilai($rec->disiplin_bidang_id)) : foreach ($get_nama_panelpenilai as $row) :?>
                                                                <option value="<?php echo $rec->disiplin_bidang_id; ?>"><?php echo $row->bidang; ?></option>
                                                                <?php endforeach; endif;
                                                                //die(); ?>
                                                                
                                                                <?php if(!empty($disiplin)) : foreach ($disiplin as $rw) : ?>
                                                                <option value="<?php echo $rec->disiplin_bidang_id; ?>"><?php echo set_value('bidang', $rw->bidang); ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>                                       
                                                            <font color="red"><?php echo form_error('disiplin_bidang_id'); ?></font>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Gaji<span class="required">*</span></label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <?php echo form_input(array('name' => 'gaji1', 'value' => set_value('gaji', $rec->gaji), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('gaji1'); ?></font>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                   <td width="15%" valign="top">
                                                        <label class="control-label">Kos Lebih Masa<span class="required">*</span></label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <?php echo form_input(array('name' => 'koslebihmasa1', 'value' => set_value('kos_kerja_lebih_masa', $rec->kos_kerja_lebih_masa), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('koslebihmasa1'); ?></font>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Surat Lantikan<span class="required">*</span></label>
                                                    </td>
                                                    <td><div class="controls"><?php echo form_input(array('type' => 'file', 'name' => 'userfile', 'id' => 'userfile','value' => '', 'class' => 'large required')); ?>
                                                          <font color="red"><?php echo form_error('nama_fail_asal1'); ?></font>
                                                      </div><br>
                                                  </td>
                                                </tr>
                                            </table>
                                            <input type="hidden" name="no" value="<?php echo $rec->utiliti_sumber_man_id; ?>">

                                    <div class="next-prev-btn-container pull-right">
                                        <a href="<?php echo site_url('pnpa/model_struktur_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                                                Kembali
                                          </button></a>
                                    <input type="submit" value="Kemaskini" class="btn btn-primary">
                                        
                                    </div>
                                </form>
                                <?php endforeach; ?>
                                <?php endif; ?>
                <div class="clearfix">
                    </div></div>
               </div>
               </div>
                </div>
             <!--start panel Senarai -->
         <?php //echo '<pre>'; print_r($this->session->all_userdata()); echo '</pre>'; ?>      
                <!--end panel Senarai --> 
               <div class="clearfix"></div>
                </div>
                </div>
                </div> 

              <!--end widget-body -->