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





<!-- breadcrumb START -->
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
    <br />
    <!-- breadcrumb END -->

     


<!-- tab START -->
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
$attributes = array('class' => 'form-horizontal no-margin','name'  => 'summary_pnpa','id'    => 'summary_pnpa');
echo form_open('pnpa/summary_pnpa/'.$this->uri->segment(3),$attributes);
?>
          


          
         
  <!-- tab section START -->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">



    
      <!-- main container END -->
      <div class="main-container">




         <!-- panel 1 START -->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                    </span> Pelan Penilaian Keadaan/Prestasi Aset (PNPA)
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
         <!-- panel 1 END -->





    <!-- panel 2 START -->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Sila Kemaskini Maklumat Berikut</div>
              </div>




                <!-- table section START -->              
                <div class="widget-body"> 



              <!-- table START -->
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


                        <td class="hidden-phone">
                          <a href="#myModal<?php echo $dat->kandungan_id ?>" data-toggle="modal">
                            <ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
                                </span></li></ul></a></td>  


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
        <!-- table END --> 




				<?php 
					//echo form_hidden($kand_utama_bil); 
					//print_r($kand_utama_bil);
					echo form_hidden('countarray',count($kand_utama_bil)); 
                ?>

<?php ///////// body utama /////////// ?>



        <div class="clearfix"></div>                                                                                               
            </div>
                <!-- table section END -->



            </div>
          </div>
        </div>
        <!-- panel 2 END -->






              
        <!-- panel 3 START -->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Sila Kemaskini Borang Berikut</div>
              </div>




                <!-- table section START -->              
                <div class="widget-body">



              <!-- table START -->
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
                        <td class="hidden-phone">
                          <a href="<?php echo site_url('pnpa/model_struktur_pnpa_edit_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                       
                        <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
                          </span></li></ul></a> 
                      </td>
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                    
                      </tr>


                      <tr>
                        <td>
                          <span class="name">
                            2</span></td>
                        <td class="hidden-phone">Skop dan Aktiviti Penilaian Aset (JKR.PATA.F8/1b)</td>
                        <td class="hidden-phone">
                          <a href="<?php echo site_url('pnpa/skop_aktiviti_pnpa_edit_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
                          </span></li></ul></a>
                        </td>
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>
                      </tr>


                      <tr>
                        <td>
                          <span class="name">
                            3</span></td>
                        <td class="hidden-phone">Format Analisis Keperluan Sumber Aktiviti Penilaian Aset (JKR.PATA.F8/1c)</td>
                        <td class="hidden-phone">
                         <a href="<?php echo site_url('pnpa/skop_aktiviti_pnpa_edit_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                        
                        <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
                          </span></li></ul></a> 
                      </td>
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                   
                      </tr>


                      <tr>
                        <td>
                          <span class="name">
                            4</span></td>
                        <td class="hidden-phone">Kawalan Rekod Penilaian Aset (JKR.PATA.F8/1d)</td>
                        <td class="hidden-phone">
                         <a href="<?php echo site_url('pnpa/kawalan_rekod_pnpa_edit_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                        
                        <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
                          </span></li></ul></a> 
                      </td>
                        <td class="hidden-phone">
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                  
                      </tr>


                      <tr>
                        <td>
                          <span class="name">
                            5</span></td>
                        <td class="hidden-phone">Dokumen Rujukan (JKR.PATA.F8/1e)</td>
                        <td class="hidden-phone">
                          <a href="<?php echo site_url('pnpa/dokumen_rujukan_pnpa_edit_pof/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                         
                        <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
                          </span></li></ul></a>
                      </td>
                        <td class="hidden-phone">  
                          <span class="badge badge-success">
                            Lengkap
                          </span>
                        </td>                   
                      </tr>


                    </tbody>
                  </table>
                  <!-- table END -->



            </div>
                <!-- table section END -->



            </div>
          </div>
        </div>
        <!-- panel 3 END -->




        
        <!-- panel 4 START -->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                    </span> Ulasan
                  </div>
                </div>
                <div class="widget-body">
                 
                      <div class="controls">
                        <textarea class="input-block-level" placeholder="Ulasan ..." style="height: 100px"></textarea>
                      </div>
                    
                </div>
              </div>
            </div>
         </div>
         <!-- panel 4 END -->





      
 
   				<!-- buttons START --> 
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



                <?php //if($statusid !=2 && $statusid !=4 && $statusid !=6){ ?>
        <a type="button" class="btn btn-info input-top-margin" href="#betul" data-toggle="modal">Pembetulan</a>
    
    
 <a type="button" class="btn btn-success" href="#sah" data-toggle="modal">Sah</a>        
   
</div>
   <div class="clearfix"></div> 
   <!-- buttons END -->   





   <!-- modal pengesahan pembetulan START -->         
    
 <div id="betul" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
 <h4 id="myModalLabel">Mesej Pengesahan</h4></div>
 <div class="modal-body"><p>Adakah anda ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi.</p></div>
 

 <!-- button START -->
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
  <!-- button END -->


                  </div>
  <!-- modal pengesahan pembetulan END -->







<!-- modal pengesahan sah START -->         
    
 <div id="sah" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
 <h4 id="myModalLabel">Mesej Pengesahan</h4></div>
 <div class="modal-body"><p>Adakah anda ingin mengesahkan PNPA ini?</p></div>
 

 <!-- button START -->
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
                       $sah= array(
                           'name'    => 'sah',
                           'id'      => 'sah',
                           'class'   => 'btn btn-info',
                           'value'   => 'sah',
                           'type'    => 'submit',
                           'content' => 'Ya'
                       );

                       echo form_button($sah);

                       ?>                       
                           </div>
  <!-- button END -->


                  </div>
<!-- modal pengesahan sah END -->





                   <?php  echo form_close();?>

  </div>
            </div>

          </div>
          
         

        </div>

        




