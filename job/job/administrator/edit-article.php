<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
$strTable = "tb_article";
$strCondition = "content_id='".$_GET[content_id]."'";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เขียนบทความ ข่าวสาร</title>
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


<!-- FileInput Plugin -->
<script type="text/javascript" src="../plugin/js/jquery.fileinput.js"></script>

<!-- เช็คฟอร์มว่าง -->
<script type="text/javascript" src="../plugin/plugins/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="../plugin/js/demo/demo.validation.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.form.js"></script>


<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.ui.js"></script>

<!-- ตัวจัดการ Editor -->
<script type="text/javascript" src="../plugin/plugins/elrte/js/elrte.min.js"></script>
<link rel="stylesheet" href="../plugin/plugins/elrte/css/elrte.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../plugin/plugins/taginput/taginput.css" />
<script type="text/javascript" src="../plugin/plugins/taginput/jqurry.js"></script>
<script type="text/javascript" src="../plugin/plugins/taginput/jqinput.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/plugins/taginput/jqui.css" />
	
	
	<script type="text/javascript">
		
		function onAddTag(tag) {
			alert("เพิ่ม TAG ค้นหา: " + tag);
		}
		function onRemoveTag(tag) {
			alert("ลบ tag: " + tag);
		}
		
		function onChangeTag(input,tag) {
			alert("Changed a tag: " + tag);
		}
		
		$(function() {

			$('#tags_1').tagsInput({width:'auto'});
			
		});
	
	</script>
</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;เเก้ไขบทความ</div>
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
<div class="main-content">
<h2>จัดการบทความ</h2>
<ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button" href="article-category.php"><span>
					<img src="../plugin/icon/Folder32.png" alt="icon" /><br />
หมวดหมู่
				</span></a></li>
				
				<li><a class="shortcut-button" href="new.php"><span>
					<img src="../plugin/icon/File_edit32.png" alt="icon" /><br />
บทความ
				</span></a></li>
				
				<li><a class="shortcut-button" href="./addnew-article.php"><span>
					<img src="../plugin/icon/File_add32.png" alt="icon" /><br />
เพิ่มบทความ
				</span></a></li>
				
				
			</ul>
<div class="clear"></div>
</div>
<h2>บทความ ข่าวสาร</h2>
<div class="da-panel-content">

<form class="da-form" id="da-ex-validate2" method="POST" action="./edit-article-complete.php?content_id=<?=$_GET[content_id];?>" enctype="multipart/form-data">
<div class="head-topic-form">หัวข้อ</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>หัวข้อบทความ</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="content_title" value="<?=$data[content_title];?>" class="required"/>
                                                </div>
                                            </div>
									</div>
                                            <div class="da-form-row">
                                                <label>หมวดหมู่ <span class="required">*</span></label>
                                                <div class="da-form-item small">

 <select name="category" id="category" class="required">
		    <option value="" selected="selected" >- ไม่ระบุ -</option>
              <?php
						  $sqlp="select * from tb_catearticle ORDER BY category_id ASC";
						  $resultp=mysql_query($sqlp);
						  while($datap=mysql_fetch_array($resultp)){
				?>
 <option <? if($datap['category_id']==$data['category']){?>selected="selected"<? }?> value="<? echo $datap['category_id']?>"><?echo $datap['category_name']?></option>
				<? } ?>
            </select>
                                                </div>
                                            </div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>keyword</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="content_keyword" value="<?=$data[content_title];?>" class="required"/>
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>Description</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="content_description" value="<?=$data[content_description];?>" class="required"/>
                                                </div>
                                            </div>
									</div>
<div class="head-topic-form">รายละเอียด</div>
                                    	<div class="da-form-row da-form-block">
                                        	<label>รายละเอียด</label>
                                            <div class="da-form-item large">
<textarea id="da-ex-wysiwyg" name="content_detail" style="width:300px;height:105px;" class="required"><?=$data[content_detail];?></textarea>
                                            </div>
                                        </div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>คำค้นหา</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="tag" id="tags_1" value="<?=$data[tag];?>"/>
													<p><font color=red>คำค้นหาเช่น คอนโดน,คอนโดกรุงเทพ เป็นต้น ควรกรอกเพระามีผลต่อการทำอันดับในเว็บไซต์</font></p>
                                                </div>
                                            </div>
									</div>
                                            <div class="da-form-row">
                                                <label>สถานะบทความ</label>
                                                <div class="da-form-item">
                                                    <ul class="da-form-list inline">
<li><input type="radio" name="status" value="draft"  <? if($data['status']==draft){?>checked="checked" <? }?>/> <label>บทความฉบับร่าง</label></li>
<li><input type="radio" name="status" value="finish" <? if($data['status']==finish){?>checked="checked" <? }?>/> <label>บทความสำเร็จ</label></li>

                                                    </ul>
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
