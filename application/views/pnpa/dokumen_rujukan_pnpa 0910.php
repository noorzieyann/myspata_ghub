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
         <div class="tab-content" id="myTabContent">
         <div id="home" class="tab-pane fade active in">
         <p>
           <form class="form-horizontal no-margin">
               <div class="widget-body"> 
             
       			 	<div class="row-fluid">
            	<div class="span12">
              	<div class="widget">
                <div class="widget-header">
                <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span>  Dokumen Rujukan Aset</div></div>
                <div class="widget-body">
                <ul class="icomoon-icons-container">
                          <li><a href="#myModal"  data-toggle="modal">
                    <span class="fs1" data-icon="&#xe102;" aria-hidden="true"></span>
                  </a></li></ul>
                       <label class="tambah"> Tambah Dokumen Rujukan Aset</label>
                    
                          <!-- Modal -->
                  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                      </button>
                      <h4 id="myModalLabel">
                        Dokumen Rujukan Aset
                      </h4>
                    </div>
                    <div class="modal-body">
                      <p>
                       
                    <div class="control-group">
                      <label class="control-label">1.Tajuk Dokumen
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">      Dokumen Rujukan
                      </label>
                    <div class="controls">
                        <input class="input-large" type="file" >
                    </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label">2.Tajuk Dokumen
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">      Dokumen Rujukan
                      </label>
                    <div class="controls">
                        <input class="input-large" type="file" >
                    </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label">3.Tajuk Dokumen
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">      Dokumen Rujukan
                      </label>
                    <div class="controls">
                        <input class="input-large" type="file" >
                    </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label">4.Tajuk Dokumen
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">      Dokumen Rujukan
                      </label>
                    <div class="controls">
                        <input class="input-large" type="file" >
                    </div>
                    </div>
                     <div class="control-group">
                      <label class="control-label">5.Tajuk Dokumen
                      </label>
                    <div class="controls">
                        <input class="input-large" type="text" >
                    </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label">      Dokumen Rujukan
                      </label>
                    <div class="controls">
                        <input class="input-large" type="file" >
                    </div>
                    </div>
                    	
                   
                  	
                    	
                      </p>
                    </div>
                   <div class="modal-footer">
                   <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
                   <a href="#" class="btn btn-warning2" data-dismiss="modal">Muat Naik</a></div>
                  </div>             
                  	 <div class="clearfix"></div>
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">Bil</th>
                          <th style="width:20%">Tajuk Dokumen</th>
                          <th style="width:20%">Dokumen Rujukan</th>
                          <th style="width:8%">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_dokumen)) : foreach ($senarai_dokumen as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo $rec->lamp_nama_fail; ?></td>
                                <td><?php echo $rec->lamp_nama_fail_asal; ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a href="<?php echo site_url('ptra/summary_pp_ptra_editpp')?>"><li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1"></span></li></a>
                                    </ul>
                                </td>
                            </tr>
                            <?php echo form_close(); ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--END table-->
                    <div class="clearfix">
                    </div>
                    
                  </div>
                </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
          <!--END panel 2-->
    
                <!--buttons--> 
            	<div align="right">
            		<button class="btn btn-danger input-top-margin" type="button">
                        Batal
                  </button>
                     <a href="<?php echo site_url('pnpa/kawalan_rekod_pnpa') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Sebelum
                      </button></a>
                      <a href="<?php echo site_url('pnpa/summary_ppd_pnpa_edit') ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Seterusnya
                      </button></a> </form>
           	  </div>
                
                
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
      
     
      $("delete").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menghapuskan rekod ini?", function (e) {
          if (e) {

            alertify.success("Rekod ini telah dihapuskan");
            
          } else {
            
          }
        });
        return false;
      };

      
     
      
     
</script>
  
 