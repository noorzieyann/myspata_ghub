<?php


	function get_year_dropdown(){
		
		$year = array();
		
		$year[''] = '- Pilih Tahun -';
		for($i=2023;$i>=1900;$i--){
			$year[$i] = $i;
		}

		return $year;
		
	}