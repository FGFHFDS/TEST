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
        <form class="box" action="update2.php" method="post">
            <div class="row">
                <div class="Names">
                    <h2>رقم الاب</h2>
                    <h2>رقم الام</h2>
                    <h2>عدد الحضور</h2>
                    <h2>عدد الغياب</h2>
                    <h2>اسم الطالب لتحديث بياناته </h2>
                    <h2>اختر رقم الفرقة</h2>
                </div>

                <div class="inputs">
                    <input type="number" name="DadNumber" placeholder="رقم الاب">

                    <input type="number" name="MomNumber" placeholder="رقم الام">

                    <input type="number" name="NumberOfAttendees" placeholder="عدد الحضور">

                    <input type="number" name="AbsenceNumber" placeholder="عدد الغياب">

                    <input required type="text" name="NameStu" placeholder=" اسم الطالب  الذي تريد تحديث بياناته">
                    <input required type="number" name="GroubNumber" placeholder=" اختر رقم الفرقه: 1-2-3"> 
                    <br>
                </div>
            </div>
            <input class="Login" type="submit" name="submit" value="تحديث بيانات الطالب">


        </form>
    </div>
</body>

</html>

<?php
    if($flag = true){
        echo "<script>alert('تم تحديث البيانات بنجاح!');</script>";
    }else {
        echo "<script>alert('حدث خطأ أثناء تحديث البيانات');</script>";
    }
?>