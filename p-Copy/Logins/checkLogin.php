
    <?php
    $host = "145.14.156.52";
    $user = "u581844335_v9FuU";
    $pass = "MHDE%43219i";
    $dbname = "u581844335_2uHFH";
    
    // $host = "localhost";
    // $user = "root";
    // $pass = "";
    // $dbname = "squad1";

    $con = mysqli_connect($host, $user, $pass, $dbname);
    mysqli_set_charset($con, "utf8");
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    session_start();
    $username = $_POST['username'];  
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE inguwi_username='$username' AND inguwi_password='$password'";
    
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) {  
        // User exists
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username; 
        header("Location: ../index.php");
        exit;
    } else {
        // Invalid username or password   
        session_destroy();      
        header("Location: login.php");
    } 
    
    ?>
    
    