<?php
include ("connection.php");
    session_start();
	if(isset($_SESSION['email'])){
	session_destroy();
    }
ob_start();
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
<body class="bg-maroon">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="" alt="" sizes="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container px-0 pt-5 d-flex flex-column align-items-end justify-content-center">
        <div class="card" style="width: 50vw; height: 30rem; border-radius: 0; border: none; font-family: var(--poppins); overflow:hidden;">
            <div class="card-body py-0 px-2" style="border:none;">
                <div class="row d-flex justify-content-end align-items-start" style="background:url(src/img/CoozyLogo.png); background-repeat: no-repeat; background-size: 50% 100%; z-index: 000; height: 100%;">
                    <!-- Logo div -->
                    <!-- <div class="col-lg-6" style="position: relative;">
                        <span class="container logo" style="position: absolute; left: -1.3%; top: -5.4%;border:none; padding: 0; z-index: 10000;">
                            <img class="img-fluid" src="src/img/CoozyLogo.png" alt="" style="height: 30rem;">
                        </span>
                    </div> -->
                    <!-- Logo End -->

                    <!-- Login Form -->
                    <div class="col-7 py-5 px-5 d-flex justify-content-start align-items-start flex-column">
                        <h4 class="mb-2" style="font-weight: 700;">Sign In<br><hr class="featurette-divider my-0 mt-1" style="width:3vw; opacity: 1; background: black;border: 1px solid black;"></hr></h4>
                        <form action="" class="row g-2 px-lg-2 my-5" method="POST">
                            <span class="col-lg-12 px-4 hstack">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="50" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                                </svg>
                                <input type="email" 
                                class="py-1 mx-2 w-100" name="email" style="font-weight: 800;" maxlength="30" placeholder="Email">
                            </span>
                            <span class="col-lg-12 hstack mb-4 px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-shield-lock-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z"/>
                                </svg>
                                <input type="password"
                                class="py-1 mx-2 w-100" name="password" style="font-weight: 800;" maxlength="30" placeholder="Password">
                            </span>
                            <span class="col-8 px-3 d-flex flex-column align-items-start">
                                <small><a href="retrieve.php" class="text-dark text-decoration-none text-start w-100" style="font-weight: 900;">Forgot Password?</a></small>
                                <small><a href="register.php" class="text-dark text-decoration-none text-start w-100" style="font-weight: 900;">Create New Account</a></small>                                    
                            </span>
                            <span class="col-4 px-3 d-flex align-items-center justify-content-end">
                                <input type="submit" name="submit" id="" class="btn btn-dark" style="border-radius: 0;" value="Submit">
                            </span>
                        </form>
                    </div>
                    <!-- Form End -->
                </div>
                <!-- row end -->
            </div>
            <!-- Card body end -->
        </div>
        <!-- Card end -->
    </div>
    <!-- Container  -->
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];



    $check_account = "SELECT * FROM `user` WHERE email = '$email' and validation = 0";
    $query_check_account = mysqli_query($conn, $check_account);
    if(mysqli_num_rows($query_check_account) > 0){
        echo '<script>alert("Account is not yet verified")</script>';
        exit();
    }else{
    // for verified accounts
    $check_sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $query_check = mysqli_query($conn, $check_sql);
    if(mysqli_num_rows($query_check) > 0){
        $row = mysqli_fetch_array($query_check);
        if(password_verify($password, $row['password'])){
        $_SESSION['email'] = $row['email'];
        header("location:home.php");
        }else{
            echo '<script>alert("Incorrect credentials")</script>';
            exit();
        }
    }else{
        echo '<script>alert("Account not found")</script>';
        exit();
    }
    }
}
?>