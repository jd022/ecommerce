<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
}
if(isset($_GET['p'])){
    $product_id = $_GET['p'];
}
if(empty($_GET['p'])){
    header("location:home.php");
    exit();
}
$email = $_SESSION['email'];
$select_userid = "SELECT * FROM `user` WHERE email = '$email'";
$query_userid = mysqli_query($conn, $select_userid);
$rows = mysqli_fetch_array($query_userid);
$user_id = $rows['user_id'];
include 'includes/header.php';
include 'includes/nav.php';?>
    <main class="container d-flex justify-content-center mt-5">
    <?php
        $select_product = "SELECT *
        FROM products 
        LEFT JOIN product_stocks on products.product_id = product_stocks.product_id
        WHERE products.product_id = '$product_id' and product_stocks.stock = 'in'";
        $query_product = mysqli_query($conn, $select_product);
        if(mysqli_num_rows($query_product) > 0){
        $rows = mysqli_fetch_array($query_product);
        ?>
        <img src="../ecommerce/src/img/<?php echo $rows['image'];?>" class="m-4" height="450px" width="290px" alt="">       
            <div class="container-fluid row" style="width: 30%;">
                <!-- card start -->
                <div class="card product-wrapper mt-4 px-3 py-4 col-12 mb-0 pb-0 border border-dark" style="border:none; border-radius: 0; height: 28vh;">
                    <div class="row d-flex">
                        <div class="col-lg-12 col-sm-12 text-left">
                            <div class="row">
                                <form action="" method="POST">
                                <span class="text-center">
                                    <small><h5 class="p-0 mt-0"><?php echo $rows['name'];?> ₱ <?php echo number_format($rows['price'],2);?></h5></small>
                                </span>    
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <select  class="form-select border border-dark" name="size" id="">
                                        <option selected="true" hidden value="">Sizes</option>
                                        <?php
                                        $check_medium_size = "SELECT * FROM product_stocks
                                        WHERE product_id = '$product_id' and quantity <= 0
                                        and product_stocks.stock = 'in' and size = 'Medium'";
                                        $query_medium_size = mysqli_query($conn, $check_medium_size);
                                        if(mysqli_num_rows($query_medium_size) > 0){
                                        ?>
                                        <option disabled="disabled" value="Medium">Medium</option>
                                        <?php
                                        }else{
                                        ?>
                                        <option value="Medium">Medium</option>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        $check_large_size = "SELECT * FROM product_stocks
                                        WHERE product_id = '$product_id' and quantity <= 0
                                        and product_stocks.stock = 'in' and size = 'Large'";
                                        $query_large_size = mysqli_query($conn, $check_large_size);
                                        if(mysqli_num_rows($query_large_size) > 0){
                                        ?>
                                        <option disabled="disabled" value="Large">Large</option>
                                        <?php
                                        }else{
                                        ?>
                                        <option value="Large">Large</option>
                                        <?php
                                        }
                                        ?>

                                        <?php
                                        $check_xlarge_size = "SELECT * FROM product_stocks
                                        WHERE product_id = '$product_id' and quantity <= 0
                                        and product_stocks.stock = 'in' and size = 'X-Large'";
                                        $query_xlarge_size = mysqli_query($conn, $check_xlarge_size);
                                        if(mysqli_num_rows($query_xlarge_size) > 0){
                                        ?>
                                        <option disabled="disabled" value="X-Large">XL</option>
                                        <?php
                                        }else{
                                        ?>
                                        <option value="X-Large">XL</option>
                                        <?php
                                        }
                                        ?>
                                        
                                        
                                        <?php
                                        $check_xxlarge_size = "SELECT * FROM product_stocks
                                        WHERE product_id = '$product_id' and quantity <= 0
                                        and product_stocks.stock = 'in' and size = 'XX-Large'";
                                        $query_xxlarge_size = mysqli_query($conn, $check_xxlarge_size);
                                        if(mysqli_num_rows($query_xxlarge_size) > 0){
                                        ?>
                                        <option disabled="disabled" value="XX-Large">XXL</option>
                                        <?php
                                        }else{
                                        ?>
                                        <option value="XX-Large">XXL</option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <input type="number" name="quantity" min="0" max="200" class="form-control border border-dark" placeholder="QUANTITY">
                                </div>
                            </div>
                            <div class="d-flex mt-4 row">
                                <div class="col-lg-6">
                                    <button type="submit" name="submit" class="btn btn-warning text-black w-100 fw-bold" style="height: 40px; font-size: 14px;">ADD TO CART</button>
                                </div>
                                <div class="col-lg-6">
                                    <a href="home.php" class="col-lg-5 btn btn-dark text-white w-100">CANCEL</a>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card end -->
                <div class="col-12 text-white" style="font-size: 20px;">
                    <p>Cop this first easeful design Ice Melt Tee cooz!<br>
                        Keep it Cool and Cozy!<br>
                        and also follow us on<br><br>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
</svg> : CoozyAppparelCo<br>
<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg> : CoozyApparelCo
                    </p>
                </div>
            </div>
        <?php }else{
            echo "<script>alert('Not available at this moment.');
            window.location.href='home.php'</script>";
            }?>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        date_default_timezone_set('Asia/Manila');
        $date_time_created = date('Y-m-d H:i:s');

        $size = $_POST['size'];
        $quantity = $_POST['quantity'];

        if($size == ""){
            echo "<script>alert('Please pick a product size');
            window.location.href='product.php?p=$product_id'</script>";
            exit();
        }
        if(empty($quantity)){
            echo '<script>alert("Please input quantity")</script>';
            exit();
        }

        $t_product_price = $rows['price'] * $quantity;
        $status = 'Cart';
        
        $check_cart = "SELECT * FROM `user_orders` WHERE user_id = '$user_id' AND
        `product_id` = '$product_id' AND `size` = '$size' AND `status` = '$status'";
        $query_check_cart = mysqli_query($conn, $check_cart);
        if(mysqli_num_rows($query_check_cart) > 0){
            echo '<script>alert("Product already added in your cart, please check your cart to edit your order")</script>';
            exit();
        }else{
        $add_to_cart = "INSERT INTO `user_orders`(`user_id`, `product_id`, `quantity`, `size`, `price`, `status`, `date_time_created`) 
        VALUES ('$user_id','$product_id','$quantity','$size','$t_product_price','$status', '$date_time_created')";
        $query_add_to_cart = mysqli_query($conn, $add_to_cart);
        if($query_add_to_cart){
            echo '<script>alert("Product added to cart")</script>';
            exit();
        }else{
            echo '<script>alert("Something went wrong")</script>';
            exit();
        }
        }
    }
?>