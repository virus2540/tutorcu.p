<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include "./system/thdate_function.php";
$strTable = "tb_page";
$strCondition = "page_id='$_GET[id]' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>บริการอาหารด่วน สั่งอาหาร ส่งถึงที่</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css">
    <link rel="stylesheet" href="css/style-main.css" type="text/css">
    <link rel="stylesheet" href="css/layout.css" type="text/css"> 
	<link href="css/split.css" rel="stylesheet" type="text/css" />
<!--==============================cart=================================-->
<link href="cart/style.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery.js"></script>
<script src="scripts/script.js"></script>
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
</head>
<body>
	<!--==============================header=================================-->
<? include "./template/header.php"; ?>
    
	<!--==============================content================================-->
    <section id="content"><div class="ic"></div>
        <div class="main">
            <div class="wrapper">
                <article class="sidebar">
<div class="banner">
<ul>
<li>
<img src="./images/banner1.png" alt=""/>

</li>
<li>
<img src="./images/banner2.png" alt=""/>

</li>
<li>
<img src="./images/banner-3.png" alt=""/>

</li>
<li>
<img src="./images/banner-1.jpg" alt=""/>

</li>
<li>
<img src="./images/banner-2.jpg" alt=""/>

</li>
<li>
<img src="./images/banner-3.jpg" alt=""/>

</li>
</ul>
</div>
				</article>
                <article class="food-list">
                	<div class="maxheight indent-bot">
				<div class="res-head"><h1><?=$data[page_name];?></h1>
<div class=clear></div>
				</div>
<div class="page_detail">
<?=$data[detail];?>
</div>
</div>
                </article>
            </div>
        </div>
    </section>
    
<? include "./template/footer.php"; ?>
<!-- bottom-sidebar -->
</body>
</html>
