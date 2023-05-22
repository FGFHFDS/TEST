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
	
	
	
	
	
	
	
	
	
	
	
	*{
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

input[type="checkbox" i] {
    
}

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

	</style>>

</head>

<body>
	<?php
		$date = date("d_m_Y");
		echo "<h1> $date : تسجيل الحضور والغياب لتاريخ</h1>;"?>
	<form method="POST" action="a3.php">
		<table>
			<thead>
				<tr>
					<?php echo"<th>الاسم</th>"; ?>
					<th>الحضور</th>
					<th>الغياب</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$date = date("d_m_Y");
				// اتصال بقاعدة البيانات
				$servername = "145.14.156.52";
				$username = "u581844335_v9FuU";
				$password = "MHDE%43219i";
				$dbname = "u581844335_2uHFH";


				$conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}

				$GroubNumber = $_POST['GroubNumber'];

				$attendanceNum;
				$WhatGroub;
				switch ($GroubNumber) {
					case 1:
						$WhatGroub = "squad1";
						$attendanceNum = "attendance1";
						break;
					case 2:
						$WhatGroub = "squad2";
						$attendanceNum = "attendance2";

						break;
					case 3:
						$WhatGroub = "squad3";
						$attendanceNum = "attendance3";
						break;

					default:
						header("Location: a1.php");
				}

				// استدعاء أسماء الطلاب
				$sql = "SELECT studentName FROM $attendanceNum";
				$result = $conn->query($sql);

				// عرض أسماء الطلاب وإنشاء خانات اختيار للحضور أو الغياب
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row["studentName"] . "</td>";
						// echo "<td><input type='heddin' name='attendanceNum' value='$attendanceNum'></td>";
						echo "<td><input type='checkbox' name='attendance[" . $row["studentName"] . "]' value='حاضر'></td>";
						echo "<td><input type='checkbox' name='attendance[" . $row["studentName"] . "]' value='غائب'></td>";
						echo "</tr>";
					}

				} else {
					echo "<tr><td colspan='3'>لا توجد بيانات</td></tr>";
				}
				$conn->close();
				?>
			</tbody>
		</table>
		<button type="submit" name="save">حفظ</button>
	</form>
</body>

</html>

