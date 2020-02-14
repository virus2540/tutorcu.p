// JavaScript Document
var ShowBoxAll=false;
var InsertCK=false;
var OrgPath="";
var RootPath="";

function OpenBoxImage(){
	ShowBoxAll=true;
	$("#MainUpImg").show();
	$("#MainUpImg").load("ajax/main.php", function(e) {
        SetOverLay();
		SetOption();
    });
}
function CloseBoxImage(){
	ShowBoxAll=false;
	InsertCK=false;
	OrgPath='';
	$("#MainUpImg").hide();
	$("#overlay").hide();
	$("div#MainUpImgAll" ).html("");
}

function SetOverLay(){
	var docHeight = $(window).height();
	var docWidth = $(window).width();
	
	$("#overlay").height(docHeight)
	$("#overlay").show();
	
	$("#MainUpImg").height(docHeight-100);
	$("#MainUpImg").width(docWidth-100);
}

function SetOption(){
	if(OrgPath != ""){
		var tmpImg = new Image();
		tmpImg.src=OrgPath;
		$(tmpImg).on('load',function(){
		  orgWidth = tmpImg.width;
		  orgHeight = tmpImg.height;
		  $("#TmpSize").text(orgWidth + 'X' + orgHeight);
		});
		
		var fileNameIndex = OrgPath.lastIndexOf("/") +1 ;
		var Driname = OrgPath.substr(0,fileNameIndex);
		var Filename = OrgPath.substr(fileNameIndex);
	
		$("#ShowTmpImg").attr("src",Driname+"_thumbs/"+Filename);
		$("#TmpName").text(Filename);
		$(".txtOption").show();
	}
}

$( window ).resize(function() {
	if(ShowBoxAll==true)SetOverLay();
});
//================================READY=========================
		$(document).ready(function() {
//================================READY=========================

$('body').append('<div id="root_path"></div>');
$("#root_path").hide();
$("#root_path").load("ajax/get_root.php", function(e) {
	RootPath=$("#root_path").text();
});
		



$("#AddMainImg").click(function(e) {
	OpenBoxImage();
	OrgPath=$("#ImgMain").val();
	if(OrgPath!="")OrgPath=RootPath+OrgPath;
});

$("#AddImgCk").click(function(e) {
	InsertCK=true;
	OpenBoxImage();
});
//================================END_READY=========================
		});
//================================END_READY=========================
$( ".btnClose" ).live( "click", function() {//กดปุ่ม ลบ
	CloseBoxImage();	
});

$( "#overlay" ).live( "click", function() {//กดปุ่ม ลบ
	CloseBoxImage();	
});

$( ".ShowImg" ).live( "click", function() {//กดปุ่ม ลบ
	srcSelect=$(this).attr("src");
	srcName=$(this).attr("name");
	OrgPath=$(this).attr("path_org");

	var tmpImg = new Image();
	tmpImg.src=OrgPath;
	$(tmpImg).on('load',function(){
	  orgWidth = tmpImg.width;
	  orgHeight = tmpImg.height;
	  $("#TmpSize").text(orgWidth + 'X' + orgHeight);
	});

	$("#ShowTmpImg").attr("src",srcSelect);
	$("#TmpName").text(srcName);
	$(".txtOption").show();

	$( ".ShowImg").removeClass("SelectImg");
	$(this).addClass("SelectImg");
});

$( "#TmpDel" ).live( "click", function() {//กดปุ่ม ลบ
	if(confirm('คุณต้องการลบใช่หรือไม่ ?')){
		file_org=OrgPath;
		file_tmp=$("#ShowTmpImg").attr("src");
		$.post( "ajax/del_img.php",{file_org:file_org , file_tmp:file_tmp})
		.done(function( data ) {
			$("#MainUpImgAll").load("ajax/list_img.php");
			$("#ShowTmpImg").attr("src","images/sp.gif");
			$(".txtOption").hide();
		});	
	}
});

$( "#btnSelect" ).live( "click", function() {//กดปุ่ม ลบ
	if(InsertCK==true){
		html='<img src="'+OrgPath+'">';
		CKEDITOR.instances.detailBox.insertHtml(html);
	}else{
		
		var imgIndex = OrgPath.lastIndexOf("/") +1 ;
		var imgName = OrgPath.substr(imgIndex);
		$("#ImgMain").val(imgName);
		
		//$("#ImgMain").val(OrgPath);
		$(".ImgMain").attr("src",OrgPath);
	}
	CloseBoxImage();
});

/*
$( ".btnNomPage" ).live( "click", function() {//กดปุ่ม ลบ
	noPage=$(this).attr("href");
	$("div#MainUpImgAll" ).load("ajax/list_img.php?no="+noPage, function(e) {
		$('div#MainUpImgAll').animate({
			scrollTop: 0
		}, 800);
    });
	return false;
});
*/
