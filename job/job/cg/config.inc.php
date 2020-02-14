<?

	$host = "localhost";				// กำหนด Host
	$userroot ="amecom_std";					// user ที่ใช้งาน mysql
	$pwdroot="vqJZQs5g";					// password mysql
	$dbName = "amecom_std";			// Database ที่ใช้งาน
	$siteurl="http://std.yimth.com/";
	$conn = mysql_connect($host , $userroot, $pwdroot) or die ("cannot connect to database") ;
	mysql_query("SET NAMES utf8", $conn) ;
	mysql_select_db("$dbName") or die ("cannot connect to database") ;	

?>