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
$package_name=$_POST["package_name"];
$detail=$_POST["detail"];
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
	"package_name"=>$package_name,
	"detail"=>$detail,
);   
update("tb_package",$data,"package_id='".$_GET[id]."'");
echo"<meta http-equiv=refresh content=5;url=./edit-package.php?id=".$_GET[id].">";
exit;
}
/*เอกสาร*/
$document=$_FILES['document'] ['tmp_name'];	
$document_name=$_FILES['document'] ['name'];
$document_size=$_FILES['document'] ['size'];
$document_type=$_FILES['document'] ['type'];

 /*กำหนดอัพเอกสาร*/
 if  ($document) {
/*เอกสาร*/
$document=$_FILES['document'] ['tmp_name'];	
$document_name=$_FILES['document'] ['name'];
$document_size=$_FILES['document'] ['size'];
$document_type=$_FILES['document'] ['type'];
$path = "../upload/package/";
	$valid_formats = array("jpg", "png", "gif", "bmp", "swf");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{


			
			if(strlen($document))
				{
					list($txt, $ext) = explode(".", $document_name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024*1000))
						{
$actual_image_name = $_GET[id].".".$ext;
$tmp = $_FILES['document']['tmp_name'];
				if(move_uploaded_file($document, $path.$actual_image_name))
								{
$sql102="update tb_package set filebanner='".$actual_image_name."',ext='".$ext."' where package_id=".$_GET[id]."";						 
$result102 = mysql_query($sql102) or die ("เพิ่มไม่ได้2");


									
									echo "<p class='preview'></p>";
  if($ext=='swf'){
									echo "
<param name=\"movie\" value=\"../upload/banner/".$actual_image_name."\"> 
<param name=\"quality\" value=\"high\"> 
<embed src=\"../upload/banner/".$actual_image_name."\" quality=\"high\" 
pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\"></embed>";
  }else{
	                                echo "<img src='../upload/package/".$actual_image_name."'  class='preview'>";
  }
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