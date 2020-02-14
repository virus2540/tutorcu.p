<p>
<div class="mem-avatar"><img src="../images/avarta.jpg" alt="photo"></div>
<div class="mem-detail">
<?
#อ้างอิงผู้ระกอบการ
$sql_agency="Select * From members where userID='$_SESSION[userID]'";
$result_agency=mysql_db_query($dbName,$sql_agency);
$num_rows=mysql_num_rows($result_agency);
$arr_agency=mysql_fetch_array($result_agency);
if($arr_agency[status]=='2'){
$sql_date="Select * From  agency where member_id='$_SESSION[userID]'";
$result_date=mysql_db_query($dbName,$sql_date);
$arr_date=mysql_fetch_array($result_date);
//$expire = ThaiTimeConvert("".strtotime($arr_date[expire])."","0","3");
}
?>
<b>ยินดีต้อนรับ</b> <?=$arr_agency[name];?></br>
<a href="<?=$siteurl;?>usersystem/my">แก้ไขบัญชี</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=$siteurl;?>usersystem/my">แก้ไขข้อมูลส่วนตัว</a>
</div>
</p>
<div class="clear"></div>
<p><strong><? echo status_s($arr_agency[status]);?></strong></br/></p>
<? if($_SESSION[status]=='1'){?>
                                    <div class="alert-warning">
ต้องการอัพเกรดสถานะสมาชิกธรรมดา เป็น premuim คลิกดูรายละเอียดที่นี่

                                    </div>
<?}else{?>
<p>package: <font color=green><?=$arr_agency[package];?></font>
ระยะเวลา: <font color=green><?=$arr_agency[mounth];?> เดือน</font><br/>
<strong>หมดอายุ: <?=$expire;?></strong></p>
<? }?>
<div class="upgrade"><a href="<?=$siteurl;?>usersystem/support">อัพเกรดสถานะ</a></div><div class="customer_service"><a href="<?=$siteurl;?>usersystem/support">ฝ่ายบริการลูกค้า</a></div>
<div class="clear"></div>
<p>
 <input type="button" class="da-button gray large" value="กลับไปหน้าเเรก" onclick="window.location='index.php'" />
<input type="button" class="da-button blue large" value="ออกจากระบบ" onclick="window.location='../usersystem/logout'" />
</p>