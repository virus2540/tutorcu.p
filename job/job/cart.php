<? require_once('connect.php');?>
<?
if($_GET['SendPrice'])$_SESSION['SendPrice']=$_GET['SendPrice'];
if(!$_SESSION['SendPrice'])$_SESSION['SendPrice']=0;


$Line = $_GET["Line"];
if($ac=='del'){//ลบออก
	$Line = $_GET["Line"];
	$_SESSION["ssProID"][$Line] = "";
	$_SESSION["ssQty"][$Line] = "";
	
//==============================================================================================
}elseif($ac=='Dec'){//ลดจำนวน
//==============================================================================================
	$Line = $_GET["Line"];
	$_SESSION["ssQty"][$Line]--;
	
	if($_SESSION["ssQty"][$Line]<1):
		$Line = $_GET["Line"];
		$_SESSION["ssProID"][$Line] = "";
		$_SESSION["ssQty"][$Line] = "";
	endif;
	
//==============================================================================================
}elseif($ac=='Inc'){//เพิ่มจำนวน
//==============================================================================================
	$Line = $_GET["Line"];
	$_SESSION["ssQty"][$Line]++;
	
//==============================================================================================
}elseif($ac=='order'){
//==============================================================================================
	if(!isset($_SESSION["intLine"])){
	
		 $_SESSION["intLine"] = 0;
		 $_SESSION["ssProID"][0] = $_GET["ProductID"];
		 $_SESSION["ssQty"][0] = 1;
	
	}else{
		
		$key = array_search($_GET["ProductID"], $_SESSION["ssProID"]);
		if((string)$key != ""){
			 $_SESSION["ssQty"][$key] = $_SESSION["ssQty"][$key] + 1;
		}else{
			 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
			 $intNewLine = $_SESSION["intLine"];
			 $_SESSION["ssProID"][$intNewLine] = $_GET["ProductID"];
			 $_SESSION["ssQty"][$intNewLine] = 1;
		}
	}
//==============================================================================================
}
?>

<?
$numi=0;
for($i=0;$i<=(int)$_SESSION["intLine"];$i++){
	if($_SESSION["ssProID"][$i] != ""){ $numi++;}
}
?>

<? if($numi){?>
<div class="TitleCart">จำนวนสินค้าที่เลือก <?=$numi?> รายการ</div>

<table width="100%" border="1" class="TableBox TableCart">
  <tr>
    <th align="center" valign="middle">ชื่อสินค้า</th>
    <th width="120" align="center" valign="middle">จำนวน</th>
    <th width="100" align="center" valign="middle">ราคา</th>
    <th width="65" align="center" valign="middle">รวม</th>
    <th width="35" align="center" valign="middle">ลบ</th>
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
    <td align="center" valign="middle">
    <input type="submit" name="button" id="button" value="-" class="btnDecFood" rel="<?=$i?>">
    <input name="qty<?=$i?>" type="text" value="<?=$_SESSION["ssQty"][$i]?>" size="2">
    <input type="submit" name="button2" id="button2" value="+" class="btnIncFood" rel="<?=$i?>">
    </td>
    <td align="center" valign="middle"><?=$rs["price"]?></td>
    <td align="center" valign="middle"><?=$Total?></td>
    <td align="center" valign="middle"><input type="submit" value="ลบ" class="btnDelFood" rel="<?=$i?>"></td>
  </tr>
<?
			endif;
		endfor;
?>
  <!--tr>
    <td colspan="2" align="right" valign="middle">&nbsp;</td>
    <td align="center" valign="middle"><select name="selectSendPrice" id="selectSendPrice">
      <option value="0">เลือกตำบล</option>
      <? for($ii=1;$ii<=5;$ii++):?>
      <option value="<?=($ii*10)?>" <? if($ii*10==$_SESSION['SendPrice']){echo 'selected';}?> >ตำบล
        <?=$ii?>
        </option>
      <? endfor;?>
    </select></td>
    <td align="center" valign="middle"><strong>
      <input name="SendPrice" type="hidden" id="SendPrice" value="<?=$_SESSION['SendPrice']?>">
      <?=$_SESSION['SendPrice']?>
    </strong></td>
    <td align="center" valign="middle">&nbsp;</td>
  </tr-->
  <tr>
    <td colspan="2" valign="middle">&nbsp;</td>
    <td align="center" valign="middle">รวมทั้งสิน</td>
    <td align="center" valign="middle"><strong>
      <input name="SumPrice" type="hidden" id="SumPrice" value="<?=$SumTotal+$shipping+$_SESSION['SendPrice']?>">
    <?=$SumTotal+$shipping+$_SESSION['SendPrice']?></strong></td>
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
</table>

<? }else{?>
<input name="chkCart" type="hidden" id="chkCart" value="1">
<h3 align="center">ไม่มีสินค้าในตะกร้า</h3>
<? }?>






