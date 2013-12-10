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
                                </span> Maklumat Panel Penilai
                            </div>
                        </div> 
                    
                        <div class="widget-body">
                   
                        <?php if (!empty($senarai_panel)) : foreach ($senarai_panel as $rec) : ?>
                        
                             
                             


                            <form class="form-horizontal no-margin">
                                
                                    
                                   <div class="control-group">
                                            <label class="control-label">
                                                Nama
                                            </label>
                                            <div class="controls">

                                                <?php echo form_input(array('name'  => 'nama', 
                                                                            'value' => $rec->nama,
                                                                            'disabled'=>'disabled',
                                                                            'class' => 'input-xlarge required'));
                                                ?>     
                                                
                                            </div>
                                            </div>

                                    
                                            <div class="control-group">
                                            <label class="control-label">
                                                No. Kad Pengenalan
                                            </label>
                                            <div class="controls">

                                                <?php echo form_input(array('name'  => 'nric',
                                                                            'value' => $rec->nric, 
                                                                            'disabled'=>'disabled',
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                            </div>
                                        </div>

                
                                            <div class="control-group">
                                            <label class="control-label">
                                                Peranan
                                            </label>
                                            <div class="controls">
                                                
                                                <?php if($get_peranan = $this->pnpa_model->get_peranan($rec->kump_pengguna)) foreach ($get_peranan as $rr)
                                                    echo form_input(array('name'  => 'nama_kump_pengguna', 
                                                                            'value' => $rr->nama_kump_pengguna, 
                                                                            'disabled'=>'disabled',
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                            </div>
                                        </div>


                                            <div class="control-group">
                                            <label class="control-label">
                                                Jawatan
                                            </label>
                                            <div class="controls">
        
                                                <?php echo form_input(array('name'  => 'jawatan', 
                                                                            'value' => $rec->jawatan, 
                                                                            'disabled'=>'disabled',
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                            </div>
                                        </div>



                                        <div class="control-group">
                                            <label class="control-label">
                                                Bidang
                                            </label>
                                            <div class="controls">
        
                                                <?php if($get_bidang = $this->pnpa_model->get_bidang($rec->disiplin_bidang_id)) foreach ($get_bidang as $rr)
                                                     echo form_input(array('name'  => 'bidang', 
                                                                            'value' => $rr->bidang,
                                                                            'disabled'=>'disabled', 
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                            </div>
                                        </div>




                                        <div class="control-group">
                                            <label class="control-label">
                                                Gaji
                                            </label>
                                            <div class="controls">
        
                                                <?php echo form_input(array('name'  => 'gaji', 
                                                                            'value' => $rec->gaji, 
                                                                            'disabled'=>'disabled', 
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                            </div>
                                        </div>




                                        <div class="control-group">
                                            <label class="control-label">
                                                Kos Lebih Masa
                                            </label>
                                            <div class="controls">
        
                                                <?php echo form_input(array('name'  => 'kos_kerja_lebih_masa', 
                                                                            'value' => $rec->kos_kerja_lebih_masa, 
                                                                            'disabled'=>'disabled', 
                                                                            'class' => 'input-xlarge required')); 
                                                ?>

                                            </div>
                                        </div>





                              <!--  <input type="hidden" name="no" value="<?php echo $rec->pnpa_id; ?>"> -->

                                
                                <div align="right">
                <a href="<?php echo site_url('pnpa/model_struktur_pnpa_edit_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Kembali
                  </button></a>
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