<?php
//$con=mysqli_connect("localhost","root","1234","ir21");
// Check connection
/*if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }*/
mysql_connect( 'localhost','ir21_liketh','3h0w0tbU') or die ("�Դ��͡Ѻ�ҹ������ Mysql ����� ");
mysql_select_db('ir21_liketh') or die("���͡�ҹ�����������"); /* �ӡ�����͡�ҹ�����š�͹ */
$sql = "SELECT COUNT( * ) FROM phil";
$result = mysql_query($sql) or die (mysql_error());
$row = mysql_fetch_array($result);
$alcom = $row["COUNT( * )"];
echo"$alcom";
mysql_query("DELETE FROM phil WHERE `time` < NOW() - interval 1 day");
//mysqli_close($con);
?>