<?
include("system/config.inc.php");
	$str="select * from  tb_file where gallery_id='$_GET[process_id]' and cover='yes' order by file_id limit 1";
	$res=mysql_query($str) or die("query gagal dijalankan");
	?>
<? while($data=mysql_fetch_assoc($res)){?>
<div class="box-pic-cover">
<a href="../upload/gallery/pic/<? echo $data['file_name'];?>" rel="prettyPhoto" title="<? echo $data['file_title'];?>">
<img src="../upload/gallery/thumbnail/<? echo $data['file_name'];?>">
</a>
</div>
<? }?>


