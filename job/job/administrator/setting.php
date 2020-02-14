<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
$strTable = "tb_settings";
$strCondition = "config_id='1' ";
$data = fncSelectRecord($strTable,$strCondition);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ตั้งค่าเว็บไซต์</title>
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
<? include"../template/admin-header.php";?>
<div>


  <div class="wapper">
    <div class="bledcrum"><a href="<?=$url_root;?>">หน้าหลัก</a> &gt;ตั้งค่าเว็บไซต์</div>
<div>
    <div class="left_menu">
<? include"../template/admin_manu.php";?>
</div>
    <div class="right_menu">
<div style="padding:15px;">
<div class="da-panel-content">
<h2>ตั้งค่าเว็บไซต์</h2>
<p>กำหนดค่าต่างๆบนเว็บไซต์ของท่าน</p>
  								<div class="clear"></div>
<div id="da-ex-tabs">
                                    <ul>
                                        <li><a href="#tabs-1">ตั้งค่าเว็บไซต์</a></li>
                                    </ul>
<div id="tabs-1">
 <div class="da-panel-content">

<form class="da-form" method="POST" action="./setting-complete.php" enctype="multipart/form-data">
<div class="head-topic-form">ตั้งค่าทั่วไป</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>title</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="title" value="<?=$data[title];?>" />
                                                </div>
                                            </div>
									</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>กำหนด keyword</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="keyword" id="keyword"  value="<?=$data[keyword];?>" />

                                                </div>
<span class="formNote">หมายเหตุ : เช่น  สั่งอาหาร, ร้านอาหาร, เเนะนำร้านอาหาร</span>

                                            </div>
											</div>
                                    	<div class="da-form-inline">
                                            <div class="da-form-row">
                                                <label>กำหนด Description</label>
                                                <div class="da-form-item large">
                                                    <input type="text" name="description" id="description"  value="<?=$data[description];?>" />

                                                </div>
</div>
											</div>
 <div class="da-form-row">
                                                <label>อีเมล์ผู้ดูเเลระบบ</label>
                                                <div class="da-form-item large">
 <input name="email" type="text" id="email"  value="<?=$data[email];?>"/>

                                                </div>
                                            </div>
                                            <div class="da-form-row">
                                                <label>Domain</label>
                                                <div class="da-form-item large">
 <input name="domain" type="text" id="domain"  value="<?=$data[domain];?>"/>
                                                </div>
                                            </div>
                                        	
<div class="da-submit-praked margin-top">
<input type="hidden" name="action" value="save" />
<input type="submit" class="da-button blue" name="prakad" value="บันทึกการเปลื่อนเเปลงข้อมูล"/>
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
