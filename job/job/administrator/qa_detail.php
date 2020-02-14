<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
$sql="select * from tb_question  where job_id=".$_GET['job_id']." and u_id=".$_GET['u_id']." "; 
$resulte=mysql_query($sql);
$data=mysql_fetch_array($resulte);
$sql1="select * from  user  where id=".$data['u_id']." "; 
$resulte1=mysql_query($sql1);
$data1=mysql_fetch_array($resulte1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>คำถามก่อนรับงานสอนพิเศษ</title>
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
<div>
    <div class="left_menu">
<? include"../template/admin_manu.php";?>
</div>
    <div class="right_menu">
<div style="padding:15px;">
<div class="da-panel-content">
<div id="da-ex-tabs">
<h1>รายละเอียดคำถามเกี่ยวกับการจองงานรหัสงาน   <font color="red"><?=jobnumber($data[job_id]);?></font></h1>
<div class="duser">
<p>จองงานโดยสมาชิกรหัส  <font color=red> <?=$data1[memberID];?></font></p>
<p>ชื่อสมาชิก <font color=red> <?=$data1[name];?></font></p>
<p>โทร <font color=red> <?=$data1[mobile];?></font></p>
<div class="clear"></div>
</div>
<p>คุณได้กรอกข้อมูลส่วนตัว ข้อมูลการศึกษา ส่งรูปและบัตรประชาชนครบถ้วน </p>
<p class="answer"><?=resume($data[resume]);?></p>
<p>คุณมั่นใจที่จะรับงานนี้กี่เปอร์เซนต์ </p>
<p class="answer"><?=$data[percent];?></p>
<p>เหตุใดเราควรให้งานนี้กับคุณ (อธิบายอย่างละเอียดเกี่ยวกับผลงานและประสบการณ์ต่างๆ ที่เกี่ยวข้องกับงานนี้) </p>
<p class="answer"><?=$data[q1];?></p>
<p>หากต้องการเปลี่ยนวันเวลาสอน สอบถามเพิ่มเติมกรุณาระบุ (กรณีเปลี่ยนวันเวลาเราจะพิจารณาติวเตอร์ที่มีเวลาตรงกับที่ผู้เรียนก่อนเท่านั้น</p>
<p class="answer"><?=$data[q2];?></p>
<p>ความพร้อมในการโอนค่าแนะนำไ ทางเราใช้ ธนาคาร KTB, SCB, BBL เท่านั้น (ระบุธนาคารและวันเวลาที่จะโอนค่าแนะนำ ไม่เกิน 24 ชั่วโมง )</p>
<p class="answer"><?=$data[q3];?></p>
<p>ท่านได้อ่านกฏกติกาของเราครบถ้วนเรียบร้อยแล้ว ( www.tutorcu.com/tutor.pdf ) </p>
<p class="answer"><?=q5($data[q5]);?></p>
<p>ท่านทราบดีว่า หากท่านจองงานเล่นๆ ท่านจะโดนลบบัญชีและไม่สามารถรับงานที่นี่ได้อีก</p>
<p class="answer"><?=q6($data[q6]);?></p>
   <div id="tabs-1">




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
