<!-- page: reset pengguna, updated by seri idayu, 20102013 -->




<!-- panel kemaskini START --> 
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe022;">
          </span> Set Semula Katalaluan 
        </div>
      </div>
      
      <div class="widget-body">

        <?php if (!empty($list_user)) : foreach ($list_user as $rec) : ?> 
                                    
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

 <form id="" class="" action="" method="post">
        <div class="control-group">
          <label class="control-label control-label_2">
            Masukkan Katalaluan Baru
          </label>
          <div class="controls controls_2">

            <?php echo form_input(array('name'        => 'password', 
                                        'type'        => 'password',
                                        'value'       => set_value('pswd', $rec->pswd), 
                                        'maxlength'   => '',
                                        'size'        => '50',
                                        'class'       => 'large required')); 
            ?>
      
            <font color="red">
              <?php echo form_error('pswd'); ?>
            </font>
            
            <span class="popover-pop" data-original-title="Katalaluan Baru" data-content="Masukkan katalaluan yang baru" data-placement="right"  data-icon="&#xe0f6;">
            </span>
          </div>
        </div>
                  
        
        <div class="control-group">
          <label class="control-label control-label_2">
            No. Kad Pengenalan
          </label>
          <div class="controls controls_2">

            <?php echo form_input(array('name'  => 'nokp', 
                                        'value' => set_value('nric', $rec->nric), 
                                        'class' => 'large required',
                                        'disabled' => 'disabled')); 
            ?>
            
            <span class="popover-pop" data-original-title="Contoh:" data-content="821202024837" data-placement="right"  data-icon="&#xe0f6;">
            </span>
          </div>
        </div>

            
        <div class="control-group">
          <label class="control-label control-label_2">
            E-mel
          </label>
          <div class="controls controls_2">
                        
            <?php echo form_input(array('name'  => 'user_email', 
                                        'value' => set_value('user_email', $rec->user_email), 
                                        'class' => 'large required',
                                        'disabled' => 'disabled')); 
            ?>

            <span class="popover-pop" data-original-title="Contoh:" data-content="Alamat e-mel yang sah. nama@jkr.com.my" data-placement="right"  data-icon="&#xe0f6;">
            </span>
          </div>
        </div>
        

      </div>


    </div>
  </div>
</div> 

      

                

        <!-- buttons START --> 
        <div class="next-prev-btn-container pull-right">
          <a href="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>">
            <button class="btn btn-danger input-top-margin" type="button">
              Batal
            </button>
          </a>

          <input type="submit" value="Tukar Katalaluan" class="btn btn-primary">
        </div>
        <!-- buttons END --> 




      </form>


      <?php endforeach; ?>
      <?php endif; ?>


     
<!-- panel kemaskini END --> 







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
      
     
      $("kemaskini").onclick = function () {
        reset();
        alertify.confirm("Kemaskini katalaluan?", function (e) {
          if (e) {

            window.location ="<?php echo site_url('pentadbir/pengurusan_pengguna') ?>";
            
          } else {
            //alertify.error("");
          }
        });
        return false;
      };

</script>
<!-- alert section END -->