
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
                         <p> 
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
                 <!--start div panel PNPA -->
                   
                   
        <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Sumber Manusia (Dalaman)
                  </div>
                </div>
                <div class="widget-body">
                    
                    
                    <ul class="icomoon-icons-container">
                          <li><a href="#myModal" data-toggle="modal">
                            <span class="fs1" data-icon="&#xe102;" aria-hidden="true">  </span></a></li></ul>
                      <label class="tambah">Tambah Sumber Manusia</label>
                      <div class="clearfix"></div>
               <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:3%">Bil</th>
                          <th style="width:16%" class="hidden-phone">Nama</th>
                          <th style="width:16%" class="hidden-phone">Kementerian</th>
                          <th style="width:16%" class="hidden-phone">Jabatan/Agensi</th>
                          <th style="width:16%" class="hidden-phone">Negeri</th>
                          <th style="width:16%" class="hidden-phone">Daerah</th>
                          <th style="width:10%" class="hidden-phone">Peringkat</th>
                          <th style="width:25%" class="hidden-phone">Peranan</th>
                          <th style="width:25%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($sumbermanusia)) : foreach ($sumbermanusia as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td align="left"><?php echo $rec->nama; ?></td>
                                <td><?php if($getKem = $this->utilitikeperluansumber_model->get_kem($rec->idkem)) foreach ($getKem as $rr) echo $rr->namakem;?></td>
                                <td><?php if($getjab = $this->utilitikeperluansumber_model->get_jab_agensi($rec->idjab_agensi)) foreach ($getjab as $rr) echo $rr->nama_jab_agensi;?></td>
                                <td><?php if($getNegeri = $this->utilitikeperluansumber_model->get_negeri($rec->idnegeri)) foreach ($getNegeri as $rr) echo $rr->namanegeri;?></td>
                                <td><?php if($getDaerah = $this->utilitikeperluansumber_model->get_daerah($rec->iddaerah,$rec->idnegeri)) foreach ($getDaerah as $rr) echo $rr->nama_daerah;?></td>
                                <td><?php if($getLevel = $this->utilitikeperluansumber_model->get_level($rec->level_id)) foreach ($getLevel as $rr) echo $rr->level_desc;?></td>
                                <td><?php if($getLevel = $this->utilitikeperluansumber_model->get_peranan($rec->kump_pengguna)) foreach ($getLevel as $rr) echo $rr->nama_kump_pengguna;?></td>
                                <td align="center"><ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php base_url(); ?>kemaskinisumbermanusia/<?php echo $rec->utiliti_sumber_man_id; ?>"></a>
                                    </span></li></ul>
                                </td>
                            </tr>
                                <?php echo form_close(); ?>
                                <?php endforeach; ?>
                                <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div> 
                
                
             <form id="" class="" action="<?php echo site_url(); ?>/utilitiKeperluanSumber/sumber_manusia" method="post"> 
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        
                        
                        
                        
                    </div>
                    
                  </div></p>
                    </div>
                    
                  </div>
                </div>
