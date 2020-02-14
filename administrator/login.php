<?
session_start();
  session_unset();
  session_destroy();

include"../system/config.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/loginForm.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

    <title>administrator</title>
</head>
<body>
<div class="wrapper fadeInDown">

  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
    <img src="../img/person.png" id="icon" alt="User Icon" width="50%"/>
    <h4 class="mt-3 mb-3">Administrator Panel</h4>
     
    </div>

    <!-- Login Form -->
    <form action="../../job/administrator/login_check.php" method="get">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="ชื่อเข้าใช้งาน">
      <input type="text" id="password" class="fadeIn third" name="txtPassword" placeholder="รหัสผ่านเข้าใข้งาน" style="">
      <input type="text" name="check0or1" value="1" hidden><br>
      <input type="checkbox" onclick="checkshow()" id="ischeck"><span style="padding-left:10px" >Show Password</span class="ml-3"> <br>
      <input type="submit" class="fadeIn fourth" value="Log In">
      <p><a href="../index.php">กลับไปหน้าหลัก</a></p>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <!--<a class="underlineHover" href="#">Forgot Password?</a>-->
      <?
                    if($_GET["status"] === 0){echo "<span style='color:red'>กรุณากรอก อีเมล์เข้าใช้งาน</span>";}
                    elseif($_GET["status"]== 1){echo "<span style='color:red'>กรุณากรอกรหัสผ่านเข้าใช้งาน</span>";}
                    elseif($_GET["status"] == 2){echo "<span style='color:red'>ชื่อเข้าใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง</span>";}
                    ?>
    </div>

  </div>
</div>
</body>
</html>

<script>
$(document).ready(function () {
    var a =  document.getElementById("ischeck");
    var x = document.getElementById("password");
    x.style.cssText =  "-webkit-text-security: none;";
    $(a).click(function () { 
        if(a.checked  === true){x.style.cssText =  "-webkit-text-security: none;";}
        else if(a.checked  === false){x.style.cssText =  "-webkit-text-security: disc;";}  
    });
        if(a.checked  === true){x.style.cssText =  "-webkit-text-security: none;";}
        else if(a.checked  === false){x.style.cssText =  "-webkit-text-security: disc;";}    
});
</script>