   <?php

$kand_utama_bil = array(
  'kand_utama_bil[0]'=>'1',
  'kand_utama_bil[1]'=>'2',
  'kand_utama_bil[2]'=>'3',
  'kand_utama_bil[3]'=>'4',
  'kand_utama_bil[4]'=>'5',
  'kand_utama_bil[5]'=>'6'
);
$kand_utama = array(
  'kand_utama[0]'=>'Pendahuluan',
  'kand_utama[1]'=>'Visi Pengurusan Aset Tak Alih',
  'kand_utama[2]'=>'Misi Pengurusan Aset Tak Alih',
  'kand_utama[3]'=>'Objektif Pengurusan Aset Tak Alih',
  'kand_utama[4]'=>'Skop Kategori dan Fungsi Aset',
  'kand_utama[5]'=>'Penetapan Polisi Pengurusan Aset (Operasi) Serta Output'
);

$sessionarray = $this->session->all_userdata();
$kand_id = array();
$kand_detail = array();


if($this->uri->segment(3) != NULL){
  foreach($this->pspao_model->get_pspao_awal_from_segment($this->uri->segment(3)) as $row){
      $kand_id[] = $row->kandungan_id;
      $kand_detail[] = $row->kand_utama_detail;
  }
  $tahun_mula = $row->tahun_mula;
  $tahun_akhir = $row->tahun_akhir;
  $kementerian = $this->pspao_model->get_kementerian_name($row->idkem);

}else{
  
  $kand_detail = array(
    'Menerangkan secara umum fungsi dan organisasi kementerian/ jabatan/ agensi serta struktur PATA dalam organisasi.',
    'Menetapkan hala tuju, fokus dan sasaran kecemerlangan PATA kementerian/ jabatan/ agensi pada masa akan datang.',
    'Menetapkan tindakan - tindakan strategik untuk mencapai visi kementerian/ jabatan/ agensi.',
    'Menjelaskan matlamat aset mengikut keperluan dan kehendak kementerian/ jabatan/ agensi.',
    '',
    ''
  );
  $tahun_mula = '';
  $tahun_akhir = '';
  $kementerian = $this->pspao_model->get_kementerian_name($sessionarray['user_kemid']);;
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
                        Permintaan Penyediaan
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        PSPA(O) Awal
                      </a>   
                    </li>
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  

    <?php 
  $form_name = 'pspao_awal/pspao_baru';
  if($this->uri->segment(3) != NULL){$form_name = 'pspao_awal/pspao_baru/'.$this->uri->segment(3);}
  $attributes = array('class' => 'form-horizontal no-margin', 'id' => 'pspao_baru');
  echo form_open($form_name, $attributes);
   ?>

   <?php 

  echo form_hidden($kand_utama_bil);
  echo form_hidden($kand_utama);
  $sunting = array('sunting'=>NULL);
  if($this->uri->segment(3) != NULL){
    $sunting = array('sunting'=>$this->uri->segment(3));
    echo form_hidden('kand_id',$kand_id);
  }
  echo form_hidden($sunting);

  ?>


<div class="widget-body">
     
    <div class="tab-content" id="myTabContent">
                 <div id="pspao" class="tab-pane fade active in"-->
        

                
                    <?php //echo validation_errors(); ?>
                    <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'pspao_baru',
                           'id' => 'pspao_baru',
                        );
                    echo form_open('pspao_awal/pspao_baru',$attributes); ?>


          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Permintaan Penyediaan  PSPA(O) Awal
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
 
                     
                      <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Mula
                      </label>
                      <div class="controls controls-row">
                     <?php echo form_error('tahun_mula'); ?> 
                        <?php
                          if($this->input->post('tahun_mula') !=NULL){
                            $tahun_mula = $this->input->post('tahun_mula');
                          }

                          ?> 
                    <?php echo form_dropdown('tahun_mula', $year_list,$tahun_mula, 'id="tahun_mula"','class="span4 input-left-top-margins"')?>

                     
                      </div>
                      </div>
                  
                  
                    <div class="control-group">

                      <label class="control-label" for="DateOfBirthMonth">
                         Tempoh Akhir
                      </label>
                      <div class="controls controls-row">
                      <div class="error"> 
                        <?php echo form_error('tahun_akhir'); ?> 
                         <?php
                          if($this->input->post('tahun_akhir') !=NULL){
                            $tahun_akhir = $this->input->post('tahun_akhir');
                          }

                          ?> 
                         <?php echo form_dropdown('tahun_akhir', $year_list,$tahun_akhir, 'id="tahun_akhir"','class="span4 input-left-top-margins"')?>

                    
                      </div>
                      </div>
                    </div>
                      
                      <div class="control-group">
                        
                     <label class="control-label" for="kementerian">
                    Kementerian 
                      </label>
                      <div class="controls">
                          <?php echo form_error('kementerian'); ?> 
                          
                           
                          <?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => $kementerian,
                             'disabled'=> 'disabled',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span5',
                            'placeholder' =>  'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?>
                       
                          
                      </div>
                    </div>
                   
           
                  
                    

              </div>
            </div>

          </div>
          
         

        </div>



     <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Kandungan
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
                
                   <div class="stylish-lists">
                   

                    <label> 1.0 Pendahuluan
                    <span class="popover-pop" data-original-title="1.0 Pendahuluan" 
           data-content="Menerangkan secara umum fungsi dan organisasi kementerian/ jabatan/ agensi serta struktur PATA dalam organisasi." 
           data-placement="right" data-icon="&#xe0f7;"></span>
                     </label>
                    
                    <div class="wysiwyg-container">
                        <?php echo form_error('kand_pendahuluan'); ?>
                       <?php
                          $kand_pendahuluan = $kand_detail[0];
                          if($this->input->post('kand_pendahuluan') !=NULL){
                            $kand_pendahuluan = $this->input->post('kand_pendahuluan');
                          }
                          ?>
                         <?php 
                          $data = array(
                                    'name'        => 'kand_pendahuluan',
                                    'id'          => 'wysiwyg',
                                    'value'       => $kand_pendahuluan,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                  
                   </div>

                    <label> 2.0 Visi Pengurusan Aset Tak Alih 
                    <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menetapkan hala tuju, fokus dan sasaran kecemerlangan PATA kementerian/ jabatan/ agensi pada masa akan datang." data-placement="right"  data-icon="&#xe0f7;"></span>
                    </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('kand_visi'); ?> 
                        <?php
                          $kand_visi = $kand_detail[1];
                          if($this->input->post('kand_visi') !=NULL){
                            $kand_visi = $this->input->post('kand_visi');
                          }
                          ?>
                    <?php 
                          $data = array(
                                    'name'        => 'kand_visi',
                                    'id'          => 'wysiwyg2',
                                    'value'       => $kand_visi,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div>

                    <label> 3.0 Misi Pengurusan Aset Tak Alih
                    <span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Menetapkan tindakan - tindakan strategik untuk mencapai visi kementerian/ jabatan/ agensi." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;"></span>
                    </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('kand_misi'); ?> 
                        <?php
                          $kand_misi = $kand_detail[2];
                          if($this->input->post('kand_misi') !=NULL){
                            $kand_misi = $this->input->post('kand_misi');
                          }
                          ?>

                   <?php 
                          $data = array(
                                    'name'        => 'kand_misi',
                                    'id'          => 'wysiwyg3',
                                    'value'       => $kand_misi,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div>

                    <label> 4.0 Objektif Pengurusan Aset Tak Alih
                    <span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti Penerimaan Aset" data-content="Menjelaskan matlamat aset mengikut keperluan dan kehendak kementerian/ jabatan/ agensi." data-placement="right" data-icon="&#xe0f7;"></span>
                     </label>
                    <div class="wysiwyg-container">
                        <?php echo form_error('kand_objektif'); ?> 
                         <?php
                          $kand_objektif = $kand_detail[3];
                          if($this->input->post('kand_objektif') !=NULL){
                            $kand_objektif = $this->input->post('kand_objektif');
                          }
                          ?>
                    <?php 
                          $data = array(
                                    'name'        => 'kand_objektif',
                                    'id'          => 'wysiwyg4',
                                    'value'       => $kand_objektif,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                   </div>
                    
                  
                   <div style="padding-bottom:10px">
                  <a href="#myObjektif" data-toggle="modal">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe082;"> Ukuran dan Sasaran </span>
                  </a>

                  <!-- Modal //xdok modal doh tu -->
                  <div id="myObjektif" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myObjektifLabel" aria-hidden="true">
                  <?php echo form_open('pspao_awal/pspao_baru'); ?>
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
                    		echo form_open('pspao_awal/pspao_baru',$attributes); 
						?>
						<?php include('ukuran_sasar_pspao.php'); ?>
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
                
                
               
          
              </div>
            </div>

          </div>
          
         <div class="next-prev-btn-container pull-right">
             
            
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
          
        <?php
        $simpan_deraf = array(
            'name'    => 'simpan',
            'id'      => 'simpan',
            'class'   => 'btn btn-warning2',
            'value'   => '1',
            'type'    => 'submit',
            'content' => 'Simpan Deraf'
        );

        echo form_button($simpan_deraf);
        
        ?>
        <?php
        $hantar = array(
            'name'    => 'hantar',
            'id'      => 'hantar',
            'class'   => 'btn btn-success',
            'value'   => '2',
            'type'    => 'submit',
            'content' => 'Hantar'
        );

        echo form_button($hantar);
        
        ?>
       
       

</div>
<div class="clearfix"></div>
                

        </div>
    
     <?php  echo form_close();?>
                 </div>          
            
         <!--div id="pspao" class="tab-pane fade active in">
         
         </div>

         <div id="ptra" class="tab-pane fade active in">
         
         </div>

         <div id="popa" class="tab-pane fade active in">
         
         </div>

         <div id="pnpa" class="tab-pane fade active in">
         
         </div>

         <div id="pla" class="tab-pane fade active in">
         
         </div>     
                     
                     
                     
                 </div-->
    </div>
    
     <script type="text/javascript">
      //Alertify JS
      $ = function (id) {
        return document.getElementById(id);
      },
      reset = function () {
        $("toggleCSS").href = "<?php echo base_url() . 'asset/'; ?>css/alertify.core.css";
        alertify.set({
          labels: {
            ok: "Ya",
            cancel: "Tidak"
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: "ok"
        });
      };
      
     
      /* $("hantar").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menghantar PSPA(O) awal ini?", function (e) {
          if (e) {
               document.forms["pspao_awal_baru"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
      
       $("simpan").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyimpan PSPA(O) awal ini?", function (e) {
          if (e) {
               document.forms["pspao_awal_baru"].submit();
            alertify.success("Anda klik ya");
           
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
 */
     
</script>
    
 