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

	$date = date("m_y");
	$CountNotPayment = 0;
	$CountPayment = 0;
	$paymentsNum = $_POST['paymentsNum'];
	$sqlDate = "ALTER TABLE $paymentsNum ADD $date VARCHAR(255) NOT NULL;";
	mysqli_query($conn, $sqlDate);








	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$payments = $_POST["payments"];
		foreach ($payments as $studentName => $status) {
			if ($status === "دفع") {
				$CountPayment++;
			} else {
				$CountNotPayment++;
			}
			$sql = "UPDATE $paymentsNum SET  $date ='$status' WHERE studentName = '$studentName';";
			if ($conn->query($sql) !== TRUE) {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	
		$resultCounts = mysqli_query($conn, "SELECT CountPayment,CountNotPayment FROM `temp`");
		$row = mysqli_fetch_assoc($resultCounts);
	
		$sumPayment = $row['CountPayment'];
		$sumPayment += $CountPayment;
		$sumNotPayment = $row['CountNotPayment'];
		$sumNotPayment += $CountNotPayment;
		mysqli_query($conn, "UPDATE `temp` SET CountPayment ='$sumPayment', CountNotPayment = '$sumNotPayment';");
	}
	
	header('Location: ../index.php');
	exit();
	
	// // حفظ بيانات الدفع في قاعدة البيانات
	// if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// 	$payments = $_POST["payments"];

	// 	foreach ($payments as $studentName => $status) {


	// 		if ($status === "دفع") {
	// 			$CountPayment++;
	// 		}else {
	// 			$CountNotPayment++;
	// 		}

	// 		$sql = "UPDATE $paymentsNum SET  $date ='$status' WHERE studentName = '$studentName';";
	// 		if ($conn->query($sql) !== TRUE) {
	// 			echo "Error: " . $sql . "<br>" . $conn->error;
	// 		}
	// 	}
	// }
	// header('Location: ../index.php');

	// $resultCounts = mysqli_query($conn, "SELECT CountPayment,CountNotPayment FROM `temp`");
	// $row = mysqli_fetch_assoc($resultCounts);

	// $sumPayment = $row['CountPayment'];
	// $sumPayment += $CountPayment;
	// $row1 = mysqli_fetch_assoc($resultCounts);
	// $sumNotPayment = $row['CountNotPayment'];
	// $sumNotPayment += $CountNotPayment;
	// mysqli_query($conn, "UPDATE `temp` SET CountPayment ='$sumPayment', CountNotPayment = '$sumNotPayment';");
	
}
		
// إعادة التوجيه إلى صفحة النتائج
exit();
?>