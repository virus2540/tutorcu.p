<?
session_start();
include "./system/config.inc.php";
include "./system/function.php";
include "./facebook/fb_connect.php";
/*$sql_update="update tb_article set  pageview=pageview+1 where content_id=".$_GET['article_id']." ";
mysqli_db_query($dbName,$sql_update);*/
$strTable = "tb_bloger";
$strCondition = "bloger_id='$_GET[pid]' ";
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

<style>
.banner{
    background-color:black;
}
.banner img{
    filter: blur(8px);
  -webkit-filter: blur(8px);
    display: block;
    margin-left: auto;
    margin-right: auto;
    min-height : 250px;
    max-height : 500px;
    width: auto;
}
.banner h4{
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 50%;
  padding: 20px;
  text-align: center;
}
.title .subject{
    font-size:48px;
}
.title img{
    display: block;
    margin-left: auto;
    margin-right: auto;
    min-height : 250px;
    max-height : 300px;
    width: auto;
}
.content {
    font-size:150% !important;
}
</style>
</head>

  
<? include "template/header-none-banner.php";?>
<body>
<div class="col-12 banner">
<?php echo '<img class="card-img-top" src="data:image;base64,'.base64_encode( $data["thumbnail"] ).'" alt="'.$data[subject_name].'">';?>
        <h4><?=$data[subject_name];?></h4>
       
</div>

 <div class="container ">
 <div class="pt-3">
 <label style="color:black">Tag :</label>
        <?php
    $arr_h = explode("," , $data[h_tag]);
      foreach ($arr_h as $key => $tag) {
        $query_h = "SELECT * FROM hashtag WHERE id = '".$tag."'";
        $result_h = mysqli_query($conn, $query_h);
        $hdata = mysqli_fetch_assoc($result_h);
        ?>
        <span class="pr-3"><a href="./view_tag.php?pid=<?=$hdata['id']?>"><?=$hdata['h_tag']?></a></span>
        
    <?php
      }
     ?>   
     </div>
 <div class="col-12 title pb-3">
    <div class="subject"><?=$data[subject_name];?></div>
    <?php echo '<img class="card-img-top" src="data:image;base64,'.base64_encode( $data["thumbnail"] ).'" alt="'.$data[subject_name].'">';?>
</div>
<div class="col-12 content pt-3 pb-3">
    <?=$data[content];?>
</div>

 </div> 
 <?include("./template/returnTop.php")?>
  </body>
</html>
