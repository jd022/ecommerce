<?php
include ("connection.php");
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
    <div class="container mt-2 pt-4 p-1 d-flex flex-column align-items-center justify-content-center">
            <div class="card" style="width: 60vw; height: 25rem; border-radius: 0; border: none; font-family: var(--nunito); overflow:hidden;">
            <h6 class="pt-5 p-2 d-flex justify-content-center align-content-center h4" style="font-weight: 200;">Please check if your email is here</h6>
            <hr style="background: rgba(0, 0, 0, 0.8); border: 1px solid rgba(0, 0, 0, 0.8); width:100%;">
            <h4 class="pt-5 d-flex justify-content-center align-content-center h5" style="font-weight: 100; ">
            <a class="text-decoration-none color: text-black" href="auth_code.php?e=<?php echo $encryption;?>"><?php echo $rows_email;?></a>
            </h4>
            <h3 class="pt-5 d-flex justify-content-center align-content-center h5"><a href="index.php" class="btn">Back</a></h3>
    
    <?php
        }else{
            ?>
            <div class="container mt-2 pt-4 p-1 d-flex flex-column align-items-center justify-content-center">
            <div class="card" style="width: 60vw; height: 25rem; border-radius: 0; border: none; font-family: var(--nunito); overflow:hidden;">
            <h6 class="pt-5 p-2 d-flex justify-content-center align-content-center h4" style="font-weight: 200;">EMAIL NOT FOUND</h6>
            <h4 class="pt-5 d-flex justify-content-center align-content-center h5" style="font-weight: 100; ">Sorry your email is not registered.</h4>
            <h3 class="pt-5 d-flex justify-content-center align-content-center h5"><a href="index.php" class="btn">Back</a></h3>
            <?php
        }
        ?>
           <?php
    }else{
    ?>
            <div class="container mt-2 pt-4 p-1 d-flex flex-column align-items-center justify-content-center">
            <div class="card" style="width: 60vw; height: 25rem; border-radius: 0; border: none; font-family: var(--nunito); overflow:hidden;">
            <h6 class="pt-5 p-2 d-flex justify-content-center align-content-center h4" style="font-weight: 200;">FIND YOUR ACCOUNT</h6>
            <h4 class="pt-5 d-flex justify-content-center align-content-center h5" style="font-weight: 100; ">Please enter your email to find your account.</h4>
            <form action="" method="POST">
            <span class="mb-2 mt-4 d-flex align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="28" fill="black" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                <input type="email" name="email" class="py-1 mx-2" placeholder="Email">
             </span>    
             <div class="container">
		  <div class="text-center py-4">
		   <a href="index.php" class="btn">CANCEL</a>
		   <button class="btn btn-dark" name="submit" style="border-radius: 0;">SEARCH</button>
		  </div>
            </form> 
        </div>

        <?php }?>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>