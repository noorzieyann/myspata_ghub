<ul class="breadcrumb-beauty">
    <li>
        <a href="#">
            Fungsi
        </a> 
    </li>
    <li>
        <a href="#">
            Perancangan
        </a>  
    </li>
    <li>
        <a href="#">
            Pelan
        </a> 
    </li>
    <li>
        <a href="#">
            PSPA(O)
        </a>   
    </li>
    <li>
        <a href="#">
            POPA
        </a>   
    </li>
</ul>
<div class="clearfix"></div>
      <br/>
    <!--breadcrumb--><?php if(!empty($tab)) { echo $tab;} ?>

<?php 
    $form_name = 'popa/model_struktur_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
    if($this->uri->segment(5) != NULL){$form_name = 'popa/model_struktur_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
    $attributes = array('class' => 'form-horizontal no-margin', 'id' => 'model_struktur_popa');
    echo form_open($form_name, $attributes);
?>       
<div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">
                                        <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                                        </span> Model Struktur Operasi Dan Penyenggaraan Aset
                                    </div>
                                    </div>
                                 <!-- section tambah START -->              
                                <div class="">
                                <br/>
<table width="964" height="316" border="0" align="center">
  <tr>
    <td width="113" height="95">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="106">&nbsp;</td>
    <td width="15">&nbsp;</td>
    <td colspan="3"><div class="widget2"> 
                                                <div class="widget-header2"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> PTF 
                                                    </div> 
                                                </div> 
                
                                                <div class="widget-body">
                                                    <?php if(!empty($senarai_ptf)) : foreach ($senarai_ptf as $rec) : ?>
                                                     <?php $c = $this->popa_model->get_count_data(($rec->utiliti_sumber_man_id),$this->uri->segment(4),4);

                                                    if($this->uri->segment(4) != NULL){
                                                       if($c > 0)//($rec->utiliti_sumber_man_id==$ptf)
                                                        { 
                                                         $checked = "checked"; 

                                                       }else{
                                                        $checked = "";
                                                       }
                                                     } else{

                                                      $checked = "";

                                                     }      
                                                ?>     
                                                         <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('ptf[]',$rec->utiliti_sumber_man_id); ?>" name="ptf[]" id="ptf[]" <?php echo $checked?>>
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                            <?php endforeach;?>
                               <?php endif; ?>
                               </div> 
                                            </div> </td>
    <td width="16">&nbsp;</td>
    <td width="106">&nbsp;</td>
    <td width="1">&nbsp;</td>
    <td width="113">&nbsp;</td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="169">&nbsp;</td>
    <td width="1" rowspan="3" bgcolor="#333333">&nbsp;</td>
    <td width="183">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="22">&nbsp;</td>
    <td colspan="4" bgcolor="#333333">&nbsp;</td>
    <td colspan="4" bgcolor="#333333">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td bgcolor="#333333">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td bgcolor="#333333">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div class="widget2"> 
                                                <div class="widget-header2"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> PDF 
                                                    </div> 
                                                </div> 
                
                                                <div class="widget-body"> 
                                                     <?php if(!empty($senarai_pdf)) : foreach ($senarai_pdf as $rec) : ?>
                                                <?php $c = $this->popa_model->get_count_data(($rec->utiliti_sumber_man_id),$this->uri->segment(4),5);

                                        if($this->uri->segment(4) != NULL){
                                           if($c > 0)//($rec->utiliti_sumber_man_id==$ptf)
                                            { 
                                             $checked = "checked"; 

                                           }else{
                                            $checked = "";
                                           }
                                         } else{

                                          $checked = "";

                                         }    

                                    ?>     <label class="checkbox">
                                          <input type="checkbox" value="<?php echo set_value('pdf[]',$rec->utiliti_sumber_man_id); ?>" name="pdf[]" id="pdf[]" <?php echo $checked?>>
                                          <?php echo $rec->nama; ?> 

                                        </label>
                       
                                <?php endforeach; ?>
                                <?php endif; ?>
                                                </div> 
                                            </div> </td>
    <td>&nbsp;</td>
    <td colspan="3"><div class="widget2"> 
                                                <div class="widget-header2"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> POF 
                                                    </div> 
                                                </div> 
                
                       <div class="widget-body">
                      <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active">
                      <a data-toggle="tab" href="#home1" id="popoverOption" rel="popover" data-original-title="Pegawai Pentadbiran dan Kewangan" data-placement="top">
                        PPDK
                      </a>
                    </li>
                    <li class="">
                      <a data-toggle="tab" href="#home2" id="popoverOption" rel="popover" data-original-title="Pegawai Penyelia Sivil dan Struktur" data-placement="top">
                        PPSDS
                      </a>
                    </li>
                    <li class="">
                      <a data-toggle="tab" href="#home3" id="popoverOption" rel="popover" data-original-title="Pegawai Penyelia Mekanikal" data-placement="top">
                        PPM
                      </a>
                    </li>
                    <li class="">
                      <a data-toggle="tab" href="#home4" id="popoverOption" rel="popover" data-original-title="Pegawai Penyelia Elektrik" data-placement="top">
                        PPE
                      </a>
                    </li>
                   
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div id="home1" class="tab-pane fade active in">
                       <?php if(!empty($senarai_pentadbiran)) : foreach ($senarai_pentadbiran as $rec) : ?>
                        
                           <?php $c = $this->popa_model->get_count_data(($rec->utiliti_sumber_man_id),$this->uri->segment(4),6);

                            if($this->uri->segment(4) != NULL){
                               if($c > 0)//($rec->utiliti_sumber_man_id==$ptf)
                                { 
                                 $checked = "checked"; 

                               }else{
                                $checked = "";
                               }
                             } else{

                              $checked = "";

                             }    
                        ?>  <label class="checkbox">
                                                                <?php echo form_error('pentadbir[]'); ?>

                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="pentadbir[]" id="pentadbir[]" <?php echo $checked?> >
                                                                    <?php echo $rec->nama; ?>
                                                            
                                                            </label>
                                                    
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                    </div>
                    <div id="home2" class="tab-pane fade">
                      <?php if(!empty($senarai_sivil)) : foreach ($senarai_sivil as $rec) : ?>
                        <?php $c = $this->popa_model->get_count_data(($rec->utiliti_sumber_man_id),$this->uri->segment(4),6);

                            if($this->uri->segment(4) != NULL){
                               if($c > 0)//($rec->utiliti_sumber_man_id==$ptf)
                                { 
                                 $checked = "checked"; 

                               }else{
                                $checked = "";
                               }
                             } else{

                              $checked = "";

                             }    
                        ?> <label class="checkbox">
                            <?php echo form_error('sivil[]'); ?>
                                                                
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="sivil[]" id="sivil[]" <?php echo $checked?>  >
                                                                    <?php echo $rec->nama; ?>
                                                            
                                                            </label>
                                                       <?php endforeach; ?>
                                                    <?php endif; ?>
                    </div>
                      <div id="home3" class="tab-pane fade">
                      <?php if(!empty($senarai_mekanikal)) : foreach ($senarai_mekanikal as $rec) : ?>
                        
                           <?php $c = $this->popa_model->get_count_data(($rec->utiliti_sumber_man_id),$this->uri->segment(4),6);

                            if($this->uri->segment(4) != NULL){
                               if($c > 0)//($rec->utiliti_sumber_man_id==$ptf)
                                { 
                                 $checked = "checked"; 

                               }else{
                                $checked = "";
                               }
                             } else{

                              $checked = "";

                             }    
                        ?> <label class="checkbox">
                                                                <?php echo form_error('mekanikal[]'); ?>
                                                                
                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="mekanikal[]" id="mekanikal[]" <?php echo $checked?>  >
                                                                    <?php echo $rec->nama; ?>
                                                            
                                                            </label>
                                                      
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                    </div>
                      <div id="home4" class="tab-pane fade">
                      <?php if(!empty($senarai_elektrik)) : foreach ($senarai_elektrik as $rec) : ?>
                          
                           <?php $c = $this->popa_model->get_count_data(($rec->utiliti_sumber_man_id),$this->uri->segment(4),6);

                            if($this->uri->segment(4) != NULL){
                               if($c > 0)//($rec->utiliti_sumber_man_id==$ptf)
                                { 
                                 $checked = "checked"; 

                               }else{
                                $checked = "";
                               }
                             } else{

                              $checked = "";

                             }    
                        ?> <label class="checkbox">
                            <?php echo form_error('elektrik[]'); ?>

                                                                <input type="checkbox" value="<?php echo $rec->utiliti_sumber_man_id; ?>" name="elektrik[]" id="elektrik[]" <?php echo $checked?>  >
                                                                    <?php echo $rec->nama; ?>
                                                            
                                                            </label>
                                                     <?php endforeach; ?>
                                                    <?php endif; ?>
                    </div>
                  </div>
                 </div> 
                  </div> </td>
    <td>&nbsp;</td>
    <td colspan="3"><div class="widget2"> 
                    <div class="widget-header2"> 
                                                    <div class="title"> 
                                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                                                        </span> PIF 
                                                    </div> 
                                                </div> 
                 
                                                <div class="widget-body"> 
                                                    
                                <?php if(!empty($senarai_pif)) : foreach ($senarai_pif as $rec) : ?>
                                   <?php $c = $this->popa_model->get_count_data(($rec->utiliti_sumber_man_id),$this->uri->segment(4),7);

                            if($this->uri->segment(4) != NULL){
                               if($c > 0)//($rec->utiliti_sumber_man_id==$ptf)
                                { 
                                 $checked = "checked"; 

                               }else{
                                $checked = "";
                               }
                             } else{

                              $checked = "";

                             }      
                                    
                        ?>     <label class="checkbox">
                              <input type="checkbox" value="<?php echo set_value('pif[]',$rec->utiliti_sumber_man_id); ?>" name="pif[]" id="pif[]" <?php echo $checked?>>
                              <?php echo $rec->nama; ?> 
                              
                            </label>
                       
                                <?php endforeach; ?>
                                <?php endif; ?>
                                                </div> 
                                            </div> </td>
  </tr>
</table>
                                        <br/><div class="clearfix">
                                        </div>
                              </div>
                                    <!-- table section END-->

                                </div>
                                <!-- section tambah END --> 

                            </div>
</div>
    
    
                 <!-- panel kontraktor fasiliti START -->
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="widget">
                                <div class="widget-header">
                                    <div class="title">
                                        <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                                        </span> Kontraktor Fasiliti
                                    </div>
                                </div>
                <!-- section tambah START -->               
                                <div class="widget-body">
                                    <ul class="icomoon-icons-container">
                                        <li>
                                            <a href="#myModal" data-toggle="modal">
                                                <span class="fs1" aria-hidden="true" data-icon="&#xe102;">
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <label class="tambah">
                                        Tambah Kontraktor Fasiliti
                                    </label>

                                    <div class="controls2">
                                    </div>  



                                    <!-- table section START -->
                                    <div id="dt_example" class="example_alt_pagination">
                                        <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                                        
                                            <thead>
                                                <tr>
                                                    <th style="width:4%">
                                                        #
                                                    </th>
                                                    <th style="width:4%">
                                                        Bil
                                                    </th>
                                                    <th style="width:10%">
                                                        Kategori Id
                                                    </th>
                                                    <th style="width:20%">
                                                        Nama
                                                    </th>
                                                    <th style="width:20%" class="hidden-phone">
                                                        Nama Syarikat
                                                    </th>
                                                    <th style="width:8%" class="hidden-phone">
                                                        Tindakan
                                                    </th>
                                                </tr>
                                            </thead> 


                                            <tbody>
                                                <?php $i=1; if(!empty($kontraktor_fasiliti)) : foreach ($kontraktor_fasiliti as $rec) : ?>
                                                <?php //echo form_open('admin/update'); ?>
                        
                                                <tr>
                                                    <td align="left">
                                                        <?php $c = $this->popa_model->get_count_dataKon(($rec->utiliti_sumber_man_id),$this->uri->segment(4));

                            if($this->uri->segment(4) != NULL){
                               if($c > 0)//($rec->utiliti_sumber_man_id==$ptf)
                                { 
                                 $checked = "checked"; 

                               }else{
                                $checked = "";
                               }
                             } else{

                              $checked = "";

                             }      
                                    
                        ?>    
                                                        <?php echo form_error('kontraktor[]'); ?>
                                                        <input type="checkbox" value="<?php echo set_value('kontraktor[]',$rec->utiliti_sumber_man_id); ?>" name='kontraktor_fasiliti[]'id="kontraktor[]" <?php echo $checked?>>
                                                    </td>

                                                    <td align="left">
                                                        <?php echo $i++; ?>
                                                    </td>

                                                    <td>
                                                        <?php if($get_nama_kontraktorfasiliti = $this->popa_model->get_nama_kontraktorfasiliti($rec->disiplin_bidang_id))
                                                            foreach ($get_nama_kontraktorfasiliti as $rr) 
                                                            echo $rr->bidang;
                                                        ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $rec->nama; ?>
                                                    </td>

                                                    <td>
                                                        <?php if($get_nama_kontraktorfasiliti = $this->popa_model->get_syarikat($rec->syarikat_id)) foreach ($get_nama_kontraktorfasiliti as $rr) echo $rr->nama_syarikat; ?>
                                                    </td>

                                                    <td align="center">
                                                        <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="Kemaskini" href="<?php echo site_url(); ?>/popa/kemaskini_kontraktor_fasiliti/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php echo $rec->utiliti_sumber_man_id; ?>"></a>
                                    </span></li></ul>
                                                    </td>
                                                </tr>
                                                
                                               
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>

                                        </table>
                                        <div class="clearfix">
                                        </div>
                                    </div>
                                    <!-- table section END-->

                                </div>
                                <!-- section tambah END --> 

                            </div>
                        </div>
                    </div>
                    <!-- panel kontraktor fasiliti END -->

    
    
    
                        </div>

<!-- buttons START --> 
                    <div align="right">
                        
                      <a href="<?php echo site_url('popa/senarai_ppd_popa/'.$this->uri->segment(3)) ?>" class="btn btn-danger input-top-margin" >
                         Batal</a>
                        <a href="<?php echo site_url('popa/kandungan_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>" class="btn btn-primary input-top-margin" >
                         Sebelum</a>
                            <input type="submit" value="Seterusnya" name="simpan" class="btn btn-primary">
                    </div>
                    <!-- buttons END -->   

            </p>
        </div>
    </div>
    <!-- div tab END -->
               
</div>

<!-- popup tambah START -->
              
                        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    ×
                                </button>
                                <h4 id="myModalLabel">
                                    Tambah Kontraktor Fasiliti
                                </h4>
                            </div>
          <!-- form popup START -->
                            <div class="modal-body">
                                <p>

  <table width="95%" border="0" align="center">
                                            
                    
                                <tr>
                               <td width="17%" height="50">
                                    <label class="control-label">Nama</label>
                                     </td>
                                                <td><?php echo form_input(array('name' => 'nama_kontraktor', 'value' => set_value('nama_kontraktor', $this->session->userdata('nama_kontraktor')), 'class' => 'large required')); ?>
                                            <font color="red">
                                                <?php echo form_error('nama_kontraktor'); ?>
                                            </font>
                                  </td></tr>
<tr>
                                                <td width="30%"  height="50">
                                                    <label class="control-label">Kategori</label>
                                                </td>
                                                <td>
                                                <select class="required large" name="kontraktor_fasiliti_kategori_id">
                                                 <option>- Sila Pilih -</option>
                                                <?php if(!empty($kontraktor)) : foreach ($kontraktor as $rec) : ?>

                                                <option value="<?php echo $rec->kontraktor_fasiliti_kategori_id; ?>">
                                                <?php echo set_value('kategori', $rec->kategori); ?>
                                            </option>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                        </select>
                                                </td></tr>
                                <tr>
                               <td width="17%" height="50">
                                    <label class="control-label">Nama Syarikat</label>
                                     </td>
                                      <td><select class="required large" name="syarikat_id">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($syarikat)) : foreach ($syarikat as $rec) : ?>
                                                        <option value="<?php echo $rec->syarikat_id; ?>"><?php echo set_value('nama_syarikat', $rec->nama_syarikat); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                                    </td></tr>
                    
                                <tr>
                               <td width="17%" height="50">
                                    <label class="control-label">E-mel</label>
                                    </td>
                                      <td><?php echo form_input(array('name' => 'emel', 'value' => set_value('emel', $this->session->userdata('emel')), 'class' => 'large required')); ?>
                                            <font color="red">
                                                <?php echo form_error('emel'); ?>
                                            </font>
                                    </td></tr>
                    
                              <!--  <tr>
                               <td width="17%" height="50">
                                    <label class="control-label">No. Telefon Pejabat</label>
                                    </td>
                                      <td> <?php //echo form_input(array('name' => 'notel_pej', 'value' => set_value('no_tel_pej', $this->session->userdata('no_tel_pej')), 'class' => 'large required')); ?>
                                            <font color="red">
                                                <?php //echo form_error('no_tel_pej'); ?>
                                            </font></td></tr>
                    -->
                                <tr>
                               <td width="17%" height="50">
                                    <label class="control-label">
                                        No. Telefon Bimbit</label>
                                    </td>
                                      <td><?php echo form_input(array('name' => 'no_tel_bimbit', 'value' => set_value('no_tel_bimbit', $this->session->userdata('no_tel_bimbit')), 'class' => 'large required')); ?>
                                            <font color="red">
                                                <?php echo form_error('no_tel_bimbit'); ?>
                                            </font>
                                   </td></tr>
  </table>
                                </p>
                            </div>
                            <!-- form popup END -->

<input type="hidden" name="sumber_id" value="2"> <input type="hidden" name="peranan" value="12">
                                                

                            <!-- button popup START -->
                            <div class="modal-footer">
                                <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">
                                    Batal
                                </a>
                                <input type="submit" value="Simpan" name="simpankontraktor" class="btn btn-warning2">                   
                            </div>
                            <!-- button popup END -->
            
                    
                            
                        </div> 
                  
                    <!-- popup tambah END -->


<?php echo form_close(); ?>








     
  