

<div id="simpan" class="widget" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-header">

 <h4 id="myModalLabel">Mesej </h4></div>
 <div class="modal-body"><p><?php echo $msg; ?></p>
     
   
 <?php if(!empty($detail_msg) ){
     //{ echo'' ?>

 <p>Kategori:  <?php echo $detail_msg['kategori']  ?></p>
 <p>Tahun Awal: <?php echo $detail_msg['tahun_mula']  ?></p>
 <p>Tahun Akhir: <?php echo $detail_msg['tahun_akhir']  ?></p>
 <p>Kepada: <?php if($get_namauserr = $this->function_model->get_namauser($detail_msg['pspa_semak_oleh_id'])) 
                        foreach ($get_namauserr as $row) 
                          echo $row->nama_user;  ?></p>

     <?php }?>
 </div>
 <!--button-->
  <div class="modal-footer">
      <a href="<?php echo site_url($link); ?>">
  <?php
                       $batal = array(
                           'name'    => '',
                           'id'      => '',
                           'class'   => 'btn btn-primary input-top-margin',
                           'value'   => '',
                           'type'    => 'button',
                           'content' => 'Ok',
                           
                       );

                       echo form_button($batal);

                       ?>
                        </a>
                           </div>
                    <!--/.END button--></div>
  <!-- modal -->