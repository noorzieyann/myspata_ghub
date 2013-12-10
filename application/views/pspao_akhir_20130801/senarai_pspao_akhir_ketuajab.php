
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
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />
		<div class="widget-body">
                    <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class="active"><a href="<?php echo site_url('pspao/senarai_pspao_akhir_ketuajab')?>" data-original-title="">PSPA(O)</a></li>
                    <li class=""><a href="<?php echo site_url('ptra/senarai_ptf_ptra')?>" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ptf_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ptf_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ptf_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ptf_pla')?>">PLA</a></li>
                  </ul>
                  
          <!--start div tab -->
          <div class="tab-content" id="myTabContent">
            <div id="home" class="tab-pane fade active in">
                <p> 
                    
                    <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'senarai_pspao_akhir_ketuajab',
                           'id' => 'senarai_pspao_akhir_ketuajab',
                        );
                    echo form_open('pspao/senarai_pspao_akhir_ketuajab',$attributes); ?>
                    
                    
                 <!--start div panel PSPAO -->
                  <div class="row-fluid">
                    <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                      <div class="title">
                      <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Strategi Pengurusan Aset (PSPAO) Akhir
                      </div>
                      </div> 
                      <form class="form-horizontal no-margin">
                      <div class="widget-body">
                        <div class="control-group">
                        <label class="control-label">Tahun</label>
                         <div class="controls">
                         <?php echo form_error('tahun'); ?> 
                         <?php echo form_dropdown('tahun', $year_list, 'id="tempoh_mula"');?>
                      </div></div>

<?php /*
                        <div class="control-group">
                        <label class="control-label">Kementerian</label>
                        <div class="controls"><?php
                          
                          $data = array(
                            'name'        => 'kementerian',
                            'id'          => 'kementerian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-large',
                            'placeholder' =>  'Kementerian Kerja Raya',
                          );

                          echo form_input($data);
                          
                          ?></div>
                        </div>
*/?>
                   
                        <div class="control-group">
                        <label class="control-label">Jabatan/Agensi</label>
                        <div class="controls">
                            <?php echo form_error('jabatan'); ?> 
                          <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>                    
                        </div>
                        </div>
                    
<?php /*
                        <div class="control-group">
                          <label class="control-label">Premis</label>
                        <div class="controls">
                            <?php echo form_error('premis'); ?>
                          <?php
                          
                          $data = array(
                            'name'        => 'premis',
                            'id'          => 'premis',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-large',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                        </div>
                        </div>

                        <div class="control-group">
                          <label class="control-label">No DPA</label>
                        <div class="controls">
                            <?php echo form_error('no_dpa'); ?>
                         <?php
                          
                          $data = array(
                            'name'        => 'no_dpa',
                            'id'          => 'noDPA',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-large',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                        </div>
                        </div>
*/?>
                    
                        <div class="control-group">
                          <label class="control-label">Status</label>
                        <div class="controls">
                          <?php echo form_error('status'); ?> 
                          <?php echo form_dropdown('status', $status, 'id="status_id"');?>
                        </div>
                        </div>
                    
                      <div class="control-group">
                        <label class="control-label">Kata Carian</label>
                      <div class="controls">
                          <?php echo form_error('katacarian'); ?> 
                         <?php
                          
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'input-large',
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
            'content' => ' Carian',
            'type'    => 'submit',
            'data-icon' => '&#xe07f;'
        );

        echo form_button($seterusnya);
        
        ?>
                       
                      </div>
</div>
 <?php  echo form_close();?>
                    <!--end panel PSPAO -->
                    
                    
                    
                    </div></div></div>

              <!--start panel Senarai -->
                <div class="row-fluid">
                <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai PSPA(O)
                  </div>
                  </div>
                <div class="widget-body">
                        <div class="widget-body">
                           
                      <ul class="icomoon-icons-container">
                      	<a href="<?php echo site_url('pspao/pspao_akhir_baru') ?>"><li>
                      	  <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                      	</li></a>
                      </ul><label class="tambah">Tambah PSPA(O) Baru</label>                      

                      <div id="dt_example" class="example_alt_pagination">

                      <?php echo $this->table->generate($dataku); ?>
                       <div id="data-table_info" class="dataTables_info">Memaparkan <?php echo $this->uri->segment(3)+5; ?> dari <?php echo count($this->pspao_akhir_model->get_data_dummy()) ?> senarai
                       </div><?php echo $this->pagination->create_links(); ?>
 </div>
                    <!-- <div id="dt_example" class="example_alt_pagination">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left dataTable" id="data-table" aria-describedby="data-table_info" >
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
                      </tr><tr>
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
                         <div class="clearfix">
                    </div>
                     <div class="dataTables_info" id="data-table_info">Showing 1 to 10 of 40 entries</div>
                     <div class="dataTables_paginate paging_full_numbers" id="data-table_paginate">
                         <a tabindex="5" class="first paginate_button paginate_button_disabled" id="data-table_first">First</a>
                         <a tabindex="5" class="previous paginate_button paginate_button_disabled" id="data-table_previous">Previous</a>
                         <span><a tabindex="5" class="paginate_active">1</a>
                             <a tabindex="10" class="paginate_button">2</a>
                             <a tabindex="15" class="paginate_button">3</a>
                             <a tabindex="20" class="paginate_button">4</a></span>
                         <a tabindex="5" class="next paginate_button" id="data-table_next">Next</a>
                         <a tabindex="5" class="last paginate_button" id="data-table_last">Last</a>
                     </div></div></div>
                    
                    
                 <!-- </div>
                  <p></p>
                  <p>Memaparkan 5 dari 20 senarai</p>
                   <!--Start div paging 
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
                   </div>--> <!--end page paging -->
                  
                <!--end panel Senarai --> 
                 <div class="clearfix"></div>
                </div>
                </div>
                </div> 
                    

               <!--end div tab -->
                </div>  
                </div>

              <!--end widget-body -->
                </div>
          </div>

      

      