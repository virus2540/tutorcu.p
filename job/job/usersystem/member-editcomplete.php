<?
session_start();
//error_reporting(0);
include"../system/config.inc.php";
include"../system/session.php";
include"../system/function.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.success-main{width:100%; margin:auto;}
.success{width:300px;height:100px;margin:auto;float:center;font-size:12px;border:solid 1px #CCCCCC;text-align:center;padding:20px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;}
.success-progress{width:150px;height:10px;background:url(../images/loading30.gif) no-repeat;margin:auto}
.success h2{color:#0080C0}
</style>
<?
$image_cover=$_GET[process_id];
$ID=$_SESSION[userID];
$action=$_POST[action];

# รายละเอียดที่ตั้ง
$email=$_POST["email"];
$name=$_POST["name"];
$address=$_POST["address"];
$province_id = $_POST['province_id'];
$amphur_id = $_POST['amphur_id'];
$district_id = $_POST['district_id'];
$road=$_POST["road"];
$zipcode=$_POST["zipcode"];
$org=$_POST["org"];
$tel=$_POST["tel"];
$new_recieve=$_POST["new_recieve"];
if($new_recieve!=""){
$new_recieve="yes";
}else{
$new_recieve="no";
}
/*check password*/
$password=$_POST[password];
$repassword=$_POST[repassword];
$oldpassword=$_POST[oldpassword];
$password2=md5($password);
$passwordold2=md5($oldpassword);#รหัสผ่านที่กรอกเพื่อมาเชคค่า
if($action=="save"){	
# ตรวจสอบรหัสผ่านตรงกันหรือไม่
$query="SELECT password from members WHERE userID='".$ID."'";
$result=mysql_query($query);
$check= mysql_fetch_array($result);
if ($check[password]!="".$passwordold2."") {
	echo "รหัสผ่านไม่ตรงกับรหัสปัจจุบัน กลับไปเเก้ไขใหม่<br>\n";
	echo "<a href=\"javascript:history.back(1)\"> แก้ไขข้อมูล </a>\n";
	exit;
}
if($_POST['password']!="" && $_POST['repassword']!=""){
if ($repassword!="".$password."") {
	echo "กรอกรหัสผ่านใหม่ไม่ตรงกัน กลับไปตรวจสอบใหม่<br>\n";
	echo "<a href=\"javascript:history.back(1)\"> แก้ไขข้อมูล </a>\n";
	exit;
}else{
$password_select=md5($password);
}
}else{
$password_select=md5($oldpassword);
}
#เรียกใช้งานฟังก์ชั่นจังหวัด
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
$district_name = $row3['DISTRICT_NAME'];
?>
<div class="success-main">
<div class="success">
<h2>ทำรายการสำเร็จ</h2>
<div class="success-progress"></div>
<p>ระบบกำลังนำกลับไปสู่หน้าก่อนนั้น กรุณารอสักครู่</p>
			</div></div>

<?
$data = array(  
	"password"=>$password_select,
	"email"=>$email,
	"name"=>$name,
	"address"=>$address,
     "tambol"=>$district_name,
     "amphur"=>$amphur_name,
     "province"=>$province_name,
     "tambol_id"=>$district_id,
     "amphur_id"=>$amphur_id,
     "province_id"=>$province_id,
	 "road"=>$road,
	 "zipcode"=>$zipcode,
     "org"=>$org,
	"tel"=>$tel,
	"new_recieve"=>$new_recieve,
);   
update("members",$data,"userID='".$ID."'");
echo"<meta http-equiv=refresh content=1;url=../usersystem/my>";
exit;
}
/*เอกสาร*/
$logo=$_FILES['logo'] ['tmp_name'];	
$logo_name=$_FILES['logo'] ['name'];
$logo_size=$_FILES['logo'] ['size'];
$logo_type=$_FILES['logo'] ['type'];

 /*กำหนดอัพเอกสาร*/
 if  ($logo) {
/*เอกสาร*/
$logo=$_FILES['logo'] ['tmp_name'];	
$logo_name=$_FILES['logo'] ['name'];
$logo_size=$_FILES['logo'] ['size'];
$logo_type=$_FILES['logo'] ['type'];
$path = "../upload/avartar/";
	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{


			
			if(strlen($logo))
				{
					list($txt, $ext) = explode(".", $logo_name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024*10))
						{
$actual_image_name = $_SESSION[userID].".".$ext;
$tmp = $_FILES['logo']['tmp_name'];
				if(move_uploaded_file($logo, $path.$actual_image_name))
								{
$sql102="update agency set logo='".$actual_image_name."' where member_id=".$_SESSION[userID]."";						 
$result102 = mysql_query($sql102) or die ("เพิ่มไม่ได้2");


									
									echo "<p class='preview-logo'></p>";
	                                echo "<img src='../upload/avartar/".$actual_image_name."'  class='preview-logo' width='100px' height='100px'>";
								}
							else
								echo "failed";
						}
						else
						echo "ไฟล์มีขนาดมากกว่า  1 MB";					
						}
						else
						echo "คุณสมบัติของไฟล์ไม่ถูกต้อง doc";	
				}
				
			else
				echo "กรุณาเลือกไฟล์";
				
			exit;
		}
 }
?>