<?php
session_start();
include('./system/config.inc.php');
$session_id='1'; //$session id
$path = "./upload/photo/pic/";
function random_code($len)
{
srand((double)microtime()*10000000);
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$ret_str = "";
$num = strlen($chars);
for($i = 0; $i < $len; $i++)
{
$ret_str.= $chars[rand()%$num];
$ret_str.=""; 
}
return $ret_str; 
}
$code_generate=random_code(5); 
	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(1024*1024*10))
						{
							$actual_image_name = time().substr(str_replace(" ", "_", md5($txt)), 5)."_".$code_generate.".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
$query="INSERT INTO tb_file (file_name) VALUES ('".$actual_image_name."')";
$result=mysql_query($query);
								//mysql_query("UPDATE tb_file SET file_name='$actual_image_name' WHERE uid='$session_id'");
									
									echo "<img src='../upload/photo/pic/".$actual_image_name."'  class='preview'>";
									echo"<input type='hidden' name='pic_upload' value='".$actual_image_name."' />";
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
				
			else
				echo "Please select image..!";
				
			exit;
		}
?>