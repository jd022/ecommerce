<?php
include ("connection.php");
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
    <?php
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        
        $retrieve_email = "SELECT * FROM `user` WHERE email = '$email'";
        $query_retrieve_email = mysqli_query($conn, $retrieve_email);
        if(mysqli_num_rows($query_retrieve_email) > 0){
            $rows = mysqli_fetch_array($query_retrieve_email);
            $rows_email = $rows['email'];

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
         $encryption = openssl_encrypt($rows_email, $ciphering,
                     $encryption_key, $options, $encryption_iv);
    ?>
    <h1>Please check if your email is here</h1>
    <a href="auth_code.php?e=<?php echo $encryption;?>"><?php echo $rows_email;?></a>
    <?php
        }else{
            ?>
            <h1>Email Not Found</h1>
            <p><a href="login.php">Back</a></p>
            <?php
        }
    }else{
    ?>
    <h1>Find your account</h1>
    <p>Please enter your email to find your account.</p>
    <form action="" method="POST">
        <input type="email" name="email" placeholder="EMAIL">
        <a href="login.php">Cancel</a>
        <button type="submit" name="submit">Search</button>
    </form>
    <?php
    }
    ?>
</body>
</html>