<?
$select_config = "SELECT * FROM tb_settings WHERE config_id = '1'";
$result_config = mysql_query($select_config);
$agent_config = mysql_fetch_array($result_config);
$show_category=20; //กำหนดโชว์ประกาศหน้าหมวดหมู่ เเสดงทั้งหมดกี่รายการ
$show_normal=20; //กำหนดโชว์ประกาศธรรมดา
$show_excutive_s1=$agent_config[s1]; //กำหนดโชว์ S1
$show_excutive_s2=$agent_config[s2]; //กำหนดโชว์ S2
$show_excutive_s3=$agent_config[s3]; //กำหนดโชว์ S2
$google_map=$agent_config[googlemap];
$title_web=$agent_config[title];
$description_web=$agent_config[keyword];
$keyword_web=$agent_config[description];
$email_web=$agent_config[email];
$fanpage=$agent_config[facebook];
$tel='0988888888';//เบอร์โทรศัพท์คุณ
$hostmail='mail.domain.com';//host email คุณ
$username_email='account@domain.com';//acc เมล์คุณ
$password_email='112233';//password เมล์คุณ
$site_name=$agent_config[domain];//ชื่อโดเมนคุณ
#จำนวนโพสกระทู้
$numpost_Freemember=$agent_config[Freemember];
$numpost_starter=$agent_config[prakad_Starter];
$numpost_Premuim=$agent_config[prakad_Premuim];
$numpost_Platinum=$agent_config[prakad_Platinum];
#ราคา
$price_starter6='3000';
$price_starter12='5000';
$price_Premuim6='5000';
$price_Premuim12='7000';
$price_Platinum6='7000';
$price_Platinum12='10000';
//$thumnail_photo=$agent_config[thumbnail];
$thumnail_photo="thumnail-logo.jpg";
$default_avartar="member-default.jpg";

?>