<!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
                <p> 
               <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                    <div class="widget-header">
                                <div class="title">
                                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kemaskini Maklumat Panel Penilai Teknikal
                                </div>
                    </div> 
                    <div class="widget-body">
                   
                                    <?php if (!empty($senarai_panel2)) : foreach ($senarai_panel2 as $rec) : ?>
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
                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Kategori : </label>
                                                    </td>
                                                    <td width="30%"> 
                                                        <div class="">
                                                            <label class="control-label"><?php if($get_nama_panelpenilai = $this->ptra_model->get_kat_penilai($rec->panel_penilai_kategori_id)) 
                                                            foreach ($get_nama_panelpenilai as $rr) echo $rr->kategori;?></label>
                                                            <?php //echo form_input(array('name' => 'kategori', 'value' => set_value('panel_penilai_kategori_id', $rec->panel_penilai_kategori_id), 'class' => 'input-xlarge')); ?>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">No. Telefon Pejabat : </label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <label class="control-label"><?php echo $rec->no_tel_pej; ?></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                   <td width="15%" valign="top">
                                                        <label class="control-label">Nama : </label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <label class="control-label"><?php echo $rec->nama_penilai; ?></label>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">No. Telefon Bimbit : </label>
                                                    </td>
                                                    <td width="30%">
                                                        <div class="">
                                                            <label class="control-label"><?php echo $rec->no_tel_bimbit; ?></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Nama Syarikat : </label>
                                                   </td>
                                                   <td width="30%">
                                                    <div class="">
                                                            <label class="control-label"><?php echo $rec->nama_syarikat; ?></label>
                                                        </div>
                                                    </td>

                                                    <td width="15%" valign="top">
                                                        <label class="control-label">Jawatan : </label>
                                                   </td>
                                                   <td> 
                                                    <div class="">
                                                            <label class="control-label"><?php echo $rec->jawatan; ?></label>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td width="15%" valign="top">
                                                        <label class="control-label">E-mel : </label>
                                                   </td>
                                                   <td> 
                                                    <div class="">
                                                            <label class="control-label"><?php echo $rec->email; ?></label>
                                                        </div>
                                                    </td>
                                                </tr>
                                </table>
                                    <div class="next-prev-btn-container pull-right">
                                        <a href="<?php echo site_url('ptra/model_struktur_ptra_editpp')?>"><button class="btn btn-primary input-top-margin" type="button">
                                            Kembali
                                          </button></a>
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
            
   