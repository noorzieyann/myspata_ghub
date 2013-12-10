<?php
$form_name = 'popa/kemaskini_kontraktor_fasiliti/' . $this->uri->segment(3). '/' . $this->uri->segment(4);
if ($this->uri->segment(5) != NULL) {
    $form_name = 'popa/kemaskini_kontraktor_fasiliti/' . $this->uri->segment(3) . '/' . $this->uri->segment(4). '/' . $this->uri->segment(5);
}

$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kemaskini_kontraktor_fasiliti');
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
                   
                            <?php if (!empty($senarai_kontraktor)) : foreach ($senarai_kontraktor as $rec) : ?>
                        
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
                            
                                <table height="196" border="0" align="left">
                                    
                                    <tr>
                                        <td width="40%" >
                                            <label class="control-label">
                                                Nama Kontraktor
                                                <span class="required">
                                                    *
                                                </span>
                                            </label>
                                        </td>
                                        <td width="60%">
                                            <div class="">

                                                <?php echo form_input(array('name'  => 'nama', 
                                                                            'value' => set_value('nama', $rec->nama),
                                                                            'class' => 'input-xlarge required'));
                                                ?>
                                                
                                                <font color="red">
                                                    <?php echo form_error('nama'); ?>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                                <td width="40%">
                                                    <label class="control-label">Kategori</label>
                                                </td>
                                                <td width="60%">
                                                <select class="required large" name="kontraktor_fasiliti_kategori_id">
                                                 <option>- Sila Pilih -</option>
                                                <?php if(!empty($kontraktor)){ foreach ($kontraktor as $row) { ?>

                                                <option value="<?php echo $row->disiplin_bidang_id; ?>" 
                                                         <?php if ($row->disiplin_bidang_id == $rec->disiplin_bidang_id){ echo 'selected="selected"';} ?> >
                                                <?php echo set_value('bidang', $row->bidang); ?>
                                            </option>
                                            <?php }} ?>   
                                        </select>
                                                </td></tr>
                                    <tr>
                                       <td width="40%" >
                                            <label class="control-label">
                                                Nama Syarikat
                                                <span class="required">
                                                    *
                                                </span>
                                            </label>
                                        </td>
                                        <td width="60%">
                                            <div class="">
                                          <select class="required large" name="syarikat_id">
                                                   <option value="">SILA PILIH</option>
                                                 <?php if(!empty($syarikat)) { foreach ($syarikat as $row) {?>
                                                        <option value="<?php echo $row->syarikat_id; ?>" <?php if ($row->syarikat_id == $rec->syarikat_id){ echo 'selected="selected"';} ?> ><?php echo set_value('nama_syarikat', $row->nama_syarikat); ?></option>
                                                <?php }} ?></select>
                                             
                                                <font color="red">
                                                    <?php echo form_error('syarikat_id'); ?>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>

                
                                    <tr>
                                        <td width="40%" >
                                            <label class="control-label">
                                                Email
                                                <span class="required">
                                                    *
                                                </span>
                                            </label>
                                        </td>
                                       <td width="60%">
                                            <div class="">
        
                                                <?php echo form_input(array('name'  => 'emel', 
                                                                            'value' => set_value('emel', $rec->emel), 
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                                <font color="red">
                                                    <?php echo form_error('emel'); ?>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>



                                    <tr>
                                        <td width="40%" >
                                            <label class="control-label">
                                                No. Telefon Bimbit
                                                <span class="required">
                                                    *
                                                </span>
                                            </label>
                                        </td>
                                       <td width="60%">
                                            <div class="">
        
                                                <?php echo form_input(array('name'  => 'no_tel_bimbit', 
                                                                            'value' => set_value('no_tel_bimbit', $rec->no_tel_bimbit), 
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                                <font color="red">
                                                    <?php echo form_error('no_tel_bimbit'); ?>
                                                </font>
                                            </div>
                                        </td>
                                    </tr>
 
                                </table>
                            <?php endforeach; ?>
                            <?php endif; ?>

                            <div class="clearfix">
                            </div>
                            
                                <div class="next-prev-btn-container pull-right">
                                  <input type="submit" value="Kemaskini" name="update" class="btn btn-primary input-top-margin">
                                </div>

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
</div>
</div>
<!-- div tab END -->





                

              