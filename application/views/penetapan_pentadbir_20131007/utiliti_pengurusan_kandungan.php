<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Utiliti Pengurusan Kandungan
                  </div>
                </div>
                <div class="widget-body"> <form class="form-horizontal no-margin">
                  <!--panel 2-->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
                <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Kemaskini Data Kandungan</div>
              </div>
                <!--table section-->              
                <div class="widget-body"> 
                <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'peng_kand',
                           'id' => 'peng_kand',
                        );
                    echo form_open('pengkandungan/peng_kand',$attributes); ?>

                  <div class="control-group">
                      <label class="control-label control-label_2">
                        Sila Pilih Kategori Kandungan
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('katkand'); ?>
                        <?php $options = array(
                                ''  => '- Pilih Kategori -',
                                'pspaoawal'     => 'PSPAO Awal',
                                'pspaoakhir'    => 'PSPAO Akhir',
                                'ptra'         => 'PTRA',
                                'popa'         => 'POPA',
                                'pnpa'         => 'PNPA',
                                'ppun'         => 'PPUN',
                                'pla'         => 'PLA',
                               
                              );echo form_dropdown('katkand', $options);

                                ?>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label control-label_2">
                        Kemaskini Data Kandungan
                      </label>
                      <div class="controls controls_2">
                        <?php echo form_error('senaraikand'); ?>
                        <?php $options = array(
                                ''  => '- Sila Pilih Kandungan -',
                                'pendahuluan'     => '1.0 Pendahuluan',
                                'visi'    => '2.0 Visi Pengurusan Aset Tak Alih',
                                'misi'         => '3.0 Misi Pengurusan Aset Tak Alih',
                                'objektif'         => '4.0 Objektif Pengurusan Aset Tak Alih',
                                'skop'         => '5.0 Skop Kategori Dan Fungsi Aset',
                                'polisi'         => '6.0 Penetapan Polisi Pengurusan Aset (Operasi)Serta Output',
                                'strategi'         => '7.0 Strategi Pelaksanaan',
								 'struktur'         => ' |__ 7.1 Struktur Tadbir Urus Organisasi',
								  'sistem'         => ' |__ 7.2 Sistem, Prosedur, Piawaian dan Teknologi',
								   'kaedah'         => ' |__ 7.3 Kaedah Pelaksanaan (Dalaman atau Luaran)',
								    'bajet'         => ' |__ 7.4 Penyediaan Pelan Perancangan Dan Bajet Pengurusan Aset(Operasi)',
									 'sumber'         => ' |__ 7.5 penyediaan Keperluan Sumber',
									  'output'         => ' |__ 7.6 Pemantauan Pelaksanaan dan Pengukuran Output',
									   'urus'         => '8.0 Kajian Semula Pengurusan',
									    'takwin'         => '9.0 Takwim Dan KPI Tadbir Urus TPATA',
										 'penutup'         => '10.0 Penutup',
										  'lampiran'         => '11.0 Lampiran',
	
							   
                              );
echo form_dropdown('senaraikand', $options);

                                ?>
                      </div>
                    </div>
                               
                    <div class="control-group">
                      <label class="control-label control-label_2">
                        Bil
                      </label>
                      <?php echo form_error('bil'); ?>
                      <div class="controls controls_2">
                       <?php
                          
                          $data = array(
                            'name'        => 'bil',
                            'id'          => 'Bil',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label control-label_2">
                        Kandungan </label>
                      <div class="controls controls_2">
                        <?php echo form_error('kandungan'); ?>
                       <?php
                          
                          $data = array(
                            'name'        => 'kandungan',
                            'id'          => 'kandungan',
                            'value'       => '',
                            'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                      </div>
                    </div>
                      
                      <div class="control-group ">
                          <?php
        $seterusnya = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'rounded pull-right ',
            'value'   => '',
            'content' => ' Tambah Data',
            'type'    => 'submit',
            'data-icon' => '&#xe102;'
        );

        echo form_button($seterusnya);
        
        ?>
             <div class="controls controls_3"></div>           
                           
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Sila Masukkan Data Kandungan</div>
              </div>
                <!--table section-->              
                <div class="widget-body">
                
                <div class="control-group">
                      <label class="control-label control-label_2">
                        Sila Pilih Kategori Kandungan
                      </label>
                      <div class="controls controls_2">
                        <?php $options = array(
                               
                                
                                'pspaoakhir'    => 'PSPAO Akhir',
								'pspaoawal'     => 'PSPAO Awal',
                                'ptra'         => 'PTRA',
                                'popa'         => 'POPA',
                                'pnpa'         => 'PNPA',
                                'ppun'         => 'PPUN',
                                'pla'         => 'PLA',
                               
                              );echo form_dropdown('katkand2', $options);

                                ?>
                      </div>
                    </div>

                 
               <table align="center">
  <tr><td width="651"><label>1.0 Pendahuluan</label></td><td width="320"><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td></tr>
  <tr>
    <td><label>2.0 Visi Pengurusan Aset Tak Alih</label></td>
    <td><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><label><label>3.0 Misi Pengurusan Aset Tak Alih</label>
            </td>
    <td><label><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><label><label>4.0 Objektif Pengurusan Aset Tak Alih</label></td>
    <td><label><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><label>5.0 Skop Kategori Dan Fungsi Aset</label></td>
    <td><label><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><label><label>6.0 Penetapan Polisi Pengurusan Aset (Operasi)Serta Output 7.0 Strategi Pelaksanaan</label></td>
    <td><label><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><label><label>
     7.0 Strategi Pelaksanaan</label></td>
    <td><label><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><blockquote><label>7.1 Struktur Tadbir Urus Organisasi</label><blockquote></td>
    <td><label><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><blockquote><label>7.2 Sistem, Prosedur, Piawaian dan Teknologi</label><blockquote></td>
    <td><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><blockquote><label>7.3 Kaedah Pelaksanaan (Dalaman atau Luaran)</label></td>
    <td><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><blockquote><label>7.4 Penyediaan Pelan Perancangan Dan Bajet Pengurusan Aset(Operasi)</label></td>
    <td><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><blockquote><label>7.5 penyediaan Keperluan Sumber</label></td>
    <td><label><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><blockquote><label>7.6 Pemantauan Pelaksanaan dan Pengukuran Output</label></td>
    <td><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  ></blockquote></td>
  </tr>
  <tr>
    <td><label>8.0 Kajian Semula Pengurusan</label></td>
    <td><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><label><label>9.0 Takwim Dan KPI Tadbir Urus TPATA</label></td>
    <td><label><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr>
    <td><label>10.0 Penutup</label></td>
    <td><ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked"  > </td>
  </tr>
  <tr><td><label>11.0 Lampiran</label><br>
</td><td width="320">
                       <ul class="icomoon-icons-container">
                        <li class="rounded">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe0a7;"></span> </li></ul>
                         <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe134;"></span>
                      </li>
                    </ul>
                    <ul class="icomoon-icons-container"> <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe130;"></span>
                      </li>
                    </ul>
                       <input type="checkbox" checked="checked" > 
                      </td></tr></table></p>
                      
                       </div>
                     
            </div>
          </div>
        </div>
       




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
      
     
      $("sah").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin mengesahkan rekod PNPA ID PNPA00002?", function (e) {
          if (e) {
            alertify.success("Rekod PNPA ID PNPA00002 telah disahkan");
          } else {
            alertify.error("");
          }
        });
        return false;
      };

      $("pembetulan").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi. ", function (e) {
          if (e) {
            window.location ="<?php echo site_url('pnpa/senarai_ppd_pnpa') ?>";
          } 
          else {
            alertify.error("");
          }
        });
        return false;
      };
      
      
     
      
     
</script>
 
   
 