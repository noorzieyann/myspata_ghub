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
                                     
                                    <form id="" class="" action="" method="post">
                                        <?php $sessionarray = $this->session->all_userdata();?>
                                    <table width="95%" border="0" align="center">
                                        
                                                <tr>
                                                    <td width="17%" valign="top" height="50">
                                                        <label class="control-label">Kementerian<span class="required"></span></label>
                                                    </td>
                                                    <td width="31%"> 
                                                        <input class="input-large" type="text"  placeholder="<?php echo $sessionarray['user_kementerian'];?>" disabled>
                                                        <input class="input-large" type="hidden" name="kementerian" value="<?php echo $sessionarray['user_kemid'];?>" >
                                                    </td>
                                                    
                                                    <td width="19%" valign="top" height="50">
                                                        <label class="control-label">Jabatan/Agensi<span class="required"></span></label>
                                                    </td>
                                                    <td width="33%">
                                                        <select class="required large" name="jabatan">
                                                            
                                                                <?php if($getjabatan = $this->pnpa_model->get_jab_agensi($rec->idjab_agensi)) : foreach ($getjabatan as $rw) :?>
                                                                <option value="<?php echo $rec->idjab_agensi; ?>"><?php echo $rw->nama_jab_agensi; ?></option>
                                                                <?php endforeach; endif; ?>
                                                                
                                                                <?php if(!empty($jabatan)) : foreach ($jabatan as $rd) : ?>
                                                                <option value="<?php echo $rec->idjab_agensi; ?>"><?php echo set_value('nama_jab_agensi', $rd->nama_jab_agensi); ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                        
                                                            </select>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Negeri<span class="required"></span></label>
                                                   </td>
                                                   <td> <select class="required large" name="negeri">
                                                                <?php if($getNegeri = $this->utilitikeperluansumber_model->get_negeri($rec->idnegeri)) : foreach ($getNegeri as $re) :?>
                                                                <option value="<?php echo $rec->idnegeri; ?>"><?php echo $re->namanegeri; ?></option>
                                                                <?php endforeach; endif; ?>
                                                                
                                                                <?php if(!empty($negeri)) : foreach ($negeri as $rk) : ?>
                                                        <option value="<?php echo $rec->idnegeri; ?>"><?php echo set_value('namanegeri', $rk->namanegeri); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  
                                                    </td>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Daerah<span class="required"></span></label>
                                                   </td>
                                                   <td><select class="required large" name="daerah">
                                                                <?php if($getDaerah = $this->utilitikeperluansumber_model->get_daerah_2($rec->iddaerah, $rec->idnegeri)) : foreach ($getDaerah as $rq) :?>
                                                                <option value="<?php echo $rec->iddaerah; ?>"><?php echo $rq->nama_daerah; ?></option>
                                                                <?php endforeach; endif; ?>
                                                                
                                                                <?php if(!empty($daerah)) : foreach ($daerah as $rf) : ?>
                                                        <option value="<?php echo $rec->iddaerah; ?>"><?php echo set_value('nama_daerah', $rf->nama_daerah); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  
                                                  </td>
                                                </tr>
                                               <tr>
                                                    <td colspan='4'><hr></td>
                                                </tr>
                                               
                                                <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Nama<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'nama', 
                                                                                        'value' => set_value('nama', $rec->nama),       
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nama'); ?></font>
                                                        </div><br>
                                                    </td>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">No Kad Pengenalan<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'noic', 
                                                                                        'value' => set_value('noic', $rec->nric), 
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('noic'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Peranan<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                          <select class="required large" name="peranan">
                                                                <?php if($getKementerin = $this->utilitikeperluansumber_model->get_peranan($rec->kump_pengguna)) : foreach ($getKementerin as $rx) :?>
                                                                <option value="<?php echo $rec->kump_pengguna; ?>"><?php echo $rx->nama_kump_pengguna; ?></option>
                                                                <?php endforeach; endif; ?>
                                                                
                                                                <?php if(!empty($peranan)) : foreach ($peranan as $rl) : ?>
                                                        <option value="<?php echo $rec->kump_pengguna; ?>"><?php echo set_value('nama_kump_pengguna', $rl->nama_kump_pengguna); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  </div><br>
                                                    </td>
                                                     <td width="17%" valign="top">
                                                        <label class="control-label">Peringkat<span class="required">*</span></label>
                                                   </td>
                                                   <td><select class="required large" name="level">
                                                                <?php if($getKementerin = $this->utilitikeperluansumber_model->get_level($rec->level_id)) : foreach ($getKementerin as $rk) :?>
                                                                <option value="<?php echo $rec->level_id; ?>"><?php echo $rk->level_desc; ?></option>
                                                                <?php endforeach; endif; ?>
                                                                
                                                                <?php if(!empty($level)) : foreach ($level as $rm) : ?>
                                                        <option value="<?php echo $rec->level_id; ?>"><?php echo set_value('level_desc', $rm->level_desc); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Jawatan<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'jawatan', 
                                                                                        'value' => set_value('jawatan', $rec->jawatan), 
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('jawatan'); ?></font>
                                                        </div><br>
                                                  </td>
                                                <td width="17%" valign="top">
                                                        <label class="control-label">Gred Jawatan<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'gredjawatan', 
                                                                                        'value' => set_value('gredjawatan', $rec->gred_jawatan), 
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('gredjawatan'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Disiplin/Bidang<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                             <select class="required large" name="disiplin">
                                                                <?php if($getbidang = $this->utilitikeperluansumber_model->get_disiplin($rec->disiplin_bidang_id)) : foreach ($getbidang as $rv) :?>
                                                                <option value="<?php echo $rec->disiplin_bidang_id; ?>"><?php echo $rv->bidang; ?></option>
                                                                <?php endforeach; endif; ?>
                                                                
                                                                <?php if(!empty($disiplin)) : foreach ($disiplin as $rf) : ?>
                                                        <option value="<?php echo $rec->disiplin_bidang_id; ?>"><?php echo set_value('kategori', $rf->bidang); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  </div><br>
                                                  </td><td width="17%" valign="top">
                                                       <label class="control-label">Gaji (RM)<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'gaji', 
                                                                                        'value' => set_value('gaji', $rec->gaji), 
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('gaji'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Kos Lebih Masa (RM)<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'koslebihmasa', 
                                                                                        'value' => set_value('koslebihmasa', $rec->kos_kerja_lebih_masa), 
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('koslebihmasa'); ?></font>
                                                        </div><br>
                                                  </td>
                                                  <tr>
                                                  
                                                   <td width="19%" valign="top">
                                                        
                                                   </td>
                                                   <td></td>
                                                </tr>
                                </table>
                                    <div class="next-prev-btn-container pull-right">
                                        <a href="<?php echo site_url('pnpa/model_struktur_pnpa_edit_ppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                                                Kembali
                                          </button></a>
                                        <input type="submit" value="Kemaskini" class="btn btn-primary">
                                        
                                    </div>
                                </form>
                                <?php endforeach; ?>
                                <?php endif; ?>
                <div class="clearfix">
                    </div>
                    </div>
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