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
    <title>Document</title>
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
                        <a href="melt_tee.php">
                            <?php
                            $select_melt_tee = "SELECT * FROM products WHERE product_id = '84562983'";
                            $query_melt_tee = mysqli_query($conn, $select_melt_tee);
                            $rows = mysqli_fetch_array($query_melt_tee);
                            ?>
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 m-0"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0 m-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                        </span>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="take_risk_dye.php">
                        <?php
                            $select_takerisk = "SELECT * FROM products WHERE product_id = '82758426'";
                            $query_takerisk = mysqli_query($conn, $select_takerisk);
                            $rows = mysqli_fetch_array($query_takerisk);
                            ?>
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 m-0"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0 m-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                        </span>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="kedrick_bootleg.php">
                        <?php
                            $select_kendrick = "SELECT * FROM products WHERE product_id = '38175967'";
                            $query_kendrick = mysqli_query($conn, $select_kendrick);
                            $rows = mysqli_fetch_array($query_kendrick);
                            ?>
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 m-0"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0 m-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->

</body>
</html>