<?
session_start();
include"./system/config.inc.php";
include"./system/function.php";
include "./system/session-check.php";
$strTable = "tb_masterdegree";
$strCondition = "tutor_id='".$_SESSION[process]."'";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>ข้อมุลการเรียนระดับปริญญาโท</title>
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
<ul class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="edu-school.php">ข้อมูลการศึกษาระดับมัธยม</a></li>
                <li><a href="edu-university.php">ข้อมูลการศึกษาระดับ ปริญญาตรี</a></li>
                <li><a href="edu-masterdegree.php">ข้อมูลการศึกษาระดับ ปริญญาโท</a></li>
                <li><a href="edu-phDdegree.php">ข้อมูลการศึกษาระดับ ปริญญาเอก</a></li>

			  </ul>
	<div id="teach"><h1><span style="color:#000;">ข้อมูลด้านการศึกษา</span>   <span style="color:#358607;">ระดับปริญญาโท</span></h1></div>
<form method="POST" id="validation-form" action="./edumaster-complete.php" enctype="multipart/form-data">
<!---/form register---->
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">มหาวิทยาลัย</label>
    <div class="col-md-8">
      <input name="u_name" type="text" class="form-control" id="u_name" value="<?=$data[u_name];?>">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">ปีที่ศึกษา</label>
    <div class="col-md-8">  
	<input name="u_year" type="text" class="form-control" id="u_year" value="<?=$data[u_year];?>">
</div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">คณะ</label>
    <div class="col-md-8">
	<input name="faceulty" type="text" class="form-control" id="faceulty" value="<?=$data[faceulty];?>">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">สาขาวิชา</label>
    <div class="col-md-8">
	<input name="sector" type="text" class="form-control" id="sector" value="<?=$data[sector];?>">
   </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">เกรด</label>
    <div class="col-md-8">
	<input name="grade" type="text" class="form-control" id="grade" value="<?=$data[grade];?>">
	</div>
  </div>
   <div class="bottom_form"></div>
      <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label"></label>

    <div class="col-md-4">
	<input type="hidden" name="action" value="save" />
		<input type="hidden" name="mem_id" value="<?=$data[tutor_id];?>" />
<button type="submit" class="btn btn-primary btn-sm" name="Submit">เเก้ไขข้อมูล</button>
    </div>
  </div>
<!---/end form register---->
</form>
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->

    </div><!--/.container-->

    <? include "template/footer.php";?>
<script src="./js/libs/jquery-1.9.1.min.js"></script>
<script src="./js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>

<script src="./js/validate/jquery.validate.js"></script>
<script src="./js/validate/Application.js"></script>
<script src="./js/validate/validation.js"></script>

<script>

$(function () {

	// Validate the form on load
	//$('#validation-form').submit ();

	// Block the form from submitting
	$('').submit (function (e) {
		e.preventDefault ();
	});

});

</script>

  </body>
</html>
