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


    $host = "145.14.156.52";
    $user = "u581844335_v9FuU";
    $pass = "MHDE%43219i";
    $dbname = "u581844335_2uHFH";
    

$con = mysqli_connect($host, $user, $pass, $dbname);

mysqli_set_charset($con, "utf8");
$StudentId= $_POST['StudentId'];
$GroubNumber = $_POST['GroubNumber'];
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
    header("Location: Delete1.php");
}

$idSQL = "SELECT id FROM $WhatGroub WHERE studentID = '$StudentId'";
$result = mysqli_query($con, $idSQL);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];

$sql = "DELETE FROM $WhatGroub WHERE id = '$id' "; 

if (mysqli_query($con, $sql)) {
    // header("Location: Delete1.php");
    echo " <h2> تم الطرد </h2>  ";
} else
    echo "Failed";
?>