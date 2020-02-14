<?
session_start();
//error_reporting(0);
include"../system/config.inc.php";
include"../system/session-admin.php";
include"../system/function.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
$action=$_POST[action];
$category_name=$_POST["category_name"];
$category_title=$_POST["category_title"];
$category_titlebar=$_POST["category_titlebar"];
$category_keyword=$_POST["category_keyword"];
$category_description=$_POST["category_description"];
if($action=="save"){	

$data = array(  
	"category_name"=>$category_name,
	"category_title"=>$category_title,
	"category_titlebar"=>$category_keyword,
	"category_description"=>$category_description,
	 "category_keyword"=>$category_keyword
);

  $fields=""; $values="";
  $i=1;
  foreach($data as $key=>$val)
  {
    if($i!=1) { $fields.=", "; $values.=", "; }
    $fields.="$key";
    $values.="'$val'";
    $i++;
  }
  $sql = "INSERT INTO tb_category ($fields) VALUES ($values)";
  if($conn->query($sql) === TRUE) 
  { 

			echo"<meta http-equiv=refresh content=1;url=../administrator/category.php>";

  } 
  else { echo("SQL Error: <br>".$sql."<br>".mysqli_error()); echo "false";}

}

//update("tb_settings",$data,"config_id='1'");
//require('rss.php');



?>
<style type="text/css">
.success-main{width:100%; margin:auto;}
.success{width:300px;height:100px;margin:auto;float:center;font-size:12px;border:solid 1px #CCCCCC;text-align:center;padding:20px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;}
.success-progress{width:150px;height:10px;background:url(../images/loading30.gif) no-repeat;margin:auto}
.success h2{color:#0080C0}
</style>
	<div class="success-main">
			<div class="success">
<h2>ทำรายการสำเร็จ</h2>
<div class="success-progress"></div>
<p>ระบบกำลังนำกลับไปสู่หน้าก่อนนั้น กรุณารอสักครู่</p>
			</div></div>