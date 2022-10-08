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
    <link rel="stylesheet" href="src/styles/css/style.css">
    <title>Document</title>
</head>
<body>
<div class="nav-container">
        <ul class="navbar">
            <li class="navitem">
                <a href="home.php">HOME</a>
            </li>
            <li class="navitem">
                <a href="#">CONTACT</a>
            </li>
            <li class="navitem">
                <a href="#">ABOUT US</a>
            </li>
        </ul>
    </div>
    <div class="container-3">
        <div class="inner-wrapper">
            <h1 style="margin-bottom:1.7em;">Verification Code</h1>
            <p style="margin-bottom:15px;">Please check your email to enter your OTP.</p>
            <span>Email: <?php echo $decrypted_email;?></span>
            <form action="" method="POST" style="display: flex; flex-direction:column; text-align: center;">
                <span>
                    <input type="text" name="otp" class="email-input" placeholder="OTP CODE">
                    <button type="submit" name="submit" style="padding: 8px 12px;">Enter</button>
                </span>
               
                <a href="question.php?e=<?php echo $email;?>">Choose different method</a>
            </form>
        </div>
    </div>
    
   
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $otp = $_POST['otp'];

        // Store the cipher method
        $ciphering = "AES-128-CTR";

        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;

        // Non-NULL Initialization Vector for encryption
        $encryption_iv = '1234567891011121';

        // Store the encryption key
        $encryption_key = "TeamAgnat";

        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($email, $ciphering,
                    $encryption_key, $options, $encryption_iv);

        $validate_otp = "SELECT * FROM user WHERE otp = '$otp' AND email = '$decrypted_email'";
        $query_validate_otp = mysqli_query($conn, $validate_otp);
        if(mysqli_num_rows($query_validate_otp) > 0){
            $update_otp_zero = "UPDATE `user` SET otp = '' WHERE email = '$decrypted_email'";
            $query_otp_zero = mysqli_query($conn, $update_otp_zero);
            if($query_otp_zero == true){
                header("location:reset.php?e=$encryption");
                exit();
            }else{
                echo $conn->error;
            }
        }else{
            echo $conn->error;
        }
    }
?>