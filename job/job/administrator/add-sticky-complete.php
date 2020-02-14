<?
session_start();
//error_reporting(0);
require"../system/config.inc.php";
require"../system/session-admin.php";
require"../system/function.php";
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
$name_carrier=$_POST["name_carrier"];
$type=$_POST["type"];
$timeline=$_POST["timeline"];
$prakad_number=$_POST["prakad_number"];
$start=$_POST["start"];
$date_add=Dateadd($start);
$expire=$_POST["expire"];
$date_expire=Dateadd($expire);
$agency_id=$_POST["agency_id"];
$status=$_POST["status"];
if($action=="save"){	
?>
			<div class="success-main">
			<div class="success">
<h2>ทำรายการสำเร็จ</h2>
<div class="success-progress"></div>
<p>ระบบกำลังนำกลับไปสู่หน้าก่อนนั้น กรุณารอสักครู่</p>
			</div></div>

<?
$data = array(  
	"name_carrier"=>$name_carrier,
     "agency_id"=>$agency_id,
     "timeline"=>$timeline,
     "prakad_number"=>$prakad_number,
     "start"=>$date_add,
     "expire"=>$date_expire,
     "status"=>$status,
     "type"=>$type,
);   
insert("tb_sticky",$data); 
echo"<meta http-equiv=refresh content=5;url=./sticky.php>";
exit;
}

?>