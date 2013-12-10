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
	$form_name = 'popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4);
	if($this->uri->segment(5) != NULL){$form_name = 'popa/pelan_komunikasi_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'pelan_komunikasi_popa');
	echo form_open($form_name, $attributes);
?> 
    <?php 
                       // echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

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
      <!-- panel 1 START -->
      <div class="row-fluid">
        <div class="span12">
          <div class="widget">
            <div class="widget-header">
              <div class="title">
                <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                  </span> Model Pelan Komunikasi untuk Kecemasan
                </div>
              </div>
<!-- upf -->
        <div class="widget-body">
                 <div class="clearfix">
                </div>
               
                <!-- table START -->
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table4"> 
                    
                    <thead>
                      <tr>
                          <th style="width:4%">
                                #
                            </th>
                        <th style="width:4%">
                          Bil
                        </th>
                        <th style="width:10%" class="hidden-phone">
                          Nama UPF
                        </th>
                        <th style="width:30%" class="hidden-phone">
                          Alamat UPF
                        </th>
                        <th style="width:10%" class="hidden-phone">
                          No. Telefon
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          No. Faks
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Tindakan
                        </th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php $i=1; if(!empty($senaraiupf)) : foreach ($senaraiupf as $rec) : ?>
                        <tr>
                            <td align="left">
                             <?php $c = $this->popa_model->get_count_datakecemasan(($rec->upf_id),$this->uri->segment(4));

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
                            <?php echo form_error('upf_id[]'); ?>
                            <input type="checkbox" value="<?php echo set_value('upf_id[]',$rec->upf_id); ?>" name='upf_id[]'id="upf_id[]" <?php echo $checked?>>
                        </td>
                          <td align="left">
                            <?php echo $i++; ?>
                          </td>
                          <td>
                            <?php echo $rec->nama_upf; ?>
                          </td>
                          <td>
                            <?php echo $rec->alamat_upf; ?>
                          </td>
                          <td>
                            <?php echo $rec->notel_upf; ?>
                          </td>
                          <td>
                            <?php echo $rec->nofax_upf; ?>
                          </td>
                          <td align="center">                       
                            <ul class="icomoon-icons-container">
                              <a href="">
                                <li class="rounded">
                                  <span class="fs1" data-icon="&#xe005" aria-hidden="true">
                                  </span>
                                </li>
                              </a>
                            </ul>                   
                          </td>
                        </tr>

                     
                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>

                  <div class="clearfix">
                  </div>
                    
                </div>
                <!-- table END -->
</div>
 <!-- table section START -->              
                <div class="widget-body">


                <!-- tambah pelan komunikasi START -->
                <ul class="icomoon-icons-container">
                  <a href="#myModal"  data-toggle="modal">
                    <li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;">
                      </span>
                    </li>
                  </a>
                </ul>
                  
                <label class="tambah">
                  Tambah Pelan Komunikasi
                </label>

                <div class="controls2">
                </div>

                <div class="clearfix">
                </div>
                <!-- tambah pelan komunikasi END -->

                <!-- table START -->
                <div id="dt_example" class="example_alt_pagination">
                  <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table"> 
                    
                    <thead>
                      <tr>
                        <th style="width:4%">
                          Bil
                        </th>
                        <th style="width:10%" class="hidden-phone">
                          Perkara
                        </th>
                        <th style="width:30%" class="hidden-phone">
                          Alamat
                        </th>
                        <th style="width:10%" class="hidden-phone">
                          No. Telefon
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          No. Faks
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Tindakan
                        </th>
                      </tr>
                    </thead>
                    
                    <tbody>
                      <?php $i=1; if(!empty($pelan_komunikasi)) : foreach ($pelan_komunikasi as $rec) : ?>
                        <tr>
                          <td align="left">
                            <?php echo $i++; ?>
                          </td>
                          <td>
                            <?php echo $rec->perkara; ?>
                          </td>
                          <td>
                            <?php echo $rec->pelan_kom_kecemasan_alamat; ?>
                          </td>
                          <td>
                            <?php echo $rec->pelan_kom_kecemasan_notel; ?>
                          </td>
                          <td>
                            <?php echo $rec->pelan_kom_kecemasan_nofaks; ?>
                          </td>
                          <td align="center">                       
                            <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php echo site_url(); ?>/popa/kemaskini_pelan_kom/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php echo $rec->popa_pelan_kom_kecemasan_id; ?>"></a>
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
                <!-- table END -->


                </div>
                <!-- table section END --> 

                  

            </div>
          </div>
        </div>
        <!-- panel 1 END -->







        <!-- panel 2 START -->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                  </span> Senarai Pihak Pembekal Bagi Setiap Perkhidmatan Aset
                </div>
              </div>


              	          	
                <!-- table section START -->            	
                <div class="widget-body">



                  <!-- tambah pelan komunikasi START -->
                  <ul class="icomoon-icons-container">
                    <a href="#myModal2"  data-toggle="modal">
                      <li>
                        <span class="fs1" aria-hidden="true" data-icon="&#xe102;">
                        </span>
                      </li>
                    </a>
                  </ul>
                  
                  <label class="tambah">
                    Tambah Pihak Pembekal
                  </label>

                  <div class="controls2">
                  </div>

                  <div class="clearfix">
                  </div>
                  <!-- tambah pelan komunikasi END -->




                  <!-- table START -->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table2"> 
                      
                      <thead>
                        <tr>
                          <th style="width:4%">
                            Bil
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            Nama Pembekal
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            Alamat
                          </th>
                          <th style="width:30%" class="hidden-phone">
                            No. Telefon
                          </th>
                          <th style="width:8%" class="hidden-phone">
                            No. Faks
                          </th>
                          <th style="width:8%" class="hidden-phone">
                            E-mel
                          </th>
                          <th style="width:8%" class="hidden-phone">
                            Tindakan
                          </th>
                        </tr>
                      </thead>
                    
                      <tbody>
                        <?php $i=1; if(!empty($pihak_pembekal)) : foreach ($pihak_pembekal as $rec) : ?>
                          <tr>
                         
                            <td align="left">
                              <?php echo $i++; ?>
                            </td>
                            <td>
                              <?php echo $rec->pembekal_nama; ?>
                            </td>
                            <td>
                              <?php echo $rec->pembekal_alamat_bandar; ?>
                            </td>
                            <td>
                              <?php echo $rec->pembekal_notel; ?>
                            </td>
                            <td>
                              <?php echo $rec->pembekal_nofaks; ?>
                            </td>
                            <td>
                              <?php echo $rec->pembekal_email; ?>
                            </td>
                            <td align="center">                       
                               <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php echo site_url(); ?>/popa/kemaskini_pelan_kom_pembekal/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php echo $rec->pembekal_id; ?>"></a>
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
                  <!-- table END -->


                </div>
                <!-- table section END --> 

                  

            </div>
          </div>
        </div>
        <!-- panel 2 END -->










        <!-- panel 3 START -->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                  </span> Senarai Alat Ganti
                </div>
              </div>


                            
                <!-- table section START -->              
                <div class="widget-body">



                  <!-- tambah pelan komunikasi START -->
                  <ul class="icomoon-icons-container">
                    <a href="#myModal3"  data-toggle="modal">
                      <li>
                        <span class="fs1" aria-hidden="true" data-icon="&#xe102;">
                        </span>
                      </li>
                    </a>
                  </ul>
                  
                  <label class="tambah">
                    Tambah Alat Ganti
                  </label>

                  <div class="controls2">
                  </div>

                  <div class="clearfix">
                  </div>
                  <!-- tambah pelan komunikasi END -->




                  <!-- table START -->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table3"> 
                      
                      <thead>
                        <tr>
                            <th style="width:4%">
                                #
                            </th>
                          <th style="width:4%">
                            Bil
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            Nama Alat Ganti
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            Nama Pembekal
                          </th>
                          <th style="width:8%" class="hidden-phone">
                            Tindakan
                          </th>
                        </tr>
                      </thead>
                    
                      <tbody>
                        <?php $i=1; if(!empty($alat_ganti)) : foreach ($alat_ganti as $rec) : ?>
                          <tr>
                               <td align="left">
                             <?php $c = $this->popa_model->get_count_datapembekal(($rec->alatganti_id),$this->uri->segment(4));

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
                            <?php echo form_error('alatganti_id[]'); ?>
                            <input type="checkbox" value="<?php echo set_value('alatganti_id[]',$rec->alatganti_id); ?>" name='alatganti_id[]'id="alatganti_id[]" <?php echo $checked?>>
                        </td>
                            <td align="left">
                              <?php echo $i++; ?>
                            </td>
                            <td>
                              <?php echo $rec->alatganti_nama; ?>
                            </td>
                            <td>
                                 <?php if($get_nama_kontraktorfasiliti = $this->popa_model->get_pembekal($rec->pembekal_id)) foreach ($get_nama_kontraktorfasiliti as $rr)
                                     echo $rr->pembekal_nama; ?>
                             <input type="hidden" value="<?php echo set_value('pembekal_id_alat[]',$rec->pembekal_id); ?>" name="pembekal_id_alat[]">
                            </td>
                            <td align="center">                       
                             <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php echo site_url(); ?>/popa/kemaskini_alat_ganti/<?php echo $this->uri->segment(3) ?>/<?php echo $this->uri->segment(4) ?>/<?php echo $rec->alatganti_id; ?>"></a>
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
                  <!-- table END -->


                </div>
                <!-- table section END --> 

                  

            </div>
          </div>
        </div>
        <!-- panel 2 END -->






      	<!-- buttons START --> 
        <div align="right">

          <a href="<?php echo site_url('popa/senarai_ppd_popa/'.$this->uri->segment(3)) ?>" class="btn btn-danger input-top-margin" >
             Batal</a>
            <a href="<?php echo site_url('popa/kandungan_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>" class="btn btn-primary input-top-margin" >
             Sebelum</a>
                <input type="submit" value="Seterusnya" name="simpan" class="btn btn-primary">
                    </div>
        <!-- buttons END -->  





    </div>
  </div>
  <!-- tab section END -->


</div>
<!-- tab navigation END --> 
















<!-- ******************** POPUP SECTION ******************* -->



<!-- popup pelan komunikasi START -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
      ×
    </button>
    <h4 id="myModalLabel">
      Pelan Komunikasi untuk Kecemasan
    </h4>
  </div>
            
  <div class="modal-body">
      <p>
      <table>
          <tr><td width="171">
    
          <label class="control-label">
            <div align="center">Perkara 
              
            </div>
          </label></td><td width="96"><div align="center"><?php echo form_input(array('name' => 'perkara', 'value' => set_value('perkara', $this->session->userdata('perkara')), 'class' => 'large required')); ?>
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
            </td><td><div align="center"><?php echo form_input(array('name' => 'alamat_kom', 'value' => set_value('alamat_kom', $this->session->userdata('alamat_kom')), 'class' => 'large required')); ?>
              <font color="red">
                <?php echo form_error('alamat_kom'); ?>  
              </font>
              
            </div></td></tr> 
          <tr><td>         
     
          <label class="control-label">
            <div align="center">No. Telefon 
              
            </div>
          </label> </td><td><div align="center"><?php echo form_input(array('name' => 'no_tel_kom', 'value' => set_value('no_tel_kom', $this->session->userdata('no_tel_kom')), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('no_tel_kom'); ?>   
            </font>
            
        </div></td></tr> 
          <tr><td>  
        
          <label class="control-label">
            <div align="center">No. Faks 
              
            </div>
          </label></td><td><div align="center"><?php echo form_input(array('name' => 'no_fax_kom', 'value' => set_value('no_fax_kom', $this->session->userdata('no_fax_kom')), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('no_fax_kom'); ?>  
            </font>
            
        </div></td></tr> </table>
    </p>  
  </div>
            

  <!-- button popup START -->
  <div class="modal-footer">
    <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">
      Batal
    </a>
     <input type="submit" name="simpanpelankom" value="Simpan" class="btn btn-warning2" />
  </div>
  <!-- button popup END -->

                  
</div>
<!-- popup pelan komunikasi END -->








<!-- popup pihak pembekal START -->
<div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
      ×
    </button>
    <h4 id="myModalLabel">
      Rekod Pembekal Perkhidmatan Aset
    </h4>
  </div>
            
  <div class="modal-body">
    <p>
    <table width="429" height="200"><tr><td width="251">
          <label class="control-label">
            <div align="center">Nama Pembekal </div>
          </label></td><td width="166">
            <div align="center"><?php echo form_input(array('name' => 'nama_pembekal', 'value' => set_value('nama_pembekal', $this->session->userdata('nama_pembekal')), 'class' => 'large required')); ?>
              <font color="red">
               <?php echo form_error('nama_pembekal'); ?>  
              </font>
            </div></td></tr>
                    
        <tr><td>
          <label class="control-label">
            <div align="center">Alamat Pembekal </div>
          </label></td><td>
            <div align="center"><?php echo form_input(array('name' => 'alamat_pembekal', 'value' => set_value('alamat_pembekal', $this->session->userdata('alamat_pembekal')), 'class' => 'large required')); ?>
              <font color="red">
                <?php echo form_error('alamat_pembekal'); ?>   
              </font>
          </div></td></tr>
        <tr><td>
        <label class="control-label">
            <div align="center">Jalan </div>
        </label></td><td>
          <div align="center"><?php echo form_input(array('name' => 'jalan_pembekal', 'value' => set_value('jalan_pembekal', $this->session->userdata('jalan_pembekal')), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('jalan_pembekal'); ?>    
            </font>
          </div></td></tr>
        
        <tr><td>
        <label class="control-label">
            <div align="center">Bandar </div>
        </label>
          </td><td><div align="center"><?php echo form_input(array('name' => 'bandar_pembekal', 'value' => set_value('bandar_pembekal', $this->session->userdata('bandar_pembekal')), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('bandar_pembekal'); ?>   
            </font>
          </div></td></tr>
        <tr><td>
          <label class="control-label">
            <div align="center">Negeri </div>
          </label>
           </td><td><div align="center"><?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>  <font color="red">
             <?php echo form_error('negeri'); ?>   
           </font> </div></td></tr>
        <tr><td>
          <label class="control-label">
            <div align="center">Poskod </div>
          </label>
          </td><td><div align="center"><?php echo form_input(array('name' => 'poskod_pembekal', 'value' => set_value('poskod_pembekal', $this->session->userdata('poskod_pembekal')), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('poskod_pembekal'); ?>    
            </font></div></td></tr>
        <tr><td>
       
          <label class="control-label">
            <div align="center">No. Telefon </div>
          </label>
          </td><td><div align="center"><?php echo form_input(array('name' => 'no_tel_pembekal', 'value' => set_value('no_tel_pembekal', $this->session->userdata('no_tel_pembekal')), 'class' => 'large required')); ?>
            <font color="red">
              <?php echo form_error('no_tel_pembekal'); ?>    
            </font> </div></td></tr>
        <tr><td>
          <label class="control-label">
            <div align="center">No. Faks </div>
          </label>
          </td><td><div align="center"><?php echo form_input(array('name' => 'no_faks_pembekal', 'value' => set_value('no_faks_pembekal', $this->session->userdata('no_faks_pembekal')), 'class' => 'large required')); ?>
            <font color="red">
             <?php echo form_error('no_faks_pembekal'); ?>     
            </font></div></td></tr>
        <tr><td>
        <label class="control-label">
            <div align="center">E-mel </div>
        </label>
            </td><td><div align="center"><?php echo form_input(array('name' => 'emel_pembekal', 'value' => set_value('emel_pembekal', $this->session->userdata('emel_pembekal')), 'class' => 'large required')); ?>
              <font color="red">
                <?php echo form_error('emel_pembekal'); ?>   
              </font></div></td></tr>
        </table>
    
    </p>  
  </div>
            

  <!-- button popup START -->
  <div class="modal-footer">
    <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">
      Batal
    </a>
     <input type="submit" name="simpanpembekal" value="Simpan" class="btn btn-warning2" />            
  </div>
  <!-- button popup END -->

                  
</div>
<!-- popup pihak pembekal END -->









<!-- popup alat ganti START -->
<div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
      ×
    </button>
    <h4 id="myModalLabel">
      Rekod Alat Ganti
    </h4>
  </div>
            
  <div class="modal-body">
    <p>
    <table width="379"><tr><td width="161">
          <label class="control-label">
            <div align="center">Nama Pembekal </div>
          </label>
            </td><td width="206"><select class="required large" name="pembekal_id_alat_ganti">
                <option value="">SILA PILIH</option>
                <?php if(!empty($pihak_pembekal)) : foreach ($pihak_pembekal as $rec) : ?>
                <option value="<?php echo $rec->pembekal_id; ?>"><?php echo set_value('pembekal_nama', $rec->pembekal_nama); ?></option>
                <?php echo form_error('pembekal_id_alat_ganti'); ?> 
                    <?php endforeach; ?>
                <?php endif; ?></select>
             
            </td></tr>
        <tr><td>
          <label class="control-label">
            <div align="center">Nama Alat Ganti </div>
          </label>
            </td><td>
             ><?php echo form_input(array('name' => 'nama_alat_ganti', 'value' => set_value('nama_alat_ganti', $this->session->userdata('nama_alat_ganti')), 'class' => 'large required')); ?>
              <font color="red">
                <?php echo form_error('nama_alat_ganti'); ?>   
              </font>   
        </td> 
        </tr>
    </table>
       
    </p>  
  
 </div>
  <!-- button popup START -->
  <div class="modal-footer">
    <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">
      Batal
    </a>
    <input type="submit" name="simpanalatganti" value="Simpan" class="btn btn-warning2" />             
  </div>
  <!-- button popup END -->
 
                  

<!-- popup alat ganti END -->

<?php echo form_close(); ?>
</div>
</div>




