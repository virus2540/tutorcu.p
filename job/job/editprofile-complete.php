<?
session_start();
//error_reporting(0);
include"./system/config.inc.php";
include"./system/function.php";
include "./system/session-check.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>ข้อมูลส่วนตัว</title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="./asset/css/bootstrap.min.css" rel="stylesheet">
	  <link href="./asset/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./asset/css/offcanvas.css" rel="stylesheet">


  </head>

  <body>
  <? include "template/header.php";?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">


<?
$action=$_POST[action];
$name=$_POST["name"];
$nickname=$_POST["nickname"];
$mobile=$_POST["mobile"];
$mobile_m=$_POST["mobile_m"];
$id_code=$_POST["id_code"];
$address=$_POST["address"];
$date_b=$_POST["date_b"];
$username=$_POST["username"];
$password=$_POST["password"];
$teach=$_POST["teach"];
$place=$_POST["place"];
$mempic=$_POST["mempic"];
# รูปประจำตัว
$pic_avatar=$_FILES['pic_avatar']['tmp_name'];
$pic_avatar_name=$_FILES['pic_avatar']['name'];
$pic_avatar_size=$_FILES['pic_avatar']['size'];
$pic_avatar_type=$_FILES['pic_avatar']['type'];
# บัตรประชาชน
$pic_idcard=$_FILES['pic_idcard']['tmp_name'];
$pic_idcard_name=$_FILES['pic_idcard']['name'];
$pic_idcard_size=$_FILES['pic_idcard']['size'];
$pic_idcard_type=$_FILES['pic_idcard']['type'];
#resume
$resume=$_FILES['resume']['tmp_name'];
$resume_name=$_FILES['resume']['name'];
$resume_size=$_FILES['resume']['size'];
$resume_type=$_FILES['resume']['type'];
if($action=="save"){	
?>
<div class="alert alert-success"><b>เเก้ไขข้อมูลเรียบร้อย
</b>กำลังนำท่านกลับสู่หน้าข้อมูลส่วนตัว
</div>

<?
$data = array(  
	"name"=>$name,
	"nickname"=>$nickname,
	"mobile"=>$mobile,
	"mobile_m"=>$mobile_m,
	"id_code"=>$id_code,
	"address"=>$address,
	"date_b"=>$date_b,
	"teach"=>$teach,
	"place"=>$place,
);   
update("user",$data,"id='".$_SESSION[userID]."'");
	$ext1 = strtolower(end(explode('.',$pic_avatar_name)));
     if ($ext1== "jpg" or $ext1 == "jpeg" or $ext1 == "png" or $ext1 == "gif" or $ext1 == "JPEG" or $ext1 == "JPG") {
     $filename=$mempic.".".$ext1;
     copy($pic_avatar,"./upload/avartar/$filename");
     $sql1="update user set  avartar='$filename' where id='".$_SESSION[userID]."' ";
	 mysql_db_query($dbName,$sql1);
	 }
	$ext2 = strtolower(end(explode('.',$pic_idcard_name)));
     if ($ext2== "jpg" or $ext2 == "jpeg" or $ext2 == "png") {
     $filename=$mempic.".".$ext2;
     copy($pic_idcard,"./upload/idcard/$filename");
     $sql2="update user set idcard='$filename' where id='".$_SESSION[userID]."' ";
	 mysql_db_query($dbName,$sql2);
	 }
	 	$ext3 = strtolower(end(explode('.',$resume_name)));
     if ($ext3== "docx" or $ext3 == "doc") {
     $filename=$mempic.".".$ext3;
     copy($resume,"./upload/resume/$filename");
     $sql3="update user set resume='$filename' where id='".$_SESSION[userID]."' ";
	 mysql_db_query($dbName,$sql3);
	 }
echo"<meta http-equiv=refresh content=5;url=./profile.php>";
exit;
}
?>
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->

    <? include "template/footer.php";?>

    </div><!--/.container-->


  </body>
</html>
