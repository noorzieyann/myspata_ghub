<?php ///////////////////////////// USER INFORMATION HERE ////////////////////////////////// ?>
<style>
dd {
	margin-left:200px !important;
}
dt {
	float:left;
}
</style>
<?php

	$sesr = $this->session->all_userdata();
	$sess = $this->aauth->get_session('menu');

?>


          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Selamat Kembali. Anda log sebagai :
                  </div>
                </div>
                <div class="widget-body">
                
                


                    <dl class="dl-horizontal no-margin">
                      <dt class="text-info">
                        Nama :
                      </dt>
                      <dd>
                        <?php echo $sesr['user_nama']; ?>
                      </dd>

                      <dt class="text-info">
                        Kementerian :
                      </dt>
                      <dd>
                        <?php echo $sesr['user_kementerian']; ?>
                      </dd>

                      <dt class="text-info">
                        Kumpulan Pengguna :
                      </dt>
                      <dd>
                        <?php echo $sess[0]['menu_role_kump_pengguna[0]']; ?>
                      </dd>

                      <dt class="text-info">
                        Peringkat Pengguna :
                      </dt>
                      <dd>
                        <?php echo $sesr['user_level']; ?>
                      </dd>

                      <dt class="text-info">
                        Peranan Pengguna :
                      </dt>
                      <dd>
                        <?php echo $sess[0]['menu_role_pengguna[0]']; ?>
                      </dd>
					<?php
					
						$query = $this->aauth->check_role($sesr['user_id']);
						if($query->num_rows > 1){
					?>
                      <dt class="text-info">
                        Tukar Peranan :
                      </dt>
                      <dd>
                        <a href="<?php echo site_url('auth/pilih_role/'.$sesr['user_id']) ?>">Tukar Peranan</a>
                      </dd>
                    <?php

						}
					
					?>

                    </dl>                
                
                
                </div>
              </div>
            </div>
          </div>
<?php ///////////////////////////// USER INFORMATION HERE ////////////////////////////////// ?>






          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Notifikasi Tugasan
                  </div>
                </div>
                <div class="widget-body">
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">
                            Bil
                          </th>
                          <th style="width:25%">
                            Notifikasi
                          </th>
                          <th style="width:10%">
                            Status
                          </th>
                          <th style="width:10%">
                            Dari
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            Tarikh Dihantar
                          </th>
                          <th style="width:10%" class="hidden-phone">
                            Pelan / Kategori
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                         <?php $i=1; if(!empty($data)) : foreach ($data as $rec) : ?>
                      <tr>
                          <td>
                           <?php echo $i++; ?>
                          </td>
                          <td>



 <?php $get_titleNotifi = $this->utama_model->get_title_notifikasi($rec->senarai_notifikasi_id);
                         

                        ?>
                          <a href="<?php echo site_url('main/update_status/'.$rec->notifikasi_id.'/'.$rec->notifikasi_url) ?>"><?php  echo $get_titleNotifi ; ?></a>


                          </td>
                          <td>
                            <?php $status =  $rec->status; 
                            if($status==0)
                            {
                              echo '<span class="badge badge-success">Baru </span>';
                              
                            }else
                            {
                              echo '<span class="badge badge-info"> Telah Dibaca </span>';
                            }
                            ?>
                          </td>
                          <td>
                              <?php if($get_sender = $this->utama_model->get_sender($rec->myspata_userid_from)) 
                                foreach ($get_sender as $rr) 
                                echo $rr->nama_user;?>
                              <?php //echo $rec->myspata_userid_from; ?>
                              <?php //if($get_namakem = $this->utama_model->get_namakem($rec->idkem)) foreach ($get_namakem as $rr) echo $rr->namakem;?>
                          </td>
                          <td>
                              
                         <?php 
                         //date_default_timezone_set('UTC');
                         //$tarikh = new DateTime($rec->tarikh_dihantar); 
                                //echo $tarikh->format('d-m-Y'.','.' H:m:s');
                         echo $rec->tarikh_dihantar;
                         ?>
                          </td>
                          <td>
                    
                            <?php if($get_namakumpkand = $this->utama_model->get_kump_kand($rec->kump_kand_id)) 
                         foreach ($get_namakumpkand as $rr) 
                          echo $rr->kump_kand_kod;?>
                          </td>
                          
                        </tr>

                        
                        
                        <?php

                        endforeach; ?>
                            <?php endif; ?>
                        
                      </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                     JUMLAH KESULURUHAN NOTIFIKASI BARU ADALAH SEBANYAK <span style="font-weight: bold;color:red"><?php echo $num_row;?></span> NOTIFIKASI. <a href="<?php echo site_url('main/senarai_keseluruhan_notifikasi')?>"><u>PAPARKAN KESELURUHAN NOTIFIKASI.</u></a>
                 </div>
                </div>
              </div>
            </div>
          </div>

        <!--   <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Notifikasi Takwin
                  </div>
                </div>
                <div class="widget-body">
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table2">    
                      <thead>
                        <tr>
                          <th style="width:7%">
                            Bil
                          </th>
                          <th style="width:20%">
                            Takwin
                          </th>
                          <th style="width:16%">
                            Tarikh Takwim
                          </th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                         <?php //$i=1; if(!empty($datatakwin)) : foreach ($datatakwin as $rec) : ?>
                      <tr>
                          <td>
                           <?php //echo $i++; ?>
                          </td>
                          <td><?php //echo $rec->title_notifikasi  ?></td>
                         <td><?php //echo $rec->takwim_tarikh  ?></td>
                          
                        </tr>

                        
                        
                        <?php //endforeach; ?>
                        <?php //endif; ?>
                        
                      </tbody>
                    </table>
                    <div class="clearfix">
                    </div>
                     </div>
                </div>
              </div>
            </div>
          </div>


		


       
