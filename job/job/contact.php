<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include"./facebook/fb_connect.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>ติดต่อเรา</title>
    <!-- Bootstrap core CSS -->
	<link href="./asset/css/style.css" rel="stylesheet">
    <link href="./asset/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="./asset/css/bootstrap.min.css" rel="stylesheet">
	  <link href="./asset/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./asset/css/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<!-- Placed at the end of the document so the pages load faster -->
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
$result=mysql_query($sql); 
$i =0;
while ($sr=mysql_fetch_array($result)) {
?>
          <li data-target="#carousel-example-generic" data-slide-to="<?=$i;?>" <? if($i==0){?>class="active"<? }?>></li>

<? $i++;} ?>
        </ol>
        <div class="carousel-inner">
<?
$sql="select * from tb_slice order by slice_id asc"; 
$result=mysql_query($sql); 
$i =0;
while ($sr=mysql_fetch_array($result)) {
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
            <h1>บอกข่าววันนี้</h1>
            <p>ยินดีตอนรับติวเตอร์ทุกท่าน ร่วมมาเป็นส่วนหนึงของทีมงานสอนพิเศษ ตามบ้านคุณภาพกับเรา </p>
          </div>

	            <p>1.ติดต่อผ่านโทรศัพท์เท่านั้นนะค่ะ 084-571-7879 </p>
                    <p>2.ติดต่อทางไลน์ใส่ @ ด้วย @tutorcujob หรือ @jobtutorcu </p>
                    <p>3.หากต้องการให้เราเอารายชื่อท่านออกจากหน้า ติวเตอร์ ระบุ รหัสติวเตอร์ ชื่อนามสกุล ที่ต้องการเอาออก URL หน้าที่ติดชื่อท่าน พร้อมทั้งแนบบัตรประจำตัวที่ e-mail: แจ้งเราที่ E-mail: support@tutorcu.com เท่านั้น  เดี่ยว admin เอาออกให้ค่ะ </p>

<!---/end form register---->
</form>
        </div><!--/span-->

    <? include "template/sidebar.php";?>
      </div><!--/row-->
    </div><!--/.container-->
    <? include "template/footer.php";?>
    <script src="./asset/dist/js/bootstrap.js"></script>
<script src="./js/validate/jquery.validate.js"></script>
<script src="./js/validate/Application.js"></script>


<script>
    $('form').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true
            },
            mobile: {
                required: true
            },
            detail: {
                required: true
			}
            
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        }
    });

</script>
  </body>
</html>
