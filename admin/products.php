<?php
include ("../connection.php");
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
    <link rel="stylesheet" href="../bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Coozy Apparel</title>
</head> 
<style>
    @media screen and (width: 992) {
        .card-wrapper{
            width: 100%;
        }
    }
</style>
<body class="bg-maroon">
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../src/img/logo.png" width="150" alt="" sizes="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto" style="font-size: 20px;">
                    <li class="nav-item active">
                        <a class="nav-link" href="orders.php">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SALES</a>
                    </li>
                    <li class="nav-item dropdown align-items-center d-flex">
                        <a class="nav-link py-0 dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../logout.php">Logout</a>
                        </div>
                        <!-- Temporary nav item -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container">
        <div class="card-wrapper d-flex flex-column align-items-center" style="height: 65vh;">
            <div class="card product-wrapper mt-5 p-lg-5 p-xxl-5 p-sm-0 p-md-0 w-75" style="text-align:justify; border:none; border-radius: 0; height: auto;">
                <h2>PRODUCTS</h2>
                <span><a href="products.php?t">T-SHIRTS</a>
                <a href="products.php?j">JACKET</a>
                <a href="products.php?o">OTHER</a></span>
                <?php
                if(isset($_GET['o'])){
                ?>
                <?php
                $other_product = "SELECT * FROM products 
                WHERE product_type = 'Other' ORDER BY date_time_created DESC";
                $query_other_product = mysqli_query($conn, $other_product);
                if($row_count = mysqli_num_rows($query_other_product) > 0){
                ?>
                <table style="text-align: center;">
					<thead>
					<tr>
                    <th>ITEM ID</th>
                    <th>NAME</th>
                    <th>DATE ADDED</th>
                    <th>Operation</th>
					</tr>
					</thead>
				
					<?php 
							while($rows = mysqli_fetch_array($query_other_product)){
					?>
					<tbody>
					<tr>
					<td><?php echo $rows['product_id'];?></td>
                    <td><?php echo $rows['name'];?></td>
					<td><?php echo date("F d, Y h:i:s A", strtotime($rows['date_time_created']));?></td>
                    <td><a class="confirm-buton" href="#">EDIT</a>
                        <a href="">REMOVE</a>
                    </td>
					</tr>
					</tbody>
					<?php
					}
					?>
					</table>
                <?php
                }else{
                    echo '<h1>No Product Yet</h1>';
                }
                ?>
                <?php
                }else if(isset($_GET['j'])){
                ?>
                <?php
                $jacket_product = "SELECT * FROM products 
                WHERE product_type = 'Jacket' ORDER BY date_time_created DESC";
                $query_jacket_product = mysqli_query($conn, $jacket_product);
                if($row_count = mysqli_num_rows($query_jacket_product) > 0){
                ?>
                <table style="text-align: center;">
					<thead>
					<tr>
                    <th>ITEM ID</th>
                    <th>NAME</th>
                    <th>DATE ADDED</th>
                    <th>Operation</th>
					</tr>
					</thead>
				
					<?php 
							while($rows = mysqli_fetch_array($query_jacket_product)){
					?>
					<tbody>
					<tr>
					<td><?php echo $rows['product_id'];?></td>
                    <td><?php echo $rows['name'];?></td>
					<td><?php echo date("F d, Y h:i:s A", strtotime($rows['date_time_created']));?></td>
                    <td><a class="confirm-buton" href="#">EDIT</a>
                        <a href="">REMOVE</a>
                    </td>
					</tr>
					</tbody>
					<?php
					}
					?>
					</table>
                <?php
                }else{
                    echo '<h1>No Product Yet</h1>';
                }
                ?>
                <?php
                }else{
                ?>
                <?php
                $tshirt_product = "SELECT * FROM products 
                WHERE product_type = 'T-Shirt' ORDER BY date_time_created DESC";
                $query_tshirt_product = mysqli_query($conn, $tshirt_product);
                if(mysqli_num_rows($query_tshirt_product) > 0){
                ?>
                <table style="text-align: center;">
					<thead>
					<tr>
                    <th>ITEM ID</th>
                    <th>NAME</th>
                    <th>DATE ADDED</th>
                    <th>Operation</th>
					</tr>
					</thead>
				
					<?php 
							while($rows = mysqli_fetch_array($query_tshirt_product)){
					?>
					<tbody>
					<tr>
					<td><?php echo $rows['product_id'];?></td>
                    <td><?php echo $rows['name'];?></td>
					<td><?php echo date("F d, Y h:i:s A", strtotime($rows['date_time_created']));?></td>
                    <td><a class="confirm-buton" href="#">EDIT</a>
                        <a href="">REMOVE</a>
                    </td>
					</tr>
					</tbody>
					<?php
					}
					?>
					</table>
                    <?php
                    }else{
                        echo '<h1>No Product Yet</h1>';
                    }
                    ?>
                <?php
                }
                ?>
            </div>
        </div>
    </main>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>