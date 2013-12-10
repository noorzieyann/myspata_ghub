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
                          <th style="width:8%">Tindakan</th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php $i=1; if(!empty($senarai_dokumen)) : foreach ($senarai_dokumen as $rec) : ?>
                            <?php //echo form_open('admin/update'); ?>
                        
                            <tr>
                                <td align="left"><?php echo $i++; ?></td>
                                <td><?php echo $rec->nama_fail; ?></td>
                                <td><a href="<?php echo $rec->lokasi_fail; ?>"><?php echo $rec->nama_fail_asal; ?></a></td>
                                <td align="center">
                                    <ul class="icomoon-icons-container">
                                    <a class="confirmation" href="<?php echo site_url('pspao/hapus_pspao_akhir_lampiran/'.$rec->lampiran_id.'/'.$this->uri->segment(3));?>"><li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1" ></span></li></a>                                    
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                  <!--END table-->
                  <div class="clearfix"></div>
                    
                  </div>
                </div>


<?php /*?><table class="table table-condensed table-striped table-bordered table-hover no-margin" style="width:80%">
<thead>
  <tr>
    <th style="width:8%">Bil.</th>
    <th>Lampiran</th>
    <th style="width:30%">Dokumen Lampiran</th>
    <th style="width:10%">Tindakan</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>1.</td>
    <td>Dokumen Penerangan 1</td>
    <td><a href="<?php echo base_url('dokumen/dokumen1.pdf') ?>" target="_blank">Dokumen 1</a></td>
    <td><a href="#"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1"></span></li></ul></a></td>
                       
  </tr>
  <tr>
    <td>2.</td>
    <td>Dokumen Penerangan 2</td>
    <td><a href="<?php echo base_url('dokumen/dokumen1.pdf') ?>" target="_blank">Dokumen 2</a></td>
    <td><a href="#"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1"></span></li></ul></a></td>
                        
  </tr>
  <tr>
    <td>3.</td>
    <td>Dokumen Penerangan 3</td>
    <td><a href="<?php echo base_url('dokumen/dokumen1.pdf') ?>" target="_blank">Dokumen 3</a></td>
    <td><a href="#"><ul class="icomoon-icons-container"><li class="rounded"><span class="fs1" data-icon="&#xe0a7" aria-hidden="true" id="hapus1"></span></li></ul></a></td>
  </tr>
</tbody>
</table>
<?php */?>