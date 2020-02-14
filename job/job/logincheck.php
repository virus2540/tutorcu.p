<?php
session_start();
include"system/config.inc.php";
  //เวลาปัจจุบัน จาก server
  $hour=0; //เวลาทด เป็น + หรือ - ถ้าเวลาของ Server ไม่ตรงกับประเทศไทย
  $min =0; //เวลาทด เป็น + หรือ - ถ้าเวลาของ Server ไม่ตรงกับประเทศไทย
  $logtime=date("U",mktime( date("H")+$hour, date("i")+$min ));
$username = trim($_POST["username"]);
$strPassword = trim($_POST["tPassword"]);
$mPasswd_md5=md5("$strPassword"); // Decodegเข้ารหัส Md5
if(trim($username) == "")
	{
		echo "<div class=vaild-login>กรุณากรอก อีเมล์เข้าใช้งาน</div>";
		exit();
	}
	if(trim($strPassword) == "")
	{
		echo "<div class=vaild-login>กรุณากรอกรหัสผ่านเข้าใช้งาน</div>";
		exit();
	}

	$objConnect = mysql_connect("localhost","".$userroot."","".$pwdroot."") or die("Error Connect to Database");
	$objDB = mysql_select_db("".$dbName."");
	$strSQL = "SELECT * FROM members WHERE username = '".$username."' and password = '".$mPasswd_md5."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "Y";

		//*** กำหนดค่า Sesion ***//
		$_SESSION["username"] = $objResult[username];
	    $_SESSION["password"] = $objResult[password] ;
	    $_SESSION["userID"] = $objResult[userID] ;
	    $_SESSION["email"] = $objResult[email];
	    $_SESSION["status"] = $objResult[status];
		$_SESSION["sestime"]=$logtime; //กำหนดเวลาในการอยู่ในระบบถ้านานเกินตามกำหนดให้ออกระบบโดยอัตโนมัติ
$lastipsave =  mysql_query("UPDATE `members` SET `lastknownip` = '".$_SERVER['REMOTE_ADDR']."',`lastlogin` = '".date('Y-m-d H:i:s')."',`loggedin` = '1' WHERE `userID`='".$_SESSION['userID']."'") or die(mysql_error());
		session_write_close();
	}
	else
	{
		echo "<div class=vaild>ชื่อเข้าใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง</div>";
	}

	mysql_close($objConnect);
?>