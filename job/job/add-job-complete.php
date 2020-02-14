<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include "./system/session.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>จองงานเรียบร้อย</title>
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


<div class=clear></div>
<?
$action=$_GET[action];
$job_id=$_GET["job_id"];
$u_id=$_SESSION["userID"];
$strSQL1 = "SELECT * FROM  user WHERE id = '$u_id'";
$result1 = mysql_query($strSQL1);
$row1 = mysql_fetch_array($result1);
$memberID = $row1['memberID'];
if($action=="save"){
	$strSQL = "SELECT * FROM tb_booking WHERE job_id = '".$job_id."' and u_id = '".$u_id."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult){
?>
<div class="alert alert-dismissable alert-warning">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4>ขออภัย!</h4>
                <p>งานติวเตอร์ งานสอน งานนี้ท่านได้ทำการจองการสอนเเล้ว กรุณากลับไปจองงานอื่น</a>.</p>
              </div>
<? 
echo"<meta http-equiv=refresh content=2;url=./index.php>";
}else{?>
<div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>สำเร็จ!</strong>   จองงานเรียบร้อยกรุณาเข้าเชครายละเอียดในจองงานสอน เมื่อท่านจองงานเร็จรบกวนเเจ้งโอนเงินเพื่อผลประโน์ของท่าน
			  </div>
<?
$data = array(  
	"job_id"=>$job_id,
	"u_id"=>$u_id,
	"memberID"=>$memberID,
);   
insert(" tb_booking",$data);
$resume=$_POST[resume];
$percent=$_POST[percent];
$q1=$_POST[q1];
$q2=$_POST[q2];
$q3=$_POST[q3];
$q5=$_POST[q5];
$q6=$_POST[q6];
mysql_query("INSERT INTO  tb_question (q_id,job_id,u_id,memberID,resume,percent,q1,q2,q3,q5,q6) VALUES  ('','$job_id','$u_id','$memberID','$resume','$percent','$q1','$q2','$q3','$q5','$q6')");
echo"<meta http-equiv=refresh content=2;url=./booking.php>";
exit;
} }
?>
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->

    <? include "template/footer.php";?>

    </div><!--/.container-->
  </body>
</html>
