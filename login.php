<?php
include ("connection.php");
    session_start();
	if(isset($_SESSION['email'])){
	session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button type="submit" name="submit">Submit</button>
        <span><a href="retrieve.php">Forgot password?</a></span>
        <span><a href="register.php">Didn`t have an account yet?</a></span>
    </form>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];



    $check_account = "SELECT * FROM `user` WHERE email = '$email' and validation = 0";
    $query_check_account = mysqli_query($conn, $check_account);
    if(mysqli_num_rows($query_check_account) > 0){
        echo "Account is not yet verified";
        exit();
    }else{
    // for verified accounts
    $check_sql = "SELECT * FROM `user` WHERE email = '$email'";
    $query_check = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($query_check) > 0){
        $row = mysqli_fetch_array($query_check);
        if(password_verify($password, $row['password'])){
        $_SESSION['email'] = $row['email'];
        header("location:home.php");
        }else{
            echo "Incorrect credentials";
            exit();
        }
    }else{
        echo "Account not found";
        exit();
    }
    }
}
?>