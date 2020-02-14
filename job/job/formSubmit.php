<?
include"./system/config.inc.php";
include"./system/function.php";
echo "<h1>Form posted with Ajax</h1>";
echo "<h4>POST variables</h4>";
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$address=$_POST["address"];
$zipCode=$_POST["zipCode"];
$data = array(  
	"title"=>$firstname,
	"description"=>$lastname,
	"short_detail"=>$address,
	"condo_name"=>$zipCode,
);   
insert("tb_prakad",$data); 
echo"เพิ่มข้อมูลสำเร็จ";  
foreach($_POST as $key=>$value){
	
	if(is_array($value)){		
		for($no=0;$no<count($value);$no++){
			echo "<b>".$key."[$no]</b>: ".$value[$no]."<br>"; 
		}
	}else{
		echo "<b>".$key."</b>: ".$value."<br>";
	}
	
	
}

echo "<h4>GET variables:</h4>";
foreach($_GET as $key=>$value){
	if(is_array($value)){		
		for($no=0;$no<count($value);$no++){
			echo "<b>".$key."[$no]</b>: ".$value[$no]."<br>"; 	
		}
	}else{
		echo "<b>".$key."</b>: ".$value."<br>";
	}
	
}


?>
