<!--breadcrumb-->
<?php
$form_name = 'ptra/pra_reg_edit/' . $this->uri->segment(3). '/' . $this->uri->segment(4);
if ($this->uri->segment(5) != NULL) {
    $form_name = 'ptra/pra_reg_edit/' . $this->uri->segment(3) . '/' . $this->uri->segment(4). '/' . $this->uri->segment(5);
}

$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kat_bangunan_ptra');
echo form_open($form_name, $attributes);
?>
<div class="widget-body">
    <ul class="breadcrumb-beauty">
        <li>
            <a href="<?php echo site_url('main') ?>">
                Fungsi
            </a> 
        </li>
        <li>
            <a href="#">
                Perangcangan
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
                PTRA
            </a>   
        </li>
    </ul>
</div>
<!--END breadcrumb-->
<div class="clearfix"></div>
<br/>
<!--breadcrumb--><?php if (!empty($tab)) {
    echo $tab;
} ?>
<!--panel 2--> 

<?php
//echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

if ($this->session->flashdata('flashError')) {
    echo '<div class="mws-form-message error">';
    echo '<i class="icol-ban"></i> ' . $this->session->flashdata('flashError');
    echo '</div>';
}
if ($this->session->flashdata('flashComfirm')) {
    echo '<div class="mws-form-message success">';
    echo '<i class="icol-accept"></i> ' . $this->session->flashdata('flashComfirm');
    echo '</div>';
}
?>



<?php
if ($getKatPremis = $this->ptra_model->get_katpremis_aset(1)) {
    foreach ($getKatPremis as $row) {
    //if($this->ptra_model->get_katpremis_aset(1))
        ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                        <div class="title">
                            <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kategori Aset Bangunan 
                        </div>
                    </div>
                    <div class="widget-body">
                        <div class="control-group">
                            <label class="control-label" for="kumpagensi">
                                Kumpulan Agensi
                            </label>
                            <div class="controls">
                                <font color="red"> <?php echo form_error('kumpagensi'); ?></font>
                                <select class="required input-xlarge" name="kumpagensi"  disabled >
                                    <option value="">SILA PILIH</option>
                                    <?php if (!empty($katagensi)) {
                                        foreach ($katagensi as $rec) {
                                          ?>
                                       <option value="<?php echo $rec->idkatagensi; ?>" <?php if ($rec->idkatagensi == $row->idkatagensi){ echo 'selected="selected"';} ?>><?php echo set_value('fld_katagensidesc', $rec->fld_katagensidesc); ?></option>
                                        <?php }} ?>
                                </select>
                                    </div>
                                </div>
                                 <?php $sessionarray = $this->session->all_userdata(); ?>
                                <div class="control-group">
                                    <label class="control-label">
                                        Kementerian
                                    </label>
                                    <div class="controls">
                                        <input class="input-xlarge" type="text" value="<?php echo $sessionarray['user_kementerian']; ?>" name="idkem" disabled>
                                        <?php if ($kem1 = $this->ptra_model->get_kem1($sessionarray['user_kemid'])):foreach ($kem1 as $rec) : ?>
                                        <input class="input-xlarge" type="hidden" value="<?php echo $rec->idkem_myspata1; ?>" name="idkem">
                                        <?php endforeach; ?>
                                    <?php endif; ?></div>
                                                    </div> 

                                <div class="control-group">
                                    <label class="control-label">Jabatan
                                    </label>
                                    <div class="controls">
                                        <font color="red"> <?php echo form_error('jabatan'); ?></font>
                                        <select class="required input-xlarge" name="jabatan" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($jabatan)) {
                                                foreach ($jabatan as $rec) {?>
                                                <option value="<?php echo $rec->idjab_agensi_myspata1; ?>" <?php if ($rec->idjab_agensi_myspata1 == $row->idjab_agensi){ echo 'selected="selected"';} ?> ><?php echo set_value('nama_jab_agensi', $rec->nama_jab_agensi); ?></option>
                                            <?php }} ?>
                                          </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="negara">
                                        Negara
                                    </label>
                                    <div class="controls">
                                        <font color="red"><?php echo form_error('negara'); ?></font>
                                        <select class="required input-xlarge" name="negara" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($negara)) {
                                                foreach ($negara as $rec) {?>
                                                <option value="<?php echo $rec->kodnegara; ?>" <?php if ($rec->kodnegara == $row->idnegara){ echo 'selected="selected"';} ?> ><?php echo set_value('fld_negara', $rec->fld_negara); ?></option>
                                            <?php }} ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="negeri">
                                        Negeri
                                    </label>
                                    <div class="controls">
                                        <font color="red"><?php echo form_error('negeri'); ?></font>
                                        <select class="required input-xlarge" name="negeri" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($negeri)) {
                                                foreach ($negeri as $rec) {?>
                                                <option value="<?php echo $rec->idnegeri_myspata1; ?>" <?php if ($rec->idnegeri_myspata1 == $row->idnegeri){ echo 'selected="selected"';} ?> ><?php echo set_value('namanegeri', $rec->namanegeri); ?></option>
                                            <?php }} ?> 
                                         
                                        </select>

                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="daerah">
                                        Daerah
                                    </label>
                                    <div class="controls">
                                        <font color="red"><?php echo form_error('daerah'); ?></font>
                                        <select class="required input-xlarge" name="daerah" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($daerah)) {
                                                foreach ($daerah as $rec) {?>
                                                <option value="<?php echo $rec->iddaerah_myspata1; ?>" <?php if ($rec->iddaerah_myspata1 == $row->iddaerah){ echo 'selected="selected"';} ?> ><?php echo set_value('nama_daerah', $rec->nama_daerah); ?></option>
                                            <?php }} ?> 
                                          </select>

                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="mukim">
                                        Mukim
                                    </label>
                                    <div class="controls">
                                        <font color="red"><?php echo form_error('mukim'); ?></font>
                                        <select class="required input-xlarge" name="mukim" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($mukim)) {
                                                foreach ($mukim as $rec) {?>
                                                <option value="<?php echo $rec->idmukim_myspata1; ?>" <?php if ($rec->idmukim_myspata1 == $row->idmukim){ echo 'selected="selected"';} ?> ><?php echo set_value('fld_mukimdesc', $rec->fld_mukimdesc); ?></option>
                                            <?php }} ?> 
                                            </select>

                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="kat_premis_aset">
                                        Kategori Premis Aset
                                    </label>
                                    <div class="controls">
                                        <font color="red"> <?php echo form_error('kat_premis'); ?></font>  
                                        <?php
                                        $options = array(
                                            '' => '- Pilih Kumpulan Premis -',
                                            'BA' => 'Kediaman',
                                            'BB' => 'Komersial',
                                            'BC' => 'Industri',
                                            'BD' => 'Pejabat Kerajaan (Keinstitusian)',
                                            'BE' => 'Pendidikan',
                                            'BF' => 'Rumah Ibadat',
                                            'BG' => 'Rekreasi',
                                            'BH' => 'Perkuburan',
                                            'BJ' => 'Infrastruktur',
                                            'BM' => 'Kesihatan',
                                            'BS' => 'Keselamatan'
                                        );
                                        echo form_dropdown('kat_premis',$options,$row->idpremis,'disabled="disabled" class="required input-xlarge"');
                                        ?></div>
                                </div>
                                <input type="hidden"  name="premis" value="1">
                            </div>
                        </div>
                    </div>
                </div>


                <!--/.END panel 2 kategori jalan-->
            <?php
            }
        }
        else if ($getKatPremis = $this->ptra_model->get_katpremis_aset(2)) {
    foreach ($getKatPremis as $row) { ?>
       <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kategori Aset Jalan 
                  </div>
                </div>
               <div class="widget-body">
                    <div class="control-group">
                      <label class="control-label" for="kumpagensijalan">
                        Kumpulan Agensi
                      </label>
                      <div class="controls">
                                <font color="red"> <?php echo form_error('kumpagensi'); ?></font>
                                <select class="required input-xlarge" name="kumpagensijalan" disabled>
                                    <option value="">SILA PILIH</option>
                                    <?php if (!empty($katagensi)) {
                                        foreach ($katagensi as $rec) {
                                          ?>
                                       <option value="<?php echo $rec->idkatagensi; ?>" <?php if ($rec->idkatagensi == $row->idkatagensi){ echo 'selected="selected"';} ?> ><?php echo set_value('fld_katagensidesc', $rec->fld_katagensidesc); ?></option>
                                        <?php }} ?>
                                </select>
                                    </div>
                    </div>
                  
                   <?php $sessionarray = $this->session->all_userdata();?>
                     <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                      <input class="input-xlarge" type="text" value="<?php echo $sessionarray['user_kementerian'];?>" name="idkem" disabled>
                      <?php if($kem1=$this->ptra_model->get_kem1($sessionarray['user_kemid'])):foreach ($kem1 as $rec) :?>
                      <input class="input-large" type="hidden" value="<?php echo $rec-> idkem_myspata1;?>" name="idkemjalan">
                       <?php endforeach; ?>
                    <?php  endif; ?></div>
                    </div> 

                    <div class="control-group">
                      <label class="control-label">Jabatan
                           </label>
                         <div class="controls">
                                        <font color="red"> <?php echo form_error('jabatanjalan'); ?></font>
                                        <select class="required input-xlarge" name="jabatanjalan" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($jabatan)) {
                                                foreach ($jabatan as $rec) {?>
                                                <option value="<?php echo $rec->idjab_agensi_myspata1; ?>" <?php if ($rec->idjab_agensi_myspata1 == $row->idjab_agensi){ echo 'selected="selected"';} ?> ><?php echo set_value('nama_jab_agensi', $rec->nama_jab_agensi); ?></option>
                                            <?php }} ?>
                                          </select>
                                    </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="negara">
                        Negara
                      </label>
                      <div class="controls">
                          <font color="red"><?php echo form_error('negarajalan'); ?></font>
                                        <select class="required input-xlarge" name="negarajalan" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($negara)) {
                                                foreach ($negara as $rec) {?>
                                                <option value="<?php echo $rec->kodnegara; ?>" <?php if ($rec->kodnegara == $row->idnegara){ echo 'selected="selected"';} ?> ><?php echo set_value('fld_negara', $rec->fld_negara); ?></option>
                                            <?php }} ?>
                                        </select>

                       
                      </div>
                    </div>
 <input type="hidden"  name="premisjalan" value="2">
                  
               </div>
              </div>
            </div>
          </div> 
        
        
   <?php      
     }
        }
    else if ($getKatPremis = $this->ptra_model->get_katpremis_aset(3)) {
    foreach ($getKatPremis as $row) {
        ?>
        <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kategori Aset Pembetungan 
                  </div>
                </div>
               <div class="widget-body">
                    <div class="control-group">
                      <label class="control-label" for="kump_agensi">
                        Kumpulan Agensi
                      </label>
                       <div class="controls">
                                <font color="red"> <?php echo form_error('kumpagensipem'); ?></font>
                                <select class="required input-xlarge" name="kumpagensipem" disabled>
                                    <option value="">SILA PILIH</option>
                                    <?php if (!empty($katagensi)) {
                                        foreach ($katagensi as $rec) {
                                          ?>
                                       <option value="<?php echo $rec->idkatagensi; ?>" <?php if ($rec->idkatagensi == $row->idkatagensi){ echo 'selected="selected"';} ?> ><?php echo set_value('fld_katagensidesc', $rec->fld_katagensidesc); ?></option>
                                        <?php }} ?>
                                </select>
                                    </div>
                    </div>
                  
                    <?php $sessionarray = $this->session->all_userdata();?>
                     <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                      <input class="input-xlarge" type="text" value="<?php echo $sessionarray['user_kementerian'];?>" name="idkem" disabled>
                      <?php if($kem1=$this->ptra_model->get_kem1($sessionarray['user_kemid'])):foreach ($kem1 as $rec) :?>
                      <input class="input-large" type="hidden" value="<?php echo $rec-> idkem_myspata1;?>" name="idkempem">
                       <?php endforeach; ?>
                    <?php  endif; ?></div>
                    </div> 
                   
                                <div class="control-group">
                                    <label class="control-label">Jabatan
                                    </label>
                                    <div class="controls">
                                        <font color="red"> <?php echo form_error('jabatanpem'); ?></font>
                                        <select class="required input-xlarge" name="jabatanpem" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($jabatan)) {
                                                foreach ($jabatan as $rec) {?>
                                                <option value="<?php echo $rec->idjab_agensi_myspata1; ?>" <?php if ($rec->idjab_agensi_myspata1 == $row->idjab_agensi){ echo 'selected="selected"';} ?> ><?php echo set_value('nama_jab_agensi', $rec->nama_jab_agensi); ?></option>
                                            <?php }} ?>
                                          </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="negara">
                                        Negara
                                    </label>
                                    <div class="controls">
                                        <font color="red"><?php echo form_error('negarapem'); ?></font>
                                        <select class="required input-xlarge" name="negarapem" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($negara)) {
                                                foreach ($negara as $rec) {?>
                                                <option value="<?php echo $rec->kodnegara; ?>" <?php if ($rec->kodnegara == $row->idnegara){ echo 'selected="selected"';} ?> ><?php echo set_value('fld_negara', $rec->fld_negara); ?></option>
                                            <?php }} ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="negeri">
                                        Negeri
                                    </label>
                                    <div class="controls">
                                        <font color="red"><?php echo form_error('negeripem'); ?></font>
                                        <select class="required input-xlarge" name="negeripem" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($negeri)) {
                                                foreach ($negeri as $rec) {?>
                                                <option value="<?php echo $rec->idnegeri_myspata1; ?>" <?php if ($rec->idnegeri_myspata1 == $row->idnegeri){ echo 'selected="selected"';} ?> ><?php echo set_value('namanegeri', $rec->namanegeri); ?></option>
                                            <?php }} ?> 
                                         
                                        </select>

                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="daerah">
                                        Daerah
                                    </label>
                                    <div class="controls">
                                        <font color="red"><?php echo form_error('daerahpem'); ?></font>
                                        <select class="required input-xlarge" name="daerahpem" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($daerah)) {
                                                foreach ($daerah as $rec) {?>
                                                <option value="<?php echo $rec->iddaerah_myspata1; ?>" <?php if ($rec->iddaerah_myspata1 == $row->iddaerah){ echo 'selected="selected"';} ?> ><?php echo set_value('nama_daerah', $rec->nama_daerah); ?></option>
                                            <?php }} ?> 
                                          </select>

                                    </div>
                                </div>
 
                    <div class="control-group">
                      <label class="control-label" for="kat_premis_aset">
                        Kategori Premis Aset
                      </label>
                      <div class="controls">
                         <font color="red"> <?php echo form_error('kat_premispem'); ?></font>  
                     <?php $options = array(
                                ''  => '- Pilih Kumpulan Premis -',
                                'UF'  => 'Pembetungan',
                             
                              );
                                echo form_dropdown('kat_premispem',$options,$row->idpremis,'disabled="disabled" class="required input-xlarge"');

                                ?></div>
                    </div>
                  <input type="hidden"  name="premispem" value="3">
               </div>
              </div>
            </div>
          </div>  
             
                
    <?php } } 
     else if ($getKatPremis = $this->ptra_model->get_katpremis_aset(4)) {
    foreach ($getKatPremis as $row) {
       ?>   
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kategori Aset Saliran 
                  </div>
                </div>
               <div class="widget-body">
                   <div class="control-group">
                      <label class="control-label" for="kump_agensi">
                        Kumpulan Agensi
                      </label>
                       <div class="controls">
                                <font color="red"> <?php echo form_error('kumpagensisaliran'); ?></font>
                                <select class="required input-xlarge" name="kumpagensisaliran" disabled>
                                    <option value="">SILA PILIH</option>
                                    <?php if (!empty($katagensi)) {
                                        foreach ($katagensi as $rec) {
                                          ?>
                                       <option value="<?php echo $rec->idkatagensi; ?>" <?php if ($rec->idkatagensi == $row->idkatagensi){ echo 'selected="selected"';} ?> disable ><?php echo set_value('fld_katagensidesc', $rec->fld_katagensidesc); ?></option>
                                        <?php }} ?>
                                </select>
                                    </div>
                    </div>
                  
                    <?php $sessionarray = $this->session->all_userdata();?>
                     <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                      <input class="input-xlarge" type="text" value="<?php echo $sessionarray['user_kementerian'];?>" name="idkem" disabled>
                      <?php if($kem1=$this->ptra_model->get_kem1($sessionarray['user_kemid'])):foreach ($kem1 as $rec) :?>
                      <input class="input-large" type="hidden" value="<?php echo $rec-> idkem_myspata1;?>" name="idkemsaliran">
                       <?php endforeach; ?>
                    <?php  endif; ?></div>
                    </div> 
                   <div class="control-group">
                                    <label class="control-label">Jabatan
                                    </label>
                                    <div class="controls">
                                        <font color="red"> <?php echo form_error('jabatansaliran'); ?></font>
                                        <select class="required input-xlarge" name="jabatansaliran" disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($jabatan)) {
                                                foreach ($jabatan as $rec) {?>
                                                <option value="<?php echo $rec->idjab_agensi_myspata1; ?>" <?php if ($rec->idjab_agensi_myspata1 == $row->idjab_agensi){ echo 'selected="selected"';} ?> ><?php echo set_value('nama_jab_agensi', $rec->nama_jab_agensi); ?></option>
                                            <?php }} ?>
                                          </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="negara">
                                        Negara
                                    </label>
                                    <div class="controls">
                                        <font color="red"><?php echo form_error('negarasaliran'); ?></font>
                                        <select class="required input-xlarge" name="negarasaliran"disabled>
                                            <option value="">SILA PILIH</option>
                                             <?php if (!empty($negara)) {
                                                foreach ($negara as $rec) {?>
                                                <option value="<?php echo $rec->kodnegara; ?>" <?php if ($rec->kodnegara == $row->idnegara){ echo 'selected="selected"';} ?> ><?php echo set_value('fld_negara', $rec->fld_negara); ?></option>
                                            <?php }} ?>
                                        </select>

                                    </div>
                                </div>

                   <div class="control-group">
                      <label class="control-label" for="kat_premis_aset">
                        Kategori Premis Aset
                      </label>
                      <div class="controls">
                         <font color="red"> <?php echo form_error('kat_premissaliran'); ?></font>  
                     <?php $options = array(
                                ''  => '- Pilih Kumpulan Premis -',
                                'LS'  => 'Lembangan Sungai',
                                'ZP'    => 'Zon Pantai',
                                // 'class'  => 'required input-xlarge',
                              
                              );
                                echo form_dropdown('kat_premissaliran',$options,$row->idpremis,'disabled="disabled" class="required input-xlarge"');

                                ?></div>
                    </div>
                  <input type="hidden"  name="premissaliran" value="4">
               </div>
              </div>
            </div>
          </div> 
               
      <?php } } ?> 
                
                 <?php
                         

                    if($sessionarray ['user_rolegroupid'] == 3)
                    {?>
                <div class="next-prev-btn-container pull-right">
            <a href="<?php echo site_url('ptra/summary_pp_ptra/' . $this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-danger input-top-margin" type="button">
                    Batal
                </button></a>
             <a href="<?php echo site_url('ptra/summary_pp_ptra/' . $this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                    Kembali
                </button></a>
        </div> 
              <?php  }
              else if($sessionarray ['user_rolegroupid'] == 4)
                    { ?>
                <div class="next-prev-btn-container pull-right">
            <a href="<?php echo site_url('ptra/summary_ptf_ptra/' . $this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-danger input-top-margin" type="button">
                    Batal
                </button></a>
             <a href="<?php echo site_url('ptra/summary_ptf_ptra/' . $this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                    Kembali
                </button></a>
                    </div> <?php } ?>
                
        <!--/.END buttons-->
        <?php echo form_close(); ?>                
</div>                  
</div>
</div>  <!--/.END tab section-->
</div>  
</div>
</div>   <!--/.END tab navigation-->