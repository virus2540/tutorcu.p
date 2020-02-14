<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
$strTable = "members";
$strCondition = "userID='$_GET[user_id]'";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลสมาชิก</title>
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
			province_id
	);
	loadSelectBox(
			'#amphur_id',
			'../geo_combo.php?load=amphur&province_id='+province_id,
			amphur_id
	);
	loadSelectBox(
			'#district_id',
			'../geo_combo.php?load=district&amphur_id='+amphur_id,
			district_id
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
</head>
<body>
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;เพิ่มข้อมูลสมาชิก</div>
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
<h2>เพิ่มข้อมูลสมาชิก</h2>
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">บัญชีสมาชิก</a></li>
                                    </ul>
<div id="tabs-1">
 <div class="da-panel-content">

<form class="da-form" method="POST" action="./member-add-complete.php?action=yes" enctype="multipart/form-data">
<div class="head-topic-form">ข้อมูลเข้าใช้ระบบ</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>ชื่อในระบบ</label>
                                                <div class="da-form-item small">
                                                    <input type="text" name="username"/>
                                                </div>
                                            </div>
									</div>
 <div class="da-form-row">
                                                <label>รหัสผ่านใหม่</label>
                                                <div class="da-form-item small">
 <input name="password" type="text" id="password" value=""/>

                                                </div>
                                            </div>
<div class="head-topic-form">ข้อมูลส่วนตัว</div>
                                            <div class="da-form-row">
                                                <label>ชื่อ-สกุล</label>
                                                <div class="da-form-item">
                                                    <input type="text" name="name"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>แต้มสะสม</label>
                                                <div class="da-form-item">
                                                	<span class="formNote">แต้มสะสมคือ 1 เเต้มต่อ 1 บาท</span>
                                                    <input type="text" name="point"/>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>อีเมล์</label>
                                                <div class="da-form-item">
                                                	<span class="formNote">กรอกอีเมล์</span>
                                                    <input type="text" name="email"/>
                                                </div>
                                            </div>
<div class="head-topic-form">ข้อมูลผู้ติดต่อ</div>
 <div class="da-form-row">
                                                <label>ที่อยู่</label>
                                                <div class="da-form-item">
                                                	<span class="formNote">กรอกข้อมูลตามความเป็นจริง</span>
                                                    <textarea rows="auto" cols="auto" name="address"></textarea>
                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>หมายเลขโทรศัพท์</label>
                                                <div class="da-form-item">
                                                	<span class="formNote">ใช้เฉพาะตัวเลขเท่านั้น</span>
                                                    <input type="text" name="tel"/>
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
                                        	<div class="da-form-row">
                                            	<label>ถนน: <span class="required">*</span></label>
                                                <div class="da-form-item small">
                                                	<input type="text" name="road" class="required"/>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>รหัสไปรษณี <span class="required">*</span></label>
<div class="da-form-item small"><input type="text" name="zipcode" class="required" onkeyup='checkNumber(this)'/>
                                                </div>
                                            </div>
<div class="da-submit-praked margin-top">
	<input type="hidden" name="action" value="save" />
<input type="submit" class="da-button blue" name="prakad" value="บันทึกข้อมูลสมาชิก"/>
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
