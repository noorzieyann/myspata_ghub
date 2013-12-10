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
	'kand_utama_bil[5]'=>'6'
);
$kand_utama = array(
	'kand_utama[0]'=>'Pendahuluan',
	'kand_utama[1]'=>'Visi Pengurusan Aset Tak Alih',
	'kand_utama[2]'=>'Misi Pengurusan Aset Tak Alih',
	'kand_utama[3]'=>'Objektif Pengurusan Aset Tak Alih',
	'kand_utama[4]'=>'Skop Kategori dan Fungsi Aset',
	'kand_utama[5]'=>'Penetapan Polisi Pengurusan Aset (Operasi) Serta Output'
);

$sessionarray = $this->session->all_userdata();
$kand_id = array();
$kand_detail = array();

if($this->uri->segment(3) != NULL){
	foreach($this->pspao_akhir_model->get_pspao_akhir_from_segment($this->uri->segment(3)) as $row){
			$kand_id[] = $row->kandungan_id;
			$kand_detail[] = $row->kand_utama_detail;
	}
	$tahun_mula = $row->tahun_mula;
	$tahun_akhir = $row->tahun_akhir;
	$kementerian = $this->aauth->util_get_kementerian($row->idkem);

}else{
	
	$kand_detail = array(
		'Menerangkan secara umum fungsi dan organisasi kementerian/ jabatan/ agensi serta struktur PATA dalam organisasi.',
		'Menetapkan hala tuju, fokus dan sasaran kecemerlangan PATA kementerian/ jabatan/ agensi pada masa akan datang.',
		'Menetapkan tindakan - tindakan strategik untuk mencapai visi kementerian/ jabatan/ agensi.',
		'Menjelaskan matlamat aset mengikut keperluan dan kehendak kementerian/ jabatan/ agensi.',
		'',
		''
	);
	$tahun_mula = '';
	$tahun_akhir = '';
	$kementerian = $this->aauth->util_get_kementerian($sessionarray['user_kemid']);;
}

?>

	<!--breadcrumb -EYO- -->
    <div class="widget-body" style="padding-bottom:10px">
	  <ul class="breadcrumb-beauty">
		<li><a href="<?php echo site_url('main')?>">Fungsi</a></li>
        <li><a href="#">Perangcangan</a></li>
        <li><a href="#">Pelan</a></li>
        <li><a href="#">PSPA(O) Akhir</a></li>
        <li><a href="#">Permintaan Penyediaan  PSPA(O) Akhir</a></li>
      </ul>
    </div>
    <!--END breadcrumb-->

<?php 
	$form_name = 'pspao/pspao_akhir_baru';
	if($this->uri->segment(3) != NULL){$form_name = 'pspao/pspao_akhir_baru/'.$this->uri->segment(3);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'pspao_akhir_baru');
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
	<div class="row-fluid">
	  <div class="span12">
		<div class="widget">
		  <div class="widget-header">
			<div class="title">
			  <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Permintaan Penyediaan  PSPA(O) Akhir
			</div>
		  </div>
                
          <div class="widget-body">
			  <div class="control-group">
				<label class="control-label" for="tahun_mula">Tempoh Mula</label>
                  <div class="controls controls-row">
<?php
if($this->input->post('tahun_mula') !=NULL){
	$tahun_mula = $this->input->post('tahun_mula');
}

?>                  
                  	<?php echo form_dropdown('tahun_mula',get_year_dropdown(),$tahun_mula,'class="span4 input-left-top-margins"'); ?>
                    <?php echo form_error('tahun_mula'); ?>
                  </div>
               </div>
               <div class="control-group">
                  <label class="control-label" for="tahun_akhir">Hingga</label>
                  	<div class="controls controls-row">  
<?php
if($this->input->post('tahun_akhir') !=NULL){
	$tahun_akhir = $this->input->post('tahun_akhir');
}
?>                  
                      <?php echo form_dropdown('tahun_akhir',get_year_dropdown(),$tahun_akhir,'class="span4 input-left-top-margins"'); ?>
                      <?php echo form_error('tahun_akhir'); ?>
                    </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="kementerian">Kementerian</label>
                  <div class="controls">
<?php
if($this->input->post('kementerian') !=NULL){
	$kementerian = $this->input->post('kementerian');
}
?>                  

<?php

$data = array(
              'name'    =>	'kementerian',
              'id'      =>	'kementerian',
              'value'   =>	$kementerian,
			  'disabled'=>	'disabled',
			  'placeholder' => 'Kementerian Kerja Raya',
			  'class'	=>	'span5'
            );

echo form_input($data);
?>
                    <?php echo form_error('kementerian'); ?>
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
          <div class="stylish-lists">
          	<ul class="decimal-leading-zero">
            
              <li> Pendahuluan <span class="popover-pop" data-original-title="1.0 Pendahuluan" 
           data-content="Menerangkan secara umum fungsi dan organisasi kementerian/ jabatan/ agensi serta struktur PATA dalam organisasi." 
           data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
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
              'id'      =>	'wysugetkusang',
              'value'   =>	$kand_pendahuluan,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
?>
				<?php echo form_error('kand_pendahuluan'); ?>               
                </div>

              <li> Visi Pengurusan Aset Tak Alih <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menetapkan hala tuju, fokus dan sasaran kecemerlangan PATA kementerian/ jabatan/ agensi pada masa akan datang." data-placement="right"  data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_visi = $kand_detail[1];
if($this->input->post('kand_visi') !=NULL){
	$kand_visi = $this->input->post('kand_visi');
}
?>                  
<?php

$data = array(
              'name'    =>	'kand_visi',
              'id'      =>	'wysugetkusang2',
              'value'   =>	$kand_visi,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
?>
				<?php echo form_error('kand_visi'); ?>               
                </div>

              <li> Misi Pengurusan Aset Tak Alih <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Menetapkan tindakan - tindakan strategik untuk mencapai visi kementerian/ jabatan/ agensi." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_misi = $kand_detail[2];
if($this->input->post('kand_misi') !=NULL){
	$kand_misi = $this->input->post('kand_misi');
}
?>                  
<?php
$data = array(
              'name'    =>	'kand_misi',
              'id'      =>	'wysugetkusang3',
              'value'   =>	$kand_misi,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
?>
				<?php echo form_error('kand_misi'); ?>               
 
                </div>

              <li> Objektif Pengurusan Aset Tak Alih <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penerimaan Aset" data-content="Menjelaskan matlamat aset mengikut keperluan dan kehendak kementerian/ jabatan/ agensi." data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container" style="padding-bottom:0px">
<?php
$kand_objektif = $kand_detail[3];
if($this->input->post('kand_objektif') !=NULL){
	$kand_objektif = $this->input->post('kand_objektif');
}
?>                  
<?php
$data = array(
              'name'    =>	'kand_objektif',
              'id'      =>	'wysugetkusang4',
              'value'   =>	$kand_objektif,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
?>
				<?php echo form_error('kand_objektif'); ?>               
                </div>
                
                <div style="padding-bottom:10px">
                  <a href="#myObjektif" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe082;"> Lengkapakan Ukuran dan Sasaran </span>
                  </a>

                  <!-- Modal //xdok modal doh tu -->
                  <div id="myObjektif" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myObjektifLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myObjektifLabel">
                        Ukuran dan Sasaran
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
						<?php include('ukuran_sasar.php'); ?>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>
                      <?php echo form_submit('hantar', 'Seterusnya','class="btn btn-primary"'); ?>
                    </div>

                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
                  
                </div>
                    
              <li> Skop Kategori dan Fungsi Aset <span class="popover-pop" data-original-title="5.0 Skop Kategori dan Fungsi Asset" 
           data-content="Skop Kategori dan Fungsi Aset" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
                <div style="padding-bottom:10px">
              	<?php include('skop_kategori_fungsi.php') ?>
              	<?php /*
                <div class="wysiwyg-container">
                  <textarea id="wysiwyg5" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
				*/ ?>
                </div>
                    
              <li> Penetapan Polisi Pengurusan Aset (Operasi) Serta Output <span class="popover-pop" data-original-title="5.0 Penetapan Polisi Pengurusan Aset (Operasi)" data-content="Penetapan Polisi Pengurusan Aset (Operasi) Serta Output" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_polisi = $kand_detail[5];
if($this->input->post('kand_polisi') !=NULL){
	$kand_polisi = $this->input->post('kand_polisi');
}

$data = array(
              'name'    =>	'kand_polisi',
              'id'      =>	'wysugetkusang6',
              'value'   =>	$kand_polisi,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
?>
				<?php echo form_error('kand_polisi'); ?>               

                </div>
              <?php include('skop_fungsi_aset.php') ?>  
                    
            </ul>
            
          </div>
   

                  
                  

                  <div class="clearfix"> </div>
         
                
                
               
          
              </div>


<?php // SENARAI BORANG -START- ?>


				

            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
		<button class="btn btn-danger input-top-margin" type="button"> Batal </button>
        <a href="<?php echo site_url('pspao/senarai_template_pspao_awal') ?>"><button class="btn btn-primary" type="button"> Sebelum </button></a>
        <?php /*
        <a href="<?php echo site_url('pspao/pspao_akhir_baru_2') ?>"><button class="btn btn-primary" type="button"> Seterusnya </button></a>
		*/ ?>
        <?php echo form_submit('hantar', 'Seterusnya','class="btn btn-primary"'); ?>

</div>
<div class="clearfix"></div>
                

</div>

<?php echo form_close() ?>

<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script>

	$('#wysugetkusang').wysihtml5();
	$('#wysugetkusang1').wysihtml5();
    $('#wysugetkusang2').wysihtml5();
    $('#wysugetkusang3').wysihtml5();
    $('#wysugetkusang4').wysihtml5();
	$('#wysugetkusang5').wysihtml5();
    $('#wysugetkusang6').wysihtml5();
    $('#wysugetkusang7').wysihtml5();
    $('#wysugetkusang8').wysihtml5();
	$('#wysugetkusang9').wysihtml5();
    $('#wysugetkusang10').wysihtml5();
    $('#wysugetkusang11').wysihtml5();
    $('#wysugetkusang12').wysihtml5();
    $('#wysugetkusang13').wysihtml5();
    $('#wysugetkusang15').wysihtml5();
    $('#wysugetkusang16').wysihtml5();
	
</script>
