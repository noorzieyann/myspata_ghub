<!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
                <p> 
               <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                    <div class="widget-header">
                                <div class="title">
                                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kemaskini Maklumat UPF 
                               </div>
                    </div> 
                    <div class="widget-body">
                   
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
                                     
                        <form id="" class="" action="kemaskini_upf.php/<?php echo $this->uri->segment(3); ?>" method="post">
                                        
                            <?php if (!empty($senaraiupf)) : foreach ($senaraiupf as $rec) : ?>
                            <input type="hidden" name="upf" value="<?php echo $this->uri->segment(3); ?>" />
                            <?php $sessionarray = $this->session->all_userdata();?>
                                        
                                    <table width="95%" border="0" align="center">
                                        
                                                <tr>
                                                    <td width="17%" valign="top" height="50">
                                                        <label class="control-label">Kementerian</label>
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
                                                        <label class="control-label">Negeri</label>
                                                   </td>
                                                   <td> 
                                                       <select class="required large" name="negeri" id="country">
                                                        <?php if(!empty($negeri)) : foreach ($negeri as $rk) : ?>
                                                        <option value="<?php echo $rk->idnegeri; ?>" <?php if($rk->idnegeri===$rec->idnegeri){echo 'selected';} ?> ><?php echo set_value('namanegeri', $rk->namanegeri); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                       </select>  
                                                    </td>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Daerah</label>
                                                   </td>
                                                   <td>
                                                       <select class="required large" name="daerah" id="cities">
							<?php 
							if($getDaerah = $this->utilitiupf_model->get_daerah_basednegeri($rec->idnegeri)) : 
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
                                                        <label class="control-label">Nama UPF<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'namaupf', 
                                                                                        'value' => set_value('namaupf', $rec->nama_upf),       
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('namaupf'); ?></font>
                                                        </div><br>
                                                    </td>
                                                   <td width="17%" valign="top">
                                                        <label class="control-label">Alamat<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'alamatupf', 
                                                                                        'value' => set_value('alamatupf', $rec->alamat_upf),       
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('alamatupf'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">No.Telefon<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'notel', 
                                                                                        'value' => set_value('notel', $rec->notel_upf),       
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('notel'); ?></font>
                                                        </div><br>
                                                  </td>
                                                <td width="17%" valign="top">
                                                        <label class="control-label">No.Faks<span class="required">*</span></label>
                                                   </td>
                                                   <td> <div class="">
                                                            <?php echo form_input(array('name' => 'nofax', 
                                                                                        'value' => set_value('nofax', $rec->nofax_upf),       
                                                                                        'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('nofax'); ?></font>
                                                        </div><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                  
                                                   <td width="19%" valign="top">
                                                        
                                                   </td>
                                                   <td></td>
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
                
               url: "<?php echo site_url(); ?>/utiliti_upf/get_cities/"+idnegeri, //here we are calling our user controller and get_cities method with the country_id
               
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