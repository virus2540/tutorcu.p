
	<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?=$siteurl;?>home.php">หน้าหลัก</a></li>
            <li><a href="<?=$siteurl;?>about.php">เกี่ยวกับเรา</a></li>
            <li><a href="<?=$siteurl;?>contact.php">ติดต่อเรา</a></li>
          </ul><div id="manu_profile">
		 <? if($_SESSION[userID]!=''){?>
		 <?=Getprofile($_SESSION[userID]);?>
	<?}else{?>
	<? }?>
	</div>
        </div><!-- /.nav-collapse -->
	
      </div><!-- /.container -->

    </div><!-- /.navbar -->

	<div class="header_main">
<div id="logo"><img src="images/logo1.png" border="0"/></div>
	</div>
