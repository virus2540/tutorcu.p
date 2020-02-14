<?
session_start();
error_reporting(0);
include"../system/config.inc.php";
include"../system/session-admin.php";
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
$id=$_REQUEST["id"];
if($_REQUEST["task"]==""){
?>
<div class="success-main">
<div class="success">
<h2>ทำรายการสำเร็จ</h2>
<div class="success-progress"></div>
<p>ระบบกำลังนำกลับไปสู่หน้าก่อนนั้น กรุณารอสักครู่</p>
			</div></div>
<? }else{

$action_id=$_POST[action_id];
if($_POST["action"]=="del_job"){
	for($i=0;$i<count($action_id);$i++){
		$pp_id=$action_id[$i];
		$conn->query("Delete from tb_job Where job_id='$pp_id' ");
echo"<meta http-equiv=refresh content=1;url=../administrator/job.php>";
	}
}elseif($_POST["action"]=="a"){
	for($i=0;$i<count($action_id);$i++){
		$pp_id=$action_id[$i];
		$conn->query("update  tb_job set status='a' Where job_id='$pp_id' ");
echo"<meta http-equiv=refresh content=1;url=../administrator/job.php>";

	}
}elseif($_POST["action"]=="b"){
	for($i=0;$i<count($action_id);$i++){
		$pp_id=$action_id[$i];
		$conn->query("update  tb_job set status='b' Where job_id='$pp_id' ");
echo"<meta http-equiv=refresh content=1;url=../administrator/job.php>";

	}
}elseif($_POST["action"]=="c"){
	for($i=0;$i<count($action_id);$i++){
		$pp_id=$action_id[$i];
		$conn->query("update  tb_job set status='c' Where job_id='$pp_id' ");
echo"<meta http-equiv=refresh content=1;url=../administrator/job.php>";

	}
}elseif($_POST["action"]=="d"){
	for($i=0;$i<count($action_id);$i++){
		$pp_id=$action_id[$i];
		$conn->query("update  tb_job set status='d' Where job_id='$pp_id' ");
echo"<meta http-equiv=refresh content=1;url=../administrator/job.php>";

	}
}elseif($_POST["action"]=="e"){
	for($i=0;$i<count($action_id);$i++){
		$pp_id=$action_id[$i];
		$conn->query("update  tb_job set status='e' Where job_id='$pp_id' ");
echo"<meta http-equiv=refresh content=1;url=../administrator/job.php>";

	}
}elseif($_POST["action"]=="no"){
	for($i=0;$i<count($action_id);$i++){
		$pp_id=$action_id[$i];
		$conn->query("update  tb_job set status='no' Where job_id='$pp_id' ");
echo"<meta http-equiv=refresh content=1;url=../administrator/job.php>";

	}
}
if($_POST["action_bank"]=="del"){
	for($i=0;$i<count($action_id);$i++){
		$pp_id=$action_id[$i];
		$conn->query("Delete from tb_bank Where bank_id='$pp_id' ");
echo"<meta http-equiv=refresh content=1;url=../administrator/bank.php>";

	}
}
?>
			<div class="success-main">
			<div class="success">
<h2>ทำรายการสำเร็จ</h2>
<div class="success-progress"></div>
<p>ระบบกำลังนำกลับไปสู่หน้าก่อนนั้น กรุณารอสักครู่</p>
			</div></div>
<? }?>