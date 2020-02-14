<?
  $page=$_GET['page']; 
	function pu_query($conn,$sql,$ListPerPage=20) //
	{
		global $page;
		global $totalpage;
		$result=$conn->query($sql);
		if (empty($page))	$page=1;
		$num=mysqli_num_rows($result);
		$rt = $num%$ListPerPage;
				
		$totalpage = ($rt!=0) ? floor($num/$ListPerPage)+1 : floor($num/$ListPerPage); 
		$goto = ($page-1)*$ListPerPage;

		$sql .= " limit $goto,$ListPerPage";
		$result=$conn->query($sql);

		return $result;
	}

function pu_pageloop($id)
	{
require "config.inc.php";
		global $page;
		global $totalpage;

		$urlpage="./booking.php?";
		
	    echo "<div class=\"page_spirit\"><div class=\"number\">";
		echo "กำลังเเสดงหน้า <font color=\"#FF0000\">$page</font> ทั้งหมด <font color=\"#FF0000\">$totalpage</font> หน้า</div>\n";
		echo "<div class=\"pagination\">\n";
		echo "<p class='pagination light'>\n";
		if($page>1 && $page<=$totalpage) {
			$prevpage = $page-1;
			echo "<a href=\"".$urlpage."page=".$prevpage."\" class=\"prevnext disablelink\"><li>ย้อนกลับ</li></a>\n";}
		$b=floor($page/10); 
		$c=(($b*10));
		if($c>1) {
			$prevpage = $c-1;
			echo "<a href=\"".$urlpage."page=".$prevpage."\" class=\"prevnext disablelink\"><li>$prevpage</li></a>\n";
		}
		for($i=$c; $i<$page ; $i++) {
			if($i>0)
			echo "<a href=\"".$urlpage."page=".$i."\"><li>$i</li></a>\n";
		}
		echo "<a href=\"#\" class=\"currentpage\"><li>$page</li></a>\n";
		for($i=($page+1); $i<($c+10) ; $i++) {
			if($i<=$totalpage)
			echo "<a href=\"".$urlpage."page=".$i."\"><li>$i</li></a>\n";
		}


		if($c>=0) {
			if(($c+10)<$totalpage){
				$nextpage = $c+10;
				echo "<a href=\"".$urlpage."page=".$nextpage."\" class=\"prevnext\"><li>$nextpage</a></li></a>\n";

			}
			
		}	
		if($page!=$totalpage) {
			$nextpage = $page+1;
			echo "<a href=\"".$urlpage."page=".$nextpage."\" class=\"prevnext\"><li>ถัดไป</li></a>\n";
		}
		echo "</p>\n";
		echo "</div>\n";
		echo "</div>\n";
	}
	
?>