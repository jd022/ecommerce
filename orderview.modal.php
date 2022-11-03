<?php
include 'connection.php';
$order = $_POST['order'];

$sqldisplay = "SELECT user_orders.id,user_orders.user_id, user_orders.order_id,user_orders.product_id,
user_orders.quantity,user_orders.size,user_orders.price,user_orders.status, products.product_id, 
products.name, products.price, products.image 
FROM user_orders 
LEFT JOIN products 
ON user_orders.product_id = products.product_id 
WHERE order_id = '$order' AND status != 'Cart'";
$rundisplay = mysqli_query($conn, $sqldisplay);
?>
<section class="container-fluid d-flex align-items-center justify-content-center px-4 px-sm-0">
    <div class="px-3 pb-5 mx-3 w-100">
        <p class="h4">ORDER ID: <b><?= $order ?></b></p>
        <hr class="featurette-divider">
<?php
while($rowdisplay = mysqli_fetch_array($rundisplay)){
    ?>
    
        <div class="row mb-1">
            <div class="col-lg-10 d-flex align-items-center">
                <img src="<?php echo "src/img/" . $rowdisplay['image']; ?>" alt="image" style="height:100px; width: 80px; padding: 0; margin: 0;">
                <span class="px-3">
                    <p class="h5"><?= $rowdisplay['name']?></p>
                    <p class="h6">Size: <?= $rowdisplay['size']?></p>
                    <p class="h6">Price: <?= $rowdisplay['price']?></p>
                </span>
            </div>
            <div class="col-lg-2 text-center">
                <label for="">Quantity</label>
                <input type="text" class="form-control text-center" value="<?= $rowdisplay['quantity'];?>" readonly>
            </div>
        </div>
                 
    <?php
}
?>  
    </div>
</section>   