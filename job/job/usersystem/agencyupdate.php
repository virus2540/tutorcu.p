<?
session_start();
include"../system/config.inc.php";
include"../system/session.php";
include"../system/function.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$ID=$_SESSION[userID];
$action=$_POST[action];

# รายละเอียดที่ตั้ง
$about=$_POST["about"];
$experience=$_POST["experience"];
$service=$_POST["service"];
if($action=="save"){
?>
			<div class="notification success png_bg">
				<div>เเก้ไขเรียบร้อย</div>
			</div>

<?
$data = array(  
	"about"=>$about,
	"experience"=>$experience,
	"service"=>$service,
);   
update("agency",$data,"member_id='".$ID."'");
echo"<meta http-equiv=refresh content=1;url=../usersystem/my>";
echo"อัพเดทได้เเล้ว";
exit;
}
?>
<?
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
$path = "../upload/avartar/";
	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{


			
			if(strlen($document))
				{
					list($txt, $ext) = explode(".", $document_name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024*10))
						{
$actual_image_name = $_SESSION[userID].".".$ext;
$tmp = $_FILES['document']['tmp_name'];
				if(move_uploaded_file($document, $path.$actual_image_name))
								{
$sql102="update agency set logo='".$actual_image_name."' where member_id=".$_SESSION[userID]."";						 
$result102 = mysql_query($sql102) or die ("เพิ่มไม่ได้2");


									
									echo "<p class='preview'></p>";
	                                echo "<img src='../upload/avartar/".$actual_image_name."'  class='preview' width='100px' height='100px'>";
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