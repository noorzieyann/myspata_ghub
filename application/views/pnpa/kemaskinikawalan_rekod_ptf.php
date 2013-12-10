<!-- div tab START -->
<div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
        <p> 
           <div class="row-fluid">
                <div class="span12">
                    <div class="widget">
                        <div class="widget-header">
                            <div class="title">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                                </span> Kemaskini Kawalan Rekod PNPA
                            </div>
                        </div> 
                    
                        <div class="widget-body">
                   
                        <?php if (!empty($senarai_kawalan)) : foreach ($senarai_kawalan as $rec) : ?>
                        
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
                                        <td width="5%" valign="top">
                                            <label class="control-label">
                                                Jenis Rekod
                                                <span class="required">
                                                    *
                                                </span>
                                            </label>
                                        </td>
                                        <td width="20%">
                                            <div class="">

                                                <?php echo form_input(array('name'  => 'jenis_rekod1', 
                                                                            'value' => set_value('jenis_rekod1', $rec->f8_1d_jenis_rekod),
                                                                            'class' => 'input-xlarge required'));
                                                ?>     
                                                
                                                <font color="red">
                                                    <?php echo form_error('jenis_rekod1'); ?>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                                    
                                    <tr>
                                       <td width="5%" valign="top">
                                            <label class="control-label">
                                                Lokasi
                                                <span class="required">
                                                    *
                                                </span>
                                            </label>
                                        </td>
                                        <td width="20%">
                                            <div class="">

                                                <?php echo form_input(array('name'  => 'lokasi1',
                                                                            'value' => set_value('lokasi1', $rec->f8_1d_lokasi), 
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                                <font color="red">
                                                    <?php echo form_error('lokasi1'); ?>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                
                                    <tr>
                                        <td width="5%" valign="top">
                                            <label class="control-label">
                                                Tempoh
                                                <span class="required">
                                                    *
                                                </span>
                                            </label>
                                        </td>
                                       <td width="20%">
                                            <div class="">
        
                                                <?php echo form_input(array('name'  => 'tempoh1', 
                                                                            'value' => set_value('tempoh1', $rec->tempoh), 
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                                <font color="red">
                                                    <?php echo form_error('tempoh1'); ?>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <input type="hidden" name="no" value="<?php echo $rec->pnpa_id; ?>">

                                
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


            
        
            <div class="clearfix">
            </div>
                
    </div>
</div>
<!-- div tab END -->