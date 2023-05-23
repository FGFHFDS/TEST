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

	$CountNotPayment = 0;
	$CountPayment = 0;
	$paymentsNum = $_POST['paymentsNum'];
	$month = $_POST['month'];





	$resultCounts = mysqli_query($conn, "SELECT CountPayment,CountNotPayment FROM temp;");
	$row = mysqli_fetch_assoc($resultCounts);
	$sumPayment = $row['CountPayment'];
	$sumNotPayment = $row['CountNotPayment'];
	

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$payments = $_POST["payments"];

		foreach ($payments as $studentName => $status) {
			if ($status === "دفع") {
				$sumNotPayment--;
				$sumPayment++;
				mysqli_query($conn, "UPDATE temp SET CountPayment ='$sumPayment';");

			} 

			$sql = "UPDATE $paymentsNum SET $month ='$status' WHERE studentName = '$studentName';";
			if ($conn->query($sql) !== TRUE) {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}
	
		
	

	}else{
		echo "hi";
	}
	
	header('Location: ../index.php');
	exit();
	

}
		
// إعادة التوجيه إلى صفحة النتائج
exit();
?>