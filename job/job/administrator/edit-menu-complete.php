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
$menu_name=$_POST["menu_name"];
$menu_price=$_POST["menu_price"];
if($action=="save"){	
?>
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="images/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>เเก้ไขเรียบร้อย</div>
			</div>

<?
$data = array(  
	"name"=>$menu_name,
	"price"=>$menu_price,
);
update("foods",$data,"id='".$_GET[menu_id]."'");
echo"<meta http-equiv=refresh content=1;url=./menufood.php>";
exit;
}
?>