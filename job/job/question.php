<?
session_start();
//error_reporting(0);
include"./system/config.inc.php";
include"./system/function.php";
include"./facebook/fb_connect.php";
include "./system/session.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>คำถามก่อนจองงานสอน</title>
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

	<div id="teach"><h1>กรุณาตอบคำถามต่อไปนี้ให้ครบถ้วนก่อนจองงานสอน</h1></div>


<form method="POST" id="validation-form" action="./add-job-complete.php?job_id=<?=$_GET[job_id];?>&action=save" enctype="multipart/form-data">
<!---/form register---->
 <div class="form-group">
 <h2>คุณได้กรอกข้อมูลส่วนตัว ข้อมูลการศึกษา ส่งรูปและบัตรประชาชนครบถ้วน </h2>
    <label for="inputPassword" class="col-md-2 control-label">คำตอบ</label>
    <div class="col-md-8">
<label class="checkbox-inline">
  <input type="radio" name="resume" id="resume" value="yes"> ครบ
</label>
<label class="checkbox-inline">
  <input type="radio" name="resume" id="resume" value="no"> ไม่ครบ
</label>
<label class="checkbox-inline">
  <input type="radio" name="resume" id="resume" value="ot"> ไม่แน่ใจ
</label> </div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
<h2>คุณมั่นใจที่จะรับงานนี้กี่เปอร์เซนต์ คำตอบ เช่น 10 , 20 , 80  หรือ 100 เปอร์เซนต์ 1-100 นั่นเอง</h2>
    <label for="inputPassword" class="col-md-2 control-label">คำตอบ</label>

    <div class="col-md-2">  
	<input name="percent" type="text" class="form-control">
</div>
  </div>
   <div class="bottom_form"></div>
 <div class="form-group">
 <h2>เหตุใดเราควรให้งานนี้กับคุณ (อธิบายอย่างละเอียดเกี่ยวกับผลงานและประสบการณ์ต่างๆ ที่เกี่ยวข้องกับงานนี้)</h2>
    <label for="inputPassword" class="col-md-2 control-label">ตอบ</label>
    <div class="col-md-8">
	<textarea class="form-control" rows="3" name="q1"></textarea>
 </div>
  </div>
   <div class="bottom_form"></div>
   <div class="form-group">
 <h2>หากต้องการเปลี่ยนวันเวลาสอน สอบถามเพิ่มเติมกรุณาระบุ (กรณีเปลี่ยนวันเวลาเราจะพิจารณาติวเตอร์ที่มีเวลาตรงกับที่ผู้เรียนก่อนเท่านั้น</h2>
    <label for="inputPassword" class="col-md-2 control-label">ตอบ</label>
    <div class="col-md-8">
	<textarea class="form-control" rows="3" name="q2"></textarea>
 </div>
  </div>
   <div class="bottom_form"></div>
      <div class="form-group">
 <h2>ความพร้อมในการโอนค่าแนะนำไ ทางเราใช้ ธนาคาร KTB, SCB, BBL เท่านั้น (ระบุธนาคารและวันเวลาที่จะโอนค่าแนะนำ ไม่เกิน 24 ชั่วโมง )</h2>
    <label for="inputPassword" class="col-md-2 control-label">ตอบ</label>
    <div class="col-md-8">
	<textarea class="form-control" rows="3" name="q3"></textarea>
 </div>
  </div>
   <div class="bottom_form"></div>
   <div class="form-group">
 <h2>ท่านได้อ่านกฏกติกาของเราครบถ้วนเรียบร้อยแล้ว ( www.tutorcu.com/tutor.pdf ) </h2>
    <label for="inputPassword" class="col-md-2 control-label">คำตอบ</label>
    <div class="col-md-8">
<label class="checkbox-inline">
  <input type="radio" name="q5" id="q5" value="yes"> ใช่
</label>
<label class="checkbox-inline">
  <input type="radio" name="q5" id="q5" value="no"> ไม่
</label>
 </div>
  </div>
     <div class="bottom_form"></div>
   <div class="form-group">
 <h2>ท่านทราบดีว่า หากท่านจองงานเล่นๆ ท่านจะโดนลบบัญชีและไม่สามารถรับงานที่นี่ได้อีก</h2>
    <label for="inputPassword" class="col-md-2 control-label">คำตอบ</label>
    <div class="col-md-8">
<label class="checkbox-inline">
  <input type="radio" name="q6" id="q6" value="yes"> ทราบ
</label>
<label class="checkbox-inline">
  <input type="radio" name="q6" id="q6" value="no"> ไม่ทราบ</label>
 </div>
  </div>
 
      <div class="form-group">
<div class="alert alert-warning">หากท่านกดจองงานแล้ว 
ทางทีมงานจะทำการพิจารณาประวัติ ประสบการณ์สอน และวันเวลาในการจองตามลำดับ สำหรับ 
ผู้ที่ได้รับคัดเลือกจากทางเรา เราจะมี SMS จากเบอร์ 0845717879 ส่ง เลขบัญชีในการชำระเงินและให้ท่านชำระตามเวลาที่กำหนด 
หากท่านไม่ได้รับการติดต่อกลับทางโทรศัพท์หรือ SMS ภายใน 24 ชม ท่านสามารถจองงานอื่นได้เลย ขออภัยในความไม่สะดวก</div>
    <label for="inputPassword" class="col-md-2 control-label"></label>

    <div class="col-md-6">
	<input type="hidden" name="action" value="save" />
<button type="submit" class="btn btn-primary btn-lg" name="Submit">จองงานสอนพิเศษ</button>
<a href="<?=$siteurl;?>" class="btn btn-danger btn-lg">ยกเลิกการจองงาน</a>
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
<script src="./js/validate/qa.js"></script>

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
