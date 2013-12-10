<?php 
	$this->load->view('template/header');
	$this->load->view('template/header_html');
	
?>	

<div class="container-fluid">
      <div id="mainnav" class="hidden-phone hidden-tablet">
        <?php //$this->load->view('template/sidebar');?>
        <?php $this->load->view('template/side-kus',$menu_name,$menu_id);?>
      </div>
      
      <div class="dashboard-wrapper">
        <div class="main-container">
			<?php $this->load->view($main_content); ?>
		</div>        
      </div>

      <!--/.fluid-container-->
    </div>



<?php	
	$this->load->view('template/footer_html');
	$this->load->view('template/footer');
