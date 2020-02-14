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

    <title>จองงานสอน</title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="./asset/css/bootstrap.min.css" rel="stylesheet">
	  <link href="./asset/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./asset/css/offcanvas.css" rel="stylesheet">
<script type="text/javascript" src="../js/script/confirm.js"></script>
<script language="javascript">
function ConfirmDelete(){  
	    if(confirm('คุณต้องการทำรายการที่เลือกจริงหรือไม่')){
	    	document.frmList.submit();
		}
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="asset/dist/js/bootstrap.js"></script>

<script src="asset/docs-assets/js/holder.js"></script>

<script src="asset/docs-assets/js/application.js"></script>
<script type="text/javascript">
$('#myCollapsible').on('hidden.bs.collapse', function () {
  // do something…
})
</script>


  </head>

  <body>
<? include "template/header.php";?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
		  <div class="bs-example">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <img src="upload/slice/1.jpg" alt="First slide">
          </div>
          <div class="item">
            <img src="upload/slice/2.jpg" alt="Second slide">
          </div>
          <div class="item">
            <img src="upload/slice/3.jpg" alt="Third slide">
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div><!-- /example -->
          <div class="jumbotron1">
            <h1>บอกข่าววันนี้</h1>
            <p>ยินดีตอนรับติวเตอร์ทุกท่าน ร่วมมาเป็นส่วนหนึงของทีมงานสอนพิเศษ ตามบ้านคุณภาพกับเรา </p>
          </div>

	<div id="teach"><h1><span style="color:#000;">จอง</span><span style="color:#358607;">งานสอน</span></h1></div>
<div class="col-lg-12">
            <h2>งานสอนที่จองไว้</h2>
            <div class="table-responsive">
<form class="da-form" name=frmList  action="./job_process.php?task=yes" method=post>

              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th>รหัสงาน </th>
                    <th width="40%">วิชา </th>
                    <th>การชำะระเงิน</th>
                    <th>รายละเอียด</th>
                    <th>ลบงานที่จอง</th>
                  </tr>
                </thead>
                <tbody>
<?php
$str1234="select a.*,b.* from tb_booking as a, tb_job as b where a.u_id='".$_SESSION[userID]."' and a.payment='no' and a.job_id=b.job_id order by a.book_id DESC"; 
$result12=mysql_db_query($dbName,$str1234);   
while ($sr=mysql_fetch_array($result12)) {
	?>
                  <tr>
                    <td width="10%"><?=$sr[code_tutor];?></td>
                    <td width="25%"><?=$sr[subject_name];?></td>
                    <td><?=status_payment($sr[payment]);?></td>
                    <td><button type="button" class="btn btn-primary"  onclick="window.location='./work-detail.php?job_id=<?=$sr[job_id];?>'">ดูรายละเอียดงาน</button></td>
                    <td><input type=checkbox id="check<?=$count?>" name="action_id[]" value="<?=$sr['book_id']?>" onClick="if(this.checked==true){ selectRow('row<?=$count?>'); }else{ deselectRow('row<?=$count?>'); }"></td>
                  </tr>
<? }?>    

                </tbody>
              </table>
<p style="text-align:right;">
<a class="btn btn-danger" href="javascript:ConfirmDelete()">ลบข้อมูล</a>

</p>
</form>
            </div>
          </div>
<div class="col-lg-12">
            <h2>งานที่ได้ไปสอน</h2>
            <div class="table-responsive">
              <table class="table table-bordered table-hover tablesorter">
                <thead>
                  <tr>
                    <th>รหัสงาน </th>
                    <th width="40%">วิชา </th>
                    <th>การชำะระเงิน</th>
                    <th>รายละเอียด</th>
                  </tr>
                </thead>
                <tbody>
<?php
$str1234="select a.*,b.* from tb_booking as a, tb_job as b where a.u_id='".$_SESSION[userID]."' and a.payment='yes' and a.job_id=b.job_id order by a.book_id DESC"; 
$result12=mysql_db_query($dbName,$str1234);   
while ($sr=mysql_fetch_array($result12)) {
	?>
                  <tr>
                    <td width="10%"><?=$sr[code_tutor];?></td>
                    <td width="25%"><?=$sr[subject_name];?></td>
                    <td><?=status_payment($sr[payment]);?></td>
                    <td><button type="button" class="btn btn-primary"  onclick="window.location='./work-detail.php?job_id=<?=$sr[job_id];?>'">ดูรายละเอียดงาน</button></td>
                  </tr>
<? }?>    
                </tbody>
              </table>
            </div>
          </div>
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->

    <? include "template/footer.php";?>

    </div><!--/.container-->

  </body>
</html>
