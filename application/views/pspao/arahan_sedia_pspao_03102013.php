
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
                        Permintaan Penyediaan
                      </a> 
                    </li>
                    <li>
                      <a href="#">
                        PSPA(O)
                      </a>   
                    </li>
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  

<div class="widget-body">
         
          
          
<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe022;"></span> Arahan Penyediaan PSPA(O) Awal 
                  </div>
                </div>
                
               
               
                <?php echo validation_errors(); ?>

                 <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'arahan_sedia_pspao',
                           'id' => 'arahan_sedia_pspao',
                        );
                    echo form_open('pspao_awal/arahan_sedia_pspao/'.$this->uri->segment(3),$attributes); 

                    $x = $this->uri->segment(3);
                    //echo $x;

                    echo form_hidden ('lastid', $x);
                    echo form_hidden ('check', '1');
                    ?>
                     
                
              <div class="widget-body">
              
                      <div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Penerima Arahan Penyediaan PSPA(O)
                  </div>
                </div>
                
              
                
              <div class="widget-body">
              
               <div id="dt_example" class="example_alt_pagination">   
                    
               
                     <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                    <thead>
                      <tr>
                        <th style="width:3%">Bil</th>
                        <th style="width:10%">Nama</th>
                        <th style="width:7%">#</th>
                        
                       
                      </tr>
                    </thead>
                    <tbody>

                       <?php $i=1; if(!empty($user_list)) : foreach ($user_list as $row) : 


                       ?>
                      <tr>
                        <td> <?php echo $i++; ?></td>
                        <td><?php echo $row->nama_user; ?></td>
                        <td><?php
                              $data = array(
                              'name'        => 'userid[]',
                              'id'          => 'userid[]',
                              'value'       => $row->myspata_userid,
                              'checked'     => '',
                              'style'       => 'margin:10px',
                              );

                          echo form_radio($data);
                        ?></td>
                         
                      </tr>

                      <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>

                
  </div>
  <div class="clearfix"> </div>
            
              </div>
            </div>

          </div>
          
         
    </div>
         <div class="next-prev-btn-container pull-right">
               
               
               
                  
                  <?php
          /*   $batal = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-danger input-top-margin',
            'value'   => '',
            'type'    => 'button',
            'content' => 'Batal'
        );

        echo form_button($batal);
        */
        ?>
       
        <?php
        $hantar = array(
            'name'    => 'hantar',
            'id'      => 'hantar',
            'class'   => 'btn btn-success',
            'value'   => '1',
            'type'    => 'submit',
            'content' => 'Hantar'
        );

        echo form_button($hantar);
        
        ?>

</div>
<div class="clearfix"></div>


              </div>




              <?php  echo form_close();?>

            </div>

             

          </div>
          
         

        </div>
        
        
</div>
  
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
      
     
       $("hantar").onclick = function () {
        reset();
        alertify.confirm("Adakah ingin menghantar arahan penyediaan ini?", function (e) {
          if (e) {
              
            alertify.success("Anda klik ya");
            //document.forms["arahan_sedia_pspao"].submit();
            //window.location.replace("<?php echo site_url('pspao_awal/arahan_sedia_pspao') ?>");
          } else {
            alertify.error("Anda klik tidak");
          }
        });
        return false;
      };
      
      
     
</script>
    
 