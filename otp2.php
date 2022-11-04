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
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <link rel="icon" type="image/png" href="src/img/favicon.png">
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
              <div class="container mt-2 pt-4 d-flex flex-column align-items-center justify-content-center">
            <div class="card d-flex align-items-center justify-content-center" style="width: 60vw; height: 25rem; border-radius: 0; border: none; font-family: var(--nunito); overflow:hidden;">
            <h6 class="pt-0 p-4 mb-0 d-flex justify-content-center align-content-center h5" style="font-weight: 300;">EMAIL VERIFICATION</h6>
            <p class="pt-1 p-5 mb-0 d-flex justify-content-center align-content-center h6" style="font-weight: 100; ">We sent a verification code through your email. 
             <br>Please check your email to enter your pin number.</p>
            <form action="" method="POST">
            <span class="mt-1 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);">
            <path d="M20 12c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5S7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7z"></path></svg>
            <input type="text" name="otp" class="pt-1 m-auto m-1" maxlength="15" placeholder="PIN">
            </span>
            <span class="d-flex align-content-start justify-content-start">
            <a href="otp_code.php?e=<?php echo $email;?>" class="px-4 m-2 mt-1 text-decoration-none color: text-black">RESEND</a>
            </span>
            <div class="container">
		   <div class="text-center py-4 d-flex align-items-end justify-content-end"><br>
		   <a href="index.php" class="btn py-1 mt-3">CANCEL</a>
		   <button class="btn btn-dark px-1" name="submit" style="border-radius: 0;">ENTER</button>
            </form>
		   </div> 
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        $otp = $_POST['otp'];
        
        if(empty($otp)){
            echo '<script>alert("Fill up the required form!")</script>';
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
                    echo "<script>alert('Your email has been verified!');
                    window.location.href='index.php'</script>";
                }
            }else{
                echo $conn->error;
                exit();
            }
        }else{
            echo '<script>alert("Incorrect OTP Number!")</script>';
            exit();
        }
    }
?>