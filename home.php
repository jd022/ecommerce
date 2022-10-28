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
    @media screen and (width: 992) {
        .card-wrapper{
            width: 100%;
        }
    }
</style>
<body class="bg-maroon">
    <?php include 'includes/nav.php';?>
    <main class="container">
        <div class="container-fluid mt-3 mb-4">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../ecommerce/src/img/banner1.PNG" class="d-flex w-100" alt="banner1">
                    </div>
                    <div class="carousel-item">
                        <img src="../ecommerce/src/img/banner2.PNG" class="d-flex w-100" alt="banner2">
                    </div>
                    <div class="carousel-item">
                        <img src="../ecommerce/src/img/banner3.PNG" class="d-flex w-100" alt="banner3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="card-wrapper d-flex flex-column align-items-center" style="height: 65vh;">
            <span class="mb-4 d-flex align-items-center justify-content-start w-75">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                <input type="text" name="" placeholder="Search...">
            </span>
            <div class="card product-wrapper mt-2 p-lg-5 p-xxl-5 p-sm-0 p-md-0 d-flex align-items-center w-75" style="border:none; border-radius: 0; height: auto;">
                <div class="row g-5">
                    <div class="col-lg-4 col-sm-12 text-center">
                            <?php
                            $select_melt_tee = "SELECT * FROM products WHERE product_id = '84562983'";
                            $query_melt_tee = mysqli_query($conn, $select_melt_tee);
                            $rows = mysqli_fetch_array($query_melt_tee);
                            ?>
                            <a href="product.php?p=<?php echo $rows['product_id'];?>" class="text-dark" style="text-decoration: none;">
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="mt-2 mb-0"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                        </span>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-12 text-center">
                        <?php
                            $select_takerisk = "SELECT * FROM products WHERE product_id = '82758426'";
                            $query_takerisk = mysqli_query($conn, $select_takerisk);
                            $rows = mysqli_fetch_array($query_takerisk);
                            ?>
                            <a href="product.php?p=<?php echo $rows['product_id'];?>" class="text-dark" style="text-decoration: none;">
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 mt-2 mb-0"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0 m-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                        </span>
                        </a>
                    </div>
                    <div class="col-lg-4 text-center">
                        <?php
                            $select_kendrick = "SELECT * FROM products WHERE product_id = '38175967'";
                            $query_kendrick = mysqli_query($conn, $select_kendrick);
                            $rows = mysqli_fetch_array($query_kendrick);
                            ?>
                            <a href="product.php?p=<?php echo $rows['product_id'];?>" class="text-dark" style="text-decoration: none;">
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 mt-2 mb-0"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0 m-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                        </span>
                        </a>
                    </div>
                    <div class="col-lg-4 text-center">
                        <?php
                            $select_WICO = "SELECT * FROM products WHERE product_id = '83721543'";
                            $query_WICO = mysqli_query($conn, $select_WICO);
                            $rows = mysqli_fetch_array($query_WICO);
                            ?>
                            <a href="product.php?p=<?php echo $rows['product_id'];?>" class="text-dark" style="text-decoration: none;">
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 mt-2 mb-0"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0 m-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                        </span>
                        </a>
                    </div>
                    <div class="col-lg-4 text-center">
                        <?php
                            $select_frank = "SELECT * FROM products WHERE product_id = '67251438'";
                            $query_frank = mysqli_query($conn, $select_frank);
                            $rows = mysqli_fetch_array($query_frank);
                            ?>
                            <a href="product.php?p=<?php echo $rows['product_id'];?>" class="text-dark" style="text-decoration: none;">
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 mt-2 mb-0"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0 m-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                        </span>
                        </a>
                    </div>
                    <div class="col-lg-4 text-center">
                        <?php
                            $select_miata = "SELECT * FROM products WHERE product_id = '62514837'";
                            $query_miata = mysqli_query($conn, $select_miata);
                            $rows = mysqli_fetch_array($query_miata);
                            ?>
                            <a href="product.php?p=<?php echo $rows['product_id'];?>" class="text-dark" style="text-decoration: none;">
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <span class="text-center">
                            <small><h6 class="p-0 mt-2 mb-0"><?php echo $rows['name'];?></h6></small>
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
<?php include 'includes/footer.php';?>