<?php
  /*Strip Tags UTF-8*/
function substr_utf8( $str, $from , $len ){
 return preg_replace( '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
  '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
  '$1' , $str );
}
/*Strip link rewrite*/
/*Strip link rewrite*/
function Relink($linkstrip) {
$linkstrip = ereg_replace('_+', '-', str_replace(array(' ', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '+', '|', '\\', '\'', '"', '[', ']', '{', '}', ':', ';', '.', ',', '/', '?', '', '<', '>'), '_', trim(ereg_replace('[[:space:]]+', ' ', trim($linkstrip)))));

return $linkstrip;
}
function Dateadd($addtime) {
$addtime = ereg_replace('_+','', str_replace(array('-'), '_', trim(ereg_replace('[[:space:]]+', ' ', trim($addtime)))));

return $addtime;
}
function status($sp){
    if($sp==yes){
	        $show='<img src="./images/published.png">';
	        return $show;
	}elseif($sp==no){
	        $show='<img src="./images/unpublished.png">';
	        return $show;
	}
 }
 function none_data($sp){
    if($sp==''){
	        $show='<img src="-ไม่ระบุ-';
	        return $show;
	}
 }
    function status_payment($sp){
    if($sp==yes){
	        $show='<font color=green>ชำระเงินเรียบร้อย</font>';
	        return $show;
	}elseif($sp==no){
	        $show='<font color=red>ยังไม่ชำระเงิน</font>';
	        return $show;
	}
 }
     function status_payments($sp){
    if($sp==yes){
	        $show='<font color=green>ตรวจสอบเเล้ว</font>';
	        return $show;
	}elseif($sp==no){
	        $show='<font color=red>ยังไม่ตรวจสอบ</font>';
	        return $show;
	}
 }
      function status_mail($sp){
    if($sp==yes){
	        $show='<font color=green>อ่านเเล้ว</font>';
	        return $show;
	}elseif($sp==no){
	        $show='<font color=red>ยังไม่อ่าน</font>';
	        return $show;
	}
 }
    function banner($sp){
    if($sp==yes){
	        $show='<font color=green>ออนไลน์</font>';
	        return $show;
	}elseif($sp==no){
	        $show='<font color=red>หมดอายุ</font>';
	        return $show;
	}
 }
     function resume($sp){
    if($sp==yes){
	        $show='<font color=green>ครบ</font>';
	        return $show;
	}elseif($sp==no){
	        $show='<font color=red>ไม่ครบ</font>';
	        return $show;
	}elseif($sp==ot){
	        $show='<font color=red>ไม่แน่ใจ</font>';
	        return $show;
	}
 }
      function q5($sp){
    if($sp==yes){
	        $show='<font color=green>ใช่</font>';
	        return $show;
	}elseif($sp==no){
	        $show='<font color=red>ไม่ใช่</font>';
	        return $show;
	}
 }
       function q6($sp){
    if($sp==yes){
	        $show='<font color=green>ทราบ</font>';
	        return $show;
	}elseif($sp==no){
	        $show='<font color=red>ไม่ทราบ</font>';
	        return $show;
	}
 }
     function class_yel($sp){
    if($sp=='a'){
	        $show='yellow';
	        return $show;
	}elseif($sp=='b'){
	        $show='green';
	        return $show;
	}elseif($sp=='c'){
	        $show='pink';
	        return $show;
	}elseif($sp=='d'){
	        $show='browse';
	        return $show;
	}elseif($sp=='e'){
	        $show='none';
	        return $show;
	}
 }
      function class_status($sp){
    if($sp=='a'){
	        $show='<font style="color:#baaf04">ยังว่างติวเตอร์หญิงเเละชาย</font>';
	        return $show;
	}elseif($sp=='b'){
	        $show='<font style="color:green">เเจ้งจอง</font> ';
	        return $show;
	}elseif($sp=='c'){
	        $show='<font style="color:pink">ยังว่างติวเตอร์หญิง</font>';
	        return $show;
	}elseif($sp=='d'){
	        $show='<font style="color:#0c75a5">ยังว่างติวเตอร์ชาย</font>';
	        return $show;
	}elseif($sp=='e'){
	        $show='รอเเจ้งโอนเงิน';
	        return $show;
	}elseif($sp=='no'){
	        $show='<font style="color:#0a4f73"><b>ปิดงานเรียบร้อย</b></font>';
	        return $show;
	}
 }
       function class_status1($sp){
    if($sp=='a'){
	        $show='<font>ยังว่างติวเตอร์หญิงเเละชาย</font>';
	        return $show;
	}elseif($sp=='b'){
	        $show='<font>เเจ้งจอง</font> ';
	        return $show;
	}elseif($sp=='c'){
	        $show='<font>ยังว่างติวเตอร์หญิง</font>';
	        return $show;
	}elseif($sp=='d'){
	        $show='<font>ยังว่างติวเตอร์ชาย</font>';
	        return $show;
	}elseif($sp=='e'){
	        $show='รอเเจ้งโอนเงิน';
	        return $show;
	}
 }
/*select record*/
	function fncSelectRecord($strTable,$strCondition)
	{
			$strSQL = "SELECT * FROM $strTable WHERE $strCondition ";
			$objQuery = @mysqli_query($strSQL);
			return @mysqli_fetch_array($objQuery);
	}
  //    ฟังก์ชันสำหรับการ insert ข้อมูล
function insert($table,$data)
{
  $fields=""; $values="";
  $i=1;
  foreach($data as $key=>$val)
  {
    if($i!=1) { $fields.=", "; $values.=", "; }
    $fields.="$key";
    $values.="'$val'";
    $i++;
  }
  $sql = "INSERT INTO $table ($fields) VALUES ($values)";
  if($conn->query($sql) === TRUE) { return true; } 
  else { echo("SQL Error: <br>".$sql."<br>".mysqli_error()); return true;}
}
//    ฟังก์ชันสำหรับการ update ข้อมูล
function update($table,$data,$where)
{
  $modifs="";
  $i=1;
  foreach($data as $key=>$val)
  {
    if($i!=1){ $modifs.=", "; }
    if(is_numeric($val)) { $modifs.=$key.'='.$val; }
    else { $modifs.=$key.' = "'.$val.'"'; }
    $i++;
  }
  $sql = ("UPDATE $table SET $modifs WHERE $where");
  if($conn->query($sql)) { return true; } 
  else { die("SQL Error: <br>".$sql."<br>".mysqli_error()); return false; }
}
//    ฟังก์ชันสำหรับการ delete ข้อมูล
function delete($table, $where)
{
  $sql = "DELETE FROM $table WHERE $where";
  if($conn->query($sql)) { return true; } 
  else { die("SQL Error: <br>".$sql."<br>".mysqli_error()); return false; }
}
//    ฟังก์ชันสำหรับแสดงรายการฟิลด์ในตาราง
function listfield($table)
{
	$req=@mysqli_query("SELECT * FROM $table");
	$numberfields =@mysqli_num_fields($req);
	$row_title="\$data=array(<br/>";
	for($i=0; $i<$numberfields ; $i++ ) {
		   $var=@mysqli_field_name($req, $i);
		   $row_title.="\"$var\"=>\"value$i\",<br/>";
	}
	$row_title.=");<br/>";
	echo $row_title;
}
function ThaiDatesale($InputDate)
{
global $ThaiMonth;
$day=substr($InputDate,8,2);
$month=substr($InputDate,5,2);
$month=(int)$month -1;
$year=substr($InputDate,0,4);
$year=$year+543;
$month=$ThaiMonth[$month];
$thaidatenew=
$thaidatenew= (int)$day." ".$month." ".$year;
return $thaidatenew;
}
function DelSpace($newstr) {
$newstr = ereg_replace('[[:space:]]+', ' ', trim($newstr));
			return $newstr;
		}
function random_code($len)
{
srand((double)microtime()*10000000);
$chars = "0123456789";
$ret_str = "";
$num = strlen($chars);
for($i = 0; $i < $len; $i++)
{
$ret_str.= $chars[rand()%$num];
$ret_str.=""; 
}
return $ret_str; 
}
$code_process=random_code(12); 
#ฟังก์ชั่นเเรนระบบส่ง token email
function random_token($len)
{
srand((double)microtime()*10000000);
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
$ret_str = "";
$num = strlen($chars);
for($i = 0; $i < $len; $i++)
{
$ret_str.= $chars[rand()%$num];
$ret_str.=""; 
}
return $ret_str; 
}
$code_generate=random_token(20); 
/*ฟังกชั่นนับเวลาถอยหลัง*/
	 function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
	 function TimeDiff($strTime1,$strTime2)
	 {
				return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
	 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
	 /*เเสดงโฆษณา*/
function GetAds($adid, $adcode) {
$ad_id = mysqli_query("SELECT * FROM tb_banner WHERE type='".$adid."' and status='yes' ORDER BY banner_id DESC LIMIT 1");
while($ads = mysqli_fetch_array($ad_id)){
require "config.inc.php";
		$adid = $ads['type'];
   		$adshow = $ads['status'];
		$ext = $ads['ext'];
		$width = $ads['width'];
		$height = $ads['height'];
		$adcode="<a href=$ads[link]><img src=".$siteurl."upload/banner/$ads[filebanner]></a>";
		$adcode_no="<a href=$ads[link]><img src=".$siteurl."upload/banner/normal/$ads[defalt_banner]></a>";
		$ad_flash="<div class=banner_top>
<param name=\"movie\" value=\"".$siteurl."upload/banner/$ads[filebanner]\"> 
<param name=\"quality\" value=\"high\"> 
<embed src=\"".$siteurl."upload/banner/$ads[filebanner]\" quality=\"high\" 
pluginspage=\"https://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\"".$width."\" 
height=\"".$height."\" style=\"position:relative\" wmode=\"transparent\"></embed></div>";
   }
   if($adshow=='yes'){
   if($ext=='swf'){
	  return $ad_flash;
   }else{
	return $adcode;
   }
    return true;
   }elseif($adshow=='no'){
	  return $adcode_no;
	  return true;
   }else{
	   return false;
   }
}
/*get avartar*/
function GetAvartar($uid) {
require "config.inc.php";
require "web_config.php";
$query="SELECT * from members WHERE userID='$uid'";
$result=mysqli_query($query);
$num_rows = mysqli_num_rows($result);
$dt = mysqli_fetch_array($result);
if ($dt[logo]=="") {
	$avartar =
	'<img src="'.$siteurl.'upload/avartar/member-default.jpg" class="avartar"/>';	
	}else{
	$avartar =
	'<img src="'.$siteurl.'upload/avartar/'.$dt[logo].'" class="avartar"/>';	
}
return $avartar;
return true;
}
function GetThumb($gaid) {
require "config.inc.php";
require "web_config.php";
$query="SELECT * from tb_file WHERE gallery_id='$gaid' and cover='yes' ORDER BY file_id DESC LIMIT 1";
$result=mysqli_query($query);
$num_rows = mysqli_num_rows($result);
$d1 = mysqli_fetch_array($result);
if ($num_rows=="1") {
	$ga_file = $d1['file_name'];
	}else{
	$ga_file=$thumnail_photo;
		
 }
	  return $ga_file;
	  return true;
}
function prakadURL($id) {
$query="SELECT * from  tb_prakad where prakad_id='$id'";
$result=mysqli_query($query);
$d2 = mysqli_fetch_array($result);
$category_titlebar=$d2[condo_typename];
$name=$d2[topic];
	global $siteurl;
	$name = trim($name);
	$name = Relink($name);
	$data = $siteurl."".$category_titlebar."/". $id."/".$name.".html";
	return $data;
}

function categoryURL($id) {
$query="SELECT * from  tb_category where category_id='$id'";
$result=mysqli_query($query);
$d2 = mysqli_fetch_array($result);
$category_titlebar=$d2[category_titlebar];
	global $siteurl;
	$name = trim($category_titlebar);
	$name = Relink($name);
	$data = $siteurl."category-". $id."/".$name."";
	return $data;
}
function projectURL($id) {
$query="SELECT * from  tb_project where prakad_id='$id'";
$result=mysqli_query($query);
$d2 = mysqli_fetch_array($result);
$category_titlebar=$d2[condo_typename];
$name=$d2[topic];
	global $siteurl;
	$name = trim($name);
	$name = Relink($name);
	$data = $siteurl."".$category_titlebar."/". $id."/".$name."";
	return $data;
}
function BookingNum($id) {
$result = mysqli_query("SELECT * FROM tb_booking where job_id=".$id."");
$num_rows = mysqli_num_rows($result);
return $num_rows;
}
function jobnumber($id) {
$query="SELECT * from  tb_job where job_id='$id'";
$result=mysqli_query($query);
$d2 = mysqli_fetch_array($result);
$data='<a href="booking_detail.php?id='.$d2[job_id].'" target="_blank">'.$d2[code_tutor].'</a>';
	return $data;
}
function job_qa($id,$u_id) {
$query="SELECT * from  tb_question where job_id='$id' and u_id='$u_id'";
$result=$conn->query($query);
$num_rows = mysqli_num_rows($result);
$d2 = $result->fetch_array();
if ($num_rows=="1") {
$data='<a href="qa_detail.php?job_id='.$d2['job_id'].'&u_id='.$d2['u_id'].'" target="_blank">รายละเอียด</a>';
}else{
$data='';
}
	return $data;
}
/*Function show logo and company*/
function GetLogo($pid) {
require "config.inc.php";
require "web_config.php";
$query="SELECT * from tb_project WHERE prakad_id='$pid'";
$result=mysqli_query($query);
$num_rows = mysqli_num_rows($result);
$dt = mysqli_fetch_array($result);
if ($dt[logo]=="") {
	$show =
	''.$dt[company_project].'';	
	}else{
	$show =
	'<img src="'.$siteurl.'upload/project/'.$dt[logo].'" class="getlogo"/>';	
}
return $show;
return true;
}
/*get avartar*/
function Getprofile($uid) {
require "config.inc.php";
require "web_config.php";
$query="SELECT * from user WHERE id='$uid'";
$result=mysqli_query($query);
$num_rows = mysqli_num_rows($result);
$dt = mysqli_fetch_array($result);
if ($dt!="") {
	
	$profile =
	' <span class="st1">tutorcu.com</span><span class="st2"> ยินดีตอนรับติวเตอร์</span>  <span class="font3"><a href="profile.php">'.$dt[name].'</a></span>
<br/>	<span>รหัส TUTOR : '.$dt[memberID].'</span>
<br/>	<span class="font2"> | </span> 
        	<span class="font2"><a href="profile.php">ข้อมูล ของคุณ</a></span>  | 
            <span class="font4"><a href="logout.php">ออกจากระบบ</a></span>';	
}
return $profile;
return true;
}
?>