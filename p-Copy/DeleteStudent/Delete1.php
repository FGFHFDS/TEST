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
    <title>Delete</title>
    <link rel="stylesheet" href="../css/main.css">
    <style>
        @media screen and (min-width: 601px){
            .insert{
            margin-top: 150px;
            }
        }
    </style>
</head>
<body>

<div class="insert">
        <form class="box" action="delete2.php" method="post">
            <div class="row">
            <div class="Names">

                <h2>الهوية</h2>
                <h2>اختر رقم الفرقة</h2>
            </div>

            <div class="inputs">

                <input  type="number" name="StudentId" placeholder="هوية">
                <input required type="number" name="GroubNumber" placeholder=" اختر رقم الفرقه: 1-2-3">

                <br>
            </div>  
        </div>

            <input class="Login" type="submit" name="submit" value="حذف طالب">

        </form>
    </div>

</body>
</html>