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
<title>จัดการบัญชีธนาคาร</title>
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
</script>

</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;  จัดการบัญชีธนาคาร</div>
<div>
    <div class="left_menu">
<? include"../template/admin_manu.php";?>
</div>
    <div class="right_menu">
<div style="padding:15px;">
<div class="da-panel-content">
<div style="float:right;margin-bottom:10px"> <input type="button" class="da-button blue large" value="เพิ่มธนาคาร" onclick="window.location='./add-bank.php'" /></div>
  								<div class="clear"></div>
<div id="da-ex-tabs">
   <div id="tabs-1">
     
								<div class="clear"></div>
<form class="da-form" name=frmList  action="../administrator/action_process.php?task=yes" method=post>
<input type="hidden" name="action" value="del" />
  <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>ธนาคาร</th>
                                                <th>เลขที่บัญชี</th>
                                                <th>กระทำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<div id="content">
<?php
$str="select *from tb_bank order by bank_id asc"; 

$result=mysql_db_query($dbName,$str); 
while ($sr=mysql_fetch_array($result)) {
	?>
                                            <tr>
                                                <td><?=$sr[bank_name];?></td>
                                                <td><?=$sr[bank_no];?></td>
                                                <td><a href="./edit-bank.php?id=<?=$sr['bank_id']?>" class="table_edit">edit</a>
<input type=checkbox id="check<?=$count?>" name="action_id[]" value="<?=$sr['bank_id']?>" onClick="if(this.checked==true){ selectRow('row<?=$count?>'); }else{ deselectRow('row<?=$count?>'); }"></td>
                                            </tr>
<? }?></div>
                                        </tbody>
                                    </table>
<p style="margin-top:10px;text-align:right">
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
<div class="da-form-item small" align="right">
เลือกทำรายการ :  <select name="action_bank">
												<option value="">เลือกการกระทำ</option>
												<option value="del">ลบข้อมูลที่เลือก</option>
											</select>
</div>
											<a class="da-button red large" href="javascript:ConfirmDelete()">ทำการอัพเดทรายการ</a>
</div></div></p></form>
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