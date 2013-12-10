<?php

if($this->input->post('k1a')){$k1a = $this->input->post('k1a');}
if($this->input->post('k1b')){$k1b = $this->input->post('k1b');}
if($this->input->post('k2a')){$k2a = $this->input->post('k2a');}
if($this->input->post('k2b')){$k2b = $this->input->post('k2b');}
if($this->input->post('k3a')){$k3a = $this->input->post('k3a');}
if($this->input->post('k3b')){$k3b = $this->input->post('k3b');}
if($this->input->post('k4a')){$k4a = $this->input->post('k4a');}
if($this->input->post('k4b')){$k4b = $this->input->post('k4b');}
if($this->input->post('k5a')){$k5a = $this->input->post('k5a');}
if($this->input->post('k5b')){$k5b = $this->input->post('k5b');}
if($this->input->post('k6a')){$k6a = $this->input->post('k6a');}
if($this->input->post('k6b')){$k6b = $this->input->post('k6b');}

?>

<table class="table table-condensed table-striped table-bordered table-hover no-margin" style="width:80%">
<thead>
  <tr>
    <th style="width:40%">Aktiviti Pengurusan Aset</th>
    <th style="width:30%">Penyataan</th>
    <th style="width:30%">Output</th>
                       
  </tr>
</thead>
<tbody>
  <tr>
    <td>Penerimaan dan Pendaftaran Aset</td>
    <td>
    <?php
                          $data = array(
                            'name'        => 'k1a',
                            'id'          => 'k1a',
                            'value'       => $k1a,
                            'maxlength'   => '100',
                            'size'        => '70',
                            'class'       => 'span8',
							'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
    <td>
    <?php
                          $data = array(
                            'name'        => 'k1b',
                            'id'          => 'k1b',
                            'value'       => $k1b,
                            'maxlength'   => '100',
                            'size'        => '70',
                            'class'       => 'span8',
							'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
                       
  </tr>
  <tr>
    <td>Operasi dan Penyelenggaraan Aset</td>
    <td>
    <?php
                          
                          $data = array(
                            'name'        => 'k2a',
                            'id'          => 'k2a',
                            'value'       => $k2a,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
							'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
                        
    </td>
    <td>
     <?php
                          
                          $data = array(
                            'name'        => 'k2b',
                            'id'          => 'k2b',
                            'value'       => $k2b,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
							'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
                        
  </tr>
  <tr>
    <td>Penilaian Keadaan/ Prestasi Aset</td>
    <td>
        <?php
                          
                          $data = array(
                            'name'        => 'k3a',
                            'id'          => 'k3a',
                            'value'       => $k3a,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
    <td>
        <?php
                          
                          $data = array(
                            'name'        => 'k3b',
                            'id'          => 'k3b',
                            'value'       => $k3b,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
  </tr>
  <tr>
    <td>Pemulihan/ Ubahsuai/ Naik Taraf Aset</td>
    <td>
        <?php
                          
                          $data = array(
                            'name'        => 'k4a',
                            'id'          => 'k4a',
                            'value'       => $k4a,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
    <td>
        <?php
                          
                          $data = array(
                            'name'        => 'k4b',
                            'id'          => 'k4b',
                            'value'       => $k4b,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
  </tr>
  <tr>
    <td>Penilaian Keadaan/ Prestasi Aset</td>
    <td>
        <?php
                          
                          $data = array(
                            'name'        => 'k5a',
                            'id'          => 'k5a',
                            'value'       => $k5a,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
    <td>
        <?php
                          
                          $data = array(
                            'name'        => 'k5b',
                            'id'          => 'k5b',
                            'value'       => $k5b,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
                        
  </tr>
  <tr>
    <td>Hapus Kira</td>
    <td>
        <?php
                          
                          $data = array(
                            'name'        => 'k6a',
                            'id'          => 'k6a',
                            'value'       => $k6a,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
    <td>
        <?php
                          
                          $data = array(
                            'name'        => 'k6b',
                            'id'          => 'k6b',
                            'value'       => $k6b,
                            'maxlength'   => '100',
                            'size'        => '50',
                            'class'       => 'span8',
                            'disabled'	  => 'disabled',
                            'placeholder' =>  '',
                          );

                          echo form_input($data);
                          
                          ?>
    </td>
                        
  </tr>
</tbody>
</table>
