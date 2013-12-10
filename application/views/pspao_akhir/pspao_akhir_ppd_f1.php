<?php
	$sessionarray = $this->session->all_userdata();
	$statusid = $this->uri->segment(5);
?>
<style>
.wysiwyg-container{
	padding-bottom:16px;
	padding-top:4px;
}    
.modal{
	width: 760px !important;
	margin-left: -380px !important;
}
</style>

	<!--breadcrumb -EYO- -->
    <div class="widget-body" style="padding-bottom:20px">
	  <ul class="breadcrumb-beauty">
		<li><a href="<?php echo site_url('main')?>">Fungsi</a></li>
        <li><a href="#">Perangcangan</a></li>
        <li><a href="#">Pelan</a></li>
        <li><a href="#">PSPA(O) Akhir</a></li>
        <li><a href="#">Rumusan PSPA(O) Akhir</a></li>
      </ul>
    </div>
    <!--END breadcrumb-->

<?php
$attributes = array('class' => 'form-horizontal no-margin','name'  => 'ukuran_sasar_pspao','id'    => 'ukuran_sasar_pspao');
echo form_open('pspao/pspao_akhir_ppd_f1/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5),$attributes);
?>

          <?php
		  
		  /*
          echo 'Testing : <br>';
		  echo 'User Group : '.$sessionarray['user_rolegroupid'];
		  echo '<br>Status : '.$statusid ;
		  */
		  
		  ?>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    4.0 Objektif Pengurusan Aset Tak Alih
                  </div>
                </div>
                <div class="widget-body">
                    
                    
                    
                    <div class="wysiwyg-container">
                    <?php if($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                    <textarea id="nowucme" name ="kand_detail" class="input-block-level" style="height: 80px"><?php echo $kandungan ?></textarea>
                    <?php }else{ ?>
                    <textarea id="kand_detail" name ="kand_detail" class="input-block-level" disabled="disabled" style="height: 80px"><?php echo $kandungan ?></textarea>
                    <?php }?>
                    </div>
  
  
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
                            'placeholder' =>  ''
                          );
						  
						  if(!($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7))){

								$data['disabled'] = 'disabled';
						  }

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
						  if(!($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7))){

								$data['disabled'] = 'disabled';
						  }

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
  
                    
                    
                    <div class="clearfix"></div>
                    
                    <div class="next-prev-btn-container pull-right" style="position:static">
					<?php if($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                    <?php echo form_submit('hantar', 'Hantar','class="btn btn-primary"'); ?> 
                    <?php }else{?>
                    <a href="<?php echo site_url('pspao/senarai_pspao_akhir_ppd_2/'.$this->uri->segment(3)) ?>"><button class="btn btn-primary input-top-margin" type="button"> Kembali </button></a>
                    <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                
                </div>
              </div>
            </div>
          </div>



<?php echo form_close(); ?>
<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/alertify.min.js"></script>
<script>$('#nowucme').wysihtml5();</script>
