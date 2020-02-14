<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
include"../system/thdate_function.php";
$strTable = "admin_user";
$strCondition = "userID='$_SESSION[adminID]' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ข้อมูลส่วนตัว</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="../plugin/css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="../plugin/css/fluid.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="../plugin/css/dandelion.css" media="screen" />

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="../plugin/js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="../plugin/jui/js/jquery-ui-1.8.20.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/jui/css/jquery.ui.all.css" media="screen" />
</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;ปรับปรุงข้อมูลบัญชีผู้ใช้</div>
<div>
    <div style="border:solid 1px #CCCCCC;width:230px;float:left;box-shadow:0px 1px 3px #D4D4D4;
-moz-box-shadow:0px 1px 3px #D4D4D4;
-webkit-box-shadow:0px 1px 3px #D4D4D4;background:#ffffff;padding:15px;">
<? include"../template/admin_manu.php";?>
</div>
<div style="border:solid 1px #CCCCCC;width:700px;float:right;margin-top:0px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;">
<div style="padding:15px;">
<div class="da-panel-content">
<h2>ปรับปรุงข้อมูลบัญชีผู้ใช้</h2>
<p>ปรับปรุงข้อมูลผู้ใช้สำหรับคุณเพื่อ ป้องกันข้อมูลของคุณ</p>
  								<div class="clear"></div>
<div id="da-ex-tabs">
<div id="tabs-1">
 <div class="da-panel-content">

<form class="da-form" method="POST" action="../administrator/member-editcomplete" enctype="multipart/form-data">
<div class="head-topic-form">ข้อมูลเข้าใช้ระบบ</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>ชื่อในระบบ</label>
                                                <div class="da-form-item small">
                                                    <input type="text" name="username1" disabled="disabled" value="<?=$data[username];?>" />
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>รหัสผ่านเดิม:</label>
                                                <div class="da-form-item small">
                                                    <input type="password" name="oldpassword" id="oldpassword" />

                                                </div>
<span class="formNote">หมายเหตุ : ใส่รัหสเดิมที่ช่องนี้ หากคุณต้องการเปลี่ยนรหัสใหม่ หรือเว้นว่างไว้กรณีที่ไม่ต้องการเปลี่ยน</span>

                                            </div>
											</div>
 <div class="da-form-row">
                                                <label>รหัสผ่านใหม่</label>
                                                <div class="da-form-item small">
 <input name="password" type="password" id="password" value=""/>

                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>ยืนยันรหัสผ่านใหม่</label>
                                                <div class="da-form-item small">
<input name="repassword" type="password" id="repassword" onchange="Check();" />
                                                </div>
                                            </div>
<div class="head-topic-form">ข้อมูลส่วนตัว</div>
                                            <div class="da-form-row">
                                                <label>ชื่อ-สกุล</label>
                                                <div class="da-form-item">
                                                    <input type="text" name="name" value="<?=$data[name];?>"/>
                                                </div>
                                            </div>
<div class="da-submit-praked margin-top">
<input type="hidden" name="action" value="save" />
<input type="submit" class="da-button blue" name="prakad" value="บันทึกการเปลื่อนเเปลงข้อมูล"/>
</div>
                                    </form>
                                </div>
     
<div class="clear"></div>
                                       
                                    </div>
                                </div>
                                </div>
        <div class="clear"></div>


    </div>
  </div></div>
        <div class="clear"></div>
  
<?include"../template/panel-footer.php";?>

</div>
</body>
</html>
