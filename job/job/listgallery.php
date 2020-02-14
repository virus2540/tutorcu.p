<?
include("system/config.inc.php");
	$str="select * from  tb_file where gallery_id='$_GET[process_id]' and file_type='pic'";
	$res=mysql_query($str) or die("query gagal dijalankan");
	?>
<script type="text/javascript">
$(function(){
		$(".confirm").easyconfirm();
		$("#alert").click(function() {
			alert("You approved the action");
		});
	$("a.edit").click(function(){
		page=$(this).attr("href");
		$("#Formcontent").html("<div class='loading'></div>").load(page);
		return false;
	})
	$("a.cover").click(function(){
		page=$(this).attr("href");
		$("#content").html("<div class='loading'></div>").load(page);
		$("#content").load("../listgallery.php?process_id=<?=$_GET[process_id];?>").fadeIn(400);
		return false;
	})
	$("a.delete").click(function(){
		el=$(this);
			$.ajax({
				url:$(this).attr("href"),
				type:"GET",
				success:function(hasil)
				{
					if(hasil==1)
					{
						el.parent().parent().fadeOut('slow');
					}
					else
					{
						alert(hasil);
					}
				}
			})
		return false;
	})
})
</script>
<? while($data_gal=mysql_fetch_assoc($res)){
 if  ($data_gal[cover]=='yes') {$border='cover-red';}else{$border='cover-dark';	}
?>
<div class="box-pic <?=$border;?>">
<a href="../upload/gallery/pic/<? echo $data_gal['file_name'];?>" rel="prettyPhoto" title="<? echo $data_gal['file_title'];?>">
<img src="../upload/gallery/thumbnail/<? echo $data_gal['file_name'];?>">
</a>
<div class="text"><? echo $data_gal['file_title'];?></div>
<p><a href="../edit-pic.php?action=update&file_id=<? echo $data_gal['file_id'];?>&process_id=<? echo $data_gal['gallery_id'];?>" class="edit"><span class="del-edit"><span class="edit"></span>เเก้ไข</span></a>
<a href="../proses.php?action=delete&file_id=<? echo $data_gal['file_id'];?>" class="confirm delete"><span class="del-edit"><span class="delete"></span>ลบ</span></a>
<a href="../proses.php?action=cover&file_id=<? echo $data_gal['file_id'];?>&gallery_id=<? echo $data_gal['gallery_id'];?>&file_name=<? echo $data_gal['file_name'];?>" class="confirm cover"><span class="del-edit">ตั้งปก</span></a>
</p>
			
</div>
<? }?>

