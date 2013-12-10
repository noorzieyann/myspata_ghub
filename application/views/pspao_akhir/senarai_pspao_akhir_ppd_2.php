<style>
.wysiwyg-container{
	padding-bottom:16px;
	padding-top:4px;
}    
.modal{
	width: 760px !important;
	margin-left: -380px !important;
}
</style>

<?php


function return_modal($ids,$tajuk,$body, $statusid){

echo '
<!-- Modal //xdok modal doh tu -->
<div id="myModal'.$ids.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModal'.$ids.'Label" aria-hidden="true">';

echo '
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModal'.$ids.'Label">
                        '.$tajuk.'
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
';
echo validation_errors();

/////////////////// body sini //////////////////
if($statusid !=2 && $statusid !=4 && $statusid !=6){
	echo '<div class="wysiwyg-container"><textarea id="nowucme'.$ids.'" name ="kand_detail[]" class="input-block-level" style="height: 80px">'.$body.'</textarea></div>';
}else{
	echo '<div class="wysiwyg-container"><textarea id="nowucme'.$ids.'" name ="kand_detail[]" class="input-block-level" style="height: 80px" readonly="readonly">'.$body.'</textarea></div>';	
}
/////////////////// body sini //////////////////

echo '
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>';
if($statusid !=2 && $statusid !=4 && $statusid !=6){
	echo form_submit('hantar', 'Sunting','class="btn btn-warning2"');
}
echo '
                    </div>';
echo '
                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
';

}
?>

	<!--breadcrumb -EYO- -->
    <div class="widget-body" style="padding-bottom:20px">
	  <ul class="breadcrumb-beauty">
		<li><a href="<?php echo site_url('main')?>">Fungsi</a></li>
        <li><a href="#">Perangcangan</a></li>
        <li><a href="#">Pelan</a></li>
        <li><a href="#">PSPA(O) Akhir</a></li>
        <li><a href="#">Rumusan PSPA(O) Akhir</a></li>
      </ul>
    </div>
    <!--END breadcrumb-->

<?php
						$kira_lengkap = 0;
						$kira_tot = 0;
						foreach ($rows as $datt){
							
						$kira_tot++;
							
							if($datt->kand_utama_detail != NULL && $datt->kand_form != 'f1' && $datt->kand_form != 'f2' && $datt->kand_form != 'f3' && $datt->kand_form != 'f4' && $datt->kand_form != 'f5'){
								$kira_lengkap++;
							}
							
							if($datt->kand_form == 'f1'){
								if($datt->kand_utama_detail && $this->pspao_akhir_model->cek_status_f1($this->uri->segment(3))){
									$kira_lengkap++;
								}
							}
							if($datt->kand_form == 'f2'){
								$kira_lengkap++;
							}
							if($datt->kand_form == 'f3'){
								if($datt->kand_utama_detail && $this->pspao_akhir_model->cek_status_f3($this->uri->segment(3))){
									$kira_lengkap++;
								}
							}
							if($datt->kand_form == 'f4'){
								if($datt->kand_utama_detail && $this->pspao_akhir_model->cek_status_f4($this->uri->segment(3))){
									$kira_lengkap++;
								}
							}
							if($datt->kand_form == 'f5'){
								if($this->pspao_akhir_model->cek_status_f5($this->uri->segment(3))){
									$kira_lengkap++;
								}
							}
							
						//echo $kira_tot.' => '.$kira_lengkap.'<br />';
						}
						
						$lengkapstat = number_format(($kira_lengkap/$kira_tot)*100);





$attributes = array('class' => 'form-horizontal no-margin','name'  => 'ukuran_sasar_pspao','id'    => 'ukuran_sasar_pspao');
echo form_open('pspao/senarai_pspao_akhir_ppd_2/'.$this->uri->segment(3),$attributes);
?>
                    <?php  if($this->uri->segment(4) != NULL){ ?>
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active"><a href="<?php echo site_url('pspao/senarai_pspao_akhir_ptf/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PSPA(O)</a></li>
                  
                  <?php if($this->pnpa_model->get_pelan_ptra($this->uri->segment(3),1)) { ?>
                 <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PTRA</a></li>
                  <?php } else{ ?><li class=""><a href=""><font color="#A8A8A8">PTRA</font></a></li><?php } ?>
                    
                  <?php if($this->pnpa_model->get_pelan_popa($this->uri->segment(3),1)) { ?>
                 <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">POPA</a></li>
                  <?php } else{ ?><li class=""><a href=""><font color="#A8A8A8">POPA</font></a></li><?php } ?>
                    
                   <?php if($this->pnpa_model->get_pelan_pnpa($this->uri->segment(3),1)) { ?>
                 <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PNPA</a></li>
                  <?php } else{ ?><li class=""><a href=""><font color="#A8A8A8">PNPA</font></a></li><?php } ?>
                    
                   <?php if($this->pnpa_model->get_pelan_ppun($this->uri->segment(3),1)) { ?>
                 <li class=""><a href="<?php echo site_url('ppun/senarai_ppun/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PPUN</a></li>
                  <?php } else{ ?><li class=""><a href=""><font color="#A8A8A8">PPUN</font></a></li><?php } ?>
                    
                   <?php if($this->pnpa_model->get_pelan_pla($this->uri->segment(3),1)) { ?>
                 <li class=""><a href="<?php echo site_url('pla/senarai_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PLA</a></li>
                  <?php } else{ ?><li class=""><a href=""><font color="#A8A8A8">PLA</font></a></li><?php } ?>
                   
                  </ul>
         <?php } else{?>
             <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active"><a href="<?php echo site_url('pspao/senarai_pspao_akhir_ptf/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_pla/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">PLA</a></li>
                  </ul>
             <?php
             
         } ?>


          <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
            
            <!--status info-->
            <div class="alert alert-block alert-info fade in">
                    <button data-dismiss="alert" class="close" type="button">
                      ×
                    </button>
                      <h5 style="color:#FF0000"><?php echo $lengkapstat ?>%
                      <a class="alert-heading">dokumen ini telah dilengkapkan</a>
                      </h5>
            </div>
            <!--/.END status info-->

<?php if($ulasan != NULL){ ?>
            <!--status info-->
            <div class="alert alert-block alert-warning fade in">
                    <button data-dismiss="alert" class="close" type="button">
                      ×
                    </button>
                      <h5 style="color:#FF0000">Ulasan : 
                      <a class="alert-heading"><?php echo $ulasan; ?></a>
                      </h5>
            </div>
            <!--/.END status info-->
<?php } ?>



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
                  	<?php if(!($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                    <?php echo form_input('tahun_mula', $tahun_mula, 'disabled="disabled"'); ?>
                    <?php }else{ ?>
 					<?php echo form_dropdown('tahun_mula',get_year_dropdown(),$tahun_mula,'class="span4 input-left-top-margins"'); ?>
                    <?php } ?>
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
                  	<?php if(!($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                    <?php echo form_input('tahun_mula', $tahun_mula, 'disabled="disabled"'); ?>
                    <?php }else{ ?>
                    <?php echo form_dropdown('tahun_akhir',get_year_dropdown(),$tahun_akhir,'class="span4 input-left-top-margins"'); ?>
                    <?php } ?>
                    <?php echo form_error('tahun_akhir'); ?>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="kementerian">Kementerian</label>
                  <div class="controls">
<?php
$kementerian = $this->aauth->util_get_kementerian($kementerian);
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
<?php ///////// body utama /////////// ?>

              <!--table-->
                  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th class="hidden-phone">Nama Borang</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                        <th style="width:10%" class="hidden-phone">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $kand_utama_bil = array(); ?>
                    <?php foreach ($rows as $dat){ ?>	
<?php

echo '<input type="hidden" name="kand_id[]" value="'.$dat->kandungan_id.'">'

?>						
                      <tr>
                        <td><span class="name">
							<?php
                            	//echo number_format($dat->kand_utama_bil, 1);
								if($dat->node_type == 0){
									echo number_format($dat->kand_utama_bil, 1);
								}else{
									echo '&nbsp;&nbsp;'.$dat->node_type.'.'.number_format($dat->kand_utama_bil, 1);
								}
							?>
                        </span></td>
                        <td class="hidden-phone"><?php echo $dat->kand_utama ?></td>
                        <td class="hidden-phone">
                        
                        <?php if($dat->kand_type == 1 ){ ?>
                        <a href="#myModal<?php echo $dat->kandungan_id ?>" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe024;"></span></li></ul></a>
                        <?php }else { ?>
                        <?php //echo $dat->kand_type ?>
                        
                        <?php if($dat->kand_form == 'f1'){ ?>
                        <a href="<?php echo site_url('pspao/pspao_akhir_ppd_f1/'.$this->uri->segment(3).'/'.$dat->kandungan_id.'/'.$statusid) ?>"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe025;"></span></li></ul></a>
                        <?php } ?>
                        <?php if($dat->kand_form == 'f2'){ ?>
                        <a href="<?php echo site_url('pspao/pspao_akhir_ppd_f2/'.$this->uri->segment(3).'/'.$dat->kandungan_id).'/'.$statusid ?>"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe025;"></span></li></ul></a>
                        <?php } ?>
                        <?php if($dat->kand_form == 'f3'){ ?>
                        <a href="<?php echo site_url('pspao/pspao_akhir_ppd_f3/'.$this->uri->segment(3).'/'.$dat->kandungan_id).'/'.$statusid ?>"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe025;"></span></li></ul></a>
                        <?php } ?>
                        <?php if($dat->kand_form == 'f4'){ ?>
                        <a href="<?php echo site_url('pspao/pspao_akhir_ppd_f4/'.$this->uri->segment(3).'/'.$dat->kandungan_id).'/'.$statusid ?>"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe025;"></span></li></ul></a>
                        <?php } ?>
                        <?php if($dat->kand_form == 'f5'){ ?>
                        <a href="<?php echo site_url('pspao/pspao_akhir_ppd_f5/'.$this->uri->segment(3).'/'.$dat->kandungan_id).'/'.$statusid ?>"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe025;"></span></li></ul></a>
                        <?php } ?>
                        <?php } ?>
                        
                        
                        </td>               
                        <td class="hidden-phone">
                        <?php
						
							$badge = '<span class="badge">Deraf</span>';
							
							if($dat->kand_utama_detail != NULL){
								$badge = '<span class="badge badge-success">Lengkap</span>';
							}
							
							if($dat->kand_form == 'f1'){
								if($dat->kand_utama_detail && $this->pspao_akhir_model->cek_status_f1($this->uri->segment(3))){
									$badge = '<span class="badge badge-success">Lengkap</span>';
								}else{
									$badge = '<span class="badge">Deraf</span>';
								}
							}
							if($dat->kand_form == 'f2'){
								$badge = '<span class="badge badge-success">Lengkap</span>';
							}
							if($dat->kand_form == 'f3'){
								if($dat->kand_utama_detail && $this->pspao_akhir_model->cek_status_f3($this->uri->segment(3))){
									$badge = '<span class="badge badge-success">Lengkap</span>';
								}else{
									$badge = '<span class="badge">Deraf</span>';
								}
							}
							if($dat->kand_form == 'f4'){
								if($dat->kand_utama_detail && $this->pspao_akhir_model->cek_status_f4($this->uri->segment(3))){
									$badge = '<span class="badge badge-success">Lengkap</span>';
								}else{
									$badge = '<span class="badge">Deraf</span>';
								}
							}
							if($dat->kand_form == 'f5'){
								if($this->pspao_akhir_model->cek_status_f5($this->uri->segment(3))){
									$badge = '<span class="badge badge-success">Lengkap</span>';
								}else{
									$badge = '<span class="badge">Deraf</span>';
								}
							}
							
							echo $badge;						
						?>
                        </td>                    
                      </tr>
                      <?php
					  	$bondy = $dat->kand_utama_detail;
                      	if($this->input->post('kand_detail_'.$dat->kandungan_id) !=NULL){
							$bondy = $this->input->post('kand_detail_'.$dat->kandungan_id);
						}
					  ?>
                      
                      <?php echo return_modal($dat->kandungan_id, $dat->kand_utama , $bondy, $statusid) ?>

					<?php } ?>
                    </tbody>
                  </table>
                  <!--/.END table-->               
				<?php 
					//echo form_hidden($kand_utama_bil); 
					//print_r($kand_utama_bil);
					echo form_hidden('countarray',count($kand_utama_bil)); 
                ?>

<?php ///////// body utama /////////// ?>
        <div class="clearfix"></div>
        </div>
      </div>
    



<?php // SENARAI BORANG -START- ?>

        <!--panel 3-->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Semak Borang Berikut</div>
              </div>
              	<!--table section-->            	
                <div class="widget-body"> 
              <!--table-->
                  <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th style="width:2%">
                          Bil
                        </th>
                        <th class="hidden-phone">Nama Borang</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="name">
                            1</span>
                        </td>
                        <td class="hidden-phone">Format Pelan Pengurusan Aset (PPA) (Operasi) Perancangan (JKR.PATA-2A)</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>                
                                            
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            2</span>
                        </td>
                        <td class="hidden-phone">Format Ringkasan Maklumat Pelan Pengurusan Aset (PPA) (Operasi) Perancangan (JKR.PATA-2B)</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>                
                                            
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            3</span></td>
                        <td class="hidden-phone">Format Pelan Pengurusan Aset (PPA) (Operasi) Tahunan (JKR.PATA-2C)</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                        
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            4</span></td>
                        <td class="hidden-phone">Format Ringkasan Maklumat Pelan Pengurusan Aset (PPA) (Operasi) (JKR.PATA-2D)</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul> 
                                           
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5</span></td>
                        <td class="hidden-phone">Laporan Kesediaan Sumber Pengurusan Aset Tak Alih (JKR.PATA-3A)</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>  
                                          
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            6</span></td>
                        <td class="hidden-phone">Laporan Kemajuan Aktiviti Pengurusan Aset Tak Alih (JKR.PATA-3B)</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                                           
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            7</span></td>
                        <td class="hidden-phone">Laporan Kedudukan, Kos dan Nilaian Aset Tak Alilh (JKR.PATA-3C)</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                                           
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            8</span></td>
                        <td class="hidden-phone">Laporan Status Penarafan Prestasi Aset Tak Alih (JKR.PATA-3D)</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                                           
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            9</span></td>
                        <td class="hidden-phone">Laporan Pencapaian Keberkesanan Pelan Strategi Pengurusan Aset (Operasi) (JKR.PATA-3E)</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                                           
                      </td>
                      </tr>
                    </tbody>
                  </table>
                  <!--/.END table-->               
            </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 3-->


            </div>
          </div>
          <!-- end  div tab -->


<?php // SENARAI BORANG -END- ?>


<?php /// ULASAN -START- 
/* ?>
        <!--panel 4-->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Ulasan
                  </div>
                </div>
                <div class="widget-body">
                    <div class="control-group">
                      <div class="controls">
                        <textarea class="input-block-level" placeholder="Ulasan ..." style="height: 100px"></textarea>
                      </div>
                    </div>    
                </div>
              </div>
            </div>
         </div>
         <!--/.END panel 4-->

<?php */// ULASAN -END-   ?>

            </div>
             <div class="next-prev-btn-container pull-right">
             	<?php echo form_hidden('alasanbelaka','') ?>
                <a type="button" class="btn btn-danger" href="<?php echo site_url('pspao/senarai_pspao_akhir') ?>" data-toggle="modal">Batal</a>
                <?php if($statusid !=2 && $statusid !=4 && $statusid !=6){ ?>
                <a type="button" class="btn btn-warning2" href="#simpan" data-toggle="modal">Simpan Deraf</a>
                <a type="button" class="btn btn-success" href="#hantar" data-toggle="modal">Hantar</a> 
                <?php } ?>
             </div>

          </div>
          
<div class="clearfix"></div>



<!-- modal pengesahan simpan deraf-->         
    
<div id="simpan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
<h4 id="myModalLabel">Mesej Pengesahan</h4></div>
<div class="modal-body"><p>Adakah anda ingin menyimpan deraf PSPA(O) Akhir ini?</p></div>
 	<!--button-->
  	<div class="modal-footer">
	<?php
		$batal = array(
			'name'    => '',
			'id'      => '',
			'class'   => 'btn btn-danger input-top-margin',
			'value'   => '',
			'type'    => 'button',
			'content' => 'Tidak',
			'data-dismiss'=>'modal'
		);

		echo form_button($batal);
		echo form_submit('hantar', 'Simpan Deraf','class="btn btn-primary"');
	?>
                   
	</div>
    <!--/.END button-->
</div>
<!-- modal -->


<!-- modal pengesahan simpan -->         
    
<div id="hantar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
<h4 id="myModalLabel">Mesej Pengesahan</h4></div>
<div class="modal-body"><p>Adakah anda ingin menghantar PSPA(O) Akhir ini?</p></div>
 	<!--button-->
  	<div class="modal-footer">
	<?php
		$batal = array(
			'name'    => '',
			'id'      => '',
			'class'   => 'btn btn-danger input-top-margin',
			'value'   => '',
			'type'    => 'button',
			'content' => 'Tidak',
			'data-dismiss'=>'modal'
		);

		echo form_button($batal);
		echo form_submit('hantar', 'Hantar','class="btn btn-success"');
	?>
                   
	</div>
    <!--/.END button-->
</div>
<!-- modal -->



                

</div>
<?php echo form_close(); ?>

<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/alertify.min.js"></script>
<script>

function tanya(mess,href){
	var r=confirm(mess);
	if (r==true){
		window.location.assign(href)
	}

}

<?php
	foreach ($rows as $dt){
?>
	$('#nowucme<?php echo $dt->kandungan_id ?>').wysihtml5();
<?php
	}
?>
	
      //Alertify JS
      $ = function (id) {
        return document.getElementById(id);
      },
      reset = function () {
        $("toggleCSS").href = "<?php echo base_url() . 'asset/'; ?>css/alertify.core.css";
        alertify.set({
          labels: {
            ok: "Ya",
            cancel: "Tidak"
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: "ok"
        });
      };
      // Standard Dialogs
	  
      $("confirm").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghantar borang PSPA(O) Akhir untuk pengesahan?", function (e) {
          if (e) {
            alertify.success("Borang Berjaya dihantar");
			window.location.replace("<?php echo site_url('pspao/senarai_pspao_akhir') ?>");
          } else {
            alertify.error("Penghantaran dibatalkan");
          }
        });
        return false;
      };

</script>  

