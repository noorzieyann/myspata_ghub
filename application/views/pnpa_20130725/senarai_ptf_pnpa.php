
        <!--start div widget-body -->
        <div class="widget-body">
           <ul class="nav nav-tabs no-margin myTabBeauty">
              <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PSPA(O)</a></li>
              <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PTRA</a></li>
              <li class=""><a data-toggle="tab" href="#profile" data-original-title="">POPA</a></li>
              <li class="active"><a data-toggle="tab" href="#profile" data-original-title="">PNPA</a></li>
              <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PPUN</a></li>
              <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PLA</a></li>
            </ul>
          <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
                <p> 
                 <!--start div panel PNPA -->
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penilaian Keadaan/Prestasi Aset (PNPA)
                      </div>
                      </div> 
                      <form class="form-horizontal no-margin">
                      <div class="widget-body">
                        <div class="control-group">
                        <label class="control-label">Tahun</label>
                        <div class="controls">
                            <select id="subject">
                                <option value="2013">
                            Sila Pilih
                          </option>
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
                            </select>
                        </div></div>

                        <div class="control-group">
                        <label class="control-label">Kementerian</label>
                        <div class="controls"><input class="input-large" type="text" disabled placeholder="Kementerian Kerja Raya">
                        </div>
                        </div>
                    
                        <div class="control-group">
                        <label class="control-label">Jabatan/Agensi</label>
                        <div class="controls">
                          <select id="subject">
                            <option>Sila Pilih</option>
                            <option>Jabatan Saliran</option>
                            <option>Jabatan Pelajaran </option>
                            <option>Jabatan Kesihatan</option>
                            <option>Other</option>
                            </select>                      
                        </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">Premis</label>
                        <div class="controls">
                          <input class="input-large" type="text" ></form>
                        </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">No DPA</label>
                        <div class="controls">
                          <input class="input-large" type="text" ></form>
                        </div>
                        </div>
                    
                        <div class="control-group">
                          <label class="control-label">Status</label>
                        <div class="controls">
                          <select id="subject">
                          <option>Sila Pilih</option>
                          <option>Semak</option>
                          <option>Sah</option>
                          <option>Pembetulan</option>
                          <option>Deraf</option>
                          
                          </select>
                        </div>
                        </div>
                    
                      <div class="control-group">
                        <label class="control-label">Kata Carian</label>
                      <div class="controls">
                        <input class="input-large" type="text" ></form>
                      </div>
                      </div>
                 
                      <div class="control-group ">
                        <ul class="icomoon-icons-container pull-right" title="test">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>
                        </li>
                       </ul>
                      </div>


                    <!--end panel PNPA -->
                    </div></form></div></div></div>

              <!--start panel Senarai -->
                <div class="row-fluid">
                <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai PNPA
                  </div>
                  </div>
                <div class="widget-body">
                        <div class="widget-body">
                          <ul class="icomoon-icons-container">
                          <li><a href="<?php echo site_url('main/kandungan_pnpa') ?>" data-toggle="modal">
                            <span class="fs1" data-icon="&#xe102;" aria-hidden="true">  </span></a>
                         </li>
                         </ul>
                      <label class="tambah">Tambah PNPA</label>

                    <div class="controls2">
                    
                     </div>
                     
                        <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                          <thead>
                            <tr>
                              <th width="3%" style="width:3%">Bil</th>
                              <th width="10%" class="hidden-phone" style="width:10%"><span class="hidden-phone" style="width:10%">PNPA</span> ID</th>
                              <th width="4%" class="hidden-phone" style="width:7%">Tahun</th>
                              <th width="19%" class="hidden-phone" style="width:15%">Kementerian</th>
                              <th width="15%" class="hidden-phone" style="width:15%">Jabatan/Agensi</th><th width="15%" class="hidden-phone" style="width:15%">Premis</th>
                  						<th width="20%" class="hidden-phone" style="width:15%">No DPA</th>
                  						<th width="20%" class="hidden-phone" style="width:10%">Status</th>
                  						<th width="14%" class="hidden-phone" style="width:15%">Tindakan</th>

      					</tr>
                         </thead>
                          <tbody>
                            <tr>
                              <td><span class="name">1.</span></td>
                              <td class="hidden-phone"><span class="hidden-phone" style="width:10%">PNPA</span> 000001</td>
                              <td class="hidden-phone">2013</td>
                              <td class="hidden-phone">Kementerian Kerja Raya</td>
                  						<td class="hidden-phone">Jabatan Kerja Raya</td>
                  						<td class="hidden-phone">Sekolah Kebangsaan Seksyen 2</td>
                  						<td class="hidden-phone">1105101MYS.101200.BE0001</td>
                              <td class="hidden-phone"><span class="badge">Deraf</span></td>
                              <td class="hidden-phone">
                                <ul class="icomoon-icons-container">
                            		<a href="index.html"><li class="rounded">
                            		<span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                          		</ul><ul class="icomoon-icons-container">
                            		<a href="index.html"><li class="rounded">
                            		<span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                          		</ul>
                              </td>
      					</tr>
                    <tr>
                        <td><span class="name">2.</span></td>
                        <td class="hidden-phone"><span class="hidden-phone" style="width:10%">PNPA</span> 000002</td>
                        <td class="hidden-phone">2013</td>
            						<td class="hidden-phone">Kementerian Kerja Raya</td>
            						<td class="hidden-phone">Jabatan Kerja Raya</td>
            						<td class="hidden-phone">Bahagian Tek Negeri Selangor</td>
            						<td class="hidden-phone">1105101MYS.101200.BD0003</td>
            						<td class="hidden-phone"><span class="badge badge-info">Sah</span></td>
                        <td class="hidden-phone">
                          <ul class="icomoon-icons-container">
                      		<a href="index.html"><li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                    		</ul><ul class="icomoon-icons-container">
                      		<a href="index.html"><li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                    		</ul>
                        </td>
                      </tr>
                      <tr>
                        <td><span class="name">3.</span></td>
                        <td class="hidden-phone"><span class="hidden-phone" style="width:10%">PNPA</span> 000003</td>
                        <td class="hidden-phone">2013</td>
            						<td class="hidden-phone">Kementerian Kerja Raya</td>
            						<td class="hidden-phone">Jabatan Kerja Raya</td>
            						<td class="hidden-phone">Komplek Pejabat JKR Selayang </td>
            						<td class="hidden-phone">1105101MYS.101200.BD0002</td>
            						<td class="hidden-phone"><span class="badge badge-inverse">Pembetulan</span></td>
            						<td class="hidden-phone">
                         <ul class="icomoon-icons-container">
                      		<a href="index.html"><li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                    		</ul><ul class="icomoon-icons-container">
                      		<a href="index.html"><li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                    		</ul> 
                        </td>

                        
                      </tr>
                      <tr>
                        <td>4.</td>
                        <td class="hidden-phone"><span class="hidden-phone" style="width:10%">PNPA</span> 000004</td>
                        <td class="hidden-phone">2013</td>
            						<td class="hidden-phone">Kementerian Kerja Raya</td>
            						<td class="hidden-phone">Jabatan Kerja Raya</td>
            						<td class="hidden-phone">Pejabat Ketua Daerah</td>
            						<td class="hidden-phone">1105101MYS.101200.BD0004</td>
            						<td class="hidden-phone"><span class="badge">Deraf</span></td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                      		<a href="index.html"><li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                    		</ul><ul class="icomoon-icons-container">
                      		<a href="index.html"><li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                    		</ul>
                          
                        </td>  
                      </tr>
                      <tr>
                        <td>5</td>
                        <td class="hidden-phone"><span class="hidden-phone" style="width:10%">PNPA</span> 000005</td>
                        <td class="hidden-phone">2013</td>
                       <td class="hidden-phone">Kementerian Kerja Raya</td>

                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">Pejabat Ketua Pengarah</td>
                        <td class="hidden-phone">1105101MYS.101200.BD0005</td>
                        <td class="hidden-phone"><span class="badge badge-warning">Semak</span></td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                      		<a href="index.html"><li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span> </li></a>
                    		</ul><ul class="icomoon-icons-container">
                      		<a href="index.html"><li class="rounded">
                      		<span class="fs1" aria-hidden="true" data-icon="&#xe027;"></span></li></a>
                    		</ul>
                          
                        </td>   
                      </tr>
                    </tbody>
                  </table>

                  <p></p>
                  <p>Memaparkan 5 dari 20 senarai</p>
                   <!--Start div paging -->
                  <div class="pagination no-margin" align="right">
                    <ul>
                      <li>
                        <a href="#" data-original-title="">
                          Pertama
                        </a>
                      </li>
                      <li >
                        <a href="#" data-original-title="">
                          Sebelum
                        </a>
                      </li>
                      <li class="active">
                        <a href="#" data-original-title="">
                          1
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          2
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          3
                        </a>
                      </li>
                      <li>
                        <a href="#" data-original-title="">
                          4
                        </a>
                      </li>
                     
                      <li class="hidden-phone">
                        <a href="#" data-original-title="">
                          Akhir
                        </a>
                      </li>
                    </ul>
                  </div>
                   </div> <!--end page paging -->
                  
                <!--end panel Senarai --> 
                </div>
                </div>
                </div>
                </div>  

               <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>

      