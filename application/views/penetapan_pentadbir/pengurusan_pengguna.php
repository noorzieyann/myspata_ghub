<!--main container-->
<form action='kemaskini_pengguna' method='post'>
      <div class="main-container">
          
       <!--panel 2-->
        <div class="row-fluid">
          <div class="span12">
            <div class="widget">
              <div class="widget-header">
                <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Senarai Pengguna
                </div>
              </div>
              	<!--table section-->            	
                <div class="widget-body">
                  <!--table-->
                  <div id="dt_example" class="example_alt_pagination">
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
                      <thead>
                        <tr>
                          <th style="width:4%">#</th>
                          <th style="width:4%">Bil</th>
                          <th style="width:25%">Nama Pengguna</th>
                          <th style="width:15%" class="hidden-phone">E-mel</th>
                          <th style="width:10%" class="hidden-phone">Status</th>
                          <th style="width:10%" class="hidden-phone">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($list_user)) : foreach ($list_user as $rec) : ?>
                        
                            <tr>
                                <td align="left"><input type="checkbox" value=""></td>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo $rec->nama_user; ?></td>
                                <td><?php echo $rec->user_email; ?></td>
                                <td><?php if($rec->isaktif==0) {echo 'Tidak Aktif';} else if($rec->isaktif==1){ echo 'Aktif';} ?></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">

                                      <li class="rounded">
                                        <span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe08f" data-original-title="set semula katalaluan" href="<?php base_url(); ?>reset_pengguna/<?php echo $rec->myspata_userid; ?>">
                                        </a>  
                                        </span>
                                      </li>

                                      <li class="rounded">
                                        <span class="fs1">
                                        <a class="" aria-hidden="true" data-icon="&#xe075" data-original-title="set peranan pengguna" href="<?php base_url(); ?>peranan_pengguna/<?php echo $rec->myspata_userid; ?>">
                                        </a>
                                        </span>
                                      </li>

                                    <li class="rounded">
                                      <a aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini profil pengguna" href="<?php base_url(); ?>kemaskini_pengguna/<?php echo $rec->myspata_userid; ?>">
                                      </a>
                                    </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php echo form_close(); ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <!--END table-->
                    <div class="clearfix">
                    </div>
                    
                  </div>
                </div>
                <!--/.END table section-->
              </div>
            </div>
          </div>
          <!--END panel 2-->
        
    </div>  
      <!--/.END main-container--> 
</form>