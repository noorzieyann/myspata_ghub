
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
                        Permintaan Penyediaan
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        PSPA(O)
                      </a>   
                    </li>
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  

<div class="widget-body">

 
    <!-- form seach peranan -->

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
                    echo form_open('pnpa/arahan_penyediaan_pnpa_awal/'.$this->uri->segment(3),$attributes); ?>
                   
                  
                  <label> Sila buat pilihan peranan Pengawai</label><br>
             <table>  <tr><td>
               
               
              <?php 
                  $options = array(
                  'pof'  => 'Pegawai Operasi Fasiliti',
                  'ppd'    => 'Pegawai Penyedia Dokumen',
                  'pif'   => 'Pegawai Inspektorat Fasiliti',
                  
                );

                $ppd='ppd';
              echo form_dropdown('pegawai', $options, $ppd); ?>
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
             </table>
<br>
<br>

         <?php  echo form_close();?>     
           <div class="clearfix"> </div>
              <div class="clearfix"> </div>
       <!--- arahan sedia --> 
          
<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Sila Pilih Pegawai Inspektorat Fasiliti di Bawah Bagi Penyediaan Pelan Tahunan
                  </div>
                </div>
                
               
                
              <div class="widget-body">
               <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'arahan_penyediaan_pnpa_ppd',
                           'id' => 'arahan_penyediaan_pnpa_ppd',
                        );
                    echo form_open('pnpa/arahan_penyediaan_pnpa_ppd/'.$this->uri->segment(3),$attributes); ?>
                   
                  
               <div id="dt_example" class="example_alt_pagination">   
                    
               
                     <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th style="width:10%">Nama</th>
                        <th style="width:10%">Peranan</th>
                        <th style="width:7%">#</th>
                        
                       
                      </tr>
                    </thead>
                    <tbody>

                       <?php $i=1; if(!empty($user_list)) : foreach ($user_list as $row) : 


                       ?>
                      <tr>
                        <td> <?php echo $i++; ?></td>
                        <td><?php echo $row->nama_user; ?></td>
                        <td>Pegawai Penyedia Dokumen</td>
                        <td><?php
                              $data = array(
                              'name'        => 'userid[]',
                              'id'          => 'userid[]',
                              'value'       => $row->myspata_userid,
                              'checked'     => '',
                              'style'       => 'margin:10px',
                              );

                          echo form_radio($data);
                        ?></td>
                         
                      </tr>

                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>

                
      </div>
      <div class="clearfix"> </div>
            
              </div>
            </div>

          </div>
         </div>

     <!--senarai pilih Pelan -->
    <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Arahan Penyediaan Pelan Tahunan
                  </div>
                </div>
                
              
                
              <div class="widget-body">
                 <table>
                  <tr>
                      <td style="width:2%">      
                      <?php if($this->pnpa_model->get_pelan_ptra($this->uri->segment(3),1)==FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <?php $js = 'onClick="return false"';
                              echo form_checkbox('ptra', '1','' ,$js); ?></label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                           
                               <?php $js = 'onClick="return false"';
                               echo form_checkbox('ptra', '0', TRUE, $js); ?></label>
                        
                        <?php }  ?> 
                        </td>
                        <td style="width:10%">PTRA</td>
                        <td style="width:2%">
                        <?php if($this->pnpa_model->get_pelan_popa($this->uri->segment(3),1)==FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <?php $js = 'onClick="return false"';
                              echo form_checkbox('popa', '1','', $js); ?></label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <?php $js = 'onClick="return false"';
                               echo form_checkbox('popa', '0', TRUE, $js); ?></label>
                        
                        <?php }  ?> </td>
                        <td style="width:10%">POPA</td>
                         <td style="width:2%">
                       <?php if($this->pnpa_model->get_pelan_pnpa($this->uri->segment(3),1)==FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <?php $js = 'onClick="return false"';
                              echo form_checkbox('pnpa', '1','', $js); ?></label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <?php $js = 'onClick="return false"';
                               echo form_checkbox('pnpa', '0', TRUE, $js); ?></label>
                        
                        <?php }  ?> 
                         </td>
                        <td style="width:10%">PNPA</td>
                        <td style="width:2%">
                       <?php if($this->pnpa_model->get_pelan_ppun($this->uri->segment(3),1)==FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <?php $js = 'onClick="return false"';
                              echo form_checkbox('ppun', '1','', $js); ?></label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <?php $js = 'onClick="return false"';
                               echo form_checkbox('ppun', '0', TRUE, $js); ?></label>
                        
                        <?php }  ?> </td>
                        <td style="width:10%">PPUN</td>
                         <td style="width:2%">
                         <?php if($this->pnpa_model->get_pelan_pla($this->uri->segment(3),1)==FALSE)
                                { 
                                 echo ''; 
                                    
                        ?>     <label class="checkbox">
                              <?php $js = 'onClick="return false"';
                              echo form_checkbox('pla', '1', '',$js); ?></label>
                       <?php  }else 
                            
                              {
                                echo ''; 
                       ?>      <label class="checkbox">
                               <?php $js = 'onClick="return false"';
                               echo form_checkbox('pla', '0', TRUE, $js); ?></label>
                        
                        <?php }  ?> 
                         </td>
                        <td style="width:10%">PLA</td>
                       
                        
                       
                      </tr>
                    </table>
               
              </div>
            </div>

          </div>
          
         
    </div>

               <!--ens widget body -->

               
              </div>
                
            </div>

          </div>
          
         
    </div>

         
         <div class="next-prev-btn-container pull-right">
          <a type="button" class="btn btn-success" href="#hantar" data-toggle="modal">Hantar</a>
       </div>
      <div class="clearfix"></div>
</div>


   <!-- modal pengesahan -->         
    
 <div id="hantar" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button>
 <h4 id="myModalLabel">Mesej Pengesahan</h4></div>
 <div class="modal-body"><p>Adakah ingin menghantar arahan penyediaan ini?</p></div>
 <!--button-->
  <div class="modal-footer">
  <?php
                       $batal = array(
                           'name'    => '',
                           'id'      => '',
                           'class'   => 'btn btn-danger input-top-margin',
                           'value'   => '',
                           'type'    => 'button',
                           'content' => 'Tidak',
                           'data-dismiss'=>'modal'
                       );

                       echo form_button($batal);

                       ?>
                       <?php
                       $hantar= array(
                           'name'    => 'hantar',
                           'id'      => 'hantar',
                           'class'   => 'btn btn-info',
                           'value'   => 'hantar',
                           'type'    => 'Submit',
                           'content' => 'Ya'
                       );

                       echo form_button($hantar);

                       ?>                       
                           </div>
                    <!--/.END button--></div>
<!-- modal -->





              <?php  echo form_close();?>

            </div>

             

          </div>
          
         

        </div>
        
        
</div>




    
 