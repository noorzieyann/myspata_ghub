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

	/*
		name    : diana
		updated : 31/10/2013
		desc    : selected range list year
	*/
	function year_dropdown_selected($start_year,$end_year)
	{
	   date_default_timezone_set('UTC');
	   $startYear=$start_year*1; 
	   $endYear= $end_year*1;
	   $year_list = array();
	   
	   $year_list[''] = '- Pilih Tahun -';    // default selection item
	
	   for ($i=$endYear;$i>=$startYear;$i--)
	   {
		   $year_list[$i] = $i;      
	   } 
	 
	   return $year_list;
		
	}

?>
