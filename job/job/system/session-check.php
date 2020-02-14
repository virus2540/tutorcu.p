<?
session_start();
//*** Register Global =On/Off Function *** เพื่อเพิ่มมาตรฐานความปลอดภัย NO register Globall//

if (!isset($_SESSION[userID])|| trim($_SESSION[userID])=="") {
	   echo"<br /><br /><div align=center class=denies>Please login</div>";
	   echo"<meta http-equiv=refresh content=1;url=../job/login/>";
	   exit;
}


?>