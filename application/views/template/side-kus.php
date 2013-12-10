<?php
/*
		AUTHOR : MOHD KHAIRUL RAMLI
		LAST UPDATE : 24-07-2013
		FILE NAME : side-kus.php
		ACTUAL LOCATION : application/view/template/side-kus.php
*/

$sesr = $this->session->all_userdata();
$sesm = $this->aauth->get_session('menu');


$MENU_O = NULL;
$MENU_C = NULL;

$MENU_PO = NULL;
$MENU_P_CON = NULL;
$MENU_PC = NULL;

$MENU_SO = NULL;
$MENU_S_CON = NULL;
$MENU_SC = NULL;

$MENU = NULL;

$MENU_O = '<ul style="display: block;">';
$MENU_C = '</ul>';

foreach ($menu_parent->result() as $row){
	
	if($menu_id == $row->sidemenu_id){$MENU_PO = '<li class="active">';}else{$MENU_PO = '<li>';}
	$MENU_P_CON = '<a href="'.site_url($row->sidemenu_link).'" title="'.$row->sidemenu_toolstip.'" data-placement="right">';
	$MENU_P_CON .= '<div class="icon"><span class="fs1" aria-hidden="true" data-icon="'.$row->sidemenu_iconcode.'"></span></div>';
	$MENU_P_CON .= $row->sidemenu_nama.'</a>';
		
	$MENU_SUB = NULL;
	$SUB = NULL;
	$SUB_AKTIF = NULL;
	foreach ($menu->result() as $row_sub){
		
		if($row_sub->sidemenu_node == $row->sidemenu_id){
			$SUB = 1;
			
			if($menu_id == $row_sub->sidemenu_id){
				$MENU_SO = '<li class="active">';
				$SUB_AKTIF = 1;
			}else{
				$MENU_SO = '<li>';
			}//END IF ELSE
			//$MENU_S_CON = '<a href="'.site_url($row_sub->sidemenu_link).'" title="'.$row_sub->sidemenu_toolstip.'" data-placement="right">'.$row_sub->sidemenu_nama.'['.$row_sub->sidemenu_id.']'.'</a>';			
			$MENU_S_CON = '<a href="'.site_url($row_sub->sidemenu_link).'" title="'.$row_sub->sidemenu_toolstip.'" data-placement="right">'.$row_sub->sidemenu_nama.'</a>';			
			if($row_sub->sidemenu_id == 116 || $row_sub->sidemenu_id == 117){
				if($sesm[0]['menu_kemaskini[0]'] == 0){
					$MENU_S_CON = '';
				}
			}
			$MENU_SC = '</li>';
			$MENU_SUB .= $MENU_SO.$MENU_S_CON.$MENU_SC;

		}//END IF

	}//END FOREACH
	
	if($SUB == 1){
		$MENU_SUB = '<ul>'.$MENU_SUB.'</ul>';
		$MENU_PO = '<li class="submenu">';
		if($SUB_AKTIF == 1){$MENU_PO = '<li class="submenu active open">';}
	}
	$MENU_PC = '</li>';
	$MENU .= $MENU_PO.$MENU_P_CON.$MENU_SUB.$MENU_PC;
	
}
echo $MENU_C;
echo $MENU_O.$MENU.$MENU_C;

?>