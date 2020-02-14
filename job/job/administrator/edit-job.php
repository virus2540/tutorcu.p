<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
$strTable = "tb_job";
$strCondition = "job_id='".$_GET[id]."'";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เเก้ไขข้อมุลงานติวเตอร์</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="../plugin/css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="../plugin/css/fluid.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="../plugin/css/dandelion.css" media="screen" />
<link rel="stylesheet" href="../plugin/plugins/elrte/css/elrte.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="../plugin/css/tab.css" media="screen" />
<style type="text/css">
	#map_canvas { 
	width:350px;float:left;
	height:300px;
	margin:auto;
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}
</style>
<!-- jQuery JavaScript File -->
<script type="text/javascript" src="../plugin/js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="../plugin/jui/js/jquery-ui-1.8.20.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/jui/css/jquery.ui.all.css" media="screen" />


<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="../plugin/jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="../plugin/jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="../plugin/jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/jui/css/jquery.ui.all.css" media="screen" />

<!--css style-->
<style type="text/css">
.success-main{width:100%; margin:auto;}
.success{width:300px;height:100px;margin:auto;float:center;font-size:12px;border:solid 1px #CCCCCC;text-align:center;padding:20px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;}
.success-progress{width:150px;height:10px;background:url(../images/loading30.gif) no-repeat;margin:auto}
.success h2{color:#0080C0}
</style>
<style type="text/css">
html { height: 100% }
body { 
	height:100%;
	margin:0;padding:0;
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:600px;float:left;
	height:300px;
	margin:auto;
	margin-top:50px;
}
</style>
<script>
function clickButton()
  {
  document.getElementById('SearchPlace').click()
  }
</script>
</head>
<body>
<? include"../template/admin-header.php";?>
<div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt; ข้อมูลร้านอาหาร</div>
<div>
    <div style="border:solid 1px #CCCCCC;width:230px;float:left;background:#ffffff;padding:15px;">
<? include"../template/admin_manu.php";?>
</div>
<div style="width:700px;float:right;margin-top:0px;background:#ffffff;">
<div style="padding:15px;">
 <div class="da-panel-content">
<?php
$sql = "SELECT * FROM `tb_job` WHERE `job_id` = $_GET[id]";
$result = $conn->query($sql);
$row = $result->fetch_array();
?>
<form id="da-ex-wizard-form" class="da-form" method="POST" action="../administrator/editjob-complete.php?id=<?=$_GET[id];?>" enctype="multipart/form-data">
<fieldset class="da-form-inline">
                                        	<legend>ข้อมูลทั่วไป</legend>
                                        	<div class="da-form-row">
                                            	<label>วิชา :  <span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="subject_name" class="required" value="<?echo $row['subject_name'];?>"/>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>รหัสการสอน :  <span class="required">*</span></label>
                                                <div class="da-form-item small">
                                                	<input type="text" name="code_tutor" class="required" value="<?echo $row['code_tutor'];?>"/>
                                                </div>
                                            </div>
                                        	
                                    	<div class="da-form-row">
                                        	<label>สถานที่สอน</label>
                                            <div class="da-form-item large">
                                            	<span class="formNote">สถานที่สอนที่ไหน</span>
                                            	<textarea rows="auto" cols="auto" name="place_tutor" class="required" ><?echo $row['place_tutor'];?></textarea>
                                            </div>
                                        </div>
<div class="head-topic-form">รายละเอียด</div>
                                        	
                                            </div>  	
                                        	<div class="da-form-row">
                                            	<label>วันที่ต้องการเรียน :  <span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="day_tutor" class="required" value="<?echo $row['day_tutor'];?>"/>
                                                </div>
                                            </div>
                                       
                                        	
<div class="head-topic-form">ข้อมูลด้านราคา</div>
                                        	<div class="da-form-row">
                                            	<label>ค่าสอน <span class="required">*</span></label>
                                                <div class="da-form-item small">
												<input type="text" name="price" value="<?echo $row['price'];?>"/>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>ค่าประกัน <span class="required">*</span></label>
                                                <div class="da-form-item small">
												<input type="text" name="price_garantee" value="<?echo $row['price_garantee'];?>"/>
                                                </div>
                                            </div>




                <!--  <form> เก็บข้อมูลสำหรับนำไปบันทึกลงฐานข้อมูล หรือนำไปใช้อื่นๆ-->

			
<div class="head-topic-form">อื่นๆ</div>

                                    	<div class="da-form-row">
                                        	<label>หมายเหตุ</label>
                                            <div class="da-form-item large">
                                            	<span class="formNote">อื่นๆ</span>
                                            	<textarea rows="auto" cols="auto" name="note" ><?echo $row['note'];?></textarea>
                                            </div>
                                        </div>
                                        	<div class="da-form-row">
<div class="da-submit-praked margin-top">
													<input type="hidden" name="action" value="save" />
<input type="submit" class="da-button blue" name="prakad" value="บันทึกข้อมูล"/>
</div>
                                            </div>
                                        </fieldset>
</form>


        </div>
        <div class="clear"></div>


    </div>
  </div>
        <div class="clear"></div>
  
<?include"../template/panel-footer.php";?>

</body>
</html>
