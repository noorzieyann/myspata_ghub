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
                                    <table width="" border="0" align="center">
                                                <tr>
                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Kategori<span class="required">*</span></label>
                                                    </td>
                                                    <td width="30%"> 
                                                        <div class="">
                                                            <select class="input-xlarge required" name="panel_penilai_kategori_id">
                                                                
                                                                <?php if($getKatpen = $this->ptra_model->get_kat_penilai($rec->panel_penilai_kategori_id)) : foreach ($getKatpen as $row) :?>
                                                                <option value="<?php echo $rec->panel_penilai_kategori_id; ?>"><?php echo $row->kategori; ?></option>
                                                                <?php endforeach; endif;
                                                                //die(); ?>
                                                                
                                                                <?php if(!empty($list_namapanel)) : foreach ($list_namapanel as $rw) : ?>
                                                                <option value="<?php echo $rec->panel_penilai_kategori_id; ?>"><?php echo set_value('kategori', $rw->kategori); ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>                                       
                                                            <font color="red"><?php echo form_error('panel_penilai_kategori_id'); ?></font>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">No. Telefon Pejabat<span class="required">*</span></label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <?php echo form_input(array('name' => 'notel_pej', 'value' => set_value('no_tel_pej', $rec->no_tel_pej), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('notel_pej'); ?></font>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                   <td width="15%" valign="top">
                                                        <label class="control-label">Nama<span class="required">*</span></label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <?php echo form_input(array('name' => 'nama_penilai1', 'value' => set_value('nama_penilai', $rec->nama_penilai), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('nama_penilai1'); ?></font>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">No. Telefon Bimbit<span class="required">*</span></label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <?php echo form_input(array('name' => 'notel_bimbit', 'value' => set_value('no_tel_bimbit', $rec->no_tel_bimbit), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('notel_bimbit'); ?></font>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Nama Syarikat<span class="required">*</span></label>
                                                   </td>
                                                   <td width="30%">
                                                    <div class="">
                                                            <?php echo form_input(array('name' => 'nama_syarikat1', 'value' => set_value('nama_syarikat', $rec->nama_syarikat), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('nama_syarikat1'); ?></font>
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
                                                        <label class="control-label">E-mel<span class="required">*</span></label>
                                                   </td>
                                                   <td> 
                                                    <div class="">
                                                            <?php echo form_input(array('name' => 'emel', 'value' => set_value('email', $rec->email), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('emel'); ?></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                </table>
                                    <div class="next-prev-btn-container pull-right">
                                        <a href="<?php echo site_url('ptra/model_struktur_ptra_editppd')?>"><button class="btn btn-primary input-top-margin" type="submit">
                                            Kemaskini</button></a>
                                        <input type="reset" value="Reset" class="btn ">
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
            
   