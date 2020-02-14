<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include "./system/thdate_function.php";
$strTable = "tb_catearticle";
$cate=$_GET[cate];
$strCondition = "category_id='".$cate."' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta https-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$data[category_name];?></title>
<meta name="description" content="<?=$data[category_description];?>" />
<meta name="keywords" content="<?=$data[category_description];?>" />
<link rel="stylesheet" type="text/css" href="./css/2012.css" media="screen" />
<link rel="stylesheet" type="text/css" href="./css/skin/default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="./css/skin/reset.css" media="screen" />
<link type='text/css' href='./css/basic.css' rel='stylesheet' media='screen' />
<link type='text/css' href='./css/dropdownmenu.css' rel='stylesheet' media='screen' />
<link href="./css/split.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='./js/script/jquery.js'></script>
<script type='text/javascript' src='./js/home/widget.js'></script>
</head>

<body>
<? include"template/header.php";?>
<div id="wrapper">
<div class="contentarea">
<ul id="navigation-1" class="navi">
	<li class="b_arrow navi-home"><a href="/">หน้าแรก</a><span>-&gt;</span></li>
	<li class="b_arrow"><a href="<?=$siteurl;?>article.php?cate=<?=$data[category_id];?>"><?=$data[category_name];?></a></li></ul>	
 
	<div class="propertydetails  propertydetails_right">
    
    <h1><?=$data[category_name];?></h1>	
<div class="clear"></div>

<div class="article">
<ul>
<?php 
// สร้างฟังก์ชั่น สำหรับแสดงการแบ่งหน้า 
#ฟังกชั่นไฟล์
function page_navigator($before_p,$plus_p,$total,$total_p,$chk_page){   
	global $urlquery_str;
	$urlfile="article.php?cate=$_GET[cate]";
	$link_page="$urlfile";
	$pPrev=$chk_page-1;
	$pPrev=($pPrev>=0)?$pPrev:0;
	$pNext=$chk_page+1;
	$pNext=($pNext>=$total_p)?$total_p-1:$pNext;		
	$lt_page=$total_p-4;
	if($chk_page>0){  
		echo "<a  href='$link_page&s_page=$pPrev' class='naviPN'>&#8249;</a>";
	}
	if($total_p>=11){
		if($chk_page>=4){
			echo "<a $nClass href='$link_page&s_page=0'>1</a><a class='SpaceC'>. . .</a>";   
		}
		if($chk_page<4){
			for($i=0;$i<$total_p;$i++){  
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				if($i<=4){
				echo "<a $nClass href='$link_page&s_page=$i'>".intval($i+1)."</a> ";   
				}
				if($i==$total_p-1 ){ 
				echo "<a class='SpaceC'>. . .</a><a $nClass href='$link_page&s_page=$i'>".intval($i+1)."</a> ";   
				}		
			}
		}
		if($chk_page>=4 && $chk_page<$lt_page){
			$st_page=$chk_page-3;
			for($i=1;$i<=5;$i++){
				$nClass=($chk_page==($st_page+$i))?"class='selectPage'":"";
				echo "<a $nClass href='$link_page&s_page=".intval($st_page+$i)."'>".intval($st_page+$i+1)."</a> ";   	
			}
			for($i=0;$i<$total_p;$i++){  
				if($i==$total_p-1 ){ 
				$nClass=($chk_page==$i)?"class='selectPage'":"";
				echo "<a class='SpaceC'>. . .</a><a $nClass href='$link_page&s_page=$i'>".intval($i+1)."</a> ";   
				}		
			}									
		}	
		if($chk_page>=$lt_page){
			for($i=0;$i<=4;$i++){
				$nClass=($chk_page==($lt_page+$i-1))?"class='selectPage'":"";
				echo "<a $nClass href='$link_page&s_page=".intval($lt_page+$i-1)."'>".intval($lt_page+$i)."</a> ";   
			}
		}		 
	}else{
		for($i=0;$i<$total_p;$i++){  
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			echo "<a href='$link_page&s_page=$i' $nClass  >".intval($i+1)."</a> ";   
		}		
	} 	
	if($chk_page<$total_p-1){
		echo "<a href='$link_page&s_page=$pNext'  class='paging_next'>&#8250;</a>";
	}
}   
/////////////////////////// สิ้นสุดฟังก์ชั่นทันที //////////////////////////////////////////////////////////
?>
<?php
$q="select * from tb_article where category='$data[category_id]'";
$q.=" ORDER BY content_id DESC";
$qr=mysql_query($q);
$total=mysql_num_rows($qr);
$e_page=20; // จำนวนกระทู้ต่อหน้า  
if(!isset($_GET['s_page'])){   
	$_GET['s_page']=0;   
}else{   
	$chk_page=$_GET['s_page'];     
	$_GET['s_page']=$_GET['s_page']*$e_page;   
}   
$q.=" LIMIT ".$_GET['s_page'].",$e_page";
$qr=mysql_query($q);
if(mysql_num_rows($qr)>=1){   
	$plus_p=($chk_page*$e_page)+mysql_num_rows($qr);   
}else{   
	$plus_p=($chk_page*$e_page);       
}   
$total_p=ceil($total/$e_page);
$count=$_GET['s_page']+$count;
$before_p=($chk_page*$e_page)+1;
 if($total=="0"){		
echo"<div align=center><div class='not_found'></div><br/>ไม่พบข้อมูลที่ต้องการ<br/>ยังไม่มีบทความในหมวดหมู่นี้</div>";
}else{
?>	
<p><? 
echo"พบบทความ <strong>".$data['category_name']."</strong> ทั้งหมด  <font color=red>$total </font> รายการ<br/>";
 $n_pge=$chk_page+1;
  echo"กำลังเเสดงหน้า <strong><font color=red>$n_pge / $total_p</font></strong> หน้า";
  ?></p> 
<? }  
while ($sr=mysql_fetch_array($qr)) {
$timeadd = ThaiTimeConvert("".strtotime($sr[date_add])."","0","1");

?>
<li>
<p><h3><a href="<?=$siteurl;?>read/<?=$sr[content_id];?>-<? echo"".Relink($sr[content_title])."";?>.html" target="_blank"><?=$sr[content_title];?></a></h3><p>
<p><?=$sr[content_description];?><p>
<p class="time">โพสเมื่อ :<?=$timeadd;?></p>
</li>
<? }?>
<p align="center" class="paging"><?php if($total>0){ ?>
<div class="browse_page">
 <?php   
 // เรียกใช้งานฟังก์ชั่น สำหรับแสดงการแบ่งหน้า   
  page_navigator($before_p,$plus_p,$total,$total_p,$chk_page);    
  ?>  </div>
										  <?php }?>	</p>
</ul>
</div>
 <div class="fix"></div>
</div>
	<div class="sidebar sidebar_right">
		  <div class="sidebar_top">
		 		<div class="sidebar_bottom">
					   <div class="widget">			
            <div class="featured_agent">
            
            <h3>อสังหาริมทรัพย์เเนะนำ</h3> 
            
            <ul class="featured_agent_list">
<?php
$str="select *from tb_prakad where status='yes' order by prakad_id desc limit 5"; 

$result=mysql_db_query($dbName,$str); 
while ($sr=mysql_fetch_array($result)) {
$str1="select *from tb_file where gallery_id='".$sr[process]."' and cover='yes'"; 
$result1=mysql_db_query($dbName,$str1); 
while ($sr1=mysql_fetch_array($result1)) {
$thumb=$sr1[file_name];
$typename=$sr[condo_typename];
$link=Relink($typename);
}
	?>
                
<li class="clearfix"><a href="<?=$siteurl;?><?php echo"".Relink($link)."";?>/<?=$sr[prakad_id];?>/<? echo"".Relink($sr[topic])."";?>">
 <img alt='' src='./upload/gallery/thumbnail/<?=$thumb;?>' class='avatar avatar-40' height='50' width='60' />    
               </a> 
               
                <p>	<a href="<?=$siteurl;?><?php echo"".Relink($link)."";?>/<?=$sr[prakad_id];?>/<? echo"".Relink($sr[topic])."";?>" target="_blank"><?=$sr[topic];?> </a> <br /><?=$sr[tambol];?>, <?=$sr[amphur];?>, <?=$sr[province];?> </p>
                 </li>
<? } ?>
     
                              
 	    </ul></div></div>				

<div class="sidebanner1">  
 <div style="width:250px;align=center"><?=GetAds("B1","",true)?></div>
 <div class="widget">
  <li class="blockright">
  <h4>หมวดหมู่อสังหาริมทรัพย์</h4>
  <ul>
  <?php
$sql="select *from tb_category order by category_id asc "; 
$result=mysql_db_query($dbName,$sql);
while ($category=mysql_fetch_array($result))  {
echo "<li><a href=\"".$siteurl."category-".$category['category_id']."/".Relink($category[category_titlebar])."/\" title=\"".$category['category_name']."\"><span>".$category['category_name']."</span></a></li>";                           	    }
?>
  </ul>
  </li>
<div class="clear"></div>
					

</div>
 <div style="width:250px;align=center"><?=GetAds("B2","",true)?></div>
 <div style="width:250px;align=center"><?=GetAds("B3","",true)?></div>
    </div>
 
                </div>
	 	</div>
</div>
<div class="clear"></div>
 </div>
 <? include"template/footer.php";?> 
</body>
</html>		