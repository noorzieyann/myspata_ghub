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
      <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'status_premis_ptra_editppd',
                           'id' => 'status_premis_ptra_editppd',
                        );
                    echo form_open('ptra/status_premis_ptra_editppd',$attributes); ?>
      <!--main container-->
      <div class="main-container">
     <!--big panel-->  
     <div class="row-fluid">
        <div class="span12">
           <div class="widget">
              <div class="widget-header">
                 <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Status Premis
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
              <!--panel 2--> 
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Kategori Aset 
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
                    <a href = "<?php echo site_url('ptra/kat_jalan_ptra1')?>">Jalan</a>
                  </label>
                  <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                    <a href = "<?php echo site_url('ptra/kat_pembetungan_ptra1')?>">Pembetungan</a>
                  </label>
                  <label class="radio">
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                    <a href = "<?php echo site_url('ptra/kat_saliran_ptra1')?>">Saliran</a>
                  </label>
                </div>                
              </form>
               </div>
              </div>
            </div>
          </div>
          <!--/.END panel 2--> 
             </div>         
           </div>
        </div>
     </div>
     <!--/.END big panel-->     
     <!--buttons--> 
                <div class="widget-body" align="right">
                    <a href="<?php echo site_url('ptra/summary_ptra_editppd')?>"><button class="btn btn-danger input-top-margin" type="button">
                    Batal
                  </button></a>
                  <a href="<?php echo site_url('ptra/kat_bangunan_ptra_editppd')?>"><button class="btn btn-primary input-top-margin" type="button">
                    Seterusnya
                  </button></a>
                </div> 
                <!--/.END buttons--> 
     </div>  
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->