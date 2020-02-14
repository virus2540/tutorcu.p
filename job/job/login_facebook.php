<?php
session_start(); // กำหนดไว้ กรณีอาจได้ใช้ตัวแปร session
include"./system/config.inc.php";
include"./system/function.php";
# ตรวจสอบว่ามี Id นี้อยู่หรือเปล่า
$query="SELECT fb_id from user WHERE fb_id='".$fb_id."'";
$result=mysql_query($query);
$num_rows = mysql_num_rows($result);
$arr_log=mysql_fetch_array($result);
if ($num_rows>=1) {
$query1="SELECT * FROM user WHERE fb_id=".$arr_log[fb_id]."";
$result1=mysql_query($query1);
$objResult=mysql_fetch_array($result1);
mysql_close($connect);
		$_SESSION["email"] = $objResult[email];
	    $_SESSION["password"] = $objResult[password] ;
	    $_SESSION["userID"] = $objResult[id] ;
		$_SESSION["process"] = $objResult[process];
		$_SESSION["memberID"] = $objResult[memberID];

echo"".$_SESSION["userID"]."";
//echo"<meta http-equiv=refresh content=1;url=./home.php>";
}
?>
