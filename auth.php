<?php
include ("connection.php");
if(isset($_GET['e'])){
    $email = $_GET['e'];
}else{
    echo "error";
    exit();
}
if(empty($_GET['e'])){
    header("location:index.php");
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
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Coozy Apparel.</title>
</head>
<style>
     body {
        font-family: var(--sanchez);
     }
</style>
<body class="bg-maroon">
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../ecommerce/src/img/logo.png" width="150" alt="" sizes="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active" style="font-size: 22px;">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item" style="font-size: 22px;">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item" style="font-size: 22px;">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
            <div class="container mt-2 pt-4 p-1 d-flex flex-column align-items-center justify-content-center">
            <div class="card d-flex align-items-center justify-content-center" style="width: 60vw; height: 25rem; border-radius: 0; border: none; font-family: var(--nunito); overflow:hidden;">
            <h6 class="pt-5 p-0 d-flex justify-content-center align-content-center h4" style="font-weight: 200;">VERIFICATION CODE</h6>
            <p class="pt-5 d-flex justify-content-center align-content-center h6" style="font-weight: 100; ">Please check your email to enter OTP.</p>
            <span class="d-flex justify-content-center align-content-center">Email: <?php echo $decrypted_email;?></span>
            <span class="mt-4 d-flex flex-column align-items-center justify-content-center">
                <form action="" method="POST">
                <input type="text" name="otp" class="email-input" placeholder="OTP CODE">
                <div class="container">
                <div class="text-center py-5 pt-0 mt-2">
                <a href="auth_code.php?e=<?php echo $email;?>" class="text-decoration-none color: text-black">RESEND</a>
                <button name="submit" class="btn btn-dark" style="border-radius: 0;">ENTER</button>
                <br><a href="question.php?e=<?php echo $email;?>" class="text-decoration-none color: text-black">Choose different method</a>
                </form>
		  </div>

          
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>

<?php
    if(isset($_POST['submit'])){
        $otp = $_POST['otp'];

        if(empty($_POST['otp'])){
            echo '<script>alert("Please enter the otp number")</script>';
            exit();
        }

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
            echo '<script>alert("Something went wrong")</script>';
            exit();
            }
        }else{
            echo '<script>alert("Invalid OTP number")</script>';
            exit();
        }
    }
?>