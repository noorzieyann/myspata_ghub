<?php

$hostname_dbconn = "myspata1.cbduhjchrnrz.us-west-2.rds.amazonaws.com";
$database_dbconn = "myspata_db_sys";
$username_dbconn = "myspata1";
$password_dbconn = "my12345spata1";
$dbconn = mysql_pconnect($hostname_dbconn, $username_dbconn, $password_dbconn) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_dbconn, $dbconn);

date_default_timezone_set('Asia/Kuala_Lumpur'); 
$md5_takwim = $_GET['token'];

$md5_ori ='b55bde77b4ae46a0bc636efaa82a6074';

$current_date = date('Y-m-d');
//echo "currentdate=".$current_date."<br/>";

if($md5_takwim==$md5_ori){  //execute if md5 takwim same


$qtakwim = "SELECT * FROM tbl_takwim_aktvt WHERE alert_takwim=1";
//echo $qtakwim . '<br>';
$takwim_result = mysql_query($qtakwim, $dbconn) or die(mysql_error());   
while($takwim_row = mysql_fetch_array($takwim_result))
  {



$date = $takwim_row['takwim_tarikh'];
$day  = $takwim_row['takwim_alert_hari'];
$newdate = strtotime ( '-'.$day.'day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d' , $newdate );

//echo $takwim_row['takwim_aktvt_id'].' '.$newdate."<br/>";



// get pp user id
$query = "SELECT mu.myspata_userid FROM tbl_myspata_user as mu LEFT JOIN tbl_myspata_user_to_matrix as mum ON 
         mum.myspata_userid = mu.myspata_userid LEFT JOIN tbl_user_matrix as um ON um.role_pengguna_id = mum.role_pengguna_id WHERE 
         um.kump_pengguna_id=3 GROUP BY mu.myspata_userid";

$result = mysql_query($query, $dbconn) or die(mysql_error());        

 //echo $query;	
while($row = mysql_fetch_array($result))  // user id pp
  {

//echo $newdate.$current_date."<br/>";
if($current_date==$newdate){  //check new date is same as current date

//echo 'masuk<br>';

 if($takwim_row['flag_pspao_awal']==1){  //check if takwim aktiviti is pyediaan pspao awal


 $insert = "INSERT INTO tbl_notifikasi (kump_kand_id,senarai_notifikasi_id,myspata_userid_from,tarikh_dihantar,
  	       myspata_userid_to,tarikh_dibaca,status,notifikasi_url) VALUES (1,1,0,Now(),
  	       '".$row['myspata_userid']."',0000-00-00,0,'pspao_awal/pspao_tahun')";

$resultinsert = mysql_query($insert, $dbconn) or die(mysql_error());
//echo $insert."<br/>";

if($resultinsert){

	$update = "UPDATE tbl_takwim_aktvt SET alert_takwim=0 WHERE takwim_aktvt_id=".$takwim_row['takwim_aktvt_id'];
	$resultupdate = mysql_query($update, $dbconn) or die(mysql_error());
}

 }

 if($takwim_row['flag_pspao_awal']==0){

$insert_takwim = "INSERT INTO tbl_takwim_notifikasi (title_notifikasi,tarikh_dihantar, myspata_userid_to,tarikh_dibaca,status,takwim_aktvt_id) 
VALUES ('".$takwim_row['takwim_aktvt']."',Now(),'".$row['myspata_userid']."',0000-00-00,0,'".$takwim_row['takwim_aktvt_id']."')";

//echo "insert".$insert_takwim."<br>";

$resultinsert = mysql_query($insert_takwim, $dbconn) or die(mysql_error());

if($resultinsert){

	$update = "UPDATE tbl_takwim_aktvt SET alert_takwim=0 WHERE takwim_aktvt_id=".$takwim_row['takwim_aktvt_id'];
	$resultupdate = mysql_query($update, $dbconn) or die(mysql_error());
}

  }

  }

 } //end of pp

  }

}  //end of execute md5





?>