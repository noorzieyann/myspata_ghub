<style>
.wysiwyg-container{
	padding-bottom:16px;
	padding-top:4px;
}    
 

ol.numeric-decimals { counter-reset:section; list-style-type:none;}
ol.numeric-decimals li { list-style-type:none; }
ol.numeric-decimals li ol { counter-reset:subsection; }
ol.numeric-decimals li:before{
    counter-increment:section;
    content:counter(section) ". ";/*content:"Section " counter(section) ". ";*/
}
ol.numeric-decimals li ol li:before {
    counter-increment:subsection;
    content:counter(section) "." counter(subsection) " ";
}


ol.kusang{
	list-style:none;
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
	'kand_utama_bil[7]'=>'8',
	'kand_utama_bil[8]'=>'9',
	'kand_utama_bil[9]'=>'10',
	'kand_utama_bil[10]'=>'11'
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
		/*
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
		*/
		);
	for($i=0;$i<=10;$i++){
		$kand_detail[$i] = '';
	}
		


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
	echo form_open_multipart($form_name, $attributes);
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
<?php //echo validation_errors(); ?>
<?php if($upload_error!=NULL){echo $upload_error; } ?>

    <div class="row-fluid">
      <div class="span12">
      	<div class="widget">
          <div class="widget-header">
          	<div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kandungan 
            </div>
          </div>
        
        <div class="widget-body">
          <div class="stylish-lists">
          
                    
          	<ol class="kusang">
                                
              <li><span>07. </span>Strategi Perlakasanaan <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Pelaksanaan pengurusan aset adalah berasaskan strategi berikut: Struktur tadbir urus organisasi, Sistem dan proses (tatacara, piawaian, garis panduan) serta teknologi (aplikasi, bahan), Kaedah pelaksanaan (dalaman atau luaran), Pelan Perancangan dan Bajet Pengurusan Aset (Operasi), Penyediaan Keperluan Sumber (kewangan, staf, latihan, kompetensi, peralatan dan dokumentasi), Pemantauan Pelaksanaan Dan Pengukuran Output. Kementerian/ jabatan/ agensi hendaklah menetapkan pemakaian teknologi dan bahan seperti penggunaan aplikasi komputer, Wireless Rdelity (WiR), Radio Frequency Identity Detector (RFID), Bar Code dan seumpamanya. Penggunaan teknologi ini hendaklah selari dengan garis panduan Sistem Kod Aset Tak Alih (SKATA) dan sistem aplikasi utama pengurusan aset tak alih (mySPATA)." data-icon="&#xe0f7;"></a></li>
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
                    
              <ol class="kusang">
              
              <li><span>07.1. </span>Struktur Tadbir Urus Organisasi <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Menerangkan struktur organisasi Unit Pengurusan Fasiliti kementerian/jabatan/agensi." data-icon="&#xe0f7;"></a></li>
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
                    
              <li><span>07.2. </span>Sistem, Prosedur, Piawaian dan Teknologi <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Setiap kementerian/ jabatan/ agensi perlu mematuhi proses kerja yang ditetapkan dalam TPATA bagi setiap aktiviti yang berkaitan. Sekiranya tiada keterangan khusus terhadap sesuatu proses, kementerian/ jabatan/ agensi perlu bangunkan prosedur dan piawaian tambahan yang berkaitan antara lain sebagaimana berikut, Prosedur Keselamatan, Kesihatan, dan Alam Sekitar, Prosedur Penjimatan Tenaga, Prosedur Pengujian dan Pentauliahan, Prosedur Penyenggaraan Aset dalam Tempoh Jaminan, Prosedur Permohonan untuk Nasihat/ Laporan Teknikal, Prosedur Pemindahan Aset, Prosedur Laporan Kemalangan dan Kejadian, Prosedur Penyeliaan Kerja-kerja Pihak Ketiga, Prosedur Latihan Pengguna, Prosedur Penggunaan Ruang, Prosedur Pengurusan Krisis, Bencana dan Risiko, Prosedur Pengurusan Majlis, Prosedur Kawalan Keselamatan, Prosedur Pengurusan Utiliti, Prosedur Pembersihan, Prosedur Pelupusan Sisa Buangan, Prosedur Pengurusan Lanskap, Prosedur lain yang diperlukan." data-icon="&#xe0f7;"></a></li>
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
                    
              <li><span>07.3. </span>Kaedah Pelaksanaan (Dalaman dan Luaran) <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Kementerian/ jabatan/ agensi hendaklah menetapkan kaedah-kaedah pelaksanaan aktiviti PATA bagi setiap agensi di bawahnya. Di antara kaedah-kaedah pelaksanaan adalah seperti pelaksanaan secara dalaman atau luaran. Penetapan polisi kaedah pelaksanaan sama ada secara dalaman atau luaran adalah tertakluk kepada Fungsi dan kompleksiti aset, Keperluan perundangan dan dasar semasa kerajaan, Kemampuan sumber dan Pemindahan teknologi" data-icon="&#xe0f7;"></a></li>
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
                    
              <li><span>07.4. </span>Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Pelan Perancangan dan Bajet Pengurusan Aset (Operasi) terdiri daripada Ringkasan Maklumat Pelan Pengurusan Aset (PPA) (Operasi) Perancangan (JKR.PATA-2B) dan Ringkasan Maklumat PPA (Operasi) Tahunan (JKR.PATA-2D). Ringkasan Maklumat Pelan Pengurusan Aset (PPA) (Operasi) Perancangan sebagaimana tormat JKR.PATA-2B terhasil daripada penjumlahan maklumat Pelan Pengurusan Aset (PPA) (Operasi) Perancangan bagi setiap aset atau premis sebagaimana tormat JKR.PATA-2A. Maklumat Pelan Pengurusan Aset (PPA) (Operasi) Tahunan (JKR.PATA-2D) terhasil daripada penjumlahan maklumat daripada Pelan Pengurusan Aset (PPA) (Operasi) Tahunan bagi setiap aset atau premis sebagaimana tormat JKR.PATA-2C. JKR.PATA-2C adalah maklumat tahunan yang diperolehi daripada PTRA, POPA, PNPA, PPUN dan PLA bagi setiap premis. Pelan Perancangan dan Bajet Pengurusan Aset (Operasi) hendaklah disediakan bagi setiap premis untuk tasa penerimaan, operasi dan penyenggaraan, penilaian keadaan/ prestasi, pemulihan/ ubah suai/ naik tarat dan pelupusan.Sila rujuk penyediaan Pelan Perancangan dan Bajet Tahunan PATA mengikut fasa masing-masing seperti di dalam Bab C, Bab D, Bab E, Bab F dan Bab G serta Prosedur B2 dalam TPATA." data-icon="&#xe0f7;"></a></li>
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
                    
              <li><span>07.5. </span>Penyediaan Keperluan Sumber <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Kementerian/ jabatan/ agensi hendaklah menyediakan keperluan sumber yang mencukupi seperti kewangan, staf, latihan, kompetensi, peralatan dan dokumentasi. Penyediaan sumber hendaklah merangkumi keperluan aktiviti seluruh fasa penerimaan, operasi dan penyenggaraan, penilaian keadaan/ prestasi, pemulihan/ ubah suai/ naik taraf dan pelupusan. Maklumat keperluan sumber adalah sebagaimana dalam tormat Pelan Perancangan dan Bajet Pengurusan Aset (Operasi). mengikut fasa masing-masing seperti di dalam Bab C, Bab D, Bab E, Bab F dan Bab G serta Prosedur B2 dalam TPATA." data-icon="&#xe0f7;"></a></li>
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
                    
              <li><span>07.6. </span>Pemantauan Pelaksanaan dan Pengukuran Output <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Kementerian/ jabatan/ agensi hendaklah menyatakan mekanisme pemantauan, penyeliaan dan pengauditan pelaksanaan aktiviti yang ditetapkan dalam Pelan Perancangan dan Bajet Pengurusan Aset (Operasi) supaya mencapai output yang ditetapkan. Kementerian/ jabatan/ agensi hendaklah mengukur dan melapor pencapaian output setiap aktiviti sebagaimana yang ditetapkan dalam TPATA. Kementerian/ jabatan/ agensi hendaklah menyedia dan mengemukakan laporan tadbir urus TPATA antara lain seperti berikut: Laporan Kesediaan Sumber Pengurusan Aset Tak Alih (JKR.PATA-3A); Laporan Kemajuan Aktiviti Pengurusan Aset Tak Alih (JKR.PATA-3B); Laporan Kedudukan, Kos dan Nilaian Aset Tak Alih (JKR.PATA-3C); Laporan Status Penaratan Prestasi Aset Tak Alih (JKR.PATA-3D); dan Laporan Pencapaian Keberkesanan PSPA (Operasi) (JKR.PATA-3E)." data-icon="&#xe0f7;"></a></li>
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
              
              </ol>
                    
              <li><span>08. </span>Kajian Semula Pengurusan <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Kementerian/ jabatan/ agensi hendaklah menjalankan kajian semula pengurusan bagi menilai keberkesanan dan penambahbaikan melalui Mesyuarat Kajian Semula Pengurusan Aset Tak Alih di peringkat kementerian/jabatan/ agensi." data-icon="&#xe0f7;"></a></li>
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
                    
              <li><span>09. </span>Takwim dan KPI Tadbir Urus Tpata <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Kementerian/ jabatan/ agensi hendaklah memastikan pelaksanaan TPATA mematuhi takwim sebagaimana Lampiran A. Kementerian/ jabatan/ agensi hendaklah memantau dan mengukur pencapaian KPI tadbir urus TPATA." data-icon="&#xe0f7;"></a></li>
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
                    
              <li><span>10. </span>Penutup <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Kesimpulan" data-icon="&#xe0f7;"></a></li>
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
                    
              <li><span>11. </span>Lampiran <a id="popoverOption" href="#" rel="popover" data-placement="bottom" data-original-title="Sebarang dokumen berkaitan yang menyoking penerangan dalam penyediaan PSPA Operasi" data-icon="&#xe0f7;"></a></li>
              	<div>
                  <a href="#myLampir" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe102;"> Tambah Lampiran</span>
                  </a>
                  
                  <!-- Modal //xdok modal doh tu -->
                  <div id="myLampir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myLampirLabel" aria-hidden="true">
                  <?php echo form_open_multipart('pspao/pspao_akhir_baru'); ?>
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
    <td width="30%"><?php echo form_input('namafile', '', 'class="input-xlarge" placeholder="Nama Fail"'); ?></td>
  </tr>
  <tr>
    <td>2. Muat Naik Dokumen</td>
    <td><?php echo form_upload('userfile', '', 'class="input-xlarge" placeholder="Nama Fail"') ?></td>
  </tr>
</table>
                      	

                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>
                      <?php echo form_submit('hantar', 'Tambah','class="btn btn-primary"'); ?> 
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
        <?php /*?><a href="<?php echo site_url('pspao/pspao_akhir_baru_1/'.$this->uri->segment(3)) ?>"><button class="btn btn-primary" type="button"> Sebelum </button></a><?php */?>
        <?php echo form_submit('hantar', 'Sebelum','class="btn btn-primary"'); ?>
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
