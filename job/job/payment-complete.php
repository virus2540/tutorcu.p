<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
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

    <title>ยืนยันการชำระเงิน</title>
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

          <div class="jumbotron1">
            <h1>สำคัญ</h1>
            <p>การยืนยันการโอนชำระเงินกรุณากรอกข้อมูลให้ถูกต้องเพื่อความรวดเร็วในการตรวจสอบ </p>
          </div>

	<div id="teach"><h1><span style="color:#000;">เเจ้ง</span><span style="color:#358607;">ยืนยันการชำระเงิน</span></h1></div>
<?
$action=$_POST[action];
$name=$_POST["name"];
$code_subject=$_POST["code_subject"];
$mobile=$_POST["mobile"];
$bank=$_POST["bank"];
$money=$_POST["money"];
$date_tranfer=$_POST["date_tranfer"];
$time=$_POST["time"];
$note=$_POST["note"];
if($action=="save"){	
?>
<div class="alert alert-dismissable alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>สำเร็จ!</strong> เเจ้งการชำระเงินเรียบร้อยเเล้ว รอการยืนยันจากเจ้าหน้าที่		  
			  </div>
<?
$data = array(  
	"name"=>$name,
	"code_subject"=>$code_subject,
	"mobile"=>$mobile,
	"bank"=>$bank,
	"money"=>$money,
	"date_tranfer"=>$date_tranfer,
	"time"=>$time,
	"note"=>$note,
);   
insert(" tb_payment",$data); 
//echo"<meta http-equiv=refresh content=2;url=./index.php>";
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
