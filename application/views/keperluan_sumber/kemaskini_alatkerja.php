
        <!--start div widget-body -->
        <div class="widget-body">
           <ul class="nav nav-tabs no-margin myTabBeauty">
              <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia') ?>">Sumber Manusia</a></li>
              <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/tambahpejabat') ?>">Pengurusan Pejabat</a></li>
              <li class="active"><a href="<?php echo site_url('utilitiKeperluanSumber/tambahalatkerja') ?>">Peralatan Kerja</a></li>
              
            </ul>
          <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
                <p> 
               <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                    <div class="widget-header">
                                <div class="title">
                                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Keperluan Sumber- Alat Kerja
                                </div>
                    </div> 
                    <div class="widget-body">
                   
                                 
                                    <?php if (!empty($alatkerja)) : foreach ($alatkerja as $rec) : ?> 
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
                                    <table width="95%" border="0" align="center">
                                                <tr>
                                                    <td width="17%" valign="top" height="50">
                                                        <label class="control-label">Kategori Alat Pejabat<span class="required">*</span></label>
                                                    </td>
                                                    <td width="31%"> 
                                                        <div class="">
                                                            <select class="required large" name="kat_alat_kerja_id">
                                                                <?php if($getKatAlatKerja = $this->utilitikeperluansumber_model->get_kat_alat_kerja($kat_alat_kerja_id)) : foreach ($getKatAlatKerja as $row) :?>
                                                                <option value="<?php echo $rec->kat_alat_kerja_id; ?>"><?php echo $row->alat_kerja; ?></option>
                                                                <?php endforeach; endif; ?>
                                                                
                                                                <?php if(!empty($list)) : foreach ($list as $row) : ?>
                                                                <option value="<?php echo $row->kat_alat_kerja_id; ?>"><?php echo set_value('alat_kerja', $row->alat_kerja); ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>                                            
                                                            <font color="red"><?php echo form_error('kat_alat_kerja_id'); ?></font>
                                                        </div><br>
                                                    </td>
                                                    
                                                    <td width="19%" valign="top" height="50">
                                                        <label class="control-label">Jenama<span class="required">*</span></label>
                                                    </td>
                                                    <td width="33%">
                                                        <div class="">
                                                            <?php echo form_input(array('name' => 'jenama', 'value' => set_value('jenama', $rec->jenama), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('jenama'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Spesifikasi<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'spesifikasi', 'value' => set_value('spesifikasi', $rec->spesifikasi), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('spesifikasi'); ?></font>
                                                        </div><br>
                                                    </td>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Alat Kerja Tag No<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'alat_kerja_tag_no', 'value' => set_value('alat_kerja_tag_no', $rec->alat_kerja_tag_no), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('alat_kerja_tag_no'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                                <tr>
                                                    <td width="19%" valign="top">
                                                        <label class="control-label">Kos Seunit<span class="required">*</span></label>
                                                   </td>
                                                <td><div class="">
                                                            <?php echo form_input(array('name' => 'kos_seunit', 'value' => set_value('kos_seunit', $rec->kos_seunit), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('kos_seunit'); ?></font>
                                                        </div><br>
                                                  </td></tr>
                                </table>
                                    <div class="next-prev-btn-container pull-right">
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

               <div class="clearfix"></div>
                </div>
                </div>
                </div> 
 