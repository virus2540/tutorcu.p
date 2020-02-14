<?
session_start();
include "../system/config.inc.php";
include "../system/function.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>สมัครสมาชิก</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/2012.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/skin/default.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/skin/reset.css" media="screen" />
<link type='text/css' href='../css/basic.css' rel='stylesheet' media='screen' />
<link type='text/css' href='../css/dropdownmenu.css' rel='stylesheet' media='screen' />
<script src="../js/lib/jquery.js" type="text/javascript"></script>
<script src="../js/lib/jquery.validate.js" type="text/javascript"></script>
<script src="../js/font/cufon-yui.js" type="text/javascript"></script>
<script src="../js/font/supermarket_400.js" type="text/javascript"></script>
<script type="text/javascript">
		 Cufon.replace('.head_manu,h2 span');
 
</script>
<script type="text/javascript">
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
</script>
<SCRIPT type="text/javascript">
pic1 = new Image(16, 16); 
pic1.src = "loader.gif";

$(document).ready(function(){

$("#username").change(function() { 

var usr = $("#username").val();

if(usr.length >= 4)
{
$("#status").html('<img src="../images/loader.gif" align="absmiddle">&nbsp;Checking availability...');

    $.ajax({  
    type: "POST",  
    url: "../check.php",  
    data: "username="+ usr,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#username").removeClass('object_error'); // if necessary
		$("#username").addClass("object_ok");
		$(this).html('&nbsp;<div class=check_ok>สามารถใช้งานได้</div>');
	}  
	else  
	{  
		$("#username").removeClass('object_ok'); // if necessary
		$("#username").addClass("object_error");
		$(this).html(msg);
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status").html('<font color="red">The username should have at least <strong>4</strong> characters.</font>');
	$("#username").removeClass('object_ok'); // if necessary
	$("#username").addClass("object_error");
	}

});

});

</SCRIPT>
<style type="text/css">
	.head_manu { font-size:25px; color: #000}
	h2 span{ font-size:18px; color: #fff}
	h2 span a:hover{ font-size:18px; color: #FF9900}
	h1 { font-size:30px; color: #666666;margin-bottom:10px }
	h1 span { color: #A0A0A4}
	h2 { font-size:20px; }
</style>
</head>

<body>
<? include"../template/header.php";?>
<div id="wrapper">
<div class="contentarea">

 
	<div class="register  propertydetails_right">
    
    <h1>ลงทะเบียน</h1>	
<div class="clear"></div>
<div class="agency_alert">สมาชิกแบบนายหน้า ของคุณจะได้ถูกเปิดให้ใช้งานเมื่อชำระเงินแล้วเท่านั้น</div>
<div class="clear"></div>
<div class="register">
<script type="text/javascript">

$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();
	
	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			na_surname: "required",
			name: "required",
			ct_captcha: "required",
			username: {
				required: true,
				minlength: 2
			},
			name: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
			},
			agree: "required"
		},
		messages: {
			na_surname: "<div class=vaild>กรุณากรอก ชื่อนามสุกลเจ้าของหอพัก</div>",
			name: "<div class=vaild>กรุณากรอกชื่อ-สกุล</div>",
			ct_captcha:"<div class=vaild>กรุณากรอกรหัสความปลอดภัยด้วย</div>",
			username: {
				required: "<div class=vaild>ยังไม่ได้กรอกชื่อผู้ใช้งาน</div>",
				minlength: "<div class=vaild>ชื่อผู้ใช้งานไม่ควรต่ำกว่า 2 ตัวอักษร</div>"
			},
			password: {
				required: "<div class=vaild>กรุณากรอกรหัสผ่าน</div>",
				minlength: "<div class=vaild>รหัสผ่านไม่ควรต่ำกว่า 5 ตัวอักษร</div>"
			},
			confirm_password: {
				required: "<div class=vaild>กรุณากรอกยืนยันรหัสผ่าน</div>",
				minlength: "<div class=vaild>รหัสผ่านควรไม่ต่ำกว่า 5 ตัวอักษร</div>",
				equalTo: "<div class=vaild>กรุณากรอกรหัสผ่านให้ตรงกัน</div>"
			},
			email: "<font color=red><div class=vaild>กรอกอีเมล์ให้ถูกต้องด้วย</div></font>",
			agree: "<font color=red><div class=vaild>ยอมรับเงื่อนไขการใช้งาน</div></font>"
		}
	});
	
	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		if(firstname && lastname && !this.value) {
			this.value = firstname + "." + lastname;
		}
	});
	
	//code to hide topic selection, disable for demo
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	});
});
</script>
<form class="cmxform" id="signupForm" method="post" action="../usersystem/action-register" enctype="multipart/form-data">
  <table width="550" cellspacing="3">
    <tr>
      <td width="26%" class="tb_registerhead"><div align="right"><span class="contacttext">ชื่อผู้ใช้งาน</span></div></td>
      <td width="74%" class="tb_register">
        <input name="username" type="text" id="username" class="form_text" style="width:300px;"/><div id="status"></div></td>
    </tr>
    <tr>
      <td class="tb_registerhead"><div align="right"><span class="contacttext">รหัสผ่าน</span></div></td>
      <td class="tb_register">
        <input name="password" type="password" id="password"  class="form_text" style="width:300px;"/></td>
    </tr>
    <tr>
      <td class="tb_registerhead"><div align="right"><span class="contacttext">ยืนยันรหัสผ่าน</span></div></td>
      <td class="tb_register"><span class="contactformfield">
        <input name="confirm_password" type="password" id="confirm_password" class="form_text" style="width:300px;"/>
      </span></td>
    </tr>
    <tr>
      <td class="tb_registerhead"><div align="right"><span class="contacttext">อีเมล์</span></div></td>
      <td class="tb_register"><span class="contactformfield">
        <input name="email" type="text" id="email"  class="form_text" style="width:300px;"/>
      </span></td>
    </tr>

    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="tb_registerhead">
        <div align="right">ชื่อ-สกุล</div></td>
      <td class="tb_register"><input name="name" type="text" class="form_text" id="name" style="width:300px;" />      </td>
    </tr>
    <tr>
      <td class="tb_registerhead">
        <div align="right">ที่อยู่</div></td>
      <td><textarea name="address" style="width:300px;height:100px;" id="address" class="form_text"></textarea></td>
    </tr>
    <tr>
      <td height="36" class="tb_registerhead"><div align="right">จังหวัด</div></td>
      <td height="36"><select id="province_id" name="province_id" class="dropdown">
          <option>-- เลือกจังหวัด --</option>
      </select></td>
    </tr>
    <tr>
      <td height="36" class="tb_registerhead"><div align="right">อำเภอ/เขต</div></td>
      <td height="36" ><select id="amphur_id" name="amphur_id" class="dropdown">
          <option value="0">-- เลือกอำเภอ --</option>
      </select></td>
    </tr>
    <tr>
      <td height="36" class="tb_registerhead"><div align="right">ตำบล</div></td>
      <td height="36"><select id="district_id" name="district_id" class="dropdown">
          <option value="0">-- เลือกตำบล --</option>
      </select></td>
    </tr>
        <tr>
      <td class="tb_registerhead"><div align="right">ถนน</div></td>
      <td class="tb_register"><input name="road" type="text" class="form_text" id="road" style="width:300px;" /></td>
    </tr>
    <tr>
      <td class="tb_registerhead"><div align="right">รหัสไปรษณีย์</div></td>
      <td class="tb_register"><input name="zipcode" type="text" class="form_text" id="zipcode" style="width:300px;" /></td>
    </tr>
    <tr>
      <td class="tb_registerhead"><div align="right">เบอร์โทรศัพท์</div></td>
      <td class="tb_register"><input name="tel" type="text" class="form_text" id="tel" style="width:300px;" /></td>
    </tr>
    
    <tr>
      <td class="tb_registerhead"> <div align="right">ชื่อองค์กรหรือบริษัท </div></td>
      <td class="tb_register"><input name="org" type="text" class="form_text" id="org" style="width:300px;" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>
</td>
    </tr>
    <tr>
      <td></td>
      <td> <img id="siimage" style="border: 1px solid #000; margin-right: 15px" src="../security-code/securimage_show.php?sid=<?php echo md5(uniqid()) ?>" alt="CAPTCHA Image" align="left" />
    <object type="application/x-shockwave-flash" data="./securimage_play.swf?bgcol=#ffffff&amp;icon_file=../security-code/images/audio_icon.png&amp;audio_file=./securimage_play.php" height="32" width="32">
    <param name="movie" value="../security-code/securimage_play.swf?bgcol=#ffffff&amp;icon_file=./images/audio_icon.png&amp;audio_file=./securimage_play.php" />
    </object>
    &nbsp;
    <a tabindex="-1" style="border-style: none;" href="#" title="Refresh Image" onclick="document.getElementById('siimage').src = '../security-code/securimage_show.php?sid=' + Math.random(); this.blur(); return false"><img src="../security-code/images/refresh.png" alt="Reload Image" height="32" width="32" onclick="this.blur()" align="bottom" border="0" /></a><br />     <?php echo @$_SESSION['ctform']['captcha_error'] ?><br/>
    <input type="text" name="ct_captcha" size="12" maxlength="8" class="form_text"/></td>
    </tr>
	    <tr>
      <td><div align="right"><span class="contacttext"><strong>ยอมรับเงื่อนไข</strong></span> </div></td>
      <td><p class="contacttext_detail">
  <input name="agree" type="checkbox" value=""/> 
ท่านตกลงเเละยอมรับเงื่อนไขการใช้บริการ</p></td>
    </tr>
    <tr>
      <td><div align="right"></div></td>
      <td>
<input type="submit" class="btnConfirm" value="สมัครสมาชิก &raquo;" /> </td>
    </tr>
  </table>
</form>

</div>
 <div class="fix"></div>
</div>
	<div class="sidebar_right_register sidebar_right">

 <div class="widget">
  <li class="blockright">
  <h4>สิทธิีพิเศษสำหรับสมาชิก</h4>
กกกก
  </li>
<div class="clear"></div>
					

</div>				
</div>
    
<div class="clear"></div>    

    </div>
<? include"../template/footer.php";?>
</body>
</html>		