<?php
include ("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/css/style.css">
    <link rel="icon" type="image/png" href="src/img/favicon.png">
    <title>Coozy Apparel.</title>
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
            <h1 style="margin-bottom:12px;">Please check if your email is here</h1>
            <hr style="background: rgba(0, 0, 0, 0.8); border: 1px solid rgba(0, 0, 0, 0.8); width:70%; margin-bottom: 2em;">
            <a class="auth" href="auth_code.php?e=<?php echo $encryption;?>"><?php echo ucfirst($rows_email);?></a>
        </div>
    </div>
    
    <?php
        }else{
            ?>
            <div class="container-3">
        <div class="inner-wrapper">
        <h1>Email Not Found</h1>
            <p><a href="index.php">Back</a></p>
        </div>
        </div>
            <?php
        }
    }else{
    ?>
    
    <div class="nav-container">
        <ul class="navbar" style="font-size: 20px;">
            <li class="navitem">
                <a href="index.php">HOME</a>
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
            <h1>FIND YOUR ACCOUNT</h1>
            <h6>Please enter your email to find your account.</h6>
            <form class="email" action="" method="POST">
                <span class="account">
                    <label for="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="24" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                    </label>
                    <input type="email" name="email" class="email-input" maxlength="40" placeholder="EMAIL">
                </span>
                <span class="button-section">
                    <a href="login.php" class="cancel">CANCEL</a>
                    <button type="submit" name="submit" class="Enter">ENTER</button>
                </span>
            </form>
        </div>
    </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>