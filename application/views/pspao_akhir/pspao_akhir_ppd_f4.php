<?php 
	$sessionarray = $this->session->all_userdata();
	$statusid = $this->uri->segment(5);
?>
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
echo form_open('pspao/pspao_akhir_ppd_f4/'.$this->uri->segment(3).'/'.$this->uri->segment(4),$attributes);
?>

                
          <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    7.3.0 Kaedah Pelaksanaan (Dalaman dan Luaran)
                  </div>
                </div>
                <div class="widget-body">
                    
                    
                    
                    <div class="wysiwyg-container">
                    Kaedah Pelaksanaan
                    <?php if($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                    <textarea id="nowucme" name ="kand_detail" class="input-block-level" style="height: 80px"><?php echo $kandungan ?></textarea>
                    <?php }else{ ?>
                    <textarea id="kand_detail" name ="kand_detail" class="input-block-level" disabled="disabled" style="height: 80px"><?php echo $kandungan ?></textarea>
                    <?php }?>
                    </div>
                    
                    <?php include('kaedah_pelaksanaan_ppd.php') ?> 
                    
                    
                    
                    <div class="clearfix"></div>
                    
                    <div class="next-prev-btn-container pull-right" style="position:static">
					<?php if($sessionarray['user_rolegroupid'] == 8 && ($statusid ==1 || $statusid ==3 || $statusid ==7)){ ?>
                    <?php echo form_submit('hantar', 'Hantar','class="btn btn-primary"'); ?> 
                    <?php }else{?>
                    <a href="<?php echo site_url('pspao/senarai_pspao_akhir_ppd_2/'.$this->uri->segment(3)) ?>"><button class="btn btn-primary input-top-margin" type="button"> Kembali </button></a>
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
