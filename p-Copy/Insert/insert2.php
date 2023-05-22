<?php
// session_start();
// if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
//     header('Location: ../Logins/login.php');
//     exit;
// }

// if (isset($_POST['logout'])) {
//     session_destroy();
//     header('Location: https://ingu.website/');
// }


$servername = "145.14.156.52";
$username = "u581844335_v9FuU";
$password = "MHDE%43219i";
$dbname = "u581844335_2uHFH";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$studentName = $_POST['StudentName'];
$studentID = $_POST['StudentId'];
$Date = date("d-m-Y");
$frNo = $_POST['DadNumber'];
$motherNo = $_POST['MomNumber'];
$birthDate = $_POST['BornDate'];
$GroubNumber = $_POST['GroubNumber'];
$WhatGroub;
$attendanceNum;
$paymentsNum;
$CountStudents = 0;

switch ($GroubNumber) {
    case 1:
        $WhatGroub = "squad1";
        $attendanceNum = "attendance1";
        $paymentsNum = "payments1";
        break;
    case 2:
        $WhatGroub = "squad2";
        $attendanceNum = "attendance2";
        $paymentsNum = "payments2";

        break;
    case 3:
        $WhatGroub = "squad3";
        $attendanceNum = "attendance3";
        $paymentsNum = "payments3";
        break;

    default:
    header("Location: insert1.php");
}

// mysqli_set_charset($con, "utf8");

// $sql = "insert into $WhatGroub (studentName ,studentID ,dateRegistration ,frNo ,motherNo,birthDate) values
//     ('" . $studentName . "','" . $studentID . "', '" . $dateRegistration . "' , '" . $frNo . "' , '" . $motherNo . "',  " . $birthDate . "');";

$sql = "insert into $WhatGroub (studentName ,studentID ,dateRegistration ,frNo ,motherNo,birthDate) values 
    ('" . $studentName . "','" . $studentID . "', '" . $Date . "' , '" . $frNo . "' , '" . $motherNo . "',  '" . $birthDate . "');";

mysqli_query($conn, "insert into $attendanceNum (studentName) values ('$studentName');");
mysqli_query($conn, "insert into $paymentsNum (studentName) values ('$studentName');");//*** */


if (mysqli_query($conn, $sql)) {

    $CountStudents++;
    $resultCounts = mysqli_query($conn, "SELECT CountStudents FROM `temp`");
	$row = mysqli_fetch_assoc($resultCounts);


	$SumCountStudents = $row['CountStudents'];
	$SumCountStudents += $CountStudents;
	mysqli_query($conn, "UPDATE `temp` SET  CountStudents ='$SumCountStudents';");
    header("Location: insert1.php");
} else {

    header("Location: insert1.php");
}




?>