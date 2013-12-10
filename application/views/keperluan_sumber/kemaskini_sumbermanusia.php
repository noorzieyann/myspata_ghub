
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
                    <li class="active"><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia') ?>">Dalaman</a></li>
                    <li class=""><a href="<?php echo site_url('utilitiKeperluanSumber/sumber_manusia_luaran') ?>">Luaran</a></li>
                   </ul>
                  <div class="tab-content" id="myTabContent">
                    <div id="home" class="tab-pane fade active in">
                    
                              <p> <?php 
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
                                   
                                    <form id="" class="" action="kemaskinisumbermanusia/<?php echo $this->uri->segment(3); ?>" method="post">
									<input type="hidden" name="humanres" value="<?php echo $this->uri->segment(3); ?>" />
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
                                                        <?php if(!empty($jabatan)) : foreach ($jabatan as $rd) : ?>
                                                        <option value="<?php echo $rd->idjab_agensi; ?>" <?php if($rd->idjab_agensi===$rec->idjab_agensi){echo 'selected';} ?> ><?php echo set_value('nama_jab_agensi', $rd->nama_jab_agensi); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Negeri<span class="required"></span></label>
                                                   </td>
                                                   <td> <select class="required large" name="negeri" id="country">
                                                        <?php if(!empty($negeri)) : foreach ($negeri as $rk) : ?>
                                                        <option value="<?php echo $rk->idnegeri; ?>" <?php if($rk->idnegeri===$rec->idnegeri){echo 'selected';} ?> ><?php echo set_value('namanegeri', $rk->namanegeri); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  
                                                    </td>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Daerah<span class="required"></span></label>
                                                   </td>
                                                   <td><select class="required large" name="daerah" id="cities">
														<?php 
														if($getDaerah = $this->utilitikeperluansumber_model->get_daerah_basednegeri($rec->idnegeri)) : 
															foreach ($getDaerah as $rq) :?>
															<option value="<?php echo $rq->iddaerah; ?>" <?php if($rq->iddaerah===$rec->iddaerah){echo 'selected';} ?> ><?php echo $rq->nama_daerah; ?></option>-->
														<?php  
															endforeach; 
														endif; 
														?>
                                                        
                                                        </select>  
                                                  </td>
                                                </tr>
                                               <tr>
                                                    <td colspan='4'><hr></td>
                                                </tr>
                                               
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
                                                         <?php if(!empty($peranan)) : foreach ($peranan as $rl) : ?>
                                                        <option value="<?php echo $rl->kump_pengguna_id; ?>" <?php if($rl->kump_pengguna_id===$rec->kump_pengguna){echo 'selected';} ?> ><?php echo set_value('nama_kump_pengguna', $rl->nama_kump_pengguna); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                            </select>  </div><br>
                                                    </td>
                                                     <td width="17%" valign="top">
                                                        <label class="control-label">Peringkat<span class="required"></span></label>
                                                   </td>
                                                   <td><select class="required large" name="level">    
                                                        <?php if(!empty($level)) : foreach ($level as $rm) : ?>
                                                        <option value="<?php echo $rm->level_id; ?>" <?php if($rm->level_id===$rec->level_id){echo 'selected';} ?> ><?php echo set_value('level_desc', $rm->level_desc); ?></option>
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
                                                            <?php echo form_input(array('name' => 'jawatan', 'value' => set_value('jawatan', $rec->jawatan), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('jawatan'); ?></font>
                                                        </div><br>
                                                  </td>
                                                <td width="17%" valign="top">
                                                        <label class="control-label">Gred Jawatan<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'gredjawatan', 'value' => set_value('gredjawatan', $rec->gred_jawatan), 'class' => 'large required')); ?>
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
                                                              <?php if(!empty($disiplin)) : foreach ($disiplin as $rf) : ?>
																<option value="<?php echo $rf->disiplin_bidang_id; ?>" <?php if($rf->disiplin_bidang_id===$rec->disiplin_bidang_id){echo 'selected';} ?> ><?php echo set_value('kategori', $rf->bidang); ?></option>
																<?php endforeach; ?>
																<?php endif; ?>
                                                            </select>  </div><br>
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
                                                  <tr>
                                                  
                                                   <td width="19%" valign="top">
                                                        
                                                   </td>
                                                   <td></td>
                                                </tr>
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
                </div>
                </div> 

 
              <!--end widget-body -->
<script type="text/javascript" src="<?php echo base_url() . 'asset/js/jquery.min.js'; ?>"></script>        
<script type="text/javascript">// <![CDATA[
    $(document).ready(function(){       
        $('#country').change(function(){ //any select change on the dropdown with id country trigger this code         
            $("#cities > option").remove(); //first of all clear select items
            var idnegeri = $('#country').val();  // here we are taking country id of the selected one.
            $.ajax({
                type: "POST",
                
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


        

          
          
        
          
          
        
   