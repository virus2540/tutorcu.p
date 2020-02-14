<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
$strTable = "tb_slice";
$strCondition = "slice_id='".$_GET[id]."'";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เเก้ไข</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="../plugin/css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="../plugin/css/fluid.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="../plugin/css/dandelion.css" media="screen" />

<!-- jQuery JavaScript File -->
<script type="text/javascript" src="../plugin/js/jquery-1.7.2.min.js"></script>

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="../plugin/jui/js/jquery-ui-1.8.20.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/jui/css/jquery.ui.all.css" media="screen" />

<!-- Demo JavaScript Files -->
<link href="style.css" rel="stylesheet" type="text/css">
<script src="scripts/jquery.form.js"></script>
<script src="scripts/script.js"></script>
<script src="scripts/spo.js"></script>


<!--CK_EDITOR-->
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../ckeditor/cke_config.js"></script>
<script type="text/javascript" src="../ckeditor/adapters/jquery.js"></script>

</head>
<body>
<? include"../template/admin-header.php";?>
<div id="overlay"></div>
<div id="MainUpImg">
</div>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;เเก้ไข</div>
<div>
    <div style="width:230px;float:left;background:#ffffff;padding:15px;">
<? include"../template/admin_manu.php";?>

</div>
<div style="border:solid 1px #CCCCCC;width:700px;float:right;margin-top:0px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;">
<div style="padding:15px;">
<div class="da-panel-content">
<div class="da-panel-content">

<form class="da-form" method="POST" action="./edit-slice-complete.php?id=<?=$_GET[id];?>" enctype="multipart/form-data">
<div class="head-topic-form">หัวข้อ</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>หัวข้อ</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="slice_name" value="<?=$data[slice_name];?>"/>
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>Link</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="link" value="<?=$data[link];?>"/>
                                                </div>
                                            </div>
									</div>
<div class="head-topic-form">ภาพ slice</div>
                                    	<div class="da-form-row da-form-block">
                                            <div class="da-form-item large">
  <div><img src="<?=$slice_url;?>uploads/_thumbs/<?=$data[pic];?>" height="150" class="ImgMain"></div>
<div> <input name="ImgMain" type="hidden" id="ImgMain" size="50"><br><br>
<input name="Button" type="button" value="เลือกภาพหลัก" id="AddMainImg">
</div>
<div class="cb"></div>
                                            </div>
                                        </div>
                                        <div class="da-button-row">
											<input type="hidden" name="action" value="save" />
                                        	<input type="reset" value="ล้างข้อมูล" class="da-button gray left" />
                                        	<input type="submit" value="เเก้ไขข้อมูล" class="da-button blue" />
                                        </div>                                 	
 </form>
                                </div>
     

                                </div>
        <div class="clear"></div>


    </div>
  </div>
        <div class="clear"></div>
  
<?include"../template/panel-footer.php";?>

</div>
</body>
</html>
