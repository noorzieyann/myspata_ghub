		<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe0a2;"></span> Senarai Notifikasi  - PTF
                  </div>
                </div>
                <div class="widget-body">
                  <!--div id="column_chart"></div-->
                 
                     <div id="dt_example" class="example_alt_pagination">   

             <?php echo $this->table->generate($dataku); 
             
             ?>
                  
                   <div id="data-table_info" class="dataTables_info">Memaparkan 5 dari 15 senarai</div>
                    <div id="data-table_paginate" class="dataTables_paginate paging_full_numbers">
                        
                      <?php echo $this->pagination->create_links(); ?>
                      </div> 
                   <div class="clearfix"> </div>
                    JUMLAH KESULURUHAN NOTIFIKASI BARU ADALAH SEBANYAK <span style="font-weight: bold;color:red">15</span> NOTIFIKASI. <a href="<?php echo site_url('main/senarai_keseluruhan_notifikasi')?>"><u>PAPARKAN KESELURUHAN NOTIFIKASI.</u></a>
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

// contoh nak guna session mcm ni

	echo "Jabatan ID: " . $sessionarray['user_jabid'];
	echo "<br>";
	echo "Jabatan : " . $sessionarray['user_jabatan'];

?>
