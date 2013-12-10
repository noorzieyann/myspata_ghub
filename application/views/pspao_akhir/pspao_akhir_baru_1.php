<?php //if($testing_debug){echo $testing_debug;} ?>
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
                        PSPA(O) Awal
                      </a>   
                    </li>
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  

          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                 <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Ukuran & Sasaran
                  </div>
                </div>
                <div class="widget-body">
              
                  
                  
                        
                <?php //echo validation_errors(); ?>
                  
                      <?php 
                       $attributes = array(
                           'class' => 'form-horizontal no-margin', 
                           'name'  => 'ukuran_sasar_ppd',
                           'id'    => 'ukuran_sasar_ppd',
                        );
                    echo form_open('pspao/pspao_akhir_baru_1/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes); ?>
                     
                     <div id="dt_example" class="example_alt_pagination">   
                    
                
                     <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th style="width:30%">Ukuran</th>
                        <th style="width:30%">Sasaran(%)</th>
                        <th style="width:80%">Kenyataan</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <?php  foreach ($ukuran_value as $row3) :
                       echo '<input type="hidden" name="pspa_obj_id['.$row3->utiliti_ukuran_id.']" value="'.$row3->pspa_obj_id.'">';                   
                     
                      ?>
                      <?php endforeach; ?>
                 

                      <?php                          

                      $i=1; if(!empty($ukuran_data)) : foreach ($ukuran_data as $row1) : 

                     // echo $row->ukuran_kat_id;
                      ?>
                      <?php if($row1->node_type==0 && $row1->sort==0 ) { ?>
                      <tr>
                        <td colspan="3"><?php echo $i.'. '.$row1->ukuran_tajuk;?></td>
                       
                       
                      </tr>
                      <?php $i++; }  

                      if(!empty($ukuran_value)) : foreach ($ukuran_value as $row) :  

                     
                      ?>

                    <?php if($row1->utiliti_ukuran_id== $row->sort){ ?>
                        <tr>
                        <td>
                       
                        <?php echo $row->ukuran_tajuk; ?>

                    
                         </td>
                        
                        <td>
                        <?php
                          
                          $data = array(
                            'name'        => 'sasaran['.$row->utiliti_ukuran_id.']',
                            'id'          => 'sasaran['.$row->utiliti_ukuran_id.']',
                            'value'       => $row->kandungan_sasaran,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                        
                        </td>
                        <td>
                         <?php
                          
                          $data = array(
                            'name'        => 'kenyataan['.$row->utiliti_ukuran_id.']',
                            'id'          => 'kenyataan['.$row->utiliti_ukuran_id.']',
                            'value'       => $row->kandungan_kenyataan,
                            'rows'        => '5',
                            'cols'        => '10',
                            'style'       => 'height: 80px',
                            'class'       => 'input-block-level',
                            'placeholder' =>  '',
                          );

                          echo form_textarea($data);
                          
                          ?>
                        </td>
                        
                      </tr>
                         <?php } ?>
                     <?php endforeach; ?>
                  <?php endif; ?>
                      <?php endforeach; ?>
                  <?php endif; ?>

                    
                    </tbody>
                  </table>
                  

  </div>
 
                  
          
         <div class="next-prev-btn-container pull-right">

        <?php echo form_submit('hantar', 'Sebelum','class="btn btn-primary"'); ?>
        <?php echo form_submit('hantar', 'Seterusnya','class="btn btn-primary"'); ?>
         
         
         </div>
         
         
 <div class="clearfix"></div> 



                
           <?php  echo form_close();?>
              </div>
            </div>

          </div>
          
         

        </div>
