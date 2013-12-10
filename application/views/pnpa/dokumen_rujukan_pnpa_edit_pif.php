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
    
          <!--tab section-->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <!--main container-->
      <div class="main-container">
          
          <?php 
                        echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

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

        <!--panel 1-->       
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Dokumen Rujukan Penilaian Aset
                </div>
              </div>
                <!--table section-->              
                <div class="widget-body"> 
                            
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:1%">Bil</th>
                          <th style="width:20%">Tajuk Dokumen</th>
                          <th style="width:20%">Dokumen Rujukan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_dokumen)) : foreach ($senarai_dokumen as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo $rec->nama_fail; ?></td>
                                <td>
                                  <a href="<?php echo site_url('pnpa/muat_dokumen_rujukan_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$rec->lampiran_id);?>">
                                    <?php echo $rec->nama_fail_asal; ?>
                                  </a>
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
    
                <!--start div button -->
                <div align="right">
                <a href="<?php echo site_url('pnpa/summary_pif_pnpa/'.$this->uri->segment(3).'/'.$this->uri->segment(4)) ?>"><button class="btn btn-primary input-top-margin" type="button">
                        Kembali
                  </button></a>
         </div>
                <!--end div button -->
                
                </div>  
      <!--/.END main-container-->                 
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
  
 