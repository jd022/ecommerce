<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
}
?>
<?php
if(isset($_GET['e']) && isset($_GET['fn']) && isset($_GET['ln'])){
    $email = $_GET['e'];
    $fist_name = $_GET['fn'];
    $last_name = $_GET['ln'];
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
     $e_email = openssl_encrypt($email, $ciphering,
                 $encryption_key, $options, $encryption_iv);
     // Use openssl_encrypt() function to encrypt the data
     $e_first_name = openssl_encrypt($fist_name, $ciphering,
                 $encryption_key, $options, $encryption_iv);
    // Use openssl_encrypt() function to encrypt the data
     $e_last_name = openssl_encrypt($last_name, $ciphering,
                 $encryption_key, $options, $encryption_iv);

    echo "<script>window.location.href='settings.php?en_e=$e_email&fn=$e_first_name&ln=$e_last_name'</script>";
    exit();
}
?>