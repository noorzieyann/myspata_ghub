
<!-- breadcrumb START -->
 
<ul class="breadcrumb-beauty">
    <li>
        <a href="#">
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
            Senarai Edaran PSPA(O)
        </a>   
    </li>
</ul>

<br>
        
<!-- breadcrumb END -->




<!-- div widget-body START --> 

<div class="widget-body">
    <ul class="nav nav-tabs no-margin myTabBeauty">
        <li class="active">
            <a data-toggle="tab" href="#pspao" data-original-title="">
                PSPA(O)
            </a>
        </li>
                    
        <li class="">
            <a data-toggle="tab" href="#ptra" data-original-title="">
                PTRA
            </a>
        </li>
                    
        <li class="">
            <a data-toggle="tab" href="#POPA" data-original-title="">
                POPA
            </a>
        </li>
                    
        <li class="">
            <a data-toggle="tab" href="#PNPA" data-original-title="">
                PNPA
            </a>
        </li>
                    
        <li class="">
            <a data-toggle="tab" href="#PPUN" data-original-title="">
                PPUN
            </a>
        </li>
                    
        <li class="">
            <a data-toggle="tab" href="#PLA" data-original-title="">
                PLA
            </a>
        </li>
     </ul>
 

        
           

<!-- div tab START -->

<div class="tab-content" id="myTabContent">
<div id="home" class="tab-pane fade active in">
<p>   
 
    
    
<!-- div panel PSPAO START -->

<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
                        
                    </span> 
                        Maklumat PSPA(O) yang Dipilih
                </div>
            </div>
              
            
            <form class="form-horizontal no-margin">
                <div class="widget-body">
            
                
                <div class="control-group">
                    <label class="control-label" for="email1">
                        PSPA(O) ID
                    </label>
                    <div class="controls">
                        <input class="input-large" type="text"  name="pspao_id" id="pspao_id"/>
                    </div>                      
                </div>
                    
                    
                    
                    
               <div class="control-group">
                    <label class="control-label" for="report_range1">
                        Tempoh Mula
                    </label>
                    <div class="controls">
                    
                    <label>
                    <div class="input-append">
                        <input class="input-large" type="text"  name="tempoh_mula" id="tempoh_mula"/>
                          ?>
                    </div>
                        
                        &nbsp; &nbsp; Hingga
                    <div class="input-append">
                        <input class="input-large" type="text"  name="hingga" id="hingga"/>
                    </div>
                    
                    </label>
                    </div>
              </div>  
                    
                    
                  
             
                <div class="control-group">
                    <label class="control-label">
                        Kementerian
                    </label>
                    <div class="controls">
                    <input class="input-large" type="text"  name="kementerian" id="kementerian"/>
                    </div>
                </div>  
                                     
                    
                <div class="control-group">
                    <label class="control-label">
                        Jabatan/Agensi
                    </label>
                    <div class="controls">
                        <input class="input-large" type="text"  name="jab_agensi" id="jab_agensi"/>
                    </div>
                </div>
                   
                    
                </div>                      
             </form>
            
            
        </div>
    </div> 
</div>

<!-- div panel PSPAO END -->
 


<!-- div panel pilih penerima START -->

<div class="main-container">


    <?php 
$attributes = array(
'class' => 'form-horizontal no-margin', 
'name' => 'senarai_edaran_pspao',
'id' => 'senarai_edaran_pspao',
);
echo form_open('senaraipspao/senarai_edaran_pspao',$attributes); ?>
    
<div class="row-fluid">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Carian Penerima Edaran PSPA(O)
                  </div> 
            </div> 
            
     
            
            <!-- div panel search START -->
            
            <form class="form-horizontal no-margin">
            <div class="widget-body">
            
            
                <div class="control-group">
                    <label class="control-label">
                        Kementerian
                    </label>
                    <div class="controls">
                        <?php echo form_error('kementerian'); ?> 
                    <?php echo form_dropdown('kementerian', $kementerian, 'id="kementerian"');?>
                    </div>
                </div>  
         
            
                <div class="control-group">
                    <label class="control-label">
                        Jabatan/Agensi
                    </label>
                    <div class="controls">
                    <?php echo form_error('jabatan'); ?> 
                        <?php echo form_dropdown('jabatan', $jabatan, 'id="jabatan"');?>
                    </div>
                </div>
            
        
                <div class="control-group">
                    <label class="control-label" for="email1">
                        Kata Carian
                    </label>
                    <div class="controls">
                        <?php echo form_error('katacarian'); ?> 
                         <?php
                          $data = array(
                            'name'        => 'katacarian',
                            'id'          => 'katacarian',
                            'value'       => '',
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => '50',
                            'placeholder' =>  '',
                          );
                          echo form_input($data);
                          ?>
                          </div>                
                    </div>  


                    <div class="control-group">
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
            
            </div>

            <?php  echo form_close();?>
            </form>
            
            <!-- div panel search END -->
     
    
    
            <!-- div panel senarai penerima START -->
            
            <div class="main-container">
    
            <div class="row-fluid">
            <div class="span12">
                <div class="widget">
                    <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
                    </span> Sila Pilih Penerima Edaran PSPA(O)
                  </div> 
            </div> 
                    
                
            
            <div class="widget-body">
                <div id="dt_example" class="example_alt_pagination"> 
                      <?php echo $this->table->generate($dataku); ?>
                       <div id="data-table_info" class="dataTables_info">Memaparkan 1 dari 10 senarai
                       </div>
                       <?php echo $this->pagination->create_links(); ?>
                </div>
                <div class="clearfix">
            </div>
       </div> 
   </div> 

</div> 
       
</div>    
            
            <!-- div panel senarai penerima END -->
   
    
    
        </div> 
    </div> 
</div>

</div>

<!-- div panel pilih penerima END -->



<!-- buttons START--> 
      
<div class="widget-body" align="right">
    <button class="btn btn-danger input-top-margin" type="button">
        Batal
    </button>
          
    <button class="btn btn-success input-top-margin" type="button">
        Hantar
    </button>
</div> 
                
<!-- buttons END--> 




</div>
</div>

<!-- div tab END -->