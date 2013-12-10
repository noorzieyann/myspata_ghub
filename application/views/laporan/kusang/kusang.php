<?php 
                    $attributes = array(
                        'class' => 'form-horizontal no-margin', 
                         'name' => 'pspao_baru',
                           'id' => 'pspao_baru',
                        );
                    echo form_open('kusang/test',$attributes);
?>
                    
<?php
	$agreeCheck = array( 'name' => 'agreeCheck', 'id' => 'agreeCheck', 'value' => 'agree', 'checked' => set_checkbox('agreeCheck', 'agree', FALSE));
	echo form_checkbox($agreeCheck);

?>
<?php echo validation_errors(); ?>

        <?php
        $hantar = array(
            'name'    => '',
            'id'      => '',
            'class'   => 'btn btn-success',
            'value'   => '',
            'type'    => 'submit',
            'content' => 'Hantar'
        );

        echo form_button($hantar);
        
        ?>
       
       

    
     <?php  echo form_close();?>
