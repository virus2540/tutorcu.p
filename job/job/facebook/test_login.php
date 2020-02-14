<?php
session_start(); // กำหนดไว้ กรณีอาจได้ใช้ตัวแปร session
include"../system/config.inc.php";
include"../system/function.php";
include("fb_connect.php");
	$host ="localhost";				// กำหนด Host
	$userroot ="tutorcuc_job2";					// user ที่ใช้งาน mysql
	$pwdroot="1cbheXbm";					// password mysql
	$dbName="tutorcuc_job2";			// Database ที่ใช้งาน
$connect = mysql_connect($host , $userroot, $pwdroot) or  die("ติดต่อฐานข้อมูลไม่ได้");
mysql_select_db($dbName);
mysql_query("set NAMES utf8 ");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample FB Login</title>
</head>

<body>

   <h1>php-sdk 3.1.1</h1>

<?php if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>
	<a href="<?=$logoutUrl?>">Logout</a>
<?php }else{ //  ถ้ายังไม่ได้ล็อกอิน แสดงลิ้งค์สำหรับ Login ?>
    <div>
    <a href="<?=$loginUrl?>">Login with Facebook</a>
    </div>
<?php } ?>

    <pre><?php print_r($_SESSION); ?></pre>

<?php if($fb_user){ // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงข้อมูลของคนๆ นั้น ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?=$fb_user?>/picture">

      <h3>Your User Object (/me)</h3>
      <?php 
// pre($fb_userData); 
$user = $facebook->getUser();
 
if ($user) {
  try {
    $user_profile = $facebook->api('/me');
	$access_token = $facebook->getAccessToken();
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
function random_pass($len)
{
srand((double)microtime()*10000000);
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$ret_str = "";
$num = strlen($chars);
for($i = 0; $i < $len; $i++)
{
$ret_str.= $chars[rand()%$num];
$ret_str.=""; 
}
return $ret_str; 
}
$code_pass=random_pass(5); 
$email=$user_profile['email'];
$fb_id=$user_profile['id'];
$name=$user_profile['name'];
$fb_idlog=$fb_id;
$password=$code_pass;
$process=$code_generate;
/*gen code members*/
$rs_mem = "SELECT MAX(id) AS id FROM user";
$result = mysql_query($rs_mem);
$row_mem=mysql_fetch_array($result);
$mem_old=$row_mem['id']+1;
$number_preview=sprintf("%07d", $mem_old);
$memberID='tcu'.$number_preview.'';
$date_add=date("Ymdhis");
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
echo'
<script type="text/javascript"> 
      window.onunload = refreshParent;
            function refreshParent() {
                window.opener.location.reload();
            }
 window.close();
</script>

';
}else{
/*เพิ่มข้อมูลเข้าในระบบสมาชิก*/
$query="INSERT INTO user (id, memberID, fb_id, password, email, date_add, confirm, process, name) VALUES ('','$memberID','$fb_id','$password','$email','$date_add','no','$process','$name')";
$result=mysql_query($query);
$fb_id=$user_profile['id'];
$query1="SELECT * FROM user WHERE fb_id=".$fb_id."";
$result1=mysql_query($query1);
$objResult=mysql_fetch_array($result1);
		$_SESSION["email"] = $objResult[email];
	    $_SESSION["password"] = $objResult[password] ;
	     $_SESSION["userID"] = $objResult[id] ;
		$_SESSION["process"] = $objResult[process];
		$_SESSION["memberID"] = $objResult[memberID];
$id_tech=$objResult[process] ;
 mysql_query("INSERT INTO tb_eduschool (edu_id,tutor_id) VALUES  ('','$id_tech')");
 mysql_query("INSERT INTO  tb_eduuniversity (edu_id,u_name,u_year,faceulty,sector,grade,tutor_id) VALUES  ('','$u_name','$u_year','$faceulty','$sector','$grade','$id_tech')");
 mysql_query("INSERT INTO  tb_masterdegree (edu_id,tutor_id) VALUES  ('','$id_tech')");
 mysql_query("INSERT INTO  tb_profesor (edu_id,tutor_id) VALUES  ('','$id_tech')");

echo'
<script type="text/javascript"> 
      window.onunload = refreshParent;
            function refreshParent() {
                window.opener.location.reload();
            }
 window.close();
</script>

';
}
	  ?>
      
<?php }else{ //  ถ้ายังไม่ได้ล็อกอิน  ?>
      <strong><em>You are not Connected.</em></strong>

<?php } ?>

</body>
</html>