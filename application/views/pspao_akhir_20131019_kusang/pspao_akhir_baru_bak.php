<style>
.wysiwyg-container{
	padding-bottom:16px;
	padding-top:4px;
}    
</style>

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

	<div class="row-fluid">
	  <div class="span12">
		<div class="widget">
		  <div class="widget-header">
			<div class="title">
			  <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Permintaan Penyediaan  PSPA(O) Akhir
			</div>
		  </div>
                
          <div class="widget-body">
            <form class="form-horizontal no-margin">
			  <div class="control-group">
				<label class="control-label" for="DateOfBirthMonth">Tempoh Mula</label>
                  <div class="controls controls-row">
                    <select name="DateOfBirth_Year" class="span4 input-left-top-margins">
                      <option>- Tahun -</option>
<?php for($i=2015;$i>2000;$i--){ ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
<?php } ?>
					</select>
                    <label class="span1 input-left-top-margins" for="DateOfBirthMonth">Hingga</label>
                    <select name="DateOfBirth_Year" class="span4 input-left-top-margins">
                      <option>- Tahun -</option>
<?php for($i=2015;$i>2000;$i--){ ?>
                      <option value="<?php echo $i ?>"><?php echo $i ?></option>
<?php } ?>
                    </select>
				  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="kementerian">Kementerian</label>
                  <div class="controls">
                  	<input type="text" name="kementerian" id="kementerian" class="span5" placeholder="Kementerian Kerja Raya"  />
                  </div>
              </div>
            </form>
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
        <form class="form-horizontal no-margin">
          <div class="stylish-lists">
          	<ul class="decimal-leading-zero">
            
              <li> Pendahuluan </li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>

              <li> Visi Pengurusan Aset Tak Alih </li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang2" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>

              <li> Misi Pengurusan Aset Tak Alih</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang3" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>

              <li> Objektif Pengurusan Aset Tak Alih </li>
              	<div class="wysiwyg-container" style="padding-bottom:0px">
                  <textarea id="wysugetkusang4" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                
                <div style="padding-bottom:10px">
                  <a href="#myObjektif" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe082;"> Lengkapakan Ukuran dan Sasaran </span>
                  </a>

                  <!-- Modal //xdok modal doh tu -->
                  <div id="myObjektif" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myObjektifLabel" aria-hidden="true">
                  <?php echo form_open('pspao/pspao_akhir_baru'); ?>
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

						<?php echo validation_errors(); ?>
                  
                      	<?php 
						   $attributes = array(
							   'class' => 'form-horizontal no-margin', 
							   'name'  => 'ukuran_sasar_pspao',
							   'id'    => 'ukuran_sasar_pspao',
							);
                    		echo form_open('main/pspao_akhir_baru',$attributes); 
						?>
						<?php include('ukuran_sasar.php'); ?>
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>
                      <?php echo form_submit('mysubmit', 'Simpan Deraf','class="btn btn-warning2"') ?> 
                    </div>
                    <?php  echo form_close();?>

                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
                  
                </div>
                    
              <li> Skop Kategori dan Fungsi Aset </li>
                <div style="padding-bottom:10px">
              	<?php include('skop_kategori_fungsi.php') ?>
              	<?php /*
                <div class="wysiwyg-container">
                  <textarea id="wysiwyg5" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
				*/ ?>
                </div>
                    
              <li> Penetapan Polisi Pengurusan Aset (Operasi) Serta Output </li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang6" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
              <?php include('skop_fungsi_aset.php') ?>  
                    
              <li> Strategi Perlakasanaan</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang7" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <ul class="decimal-leading-zero">
              
              <li> Struktur Tadbir Urus Organisasi</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang8" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Sistem, Prosedur, Piawaian dan Teknologi</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang9" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Kaedah Pelaksanaan (Dalaman dan Luaran)</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang10" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                <?php include('kaedah_pelaksanaan.php') ?> 
                    
              <li> Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang11" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Penyediaan Keperluan Sumber</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang12" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Pemantauan Pelaksanaan dan Pengukuran Output</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang13" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
              
              </ul>
                    
              <li> Kajian Semula Pengurusan</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang14" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Takwim dan KPI Tadbir Urus Tpata</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang15" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Penutup</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang16" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Lapiran</li>
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
                      <?php echo form_submit('mysubmit', 'Tambah Dokumen','class="btn btn-warning2"') ?> 
                    </div>
                    <?php  echo form_close();?>

                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
                  
                 <?php include('lampiran.php') ?>
                 
                </div>

            </ul>
            
          </div>
   

                  </form>
                  

                  <div class="clearfix"> </div>
         
                
                
               
          
              </div>


<?php // SENARAI BORANG -START- ?>

        <!--panel 3-->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Borang</div>
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
                        <th style="width:8%" class="hidden-phone">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <span class="name">
                            1</span>
                        </td>
                        <td class="hidden-phone">JKR.PATA-2A</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container"><a href="<?php echo site_url('pspao/pspao_akhir_jkrpata2a_pp') ?>">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></a></ul>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                    
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
<?php // SENARAI BORANG -END- ?>


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
                        <td class="hidden-phone">JKR.PATA-2B</td>
                        <td class="hidden-phone">                       
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>                
                                            
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            2</span></td>
                        <td class="hidden-phone">JKR.PATA-2C</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                        
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            3</span></td>
                        <td class="hidden-phone">JKR.PATA-2D</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul> 
                                           
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            4</span></td>
                        <td class="hidden-phone">JKR.PATA-3A</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>  
                                          
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5</span></td>
                        <td class="hidden-phone">JKR.PATA-3B</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                                           
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5</span></td>
                        <td class="hidden-phone">JKR.PATA-3C</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                                           
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5</span></td>
                        <td class="hidden-phone">JKR.PATA-3D</td>
                        <td class="hidden-phone">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>
                                           
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5</span></td>
                        <td class="hidden-phone">JKR.PATA-3E</td>
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

<?php */ /// ULASAN -END-   ?>

            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
		<button class="btn btn-danger input-top-margin" type="button"> Batal </button>
        <a href="<?php echo site_url('pspao/senarai_template_pspao_awal') ?>"><button class="btn btn-primary" type="button"> Sebelum </button></a>
        <button class="btn btn-primary" type="button"> Seterusnya </button>

</div>
<div class="clearfix"></div>
                

</div>

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
