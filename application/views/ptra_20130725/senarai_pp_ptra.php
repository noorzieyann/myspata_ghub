  
    <!--tab navigation--> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a data-toggle="tab" href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">POPA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PNPA</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PPUN</a></li>
                    <li class=""><a data-toggle="tab" href="#profile" data-original-title="">PLA</a></li>
                  </ul>
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">
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
                  <form class="form-horizontal no-margin">
                    <div class="control-group">
                      <label class="control-label" for="tahun">
                        Tahun
                      </label>
                      <div class="controls controls-row">
                        
                        <select id="tahun">
                          <option>
                            - Sila Pilih -
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
                      </div>
                    </div>
                  
                    <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                        <input type="text" placeholder="Kementerian Kerja Raya" disabled name="kementerian" id="kementerian">
                      </div>
                    </div>                   
                    <div class="control-group">
                      <label class="control-label">
                        Jabatan/Agensi
                      </label>
                      <div class="controls">
                        <select id="jab_agensi">
                          <option>- Sila Pilih -</option>
                          <option>JKR</option>
                          <option>KKR</option>
                          <option>JPS</option>
                          <option>JPA</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Premis
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text"  name="premis" id="premis"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="email1">
                        No DPA
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text"  name="nodpa" id="nodpa"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Status
                      </label>
                      <div class="controls">
                        <select id="status">
                          <option>- Sila Pilih -</option>
                          <option>Sah</option>
                          <option>Pembetulan</option>
                          <option>Deraf</option>
                          <option>Lulus</option>
                        </select>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="email1">
                        Kata Carian
                      </label>
                      <div class="controls">
                        <input class="input-large" type="text"  name="carian" id="carian"/>
                        <div class="widget-body">
                  		  <ul class="icomoon-icons-container pull-right">
                            <li class="rounded">
                              <span class="fs1" aria-hidden="true" data-icon="&#xe07f;"></span>
                    		</li>
                          </ul>
                        </div>                        
                      </div>                      
                    </div>
                    
                  </form>
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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai PTRA
                </div>
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
                        <th style="width:8%" class="hidden-phone">
                          PTRA Id
                        </th>
                        <th style="width:8%" class="hidden-phone">
                          Tahun</th>
                        <th style="width:12%" class="hidden-phone">
                          Kementerian</th>
                        <th style="width:12%" class="hidden-phone">
                          Jabatan/Agensi</th>
                        <th style="width:12%" class="hidden-phone">
                          Premis</th>
                        <th style="width:12%" class="hidden-phone">
                          No DPA</th>
                        <th style="width:6%" class="hidden-phone">
                          Status
                        </th>
                        <th style="width:12%" class="hidden-phone">
                          Tindakan
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
                        <td class="hidden-phone">PTRA000001</td>
                        <td class="hidden-phone">
                          2003
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Sekolah Menengah Bangi
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-info">
                            Sah
                          </span>
                        </td>
                        <td class="hidden-phone">                         <ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul>                    
                      </td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            2
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000002                        </td>
                        <td class="hidden-phone">
                          2006
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Pejabar Daerah Gombak
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge">
                            Deraf
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            3
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000003                        </td>
                        <td class="hidden-phone">
                          2009
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Bahagian Teknologi Negeri Selangor</td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-warning">
                            Semak
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            4
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000004</td>
                        <td class="hidden-phone">
                          2012
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Pejabat Ketua Pengarah
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge badge-info">
                            Sah
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></td>
                      </tr>
                      <tr>
                        <td>
                          <span class="name">
                            5
                          </span>
                        </td>
                        <td class="hidden-phone">PTRA000005</td>
                        <td class="hidden-phone">
                          2015
                        </td>
                        <td class="hidden-phone">Kementerian Kerja Raya</td>
                        <td class="hidden-phone">Jabatan Kerja Raya</td>
                        <td class="hidden-phone">
                          Kompleks Pejabat JKR
                        </td>
                        <td class="hidden-phone">1101MYS.050700.BB0001</td>
                        <td class="hidden-phone">
                          <span class="badge">
                            Deraf
                          </span>
                        </td>
                        <td class="hidden-phone"><ul class="icomoon-icons-container">
                        <li class="rounded"><span class="fs1" aria-hidden="true" data-icon="&#xe026;"></span></li></ul></td>
                      </tr>
                    </tbody>
                  </table>
                  <!--/.END table-->
                  <!--pagination-->
                  <p>Memaparkan 5 dari 10 senarai</p>
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
                          Seterusnya
                        </a>
                        </li>
                      <li class="hidden-phone">
                        <a href="#" data-original-title="">
                          Akhir
                        </a>
                      </li>
                    </ul>
                  </div>
                  <!--/END pagination-->                     
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 2-->
	  </div>  
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->