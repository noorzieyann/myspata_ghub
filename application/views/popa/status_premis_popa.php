<!-- page: status premis popa, by seri, 10092013 -->


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
        POPA
      </a>   
    </li>
  </ul>
</div>

<br />
<!-- breadcrumb END -->




<!-- navigation tab START --> 
<div class="widget-body">
  <ul class="nav nav-tabs no-margin myTabBeauty">
    <li class=""><a href="#profile" data-original-title="">PSPA(O)</a></li>
    <li class=""><a href="#profile" data-original-title="">PTRA</a></li>
    <li class="active"><a href="<?php echo site_url('popa/senarai_ppd_popa')?>">POPA</a></li>
    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
    <li class=""><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
  </ul>
    



  <!-- section tab START -->
  <div class="tab-content" id="myTabContent">
    <div id="home" class="tab-pane fade active in">
      <?php 
        $attributes = array(
                            'class' => 'form-horizontal no-margin', 
                            'name' => 'sedia_kandungan_ppun',
                            'id' => 'sedia_kandungan_ppun',
                           );
                      echo form_open('popa/kandungan_popa',$attributes); 
      ?>


      
      <!-- main container START -->
      <div class="main-container">



        <!-- big panel START -->  
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                  <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                  </span> Status Premis
                </div>
              </div>
             

              <div class="widget-body">
                <form class="form-horizontal no-margin">    
                  <div class="widget-body">
                    <label class="radio">
                      <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                        Baru
                    </label>
                    <label class="radio">
                      <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Sedia Ada
                    </label>
                  </div>                
                </form>


                <!-- second panel START --> 
                <div class="row-fluid">
                  <div class="span12">
                    <div class="widget">
                      <div class="widget-header">
                        <div class="title">
                          <span class="fs1" aria-hidden="true" data-icon="&#xe14c;">
                          </span> Kategori Aset 
                        </div>
                      </div>
                    <div class="widget-body">
                  
                    <form class="form-horizontal no-margin">  
                      <div class="widget-body">
                        <label class="radio">
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                            Bangunan
                        </label>
                        <label class="radio">
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            <a href = "<?php echo site_url('popa/kat_jalan_popa')?>">
                              Jalan
                            </a>
                        </label>
                        <label class="radio">
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                            <a href = "<?php echo site_url('popa/kat_pembetungan_popa')?>">
                              Pembetungan
                            </a>
                        </label>
                        <label class="radio">
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            <a href = "<?php echo site_url('popa/kat_saliran_popa')?>">
                              Saliran
                            </a>
                        </label>
                      </div>                
                    </form>

                    </div>
                    </div>
                  </div>
                </div>
                <!-- second panel END -->



              </div>         
            </div>
          </div>
        </div>
        <!-- big panel END --> 



        <!-- button START --> 
        <div class="widget-body" align="right">
          <button class="btn btn-danger input-top-margin" type="button">
            Batal
          </button>
          <a href="<?php echo site_url('popa/kat_bangunan_popa')?>">
            <button class="btn btn-primary input-top-margin" type="button">
              Seterusnya
            </button>
          </a>
        </div> 
        <!-- button END --> 



      </div>  
      <!-- main container END --> 



    </div>                  
  </div>
  <!-- section tab END -->


</div>  
<!-- navigation tab END -->

