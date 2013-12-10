<!--<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Arahan Penyediaan Pelan Tahunan 
                </div>
                </div>

              <form id="" class="" method="post" action="<?php //echo site_url(); ?>/pnpa/arahan_penyediaan_pnpa_awal" >  
              <div class="widget-body">
                  
                  <label> Sila buat pilihan peranan Pengawal</label><br>
              <div class="control-group"> 
                <select name="pegawai">
                 
                  <option value="pof" id="pof">Pegawai Operasi Fasiliti</option>
                  <option name="ppd" value="8">Pegawai Penyedia Dokumen</option>
                  <option name="pif" value="7">Pegawammmi Inspektorat Fasiliti</option>
                  </select>
                 <div class="co                                                                                                              mntrols"> 
                  
                   <input type="submit" value="Papar Senarai" class="btn">

                 </div>
               </div>
              </div>
                 </form>
            </div>

          </div>
          
         
    </div>
-->

    <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Arahan Penyediaan Pelan Tahunan 
                </div>
                </div>
                 <div class="widget-body">
               
                <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'arahan_penyediaan_pnpa_awal',
                           'id' => 'arahan_penyediaan_pnpa_awal',
                        );
                    echo form_open('pnpa/arahan_penyediaan_pnpa_awal/'.$this->uri->segment(3) ,$attributes); ?>
                   
                  
                  <label> Sila buat pilihan peranan Pengawai</label><br>
             <table>  <tr><td>
               
               
              <?php 
                  $options = array(
                  'pof'  => 'Pegawai Operasi Fasiliti',
                  'ppd'    => 'Pegawai Penyedia Dokumen',
                  'pif'   => 'Pegawai Inspektorat Fasiliti',
                  
                );


              echo form_dropdown('pegawai', $options, 'large'); ?>
             </td><td width="20%"></td>
             <td>   
            
                  
                  
        <?php
        $seterusnya = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-primary',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Papar Senarai'
        );

        echo form_button($seterusnya);
        
        ?>
 
                 
             </td></tr>
             </table><?php  echo form_close();?>
             
             <div class="clearfix"></div>
               <div class="clearfix"></div>
              </div>
                
            </div>

          </div>
          
         
    </div>