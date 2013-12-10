<style>
    
    .sort_asc:after {
      content: "▲";
    }
    .sort_desc:after {
      content: "▼";
    }
  </style>

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
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />
    <!--tab navigation--> 
    <div class="widget-body">
                  <ul class="nav nav-tabs no-margin myTabBeauty">
                    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
                    <li class="active"><a href="#profile" data-original-title="">PTRA</a></li>
                    <li class=""><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul> 
                  
  <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">

        <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'dokumen_rujukan',
                           'id' => 'dokumen_rujukan',
                        );
        echo form_open('ptra/dokumen_rujukan',$attributes); ?>

        <!--panel 1-->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Dokumen Rujukan</div>
              </div>
              	<!--table section-->            	
                <div class="widget-body">
                <ul class="icomoon-icons-container">
                    <a href="#myModal"  data-toggle="modal"><li>
                      <span class="fs1" aria-hidden="true" data-icon="&#xe102;"></span>
                      </li>
                    </a>
                   </ul>
                  </ul><label class="tambah">Tambah Dokumen Rujukan</label>
                  
        <!--popup-->
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 id="myModalLabel">
                Dokumen Rujukan
              </h4>
          </div>
            <div class="modal-body">
              <p>
				<form class="form-horizontal no-margin">
                    <div class="control-group">
                      <label class="control-label">
                        1. Tajuk Dokumen
                      </label>
                      <div class="controls">
                        <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls">
                       		 <input class="input-large" type="file" >
                    	</div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        2. Tajuk Dokumen
                      </label>
                      <div class="controls">
                        <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls">
                       		 <input class="input-large" type="file" >
                    	</div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        3. Tajuk Dokumen
                      </label>
                      <div class="controls">
                        <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls">
                       		 <input class="input-large" type="file" >
                    	</div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        4. Tajuk Dokumen
                      </label>
                      <div class="controls">
                        <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls">
                       		 <input class="input-large" type="file" >
                    	</div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        5. Tajuk Dokumen
                      </label>
                      <div class="controls">
                        <input class="input-xlarge" type="text"  name="premis" id="premis"/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">
                        Dokumen Rujukan
                      </label>
                      <div class="controls">
                       		 <input class="input-large" type="file" >
                    	</div>
                    </div>                           
                  </form>
              </p>  
            </div>
            <!--button-->
        	<div class="modal-footer">
        		<a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                <a href="#" class="btn btn-warning2" data-dismiss="modal">Muat naik</a>            
            </div>
            <!--/.END button-->
        </div>
		    <!--/.END popup-->
                                  
                  <!--table section-->              
                <div class="widget-body">

                   <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                  <?php echo $this->table->generate($dataku); ?>
                  </div>
                  <!--/.END table-->

                  <!--pagination-->
                  <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 15 senarai</div>
                  <div class="pagination no-margin" align="right">
                  <!--/END pagination-->  
                  
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        
                        <?php echo $this->pagination->create_links(); ?>                   
                </div>
                <!--/.END table section-->
            </div>
          </div>
        </div>
        <!--/.END panel 2-->
        <?php  echo form_close();?>
    </div>  
      <!--/.END main-container-->
                <!--buttons--> 
                <div class="widget-body" align="right">
                    <button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button>
                  <a href="<?php echo site_url('ptra/kawalan_rekod_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Sebelum
                  </button></a>
                  <a href="<?php echo site_url('ptra/summary_ptra')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Seterusnya
                  </button></a>
                </div> 
                <!--/.END buttons-->                  
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->

    <!-- ALERT -->
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
      
     
      $("hapus1").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghapuskan dokumen ini?", function (e) {
          if (e) {
            alertify.success("Anda klik Ya");
          } else {
            alertify.error("Anda klik Tidak");
          }
        });
        return false;
      };
      
      
      $("hapus2").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghapuskan dokumen ini?", function (e) {
          if (e) {
            alertify.success("Anda klik Ya");
          } else {
            alertify.error("Anda klik Tidak");
          }
        });
        return false;
      };
      
      $("hapus3").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghapuskan dokumen ini?", function (e) {
          if (e) {
            alertify.success("Anda klik Ya");
          } else {
            alertify.error("Anda klik Tidak");
          }
        });
        return false;
      };
      
     
</script>