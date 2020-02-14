<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../facebook/fb_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>เข้าสู่ระบบ</title>
    <!-- Bootstrap core CSS -->
	<link href="../asset/css/style.css" rel="stylesheet">
    <link href="../asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="../asset/css/bootstrap.min.css" rel="stylesheet">
	  <link href="../asset/css/bootstrap-responsive.css" rel="stylesheet">
<script type="text/javascript" src="./tutor_login.js"></script>

    <!-- Custom styles for this template -->
    <link href="../asset/css/offcanvas.css" rel="stylesheet">


  </head>

  <body>

<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">เข้าสู่ระบบ</h3>
			 	</div>
			  	<div class="panel-body">
 <center>
 <?php if($fb_user){
$fb_id=$user_profile['id'];
$fb_idlog=$fb_id;
echo"<img src=\"./loading.gif\"></a>";
echo"<meta http-equiv=refresh content=3;url=../home.php>";
}else{
 // ถ้ามีการล็อกอิน facebook อยู่แล้ว แสดงลิ้งค์สำหรับ logout ?>

<? }?></center>

<form name="frmMain">
<span id="mySpan"></span>

                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="username" id="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="txtPassword" id="txtPassword" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
	<a href="<?=$siteurl;?>register.php">สมัครสมาชิก</a>
			    	    	</label>
			    	    </div> <a name="btnLogin" id="btnLogin" title="เข้าสู่ระบบ" OnClick="JavaScript:doCallAjax();" class="btn btn-lg btn-success btn-block"><span class="regis-button">เข้าสู่ระบบ (login)</span></a>
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
    
  </body>
</html>
