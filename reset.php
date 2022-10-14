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
            <h1>Change Password</h1>
            <p>Tip: You'll want to use passwords that are long, strong, <br> and difficult for someone else to guess.</p>
            <form class="email" action="" method="POST">
                <span class="account">
                    <label for="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>     
                    </label>
                    <input type="password" name="password" class="email-input" placeholder="Password">
                </span>
                <span class="account">
                    <label for="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
                        </svg>   
                    </label>
                    <input type="password" name="c_password" class="email-input" placeholder="Re-enter Password">
                </span>
                <span class="button-section" style="text-align: center;">
                    <button type="submit" name="submit" class="Enter" style="padding: 6px 12px;">ENTER</button>
                </span>
            </form>
        </div>
    </div>
    
   
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        
        // hashed password
        $password = password_hash($password,PASSWORD_DEFAULT);

        if($_POST['password'] != $c_password){
            echo "Password do not match";
            exit();
        }

        $update_password = "UPDATE `user` SET password = '$password' WHERE email = '$decrypted_email'";
        $query_update_password = mysqli_query($conn, $update_password);

        if($query_update_password == true){
            header("location:login.php");
            exit();
        }else{
            echo $conn->error;
            exit();
        }
    }
?>