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
<title>ยินดีต้อนรับสู่ระบบ Administrator</title>
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
<? include "../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;รวมเมนู</div>
<div>
    <div class="left_menu">
<? include"../template/admin_manu.php";?>
</div>
    <div class="right_menu">
<div style="padding:15px;">
<div class="main-content">
<h2>ตั้งค่าเว็บไซต์</h2>
<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="setting.php"><span>
					<img src="../plugin/icon/cog_4.png" alt="icon" /><br />
ตั้งค่าเว็บไซต์
				</span></a></li>
					<li><a class="shortcut-button" href="edit-page.php?page_id=10"><span>
					<img src="../plugin/icon/cog_4.png" alt="icon" /><br />
ข้อความต้อนรับหน้าเเรก
				</span></a></li>			
				<li><a class="shortcut-button" href="page.php"><span>
					<img src="../plugin/icon/word_documents_1.png" alt="icon" /><br />
ตั้งค่าหน้าทั้งหมด
				</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
<div class="clear"></div>
</div>
<div class="main-content">
<h2>จัดการทั่วไป</h2>
<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="job.php"><span>
					<img src="../plugin/icon/Folder32.png" alt="icon" /><br />
งาน
				</span></a></li>
				
				<li><a class="shortcut-button" href="category.php"><span>
					<img src="../plugin/icon/File_edit32.png" alt="icon" /><br />
รายวิชา
				</span></a></li>

				
				
			</ul>
<div class="clear"></div>
</div>
<div class="main-content">
<h2> โอนเงิน เเจ้งโอนเงิน</h2>
<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="payment.php"><span>
					<img src="../plugin/icon/Folder32.png" alt="icon" /><br />
เเจ้งโอนเงิน
				</span></a></li>
				
				<li><a class="shortcut-button" href="bank.php"><span>
					<img src="../plugin/icon/File_edit32.png" alt="icon" /><br />
จัดการบัญชีธนาคาร
				</span></a></li>

				
				
			</ul>
<div class="clear"></div>
</div>
        <div class="clear"></div>
    </div>
  </div>
        <div class="clear"></div>
  
<?include"../template/panel-footer.php";?>

</div>
</body>
</html>
