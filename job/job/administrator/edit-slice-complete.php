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
$slice_name=$_POST["slice_name"];
$link=$_POST["link"];
$pic=$_POST["ImgMain"];
if($action=="save"){	
?>
			<div class="notification success png_bg">
				<a href="#" class="close"><img src="images/cross_grey_small.png" title="Close this notification" alt="close" /></a>
				<div>เเก้ไขเรียบร้อย</div>
			</div>

<?
$data = array(  
	"slice_name"=>$slice_name,
	"link"=>$link,
	"pic"=>$pic,
);
update("tb_slice",$data,"slice_id='".$_GET[id]."'");
echo"<meta http-equiv=refresh content=1;url=./slice.php>";
exit;
}
?>