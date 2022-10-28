<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:login.php");
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
                        <a class="nav-link" href="home.php
                        ">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CART</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ORDER STATUS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">LOG OUT</a>
                        <!-- Temporary nav item -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
    <div class="card mt-5 p-5 d-flex align-items-center" style="border:none; border-radius: 0; height: 80%;">
                <?php
                $status = 'Cart';
                $sql = "SELECT * FROM `user_orders` WHERE user_id = '$user_id' AND status = '$status'";
                $result = mysqli_query($conn, $sql) or die (mysqli_error($con));
                if(mysqli_num_rows($result) > 0){

                ?>
                    <table>
					<thead>
					<tr>
					<th>Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
					<th>Price</th>
                    <th>Operation</th>
					</tr>
					</thead>
				
					<?php 
							while ($rows = mysqli_fetch_array($result)){
					?>
					<tbody>
					<tr>
                    <td>Melt Tee</td>
					<td><?php echo $rows['size'];?></td>
					<td><?php echo $rows['quantity'];?></td>
                    <td>₱ <?php echo $rows['price'];?></td>
                    <td><a class="confirm-buton" href="#">Edit Product</a></td>
					</tr>
					</tbody>
					<?php
					}
					?>
					</table>
                    <span>Mode of Payment: Cash on Delivery</span>
                    <?php
                    $total_bill = "SELECT SUM(price) as total_price FROM user_orders 
                    WHERE user_id = '$user_id' and status = '$status'";
                    $query_total_bill = mysqli_query($conn, $total_bill);
                    $rows = mysqli_fetch_array($query_total_bill);
                    echo "Total: ₱" . $rows['total_price'];
                    ?>
                    <a href="cart.php?c=<?php echo $user_id;?>">CHECK OUT</a>
                    <?php
                }else{
                    ?>
                    <h4>No item in your cart yet</h4>
                <?php }?>
                    </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->

</body>
</html>
<?php
    if(isset($_GET['c'])){
        $date = date('ym');
        $rand = rand('0000', '9999');
        $otp = "".$date."".$rand."";

        $check_order_id = "SELECT * FROM user_orders WHERE id ORDER BY order_id DESC";
        $query_order_id = mysqli_query($conn, $check_order_id);
        $row = mysqli_fetch_array($query_order_id);
        $last_id = $row['order_id'];
        if(empty($last_id)){
            $order_item = "00". $date . $rand;
        }
        else{
            $order_item = "00". $date . $rand;
        }

        date_default_timezone_set('Asia/Manila');
		$date_time_updated = date("Y-m-d H:i:s");
		
		$update_user_order = "UPDATE `user_orders` SET `order_id` = '$order_item', `status` = 'Pending'
        WHERE user_id = '$user_id' and `status` = 'Cart'";
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