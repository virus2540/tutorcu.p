<? require_once('connect.php');
include"./system/config.inc.php";
?>
<?
if($_POST['SubmitLogin']):
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM user WHERE username='$username' AND password='$password' ";
	$re=mysql_query($sql);
	$rs=mysql_fetch_array($re);
	if($rs):
		$_SESSION["ss_id"]=$rs['id'];
		echo 'OK';
	else:
		echo 'NO';
	endif;
	exit();
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>บริการอาหารด่วน สั่งอาหาร ส่งถึงที่</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/style-main.css" type="text/css">
    <link rel="stylesheet" href="css/layout.css" type="text/css"> 
<script src="scripts/jquery.js"></script>
<script src="scripts/script.js"></script>
<!--[if lt IE 9]>
   		<script type="text/javascript" src="js/html5.js"></script>
	<![endif]-->
</head>
<body>
	<!--==============================header=================================-->
<? include "./template/header.php"; ?>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="wrapper">
                <article class="sidebar">
<div class="banner">
<ul>
<li>
<img src="./images/banner1.png" alt=""/>

</li>
<li>
<img src="./images/banner2.png" alt=""/>

</li>
<li>
<img src="./images/banner-3.png" alt=""/>

</li>
<li>
<img src="./images/banner-1.jpg" alt=""/>

</li>
<li>
<img src="./images/banner-2.jpg" alt=""/>

</li>
<li>
<img src="./images/banner-3.jpg" alt=""/>

</li>
</ul>
</div>
				</article>
                <article class="food-list">
                	<div class="maxheight indent-bot">
				<div class="res-head"><h1>รายการอาหารสั่งซื้อ</h1>
<div class=clear></div>
				</div>
<div class="page_detail">
<? if($_POST['Submit'])://================================================================================================?>
<?
	$ss_id=$_SESSION["ss_id"];
	$SumPrice=$_POST["SumPrice"];
	$SendPrice=$_POST['SendPrice'];
	
	/*$sql="UPDATE user SET points = points - $SumPrice WHERE id = '$ss_id' ";
	$re=mysql_query($sql);*/
	
	$sql="INSERT INTO orders (uid , total_price , sendprice)VALUES('$ss_id' , '$SumPrice' , '$SendPrice')";
	$re=mysql_query($sql);
	if($re):
		$strOrderID = mysql_insert_id();
		for($i=0;$i<=(int)$_SESSION["intLine"];$i++):
			if($_SESSION["ssProID"][$i] != ""):
					$sql2="SELECT * FROM foods WHERE id=".$_SESSION["ssProID"][$i];
					$re2=mysql_query($sql2);
					$rs2=mysql_fetch_array($re2);
	
				$sql3 = "INSERT INTO orders_detail (orid , fid , qty)VALUES ('$strOrderID' , '".$rs2['id']."' , '".$_SESSION["ssQty"][$i]."') ";
				$re3=mysql_query($sql3);
				
				if(!$re3)echo ('เกิดความผิดพลาด บันทึกข้อมูลรายการสินค้าไม่ได้');
			endif;
		endfor;
		echo ('บันทึกข้อมูลการซื้อสินค้าเรียบร้อยแล้ว');
		include('orderdetail.php');
		unset($_SESSION['ssProID']);
		unset($_SESSION['ssQty']);
		unset($_SESSION['intLine']);
		unset($_SESSION['SendPrice']);
	else:
		echo ('เกิดความผิดพลาด บันทึกข้อมูลการสั่งซื้อไม่ได้');echo $sql;
	endif;
?>


<? else://================================================================================================?>
<form method="post">
<?
/*$username=$_POST['username'];
$password=$_POST['password'];
$sql="SELECT * FROM user WHERE username='$username' AND password='$password' ";
$re=mysql_query($sql);
$rs=mysql_fetch_array($re);
if($rs or $_SESSION["ss_id"]):
	if(!$_SESSION["ss_id"])$_SESSION["ss_id"]=$rs['id'];
*/
if($_SESSION["ss_id"]):
?>
<!--===================================================================================================-->
<?
$numi=0;
for($i=0;$i<=(int)$_SESSION["intLine"];$i++){
	if($_SESSION["ssProID"][$i] != ""){ $numi++;}
}
?>

<? if($numi){?>
<div class="TitleCart">จำนวนสินค้าที่เลือก <?=$numi?> รายการ</div>

<table width="100%" border="1" class="TableBox TableFood">
  <tr>
    <th align="center" valign="middle">ชื่อสินค้า</th>
    <th width="120" align="center" valign="middle">จำนวน</th>
    <th width="75" align="center" valign="middle">ราคา</th>
    <th width="65" align="center" valign="middle">รวม</th>
    </tr>
  <?
$Total = 0;
$SumTotal = 0;
$numi=0;
  for($i=0;$i<=(int)$_SESSION["intLine"];$i++):
	  if($_SESSION["ssProID"][$i] != ""):
		$numi++;
		$sql="SELECT * FROM foods WHERE id=".$_SESSION["ssProID"][$i];
		$re=mysql_query($sql);
		$rs=mysql_fetch_array($re);
		$Total = $_SESSION["ssQty"][$i] * $rs["price"];

		$SumTotal = $SumTotal + $Total;
	  ?>
 <tr>
    <td align="center" valign="middle"><?=$rs["name"]?></td>
    <td align="center" valign="middle"><?=$_SESSION["ssQty"][$i]?></td>
    <td align="center" valign="middle"><?=$rs["price"]?></td>
    <td align="center" valign="middle"><?=$Total?></td>
    </tr>
<?
			endif;
		endfor;
?>
  <tr>
    <td colspan="2" align="right" valign="middle">ค่าขนส่ง</td>
    <td align="center" valign="middle"><select name="SendPrice" id="SendPrice" rel="<?=$SumTotal+$shipping?>">
      <option value="0">เลือก Zone</option>
<?
$sql="SELECT * FROM district where PROVINCE_ID='58' order by DISTRICT_NAME ASC";
$re=mysql_query($sql);
while($rs=mysql_fetch_array($re)):
 echo '<option value="'.$rs['price'].'" >'.$rs['DISTRICT_NAME'].'</option>';
endwhile;
?>
        </option>

    </select></td>
    <td align="center" valign="middle"><strong>
      <!--input name="SendPrice" type="hidden" id="SendPrice" value="<?=$_SESSION['SendPrice']?>"-->
      <span id="txtSend"><?=$_SESSION['SendPrice']?></span>
    </strong></td>
  </tr>
  <!--tr>
    <td colspan="3" align="right" valign="middle">
      ค่าส่ง
    </td>
    <td align="center" valign="middle"><strong>
      <input name="SendPrice" type="hidden" id="SendPrice" value="<?=$_SESSION['SendPrice']?>">
      <?=$_SESSION['SendPrice']?>
    </strong></td>
  </tr-->
  <tr>
    <td colspan="2" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">รวมทั้งสิน</td>
    <td align="center" valign="middle"><strong>
      <input name="SumPrice" type="hidden" id="SumPrice" value="<?=$SumTotal+$shipping+$_SESSION['SendPrice']?>">
      <span id="txtTotal"><?=$SumTotal+$shipping+$_SESSION['SendPrice']?></span></strong></td>
    </tr>
</table>
<input name="Submit" type="submit" id="SubmitCheckOut" value="ยืนยันข้อมูล">

<? }else{?>
<h3 align="center">ไม่มีสินค้าในตะกร้า</h3>
<? }?>

<!--===================================================================================================-->
<?
else:
	echo 'ข้อมูลไม่ถูกต้อง';
endif;
?>
</form>
<? endif;//================================================================================================?>

</div>
</div>
                </article>
            </div>
        </div>
    </section>
    
<? include "./template/footer.php"; ?>
<!-- bottom-sidebar -->
</body>
</html>
