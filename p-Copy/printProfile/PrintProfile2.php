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
    
?>

<?php

$host = "145.14.156.52";
$user = "u581844335_v9FuU";
$pass = "MHDE%43219i";
$dbname = "u581844335_2uHFH";


$con = mysqli_connect($host, $user, $pass, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

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
        header("Location: PrintProfile1.php");
}


mysqli_set_charset($con, "utf8");

$newline = "<br /><br />";


$result = mysqli_query($con, "SELECT * FROM $WhatGroub");

// سيستدعي كل بيانات الطلاب
?>

<div class="container">
<?php
while ($row = mysqli_fetch_array($result)) { ?>
<!DOCTYPE html>
<html lang="ar">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/t.css" />
    </head>
    <body>

        <div class="card">
        <div class="lines"></div>
        <div class="imgBx">
            <img src="/INGUWhtie1.jpg" />
        </div>
        <div class="content">
            <div class="details">
<?php
    echo "<h2> الاسم الكامل: " . $row['studentName'] . "</h2>";
    echo "<p>رقم الهويه : " . $row['studentID'] . "</p>";
    echo "<p>تاريخ التسجيل: " . $row['dateRegistration'] . "</p>";
    echo "<p>رقم الاب:  " . $row['frNo'] . "</p>";
    echo "<p>رقم الام : " . $row['motherNo'] . "</p>";
    echo "<p>الوظيفة: " . $row['lastHomeWork'] . "</p>";
    echo "<p>الحديث: " . $row['alhadithAlakhir'] . "</p>";
    echo "<p>عدد الحضور: " . $row['numberAttendees'] . "</p>";
    echo "<p>عدد الغياب: " . $row['absenceNumber'] . "</p>";
    echo "<p>عدد السور : " . $row['numberSurahs'] . "</p>";
    echo "<p>تاريخ الولادة: " . $row['birthDate'] . "</p>";
    // code Profile
?>

            </div>
        </div>
        </div>
    
    </body>
</html>
<?php } ?>
</div>