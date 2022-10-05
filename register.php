<?php
include ("connection.php");
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
                $mail->Username   = 'teamagnat7@gmail.com';                     //SMTP username
                $mail->Password   = 'tqgacspjvfsoynuj';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('teamagnat7@gmail.com', 'Coozy');//wait si dali
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
    <title>Document</title>
</head>
<body class="bg-maroon">
    <div class="container px-0 vh-100 d-flex flex-column align-items-end justify-content-center">
        <div class="card" style="width: 60vw; height: auto; border-radius: 0;">
            <div class="card-body py-0 px-2" style="border: none; overflow: hidden;">
                <div class="row d-flex justify-content-end align-items-end" style="background:url(src/img/CoozyLogo.png); background-repeat: no-repeat; background-size: 50% 100%; z-index: 000;">
                     <!-- Logo div -->
                        <!-- <span class="container logo" style="position: absolute; left: -1.3%; top: 50%; border:none; padding: 0; z-index: 10000; transform:translateY(-50.2%)">
                            <img class="img-fluid" src="src/img/CoozyLogo.png" alt="" style="height: 30rem;">
                        </span> -->
                    <!-- Logo End -->
                    <div class="col-6 d-flex justify-content-center align-items-start flex-column">
                    <h4 class="mb-2 pt-3" style="font-weight: 700;">Sign Up<br><hr class="featurette-divider my-0 mt-1" style="width:3vw; border: 1px solid black; opacity: 1; background: black;
                            border: 1px solid black;"></hr></h4>
                        <form action="" class="row px-2 gy-2 my-5" method="POST">
                            <span class="col-6 hstack">
                                <input type="text" class="py-1 px-2 w-100" name="first_name" style="font-weight: 700;" placeholder="First Name">
                            </span>
                            <span class="col-6">
                            <input type="text" class="py-1 px-2 w-100" name="last_name" style="font-weight: 700;" placeholder="Last Name">

                            </span>
                            <span class="col-12">
                                <input type="text" class="py-1 px-2 w-100" name="address" style="font-weight: 700;" placeholder="Address">
                            </span>
                            <span class="col-6">
                                <input type="text" class="py-1 px-2 w-100" name="p_code" style="font-weight: 700;" placeholder="Postal Code">
                            </span>
                            <span class="col-6">
                                <input type="text" class="py-1 px-2 w-100" name="brgy_no" style="font-weight: 700;" placeholder="Brgy. No.">
                            </span>
                            <span class="col-12">
                                <input type="text" class="py-1 px-2 w-100" name="email" style="font-weight: 700;" placeholder="Email">
                            </span>
                            <span class="col-12">
                                <input type="text" class="py-1 px-2 w-100" name="password"style="font-weight: 700;"  placeholder="Password">
                            </span>
                            <span class="col-12">
                                <input type="text" class="py-1 px-2 w-100" name="c_password" style="font-weight: 700;" placeholder="Re-enter Password">
                            </span>
                            <span class="col-7 px-3 d-flex align-items-center">
                                <small><a href="Login.html" class="text-dark text-decoration-none" style="font-weight: 600;">Already have an account?</a></small>
                            </span>
                            <span class="col-5 px-3 text-end">
                                <input type="submit" name="" id="" class="btn btn-dark" style="border-radius: 0;" name="register" value="Submit">
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


        // Checking if the field boxes is empty
        if(empty($first_name) && empty($last_name) && empty($address) && empty($p_code) && empty($brgy_no)
            && empty($email) && empty($password) && empty($c_password)){
            echo "You must fill up the required info";
            exit();
        }

        if(empty($first_name)){
            echo "First name is required";
            exit();
        }else if(empty($last_name)){
            echo "Last name is required";
            exit();
        }else if(empty($address)){
            echo "Address is required";
            exit();
        }else if(empty($p_code)){
            echo "Postal code is required";
            exit();
        }else if(empty($brgy_no)){
            echo "Brgy number is required";
            exit();
        }else if(empty($email)){
            echo "Email is required";
            exit();
        }else if(empty($password)){
            echo "Password is required";
            exit();
        }else if(empty($c_password)){
            echo "Confirm your password";
            exit();
        }

        // Validation if the password and re enter password is not match
        if($_POST['password'] != $c_password){
            echo "Password do not match";
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
            echo "Account already registered";
            exit();
        }else{
        $insert_account = "INSERT INTO `user`(`first_name`, `last_name`, `address`, `p_code`, `brgy_no`, `email`, `password`, `validation`, `otp`, `date_time_created`) 
        VALUES ('$first_name','$last_name','$address','$p_code','$brgy_no','$email','$password','$validation','$otp','$date_time_created')";
        $query_insert_account = mysqli_query($conn, $insert_account);
        if($query_insert_account){
            sendMail($email, $first_name, $otp);
            header("location:otp.php?e=$encryption");
            exit();
        }
        }

        
    }
?>