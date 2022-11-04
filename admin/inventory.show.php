<?php
include '../connection.php';
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
}
// $email = $_SESSION['email'];


$product_id = $_POST['show'];
// $select_userid = "SELECT * FROM `user` WHERE email = '$email'";
// $query_userid = mysqli_query($conn, $select_userid);
// $rows = mysqli_fetch_array($query_userid);
// $user_id = $rows['user_id'];

$prod_det = "SELECT * FROM product_stocks 
LEFT JOIN products ON product_stocks.product_id = products.product_id 
WHERE product_stocks.product_id = '$product_id'";
$query_prod_det = mysqli_query($conn, $prod_det);
$rows = mysqli_fetch_array($query_prod_det);

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
<?php
while($rowdisplay = mysqli_fetch_array($rundisplay)){
    ?>
    
        <div class="row mb-1">
            <div class="col-lg-10 d-flex align-items-center">
                <img src="<?php echo "../src/img/" . $rowdisplay['image']; ?>" alt="image" style="height:100px; width: 80px; padding: 0; margin: 0;">
                <span class="px-3">
                    <p class="h4"><?= $rowdisplay['size']?></p>
                </span>
            </div>
            <div class="col-lg-2 text-center">
                <label for="">Stocks</label>
                <input type="text" class="form-control text-center" value="<?= $rowdisplay['quantity'];?>" readonly>
            </div>
        </div>
        <hr class="featurette-divider">
    <?php
}
?>

    
</section>  
