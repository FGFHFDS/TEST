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

$servername = "145.14.156.52";
$username = "u581844335_v9FuU";
$password = "MHDE%43219i";
$dbname = "u581844335_2uHFH";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$isMonth;
$isDate = date("m_y");
$WhatGroub = $_POST['WhatGroub'];
$attendanceNum = $_POST['attendanceNum'];
$paymentsNum = $_POST['paymentsNum'];

switch ($isDate) {
    case 01_23:
        $isMonth = "01_23";
        break;

    case 2:
        $isMonth = "02_23";
        break;

    case 3:
        $isMonth = "03_23";
        break;

    case 4:
        $isMonth = "04_23";
        break;

    case "05_23":
        $isMonth = "05_23";
        break;

    case 6:
        $isMonth = "06_23";
        break;

    case 7:
        $isMonth = "07_23";
        break;
    case 8:
        $isMonth = "08_23";
        break;

    case 9:
        $isMonth = "09_23";
        break;

    case 10:
        $isMonth = "10_23";
        break;

    case 11:
        $isMonth = "11_23";
        break;

    case 12:
        $isMonth = "12_23";
        break;

    default:
        echo "erorr INGU";
}
    $CountNotPayment = 0;

    $CountNotPaymentSResult =  mysqli_query($conn, "SELECT studentName from $paymentsNum WHERE $isMonth = 'لم يدفع';");

    // $rowCountNotPayment = mysqli_fetch_assoc($CountNotPaymentSResult);
    while ($rowCountNotPayment = $CountNotPaymentSResult->fetch_assoc()) {
        $CountNotPayment++;
    }
    mysqli_query($conn, "UPDATE temp SET CountNotPayment ='$CountNotPayment';");
    //============
    
    $resultCountStudents = mysqli_query($conn, "SELECT CountStudents FROM temp;");
    $rowCountStudents = mysqli_fetch_assoc($resultCountStudents);
    $CountStudents = $rowCountStudents['CountStudents'];//**** */
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST"><button type="submit" class="login-btn" name="logout">Logout</button></form>
    <h1>مرحبًا،
        <?php echo $_SESSION['username']; ?>!
    </h1>
    <h1>عدد الذين لم يدفعو بعد</h1>
    
    <?php echo $CountNotPayment."/".$CountStudents; ?>
    <p>هذه الصفحة محمية ويمكن الوصول إليها فقط بعد تسجيل الدخول.</p>
    <a href="https://ingu.website/wp-admin/p/Insert/insert1.php"  target="_blank">insert</a>
    <a href= "https://ingu.website/wp-admin/p/DeleteStudent/Delete1.php" target="_blank">Delete</a>
    <a href="https://ingu.website/wp-admin/p/Updatex/update1.php" target="_blank" rel="noopener noreferrer">Update</a>
    <a href="https://ingu.website/wp-admin/p/printProfile/PrintProfile1.php" target="_blank" rel="noopener noreferrer">print Profile</a>
</body>

</html>

<?php
    
?>