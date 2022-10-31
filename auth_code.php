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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



        function sendMail($decrypted_email,$first_name,$otp){
        require ("PHPMailer.php");
        require("SMTP.php");
        require("Exception.php");


            
            try {

                $mail = new PHPMailer(true);
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'smadiccu@gmail.com';                     //SMTP username
                $mail->Password   = 'fbikgzomkaxqtvqo';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('smadiccu@gmail.com', 'Coozy');//wait si dali
                $mail->addAddress($decrypted_email);
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

    $check_email = "SELECT * FROM `user` WHERE email = '$decrypted_email'";
    $query_check_email = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($query_check_email) > 0){
        $rows = mysqli_fetch_array($query_check_email);
        $f_name = $rows['first_name'];
        
        // otp format
        $date = date('ymd');
        $rand = rand('0000', '9999');
        $otp = "".$date."".$rand."";

        $update_otp = "UPDATE `user` SET otp = '$otp' WHERE email = '$decrypted_email'";
        $query_update_otp = mysqli_query($conn, $update_otp);
        if($query_update_otp == true){
            sendMail($decrypted_email, $f_name, $otp);
            header("location:auth.php?e=$email");
            exit();
        }else{
            echo $conn->error;
        }
    }else{
        echo "Account not found";
        exit();
    }
?>