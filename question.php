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
    <link rel="stylesheet" href="src/styles/css/style.css">
    <title>Coozy Apparel.</title>
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
            <h1>What is your name?</h1>
            <p style="margin-bottom: 10px;">Enter the full name of your account</p>
            <form class="email" action="" method="POST">
                <span style="display: flex; flex-direction: row; margin-bottom:12px ;">
                    <input type="text" name="first_name" class="email-input" maxlength="15" placeholder="FIRST NAME">
                    <input type="text" name="last_name" class="email-input" maxlength="15" placeholder="LAST NAME">
                </span>
                <a href="index.php">Cancel</a>
                <button type="submit" name="submit" style="padding: 6px 12px;">Submit</button>
            </form>
        </div>
    </div>
   
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];

        if(empty($first_name) && empty($last_name)){
            echo '<script>alert("Please input the required info")</script>';
            exit();
        }
        if(empty($first_name)){
            echo '<script>alert("Please input your account first name")</script>';
            exit();
        }
        if(empty($last_name)){
            echo '<script>alert("Please input your account last name")</script>';
            exit();
        }

        $check_names = "SELECT * FROM `user` WHERE email = '$decrypted_email' AND first_name = '$first_name'
        AND last_name = '$last_name'";
        $query_check_names = mysqli_query($conn, $check_names);
        if(mysqli_num_rows($query_check_names) > 0){
            header("location:reset.php?e=$email");
            exit();
        }else{
            echo "Account not found";
            exit();
        }
    }
?>