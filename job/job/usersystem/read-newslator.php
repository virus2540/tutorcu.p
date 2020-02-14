<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session.php";
$strTable = "members";
$strCondition = "userID='1' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>อัพเกรด เเพคเก็ต</title>
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
</head>
<body>
<? include"../template/panel-header.php";?>
<div>


  <div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a><span style='color:#dd0000'>&raquo;</span>อัพเกรดเเพคเก็ต</div>
<div>
    <div style="border:solid 1px #CCCCCC;width:230px;float:left;box-shadow:0px 2px 5px #D4D4D4;
-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;padding:15px;">
<p>
<div class="mem-avatar"></div>
<div class="mem-detail">
<b>ยินดีต้อนรับ</b> Mr. ยุทธนัย ไจดี
<a href="<?=$siteurl;?>usersystem/my">แก้ไขบัญชี</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?=$siteurl;?>usersystem/my">แก้ไขข้อมูลส่วนตัว</a>
</div>
</p>
<div class="clear"></div>
<p><strong>หมดอายุ: 21 สิงหาคม 2556</strong></p>
                                    <div class="alert-warning">
ต้องการอัพเกรดสถานะสมาชิกธรรมดา เป็น premuim คลิกดูรายละเอียดที่นี่

                                    </div>
<div class="upgrade">อัพเกรดสถานะ</div><div class="customer_service">ฝ่ายบริการลูกค้า</div>
<div class="clear"></div>
                                    <p>
                                        <input type="button" class="da-button gray large" value="กลับไปหน้าเเรก" onclick="window.location='index.php'" />
                                        <input type="button" class="da-button blue large" value="ออกจากระบบ" />
                                    </p>
</div>
<div style="border:solid 1px #CCCCCC;width:700px;float:right;margin-top:0px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;background:#ffffff;">
<div style="padding:15px;">
<div class="da-panel-content">
<h2>อัพเกรดเเพคเก็ต</h2>
<p>อัพเกรดระดับสมาชิกของคุณเพื่อจะได้สิทธิประโยชน์มากขึ้นและมีเครื่องมือที่ดีที่สุดเพื่อช่วยทางการตลาดอสังหาฯ ของคุณเอง</p>
  								<div class="clear"></div>
<div id="da-ex-tabs">

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
