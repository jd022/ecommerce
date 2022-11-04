<?php
include '../connection.php';
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
}
$email = $_SESSION['email'];


$order = $_POST['order'];
$select_userid = "SELECT * FROM `user` WHERE email = '$email'";
$query_userid = mysqli_query($conn, $select_userid);
$rows = mysqli_fetch_array($query_userid);
$user_id = $rows['user_id'];

$sqldisplay = "SELECT user_orders.id,user_orders.user_id, user_orders.order_id,user_orders.product_id,
user_orders.quantity,user_orders.size,user_orders.price,user_orders.status, products.product_id, 
products.name, products.price, products.image 
FROM user_orders 
LEFT JOIN products ON user_orders.product_id = products.product_id 
WHERE order_id = '$order' AND NOT status = 'Cart' AND NOT status ='Done'";
$rundisplay = mysqli_query($conn, $sqldisplay);
?>
<section class="container-fluid d-flex align-items-center justify-content-center px-4 px-sm-0">
    <div class="px-3 pb-5 mx-3 w-100">
        <p class="h4">ORDER ID: <b><?= $order ?></b></p>
        <p class="h6">NAME: <b><?= strtoupper($rows['first_name']) . " " . strtoupper($rows['last_name']); ?></b></p>
        <p class="h6">ADDRESS: <b><?= strtoupper($rows['address']) . " " . strtoupper($rows['brgy_no']) . " " . strtoupper($rows['p_code']); ?></b></p>
        <hr class="featurette-divider">
<?php
while($rowdisplay = mysqli_fetch_array($rundisplay)){
    ?>
    
        <div class="row mb-1">
            <div class="col-lg-10 d-flex align-items-center">
                <img src="<?php echo "../src/img/" . $rowdisplay['image']; ?>" alt="image" style="height:100px; width: 80px; padding: 0; margin: 0;">
                <span class="px-3">
                    <p class="h5"><?= $rowdisplay['name']?></p>
                    <p class="h6">Size: <?= $rowdisplay['size']?></p>
                    <p class="h6">Price: ₱ <?= $rowdisplay['price']?></p>
                </span>
            </div>
            <div class="col-lg-2 text-center">
                <label for="">Quantity</label>
                <input type="text" class="form-control text-center" value="<?= $rowdisplay['quantity'];?>" readonly>
            </div>
        </div>
        <hr class="featurette-divider">
    <?php
}
?>
        <?php
        $order_details = "SELECT user_orders.id,user_orders.user_id, user_orders.order_id,user_orders.product_id,
        user_orders.quantity,user_orders.size, SUM(user_orders.price) as total,user_orders.status, products.product_id, 
        products.name, products.price, products.image 
        FROM user_orders 
        LEFT JOIN products ON user_orders.product_id = products.product_id 
        WHERE order_id = '$order' AND NOT status = 'Cart' AND NOT status ='Done'";
        $query_details = mysqli_query($conn, $order_details);
        $rows = mysqli_fetch_array($query_details);
        ?>
        <div class="row mb-1">
            <div class="col-lg-8 d-flex align-items-center">
                <span class="px-3">
                    <p class="h5">ORDER SUMMARY</p>
                    <p class="h6">SHIPPING FEE: </p>
                    <p class="h6">TOTAL:</p>
                    <p class="h6">MODE OF PAYMENT:</p>
                </span>
            </div>
            <div class="col-lg-4 d-flex flex-column align-items-end justify-content-end">
                    <p class="h6" style="color:green;">FREE SHIPPING</p>
                    <p class="h6">₱<?php echo $rows['total'];?>.00</p>
                    <p class="h6">CASH ON DELIVERY</p>
            </div>
        </div>
    </div>
</section>  
