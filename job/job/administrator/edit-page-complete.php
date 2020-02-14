<?
session_start();
//error_reporting(0);
include"../system/config.inc.php";
include"../system/session-admin.php";
include"../system/function.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$action=$_POST[action];
$page_title=$_POST["page_title"];
$page_name=$_POST["page_name"];
$detail=$_POST["detailBox"];
if($action=="save"){	
?>
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="images/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>เเก้ไขเรียบร้อย</div>
			</div>

<?php
$strSQL = "UPDATE tb_page SET ";

$strSQL .="detail = '".$_POST["detailBox"]."' ";

$strSQL .="WHERE page_id = '".$_GET["page_id"]."' ";

$objQuery = mysql_query($strSQL);
$data = array(  
	"page_title"=>$page_title,
	"page_name"=>$page_name,
	//"detail"=>$detail,
);
update("tb_page",$data,"page_id='".$_GET[page_id]."'");
echo"<meta http-equiv=refresh content=1;url=./page.php>";
exit;
}
?>