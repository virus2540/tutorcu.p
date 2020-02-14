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
<title>เพิ่มข้อมูลเมนูอาหาร</title>
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

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.ui.js"></script>

<script src="../js/lib/jquery.js" type="text/javascript"></script>
<!-- dropdown province check -->
</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;เพิ่มข้อมุลเมนูอาหาร</div>
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
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">เพิ่มข้อมูล</a></li>
                                    </ul>
<div id="tabs-1">
 <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>รหัส</th>
                                                <th>ชื่ออาหาร</th>
                                                <th>ราคา</th>
                                                <th>กระทำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<div id="content">
<?php
$str="select *from  foods where shop_id=".$_GET[shop_id]." order by id desc"; 

$result=mysql_db_query($dbName,$str); 
while ($sr=mysql_fetch_array($result)) {
	?>
                                            <tr>
                                                <td><?=$sr[id];?></td>
                                                <td><?=$sr[name];?></td>
                                                <td><?=$sr[price];?></td>
                                                <td><a href="../administrator/edit-menu.php?menu_id=<?=$sr['id']?>" class="table_edit">เเก้ไข</a>
<input type=checkbox id="check<?=$count?>" name="action_id[]" value="<?=$sr['id']?>" onClick="if(this.checked==true){ selectRow('row<?=$count?>'); }else{ deselectRow('row<?=$count?>'); }">  </td>
                                            </tr>
<? }?></div>
                                        </tbody>
                                    </table>
 <div class="da-panel-content">

<form class="da-form" method="POST" action="./add-menu-complete.php?shop_id=<?=$_GET[shop_id];?>" enctype="multipart/form-data">
<div class="head-topic-form">เพิ่มเมนูอาหาร รายการอาหาร</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>ชื่อเมนูอาหาร</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="menu_name"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>ราคาอาหาร</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="menu_price"/>
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
