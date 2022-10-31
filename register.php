<?php
include ("connection.php");
ob_start();
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



        function sendMail($email,$first_name,$otp){
        require ("PHPMailer.php");
        require("SMTP.php");
        require("Exception.php");


            
            try {

                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'moonfangluna189@gmail.com';                     //SMTP username
                $mail->Password   = 'vwcodlmsuhmfxche';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('moonfangluna189@gmail.com', 'Coozy');//wait si dali
                $mail->addAddress($email);
                // $mail->addAttachment($path);       //Add a recipient
            
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Testing';
                $mail->Body    = "TRY OTP: $otp <br> Name: $first_name";
    
                $mail->send();
                return true;
            } 
            catch (Exception $e) {
                return false;
            }

    
   
                    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
    <link rel="icon" type="image/png" href="src/img/favicon.png">
    <title>Coozy Apparel.</title>
</head>
<style>
    body{
        font-family: var(--sanchez);
    }
</style>
<body class="bg-maroon">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../ecommerce/src/img/logo.png" width="160" alt="" sizes="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="font-size: 20px;">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container px-0 pt-3 d-flex flex-column align-items-end justify-content-center">
        <div class="card" style="width: 50vw; height: 30rem; border-radius: 0; border:none; font-family: var(--poppins);">
            <div class="card-body py-0 px-2" style="border: none; overflow: hidden;">
                <div class="row d-flex justify-content-end align-items-end" style="background:url(src/img/CoozyLogo.png); background-repeat: no-repeat; background-size: 50% 100%; height: 100%; z-index: 000;">
                     <!-- Logo div -->
                        <!-- <span class="container logo" style="position: absolute; left: -1.3%; top: 50%; border:none; padding: 0; z-index: 10000; transform:translateY(-50.2%)">
                            <img class="img-fluid" src="src/img/CoozyLogo.png" alt="" style="height: 30rem;">
                        </span> -->
                    <!-- Logo End -->
                    <div class="col-6 d-flex justify-content-center align-items-start flex-column">
                        <h4 class="mb-2" style="font-weight: 700;">SIGN UP<br><hr class="featurette-divider my-0 mt-1" style="width:3vw; opacity: 1; background: black;border: 1px solid black;"></hr></h4>
                        <form action="" class="row px-2 gy-2 my-5" method="POST">
                            <span class="col-6 hstack">
                                <input type="text" class="py-1 px-2 w-100" name="first_name" style="font-weight: 700;" maxlength="15" placeholder="First Name">
                            </span>
                            <span class="col-6">
                            <input type="text" class="py-1 px-2 w-100" name="last_name" style="font-weight: 700;" maxlength="15" placeholder="Last Name">

                            </span>
                            <span class="col-12">
                                <input type="text" class="py-1 px-2 w-100" name="address" style="font-weight: 700;" maxlength="50" placeholder="Address">
                            </span>
                            <span class="col-6">
                                <input type="text" class="py-1 px-2 w-100" name="p_code" style="font-weight: 700;" maxlength="10" placeholder="Postal Code">
                            </span>
                            <span class="col-6">
                                <input type="text" class="py-1 px-2 w-100" name="brgy_no" style="font-weight: 700;" maxlength="10" placeholder="Brgy. No.">
                            </span>
                            <span class="col-12">
                                <input type="text" class="py-1 px-2 w-100" name="email" style="font-weight: 700;" maxlength="50" placeholder="Email">
                            </span>
                            <span class="col-12">
                                <input type="password" class="py-1 px-2 w-100" name="password"style="font-weight: 700;"  maxlength="50" placeholder="Password">
                            </span>
                            <span class="col-12 mb-1">
                                <input type="password" class="py-1 px-2 w-100" name="c_password" style="font-weight: 700;" maxlength="50" placeholder="Re-enter Password">
                            </span>
                            <span class="col-7 px-3 d-flex align-items-center">
                                <small><a href="index.php" class="text-dark text-decoration-none" style="font-weight: 600;">Already have an account?</a></small>
                            </span>
                            <span class="col-4 px-3 d-flex align-items-center justify-content-end">
                                <input type="submit" name="submit" id="" style="border-radius: 0; background: none; border: none; font-weight: bolder;" value="ENTER">
                            </span>
                        </form>
                    </div>
                    <!-- Form column end -->
                </div>
                <!-- row end -->
            </div>
            <!-- card body end -->
        </div>
        <!-- card end -->
    </div>
    <!-- container end -->
</body>
</html>
<?php
    if(isset($_POST['register'])){

        date_default_timezone_set('Asia/Manila');
        $date_time_created = date('Y-m-d H:i:s');

        $first_name = ucwords($_POST['first_name']);
        $last_name = ucwords($_POST['last_name']);
        $address = $_POST['address'];
        $p_code = $_POST['p_code'];
        $brgy_no = $_POST['brgy_no'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        // hashed password
        $password = password_hash($password,PASSWORD_DEFAULT);

        // default value of fresh user account for validation
        $validation = 0;

        // otp format
        $date = date('ymd');
        $rand = rand('0000', '9999');
        $otp = "".$date."".$rand."";
        $uid = rand('000000', '999999').$date;

        $validate_p_code = filter_input(INPUT_POST, 'p_code', FILTER_VALIDATE_FLOAT);

        $validate_brgy_no = filter_input(INPUT_POST, 'brgy_no', FILTER_VALIDATE_FLOAT);

        $validate_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        // Checking if the field boxes is empty
        if(empty($first_name) && empty($last_name) && empty($address) && empty($p_code) && empty($brgy_no)
            && empty($email) && empty($password) && empty($c_password)){
            echo "You must fill up the required info";
            exit();
        }


        if(empty($first_name)){
            echo '<script>alert("First name is required")</script>';
            exit();
        }else if(strlen($first_name) > 15){
            echo '<script>alert("First name must not be exceeds in 15 characters")</script>';
            exit();
        }else if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
            echo '<script>alert("First name must be letters only")</script>';
            exit();
        }else if(empty($last_name)){
            echo '<script>alert("Last name is required")</script>';
            exit();
        }else if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
            echo '<script>alert("Last name must be letters only")</script>';
            exit();
        }else if(strlen($last_name) > 15){
            echo '<script>alert("Last name must not be exceeds in 15 characters")</script>';
            exit();
        }else if(empty($address)){
            echo '<script>alert("Address is required")</script>';
            exit();
        }else if(strlen($address) > 50){
            echo '<script>alert("Address must not be exceeds in 50 characters")</script>';
            exit();
        }else if(empty($p_code)){
            echo '<script>alert("Postal code is required")</script>';
            exit();
        }else if($validate_p_code == false){
            echo '<script>alert("Invalid postal code")</script>';
            exit();
        }else if(empty($brgy_no)){
            echo '<script>alert("Brgy number is required")</script>';
            exit();
        }else if($validate_brgy_no == false){
            echo '<script>alert("Invalid brgy number")</script>';
            exit();
        }else if(empty($email)){
            echo '<script>alert("Email is required")</script>';
            exit();
        }else if(strlen($email) > 50){
            echo '<script>alert("Email must not be exceeds in 50 characters")</script>';
            exit();
        }else if($validate_email == false){
            echo '<script>alert("Invalid email format")</script>';
            exit();
        }else if(empty($_POST['password'])){
            echo '<script>alert("Password is required")</script>';
            exit();
        }else if(strlen($_POST['password']) > 50){
            echo '<script>alert("Email must not be exceeds in 50 characters")</script>';
            exit();
        }else if(empty($c_password)){
            echo '<script>alert("Confirm your password")</script>';
            exit();
        }

        // Validation if the password and re enter password is not match
        if($_POST['password'] != $c_password){
            echo '<script>alert("Password do not match")</script>';
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

        $validate_account = "SELECT * FROM `user` WHERE email = '$email'";
        $query_validate_account = mysqli_query($conn, $validate_account);
        if(mysqli_num_rows($query_validate_account) > 0){
            echo '<script>alert("Email already exist")</script>';
            exit();
        }else{
        $insert_account = "INSERT INTO `user`(`user_id`, `first_name`, `last_name`, `address`, `p_code`, `brgy_no`, `email`, `password`, `validation`, `otp`, `date_time_created`) 
        VALUES ('$uid', '$first_name','$last_name','$address','$p_code','$brgy_no','$email','$password','$validation','$otp','$date_time_created')";
        $query_insert_account = mysqli_query($conn, $insert_account);
        if($query_insert_account){
            sendMail($email, $first_name, $otp);
            header("location:otp.php?e=$encryption");
            exit();
        }
        }

        
    }
?>