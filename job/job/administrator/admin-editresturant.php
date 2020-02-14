<?
session_start();
include"../system/config.inc.php";
include"../system/session-admin.php";
include"../system/function.php";
$strTable = "tb_resturant";
$strCondition = "process='$_GET[process_id]' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เเก้ไขรายการ </title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/button.css" />
<!-- CSS Reset -->
<link rel="stylesheet" type="text/css" href="../plugin/css/reset.css" media="screen" />
<!--  Fluid Grid System -->
<link rel="stylesheet" type="text/css" href="../plugin/css/fluid.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="../plugin/css/dandelion.css" media="screen" />
<link rel="stylesheet" href="../plugin/plugins/elrte/css/elrte.css" media="screen" />
<!--  Main Stylesheet -->
<link rel="stylesheet" type="text/css" href="../plugin/css/tab.css" media="screen" />
<style type="text/css">
	#map_canvas { 
	width:350px;float:left;
	height:300px;
	margin:auto;
.preview
{
width:200px;
border:solid 1px #dedede;
padding:10px;
}
#preview
{
color:#cc0000;
font-size:12px
}
</style>
<!-- jQuery JavaScript File -->
<script type="text/javascript" src="../plugin/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" >
 jQuery.noConflict(); 
</script>
<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="../plugin/jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" >
 jQuery.noConflict(); 
</script>
<script type="text/javascript" src="../plugin/jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="../plugin/jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/jui/css/jquery.ui.all.css" media="screen" />

<!-- Plugin Files -->

<!-- FileInput Plugin -->
<script type="text/javascript" src="../plugin/js/jquery.fileinput.js"></script>

<!-- Validation Plugin -->
<script type="text/javascript" src="../plugin/plugins/validate/jquery.validate.js"></script>

<!-- Wizard Plugin -->
<script type="text/javascript" src="../plugin/js/core/plugins/dandelion.wizard.min.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.form.js"></script>

<!-- jGrowl Plugin -->
<script type="text/javascript" src="../plugin/plugins/jgrowl/jquery.jgrowl.min.js"></script>
<link rel="stylesheet" href="../plugin/plugins/jgrowl/jquery.jgrowl.css" media="screen" />

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.ui.js"></script>

<!-- elRTE Plugin -->
<script type="text/javascript" src="../plugin/plugins/elrte/js/elrte.min.js"></script>
<link rel="stylesheet" href="../plugin/plugins/elrte/css/elrte.css" media="screen" />

<!-- Core JavaScript Files -->
<script type="text/javascript" src="../plugin/js/core/dandelion.core.js"></script>


<script type="text/javascript" src="../plugin/js/core/plugins/dandelion.circularstat.min.js"></script>

<script type="text/javascript" src="../plugin/js/jquery.debouncedresize.js"></script>

<!-- Demo JavaScript Files -->
<script type="text/javascript" src="../plugin/js/demo/demo.dashboard.js"></script>

<!-- Customizer JavaScript File (remove if not needed) -->
<script type="text/javascript" src="../plugin/js/core/dandelion.customizer.js"></script>
<!-- dropdown element Files -->
<script type="text/javascript" src="../js/script/googlemap.js"></script>
<script type="text/javascript" src="../js/script/mapresult.js"></script>
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script type="text/javascript" >
 jQuery.noConflict(); 
</script>
<!-- dropdown province check -->
<script type="text/javascript" >
/*check number 1,000*/
			function addCommas(nStr)
			{
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
			}

			function chkNum(ele)
			{
				var num = parseFloat(ele.value);
				ele.value = addCommas(num.toFixed(0));
			}
/*check numboric form*/
function  checkNumber(data){
 if(!data.value.match(/^\d*$/)){
    //alert('กรอกตัวเลขเท่านั้น');
    data.value='';
 }
}
 $(document).ready(function() { /*ajax load image*/
		
            $('#photoimg').live('change', function()			{ 
			           $("#preview").html('');
			    $("#preview").html('<img src="../images/loader.gif" alt="Uploading...."/>');
			$("#content").load("../listgallery.php?process_id=<?=$_GET[process_id];?>").fadeIn("slow");
			$("#da-ex-wizard-form").ajaxForm({
						target: '#preview'
		}).submit();
		
			}); 
			/*document*/
			$('#document').live('change', function()			{ 
			           $("#preview_doc").html('');
			    $("#preview_doc").html('<img src="../images/loader.gif" alt="Uploading...."/>');
			//$("#content").load("../listgallery.php?process_id=<?=$_GET[process_id];?>").fadeIn("slow");
			$("#da-ex-wizard-form").ajaxForm({
						target: '#preview_doc'
		}).submit();
		
			});
        }); 
/*list box*/
//<![CDATA[

var province_id = <?php echo isset($_POST['province_id']) ? intval($_POST['province_id']) : '0'; ?>;
var amphur_id = <?php echo isset($_POST['amphur_id']) ? intval($_POST['amphur_id']) : '0'; ?>;
var district_id = <?php echo isset($_POST['district_id']) ? intval($_POST['district_id']) : '0'; ?>;

function loadSelectBox(id,url,selected){
	$.get(
		url,{},function(data){
			$(id).html(data);
			if (selected!=0){
				$(id+' option[value='+selected+']').attr('selected','selected');
			}
		}
	);
}

$(function(){
	loadSelectBox(
			'#province_id',
			'../geo_combo.php?load=province',
			<?=$data[province_id];?>
	);
	loadSelectBox(
			'#amphur_id',
			'../geo_combo.php?load=amphur&province_id='+<?=$data[province_id];?>,
			<?=$data[amphur_id];?>
	);
	loadSelectBox(
			'#district_id',
			'../geo_combo.php?load=district&amphur_id='+<?=$data[amphur_id];?>,
			<?=$data[tambol_id];?>
	);
	$('#province_id').change(function(e){
		var selected = e.target.value;
		loadSelectBox(
			'#amphur_id',
			'../geo_combo.php?load=amphur&province_id='+selected,
			0
		);
		$('#district_id :not(option:first)').remove(); //add
	});
	$('#amphur_id').change(function(e){
		var selected = e.target.value;
		loadSelectBox(
			'#district_id',
			'../geo_combo.php?load=district&amphur_id='+selected,
			0
		);
	});
});
//]]>
	  // When the document loads do everything inside here ...
	  $(document).ready(function(){
		
		// When a link is clicked
		$("a.tab").click(function () {
			
			
			// switch all tabs off
			$(".active").removeClass("active");
			
			// switch this tab on
			$(this).addClass("active");
			
			// slide all content up
			$(".content_tab").fadeOut();
			
			// slide this content up
			var content_show = $(this).attr("title");
			$("#"+content_show).fadeIn();
		  
		});
	
	  });
</script>

<!--css style-->
<link href="../media/css/default.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/photo.css" type="text/css" media="screen"/>
<!--css style-->
<script src="../js/alert/jquery.min.js" type="text/javascript"></script>
<script src="../js/alert/jquery-ui.min.js"></script>
<script type="text/javascript" src="../js/script/confirm.js"></script>

<script type="text/javascript">
$(function(){
	$("a.add").click(function(){
		page=$(this).attr("href")
      $("#content").load("../listgallery.php?process_id=<?=$_GET[process_id];?>");
		return false
	})
})
</script>
<!--gallery show-->
<script src="../js/photo/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<!--upload system-->
<script type="text/javascript" src="../media/swfupload/swfupload.js"></script>
<script type="text/javascript" src="../media/js/swfupload.queue.js"></script>
<script type="text/javascript" src="../media/js/fileprogress.js"></script>
<script type="text/javascript" src="../media/js/handlers.js"></script>
<script type="text/javascript">
		var swfu;

		window.onload = function() {
			var settings = {
				flash_url : "../media/swfupload/swfupload.swf",
				upload_url: "../proses.php?up=new",
				post_params: {"PHPSESSID" : "<?=$_GET[process_id];?>"},
				file_size_limit : "100 MB",
				//file_types : "*.*",
				//file_types_description : "All Files",
		        file_types : "*.jpg;*.png;*.gif",
		        file_types_description : "Image files",
				file_upload_limit : 30,
				file_queue_limit : 0,
				custom_settings : {
					progressTarget : "fsUploadProgress",
					cancelButtonId : "btnCancel"
				},
				debug: false,

				// Button settings
				button_image_url: "../media/images/button.png",
				button_width: "116",
				button_height: "29",
				button_placeholder_id: "spanButtonPlaceHolder",
				button_text: '',
				button_text_style: ".theFont { font-size: 16; }",
				button_text_left_padding: 12,
				button_text_top_padding: 3,
				
				// The event handler functions are defined in handlers.js
				file_queued_handler : fileQueued,
				file_queue_error_handler : fileQueueError,
				file_dialog_complete_handler : fileDialogComplete,
				upload_start_handler : uploadStart,
				upload_progress_handler : uploadProgress,
				upload_error_handler : uploadError,
				upload_success_handler : uploadSuccess,
				upload_complete_handler : uploadComplete,
				queue_complete_handler : queueComplete	// Queue plugin event
			};
			swfu = new SWFUpload(settings);
	     };

	</script>
	<!-- ajax Cover -->
<script type="text/javascript" src="../js/thumbnail/jquery.form.js"></script>
<script type="text/javascript" src="../plugin/plugins/taginput/jquery.tagto.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/plugins/taginput/jquery-1.1.2.js" />
    <script type="text/javascript">
        (function($){
            $(document).ready(function(){
                $("#from").tagTo("#to");
				$("#from-inhome").tagTo("#inhome");
				$("#out-home").tagTo("#outhome");
            });    
        })(jQuery);
    </script>
</head>
<body>
<? include"../template/admin-header.php";?>
<div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt; เเก้ไขรายการร้านอาหาร</div>
<div>
    <div style="border:solid 1px #CCCCCC;width:230px;float:left;box-shadow:0px 2px 5px #D4D4D4;
-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;padding:15px;">
                                    <p>
<? include"../template/admin_manu.php";?>
                                    </p>
</div>
<div style="border:solid 1px #CCCCCC;width:700px;float:right;margin-top:0px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;">
<div style="padding:15px;">
 <div class="da-panel-content">

<form id="da-ex-wizard-form" class="da-form" method="POST" action="../administrator/editcomplete-<?=$_GET[process_id];?>" enctype="multipart/form-data">
                                    	<fieldset class="da-form-inline">
                                        	<legend>ข้อมูลทั่วไป</legend>
                                        	<div class="da-form-row">
                                            	<label>ชื่อร้านอาหาร :  <span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="res_name" value="<?=$data[res_name];?>"  class="required"/>
                                                </div>
                                            </div>
                                    	<div class="da-form-row">
                                        	<label>รายละเอียดสั้นๆ</label>
                                            <div class="da-form-item large">
                                            	<span class="formNote">บรรยาความรู้สึก เกี่ยวกับร้านอาหาร บรรยายสั้นๆ</span>
                                            	<textarea rows="auto" cols="auto" name="description"  class="required"><?=$data[description];?></textarea>
                                            </div>
                                        </div>
<div class="head-topic-form">รายละเอียดที่ตั้ง</div>
                                            <div class="da-form-row">
                                                <label>ที่งตั้ง</label>
                                                <div class="da-form-item">
                                                	<span class="formNote">เลขที่ตั้ง ซอย หมู่บ้าน/ชุมชน</span>
                                                    <textarea rows="auto" cols="auto" name="address"  class="required"><?=$data[address];?></textarea>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>จังหวัด<span class="required">*</span></label>
                                                <div class="da-form-item small">
<select id="province_id" name="province_id">
              <option value="">-- เลือกจังหวัด --</option>
          </select>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>อำเภอ/เขต<span class="required">*</span></label>
                                                <div class="da-form-item small">
<select id="amphur_id" name="amphur_id">

          </select>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>ตำบล/แขวง<span class="required">*</span></label>
                                                <div class="da-form-item small">
<select id="district_id" name="district_id">

          </select>
                                                </div>
                                            </div>
<div class="head-topic-form">ข้อมูลด้านราคา</div>
                                        	<div class="da-form-row">
                                            	<label>ช่วงราคาที่จำหน่าย * <span class="required">*</span></label>
                                                <div class="da-form-item small">
												<input type="text" name="price" value="<?=$data[price];?>" onkeyup='checkNumber(this)'  class="required" />
                                                </div>
                                            </div>
<div class="head-topic-form">ข้อมูลผู้ประกาศ/ติดต่อ</div>
                                        	<div class="da-form-row">
                                            	<label>อีเมล์ <span class="required">*</span></label>
                                                <div class="da-form-item large">
												<input type="text" name="contact_email" value="<?=$data[contact_email];?>"/>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>เบอร์โทร <span class="required">*</span></label>
                                                <div class="da-form-item large">
<input type="text" name="contact_tel" value="<?=$data[contact_tel];?>"  />
<br/><font color=red><i>กรอกหมายเลขโทรศัพท์ติดต่อ</i></font>
											
                                                </div>
                                            </div>
<div class="head-topic-form">รายละเอียดโดยรวม</div>
     	<div class="da-form-row da-form-block">
                                        	<label>รายละเอียดอื่นๆ</label>
                                            <div class="da-form-item large">
<textarea id="da-ex-wysiwyg" name="detail_long" style="width:300px;height:105px;" class="required"><?=$data[detail];?></textarea>
                                            </div>

                                </div>
                                        </fieldset>
                                    	<fieldset class="da-form-inline">
                                        	<legend>รายละเอียดเพิ่มเติม</legend>

<div class="da-form-row">
	<label>ช่วงเวลาที่เปิดร้าน<span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="open_time" value="<?=$data[open_time];?>"/>
                                                </div>
</div>
<div class="da-form-row">
	<label>ที่จอดรถ<span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="drive_place" value="<?=$data[drive_place];?>"/>
                                                </div>
												</div>
<div class="da-form-row">
	<label>รับบัตรเครดิต<span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="credit_card" value="<?=$data[credit_card];?>"/>
                                                </div></div>
<div class="da-form-row">
	<label>สำหรับกลุ่ม<span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="for_group" value="<?=$data[for_group];?>"/>
                                                </div></div>
<div class="da-form-row">
	<label>สำหรับเด็ก<span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="for_child" value="<?=$data[for_child];?>"/>
                                                </div></div>
<input rows="auto" cols="auto" name="inhome" id="inhome" type="hidden"/>
<input rows="auto" cols="auto" name="outhome" id="outhome" type="hidden"/>
<input rows="auto" cols="auto" name="facilities" id="to" type="hidden"/>
                                        </fieldset>
                                    	<fieldset class="da-form-inline">
                                        	<legend>ภาพเสนอร้านค้า</legend>
                                        	<div class="da-form-row">
                                                <div cl่ass="da-form-item large">
<p>
  <div class="tabbed_area">
    
    	
        <ul class="tabs">
            <li><a  rel="content_1" title="content_1" class="tab active">ภาพ</a></li>
        </ul>
        
        <div id="content_1" class="content_tab">
<div class="head-topic-form">ภาพประกอบ</div>
<?include"agency-gallery.php";?>
<p>กรณีคลิกที่ตั้งภาพหน้าปกเเล้ว ภาพไม่ขึ้นกรุณาคลิกอัพเดทรายการ   <font color=red>กรอบสีเเดงคือหน้าปก</font></p>

        </div>
    </div>
</p>
                                                </div>
                                            </div>
                                        </fieldset>
                                    	<fieldset class="da-form-inline">
                                        	<legend>สรุปเเละยืนยัน</legend>
                                        	<div class="da-form-row">
                                                <div class="da-form-item large">
                                                	<ul class="da-form-list inline">
                                                    	<li><input type="checkbox" name="tos" class="required" checked="checked"/> <label>ยืนยันเเละปฏิบัติตามเงื่อนไขการใช้บริการ เเละกฏระเบียบอย่างเคร่งครัด <span class="required">*</span></label></li>
                                                    </ul>
													<input type="hidden" name="action" value="save" />
                                                </div>
                                            </div>

                                        </fieldset>
<div class="da-submit-praked margin-top">

<? if($data[status]=='yes'){?>
<input type="submit" class="da-button blue" name="edit_prakad" value="เเก้ไขร้านค้า"/>
<?}else{?>
 <input type="submit" class="da-button gray" name="drap" value="บันทึกฉบับล่างเเละออก" />
<input type="submit" class="da-button blue" name="prakad" value="ลงข้อมุล"/>
<?}?>
</div>
                                    </form>

        </div>
        <div class="clear"></div>


    </div>
  </div>
        <div class="clear"></div>
  
<?include"../template/panel-footer.php";?>

</body>

</html>
