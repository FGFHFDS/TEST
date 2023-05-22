<?php

session_start();
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
	header('Location: ../Logins/login.php');
	exit;
}

if (isset($_POST['logout'])) {
	session_destroy();
	header('Location: https://ingu.website/');
}


if (isset($_POST['save'])) {
	$servername = "145.14.156.52";
	$username = "u581844335_v9FuU";
	$password = "MHDE%43219i";
	$dbname = "u581844335_2uHFH";


	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$date = date("d_m_Y");
	mysqli_query($conn, "INSERT INTO NameColumn (NameColumns) VALUE ('$date');");

	$attendanceNum = "attendance1";
	$sqlDate = "ALTER TABLE $attendanceNum ADD $date VARCHAR(255) NOT NULL;";
	mysqli_query($conn, $sqlDate);

	// حفظ بيانات الحضور والغياب في قاعدة البيانات
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$attendance = $_POST["attendance"];
		foreach ($attendance as $studentName => $status) {

			$sql = "UPDATE $attendanceNum SET  $date ='$status' WHERE studentName = '$studentName';";
			if ($conn->query($sql) !== TRUE) {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	}
	header('Location: ../index.php');
	$conn->close();
	
}

// إعادة التوجيه إلى صفحة النتائج
exit();
?>