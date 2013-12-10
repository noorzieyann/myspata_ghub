<?php
$sessionarray = $this->session->all_userdata();

if($this->uri->segment(4) != NULL){
	foreach($this->ptra_model->get_ptra_from_segment($this->uri->segment(4)) as $row){
	//$nodpa = $row->nodpa;
	$premis= $row->idpremis_kategori;
	$namapremis= $row->nama_premis;
	$tahun= $row->tahun;
	$ptra_id= $row->ptra_id;

} //loadnodpa
	$nodpa = $this->ptra_model->get_nodpa_dpa($ptra_id);
	}else{
	
	$kand_detail = array('','','','','','','');
	$tahun='';
	//$nodpa='';
	$namapremis='';
}

?>  
    <!--breadcrumb-->
    <div class="widget-body">
                  <ul class="breadcrumb-beauty">
                    <li>
                      <a href="<?php echo site_url('main')?>">
                        Fungsi
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        Perancangan
                      </a>  
                    </li>
                    <li>
                      <a href="#">
                        Pelan
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        PSPA(O)
                      </a>   
                    </li>
                    <li>
                      <a href="#">
                        PTRA
                      </a>   
                    </li>
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br /> 
    <?php 
	$form_name = 'ptra/kandungan_ptra_copy/'.$this->uri->segment(3);
	if($this->uri->segment(4) != NULL){$form_name = 'ptra/kandungan_ptra_copy/'.$this->uri->segment(3).'/'.$this->uri->segment(4);}
	$attributes = array('class' => 'form-horizontal no-margin', 'id' => 'kandungan_ptra_copy');
	echo form_open($form_name, $attributes);
?>
<?php 
	
	if($this->uri->segment(4) != NULL){
		echo form_hidden('edit',$this->uri->segment(4));
	}

?>
<?php //echo validation_errors(); ?>
    
    
    <!--tab navigation--> 
    <div class="widget-body">
        
        <?php 
                        //echo ''. validation_errors('<div class="mws-form-message error">','</div>') . '';

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
        
 <?php if(!empty($tab)) { echo $tab;} ?>
 
         <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Pelan Penilaian Aset (ptra)
                  </div>
                </div>
                <div class="widget-body">
                  
                      <?php $sessionarray = $this->session->all_userdata();?>
                      
                  <div class="control-group">
                      <label class="control-label">
                         Tahun<span class="required">*</span>
                      </label>
                      <?php
                            if($this->input->post('tahun') !=NULL){
                                    $tahun = $this->input->post('tahun');
                            }
                       ?> 
                      
                      <div class="controls">
                        <?php echo form_error('tahun'); ?> 
                        <?php //echo form_dropdown('tahun', $year_list,$tahun, 'id="tempoh_mula"')?>
						<?php echo form_dropdown('tahun', $year_list_selected,$tahun, 'id="tempoh_mula"')?>
                      </div>
                  </div>
                      
                      <div class="control-group">
                      <label class="control-label">
                        Kementerian
                      </label>
                      <div class="controls">
                      <input class="input-large" type="text" placeholder="<?php echo $sessionarray['user_kementerian'];?>" disabled>
                      </div>
                    </div>           
                    
                     <div class="control-group">
                     <label class="control-label">
                    Jabatan/Agensi
                      </label>
                     <div class="controls">
                        <input class="input-large" type="text" placeholder="<?php echo $sessionarray['user_jabatan'];?>" disabled>
                    </div>
                     </div>
                      
                   <div class="control-group">
                     <label class="control-label">Kategori Premis<span class="required">*</span></label>
                      <?php
                            if($this->input->post('premis') !=NULL){
                                    $premis = $this->input->post('premis');
                            }
                       ?> 
                     
                     <div class="controls">
                      <select class="required large" name="premis">
                                                        <option value="">SILA PILIH</option>
                                                        <?php if(!empty($katpremis)) : foreach ($katpremis as $rec) : 
                                                        if($premis==$rec->idpremis_kategori){ ?>

                                                          <option value="<?php echo $rec->idpremis_kategori; ?>" selected="selected"><?php echo set_value('jenis_premis', $rec->jenis_premis); ?></option>
                                                       
                                                       <?php }else{ ?>

                                                        <option value=" <?php echo $rec->idpremis_kategori; ?>"><?php echo set_value('jenis_premis', $rec->jenis_premis); ?></option>
                                                       
                                                        <?php } ?>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?></select>
                      </div>
                    </div>
                   
                    <div class="control-group">
                     <label class="control-label">
                    Nama Premis<span class="required">*</span>
                      </label>
                        <?php
                            if($this->input->post('namapremis') !=NULL){
                                    $namapremis = $this->input->post('namapremis');
                            }
                       ?> 
                        
                      <div class="controls">
                         <?php echo form_input(array('name' => 'namapremis', 'value' => $namapremis, 'class' => 'large required')); ?>
                         <font color="red"><?php echo form_error('namapremis'); ?></font>
                      </div>
                    </div>
                    
                    
                     <div class="control-group">
                     <label class="control-label">
                    No DPA<span class="required">*</span>
                      </label>
                       <?php
                            if($this->input->post('nodpa') !=NULL){
                                    $nodpa = $this->input->post('nodpa');
                            }
                       ?> 
                      <div class="controls">
                          <?php echo form_input(array('name' => 'nodpa', 'value' => $nodpa, 'class' => 'large required')); ?>
                         <font color="red"><?php echo form_error('nodpa'); ?></font>
                      </div>
                    </div>
                      
                <input type="hidden" name="kementerian" value="<?php echo $sessionarray['user_kemid'];?>"/>
                <input type="hidden" name="jabatan" value="<?php echo $sessionarray['user_jabid'];?>"/>
                
                </div>
              </div>
            </div>
         </div>
         <!--/.END panel 1-->

                <!--buttons-->
                <div class="next-prev-btn-container pull-right">
					<a href="<?php echo site_url('ptra/senarai_ppd_ptra/'.$this->uri->segment(3)); ?>"><button class="btn btn-danger input-top-margin" type="button">
					Batal</button></a>
					<input type="submit" value="Seterusnya" class="btn btn-primary">
                </div> 
                <!--/.END buttons--> 
          
      </div>  
      <!--/.END main-container-->    
        </form>
    </div>                  
  </div>
  <!--/.END tab section-->
    </div>  
    <!--/.END tab navigation-->
<script>
$('#popoverOption').popover({ trigger: "hover" });</script>


    <script src="<?php echo base_url() . 'asset/'; ?>js/jquery.min.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="<?php echo base_url() . 'asset/'; ?>js/wysiwyg/bootstrap-wysihtml5.js"></script>
<script>


  $('#wysiwyg1').wysihtml5();
    
</script>