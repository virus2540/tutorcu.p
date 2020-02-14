<?
session_start();
include "../system/config.inc.php";

function random_code($len)
{
srand((double)microtime()*10000000);
$chars = "0123456789";
$ret_str = "";
$num = strlen($chars);
for($i = 0; $i < $len; $i++)
{
$ret_str.= $chars[rand()%$num];
$ret_str.=""; 
}
return $ret_str; 
}

$code_process=random_code(12); 
$sql="SELECT process,COUNT(*) as num_row from  tb_bloger WHERE process='".$code_process."'";

$result =$conn->query($sql);
$row = $result->fetch_array();
if ($row["num_row"]>0) {
echo"<meta http-equiv=refresh content=0;url=../administrator/bloger-check-code.php>";
}else{
echo"<meta http-equiv=refresh content=0;url=../administrator/bloger-write.php?process=".$code_process.">";
}
?>

