// JavaScript Document


//================================READY=========================
		$(document).ready(function() {
//================================READY=========================
$(".BoxCart").hide();
$(".BoxLogin").hide();


$(".BoxBtnSwap1").click(function(e) {
	HidBoxCart();
});

$(".BoxBtnSwap2").click(function(e) {
    ShowBoxCart();
});

$(".BoxBtnNext").click(function(e) {
	if($("#chkCart").length>0){
		alert("ต้องเลือกสินค้าในตะกร้าก่อน");
		HidBoxCart();
		return false;
	}
	ssid=$(this).attr("rel");
	sendPrice = $( "#selectSendPrice" ).val();
	if(sendPrice=="0"){
		alert("เลือกตำบลก่อน");
		return false;
	}
	if(ssid != "" ){
		window.location="login.php";
	}else{
		ShowBoxLogin();
	}
});

$(".LoginClick1").click(function(e) {
	username=$("#username").val()
	password=$("#password").val()
	if(username=='' || password==''){
		alert("กรอกข้อมูลให้ครบก่อน");
	}else{
		SubmitLogin='Submit';
		$.post( "login.php", {username: username, password:password, SubmitLogin: SubmitLogin})
		.done(function( data ) {
			if(data=="OK"){
				window.location="login.php";
			}else{
				alert("ข้อมูลไม่ถูกต้อง");
			}
			//ShowBoxCart();
		});	
		//$("#LoginForm").submit();
	}
});

$(".LoginClick2").click(function(e) {
    HidBoxLogin();
});

$(".btnSelectFood").click(function(e) {
	id=$(this).attr("rel");
	
	$.post( "cart.php?ac=order&ProductID="+id)
	.done(function( data ) {
		ShowBoxCart();
	});	
});

$("#SendPrice").change(function(e) {
    ValSend=parseInt($(this).val());
    ValTotal=parseInt($(this).attr("rel"));
	
	Sum = ValSend+ValTotal;
	
	$("#txtSend").text(ValSend);
	$("#txtSend").text(ValSend);
	$("#txtTotal").text(Sum);
	$("#SumPrice").text(Sum);
});

$("#SubmitCheckOut").click(function(e) {
    if($("#SendPrice").val()==0){
		alert("ต้องเลือกตำบลก่อน");
		return false;
	}
});
//================================END_READY=========================
		});
//================================END_READY=========================

$( ".btnDelFood" ).live( "click", function() {//กดปุ่ม ลบ
	Line=$(this).attr("rel");
	
	$.post( "cart.php?ac=del&Line="+Line)
	.done(function( data ) {
		ShowBoxCart();
	});	
});

$( ".btnDecFood" ).live( "click", function() {//กดปุ่ม -
	Line=$(this).attr("rel");

	$.post( "cart.php?ac=Dec&Line="+Line)
	.done(function( data ) {
		ShowBoxCart();
	});	
});

$( ".btnIncFood" ).live( "click", function() {//กดปุ่ม +
	Line=$(this).attr("rel");
	
	$.post( "cart.php?ac=Inc&Line="+Line)
	.done(function( data ) {
		ShowBoxCart();
	});	
});

$( "#selectSendPrice" ).live( "change", function() {//กดปุ่ม +
	SendPrice=$(this).val();
	
	$.post( "cart.php?SendPrice="+SendPrice)
	.done(function( data ) {
		ShowBoxCart();
	});	
});


function ShowBoxCart(){
	$(".DivTableCart").load("cart.php");
	$(".BoxCart").fadeIn();
	$(".BoxBtnSwap2").fadeOut();
}

function HidBoxCart(){
	$(".BoxCart").fadeOut();
	$(".BoxBtnSwap2").fadeIn();
}

function ShowBoxLogin(){
	$(".BoxLogin").fadeIn();
}

function HidBoxLogin(){
	$(".BoxLogin").fadeOut();
}