
        <!--start div widget-body -->
        <div class="widget-body">
           <ul class="nav nav-tabs no-margin myTabBeauty">
              <li class="active"><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia') ?>">Sumber Manusia</a></li>
              <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/tambahpejabat') ?>">Pengurusan Pejabat</a></li>
              <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/tambahalatkerja') ?>">Peralatan Kerja</a></li>
            </ul>
                  <div class="tab-content" id="myTabContent">
                    <div id="home" class="tab-pane fade active in">
                      <p>
                       <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia') ?>">Dalaman</a></li>
                    <li class="active"><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia_luaran') ?>">Luaran</a></li>
                   </ul>
                  <div class="tab-content" id="myTabContent">
                    <div id="home" class="tab-pane fade active in">
                    
                              <p> <?php if (!empty($syarikat)) : foreach ($syarikat as $rec) : ?> 
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
                                    <form id="" class="" action="kemaskinisyarikat" method="post">
									<input type="hidden" name="company" value="<?php echo $this->uri->segment(3); ?>" >

                                    <table width="95%" border="0" align="center">
                                                <tr>
                                                   
                                                    <td width="19%" valign="top" height="50">
                                                        <label class="control-label">Nama Syarikat<span class="required">*</span></label>
                                                    </td>
                                                    <td width="33%">
                                                        <div class="">
                                                            <?php echo form_input(array('name' => 'nama_syarikat', 'value' => set_value('nama_syarikat', $rec->nama_syarikat), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nama_syarikat'); ?></font>
                                                        </div><br>
                                                    </td>
                                                    
                                                    <td width="17%" valign="top">
                                                        <label class="control-label">No Pendaftaran<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'no_pendaftaran', 'value' => set_value('no_pendaftaran', $rec->no_pendaftaran), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('no_pendaftaran'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Alamat Syarikat<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'alamat_syarikat', 'value' => set_value('alamat_syarikat', $rec->alamat_syarikat), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('alamat_syarikat'); ?></font>
                                                        </div><br>
                                                    </td>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">No Telefon<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'notel', 'value' => set_value('notel', $rec->notel), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('notel'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                                
                                                 <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">No Fax<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'nofax', 'value' => set_value('nofax', $rec->nofax), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nofax'); ?></font>
                                                        </div><br>
                                                    </td>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Emel<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'email', 'value' => set_value('email', $rec->email), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('email'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
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
               

 
              <!--end widget-body -->
              


        

          
          
        
          
          
        
   