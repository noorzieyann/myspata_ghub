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
          	<div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kandungan 
            </div>
          </div>
        
        <div class="widget-body">
        <form class="form-horizontal no-margin">
          <div class="stylish-lists">
          	<ol class="decimal-leading-zero" start="7">
                                
              <li> Strategi Perlakasanaan <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang7" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <ul class="decimal-leading-zero">
              
              <li> Struktur Tadbir Urus Organisasi <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang8" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Sistem, Prosedur, Piawaian dan Teknologi <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang9" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Kaedah Pelaksanaan (Dalaman dan Luaran) <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang10" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                <?php include('kaedah_pelaksanaan.php') ?> 
                    
              <li> Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang11" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Penyediaan Keperluan Sumber <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang12" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Pemantauan Pelaksanaan dan Pengukuran Output <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang13" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
              
              </ul>
                    
              <li> Kajian Semula Pengurusan <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang14" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Takwim dan KPI Tadbir Urus Tpata <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang15" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
                </div>
                    
              <li> Penutup <span class="popover-pop" data-placement="right" data-icon="&#xe0f7;" style="cursor:pointer"></span></li>
              	<div class="wysiwyg-container">
                  <textarea id="wysugetkusang16" class="input-block-level" placeholder="Enter text ..." style="height: 80px"></textarea>
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
                      <?php echo form_submit('mysubmit', 'Tambah Dokumen','class="btn btn-warning2"') ?> 
                    </div>
                    <?php  echo form_close();?>

                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
                  
                 <?php include('lampiran.php') ?>
                 
                </div>

            </ol>
            
          </div>
   

                  </form>
                  

                  <div class="clearfix"> </div>
          
              </div>

            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
		<button class="btn btn-danger input-top-margin" type="button"> Batal </button>
        <a href="<?php echo site_url('pspao/pspao_akhir_baru') ?>"><button class="btn btn-primary" type="button"> Sebelum </button></a>
        <a href="<?php echo site_url('pspao/pspao_akhir_baru_3') ?>"><button class="btn btn-primary" type="button"> Seterusnya </button></a>

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
