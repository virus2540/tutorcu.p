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


<!---/form register---->
 <div class="form-group">
    <iframe frameborder="0" style="height:1500px;width:99%;border:none;" src='https://forms.zohopublic.com/tutorcuuu/form/Untitled/formperma/klS-utoRSlnQy1mTPOJZYxdTRQTFGxDROGsc7Nh_R6M'></iframe>
      
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
