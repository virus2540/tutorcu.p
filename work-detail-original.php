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

  <body>
<? include "template/header.php";?>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
		  <div class="bs-example">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
<?
$sql="select * from tb_slice order by slice_id asc"; 
$result1=mysqli_query($sql); 
$i =0;
while ($sr=mysqli_fetch_array($result1)) {
?>
          <li data-target="#carousel-example-generic" data-slide-to="<?=$i;?>" <? if($i==0){?>class="active"<? }?>></li>

<? $i++;} ?>
        </ol>
        <div class="carousel-inner">
<?
$sql2="select * from tb_slice order by slice_id asc"; 
$result2=mysqli_query($sql); 
$i =0;
while ($sr=mysqli_fetch_array($result2)) {
?>
          <div class="item <? if($i==0){?>active<? }?>">
<a href="<?=$sr[link];?>" target="_blank"> <img src="<?=$slice_url;?>uploads/<?=$sr[pic];?>" alt="<?=$sr[title];?>"></a>
          </div>
<? $i++;} ?>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div><!-- /example -->
          <div class="jumbotron1">
            <h1>ช่องทางจองงานสอนพิเศษ</h1>
            <p>1.หากกดจองในระบบ ติวเตอร์ที่ผ่านการคัดเลือกจะมี SMSจากเบอร์ 084-5717879 แจ้งข้อมูลการชำระเงิน+รหัสงาน ไปที่เบอร์มือถือของท่าน</p>
<p>2.โทรจองงานสอนพิเศษที่เบอร์  084-5717879  </p>
<p>3.ทางไลน์ใส่ @ ด้วย @tutorcujob   หรือ @jobtutorcu </p>
<p>4.จองผ่านแบบฟอร์มด้านล่างได้เลย  </p> 


          </div>
<div class="detail_job">

 <div class="form-group">
    <label for="inputPassword" class="col-md-3 control-label">รหัสงานสอน</label>
    <div class="col-md-8">
<?=$data[code_tutor];?>   </div>
  </div>
  <div class="bottom_line"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-3 control-label">วิชา</label>
    <div class="col-md-8"><?=$data[subject_name];?>  </div>
  </div>
  <div class="bottom_line"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-3 control-label">สถานที่</label>
    <div class="col-md-8">
<?=$data[place_tutor];?>   </div>
  </div>
   <div class="bottom_line"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-3 control-label">วันที่ต้องการเรียน</label>
    <div class="col-md-8">
<?=$data[day_tutor];?>    </div>
  </div>
   <div class="bottom_line"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-3 control-label">ค่าสอน /ชั่วโมง</label>
    <div class="col-md-8">
<?=$data[price];?>    </div>
  </div>
   <div class="bottom_line"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-3 control-label">ค่าประกันงานสอน</label>
    <div class="col-md-8">
<?=$data[price_garantee];?>    </div>
  </div>
   <div class="bottom_line"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-3 control-label">หมายเหตุ</label>
    <div class="col-md-8">
<?=$data[note];?> </div>
  </div>
<a href="https://line.me/ti/p/%40tutorcujob" class="btn" target="_blank" > <img src="https://www.tutorcu.com/images/New/rtrtrrrrrrrrrrrrrr_04.jpg"></a>
<a href="https://line.me/ti/p/%40jobtutorcu" class="btn" target="_blank" > <img src="https://www.tutorcu.com/images/New/103179-OLVI69-717343434_04.jpg"></a>
    <div class="bottom_line"></div>
<a href="https://www.facebook.com/messages/t/job.tutorcu" class="btn" target="_blank" > <img src="https://www.tutorcu.com/images/New/tutorcujob_07.jpg"></a>
<a href="tel:+6684-571-7879"><img src="https://www.tutorcu.com/images/New/tutorcujob_03.jpg"></a>

     <div class="bottom_line"></div>
 <div class="form-group">
    <label for="inputPassword" class="col-md-3 control-label"> <a href="question.php?job_id=<?=$data[job_id];?>&action=save" > <img src="images/add-job.png"></a>
</label>

    <div class="col-md-8 bbtext"> ติวเตอร์ที่สมัครสมาชิกได้ หรือลงทะเบียนได้ สามาถกดปุ่ม  "จองงาน" ได้เลย ระบบจะทำการจองงาน ให้ท่านทันที  ติวเตอร์ที่ผ่านการคัดเลือกจะมี SMSจากเบอร์ 084-5717879 แจ้งข้อมูลการชำระเงิน+รหัสงาน ไปที่เบอร์มือถือของท่าน ให้ท่านชำระค่าแนะนำภายใน 12 ชั่วโมง 
หากยกเลิกหรือไม่สะดวกรบกวนโทรแจ้งที่เบอร์ 084-571-7879 เท่านั้น แนะนำจองผ่านแบบฟอร์มข้างล่างดีกว่าครับ
  </div>
     <div class="bottom_line"></div>


<h3>ท่านสามารถกรอกแบบฟอร์มจองงานสอนพิเศษด้านล่างได้เลยครับ</h3>
<iframe frameborder="0" style="height:1000px;width:99%;border:none;" src='https://forms.zohopublic.com/tutorcuuu/form/JobApplicationForm/formperma/JpxkDpzZ1z2ai2DQXnFcvSyS7TbsYcjufCOaAbO3SbQ'></iframe>

     <div class="bottom_line"></div>

    </div>
  </div>
<div class="box_m">


<div class=clear></div>
</div>
</div>

          
  </body>
</html>
