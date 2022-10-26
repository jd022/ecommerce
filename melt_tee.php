<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:login.php");
    exit();
}
if($_GET['pid']){
    $product_id = $_GET['pid'];
}
    $email = $_SESSION['email'];
    $select_userid = "SELECT * FROM `user` WHERE email = '$email'";
    $query_userid = mysqli_query($conn, $select_userid);
    $rows = mysqli_fetch_array($query_userid);
    $user_id = $rows['user_id'];
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
                <img src="../ecommerce/src/img/logo.png" width="160" alt="" sizes="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="font-size: 20px;">
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
    <div class="card mt-5 p-5 d-flex align-items-left" style="border:none; border-radius: 0; height: 80%;">
                <div class="row g-5">
                    <div class="col-lg-4">
                        <form action="" method="POST">
                        <?php
                            $select_melt_tee = "SELECT * FROM products WHERE product_id = '84562983'";
                            $query_melt_tee = mysqli_query($conn, $select_melt_tee);
                            $rows = mysqli_fetch_array($query_melt_tee);
                            ?>
                        <img src="src/img/<?php echo $rows['image'];?>" height="250px" width="200px" alt="">
                        <img src="src/img/melttee_chart.png" height="250px" width="450px" alt="">
                        <span class="text-left">
                            <small><h6 class="p-0 m-2"><?php echo $rows['name'];?></h6></small>
                            <small><h6 class="p-0 m-2">₱ <?php echo number_format($rows['price'],2);?></h6></small>
                                <select name="size" id="">
                                    <option value="">SIZES</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Large">Large</option>
                                    <option value="X-Large">X-Large</option>
                                    <option value="XX-Large">XX-Large</option>
                                </select>
                                <input type="number" name="quantity" min="0" max="50" placeholder="QTY">
                                <button type="submit" name="submit">ADD TO CART</button>
                        </span>
                        </form>
                    </div>
                    </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->

</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $size = $_POST['size'];
        $quantity = $_POST['quantity'];
        
        if($size == ""){
            echo '<script>alert("Please pick a product size")</script>';
            exit();
        }
        if(empty($quantity)){
            echo '<script>alert("Please input quantity")</script>';
            exit();
        }

        $add_to_cart = "INSERT INTO `user_orders`(`user_id`, `product_id`, `quantity`, `size`, `price`, `status`) 
        VALUES ('$user_id','$product_id','$quantity','$size','450.00','Pending Cart')";
        $query_add_to_cart = mysqli_query($conn, $add_to_cart);
        if($query_add_to_cart){
            echo '<script>alert("Product added to cart")</script>';
            exit();
        }else{
            echo '<script>alert("Something went wrong")</script>';
        }
    }
?>