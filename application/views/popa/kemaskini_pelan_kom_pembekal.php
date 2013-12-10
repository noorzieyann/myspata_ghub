<?php
$form_name = 'popa/kemaskini_pelan_kom_pembekal/' . $this->uri->segment(3). '/' . $this->uri->segment(4);
if ($this->uri->segment(5) != NULL) {
    $form_name = 'popa/kemaskini_pelan_kom_pembekal/' . $this->uri->segment(3) . '/' . $this->uri->segment(4). '/' . $this->uri->segment(5);
}

$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kemaskini_pelan_kom_pembekal');
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
                                </span> Kemaskini Kontraktor Fasiliti
                            </div>
                        </div> 
                    
                        <div class="widget-body">
                   
                            <?php if (!empty($pihak_pembekal)) : foreach ($pihak_pembekal as $rec) : ?>
                        
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
                            
                                <table width="429" height="507"><tr><td width="251">
          <label class="control-label">
            <div align="right">Nama Pembekal 
              </label>
            </div></td><td width="166">
            <div align="center"><?php echo form_input(array('name' => 'nama_pembekal', 'value' => set_value('nama_pembekal',$rec->pembekal_nama), 'class' => 'large required')); ?>
              <font color="red">
               <?php echo form_error('nama_pembekal'); ?>  
              </font>
              
                                          
            </div></td></tr>
                    
        <tr><td>
          <label class="control-label">
            <div align="right">Alamat Pembekal 
              </label>
            </div></td><td>
            <div align="center"><?php echo form_input(array('name' => 'alamat_pembekal', 'value' => set_value('alamat_pembekal',$rec->pembekal_alamat), 'class' => 'large required')); ?>
              <font color="red">
                <?php echo form_error('alamat_pembekal'); ?>   
              </font>
          </div></td></tr>
        <tr><td>
        <label class="control-label">
            <div align="right">Jalan 
              </label>
            </div></td><td>
          <div align="center"><?php echo form_input(array('name' => 'jalan_pembekal', 'value' => set_value('jalan_pembekal',$rec->pembekal_alamat_jalan), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('jalan_pembekal'); ?>    
            </font>
          </div></td></tr>
        
        <tr><td>
        <label class="control-label">
            <div align="right">Bandar 
              </label>
            </div></td><td><div align="center"><?php echo form_input(array('name' => 'bandar_pembekal', 'value' => set_value('bandar_pembekal',$rec->pembekal_alamat_bandar), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('bandar_pembekal'); ?>   
            </font>
          </div></td></tr>
        <tr><td>
          <label class="control-label">
            <div align="right">Negeri 
              </label>
            </div></td><td><div align="center"><?php echo form_dropdown('negeri', $negeri,$rec->pembekal_alamat_negeri_id, 'id="negeri"');?>  <font color="red">
             <?php echo form_error('negeri'); ?>   
           </font> </div></td></tr>
        <tr><td>
          <label class="control-label">
            <div align="right">Poskod 
              </label>
            </div></td><td><div align="center"><?php echo form_input(array('name' => 'poskod_pembekal', 'value' => set_value('poskod_pembekal',$rec->pembekal_alamat_poskod), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('poskod_pembekal'); ?>    
            </font></div></td></tr>
        <tr><td>
       
          <label class="control-label">
            <div align="right">No. Telefon 
              </label>
            </div></td><td><div align="center"><?php echo form_input(array('name' => 'no_tel_pembekal', 'value' => set_value('no_tel_pembekal',$rec->pembekal_notel), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('no_tel_pembekal'); ?>    
            </font> </div></td></tr>
        <tr><td>
          <label class="control-label">
            <div align="right">No. Faks 
              </label>
            </div></td><td><div align="center"><?php echo form_input(array('name' => 'no_faks_pembekal', 'value' => set_value('no_faks_pembekal',$rec->pembekal_nofaks), 'class' => 'large required')); ?>
            <font color="red">
             <?php echo form_error('no_faks_pembekal'); ?>     
            </font></div></td></tr>
        <tr><td>
        <label class="control-label">
            <div align="right">E-mel 
              </label>
            </div></td><td><div align="center"><?php echo form_input(array('name' => 'emel_pembekal', 'value' => set_value('emel_pembekal',$rec->pembekal_email), 'class' => 'large required')); ?>
              <font color="red">
                <?php echo form_error('emel_pembekal'); ?>   
              </font></div></td></tr>
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





                

              