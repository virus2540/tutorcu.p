<?php
session_start();
include "../system/config.inc.php";
//เวลาปัจจุบัน จาก server
$hour=0; //เวลาทด เป็น + หรือ - ถ้าเวลาของ Server ไม่ตรงกับประเทศไทย
$min =0; //เวลาทด เป็น + หรือ - ถ้าเวลาของ Server ไม่ตรงกับประเทศไทย
$logtime=date("U",mktime( date("H")+$hour, date("i")+$min ));

$username = $_GET["username"];
$strPassword = $_GET["txtPassword"];
$mPasswd_md5=md5($strPassword); // Decodegเข้ารหัส Md5
	if(!isset($username))
	{
		echo $username;
		echo "<div class=vaild-login>กรุณากรอก อีเมล์เข้าใช้งาน</div>";
		echo "<script>window.location = '../administrator/login.php?status=0';</script>";
	}
	if(!isset($strPassword))
	{
		echo "<div class=vaild-login>กรุณากรอกรหัสผ่านเข้าใช้งาน</div>";
		echo "<script>window.location = '../administrator/login.php?status=1';</script>";
	}
	$strSQL = "SELECT * FROM admin_user WHERE username = '".$username."' and password = '".$mPasswd_md5."' ";
	
	$objQuery = mysqli_query($conn,$strSQL);
	
	if($objResult = $objQuery->fetch_array(MYSQLI_ASSOC)){
		
		$_SESSION["admin_username"] = $objResult[username];
	    $_SESSION["admin_password"] = $objResult[password] ;
	    $_SESSION["adminID"] = $objResult[userID] ;
	    $_SESSION["admin_email"] = $objResult[email];
	    $_SESSION["admin_status"] = $objResult[status];
		$_SESSION["admin_sestime"]=$logtime; //กำหนดเวลาในการอยู่ในระบบถ้านานเกินตามกำหนดให้ออกระบบโดยอัตโนมัติ
		$sql_update = "UPDATE `admin_user` SET `lastknownip` = '".$_SERVER['REMOTE_ADDR']."',`lastlogin` = '".date('Y-m-d H:i:s')."',`loggedin` = '1' WHERE `userID`='".$_SESSION['adminID']."'";
		$lastipsave =  mysqli_query($conn,$sql_update) or die(mysqli_error());
		echo "<script>window.location = '../administrator/index.php';</script>";
	}
	else
	{
		$status = "<div class=vaild>ชื่อเข้าใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง</div>";
		echo "<script>window.location = '../administrator/login.php?status=2';</script>";
	}

?>
