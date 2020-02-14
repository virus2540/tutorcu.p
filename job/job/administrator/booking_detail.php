<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
$strTable = "tb_job";
$strCondition = "job_id='".$_GET[id]."'";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายการจอง</title>
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
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt; รายการจองงาน</div>
<div>
    <div class="left_menu">
<? include"../template/admin_manu.php";?>
</div>
    <div class="right_menu">
<div style="padding:15px;">
<div class="da-panel-content">
<div id="da-ex-tabs">
<h1>รายการจอง    <font color="red"><?=$data[subject_name];?></font></h1>
<p>รหัสงานสอน : <?=$data[code_tutor];?></p>
   <div id="tabs-1">


<form class="da-form" name=frmList  action="../administrator/payment_process.php?task=yes&id=<?=$_GET[id];?>" method=post>
<input type="hidden" name="action" value="del_doc" />
  <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>รหัสสมาชิก</th>
                                                <th>ชื่อ-สกุล</th>
                                                <th>สถานะ</th>
                                                <th>กระทำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<div id="content">
<?php
//$str123="select c.*,s.* from tb_booking as c, user as s where c.u_id=s.id order by c.prakad_id desc limit ".$show_normal.""; 

$str="select c.*,s.* from tb_booking as c, user as s where c.u_id=s.id and c.job_id=".$_GET[id]." order by c.memberID ASC"; 

$result=mysql_db_query($dbName,$str); 
while ($sr=mysql_fetch_array($result)) {
	?>
                                            <tr>
                                                <td><?=$sr[memberID];?></td>
                                                <td><a href="editmember.php?user_id=<?=$sr['u_id']?>"><?=$sr[name];?></a></td>
												<td><?=status_payment($sr[payment]);?></td>
                                                <td>
<input type=checkbox id="check<?=$count?>" name="action_id[]" value="<?=$sr['book_id']?>" onClick="if(this.checked==true){ selectRow('row<?=$count?>'); }else{ deselectRow('row<?=$count?>'); }">  </td>
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
												<option value="yes">โอนเงินเเล้ว</option>
												<option value="no">ยังไม่ชำระเงิน</option>

											</select>
</div>
											<a class="da-button red large" href="javascript:ConfirmDelete()">ทำการอัพเดทรายการ</a>
</p></div></div>
									</form>

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
