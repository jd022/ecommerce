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
    <h1>What is your name?</h1>
    <p>Enter the full name of your account</p>
    <form action="" method="POST">
        <input type="text" name="first_name" placeholder="FIRST NAME">
        <input type="text" name="last_name" placeholder="LAST NAME">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        $check_names = "SELECT * FROM `user` WHERE email = '$decrypted_email' AND first_name = '$first_name'
        AND last_name = '$last_name'";
        $query_check_names = mysqli_query($conn, $check_names);
        if(mysqli_num_rows($query_check_names) > 0){
            header("location:reset.php?e=$email");
            exit();
        }else{
            echo "Account not found";
            exit();
        }
    }
?>