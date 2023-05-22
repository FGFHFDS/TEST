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


</head>

<body>


    <div class="insert">
        <form class="box" action="create.php" method="post">
            <div class="row">
                <div class="Names">

                    <h2>اسم المستخدم</h2>
                    <h2>كلمة المرور</h2>

                </div>

                <div class="inputs">

                    <input type="text" name="StudentName" placeholder="اسم المستخدم">
                    <input type="number" name="StudentId" placeholder="كلمة المرور">

                    <br>
                </div>
            </div>

            <input class="Login" type="submit" name="submit" value="انشاء مستخدم">

        </form>
    </div>

</body>

</html>