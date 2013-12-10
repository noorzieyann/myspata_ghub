<style>
.brand-ppun {
    float: left;
    width: 200px;
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
                        PPUN
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
                    <li class=""><a href="<?php echo site_url('pnpa/senarai_ppd_pnpa')?>">PNPA</a></li>
                    <li class="active"><a href="<?php echo site_url('ppun/senarai_ppun')?>">PPUN</a></li>
                    <li class=""><a href="<?php echo site_url('pla/senarai_ppd_pla')?>">PLA</a></li>
                  </ul>
                  
                  
            <div class="tab-content" id="myTabContent">
              <div id="ppun" class="tab-pane fade active in">
          
                  
                   <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'treeviewskop_ppun',
                           'id' => 'treeviewskop_ppun',
                        );
                   echo form_open('ppun/treeviewskop_ppun',$attributes); ?>



          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14c;"></span> Sila Kemaskini Treeview Berikut
                  </div>
                </div>

              
                    
                    <div class="widget-body">
                        
                        
            
        
                
         
           
                 
                  <!--  <div class="navbar-inner">-->
                    
                        <div class="brand-ppun"><label class="checkbox">
                                <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Pemulihan Aset";
                      ?>

</label></div>
                          
                       <div class="brand-ppun">    <label class="checkbox">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Ubah Suai Aset";
                      ?>
</label></div>
                           
              <div class="brand-ppun">             <label class="checkbox">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Naik Taraf Aset";
                      ?>
</label></div>
                  <div class="clearfix"></div>
                  
                  <label class="checkbox">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Reka bentuk dan skop kerja dilaksanakan secara";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Sumber dalaman";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Sumber luaran";
                      ?>
</label> 

<label class="checkbox checkbox3">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Agensi Teknikal";
                      ?>
</label> 

<label class="checkbox checkbox3">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Perunding";
                      ?>
</label> 

<label class="checkbox">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Kerja Pemulihan";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Skop kerja berdasarkan bentuk sedia ada/asal";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Skop kerja menepati kehendak penyampaian perkhidmatan";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Kos seperti yang dipersetujui";
                      ?>
</label> 

<label class="checkbox">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "*Kerja ubah suai / naik taraf";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Sediakan skop kerja";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Reka bentuk bercirikan kelestarian";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Reka bentuk memenuhi fungsi aset";
                      ?>
</label> 

<label class="checkbox checkbox2">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Reka bentuk mematuhi peraturan";
                      ?>
</label>

<label class="checkbox checkbox3">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "Reka bentuk memenuhi skop";
                      ?>
</label>

<label class="checkbox checkbox3">

 <?php
                      $data = array(
                        'name'        => '',
                        'id'          => '',
                        'value'       => '',
                        'checked'     => '',
                        
                        );

                       echo form_checkbox($data);
                       echo "kos seperti yang telah dipersetujui";
                      ?>
</label>

		
        
         
                 
          
            </div>
            

          </div>
          
         
        <div class="next-prev-btn-container pull-right">
              
        <a href="<?php echo site_url('ppun/senarai_ppun') ?>">
         <?php
        $batal = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Batal'
        );

        echo form_button($batal);
        
        ?>
        </a>
<a href="<?php echo site_url('ppun/model_struktur_ppun') ?>">
        <?php
        $sebelum = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Sebelum'
        );

        echo form_button($sebelum);
        
        ?>
</a>
         <a href="<?php echo site_url('ppun/tskopaktiviti_ppun') ?>">   
        <?php
        $seterusnya = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Seterusnya'
        );

        echo form_button($seterusnya);
        
        ?>
         </a>
</div>
<div class="clearfix"></div>
                

        </div>
        

    </div>

      <!--/.fluid-container-->
      
      
       <?php  echo form_close();?>
        </div>
        
        
       
     
      </div>

  <div id="pspao" class="tab-pane fade active in">
         
         </div>

         <div id="ptra" class="tab-pane fade active in">
         
         </div>

         <div id="popa" class="tab-pane fade active in">
         
         </div>

         <div id="pnpa" class="tab-pane fade active in">
         
         </div>

         <div id="pla" class="tab-pane fade active in">
         
         </div>



      
      </div>
         