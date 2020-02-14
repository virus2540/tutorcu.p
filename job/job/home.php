<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include"./facebook/fb_connect.php";
/*$sql_update="update tb_article set  pageview=pageview+1 where content_id=".$_GET['article_id']." ";
mysql_db_query($dbName,$sql_update);*/
$strTable = "tb_job";
$strCondition = "job_id='$_GET[job_id]' ";
$data = fncSelectRecord($strTable,$strCondition);
//$date_add = ThaiTimeConvert("".strtotime($data[date_add])."","0","1");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<title>สมัครเป็นติวเตอร์</title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico">
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
<?
$sql="select * from tb_slice order by slice_id asc"; 
$result=mysql_query($sql); 
$i =0;
while ($sr=mysql_fetch_array($result)) {
?>
          <li data-target="#carousel-example-generic" data-slide-to="<?=$i;?>" <? if($i==0){?>class="active"<? }?>></li>

<? $i++;} ?>	
        </ol>
        <div class="carousel-inner">
<?
$sql="select * from tb_slice order by slice_id asc"; 
$result=mysql_query($sql); 
$i =0;
while ($sr=mysql_fetch_array($result)) {
?>
          <div class="item <? if($i==0){?>active<? }?>">
<a href="<?=$sr[link];?>" target="_blank"> <img src="<?=$slice_url;?>uploads/<?=$sr[pic];?>" alt="<?=$sr[title];?>"></a>
          </div>
<? $i++;} ?>
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

	<div id="teach"><h1><span style="color:#000;">งานสอน</span><span style="color:#3fae00;"> กรุงเทพเเละปริมณฑล</span></h1></div>
       <table class="table table-bordered">
        <thead>
          <tr>
            <th width="8%" class="bg_t">รหัส</th>
            <th width="25%" class="bg_t">วิชา</th>
            <th width="25%" class="bg_t">สถานที่</th>
            <th width="25%" class="bg_t">สถานะ</th>
			 <th width="5%" class="bg_t">จอง</th>
            <th width="12%" class="bg_t">รายละเอียด</th>
          </tr>
        </thead>
        <tbody>
<?php
$str="select *from tb_job where status !='no' order by job_id DESC  limit 250"; 

$result=mysql_db_query($dbName,$str); 
while ($sr=mysql_fetch_array($result)) {

?>
          <tr>
            <td class="<?=class_yel($sr[status]);?>"><?=$sr[code_tutor];?></td>
            <td class="<?=class_yel($sr[status]);?>"><?=$sr[subject_name];?></td>
            <td class="<?=class_yel($sr[status]);?>"><?=$sr[place_tutor];?></td>
            <td class="<?=class_yel($sr[status]);?>"><p align=center><?=class_status1($sr[status]);?></p></td>
			<td class="<?=class_yel($sr[status]);?>"><?=BookingNum($sr[job_id]);?></td>
            <td class="<?=class_yel($sr[status]);?>"><a href="work-detail.php?job_id=<?=$sr[job_id];?>" class="btn btn-info" target="_blank">รายละเอียด</a></td>
          </tr> 
<? }?>
		  
        </tbody>
      </table>
    
    
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->

      <hr>



    </div><!--/.container-->
    <? include "template/footer.php";?>
  </body>
</html>
