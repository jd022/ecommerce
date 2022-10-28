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
    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.carousel.css">
    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl-customnav.css">
    <link rel="stylesheet" href="OwlCarousel/dist/assets/owl.theme.default.min.css">
    <title>Coozy Apparel.</title>
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
            <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="height: 10px; width:10px;border-radius: 50%;"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2" style="height: 10px; width:10px;border-radius: 50%;"></button>
                    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3" style="height: 10px; width:10px;border-radius: 50%;"></button>
                </div>
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
            </div>
        </div>
        <div class="card-wrapper d-flex flex-column align-items-center mb-5">
            <span class="mb-2 d-flex align-items-center justify-content-start w-75">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                <input type="text" name="" class="py-1 mx-2"placeholder="Search...">
            </span>
            <div class="card product-wrapper mt-2 p-lg-5 p-xxl-5 p-sm-0 p-md-0 d-flex align-items-center w-75" style="border:none; border-radius: 0; height: auto;">
                <div class="owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <?php
                            $select_melt_tee = "SELECT * FROM products";
                            $query_melt_tee = mysqli_query($conn, $select_melt_tee);
                            foreach($query_melt_tee as $rows){
                            ?>
                            <div class="owl-item">
                                <a href="product.php?p=<?php echo $rows['product_id'];?>" class="text-dark" style="text-decoration: none;">
                                <img src="src/img/<?php echo $rows['image'];?>" height="300px" width="100px" alt="">
                                <span class="text-center">
                                    <small><h6 class="mt-2 mb-0"><?php echo $rows['name'];?></h6></small>
                                    <small><h6 class="p-0">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                                </span>
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="OwlCarousel/dist/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            nav:true,
            navText: ["⮜", "⮞"],
            dots: false,
            loop: true,
            stagepadding: 50,
            margin: 50,
            responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
            }
        );
       
    });
</script>
<?php include 'includes/footer.php';?>