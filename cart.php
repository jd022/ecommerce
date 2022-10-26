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
                        <a class="nav-link" href="#">SHOP</a>
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
                    <table>
					<thead>
					<tr>
					<th>Product ID:</th>
					<th>Item Name</th>
                    <th>Quantity</th>
					<th>Price</th>
					<th>Operation</th>
					</tr>
					</thead>
				
					<?php 
						$sql = "SELECT * FROM `user_orders` WHERE user_id = '$user_id'";
						$result = mysqli_query($conn, $sql) or die (mysqli_error($con));
							while ($rows = mysqli_fetch_array($result)){
					?>
					<tbody>
					<tr>
					<td><?php echo $rows['product_id'];?></td>
                    <td>Melt Tee</td>
					<td><?php echo $rows['quantity'];?></td>
					<td><?php echo $rows['size'];?></td>
					<td><a class="confirm-buton" href="#">Edit Product</a>
					</td>
					</tr>
					</tbody>
					<?php
					}
					?>
					</table>
                
                    </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->

</body>
</html>