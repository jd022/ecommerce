<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:login.php");
    exit();
}else{
    $email = $_SESSION['email'];
}
?>
<?php
    if(isset($_POST['cPassword'])){
        date_default_timezone_set('Asia/Manila');
		$date_time_updated = date("Y-m-d H:i:s");

        $c_password = $_POST['c_password'];
        $password = $_POST['password'];
        $r_password = $_POST['r_password'];

        // hashed password
        $password = password_hash($password,PASSWORD_DEFAULT);
        
        echo $password;
        if(empty($c_password) && empty($password) && empty($r_password)){
            echo '<script>alert("Please input the required info")</script>';
            exit
        }
        if(empty($c_password)){
            echo '<script>alert("Please input your current password")</script>';
            exit();
        }
        if(empty($password)){
            echo '<script>alert("Please input your password")</script>';
            exit();
        }
        if(empty($r_password)){
            echo '<script>alert("Please input your password")</script>';
            exit();
        }
    }
?>