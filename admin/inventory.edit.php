<?php
include '../connection.php';
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
}
// $email = $_SESSION['email'];


$product_id = $_POST['inventory'];
// $select_userid = "SELECT * FROM `user` WHERE email = '$email'";
// $query_userid = mysqli_query($conn, $select_userid);
// $rows = mysqli_fetch_array($query_userid);
// $user_id = $rows['user_id'];

$prod_det = "SELECT * FROM product_stocks 
LEFT JOIN products ON product_stocks.product_id = products.product_id 
WHERE product_stocks.product_id = '$product_id'";
$query_prod_det = mysqli_query($conn, $prod_det);
$rows = mysqli_fetch_array($query_prod_det);
$size = $rows['size'];

$sqldisplay = "SELECT * FROM product_stocks 
LEFT JOIN products ON product_stocks.product_id = products.product_id 
WHERE product_stocks.product_id = '$product_id'";
$rundisplay = mysqli_query($conn, $sqldisplay);
?>
<section class="container-fluid d-flex align-items-center justify-content-center px-4 px-sm-0">
    <div class="px-3 pb-5 mx-3 w-100">
        <p class="h4">PRODUCT ID: <b><?= $rows['product_id']; ?></b></p>
        <p class="h5">NAME: <b><?= strtoupper($rows['name']); ?></b></p>
        <p class="h5">PRICE: <b><?= number_format($rows['price'],2); ?></b></p>
        <p class="h5">Available Size</p>
        <hr class="featurette-divider">
        <form action="" method="POST">
<?php
    $i = 1;
while($rowdisplay = mysqli_fetch_array($rundisplay)){
    ?>
    
        <div class="row mb-1">
            <div class="col-lg-10 d-flex align-items-center">
                <img src="<?php echo "../src/img/" . $rowdisplay['image']; ?>" alt="image" style="height:100px; width: 80px; padding: 0; margin: 0;">
                <span class="px-3">
                    <p class="h4"><?= strtoupper($rowdisplay['size']);?></p>
                    <p class="h6">PREVIOUS STOCK: <?php echo $rowdisplay['quantity'];?></p>
                    <p class="h6">LAST UPDATE: <?php echo date("F d, Y h:i A", strtotime($rowdisplay['date_time_updated']));?></p>
                </span>
            </div>
            <div class="col-lg-2 text-center">
                <label for="">Stocks</label>
                <input type="hidden" name="count[]" value="<?php echo $i++;?>">
                <input type="hidden" name="count[]" value="<?php echo $product_id?>">
                <input type="text" name="quantity[]" class="form-control text-center">
            </div>
        </div>
        <hr class="featurette-divider">
    <?php
}
?>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update_inv" class="btn btn-primary">Save</button>
        </form>
    </div>

    
</section>  
