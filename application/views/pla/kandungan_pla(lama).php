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
                        PLA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  

    <!--Tab Navigation-->
  <div class="main-container">
		<div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class="active"><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
         <div class="tab-content" id="myTabContent">
         <div id="home" class="tab-pane fade active in">

                      <p></p>   
                        <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Pelupusan Aset (PLA)
                  </div>
                </div>  
                  <form class="form-horizontal no-margin">
                <div class="widget-body">
                	<div class="control-group">
                      <label class="control-label">
                        Tempoh
                      </label>
                     <div class="controls">
			<select name="tahun" class="span4 input-left-top-margins">
                          <option> - Sila Pilih - </option>
                          <option value="2013">
                            2013
                          </option>
                          <option value="2012">
                            2012
                          </option>
                          <option value="2011">
                            2011
                          </option>
                          <option value="2010">
                            2010
                          </option>
                          <option value="2009">
                            2009
                          </option>
                          <option value="2008">
                            2008
                          </option>
                          <option value="2007">
                            2007
                          </option>
                          <option value="2006">
                            2006
                          </option>
                          <option value="2005">
                            2005
                          </option>
                          <option value="2004">
                            2004
                          </option>
                          <option value="2003">
                            2003
                          </option>
                          <option value="2002">
                            2002
                          </option>
                          <option value="2001">
                            2001
                          </option>
                          <option value="2000">
                            2000
                          </option>
                          <option value="1999">
                            1999
                          </option>
                          <option value="1998">
                            1998
                          </option>
                          <option value="1997">
                            1997
                          </option>
                          <option value="1996">
                            1996
                          </option>
                          <option value="1995">
                            1995
                          </option>
                          <option value="1994">
                            1994
                          </option>
                          <option value="1993">
                            1993
                          </option>
                          <option value="1992">
                            1992
                          </option>
                          <option value="1991">
                            1991
                          </option>
                          <option value="1990">
                            1990
                          </option>
                          <option value="1989">
                            1989
                          </option>
                          <option value="1988">
                            1988
                          </option>
                          <option value="1987">
                            1987
                          </option>
                          <option value="1986">
                            1986
                          </option>
                          <option value="1985">
                            1985
                          </option>
                          <option value="1984">
                            1984
                          </option>
                          <option value="1983">
                            1983
                          </option>
                          <option value="1982">
                            1982
                          </option>
                          <option value="1981">
                            1981
                          </option>
                          <option value="1980">
                            1980
                          </option>
                          <option value="1979">
                            1979
                          </option>
                          <option value="1978">
                            1978
                          </option>
                        </select>
 					 
                     </div>
                        </div>
       
               	   <div class="control-group">
                        <label class="control-label" for="report_range1">
                            Kementerian
                        </label>
                        <div class="controls">
                            <?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => '',
                            //'maxlength'   => '',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' => 'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          ?>
                        </div> 
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="jabatan">
                            Jabatan/Agensi
                        </label>
                        <div class="controls">
                            <?php echo form_error('jabatan'); ?>
                            <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                        </div> 
                    </div> 
                    
                        
                    <div class="control-group">
                        <label class="control-label" for="premis">
                            Premis
                        </label>
                        <div class="controls">
                            <?php echo form_error('premis'); ?> 
                            <?php echo form_dropdown('premis', $premis, 'id="premis"');?>
                        </div>
                    </div>
                    
                        
                    <div class="control-group">
                        <label class="control-label" for="no_dpa">
                            No DPA
                        </label>
                        <div class="controls">
                            <?php echo form_error('no_dpa'); ?> 
                            <?php
                                $data = array(
                                    'name'        => 'no_dpa',
                                    'id'          => 'no_dpa',
                                    'value'       => '',
                                    'maxlength'   => '100',
                                    'size'        => '50',
                                    'class'       => '50',
                                    'placeholder' =>  '',
                            );
                            echo form_input($data);
                            ?>
                        </div>
                    </div>
                    <!--
                    <div class="control-group">
                      <label class="control-label">
                      Kementerian
                      </label>                    
                    <div class="controls">
                        <select id="subject">
                          <option>- Sila Pilih -</option>
                          <option>Kementerian Kerja Raya</option>
                          <option>Jabatan Perdana Menteri</option>
                          <option>Kementerian Kewangan</option>
                          <option>Kementerian Belia dan Sukan</option>
                          <option>Kementerian Sumber Manusia</option>
                          <option>Kementerian Pelajaran Malaysia</option>
                          <option>Kementerian Kesihatan Malaysia</option>
                        </select>
                    </div>
                    </div>
                    -->
                    
                    
                    <!--
                    <div class="control-group">
                      <label class="control-label">
                        Jabatan/Agensi
                      </label>
                    <div class="controls">
						<select id="subject">
                          <option>- Sila Pilih -</option>
                          <option>Jabatan Kerja Raya Wilayah Persekutuan KL</option>
                          <option>Jabatan Kerja Raya Negeri Seangor</option>
                          <option>Jabatan Kerja Raya Negeri Sembilan</option>
                          <option>Jabatan Kerja Raya Negeri Melaka</option>
                          <option>Jabatan Kerja Raya Negeri Johor</option>
                          <option>Jabatan Kerja Raya Negeri Pahang</option>
                          <option>Jabatan Kerja Raya Negeri Terengganu</option>
                          <option>Jabatan Kerja Raya Negeri Kelantan</option>
                          <option>Jabatan Kerja Raya Negeri Perlis</option>
                          <option>Jabatan Kerja Raya Negeri Kedah</option>
                          <option>Jabatan Kerja Raya Negeri Pulau Pinang</option>
                          <option>Jabatan Kerja Raya Negeri Perak</option>
                          <option>Jabatan Kerja Raya Negeri Sabah</option>
                          <option>Jabatan Kerja Raya Negeri Sarawak</option>
                          <option>Jabatan Saliran Negeri Selangor</option>
                          <option>Jabatan Pelajaran Negeri Kedah</option>
                          <option>Jabatan Kesihatan Negeri Melaka</option>
                          <option>Other</option>
                        </select>                      
                    </div>
                    </div>
                   
                    
                    <div class="control-group">
                      <label class="control-label">
                        Premis
                      </label>
                     <div class="controls">
						<select id="subject">
                          <option>- Sila Pilih -</option>
                          <option>Sekolah Kebangsaan Merlimau</option>
                          <option>Bangunan Persekutuan Negeri Sembilan</option>
                          <option>Wisma Negeri</option>
                          <option>Bangunan Sultan Abdul Samad</option>
                          <option>Other</option>
                        </select>                     
                    </div>
                    </div>

                  	<div class="control-group">
                      <label class="control-label">No DPA
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                    -->
				</div>
                </form>
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
                
          
                
                  <form class="form-horizontal no-margin">
                
                   <div class="stylish-lists">
                    <ul class="decimal-leading-zero">

                    <label>1.0 Pendahuluan
                    <span class="popover-pop" aria-hidden="true" data-icon="&#xe0f7;" data-placement="right" data-original-title="1.0 Pendahuluan"style="cursor: pointer" data-content="Menjelaskan maklumat mengenai premis berkaitan" >
                   </span>
                   </label>
                    <div class="wysiwyg-container">
                    <textarea id="wysiwyg" class="input-block-level" placeholder="" style="height: 80px">
                    </textarea>
                   </div>
<br>
                    <label> 2.0 Objektif
                    <span class="popover-pop" data-original-title="2.0 Objektif" data-content="Menjelaskan matlamat pelupusan aset tak alih kementerian/ jabatan/ agensi." data-placement="right"  data-icon="&#xe0f7;">
                    </span> 
                    </label>
                    <div class="wysiwyg-container">
                    <textarea id="wysiwyg2" class="input-block-level" placeholder="" style="height: 80px">
                    </textarea>
                   </div>
<br>
                    <label> 3.0 Carta Organisasi Dan Pelan Komunikasi
                    <span class="popover-pop" data-original-title="3.0 Carta Organisasi Dan Pelan Komunikasi" data-content="Struktur organisasi dan pelan komunikasi perlu disediakan bagi menerangkan organisasi pelaksanaan pelupusan aset (Sebagaimana JKR.PATA.F10/1a)." data-placement="right"  data-icon="&#xe0f7;"></span>
                    </label>
                    <div class="wysiwyg-container">
                    <textarea id="wysiwyg3" class="input-block-level" placeholder="" style="height: 80px">
                    </textarea>
                   </div>
<br>
                    <label>4.0 Skop Dan Aktiviti Pelupusan Aset
                    <span class="popover-pop" data-original-title="4.0 Skop Dan Aktiviti Pelupusan Aset" data-content="PTF perlu menentukan/ menetapkan keperluan teknikal, proses, tempoh pelaksaan, keperluan sumber, tanggungjawab dan kuasa pegawai yang terlibat bagi aktiviti berikut: (Sebagaimana JKR.PATA.F10/1b)." data-placement="right"  data-icon="&#xe0f7;"></span>
                    </label>
                    <div class="wysiwyg-container">
                    <textarea id="wysiwyg4" class="input-block-level" placeholder="" style="height: 80px">
                    </textarea>
                   </div>
<br>
                   
                   <label>5.0 Penyediaan Keperluan Sumber Aktiviti Pelupusan Aset
                   <span class="popover-pop" data-original-title="5.0 Penyediaan Keperluan Sumber Aktiviti Pelupusan Aset" data-content="PTF hendaklah menyediakan Analisis Keperluan Sumber Aktiviti Pelupusan Aset bagi tujuan permohonan peruntukan (Sebagaimana JKR.PATA.F10/1c)." data-placement="right"  data-icon="&#xe0f7;"></span>
                   </label>
                    <div class="wysiwyg-container">
                    <textarea id="wysiwyg5" class="input-block-level" placeholder="" style="height: 80px">
                    </textarea>
                   </div>
<br>
                   
                   <label>6.0 Kawalan Rekod Pelupusan Aset Tak Alih
                   <span class="popover-pop" data-original-title="6.0 Kawalan Rekod Pelupusan Aset Tak Alih" data-content="Kawalan rekod pelupusan aset sebagaimana JKR.PATA.F10/1d." data-placement="right"  data-icon="&#xe0f7;"></span>
                   </label>
                    <div class="wysiwyg-container">
                    <textarea id="wysiwyg6" class="input-block-level" placeholder="" style="height: 80px">
                    </textarea>
                   </div>
<br>
                   
                   <label>7.0 Rujukan
                   <span class="popover-pop" data-original-title="7.0 Rujukan" data-content="Sebarang dokumen yang dirujuk dalam penyediaan PLA sebagaimana JKR.PATA.F10/1e." data-placement="right"  data-icon="&#xe0f7;"></span>
                   </label>
                    <div class="wysiwyg-container">
                    <textarea id="wysiwyg7" class="input-block-level" placeholder="" style="height: 80px">
                    </textarea>
                   </div>
                   </ul>
                   </div>
                   </form>
                      </p>
                  </div>
              </div> 
            </div>
            
              <div align="right">
            		<button class="btn btn-danger input-top-margin" type="button">
                        Batal
                    </button>
                      
                      <a href="<?php echo site_url('pla/model_struktur_pla') ?>">
                    <button class="btn btn-primary input-top-margin" type="button">
                        Seterusnya
                    </button></a> 
                  
           	  </div>
           
          
                  </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                
               
