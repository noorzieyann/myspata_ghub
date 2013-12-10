
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
                    
                              <p>   <?php 
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
                                  
                                  
                                  
                                  
                                  
                                  
                                   <?php if (!empty($listSumber)) : foreach ($listSumber as $rec) : ?>
                                   
                                   <!-- <form id="" class="" action="kemaskinisumbermanusialuaran" method="post"> -->
								   <?php echo form_open_multipart('utilitiKeperluanSumber/kemaskinisumbermanusialuaran/'.$this->uri->segment(3).'/'.$this->uri->segment(4));?>
									<input type="hidden" name="company" value="<?php echo $this->uri->segment(3); ?>">
									<input type="hidden" name="humanres" value="<?php echo $this->uri->segment(4); ?>">                                       
                                    <table width="95%" border="0" align="center">
										<tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Nama<span class="required"></span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'nama', 'value' => set_value('nama', $rec->nama), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nama'); ?></font>
                                                        </div><br>
                                                    </td>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">No Kad Pengenalan<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'noic', 'value' => set_value('noic', $rec->nric), 'class' => 'large required')); ?>
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
																<option value="<?php echo $rl->kump_pengguna; ?>"><?php echo set_value('nama_kump_pengguna', $rl->nama_kump_pengguna); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  </div><br>
                                                    </td>
                                                     
                                                
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Jawatan<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'jawatan', 'value' => set_value('jawatan', $rec->jawatan), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('jawatan'); ?></font>
                                                        </div><br>
                                                  </td>
                                                
                                                </tr>
                                                <tr>
                                                   
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Disiplin/Bidang<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                        <select class="required large" name="disiplin">
															<?php if(!empty($disiplin)) : foreach ($disiplin as $rf) : ?>
                                                        <option value="<?php echo $rf->disiplin_bidang_id; ?>" <?php if($rf->disiplin_bidang_id===$rec->disiplin_bidang_id){echo 'selected';}?> ><?php echo set_value('displin', $rf->bidang); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                        </select>  
														</div><br>
															
                                                  </td><td width="17%" valign="top">
                                                       <label class="control-label">Gaji (RM)<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'gaji', 'value' => set_value('gaji', $rec->gaji), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('gaji'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                   
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Kos Lebih Masa (RM)<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'koslebihmasa', 'value' => set_value('koslebihmasa', $rec->kos_kerja_lebih_masa), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('koslebihmasa'); ?></font>
                                                        </div><br>
                                                  </td>

                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Surat Lantikan<span class="required">*</span></label>
                                                   </td>
                                                   <td>
												   <div class="">
												   <span id="namafile"><?php echo basename($rec->path_suratlantikan); echo form_input(array('type'=> 'hidden', 'name' => 'txtfilename', 'value' => basename($rec->path_suratlantikan) ));?></span><br/>
												      <?php echo form_input(array('type'=>'file','name' => 'userfile','id'=>'userfile')); ?>
                                                      <font color="red"><?php echo form_error('userfile'); ?></font>
                                                   </div>
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
               

 
              <!--end widget-body -->
<script type="text/javascript" src="<?php echo base_url() . 'asset/js/jquery.min.js'; ?>"></script>        
<script>
$(document).ready(function(){
  $("#userfile").click(function(){
		$("#namafile").hide();
  });
});
</script>

        

          
          
        
          
          
        
   