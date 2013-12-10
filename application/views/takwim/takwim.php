 <style>
.modal2{

  width:80% !important;
  left:30%;

}

 </style>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

  <script type="text/javascript">

 /*  $(document).ready(function() {
    data:{year:<?php echo $year;?>,mon:<?php echo $mon;?>}
   $('.calendar .day').click(function(get_day_num) {

day_num = $(this).find('.day_num').html();
      //alert(day_num);

   var click = 

   $('#tarikh').val(day_num);

   $('#myModal').modal('show');

  
      
      day_data = prompt('Enter Stuff', $(this).find('.content').html());
      if (day_data != null) {
        
        $.ajax({
          url: window.location,
          type: 'POST',
          data: {
            day: day_num,
            data: day_data
          },
          success: function(msg) {
            location.reload();
          }           
        });
        
      }
     
    });
    
  });
  */  
  </script> 

    <!--breadcrumb-->

    <div class="widget-body">
                  <ul class="breadcrumb-beauty">
                    <li>
                      <a href="<?php echo site_url('main')?>">
                        Takwim
                      </a> 
                    </li>
                   
                    
                  </ul>
    </div>
    <!--END breadcrumb-->
    <br />  


<div class="row-fluid">
            <div class="span12">
              <div class="widget">
                <div class="widget-header">
                  <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe14a;"></span> Takwim Tatacara Pengurusan Aset Tak Alih Kerajaan 
                  </div>
                </div>
           
                 <?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'takwim',
                           'id' => 'takwim',
                        );
                    echo form_open('pentadbir/pengurusan_takwim',$attributes); ?>
                     
                
              <div class="widget-body">
              
                   <div class="widget">
                     <div class="widget-header">
                      <div class="title">
                    <span class="fs1" aria-hidden="true" data-icon="&#xe052;"></span> Takwim Aktiviti
                  </div>
                     </div>
                       
                      
                     <div class="row-fluid">
                       <div class="span12">
                        <div class="widget-body">
                           <?php echo validation_errors(); ?>  
                   
                      
                      
                            <?php
                           echo $calendar;
                            ?>
                    
                            
                            
                     </div>
                     </div>
                   </div>
 
                  
                </div>
                  
                  
             


                
              </div>
                
              <?php  echo form_close();?>
          
              </div>
            </div>

          </div>
         