    <!--yann 271113-->
   <?php  $sessionarray = $this->session->all_userdata();
  $attributes = array(
                      'class' => 'form-horizontal no-margin', 
                      'name'  => 'status_premis_ptra',
                      'id'    => 'status_premis_ptra',
                     );
                
                echo form_open('ptra/status_premis_ptra_copy/'.$this->uri->segment(3).'/'.$this->uri->segment(4) ,$attributes); ?>
            
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
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
     <br />
     
    <!--breadcrumb-->
         <!--start panel Senarai -->
         <div class="clearfix"></div>
         <?php if(!empty($tab)) { echo $tab;} ?>
     <div class="row-fluid">
        <div class="span12">
           <div class="widget">
              <div class="widget-header">
                 <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Status Premis
                 </div>
               </div>
             <div class="widget-body">
              <div class="widget-body">
                    <div>  <label>
                    
                    <?php
                              $data = array(
                              'name'        => 'status',
                              'id'          => 'status',
                              'value'       => 'baru',
                              'checked'     => '',
                              'style'       => 'margin:10px',
                              );

                          echo form_radio($data);
                        ?>
                    Baru
                  </label></div>
                    <div>
                  <label>
                    <?php
                              $data = array(
                              'name'        => 'status',
                              'id'          => 'status',
                              'value'       => 'sedia',
                              'checked'     => '',
                              'style'       => 'margin:10px',
                              );

                          echo form_radio($data);
                        ?>
                    Sedia Ada
                  </label>
                </div>                
                
                  </div>
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
                  
                    <div class="widget-body">
                     <div> <label>
                     <?php
                              $data = array(
                              'name'        => 'kataset',
                              'id'          => 'kataset',
                              'value'       => 'bangunan',
                              'checked'     => '',
                              'style'       => 'margin:10px',
                              );

                          echo form_radio($data);
                        ?>
                    Bangunan
                  </label> </div> 
                   <div> <label>
                    <?php
                              $data = array(
                              'name'        => 'kataset',
                              'id'          => 'kataset',
                              'value'       => 'jalan',
                              'checked'     => '',
                              'style'       => 'margin:10px',
                              );

                          echo form_radio($data);
                        ?>
                    Jalan
                  </label> </div> 
                  <div>  <label>
                     <?php
                              $data = array(
                              'name'        => 'kataset',
                              'id'          => 'kataset',
                              'value'       => 'pembetungan',
                              'checked'     => '',
                              'style'       => 'margin:10px',
                              );

                          echo form_radio($data);
                        ?>
                   Pembetungan
                  </label> </div> 
                   <div> <label>
                     <?php
                              $data = array(
                              'name'        => 'kataset',
                              'id'          => 'kataset',
                              'value'       => 'saliran',
                              'checked'     => '',
                              'style'       => 'margin:10px',
                              );

                          echo form_radio($data);
                        ?>
                    Saliran
                  </label> <div> 
                </div>                
             
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
                     <?php
                       $hantar= array(
                           'name'    => 'batal',
                           'id'      => 'batal',
                           'class'   => 'btn btn-danger input-top-margin',
                           'value'   => 'batal',
                           'type'    => 'Submit',
                           'content' => 'Batal'
                       );

                       echo form_button($hantar);

                       ?>  
                   
                     <?php
                       $hantar= array(
                           'name'    => 'hantar',
                           'id'      => 'hantar',
                           'class'   => 'btn btn-primary input-top-margin',
                           'value'   => 'hantar',
                           'type'    => 'Submit',
                           'content' => 'Seterusnya'
                       );

                       echo form_button($hantar);

                       ?>  
                  
                </div> 
                <!--/.END buttons--> 
     </div>  
      <!--/.END main-container-->               
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->