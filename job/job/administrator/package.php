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
<title>เเพคเก็ต</title>
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



</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;จัดการเเบนเนอร์</div>
<div>
    <div style="border:solid 1px #CCCCCC;width:230px;float:left;box-shadow:0px 2px 5px #D4D4D4;
-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;padding:15px;">
<? include"../template/admin_manu.php";?>
</div>
<div style="border:solid 1px #CCCCCC;width:700px;float:right;margin-top:0px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;">
<div style="padding:15px;">
<div class="da-panel-content">
<h2>เเพคเก็ต</h2>
<p>รวบเเพคเก็ต ราคาต่างๆทางร้าน</p>
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">เเพคเก็ต</a></li>
                                    </ul>
   <div id="tabs-1">
     
								<div class="clear"></div>
  <table id="da-ex-datatable-numberpaging" class="da-table">
                                        <thead>
                                            <tr>
                                                <th>แพคเก็ต id</th>
                                                <th>ชื่อเเพคเก็ต</th>
                                                <th width="50px">กระทำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php
$str="select * from  tb_package order by package_id ASC"; 

$result=mysql_db_query($dbName,$str); 
while ($sr=mysql_fetch_array($result)) {
	?>
<tr>
<td><?=$sr[type];?></td>
<td><?=$sr[package_name];?></td>

<td>

<a href="./edit-package.php?id=<?=$sr['package_id']?>" class="table_edit">edit</a></td>
                                            </tr>
<? }?>
                                        </tbody>
                                    </table>
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