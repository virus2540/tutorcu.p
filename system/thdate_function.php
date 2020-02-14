<?php

/*THAI DATE*/

function ThaiTimeConvert($timestamp="",$full="",$showtime=""){
	global $SHORT_MONTH, $FULL_MONTH, $DAY_SHORT_TEXT, $DAY_FULL_TEXT;
	$day = date("l",$timestamp);
	$month = date("n",$timestamp);
	$year = date("Y",$timestamp);
	$time = date("H:i:s",$timestamp);
	$times = date("H:i",$timestamp);
	
	
	$DAY_FULL_TEXT = array(
"Sunday" => "อาทิตย์",
"Monday" => "จันทร์",
"Tuesday" => "อังคาร",
"Wednesday" => "พุธ",
"Thursday" => "พฤหัสบดี",
"Friday" => "ศุกร์",
"Saturday" => "เสาร์"
);

$DAY_SHORT_TEXT = array(
"Sunday" => "อา.",
"Monday" => "จ.",
"Tuesday" => "อ.",
"Wednesday" => "พ.",
"Thursday" => "พฤ.",
"Friday" => "ศ.",
"Saturday" => "ส."
);

$SHORT_MONTH = array(
"1" => "ม.ค.",
"2" => "ก.พ.",
"3" => "มี.ค.",
"4" => "เม.ย.",
"5" => "พ.ค.",
"6" => "มิ.ย.",
"7" => "ก.ค.",
"8" => "ส.ค.",
"9" => "ก.ย.",
"10" => "ต.ค.",
"11" => "พ.ย.",
"12" => "ธ.ค."
);

$FULL_MONTH = array(
"1" => "มกราคม",
"2" => "กุมภาพันธ์",
"3" => "มีนาคม",
"4" => "เมษายน",
"5" => "พฤษภาคม",
"6" => "มิถุนายน",
"7" => "กรกฏาคม",
"8" => "สิงหาคม",
"9" => "กันยายน",
"10" => "ตุลาคม",
"11" => "พฤศจิกายน",
"12" => "ธันวาคม"
);

$FULL_MONTH2 = array(
"01" => "มกราคม",
"02" => "กุมภาพันธ์",
"03" => "มีนาคม",
"04" => "เมษายน",
"05" => "พฤษภาคม",
"06" => "มิถุนายน",
"07" => "กรกฏาคม",
"08" => "สิงหาคม",
"09" => "กันยายน",
"10" => "ตุลาคม",
"11" => "พฤศจิกายน",
"12" => "ธันวาคม"
);
	
	
	if($full){
		$ThaiText = "วัน".$DAY_FULL_TEXT[$day]." ที่ ".date("j",$timestamp)." เดือน ".$FULL_MONTH[$month]." พ.ศ.".($year+543) ;
	}else{
		$ThaiText = date("j",$timestamp)."  ".$SHORT_MONTH[$month]."  ".($year+543);
	}

	if($showtime == "1"){
		return $ThaiText." เวลา ".$time;
	}else if($showtime == "2"){
		$ThaiText = date("j",$timestamp)." ".$SHORT_MONTH[$month]." ".($year+543);
		return $ThaiText." : ".$times;
	}else if($showtime == "3"){
		return $ThaiText;
	}else{
		return $ThaiText;
	}
}

/*END THAI DATE*/


/*Detail of since and for of the date*/
function duration_ok($begin,$end){
	$remain=intval(strtotime($end)-strtotime($begin));
	$wan=floor($remain/86400);
	$l_wan=$remain%86400;
	$hour=floor($l_wan/3600);
	$l_hour=$l_wan%3600;
	$minute=floor($l_hour/60);
	$second=$l_hour%60;
	return " - ".$wan." วัน ".$hour." ชั่วโมง ".$minute." นาที ".$second." วินาที ที่ผ่านมา";
}


/*Detail of since and for of the date*/
function duration($begin,$end){
	$remain=intval(strtotime($end)-strtotime($begin));
	$wan=floor($remain/86400);
	$l_wan=$remain%86400;
	$hour=floor($l_wan/3600);
	$l_hour=$l_wan%3600;
	$minute=floor($l_hour/60);
	$second=$l_hour%60;
	
	if($wan<=0 && $hour<=1 && $minute>=25 && $minute<=35){
		return " - ครึ่งชั่วโมง ที่ผ่านมา";
	}if($hour<=1){
		return " - ".$minute." นาที ที่ผ่านมา";
	}if($hour>=1 && $wan<=0){
		return " - ".($hour-1)." ชั่วโมง ที่ผ่านมา";
	}if($wan>=1){
		return " - ".$wan." วัน ที่ผ่านมา";
	}
	
	
	//return " - ".$wan." วัน ".$hour." ชั่วโมง ".$minute." นาที ".$second." วินาที ที่ผ่านมา";
}


?>
