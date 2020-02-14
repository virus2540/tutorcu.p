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

    <title>สมัครสมาชิกสำเร็จ</title>
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

	<div id="teach"><h1><span style="color:#000;">เเก้ไขข้อมูล</span>   <span style="color:#358607;">สำเร็จ</span></h1></div>


<?
$action=$_POST[action];
$u_name=$_POST["u_name"];
$u_year=$_POST["u_year"];
$faceulty=$_POST["faceulty"];
$sector=$_POST["sector"];
$grade=$_POST["grade"];
$ID=$_POST["mem_id"];

if($action=="save"){	
?>
<div class="alert alert-success"><b>เเก้ไขข้อมุลการศึกษาสำเร็จ</div>

<?
$data = array(  
	"u_name"=>$u_name,
	"u_year"=>$u_year,
	"faceulty"=>$faceulty,
	"sector"=>$sector,
	"grade"=>$grade,
);   
update("tb_masterdegree",$data,"tutor_id='".$ID."'");
echo"<meta http-equiv=refresh content=5;url=./edu-masterdegree.php>";
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
