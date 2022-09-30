<?php
include ("connection.php");
if(isset($_GET['e'])){
    $email = $_GET['e'];
}else{
    echo "error";
    exit();
}
if(empty($_GET['e'])){
    header("location:login.php");
    exit();
}
?>
<?php
// Store the cipher method
$ciphering = "AES-128-CTR";
$options = 0;
// Non-NULL Initialization Vector for decryption
$decryption_iv = '1234567891011121';

// Store the decryption key
$decryption_key = "TeamAgnat";

// Use openssl_decrypt() function to decrypt the data
$decrypted_email=openssl_decrypt ($_GET['e'], $ciphering,
    $decryption_key, $options, $decryption_iv);
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
    <h1>Change Password</h1>
    <p>It`s a good idea to use a strong password that <br> you`re not using elsewhere.</p>
    <form action="" method="POST">
        <input type="password" name="password" placeholder="PASSWORD">
        <input type="password" name="c_password" placeholder="RE-ENTER PASSWORD">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        
        // hashed password
        $password = password_hash($password,PASSWORD_DEFAULT);

        if($_POST['password'] != $c_password){
            echo "Password do not match";
            exit();
        }

        $update_password = "UPDATE `user` SET password = '$password' WHERE email = '$decrypted_email'";
        $query_update_password = mysqli_query($conn, $update_password);

        if($query_update_password == true){
            header("location:login.php");
            exit();
        }else{
            echo $conn->error;
            exit();
        }
    }
?>