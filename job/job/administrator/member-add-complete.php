<?
session_start();
//error_reporting(0);
include"../system/config.inc.php";
include"../system/session-admin.php";
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
$action=$_POST[action];
/*check password*/
$password=$_POST[password];
# รายละเอียดที่ตั้ง
$email=$_POST["email"];
$name=$_POST["name"];
$username=$_POST["username"];
$address=$_POST["address"];
$province_id = $_POST['province_id'];
$amphur_id = $_POST['amphur_id'];
$district_id = $_POST['district_id'];
$road=$_POST["road"];
$zipcode=$_POST["zipcode"];
$point=$_POST["point"];
$tel=$_POST["tel"];
$point=$_POST["point"];
if($action=="save"){
#เรียกใช้งานฟังก์ชั่นจังหวัด
$strSQL1 = "SELECT * FROM province WHERE PROVINCE_ID = '$province_id'";
$result1 = $conn->query($strSQL1);
$row1 = $result1->fetch_array(MYSQLI_ASSOC);
$province_name = $row1['PROVINCE_NAME'];


$strSQL2 = "SELECT * FROM amphur WHERE AMPHUR_ID = '$amphur_id'";
$result2 = $conn->query($strSQL2);
$row2 = $result2->fetch_array(MYSQLI_ASSOC);
$amphur_name = $row2['AMPHUR_NAME'];


$strSQL3 = "SELECT * FROM district WHERE DISTRICT_ID = '$district_id'";
$result3 = $conn->query($strSQL3);
$row3 = $result3->fetch_array(MYSQLI_ASSOC);
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
	"username"=>$username,
	"password"=>$password,
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
     "points"=>$point,
	"tel"=>$tel,
	"points"=>$point,
	"confirm"=>'yes',
);   
insert("user",$data); 
echo"<meta http-equiv=refresh content=0;url=./member.php>";
exit;
}
?>