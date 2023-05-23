<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختيار البلد وال</title>
</head>

<body>
    <form action="index.php" method="post">
        <!-- city -->
        <label for="city">اختر البلدة</label>
        <select name="city">
            <option value="Bir_al_Maksur">بير المكسور</option>
            <option value="Abtin">ابطن</option>
            <option value="Basmat_Tabun">بسمة طبعون</option>
            <option value="Khawalid">الخوالد</option>
            <option value="Kaabiyya">كعبية</option>
        </select>
        <!-- course -->
        <label for="course">اختر الدورة</label>
        <select name="course">
            <option value="Quran_course">دورة القران"</option>
        </select>
        <!-- course -->
        <label for="groub">اختر المجموعة</label>
        <select name="groub">
            <option value="تلقين">تلقين</option>
            <option value="اولاد">اولاد</option>
            <option value="شباب">الشباب</option>
            <option value="بنات">البنات</option>
        </select>

        <input type="submit" name="Start" value="ابداء">
    </form>

</body>

</html>


<?php

$servername = "145.14.156.52";
$username = "u581844335_v9FuU";
$password = "MHDE%43219i";
$dbname = "u581844335_2uHFH";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




switch ($city) {
    //===================== بير المكسور ===============================
    case "Bir_al_Maksur":
        switch ($course) {
            case "Quran_course":

                switch ($groub) {
                    case "اولاد":
                        $WhatGroub = "squad1_Bir_al_Maksur";
                        $attendanceNum = "attendance1_Bir_al_Maksur";
                        $paymentsNum = "payments1_Bir_al_Maksur";
                        break;

                    case "تلقين":
                        $WhatGroub = "squad2_Bir_al_Maksur";
                        $attendanceNum = "attendance2_Bir_al_Maksur";
                        $paymentsNum = "payments2_Bir_al_Maksur";
                        break;

                    case "بنات":
                        $WhatGroub = "squad3_Bir_al_Maksur";
                        $attendanceNum = "attendance3_Bir_al_Maksur";
                        $paymentsNum = "payments3_Bir_al_Maksur";
                        break;
                }
                break;
        }
        break;
    //===================== ابطن ===============================

    case "Abtin":
        switch ($course) {
            case "Quran_course":

                switch ($groub) {
                    case "تلقين":
                        $WhatGroub = "squad1_Abtin";
                        $attendanceNum = "attendance1_Abtin";
                        $paymentsNum = "payments1_Abtin";
                        break;

                    case "اولاد":
                        $WhatGroub = "squad2_Abtin";
                        $attendanceNum = "attendance2_Abtin";
                        $paymentsNum = "payments2_Abtin";
                        break;

                    case "شباب":
                        $WhatGroub = "squad3_Abtin";
                        $attendanceNum = "attendance3_Abtin";
                        $paymentsNum = "payments3_Abtin";
                        break;

                    case "بنات":
                        $WhatGroub = "squad4_Abtin";
                        $attendanceNum = "attendance4_Abtin";
                        $paymentsNum = "payments4_Abtin";
                        break;
                }
                break;
        }
        break;
    //===================== بسمة طبعون ===============================

    case "Basmat_Tabun":
        switch ($course) {
            case "Quran_course":

                switch ($groub) {
                    case "تلقين":
                        $WhatGroub = "squad1_Basmat_Tabun";
                        $attendanceNum = "attendance1_Basmat_Tabun";
                        $paymentsNum = "payments1_Basmat_Tabun";
                        break;

                    case "اولاد":
                        $WhatGroub = "squad2_Basmat_Tabun";
                        $attendanceNum = "attendance2_Basmat_Tabun";
                        $paymentsNum = "payments2_Basmat_Tabun";
                        break;

                    case "شباب":
                        $WhatGroub = "squad3_Basmat_Tabun";
                        $attendanceNum = "attendance3_Basmat_Tabun";
                        $paymentsNum = "payments3_Basmat_Tabun";
                        break;
                }
                break;
        }
        break;
    //===================== الخوالد ===============================

    case "Khawalid":
        switch ($course) {
            case "Quran_course":

                switch ($groub) {

                    case "اولاد":
                        $WhatGroub = "squad1_Khawalid";
                        $attendanceNum = "attendance1_Khawalid";
                        $paymentsNum = "payments1_Khawalid";
                        break;

                }
                break;
        }
        break;
    //===================== كعبية ===============================

    case "Kaabiyya":
        switch ($course) {
            case "Quran_course":

                switch ($groub) {

                    case "اولاد":
                        $WhatGroub = "squad1_Kaabiyya";
                        $attendanceNum = "attendance1_Kaabiyya";
                        $paymentsNum = "payments1_Kaabiyya";
                        break;

                }
                break;
        }
        break;
}

?>

<form action="index.php" method="post">
    <input type="hidden" name="WhatGroub" value="<?php $WhatGroub ?>">
    <input type="hidden" name="attendanceNum" value="<?php $attendanceNum ?>">
    <input type="hidden" name="paymentsNum" value="<?php $paymentsNum ?>">
</form>