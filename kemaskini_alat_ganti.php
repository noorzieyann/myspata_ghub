<?php
$form_name = 'popa/kemaskini_alat_ganti/' . $this->uri->segment(3). '/' . $this->uri->segment(4);
if ($this->uri->segment(5) != NULL) {
    $form_name = 'popa/kemaskini_alat_ganti/' . $this->uri->segment(3) . '/' . $this->uri->segment(4). '/' . $this->uri->segment(5);
}

$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kemaskini_alat_ganti');
echo form_open($form_name, $attributes);
?>
<div class="clearfix"></div>
<br/>

<!--breadcrumb--><?php if (!empty($tab)) {
    echo $tab;
} ?>

           <div class="row-fluid">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <div class="title">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                                </span> Kemaskini Pelan Komunikasi untuk Kecemasan
                            </div>
                        </div> 
                    
                        <div class="widget-body">
                   
                            <?php if (!empty($alat_ganti)) : foreach ($alat_ganti as $rec) : ?>
                        
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
                            
                            <table width="379" height="118"><tr><td width="161">
          <label class="control-label">
            <div align="center">Nama Pembekal </div>
          </label>
            </td><td width="206">
                <select class="required large" name="pembekal_id_alat_ganti">
                <option value="">SILA PILIH</option>
                <?php if(!empty($pihak_pembekal)) { foreach ($pihak_pembekal as $row) { ?>
                <option value="<?php echo $row->pembekal_id; ?>"  <?php if ($row->pembekal_id == $rec->pembekal_id){ echo 'selected="selected"';} ?>><?php echo set_value('pembekal_nama', $row->pembekal_nama); ?></option>
                <?php echo form_error('pembekal_id_alat_ganti'); ?> 
                   <?php }} ?></select>
            </td></tr>
        <tr><td>
          <label class="control-label">
            <div align="center">Nama Alat Ganti </div>
          </label>
            </td><td>
             <?php echo form_input(array('name' => 'nama_alat_ganti', 'value' => set_value('nama_alat_ganti', $rec->alatganti_nama), 'class' => 'large required')); ?>
              <font color="red">
                <?php echo form_error('nama_alat_ganti'); ?>   
              </font>   
        </td> 
        </tr>
    </table>
                            
         <div class="clearfix">
                            </div>
                            
                                <div class="next-prev-btn-container pull-right">
                                  <input type="submit" value="Kemaskini" name="update" class="btn btn-primary input-top-margin">
                                </div>

                           <div class="clearfix">
                          </div>
                           <?php endforeach; ?>
                            <?php endif; ?>
                

                      </div>
               
                    </div>
                </div>
            </div>


            
        
            <div class="clearfix">
            </div>
                
    </div>
</div>
</div>
</div>
<!-- div tab END -->





                
