<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
$strTable = "tb_package";
$strCondition = "package_id='".$_GET[id]."'";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เเก้ไข</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/button.css" />
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

<!-- Plugin Files -->

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.ui.js"></script>

<script src="../js/lib/jquery.js" type="text/javascript"></script>
<!--calenda -->
<link rel="stylesheet" type="text/css" href="../plugin/plugins/calender/calendar-mos.css">
<script language="JavaScript" src="../plugin/plugins/calender/calendar.js"></script>
<script type="text/javascript" src="../js/thumbnail/jquery.min.js"></script>
<script type="text/javascript" src="../js/thumbnail/jquery.form.js"></script>
<script type="text/javascript">
 $(document).ready(function() { /*ajax load image*/

			/*document*/
			$('#document').live('change', function()			{ 
			           $("#preview").html('');
			    $("#preview").html('<img src="../images/loader.gif" alt="Uploading...."/>');
			$("#preview-form").ajaxForm({
						target: '#preview'
		}).submit();
		
			});
        }); 
</script>
</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;เเก้ไขเเพคเก็ต</div>
<div>
    <div style="border:solid 1px #CCCCCC;width:230px;float:left;box-shadow:0px 1px 3px #D4D4D4;
-moz-box-shadow:0px 1px 3px #D4D4D4;
-webkit-box-shadow:0px 1px 3px #D4D4D4;background:#ffffff;padding:15px;">
<? include"../template/admin_manu.php";?>
</div>
<div style="border:solid 1px #CCCCCC;width:700px;float:right;margin-top:0px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;">
<div style="padding:15px;">
<div class="da-panel-content">
<h2>เเก้ไข</h2>
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">รายละเอียดเเพคเก็ต</a></li>
                                    </ul>
<div id="tabs-1">
 <div class="da-panel-content">

<form class="da-form" method="POST" id="preview-form" action="./edit-package-complete.php?id=<?=$_GET[id];?>" enctype="multipart/form-data">
<div class="head-topic-form">รายละเอียดเเบนเนอร์</div>

                                    	<div class="da-form-inline">
                                            <div class="da-form-row">

<input type="file"  name="document" id="document" class="da-custom-file" />
<p><font color=red>รองรับการใช้งาน ไฟล์ JPG, GIF, SWF</font></p>
<div id='preview'>
<?
  if($data[ext]=='swf'){
									echo "
<param name=\"movie\" value=\"../upload/package/".$data[filebanner]."\"> 
<param name=\"quality\" value=\"high\"> 
<embed src=\"../upload/package/".$data[filebanner]."\" quality=\"high\" 
pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\"></embed>";
  }else{
?>
<img src='../upload/package/<?=$data[filebanner];?>'  class='preview'>
<? } ?>
</div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>ชื่อเเพคเก็ต</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="package_name" value="<?=$data[package_name];?>"/>
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>รายละเอียด</label>
                                                <div class="da-form-item large">
                                            	<textarea rows="auto" cols="auto" name="detail"  class="required"><?=$data[detail];?></textarea>
                                                </div>
                                            </div>
									</div>
                                    	
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>เลือก</label>
                                                <div class="da-form-item large">
<ul class="da-form-list inline">
<input type="checkbox" name="action" value="save" /> <font color=red>คลิกเพื่อเลือกที่จะเเก้ไข</font>
                                                    </ul>

                                                </div>
</div>
											</div>
<div class="da-submit-praked margin-top">
<input type="submit" class="da-button blue" name="prakad" value="เเก้ไขเเพคเก็ต"/>
</div>
                                    </form>
                                </div>
     
<div class="clear"></div>
                                       
                                    </div>
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
