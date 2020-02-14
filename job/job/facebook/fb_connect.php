<?php
session_start(); // กำหนดไว้ กรณีอาจได้ใช้ตัวแปร session
include("inc/facebook.php"); //  เรียกใช้งานไฟล์ php-sdk สำหรับ facebook
//
$facebook = new Facebook(array(
  'appId'  => '131714193582723', // appid ที่ได้จาก facebook
  'secret' => '0be33a31a2f9bb04cc939fac5c5b87d8',  // app secret ที่ได้จาก facebook
  'fileUpload' => true, // เปิดใช้ในส่วนของการอัพโหลดรูปได้
  'cookie' => true, // อนุญาตใช้งาน cookie  
));
// สร้างฟังก์ชันไว้สำหรัดทดสอบ การแสดงผลการใช้งาน
function pre($varUse){
	echo "<pre>";
	print_r($varUse);
	echo "</pre>";
}
// Get User ID
$fb_user = $facebook->getUser();
if($fb_user){
  try{
    // Proceed knowing you have a logged in user who's authenticated.
    $fb_userData=$facebook->api('/me');
  }catch(FacebookApiException $e) {
    error_log($e);
    $user=null;
  }
}
if(isset($_GET['logout'])){ // ทำการ logout อย่างสมบูรณ์
	$facebook->destroySession(null); 	// ล่างค่า session ของ facebook
session_destroy();
	//header("Location:".$_SERVER['PHP_SELF']); //ลิ้งค์ไปหน้าที่ต้องการเมื่อ logout เรียบร้อยแล้ว
echo "<META HTTP-EQUIV=Refresh CONTENT=\"0; URL=http://www.tutorcu.com/job/facebook/test_login.php\">";
}
// Login or logout url will be needed depending on current user state.
if($fb_user){
  $logoutUrl = $facebook->getLogoutUrl(array(
  	"next"=>"http://www.tutorcu.com/job/facebook/test_login.php"
  ));
} else{
  $loginUrl = $facebook->getLoginUrl(array(
  	"redirect_uri"=>"http://www.tutorcu.com/job/facebook/test_login.php",
	"display"=>"popup",
	"scope"=>"offline_access,publish_stream,email" // คั่นแต่ละค่าด้วย ,(comma
  ));
}
?>