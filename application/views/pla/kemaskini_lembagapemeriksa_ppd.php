<!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
                <p> 
               <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                    <div class="widget-header">
                                <div class="title">
                                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kemaskini Maklumat Ahli Lembaga Pemeriksaan (Pelulusan)
                                </div>
                    </div> 
                    <div class="widget-body">
                   
                                    <?php if (!empty($senarai_lembagapemeriksa2)) : foreach ($senarai_lembagapemeriksa2 as $rec) : ?>
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
                                                            <select class="input-xlarge required" name="lembaga_pemeriksa_kategori_id">
                                                                
                                                                <?php if($get_kat_lembagapemeriksa = $this->pla_model->get_kat_lembagapemeriksa($rec->lembaga_pemeriksa_kategori_id)) : foreach ($get_kat_lembagapemeriksa as $row) :?>
                                                                <option value="<?php echo $rec->lembaga_pemeriksa_kategori_id; ?>"><?php echo $row->kategori; ?></option>
                                                                <?php endforeach; endif;
                                                                //die(); ?>
                                                                
                                                                <?php if(!empty($list_nama_lembagapemeriksa)) : foreach ($list_nama_lembagapemeriksa as $rw) : ?>
                                                                <option value="<?php echo $rec->lembaga_pemeriksa_kategori_id; ?>"><?php echo set_value('kategori', $rw->kategori); ?></option>
                                                                <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>                                            
                                                            <font color="red"><?php echo form_error('lembaga_pemeriksa_kategori_id'); ?></font>
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
                                                            <?php echo form_input(array('name' => 'nama_lembagapemeriksa1', 'value' => set_value('nama_lembagapemeriksa', $rec->nama_lembaga_pemeriksa), 'class' => 'input-xlarge required')); ?>
                                                            <font color="red"><?php echo form_error('nama_lembagapemeriksa1'); ?></font>
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
                                        <input type="submit" value="Kemaskini" class="btn btn-primary">
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
             <!--start lembaga pemeriksa -->
         <?php //echo '<pre>'; print_r($this->session->all_userdata()); echo '</pre>'; ?>      
                <!--end lembaga pemeriksa --> 
               <div class="clearfix"></div>
                </div>
                </div>
                </div> 

              <!--end widget-body -->
            
   