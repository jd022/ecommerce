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
    <link rel="shortcut icon" href="../src/icon/android-chrome-512x512.png" type="image/x-icon">
    <link rel="stylesheet" href="../bs-5/bootstrap/dist/css/bootstrap.css">
    <title>Coozy Apparel</title>
</head> 
<style>
    @media screen and (width: 992) {
        .card-wrapper{
            width: 100%;
        }
    }
    .row-divider{
        border: 1px solid black;
        background: black;
        height: 100%;
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
                        <a class="nav-link" href="#">DASHBOARD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SALES</a>
                    </li>
                    <li class="nav-item dropdown align-items-center d-flex">
                        <a class="nav-link py-0" href="#" id="navbarDropdown" data-bs-toggle="dropdown"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
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
    <main class="container justify-content-center">
        <div class="card-wrapper mt-4 d-flex flex-column align-items-center" style="height: 600px; overflow: none;">
            <div class="card mb-2 mt-5" style="width: 80%; border: none; border-radius: 0;">
                    <div class="row">
                        <div class="col-md-4 p-0 m-0 bg-secondary">
                            <div class="py-5 d-flex flex-column align-items-center">
                                <p class="h3" style="color: rgba(0,0,0,0.4);">DASHBOARD</p>
                                    <span class="d-flex justify-content-center flex-column align-items-center">
                                        <a class="text-dark mt-3 fs-4 text-center" href="orders.php" style="text-decoration: none;">ORDERS</a>
                                        <a class="text-dark mt-3 fs-4" href="" style="text-decoration: none;">PRODUCTS</a>
                                        <a class="text-dark mt-3 fs-4" href="inventory.php" style="text-decoration: none;">INVENTORY</a>
                                        <a class="text-dark mt-3 fs-4" href="" style="text-decoration: none;">USERS</a>
                                    </span>
                            </div>
                        </div>
                        <div class="col-md-8 py-4 px-3">
                            <h5 class="text-muted px-3">PRODUCTS</h5>
                            <span class="fs-5 fw-normal d-flex justify-content-evenly mt-4">
                                <a href = "products.php?ts"class="text-dark" style="text-decoration: none;">T-SHIRTS</a>
                                <a href = "products.php?j" class="text-dark" style="text-decoration: none;">JACKETS</a>
                                <a href = "products.php?o" class="text-dark" style="text-decoration: none;">OTHERS</a>
                            </span>
                            <hr>
                                <table class="table text-center table-hover">
                                    <span class="mb-4 d-flex align-items-center justify-content-end w-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="black" class="bi bi-search" viewBox="0 0 15 15">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                                    <input type="text" name="" class="py-1 mx-2"placeholder="Search...">
                                </span>
                                <?php
                                if(isset($_GET['ts'])){
                                    $get_product_ts = "SELECT * FROM products WHERE product_type = 'T-Shirt'";
                                    $query_get_product_ts = mysqli_query($conn, $get_product_ts);
                                    if(mysqli_num_rows($query_get_product_ts) > 0){?>
                                    <thead>
                                    <th style="font-weight: 500;">NO.</th>
                                    <th style="font-weight: 500;">PRODUCT ID</th> 
                                    <th style="font-weight: 500;">DATE ADDED</th>
                                    <th style="font-weight: 500;">OPERATION</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        while($rows = mysqli_fetch_array($query_get_product_ts)){
                                    ?>
                                    <tr>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo $i++;?></td>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo $rows['product_id'];?></td>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo date("Y-m-d h:i:s A", strtotime($rows['date_time_created']));?></td>
                                        <td style="z-index:1111;">
                                            <a class="btn btn-success btn-sm product" href="" style="border-radius: 0;" data-id="<?php echo $product_id?>" data-bs-toggle="modal" data-bs-target="#product">EDIT</a>
                                            <a class="btn btn-danger btn-sm" href="og.php" style="border-radius: 0;">REMOVE</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                <?php
                                    }else{
                                        echo "<td>There is no data in table</td>";
                                    }
                                ?>
                                <?php
                                }else if(isset($_GET['j'])){
                                    $get_product_j = "SELECT * FROM products WHERE product_type = 'Jacket'";
                                    $query_get_product_j = mysqli_query($conn, $get_product_j);
                                    if(mysqli_num_rows($query_get_product_j) > 0){
                                ?>
                                 <thead>
                                    <th style="font-weight: 500;">NO.</th>
                                    <th style="font-weight: 500;">PRODUCT ID</th> 
                                    <th style="font-weight: 500;">DATE ADDED</th>
                                    <th style="font-weight: 500;">OPERATION</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        while($rows = mysqli_fetch_array($query_get_product_j)){
                                    ?>
                                    <tr>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo $i++;?></td>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo $rows['product_id'];?></td>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo date("Y-m-d h:i:s A", strtotime($rows['date_time_created']));?></td>
                                        <td style="z-index:1111;">
                                            <a class="btn btn-success btn-sm product" href="" style="border-radius: 0;" data-id="<?php echo $product_id?>" data-bs-toggle="modal" data-bs-target="#product">EDIT</a>
                                            <a class="btn btn-danger btn-sm" href="og.php" style="border-radius: 0;">REMOVE</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                <?php
                                    }else{
                                        echo "<td>There is no data in table</td>";
                                    }
                                ?>
                                <?php
                                }else if(isset($_GET['o'])){
                                    $get_product_j = "SELECT * FROM products WHERE product_type = 'Other'";
                                    $query_get_product_j = mysqli_query($conn, $get_product_j);
                                    if(mysqli_num_rows($query_get_product_j) > 0){
                                    ?>
                                    <thead>
                                    <th style="font-weight: 500;">NO.</th>
                                    <th style="font-weight: 500;">PRODUCT ID</th> 
                                    <th style="font-weight: 500;">DATE ADDED</th>
                                    <th style="font-weight: 500;">OPERATION</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        while($rows = mysqli_fetch_array($query_get_product_j)){
                                    ?>
                                    <tr>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo $i++;?></td>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo $rows['product_id'];?></td>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo date("Y-m-d h:i:s A", strtotime($rows['date_time_created']));?></td>
                                        <td style="z-index:1111;">
                                            <a class="btn btn-success btn-sm product" href="" style="border-radius: 0;" data-id="<?php echo $product_id?>" data-bs-toggle="modal" data-bs-target="#product">EDIT</a>
                                            <a class="btn btn-danger btn-sm" href="og.php" style="border-radius: 0;">REMOVE</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                    <?php
                                     }else{
                                        echo "<td>There is no data in table</td>";
                                    }
                                    ?>
                                <?php
                                }else{
                                ?>
                                <?php
                                    $get_product = "SELECT * FROM products";
                                    $query_get_product = mysqli_query($conn, $get_product);
                                    if(mysqli_num_rows($query_get_product) > 0){
                                    ?>
                                <thead>
                                    <th style="font-weight: 500;">NO.</th>
                                    <th style="font-weight: 500;">PRODUCT ID</th> 
                                    <th style="font-weight: 500;">DATE ADDED</th>
                                    <th style="font-weight: 500;">OPERATION</th>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        while($rows = mysqli_fetch_array($query_get_product)){
                                    ?>
                                    <tr>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo $i++;?></td>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo $rows['product_id'];?></td>
                                        <td style="cursor:pointer;" class="product" data-id="<?php ?>" data-bs-toggle="modal" data-bs-target="#product"><?php echo date("Y-m-d h:i:s A", strtotime($rows['date_time_created']));?></td>
                                        <td style="z-index:1111;">
                                            <a class="btn btn-success btn-sm product" href="" style="border-radius: 0;" data-id="<?php echo $product_id?>" data-bs-toggle="modal" data-bs-target="#product">EDIT</a>
                                            <a class="btn btn-danger btn-sm" href="og.php" style="border-radius: 0;">REMOVE</a>
                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                                <?php
                                    }else{
                                        echo "<td>There is no data in table</td>";
                                    }
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="product" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            
            <div class="modal-content" style="border-radius:0;">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    <!-- <h1>Home</h1>
    welcome user
    <a href="logout.php">logout</a> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.product').click(function(){
                var products = $(this).data('id');
                // eto yung ipapasa sa inventory.modal.php 
                $.ajax({
                    url: 'inventory.modal.php',
                    type: 'post',
                    data: {products: products},
                    success: function(response){
                        $('.modal-body').html(response);
                        $('#product').modal('show');
                    }
                })
            });
        });
    </script>
</body>
</html>