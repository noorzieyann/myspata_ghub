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
    <!--breadcrumb-->
         <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
         <p>
           <!--start div panel Model struktur -->           
           <div class="row-fluid">
           <div class="span12">
           <div class="widget">
           <div class="widget-header">
           <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Model Struktur Penilaian Aset Di Premis
            </div>
            </div>
  <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'model_struktur_pnpa',
                           'id' => 'model_struktur_pnpa',
                        );
                    echo form_open('pnpa/model_struktur_pnpa_edit_pp',$attributes); ?>
               <div class="widget-body"> 
                
                <!--start div row ptf n pif -->
       			      <div class="row-fluid">

                <!--start div panel ptf -->
            		  <div class="span6">
              		<div class="widget">
                	<div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PTF
                  </div></div>
                	<div class="widget-body">
                 			 <div class="control-group">
                 			    <label class="checkbox">
                   			 <input type="checkbox" value="" checked="">
                   			 Noor Azian Binti Mohd Noor
                  			</label>
                  			<label class="checkbox">
                            <input type="checkbox" value="">
                            Abu Bakar Helah Bin Murad
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="">
                            Jamilah Bin Jamil
                          </label>
                          <label class="checkbox">
                            <input type="checkbox" value="">
                            Maznah Binti Hamzah
                          </label>
                         </div>
              		</div>
                  </div>
                  </div><!--end div panel ptf -->
                
                <!--start div panel pif -->
            		  <div class="span6">
            		  <div class="widget">
            		    <div class="widget-header">
            		      <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PIF</div>
          		        </div>
            		    <div class="widget-body">
            		      <div class="control-group">
            		        <label class="checkbox">
            		          <input type="checkbox" value="" checked="">
            		          Noor Azian Binti Mohd Noor </label>
            		        <label class="checkbox">
            		          <input type="checkbox" value="">
            		          Abu Bakar Helah Bin Murad </label>
            		        <label class="checkbox">
            		          <input type="checkbox" value="">
            		          Jamilah Bin Jamil </label>
            		        <label class="checkbox">
            		          <input type="checkbox" value="">
            		          Maznah Binti Hamzah </label>
          		      </div>
          		      </div>
          		      </div>
          		      </div> <!--end div panel pif -->
                    </div><!--end div row ptf n pif -->

                <!--start div row pof n pdf -->
       			    <div class="row-fluid">

                <!--start div panel pdf -->
       			    <div class="span6">
              	<div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> PDF </div></div>
                <div class="widget-body">
                  <div class="control-group">
                	<label class="checkbox">
                    <input type="checkbox" value="" checked="">
                    Noor Azian Binti Mohd Noor
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" value="">
                        Abu Bakar Helah Bin Murad
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" value="">
                        Jamilah Bin Jamil
                      </label>
                      <label class="checkbox">
                        <input type="checkbox" value="">
                        Maznah Binti Hamzah
                      </label>
					         </div>
              	 </div>
            	   </div>
                </div><!--end div panel pif -->

              <!--start div panel pof -->
       			    <div class="span6">
       			      <div class="widget">
       			        <div class="widget-header">
       			          <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14C;"></span> POF</div>
   			            </div>
       			        <div class="widget-body">
       			          <div class="control-group">
       			            <label class="checkbox">
       			              <input type="checkbox" value="" checked="">
       			              Noor Azian Binti Mohd Noor </label>
       			            <label class="checkbox">
       			              <input type="checkbox" value="">
       			              Abu Bakar Helah Bin Murad </label>
       			            <label class="checkbox">
       			              <input type="checkbox" value="">
       			              Jamilah Bin Jamil </label>
       			            <label class="checkbox">
       			              <input type="checkbox" value="">
       			              Maznah Binti Hamzah </label>
   			              </div>

       			          <div class="clearfix"></div>
   			            </div>
   			          </div>
   			      
                </div><!--end div panel pif -->
                </div><!--end div row pdf n pof -->
            
              <!--start div panel penilai teknikal -->
              <div class="row-fluid">
            	<div class="span12">
              	<div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Panel Penilai Teknikal</div></div>
                <div class="widget-body">
                  <!--start div widget body -->
                		<div class="widget-body"><ul class="icomoon-icons-container">
                          <li><a href="#myModal"  data-toggle="modal">
                    <span class="fs1" data-icon="&#xe102;" aria-hidden="true"></span>
                  </a></li></ul><label class="tambah"> Tambah Panel Penilai Teknikal</label>
                    
                    <div class="controls2">
                    </div>
                     <!-- Modal-popup tambah panel penilai -->
                    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Panel Penilai Teknikal
                      </h4>
                      </div>
                      <!--start div modal body -->
                      <div class="modal-body">
                        <p>
                            <div class="control-group">
                                  <label class="control-label">
                                    Kategori
                                  </label>
                                <div class="controls">
                                    <select id="subject">
                                        <option>-Sila Pilih-</option>
                                    <option>Sivil & Struktur</option>
                                      <option>Arkitek</option>
                                      <option>Teknikal </option>
                                      <option>Mekanikal</option>
                                     </select>                      
                                </div>
                                </div>

                                	<div class="control-group">
                                  <label class="control-label">Nama
                                  </label>
                                <div class="controls">
                                    <input class="input-large" type="text" >
                                </div>
                                </div>

                                	<div class="control-group">
                                  <label class="control-label">E-mel
                                  </label>
                                <div class="controls">
                                    <input class="input-large" type="text" >
                                </div>
                                </div>

                                	<div class="control-group">
                                  <label class="control-label">No. Telefon Pejabat
                                  </label>
                                <div class="controls">
                                    <input class="input-large" type="text" >
                                </div>
                                </div>

                                	<div class="control-group">
                                  <label class="control-label">No. Telefon Bimbit
                                  </label>
                                <div class="controls">
                                    <input class="input-large" type="text" >
                                </div>
                                </div>
                               
                              	<div class="control-group">
                                  <label class="control-label">Jabatan
                                  </label>
                                <div class="controls">
                                    <input class="input-large" type="text" >
                                </div>
                                </div>
                                
                                	<div class="control-group">
                                  <label class="control-label">Surat Lantikan
                                  </label>
                                <div class="controls">
                                    <input class="input-large" type="file" ></form>
                                </div>
                                </div>

                                  </p>
                                </div><!--end div modal body -->
                               <div class="modal-footer">
                               <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                               <a href="#" class="btn btn-warning2" data-dismiss="modal">Simpan Deraf</a>
                             </div>

                            </div><!--end modal popup panel penilai -->
                            </div><!--end widget body -->
                               <div id="dt_example" class="example_alt_pagination"> 
                      <?php echo $this->table->generate($dataku); ?>
                       <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai
                       </div><?php echo $this->pagination->create_links(); ?>
 
                         <!--         
                  	<table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                      <tr>
                        <th width="3%" style="width:3%">Bil</th>
                        <th width="10%" class="hidden-phone" style="width:10%"><span class="hidden-phone" style="width:10%">Kategori</span> ID</th>
                        <th width="20%" class="hidden-phone" style="width:20%">Nama</th>
                        <th width="15%" class="hidden-phone" style="width:15%">Surat Lantikan</th>
						            <th width="15%" class="hidden-phone" style="width:15%">Tindakan</th></tr>
                   </thead>
                    <tbody>
                      <tr>
                        <td><span class="name">1.</span></td>
                        <td class="hidden-phone"><span class="hidden-phone" style="width:10%">Sivil</td>
                        <td class="hidden-phone">Zuhairi Mohd</td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                      		<li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                    		</ul>Surat Lantikan.docx</td>
						            <td class="hidden-phone">
                          <ul class="icomoon-icons-container">
                      		<li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                    		</ul></td>
					</tr>
                     <tr>
                        <td><span class="name">2.</span></td>
                        <td class="hidden-phone"><span class="hidden-phone" style="width:10%">Sivil</td>
                        <td class="hidden-phone">Ahamad Hussen</td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                      		<li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                    		</ul>Surat Lantikan.docx </td>
						            <td class="hidden-phone">
                          <ul class="icomoon-icons-container">
                      		<li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                    		</ul></td>
					</tr>
                       <tr>
                        <td><span class="name">3.</span></td>
                        <td class="hidden-phone"><span class="hidden-phone" style="width:10%">Sivil</td>
                        <td class="hidden-phone">Siti Binti Hamid</td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                      		<li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe1b4;"></span></li>
                    		</ul>Surat Lantikan.docx</td>
						          <td class="hidden-phone">
                          <ul class="icomoon-icons-container">
                      		<li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span> </li>
                    		</ul>
                        </td>
					</tr>
                     </tbody>
                  </table>

                  
                  <p>&nbsp;</p>
                  <p>Memaparkan 5 dari 20 senarai</p>
                  <!--start div paging -->
                  <!--<div class="pagination no-margin" align="right">
                    <ul>
                      <li><a href="#" data-original-title="">Pertama</a></li>
                      <li><a href="#" data-original-title="">Sebelum</a></li>
                      <li class="active"><a href="#" data-original-title="">1</a></li>
                      <li><a href="#" data-original-title="">2</a></li>
                      <li><a href="#" data-original-title="">3</a></li>
                      <li><a href="#" data-original-title="">4</a></li>
                      <li class="hidden-phone"><a href="#" data-original-title=""> Akhir</a></li>
                    </ul>
                  </div> --> <!--end paging -->

               <div class="clearfix"></div>
                </div>
                </div>
                </div> <!--end div panel penilai -->
          
            <!--start div pelan Komunikasi -->
             	<div class="row-fluid">
            	<div class="span12">
              <div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Panel Komunikasi Bagi Aktiviti Penilaian Aset</div></div>
                <div class="widget-body">
               		<div class="control-group">
                      <label>Tugas Dan Pegawai Atasan Yang Ada Kaitan &nbsp;&nbsp;&nbsp;
                      <input class="input-xxlarge" type="text" placeholder="pegawai yg terlibat adalah dot bin dot" /></label>
                    </div>
                    <div class="control-group">
                      <label>Tanggungjawab Dan Kuasa Yang Diberikan &nbsp;&nbsp;&nbsp;&nbsp;
                      <input class="input-xxlarge" type="text" placeholder="pegawai teknikal fasiliti" ></label>
                    </div>
                    <div class="control-group">
                      <label>Tugas Pegawai-Pegawai Lain Yang Ada Kaitan&nbsp;
                        <input class="input-xxlarge" type="text" placeholder="pegawai operasi" >
                      </label>
                     </div>
                  </div>
             	</div>
            	</div>
              </div><!--end div pelan komunikasi -->
          
              </div>
            	</div>
               <?php  echo form_close();?>
           	  </div>
              </div><!--end div panel model struktur -->
                
                <!--start div button -->
                <div align="right">
                <a href="<?php echo site_url('pnpa/summary_pp_pnpa_edit') ?>"><button class="btn btn-danger input-top-margin" type="button">
                        Batal
                  </button></a>
                     <a href="<?php echo site_url('pnpa/summary_pp_pnpa_edit') ?>"><button class="btn btn-warning2 input-top-margin" type="button">
                        Simpan
                      </button></a>
                     
   		   </div><!--end div button -->
		 <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>

              <!--end div dashboard -->
            </div>