<!-- page: utiliti - unit pengurusan fasiliti, by seri idayu, 06102013 -->
<!-- page: utiliti - unit pengurusan fasiliti, updated by fatin, 12112013 -->

<!--main container-->
      <div class="main-container">
      
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
                 
<!-- Senarai upf START -->       
<div class="row-fluid">
  <div class="span12">
    <div class="widget">
      <div class="widget-header">
        <div class="title">
          <span class="fs1" aria-hidden="true" data-icon="&#xe14a;">
          </span> Senarai Unit Pengurusan Fasiliti
        </div>
      </div>
                
      <div class="widget-body">


        <!-- tambah upf START -->
        <ul class="icomoon-icons-container">
          <li>
            <a href="#myModal" data-toggle="modal">
              <span class="fs1" data-icon="&#xe102;" aria-hidden="true"> 
              </span>
            </a>
          </li>
        </ul>
        <label class="tambah">
          Tambah Unit Pengurusan Fasiliti
        </label>
        <div class="clearfix">
        </div>
        <!-- tambah upf END -->


        <!-- table upf START -->
        <div id="dt_example" class="example_alt_pagination">
          <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
            
            <thead>
              <tr>
                <th style="width:4%">Bil</th>
                <th style="width:25%">Nama UPF</th>
                <th style="width:25%">Alamat</th>
                <th style="width:10%">No. Telefon</th>
                <th style="width:10%">No. Faks</th>
                <th style="width:10%">Tindakan</th>
              </tr>
            </thead> 
            
            <tbody>
              <?php $i=1; if(!empty($senaraiupf)) : foreach ($senaraiupf as $rec) : ?>
              <?php //echo form_open('admin/update'); ?>
                        
                <tr>
                  <td align="left">
                    <?php echo $i++; ?>
                  </td>
                  <td>
                      <?php echo $rec->nama_upf;?>
                  </td>
                  <td>
                      <?php echo $rec->alamat_upf;?>
                  </td>
                  <td>
                    <?php echo $rec->notel_upf;?>
                  </td>
                  <td>
                    <?php echo $rec->nofax_upf;?>
                  </td>
                  <td align="center">
                    <ul class="icomoon-icons-container">
                      <li class="rounded">
                        <span class="fs1">
                          <a class="" aria-hidden="true" data-icon="&#xe005;" data-original-title="kemaskini" href="<?php base_url(); ?>kemaskini_upf/<?php echo $rec->upf_id; ?>">
                          </a>
                        </span>
                      </li>
                    </ul>
                  </td>
                </tr>
                            
                <?php echo form_close(); ?>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
          </table>      

          <div class="clearfix">
          </div>
                    
        </div>
        <!-- table upf START -->


      </div>

    </div>
  </div>
</div>
<!--Senarai upf END --> 

</div>
      <!--/.END main-container--> 

<!-- popup upf START -->
<form id="" class="" action="<?php echo site_url(); ?>/utiliti_upf/unit_pengurusan_fasiliti" method="post"> 
  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        ×
      </button>

      <h4 id="myModalLabel">
        Unit Pengurusan Fasiliti
      </h4>
    </div>
            
    <div class="modal-body">

      <?php $sessionarray = $this->session->all_userdata();?>
        <table width="95%" border="0" align="center">
      
        <tr>
          <td width="17%" valign="top" height="50">
            <label class="control-label">
              Kementerian
              <span class="required">
              </span>
            </label>
          </td>
        
          <td width="31%">
            <div class="">
              <input class="input-large" type="text"  placeholder="<?php echo $sessionarray['user_kementerian'];?>" disabled>
              <input class="input-large" type="hidden" name="kementerian" value="<?php echo $sessionarray['user_kemid'];?>" >
            </div>
          </td>
        </tr>


        <tr>                                       
          <td width="19%" valign="top" height="50">
            <label class="control-label">
              Jabatan
              <span class="required">*
              </span>
            </label>
          </td>
                                                
          <td width="33%">
            <div class="">
                <select class="required large" name="jabatan">
              <option value="">SILA PILIH</option>
              <?php if(!empty($jabatan)) : foreach ($jabatan as $rec) : ?>
              <option value="<?php echo $rec->idjab_agensi; ?>"><?php echo set_value('nama_jab_agensi', $rec->nama_jab_agensi); ?></option>
              <?php endforeach; ?>
              <?php endif; ?>
                </select>
           </div>
          </td>
        </tr>
         

        <tr><?php $cities['#'] = 'SILA PILIH'; ?>
            <td width="19%" valign="top" height="50">
                <label class="control-label">
                    Negeri
                    <span class="required">*
                    </span>
                </label>
            </td>
            
            <td width="33%">
                <div class=""><?php echo form_dropdown('negeri', $countries, '#', 'id="country"'); ?>
                </div>
            </td>
        </tr>
        

                                    
        <tr>
          <td width="19%" valign="top" height="50">
            <label class="control-label">
              Daerah
              <span class="required">*
              </span>
            </label>
          </td>
        
          <td width="33%">
            <div class="">
              <?php echo form_dropdown('daerah', $cities, '#', 'id="cities"'); ?>
            </div>
          </td>
        </tr>

      
        <tr>
          <td colspan='2' >
            <hr>
          </td>
        </tr>
     

        <tr>
          <td width="17%" valign="top">
            <label class="control-label">
              Nama UPF
              <span class="required">*
              </span>
            </label>
          </td>
        
          <td> 
            <div class="">
              <?php echo form_input(array('name'  => 'namaupf',
                                          'value' => set_value('namaupf', $this->session->userdata('nama_upf')),
                                          'class' => 'large required')); 
              ?>
            
              <font color="red">
                <?php echo form_error('namaupf'); ?>
              </font>
            </div>
          </td>
        </tr>
        

        <tr>
          <td width="17%" valign="top">
            <label class="control-label">
              Alamat
              <span class="required">
                *
              </span>
            </label>
          </td>
        
          <td> 
            <div class="">
              <?php echo form_input(array('name'  => 'alamatupf', 
                                          'value' => set_value('alamatupf', $this->session->userdata('alamat_upf')),
                                          'class' => 'large required')); 
              ?>
            
              <font color="red">
                <?php echo form_error('alamatupf'); ?>
              </font>
            <br>
          </td>
        </tr>
         

        <tr>
          <td width="19%" valign="top" height="50">
            <label class="control-label">
              No. Telefon
              <span class="required">*
              </span>
            </label>
          </td>
        
          <td width="33%">
            <div class="">
              <?php echo form_input(array('name'  => 'notel',
                                          'value' => set_value('notel', $this->session->userdata('notel_upf')),
                                          'class' => 'large required')); 
              ?>
            
              <font color="red">
                <?php echo form_error('notel'); ?>
              </font>
            </div>
          </td>
        </tr>
        

        <tr>
          <td width="19%" valign="top" height="50">
            <label class="control-label">
              No. Faks
              <span class="required">*
              </span>
            </label>
          </td>
        
          <td width="33%">
            <div class="">
              <?php echo form_input(array('name'  => 'nofax',
                                          'value' => set_value('nofax', $this->session->userdata('nofax_upf')),
                                          'class' => 'large required')); 
              ?>
            
              <font color="red">
                <?php echo form_error('nofax'); ?>
              </font>
            </div>
          </td>
        </tr>
        
        </table>
      
      <!-- script section START -->
      
<script type="text/javascript" src="<?php echo base_url() . 'asset/js/jquery.min.js'; ?>"></script>        
<script type="text/javascript">// <![CDATA[
  $(document).ready(function()
  {       
    $('#country').change(function()
    { //any select change on the dropdown with id country trigger this code         
      $("#cities > option").remove(); //first of all clear select items
      var idnegeri = $('#country').val();  // here we are taking country id of the selected one.
      
      $.ajax(
      {
        type: "POST",
        url: "<?php echo site_url(); ?>/utiliti_upf/get_cities/"+idnegeri, //here we are calling our user controller and get_cities method with the country_id
               
        success: function(cities) //we're calling the response json array 'cities'
        {
          $.each(cities,function(id,city) //here we're doing a foeach loop round each city with id as the key and city as the value
          {
            var opt = $('<option />'); // here we're creating a new select option with for each city
            opt.val(id);
            opt.text(city);
            $('#cities').append(opt); //here we will append these new select options to a dropdown with the id 'cities'
          });
                    
        }
                 
      });
             
    });
  });
    // ]]>
</script>
       
    </div> 
    <!--end div modal body -->
    
              <!-- button popup START -->
        <div class="modal-footer">
            <a href="#" class="btn btn-danger input-top-margin" data-dismiss="modal">Batal</a>
            <input type="submit" value="Simpan" class="btn btn-warning2">            
            </div>
        <!-- button popup END -->
  </div>
</form>
<!-- popup upf END -->