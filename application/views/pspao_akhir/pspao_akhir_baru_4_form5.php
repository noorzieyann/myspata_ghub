<style>
.wysiwyg-container{
	padding-bottom:16px;
	padding-top:4px;
}    
.modal{
	width: 760px !important;
	margin-left: -380px !important;
}
</style>

	<!--breadcrumb -EYO- -->
    <div class="widget-body" style="padding-bottom:20px">
	  <ul class="breadcrumb-beauty">
		<li><a href="<?php echo site_url('main')?>">Fungsi</a></li>
        <li><a href="#">Perangcangan</a></li>
        <li><a href="#">Pelan</a></li>
        <li><a href="#">PSPA(O) Akhir</a></li>
        <li><a href="#">Rumusan PSPA(O) Akhir</a></li>
      </ul>
    </div>
    <!--END breadcrumb-->

<?php
$attributes = array('class' => 'form-horizontal no-margin','name'  => 'ukuran_sasar_pspao','id'    => 'ukuran_sasar_pspao');
echo form_open_multipart('pspao/pspao_akhir_baru_4_form5/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes);
?>

<?php if($upload_error){echo $upload_error;}?>

                
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    11.0 Lampiran
                  </div>
                </div>
                <div class="widget-body">
                    
                    
                    
					<?php include('lampiran_form5.php') ?>                    
                    
                    
                    <div class="clearfix"></div>
                    
                    <div class="next-prev-btn-container pull-right" style="position:static">
                    <?php $sessionarray = $this->session->all_userdata(); ?>
					<?php if($sessionarray['user_rolegroupid'] == 8){ ?>
                    <?php echo form_submit('hantar', 'Hantar','class="btn btn-primary"'); ?> 
                    <?php }else{?>
                    <a href="javascript:history.back()"><button class="btn btn-primary input-top-margin" type="button"> Kembali </button></a>
                    <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                
                </div>
              </div>
            </div>
          </div>



<?php echo form_close(); ?>
<script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/alertify.min.js"></script>
<script>$('#nowucme').wysihtml5();</script>
