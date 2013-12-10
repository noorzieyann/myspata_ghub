<?php
$form_name = 'popa/kemaskini_pelan_kom/' . $this->uri->segment(3). '/' . $this->uri->segment(4);
if ($this->uri->segment(5) != NULL) {
    $form_name = 'popa/kemaskini_pelan_kom/' . $this->uri->segment(3) . '/' . $this->uri->segment(4). '/' . $this->uri->segment(5);
}

$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kemaskini_pelan_kom');
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
                   
                            <?php if (!empty($pelan_kom)) : foreach ($pelan_kom as $rec) : ?>
                        
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
                             <table height="207">
          <tr><td width="171">
    
          <label class="control-label">
            <div align="center">Perkara 
              
            </div>
          </label></td><td width="96">
              <div align="center"><?php echo form_input(array('name' => 'perkara', 'value' => set_value('perkara', $rec->perkara), 'class' => 'large required')); ?>
           
              <font color="red">
             <?php echo form_error('perkara'); ?>  
            </font>
            
            <!--<input class="input-large" type="text"  name="perkara" id="perkara"/> -->
         </div></td></tr> 
          <tr><td>
      
          <label class="control-label">
            <div align="center">Alamat 
              
            </div>
          </label>
            </td><td><div align="center"><?php echo form_input(array('name' => 'alamat_kom', 'value' => set_value('alamat_kom', $rec->pelan_kom_kecemasan_alamat), 'class' => 'large required')); ?>
              <font color="red">
                <?php echo form_error('alamat_kom'); ?>  
              </font>
              
            </div></td></tr> 
          <tr><td>         
     
          <label class="control-label">
            <div align="center">No. Telefon 
              
            </div>
          </label> </td><td><div align="center"><?php echo form_input(array('name' => 'no_tel_kom', 'value' => set_value('no_tel_kom',$rec->pelan_kom_kecemasan_notel), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('no_tel_kom'); ?>   
            </font>
            
        </div></td></tr> 
          <tr><td>  
        
          <label class="control-label">
            <div align="center">No. Faks 
              
            </div>
          </label></td><td><div align="center"><?php echo form_input(array('name' => 'no_fax_kom', 'value' => set_value('no_fax_kom',$rec->pelan_kom_kecemasan_nofaks), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('no_fax_kom'); ?>  
            </font>
            
        </div></td></tr> </table>
                            
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





                