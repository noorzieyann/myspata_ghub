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
function return_modal($ids,$tajuk,$body){

echo '
<!-- Modal //xdok modal doh tu -->
<div id="myModal'.$ids.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModal'.$ids.'Label" aria-hidden="true">';

$attributes = array('class' => 'form-horizontal no-margin','name'  => 'ukuran_sasar_pspao','id'    => 'ukuran_sasar_pspao');
echo form_open('pspao/pspao_akhir_sunting_pp',$attributes); 
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
echo '<div class="wysiwyg-container"><textarea id="nowucme'.$ids.'" class="input-block-level" placeholder="'.$body.'" style="height: 80px"></textarea></div>';
/////////////////// body sini //////////////////

echo '
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>';
echo form_submit('mysubmit', 'Simpan','class="btn btn-warning2"');
echo '
                    </div>';
echo form_close();
echo '
                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
';

}
?>

	<!--breadcrumb -EYO- -->
    <div class="widget-body" style="padding-bottom:10px">
	  <ul class="breadcrumb-beauty">
		<li><a href="<?php echo site_url('main')?>">Fungsi</a></li>
        <li><a href="#">Perangcangan</a></li>
        <li><a href="#">Pelan</a></li>
        <li><a href="#">PSPA(O) Akhir</a></li>
        <li><a href="#">Penyediaan PSPA(O) Akhir (Sunting PP)</a></li>
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
                      <tr>
                        <td><span class="name">1.0</span></td>
                        <td class="hidden-phone">Pendahuluan</td>
                        <td class="hidden-phone"><a href="#myModal1" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('1','Pendahuluan','Pendahuluan') ?>
                      <tr>
                        <td><span class="name">2.0</span></td>
                        <td class="hidden-phone">Visi Pengurusan Aset Tak Alih</td>
                        <td class="hidden-phone"><a href="#myModal2" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge">Deraf</span></td>                    
                      </tr>
                      <?php echo return_modal('2','Visi Pengurusan Aset Tak Alih','Visi Pengurusan Aset Tak Alih') ?>
                      <tr>
                        <td><span class="name">3.0</span></td>
                        <td class="hidden-phone">Misi Pengurusan Aset Tak Alih</td>
                        <td class="hidden-phone"><a href="#myModal3" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge">Deraf</span></td>                    
                      </tr>
                      <?php echo return_modal('3','Misi Pengurusan Aset Tak Alih','Misi Pengurusan Aset Tak Alih') ?>
                      <tr>
                        <td><span class="name">4.0</span></td>
                        <td class="hidden-phone">Objektif Pengurusan Aset Tak Alih</td>
                        <td class="hidden-phone"><a href="#myModal4" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('4','Objektif Pengurusan Aset Tak Alih','Objektif Pengurusan Aset Tak Alih') ?>
                      <tr>
                        <td><span class="name">5.0</span></td>
                        <td class="hidden-phone">Skop Kategori dan Fungsi Aset</td>
                        <td class="hidden-phone"><a href="#myModal5" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('5','Skop Kategori dan Fungsi Aset','Skop Kategori dan Fungsi Aset') ?>
                      <tr>
                        <td><span class="name">6.0</span></td>
                        <td class="hidden-phone">Penetapan Polisi Pengurusan Aset (Operasi) serta Output</td>
                        <td class="hidden-phone"><a href="#myModal6" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('6','Penetapan Polisi Pengurusan Aset (Operasi) serta Output','Penetapan Polisi Pengurusan Aset (Operasi) serta Output') ?>
                      <tr>
                        <td><span class="name">7.0</span></td>
                        <td class="hidden-phone">Strategi Pelaksanaan</td>
                        <td class="hidden-phone"><a href="#myModal7" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('7','Strategi Pelaksanaan','Strategi Pelaksanaan') ?>
                      <tr>
                        <td><span class="name">&nbsp;&nbsp;7.1</span></td>
                        <td class="hidden-phone">Struktur Tadbir Urus Organisasi</td>
                        <td class="hidden-phone"><a href="#myModal8" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('8','Struktur Tadbir Urus Organisasi','Struktur Tadbir Urus Organisasi') ?>
                      <tr>
                        <td><span class="name">&nbsp;&nbsp;7.2</span></td>
                        <td class="hidden-phone">Sistem, Prosedur, Piawaian dan Teknologi</td>
                        <td class="hidden-phone"><a href="#myModal9" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('9','Sistem, Prosedur, Piawaian dan Teknologi','Sistem, Prosedur, Piawaian dan Teknologi') ?>
                      <tr>
                        <td><span class="name">&nbsp;&nbsp;7.3</span></td>
                        <td class="hidden-phone">Kaedah Pelaksanaan (Dalaman atau Luaran)</td>
                        <td class="hidden-phone"><a href="#myModal10" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge">Deraf</span></td>                    
                      </tr>
                      <?php echo return_modal('10','Kaedah Pelaksanaan (Dalaman atau Luaran)','Kaedah Pelaksanaan (Dalaman atau Luaran)') ?>
                      <tr>
                        <td><span class="name">&nbsp;&nbsp;7.4</span></td>
                        <td class="hidden-phone">Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset (Operasi)</td>
                        <td class="hidden-phone"><a href="#myModal11" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('11','Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset (Operasi)','Penyediaan Pelan Perancangan dan Bajet Pengurusan Aset (Operasi)') ?>
                      <tr>
                        <td><span class="name">&nbsp;&nbsp;7.5</span></td>
                        <td class="hidden-phone">Penyediaan Keperluan Sumber</td>
                        <td class="hidden-phone"><a href="#myModal12" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('12','Penyediaan Keperluan Sumber','Penyediaan Keperluan Sumber') ?>
                      <tr>
                        <td><span class="name">&nbsp;&nbsp;7.6</span></td>
                        <td class="hidden-phone">Pemantauan Pelaksanaan dan Pengukuran Output</td>
                        <td class="hidden-phone"><a href="#myModal13" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('13','Pemantauan Pelaksanaan dan Pengukuran Output','Pemantauan Pelaksanaan dan Pengukuran Output') ?>
                      <tr>
                        <td><span class="name">8.0</span></td>
                        <td class="hidden-phone">Kajian Semula Pengurusan</td>
                        <td class="hidden-phone"><a href="#myModal14" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('14','Kajian Semula Pengurusan','Kajian Semula Pengurusan') ?>
                      <tr>
                        <td><span class="name">9.0</span></td>
                        <td class="hidden-phone">Takwim dan KPI Tadbir Urus Tpata</td>
                        <td class="hidden-phone"><a href="#myModal15" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('15','Takwim dan KPI Tadbir Urus Tpata','Takwim dan KPI Tadbir Urus Tpata') ?>
                      <tr>
                        <td><span class="name">10.0</span></td>
                        <td class="hidden-phone">Penutup</td>
                        <td class="hidden-phone"><a href="#myModal16" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('16','Penutup','Penutup') ?>
                      <tr>
                        <td><span class="name">11.0</span></td>
                        <td class="hidden-phone">Lampiran</td>
                        <td class="hidden-phone"><a href="#myModal17" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></li></ul></a></td>               
                        <td class="hidden-phone"><span class="badge badge-success">Lengkap</span></td>                    
                      </tr>
                      <?php echo return_modal('17','Lampiran','Lampiran') ?>
                    </tbody>
                  </table>
                  <!--/.END table-->               


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
                        <ul class="icomoon-icons-container">
                        <a href="<?php echo site_url('pspao/pspao_akhir_jkrpata2a_ptf') ?>">
                        <li class="rounded">
                        <span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span>
                        </li>
                        </a>
                        </ul>                
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

<?php */// ULASAN -END-   ?>

            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
                <button class="btn btn-danger input-top-margin" type="button"> Batal </button>
        <button class="btn btn-primary" type="button"> Pembetulan </button>
        <button class="btn btn-success" type="button"> Sah </button>

</div>
<div class="clearfix"></div>
                

</div>

<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script>

	$('#nowucme1').wysihtml5();
	$('#nowucme2').wysihtml5();
	$('#nowucme3').wysihtml5();
    $('#nowucme4').wysihtml5();
    $('#nowucme5').wysihtml5();
    $('#nowucme6').wysihtml5();
    $('#nowucme7').wysihtml5();
	$('#nowucme8').wysihtml5();
	$('#nowucme9').wysihtml5();
    $('#nowucme10').wysihtml5();
    $('#nowucme11').wysihtml5();
    $('#nowucme12').wysihtml5();
    $('#nowucme13').wysihtml5();
    $('#nowucme14').wysihtml5();
    $('#nowucme15').wysihtml5();
    $('#nowucme16').wysihtml5();
    $('#nowucme17').wysihtml5();
	
</script>
