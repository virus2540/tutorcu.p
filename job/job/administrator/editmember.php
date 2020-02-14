<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
$strTable = "user";
$strCondition = "id='$_GET[user_id]'";
$data = fncSelectRecord($strTable,$strCondition);
$new_select1 = "SELECT * FROM tb_eduschool WHERE tutor_id='".$data[process]."'";
$result1= mysql_query($new_select1);
$b1= mysql_fetch_array($result1);
$new_select2 = "SELECT * FROM tb_eduuniversity WHERE tutor_id='".$data[process]."'";
$result2= mysql_query($new_select2);
$b2= mysql_fetch_array($result2);
$new_select3 = "SELECT * FROM  tb_masterdegree WHERE tutor_id='".$data[process]."'";
$result3= mysql_query($new_select3);
$b3= mysql_fetch_array($result3);
$new_select4 = "SELECT * FROM  tb_profesor WHERE tutor_id='".$data[process]."'";
$result4= mysql_query($new_select4);
$b4= mysql_fetch_array($result4);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เเก้ไขข้อมูลสมาชิก</title>
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
</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;ปรับปรุงข้อมูลบัญชีผู้ใช้</div>
<div>
    <div style="border:solid 1px #CCCCCC;width:230px;float:left;box-shadow:0px 1px 3px #D4D4D4;
-moz-box-shadow:0px 1px 3px #D4D4D4;
-webkit-box-shadow:0px 1px 3px #D4D4D4;background:#ffffff;padding:15px;">
<? include"../template/admin_manu.php";?>
</div>
<div style="width:700px;float:right;margin-top:0px;background:#ffffff;">
<div style="padding:15px;">
<div class="da-panel-content">
<h2>ปรับปรุงข้อมูลบัญชีผู้ใช้</h2>
  								<div class="clear"></div>
<div id="da-ex-tabs">
<div id="tabs-1">
 <div class="da-panel-content users">

<form class="da-form" method="POST" action="./member-edit-complete.php?user_id=<?=$_GET[user_id];?>" enctype="multipart/form-data">

<div class="head-topic-form">ข้อมูลส่วนตัว</div>
                                            <div class="da-form-row">
                                                <label>เอกสาร</label>
                                                <div class="da-form-item">
<a href="<?=$siteurl;?>upload/resume/<?=$data[resume];?>">Resume ประวัติส่วนตัว</a> |  <a href="<?=$siteurl;?>upload/idcard/<?=$data[pic_idcard];?>">บัตรประชาชน</a>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>รูปประจำตัว</label>
                                                <div class="da-form-item">
 <img src="<?=$siteurl;?>upload/avartar/<?=$data[avartar];?>" class="img_c">
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>ชื่อ-สกุล</label>
                                                <div class="da-form-item">
                                                    <?=$data[name];?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>ชื่อเล่น</label>
                                                <div class="da-form-item">
<?=$data[nickname];?>                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>วัน / เดือน/ ปี เกิด</label>
                                                <div class="da-form-item">
                                                	
<?=$data[date_b];?>      
                                                </div>
                                            </div>
<div class="head-topic-form">ข้อมูลผู้ติดต่อ</div>
 <div class="da-form-row">
                                                <label>ที่อยู่</label>
                                                <div class="da-form-item">
<?=$data[address];?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>หมายเลขโทรศัพท์</label>
                                                <div class="da-form-item">
<?=$data[mobile];?>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>โทรศัพท์ คนรู้จัก</label>
                                                <div class="da-form-item">
<?=$data[mobile_m];?>
                                                </div>
                                            </div>
<div class="head-topic-form">ข้อมูลด้านการศึกษา</div>
<h1>มัธยมศึกษา</h1>                                           <div class="da-form-row">
                                                <label>จบจาก</label>
                                                <div class="da-form-item">
                                                    <?=$b1[school_name];?>                                               </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>ที่</label>
                                                <div class="da-form-item">
<font color="#000">ตำบล</font> <?=$b1[tambol];?>  <font color="#000">อำเภอ </font>  <?=$b1[amphur];?>           จังหวัด 
  <?=$b1[province];?>                                                 </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>เเผนการเรียน/เกรด</label>
                                                <div class="da-form-item">
                                                	
<?=$b1[plan];?> <?=$b1[plan_other];?>/ <?=$b1[grade];?>  
                                                </div>
                                            </div>
<h1>ปริญาตรี</h1>                                           <div class="da-form-row">
                                                <label>จบจาก</label>
                                                <div class="da-form-item">
                                                    <?=$b2[u_name];?>                                               </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>สาขา</label>
                                                <div class="da-form-item"><?=$b2[sector];?></div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>เเผนการเรียน/เกรด</label>
                                                <div class="da-form-item">
                                                	<?=$b2[grade];?>  
                                                </div>
                                            </div>
<h1>ปริญาโท</h1>                                           <div class="da-form-row">
                                                <label>จบจาก</label>
                                                <div class="da-form-item">
                                                    <?=$b3[u_name];?>                                               </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>สาขา</label>
                                                <div class="da-form-item"><?=$b3[sector];?></div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>เเผนการเรียน/เกรด</label>
                                                <div class="da-form-item">
                                                	<?=$b3[grade];?>  
                                                </div>
                                            </div>
<h1>ปริญาเอก</h1>                                           <div class="da-form-row">
                                                <label>จบจาก</label>
                                                <div class="da-form-item">
                                                    <?=$b4[u_name];?>                                               </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>สาขา</label>
                                                <div class="da-form-item"><?=$b4[sector];?></div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>เเผนการเรียน/เกรด</label>
                                                <div class="da-form-item">
                                                	<?=$b4[grade];?>  
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>สามารถสอนรายวิชา</label>
                                                <div class="da-form-item">

 <?
$name ="".$data['teach']."";
$nameArray = split(",|and",$name);

foreach($nameArray as $key)
   echo "<div class=list_facilities>$key</div>&nbsp;&nbsp;";
?>	
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>สถานที่ที่สามารถเดินทางไปสอนได้</label>
                                                <div class="da-form-item">
 <?
$name ="".$data['place']."";
$nameArray = split(",|and",$name);

foreach($nameArray as $key)
   echo "<div class=list_facilities>$key</div>&nbsp;&nbsp;";
?>	 
                                                </div>
                                            </div>
<div class="da-submit-praked margin-top">
	<input type="hidden" name="action" value="save" />
<input type="submit" class="da-button blue" name="prakad" value="บันทึกการเปลื่อนเเปลงข้อมูล"/>
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
