<?php
include"../system/config.inc.php";
session_start();
extract($_POST);
$sql = "SELECT * FROM `user` WHERE `memberID` = '$username' AND `password` = '$password'";

$result = $conn -> query($sql);
if(mysql_num_rows($result)){
    //condition have result
}
else{
    ///False no result
}
?>