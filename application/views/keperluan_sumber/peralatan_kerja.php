
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Alat Kerja
                  </div>
                </div>
                <div class="widget-body">
                   
                    
                    <ul class="icomoon-icons-container">
                          <li><a href="#myModal" data-toggle="modal">
                            <span class="fs1" data-icon="&#xe102;" aria-hidden="true">  </span></a></li></ul>
                      <label class="tambah">Tambah Alat Kerja</label>
                      <div class="clearfix"></div>
                   
               <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:5%">Bil</th>
                          <th style="width:20%">Kategori Alat Kerja</th>
                          <th style="width:16%">Jenama</th>
                          <th style="width:16%" class="hidden-phone">Spesifikasi</th>
                          <th style="width:16%" class="hidden-phone">NO Tag</th>
                          <th style="width:16%" class="hidden-phone">Kos Seunit</th>
                          <th style="width:10%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($alatkerja)) : foreach ($alatkerja as $rec) : ?>
                            <?php echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php if($getKatKej = $this->utilitikeperluansumber_model->get_kat_alat_kerja($rec->kat_alat_kerja_id))
    					foreach ($getKatKej as $rr) 
     						echo $rr->alat_kerja;?></td>
                                <td><?php echo $rec->jenama; ?></td>
                                <td><?php echo $rec->spesifikasi; ?></td>
                                <td><?php echo $rec->alat_kerja_tag_no; ?></td>
                                <td><?php echo $rec->kos_seunit; ?></td>
                                <td align="center"><ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php base_url(); ?>kemaskinialatkerja/<?php echo $rec->alat_kerja_id; ?>"></a>
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
          </div>  <form id="" class="" action="tambahalatkerja" method="post"> 
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Tambah Alat kerja
                      </h4>
                      </div>
                      <!--start div modal body -->
                      <div class="modal-body">
                               
                                <table width="95%" border="0" align="center">
                                            <tr>
                                                <td width="17%" valign="top" height="50">
                                                    <label class="control-label">Kategori Alat Kerja<span class="required">*</span></label>
                                                </td>
                                                <td width="31%"> 
                                                    <div class="">
                                                       <select class="required large" name="kat_alat_kerja_id">
                                                <option value="">SILA PILIH</option>
                                                <?php if(!empty($alatkej)) : foreach ($alatkej as $rec) : ?>
                                                <option value="<?php echo $rec->kat_alat_kerja_id; ?>"><?php echo set_value('alat_kerja', $rec->alat_kerja); ?></option>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                                    </div><br>
                                                </td></tr>
<tr>
                                                <td width="19%" valign="top" height="50"><label class="control-label">Jenama<span class="required">*</span></label></td>
                                                <td width="33%">
                                                    <div class=""><?php echo form_input(array('name' => 'jenama', 'value' => set_value('jenama', $this->session->userdata('jenama')), 'class' => 'large required')); ?>
                                                        <font color="red"><?php echo form_error('jenama'); ?></font>
                                                    </div><br>
                                                </td>
                                            </tr>
                                                <tr>
                                                   <td width="17%" valign="top"><label class="control-label">Spesifikasi<span class="required">*</span></label></td>
                                                   <td> <div class=""><?php echo form_input(array('name' => 'spesifikasi', 'value' => set_value('spesifikasi', $this->session->userdata('spesifikasi')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('spesifikasi'); ?></font>
                                                        </div><br>
                                                    </td></tr><tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Alat Pejabat Tag No<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'alat_kerja_tag_no', 'value' => set_value('alat_kerja_tag_no', $this->session->userdata('alat_kerja_tag_no')), 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('alat_kerja_tag_no'); ?></font>
                                                        </div><br>
                                                  </td>
                                                   </tr>
                                                   <tr>
                                                   <td width="19%" valign="top">
                                                        <label class="control-label">Kos Seunit<span class="required">*</span></label>
                                                   </td>
                                                   <td><div class="">
                                                            <?php echo form_input(array('name' => 'kos_seunit', 'class' => 'large required')); ?>
                                                            <font color="red"><?php echo form_error('kos_seunit'); ?></font>
                                                        </div><br>
                                                  </td>
                                                </tr>
                                </table>
                                   
                              
                          
                          </div><!--end div modal body -->
                         
                               <div class="modal-footer">
                                <input type="submit" value="Simpan" class="btn btn-warning2">
                              
                             </div>
                 </form>
               <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>


                
          
          
        
   