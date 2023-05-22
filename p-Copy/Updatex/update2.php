<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@700&display=swap');

    body {
        background: linear-gradient(269deg, rgb(0 46 255) 0%, rgb(0 194 255));
    }
</style>

<?php
$host = "145.14.156.52";
$user = "u581844335_v9FuU";
$pass = "MHDE%43219i";
$dbname = "u581844335_2uHFH";

$con = mysqli_connect($host, $user, $pass, $dbname);
mysqli_set_charset($con, "utf8");

session_start();
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: ../Logins/login.php');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: https://ingu.website/');
}



if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$DadNumber = $_POST['DadNumber'];
$MomNumber = $_POST['MomNumber'];
$NumberOfAttendees = $_POST['NumberOfAttendees'];
$AbsenceNumber = $_POST['AbsenceNumber'];
$GroubNumber = $_POST['GroubNumber'];
$NameStu = $_POST['NameStu'];
$WhatGroub;

switch ($GroubNumber) {
    case 1:
        $WhatGroub = "squad1";
        break;

    case 2:
        $WhatGroub = "squad2";
        break;

    case 3:
        $WhatGroub = "squad3";
        break;

    default:
        header("Location: update1.php");
}

$idSQL = "SELECT id FROM $WhatGroub WHERE studentName = '$NameStu'";
$result = mysqli_query($con, $idSQL);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
// if (
//     !empty($DadNumber) ||
//     !empty($MomNumber) ||
//     !empty($NumberOfAttendees) ||
//     !empty($AbsenceNumber) 
// ) {
    
    $flag = false;
    if (!empty($DadNumber)) {
        mysqli_query($con, " UPDATE $WhatGroub SET `frNo`='$DadNumber' WHERE id = '$id' ");
        $flag = true;
        header("Location: update1.php");
    }

    if (!empty($MomNumber)) {
        mysqli_query($con, " UPDATE $WhatGroub SET `motherNo`='$MomNumber' WHERE id = '$id' ");
        $flag = true;
        header("Location: update1.php");
    }

    if (!empty($NumberOfAttendees)) {
        mysqli_query($con, " UPDATE $WhatGroub SET `numberAttendees`='$NumberOfAttendees' WHERE id = '$id' ");
        $flag = true;
        header("Location: update1.php");
    }

    if (!empty($AbsenceNumber)) {
        mysqli_query($con, " UPDATE $WhatGroub SET `absenceNumber`='$AbsenceNumber' WHERE id = '$id' ");
        $flag = true;
        header("Location: update1.php");
    }
    




?>