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
<title>ออเดอร์สินค้า</title>
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
<script type="text/javascript" src="../plugin/jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="../plugin/jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/jui/css/jquery.ui.all.css" media="screen" />

<!-- Plugin Files -->

<!-- DataTables Plugin -->
<script type="text/javascript" src="../plugin/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.tables.js"></script>
<script type="text/javascript" src="../js/script/confirm.js"></script>
<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.ui.js"></script>

<!-- Core JavaScript Files -->
<script type="text/javascript" src="../plugin/js/core/dandelion.core.js"></script>


<script type="text/javascript" src="../plugin/js/core/plugins/dandelion.circularstat.min.js"></script>


<!-- Debounced resize script for preventing to many window.resize events Recommended for Google Charts to perform optimally when resizing -->
<script type="text/javascript" src="../plugin/js/jquery.debouncedresize.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.dashboard.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="../plugin/js/core/dandelion.customizer.js"></script>
<script language="javascript">
function ConfirmDelete(){  
	    if(confirm('คุณต้องการทำรายการที่เลือกจริงหรือไม่')){
	    	document.frmList.submit();
		}
	}
function ConfirmDelete1(){  
	    if(confirm('คุณต้องการทำรายการที่เลือกจริงหรือไม่')){
	    	document.frmList1.submit();
		}
	}	
</script>

</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt; ออเดอร์สินค้า</div>
<div>
    <div class="left_menu">
<? include"../template/admin_manu.php";?>
</div>
    <div class="right_menu">
<div style="padding:15px;">
<div class="da-panel-content">
<div style="float:right;margin-bottom:10px"> <input type="button" class="da-button blue large" value="เพิ่มข้อมูลร้านอาหาร" onclick="window.location='../administrator/check-code-all'" /></div>
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">ส่งสินค้าเเล้ว</a></li>
                                        <li><a href="#tabs-2">ยังไม่ส่งสินค้า</a></li>
                                    </ul>
   <div id="tabs-1">


<form class="da-form" name=frmList  action="../administrator/action_process.php?task=yes" method=post>
<input type="hidden" name="action" value="del_doc" />
  <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>Order id</th>
                                                <th>U id</th>
                                                <th>ราคาสินค้า</th>
                                                <th>สถานะ</th>
                                                <th>กระทำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<div id="content">
<?php
$str="select *from orders where status='yes' order by id desc"; 

$result=mysql_db_query($dbName,$str); 
while ($sr=mysql_fetch_array($result)) {
	?>
                                            <tr>
                                                <td><?=$sr[process];?></td>
                                                <td><?=$sr[res_name];?></td>
                                                <td><a href="../administrator/add-menu.php?shop_id=<?=$sr['prakad_id']?>">เพิ่มเมนูอาหาร</a></td>
                                                <td><a href="../administrator/editresturant-<?=$sr['process']?>" class="table_edit">เเก้ไข</a>
<input type=checkbox id="check<?=$count?>" name="action_id[]" value="<?=$sr['process']?>" onClick="if(this.checked==true){ selectRow('row<?=$count?>'); }else{ deselectRow('row<?=$count?>'); }">  </td>
                                            </tr>
<? }?></div>
                                        </tbody>
                                    </table>
<p style="margin-top:10px;text-align:right">
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
<div class="da-form-item small" align="right">
เลือกทำรายการ :  <select name="action">
												<option value="">เลือกการกระทำ</option>
												<option value="del_game">ลบข้อมูลที่เลือก</option>
												<option value="online">อัพเดทข้อมุล</option>
												<option value="offline">ปรับฉบับร่าง</option>
											</select>
</div>
											<a class="da-button red large" href="javascript:ConfirmDelete()">ทำการอัพเดทรายการ</a>
</p></div></div>
									</form>

								<div class="clear"></div>

                                    </div>
                                    <div id="tabs-2">


<form class="da-form" name=frmList1  action="../administrator/action_process.php?task=yes" method=post>
<input type="hidden" name="action" value="del_doc" />
  <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>รหัสสมาชิก</th>
                                                <th>ราคาสินค้า</th>
                                                <th>สถานะ</th>
                                                <th>กระทำ</th>
                                             </tr>
                                        </thead>
                                        <tbody>
<div id="content">
<?php
$str="select *from orders where status='no' order by id desc"; 

$result=mysql_db_query($dbName,$str); 
while ($sr=mysql_fetch_array($result)) {
	?>
                                            <tr>
                                                <td><?=$sr[id];?></td>
                                                <td><?=$sr[uid];?></td>
                                                <td><?=$sr[total_price];?></td>
                                                <td>สถานะ</td>
                                                <td>
<input type=checkbox id="check<?=$count?>" name="action_id[]" value="<?=$sr['process']?>" onClick="if(this.checked==true){ selectRow('row<?=$count?>'); }else{ deselectRow('row<?=$count?>'); }">  </td>
                                            </tr>
<? }?></div>
                                        </tbody>
                                    </table>
<p style="margin-top:10px;text-align:right">
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
<div class="da-form-item small" align="right">
เลือกทำรายการ :  <select name="action">
												<option value="">เลือกการกระทำ</option>
												<option value="del_game">ลบข้อมูลที่เลือก</option>
												<option value="online">อัพเดทข้อมูล</option>
												<option value="offline">ปรับฉบับร่าง</option>
											</select>
</div>
											<a class="da-button red large" href="javascript:ConfirmDelete1()">ทำการอัพเดทรายการ</a>
</p></div></div>
									</form>
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
