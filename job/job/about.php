<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include "./system/thdate_function.php";
include"./facebook/fb_connect.php";
$strTable = "tb_page";
$strCondition = "page_id='7' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>เกี่ยวกับเรา</title>
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

	<div id="teach"><h1><span style="color:#000;">เกี่ยวกับ</span><span style="color:#358607;">TUTOR CU</span></h1></div>
<?=$data[detail];?>
        </div><!--/span-->


    <? include "template/sidebar.php";?>
      </div><!--/row-->

    </div><!--/.container-->
    <? include "template/footer.php";?>
  </body>
</html>
