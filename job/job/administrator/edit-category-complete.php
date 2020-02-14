<?
session_start();
//error_reporting(0);
include"../system/config.inc.php";
include"../system/session-admin.php";
include"../system/function.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.success-main{width:100%; margin:auto;}
.success{width:300px;height:100px;margin:auto;float:center;font-size:12px;border:solid 1px #CCCCCC;text-align:center;padding:20px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;}
.success-progress{width:150px;height:10px;background:url(../images/loading30.gif) no-repeat;margin:auto}
.success h2{color:#0080C0}
</style>
<?
$cate_id= $_GET["cate_id"];
$action=$_POST["action"];
$category_name=$_POST["category_name"];
$category_title=$_POST["category_title"];
$category_titlebar=$_POST["category_titlebar"];
$category_keyword=$_POST["category_keyword"];
$category_description=$_POST["category_description"];
$data = array(  
	"category_name"=>$category_name,
	"category_title"=>$category_title,
	"category_titlebar"=>$category_titlebar,
	"category_description"=>$category_description,
     "category_keyword"=>$category_keyword,
);   
//    ฟังก์ชันสำหรับการ update ข้อมูล
  $modifs="";
  $i=1;
  foreach($data as $key=>$val)
  {
    if($i!=1){ $modifs.=", "; }
    if(is_numeric($val)) { $modifs.=$key.'='.$val; }
    else { $modifs.=$key.' = "'.$val.'"'; }
    $i++;
  }
  $sql = ("UPDATE tb_category SET $modifs WHERE category_id = $cate_id");
  if($conn->query($sql) == TRUE) { 
?>
			<div class="success-main">
			<div class="success">
<h2>ทำรายการสำเร็จ</h2>
<div class="success-progress"></div>
<p>ระบบกำลังนำกลับไปสู่หน้าก่อนนั้น กรุณารอสักครู่</p>
			</div></div>

<?
echo"<meta http-equiv=refresh content=5;url=./category.php>";

}
else { die("SQL Error: <br>".$sql."<br>".mysqli_error()); return false; }

?>