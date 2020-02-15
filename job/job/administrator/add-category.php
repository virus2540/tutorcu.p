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
<h2>รายวิชาติวทั้งหมด</h2>
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">ข้อมุลรายวิชาติว</a></li>
                                    </ul>
<div id="tabs-1">
 <div class="da-panel-content">

<form class="da-form"  id="da-ex-validate2" method="POST" action="./add-category-complete.php" enctype="multipart/form-data">
<div class="head-topic-form">กำหนดรายวิชาติว</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>ชื่อวิชาติว</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="category_name" class="required"/>
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>title</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="category_title" class="required"/>
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>titlebar</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="category_titlebar" class="required"/>
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>กำหนด keyword</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="category_keyword" id="category_keyword" class="required"/>

                                                </div>
<span class="formNote">หมายเหตุ : เช่น  ติว,ติวเตอร์</span>

                                            </div>
											</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>กำหนด Description รายละเอียด</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="category_description" id="category_description" class="required"/>

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