<?php

$kand_utama_bil = array(
	'kand_utama_bil[0]'=>'1',
	'kand_utama_bil[1]'=>'2',
	'kand_utama_bil[2]'=>'3',
	'kand_utama_bil[3]'=>'4',
	'kand_utama_bil[4]'=>'5',
	'kand_utama_bil[5]'=>'6',
        'kand_utama_bil[6]'=>'7'
);
$kand_utama = array(
	'kand_utama[0]'=>'Pendahuluan',
	'kand_utama[1]'=>'Objektif',
	'kand_utama[2]'=>'Carta Organisasi dan Pelan Komunikasi',
	'kand_utama[3]'=>'Skop dan Aktiviti Penilaian Aset',
	'kand_utama[4]'=>'Penyediaan Keperluan Sumber Aktiviti Penilaian Aset',
	'kand_utama[5]'=>'Kawalan Rekod Penilaian Aset',
        'kand_utama[6]'=>'Rujukan'
);

$sessionarray = $this->session->all_userdata();
$kand_id = array();
$kand_detail = array();

if($this->uri->segment(3) != NULL){
	foreach($this->pnpa_model->get_pnpa_from_segment($this->uri->segment(3)) as $row){
			$kand_id[] = $row->kandungan_id;
			$kand_detail[] = $row->kand_utama_detail;
                        $nodpa = $row->nodpa;
                        $premis= $row->idpremis_kategori;
                        $namapremis= $row->nama_premis;
                        $tahun= $row->tahun;
                         $pnpa_id= $row->pnpa_id;
	}
	//$tahun_mula = $row->tahun_mula;
	//$tahun_akhir = $row->tahun_akhir;
	//$kementerian = $this->aauth->util_get_kementerian($row->idkem);

}else{
	
	$kand_detail = array(
		'','','','','','',''
        
		
	);
        $nodpa='';
        $namapremis='';
        $tahun= '';
        
	//$tahun_mula = '';
	//$tahun_akhir = '';
	//$kementerian = $this->aauth->util_get_kementerian($sessionarray['user_kemid']);;
}

?>  


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
                        PNPA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br /> 
    <?php 
	$form_name = 'pnpa/kandungan_pnpa';
	if($this->uri->segment(3) != NULL){$form_name = 'pnpa/kandungan_pnpa/'.$this->uri->segment(3);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kandungan_pnpa');
	echo form_open($form_name, $attributes);
?>
<?php 
	echo form_hidden($kand_utama_bil);
	echo form_hidden($kand_utama);
	$sunting = array('sunting'=>NULL);
	if($this->uri->segment(3) != NULL){
		$sunting = array('sunting'=>$this->uri->segment(3));
		echo form_hidden('kand_id',$kand_id);
	}
	echo form_hidden($sunting);

?>
<?php echo validation_errors(); ?>
    
    
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
                    <li class=""><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class="active"><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
        <form id="" class="form-horizontal no-margin" action="kandungan_pnpa" method="post" name="pnpa/kandungan_pnpa">
            
      <!--main container-->
      <div class="main-container">
         <!--panel 1-->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penilaian Aset (PNPA)
                  </div>
                </div>
                <div class="widget-body">
                  
                      <?php $sessionarray = $this->session->all_userdata();?>
                      
                  <div class="control-group">
                      <label class="control-label">
                         Tahun<span class="required">*</span>
                      </label>
                      <?php
                            if($this->input->post('tahun') !=NULL){
                                    $tahun = $this->input->post('tahun');
                            }
                       ?> 
                      
                      <div class="controls">
                        <?php echo form_error('tahun'); ?> 
                        <?php echo form_dropdown('tahun', $year_list,$tahun, 'id="tempoh_mula"')?>
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
                      <?php
                            if($this->input->post('premis') !=NULL){
                                    $tahun = $this->input->post('premis');
                            }
                       ?> 
                     
                     <div class="controls"><select class="required large" name="premis">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($katpremis)) : foreach ($katpremis as $rec) : ?>
                                                        <option value=" <?php echo $rec->idpremis_kategori; ?>"><?php echo set_value('jenis_premis', $rec->jenis_premis); ?></option>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                      </div>
                    </div>
                   
                    <div class="control-group">
                     <label class="control-label">
                    Nama Premis<span class="required">*</span>
                      </label>
                        <?php
                            if($this->input->post('namapremis') !=NULL){
                                    $namapremis = $this->input->post('namapremis');
                            }
                       ?> 
                        
                      <div class="controls">
                         <?php echo form_input(array('name' => 'namapremis', 'value' => $namapremis, 'class' => 'large required')); ?>
                         <font color="red"><?php echo form_error('namapremis'); ?></font>
                      </div>
                    </div>
                    
                    
                     <div class="control-group">
                     <label class="control-label">
                    No DPA<span class="required">*</span>
                      </label>
                       <?php
                            if($this->input->post('nodpa') !=NULL){
                                    $nodpa = $this->input->post('nodpa');
                            }
                       ?> 
                      <div class="controls">
                          <?php echo form_input(array('name' => 'nodpa', 'value' => $nodpa, 'class' => 'large required')); ?>
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
                        <?php
                                $pendahuluan = $kand_detail[0];
                                if($this->input->post('pendahuluan') !=NULL){
                                  $pendahuluan = $this->input->post('pendahuluan');
                                }
                        ?>
                     <?php echo form_error('pendahuluan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'pendahuluan',
                                    'id'          => 'wysiwyg',
                                    'value'       => $pendahuluan,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        
                  <input type="hidden" name="kand_utama" value="Pendahuluan">
                  <input type="hidden" name="kand_utama_bil" value="1">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                      </div>
                  </div>

                  <div class="control-group">
                      <label>
                        2.0 Objektif  <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menjelaskan matlamat penerimaan aset kementerian/ jabatan/ agensi." data-placement="right"  data-icon="&#xe0f7;"></span>
                      </label>                  
                  <div class="wysiwyg-container">
                      <?php
                                $objektif = $kand_detail[1];
                                if($this->input->post('objektif') !=NULL){
                                  $objektif = $this->input->post('objektif');
                                }
                        ?>
                     <?php echo form_error('objektif'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'objektif',
                                    'id'          => 'wysiwyg2',
                                    'value'       => $objektif,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                  <input type="hidden" name="kand_utama_obj" value="Objektif">
                  <input type="hidden" name="kand_utama_bil_obj" value="2">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                  </div>
                  </div>

                  <div class="control-group">
                      <label>3.0 Carta Organisasi Dan Pelan Komunikasi  <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penerimaan aset (Sebagaimana JKR.PATA.F8/1a)." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;"></span>
                      </label>    
                    <div class="wysiwyg-container">
                        <?php
                                $carta = $kand_detail[2];
                                if($this->input->post('carta') !=NULL){
                                  $carta = $this->input->post('carta');
                                }
                        ?>
                     <?php echo form_error('carta'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'carta',
                                    'id'          => 'wysiwyg3',
                                    'value'       => $carta ,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_carta" value="Carta Organisasi dan Pelan Komunikasi">
                  <input type="hidden" name="kand_utama_bil_carta" value="3">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>4.0 Skop Dan Aktiviti Penilaian Aset  <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penilaian Aset" data-content="PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut: (Sebagaimana JKR.PATA.F8/1b)" data-placement="right" data-icon="&#xe0f7;"></span>
                      </label>
                    <div class="wysiwyg-container">
                        <?php
                                $skop = $kand_detail[3];
                                if($this->input->post('skop') !=NULL){
                                  $skop = $this->input->post('skop');
                                }
                        ?>
                     <?php echo form_error('skop'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'skop',
                                    'id'          => 'wysiwyg4',
                                    'value'       => $skop,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_skop" value="Skop dan Aktiviti Penilaian Aset">
                  <input type="hidden" name="kand_utama_bil_skop" value="4">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>5.0 Penyediaan Keperluan Sumber Aktiviti Penilaian Aset  <span class="popover-pop" data-original-title="5.0 Penyediaan Keperluan Sumber Aktiviti Penilaian Aset" data-content="PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Penerimaan Aset bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F8/1c)." data-placement="right" data-icon="&#xe0f7;"></span>
                      </label>
                    <div class="wysiwyg-container">
                        <?php
                                $sumber = $kand_detail[4];
                                if($this->input->post('sumber') !=NULL){
                                  $sumber = $this->input->post('sumber');
                                }
                        ?>
                     <?php echo form_error('sumber'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'sumber',
                                    'id'          => 'wysiwyg5',
                                    'value'       => $sumber,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_sumber" value="Penyediaan Keperluan Sumber Aktiviti Penilaian Aset">
                  <input type="hidden" name="kand_utama_bil_sumber" value="5">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>6.0 Kawalan Rekod Penilaian Aset  <span class="popover-pop" data-original-title="6.0 Kawalan Rekod Penilaian Aset" data-content="Kawalan rekod penilaian aset sebagaimana JKR.PATA.F8/1d." data-placement="right" data-icon="&#xe0f7;"></span></span>
                      </label>
                    <div class="wysiwyg-container">
                        <?php
                                $kawalan = $kand_detail[5];
                                if($this->input->post('kawalan') !=NULL){
                                  $kawalan = $this->input->post('kawalan');
                                }
                        ?>
                     <?php echo form_error('kawalan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'kawalan',
                                    'id'          => 'wysiwyg6',
                                    'value'       => $kawalan,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_kawalan" value="Kawalan Rekod Penilaian Aset">
                  <input type="hidden" name="kand_utama_bil_kawalan" value="6">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>7.0 Rujukan  <span class="popover-pop" data-original-title="7.0 Rujukan" data-content="Sebarang dokumen yang dirujuk dalam penyediaan PNPA sebagaimana JKR.PATA.F8/1e." data-placement="right"data-icon="&#xe0f7;"></span>
                      </label>
                    <div class="wysiwyg-container">
                        <?php
                                $rujukan = $kand_detail[6];
                                if($this->input->post('rujukan') !=NULL){
                                  $rujukan = $this->input->post('rujukan');
                                }
                        ?>
                     <?php echo form_error('rujukan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'rujukan',
                                    'id'          => 'wysiwyg7',
                                    'value'       => $rujukan,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_rujukan" value="Rujukan">
                  <input type="hidden" name="kand_utama_bil_rujukan" value="7">
                  <input type="hidden" name="kump_kand_id" value="4">
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