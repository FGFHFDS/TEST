<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap');

        * {
            font-family: 'Tajawal', sans-serif;
        }

        body {
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .box {
            background-color: #ffffff;
            border: 1px solid #d0d0d0;
            border-radius: 5px;
            padding: 20px;
            margin: 10px;
            width: 300px;
            text-align: center;
        }

        .box h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .box p {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .box input {
            margin-bottom: 10px;
        }

        .Login {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 6px;

        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php

        $host = "145.14.156.52";
        $user = "u581844335_v9FuU";
        $pass = "MHDE%43219i";
        $dbname = "u581844335_2uHFH";

        $con = mysqli_connect($host, $user, $pass, $dbname);

        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }


        mysqli_set_charset($con, "utf8");

        $result = mysqli_query($con, "SELECT studentName,lastHomeWork,alhadithAlakhir,numberSurahs FROM squad1");

        while ($row = mysqli_fetch_array($result)) {
            $name = $row['studentName'];
            $HomeWork = $row['lastHomeWork'];
            $alhadith = $row['alhadithAlakhir'];
            $numberSurahs = $row['numberSurahs'];
            ?>
            <div class="box">
                <h2> الاسم:
                    <?php echo $name; ?>
                </h2>
                <p> الوظيفة:
                    <?php echo $HomeWork; ?>
                </p>
                <p>الحديث:
                    <?php echo $alhadith; ?>
                </p>
                <p>عدد السور التي تم حفظها:
                    <?php echo $numberSurahs; ?>
                </p>

                <form action="" method="post">
                    <input type="hidden" name="StudentName" value="<?php echo $name; ?>">
                    <input type="text" name="LastHomeWork" placeholder="تحديث الوظيفة">
                    <input type="number" name="LastHadeth" placeholder="تحديث الحديث">
                    <input type="number" name="numberSurahs" placeholder=" عدد السور ">
                    <input class="Login" type="submit" name="Up" value="تحديث">
                </form>
            </div>
            <?php
        }

        $StudentName = $_POST['StudentName'];
        $LastHomeWork = $_POST['LastHomeWork'];
        $LastHadeth = $_POST['LastHadeth'];
        $NumberOfSoar = $_POST['numberSurahs'];

        $idResult = mysqli_query($con, "SELECT id FROM squad1 WHERE studentName = '$StudentName'");
        $row = mysqli_fetch_assoc($idResult);
        $id = $row['id'];


            if (!empty($LastHadeth)) {
                mysqli_query($con, "UPDATE squad1 SET alhadithAlakhir ='$LastHadeth' WHERE id = '$id'");
            }

            if (!empty($LastHomeWork)) {
                mysqli_query($con, "UPDATE squad1 SET lastHomeWork ='$LastHomeWork' WHERE id = '$id'");
            }

            if (!empty($NumberOfSoar)) {
                mysqli_query($con, "UPDATE squad1 SET numberSurahs ='$NumberOfSoar' WHERE id = '$id'");
            }
        ?>
    </div>
</body>

</html>