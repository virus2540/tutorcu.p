// JavaScript Document
/*
	$(function() {
		var percent = $('#Progressbar');
		$('#FromUpload').ajaxForm({
			beforeSend: function() {
				var percentVal = '0%';
				percent.show();
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				percent.html(percentVal);
			},
			complete: function(xhr) {
				percent.hide();
			}
		});
	}); 
*/

function SetFromUpload(){
		var percent = $('#Progressbar');
		$('#FromUpload').ajaxForm({
			beforeSend: function() {
				var percentVal = '0%';
				percent.show();
				percent.html(percentVal);
			},
			uploadProgress: function(event, position, total, percentComplete) {
				var percentVal = percentComplete + '%';
				percent.html(percentVal);
			},
			complete: function(xhr) {
				percent.hide();
				var msg=xhr.responseText;
				if(msg!="") alert(msg);
				$("#MainUpImgAll").load("ajax/list_img.php");
			}
		});
}
//========================================================

$( "#filesMulti" ).live( "change", function() {
	SetFromUpload();
	$('#SubmitFromUpload').click();
});

$( "#btnUpload" ).live( "click", function() {
	$('#filesMulti').trigger('click'); 
	return false;
});
