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
    <title>Coozy Apparel</title>
</head>
<body class="bg-maroon">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../ecommerce/src/img/logo.png" width="140" alt="" sizes="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="font-size: 19px;">
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
                    <li class="nav-item">
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
    <main class="container d-flex justify-content-center mt-5">
        <img src="../ecommerce/src/img/Melt Tee.PNG" class="m-4" height="400px" width="290px" alt="">
            <div class="container-fluid row" style="width: 30%;">
                <!-- card start -->
                <div class="card product-wrapper mt-4 px-3 py-4 col-12 mb-0 pb-0 border border-dark" style="border:none; border-radius: 0; height: 28vh;">
                    <div class="row d-flex">
                        <div class="col-lg-12 col-sm-12 text-left">
                            <div class="row">
                                <a href="melt_tee.php" class="text-dark" style="text-decoration: none;">
                                    <?php
                                    $select_melt_tee = "SELECT * FROM products WHERE product_id = '84562983'";
                                    $query_melt_tee = mysqli_query($conn, $select_melt_tee);
                                    $rows = mysqli_fetch_array($query_melt_tee);
                                    ?>
                                    <span class="text-center">
                                        <small><h5 class="p-0 mt-0"><?php echo $rows['name'];?> ₱ <?php echo number_format($rows['price'],2);?></h5></small>
                                    </span>    
                                </a>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <select class="form-select border border-dark" name="" id="">
                                        <option value="">Sizes</option>
                                        <option value="">Medium</option>
                                        <option value="">Large</option>
                                        <option value="">XL</option>
                                        <option value="">2XL</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select class="form-select border border-dark" name="" id="">
                                        <option value="">Quantity</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                        <option value="">4</option>
                                        <option value="">5</option>
                                        <option value="">6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="btn">
                                    <button type="button" class="btn btn-dark text-white">CANCEL</button>
                                    <button type="button" class="btn btn-warning text-black">ADD TO CART</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                <div class="col-12 text-white border border-dark">
                    <p>Cop this first easeful design Ice Melt Tee cooz! 
                        Keep it Cool and Cozy!
                        and also follow us on
                        FB: CoozyAppparelCo
                        IG: CoozyApparelCo</p>
                </div>
            </div>
        </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>