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


<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>صفحة التواصل</title>
</head>
<style>
    @media screen and (min-width: 601px) {
        .Login {
            padding: 10px;
            color: white;
            background: linear-gradient(to right, #ff966d, #fa538d, #89379c);
            border: none;
            border-radius: 20px;
            cursor: pointer;
            margin: 20px -85px;
            font-family: 'Tajawal', sans-serif;
        }
    }
</style>

<body>

    <h2>اختر رقم الفرقة</h2>
    <div class="insert">
        <form class="box" action="c2.php" method="post">
            <input required type="number" name="GroubNumber" placeholder=" اختر رقم الفرقه: 1-2-3">
            <br>
            <input class="Login" type="submit" name="submit" value="ابداء الان">
        </form>
    </div>
</body>

</html>