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
echo '<div class="wysiwyg-container"><textarea id="nowucme'.$ids.'" name ="kand_detail[]" class="input-block-level" readonly="readonly" style="height: 80px">'.$body.'</textarea></div>';
/////////////////// body sini //////////////////

echo '
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>';
//echo form_submit('hantar', 'Sunting','class="btn btn-warning2"');
echo '
                    </div>';
echo '
                  </div></div>
                  <!-- Modal //xdok modal doh tu -->
';

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
                        PNPA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->

     <br />
      <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                     <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class="active"><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
    <?php
$attributes = array('class' => 'form-horizontal no-margin','name'  => 'summary_pp_pnpa','id'    => 'summary_pp_pnpa');
echo form_open('pnpa/summary_pp_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes);
?>
          
          
          <!--breadcrumb-->
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penilaian Keadaan/Prestasi Aset (PNPA)
                  </div>
                </div>
                <?php if (!empty($senarai_pnpa)) : foreach ($senarai_pnpa as $rec) : ?>
                <div class="widget-body">
                  <form class="form-horizontal no-margin">
                  <div class="control-group">
                      <label class="control-label" for="tahun">
                        Tahun
                      </label>
                      <div class="controls">
                         <?php echo form_input(array('name'  => 'tahun', 
                                                     'value' => $rec->tahun,
                                                     'disabled'=>'disabled',
                                                     'class' => 'input-xlarge required'));
                                                ?>     
                      </div>
                    </div>
                  
                    <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                          <?php if($get_namakem = $this->pnpa_model->get_namakem($rec->idkem)) foreach ($get_namakem as $rr)
                              echo  form_input(array('name'  => 'namakem', 
                                            'value' => $rr->namakem,
                                             'disabled'=>'disabled',
                                            'class' => 'input-xlarge required'));
                                                ?>  </div>
                    </div>                   
                    <div class="control-group">
                      <label class="control-label">
                        Jabatan/Agensi
                      </label>
                      <div class="controls">
                     <?php  if($get_namajab_agensi = $this->pnpa_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr)
                                            echo form_input(array('name'  => 'namajab_agensi', 
                                                                    'value' => $rr->nama_jab_agensi,
                                                                     'disabled'=>'disabled',
                                                                    'class' => 'input-xlarge required'));
                                                ?> </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Premis
                      </label>
                      <div class="controls">
                       <?php echo form_input(array('name'  => 'nama_premis', 
                                                   'disabled'=>'disabled',
                                                    'value' => $rec->nama_premis,
                                                    'class' => 'input-xlarge required'));
                                                ?> </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        No DPA
                      </label>
                      <div class="controls">
                        <?php echo form_input(array('name'  => 'nodpa', 
                                                     'disabled'=>'disabled',
                                                    'value' => $rec->nodpa,
                                                    'class' => 'input-xlarge required'));
                                                ?> </div>
                    </div>                    
                    <?php  echo form_close();?>
                      <?php endforeach; ?>
                      <?php endif; ?>
                </div>
              </div>
            </div>
         </div>
         <!--/.END panel 1-->

    <!--panel 2-->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Kemaskini Maklumat Berikut</div>
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
                        <th style="width:25%" class="hidden-phone">Kandungan</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                        <th style="width:8%" class="hidden-phone">Status</th>
                      </tr>
                    </thead>
                    <tbody>
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
								if($dat->node_type == 1){
									echo number_format($dat->kand_utama_bil, 1);
								}else{
									echo '&nbsp;&nbsp;'.$dat->node_type.'.'.number_format($dat->kand_utama_bil, 1);
								}
							?>
                        </span></td>
                        <td class="hidden-phone"><?php echo $dat->kand_utama ?></td>
                        <td class="hidden-phone"><a href="#myModal<?php echo $dat->kandungan_id ?>" data-toggle="modal"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></a></td>               
                        <td class="hidden-phone">
                        <?php if($dat->kand_utama_detail != NULL){ ?>
                        	<span class="badge badge-success">Lengkap</span>
                        <?php }else{ ?>
                        	<span class="badge">Deraf</span>
                        <?php } ?>
                        </td>                    
                      </tr>
                      <?php
					  	$bondy = $dat->kand_utama_detail;
                      	if($this->input->post('kand_detail_'.$dat->kandungan_id) !=NULL){
							$bondy = $this->input->post('kand_detail_'.$dat->kandungan_id);
						}
					  ?>
                      
                      <?php echo return_modal($dat->kandungan_id, $dat->kand_utama , $bondy) ?>

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
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 2-->
              
        <!--panel 3-->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Kemaskini Borang Berikut</div>
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
                        <th style="width:25%" class="hidden-phone">Nama Borang</th>
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
                        <td class="hidden-phone">Model Struktur Penilaian Aset di Premis (JKR.PATA.F8/1a)</td>
                        <td class="hidden-phone"><a href="<?php echo site_url('pnpa/model_struktur_pnpa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                       
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></a>                
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                    
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            2</span></td>
                        <td class="hidden-phone">Skop dan Aktiviti Penilaian Aset (JKR.PATA.F8/1b)</td>
                        <td class="hidden-phone"><a href="<?php echo site_url('pnpa/skop_aktiviti_pnpa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></a>
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            3</span></td>
                        <td class="hidden-phone">Format Analisis Keperluan Sumber Aktiviti Penilaian Aset (JKR.PATA.F8/1c)</td>
                        <td class="hidden-phone"> <a href="<?php echo site_url('pnpa/skop_aktiviti_pnpa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                        
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></a> 
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                   
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            4</span></td>
                        <td class="hidden-phone">Kawalan Rekod Penilaian Aset (JKR.PATA.F8/1d)</td>
                        <td class="hidden-phone"> <a href="<?php echo site_url('pnpa/kawalan_rekod_pnpa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                        
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></a>  
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                  
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5</span></td>
                        <td class="hidden-phone">Dokumen Rujukan (JKR.PATA.F8/1e)</td>
                        <td class="hidden-phone"><a href="<?php echo site_url('pnpa/dokumen_rujukan_pnpa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></a>
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
                 
                      <div class="controls">
                        <textarea class="input-block-level" placeholder="Ulasan ..." style="height: 100px" name="ulasan"></textarea>
                      </div>
                    
                </div>
              </div>
            </div>
         </div>
         <!--/.END panel 4-->
      
  <div class="next-prev-btn-container pull-right">
             
        <a href="<?php echo site_url(); ?>/pnpa/senarai_ppd_pnpa/<?php echo $this->uri->segment(3);?>">    
        <?php
        $batal = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',

            'type'    => 'button',
            'content' => 'Batal'
        );

        echo form_button($batal);
        
        ?>
         </a> 
 
        <?php
        if($statusid !=6){ ?>

          <a type="button" class="btn btn-info input-top-margin" href="#betul" data-toggle="modal">Pembetulan</a>
      <a type="button" class="btn btn-success" href="#lulus" data-toggle="modal">Lulus</a>   
        <?php
        }
        ?>
        
       
       

</div>
   <div class="clearfix"></div> 



   <!-- modal pengesahan pembetulan-->         
    
 <div id="betul" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
 <h4 id="myModalLabel">Mesej Pengesahan</h4></div>
 <div class="modal-body"><p>Adakah anda ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi.</p></div>
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

                       ?>
                       <?php
                       $hantar= array(
                           'name'    => 'betul',
                           'id'      => 'betul',
                           'class'   => 'btn btn-info',
                           'value'   => 'betul',
                           'type'    => 'Submit',
                           'content' => 'Ya'
                       );

                       echo form_button($hantar);

                       ?>                       
                           </div>
                    <!--/.END button--></div>
  <!-- modal -->


<!-- modal pengesahan lulus-->         
    
 <div id="lulus" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
 <h4 id="myModalLabel">Mesej Pengesahan</h4></div>
 <div class="modal-body"><p>Adakah anda ingin meluluskan PSPA(O) awal ini?</p></div>
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

                       ?>
                       <?php
                       $lulus= array(
                           'name'    => 'lulus',
                           'id'      => 'lulus',
                           'class'   => 'btn btn-info',
                           'value'   => 'lulus',
                           'type'    => 'Submit',
                           'content' => 'Ya'
                       );

                       echo form_button($lulus);

                       ?>                       
                           </div>
                    <!--/.END button--></div>
<!-- modal -->


                
           <?php  echo form_close();?>
              </div>
            </div>

          </div>
          
         

        </div>
