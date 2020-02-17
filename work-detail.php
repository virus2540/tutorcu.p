<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include "./facebook/fb_connect.php";
/*$sql_update="update tb_article set  pageview=pageview+1 where content_id=".$_GET['article_id']." ";
mysqli_db_query($dbName,$sql_update);*/
$strTable = "tb_job";
$strCondition = "job_id='$_GET[job_id]' ";
$query0 = "SELECT * FROM $strTable WHERE $strCondition";
$result0 = mysqli_query($conn, $query0);
$data = mysqli_fetch_assoc($result0);
//$date_add = ThaiTimeConvert("".strtotime($data[date_add])."","0","1");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$data[subject_name];?></title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="./asset/css/bootstrap.min.css" rel="stylesheet">
	  <link href="./asset/css/bootstrap-responsive.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="asset/dist/js/bootstrap.js"></script>

<script src="asset/docs-assets/js/holder.js"></script>

<script src="asset/docs-assets/js/application.js"></script>
<script type="text/javascript">
$('#myCollapsible').on('hidden.bs.collapse', function () {
  // do something…
})
</script>


  </head>

  
<? include "template/header.php";?>
<body>
 <div class="container">
   <!--หัวข้อ-->
    <div class="jubotron">
      <h1 class="mt-3 mb-3">ช่องทางจองงานสอนพิเศษ</h1>
      <div class="col-12 pl-5">
      <p>1.หากกดจองในระบบ ติวเตอร์ที่ผ่านการคัดเลือกจะมี SMSจากเบอร์ 084-5717879 แจ้งข้อมูลการชำระเงิน+รหัสงาน ไปที่เบอร์มือถือของท่าน</p>
      <p>2.โทรจองงานสอนพิเศษที่เบอร์  084-5717879  </p>
      <p>3.ทางไลน์ใส่ @ ด้วย @tutorcujob   หรือ @jobtutorcu </p>
      <p>4.จองผ่านแบบฟอร์มด้านล่างได้เลย  </p> 
      </div>
    </div>
    <!--รายละเอียด-->
    
    <label for="inputPassword" class="col-md-3 control-label" style="color: green">รหัสงานสอน</label>
    <? echo $data[code_tutor];?>
    <br>    
    <label for="inputPassword" class="col-md-3 control-label" style="color: green">วิชา</label>
        <? echo $data[subject_name];?>
    <br>
        <label for="inputPassword" class="col-md-3 control-label" style="color: green">สถานที่</label>
        <? echo $data[place_tutor];?>
    <br>
   
    <label for="inputPassword" class="col-md-3 control-label"  style="color: green">Google map</label>
    <?php if($data[google_map] != ""){
     echo "<br>";
     echo  $data[google_map];
    }
    else{echo "<span style='color:red;'>ไม่มี</span>";}
    ?>
    
    <br> 

        <label for="inputPassword" class="col-md-3 control-label" style="color: green">วันที่ต้องการเรียน</label>
    <? echo $data[day_tutor];?> 
    <br>
    <label for="inputPassword" class="col-md-3 control-label"  style="color: green">ค่าสอน /ชั่วโมง</label>
    <? echo $data[price];?>  
    <br>
    <label for="inputPassword" class="col-md-3 control-label"  style="color: green">ค่าประกันงานสอน</label>
    <? echo $data[price_garantee];?>
    <br>
    <label for="inputPassword" class="col-md-3 control-label"  style="color: green">หมายเหตุ</label>
    <? echo $data[note];?>   
    <br> 
    <label for="inputPassword" class="col-md-3 control-label"  style="color: green">Tag</label>
    <span class="pl-0 col-12">
    <?php
    $arr_h = explode("," , $data[hashtag]);
      foreach ($arr_h as $key => $tag) {
        $query_h = "SELECT * FROM hashtag WHERE id = '".$tag."'";
        $result_h = mysqli_query($conn, $query_h);
        $hdata = mysqli_fetch_assoc($result_h);
        ?>
        <span class="pr-3 hash_tag"><a href="view_tag.php?pid=<?=$hdata['id']?>"><?=$hdata['h_tag']?></a></span>
        
    <?php
      }
     ?>   
     </span>
    <br> 
    
    
<!--Button-->
    <div class="mt-2">
<a href="https://line.me/ti/p/%40tutorcujob" class="btn" target="_blank" > <img src="https://www.tutorcu.com/images/New/rtrtrrrrrrrrrrrrrr_04.jpg"></a>
<a href="https://line.me/ti/p/%40jobtutorcu" class="btn" target="_blank" > <img src="https://www.tutorcu.com/images/New/103179-OLVI69-717343434_04.jpg"></a>
    <div class="bottom_line"></div>
<a href="https://www.facebook.com/messages/t/job.tutorcu" class="btn" target="_blank" > <img src="https://www.tutorcu.com/images/New/tutorcujob_07.jpg"></a>
<a href="tel:+6684-571-7879"><img src="https://www.tutorcu.com/images/New/tutorcujob_03.jpg"></a>
</div>
<!--Google Form-->
<div class="mt-3 pb-5">
<h3 class="pb-3">ท่านสามารถกรอกแบบฟอร์มจองงานสอนพิเศษด้านล่างได้เลยครับ</h3>
<iframe frameborder="0" style="height:1000px;width:99%;border:none;" src='https://forms.zohopublic.com/tutorcuuu/form/JobApplicationForm/formperma/JpxkDpzZ1z2ai2DQXnFcvSyS7TbsYcjufCOaAbO3SbQ'></iframe>
</div>
<!--End Container-->
 </div> 
 <?include("./template/returnTop.php")?>
  </body>
</html>
