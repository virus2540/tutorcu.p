   <script type="text/javascript" src="./login.js"></script>    
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">เข้าสู่ระบบ</h3>
            </div>
            <div class="panel-body">
		 <? if($_SESSION[userID]!=''){?>
 <ul class="list-group">
		 <?=Getprofile($_SESSION[userID]);?>
          </ul>
	<?}else{?>
<form name="frmMain">
 <?php if($fb_user){
}else{
 ?>

<? }?></center>
<span id="mySpan"></span>

                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="E-mail" name="username" id="username" type="text">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="txtPassword" id="txtPassword" type="password" value="">
			    		</div>
			    		<div class="checkbox">
			    	    	<label>
			    	    		<a href="<?=$siteurl;?>register.php">สมัครสมาชิก</a>
			    	    	</label>
			    	    </div> <a name="btnLogin" id="btnLogin" title="เข้าสู่ระบบ" OnClick="JavaScript:doCallAjax();" class="btn btn-lg btn-success btn-block"><span class="regis-button">เข้าสู่ระบบ (login)</span></a>
			    	</fieldset>
			      	</form>
		<? } ?>
            </div>
          </div>
          <div class="list-group">
            <a href="#" class="list-group-item active">เมนู Tutorcu</a>
            <a href="tutor.php?tutor=d" class="list-group-item">เฉพาะติวเตอร์ ชาย</a>
            <a href="tutor.php?tutor=c" class="list-group-item">เฉพาะติวเตอร์ หญิง</a>
            <a href="all.php" class="list-group-item">งานสอนทั้งหมด</a>
            <a href="detail.php?id=9" class="list-group-item">ทำอย่างไรให้ได้งาน</a>
            <a href="booking.php" class="list-group-item">จองงานสอน</a>
            <a href="detail.php?id=6" class="list-group-item">วิธีการรับงานสอน</a>
            <a href="detail.php?id=4" class="list-group-item">กฎเกณฑ์และข้อตกลง</a>
            <a href="detail.php?id=8" class="list-group-item">คำถามทีพบบ่อย</a>
            <a href="contact.php" class="list-group-item">ติดต่อเรา</a>
          </div>
        </div><!--/span-->