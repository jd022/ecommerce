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
            <div class="card" style="width: 60vw; height: 25rem; border-radius: 0; border: none; font-family: var(--nunito); overflow:hidden;">
            <h6 class="pt-5 p-2 d-flex justify-content-center align-content-center h4" style="font-weight: 200;">CHANGE PASSWORD</h6>
            <p class="pt-5 d-flex justify-content-center align-content-center h6" style="font-weight: 400; ">It's a good idea to use a strong password that you're not using elsewhere.</p>
            <form action="" method="POST">
            <span class="mb-2 pt-1 mt-4 d-flex align-items-center justify-content-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="40" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);"><path d="M20 12c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5S7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7z"></path></svg>
            <input type="password" name="password" class="email-input" maxlength="20" placeholder="PASSWORD">
             </span>
             <span class="mb-2 mt-1 d-flex align-items-center justify-content-center">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="35" height="35"><path fill-rule="evenodd" d="M12.077 2.563a.25.25 0 00-.154 0L3.673 5.24a.249.249 0 00-.173.237V10.5c0 5.461 3.28 9.483 8.43 11.426a.2.2 0 00.14 0c5.15-1.943 8.43-5.965 8.43-11.426V5.476a.25.25 0 00-.173-.237l-8.25-2.676zm-.617-1.426a1.75 1.75 0 011.08 0l8.25 2.675A1.75 1.75 0 0122 5.476V10.5c0 6.19-3.77 10.705-9.401 12.83a1.699 1.699 0 01-1.198 0C5.771 21.204 2 16.69 2 10.5V5.476c0-.76.49-1.43 1.21-1.664l8.25-2.675zM13 12.232A2 2 0 0012 8.5a2 2 0 00-1 3.732V15a1 1 0 102 0v-2.768z"></path></svg>
             <input type="password" name="c_password" class="email-input" maxlength="20" placeholder="RE-ENTER PASSWORD">
             </span>      
             <div class="container">
		  <div class="text-center py-4">
		   <a href="index.php" class="btn">CANCEL</a>
		   <button class="btn btn-dark" name="submit" style="border-radius: 0;">SAVE</button>
		   </div>
            </form> 
    </div>
</div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        
        // hashed password
        $password = password_hash($password,PASSWORD_DEFAULT);

        if($_POST['password'] != $c_password){
            echo '<script>alert("Password do not match")</script>';
            exit();
        }

        if(empty($_POST['password']) && empty($c_password)){
            echo '<script>alert("Please input the required info")</script>';
            exit();
        }
        if(empty($_POST['password'])){
            echo '<script>alert("Please input your password")</script>';
            exit();
        }
        if(empty($c_password)){
            echo '<script>alert("Please confirm your password")</script>';
            exit();
        }

        $update_password = "UPDATE `user` SET password = '$password' WHERE email = '$decrypted_email'";
        $query_update_password = mysqli_query($conn, $update_password);

        if($query_update_password == true){
            echo "<script>alert('Password updated');
                window.location.href='index.php'</script>";
                exit();
        }else{
            echo '<script>alert("Something went wrong")</script>';
            exit();
        }
    }
?>