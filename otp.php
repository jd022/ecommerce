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
    <link rel="stylesheet" href="style.css">
    <title>Coozy Apparel.</title>
</head>
<body>
    <div class="nav-container">
        <ul class="navbar">
            <li class="navitem">
                <a href="#">HOME</a>
            </li>
            <li class="navitem">
                <a href="#">CONTACT</a>
            </li>
            <li class="navitem">
                <a href="#">ABOUT US</a>
            </li>
        </ul>
    </div>
    <section class="container">
        <h1>Email Verification</h1>
        <h6>We sent a verification code through your email. 
        <br>Please check your email to enter your pin number.</h6>
        <form class="pin" action="" method="POST">
        <span class="al"><svg xmlns="http://www.w3.org/2000/svg" width="27" height="23" viewBox="0 0 24 24" style="fill: rgb(0, 0, 0);transform:msFilter;"><path d="M20 12c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5S7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7z"></path></svg>
                <input type="text" name="" placeholder="PIN"></span>
            <a href="" class="rsnd">RESEND</a>
            <span class="button-section">
                <a href="" class="cncl">CANCEL</a>
                <button class="Enter">ENTER</button>
            </span>
        </form>
    </section>
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