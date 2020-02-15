<?php
session_start();
include "./system/config.inc.php";
include "./system/function.php";
$strTable = "tb_page";
$strCondition = "page_id='10' ";
$query0 = "SELECT * FROM tb_page WHERE page_id='10'";
$result0 = mysqli_query($conn, $query0);
$data = mysqli_fetch_assoc($result0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    .pink {
        background-color: #f5c6cb;
    }

    .yellow {
        background-color: #ffeeba;
    }
    </style>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.css">
   
<<<<<<< HEAD
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
=======
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
>>>>>>> a0a1f83cc5efd2e7d765776bcdd20484c81fa82d
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./OwlCarousel/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./OwlCarousel/docs/assetsowlcarousel/owl.theme.default.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="./OwlCarousel/docs/assets/owlcarousel/owl.carousel.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>

    <title>Job</title>
</head>

<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a href="./index.php"><img src="./img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">หน้าแรก <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">สมัครเรียน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">สมัครติวเตอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">บทความ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ติดต่อเรา</a>
                    </li>
<<<<<<< HEAD
                    <li class="nav-item">
                        <a class="nav-link" href="./administrator/login.php">Admin</a>
                    </li>
=======
>>>>>>> a0a1f83cc5efd2e7d765776bcdd20484c81fa82d
                    <li class="pt-2 pl-2">
                        <div class="line-it-button" data-lang="th" data-type="friend" data-lineid="@TUTORCUJOB" data-count="true" style="display: none;"></div>
                    </li>

                    </form>
            </div>
    </nav>
    <!--Banner-->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="http://go-inter.com/wp-content/uploads/2018/11/header-1-1600x400.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://www.dimensiondata.com/insights/-/media/dd/insights/case-studies/florius/florius-social-image-1600x400.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://cellohealthbioconsulting.com/wp-content/uploads/2018/05/Careers-Teamwork_W400-1600x400.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--set Content Layout-->
    <div class="container">
<<<<<<< HEAD
        <!--บทความ-->
       
        <h1 class="pt-5">บทความ</h1>
        <div class="owl-carousel pt-2">
        <?php
            $sql_bloger = "SELECT * FROM tb_bloger";
            if ($result_bloger = $conn -> query($sql_bloger)) {
                while ($bloger = $result_bloger -> fetch_array(MYSQLI_ASSOC)) {
        ?>
            <div class="card" style="width:350px">
            <?php echo '<img class="card-img-top" src="data:image;base64,'.base64_encode( $bloger["thumbnail"] ).'" alt="Card image" style="width:100%">';?>
                <div class="card-body">
                    <h4 class="card-title"><?php echo $bloger["subject_name"] ; ?></h4>
                    <a href="blog-page.php?pid=<?php echo $bloger['bloger_id'] ; ?>" class="btn btn-info">Read more</a>
                </div>
            </div>
            <?php }}?>
=======
        <!--ข่าวสาร-->
        <h1 class="pt-5">อัพเดทข่าวสาร</h1>
        <div class="owl-carousel pt-2">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/b5/800x600_Wallpaper_Blue_Sky.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/b5/800x600_Wallpaper_Blue_Sky.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/b5/800x600_Wallpaper_Blue_Sky.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/b5/800x600_Wallpaper_Blue_Sky.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/b5/800x600_Wallpaper_Blue_Sky.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/b5/800x600_Wallpaper_Blue_Sky.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/b/b5/800x600_Wallpaper_Blue_Sky.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
>>>>>>> a0a1f83cc5efd2e7d765776bcdd20484c81fa82d
        </div>
        <!--ตาราง-->
        <h1 class="tp-3">งานสอนพิเศษอัพเดตตลอด 24 hr</h1>
        <table id="mytable" class="table display tp-3" style="width:100%">
            <thead class="thead-light">
                <tr>
                    <th width="80">รหัสงาน</th>
                    <th>วิชา</th>
                    <th>สถานที่</th>
                    <th>สถานะ</th>
                    <th>จอง</th>
                    <th width="80">รายละเอียด</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $str="select *from tb_job where status !='no' order by job_id DESC limit 250"; 
                echo '<script>alert('.$str.');</script>';
                $result=mysqli_query($conn,$str); 
                while ($sr=mysqli_fetch_array($result)) {

            ?>
             <tr>
                <td class="<?=class_yel($sr[status]);?>"><?=$sr[code_tutor];?></td>
                <td class="<?=class_yel($sr[status]);?>"><?=$sr[subject_name];?></td>
                <td class="<?=class_yel($sr[status]);?>"><?=$sr[place_tutor];?></td>
                <td class="<?=class_yel($sr[status]);?>"><p align=center><?=class_status1($sr[status]);?></p></td>
                <td class="<?=class_yel($sr[status]);?>"><?=BookingNum($sr[job_id]);?></td>
<<<<<<< HEAD
                <td class="<?=class_yel($sr[status]);?>"><a href="work-detail.php?job_id=<?=$sr[job_id];?>" ><img src="./img/file-icon.png" alt="" width="33%"></td>
=======
                <td class="<?=class_yel($sr[status]);?>"><a href="work-detail.php?job_id=<?=$sr[job_id];?>" ><i class="d-flex justify-content-center fa fa-file" align="center" style="font-size: 40px!important;color:#395d75;"></i></td>
>>>>>>> a0a1f83cc5efd2e7d765776bcdd20484c81fa82d
            </tr> 
            <? }?>
            </tbody>
            <tfoot class="bg-light">
                <tr>
                    <th width="80">รหัสงาน</th>
                    <th>วิชา</th>
                    <th>สถานที่</th>
                    <th>สถานะ</th>
                    <th>จอง</th>
                    <th width="80">รายละเอียด</th>
                </tr>
            </tfoot>
        </table>
        <!--บทความ-->
<<<<<<< HEAD
        <h1 class="pt-3">ติวเตอร์</h1>
        <div class="owl-carousel pt-2">
        <?php
            $sql_member = "SELECT * FROM `user` WHERE LENGTH(avartar) > 6 AND email <> '' AND h_degree <> ''";
            if ($result_member = $conn -> query($sql_member)) {
                while ($member = $result_member -> fetch_array(MYSQLI_ASSOC)) {
        ?>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="img/person.png" alt="Card image" style="width:100%">
=======
        <h1 class="pt-3">บทความ</h1>
        <div class="owl-carousel pt-2">
            <div class="card" style="width:350px">
                <img class="card-img-top" src="http://labelme.csail.mit.edu/Release3.0/Images/users/dan00pot/duy/cat1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="http://labelme.csail.mit.edu/Release3.0/Images/users/dan00pot/duy/cat1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="http://labelme.csail.mit.edu/Release3.0/Images/users/dan00pot/duy/cat1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="http://labelme.csail.mit.edu/Release3.0/Images/users/dan00pot/duy/cat1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="http://labelme.csail.mit.edu/Release3.0/Images/users/dan00pot/duy/cat1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="http://labelme.csail.mit.edu/Release3.0/Images/users/dan00pot/duy/cat1.jpg" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
            <div class="card" style="width:350px">
                <img class="card-img-top" src="http://labelme.csail.mit.edu/Release3.0/Images/users/dan00pot/duy/cat1.jpg" alt="Card image" style="width:100%">
>>>>>>> a0a1f83cc5efd2e7d765776bcdd20484c81fa82d
                <div class="card-body">
                    <h4 class="card-title">John Doe</h4>
                    <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                    <a href="#" class="btn btn-info">Read more</a>
                </div>
            </div>
<<<<<<< HEAD
                <?php }}?>
=======
>>>>>>> a0a1f83cc5efd2e7d765776bcdd20484c81fa82d
        </div>
    </div>
<?include("./template/returnTop.php")?>
</body>

</html>
<script>
    $(document).ready(function() {
<<<<<<< HEAD
        $('#mytable').DataTable({ lengthMenu: [100, 200]});
=======
        $('#mytable').DataTable();
>>>>>>> a0a1f83cc5efd2e7d765776bcdd20484c81fa82d
        
    });
</script>
<script src="./js/index.js"></script>