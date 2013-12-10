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
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <br />
    <!-- breadcrumb END -->
    









    <!-- tab navigation START --> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
  


    <?php
      $attributes = array('class' => 'form-horizontal no-margin','name'  => 'summary_pp_ptra','id'    => 'summary_pp_ptra');
      echo form_open('ptra/summary_pp_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes);
    ?>





  <!-- tab section START -->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
    




      <!-- main container START -->
      <div class="main-container">

        


          <!-- panel 1 START -->  
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                    </span> Pelan Penerimaan Aset (PTRA)
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
                              echo  form_input(array( 'name'    => 'namakem', 
                                                      'value'   => $rr->namakem,
                                                      'disabled'=>'disabled',
                                                      'class'   => 'input-xlarge required'));
                        ?> 
                      </div>
                    </div> 


                    <div class="control-group">
                      <label class="control-label">
                        Jabatan/Agensi
                      </label>
                      <div class="controls">
                        <?php if($get_namajab_agensi = $this->ptra_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr)
                              echo form_input(array('name'    => 'namajab_agensi', 
                                                    'value'   => $rr->nama_jab_agensi,
                                                    'disabled'=>'disabled',
                                                    'class'   => 'input-xlarge required'));
                        ?> 
                      </div>
                    </div>


                    <div class="control-group">
                      <label class="control-label">
                        Premis
                      </label>
                      <div class="controls">
                        <?php echo form_input(array('name'    => 'nama_premis', 
                                                    'disabled'=>'disabled',
                                                    'value'   => $rec->nama_premis,
                                                    'class'   => 'input-xlarge required'));
                        ?> 
                      </div>
                    </div>


                    <div class="control-group">
                      <label class="control-label">
                        No DPA
                      </label>
                      <div class="controls">
                        <?php echo form_input(array('name'    => 'nodpa', 
                                                    'disabled'=>'disabled',
                                                    'value'   => $rec->nodpa,
                                                    'class'   => 'input-xlarge required'));
                        ?> 
                      </div>
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
                  </span> Sila Kemaskini Maklumat Pra Pendaftaran Premis
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
                        <th style="width:25%" class="hidden-phone">Nama Borang</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                        <th style="width:8%" class="hidden-phone">Status</th>
                      </tr>
                    </thead>


                    <tbody>
                      <tr>
                        <td>
                          <span class="name">
                            1.0
                          </span>
                        </td>

                        <td class="hidden-phone">
                          Pra Pendaftaran Premis
                        </td>

                        <td class="hidden-phone"> 
                          <a href="<?php echo site_url('ptra/status_premis_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">                      
                            <ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
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
                  <!-- table END --> 


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
                        <th style="width:25%" class="hidden-phone">Kandungan</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                        <th style="width:8%" class="hidden-phone">Status</th>
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
                          <a href="#myModal<?php echo $dat->kandungan_id ?>" data-toggle="modal">
                            <ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
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
                      
                      <?php echo return_modal($dat->kandungan_id, $dat->kand_utama , $bondy) ?>

                      <?php 
                      } 
                      ?>



                    </tbody>
                  </table>
                  <!-- table END --> 


                  <?php echo form_hidden('countarray',count($kand_utama_bil)); ?>

                  <?php ///////// body utama /////////// ?>

                  <div class="clearfix">
                  </div>     


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
                        <th style="width:25%" class="hidden-phone">Nama Borang</th>
                        <th style="width:8%" class="hidden-phone">Tindakan</th>
                        <th style="width:8%" class="hidden-phone">Status</th>
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
                          Model Struktur Organisasi Penerimaan Aset Di Premis
                        </td>

                        <td class="hidden-phone">                       
                          <a href="<?php echo site_url('ptra/model_struktur_ptra_editpp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                       
                            <ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
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



                      <tr>
                        <td>
                          <span class="name">
                            2
                          </span>
                        </td>
                        
                        <td class="hidden-phone">
                          Skop Dan Aktiviti Penerimaan Aset
                        </td>
                        
                        <td class="hidden-phone">                         
                          <a href="<?php echo site_url('ptra/skop_aktiviti_ptra_editpp/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">                         
                            <ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
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




                      <tr>
                        <td>
                          <span class="name">
                            3
                          </span>
                        </td>

                        <td class="hidden-phone">
                          Format Analisis Keperluan Sumber Aktiviti Penerimaan Aset
                        </td>

                        <td class="hidden-phone">                         
                          <a href="<?php echo site_url('ptra/skop_aktiviti_ptra_editpp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                        
                            <ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
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




                      <tr>
                        <td>
                          <span class="name">
                            4
                          </span>
                        </td>

                        <td class="hidden-phone">
                          Kawalan Rekod Penerimaan Aset
                        </td>

                        <td class="hidden-phone">                         
                          <a href="<?php echo site_url('ptra/kawalan_rekod_ptra_editpp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                        
                            <ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
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
                      



                      <tr>
                        <td>
                          <span class="name">
                            5
                          </span>
                        </td>

                        <td class="hidden-phone">
                          Dokumen Rujukan
                        </td>

                        <td class="hidden-phone">                         
                          <a href="<?php echo site_url('ptra/dokumen_rujukan_ptra_editpp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                         
                            <ul class="icomoon-icons-container">
                              <li class="rounded">
                                <span class="fs1" aria-hidden="true" data-icon="&#xe026;">
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
                  <!-- table END --> 


                </div>
                <!-- table section END -->


            </div>
          </div>
        </div>
        <!-- panel 4 END -->






        
        <!-- panel 5 START -->  
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
                    <textarea class="input-block-level" placeholder="Ulasan ..." style="height: 100px">
                    </textarea>
                  </div>
                </div>    
              
              </div>
            </div>
          </div>
        <!-- panel 5 END -->





   	    <!-- buttons START --> 
        <div class="next-prev-btn-container pull-right">
             
          <a href="<?php echo site_url(); ?>/ptra/senarai_ppd_ptra/<?php echo $this->uri->segment(3);?>">    
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
            if($statusid !=6)
              { 
          ?>

                <a type="button" class="btn btn-info input-top-margin" href="#betul" data-toggle="modal">
                  Pembetulan
                </a>
                <a type="button" class="btn btn-success" href="#lulus" data-toggle="modal">
                  Lulus
                </a>   
          <?php
              }
          ?>
        

        </div>

        <div class="clearfix">
        </div> 
        <!-- buttons END --> 
      






<!-- modal pengesahan pembetulan START -->         
    
 <div id="betul" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
      ×
    </button>
    <h4 id="myModalLabel">
      Mesej Pengesahan
    </h4>
  </div>
 
  <div class="modal-body">
    <p>
      Adakah anda ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi.
    </p>
  </div>
 

        <!-- button START -->
        <div class="modal-footer">
          <?php
            $batal = array(
                           'name'        => '',
                           'id'          => '',
                           'class'       => 'btn btn-danger input-top-margin',
                           'value'       => '',
                           'type'        => 'button',
                           'content'     => 'Tidak',
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







<!-- modal pengesahan lulus START -->         
    
 <div id="lulus" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
      ×
    </button>
    <h4 id="myModalLabel">
      Mesej Pengesahan
    </h4>
  </div>

  <div class="modal-body">
    <p>
      Adakah anda ingin meluluskan PSPA(O) awal ini?
    </p>
  </div>
 

       <!-- button START -->
        <div class="modal-footer">
          <?php
            $batal = array(
                           'name'        => '',
                           'id'          => '',
                           'class'       => 'btn btn-danger input-top-margin',
                           'value'       => '',
                           'type'        => 'button',
                           'content'     => 'Tidak',
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
        <!-- button END -->

          
  </div>
<!-- modal pengesahan lulus END -->





      <?php  echo form_close();?>





      </div>  
      <!-- main container END -->  


    </div>                  
  </div>
  <!-- tab section END -->


</div>  
<!-- tab navigation END -->

    



