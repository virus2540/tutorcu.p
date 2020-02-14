<?
session_start();
include "../system/config.inc.php";
include "../system/function.php";
include "../system/session-admin.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>จัดการหน้าเนื้อหา</title>
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
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt; หน้าทั้งหมด</div>
<div>
    <div style="width:230px;float:left;background:#ffffff;padding:15px;">
<? include"../template/admin_manu.php";?>
</div>
<div style="width:700px;float:right;margin-top:0px;background:#ffffff;">
<div style="padding:15px;">
<div class="da-panel-content">
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">รวมหน้าทั้งหมด</a></li>
                                    </ul>
   <div id="tabs-1">
     
								<div class="clear"></div>
<form class="da-form" name=frmList  action="../administrator/new_process.php?task=yes" method=post>
<input type="hidden" name="action" value="del_doc" />
  <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>รหัส</th>
                                                <th>ชื่อ หน้า</th>
                                                <th width="20%">กระทำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<div id="content">
<?php
$str="select * from  tb_page"; 

$result=$conn->query($str); 
while ($sr=$result->fetch_array()) {
	?>
                                            <tr>
                                                <td><?=$sr[page_id];?></td>
                                                <td><?=$sr[page_name];?></td>
                                                <td><a href="./edit-page.php?page_id=<?=$sr['page_id']?>" class="table_edit">edit</a>
<input type=checkbox id="check<?=$count?>" name="action_id[]" value="<?=$sr['page_id']?>" onClick="if(this.checked==true){ selectRow('row<?=$count?>'); }else{ deselectRow('row<?=$count?>'); }"> </td>
                                            </tr>
<? }?></div>
                                        </tbody>
                                    </table>
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
