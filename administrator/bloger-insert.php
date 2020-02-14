<?php
include"../system/config.inc.php";
include"../system/function.php";

if(isset($_POST["prakad"])){
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $sql = "INSERT INTO tb_bloger (subject_name,thumbnail,content) VALUES ('".$_POST["subject"]."','". $image."','".$_POST["content"]."')";
   

    if(mysqli_query($conn,$sql)){
        echo"<meta http-equiv=refresh content=1;url=../administrator/bloger.php>";
    }
    else{
          echo $sql;
    }
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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