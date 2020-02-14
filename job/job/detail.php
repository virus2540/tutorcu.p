<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include "./system/thdate_function.php";
include"./facebook/fb_connect.php";
$strTable = "tb_page";
$strCondition = "page_id='$_GET[id]' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$data[page_title];?></title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
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

	<div id="teach"><h1><span style="color:#3fae00;"><?=$data[page_name];?></span></h1></div>
  
<?=$data[detail];?>
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->
    </div><!--/.container-->
    <? include "template/footer.php";?>
  </body>
</html>
