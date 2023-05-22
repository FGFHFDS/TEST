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
    <title>Document</title>
</head>

<body>
    <form method="POST"><button type="submit" class="login-btn" name="logout">Logout</button></form>
    <h1>مرحبًا،
        <?php echo $_SESSION['username']; ?>!
    </h1>
    <p>هذه الصفحة محمية ويمكن الوصول إليها فقط بعد تسجيل الدخول.</p>
    <a href="https://ingu.website/wp-admin/p/Insert/insert1.php"  target="_blank">insert</a>
    <a href= "https://ingu.website/wp-admin/p/DeleteStudent/Delete1.php" target="_blank">Delete</a>
    <a href="https://ingu.website/wp-admin/p/Updatex/update1.php" target="_blank" rel="noopener noreferrer">Update</a>
    <a href="https://ingu.website/wp-admin/p/printProfile/PrintProfile1.php" target="_blank" rel="noopener noreferrer">print Profile</a>
</body>

</html>

<?php

?>