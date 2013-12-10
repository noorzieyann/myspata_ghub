<style>
.wysiwyg-container{
	padding-bottom:16px;
	padding-top:4px;
}    
</style>

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
	'kand_utama[3]'=>'Skop dan Aktiviti Pemulihan/Ubah Suai/Naik Taraf Aset',
	'kand_utama[4]'=>'Penyediaan Keperluan Sumber Aktiviti Pemulihan/Ubah Suai/ Naik Taraf Aset',
	'kand_utama[5]'=>'Kawalan Rekod Pemulihan/Ubah Suai/Naik taraf Aset',
        'kand_utama[5]'=>'Rujukan'
);

$sessionarray = $this->session->all_userdata();
$kand_id = array();
$kand_detail = array();

if($this->uri->segment(3) != NULL){
	foreach($this->ptra_model->get_ptra_from_segment($this->uri->segment(3)) as $row){
			$kand_id[] = $row->kandungan_id;
			$kand_detail[] = $row->kand_utama_detail;
	}
	$tahun = $row->tahun;
	$kementerian = $this->aauth->util_get_kementerian($row->idkem);

}else{
	
	$kand_detail = array(
		'',
                '',
                '',
                '',
                '',
                '',
                ''
		
	);
	$tahun = '';
	$kementerian = $this->aauth->util_get_kementerian($sessionarray['user_kemid']);;
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
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->

<?php 
	$form_name = 'ptra/kandungan_ptra';
	if($this->uri->segment(3) != NULL){$form_name = 'ptra/kandungan_ptra/'.$this->uri->segment(3);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kandungan_ptra');
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
			  <div class="control-group">
				<label class="control-label" for="tahun_mula">Tahun</label>
                  <div class="controls controls-row">
<?php
if($this->input->post('tahun') !=NULL){
	$tahun = $this->input->post('tahun');
}

?>                  
                  	<?php echo form_dropdown('tahun',get_year_dropdown(),$tahun,'class="span4 input-left-top-margins"'); ?>
                    <?php echo form_error('tahun'); ?>
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
              
              
          </div>
        </div>
	  </div>
    </div>
        
    <div class="row-fluid">
      <div class="span12">
      	<div class="widget">
          <div class="widget-header">
          	<div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kandungan
            </div>
          </div>
        
        <div class="widget-body">
         <div class="control-group">
           <label> 1.0 Pendahuluan  <span class="popover-pop" data-original-title="1.0 Pendahuluan" data-content="Menjelaskan maklumat mengenai premis berkaitan." data-placement="right" data-icon="&#xe0f7;"></span>
             </label> 
                <div class="wysiwyg-container">

                    <?php
                    $kand_pendahuluan = $kand_detail[0];
                    if($this->input->post('kand_pendahuluan') !=NULL){
                            $kand_pendahuluan = $this->input->post('kand_pendahuluan');
                    }
                    ?>                  

                    <?php

                    $data = array(
                                  'name'    =>	'kand_pendahuluan',
                                  'id'      =>	'wysiwyg',
                                  'value'   =>	$kand_pendahuluan,
                                  'style'   =>	'height:80px',
                                'class'	=>	'input-block-level'
                                );

                    echo form_textarea($data);
                    ?>
                            <?php echo form_error('kand_pendahuluan'); ?>               
                </div>
              </div>

     
      <div class="control-group">
       <label>2.0 Objektif  <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menjelaskan matlamat penerimaan aset kementerian/ jabatan/ agensi." data-placement="right"  data-icon="&#xe0f7;"></span>
        </label> 
         <div class="wysiwyg-container">
                    <?php
                    $kand_objektif = $kand_detail[1];
                    if($this->input->post('kand_objektif') !=NULL){
                            $kand_objektif = $this->input->post('kand_objektif');
                    }
                    ?>                  
                    <?php

                    $data = array(
                                  'name'    =>	'kand_objektif',
                                  'id'      =>	'wysiwyg2',
                                  'value'   =>	$kand_objektif,
                                  'style'   =>	'height:80px',
                                'class'	=>	'input-block-level'
                                );

                    echo form_textarea($data);
                    ?>
                    <?php echo form_error('kand_objektif'); ?>               
            </div>
          </div>

            
         <div class="control-group">
           <label>3.0 Carta Organisasi Dan Pelan Komunikasi  <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penerimaan aset (Sebagaimana JKR.PATA.F6/1a)." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;"></span>
             </label>
              <div class="wysiwyg-container">
                    <?php
                    $kand_carta = $kand_detail[2];
                    if($this->input->post('kand_carta') !=NULL){
                            $kand_carta = $this->input->post('kand_carta');
                    }
                    ?>                  
                    <?php
                    $data = array(
                                  'name'    =>	'kand_carta',
                                  'id'      =>	'wysiwyg3',
                                  'value'   =>	$kand_carta,
                                  'style'   =>	'height:80px',
                                 'class'    =>	'input-block-level'
                                );

                    echo form_textarea($data);
                    ?>
                    <?php echo form_error('kand_misi'); ?>               
 
            </div>
         </div>

         <div class="control-group">
           <label>4.0 Skop Dan Aktiviti Penerimaan Aset  <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penerimaan Aset" data-content="PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut: (Sebagaimana JKR.PATA.F6/1b)" data-placement="right" data-icon="&#xe0f7;"></span>
             </label>
              <div class="wysiwyg-container" style="padding-bottom:0px">
                    <?php
                    $kand_skop = $kand_detail[3];
                    if($this->input->post('kand_skop') !=NULL){
                            $kand_skop = $this->input->post('kand_skop');
                    }
                    ?>                  
                    <?php
                    $data = array(
                                  'name'    =>	'kand_skop',
                                  'id'      =>	'wysiwyg4',
                                  'value'   =>	$kand_skop,
                                  'style'   =>	'height:80px',
                                  'class'   =>	'input-block-level'
                                );

                    echo form_textarea($data);
                    ?>
                    <?php echo form_error('kand_objektif'); ?>               
                </div>
             </div>
            
            <div class="control-group">
              <label>5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset  <span class="popover-pop" data-original-title="5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset" data-content="PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Penerimaan Aset bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F6/1c)." data-placement="right" data-icon="&#xe0f7;"></span>
                </label>
              <div class="wysiwyg-container" style="padding-bottom:0px">
                    <?php
                    $kand_sumber = $kand_detail[3];
                    if($this->input->post('kand_sumber') !=NULL){
                            $kand_sumber = $this->input->post('kand_sumber');
                    }
                    ?>                  
                    <?php
                    $data = array(
                                  'name'    =>	'kand_sumber',
                                  'id'      =>	'wysiwyg5',
                                  'value'   =>	$kand_sumber,
                                  'style'   =>	'height:80px',
                                  'class'   =>	'input-block-level'
                                );

                    echo form_textarea($data);
                    ?>
                    <?php echo form_error('kand_sumber'); ?>               
                </div>
             </div>
            
            <div class="control-group">
               <label>6.0 Kawalan Rekod Penerimaan Aset  <span class="popover-pop" data-original-title="6.0 Kawalan Rekod Penerimaan Aset" data-content="Kawalan rekod penerimaan aset sebagaimana JKR.PATA.F6/1d." data-placement="right" data-icon="&#xe0f7;"></span></span>
                </label>
              <div class="wysiwyg-container" style="padding-bottom:0px">
                    <?php
                    $kand_kawalan = $kand_detail[3];
                    if($this->input->post('kand_kawalan') !=NULL){
                            $kand_kawalan = $this->input->post('kand_kawalan');
                    }
                    ?>                  
                    <?php
                    $data = array(
                                  'name'    =>	'kand_kawalan',
                                  'id'      =>	'wysiwyg6',
                                  'value'   =>	$kand_kawalan,
                                  'style'   =>	'height:80px',
                                  'class'   =>	'input-block-level'
                                );

                    echo form_textarea($data);
                    ?>
                    <?php echo form_error('kand_kawalan'); ?>               
                </div>
             </div>
            
            <div class="control-group">
              <label>7.0 Rujukan  <span class="popover-pop" data-original-title="7.0 Rujukan" data-content="Sebarang dokumen yang dirujuk dalam penyediaan PTRA sebagaimana JKR.PATA.F6/1e." data-placement="right"data-icon="&#xe0f7;"></span>
               </label>
              <div class="wysiwyg-container" style="padding-bottom:0px">
                    <?php
                    $kand_rujukan = $kand_detail[3];
                    if($this->input->post('kand_rujukan') !=NULL){
                            $kand_rujukan = $this->input->post('kand_rujukan');
                    }
                    ?>                  
                    <?php
                    $data = array(
                                  'name'    =>	'kand_rujukan',
                                  'id'      =>	'wysiwyg7',
                                  'value'   =>	$kand_rujukan,
                                  'style'   =>	'height:80px',
                                  'class'   =>	'input-block-level'
                                );

                    echo form_textarea($data);
                    ?>
                    <?php echo form_error('kand_rujukan'); ?>               
                </div>
             </div>
                  <div class="clearfix"> </div>
              </div>


<?php // SENARAI BORANG -START- ?>


				

            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
		<button class="btn btn-danger input-top-margin" type="button"> Batal </button>
        <a href="<?php echo site_url('ptra/kat_bangunan_ptra') ?>"><button class="btn btn-primary" type="button"> Sebelum </button></a>
        <?php /*
        <a href="<?php echo site_url('pspao/pspao_akhir_baru_2') ?>"><button class="btn btn-primary" type="button"> Seterusnya </button></a>
		*/ ?>
        <?php echo form_submit('hantar', 'Seterusnya','class="btn btn-primary"'); ?>

</div>
<div class="clearfix"></div>
                

</div>
      </div>
      </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->

<?php echo form_close() ?>