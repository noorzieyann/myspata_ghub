<!--breadcrumb-->
<!--yann 271113-->
<?php 
  $form_name = 'ptra/kat_jalan_ptra/'.$this->uri->segment(3);
  if($this->uri->segment(4) != NULL){$form_name = 'ptra/kat_jalan_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4);}
  $attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kat_jalan_ptra');

  echo form_open($form_name, $attributes);
?>   
<div class="widget-body">
                  <ul class="breadcrumb-beauty">
                    <li>
                      <a href="<?php echo site_url('main')?>">
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
    <!--breadcrumb--><?php if(!empty($tab)) { echo $tab;} ?>
      <!--panel 2--> 
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
                      <label class="control-label" for="kumpagensi">
                        Kumpulan Agensi
                      </label>
                      <div class="controls">
                           <font color="red"> <?php echo form_error('kumpagensi'); ?></font>
                     <select class="required large" name="kumpagensi">
                            <option value="">SILA PILIH</option>
                            <?php if(!empty($katagensi)) : foreach ($katagensi as $rec) : ?>
                            <option value="<?php echo $rec->idkatagensi; ?>"><?php echo set_value('fld_katagensidesc', $rec->fld_katagensidesc); ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                         </select>
                      </div>
                    </div>
                  
                   <?php $sessionarray = $this->session->all_userdata();?>
                     <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                      <input class="input-large" type="text" value="<?php echo $sessionarray['user_kementerian'];?>" name="idkem" disabled>
                      <?php if($kem1=$this->ptra_model->get_kem1($sessionarray['user_kemid'])):foreach ($kem1 as $rec) :?>
                      <input class="input-large" type="hidden" value="<?php echo $rec-> idkem_myspata1;?>" name="idkem">
                       <?php endforeach; ?>
                    <?php  endif; ?></div>
                    </div> 

                    <div class="control-group">
                      <label class="control-label">Jabatan
                           </label>
                        <div class="controls">
                             <font color="red"> <?php echo form_error('jabatan'); ?></font>
                         <select class="required large" name="jabatan">
                            <option value="">SILA PILIH</option>
                            <?php if(!empty($jabatan)) : foreach ($jabatan as $rec) : ?>
                            <option value="<?php echo $rec->idjab_agensi_myspata1; ?>"><?php echo set_value('nama_jab_agensi', $rec->nama_jab_agensi); ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                         </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="negara">
                        Negara
                      </label>
                      <div class="controls">
                           <font color="red"> <?php echo form_error('negara'); ?></font>
                          <select class="required large" name="negara">
                            <option value="">SILA PILIH</option>
                            <?php if(!empty($negara)) : foreach ($negara as $rec) : ?>
                            <option value="<?php echo $rec->kodnegara; ?>"><?php echo set_value('fld_negara', $rec->fld_negara); ?></option>
                            <?php endforeach; ?>
                            <?php endif; ?>
                         </select>
                       
                      </div>
                    </div>
 <input type="hidden"  name="premis" value="2">
                  
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 2-->
    </div>
      <!--/.END main-container-->
                <!--buttons--> 
                
                
                <div class="next-prev-btn-container pull-right">
                      <a href="<?php echo site_url('ptra/senarai_ppd_ptra/'.$this->uri->segment(3))?>"><button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button></a>
                  <a href="<?php echo site_url('ptra/status_premis_ptra/'.$this->uri->segment(3))?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>

                  <?php
                  $seterusnya = array(
                      'name'    => '',
                      'id'      => '',
                      'class'   => 'btn btn-primary',
                      'value'   => '',
                      'type'    => 'submit',
                      'content' => 'Seterusnya'
                  );

                  echo form_button($seterusnya);
                  
                  ?>
                    
                     
                </div> 
                <!--/.END buttons-->
                           
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
 <?php  echo form_close();?>        <!--/.END tab navigation-->
