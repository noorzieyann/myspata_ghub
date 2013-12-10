               <div class="widget-body">
                  <div class="clearfix"></div>
                  <!--table-->


                  <div id="dt_example" class="example_alt_pagination" >
                    <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table" >    
                      <thead>
                        <tr>
                          <th style="width:4%">Bil</th>
                          <th style="width:20%">Tajuk Dokumen</th>
                          <th style="width:20%">Nama Dokumen</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_dokumen)) : foreach ($senarai_dokumen as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo $rec->nama_fail; ?></td>
                                <td><a href="<?php echo $rec->lokasi_fail; ?>"><?php echo $rec->nama_fail_asal; ?></a></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                  <!--END table-->
                  <div class="clearfix"></div>
                    
                  </div>
                </div>
