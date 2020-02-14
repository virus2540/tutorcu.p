<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มรายวิชา</title>
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

<!-- Plugin Files -->
<!-- Validation Plugin -->
<script type="text/javascript" src="../plugin/plugins/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="../plugin/js/demo/demo.validation.js"></script>
<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.ui.js"></script>

<script src="../js/lib/jquery.js" type="text/javascript"></script>
<!-- dropdown province check -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!--CK_EDITOR-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckeditor/cke_config.js"></script>
<script type="text/javascript" src="../ckeditor/adapters/jquery.js"></script>

</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;รายวิชา</div>
<div>
    <div class="left_menu">
<? include"../template/admin_manu.php";?>
</div>
    <div class="right_menu">
<div style="padding:15px;">
<div class="da-panel-content">
<h2>เขียนบทความ</h2>
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">บทความใหม่</a></li>
                                    </ul>
<div id="tabs-1">
 <div class="da-panel-content">

<form class="da-form"  id="da-ex-validate2" method="POST" action="./bloger-insert.php" enctype="multipart/form-data">
<div class="head-topic-form">บทความใหม่</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>หัวข้อบทความ</label>
                                                <div class="da-form-item large">
                                                <input type="text" name="subject" class="required" required/>
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>หน้าปกบทความ</label>
                                                <div class="da-form-item large">
                                                <input type="file" name="image" class="required" required/>
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                            <b>เนื้อหาบทความ</b><br>
                                            <textarea name="content" id="content" class="form-control ckeditor"></textarea>
                                            </div>
									</div>
   
											</div>
<div class="da-submit-praked margin-top">
<input type="hidden" name="action" value="save" />
<input type="submit" class="da-button blue" name="prakad" value="เพิ่มข้อมูล"/>
</div>
                                    </form>
                                </div>
     
<div class="clear"></div>
                                       
                                    </div>
                                </div>
                                </div>
        <div class="clear"></div>


    </div>
  </div>
        <div class="clear"></div>
  
<?include"../template/panel-footer.php";?>

</div>
</body>
</html>
<script>
 CKEDITOR.replace( 'content', {
  height: 300,
  filebrowserUploadUrl: "bloger_upload.php"
 });
</script>