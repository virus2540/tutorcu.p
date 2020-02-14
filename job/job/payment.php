<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include"./facebook/fb_connect.php";
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
<p>
<form class="form-horizontal" method="POST" id="validation-form" action="./payment-complete.php" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">ชื่อ-สกุล</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" class="form-control input-md">
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">รหัสงานสอน </label>  
  <div class="col-md-4">
  <input id="code_subject" name="code_subject" type="text" class="form-control input-md" placeholder="เช่น A1002">
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">เบอร์โทรติดต่อ *</label>  
  <div class="col-md-4">
  <input id="mobile" name="mobile" type="text" class="form-control input-md">
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">ธนาคารที่โอนเข้า</label>
  <div class="col-md-4">
    <select id="bank" name="bank" class="form-control">
      <option value="">เลือก</option>
            <?php
						  $sqlp="select * from tb_bank ORDER BY bank_id ASC";
						  $resultp=mysql_query($sqlp);
						  while($datap=mysql_fetch_array($resultp)){
						  echo"<option value=$datap[bank_id]>$datap[bank_name]   $datap[bank_no]</option>";
						  }
						   ?>
    </select>
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">จำนวนเงิน</label>  
  <div class="col-md-4">
  <input id="money" name="money" type="text" class="form-control input-md">
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">วันที่โอน </label>  
  <div class="col-md-4">
  <input id="date_tranfer" name="date_tranfer" type="text" class="form-control input-md" placeholder=" เช่น  20/12/25">
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">เวลาที่โอน </label>  
  <div class="col-md-4">
  <input id="time" name="time" type="text" class="form-control input-md" placeholder=" เช่น  20/12/25">
  </div>
</div>
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="textarea">หมายเหตุ</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="textarea" name="note"></textarea>
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
   	<input type="hidden" name="action" value="save" />
<button type="submit" class="btn btn-primary btn-sm" name="Submit">ยืนยันการชำระเงิน</button>
  </div>
</div>

</fieldset>
</form>
</p>
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->

    </div><!--/.container-->
    <? include "template/footer.php";?>
 <!-- JavaScript -->

<script src="./js/libs/jquery-1.9.1.min.js"></script>
<script src="./js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="./js/libs/bootstrap.min.js"></script>

<script src="./js/validate/jquery.validate.js"></script>
<script src="./js/validate/Application.js"></script>


<script>
    $('form').validate({
        rules: {
            name: {
                minlength: 3,
                required: true
            },
            code_subject: {
                required: true
            },
            mobile: {
                required: true
            },
            bank: {
                required: true
            },
            money: {
                required: true
            },
            date_tranfer: {
                required: true
            },
            time: {
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });

</script>

  </body>
</html>
