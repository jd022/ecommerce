<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:login.php");
    exit();
}
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
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Order Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                        <!-- Temporary nav item -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <div class="container-fluid mb-5">
            <!-- iwan nyo to para sa carousel -->
        </div>
        <div class="container" style="height: 65vh; width: 70%;">
            <span class="mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                <input type="text" name="" placeholder="Search...">
            </span>
            <div class="card mt-2 p-5 d-flex align-items-center" style="border:none; border-radius: 0; height: 80%;">
                <div class="row g-5">
                    <div class="col-lg-4">
                        <img src="src/img/sample9.PNG" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 m-0">Melt Tee</h6></small>
                            <small><h6 class="p-0 m-0">₱450.00</h6></small>
                        </span>
                    </div>
                    <div class="col-lg-4">
                        <img src="src/img/sample8.PNG" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 m-0">Take Risk Dye</h6></small>
                            <small><h6 class="p-0 m-0">₱600.00</h6></small>
                        </span>
                    </div>
                    <div class="col-lg-4">
                        <img src="src/img/sample2.PNG" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 m-0">Kendrick L. Bootleg</h6></small>
                            <small><h6 class="p-0 m-0">₱1000.00</h6></small>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user <?php echo $_SESSION['email'];?>
    <a href="logout.php">logout</a> -->

</body>
</html>