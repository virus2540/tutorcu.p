
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>เข้าสู่ระบบ</title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="./asset/css/bootstrap.min.css" rel="stylesheet">
	  <link href="./asset/css/bootstrap-responsive.css" rel="stylesheet">
<script type="text/javascript" src="./js/script/tutor_login.js"></script>

    <!-- Custom styles for this template -->
    <link href="./asset/css/offcanvas.css" rel="stylesheet">


  </head>

  <body>
  <? include "template/header.php";?>
<div class="container">
    <div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">เข้าสู่ระบบสำหรับสมาชิกเก่าเท่านั้น</h3>
			 	</div>
			  	<div class="panel-body">
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
			    	    		<input name="remember" type="checkbox" value="Remember Me"> Remember Me
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
