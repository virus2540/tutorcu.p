<?
session_start();
include"../system/config.inc.php";
include"../system/function.php";
include"../system/session-admin.php";
include"../system/thdate_function.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมุลงานติวเตอร์</title>
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

<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="../plugin/jui/js/jquery-ui-1.8.20.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/jui/css/jquery.ui.all.css" media="screen" />


<!-- jQuery-UI JavaScript Files -->
<script type="text/javascript" src="../plugin/jui/js/jquery-ui-1.8.20.min.js"></script>
<script type="text/javascript" src="../plugin/jui/js/jquery.ui.timepicker.min.js"></script>
<script type="text/javascript" src="../plugin/jui/js/jquery.ui.touch-punch.min.js"></script>
<link rel="stylesheet" type="text/css" href="../plugin/jui/css/jquery.ui.all.css" media="screen" />

<!--css style-->
<style type="text/css">
.success-main{width:100%; margin:auto;}
.success{width:300px;height:100px;margin:auto;float:center;font-size:12px;border:solid 1px #CCCCCC;text-align:center;padding:20px;box-shadow:0px 2px 5px #D4D4D4;-moz-box-shadow:0px 2px 5px #D4D4D4;
-webkit-box-shadow:0px 2px 5px #D4D4D4;}
.success-progress{width:150px;height:10px;background:url(../images/loading30.gif) no-repeat;margin:auto}
.success h2{color:#0080C0}
</style>
<style type="text/css">
html { height: 100% }
body { 
	height:100%;
	margin:0;padding:0;
	font-family:tahoma, "Microsoft Sans Serif", sans-serif, Verdana;
	font-size:12px;
}
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:600px;float:left;
	height:300px;
	margin:auto;
	margin-top:50px;
}
</style>
<script type="text/javascript" src="../js/script/googlemap.js"></script>
<script type="text/javascript">
var geocoder; // กำหนดตัวแปรสำหรับ เก็บ Geocoder Object ใช้แปลงชื่อสถานที่เป็นพิกัด
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var my_Marker; // กำหนดตัวแปรสำหรับเก็บตัว marker
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
function initialize() { // ฟังก์ชันแสดงแผนที่
	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	geocoder = new GGM.Geocoder(); // เก็บตัวแปร google.maps.Geocoder Object
	// กำหนดจุดเริ่มต้นของแผนที่
	var my_Latlng  = new GGM.LatLng(13.761728449950002,100.6527900695800);
	var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
	var my_DivObj=$("#map_canvas")[0];
	// กำหนด Option ของแผนที่
	var myOptions = {
		zoom: 13, // กำหนดขนาดการ zoom
		center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
		mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
	};
	map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
	
	my_Marker = new GGM.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
		position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
		map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
		draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
		title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
	});
	
	// กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร	
	GGM.event.addListener(my_Marker, 'dragend', function() {
		var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
        map.panTo(my_Point); // ให้แผนที่แสดงไปที่ตัว marker		
        $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
        $("#lon_value").val(my_Point.lng());  // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
        $("#zoom_value").val(map.getZoom());  // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu			
	});		

	// กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
	GGM.event.addListener(map, 'zoom_changed', function() {
		$("#zoom_value").val(map.getZoom());   // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value 	
	});

}
$(function(){
	// ส่วนของฟังก์ชันค้นหาชื่อสถานที่ในแผนที่
	var searchPlace=function(){ // ฟังก์ชัน สำหรับคันหาสถานที่ ชื่อ searchPlace
		var AddressSearch=$("#namePlace").val();// เอาค่าจาก textbox ที่กรอกมาไว้ในตัวแปร
		if(geocoder){ // ตรวจสอบว่าถ้ามี Geocoder Object 
			geocoder.geocode({
				 address: AddressSearch // ให้ส่งชื่อสถานที่ไปค้นหา
			},function(results, status){ // ส่งกลับการค้นหาเป็นผลลัพธ์ และสถานะ
      			if(status == GGM.GeocoderStatus.OK) { // ตรวจสอบสถานะ ถ้าหากเจอ
					var my_Point=results[0].geometry.location; // เอาผลลัพธ์ของพิกัด มาเก็บไว้ที่ตัวแปร
					map.setCenter(my_Point); // กำหนดจุดกลางของแผนที่ไปที่ พิกัดผลลัพธ์
					my_Marker.setMap(map); // กำหนดตัว marker ให้ใช้กับแผนที่ชื่อ map					
					my_Marker.setPosition(my_Point); // กำหนดตำแหน่งของตัว marker เท่ากับ พิกัดผลลัพธ์
					$("#lat_value").val(my_Point.lat());  // เอาค่า latitude พิกัดผลลัพธ์ แสดงใน textbox id=lat_value
					$("#lon_value").val(my_Point.lng());  // เอาค่า longitude พิกัดผลลัพธ์ แสดงใน textbox id=lon_value 
					$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_valu	 							
				}else{
					// ค้นหาไม่พบแสดงข้อความแจ้ง
					alert("ผลการค้นหาไม่สำเร็จ กรุณาค้นหาใหม่ หรือพิมพ์ชื่อสถานทีให้ถูกต้อง: " + status);
					$("#namePlace").val("");// กำหนดค่า textbox id=namePlace ให้ว่างสำหรับค้นหาใหม่
				 }
			});
		}		
	}
	$("#SearchPlace").click(function(){ // เมื่อคลิกที่ปุ่ม id=SearchPlace ให้ทำงานฟังก์ฃันค้นหาสถานที่
		searchPlace();	// ฟังก์ฃันค้นหาสถานที่
	});
	$("#namePlace").keyup(function(event){ // เมื่อพิมพ์คำค้นหาในกล่องค้นหา
		if(event.keyCode==13){	// 	ตรวจสอบปุ่มถ้ากด ถ้าเป็นปุ่ม Enter ให้เรียกฟังก์ชันค้นหาสถานที่
			searchPlace();		// ฟังก์ฃันค้นหาสถานที่
		}		
	});

});
$(function(){
	// โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
	// ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
	// v=3.2&sensor=false&language=th&callback=initialize
	//	v เวอร์ชัน่ 3.2
	//	sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
	//	language ภาษา th ,en เป็นต้น
	//	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize	
	$("<script/>", {
	  "type": "text/javascript",
	  src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
	}).appendTo("body");	
});

</script>
<script>
function clickButton()
  {
  document.getElementById('SearchPlace').click()
  }
</script>
<script type="text/javascript" src="../js/script/confirm.js"></script>
</head>
<body>
<? include"../template/admin-header.php";?>
<div class="wapper">
    <div id="nav" ><a href="<?=$url_root;?>">หน้าหลัก</a> &gt; ข้อมูลร้านอาหาร</div>
<div>
    <div style="border:solid 1px #CCCCCC;width:230px;float:left;background:#ffffff;padding:15px;">
<? include"../template/admin_manu.php";?>
</div>
<div style="width:700px;float:right;margin-top:0px;background:#ffffff;">
<div style="padding:15px;">
 <div class="da-panel-content">

<form id="da-ex-wizard-form" class="da-form" method="POST" action="../administrator/save-job.php?process=<?=$_GET["process"];?>" enctype="multipart/form-data">
                                    	<fieldset class="da-form-inline">
                                        	<legend>ข้อมูลทั่วไป</legend>
                                        	<div class="da-form-row">
                                            	<label>วิชา :  <span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="subject_name" class="required"/>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>รหัสการสอน :  <span class="required">*</span></label>
                                                <div class="da-form-item small">
                                                	<input type="text" name="code_tutor" class="required"/>
                                                </div>
                                            </div>
                                        	
                                    	<div class="da-form-row">
                                        	<label>สถานที่สอน</label>
                                            <div class="da-form-item large">
                                            	<span class="formNote">สถานที่สอนที่ไหน</span>
                                            	<textarea rows="auto" cols="auto" name="place_tutor" class="required"></textarea>
                                            </div>
                                        </div>
<div class="head-topic-form">รายละเอียด</div>
                                        	
                                            </div>  	
                                        	<div class="da-form-row">
                                            	<label>วันที่ต้องการเรียน :  <span class="required">*</span></label>
                                                <div class="da-form-item large">
                                                	<input type="text" name="day_tutor" class="required"/>
                                                </div>
                                            </div>
                                       
                                        	
<div class="head-topic-form">ข้อมูลด้านราคา</div>
                                        	<div class="da-form-row">
                                            	<label>ค่าสอน <span class="required">*</span></label>
                                                <div class="da-form-item small">
												<input type="text" name="price"/>
                                                </div>
                                            </div>
                                        	<div class="da-form-row">
                                            	<label>ค่าประกัน <span class="required">*</span></label>
                                                <div class="da-form-item small">
												<input type="text" name="price_garantee"/>
                                                </div>
                                            </div>




                <!--  <form> เก็บข้อมูลสำหรับนำไปบันทึกลงฐานข้อมูล หรือนำไปใช้อื่นๆ-->

			
<div class="head-topic-form">อื่นๆ</div>

                                    	<div class="da-form-row">
                                        	<label>หมายเหตุ</label>
                                            <div class="da-form-item large">
                                            	<span class="formNote">อื่นๆ</span>
                                            	<textarea rows="auto" cols="auto" name="note"></textarea>
                                            </div>
                                        </div>
                                        	<div class="da-form-row">
<div class="da-submit-praked margin-top">
													<input type="hidden" name="action" value="save" />
<input type="submit" class="da-button gray" name="drap" value="บันทึกข้อมูลฉบับล่างเเละออก" />
<input type="submit" class="da-button blue" name="prakad" value="โพสข้อมูลทันที"/>
</div>
                                            </div>
                                        </fieldset>
                                    </form>

        </div>
        <div class="clear"></div>


    </div>
  </div>
        <div class="clear"></div>
  
<?include"../template/panel-footer.php";?>

</body>
</html>
