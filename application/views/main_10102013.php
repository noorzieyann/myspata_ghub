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
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Notifikasi
                  </div>
                </div>
                <div class="widget-body">
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:17%">
                            Bil
                          </th>
                          <th style="width:20%">
                            Notifikasi
                          </th>
                          <th style="width:16%">
                            Status
                          </th>
                          <th style="width:16%" class="hidden-phone">
                            Tarikh
                          </th>
                          <th style="width:16%" class="hidden-phone">
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
                         <?php $tarikh = new DateTime($rec->tarikh_dihantar); 
                                echo $tarikh->format('d-m-Y');
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


		<!--div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe0a2;"></span> Senarai Notifikasi  - PP
                  </div>
                </div>
                <div class="widget-body">
                  <!--div id="column_chart"></div>
                 
                     <div id="dt_example" class="example_alt_pagination">   

             <?php //echo $this->table->generate($dataku2); ?>
                  
                   <div id="data-table_info" class="dataTables_info">Memaparkan 5 dari 15 senarai</div>
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        
                      <?php echo $pagination2;//$this->pagination->create_links(); ?>
                      </div> 
                   <div class="clearfix"> </div>
                    JUMLAH KESULURUHAN NOTIFIKASI BARU ADALAH SEBANYAK <span style="font-weight: bold;color:red">15</span> NOTIFIKASI. <a href="<?php echo site_url('main/senarai_keseluruhan_notifikasi')?>"><u>PAPARKAN KESELURUHAN NOTIFIKASI.</u></a>
                </div>
                </div>
              </div>
            </div>

            </div-->



       
<?php



$sessionarray = $this->session->all_userdata();
foreach($sessionarray as $id => $data){
	echo "sessionarray[".$id."] = ".$data."<br>";
}
/*

// contoh nak guna session mcm ni

	echo "Jabatan ID: " . $sessionarray['user_jabid'];
	echo "<br>";
	echo "Jabatan : " . $sessionarray['user_jabatan'];
	echo "<br><br>";
	//print_r($sessionarray['menu']);
	
*/
	echo "<p>";
	echo "Menu Nativesession : <br>";
	
	$menutest = $this->aauth->get_session('menu');
	
	foreach($menutest as $key){
		echo "<p>";
		foreach($key as $key1 => $menu1){
			echo $key1 . " => " . $menu1 . "<br>";
		}
		echo "</p>";
	}
	
	
	echo "</p>";
/*	
	echo "kalo ada lebih role : ".$this->aauth->get_session('role_user_id');
*/
	
	
?>