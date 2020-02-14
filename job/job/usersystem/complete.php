<?
session_start();
include "../system/config.inc.php";
include "../system/web_config.php";
include "../system/function.php";
$strTable = "tb_package";
$strCondition = "package_name='$_GET[package]' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ขอบคุณที่ลงทะเบียนกับเรา</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/2012.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/skin/default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/skin/reset.css" media="screen" />
<link type='text/css' href='../css/basic.css' rel='stylesheet' media='screen' />
<link type='text/css' href='../css/dropdownmenu.css' rel='stylesheet' media='screen' />
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/lib/jquery.validate.js" type="text/javascript"></script>
<script src="../js/font/cufon-yui.js" type="text/javascript"></script>
<script src="../js/font/supermarket_400.js" type="text/javascript"></script>
<script type="text/javascript">
		 Cufon.replace('.head_manu,h2 span');
 
</script>
</head>

<body>
<? include"../template/header.php";?>
<div id="wrapper">
<div class="contentarea">

 
	<div class="register  propertydetails_right">
<div class="register_complete">
<h1>ลงทะเบียนเรียบร้อย กรุณาดำเนินการชำระเงิน</h1>	

<h3><u>แพ็คเกจสมาชิก</u></h3>
 <? if($_GET['months']=='6'){
 $price=$data[price_6];
}elseif($_GET['months']=='2'){
 $price="ฟรี";
}else{
$price=$data[price_12];
}
 ?>
<p>คุณเลือกแพ็คเกจ " <?=$_GET[package];?>": แบบ <?=$_GET[months];?> เดือน ราคา <b><?=$price;?></b> บาท</p>
                                        					
				        
                <br/>
        
                        
                    <h3><u>ชำระค่าสมาชิกโดยการโอนเงิน</u></h3>
					กรุณาโอนค่าสมาชิกไปยังบัญชีธนาคารในตารางข้างล่าง และกรุณาการแจ้งการชำระค่าสมาขิกที่  <?=$tel;?><br/><br/>

<table cellspacing="0" cellpadding="0" class="price_table" style="width: 100%;">
						<tbody>
							<tr>
								<td class="price_header first_col">ธนาคาร</td>
								<td class="price_header">ชื่อบัญชี</td>
								<td class="price_header">สาขา</td>
								<td class="price_header">เลขที่บัญชี</td>
							</tr>
              <?php
						  $sqlp="select * from  tb_bank ORDER BY bank_id ASC";
						  $resultp=mysql_query($sqlp);
						  while($datap=mysql_fetch_array($resultp)){
						   ?>
							<tr>
	                            <td class="first_col"><?=$datap[bank_name];?></td>
	                           <td><?=$datap[bank_acc];?></td>
	                           <td><?=$datap[bank_blance];?></td>
	                            <td><?=$datap[bank_no];?></td>
							</tr>
<? } ?>
						</tbody>
					</table>
<br/><br/>กรุณาแจ้งอีเมลหรือเบอร์มือถือที่ใช้สมัครสมาชิกกับเจ้าหน้าที่ เพื่อทำการเปิดใช้งาน
                    
                        
                <br/>
                
                คุณสามารถ  <a class="bluelink" href="<?=$siteurl;?>usersystem/login">เข้าสู่ระบบ</a> ได้ทันที เพื่อลงประกาศของคุณ แต่ประกาศของคุณจะถูกแสดงหลังจากยืนยันการชำระค่าสมาชิก<br/><br/>
                เราจะทำการเปิดสถานะบัญชีของคุณ หลังจากได้รับการยืนยันการชำระค่าสมาชิกแล้ว
                <br/><br/>
                                
                ถ้าต้องการข้อมูลเพิ่มเติมกรุณาติดต่อทางโทรศัพท์ที่ <b><?=$tel;?></b><br/>
                หรืออีเมลมาที่  <b><?=$admin_email;?></b>
                
                <br/><br/> 


</div>
 <div class="fix"></div>
</div>
	<div class="sidebar_right_register sidebar_right">

 <div class="widget">
  <li class="blockright">
  <h4>Package ที่คุณเลือก</h4>
<h2><font color="#FF9999">Package <?=$_GET[package];?></font></h2>
<h2><font color="#FF9999">ระยะเวลา <?=$_GET[months];?> เดือน</font></h2>
  </li>
<div class="clear"></div>
					

</div>				
</div>
    
<div class="clear"></div>    

    </div>
<? include"../template/footer.php";?>
</body>
</html>		