<?php
$namapremis=NULL;
$kand_detail[0]=NULL;
$kand_detail[1]=NULL;
$kand_detail[2]=NULL;
$kand_detail[3]=NULL;
$kand_detail[4]=NULL;
$kand_detail[5]=NULL;
$kand_detail[6]=NULL;
$kand_detail[7]=NULL;

$nodpa=NULL;
$tahun=NULL;

$kand_utama_bil = array(
	'kand_utama_bil[0]'=>'1',
	'kand_utama_bil[1]'=>'2',
	'kand_utama_bil[2]'=>'3',
	'kand_utama_bil[3]'=>'4',
	'kand_utama_bil[4]'=>'5',
	'kand_utama_bil[5]'=>'6',
        'kand_utama_bil[6]'=>'7'
);
$kand_utama = array(
	'kand_utama[0]'=>'Pendahuluan',
	'kand_utama[1]'=>'Objektif',
	'kand_utama[2]'=>'Carta Organisasi dan Pelan Komunikasi',
	'kand_utama[3]'=>'Skop dan Aktiviti Penerimaan Aset',
	'kand_utama[4]'=>'Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset',
	'kand_utama[5]'=>'Kawalan Rekod Penerimaan Aset',
        'kand_utama[6]'=>'Rujukan'
);

$sessionarray = $this->session->all_userdata();


if($this->uri->segment(4) != NULL && $this->uri->segment(4) != 0){
   $kand_id = array();
$kand_detail = array();
	foreach($this->ptra_model->get_ptra_from_segment($this->uri->segment(4)) as $row){

			$kand_id[] = $row->kandungan_id;
			$kand_detail[] = $row->kand_utama_detail;
                        $nodpa = $row->nodpa;
                        $premis= $row->idpremis_kategori;
                        $namapremis= $row->nama_premis;
                        $tahun= $row->tahun;
                        $ptra_id= $row->ptra_id;

	}
	//$tahun_mula = $row->tahun_mula;
	//$tahun_akhir = $row->tahun_akhir;
	//$kementerian = $this->aauth->util_get_kementerian($row->idkem);

}else if($this->uri->segment(4) == 0){
	
	$kand_detail[] = array(
		'','','','','','',''
        
		
	);
        $tahun='';
        $nodpa='';
        $namapremis='';
        
	//$tahun_mula = '';
	//$tahun_akhir = '';
	//$kementerian = $this->aauth->util_get_kementerian($sessionarray['user_kemid']);;
}
else
{
  
  
  $kand_detail = array(
    '','','','','','',''
        
    
  );
        $tahun='';
        $nodpa='';
        $namapremis='';
        
  //$tahun_mula = '';
  //$tahun_akhir = '';
  //$kementerian = $this->aauth->util_get_kementerian($sessionarray['user_kemid']);;

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
    <?php 
	$form_name = 'ptra/kandungan_ptra/'.$this->uri->segment(3);
	if($this->uri->segment(4) != NULL){$form_name = 'ptra/kandungan_ptra/'.$this->uri->segment(3).'/'.$this->uri->segment(4);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kandungan_ptra');
	echo form_open($form_name, $attributes);
?>
<?php 
	echo form_hidden($kand_utama_bil);
	echo form_hidden($kand_utama);
	$sunting = array('sunting'=>NULL);
	if($this->uri->segment(4) != NULL && $this->uri->segment(4)!= 0){
		$sunting = array('sunting'=>$this->uri->segment(4));
		echo form_hidden('kand_id',$kand_id);
	}
	echo form_hidden($sunting);

?>
<?php //echo validation_errors(); ?>
    
    
    <!--tab navigation--> 
    <div class="widget-body">
        
        <?php 
                        //echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

                        if($this->session->flashdata('flashError'))
                        {
                            echo '<div class="mws-form-message error">';
                            echo '<i class="icol-ban"></i> ' .$this->session->flashdata('flashError');
                            echo '</div>';
                        }
                        if($this->session->flashdata('flashComfirm'))
                        {
                            echo '<div class="mws-form-message success">';
                            echo '<i class="icol-accept"></i> ' .$this->session->flashdata('flashComfirm');
                            echo '</div>';
                        }
                    ?>
        
 <?php if(!empty($tab)) { echo $tab;} ?>
        
         <!--panel 1-->  
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penerimaan Aset (PTRA)
                  </div>
                </div>
                <div class="widget-body">
                  
                      <?php $sessionarray = $this->session->all_userdata();?>
                      
                  <div class="control-group">
                      <label class="control-label">
                         Tahun<span class="required">*</span>
                      </label>
                      <?php
                            if($this->input->post('tahun') !=NULL){
                                    $tahun = $this->input->post('tahun');
                            }
                       ?> 
                      
                      <div class="controls">
                        <?php echo form_error('tahun'); ?> 
                        <?php //echo form_dropdown('tahun', $year_list,$tahun, 'id="tempoh_mula"')?>
						<?php echo form_dropdown('tahun', $year_list_selected,$tahun, 'id="tempoh_mula"')?>
                      </div>
                  </div>
                      
                      <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                      <input class="input-large" type="text" placeholder="<?php echo $sessionarray['user_kementerian'];?>" disabled>
                      </div>
                    </div>           
                    
                     <div class="control-group">
                     <label class="control-label">
                    Jabatan/Agensi
                      </label>
                     <div class="controls">
                        <input class="input-large" type="text" placeholder="<?php echo $sessionarray['user_jabatan'];?>" disabled>
                    </div>
                     </div>
                      
                   <div class="control-group">
                     <label class="control-label">Kategori Premis<span class="required">*</span></label>
                      <?php
                            if($this->input->post('premis') !=NULL){
                                    $premis = $this->input->post('premis');
                            }
                       ?> 
                     
                     <div class="controls">
                      <select class="required large" name="premis">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($katpremis)) : foreach ($katpremis as $rec) : 
                                                        if($premis==$rec->idpremis_kategori){ ?>

                                                          <option value="<?php echo $rec->idpremis_kategori; ?>" selected="selected"><?php echo set_value('jenis_premis', $rec->jenis_premis); ?></option>
                                                       
                                                       <?php }else{ ?>

                                                        <option value=" <?php echo $rec->idpremis_kategori; ?>"><?php echo set_value('jenis_premis', $rec->jenis_premis); ?></option>
                                                       
                                                        <?php } ?>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                      </div>
                    </div>
                   
                    <div class="control-group">
                     <label class="control-label">
                    Nama Premis<span class="required">*</span>
                      </label>
                        <?php
                            if($this->input->post('namapremis') !=NULL){
                                    $namapremis = $this->input->post('namapremis');
                            }
                       ?> 
                        
                      <div class="controls">
                         <?php echo form_input(array('name' => 'namapremis', 'value' => $namapremis, 'class' => 'large required')); ?>
                         <font color="red"><?php echo form_error('namapremis'); ?></font>
                      </div>
                    </div>
                    
                    
                     <div class="control-group">
                     <label class="control-label">
                    No DPA<span class="required">*</span>
                      </label>
                       <?php if($getdpa = $this->ptra_model->get_nodpa($this->uri->segment(5))){foreach ($getdpa as $rr) :?>
                       <div class="controls">
                          <?php echo form_input(array('name' => 'nodpa', 'value' => $rr->no_dpa, 'class' => 'large required')); ?>
                         <font color="red"><?php echo form_error('nodpa'); ?></font>
                      </div>
                       <?php endforeach; ?>
                    <?php  //endif; ?> 
                       <?php }else{
                            if($this->input->post('nodpa') !=NULL){
                                    $nodpa = $this->input->post('nodpa');
                            }
                       ?> 
                      <div class="controls">
                          <?php echo form_input(array('name' => 'nodpa', 'value' => $nodpa, 'class' => 'large required')); ?>
                         <font color="red"><?php echo form_error('nodpa'); ?></font>
                      </div><?php } ?>
                    </div>
                     
                <input type="hidden" name="kementerian" value="<?php echo $sessionarray['user_kemid'];?>"/>
                <input type="hidden" name="jabatan" value="<?php echo $sessionarray['user_jabid'];?>"/>
                
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe0b6;"></span> Kandungan
                  </div>
                </div>
             
              <div class="widget-body">
                  <div class="control-group">
                      
                     <label> 1.0 Pendahuluan  
                      <!--<span class="popover-pop" data-original-title="1.0 Pendahuluan" 
                      data-content="Menjelaskan maklumat mengenai premis berkaitan." data-placement="right" 
                      data-icon="&#xe0f7;"></span>!-->
					  <a id="popoverOption" href="#"  
                      rel="popover" data-placement="top" data-original-title="Menjelaskan maklumat mengenai premis berkaitan." data-icon="&#xe0f7;"></a>
					  
                      </label> 
                    <div class="wysiwyg-container">
                        <?php
                                $pendahuluan = $kand_detail[0];
                                if($this->input->post('pendahuluan') !=NULL){
                                  $pendahuluan = $this->input->post('pendahuluan');
                                }
                        ?>
                     <?php echo form_error('pendahuluan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'pendahuluan',
                                    'id'          => 'wysiwyg',
                                    'value'       => $pendahuluan,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        
                  <input type="hidden" name="kand_utama" value="Pendahuluan">
                  <input type="hidden" name="kand_utama_bil" value="1">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                      </div>
                  </div>

                  <div class="control-group">
                      <label>
                       2.0 Objektif  <!-- <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menjelaskan matlamat penerimaan aset kementerian/ jabatan/ agensi." data-placement="right"  data-icon="&#xe0f7;"></span>-->
                      <a id="popoverOption" href="#"  
                      rel="popover" data-placement="top" data-original-title="Menjelaskan matlamat penerimaan aset kementerian/ jabatan/ agensi." data-icon="&#xe0f7;"></a>
					  </label>                  
                  <div class="wysiwyg-container">
                      <?php
                                $objektif = $kand_detail[1];
                                if($this->input->post('objektif') !=NULL){
                                  $objektif = $this->input->post('objektif');
                                }
                        ?>
                     <?php echo form_error('objektif'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'objektif',
                                    'id'          => 'wysiwyg2',
                                    'value'       => $objektif,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                  <input type="hidden" name="kand_utama_obj" value="Objektif">
                  <input type="hidden" name="kand_utama_bil_obj" value="2">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                  </div>
                  </div>

                  <div class="control-group">
                      <label>3.0 Carta Organisasi Dan Pelan Komunikasi   <!--<span class="popover-pop" data-original-title="3.0 Carta Organisasi dan Pelan Komunikasi" data-content="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penerimaan aset (Sebagaimana JKR.PATA.F6/1a)." data-placement="right" class="fs1" aria-hidden="true" data-icon="&#xe0f7;"></span>-->
					  <a id="popoverOption" href="#"  
                      rel="popover" data-placement="top" data-original-title="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan penerimaan aset (Sebagaimana JKR.PATA.F6/1a)." data-icon="&#xe0f7;"></a>
                      </label>    
                    <div class="wysiwyg-container">
                        <?php
                                $carta = $kand_detail[2];
                                if($this->input->post('carta') !=NULL){
                                  $carta = $this->input->post('carta');
                                }
                        ?>
                     <?php echo form_error('carta'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'carta',
                                    'id'          => 'wysiwyg3',
                                    'value'       => $carta,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_carta" value="Carta Organisasi dan Pelan Komunikasi">
                  <input type="hidden" name="kand_utama_bil_carta" value="3">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>4.0 Skop Dan Aktiviti Penerimaan Aset  <!--<span class="popover-pop" data-original-title="4.0 Skop dan Aktiviti penerimaan Aset" data-content="PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut: (Sebagaimana JKR.PATA.F6/1b)" data-placement="right" data-icon="&#xe0f7;"></span>-->
					  <a id="popoverOption" href="#"  
                      rel="popover" data-placement="top" data-original-title="PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksanaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut: (Sebagaimana JKR.PATA.F6/1b)" data-icon="&#xe0f7;"></a>
                      
                      </label>
                    <div class="wysiwyg-container">
                        <?php
                                $skop = $kand_detail[3];
                                if($this->input->post('skop') !=NULL){
                                  $skop = $this->input->post('skop');
                                }
                        ?>
                     <?php echo form_error('skop'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'skop',
                                    'id'          => 'wysiwyg4',
                                    'value'       => $skop,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_skop" value="Skop dan Aktiviti Penerimaan Aset">
                  <input type="hidden" name="kand_utama_bil_skop" value="4">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>5.0 Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset  <!--<span class="popover-pop" data-original-title="5.0 Penyediaan Keperluan Sumber Aktiviti penerimaan Aset" data-content="PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Penerimaan Aset bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F6/1c)." data-placement="right" data-icon="&#xe0f7;"></span>-->
					  <a id="popoverOption" href="#"  
                      rel="popover" data-placement="top" data-original-title="PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Penerimaan Aset bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F6/1c)." data-icon="&#xe0f7;"></a>
                     
                      </label>
                    <div class="wysiwyg-container">
                        <?php
                                $sumber = $kand_detail[4];
                                if($this->input->post('sumber') !=NULL){
                                  $sumber = $this->input->post('sumber');
                                }
                        ?>
                     <?php echo form_error('sumber'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'sumber',
                                    'id'          => 'wysiwyg5',
                                    'value'       => $sumber,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_sumber" value="Penyediaan Keperluan Sumber Aktiviti Penerimaan Aset">
                  <input type="hidden" name="kand_utama_bil_sumber" value="5">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>6.0 Kawalan Rekod Penerimaan Aset  <!--<span class="popover-pop" data-original-title="6.0 Kawalan Rekod penerimaan Aset" data-content="Kawalan rekod penerimaan aset sebagaimana JKR.PATA.F6/1d." data-placement="right" data-icon="&#xe0f7;"></span></span>-->
                      <a id="popoverOption" href="#"  
                      rel="popover" data-placement="top" data-original-title="Kawalan rekod penerimaan aset sebagaimana JKR.PATA.F6/1d." data-icon="&#xe0f7;"></a>
                     </label>
                    <div class="wysiwyg-container">
                        <?php
                                $kawalan = $kand_detail[5];
                                if($this->input->post('kawalan') !=NULL){
                                  $kawalan = $this->input->post('kawalan');
                                }
                        ?>
                     <?php echo form_error('kawalan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'kawalan',
                                    'id'          => 'wysiwyg6',
                                    'value'       => $kawalan,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_kawalan" value="Kawalan Rekod Penerimaan Aset">
                  <input type="hidden" name="kand_utama_bil_kawalan" value="6">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>

                  <div class="control-group">
                      <label>7.0 Rujukan  <!--<span class="popover-pop" data-original-title="7.0 Rujukan" data-content="Sebarang dokumen yang dirujuk dalam penyediaan PTRA sebagaimana JKR.PATA.F6/1e." data-placement="right"data-icon="&#xe0f7;"></span>-->
                      <a id="popoverOption" href="#"  
                      rel="popover" data-placement="top" data-original-title="Sebarang dokumen yang dirujuk dalam penyediaan PTRA sebagaimana JKR.PATA.F6/1e." data-icon="&#xe0f7;"></a>
                     </label>
                    <div class="wysiwyg-container">
                        <?php
                                $rujukan = $kand_detail[6];
                                if($this->input->post('rujukan') !=NULL){
                                  $rujukan = $this->input->post('rujukan');
                                }
                        ?>
                     <?php echo form_error('rujukan'); ?> 
                    <?php 
                          $data = array(
                                    'name'        => 'rujukan',
                                    'id'          => 'wysiwyg7',
                                    'value'       => $rujukan ,
                                    'rows'        => '5',
                                    'cols'        => '10',
                                    'style'       => 'height: 80px',
                                    'class'       => 'input-block-level',
                              'placeholder'       => 'Isi Ruangan Ini',
                                  );

                     echo form_textarea($data); ?>
                        <input type="hidden" name="kand_utama_rujukan" value="Rujukan">
                  <input type="hidden" name="kand_utama_bil_rujukan" value="7">
                  <input type="hidden" name="kump_kand_id" value="4">
                  <input type="hidden" name="node_type" value="1">
                  <input type="hidden" name="kand_type" value="1">
                   </div>
                  </div>
                  
              </div>               
            </div>
          </div>
        </div>
        <!--/.END panel 2-->

                <!--buttons-->
                <div class="next-prev-btn-container pull-right">
                <a href=""><button class="btn btn-danger input-top-margin" type="button">
                                            Batal</button></a>

                  
                  <input type="submit" value="Seterusnya" class="btn btn-primary">
                </div> 
                <!--/.END buttons--> 
          
      </div>  
      <!--/.END main-container-->    
        </form>
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->
<script>
$('#popoverOption').popover({ trigger: "hover" });</script>


    <script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script>


  $('#wysiwyg1').wysihtml5();
    
</script>