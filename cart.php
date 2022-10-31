<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
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
    <link rel="shortcut icon" href="src/icon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="stylesheet" href="bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Coozy Apparel</title>
</head>
<body class="bg-maroon">
    <?php include 'includes/nav.php';?>
    <form action="" method="POST">
    <main class="container px">
    <div class="card mt-5 mx-lg-5 p-5 d-flex align-items-center" style="border:none; border-radius: 0; height: 80%;">
            <table class="table">
                <tbody>
                <?php
                $status = 'Cart';
                $sql = "SELECT products.price as p_price, user_orders.user_id, user_orders.order_id, user_orders.product_id, user_orders.quantity, user_orders.size,
                user_orders.status, user_orders.price, products.product_id, products.image, products.name
                FROM `user_orders` 
                LEFT JOIN products on products.product_id = user_orders.product_id
                WHERE user_id = '$user_id' AND status = '$status'";
                $result = mysqli_query($conn, $sql) or die (mysqli_error($con));
                if(mysqli_num_rows($result) > 0){
                while ($rows = mysqli_fetch_array($result)){
					?>
                    <tr id="cart">
                        <td class="col-lg-3 text-lg-center">
                            <a href="product.php?p=<?php echo $rows['product_id'];?>" class="text-dark" style="text-decoration: none;">
                                <img src="src/img/<?php echo $rows['image'];?>" height="100px" width="100px" alt="">
                            </a>
                        </td>
                        <td>
                            <span>
                                <p class="h2 p-0 m-0"><?php echo $rows['name'];?></p>
                                <p class="h5 p-0 m-0"><?php echo $rows['size'];?></p>
                                <span class="d-flex">
                                    <p>₱ </p>
                                    <p id="price"><?php echo $rows['p_price'];?></p>
                                </span>
                            </span>
                        </td>
                        <td>
                            <span>
                                <p class="m-0 text-center">Quantity</p>
                                <input type="number" name="quantity" class="form-control" id="qty" min="0" max="99" value="<?php echo $rows['quantity'];?>">

                            </span>
                        </td>
                        
                    </tr>
                    
                        <?php
                        }
                        ?>
                </tbody>
            </table>
                    <div class="container bg-light p-5">
                        <span class="h5">Mode of Payment: Cash on Delivery</span>
                        <span class="d-flex h5">
                            <p>Total: ₱&nbsp;</p>
                            <p class="total"></p>
                        </span>
                        <span>
                            <button type="submit" name="submit" class="btn btn-primary">CHECK OUT</button>
                        </span>
                        </form>
                    </div>
                    <?php
                }else{
                    ?>
                    <h4>No item in your cart yet</h4>
                <?php }?>
                    </div>
        </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    // let qty = $('#qty').val();
    // let price = $('#price').text();
    // console.log(price)
    // console.log(qty)
    // // console.log(sum)
    upAmount();
    $('tbody #qty').on('keyup keypress blur change', function(e){
        upAmount();
    });   
});
function upAmount(){
    var sum = 0.0;
    $('tbody #cart').each(function(){
        var qty = $(this).find('#qty').val();
        var price = $(this).find('#price').text();
        var amount = (qty*price);
        sum+=amount;
        
    })
    $('.total').text(sum);
}
</script>
<?php include 'includes/footer.php';?>

<?php
    if(isset($_POST['submit'])){
        $quantity = $_POST['quantity'];
        $date = date('ym');
        $rand = rand('0000', '9999');
        $otp = "".$date."".$rand."";

        $check_order_id = "SELECT *, products.price as p_price
        FROM user_orders
        LEFT JOIN products on products.product_id = user_orders.product_id
        WHERE user_orders.id ORDER BY user_orders.order_id DESC";
        $query_order_id = mysqli_query($conn, $check_order_id);
        $row = mysqli_fetch_array($query_order_id);
        $p_price = $row['p_price'];
        $last_id = $row['order_id'];
        if(empty($last_id)){
            $order_item = "00". $date . $rand;
        }
        else{
            $order_item = "00". $date . $rand;
        }

        date_default_timezone_set('Asia/Manila');
		$date_time_created = date("Y-m-d H:i:s");
		$total_price = $quantity * $p_price;

		$update_user_order = "UPDATE `user_orders` SET `order_id` = '$order_item', `status` = 'Pending', 
        `quantity` = '$quantity', `price` = '$total_price', `date_time_created` = '$date_time_created'
        WHERE user_id = '$user_id' AND `status` = 'Cart'";
        $query_update_user_order = mysqli_query($conn, $update_user_order);
        if($query_update_user_order == true){
            echo "<script>alert('Order submitted, check your order status to check your orders.');
            window.location.href='cart.php'</script>";
            exit();
        }else{
            echo $conn->error;
            exit();
        }
    }
?>