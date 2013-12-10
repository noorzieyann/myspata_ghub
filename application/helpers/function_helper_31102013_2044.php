<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

	function year_dropdown()
	{
	   date_default_timezone_set('UTC');
	   $startYear=1900; 
	   $endYear= date("Y")+10;
	    //$endYear=mdate("%Y");+10;
	   $year_list = array();
	   
	   $year_list[''] = '- Pilih Tahun -';    // default selection item
	
	   for ($i=$endYear;$i>=$startYear;$i--)
	   {
	
		   $year_list[$i] = $i;      
	   } 
	 
	   return $year_list;
		
	}


?>
