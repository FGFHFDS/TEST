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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css" />
</head>

<body>

  <form class="login" method="post">
    <div class="text-input">
      <input type="text" name="mas1" placeholder="تحديث رسالة الوظيفه" />
    </div>
    <div class="text-input">
      <input type="text" name="mas2" placeholder="تحديث رسالة الحديث" />
    </div>
    <button class="login-btn" type="submit" name="login">تحديث</button>
  </form>


  <table>
    <thead>
      <tr>
        <th>اسم الطالب</th>
        <th>ارسال الوظيفه</th>

      </tr>
    </thead>
    <tbody>

      <?php
      $host = "145.14.156.52";
      $user = "u581844335_v9FuU";
      $pass = "MHDE%43219i";
      $dbname = "u581844335_2uHFH";

      $con = mysqli_connect($host, $user, $pass, $dbname);

      if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
      }
      if (isset($_POST['login'])) {
        $mas1 = $_POST['mas1'];
        $mas2 = $_POST['mas2'];

        if (!empty($mas1)) {
          mysqli_query($con, "UPDATE massges SET massage1='$mas1' WHERE id = 1");
        }
        if (!empty($mas2)) {
          mysqli_query($con, "UPDATE massges SET massage2='$mas2' WHERE id = 1");
        }
      }
      mysqli_set_charset($con, "utf8");
      $GroubNumber = $_POST['GroubNumber'];
      $WhatGroub;
      switch ($GroubNumber) {
        case 1:
          $WhatGroub = "squad1";
          break;
        case 2:
          $WhatGroub = "squad2";
          break;
        case 3:
          $WhatGroub = "squad3";
          break;

        default:
          header("Location: c1.php");
      }
      //استدعاء الرسائل
      $resultMassage = mysqli_query($con, "SELECT massage1,massage2 FROM massges");
      $rowMassage = mysqli_fetch_assoc($resultMassage);

      $massage1 = $rowMassage['massage1'];
      $massage2 = $rowMassage['massage2'];
      $result = mysqli_query($con, "SELECT studentName,motherNo,lastHomeWork,alhadithAlakhir FROM $WhatGroub");

      while ($row = mysqli_fetch_array($result)) {
        $name = $row['studentName'];
        $phone_number = $row['motherNo'];
        $lastHomeWork = $row['lastHomeWork'];
        $alhadithAlakhir = $row['alhadithAlakhir'];

        $resultAlhdith = mysqli_query($con, "SELECT alhadith FROM a40 WHERE id = '$alhadithAlakhir'");
        $rowAlhdith = mysqli_fetch_array($resultAlhdith);
        $Alhdith = $rowAlhdith['alhadith'];

        ?>
        <tr>
          <td>
            <?php echo $row['studentName']; ?>
          </td>
          <td>
            <button class="bt">
              <?php echo '<a href="http://api.whatsapp.com/send?phone=972' . $phone_number . '&text=' . $massage1 . $lastHomeWork . $massage2 . $alhadithAlakhir . $Alhdith . '&type=phone_number&app_absent=0"class="wa_btn">ارسال </a>'; ?>
            </button>
          </td>

        </tr>
      <?php } ?>
    </tbody>
  </table>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap");

    .login {
      grid-area: login;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      background: white;
    }


    .text-input {
      background: #e6e6e6;
      height: 40px;
      display: flex;
      width: 60%;
      align-items: center;
      border-radius: 10px;
      padding: 0 15px;
      margin: 5px 0;
    }

    .text-input input {
      background: none;
      border: none;
      outline: none;
      width: 100%;
      height: 100%;
      margin-left: 10px;
    }

    ::placeholder {
      color: #9a9a9a;
    }

    .login-btn {
      width: 170px;
      padding: 10px;
      color: white;
      background: linear-gradient(to right, #ff966d, #fa538d, #89379c);
      border: none;
      border-radius: 20px;
      cursor: pointer;
      margin-top: 10px;
      margin-bottom: 20px;
    }


    .bt {
      width: 100px;
      padding: 5px;
      color: white;
      background: linear-gradient(to right, #30ff39, #00ff16, #49e256);
      border: none;
      border-radius: 20px;
      cursor: pointer;
      margin-top: 10px;
      margin-bottom: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    * {
      font-family: "Tajawal", sans-serif;
    }

    .fa-whatsapp:before {
      color: #4caf50;
      padding-right: 5px;
      font-size: 20px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      font-family: "Arial", sans-serif;
      direction: rtl;
      text-align: right;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    input[type="text"] {
      width: 100%;
      padding: 6px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 4px;
      cursor: pointer;
      background: none;
      outline: none;
    }

    a {
      font-size: 12px;
      color: #f2f2f2;
      cursor: pointer;
      user-select: none;
      text-decoration: none;
    }
  </style>
</body>

</html>