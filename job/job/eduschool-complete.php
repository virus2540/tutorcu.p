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
$school_name=$_POST["school_name"];
$tambol=$_POST["tambol"];
$amphur=$_POST["amphur"];
$province=$_POST["province"];
$plan=$_POST["plan"];
$plan_other=$_POST["plan_other"];
$grade=$_POST["grade"];
$ID=$_POST["mem_id"];

if($action=="save"){	
?>
<div class="alert alert-success"><b>เเก้ไขข้อมุลการศึกษาระดับมัธยมสำเร็จ</div>

<?
$data = array(  
	"school_name"=>$school_name,
	"tambol"=>$tambol,
	"amphur"=>$amphur,
	"province"=>$province,
	"plan"=>$plan,
	"plan_other"=>$plan_other,
	"grade"=>$grade,
);   
update(" tb_eduschool",$data,"tutor_id='".$ID."'");
echo"<meta http-equiv=refresh content=5;url=./edu-school.php>";
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
