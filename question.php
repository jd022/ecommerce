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
            <div class="card d-flex align-content-center justify-content-center align-items-center" style="width: 60vw; height: 25rem; border-radius: 0; border: none; font-family: var(--nunito); overflow:hidden;">
            <h6 class="pt-5 p-2 d-flex justify-content-center align-content-center h4" style="font-weight: 200;">WHAT IS YOUR NAME?</h6>
            <h4 class="pt-3 d-flex justify-content-center align-content-center h5" style="font-weight: 100; ">Enter the full name of your account.</h4>
                <span class="py-5 px-5 w-75 d-flex align-content-center justify-content-evenly">
                <form action="" method="POST">
                    <input type="text" name="first_name" class="email-input" maxlength="15" placeholder="FIRST NAME">
                    <input type="text" name="last_name" class="email-input" maxlength="15" placeholder="LAST NAME">
                </span>
                <div class="container">
		   <div class="text-center py-1"><br>
		   <a href="index.php" class="btn">CANCEL</a>
		   <button class="btn btn-dark" name="submit" style="border-radius: 0;">SUBMIT</button>
            </form>
		   </div>

            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        $first_name = ucwords($_POST['first_name']);
        $last_name = ucwords($_POST['last_name']);

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

        $check_names = "SELECT * FROM `user` WHERE email = '$decrypted_email'";
        $query_check_names = mysqli_query($conn, $check_names);
        if(mysqli_num_rows($query_check_names) > 0){
            $rows = mysqli_fetch_array($query_check_names);
            if($rows['first_name'] == $first_name && $rows['last_name'] == $last_name){
                header("location:reset.php?e=$email");
                exit();
            }else{
            echo '<script>alert("Incorrect first name or last name")</script>';
            exit();
            }
        }else{
            echo '<script>alert("Account not found")</script>';
            exit();
        }
    }
?>