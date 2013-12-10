<?php
/*
		AUTHOR : MOHD KHAIRUL RAMLI
		LAST UPDATE : 24-07-2013
		FILE NAME : side-kus.php
		ACTUAL LOCATION : application/view/template/side-kus.php
*/

echo '<ul style="display: block;">';

$full_menu = NULL;

foreach ($menu_parent->result() as $row)
{
	
	if($menu_id == $row->sidemenu_id){
		//echo ' (Aktif)';
	   	$a1 = '<li class="active">';
	}else{
   		$a1 = '<li>';
	}
   	//echo '('.$row->sidemenu_node.')';
	//echo $row->sidemenu_id;
	$b = '<a href="'.site_url($row->sidemenu_link).'" title="'.$row->sidemenu_toolstip.'" data-placement="right">';
   	$c1 = '<div class="icon"><span class="fs1" aria-hidden="true" data-icon="'.$row->sidemenu_iconcode.'"></span></div>';
	$d = $row->sidemenu_nama;
	$c2 = '</a>';
	
	$sub_menu = NULL;
	$sa1 = '<ul>';
	$sa2 = '</ul>';
	$sb1 = NULL;
	$sb2 = NULL;
	$sc = NULL;
	$adasub = NULL;
	foreach ($menu_sub->result() as $row_sub):
		if($row->sidemenu_id == $row_sub->sidemenu_node):
		$adasub = 1;
			
			if($menu_id == $row_sub->sidemenu_id){
				$sb1 = '<li class="active">';
				$a1 = '<li class="submenu active open">';
			}else{
				$sb1 = '<li>';
			}
			
			$sc = '<a href="'.site_url($row_sub->sidemenu_link).'" title="'.$row_sub->sidemenu_toolstip.'" data-placement="right">'.$row_sub->sidemenu_nama.'</a>'.$row_sub->sidemenu_node;
			$sb2 = '</li>';
			
		endif;
		$sub_menu .= $sb1.$sc.$sb2;
	endforeach;
	if($adasub == 1) $sub_menu = $sa1.$sub_menu.$sa2;
   	$a2 = '</li>';	
	$full_menu .= $a1.$b.$c1.$d.$c2.$sub_menu.$a2;

/*   
   if($menu_id == $row->sidemenu_id){$kk_li_open .= sprintf('<li%s>',$kk_aktif);}
   else{$kk_li_open .= '<li>';}
   $kk_url_open .= '<a href="'.$row->sidemenu_link.'">';
   
   $kk_menu_open .= '<div class="icon"><span class="fs1" aria-hidden="true" data-icon="'.$row->sidemenu_iconcode;
   
   $kk_menu_title .= $row->sidemenu_menu;
   
   $kk_menu_close .= '"></span></div>';
   
   $kk_url_close .= '</a>';
   $kk_li_close .= '</li>';
*/   
   
   //$kk_li_open = sprintf('<li%s>',$kk_aktif);
   
   //$full_li .= $kk_li_open.$kk_url_open.$kk_li_open.$kk_menu_open.$kk_menu_title.$kk_menu_close.$kk_url_close.$kk_li_close;
   
}
echo $full_menu;
echo '</ul>';
//echo $kusang = $kk_smenu_open.$full_li.$kk_smenu_close;
//echo htmlentities($kusang);

/*
	foreach($records as $key => $val){
		echo "records[".$key."]".$val."<br>";
	}
*/
?>