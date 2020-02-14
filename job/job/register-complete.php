<?
session_start();
//error_reporting(0);
include"./system/config.inc.php";
include"./system/function.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>สมัครสมาชิกสำเร็จ</title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="./asset/css/bootstrap.min.css" rel="stylesheet">
	  <link href="./asset/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./asset/css/offcanvas.css" rel="stylesheet">


  </head>

  <body>
  <? include "template/header.php";?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">

	<div id="teach"><h1><span style="color:#000;">สมัครสมาชิก</span>   <span style="color:#358607;">สมัครเป็นติวเตอร์</span></h1></div>


<?
$action=$_POST[action];
$name=$_POST["name"];
$nickname=$_POST["nickname"];
$mobile=$_POST["mobile"];
$mobile_m=$_POST["mobile_m"];
$id_code=$_POST["id_code"];
$address=$_POST["address"];
$date_b=$_POST["date_b"];
$username=$_POST["username"];
$password=$_POST["password"];
$email=$_POST["email"];
$process=$code_generate;
$date_add=date("Ymdhis");
/*education*/
$u_name=$_POST["u_name"];
$u_year=$_POST["u_year"];
$faceulty=$_POST["faceulty"];
$sector=$_POST["sector"];
$grade=$_POST["grade"];
/*height education*/
$h_name=$_POST["h_name"];
$h_degree=$_POST["h_degree"];
$h_university=$_POST["h_university"];
$h_sector=$_POST["h_sector"];

/*gen code members*/
$rs_mem = "SELECT MAX(id) AS id FROM user";
$result = mysql_query($rs_mem);
$row_mem=mysql_fetch_array($result);
$mem_old=$row_mem['id']+1;
$number_preview=sprintf("%07d", $mem_old);
$memberID='tcu'.$number_preview.'';
if($action=="save"){	
?>
<div class="alert alert-success"><b>สมัครสมาชิกสำเร็จ
</b>ท่านสามารถเข้าไปดูประกาศงานสำหรับติวเตอร์ เเก้ไขงานได้เลยวันนี้
</div>

<?
$data = array(  
	"memberID"=>$memberID,
	"name"=>$name,
	"nickname"=>$nickname,
	"mobile"=>$mobile,
	"mobile_m"=>$mobile_m,
	"id_code"=>$id_code,
	"address"=>$address,
	"password"=>$password,
	"email"=>$email,
	"h_degree"=>$h_degree,
	"h_university"=>$h_university,
	"h_name"=>$h_name,
	"h_sector"=>$h_sector,
	"date_b"=>$date_b,
	"date_add"=>$date_add,
	"process"=>$process,
);   
insert("user",$data); 
 mysql_query("INSERT INTO tb_eduschool (edu_id,tutor_id) VALUES  ('','$process')");
 mysql_query("INSERT INTO  tb_eduuniversity (edu_id,u_name,u_year,faceulty,sector,grade,tutor_id) VALUES  ('','$u_name','$u_year','$faceulty','$sector','$grade','$process')");
 mysql_query("INSERT INTO  tb_masterdegree (edu_id,tutor_id) VALUES  ('','$process')");
 mysql_query("INSERT INTO  tb_profesor (edu_id,tutor_id) VALUES  ('','$process')");
echo"<meta http-equiv=refresh content=5;url=./index.php>";
exit;
}
?>
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->

    <? include "template/footer.php";?>

    </div><!--/.container-->


  </body>
</html>
