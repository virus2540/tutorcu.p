<?
session_start();
//error_reporting(0);
include"./system/config.inc.php";
include"./system/function.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>ติดต่อเรา</title>
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
$email=$_POST["email"];
$mobile=$_POST["mobile"];
$detail=$_POST["detail"];

if($action=="save"){	
?>
<div class="alert alert-success"><b>เราได้รับข้อความติดต่อจากทางท่านเเล้ว เราจะทำการติดต่อกลับให้เร็วที่สุด</div>

<?
$data = array(  
	"name"=>$name,
	"email"=>$email,
	"mobile"=>$mobile,
	"detail"=>$detail,
);   
insert("tb_contact",$data); 
echo"<meta https-equiv=refresh content=5;url=./home.php>";
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
