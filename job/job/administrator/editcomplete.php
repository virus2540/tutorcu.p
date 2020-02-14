<?
session_start();
error_reporting(0);
include"../system/config.inc.php";
include"../system/session-admin.php";
include"../system/function.php";
require("../class.resizepic.php");
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
$ID=$_GET[process_id];
$action=$_POST[action];
$res_name=$_POST["res_name"];
$description=$_POST["description"];
# รายละเอียดที่ตั้ง
$address=$_POST["address"];
$province_id = $_POST['province_id'];
$amphur_id = $_POST['amphur_id'];
$district_id = $_POST['district_id'];
$road=$_POST["road"];
$zipcode=$_POST["zipcode"];
$price=$_POST["price"];
/*ข้อมุลเพิ่มเติมเกี่ยวกับร้านค้า*/
$open_time=$_POST["open_time"];
$drive_place=$_POST["drive_place"];
$credit_card=$_POST["credit_card"];
$for_group =$_POST["for_group"];
$for_child=$_POST["for_child"];
#ข้อมูลติดต่อผู้ประกาศ

$contact_email="$_POST[contact_email]";
$contact_tel="$_POST[contact_tel]";
#รายละเอียดอื่นๆ
$detail_long=$_POST["detail_long"];
$video=$_POST["video"];
$picture=$_POST["picture"];
#วันที่ วันเเก้ไข
$date_add=date("Ymdhis");
$process=$_GET["process_id"];

if(isset($_POST[drap])){
$status='no';
} elseif(isset($_POST[prakad])){
$status='yes';
}elseif(isset($_POST[edit_prakad])){
$status='yes';
}else{
$status='yes';
}

/*หมวดหมู่*/
$category_select = "SELECT * FROM  tb_category WHERE category_id = '$condo_type'";
$result_cate = mysql_query($category_select);
$row_cate = mysql_fetch_array($result_cate);
$category_name =$row_cate['category_name'];
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

if($action=="save"){	
?>
			<div class="success-main">
			<div class="success">
<h2>ทำรายการสำเร็จ</h2>
<div class="success-progress"></div>
<p>ระบบกำลังนำท่านไปยัง ตั้งค่าเเผนที่ GooGle Msp่</p>
			</div></div>

<?
$data = array(  
	"res_name"=>$res_name,
	"description"=>$description,
	"address"=>$address,
     "tambol"=>$district_name,
     "amphur"=>$amphur_name,
     "province"=>$province_name,
     "tambol_id"=>$district_id,
     "amphur_id"=>$amphur_id,
     "province_id"=>$province_id,
	 "road"=>$road,
	 "zipcode"=>$zipcode,
     "open_time"=>$open_time,
	"drive_place"=>$drive_place,
     "credit_card"=>$credit_card,
	"for_group"=>$for_group,
	"for_child"=>$for_child,
	"price"=>$price,
	"contact_email"=>$contact_email,
	"contact_tel"=>$contact_tel,
	"detail"=>$detail_long,
	"status"=>$status,
	"add_date"=>$date_add,
	"edit_date"=>$date_add,
);   
update("tb_resturant",$data,"process='".$ID."'");
$query="SELECT cover from tb_file WHERE cover='yes' and gallery_id='".$process."'";
$result=mysql_query($query,$connect);
$num_rows = mysql_num_rows($result);
if ($num_rows>=1) {
}else{
$sql="select * from tb_file where gallery_id='".$process."'"; 
$result=mysql_db_query($dbName,$sql);
$i =1;
while ($sr=mysql_fetch_array($result)) {
if($i==1){
		mysql_query("update tb_file set cover='yes' Where file_id='".$sr[file_id]."'");
}
		$i++;
}
}
echo"<meta http-equiv=refresh content=1;url=../administrator/map-".$process.">";
exit;
}
?>