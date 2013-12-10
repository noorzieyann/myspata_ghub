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
                  <textarea id="wysiwyg" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>

              <li> Visi Pengurusan Aset Tak Alih </li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg2" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>

              <li> Misi Pengurusan Aset Tak Alih</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg3" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>

              <li> Objektif Pengurusan Aset Tak Alih </li>
              	<div class="wysiwyg-container" style="padding-bottom:0px">
                  <textarea id="wysiwyg4" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
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
                  <textarea id="wysiwyg6" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
              <?php include('skop_fungsi_aset.php') ?>  
                    
              <li> Strategi Perlakasanaan</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg7" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <ul class="decimal-leading-zero">
              
              <li> Struktur Tadbir Urus Organisasi</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg8" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Sistem, Prosedur, Piawaian dan Teknologi</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg9" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Kaedah Pelaksanaan (Dalaman dan Luaran)</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg10" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                <?php include('kaedah_pelaksanaan.php') ?> 
                    
              <li> Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg11" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Penyediaan Keperluan Sumber</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg12" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Pemantauan Pelaksanaan dan Pengukuran Output</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg13" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
              
              </ul>
                    
              <li> Kajian Semula Pengurusan</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg14" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Takwim dan KPI Tadbir Urus Tpata</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg15" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Penutup</li>
              	<div class="wysiwyg-container">
                  <textarea id="wysiwyg16" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Lapiran</li>
              	<div>Tambah Lampiran</div>

            </ul>
            
          </div>
   

                  </form>
                  

                  <div class="clearfix"> </div>
         
                
                
               
          
              </div>
            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
                <button class="btn btn-danger input-top-margin" type="button"> Batal </button>
        <button class="btn btn-primary" type="button"> Sebelum </button>
        <button class="btn btn-primary" type="button"> Seterusnya </button>

</div>
<div class="clearfix"></div>
                

</div>

<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script>

	$('#wysiwyg8').wysihtml5();
	$('#wysiwyg9').wysihtml5();
    $('#wysiwyg10').wysihtml5();
    $('#wysiwyg11').wysihtml5();
    $('#wysiwyg12').wysihtml5();
    $('#wysiwyg13').wysihtml5();
    $('#wysiwyg14').wysihtml5();
    $('#wysiwyg15').wysihtml5();
    $('#wysiwyg16').wysihtml5();
	
</script>
