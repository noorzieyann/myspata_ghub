<!-- page: peranan pengguna, updated by seri idayu, 21102013 -->





<!-- panel peranan START -->
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
          </span> Senarai Pengguna
        </div>
      </div>


      <!-- table section START -->            	
      <div class="widget-body">


        <?php //if (!empty($list_user)) : foreach ($list_user as $rec) : ?> 

        <?php 
          echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

            if($this->session->flashdata('flashError'))
            {
              echo '<div class="mws-form-message error">';
              echo '<i class="icol-ban"></i> ' .$this->session->flashdata('flashError');
              echo '</div>';
            }
            
            if($this->session->flashdata('flashComfirm'))
            {
              echo '<div class="mws-form-message success">';
              echo '<i class="icol-accept"></i> ' .$this->session->flashdata('flashComfirm');
              echo '</div>';
            }
        ?>


        <!-- table START -->
        <div id="dt_example" class="example_alt_pagination">
          <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
            

            <thead>
              <tr>
                <th style="width:2%">
                  #
                </th>
                <th style="width:2%">
                  Bil
                </th>
                <th style="width:25%">
                  Peranan Pengguna
                </th>
              </tr>
            </thead>
    
            <tbody>
              <?php foreach($peranan_user as $rec){ ?>
              <?php $i=1; if(!empty($peranan)) : foreach ($peranan as $rec2) : ?>
                        
              <tr>
                <td align="left">
                  <?php if($rec->role_pengguna_id == $rec2->role_pengguna_id){ ?>
                  <input type="checkbox" value="<?php echo set_value('peranan[]',$rec2->role_pengguna_id); ?>" checked="checked">

                  <?php }else{ ?>
                  <input type="checkbox" value="<?php echo set_value('peranan[]',$rec2->role_pengguna_id); ?>">
                  <?php } ?>
                </td>
                <td align="left">
                  <?php echo $i++; ?>
                </td>
                <td>
                  <?php echo $rec2->desc; ?>
                </td>
              </tr>


              <?php endforeach; ?>
              <?php endif; ?>
              <?php } ?>

              </tbody>
            
          </table>
        </div>
        <!-- table END -->


              <?php //endforeach; ?>
              <?php //endif; ?>
            


      </div>
      <!-- table section END-->


              
    </div>
  </div>
</div>
<!-- panel peranan END -->
        



<!-- buttons START --> 
<div class="next-prev-btn-container pull-right">
  <div class="widget-body" align="right">
    <a href="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>" class="btn btn-danger input-top-margin" id="">
      Batal
    </a>
                 
    <a href="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>" class="btn btn-warning2 input-top-margin" id="sah">
      Simpan
    </a>
  </div> 
</div>
<!-- buttons END--> 
                          

              


        <div class="clearfix">
        </div>
                    
                  
      
    






      










      
      <!-- alert section START -->
    <script type="text/javascript">
      //Alertify JS
      $ = function (id) {
        return document.getElementById(id);
      },
      reset = function () {
        $("toggleCSS").href = "<?php echo base_url() . 'asset/'; ?>css/alertify.core.css";
        alertify.set({
          labels: {
            ok: "Ya",
            cancel: "Tidak"
          },
          delay: 5000,
          buttonReverse: false,
          buttonFocus: "ok"
        });
      };
      
     
      $("sah").onclick = function () {
        reset();
        alertify.confirm("Adakah pasti ingin menyimpan?", function (e) {
          if (e) {

            window.location ="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>";
            
          } else {
            //alertify.error("");
          }
        });
        return false;
      };


      $("pembetulan").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghantar arahan pembetulan bagi rekod ini kepada Pegawai Penyedia Dokumen? Sila pastikan ruangan ulasan telah diisi. ", function (e) {
          if (e) {
            alertify.success("Notifikasi telah dihantar.");
          } else {
            //alertify.error("");
          }
        });
        return false;
      };
      
     
</script>
<!-- alert section END -->




