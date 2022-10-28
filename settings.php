<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:login.php");
    exit();
}else{
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Coozy Apparel</title>
</head>
<style>
    .row-divider{
        border: 1px solid black;
        background: black;
        height: 100%;
    }
</style>
<body class="bg-maroon">
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
                    <ul class="navbar-nav ms-auto" style="font-size: 20px;">
                        <li class="nav-item active">
                            <a class="nav-link" href="home.php">SHOP</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CART</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                PRODUCTS
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">New Arrival</a>
                                <a class="dropdown-item" href="#">Sale</a>
                                <a class="dropdown-item" href="#">Hot</a>
                                <a class="dropdown-item" href="#">T-Shirts</a>
                                <a class="dropdown-item" href="#">Bags</a>
                            </div>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">ORDER STATUS</a>
                        </li>
                        <li class="nav-item dropdown align-items-center d-flex">
                            <a class="nav-link py-0 dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="settings.html">Settings</a>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                            <!-- Temporary nav item -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container d-flex justify-content-center">
        <div class="card px-2 mt-5 d-flex flex-row justify-content-evenly" style="border-radius: 0; width: 65em;">
            <div class="row py-4 px-3 w-50">
                <div class="col-12 justify-content-center">
                    <h3 class="p-3 m-2">ACCOUNT SETTINGS<br><hr class="featurette-divider my-0 p-0 mt-1 text-center" style="width:4.5vw; opacity: 1; background: black;border: 1px solid black;"></hr></h3>
                    <div class="row px-5">
                        <div class="col-12 mt-3 py-1 px-5">
                            <a href="settings.php" class="p-0 m-0 text-decoration-none color: text-black" style="font-size: 1.2em;">GENERAL SETTINGS</a>
                            <a href="settings.php?p" class="p-1 m-0 text-decoration-none color: text-black" style="font-size: 1.2em;">PRIVACY</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-divider"></div>
                <div class="row mt-2 py-4 w-75 px-5">
                    <?php 
                    if(isset($_GET['p'])){
                    ?>
                    <h5 class="p-3 m-0">ACCOUNT PRIVACY</h5>
                    <?php
                    $user_info = "SELECT * FROM user WHERE email = '$email'";
                    $query_user_info = mysqli_query($conn, $user_info);
                    $rows = mysqli_fetch_array($query_user_info);
                    ?>
                <div class="col-12 mt-3 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">PASSWORD</label>
                        <h4 style="font-size: 1.3em;">******</h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="#" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;">EDIT</a>
                    </span>
                    <?php
                    }else{
                    ?>
                    <h5 class="p-3 m-0">GENERAL SETTINGS</h5>
                    <?php
                    $user_info = "SELECT * FROM user WHERE email = '$email'";
                    $query_user_info = mysqli_query($conn, $user_info);
                    $rows = mysqli_fetch_array($query_user_info);
                    ?>
                <div class="col-12 mt-3 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">NAME</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['first_name'] . " " . $rows['last_name'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="#" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;">EDIT</a>
                    </span>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">EMAIL</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['email'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;">EDIT</a>
                    </span>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">HOME ADDRESS</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['address'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;">EDIT</a>
                    </span>
                </div>
                <div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>
</html>