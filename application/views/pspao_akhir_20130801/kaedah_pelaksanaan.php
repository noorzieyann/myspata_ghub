<table class="table table-condensed table-striped table-bordered table-hover no-margin" style="width:80%">
  <thead>
	<tr>
	  <th>Nama Kementerian/ Jabatan/ Agensi</th>
      <th style="width:40%">Kenyataan Polisi Kaedah Pelaksanaan</th>
	</tr>
  </thead>
  <tbody>
	<tr>
  	  <td>Kementerian Kerja Raya</td>
  	  <td>
<?php
  	$data = array(
		'name'        => 'dpa_sasaran',
		'id'          => 'dpa_sasaran',
		'value'       => '',
		'maxlength'   => '100',
		'size'        => '70',
		'class'       => 'span8',
		'placeholder' =>  '',
	);
	echo form_input($data);
?>
	  </td>
	</tr>
  </tbody>
</table>
