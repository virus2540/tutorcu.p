<?
session_start();
include "../system/config.inc.php";
include "../system/session-admin.php";
include "../system/function.php";
//require("../class.resizepic.php");

$action=$_POST[action];
$userid='admin';
$subject_name=$_POST["subject_name"];
$tutor_type=0;
$code_tutor=$_POST["code_tutor"];
# รายละเอียดที่ตั้ง
$place_tutor=$_POST["place_tutor"];
$class1 = $_POST['class1'];
$class_num = $_POST['class_num'];
$num_study = $_POST['num_study'];
$start_study=$_POST["start_study"];
$end_study=$_POST["end_study"];
$day_tutor=$_POST["day_tutor"];
$per_week=$_POST["per_week"];
$want_tutor=$_POST["want_tutor"];
$price=$_POST["price"];
$price_garantee =$_POST["price_garantee"];
$note =$_POST["note"];
$process =$_GET["process"];
$lat_value=$_POST["lat_value"];
$lon_value=$_POST["lon_value"];
$zoom_value=$_POST["zoom_value"];


#วันที่ วันเเก้ไข
$date_add=date("Ymdhis");
if(isset($_POST["drap"])){
$status='no';
}elseif(isset($_POST["prakad"])){
$status='yes';
}elseif(isset($_POST["edit_prakad"])){
$status='yes';
}else{
$status='yes';
}

$data = array(  
	"subject_name"=>$subject_name,
	"code_tutor"=>$code_tutor,
	"tutor_type"=>$tutor_type,
	"place_tutor"=>$place_tutor,
	"class1"=>$class1,
     "class_num"=>$class_num,
     "num_study"=>$num_study,
     "start_study"=>$start_study,
     "end_study"=>$end_study,
     "day_tutor"=>$day_tutor,
     "per_week"=>$per_week,
	 "want_tutor"=>$want_tutor,
	 "price"=>$price,
     "price_garantee"=>$price_garantee,
     "note"=>$note,
	"latitude"=>$lat_value,
	"longitude"=>$lon_value,
	"zoom"=>$zoom_value,
     "process"=>$process,
);

  $fields=""; $values="";
  $i=1;
  foreach($data as $key=>$val)
  {
    if($i!=1) { $fields.=", "; $values.=", "; }
    $fields.="$key";
    $values.="'$val'";
    $i++;
  }
  $sql = "INSERT INTO tb_job ($fields) VALUES ($values)";

  if($conn->query($sql) == TRUE) { 
	echo"<meta http-equiv=refresh content=1;url=../administrator/job.php>";
} 
  else { echo("SQL Error: <br>".$sql."<br>".mysqli_error()); }



//echo"<meta http-equiv=refresh content=1;url=../administrator/map-".$process.">";



?><style type="text/css">
.success-main{width:100%; margin:auto;}
.success{width:300px;height:100px;margin:auto;float:center;font-size:12px;border:solid 1px #CCCCCC;text-align:center;padding:20px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;}
.success-progress{width:150px;height:10px;background:url(../images/loading30.gif) no-repeat;margin:auto}
.success h2{color:#0080C0}
</style>
	<div class="success-main">
			<div class="success">
<h2>ทำรายการสำเร็จ</h2>
<div class="success-progress"></div>
<p>ระบบกำลังนำกลับไปสู่หน้าก่อนนั้น กรุณารอสักครู่</p>
			</div></div>
