<!--breadcrumb-->
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
    <br />
    <!--tab navigation--> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('main/senarai_ptf_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('main/senarai_ptf_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('main/senarai_ptf_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('main/senarai_ptf_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'kat_saliran_ptra',
                           'id' => 'kat_saliran_ptra',
                        );
        echo form_open('main/kat_saliran_ptra',$attributes); ?>
      <!--panel 2--> 
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
                      <div class="controls controls-row">
                        
                        <select id="kump_agensi">
                          <option>- Sila Pilih -</option>
                          <option>JKR</option>
                          <option>KKR</option>
                          <option>JPS</option>
                          <option>JPA</option>
                        </select>
                      </div>
                    </div>
                  
                    <div class="control-group">
                      <label class="control-label" for="kementerian">
                        Kementerian
                      </label>
                      <div class="controls">
                        <?php echo form_error('kementerian'); ?>
                        <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
                      </div>
                    </div>

                    <div class="control-group">
                       <label class="control-label">
                         <div class="input-append"><label class="radio">Jabatan&nbsp;&nbsp;
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                            </label></div>
                          <div class="input-append"><label class="radio">Agensi
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            </label></div>
                       </label>
                        <div class="controls">
                          <?php echo form_error('jab_agensi'); ?>
                        <?php echo form_dropdown('jab_agensi', $jabatan, 'id="jab_agensi"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="negara">
                        Negara
                      </label>
                      <div class="controls controls-row">
                        
                        <select id="negara">
                          <option>- Sila Pilih -</option>
                          <option>Malaysia</option>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="negeri">
                        Negeri
                      </label>
                      <div class="controls">
                        <?php echo form_error('negeri'); ?>
                        <?php echo form_dropdown('negeri', $negeri, 'id="negeri"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="daerah">
                        Daerah
                      </label>
                      <div class="controls">
                        <?php echo form_error('daerah'); ?>
                        <?php echo form_dropdown('daerah', $daerah, 'id="daerah"');?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label" for="kat_premis_aset">
                        Kategori Premis Aset
                      </label>
                      <div class="controls">
                        <?php echo form_error('katprem'); ?>
                        <?php echo form_dropdown('katprem', $katprem, 'id="katprem"');?>
                      </div>
                    </div>
                  
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 2-->
    </div>
      <!--/.END main-container-->
                <!--buttons--> 
                <div class="next-prev-btn-container pull-right">
                        <?php
                  $batal = array(
                      'name'    => '',
                      'id'      => '',
                      'class'   => 'btn btn-danger input-top-margin',
                      'value'   => '',
                      'type'    => 'button',
                      'content' => 'Batal'
                  );

                  echo form_button($batal);
                  
                  ?>

                  <a href="<?php echo site_url('main/status_premis_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
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
                <?php  echo form_close();?>                
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->