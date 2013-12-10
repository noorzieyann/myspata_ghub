  
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
        
<ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
        <form id="" class="form-horizontal no-margin" action="kandungan_ptra" method="post">
            
      <!--main container-->
      <div class="main-container">
         <!--panel 1-->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penerimaan Aset (PTRA)
                  </div>
                </div>
                <div class="widget-body">
                  
                      <?php $sessionarray = $this->session->all_userdata();?>
                      
                  <div class="control-group">
                      <label class="control-label">
                         Tahun<span class="required">*</span>
                      </label>
                      <div class="controls">
                        <?php echo form_error('tahun'); ?> 
                        <?php echo form_dropdown('tahun', $year_list, 'id="tempoh_mula"')?>
                      </div>
                  </div>
                      
                      <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                      <input class="input-large" type="text" placeholder="<?php echo $sessionarray['user_kementerian'];?>" disabled>
                      </div>
                    </div>           
                    
                     <div class="control-group">
                     <label class="control-label">
                    Jabatan/Agensi
                      </label>
                     <div class="controls">
                        <input class="input-large" type="text" placeholder="<?php echo $sessionarray['user_jabatan'];?>" disabled>
                    </div>
                     </div>
                      
                   <div class="control-group">
                     <label class="control-label">Kategori Premis<span class="required">*</span></label>
                     <div class="controls"><select class="required large" name="premis">
                                                        <option value="">- Pilih Kategori Premis -</option>
                                                        <?php if(!empty($katpremis)) : foreach ($katpremis as $rec) : ?>
                                                        <option value="<?php echo $rec->idpremis_kategori; ?>"><?php echo set_value('jenis_premis', $rec->jenis_premis); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                      </div>
                    </div>
                   
                    <div class="control-group">
                     <label class="control-label">
                    Nama Premis<span class="required">*</span>
                      </label>
                      <div class="controls">
                         <?php echo form_input(array('name' => 'namapremis', 'value' => set_value('namapremis', $this->session->userdata('namapremis')), 'class' => 'large required')); ?>
                         <font color="red"><?php echo form_error('namapremis'); ?></font>
                      </div>
                    </div> 
                    
                     <div class="control-group">
                     <label class="control-label">
                    No DPA<span class="required">*</span>
                      </label>
                      <div class="controls">
                         <?php echo form_input(array('name' => 'nodpa', 'value' => set_value('nodpa', $this->session->userdata('nodpa')), 'class' => 'large required')); ?>
                         <font color="red"><?php echo form_error('nodpa'); ?></font>
                      </div>
                    </div>
                      
                <input type="hidden" name="kementerian" value="<?php echo $sessionarray['user_kemid'];?>"/>
                <input type="hidden" name="jabatan" value="<?php echo $sessionarray['user_jabid'];?>"/>
                
                </div>
              </div>
            </div>
         </div>
         <!--/.END panel 1-->

    <!--panel 2-->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe0b6;"></span> Kandungan
                  </div>
                </div>
             
              <div class="widget-body">
                  <div class="control-group">
                      <label> 1.0 Pendahuluan  <span class="popover-pop" data-original-title="1.0 Pendahuluan" data-content="Menjelaskan maklumat mengenai premis berkaitan." data-placement="right" data-icon="&#xe0f7;"></span>
                      </label> 
                    <div class="wysiwyg-container">
                    <?php echo form_error('pendahuluan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'pendahuluan',
                                    'id'          => 'wysiwyg',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                  <input type="hidden" name="kand_utama" value="Pendahuluan">
                  <input type="hidden" name="kand_utama_bil" value="1">
                  <input type="hidden" name="kump_kand_id" value="2">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                      </div>
                  </div>

                  <div class="control-group">
                      <label>
                        2.0 Objektif  <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menjelaskan matlamat penerimaan aset kementerian/ jabatan/ agensi." data-placement="right"  data-icon="&#xe0f7;"></span>
                      </label>                  
                  <div class="wysiwyg-container">
                     <?php echo form_error('objektif'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'objektif',
                                    'id'          => 'wysiwyg2',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                  <input type="hidden" name="kand_utama_obj" value="Objektif">
                  <input type="hidden" name="kand_utama_bil_obj" value="2">
                  <input type="hidden" name="kump_kand_id" value="2">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                  </div>
                  </div>

                  <div class="control-group">
                      <label>3.0 Carta Organisasi Dan Pelan Komunikasi  <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penerimaan aset (Sebagaimana JKR.PATA.F6/1a)." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;"></span>
                      </label>    
                    <div class="wysiwyg-container">
                     <?php echo form_error('carta'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'carta',
                                    'id'          => 'wysiwyg3',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_carta" value="Carta Organisasi dan Pelan Komunikasi">
                  <input type="hidden" name="kand_utama_bil_carta" value="3">
                  <input type="hidden" name="kump_kand_id" value="2">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>4.0 Skop Dan Aktiviti Penerimaan Aset  <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penerimaan Aset" data-content="PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut: (Sebagaimana JKR.PATA.F6/1b)" data-placement="right" data-icon="&#xe0f7;"></span>
                      </label>
                    <div class="wysiwyg-container">
                     <?php echo form_error('skop'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'skop',
                                    'id'          => 'wysiwyg4',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_skop" value="Skop dan Aktiviti Penilaian Aset">
                  <input type="hidden" name="kand_utama_bil_skop" value="4">
                  <input type="hidden" name="kump_kand_id" value="2">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset  <span class="popover-pop" data-original-title="5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset" data-content="PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Penerimaan Aset bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F6/1c)." data-placement="right" data-icon="&#xe0f7;"></span>
                      </label>
                    <div class="wysiwyg-container">
                     <?php echo form_error('sumber'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'sumber',
                                    'id'          => 'wysiwyg5',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_sumber" value="Penyediaan Keperluan Sumber Aktiviti Penilaian Aset">
                  <input type="hidden" name="kand_utama_bil_sumber" value="5">
                  <input type="hidden" name="kump_kand_id" value="2">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>6.0 Kawalan Rekod Penerimaan Aset  <span class="popover-pop" data-original-title="6.0 Kawalan Rekod Penerimaan Aset" data-content="Kawalan rekod penerimaan aset sebagaimana JKR.PATA.F6/1d." data-placement="right" data-icon="&#xe0f7;"></span></span>
                      </label>
                    <div class="wysiwyg-container">
                     <?php echo form_error('kawalan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'kawalan',
                                    'id'          => 'wysiwyg6',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_kawalan" value="Kawalan Rekod Penilaian Aset">
                  <input type="hidden" name="kand_utama_bil_kawalan" value="6">
                  <input type="hidden" name="kump_kand_id" value="2">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>7.0 Rujukan  <span class="popover-pop" data-original-title="7.0 Rujukan" data-content="Sebarang dokumen yang dirujuk dalam penyediaan PTRA sebagaimana JKR.PATA.F6/1e." data-placement="right"data-icon="&#xe0f7;"></span>
                      </label>
                    <div class="wysiwyg-container">
                     <?php echo form_error('rujukan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'rujukan',
                                    'id'          => 'wysiwyg7',
                                    'value'       => '',
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_rujukan" value="Rujukan">
                  <input type="hidden" name="kand_utama_bil_rujukan" value="7">
                  <input type="hidden" name="kump_kand_id" value="2">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>
                  
              </div>               
            </div>
          </div>
        </div>
        <!--/.END panel 2-->

                <!--buttons-->
                <div class="next-prev-btn-container pull-right">
                <a href=""><button class="btn btn-danger input-top-margin" type="button">
                                            Batal</button></a>

                  <a href="<?php echo site_url('ptra/kat_bangunan_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>
                  
                  <input type="submit" value="Seterusnya" class="btn btn-primary">
                </div> 
                <!--/.END buttons--> 
          
      </div>  
      <!--/.END main-container-->    
        </form>
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->