<style>
.wysiwyg-container{
	padding-bottom:16px;
	padding-top:4px;
}    
</style>

<?php

$kand_utama_bil = array(
	'kand_utama_bil[0]'=>'7',
	'kand_utama_bil[1]'=>'1',
	'kand_utama_bil[2]'=>'2',
	'kand_utama_bil[3]'=>'3',
	'kand_utama_bil[4]'=>'4',
	'kand_utama_bil[5]'=>'5',
	'kand_utama_bil[6]'=>'6',
	'kand_utama_bil[7]'=>'7',
	'kand_utama_bil[8]'=>'8',
	'kand_utama_bil[9]'=>'9',
	'kand_utama_bil[10]'=>'10'
);
$kand_utama = array(
	'kand_utama[0]'=>'Strategi Perlakasanaan',
	'kand_utama[1]'=>'Struktur Tadbir Urus Organisasi',
	'kand_utama[2]'=>'Sistem, Prosedur, Piawaian dan Teknologi',
	'kand_utama[3]'=>'Kaedah Pelaksanaan (Dalaman dan Luaran)',
	'kand_utama[4]'=>'Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset',
	'kand_utama[5]'=>'Penyediaan Keperluan Sumber',
	'kand_utama[6]'=>'Pemantauan Pelaksanaan dan Pengukuran Output',
	'kand_utama[7]'=>'Kajian Semula Pengurusan',
	'kand_utama[8]'=>'Takwim dan KPI Tadbir Urus Tpata',
	'kand_utama[9]'=>'Penutup',
	'kand_utama[10]'=>'Lampiran'
);

$sessionarray = $this->session->all_userdata();
$kand_id = array();
$kand_detail = array();

$check_row = NULL;

if($this->uri->segment(3) != NULL){
	if(count($this->pspao_akhir_model->get_pspao_akhir_from_segment2($this->uri->segment(3))) == 0){
		//echo '<script>alert("Display Field Baru")< /script>';
		
		$check_row = 0;

		$kand_detail = array(
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			' Sila isi kandungan di sini ',
			''
		);


	}else{
		
		$check_row = 1;
		
		foreach($this->pspao_akhir_model->get_pspao_akhir_from_segment2($this->uri->segment(3)) as $row){
			$kand_id[] = $row->kandungan_id;
			$kand_detail[] = $row->kand_utama_detail;
		}
		//echo "<script>alert('Display Field dr DB HOI!')< /script>";
	}
	
	

}else{
	
	//echo "<script>alert('Dokleh display gini, segment xdok!')< /script>";
	
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
	$form_name = 'pspao/pspao_akhir_baru_2';
	if($this->uri->segment(3) != NULL){$form_name = 'pspao/pspao_akhir_baru_2/'.$this->uri->segment(3);}
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
	echo form_hidden('cek_row',$check_row);

?>
<?php echo validation_errors(); ?>

    <div class="row-fluid">
      <div class="span12">
      	<div class="widget">
          <div class="widget-header">
          	<div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kandungan 
            </div>
          </div>
        
        <div class="widget-body">
          <div class="stylish-lists">
          	<ol class="decimal-leading-zero" start="7">
                                
              <li> Strategi Perlakasanaan <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_pelaksanaan = $kand_detail[0];
if($this->input->post('kand_pelaksanaan') !=NULL){
	$kand_pelaksanaan = $this->input->post('kand_pelaksanaan');
}
$data = array(
              'name'    =>	'kand_pelaksanaan',
              'id'      =>	'wysugetkusang7',
              'value'   =>	$kand_pelaksanaan,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_pelaksanaan');
?>               
                </div>
                    
              <ul class="decimal-leading-zero">
              
              <li> Struktur Tadbir Urus Organisasi <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_tadbir = $kand_detail[1];
if($this->input->post('kand_tadbir') !=NULL){
	$kand_tadbir = $this->input->post('kand_tadbir');
}
$data = array(
              'name'    =>	'kand_tadbir',
              'id'      =>	'wysugetkusang8',
              'value'   =>	$kand_tadbir,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_tadbir');
?>               
                </div>
                    
              <li> Sistem, Prosedur, Piawaian dan Teknologi <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_sistem = $kand_detail[2];
if($this->input->post('kand_sistem') !=NULL){
	$kand_sistem = $this->input->post('kand_sistem');
}
$data = array(
              'name'    =>	'kand_sistem',
              'id'      =>	'wysugetkusang9',
              'value'   =>	$kand_sistem,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_sistem');
?>               
                </div>
                    
              <li> Kaedah Pelaksanaan (Dalaman dan Luaran) <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_kaedah_pelaksanaan = $kand_detail[3];
if($this->input->post('kand_kaedah_pelaksanaan') !=NULL){
	$kand_kaedah_pelaksanaan = $this->input->post('kand_kaedah_pelaksanaan');
}
$data = array(
              'name'    =>	'kand_kaedah_pelaksanaan',
              'id'      =>	'wysugetkusang10',
              'value'   =>	$kand_kaedah_pelaksanaan,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_kaedah_pelaksanaan');
?>               
                </div>
                <?php include('kaedah_pelaksanaan.php') ?> 
                    
              <li> Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_penyediaan_pelan = $kand_detail[4];
if($this->input->post('kand_penyediaan_pelan') !=NULL){
	$kand_penyediaan_pelan = $this->input->post('kand_penyediaan_pelan');
}
$data = array(
              'name'    =>	'kand_penyediaan_pelan',
              'id'      =>	'wysugetkusang11',
              'value'   =>	$kand_penyediaan_pelan,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_penyediaan_pelan');
?>               
                </div>
                    
              <li> Penyediaan Keperluan Sumber <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_pen_kep_sumber = $kand_detail[5];
if($this->input->post('kand_pen_kep_sumber') !=NULL){
	$kand_pen_kep_sumber = $this->input->post('kand_pen_kep_sumber');
}
$data = array(
              'name'    =>	'kand_pen_kep_sumber',
              'id'      =>	'wysugetkusang12',
              'value'   =>	$kand_pen_kep_sumber,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_pen_kep_sumber');
?>               
                </div>
                    
              <li> Pemantauan Pelaksanaan dan Pengukuran Output <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_pemantauan_pel = $kand_detail[6];
if($this->input->post('kand_pemantauan_pel') !=NULL){
	$kand_pemantauan_pel = $this->input->post('kand_pemantauan_pel');
}
$data = array(
              'name'    =>	'kand_pemantauan_pel',
              'id'      =>	'wysugetkusang13',
              'value'   =>	$kand_pemantauan_pel,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_pemantauan_pel');
?>               
                </div>
              
              </ul>
                    
              <li> Kajian Semula Pengurusan <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_kajian_semula = $kand_detail[7];
if($this->input->post('kand_kajian_semula') !=NULL){
	$kand_kajian_semula = $this->input->post('kand_kajian_semula');
}
$data = array(
              'name'    =>	'kand_kajian_semula',
              'id'      =>	'wysugetkusang14',
              'value'   =>	$kand_kajian_semula,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_kajian_semula');
?>               
                </div>
                    
              <li> Takwim dan KPI Tadbir Urus Tpata <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_takwim_kpi = $kand_detail[8];
if($this->input->post('kand_takwim_kpi') !=NULL){
	$kand_takwim_kpi = $this->input->post('kand_takwim_kpi');
}
$data = array(
              'name'    =>	'kand_takwim_kpi',
              'id'      =>	'wysugetkusang15',
              'value'   =>	$kand_takwim_kpi,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_takwim_kpi');
?>               
                </div>
                    
              <li> Penutup <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
<?php
$kand_penutup = $kand_detail[9];
if($this->input->post('kand_penutup') !=NULL){
	$kand_penutup = $this->input->post('kand_penutup');
}
$data = array(
              'name'    =>	'kand_penutup',
              'id'      =>	'wysugetkusang16',
              'value'   =>	$kand_penutup,
              'style'   =>	'height:80px',
			  'class'	=>	'input-block-level'
            );

echo form_textarea($data);
echo form_error('kand_penutup');
?>               
                </div>
                    
              <li> Lampiran <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div>
                  <a href="#myLampir" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe102;"> Tambah Lampiran</span>
                  </a>
                  
                  <!-- Modal //xdok modal doh tu -->
                  <div id="myLampir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myLampirLabel" aria-hidden="true">
                  <?php echo form_open('pspao/pspao_akhir_baru'); ?>
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myLampirLabel">
                        Tambah Lampiran
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                      
<table width="100%">
  <tr>
    <td>1. Tajuk Dokumen</td>
    <td width="30%"><?php echo form_input('nama_file', '', 'class="input-xlarge" placeholder="Nama Fail"'); ?></td>
  </tr>
  <tr>
    <td>2. Muat Naik Dokumen</td>
    <td><?php echo form_upload('nama_file', '', 'class="input-xlarge" placeholder="Nama Fail"') ?></td>
  </tr>
</table>
                      	

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
                  
                 <?php include('lampiran.php') ?>
                 
                </div>

            </ol>
            
          </div>
                     

                  <div class="clearfix"> </div>
          
              </div>

            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
		<button class="btn btn-danger input-top-margin" type="button"> Batal </button>
        <a href="<?php echo site_url('pspao/pspao_akhir_baru/'.$this->uri->segment(3)) ?>"><button class="btn btn-primary" type="button"> Sebelum </button></a>
        <?php /*
        <a href="<?php echo site_url('pspao/pspao_akhir_baru_3') ?>"><button class="btn btn-primary" type="button"> Seterusnya </button></a>
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
    $('#wysugetkusang14').wysihtml5();
    $('#wysugetkusang15').wysihtml5();
    $('#wysugetkusang16').wysihtml5();
	
</script>
