<?
session_start();
//error_reporting(0);
include"./system/config.inc.php";
include"./system/function.php";
include"./facebook/fb_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>ลงทะเบียน</title>
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

	<div id="teach"><h1><span style="color:#000;">สมัครสมาชิก</span>   <span style="color:#358607;">สมัครเป็นติวเตอร์</span></h1></div>
<div id="register_head"><h1><span style="color:#000;">ข้อมุลทั่วไป</span></h1></div>

<form method="POST" id="validation-form" action="./register-complete.php" enctype="multipart/form-data">
<!---/form register---->
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">ชื่อ-นามสกุล</label>
    <div class="col-md-8">
      <input name="name" type="text" class="form-control" id="name" placeholder="ระบุ ชื่อ-นามสกุล">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">ชื่อเล่น</label>
    <div class="col-md-8">  
	<input name="nickname" type="text" class="form-control" id="nickname" placeholder="ชื่อเล่น">
</div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">เบอร์โทรศัพท์</label>
    <div class="col-md-8">
	<input name="mobile" type="text" class="form-control" id="mobile" placeholder="กรอกติดกันไม่มี-นะครับ">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">เบอร์โทรศัพท์มือคนสนิท</label>
    <div class="col-md-8">
	<input name="mobile_m" type="text" class="form-control" id="mobile_m" placeholder="กรณีติดต่อไม่ได้">
   </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">เลขที่บัตรประชาชน</label>
    <div class="col-md-8">
	<input name="id_code" type="text" class="form-control" id="id_code" placeholder="หมายเลขบัตรประชาชน">
     </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">วัน/เดือน/ปี เกิด</label>
    <div class="col-md-8">
	<input name="date_b" type="text" class="form-control" id="date_b" placeholder="ระบุเช่น 20/02/2526">
    </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">ที่อยู่ปัจจุบัน</label>
    <div class="col-md-8">
      <textarea name="address" rows="3" class="form-control" id="address" placeholder="ระบุรายละเอียด"></textarea>
	  </div>
  </div>
     <div class="bottom_form"></div>
  <div id="register_head"><h1><span style="color:#000;">ข้อมุล การศึกษาระดับปริญญาตรี</span></h1></div>
<!---/form edution ba---->
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">มหาวิทยาลัย</label>
    <div class="col-md-8">
      <input name="u_name" type="text" class="form-control" id="u_name">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">คณะ</label>
    <div class="col-md-8">
	<input name="faceulty" type="text" class="form-control" id="faceulty">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">สาขาวิชา</label>
    <div class="col-md-8">
	<input name="sector" type="text" class="form-control" id="sector">
   </div>
  </div>
     <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">ปีที่จบ</label>
    <div class="col-md-8">  
	<input name="u_year" type="text" class="form-control" id="u_year">
</div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">เกรด</label>
    <div class="col-md-8">
	<input name="grade" type="text" class="form-control" id="grade">
	</div>
  </div>
 <!---/end form edution ba---->
      <div class="bottom_form"></div>
  	<div id="register_head"><h2><span style="color:#000;">สูงกว่าปริญาตรี</span></h2></div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">ระดับ</label>
    <div class="col-md-8">
      <input name="h_degree" type="text" class="form-control" id="h_degree">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">มหาวิทยาลัย</label>
    <div class="col-md-8">
      <input name="h_university" type="text" class="form-control" id="h_university">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">คณะ</label>
    <div class="col-md-8">
	<input name="h_name" type="text" class="form-control" id="h_name">
 </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">สาขาวิชา</label>
    <div class="col-md-8">
	<input name="h_sector" type="text" class="form-control" id="h_sector">
   </div>
  </div>
     <div class="bottom_form"></div>
  	<div id="register_head"><h1><span style="color:#000;">ข้อมุล</span>   <span style="color:#358607;">เข้าสู่ระบบ</span></h1></div>

   <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">อีเมล์</label>
    <div class="col-md-8">
	<input name="email" type="text" class="form-control" id="email" placeholder="อีเมล์ของท่าน">
    </div>
  </div>
     <div class="bottom_form"></div>
   <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label">Password</label>
    <div class="col-md-8">
	<input name="password" type="text" class="form-control" id="password" placeholder="รหัสผ่านเข้าสู่ระบบ ***กรุณาจำดีๆนะค่ะ เพราะไม่ได้ให้ยืนยันอีกรอบ">
    </div>
  </div>
     <div class="bottom_form"></div>
      <div class="form-group">
    <label for="inputPassword" class="col-md-4 control-label"></label>

    <div class="col-md-4">
	<input type="hidden" name="action" value="save" />
<button type="submit" class="btn btn-primary btn-sm" name="Submit">ลงทะเบียน</button>
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
