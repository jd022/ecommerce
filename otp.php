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
// Store the cipher method
$ciphering = "AES-128-CTR";
$options = 0;
// Non-NULL Initialization Vector for decryption
$decryption_iv = '1234567891011121';

// Store the decryption key
$decryption_key = "TeamAgnat";

// Use openssl_decrypt() function to decrypt the data
$decrypted_email=openssl_decrypt ($email, $ciphering,
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
    <h1>Email Verification</h1>
    <p>We sent a verification code through your email. <br>
        please check your email to enter your pin number.</p>
    <form action="" method="POST">
        <input type="text" name="otp" placeholder="OTP">
        <button type="submit" name="submit">Enter</button>
    </form>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $otp = $_POST['otp'];
        
        if(empty($otp)){
            echo "Fill up the required form";
            exit();
        }
        

        $check_otp_match = "SELECT * FROM `user` WHERE otp = '$otp' AND email = '$decrypted_email'";
        $query_check_otp_match = mysqli_query($conn, $check_otp_match);
        if(mysqli_num_rows($query_check_otp_match) > 0){
            $verify_account = "UPDATE `user` SET validation = 1 WHERE email = '$decrypted_email'";
            $query_verify_account = mysqli_query($conn, $verify_account);
            if($query_verify_account == true){
                $delete_otp = "UPDATE `user` SET otp = '' WHERE email = '$decrypted_email'";
                $query_delete_otp = mysqli_query($conn, $delete_otp);
                if($query_delete_otp == true){
                    echo "Account verified";
                }
            }else{
                echo $conn->error;
                exit();
            }
        }else{
            echo "Incorrect otp number";
            exit();
        }
    }
?>