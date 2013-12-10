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
            
              <li> Pendahuluan <span class="popover-pop" data-original-title="1.0 Pendahuluan" 
           data-content="Menerangkan secara umum fungsi dan organisasi kementerian/ jabatan/ agensi serta struktur PATA dalam organisasi." 
           data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang" class="input-block-level" placeholder="Menerangkan secara umum fungsi dan organisasi kementerian/ jabatan/ agensi serta struktur PATA dalam organisasi." style="height: 80px"></textarea>
                </div>

              <li> Visi Pengurusan Aset Tak Alih <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menetapkan hala tuju, fokus dan sasaran kecemerlangan PATA kementerian/ jabatan/ agensi pada masa akan datang." data-placement="right"  data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang2" class="input-block-level" placeholder="Menetapkan hala tuju, fokus dan sasaran kecemerlangan PATA kementerian/ jabatan/ agensi pada masa akan datang." style="height: 80px"></textarea>
                </div>

              <li> Misi Pengurusan Aset Tak Alih <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Menetapkan tindakan - tindakan strategik untuk mencapai visi kementerian/ jabatan/ agensi." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang3" class="input-block-level" placeholder="Menetapkan tindakan - tindakan strategik untuk mencapai visi kementerian/ jabatan/ agensi." style="height: 80px"></textarea>
                </div>

              <li> Objektif Pengurusan Aset Tak Alih <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penerimaan Aset" data-content="Menjelaskan matlamat aset mengikut keperluan dan kehendak kementerian/ jabatan/ agensi." data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container" style="padding-bottom:0px">
                  <textarea id="wysugetkusang4" class="input-block-level" placeholder="Menjelaskan matlamat aset mengikut keperluan dan kehendak kementerian/ jabatan/ agensi." style="height: 80px"></textarea>
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
                    
              <li> Skop Kategori dan Fungsi Aset <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
                <div style="padding-bottom:10px">
              	<?php include('skop_kategori_fungsi.php') ?>
              	<?php /*
                <div class="wysiwyg-container">
                  <textarea id="wysiwyg5" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
				*/ ?>
                </div>
                    
              <li> Penetapan Polisi Pengurusan Aset (Operasi) Serta Output <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang6" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
              <?php include('skop_fungsi_aset.php') ?>  
                    
            </ul>
            
          </div>
   

                  </form>
                  

                  <div class="clearfix"> </div>
         
                
                
               
          
              </div>


<?php // SENARAI BORANG -START- ?>

            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
		<button class="btn btn-danger input-top-margin" type="button"> Batal </button>
        <a href="<?php echo site_url('pspao/senarai_template_pspao_awal') ?>"><button class="btn btn-primary" type="button"> Sebelum </button></a>
        <a href="<?php echo site_url('pspao/pspao_akhir_baru_2') ?>"><button class="btn btn-primary" type="button"> Seterusnya </button></a>

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
