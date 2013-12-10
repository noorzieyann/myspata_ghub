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


function return_modal($ids,$tajuk,$body,$x,$y){

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
echo '<div class="wysiwyg-container"><textarea id="nowucme'.$ids.'" name ="kand_detail[]" class="input-block-level" style="height: 80px">'.$body.'</textarea></div>';
/////////////////// body sini //////////////////

echo '
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button class="btn" data-dismiss="modal" aria-hidden="true">
                        Tutup
                      </button>';
echo form_submit('hantar', 'Sunting','class="btn btn-warning2"');
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
                        Perancangan
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
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->

     <br />
<?php if(!empty($tab)) { echo $tab;} ?>

    <!-- status info START -->
    <div class="alert alert-block alert-info fade in">
      <button data-dismiss="alert" class="close" type="button">
        ×
      </button>


      <?php 
        $lengkap=0;
        $status=0;
        $kand_utama_bil = array();

        foreach ($rows as $leng)
        { 
          echo '<input type="hidden" name="kand_id[]" value="'.$leng->kandungan_id.'">';  

          if($leng->kand_utama_detail != NULL)
          { 
            $lengkap++;
          }   

        }


        if($this->ptra_model->get_status_summary($this->uri->segment(4)))
        { 
          $lengkap++;
        }


        if($this->ptra_model->get_status_summary2($this->uri->segment(4)))
        {
          $lengkap = $lengkap+2;
        }


        if($this->ptra_model->get_status_summary3($this->uri->segment(4)))
        {
          $lengkap++;
        }


        if($this->ptra_model->get_status_summary4($this->uri->segment(4)))
        { 
          $lengkap++;
        }





        $status = ($lengkap/12) * 100;

        $status = number_format($status);

      ?>






      <h5 style="color:#FF0000"><?php echo $status.'%'; ?>
        <a class="alert-heading">dokumen ini telah dilengkapkan</a>
      </h5>
    </div>
    
    <?php if($ulasan<>''){ ?>
            
      <!-- status START -->
        <div class="alert alert-block alert-warning fade in">
          <button data-dismiss="alert" class="close" type="button">
            ×
          </button>
          <h5 style="color:#FF0000">Ulasan : 
            <a class="alert-heading">
              <?php echo $ulasan; ?>
            </a>
          </h5>
        </div>
        <!-- status END -->
    

    <?php }?>
    <!-- status info END -->
    
         <!--panel 1-->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penerimaan Aset (PTRA)
                  </div>
                </div>
                  <?php if (!empty($senarai_ptra)) : foreach ($senarai_ptra as $rec) : ?>
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
                          <?php if($get_namakem = $this->ptra_model->get_namakem($rec->idkem)) foreach ($get_namakem as $rr)
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
                     <?php  if($get_namajab_agensi = $this->ptra_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr)
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

<?php
$attributes = array('class' => 'form-horizontal no-margin','name'  => 'summary_ptra','id'    => 'summary_ptra');
echo form_open('ptra/summary_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes);
?>
    
<!--panel 1-->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Kemaskini Maklumat Pra Pendaftaran Premis</div>
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
                            1.0</span>
                        </td>

                <td class="hidden-phone">
                    Pra Pendaftaran Premis
                  </td>
                  

                  <td class="hidden-phone">
                    <a data-original-title="kemaskini" href="<?php echo site_url('ptra/status_premis_ptra/'.$this->uri->segment(3))?>">                      
                      <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;">
                          </span>
                        </li>
                      </ul>
                    </a>  

                                  
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
        <!--/.END panel 1-->

    <!-- panel 2 START -->  
    <div class="row-fluid">
      <div class="span12">
        <div class="widget">
          <div class="widget-header">
            <div class="title">
              <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
              </span> Sila Kemaskini Maklumat Berikut
            </div>
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
                  <th style="width:25%" class="hidden-phone">
                    Kandungan
                  </th>
                  <th style="width:8%" class="hidden-phone">
                    Tindakan
                  </th>
                  <th style="width:8%" class="hidden-phone">
                    Status
                  </th>
                </tr>
              </thead>
                    

              <tbody>
                    
                <?php $kand_utama_bil = array(); ?>
                
                <?php foreach ($rows as $dat)
                { 
                ?>	
                  <?php echo '<input type="hidden" name="kand_id[]" value="'.$dat->kandungan_id.'">'?>						
                      
                    <tr>
                      <td>
                        <span class="name">
		
            				      <?php
                        
                            //echo number_format($dat->kand_utama_bil, 1);
						        		
                            if($dat->node_type == 1)
                            {
								              echo number_format($dat->kand_utama_bil, 1);
								            }

                            else
                            {
								              echo '&nbsp;&nbsp;'.$dat->node_type.'.'.number_format($dat->kand_utama_bil, 1);
								            }
							         
                          ?>
                      
                        </span>
                      </td>
              
                      <td class="hidden-phone">
                        <?php echo $dat->kand_utama ?>
                      </td>
                      
                      <td class="hidden-phone">
                        <a data-original-title="kemaskini" href="#myModal<?php echo $dat->kandungan_id ?>" data-toggle="modal">
                          <ul class="icomoon-icons-container">
                            <li class="rounded">
                              <span class="fs1" aria-hidden="true" data-icon="&#xe005;">
                              </span>
                            </li>
                          </ul>
                        </a>
                      </td>               
                        
                      <td class="hidden-phone">
                        
                        <?php 
                          if($dat->kand_utama_detail != NULL)
                          { 
                        ?>
                        	
                            <span class="badge badge-success">
                              Lengkap
                            </span>
                        
                        <?php 
                          }

                          else
                          { 
                        ?>
                        	
                            <span class="badge">
                              Deraf
                            </span>
                        
                        <?php 
                          } 
                        ?>
                        
                      </td>                    
                    </tr>
                      
                
                    <?php $bondy = $dat->kand_utama_detail;
                  
                      if($this->input->post('kand_detail_'.$dat->kandungan_id) !=NULL)
                      {
				                $bondy = $this->input->post('kand_detail_'.$dat->kandungan_id);
						          }
				            ?>
                      
                    <?php echo return_modal($dat->kandungan_id, $dat->kand_utama , $bondy,$dat->kand_type,$dat->kand_form,$dat->kand_type,$dat->kand_form) ?>

					       
                <?php 
                }
                ?>
                    
              </tbody>
            </table>
            <!-- table END --> 


				    <?php 
				      //echo form_hidden($kand_utama_bil); 
		          //print_r($kand_utama_bil);
					     
              echo form_hidden('countarray',count($kand_utama_bil)); 
            ?>


            <?php ///////// body utama /////////// ?>
        
            <div class="clearfix">
            </div>                                                                                               
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
              </span> Sila Kemaskini Borang Berikut
            </div>
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
                  <th style="width:25%" class="hidden-phone">
                    Nama Borang
                  </th>
                  <th style="width:8%" class="hidden-phone">
                    Tindakan
                  </th>
                  <th style="width:8%" class="hidden-phone">
                    Status
                  </th>
                </tr>
              </thead>
  

              

              <tbody>
                <tr>
                  <td>
                    <span class="name">
                      1
                    </span>
                  </td>
                  

                  <td class="hidden-phone">
                    Model Struktur Penerimaan Aset di Premis (JKR.PATA.F6/1a)
                  </td>
                  

                  <td class="hidden-phone">
                    <a data-original-title="kemaskini" href="<?php echo site_url('ptra/model_struktur_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                       
                      <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;">
                          </span>
                        </li>
                      </ul>
                    </a>                
                    
                    
                    <td class="hidden-phone">

                      <?php

                          if($this->ptra_model->get_status_summary($this->uri->segment(4)))
                          { 
                      ?>
                    
                            <span class="badge badge-success">
                              Lengkap
                            </span>


                      <?php 
                          }

                          else
                          { 
                      ?>

                            <span class="badge">
                              Deraf
                            </span>

                      <?php 
                        } 
                      ?>

                    </td>                    
                  </td>

                </tr>
                







                <tr>
                  <td>
                    <span class="name">
                      2
                    </span>
                  </td>
                  <td class="hidden-phone">
                    Skop dan Aktiviti Penerimaan Aset (JKR.PATA.F6/1b)
                  </td>
                  <td class="hidden-phone">
                    <a data-original-title="kemaskini" href="<?php echo site_url('ptra/treeview_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/edit') ?>">                         
                      <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;">
                          </span>
                        </li>
                      </ul>
                    </a>
                    
                    <td class="hidden-phone">
                      <?php

                          if($this->ptra_model->get_status_summary2($this->uri->segment(4)))
                          { 
                      ?>
                    
                            <span class="badge badge-success">
                              Lengkap
                            </span>


                      <?php 
                          }

                          else
                          { 
                      ?>

                            <span class="badge">
                              Deraf
                            </span>

                      <?php 
                        } 
                      ?>
                    </td>
                  </td>
                </tr>
                








                <tr>
                  <td>
                    <span class="name">
                      3
                    </span>
                  </td>
                  
                  <td class="hidden-phone">
                    Format Analisis Keperluan Sumber Aktiviti Penerimaan Aset (JKR.PATA.F6/1c)
                  </td>
                  
                  <td class="hidden-phone"> 
                    <a data-original-title="kemaskini" href="<?php echo site_url('ptra/treeview_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/edit') ?>">                        
                      <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;">
                          </span>
                        </li>
                      </ul>
                    </a> 
    
                    <td class="hidden-phone">
                      <?php

                          if($this->ptra_model->get_status_summary2($this->uri->segment(4)))
                          { 
                      ?>
                    
                            <span class="badge badge-success">
                              Lengkap
                            </span>


                      <?php 
                          }

                          else
                          { 
                      ?>

                            <span class="badge">
                              Deraf
                            </span>

                      <?php 
                        } 
                      ?>
                    </td>                   
                  </td>
                </tr>









                <tr>
                  <td>
                    <span class="name">
                      4
                    </span>
                  </td>
    
                  <td class="hidden-phone">
                    Kawalan Rekod Penerimaan Aset (JKR.PATA.F6/1d)
                  </td>
              
                  <td class="hidden-phone"> 
                    <a data-original-title="kemaskini" href="<?php echo site_url('ptra/kawalan_rekod_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                       
                      <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;">
                          </span>
                        </li>
                      </ul>
                    </a>  
                        
                    <td class="hidden-phone">
                        
                        <?php 
                          if($this->ptra_model->get_status_summary3($this->uri->segment(4)))
                          { 
                        ?>
                          
                            <span class="badge badge-success">
                              Lengkap
                            </span>
                        
                        <?php 
                          }

                          else
                          { 
                        ?>
                          
                            <span class="badge">
                              Deraf
                            </span>
                        
                        <?php 
                          } 
                        ?>
                        
                      </td>              
                  </td>
                </tr>
 

                <tr>
                  <td>
                    <span class="name">
                      5
                    </span>
                  </td>
                        
                  <td class="hidden-phone">
                    Dokumen Rujukan (JKR.PATA.F6/1e)
                  </td>
      
                  <td class="hidden-phone">
                    <a data-original-title="kemaskini" href="<?php echo site_url('ptra/dokumen_rujukan_ptra_editppd/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                         
                      <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe005;">
                          </span>
                        </li>
                      </ul>
                    </a>
                    
                    <td class="hidden-phone">  
                      <?php

                          if($this->ptra_model->get_status_summary4($this->uri->segment(4)))
                          { 
                      ?>
                    
                            <span class="badge badge-success">
                              Lengkap
                            </span>


                      <?php 
                          }

                          else
                          { 
                      ?>

                            <span class="badge">
                              Deraf
                            </span>

                      <?php 
                        } 
                      ?>
                    </td>                   
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

  
        
  <div class="next-prev-btn-container pull-right">
             	<?php //echo form_hidden('alasanbelaka','') ?>
                <a type="button" class="btn btn-danger" href="<?php echo site_url('ptra/senarai_ppd_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>" data-toggle="modal">Batal</a>
                 <?php //if(!empty ($statusid)){ ?>
                 <?php if($statusid !=2 && $statusid !=4 && $statusid !=6){?>
                 <?php //if($statusid*1 !=6){ ?>
                <a type="button" class="btn btn-warning2" href="#simpan" data-toggle="modal">Simpan Deraf</a>
                <a type="button" class="btn btn-success" href="#hantar" data-toggle="modal">Hantar</a> 
                <?php } ?>
                <?php //} ?>
             </div> 
                   
    </div>                  
  </div>

    </div> 
     
     <!-- modal pengesahan simpan deraf-->         
    
<div id="simpan" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
<h4 id="myModalLabel">Mesej Pengesahan</h4></div>
<div class="modal-body"><p>Adakah anda ingin menyimpan deraf Pelan Tahunan ini?</p></div>
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
<div class="modal-body"><p>Adakah anda ingin menghantar Pelan Tahunan ini?</p></div>
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
                           'name'    => 'hantar',
                           'id'      => 'hantar',
                           'class'   => 'btn btn-info',
                           'value'   => 'hantar',
                           'type'    => 'Submit',
                           'content' => 'Ya'
                       );

                       echo form_button($hantar);

                       ?>                       
                           </div>
    <!--/.END button-->
</div>
<!-- modal -->
               

</div>
<?php echo form_close(); ?>