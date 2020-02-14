<?
  session_destroy();

session_start();
include"../system/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เข้าสู่ระบบ</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/txtstyle.css" />
<link href="../css/login-dialog.css" rel="stylesheet" type="text/css" />
<style type="text/css">
	.head_manu { font-size:25px; color: #B27E0E}
	h2 span{ font-size:18px; color: #fff}
	h2 span a:hover{ font-size:18px; color: #FF9900}
	h1 { font-size:30px; color: #fff }
	h1 span { color: #A0A0A4}
	h2 { font-size:42px; text-align:center; }
.regis-button{
background:#FF6600;padding:10px;color:#FFFFFF;border:solid 0px #fff;width:100px;
}
</style> 
</head>
<body>
<div>

  <div class="wapper">
    <div> </div>
    <div class="head_login"><span class="head_manu">ระบบจัดการ TUTOR</span></div>
    <div>
    </div>
    <div class="box-member-login">
	<div class="sec-left">
	<div class="login-screen"></div>
		<div class="login-screen-box"><h1>Admin Login Panel</h1><br/>
		<p>เข้าสู่ระบบจัดการ Administrator สำหรับจัดการข้อมูล</p>
		</div>
	</div>
<div class="sec-right">
<form action="login_check.php" method="get">
<table width="400px">
  <tr>
    <td width="28%" height="21">ชื่อเข้าใช้งาน</td>
    <td width="60%"><span id="mySpan"></span>
	<input name="username" id="username" type="text" class="form_login" placeholder="ชื่อเข้าใช้งาน" /></td>
  </tr>
  <tr>
    <td>รหัสผ่าน</td>
    <td><input name="txtPassword" id="txtPassword" class="form_login"  type='password' placeholder="รหัสผ่านเข้าใข้งาน" />
	</td>
  </tr>
</table>
          <ul>
                        <li class="chk-line">
                        </li>

                      <input type="submit" value="เข้าสู่ระบบ (login)" class="regis-button" id="btnLogin" style="width: 150px;"></input>          
                    </ul>	
                    <ul>
                    <?
                    if($_GET["status"] == 0){echo "<span style='color:red'>กรุณากรอก อีเมล์เข้าใช้งาน</span>";}
                    elseif($_GET["status"]== 1){echo "<span style='color:red'>กรุณากรอกรหัสผ่านเข้าใช้งาน</span>";}
                    elseif($_GET["status"] == 2){echo "<span style='color:red'>ชื่อเข้าใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง</span>";}
                    ?>
                    </ul>
        </form>
        <div class="clear"></div>
                           
						   </p>	

</div>
        <div class="clear"></div>
    </div> 
<p class="copy-right">©2012 <?=$site_name;?>	All Right Reserve.</p>

  </div>

</div>
</body>
</html>
