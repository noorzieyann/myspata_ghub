<!-- page: senarai ppd popa, by seri idayu, 19092013 -->



<!-- breadcrumb START -->
<div class="widget-body">
<ul class="breadcrumb-beauty">
    <li>
        <a href="<?php echo site_url('main')?>">
            Fungsi
        </a> 
    </li>
    <li>
        <a href="#">
            Perancangan
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
            POPA
        </a>   
    </li>
</ul>
</div>
<br>
<!-- breadcrumb END -->




<!-- div widget-body START -->
<div class="widget-body"> 
    <ul class="nav nav-tabs no-margin myTabBeauty"> 
        <li class=""> 
            <a href="#profile" data-original-title="">PSPA(O)</a>
        </li> 
                
        <li class=""> 
            <a href="<?php echo site_url('ptra/senarai_ppd_ptra')?>">PTRA</a> 
        </li> 
                
        <li class="active"> 
            <a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a>
        </li>
                
        <li class=""> 
            <a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a>
        </li>
                
        <li class=""> 
            <a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a>
        </li> 
                
        <li class=""> 
            <a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a>
        </li>   
    </ul> 
    
    
    
    
<!-- div tab START -->
<div class="tab-content" id="myTabContent"> 
    <div id="home" class="tab-pane fade active in">  
    <p>

      <?php 
        $attributes = array(
          'class' => 'form-horizontal no-margin', 
          'name' => 'senarai_ppd_popa',
          'id' => 'senarai_ppd_popa',
        );
        echo form_open('popa/senarai_ppd_popa',$attributes); 
      ?>   
        
        
        

<!-- div panel senarai START -->
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Senarai POPA
                  </div> 
            </div> 
                
            

            <!-- tambah POPA START -->
            <div class="widget-body">
              <ul class="icomoon-icons-container">
                <a href="<?php echo site_url('popa/kandungan_popa')?>">
                  <li>
                    <span class="fs1" aria-hidden="true" data-icon="&#xe102;">
                    </span>
                  </li>
                </a>
              </ul>
              <label class="tambah">
                Tambah POPA
              </label>
              <div class="clearfix">
              </div>
            <!-- tambah POPA END -->



            <!-- table section START -->  
              <div id="dt_example" class="example_alt_pagination">
                <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                  <thead>
                    <tr>
                      <th style="width:17%">
                        Bil
                      </th>
                      <th style="width:20%">
                        POPA ID
                      </th>
                      <th style="width:16%">
                        Tahun
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Kementerian 
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Jabatan/Agensi
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Premis
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        No DPA
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Status
                      </th>
                      <th style="width:16%" class="hidden-phone">
                        Tindakan
                      </th>
                    </tr>
                  </thead> 


                  <tbody>
                    <?php $i=1; if(!empty($senaraipopa)) : foreach ($senaraipopa as $rec) : ?>
                    <?php echo form_open('admin/update'); ?>
                        
                    <tr>
                      <td align="left">
                        <?php echo $i++; ?>
                      </td>
                      <td>
                        <?php echo 'POPA0000'. $rec->popa_id; ?>
                      </td>
                      <td>
                        <?php echo $rec->tahun;?>
                      </td>
                      <td>
                        <?php if($getkementerian = $this->popa_model->get_kem_list($rec->idkem))
                        foreach ($getkementerian as $rr) 
                        echo $rr->namakem;?>
                      </td>
                      <td>
                        <?php if($getjabatan = $this->popa_model->get_jab_list($rec->idjab_agensi))
                        foreach ($getjabatan as $rr) 
                        echo $rr->nama_jab_agensi;?>
                      </td>
                      <td>
                        <?php if($getpremis = $this->popa_model->get_prem_list($rec->idpremis_kategori))
                        foreach ($getpremis as $rr) 
                        echo $rr->jenis_premis;?>
                      </td>
                      <td>
                        <?php echo $rec->nodpa;?>
                      </td>
                      <td>
                        <?php if($getstatus = $this->popa_model->get_stat_list($rec->pspa_id))
                        foreach ($getstatus as $rr) 
                        echo $rr->status_id ;?>
                      </td>
                      <td align="center">
                        <ul class="icomoon-icons-container">
                          <a href="<?php echo site_url('popa/summary_pp_popa_editpp')?>">
                            <li class="rounded">
                              <span class="fs1" data-icon="&#xe026" aria-hidden="true">
                              </span>
                            </li>
                          </a>
                        </ul>
                      </td>
                    </tr>
                  

                    <?php echo form_close(); ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>

                
                <div class="clearfix">
                </div>
                
              </div>
            </div> 
            <!-- table section END -->
    

        </div> 
    </div>
</div>
<!-- div panel senarai END -->



    </div>
</div>
<!-- div tab END -->




<!-- script untuk validate START -->
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
      
     
      $("salinpp").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin rekod ini?", function (e) {
          if (e) {
            alertify.success("Anda Klik YA");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
      
      $("salinptf").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin rekod ini?", function (e) {
          if (e) {
            alertify.success("Anda Klik YA");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
      $("salinppd").onclick = function () {
        reset();
        alertify.confirm("Adakah anda ingin menyalin rekod ini?", function (e) {
          if (e) {
            alertify.success("Anda Klik YA");
          } else {
            alertify.error("Anda Klik Tidak");
          }
        });
        return false;
      };
      
     
</script>
<!-- script untuk validate END -->

      
