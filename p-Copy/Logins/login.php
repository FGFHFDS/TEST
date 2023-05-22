<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | INGU Company</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/dLogin.css">
</head>

<body>
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
        <form  class="login"  action="checkLogin.php" method="post">
        
            <h3 class="title">Login</h3>
            <div class="text-input">
                <i class="ri-user-fill"></i>
                <input type="text" name="username" placeholder="اسم المستخدم">
            </div>
            <div class="text-input">
                <i class="ri-lock-fill"></i>
                <input type="password" name="password" placeholder="كلمة المرور">
            </div>
            <button class="login-btn" type="submit" name="login">تسجيل الدخول</button>
    </form>
    </div>
</body>

</html>
