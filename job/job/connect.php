<? ob_start();
session_start ();
require_once('system/config.inc.php');
$table_prefix  = '';
$host="localhost";
$dbname=$dbName;
$usdb=$userroot;
$pwdb=$pwdroot;

mysql_connect($host , $usdb, $pwdb);
mysql_select_db("$dbname") or die ("SELECT_DB_ERROR");
mysql_query("SET NAMES UTF8");
?>
