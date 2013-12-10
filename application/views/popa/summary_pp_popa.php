<style>
  .wysiwyg-container
  {
    padding-bottom:16px;
    padding-top:4px;
  }    

  .modal
  {
    width: 760px !important;
    margin-left: -380px !important;
  }
</style>






<?php

  function return_modal($ids,$tajuk,$body)
  {
    echo 
    '
      <!-- Modal //xdok modal doh tu -->
      <div id="myModal'.$ids.'" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModal'.$ids.'Label" aria-hidden="true">
    ';

    echo 
    '
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
    echo 
    '
            <div class="wysiwyg-container">
              <textarea id="nowucme'.$ids.'" name ="kand_detail[]" class="input-block-level" readonly="readonly" style="height: 80px">
                '.$body.'
              </textarea>
            </div>
    ';
    /////////////////// body sini //////////////////



    echo 
    '
            </p>
          </div>
                    
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">
              Tutup
            </button>
    ';


    echo 
    '
          </div>
    ';


    echo 
    '
        </div>
      </div>
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
<?php if(!empty($tab)) { echo $tab;} ?>
     
     
     <?php
$attributes = array('class' => 'form-horizontal no-margin','name'  => 'summary_pp_popa','id'    => 'summary_pp_popa');
echo form_open('pnpa/summary_pp_popa/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes);
?>

        <!-- panel 1 START -->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                  </span> Pelan Operasi dan Penyenggaraan Aset (POPA)
                </div>
              </div>
              

              <?php if (!empty($senarai_popa)) : foreach ($senarai_popa as $rec) : ?>
                



              <div class="widget-body">
                <form class="form-horizontal no-margin">
                  



                  <div class="control-group">
                    <label class="control-label" for="tahun">
                      Tahun
                    </label>
                    
                    <div class="controls">
                         
                      <?php echo form_input(array('name'    => 'tahun', 
                                                  'value'   => $rec->tahun,
                                                  'disabled'=>'disabled',
                                                  'class'   => 'input-xlarge required'
                                                 ));
                      ?>     
                    
                    </div>
                  </div>
                  
                    




                  <div class="control-group">
                    <label class="control-label">
                      Kementerian
                    </label>
              
                    <div class="controls">
                      
                      <?php if($get_namakem = $this->popa_model->get_namakem($rec->idkem)) foreach ($get_namakem as $rr)
                        
                        echo  form_input(array( 'name'    => 'namakem', 
                                                'value'   => $rr->namakem,
                                                'disabled'=>'disabled',
                                                'class'   => 'input-xlarge required'
                                              ));
                      ?>

                    </div>
                  </div>                   
                    




                  <div class="control-group">
                    <label class="control-label">
                      Jabatan/Agensi
                    </label>
            
                    <div class="controls">
                      
                      <?php  if($get_namajab_agensi = $this->popa_model->get_namajab_agensi($rec->idjab_agensi)) foreach ($get_namajab_agensi as $rr)
                                            
                        echo form_input(array('name'    => 'namajab_agensi', 
                                              'value'   => $rr->nama_jab_agensi,
                                              'disabled'=>'disabled',
                                              'class'   => 'input-xlarge required'
                                             ));
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
                                                  'class'   => 'input-xlarge required'
                                                 ));
                      ?> 

                    </div>
                  </div>
                  




                  <div class="control-group">
                    <label class="control-label">
                      No DPA
                    </label>
          
                    <div class="controls">
                      
                      <?php echo form_input(array('name'  => 'nodpa', 
                                                  'disabled'=>'disabled',
                                                  'value' => $rec->nodpa,
                                                  'class' => 'input-xlarge required'
                                                 ));
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
                      <tbody>
                    
                        <?php $kand_utama_bil = array(); ?>
                        
                        <?php foreach ($rows as $dat)
                          { 
                        ?> 

                        <?php
                            echo 
                            '
                              <input type="hidden" name="kand_id[]" value="'.$dat->kandungan_id.'">
                            '
                        ?>            
                      


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
                                echo 
                                '
                                  &nbsp;&nbsp;
                                '
                                .$dat->node_type.'.'.number_format($dat->kand_utama_bil, 1);
                              }
                        ?>
                        
                            </span>
                          </td>




                          <td class="hidden-phone">
                        
                        <?php 
                                echo $dat->kand_utama 
                        ?>
                        
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
                        <td class="hidden-phone">Model Struktur Operasi dan Penyenggaraan Aset (JKR.PATA.F7/1a)</td>
                        <td class="hidden-phone"><a href="<?php echo site_url('popa/model_struktur_popa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                       
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
                        <td class="hidden-phone">Skop dan Aktiviti Operasi dan Penyenggaraan Aset(JKR.PATA.F7/1b)</td>
                        <td class="hidden-phone"><a href="<?php echo site_url('popa/skop_aktiviti_popa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4))?>">                         
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
                        <td class="hidden-phone">Format Analisis Keperluan Sumber Aktiviti Operasi dan Penyenggaraan Aset (JKR.PATA.F7/1c)</td>
                        <td class="hidden-phone"> <a href="<?php echo site_url('popa/skop_aktiviti_popa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                        
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
                        <td class="hidden-phone">Kawalan Rekod Operasi dan Penyenggaraan Aset (JKR.PATA.F7/1d)</td>
                        <td class="hidden-phone"> <a href="<?php echo site_url('popa/kawalan_rekod_popa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                        
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
                        <td class="hidden-phone">Dokumen Rujukan Operasi dan Penyenggaraan Aset (JKR.PATA.F7/1e)</td>
                        <td class="hidden-phone"><a href="<?php echo site_url('popa/dokumen_rujukan_popa_edit_pp/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>">                         
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
             
        <a href="<?php echo site_url(); ?>/popa/senarai_ppd_popa/<?php echo $this->uri->segment(3);?>">    
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
 <div class="modal-body"><p>Adakah anda ingin meluluskan Pelan Tahunan ini?</p></div>
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
.