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
    <title>تسجيل الحضور والغياب</title>



    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;700&display=swap');

        * {
            box-sizing: border-box;
            font-family: "Tajawal", sans-serif;

        }

        body {
            margin: 0;
            background: #1565c0;

        }

        form {
            display: flex;
            align-items: center;
            flex-direction: column;
            margin-top: 80px;
        }

        .container {
            width: 90%;
            margin: auto;
            max-width: 800px;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            padding: 10px 0px;
            color: #1565c0;
            background: #ffd400;
            box-shadow: 0 0 10px #0000007a;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            direction: rtl;
            text-align: right;
            background: #ffd400;
            box-shadow: 0 0 9px 0px #ffa200;
        }

        input[type="checkbox" i] {}

        th,
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }

        button[type="submit"] {
            background: #15c01d;
            border: none;
            color: #fff;
            padding: 7px 0;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            width: 25%;
            font-size: 20px;
            margin: 20px 0;
        }
    </style>

</head>

<body>
    <div class="insert">
        <form class="box" method="post">
            <div class="row">
                <div class="Names">
                    <h2>ادخل رقم الشهر 1...12 لطباعة من لم يدفع فيه</h2>
                </div>

                <div class="inputs">
                    <input type="text" required name="monthNum" placeholder="ادخل رقم الشهر 1...12">
                    <input required type="number" name="GroubNumber" placeholder=" اختر رقم الفرقه: 1-2-3">
                    <br>
                </div>
            </div>

            <input class="Login" type="submit" name="PrintMonth" value="ابداء">

        </form>
    </div>

    <?php if (isset($_POST['PrintMonth'])) { ?>


        <?php
        $GroubNumber = $_POST['GroubNumber'];
        $monthNum = $_POST['monthNum'];
        $month;
        switch ($monthNum) {
            case 1:
                $month = "01_23";
                break;

            case 2:
                $month = "02_23";
                break;

            case 3:
                $month = "03_23";
                break;

            case 4:
                $month = "04_23";
                break;

            case "5":
                $month = "05_23";
                break;

            case 6:
                $month = "06_23";
                break;

            case 7:
                $month = "07_23";
                break;
            case 8:
                $month = "08_23";
                break;

            case 9:
                $month = "09_23";
                break;

            case 10:
                $month = "10_23";
                break;

            case 11:
                $month = "11_23";
                break;

            case 12:
                $month = "12_23";
                break;

            default:
                header("Location: StudentsNotPayment1.php");
        }

        $WhatGroub;
        $paymentsNum;
        switch ($GroubNumber) {
            case 1:
                $WhatGroub = "squad1";
                $paymentsNum = "payments1";
                break;
            case 2:
                $WhatGroub = "squad2";
                $paymentsNum = "payments2";

                break;
            case 3:
                $WhatGroub = "squad3";
                $paymentsNum = "payments3";
                break;

            default:
                header("Location: StudentsNotPayment1.php");
        }


        echo "<h1> $month :  جدول للذين لم يدفعو في</h1>;" ?>
        <form method="POST" action="StudentsNotPayment2.php">
            <input type='hidden' name='paymentsNum' value="<?php echo $paymentsNum; ?>">
            <input type='hidden' name='month' value="<?php  echo $month; ?>">
            <table>
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>دفع</th>
                        <th>التواصل مع الاهل</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $servername = "145.14.156.52";
                    $username = "u581844335_v9FuU";
                    $password = "MHDE%43219i";
                    $dbname = "u581844335_2uHFH";


                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    $massagePayments = mysqli_query($conn, "SELECT massagePayments FROM massges");

                    // استدعاء أسماء الطلاب
                    $result = mysqli_query($conn, "SELECT $paymentsNum.studentName, $WhatGroub.frNo, $WhatGroub.motherNo FROM $paymentsNum JOIN $WhatGroub ON $paymentsNum.studentName = $WhatGroub.studentName WHERE $paymentsNum.$month = 'لم يدفع' ");

                    // Fetch the message payment from the database
                    $massagePaymentRow = mysqli_fetch_assoc($massagePayments);
                    $massagePaymentText = $massagePaymentRow['massagePayments'];

                    while ($row = $result->fetch_assoc()) {
                        $studentName = $row["studentName"];
                        $frNo = $row["frNo"];
                        $motherNo = $row["motherNo"];
                        echo "<tr>";
                        echo "<td>" . $studentName . "</td>";
                        echo "<td><input type='checkbox' name='payments[" . $studentName . "]' value='دفع'></td>";
                        echo "<td>";
                        echo "<button class='bt'>";
                        // Replace the variable $massagePayments with the actual value $massagePaymentText
                        echo '<a href="http://api.whatsapp.com/send?phone=972' . $frNo . '&text=' . $massagePaymentText . $month . '&type=phone_number&app_absent=0" class="wa_btn"> ارسال الى الاب </a>';
                        echo "</button>";
                        echo "<button class='bt'>";
                        // Replace the variable $massagePayments with the actual value $massagePaymentText
                        echo '<a href="http://api.whatsapp.com/send?phone=972' . $motherNo . '&text=' . $massagePaymentText . $month . '&type=phone_number&app_absent=0" class="wa_btn">ارسال الى الام </a>';
                        echo "</button>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
            <button type="submit" name="save">حفظ</button>
        </form>
    </body>

    </html>

<?php } ?>