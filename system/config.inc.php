<?

	$host = "localhost";				// ��˹� Host
	$userroot ="tutorcuc_job2";					// user �����ҹ mysql
	$pwdroot="1cbheXbm";					// password mysql
	$dbName = "tutorcuc_job2";			// Database �����ҹ
	$siteurl="https://www.tutorcu.com/job/";
	$slice_url="https://www.tutorcu.com/";

	// Create connection
	$conn = new mysqli($host, $userroot, $pwdroot, $dbName);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

?>