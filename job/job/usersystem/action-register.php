<?
session_start();
include"../system/config.inc.php";
include"../system/web_config.php";
include"../system/function.php";
//*** Register Global =On/Off Function *** เพื่อเพิ่มมาตรฐานความปลอดภัย NO register Globall//
$phpVersion = phpversion();
list($v_Upper,$v_Major,$v_Minor) = explode(".",$phpVersion);

if (($v_Upper == 4 && $v_Major < 1) || $v_Upper < 4) {
	$_FILES = $HTTP_POST_FILES;
	$_ENV = $HTTP_ENV_VARS;
	$_GET = $HTTP_GET_VARS;
	$_POST = $HTTP_POST_VARS;
	$_COOKIE = $HTTP_COOKIE_VARS;
	$_SERVER = $HTTP_SERVER_VARS;
	$_SESSION = $HTTP_SESSION_VARS;
	$_FILES = $HTTP_POST_FILES;
}

if (!ini_get('register_globals')) {
	while(list($key,$value)=each($_FILES)) $GLOBALS[$key]=$value;
	while(list($key,$value)=each($_ENV)) $GLOBALS[$key]=$value;
	while(list($key,$value)=each($_GET)) $GLOBALS[$key]=$value;
	while(list($key,$value)=each($_POST)) $GLOBALS[$key]=$value;
	while(list($key,$value)=each($_COOKIE)) $GLOBALS[$key]=$value;
	while(list($key,$value)=each($_SERVER)) $GLOBALS[$key]=$value;
	while(list($key,$value)=@each($_SESSION)) $GLOBALS[$key]=$value;
	foreach($_FILES as $key => $value){
		$GLOBALS[$key]=$_FILES[$key]['tmp_name'];
		foreach($value as $ext => $value2){
			$key2 = $key."_".$ext;
			$GLOBALS[$key2]=$value2;
		}
	}
}
$connect=mysql_connect($host,$userroot,$pwdroot);
$select=mysql_select_db($dbName);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สมัครสมาชิกเรียบร้อย</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/txtstyle.css" />
<script src="../js/font/cufon-yui.js" type="text/javascript"></script>
<script src="../js/font/supermarket_400.js" type="text/javascript"></script>
<script type="text/javascript">
		 Cufon.replace('h1,h2,.head_manu,h2 span');
 
</script>
<style type="text/css">
	.head_manu { font-size:25px; color: #fff}
	h2 span{ font-size:18px; color: #fff}
	h2 span a:hover{ font-size:18px; color: #FF9900}
	h1 { font-size:32px; color: #fff }
	h1 span { color: #A0A0A4}
	h2 { font-size:42px; text-align:center; }
</style> 
</head>
<body>
<div>

  <div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>" class="linkblack11">หน้าหลัก</a> &gt; สมัครสมาชิก</div>
    <div> </div>
    <div class="head_tl"><span class="head_manu">สมัครสมาชิก</span></div>
    <div>
    </div>
    <div class="box-register-complete">
      
<?
$captcha = @$_POST['ct_captcha']; // the user's entry for the captcha code
    if (sizeof($errors) == 0) {
      require_once dirname(__FILE__) . '../../security-code/securimage.php';
      $securimage = new Securimage();

      if ($securimage->check($captcha) == false) {
        $errors['captcha_error'] = 'Incorrect security code entered<br />';
	echo "<p align=center><div class=vaild>รหัสความปลอดภัย ไม่ถูกต้อง!</div> <br>\n";
	echo "<a href=\"javascript:history.back(1)\">กลับเพื่อเเก้ไข</a></p>\n";
		exit;
      }
    }
# Block HTML Tag
$username=htmlspecialchars($username);
$password=htmlspecialchars($password);
$email=htmlspecialchars($email);
# Block Special TAG
$username=addslashes($username);
$password=addslashes($password);
$email=addslashes($email);
$name=$_POST['name'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$org=$_POST['org'];
$package=$_POST['package'];
$mounth=$_POST['mounth'];
# ข้อมูลสำหรับติดต่อ
$province_id = $_POST['province_id'];
$amphur_id = $_POST['amphur_id'];
$tambol_id = $_POST['district_id'];
$active_code=$code_generate;
$date_add=date("Ymdhis");
/*จบการเรียกใช้งาน*/

$strSQL1 = "SELECT * FROM province WHERE PROVINCE_ID = '$province_id'";
$result1 = mysql_query($strSQL1);
$row1 = mysql_fetch_array($result1);
$province_name = $row1['PROVINCE_NAME'];


$strSQL2 = "SELECT * FROM amphur WHERE AMPHUR_ID = '$amphur_id'";
$result2 = mysql_query($strSQL2);
$row2 = mysql_fetch_array($result2);
$amphur_name = $row2['AMPHUR_NAME'];


$strSQL3 = "SELECT * FROM district WHERE DISTRICT_ID = '$district_id'";
$result3 = mysql_query($strSQL3);
$row3 = mysql_fetch_array($result3);
$tambol_name = $row3['DISTRICT_NAME'];
# Encode
$password2=md5($password);
# ตรวจสอบว่ามี Id นี้อยู่หรือเปล่า
$query="SELECT username from members WHERE username='$username'";
$result=mysql_query($query,$connect);
$num_rows = mysql_num_rows($result);
if ($num_rows>=1) {
	echo "Username : <strong>$username</strong> มีคนใช้แล้ว <br>\n";
	echo "<a href=\"javascript:history.back(1)\"> แก้ไขข้อมูล </a>\n";
	exit;
}
$query="SELECT email from members WHERE email='$email'";
$result=mysql_query($query,$connect);
$num_rows = mysql_num_rows($result);
if ($num_rows>=1) {
	echo "Username : <strong>$email</strong> มีคนใช้แล้ว <br>\n";
	echo "<a href=\"javascript:history.back(1)\"> แก้ไขข้อมูล </a>\n";
	exit;
}

$data = array(  
	"username"=>$username,
	"password"=>$password2,
	"email"=>$email,
	"name"=>$name,
     "address"=>$address,
     "tambol_id"=>$tambol_id,
     "amphur_id"=>$amphur_id,
     "province_id"=>$province_id,
     "tambol"=>$tambol_name,
     "amphur"=>$amphur_name,
     "province"=>$province_name,
     "confirm"=>'yes',
     "status"=>'1',
     "package"=>'member',
     "date_add"=>$date_add,
     "org"=>$org,
     "road"=>$road,
     "zipcode"=>$zipcode,
     "tel"=>$tel,
	 "active_code"=>$active_code,
);
insert("members",$data); 
$sql_agent = "SELECT userID FROM members WHERE active_code = '".$active_code."'";
$result_agent = mysql_query($sql_agent);
$agent_add = mysql_fetch_array($result_agent);
$query="INSERT INTO agency (member_id, package, mounth, status, status_member) VALUES ('".$agent_add['userID']."', 'member', '0', 'no','member')";
$result=mysql_query($query);
mysql_close($connect);
echo "-------------------------------------------------------------------- <br>\n";
echo "สมัครสมาชิก <b>$username</b> เรียบร้อยแล้วครับ<br>\n";
echo "--------------------------------------------------------------------  <br>\n";
// ฟังกชั่นส่งเมล์ ยืนยันสมาชิก เเละยืนยันเเพคเก็ต
//$from = $email_web;
$from = 'support@sarakhamhi.com';
//$fromname = $site_name;
$fromname = 'myname';
$to = "".$email."";
$subject = ''.$name.'-ยืนยันสมัครสมาชิกสำหรับ '.$siteurl.'';
$message = '
<table align="center" width="600" bgcolor="#ffffff" cellpadding="0" cellspacing="0" border="0" style="border:#bbbbbb 1px solid">
<tbody><tr>
<td valign="top" align="center">

<table align="center" width="600" cellpadding="0" cellspacing="0" border="0">
<tbody><tr>
<td valign="top" align="left" bgcolor="#0066FF" width="600" height="90"></td>

</tr>
<tr>

<td valign="top" align="center" bgcolor="#ffffff" width="600" height="10"></td>

</tr>
</tbody></table>


<table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="ffffff">
<tbody><tr>
<td height="20" colspan="3"></td>
</tr>
<tr>
<td width="25"></td>

<td width="550" valign="top" align="left" style="font-family:Tahoma, Ms Sans Serif;font-size:12px;line-height:normal">


<b>เรียน  คุณ '.$name.'</b><br>


ขอบคุณที่ลงทะเบียนกับเรา '.$site_name.'! ชื่อที่ท่านได้ใช้ในการสมัครเข้าบัญชีลงชื่อเข้าใช้ <b> รายละเอียดในการ ล็อกอิน อยู่ด้านล่าง</b>.<br>

<center>
<div style="width:280px;text-align:center;padding:10px;border:1px black solid">
<div style="text-align:left">
<b>ชื่อล็อคอิน:</b> '.$username.'<br>
<b>รหัสผ่าน:</b> '.$password.'
</div>
</div>
</center>


ท่านสามารถเปลี่ยนเเปลงรหัสส่วนตัวได้ตลอดเวลา <b>ล๊อกอิน</b> ได้ที่ <a href='.$siteurl.'usersystem/login" target="_blank">เข้าสู่ระบบ</a>
<br>


<span style="font-size:14px;font-weight:bold">สิ่งที่คุณพบได้จาก '.$site_name.':</span>
<br><ul>
<li>หาบ้านสำหรับเช่าหรือขาย (<a href='.$siteurl.'search.php target="_blank">ลิ้งค์</a>)</li>
<li>ประกาศอสังหาริมทรัพย์ของคุณ</li>
</ul>
<br>


เพื่อช่วยให้เราพัฒนาบริการ เพื่อที่ท่านจะได้รับประโยชน์ในการใช้เว็บไซต์ของเราได้มากที่สุด,
ขอความอนุเคราะห์ <b>ในการแจ้งรายละเอียดเกี่ยวกับตัวท่านสักเล็กน้อย</b> โดยการคลิก <a href="'.$siteurl.'usersystem/my" target="_blank">ที่นี่</a>.<br>
<em>หมายเหตุ: เราจะปิดข้อมูลส่วนตัวของท่านเป็นความลับ ไม่เปิดเผยก่อนที่จะได้รับการอนุญาตจากท่านโดยเด็ดขาด.</em>
<br>

ขอให้มีความสุข สนุกกับการค้นหาบ้านในแบบที่คุณพอใจ!<br>


'.$site_name.'<br>
เว็บอสังหาฯ อันดับ 1 ของเมืองไทย
<br>

<br><br>
</td>
<td width="25"></td>
</tr>
</tbody></table>



<table align="center" cellspacing="0" cellpadding="0" border="0" bgcolor="#0066FF" style="width:100%">
<tbody><tr>
<td align="center" height="40" valign="middle">
<font face="Arial" style="font-size:11px;font-weight:bold" color="#ffffff">สงวนลิขสิทธิ์ © 2555 - '.$site_name.' -

<a href="'.$site_url.'policy.html" style="font-family:Tahoma, Ms Sans Serif;color:#ffff00;font-size:11px;font-weight:bold" target="_blank"> นโยบายความเป็นส่วนตัว</a>

</font></td>
</tr>
</tbody></table>

</td>
</tr>
</tbody></table>

';

// Main code
require("../mail_function/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->IsHTML(true); //หากส่งในรูปแบบ html ถ้าส่งเป็น text ก็ลบบรรทัดนี้ออกได้
$mail->CharSet = "utf-8"; //กำหนด charset ของภาษาในเมล์ให้ถูกต้อง เช่น tis-620 หรือ utf-8

$mail->Host = "".$hostmail.""; // SMTP server
$mail->SMTPAuth = "true";
$mail->Username = "".$username_email.""; // ชื่อ emil ที่ท่านใช้ login ควรสร้าง email user แยกต่างหากเพื่อใช้ส่งเมล์จากเว็บโดยเฉพาะเพื่อให้ตรวจสอบได้ง่าย
$mail->Password = "".$password_email.""; // รหัสผ่านของ email ที่ระบุด้านบน

/*$mail->Host = "mail.sarakhamhi.com"; // SMTP server
$mail->SMTPAuth = "true";
$mail->Username = "support@sarakhamhi.com"; // ชื่อ emil ที่ท่านใช้ login ควรสร้าง email user แยกต่างหากเพื่อใช้ส่งเมล์จากเว็บโดยเฉพาะเพื่อให้ตรวจสอบได้ง่าย
$mail->Password = "112233"; // รหัสผ่านของ email ที่ระบุด้านบน
*/
$mail->From = $from; // ผู้รับจะเห็นอีเมล์นี้เป็น ผู้ส่งเมล์
$mail->FromName = $fromname; // ผู้รับจะเห็นชื่อนี้เป็น ชื่อผู้ส่ง
$mail->AddAddress($to);
$mail->Subject = $subject;
$mail->Body = $message;

$mail->Send();
echo"<meta http-equiv=refresh content=1;url=../>";

?>
        
        <div class="clear"></div>


    </div>
  </div>

</div>
</body>
</html>
