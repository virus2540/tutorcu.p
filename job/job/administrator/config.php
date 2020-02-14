<?

$dir_uploads = "/uploads/";
$file_size = 1000000000000;//1000 kb
$root_path = $_SERVER['DOCUMENT_ROOT'];



$table_prefix  = '';
$host="localhost";
$dbname="tutorcuc_job2";
$usdb="tutorcuc_job2";
$pwdb="1cbheXbm";

mysql_connect($host , $usdb, $pwdb);
mysql_select_db("$dbname") or die ("SELECT_DB_ERROR");
mysql_query("SET NAMES UTF8");
?>