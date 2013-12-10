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

	$kaedah_perl = $this->pspao_akhir_model->get_kaedah_perlaksanaan($this->uri->segment(3));

	if(!$kaedah_perl){$kaedah_perl = '';}

  	$data = array(
		'name'        => 'kaedah_perl',
		'id'          => 'kaedah_perl',
		'value'       => $kaedah_perl,
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
  </tbody>
</table>
