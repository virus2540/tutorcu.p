<?
	include("system/config.inc.php");
	$str="select * from  tb_file";
	$res=mysql_query($str) or die("query gagal dijalankan");
	?>

<table width="100%" border="1" cellpadding="5" cellspacing="0">
<thead>
<tr bgcolor="#CCCCCC">
<th>Kode barang</th><th>Nama barang</th><th>Harga</th><th width="50">Edit</th><th width="50">delete</th>
</tr> 
</thead>
<tbody>
<? while($data=mysql_fetch_assoc($res)){?>
<tr>
<td><? echo $data['file_title'];?></td><td><? echo $data['nama_barang'];?></td><td><? echo $data['harga'];?></td><td><a href="../edit-pic.php?action=update&file_id=<? echo $data['file_id'];?>" class="edit">edit</a></td><td><a href="../proses.php?action=delete&file_id=<? echo $data['file_id'];?>" class="delete">delete</a></td>
</tr>
<? }?>
</tbody>
</table>
