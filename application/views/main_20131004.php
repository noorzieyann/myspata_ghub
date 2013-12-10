
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
                            <?php echo $rec->senarai_notifikasi_id; ?>
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



/*
$sessionarray = $this->session->all_userdata();
foreach($sessionarray as $id => $data){
	echo "sessionarray[".$id."] = ".$data."<br>";
}

// contoh nak guna session mcm ni

	echo "Jabatan ID: " . $sessionarray['user_jabid'];
	echo "<br>";
	echo "Jabatan : " . $sessionarray['user_jabatan'];
	echo "<br><br>";
	//print_r($sessionarray['menu']);
	
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
	
*/
	
?>

<?php
/*
echo "<br><p>Test Menu :</p>";


			
			foreach($_SESSION['menu'] as $key => $data){
				echo $key." => ".$data."<br>";
			}
			
			//print_r($menu);
	

*/
?>
