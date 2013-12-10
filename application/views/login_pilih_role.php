          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span>
                    Anda mempunyai lebih dari 1 peranan akaun MySPATA. Sila pilih peringkat pengguna bagi kementerian/jabatan/agensi anda.  
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              	<?php 
					$data = array(
								'class' => 'form-horizontal no-margin',
								'id' => 'myform'
							);
					echo form_open('auth/pilih_role/'.$this->uri->segment(3),$data); 
				?>              
                  <div class="widget">
                     <div class="widget-header">
                      <div class="title"><span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span>Tukar Kumpulan Pengguna</div>
                     </div>
                     
                     <div class="row-fluid">
                       <div class="span12">
                        <div class="widget-body">
                        
                        
						<?php
                        foreach($data_radio as $r_key => $r_data){
                            echo '<label class="radio">';
                            echo form_radio('namaradio',$r_key);
                            echo $r_data;
                            echo '</label>';
                        }
                        ?>                        
                        <p><?php echo $this->aauth->get_session('role_user_id'); ?></p>
                        </div>
                       </div>
                     </div>

                  
                  </div>
                
                
                <div class="next-prev-btn-container pull-right">
                <?php echo form_submit('hantar', 'Hantar','class="btn btn-success"'); ?>

                </div>
<div class="clearfix"></div>

                
          	  <?php echo form_close(); ?>
              </div>
            </div>

          </div>
          
         

        </div>
