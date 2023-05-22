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

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$UserName = $_POST['UserName'];
$Password = $_POST['Password'];

$con = mysqli_connect($host, $user, $pass, $dbname);
mysqli_set_charset($conn, "utf8");
$sql = "insert into users (inguwi_username ,inguwi_password) values ('" . $UserName . "','" . $Password . "');";

if (mysqli_query($con, $sql)) {
    $flag = true;
    header("Location: creatUser.php");
} else {
    $flag = false;
    header("Location: creatUser.php");
}

?>